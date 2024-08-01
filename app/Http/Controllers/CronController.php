<?php

namespace App\Http\Controllers;

use App\Models\ExpressInstaApply;
use App\Models\FixedBrand;
use App\Models\FranchisorBusinessDetail;
use App\Models\FranchisorFeedback;
use App\Models\FranchisorLocState;
use App\Models\FranchisorSliderTenure;
use App\Models\FranPaymentHistory;
use App\Models\HomePremiumPageBrand;
use App\Models\InsertLead;
use App\Models\InvestorDetails;
use App\Mail\FranchisorFeedbackMail;
use App\Mail\FreeFranchisor;
use App\Mail\InsertleadMail;
use App\Mail\PaidFranchisor;
use App\Models\PgInvestorPayment;
use App\Models\UserAccount;
use App\Models\UserActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\RawMail;
class CronController extends Controller
{

    public function leadVisibilityCron()
    {
//        $franchisors = FranPaymentHistory::query()->distinct()->select('franchisor_id')->get();
        $franchisors = FranPaymentHistory::query()->distinct()->select('franchisor_id')->skip(3000)->take(300)->get();

        foreach ($franchisors as $franchisor) {
            $franchisorId = $franchisor->franchisor_id;
            Storage::append('setting-flags.txt', $franchisorId.",");

//            $franchisorId = "FIHL9389997";
            $premiumDays = FranPaymentHistory::query()->select('start_date', 'end_date')->where('franchisor_id', $franchisorId)->get();
            $updateExpressInsta = ExpressInstaApply::query()->where('franchisor_id', $franchisorId);
            $updateExpressInsta->where(function ($query) use ($premiumDays, $franchisorId) {
                foreach ($premiumDays as $duration) {
                    $query->orwhereBetween('create_date', [$duration->start_date, $duration->end_date]);
                }
                return $query;
            });

            $updateExpressInsta->update([
                'visibility' => 1,
                'visibility_date' => date('Y-m-d H:i:s'),
            ]);

            $updateExpressUserActivity = UserActivity::query()->where('franchisor_id', $franchisorId);
            $updateExpressUserActivity->where(function ($query) use ($premiumDays, $franchisorId) {
                foreach ($premiumDays as $duration) {
                    $query->orwhereBetween('visit_date', [$duration->start_date, $duration->end_date]);
                }
                return $query;
            });

            $updateExpressUserActivity->update([
                'franchisor_visibility' => 1,
                'franchisor_visibility_date' => date('Y-m-d H:i:s'),
            ]);
        }
    }


