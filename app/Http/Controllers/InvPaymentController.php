<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use App\Models\OnlinePayment;
use App\Models\InvestorDetails;
use App\Models\PgInvestorPayment;
use App\Mail\InvestorPaymentMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PaymentController;
class InvPaymentController extends Controller
{
    public function paymentFailure()
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

        $invId       = PgInvestorPayment::query()->select('investor_id', 'amount', 'pay_date')
                                        ->where('investor_pay_id', $txnid)
                                        ->first();
        

        if(empty($invId))
            return view('thanks.paymentfailed');

        $userData    = UserAccount::query()->select('name', 'email', 'mobile', 'membership_plan', 'membership_type')
                                  ->where('profile_str', $invId->investor_id)
                                  ->first();
        
        if(empty($userData))
            return view('thanks.paymentfailed');
        
        $address     = InvestorDetails::query()->select('inv_city', 'inv_state', 'inv_address', 'inv_pincode')
                                      ->where('investor_id', $invId->investor_id)
                                      ->first();
        
        if(empty($address))
            return view('thanks.paymentfailed');

        if ( $userData->membership_type != 1 ) {
            InvestorDetails::query()->where('investor_id', $invId->investor_id)->update(['membership_plan' => 401, 'credit_limit' => 0]);
            UserAccount::query()->where('profile_str', $invId->investor_id)->update(['membership_plan' => 401]);
        }

        $paymentData = OnlinePayment::query()->where('order_no', $txnid)->orderBy('payment_id', 'desc')->first();

        $payMailArr  = array(
            'orderId'   => $txnid,
            'name'      => $userData->name,
            'email'     => $userData->email,
            'mobile'    => $userData->mobile,
            'address'   => $address->inv_address.','.$address->inv_city.','.$address->inv_state.','.$address->inv_pincode.', India',
            'amount'    => $invId->amount,
            'details'   => 'Investor Membership Upgradation',
            'payStatus' => 0,
            'payDate'   => $invId->pay_date,
            'gstNo'     => $paymentData->gst_no
        );

        Mail::getFacadeRoot()->to('techsupport@franchiseindia.net')->send(new InvestorPaymentMail($payMailArr));
        return view('thanks.paymentfailed');
    }
}
