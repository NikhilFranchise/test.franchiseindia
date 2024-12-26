<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobileVerification;
use App\Models\ExpressInstaApply;
use App\Models\FiNewsLetter;
use App\Models\FranchisorBusinessDetail;
use App\Models\FranchisorLocState;
use App\Models\InvestorDetails;
use App\Mail\ExpressInstaVisitorMail;
use App\Mail\FreeFranchisor;
use App\Mail\FreeInvestor;
use App\Mail\NewsLetterSubscribe;
use App\Mail\PaidFranchisor;
use App\Mail\PaidInvestor;
use App\Models\PropertyLoan;
use App\Models\UserAccount;
use App\Models\UserActivity;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;

class ExpressInstaController extends Controller
{
    public function invNormalLead(Request $request)
    {
        $check = UserActivity::query()->select('visibility')
            ->where('franchisor_id', $request->input('franId'))
            ->where('investor_id', $request->user()->profile_str)
            ->first();

        $invData = InvestorDetails::query()->where('investor_id', $request->user()->profile_str)->first();
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $request->input('franId'))->first();

        $insert = (empty($check) ? 1 : 0);
        $update = (empty($check) ? 0 : 1);

        //update details of existing record
        if ($update == 1 && $check->visibility != 1)
            UserActivity::query()->where('investor_id', $request->user()->profile_str)->where('franchisor_id', $request->input('franId'))->update(['visibility' => 0]);

        //insert a new record if not in the database
        if ($insert == 1) {
            UserActivity::query()->insert([
                'investor_id' => $request->user()->profile_str,
                'franchisor_id' => $request->input('franId'),
                'email' => $request->user()->email,
                'expressInt' => 'Y',
                'visibility' => 0,
                'visit_date' => date('Y-m-d'),
                'franchisor_visibility' => ($franData->membership_type == 1 ? 1 : 0),
                'franchisor_visibility_date' => ($franData->membership_type == 1 ? date('Y-m-d H:i:s') : null)
            ]);
        }


        //check and allot the value of invcity and invstate for the mail
        $invCity = (empty($invData->inv_city) ? "Unknown" : $invData->inv_city);
        $invState = (empty($invData->inv_state) ? "Unknown" : $invData->inv_state);

        $details[0] = [
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'mobile' => $request->user()->mobile,
            'state' => $invState,
            'city' => $invCity
        ];

        $details[1] = $franData->ceo_name;

        $dataInvFree = [$franData->company_name, $request->user()->name];