    /**
     * Function to insert free advice data
     */
    public function insertLeads()
    {
        $fileName = 'cron_insertlead_';
        $startMessage = 'Start Time : ' . date('Y-m-d H:i:s');

        //Franchisor Data
        $fransql = InsertLead::query()->select('lead_id', 'franchisor_id', 'daily_required_leads', 'daily_generated_leads', 'required_leads', 'generated_leads')
            ->where('status', 1)
            ->where('daily_flag', 1)
            ->inRandomOrder()
            ->take(5)
            ->get();

        foreach ($fransql as $franchisor) {

            $singleFranQuery = FranchisorBusinessDetail::query()->select('franchisor_id', 'unit_investment', 'ind_sub_cat', 'ceo_name', 'company_name')
                ->where('franchisor_id', $franchisor->franchisor_id)
                ->first();

            $franExistData = ExpressInstaApply::query()->select('email')
                ->where('franchisor_id', $franchisor->franchisor_id)
                ->whereNotNull('email')
                ->groupBy('email')
                ->pluck('email')
                ->toArray();


            $selectedStates = FranchisorLocState::query()->select('state')->where('franchisor_id', $franchisor->franchisor_id)->pluck('state')->toArray();

            $unitInvNo = $singleFranQuery->unit_investment;

            $randFranchisors = FranchisorBusinessDetail::query()->select('franchisor_id')
                ->where('unit_investment', '>=', $unitInvNo)
                ->where('ind_sub_cat', $singleFranQuery->ind_sub_cat)
                ->inRandomOrder()
                ->take(100)
                ->get()
                ->pluck('franchisor_id');

            if (count($randFranchisors) == 0) {
                if ($unitInvNo > 17)
                    $unitInvNo = 17;
                else
                    $unitInvNo = $unitInvNo - 1;

                if ($unitInvNo <= 0)
                    $unitInvNo = 1;

                $randFranchisors = FranchisorBusinessDetail::query()->select('franchisor_id')
                    ->where('unit_investment', '>=', $unitInvNo)
                    ->where('ind_sub_cat', $singleFranQuery->ind_sub_cat)
                    ->inRandomOrder()
                    ->take(100)
                    ->get()
                    ->pluck('franchisor_id');
            }

            $singleData = ExpressInstaApply::query()->whereIn('franchisor_id', $randFranchisors->toArray());

            if (count($selectedStates) > 0)
                $singleData->whereIn('state', $selectedStates);

            $singleData->where('franchisor_id', '!=', $franchisor->franchisor_id);

            if (!empty($franExistData))
                $singleData->whereNotIn('email', $franExistData);

            $data = $singleData->whereNotNull('email')->whereNotNull('phone')->where('create_date', '>', date('Y-m-d h:m:s', strtotime('-3 Months')));
            $data = $data->inRandomOrder()->first();

            //if result is empty in last 3 months record from express insta table
            if (empty($data)) {
                $dataNew = $singleData->where('create_date', '>', date('Y-m-d h:m:s', strtotime('-6 Months')));
                $data = $dataNew->inRandomOrder()->first();

                if (empty($data) && $unitInvNo > 1) {

                    $unitInvNo = $unitInvNo - 2;

                    $randFranchisors = FranchisorBusinessDetail::query()->select('franchisor_id')
                        ->where('unit_investment', '>=', $unitInvNo)
                        ->where('ind_sub_cat', $singleFranQuery->ind_sub_cat)
                        ->inRandomOrder()
                        ->take(100)
                        ->get()
                        ->pluck('franchisor_id');

                    $singleData = ExpressInstaApply::query()->whereIn('franchisor_id', $randFranchisors->toArray());

                    if (count($selectedStates) > 0)
                        $singleData->whereIn('state', $selectedStates);

                    $singleData->where('franchisor_id', '!=', $franchisor->franchisor_id);

                    if (!empty($franExistData))
                        $singleData->whereNotIn('email', $franExistData);

                    $data = $singleData->where('create_date', '>', date('Y-m-d h:m:s', strtotime('-6 Months')));
                    $data = $data->inRandomOrder()->first();

                    if (empty($data)) {
                        InsertLead::query()->where('status', 1)->where('lead_id', $franchisor->lead_id)->update(['status' => 4]);

                        $data = "
                                FranchisorId                                       =   " . $franchisor->franchisor_id . "
                                Company Name                                       =   " . $singleFranQuery->company_name;

                        Mail::getFacadeRoot()->raw($data, function ($message) {
                            $message->subject('No matching result in insert lead');
                            $message->to('service@franchiseindia.net');
                        });
                    }
                }
            }

            if (!empty($data)) {

                $userData = UserAccount::query()->where('profile_str', $franchisor->franchisor_id)->first();
                if (!empty($data) && !empty($singleFranQuery) && !empty($userData)) {
                    $this->createLead($data, $singleFranQuery, $userData, $franchisor->lead_id);

                    if ($franchisor->daily_generated_leads >= --$franchisor->daily_required_leads) {
                        InsertLead::query()->where('status', 1)
                            ->where('lead_id', $franchisor->lead_id)
                            ->update(['daily_flag' => 0]);
                    }

                    if ($franchisor->generated_leads >= --$franchisor->required_leads) {
                        InsertLead::query()->where('status', 1)
                            ->where('lead_id', $franchisor->lead_id)
                            ->update(['status' => 2, 'is_recommend' => 0]);
                    }
                }
            }
        }

        $logMessage = $startMessage . ' End Time : ' . date('Y-m-d H:i:s');

        //Log file generation 
        $this->generateLog($fileName, $logMessage);
    }

    /**
     * @param $data
     * @param $franchisor
     * @param $userData
     * @param $leadId
     */
    public function createLead($data, $franchisor, $userData, $leadId)
    {

        ExpressInstaApply::query()->create([
            'name' => $data->name,
            'address' => $data->address,
            'email' => $data->email,
            'phone' => $data->phone,
            'city' => $data->city,
            'state' => $data->state,
            'pincode' => $data->pincode,
            'category' => $data->category,
            'source' => 'DOTCOM', //$data->source,
            'franchisor_id' => $franchisor->franchisor_id,
            'source_ref' => '1',
            'mobile_status' => 'S'
        ]);

        if(!empty($leadId)) {
            InsertLead::query()->where('lead_id', $leadId)->increment('generated_leads');
            InsertLead::query()->where('lead_id', $leadId)->increment('daily_generated_leads');
        }

        $details[0] = [
            'name' => $data->name,
            'email' => $data->email,
            'mobile' => $data->phone,
            'state' => $data->state,
            'city' => $data->city
        ];

        $details[1] = $franchisor->ceo_name;

        //Sending Email and SMS to A Franchisor
        try {
            Mail::getFacadeRoot()->to($userData->email)->send(new PaidFranchisor($details));
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            Log::getFacadeRoot()->error('could not send to ' . $userData->email);
        }

        //sms sending
        $franSmsMsg = sprintf(config('txtlocal.FranPaid'), $data->name, $data->phone);
        CommonController::sendTxtSms($userData->mobile, $franSmsMsg);

        $detailMail[0] = $data->category;
        $detailMail[1] = $franchisor->company_name;

        //Sending Email and SMS to A visitor
        try {
            Mail::getFacadeRoot()->to($data->email)->send(new InsertleadMail($detailMail));
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            Log::getFacadeRoot()->error('could not send to ' . $data->email);
        }

        $franSmsMsg = sprintf(config('txtlocal.GuestInv'), $data->name);
        CommonController::sendTxtSms($data->phone, $franSmsMsg);
    }

