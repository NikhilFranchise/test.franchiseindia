<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FranPaymentHistory;
use App\Models\UserAccount;
use App\Models\OnlinePayment;
use App\Mail\confirmed;
use App\Models\ProfileMembership;
use App\Mail\FranchisorPayment;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class FranPaymentController extends Controller
{
    //
    public function payment()
    {
        return view('site/payment');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentHdfcPayuPg(Request $request)
    {
        $name         = $request->name;
        $amount       = $request->camount;
        $email        = $request->email;
        $mobile       = $request->mobile;
        $lastInsertId = $request->tranId;
        $mopt = $request->mopt;		
        $country      = config('location.countryName.' . $request->input('country'));
        $franchisorId = $request->details;
        if(!empty(request()->user()))
            $franchisorId = request()->user()->profile_str;

        $franDetails  = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();

        if(empty($franDetails))
            return view('thanks.paymentfailed');

        $paymentController = new PaymentController();
        $track_id = $lastInsertId;
        $order_id = "order_id=".urlencode("openPayment_".$lastInsertId);
        $tid = "tid=".urlencode(rand().$track_id);
        $merchant_id = "merchant_id=".urlencode(Config('hdfcpgnew.merchantKey'));
        $amount = "amount=".urlencode($amount);
        $currency = "currency=".urlencode("INR");
        $redirect_url = "redirect_url=".urlencode(Config('constants.MainDomain')."/fransuccess");  //Return URL
        $cancel_url = "cancel_url=".urlencode(Config('constants.MainDomain')."/franfailed");  //Return URL
        $language = "language=".urlencode("EN");
        $billing_name = "billing_name=".urlencode($name);
        $billing_address = "billing_address=".urlencode($country);
        $billing_city= "billing_city=".urlencode($franDetails->city);
        $billing_state= "billing_state=".urlencode($franDetails->state);
        $billing_zip= "billing_zip=".urlencode($franDetails->pincode);
        $billing_country= "billing_country=".urlencode($country);
        $billing_tel= "billing_tel=".urlencode($mobile);
        $billing_email= "billing_email=".urlencode($email);
        $payment_option = "payment_option=".urlencode($mopt);
        $card_type = "card_type=".urlencode(str_replace("OPT","",$mopt));
	
        $merchant_data = $tid."&".$merchant_id."&".$order_id."&".$amount."&".$currency."&".$redirect_url."&".$cancel_url."&".$language."&".$billing_name."&".$billing_address."&".$billing_city."&".$billing_state."&".$billing_zip."&".$billing_country."&".$billing_tel."&".$billing_email."&".$payment_option."&".$card_type;
        $encrypted_data = $paymentController->encrypt($merchant_data, Config('hdfcpgnew.workingKey')); // Method for encrypting the data.
        $access_code_new = Config('hdfcpgnew.accessCode');

        return view('payment.payment-request')->with(compact('encrypted_data', 'access_code_new'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentSuccess(Request $request) {

        $amount = 0;
        $order_id = 0;
        $paymentController = new PaymentController();
        $encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
        $rcvdString=$paymentController->decrypt($encResponse, Config('hdfcpgnew.workingKey'));		//Crypto Decryption used as per the specified working key.
        $decryptValues=explode('&', $rcvdString);
        $dataSize=sizeof($decryptValues);

        for($i = 0; $i < $dataSize; $i++) {
            $information=explode('=',$decryptValues[$i]);
            if($i==0)	$order_id=$information[1];
            if($i==10)	$amount=$information[1];
        }

        $txnid_temp = explode("_",$order_id);
        $transactionId = $txnid_temp[1];


        $franDetail = OnlinePayment::query()->where('order_no', $transactionId)->first();

        //Stopping resubmitting of the payment confirmaiotn
        if($franDetail->payment_status == 1)
            return view('includes/franchisor-thank-page');

        $franData   = FranchisorBusinessDetail::query()->where('franchisor_id', $franDetail->profile_id)->first();
        $userId     = UserAccount::query()->where('profile_str', $franDetail->profile_id)->first();

        $payStatus  = OnlinePayment::query()->where('order_no', $transactionId)->first();

        if($amount != $payStatus->amount)
            return view('thanks.paymentfailed');

        if(empty($payStatus) || $payStatus->payment_status == 1)
            return redirect('/');

        //updating online payments table payment status
        OnlinePayment::query()->where('order_no', $transactionId)->update(['payment_status'=>1]);

        //updating Franchisor business details table
        FranchisorBusinessDetail::query()->where('franchisor_id', $franDetail->profile_id)
                                ->update([
                                            'membership_type'  => 1,
                                            'membership_plan'  => $franDetail->membership_plan
                                        ]);

        //Updating plan details in user accounts table
        UserAccount::query()->where('profile_str',$franDetail->profile_id)->update(['membership_type' => 1, 'membership_plan'  => $franDetail->membership_plan]);
        $days       = Config('constants.membershipPlanFranchisorDays.'.$franDetail->membership_plan);

        //Insert membership details into profile memberhsips table
        ProfileMembership::query()->insert([
                                             'user_id'          => $userId->user_id,
                                             'profile_type'     => 1,
                                             'profile_id'       => $franDetail->profile_id,
                                             'order_no'         => $transactionId,
                                             'membership_type'  => 1,
                                             'payment_source'   => Config('constants.paymentSource.PayU'),
                                             'payment_comments' => Config('constants.membershipPlanFranchisorDetail.'.$franDetail->membership_plan),
                                             'activation_date'  => $franData->activation_date.' 00:00:00',
                                             'expiry_date'      => date('Y-m-d H:i:s', strtotime("+$days days", strtotime($franData->activation_date))),
                                             'is_active'        => 1
                                        ]);

        //Sending payment confirmation mail to Akash
        $data[0]    = $franDetail->amount;
        $data[1]    = $franData;
        $data[3]    = $userId;
        $data[4]    = Config('constants.membershipPlanFranchisorDetail.'.$franDetail->membership_plan);
        Mail::to('service@franchiseindia.net')->send(new FranchisorPayment($data));

        if (Auth::user())
            return redirect('franchisor/myaccount/dashboard');

        //Sending email confirmation mail to franchisor
        $data = [
           'companyName' => $franData->company_name,
           'code'        => $userId->email_verification_code,
        ];
        Mail::getFacadeRoot()->to($userId->email)->send(new confirmed($data));

        //returning to the thanks page view
        return view('includes/franchisor-thank-page');
    }

    /**
     * @param $str
     * @return mixed
     */
    public function hdfcstr($str)
    {
        $output = preg_replace("/[^A-Za-z0-9]/", "", $str);
        return $output;
    }

    /**
     * Franchisor payment failed handling method
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentFailure(Request $request)
    {
        $paymentController = new PaymentController();
        $order_id = 0;
        $encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
        $rcvdString=$paymentController->decrypt($encResponse, Config('hdfcpgnew.workingKey'));		//Crypto Decryption used as per the specified working key.
        $decryptValues=explode('&', $rcvdString);
        $dataSize=sizeof($decryptValues);

        for($i = 0; $i < $dataSize; $i++) {
            $information=explode('=',$decryptValues[$i]);
            if($i==0)	$order_id=$information[1];
        }

        $txnid_temp = explode("_",$order_id);
        $txnid = $txnid_temp[1];
        $payData  = OnlinePayment::query()->where('order_no', $txnid)->first();

        $frandata        = UserAccount::query()->where('email',$payData->email)->select('email_verification_code','profile_str')->first();
        $francomp        = FranchisorBusinessDetail::query()->where('franchisor_id',$payData->profile_id)->select('company_name')->first();

        $data = [
           'companyName' => $francomp->company_name,
           'code'        => $frandata->email_verification_code,
        ];
        Mail::getFacadeRoot()->to($payData->email)->send(new confirmed($data));
        return view('thanks.paymentfailed');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentCancelled(Request $request){
        $paymentController = new PaymentController();
        $order_id = 0;
        $encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
        $rcvdString=$paymentController->decrypt($encResponse, Config('hdfcpgnew.workingKey'));		//Crypto Decryption used as per the specified working key.
        $decryptValues=explode('&', $rcvdString);
        $dataSize=sizeof($decryptValues);

        for($i = 0; $i < $dataSize; $i++) {
            $information=explode('=',$decryptValues[$i]);
            if($i==0)	$order_id=$information[1];
        }

        $txnid_temp = explode("_",$order_id);
        $txnid = $txnid_temp[1];
        $payData  = OnlinePayment::query()->where('order_no', $txnid)->first();

        $frandata        = UserAccount::query()->where('email',$payData->email)->select('email_verification_code','profile_str')->first();
        $francomp        = FranchisorBusinessDetail::query()->where('franchisor_id',$payData->profile_id)->select('company_name')->first();

        $data = [
            'companyName' => $francomp->company_name,
            'code'        => $frandata->email_verification_code,
        ];
        Mail::getFacadeRoot()->to($payData->email)->send(new confirmed($data));
        return view('thanks.paymentfailed');
    }
}