        if ($insert == 1) {
            //Lead Notification to Free Franchisor

            $franSmsMsg = sprintf(config('txtlocal.FranFree'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 30) . ".." : $request->user()->name);
            $this->sendFranNotifications($franData->userDetail->email, $details[1], $franData->userDetail->mobile, $franSmsMsg, 'free');

            //Lead Notification to Free Investor
            $invSmsMsg = sprintf(config('txtlocal.InvFree'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 30) . ".." : $request->user()->name, strlen($franData->company_name) > 40 ? substr($franData->company_name, 0, 40) . ".." : $franData->company_name);
            $this->sendInvNotifications($request->user()->email, $dataInvFree, $request->user()->mobile, $invSmsMsg, 'free');
        }
    }

    /**
     * @param Request $request
     * Function to express interest by free investor
     * @return \Illuminate\Http\JsonResponse|string
     */


    // public function invLead(Request $request)
    // {
    //     if (!Auth::check())
    //         return "";

    //     $visibility = 0;
    //     $action = 0;
    //     $lastApply = 0;

    //     $check = UserActivity::query()->select('visibility')
    //         ->where('franchisor_id', $request->input('franId'))
    //         ->where('investor_id', $request->user()->profile_str)
    //         ->first();
    //     $invData = InvestorDetails::query()->where('investor_id', $request->user()->profile_str)->first();
    //     $franData = FranchisorBusinessDetail::query()->select('franchisor_business_details.*', 'user_accounts.name', 'user_accounts.email', 'user_accounts.mobile')
    //         ->where('franchisor_id', $request->input('franId'))
    //         ->leftJoin('user_accounts', 'franchisor_business_details.franchisor_id', '=', 'user_accounts.profile_str')
    //         ->first();
    //     // dd($invData,$franData);
    //     if (!empty($check) && $check->visibility == 1)
    //         return json_encode(array('success' => true, 'user' => $franData));

    //     $insert = (empty($check) ? 1 : 0);
    //     $update = (empty($check) ? 0 : 1);

    //     //express interest with condition of free investor and free franchisor
    //     if ($franData->membership_type != 1 && $request->user()->membership_type != 1)
    //         $action = 1;

    //     //express interest with condition of paid investor and free franchisor
    //     if ($request->user()->membership_type == 1 && $request->user()->membership_plan != 405 || $request->user()->reg_source == "DelhiExpoPaid") {

    //         //check for the confirmation of cutting the credit
    //         if (isset($request->flag) && ($request->flag == 'confirm' || $request->flag == 'expint'))
    //             return $invData->credit_limit;

    //         //decrement the credits for a paid investor who is not having unlimited plan
    //         InvestorDetails::query()->where('investor_id', $request->user()->profile_str)
    //             ->decrement('credit_limit');

    //         //fetch the new credit limit
    //         $reCreditLimit = InvestorDetails::query()->select('credit_limit')
    //             ->where('investor_id', $request->user()->profile_str)
    //             ->first()->credit_limit;

    //         //expire the investor membership if his/her credit has been end
    //         if ($reCreditLimit < 1) {
    //             $lastApply = 1;

    //             //update the investor detail table
    //             InvestorDetails::query()->where('investor_id', $request->user()->profile_str)
    //                 ->update([
    //                     'membership_type' => 0,
    //                     'membership_plan' => 401
    //                 ]);
    //             //update the user account table
    //             UserAccount::query()->where('profile_str', $request->user()->profile_str)
    //                 ->update([
    //                     'membership_type' => 0,
    //                     'membership_plan' => 401
    //                 ]);
    //         }
    //     }

    //     if ($request->user()->membership_type == 1 && $request->user()->membership_plan != 401 || $request->user()->reg_source == 'DelhiExpoPaid')
    //         $visibility = 1;

    //     //update details of existing record
    //     if ($update == 1) {
    //         UserActivity::query()->where('investor_id', $request->user()->profile_str)
    //             ->where('franchisor_id', $request->input('franId'))
    //             ->update(['visibility' => $visibility]);
    //     }

    //     //insert a new record if not in the database
    //     if ($insert == 1) {
    //         UserActivity::query()->insert([
    //             'investor_id' => $request->user()->profile_str,
    //             'franchisor_id' => $request->input('franId'),
    //             'email' => $request->user()->email,
    //             'expressInt' => 'Y',
    //             'visibility' => $visibility,
    //             'visit_date' => date('Y-m-d'),
    //             'franchisor_visibility' => ($franData->membership_type == 1 ? 1 : 0),
    //             'franchisor_visibility_date' => ($franData->membership_type == 1 ? date('Y-m-d H:i:s') : "")
    //         ]);
    //     }


    //     //check and allot the value of invcity and invstate for the mail
    //     $invCity = (empty($invData->inv_city) ? "Unknown" : $invData->inv_city);
    //     $invState = (empty($invData->inv_state) ? "Unknown" : $invData->inv_state);

    //     $details[0] = [
    //         'name' => $request->user()->name,
    //         'email' => $request->user()->email,
    //         'mobile' => $request->user()->mobile,
    //         'state' => $invState,
    //         'city' => $invCity
    //     ];

    //     $details[1] = $franData->ceo_name;
    //     // dd($franData->userDetail->email);
    //     $detailsInv = [
    //         'companyName' => $franData->company_name,
    //         'managerName' => $franData->fran_manager,
    //         'email' => $franData->userDetail->email,
    //         'mobile' => $franData->userDetail->mobile,
    //         'state' => $franData->state,
    //         'city' => $franData->city
    //     ];

    //     $dataInvFree = [$franData->company_name, $request->user()->name];

    //     if ($insert == 1 || ($update == 1 && $visibility == 1)) {

    //         //Sending notifications to franchisor
    //         if ($franData->membership_type != 1) {
    //             //Lead Notification to Free Franchisor
    //             $franSmsMsg = sprintf(config('txtlocal.FranFree'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name);
    //             $this->sendFranNotifications($franData->userDetail->email, $details[1], $franData->userDetail->mobile, $franSmsMsg, 'free');
    //         } else {
    //             //Lead Notification to paid franchisor
    //             $franSmsMsg = sprintf(config('txtlocal.FranPaid'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name, strlen($request->user()->mobile) > 15 ? substr($request->user()->mobile, 0, 15) . ".." : $request->user()->mobile);
    //             $this->sendFranNotifications($franData->userDetail->email, $details, $franData->userDetail->mobile, $franSmsMsg, 'paid');
    //         }

    //         //Sending notifications to Investor
    //         if ($request->user()->membership_type != 1 && $lastApply != 1) {
    //             //Lead Notification to Free Investor
    //             $invSmsMsg = sprintf(config('txtlocal.InvFree'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name, strlen($franData->company_name) > 40 ? substr($franData->company_name, 0, 40) . ".." : $franData->company_name);
    //             $this->sendInvNotifications($request->user()->email, $dataInvFree, $request->user()->mobile, $invSmsMsg, 'free');
    //         } else {
    //             //Lead Notifications to a Paid Investor
    //             $invSmsMsg = sprintf(config('txtlocal.InvPaid'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name, strlen($franData->company_name) > 40 ? substr($franData->company_name, 0, 40) . ".." : $franData->company_name, strlen($franData->userDetail->mobile) > 15 ? substr($franData->userDetail->mobile, 0, 15) . ".." : $franData->userDetail->mobile);
    //             $this->sendInvNotifications($request->user()->email, $detailsInv, $request->user()->mobile, $invSmsMsg, 'paid');
    //         }
    //     }

    //     if (isset($request->flag) && $request->flag == 'expint' && $request->user()->membership_type != 1)
    //         return "showMsg";

    //     if ($action == 1 || $request->user()->membership_type != 1)
    //         return 'upgrade';

    //     $telephone = ($franData->telephone == '') ? 'NA' : $franData->telephone;
    //     $Website = ($franData->website == '') ? 'NA' : $franData->website;
    //     $myJson = '{"success":true,"user":{"company_name":"' . $franData->company_name . '","ceo_name":"' . $franData->ceo_name . '","telephone":"' . $telephone . '","fran_address":"' . $franData->fran_address . '","city":"' . $franData->city . '","state":"' . $franData->state . '","pincode":"' . $franData->pincode . '","email":"' . $franData->userDetail->email . '","website":"' . $Website . '"}}';
    //     return $myJson;
    // }

    public function invLead(Request $request)
    {
        if (!Auth::check())
            return "";

        $visibility = 0;
        $action = 0;
        $lastApply = 0;

        $check = UserActivity::query()->select('visibility')
            ->where('franchisor_id', $request->input('franId'))
            ->where('investor_id', $request->user()->profile_str)
            ->first();
        // dd($check);
        $invData  = InvestorDetails::query()->where('investor_id', $request->user()->profile_str)->first();
        $franData = FranchisorBusinessDetail::query()->select('franchisor_business_details.*', 'user_accounts.name', 'user_accounts.email', 'user_accounts.mobile')
            ->where('franchisor_id', $request->input('franId'))
            ->leftJoin('user_accounts', 'franchisor_business_details.franchisor_id', '=', 'user_accounts.profile_str')
            ->first();
        // dd($franData->membership_type);
        if (!empty($check) && $check->visibility == 1)
            return json_encode(array('success' => true, 'user' => $franData));

        $insert = (empty($check) ? 1 : 0);
        $update = (empty($check) ? 0 : 1);

        //express interest with condition of free investor and free franchisor
        if ($franData->membership_type != 1 && $request->user()->membership_type != 1)
            $action = 1;

        //express interest with condition of paid investor and free franchisor
        if ($request->user()->membership_type == 1 && $request->user()->membership_plan != 405 || $request->user()->reg_source == "DelhiExpoPaid") {

            //check for the confirmation of cutting the credit
            if (isset($request->flag) && ($request->flag == 'confirm' || $request->flag == 'expint'))
                return $invData->credit_limit;

            //decrement the credits for a paid investor who is not having unlimited plan
            InvestorDetails::query()->where('investor_id', $request->user()->profile_str)
                ->decrement('credit_limit');

            //fetch the new credit limit
            $reCreditLimit = InvestorDetails::query()->select('credit_limit')
                ->where('investor_id', $request->user()->profile_str)
                ->first()->credit_limit;

            //expire the investor membership if his/her credit has been end
            if ($reCreditLimit < 1) {
                $lastApply = 1;

                //update the investor detail table
                InvestorDetails::query()->where('investor_id', $request->user()->profile_str)
                    ->update([
                        'membership_type' => 0,
                        'membership_plan' => 401
                    ]);
                //update the user account table
                UserAccount::query()->where('profile_str', $request->user()->profile_str)
                    ->update([
                        'membership_type' => 0,
                        'membership_plan' => 401
                    ]);
            }
        }

        if ($request->user()->membership_type == 1 && $request->user()->membership_plan != 401 || $request->user()->reg_source == 'DelhiExpoPaid'){
            $visibility = 1;
        }
        //update details of existing record
        if ($update == 1) {
            UserActivity::query()->where('investor_id', $request->user()->profile_str)
                ->where('franchisor_id', $request->input('franId'))
                ->update(['visibility' => $visibility]);
        }

        //insert a new record if not in the database
        if ($insert == 1) {
            UserActivity::query()->insert([
                'investor_id' => $request->user()->profile_str,
                'franchisor_id' => $request->input('franId'),
                'email' => $request->user()->email,
                'expressInt' => 'Y',
                'visibility' => $visibility,
                'visit_date' => date('Y-m-d'),
                'franchisor_visibility' => ($franData->membership_type == 1 ? 1 : 0),
                'franchisor_visibility_date' => ($franData->membership_type == 1 ? date('Y-m-d H:i:s') : null)
            ]);
        }


        //check and allot the value of invcity and invstate for the mail
        $invCity = (empty($invData->inv_city) ? "Unknown" : $invData->inv_city);
        $invState = (empty($invData->inv_state) ? "Unknown" : $invData->inv_state);

        $details[0] = [
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'mobile' => $request->user()->mobile,
            'state' => $invState,
            'city' => $invCity
        ];

        $details[1] = $franData->ceo_name;

        $detailsInv = [
            'companyName' => $franData->company_name,
            'managerName' => $franData->fran_manager,
            'email' => $franData->userDetail->email,
            'mobile' => $franData->userDetail->mobile,
            'state' => $franData->state,
            'city' => $franData->city
        ];

        $dataInvFree = [$franData->company_name, $request->user()->name];

        if ($insert == 1 || ($update == 1 && $visibility == 1)) {

            //Sending notifications to franchisor
            if ($franData->membership_type != 1) {
                //Lead Notification to Free Franchisor
                $franSmsMsg = sprintf(config('txtlocal.FranFree'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name);
                $this->sendFranNotifications($franData->userDetail->email, $details[1], $franData->userDetail->mobile, $franSmsMsg, 'free');
            } else {
                //Lead Notification to paid franchisor
                $franSmsMsg = sprintf(config('txtlocal.FranPaid'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name, strlen($request->user()->mobile) > 15 ? substr($request->user()->mobile, 0, 15) . ".." : $request->user()->mobile);
                $this->sendFranNotifications($franData->userDetail->email, $details, $franData->userDetail->mobile, $franSmsMsg, 'paid');
            }

            //Sending notifications to Investor
            if ($request->user()->membership_type != 1 && $lastApply != 1) {
                //Lead Notification to Free Investor
                $invSmsMsg = sprintf(config('txtlocal.InvFree'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name, strlen($franData->company_name) > 40 ? substr($franData->company_name, 0, 40) . ".." : $franData->company_name);
                $this->sendInvNotifications($request->user()->email, $dataInvFree, $request->user()->mobile, $invSmsMsg, 'free');
            } else {
                //Lead Notifications to a Paid Investor
                $invSmsMsg = sprintf(config('txtlocal.InvPaid'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name, strlen($franData->company_name) > 40 ? substr($franData->company_name, 0, 40) . ".." : $franData->company_name, strlen($franData->userDetail->mobile) > 15 ? substr($franData->userDetail->mobile, 0, 15) . ".." : $franData->userDetail->mobile);
                $this->sendInvNotifications($request->user()->email, $detailsInv, $request->user()->mobile, $invSmsMsg, 'paid');
            }
        }

        if (isset($request->flag) && $request->flag == 'expint' && $request->user()->membership_type != 1)
            return "showMsg";

        if ($action == 1 || $request->user()->membership_type != 1)
            return 'upgrade';

        //        $customData = array(
        //            'company_name' => $franData->company_name,
        //            'ceo_name' => $franData->ceo_name,
        //            'telephone' => $franData->telephone,
        //            'fran_address' => $franData->fran_address,
        //            'city' => $franData->city,
        //            'state' => $franData->state,
        //            'pincode' => $franData->pincode,
        //            'email' => $franData->userDetail->email,
        //            'website' => $franData->website
        //        );
        $telephone = ($franData->telephone == '') ? 'NA' : $franData->telephone;
        $Website = ($franData->website == '') ? 'NA' : $franData->website;
        $myJson = '{"success":true,"user":{"company_name":"' . $franData->company_name . '","ceo_name":"' . $franData->ceo_name . '","telephone":"' . $telephone . '","fran_address":"' . $franData->fran_address . '","city":"' . $franData->city . '","state":"' . $franData->state . '","pincode":"' . $franData->pincode . '","email":"' . $franData->userDetail->email . '","website":"' . $Website . '"}}';
        return $myJson;
    }

    /**
     * @param Request $request
     * Function to express interest by Investor, multiple select on from listing page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function expressInterestMultiple(Request $request)
    {
        $result = "<span>Congratulations!</span> Your application was successful to ";

        foreach (explode(',', $request->input('franchisors')) as $franchisor) {

            $visibility = 0;
            $check = UserActivity::query()->select('visibility')
                ->where('franchisor_id', $franchisor)
                ->where('investor_id', $request->user()->profile_str)
                ->first();

            if ((!empty($check) && $check->visibility == 1) || $request->user()->membership_plan == 405)
                $visibility = 1;

            $invData = InvestorDetails::query()->where('investor_id', $request->user()->profile_str)->first();
            $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisor)->first();

            $result .= $franData->company_name . ", ";
            $insert = (empty($check) ? 1 : 0);
            $update = (empty($check) ? 0 : 1);


            //update details of existing record
            if ($update == 1) {
                UserActivity::query()->where('investor_id', $request->user()->profile_str)
                    ->where('franchisor_id', $franchisor)
                    ->update(['visibility' => $visibility]);
            }

            //insert a new record if not in the database
            if ($insert == 1) {
                UserActivity::query()->insert([
                    'investor_id' => $request->user()->profile_str,
                    'franchisor_id' => $franchisor,
                    'email' => $request->user()->email,
                    'expressInt' => 'Y',
                    'visibility' => $visibility,
                    'visit_date' => date('Y-m-d'),
                    'franchisor_visibility' => ($franData->membership_type == 1 ? 1 : 0),
                    'franchisor_visibility_date' => ($franData->membership_type == 1 ? date('Y-m-d H:i:s') : null)
                ]);
            }


            //check and allot the value of invcity and invstate for the mail
            $invCity = (empty($invData->inv_city) ? "Unknown" : $invData->inv_city);
            $invState = (empty($invData->inv_state) ? "Unknown" : $invData->inv_state);

            $details[0] = [
                'name' => $request->user()->name,
                'email' => $request->user()->email,
                'mobile' => $request->user()->mobile,
                'state' => $invState,
                'city' => $invCity
            ];

            $details[1] = $franData->ceo_name;

            $detailsInv = [
                'companyName' => $franData->company_name,
                'managerName' => $franData->fran_manager,
                'email' => $franData->userDetail->email,
                'mobile' => $franData->userDetail->mobile,
                'state' => $franData->state,
                'city' => $franData->city
            ];

            $dataInvFree = [$franData->company_name, $request->user()->name];


            if ($insert == 1 || $update == 1) {

                //Sending notifications to paid investor
                if ($franData->membership_type == 1) {
                    //Notifications to paid franchisor
                    $franSmsMsg = sprintf(config('txtlocal.FranPaid'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name, strlen($request->user()->mobile) > 15 ? substr($request->user()->mobile, 0, 15) . ".." : $request->user()->mobile);
                    $this->sendFranNotifications($franData->userDetail->email, $details, $franData->userDetail->mobile, $franSmsMsg, 'paid');
                } else {
                    //Notification to free franchisor
                    $franSmsMsg = sprintf(config('txtlocal.FranFree'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name);
                    $this->sendFranNotifications($franData->userDetail->email, $details[1], $franData->userDetail->mobile, $franSmsMsg, 'free');
                }

                if ($request->user()->membership_plan == 405 || $visibility == 1) {
                    //sms sending
                    $invSmsMsg = sprintf(config('txtlocal.InvPaid'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name, strlen($franData->company_name) > 40 ? substr($franData->company_name, 0, 40) . ".." : $franData->company_name, strlen($franData->userDetail->mobile) > 15 ? substr($franData->userDetail->mobile, 0, 15) . ".." : $franData->userDetail->mobile);
                    $this->sendInvNotifications($request->user()->email, $detailsInv, $request->user()->mobile, $invSmsMsg, 'paid');
                } else {
                    //Notification to free investor
                    $invSmsMsg = sprintf(config('txtlocal.InvFree'), strlen($request->user()->name) > 40 ? substr($request->user()->name, 0, 40) . ".." : $request->user()->name, strlen($franData->company_name) > 40 ? substr($franData->company_name, 0, 40) . ".." : $franData->company_name);
                    $this->sendInvNotifications($request->user()->email, $dataInvFree, $request->user()->mobile, $invSmsMsg, 'free');
                }
            }
        }

        $result = substr($result, 0, -1);
        $result .= ". Your request will be sent to the companies interested for franchising in your state. The business development representative will contact you soon through your contact number / email ID.";

        return view('thanks/brandcontact', compact('result'));
    }

    /**
     * @param Request $request
     * Function to express interest by random visitor, multiple select on from listing page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function freeInfo(Request $request)
    {

        $companyName = "";
        $successCount = 1;
        $failedCount = 1;
        $success = "<span>Congratulations!</span> Your application was successful to ";
        $failed = "<span>Sorry! </span> We are sorry to inform you that ";
        $name = $request->input('infoname');
        $email = $request->input('infoemail');
        $phone = $request->input('mobile');
        $state = $request->input('infostate');
        $city = $request->input('infocity');
        $add = $request->input('address');
        $pincode = $request->input('pincode');
        $investmentRange = $request->input('investment_range');

        $needLoan = 0;
        if (isset(request()->need_loan) && request()->need_loan == 'on')
            $needLoan = 1;

        if (isset(request()->newsletter_sub) && request()->newsletter_sub == 'on')
            $this->newsletterSubscribe($email);

        foreach (explode(',', $request->input('frandetailsid')) as $franId) {

            $checkState = FranchisorLocState::query()->select('state')->where('franchisor_id', $franId)
                ->where('state', Config('location.stateArr.' . $state))->count();
            if ($checkState > 0) {
                //check if user already exists
                $countOld = ExpressInstaApply::query()->where('franchisor_id', '=', $franId)->where('email', '=', $email)->count();

                //insert data to insta apply
                $franchisorDetail = FranchisorBusinessDetail::query()->where('franchisor_id', $franId)->first();
                $userDetail = UserAccount::query()->where('profile_str', $franId)->first();
                $source_ref = "";
                if (!empty(Cookie::get('campaignSource')))
                    $source_ref = Cookie::get('campaignSource');

                if ($countOld == 0) {
                    ExpressInstaApply::query()->insert([
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'mobile_status' => 'S',
                        'state' => Config('location.stateArr.' . $state),
                        'city' => $city,
                        'address' => $add,
                        'investment' => $investmentRange,
                        'category' => Config('constants.CategoryArr.' . $franchisorDetail->ind_main_cat),
                        'source' => 'DOTCOM',
                        'source_ref' => $source_ref,
                        'franchisor_id' => $franId,
                        'pincode' => $pincode,
                        'visibility' => ($franchisorDetail->membership_type == 1 ? 1 : 0),
                        'visibility_date' => ($franchisorDetail->membership_type == 1 ? date('Y-m-d H:i:s') : null)
                    ]);

                    if ($needLoan == 1) {
                        PropertyLoan::query()->insert([
                            'name' => $name,
                            'email' => $email,
                            'mobile' => $phone,
                            'address' => $add,
                            'pincode' => $pincode,
                            'income_range' => Config('constants.investRangeInWords.' . $investmentRange),
                            'source' => 'INSTA APPLY(Multiple Apply)',
                        ]);
                        $needLoan = 0;
                    }

                    $investorController = new InvestorController();

                    $insertData = [
                        'name' => $name,
                        'email' => $email,
                        'mobile' => $phone,
                        'address' => $add,
                        'state' => Config('location.stateArr.' . $state),
                        'city' => $city,
                        'category_id' => $franchisorDetail->ind_main_cat,
                        'pincode' => $pincode,
                        'investment_range' => $investmentRange
                    ];

                    $leadSource = Config('constants.leadSource.FiInstantApply');

                    $investorController->convertLeadsToInvestor($insertData, $leadSource);

                   /* if ($userDetail->email == 'fiblbrands@franchiseindia.in') {
                        try {
                            CronController::saveAPI($name, $email, $phone, $franchisorDetail->ind_main_cat, $franchisorDetail->fibl_brands, $city, $state);
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    }*/
                }

                $details[0] = [
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $phone,
                    'state' => Config('location.stateArr.' . $state),
                    'city' => $city
                ];

                $details[1] = $franchisorDetail->ceo_name;

                if ($countOld == 0) {

                    if ($franchisorDetail->membership_type != 0) {
                        //sms sending
                        $franSmsMsg = sprintf(config('txtlocal.FranPaid'), strlen($name) > 40 ? substr($name, 0, 40) . ".." : $name, strlen($phone) > 40 ? substr($phone, 0, 15) . ".." : $phone);

                        //Sending Paid Franchisor Notifications
                        $this->sendFranNotifications($userDetail->email, $details, $userDetail->mobile, $franSmsMsg, 'paid');
                    }

                    if ($franchisorDetail->membership_type == 0) {
                        //sms text to be send for free franchisor sending
                        $franSmsMsg = sprintf(config('txtlocal.FranFree'), strlen($name) > 40 ? substr($name, 0, 40) . ".." : $name);

                        //Sending Free Franchisor Notifications
                        $this->sendFranNotifications($userDetail->email, $details[1], $userDetail->mobile, $franSmsMsg, 'free');
                    }
                }
                //msg to be displayed
                $success .= $franchisorDetail->company_name . ", ";
                $successCount = ++$successCount;
            } else {
                $franchisorDetail = FranchisorBusinessDetail::query()->where('franchisor_id', $franId)->select('company_name', 'membership_type')->first();

                if (empty($franchisorDetail)) {
                    $result = "Your request will be sent to the companies interested for franchising in your state. The business development representative will contact you soon through your contact number / email ID.";
                    return view('thanks/brandcontact', compact('result'));
                }

                $failed .= $franchisorDetail->company_name . ", ";
                $failedCount = ++$failedCount;
            }
        }

        $success = substr($success, 0, -1);
        $success .= ". Your request will be sent to the companies interested for franchising in your state. The business development representative will contact you soon through your contact number / email ID.";
        $failed = substr($failed, 0, -1);
        $failed .= " Is not looking for expansion in your state.";

        $result = $success;

        if ($failedCount != 1)
            $result = $success . "<br>" . $failed;

        if ($successCount == 1 && $failedCount != 1)
            $result = $failed;

        $temp = explode(',', $request->input('frandetailsid'));

        foreach ($temp as $franIdForName) {
            $companyName .= FranchisorBusinessDetail::query()->where('franchisor_id', $franIdForName)->select('company_name')->first()->company_name . ',';
        }

        $detailMail[0] = substr($companyName, 0, -1);
        $detailMail[1] = $request->input('infoname');

        //Sms text for a visitor
        $franSmsMsg = sprintf(config('txtlocal.GuestInv'), strlen($name) > 40 ? substr($name, 0, 40) . ".." : $name);
        $this->sendInvNotifications($email, $detailMail, $phone, $franSmsMsg, 'visitor');

        return view('thanks/brandcontact', compact('result'));
    }

    /**
     * @param Request $request
     * Function to express interest by free investor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|int
     */
    public function brandInfo(Request $request)
    {
        $request->validate([
            'infoname' => 'required',
            'infoemail' => 'required|email',
            'mobile' => 'required|numeric|min:10',
            'infostate' => 'required',
            'infocity' => 'required',
            'address' => 'required',
            'pincode' => 'required|numeric|min:6',
            'investment_range' => 'required',

        ]);

        $franId = $request->input('frandetailsid');

        $name = $request->input('infoname');
        $email = $request->input('infoemail');
        $phone = $request->input('mobile');
        $state = Config('location.stateArr.' . $request->input('infostate'));
        $city = $request->input('infocity');
        $add = $request->input('address');
        $pincode = $request->input('pincode');
        $investmentRange = $request->input('investment_range');
        $needLoan = 0;
        $chkMobVerify = MobileVerification::query()->select('mob_verify_id', 'mobile_no')
            ->where('mobile_no', $phone)
            ->where('is_verified', '1')
            ->first();

        if (empty($chkMobVerify)) {
            $result = "<span>Congratulations!</span> Your application was successful to $franId . Your request will be sent to the company. The business development representative will contact you soon through your contact number / email ID.";
        } else {
            if (isset(request()->need_loan) && request()->need_loan == 'on')
                $needLoan = 1;

            //if the newsletter is selected
            if (isset(request()->newsletter_sub) && request()->newsletter_sub == 'on')
                $this->newsletterSubscribe($email);

            // Check for duplicate entry
            $chkRec = ExpressInstaApply::query()->where('franchisor_id', '=', $franId)->where('email', '=', $email)->count();

            // Fetch Franchisor Details
            $franchisorDetail = FranchisorBusinessDetail::query()->where('franchisor_id', $franId)->select('company_name', 'membership_type', 'ind_main_cat','ceo_name')->first();

            // If record already exists
            if ($chkRec > 0 && !empty(request()->check_lead_popup) && request()->check_lead_popup == 'lead') {
                return json_encode("<span>Thanks!</span> But you have already applied to $franchisorDetail->company_name", 200);
            }

            if ($chkRec > 0 && empty(request()->check_lead_popup)) {
                $result = "<span>Thanks!</span> But you have already applied to $franchisorDetail->company_name";

                if (isset($request->flag))
                    return 2;

                return view('thanks/brandcontact', compact('result'));
            }

            // dd($franId);
            $userDetail = UserAccount::query()->where('profile_str', $franId)
                                            ->where('profile_status', 1)
                                            ->where('profile_type', 1)
                                            ->first();
            // dd($userDetail);
            $resource = "DOTCOM";
            if (!empty(request()->check_lead_popup))
                $resource = "leadPopup";

            $source_ref = "";
            if (!empty(Cookie::get('campaignSource')))
                $source_ref = Cookie::get('campaignSource');

            $insertData = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'state' => $state,
                'city' => $city,
                'address' => $add,
                'category' => Config('constants.CategoryArr.' . $franchisorDetail->ind_main_cat),
                'pincode' => $pincode,
                'source' => $resource,
                'source_ref' => $source_ref,
                'investment' => $investmentRange,
                'mobile_status' => 'S',
                'franchisor_id' => $franId,
                'visibility' => ($userDetail->membership_type === 1 ? 1 : 0),
                'visibility_date' => ($userDetail->membership_type === 1 ? date('Y-m-d H:i:s') : null)

            ];
            // dd($insertData);
            // If count is zero, Insert a new record
            $insertId = ExpressInstaApply::query()->insertGetId($insertData);

            if ($needLoan == 1) {
                PropertyLoan::query()->insert([
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $phone,
                    'address' => $add,
                    'pincode' => $pincode,
                    'income_range' => Config('constants.investRangeInWords.' . $investmentRange),
                    'source' => 'INSTA APPLY(' . $insertId . ')',
                ]);
            }

            $investorController = new InvestorController();

            $insertData = [
                'name' => $name,
                'email' => $email,
                'mobile' => $phone,
                'address' => $add,
                'state' => $state,
                'city' => $city,
                'category_id' => $franchisorDetail->ind_main_cat,
                'pincode' => $pincode,
                'investment_range' => $investmentRange
            ];

            $leadSource = Config('constants.leadSource.FiInstantApply');

            $investorController->convertLeadsToInvestor($insertData, $leadSource);

            /* if ($userDetail->email == 'fiblbrands@franchiseindia.in') {
                try {
                    CronController::saveAPI($name, $email, $phone, $franchisorDetail->ind_main_cat, $franchisorDetail->fibl_brands, $city, $state);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            }*/

            if (empty($phone) || empty($email)) {
                $checkFlag = 0;
                if (isset($request->flag))
                    $checkFlag = 1;

                $this->logErrorForLeadGeneration('instaapply_01032018.txt', $request->header('User-Agent'));
                $this->logErrorForLeadGeneration('instaapply_01032018.txt', request()->ip() . ' - ' . $franId . ' - ' . $email . ' - ' . $phone . ' - ' . $name . ' - ' . $checkFlag . ' -- 2');
            }

            // Fetch Franchisor Contact Details

            $details[0] = [
                'name' => $name,
                'email' => $email,
                'mobile' => $phone,
                'state' => $state,
                'city' => $city
            ];

            $details[1] = $franchisorDetail->ceo_name;

            if ($franchisorDetail->membership_type != 0) {
                //Sms message
                $franSmsMsg = sprintf(config('txtlocal.FranPaid'), strlen($name) > 40 ? substr($name, 0, 40) . ".." : $name, strlen($phone) > 15 ? substr($phone, 0, 15) . ".." : $phone);

                //Sending Paid Franchisor Notifications
                $this->sendFranNotifications($userDetail->email, $details, $userDetail->mobile, $franSmsMsg, 'paid');
            }

            if ($franchisorDetail->membership_type == 0) {
                //sms sending
                $franSmsMsg = sprintf(config('txtlocal.FranFree'), strlen($name) > 40 ? substr($name, 0, 40) . ".." : $name);

                //Sending Free Franchisor Notifications
                $this->sendFranNotifications($userDetail->email, $details[1], $userDetail->mobile, $franSmsMsg, 'free');
            }

            $detailMail[0] = $franchisorDetail->company_name;
            $detailMail[1] = $request->input('infoname');

            //sms message for a visitor sending
            $franSmsMsg = sprintf(config('txtlocal.GuestInv'), strlen($name) > 40 ? substr($name, 0, 40) . ".." : $name);

            $this->sendInvNotifications($email, $detailMail, $phone, $franSmsMsg, 'visitor');

            //blade msg
            $result = "<span>Congratulations!</span> Your application was successful to $franchisorDetail->company_name . Your request will be sent to the company. The business development representative will contact you soon through your contact number / email ID.";

            // If record already exists
            if (!empty(request()->check_lead_popup) && request()->check_lead_popup == 'lead') {
                return json_encode($result, 200);
            }


            if (isset($request->flag))
                return 1;
        }

        return view('thanks/brandcontact', compact('result'));
    }

    /**
     * @param Request $request
     * @return string
     */
    public function getFreeStates(Request $request)
    {
        $resultstates = "<option>Select State</option>";
        $franIdArr = explode(',', $request->input('fid'));
        $stateArr = FranchisorLocState::query()->select('state')->distinct()->whereIn('franchisor_id', $franIdArr)->orderBy('state', 'ASC')->get(['state'])->pluck('state');
        foreach ($stateArr as $result)
            $resultstates .= "<option value='" . array_search($result, Config('location.stateArr')) . "'>$result</option>";

        return $resultstates;
    }

    /**
     * @param $email
     */
    private function newsletterSubscribe($email)
    {
        $siteType = "fi";
        $randCode = rand(100000, 9999999);
        $checkEmail = FiNewsLetter::query()->select('status')->where('site_type', $siteType)->where('email', $email)->first();

        // If no record exists, send the verification mail
        if ($checkEmail != null && $checkEmail->count() == 0) {

            FiNewsLetter::query()->insert([
                'email' => $email,
                'verify_code' => $randCode,
                'site_type' => $siteType
            ]);
            $this->sendNewsletterNotifications($email, $randCode);
        } else if ($checkEmail != null && $checkEmail->count() != 0 && $checkEmail->status != 'S') {
            FiNewsLetter::query()->where('email', $email)->where('site_type', $siteType)->update(['verify_code' => $randCode]);
            $this->sendNewsletterNotifications($email, $randCode);
        }
    }

    /**
     * @param $email
     * @param $data
     * @param $mobileNo
     * @param $msg
     * @param $type
     */
    private function sendFranNotifications($email, $data, $mobileNo, $msg, $type)
    {
        switch ($type) {
            case 'paid':
                $senderClass = new PaidFranchisor($data);
                break;
            default:
                $senderClass = new FreeFranchisor($data);
        }

        if ($email != 'fiblbrands@franchiseindia.in') {
            $this->sendSms($mobileNo, $msg);
            if ($type == 'free')
                $this->sendNotificationToSalesPerson($email);
        }

        $this->sendMail($email, $senderClass);
    }

    /**
     * @param $email
     * @param $data
     * @param $mobileNo
     * @param $msg
     * @param $type
     */
    private function sendInvNotifications($email, $data, $mobileNo, $msg, $type)
    {
        switch ($type) {
            case 'paid':
                $senderClass = new PaidInvestor($data);
                break;
            case 'free':
                $senderClass = new FreeInvestor($data);
                break;
            default:
                $senderClass = new ExpressInstaVisitorMail($data);
        }
        $this->sendSms($mobileNo, $msg);
        $this->sendMail($email, $senderClass);
    }

    /**
     * @param $email
     */
    private function sendNotificationToSalesPerson($email)
    {
        $data = UserAccount::query()->where('email', $email)->first();
        if (!empty($data) && !empty($data->profile_str)) {
            $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $data->profile_str)->first();
            $leads = ExpressInstaApply::query()->where('franchisor_id', $data->profile_str)->count() + UserActivity::query()->where('franchisor_id', $data->profile_str)->count();
            $params = ['company_name' => $franData->company_name, 'ceo_name' => $franData->ceo_name, 'ceo_email' => $franData->ceo_email, 'ceo_mobile' => $franData->ceo_mobile, 'state' => $franData->state, 'ind_main_cat' => $franData->ind_main_cat, 'franchisor_id' => $data->profile_str, 'leads' => $leads, 'authorization_code' => '24sv24525885kshdvf23kjk32'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://master.franchiseindia.com/fisalescrm/cron/lead_alert_sales_franchisor.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch);
        }
    }
    /**
     * @param $emailId
     * @param $data
     */
    private function sendNewsletterNotifications($emailId, $data)
    {
         $this->sendMail($emailId, new NewsLetterSubscribe($data));
    }

    /**
     * @param $emailId
     * @param $senderClass
     */
    private function sendMail($emailId, $senderClass)
    {
        try {
             Mail::to($emailId)->send($senderClass);
        } catch (ClientException $e) {
            $this->logError('could not send to ' . $e->getMessage());
        }
    }

    /**
     * @param $mobileNo
     * @param $msg
     */
    private function sendSms($mobileNo, $msg)
    {
        CommonController::sendTxtSms($mobileNo, $msg);
    }

    /**
     * @param $msg
     */
    private function logError($msg)
    {
        Log::error($msg);
    }

    /**
     * @param $msg
     * @param $path
     */
    private function logErrorForLeadGeneration($path, $msg)
    {
        Storage::append($path, $msg);
    }
}