    /**
     *  Reset the status flags
     */
    public function resetDailyFlag()
    {
        InsertLead::query()->where('status', 1)
            ->update(['daily_flag' => 1, 'daily_generated_leads' => 0]);
    }

    /**
     *  Reset the status flags
     */
    public function feedbackMail()
    {
        $franchisors = "";
        $franIds = [];
        $fileName = 'cron_feedback_mail_';
        $startMessage = 'Start Time : ' . date('Y-m-d H:i:s');
        $paidFranData = FranPaymentHistory::query()->select('franchisor_id', 'start_date')
            ->where('status', 1)
            ->where('end_date', '>', date('Y-m-d 00:00:00', strtotime("-1 day")))
            ->get();

        $oldEntry = FranchisorFeedback::query()->select('franchisor_id')
            ->where('created_at', '>', date('Y-m-d 00:00:00', strtotime("-5 day")))
            ->get()
            ->pluck('franchisor_id')
            ->toArray();

        foreach ($paidFranData as $franData) {
            if (date_format(date_create($franData->start_date), 'd') == date('d')) {
                if (!in_array($franData, $oldEntry)) {
                    array_push($franIds, $franData->franchisor_id);
                    $franchisors .= $franData->franchisor_id . ", ";
                }
            }
        }

        foreach ($franIds as $franchisor_id) {
            $UserData = UserAccount::query()->select('email')->where('profile_str', $franchisor_id)->first();
            $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisor_id)->first();

            if (!empty($UserData) && !empty($franData)) {
                $months = 0;
                foreach ($paidFranData as $data) {
                    if($data->franchisor_id == $franData->franchisor_id) {
                        $date1 = strtotime($data->start_date);
                        $date2 = strtotime(date('Y-m-d h:i:s'));
                        $months = 0;

                        while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
                            $months++;
                    }
                }
                $data = [$franData, $months];

                Mail::getFacadeRoot()->to($UserData->email)->send(new FranchisorFeedbackMail($data));
            }
        }

        $logMessage = $startMessage . '  Franchisor Ids : ' . $franchisors . 'End Time : ' . date('Y-m-d H:i:s');

