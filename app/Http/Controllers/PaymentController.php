<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OnlinePayment;
use App\Models\UserAccount;
use App\Models\GeneralPayment;
use App\Models\InvestorDetails;
use App\Models\MagazineSubscribe;
use App\Models\PgInvestorPayment;
use App\Models\ProfileMembership;
use App\Mail\BookPaymentMail;
use App\Mail\GeneralPaymentMail;
use App\Mail\InvestorPaymentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\InvestorCampaignPaymentMail;
use App\Mail\RawMail;
class PaymentController extends Controller
{
    public function payment()
    {
        return view('site/payment');
    }

    /**
     * Failed Payment
     */
    public function getHdfcPgResponseFailed()
    {
        $message = config('messages.1002');
        return view('thanks.thanks')->with(compact('message'));
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function upgradeInvestorMembership(Request $request)
    {

        $investorId = request()->user()->profile_str;
        $invName    = request()->user()->name;
        $invMobile  = request()->user()->mobile;
        $invEmail   = request()->user()->email;
        $mopt  = $request->mop;
        $amount     = config('constants.invPlanAmount.' . $request->payment_plan);
        $amount     = $amount + (($amount*18)/100);

		if(!array_key_exists($mopt, config('constants.Charges'))){
			$mopt = "OPTNBK";
		}
        $mop  = config('constants.Charges.' . $mopt);
        $amount = round($amount + $amount *($mop)/100);
        // Fetch Investor Details from table
        $invData    = InvestorDetails::query()->select('inv_address', 'inv_country', 'inv_state', 'inv_city', 'inv_pincode')
            ->where('investor_id', $investorId)
            ->first();
        $invAddress = $invData->inv_address . ', ' .$invData->inv_state . ', '.$invData->inv_city . ', '.$invData->inv_pincode;

        // Insert into Investor Payment table(pg_investor_payments)
        $insInvPay                    = new PgInvestorPayment();
        $insInvPay->investor_id       = $investorId;
        $insInvPay->membership_action = 'Upgrade';
        $insInvPay->name              = $invName;
        $insInvPay->phone             = $invMobile;
        $insInvPay->address           = $invAddress;
        $insInvPay->email             = $invEmail;
        $insInvPay->country           = $invData->inv_country;
        $insInvPay->membership_type   = config('constants.invPlanDetails.' . $request->payment_plan);
        $insInvPay->amount            = $amount;
        $insInvPay->pmode            = $mopt;
        $insInvPay->client_ip         = $request->ip();
        $insInvPay->payment_status    = config('hdfcpg.paymentStatus.Initiated');
        $insInvPay->order_status      = config('hdfcpg.paymentStatus.Initiated');


        // Send Email to Investor Acquisition team for Paid Membership pitching
        /* Html Code for email */
        $data = "<table> <tr> <td>Name : </td><td>".$invName."</td></tr><tr> <td>Email : </td><td>".$invEmail."</td></tr><tr> <td>Mobile No. : </td><td>".$invMobile."</td></tr><tr> <td>Investor Id : </td><td>".$investorId."</td></tr><tr> <td>Address : </td><td>".$invAddress.", Country: ".$invData->inv_country."</td></tr><tr> <td>Time Of Payment : </td><td>".date('Y-m-d H:i:s')."</td></tr></table>";
        Mail::to('techsupport@franchiseindia.net')->send(new RawMail($data, array('subject' => 'Investor Payment Initiated', 'from' => 'no-reply@franchiseindia.com', 'attachment' => '')));
        // // End of Email to Investor Acquisition team

        if (!$insInvPay->save()){
            $message = config('messages.1002');
            return view('thanks.thanks')->with(compact('message'));
        }

        $lastInsertId = $insInvPay->investor_pay_id;

        OnlinePayment::query()
            ->insert([
                'order_no'        => $lastInsertId,
                'profile_type'    => 2,
                'profile_id'      => $investorId,
                'name'            => $invName,
                'email'           => $invEmail,
                'phone'           => $invMobile,
                'city'            => $invData->inv_city,
                'country'         => "india",
                'product_details' => config('constants.invPlanDetails.' . $request->payment_plan),
                'membership_plan' => $request->payment_plan,
                'amount'          => $amount,
                'mopt'          => $mopt,
                'gst_no'          => $request->gst_no,
                'payment_status'  => 0
            ]);

        $track_id = $lastInsertId;
        $order_id = "order_id=".urlencode("InvMembershipPayment_".$lastInsertId);
        $tid = "tid=".urlencode(rand().$track_id);
        $merchant_id = "merchant_id=".urlencode(Config('hdfcpgnew.merchantKey'));
        $amount = "amount=".urlencode($amount);
        $currency = "currency=".urlencode("INR");
        $redirect_url = "redirect_url=".urlencode(Config('constants.MainDomain')."/invsuccess");  //Return URL
        $cancel_url = "cancel_url=".urlencode(Config('constants.MainDomain')."/invcancelled");  //Return URL
        $language = "language=".urlencode("EN");
        $billing_name = "billing_name=".urlencode($invName);
        $billing_address = "billing_address=".urlencode($invAddress);
        $billing_city = "billing_city=".urlencode("");
        $billing_state = "billing_state=".urlencode("");
        $billing_zip = "billing_zip=".urlencode($invData->inv_pincode);
        $billing_country = "billing_country=".urlencode($invData->inv_country);
        $billing_tel = "billing_tel=".urlencode($invMobile);
        $billing_email = "billing_email=".urlencode($invEmail);
        $payment_option = "payment_option=".urlencode($mopt);
        $card_type = "card_type=".urlencode(str_replace("OPT","",$mopt));

        $merchant_data = $tid."&".$merchant_id."&".$order_id."&".$amount."&".$currency."&".$redirect_url."&".$cancel_url."&".$language."&".$billing_name."&".$billing_address."&".$billing_city."&".$billing_state."&".$billing_zip."&".$billing_country."&".$billing_tel."&".$billing_email."&".$payment_option."&".$card_type;
        $encrypted_data = $this->encrypt($merchant_data, Config('hdfcpgnew.workingKey')); // Method for encrypting the data.
        $access_code_new = Config('hdfcpgnew.accessCode');

        return view('payment.payment-request')->with(compact('encrypted_data', 'access_code_new'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function investorPaymentSuccess()
    {
        $amount = 0;
        $order_id = 0;
        $encResponse=$_POST["encResp"];         //This is the response sent by the CCAvenue Server
        $rcvdString=$this->decrypt($encResponse, Config('hdfcpgnew.workingKey'));       //Crypto Decryption used as per the specified working key.
        $order_status="";
        $decryptValues=explode('&', $rcvdString);
        $dataSize=sizeof($decryptValues);

        for($i = 0; $i < $dataSize; $i++)
        {
            $information=explode('=',$decryptValues[$i]);
            if($i==3)   $order_status=$information[1];
            if($i==0)   $order_id=$information[1];
			if($i==2)	$bank_ref_no=$information[1];
			if($i==1)	$tracking_id=$information[1];
            if($i==10)  $amount=$information[1];
        }

        $txnid_temp = explode("_",$order_id);
        $txnid = $txnid_temp[1];

        $invPlatData = PgInvestorPayment::query()->where('investor_pay_id', $txnid)->first();
        $userId      = UserAccount::query()->where('profile_str',$invPlatData->investor_id)->first();
        $invDataAddr = InvestorDetails::query()->where('investor_id', $invPlatData->investor_id)->first();
        $paymentData = OnlinePayment::query()->where('order_no', $txnid)->orderBy('payment_id', 'desc')->first();

        if($paymentData->payment_status == 1)
            return redirect('investor/myaccount/dashboard');


        $days = Config('constants.invPlanMembershipDays.'.$paymentData->membership_plan);

        if($order_status==="Success") {
            $dbStatus = config('hdfcpgnew.paymentStatus.Success');
            if($amount != $invPlatData->amount)
                $dbStatus = config('hdfcpgnew.paymentStatus.Tampered');

        } else if($order_status==="Aborted") {
            $dbStatus = config('hdfcpgnew.paymentStatus.Cancelled');
        } else if($order_status==="Failure") {
            $dbStatus = config('hdfcpgnew.paymentStatus.Failed');
        } else {
            $dbStatus = config('hdfcpgnew.paymentStatus.Failed');
        }

        if ($dbStatus != config('hdfcpgnew.paymentStatus.Success')) {
            $message = config('messages.1002');
            return view('/thanks/thanks')->with(compact('message'));
        }

        if ($dbStatus == config('hdfcpgnew.paymentStatus.Success'))
            $payStatus = 'Success';
        else
            $payStatus = 'Problem';

        PgInvestorPayment::query()->where('investor_pay_id', $txnid)
            ->update([
                'payment_status'  => $dbStatus,
                'order_status'    => $dbStatus,
                'payment_notes'   => $payStatus,
				'saltkey'   => $tracking_id,
				'bank_ref_no'   => $bank_ref_no,
                'expiry_date'     => date('Y-m-d h:i:s', strtotime("+".$days." days"))
            ]);

        if ($dbStatus != config('hdfcpgnew.paymentStatus.Success')) {
            $message = config('messages.1002');
            return view('/thanks/thanks')->with(compact('message'));
        }

        $credits      = Config('constants.invPlanCreditLimit.'.$paymentData->membership_plan) + $invDataAddr->credit_limit;
        $totalCredits = ($invDataAddr->total_credits + Config('constants.invPlanCreditLimit.'.$paymentData->membership_plan));

        // Insert & Update respective models for payment success
        InvestorDetails::query()->where('investor_id',$invPlatData->investor_id)
            ->update([
                'membership_type' => 1,
                'membership_plan' => $paymentData->membership_plan,
                'credit_limit'    => $credits,
                'total_credits'   => $totalCredits
            ]);

        UserAccount::query()->where('profile_str',$invPlatData->investor_id)
            ->update([
                'membership_type' => 1,
                'profile_status'  => 1,
                'membership_plan' => $paymentData->membership_plan
            ]);

        ProfileMembership::query()->insert([
            'user_id'          => $userId->user_id,
            'profile_type'     => 2,
            'profile_id'       => $invPlatData->investor_id,
            'order_no'         => $txnid,
            'membership_type'  => 1,
            'payment_source'   => Config('constants.paymentSource.PayU'),
            'payment_comments' => config('constants.invPlanDetails.' . $invDataAddr->membership_plan),
            'activation_date'  => date("Y-m-d h:i:s"),
            'expiry_date'      => date('Y-m-d h:i:s', strtotime("+".$days." days")),
            'is_active'        => 1
        ]);

        // Fetch Investor Details
        $payMailArr = array(
            'orderId'   => $txnid,
            'name'      => $userId->name,
            'email'     => $userId->email,
            'mobile'    => $userId->mobile,
            'address'   => $invDataAddr->inv_address.','.$invDataAddr->inv_city.','.$invDataAddr->inv_state.', India',
            'amount'    => $invPlatData->amount,
            'details'   => 'Investor Platinum Membership Upgradation',
            'payStatus' => $dbStatus,
            'payDate'   => $invPlatData->pay_date,
            'gstNo'     => $paymentData->gst_no
        );

        PgInvestorPayment::query()->where('investor_id', $invPlatData->investor_id)->where('investor_pay_id', '!=',$txnid)->where('payment_status', 1)->where('order_status', 1)->update(['order_status' => 3]);

        $amount = round($amount);
        //magazine Insert for more than 500 Rs. plan
        if ($paymentData->membership_plan > 403) {

            if ($paymentData->membership_plan == 404)
                $code = 'ENT-HYS-PC-CR';

            if ($paymentData->membership_plan == 405)
                $code = 'ENT-YS-PC-CR';

            $campaign = $amount . " rs. " . Config('constants.invPlanDetails.' . $paymentData->membership_plan);

            MagazineSubscribe::query()->insert([
                'investor_id'    => $invPlatData->investor_id,
                'orderid'        => $txnid,
                'name'           => $userId->name,
                'email'          => $userId->email,
                'address'        => $invDataAddr->inv_address,
                'country'        => $invDataAddr->inv_country,
                'state'          => $invDataAddr->inv_state,
                'city'           => $invDataAddr->inv_city,
                'pincode'        => $invDataAddr->inv_pincode,
                'telephone'      => $userId->mobile,
                'magazine'       => $code,
                'payment_mode'   => 'Credit / Debit Card',
                'campaign'       => $campaign,
                'payment_status' => 'Y',
                'amount'         => $amount,
                'order_type'     => 'Magazine'
            ]);
        }

        OnlinePayment::query()->where('order_no', $txnid)->update(['payment_status'  => 1]);

        $mailClass = new InvestorPaymentMail($payMailArr);

        if($invPlatData->is_campaign == 1)
            $mailClass = new InvestorCampaignPaymentMail($payMailArr);

        Mail::getFacadeRoot()->to('techsupport@franchiseindia.net')->send($mailClass);

        if(Auth::guard()->attempt(['email'    => $userId->email,
                'password' => "KHBIUB*^211*YIjbkijbclkd%wf"]
        ))
        {
            $message = sprintf(config('messages.1001'), $txnid);
            session()->flash('userloggedin', 1);
            return redirect('investor/myaccount/dashboard'); //, compact('message'));
        }
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bookPayment(Request $request){
		$pmode = $request->payment_mode;
		if(!array_key_exists($pmode, config('constants.Charges'))){
			$pmode = "OPTNBK";
		}
        $mop  = config('constants.Charges.' . $pmode);
        $amount = ($pmode!= 'CHEQUE') ? round($request->amount + $request->amount *($mop)/100) : $request->amount;

        $name        = $request->name;
        $address     = $request->address;
        $email       = $request->email;
        $mobile      = $request->mobile;
        $pincode     = $request->pincode;
        $city        = $request->city;
        $state       = $request->state;
        $magazineBook= $request->bookid;
        $paymentMode = $pmode;
        $country     = is_string($request->input('country')) ? $request->input('country') : config('location.countryName.'.$request->input('country'));
        $userIp      = $request->ip();

        $magazine                 = new MagazineSubscribe();
        $magazine->name           = $name;
        $magazine->email          = $email;
        $magazine->amount         = $amount;
        $magazine->country        = $country;
        $magazine->pincode        = $pincode;
        $magazine->telephone      = $mobile;
        $magazine->address        = $address;
        $magazine->city           = $city;
        $magazine->state          = $state;
        $magazine->magazine       = $magazineBook;
        $magazine->payment_mode   = $paymentMode;
        $magazine->cid            = $userIp;
        $magazine->payment_status = "P";

        if (!$magazine->save()) {
            $message = config('messages.1002');
            return view('thanks.thanks')->with(compact('message'));
        }

        $lastInsertId = $magazine->sub_id;

        if($pmode == "CHEQUE"){
            $payMailData = MagazineSubscribe::query()->where('sub_id', $lastInsertId)->first();
            $payMailArr  = array(
                'orderId'   => $payMailData->sub_id,
                'name'      => $payMailData->name,
                'email'     => $payMailData->email,
                'mobile'    => $payMailData->telephone,
                'address'   => $payMailData->address.', '.$payMailData->city.', '.$payMailData->state.', '.$payMailData->pincode.', '.$payMailData->country,
                'amount'    => $payMailData->amount,
                'details'   => "Book Payment:-".$payMailData->magazine,
                'payStatus' => "Pending(Payment Mode:- CHEQUE)",
                'payDate'   => "pending"
            );
            Mail::getFacadeRoot()->to('frontdesk@franchiseindia.net')->cc('techsupport@franchiseindia.net')->send(new BookPaymentMail($payMailArr));

            return view('thanks/bookpaymentcheque',compact("lastInsertId"));
        }

        $track_id = $lastInsertId;
        $order_id = "order_id=".urlencode("BookReportPayment_".$lastInsertId);
        $tid = "tid=".urlencode(rand().$track_id);
        $merchant_id = "merchant_id=".urlencode(Config('hdfcpgnew.merchantKey'));
        $amount = "amount=".urlencode($amount);
        $currency = "currency=".urlencode("INR");
        $redirect_url = "redirect_url=".urlencode(Config('constants.MainDomain')."/payment/booksuccess");  //Return URL
        $cancel_url = "cancel_url=".urlencode(config('hdfcpgnew.furl'));  //Return URL
        $language = "language=".urlencode("EN");
        $billing_name = "billing_name=".urlencode($name);
        $billing_address = "billing_address=".urlencode($address);
        $billing_city= "billing_city=".urlencode("");
        $billing_state= "billing_state=".urlencode("");
        $billing_zip= "billing_zip=".urlencode($pincode);
        $billing_country= "billing_country=".urlencode($country);
        $billing_tel= "billing_tel=".urlencode($mobile);
        $billing_email= "billing_email=".urlencode($email);
        $payment_option = "payment_option=".urlencode($paymentMode);
        $card_type = "card_type=".urlencode(str_replace("OPT","",$paymentMode));
        $merchant_data = $tid."&".$merchant_id."&".$order_id."&".$amount."&".$currency."&".$redirect_url."&".$cancel_url."&".$language."&".$billing_name."&".$billing_address."&".$billing_city."&".$billing_state."&".$billing_zip."&".$billing_country."&".$billing_tel."&".$billing_email."&".$payment_option."&".$card_type;
        $encrypted_data=$this->encrypt($merchant_data, Config('hdfcpgnew.workingKey')); // Method for encrypting the data.
        $access_code_new = Config('hdfcpgnew.accessCode');

        return view('payment.payment-request')->with(compact('encrypted_data', 'access_code_new'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Request $request
     */
    public function bookPaymentSuccess(){
        $order_id = 0;
        $encResponse=$_POST["encResp"];         //This is the response sent by the CCAvenue Server
        $rcvdString=$this->decrypt($encResponse, Config('hdfcpgnew.workingKey'));       //Crypto Decryption used as per the specified working key.
        $decryptValues=explode('&', $rcvdString);
        $dataSize=sizeof($decryptValues);

        for($i = 0; $i < $dataSize; $i++) {
            $information=explode('=',$decryptValues[$i]);
            if($i==0)   $order_id=$information[1];
        }

        $txnid_temp = explode("_",$order_id);
        $txnid = $txnid_temp[1];

        MagazineSubscribe::query()->where('sub_id', $txnid)->update(['payment_status'=>'Y']);
        $payMailData = MagazineSubscribe::query()->where('sub_id', $txnid)->first();
        $payMailArr  = array(
            'orderId'   => $payMailData->sub_id,
            'name'      => $payMailData->name,
            'email'     => $payMailData->email,
            'mobile'    => $payMailData->telephone,
            'address'   => $payMailData->address.', '.$payMailData->city.', '.$payMailData->state.', '.$payMailData->pincode.', '.$payMailData->country,
            'amount'    => $payMailData->amount,
            'details'   => "Book Payment:-".$payMailData->magazine,
            'payStatus' => "Success",
            'payDate'   => $payMailData->updated_at
        );
        Mail::getFacadeRoot()->to('frontdesk@franchiseindia.net')->cc('techsupport@franchiseindia.net')->send(new BookPaymentMail($payMailArr));
        $refId    = $txnid;

        return view('thanks/bookpayment',compact("refId"));
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function paymentHdfcPayuPg(Request $request)
    {
        $name     = $request->name;
        $amt   = $request->camount;
        $address  = $request->address;
        $email    = $request->email;
        $mobile   = $request->mobile;
        $pincode  = $request->pincode;
        $details  = $request->details;
        $mopt  = $request->mop;
		$currency = $request->currency;

		$currencytype = array("USD", "AED", "AUD", "CAD", "EUR", "INR");
		if(!in_array($currency, $currencytype)){
			$currency = "INR";
		}

        $country  = config('location.countryName.' . $request->input('country'));
		if(!array_key_exists($mopt, config('constants.Charges'))){
			$mopt = "OPTNBK";
		}
        $mop  = config('constants.Charges.' . $mopt);
        $amount = round($amt + $amt *($mop)/100);
        $userIp   = $request->ip();

        $hdfcpg                 = new GeneralPayment();
        $hdfcpg->cname          = $name;
        $hdfcpg->pgateway       = 'HDFC';
        $hdfcpg->caddress       = $address;
        $hdfcpg->ccountry       = $country;
        $hdfcpg->pincode        = $pincode;
        $hdfcpg->cphone         = $mobile;
        $hdfcpg->cemail         = $email;
        $hdfcpg->cdetail        = $details;
        $hdfcpg->payment_mode   = $mopt;
        $hdfcpg->currency   = $currency;
        $hdfcpg->camount        = $amount;
        $hdfcpg->client_ip      = $userIp;
        $hdfcpg->payment_status = config('hdfcpgnew.paymentStatus.Initiated');

        if (!$hdfcpg->save()) {
            $message = config('messages.1002');
            return view('thanks.thanks')->with(compact('message'));
        }

        $lastInsertId = $hdfcpg->pay_id;
        $track_id = $lastInsertId;
        $order_id = "order_id=".urlencode("openPayment_".$lastInsertId);
        $tid = "tid=".urlencode(rand().$track_id);
        $merchant_id = "merchant_id=".urlencode(Config('hdfcpgnew.merchantKey'));
        $amount = "amount=".urlencode($amount);
        $currency = "currency=".urlencode($currency);
        $redirect_url = "redirect_url=".urlencode(config('hdfcpgnew.surl'));  //Return URL
        $cancel_url = "cancel_url=".urlencode(config('hdfcpgnew.curl'));  //Return URL
        $language = "language=".urlencode("EN");
        $billing_name = "billing_name=".urlencode($name);
        $billing_address = "billing_address=".urlencode($address);
        $billing_city= "billing_city=".urlencode("");
        $billing_state= "billing_state=".urlencode("");
        $billing_zip= "billing_zip=".urlencode($pincode);
        $billing_country= "billing_country=".urlencode($country);
        $billing_tel= "billing_tel=".urlencode($mobile);
        $billing_email= "billing_email=".urlencode($email);
        $payment_option = "payment_option=".urlencode($mopt);
        $card_type = "card_type=".urlencode(str_replace("OPT","",$mopt));

        $merchant_data = $tid."&".$merchant_id."&".$order_id."&".$amount."&".$currency."&".$redirect_url."&".$cancel_url."&".$language."&".$billing_name."&".$billing_address."&".$billing_city."&".$billing_state."&".$billing_zip."&".$billing_country."&".$billing_tel."&".$billing_email."&".$payment_option."&".$card_type;
        $encrypted_data=$this->encrypt($merchant_data, Config('hdfcpgnew.workingKey')); // Method for encrypting the data.
        $access_code_new = Config('hdfcpgnew.accessCode');

        return view('payment.payment-request')->with(compact('encrypted_data', 'access_code_new'));
    }

    /**
     * Payment success method
     */
    public function paymentSuccess()
    {
        $amount = 0;
        $order_id = 0;
        $encResponse=$_POST["encResp"];         //This is the response sent by the CCAvenue Server
        $rcvdString=$this->decrypt($encResponse, Config('hdfcpgnew.workingKey'));       //Crypto Decryption used as per the specified working key.
        $order_status="";
        $decryptValues=explode('&', $rcvdString);
        $dataSize=sizeof($decryptValues);

        for($i = 0; $i < $dataSize; $i++)
        {
            $information=explode('=',$decryptValues[$i]);
            if($i==3)   $order_status=$information[1];
            if($i==0)   $order_id=$information[1];
            if($i==10)  $amount=$information[1];
        }

        $txnid_temp = explode("_",$order_id);
        $txnid = $txnid_temp[1];
        $beforeUpdatePayStatus = GeneralPayment::query()->where('pay_id', $txnid)->first();

        if(empty($beforeUpdatePayStatus)) {
            $message = config('messages.1002');
            return view('thanks.thanks')->with(compact('message'));
        }
        if($order_status==="Success") {
            $dbStatus = config('hdfcpgnew.paymentStatus.Success');
            if($amount != $beforeUpdatePayStatus->camount)
                $dbStatus = config('hdfcpgnew.paymentStatus.Tampered');

        } else if($order_status==="Aborted") {
            $dbStatus = config('hdfcpgnew.paymentStatus.Cancelled');
        } else if($order_status==="Failure") {
            $dbStatus = config('hdfcpgnew.paymentStatus.Failed');
        } else {
            $dbStatus = config('hdfcpgnew.paymentStatus.Failed');
        }

        GeneralPayment::query()->where('pay_id', $txnid)->update(['payment_status' => $dbStatus, 'pgresponse' => $order_status]);

        if ($dbStatus != config('hdfcpgnew.paymentStatus.Success')) {
            $message = config('messages.1002');
            return view('/thanks/thanks')->with(compact('message'));
        }

        if ($dbStatus == config('hdfcpgnew.paymentStatus.Success'))
            $payStatus = 'Success';
        else
            $payStatus = 'Problem';

        $payMailArr = array(
            'orderId'   => $beforeUpdatePayStatus->pay_id,
            'name'      => $beforeUpdatePayStatus->cname,
            'email'     => $beforeUpdatePayStatus->cemail,
            'mobile'    => $beforeUpdatePayStatus->cphone,
            'address'   => $beforeUpdatePayStatus->caddress .' - '. $beforeUpdatePayStatus->pincode,
            'amount'    => $beforeUpdatePayStatus->camount,
            'details'   => $beforeUpdatePayStatus->cdetail,
            'payStatus' => $payStatus,
            'payDate'   => $beforeUpdatePayStatus->updated_at
        );

        if(!($beforeUpdatePayStatus->payment_status == $dbStatus && $beforeUpdatePayStatus->pgresponse == $order_status))
            Mail::getFacadeRoot()->to('techsupport@franchiseindia.net')->send(new GeneralPaymentMail($payMailArr));

        $message = sprintf(config('messages.1001'), $txnid);

        return view('/thanks/thanks')->with(compact('message'));
    }

    /**
     * @param $plainText
     * @param $key
     * @return string
     */
    public function encrypt($plainText, $key)
    {
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encryptedText = bin2hex($openMode);
        return $encryptedText;
    }

    /**
     * @param $encryptedText
     * @param $key
     * @return string
     */
    public function decrypt($encryptedText, $key)
    {
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = $this->hextobin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        return $decryptedText;
    }

    /**
     * *********** Padding Function *********************
     * @param $plainText
     * @param $blockSize
     * @return string
     */
    public function pkcs5_pad ($plainText, $blockSize)
    {
        $pad = $blockSize - (strlen($plainText) % $blockSize);
        return $plainText . str_repeat(chr($pad), $pad);
    }

    /**
     * ********** Hexadecimal to Binary function for php 4.0 version ********
     * @param $hexString
     * @return string
     */
    public function hextobin($hexString)
    {
        $length = strlen($hexString);
        $binString="";
        $count=0;
        while($count<$length)
        {
            $subString =substr($hexString,$count,2);
            $packedString = pack("H*",$subString);
            if ($count==0)
            {
                $binString=$packedString;
            }

            else
            {
                $binString.=$packedString;
            }

            $count+=2;
        }
        return $binString;
    }

}