        //Log file generation 
        $this->generateLog($fileName, $logMessage);
    }

    /**
     * For Investor Membership expiration automation script
     */
    public function investorMembershipExpiration()
    {
        $expiredInvestors = PgInvestorPayment::query()->select('investor_id')->where('order_status', 1)->whereDate('expiry_date', DB::raw('CURDATE()-1'))->get();

        if (empty($expiredInvestors))
            return false;

        foreach ($expiredInvestors as $investor) {
            $invData = InvestorDetails::query()->select('investor_id', 'membership_type', 'membership_plan', 'credit_limit')->where('investor_id', $investor->investor_id)->first();
            if (!empty($invData))
                $this->generateLog('expiredInvestors' . date('m-Y') . '.txt', $invData);
        }

        UserAccount::query()->whereIn('profile_str', $expiredInvestors->pluck('investor_id'))->update(['membership_plan' => 401, 'membership_type' => 0]);
        InvestorDetails::query()->whereIn('investor_id', $expiredInvestors->pluck('investor_id'))->update(['membership_plan' => 401, 'membership_type' => 0, 'credit_limit' => 0]);

        return true;
    }

    /**
     * Inserting to file
     */
    public function getSscArray()
    {
        Storage::put('ssc.json', FranchisorBusinessDetail::query()->select('ind_sub_cat')->where('profile_status', 1)->get()->pluck('ind_sub_cat')->unique());
    }

    /**
     * @param $fileName
     * @param $message
     */
    protected function generateLog($fileName, $message)
    {
        Storage::append($fileName . date('m-Y') . '.txt', $message);
    }

    /**
     * Brand Expiration Cron
     */
    public function expireBrands()
    {
        $paidCurrentFranchisors = FranPaymentHistory::query()->where('status', 1)->whereDate('end_date','>', date('Y-m-d',  strtotime('-1 day')))->get()->pluck('franchisor_id')->unique()->toArray();
        //@var $expiringToday  is getting all the franchisors who are getting expired today
        $expiringToday = FranPaymentHistory::query()->where('status', 1)->where('expire_after_leads', 0)->whereDate('end_date','<', date('Y-m-d'))->whereNotIn('franchisor_id', $paidCurrentFranchisors)->get()->pluck('franchisor_id')->unique()->toArray();
        $this->brandExpiration($expiringToday);
        $this->expireBrandsCompletedBrands();
        FranchisorBusinessDetail::query()
            ->where('membership_type' ,0)
            ->update([
                'membership_plan' => 100,
                // 'membership_weightage' => 0,
                'membership_weightage_backup' => 0,
                'is_fixed_brand' => 0
            ]);
    }

    /**
     * Brand Expiration Cron
     */
    public function expireBrandsCompletedBrands()
    {
        $brandToBeExpired = [];
        //@var $expiringToday  is getting all the franchisors who are getting expired today
        $expiringBrands = FranPaymentHistory::query()->where('status', 1)->where('expire_after_leads', 1)->whereDate('end_date','<=', date('Y-m-d',  strtotime('-1 day')))->get();
        foreach ($expiringBrands as $brand) {
            $totalLeads = UserActivity::query()->where('franchisor_id', $brand->franchisor_id)->where('visit_date', '>=', $brand->start_date)->count() + ExpressInstaApply::query()->where('franchisor_id', $brand->franchisor_id)->where('create_date', '>=', $brand->start_date)->count();
            if($totalLeads >= $brand->committed_leads)
                array_push($brandToBeExpired, $brand->franchisor_id);
        }
        $this->brandExpiration($brandToBeExpired);
    }

    /**
     * @param $expiringToday
     */
    public function brandExpiration($expiringToday)
    {
        //If we get some brands whose are getting expired today the make their membership expired and replacing home/premium page banners if exists
        if (count($expiringToday) > 0) {

            $allBrands = json_encode($expiringToday);

            //logging the expiring brands
            Storage::append('Expiring-franchisors.txt', "\n".date('d-m-Y'));
            Storage::append('Expiring-franchisors.txt', "All brands expiring today = ". $allBrands);

            $data = "FranchisorId's = ".$allBrands;
            Mail::getFacadeRoot()->to(['service@franchiseindia.net', 'techsupport@franchiseindia.net'])->send(new RawMail($data, array('subject' => 'Franchisors expiring today', 'from' => 'franchisor-update@franchiseindia.com', 'attachment' => '')));
            //Changing membership status from the user_accounts, franchisor_business_details and franchisor_slider_tenure tables
            UserAccount::query()->whereIn('profile_str', $expiringToday)->update(['membership_type' => 0, 'membership_plan' => 100]);
            FranchisorBusinessDetail::query()->whereIn('franchisor_id', $expiringToday)->update(['membership_type' => 0, 'membership_plan' => 100, 'membership_weightage' => 0, 'is_fixed_brand' => 0]);
            FranchisorSliderTenure::query()->whereIn('franchisor_id', $expiringToday)->update(['status' => 2]);
            FranPaymentHistory::query()->where('status', 1)->whereIn('franchisor_id', $expiringToday)->update(['status' => 2]);
            FixedBrand::query()->whereIn('franchisor_id', $expiringToday)->delete();

            //checking from homepage and premium page if any banner exists of respective franchisor
            foreach ($expiringToday as $franchisor) {

                //fetching franchisors whose status of appearence is 1 on home or premium page
                $expiringBannerBrand =  HomePremiumPageBrand::query()->where('fihl_id', $franchisor)->where('status', 1)->where('inventory_backup', 0)->get();

                //If count of banners of expiring brands on home or premium page is freater than 0 then check the replacable brand if exists
                if(count($expiringBannerBrand) > 0) {

                    //logging down the brands havings active banner on home or premium page
                    Storage::append('Expiring-franchisors.txt', "Brand having banners active = ". json_encode($expiringBannerBrand));

                    foreach ($expiringBannerBrand as $brand) {

                        //Logging every single brand for replacement
                        Storage::append('Expiring-franchisors.txt', "Brand for replacement = ". json_encode($brand));

                        //check for backup brand
                        $invBrand = HomePremiumPageBrand::query()->where('status', 0)->where('inventory_backup', 1)->where('page_type', $brand->page_type)->where('brand_section', $brand->brand_section)->where('fihl_id', '!=', $brand->fihl_id)->orderBy('weightage', 'DESC')->first();

                        if (!empty($invBrand)) {

                            $data = "FranchisorId from    =   ".$brand->fihl_id." to ".$invBrand->fihl_id;
                            Mail::getFacadeRoot()->to(['service@franchiseindia.net', 'techsupport@franchiseindia.net'])->send(new RawMail($data, array('subject' => 'Franchisors banner replaced', 'from' => 'franchisor-update@franchiseindia.com', 'attachment' => '')));
                            //logging brands if found for replacement
                            Storage::append('Expiring-franchisors', "Found Brand in inventory as replacement = ". json_encode($invBrand));

                            //if backup brand found then replace it with expiring brand
                            HomePremiumPageBrand::query()->where('brand_id', $brand->brand_id)->update(['status' => 0]);
                            HomePremiumPageBrand::query()->where('brand_id', $invBrand->brand_id)->update(['status' => 1]);
                        } else {

                            $data = "FranchisorId    =   ".$brand->fihl_id;

                            Mail::getFacadeRoot()->to(['service@franchiseindia.net', 'techsupport@franchiseindia.net'])->send(new RawMail($data, array('subject' => 'Franchisors banner replacement not found', 'from' => 'franchisor-update@franchiseindia.com', 'attachment' => '')));

                            Storage::append('Expiring-franchisors.txt', "Not Found a replacement brand in inventory ".$data);
                        }
                    }
                }
            }
        }
    }

    /**
     * Daily investor report sending to Akash and Rekha for paid investors on last date
     */
    public function sendInvestorPaidData()
    {
        $investors =  PgInvestorPayment::query()->select('investor_id', 'amount')->whereDate('pay_date', date('Y-m-d',  strtotime('-1 day')))->where('order_status', 1)->where('payment_status', 1)->get();
        $filename = "/tmp/Paid-investor.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Name', 'Email', 'Amount', 'Address', 'City', 'Pin code', 'State', 'Phone'));

        foreach ($investors as $investor) {
            $userAccData = UserAccount::query()->where('profile_str', $investor->investor_id)->first();
            $investorDetails = InvestorDetails::query()->where('investor_id', $investor->investor_id)->first();

            if(count($userAccData) > 0 && count($investorDetails) > 0)
                fputcsv($handle, array($userAccData->name, $userAccData->email, $investor->amount, $investorDetails->inv_address, $investorDetails->inv_city, $investorDetails->inv_pincode, $investorDetails->inv_state, $userAccData->mobile));
        }
        fclose($handle);
        $custSubject = 'Paid Investor for the date: '.date('d-m-Y');
        $data = "Please find the investors in attachment for the date: ".date('d-m-Y');
        Mail::getFacadeRoot()->to(['service@franchiseindia.net', 'complain@franchiseindia.net', 'techsupport@franchiseindia.net'])->send(new RawMail($data, array('subject' => $custSubject, 'from' => 'franchisor-update@franchiseindia.com', 'attachment' => $filename)));
    }

    /**
     * Free Franchisor lead insertion cron
     */
    public function freeFranchisorLeadInsertion()
    {
        $fileName = 'free_fran_cron_insert_lead_';
        $startMessage = 'Start Time : ' . date('Y-m-d H:i:s');

        //Franchisor Data
        $fransql = FranchisorBusinessDetail::query()->select('franchisor_id')
            ->where('profile_status', 1)
            ->where('membership_type', 0)
            ->inRandomOrder()
            ->take(500)
            ->get();

        foreach ($fransql as $franchisor) {

            try {
                $singleFranQuery = FranchisorBusinessDetail::query()->select('franchisor_id', 'unit_investment', 'ind_sub_cat', 'ceo_name', 'company_name')
                    ->where('franchisor_id', $franchisor->franchisor_id)
                    ->first();

                $franExistData = ExpressInstaApply::query()->select('email')
                    ->where('franchisor_id', $franchisor->franchisor_id)
                    ->whereNotNull('email')
                    ->groupBy('email')
                    ->pluck('email')
                    ->toArray();


                $selectedStates = FranchisorLocState::query()->select('state')->where('franchisor_id', $franchisor->franchisor_id)->pluck('state')->toArray();

                $unitInvNo = $singleFranQuery->unit_investment;

                $randFranchisors = FranchisorBusinessDetail::query()->select('franchisor_id')
                    ->where('unit_investment', '>=', $unitInvNo)
                    ->where('ind_sub_cat', $singleFranQuery->ind_sub_cat)
                    ->inRandomOrder()
                    ->take(100)
                    ->get()
                    ->pluck('franchisor_id');

                if (count($randFranchisors) == 0) {
                    if ($unitInvNo > 17)
                        $unitInvNo = 17;
                    else
                        $unitInvNo = $unitInvNo - 1;

                    if ($unitInvNo <= 0)
                        $unitInvNo = 1;

                    $randFranchisors = FranchisorBusinessDetail::query()->select('franchisor_id')
                        ->where('unit_investment', '>=', $unitInvNo)
                        ->where('ind_sub_cat', $singleFranQuery->ind_sub_cat)
                        ->inRandomOrder()
                        ->take(100)
                        ->get()
                        ->pluck('franchisor_id');
                }

                $singleData = ExpressInstaApply::query()->whereIn('franchisor_id', $randFranchisors->toArray());

                if (count($selectedStates) > 0)
                    $singleData = $singleData->whereIn('state', $selectedStates);

                $singleData = $singleData->where('franchisor_id', '!=', $franchisor->franchisor_id);

                if (!empty($franExistData))
                    $singleData = $singleData->whereNotIn('email', $franExistData);

                $data = $singleData->whereNotNull('email')->whereNotNull('phone')->where('create_date', '>', date('Y-m-d h:m:s', strtotime('-3 Months')));
                $data = $data->inRandomOrder()->first();

                //if result is empty in last 3 months record from express insta table
                if (empty($data)) {
                    $dataNew = $singleData->where('create_date', '>', date('Y-m-d h:m:s', strtotime('-6 Months')));
                    $data = $dataNew->inRandomOrder()->first();

                    if (empty($data) && $unitInvNo > 1) {

                        $unitInvNo = $unitInvNo - 2;

                        $randFranchisors = FranchisorBusinessDetail::query()->select('franchisor_id')
                            ->where('unit_investment', '>=', $unitInvNo)
                            ->where('ind_sub_cat', $singleFranQuery->ind_sub_cat)
                            ->inRandomOrder()
                            ->take(100)
                            ->get()
                            ->pluck('franchisor_id');

                        $singleData = ExpressInstaApply::query()->whereIn('franchisor_id', $randFranchisors->toArray());

                        if (count($selectedStates) > 0)
                            $singleData = $singleData->whereIn('state', $selectedStates);

                        $singleData = $singleData->where('franchisor_id', '!=', $franchisor->franchisor_id);

                        if (!empty($franExistData))
                            $singleData = $singleData->whereNotIn('email', $franExistData);

                        $data = $singleData->where('create_date', '>', date('Y-m-d h:m:s', strtotime('-6 Months')));
                        $data = $data->inRandomOrder()->first();
                    }
                }

                if (!empty($data)) {

                    $userData = UserAccount::query()->where('profile_str', $franchisor->franchisor_id)->first();
                    if (!empty($data) && !empty($singleFranQuery) && !empty($userData)) {

                        ExpressInstaApply::query()->create([
                            'name' => $data->name,
                            'address' => $data->address,
                            'email' => $data->email,
                            'phone' => $data->phone,
                            'city' => $data->city,
                            'state' => $data->state,
                            'pincode' => $data->pincode,
                            'category' => $data->category,
                            'source' => 'DOTCOM', //$data->source,
                            'franchisor_id' => $singleFranQuery->franchisor_id,
                            'source_ref' => '1',
                            'mobile_status' => 'S'
                        ]);

                        $details[0] = [
                            'name' => $data->name,
                            'email' => $data->email,
                            'mobile' => $data->phone,
                            'state' => $data->state,
                            'city' => $data->city
                        ];

                        $details[1] = $singleFranQuery->ceo_name;

                        //Sending Email and SMS to A Franchisor
                        try {
                            Mail::getFacadeRoot()->to($userData->email)->send(new FreeFranchisor($details[1]));
                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                            Log::getFacadeRoot()->error('could not send to ' . $userData->email);
                        }

                        //sms sending
                        $franSmsMsg = sprintf(config('txtlocal.FranFree'), $data->name);
                        CommonController::sendTxtSms($userData->mobile, $franSmsMsg);

                        $detailMail[0] = $data->category;
                        $detailMail[1] = $singleFranQuery->company_name;

                        //Sending Email and SMS to A visitor
                        try {
                            Mail::getFacadeRoot()->to($data->email)->send(new InsertleadMail($detailMail));
                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                            Log::getFacadeRoot()->error('could not send to ' . $data->email);
                        }

                        $franSmsMsg = sprintf(config('txtlocal.GuestInv'), $data->name);
                        CommonController::sendTxtSms($data->phone, $franSmsMsg);

                    }
                } else {
                    echo "Not Found for franchisor- id- ".$franchisor->franchisor_id."<br>";
                }

            } catch (\Exception $e) {
                echo "Failed For franchisor- id- ".$franchisor->franchisor_id;
            }

        }

        $logMessage = $startMessage . ' End Time : ' . date('Y-m-d H:i:s');

        //Log file generation
        $this->generateLog($fileName, $logMessage);
    }

    /**
     * @return false|string
     */
    public function checkEmails()
    {
        return json_encode(UserAccount::query()->select('email')->whereIn('email', json_decode(request()->email, true))->get()->pluck('email')->toArray());
    }

    /**
     * @param $fullname
     * @param $email_id
     * @param $mobile_no
     * @param $category
     * @param $brand_name
     * @param $city
     * @param $state
     */
    public static function saveAPI($fullname, $email_id, $mobile_no, $category, $brand_name, $city, $state) {

        $brand_id=0;

        if(isset($brand_name))
            $brand_id = CronController::getBrandIdAPI($brand_name);


        $city_id=0;

        if(isset($city) && !empty($city))
            $city_id = CronController::getCityAPI($city);

        $stateArrFibl = Array("1" => "Andhra Pradesh","2" => "Arunachal Pradesh","3" => "Assam","4" => "Bihar","5" => "chandigarh","6" => "Chhattisgarh","7" => "Daman & Diu","9" => "Goa","10" => "Gujarat","11" => "Haryana","12" => "Himachal Pradesh","13" => "Jammu and Kashmir","14" => "Jharkhand","15" => "Karnataka","16" => "Kerala","17" => "Lakshadweep","18" => "Madhya Pradesh","19" => "Maharashtra","20" => "Manipur","21" => "Meghalaya","22" => "Mizoram","23" => "Nagaland","24" => "Nepal","25" => "Delhi/NCR","26" => "Odisha","27" => "Puducherry","28" => "Punjab","29" => "Rajasthan","30" => "Sikkim","31" => "Tripura","32" => "Uttarakhand","33" => "Uttar radesh","34" => "West Bengal","35" => "Tamil Nadu","36" => "Telangana","37" => "Andaman and Nicobar Islands","38" => "Bangladesh","39" => "UAE");

        $stateId = 0;

        if(array_search( $state, $stateArrFibl)) {
            $stateId = array_search( $state, $stateArrFibl);
        }

        ## service section start ##

        $requestParamList=array();

        $requestParamList['fullname']=trim($fullname);

        $requestParamList['email_id']=trim($email_id);

        $requestParamList['mobile_no']=trim($mobile_no);

        $requestParamList['city']=trim($city_id);

        $requestParamList['state']=trim($stateId);

        // Source //

        $requestParamList['lead_source']=18;

        // Business Vertical //

        $requestParamList['business_vertical']=18;

        // CategoryFranchise//

        $requestParamList['category']=trim($category);

        // Brand //

        $requestParamList['brand_id']=trim($brand_id);

        // Investment Range//

        $requestParamList['investment_range']=0;

        // Event Flag //

        $requestParamList['event_lead_flag']=0;

        // if lead coming from brand landing page then this//

        $requestParamList['lead_type_name']="2";

        // else if lead coming for IA then //

        $paramjson=json_encode($requestParamList,true);


        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "http://fiblcrm.franchiseindia.in/api_new_lead",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "POST",

            CURLOPT_POSTFIELDS => $paramjson,

            CURLOPT_HTTPHEADER => array(

                "cache-control: no-cache",

                "content-type: application/json",

                "postman-token: 480d2213-c7a2-5625-2fca-887ed3438c1e"

            ),

        ));

        curl_exec($curl);

        curl_close($curl);
    }

    /**
     * @param $brand_name
     * @return bool|string
     */
    public static function getBrandIdAPI($brand_name) {

        ## service section start ##

        $requestParamList=array();

        $requestParamList['brand_name']=trim($brand_name);

        $paramjson=json_encode($requestParamList,true);

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "http://fiblcrm.franchiseindia.in/api_brand",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "POST",

            CURLOPT_POSTFIELDS => $paramjson,

            CURLOPT_HTTPHEADER => array(

                "cache-control: no-cache",

                "content-type: application/json",

                "postman-token: 480d2213-c7a2-5625-2fca-887ed3438c1e"

            ),

        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if (!$err)
            return $response;

        return $response;

    }

    /**
     * @param $city_name
     * @return bool|string
     */
    public static function getCityAPI($city_name) {

        ## service section start ##

        $requestParamList=array();

        $requestParamList['city_name']=trim($city_name);

        $paramjson=json_encode($requestParamList,true);

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "http://fiblcrm.franchiseindia.in/api_city",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "POST",

            CURLOPT_POSTFIELDS => $paramjson,

            CURLOPT_HTTPHEADER => array(

                "cache-control: no-cache",

                "content-type: application/json",

                "postman-token: 480d2213-c7a2-5625-2fca-887ed3438c1e"

            ),

        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);


        if (!$err)
            return $response;

        return $response;

    }

    /**
     * Weekly report of registration to Ashita Ma'am
     */
    public function weeklyRegistrationReport() {
        $time = strtotime(date('Y-m-d')." 00:00:00");
        $final = date("Y-m-d", strtotime("-1 week", $time))." 00:00:00";
        $oneWeekRegistration = UserAccount::query()->where('created_at', '>', $final)->get();

        $stepOneCompleted = 0;
        $stepTwoCompleted = 0;
        $stepThreeCompleted = 0;
        $stepFourCompleted = 0;
        $stepFiveCompleted = 0;
        $stepSixCompleted = 0;
        foreach($oneWeekRegistration->where('profile_type', 1) as $singleRecord) {
            if($singleRecord->franchisor->step_completed == 1)
                $stepOneCompleted++;
            if($singleRecord->franchisor->step_completed == 2)
                $stepTwoCompleted++;
            if($singleRecord->franchisor->step_completed == 3)
                $stepThreeCompleted++;
            if($singleRecord->franchisor->step_completed == 4)
                $stepFourCompleted++;
            if($singleRecord->franchisor->step_completed == 5)
                $stepFiveCompleted++;
            if($singleRecord->franchisor->step_completed == 6)
                $stepSixCompleted++;
        }
        
        $data = "<----Franchisors All Time Data---->".PHP_EOL.
                "Franchisors Count(Active) = ".UserAccount::query()->where('profile_type', 1)->where('profile_status', 1)->count().PHP_EOL.
                "Franchisors Count(Not Active) = ".UserAccount::query()->where('profile_type', 1)->where('profile_status', '!=',1)->count().PHP_EOL.
                PHP_EOL.
                "<----Franchisors Weekly Data---->".PHP_EOL.
                "Total Franchisors      = ".count($oneWeekRegistration->where("profile_type", 1)).PHP_EOL.
                "Active Franchisors     = ".count($oneWeekRegistration->where("profile_type", 1)->where("profile_status", Config("constants.ProfileStatus.Active"))).PHP_EOL.
//                "Inactive Franchisors   = ".count($oneWeekRegistration->where("profile_type", 1)->where("profile_status", Config("constants.ProfileStatus.Inactive"))).PHP_EOL.
                "Pending Franchisors    = ".count($oneWeekRegistration->where("profile_type", 1)->where("profile_status", Config("constants.ProfileStatus.Pending"))).PHP_EOL.
                "Awaiting Franchisors   = ".count($oneWeekRegistration->where("profile_type", 1)->where("profile_status", Config("constants.ProfileStatus.Awaiting"))).PHP_EOL.
//                "Hidden Franchisors     = ".count($oneWeekRegistration->where("profile_type", 1)->where("profile_status", Config("constants.ProfileStatus.Hidden"))).PHP_EOL.
                "One Step Completed     = ".$stepOneCompleted.PHP_EOL.
                "Two Step Completed     = ".$stepTwoCompleted.PHP_EOL.
                "Three Step Completed   = ".$stepThreeCompleted.PHP_EOL.
                "Four Step Completed    = ".$stepFourCompleted.PHP_EOL.
                "Five Step Completed    = ".$stepFiveCompleted.PHP_EOL.
                "Six Step Completed     = ".$stepSixCompleted.PHP_EOL.
                PHP_EOL.
                "<----Investors All Time Data---->".PHP_EOL.
                "Total Investors Count (Active) = ".UserAccount::query()->where('profile_type', 2)->where('profile_status', 1)->count().PHP_EOL.
                "Total Investors Count (Not Active) = ".UserAccount::query()->where('profile_type', 2)->where('profile_status', '!=',1)->count().PHP_EOL.
                "Investors Count Before No Auto Registration Process(Active) = ".UserAccount::query()->where('profile_type', 2)->whereNull('reg_source')->where('profile_status', 1)->count().PHP_EOL.
                "Investors Count Before No Auto Registration Process(Not Active) = ".UserAccount::query()->where('profile_type', 2)->whereNull('reg_source')->where('profile_status', '!=',1)->count().PHP_EOL.

                PHP_EOL.
                "<----Investors Weekly Data---->".PHP_EOL.
                "Total Investors        = ".count($oneWeekRegistration->where('profile_type', 2)).PHP_EOL.
                "Active Investors       = ".count($oneWeekRegistration->where('profile_type', 2)->where('profile_status', Config('constants.ProfileStatus.Active'))).PHP_EOL.
                "Pending Investors      = ".count($oneWeekRegistration->where('profile_type', 2)->where('profile_status', Config('constants.ProfileStatus.Pending'))).PHP_EOL.
                "FORM Registration      = ".count($oneWeekRegistration->where('profile_type', 2)->where('reg_source', "")).PHP_EOL.
                "FRO Registration       = ".count($oneWeekRegistration->where('profile_type', 2)->where('reg_source', Config('constants.leadSource.FRO'))).PHP_EOL.
                "BOS Registration       = ".count($oneWeekRegistration->where('profile_type', 2)->where('reg_source', Config('constants.leadSource.BOS'))).PHP_EOL.
                "Instant Apply Reg.     = ".count($oneWeekRegistration->where('profile_type', 2)->where('reg_source', Config('constants.leadSource.FiInstantApply'))).PHP_EOL.
                "MAGAZINE(Online) Reg.  = ".count($oneWeekRegistration->where('profile_type', 2)->where('reg_source', Config('constants.leadSource.MAGAZINE'))).PHP_EOL;
           
        Mail::getFacadeRoot()->raw($data, function ($message){
            $message->subject('Weekly Registration Report - Franchiseindia.com');
            $message->to(['service@franchiseindia.net', 'ashita@franchiseindia.com']);

        });


    }
}
