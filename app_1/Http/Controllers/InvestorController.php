<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyLoan;
use App\Models\FranchisorBusinessDetail;
use App\Models\FranchisorLike;
use App\Models\FranchisorLocCountry;
use App\Models\FranchisorLocState;
use App\Models\InsertLead;
use App\Models\InvestorDetails;
use App\Models\InvestorIndustry;
use App\Models\InvestorIndustryBusiness;
use App\Mail\autoInvestorRegistration;
use App\Mail\confirmed;
use App\Models\OnlinePayment;
use App\Models\PgInvestorPayment;
use App\Models\UserAccount;
use App\Models\UserActivity;
use App\Models\UserRecord;
use App\Models\UserViewBrand;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Mail\RawMail;
use App\Http\Controllers\PaymentController;

class InvestorController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('invAuth')->except('vrifyOtp', 'verifyMobile', 'viewInvQuickRegForm', 'campaignNewRegistration', 'campaignPlanCheck', 'createInvestor', 'viewInvestorRegistrationForm', 'upgradeInvestor', 'updateCampaignInfo', 'paymentRequest', 'viewInvesterLogin', 'campaignPlan', 'setcampaignPlan', 'checkInvestorExistence');
    }

    /**
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function campaignPlan()
    {
        if (!empty(request()->user()) && request()->user()->profile_type == 1)
            return redirect('/');

        if (!empty(request()->user()) && request()->user()->membership_plan == 405 && request()->user()->membership_type == 1) {
            $endDate = PgInvestorPayment::query()->select('expiry_date')->where('investor_id', request()->user()->profile_str)->orderBy('investor_pay_id', 'DESC')->first();
            if (!empty($endDate) && !empty($endDate->expiry_date))
                session()->flash('changePlan', 'You are already a paid partner with FranchiseIndia.com. Your Subscription for ' . Config('constants.invPlanDetails.' . request()->user()->membership_plan) . ' plan ends on ' . date_format(date_create($endDate->expiry_date), "d, M Y"));
            return redirect('investor/myaccount/dashboard');
        }

        return view('investor/register/investor_new_plan');
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function setcampaignPlan(Request $request)
    {
        if (!empty(request()->user()) && request()->user()->profile_type == 1)
            return redirect('franchisor/myaccount/dashboard');

        if (!empty(request()->user()) && request()->user()->membership_plan >= $request->input('invPlan') && request()->user()->membership_type == 1) {
            $endDate = PgInvestorPayment::query()->select('expiry_date')->where('investor_id', request()->user()->profile_str)->orderBy('investor_pay_id', 'DESC')->first();
            if (!empty($endDate) && !empty($endDate->expiry_date))
                session()->flash('changePlan', 'You are already a paid partner with FranchiseIndia.com. Your Subscription for ' . Config('constants.invPlanDetails.' . request()->user()->membership_plan) . ' plan ends on ' . date_format(date_create($endDate->expiry_date), "d, M Y"));
            return redirect('investor/myaccount/dashboard');
        }

        $gst = $request->gst_no;


        if (!empty(request()->user()) && request()->user()->membership_plan != 405) {

            $investorId = $request->user()->profile_str;
            $amount = Config('constants.invPlanAmount.' . $request->input('invPlan'));
            $membership = config('constants.invPlanDetails.' . $request->input('invPlan'));
            $planId = $request->input('invPlan');
            $detail = config('constants.invPlanDetails.' . $request->input('invPlan'));

            //$mopt  = $request->input('mop');
            $amount = Config('constants.invPlanAmount.' . $request->input('invPlan'));
            // $chmop = array('OPTCRDC', 'OPTDBCRD', 'OPTEMI', 'OPTNBK');
            //if(!array_key_exists($mopt, $chmop)){
            //$pmode = "OPTNBK";
            //}
            $amount = round($amount + (($amount * 18) / 100));
            // $mop  = config('constants.Charges.' . $pmode);
            // $amount = round($amount + $amount *($mop)/100);


            return $this->paymentRequest($amount, $detail, $membership, $planId, $investorId, $gst, '');
        }


        $plan = $request->input('invPlan');

        return view('inv-campaign.investlogin_new', compact('plan', 'gst'));
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function campaignPlanCheck(Request $request)
    {

        $userdata = UserAccount::query()->where('email', $request->input('email'))->first();
        $gst = $request->gst_no;

        if (count($userdata) > 0) {

            if ($userdata->profile_type == 1) {
                session()->flash('loginFailed', 'Dear User, this login is only for Investor');

                $plan = $request->input('invPlan');
                return view('inv-campaign.investlogin_new', compact('plan', 'gst'));
            }


            if ($userdata->profile_status == 2) {
                session()->flash('loginFailed', 'Dear User, Your Email verification is pending, kindly check your mail inbox for verification mail');

                $plan = $request->input('invPlan');
                return view('inv-campaign.investlogin_new', compact('plan', 'gst'));
            }

            if (Auth::guard()->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'profile_status' => 1])) {
                InvestorController::setPercentage();

                if ($request->input('invPlan') == 401) {

                    $endDate = PgInvestorPayment::query()->select('expiry_date')->where('investor_id', request()->user()->profile_str)->orderBy('investor_pay_id', 'DESC')->first();
                    if (!empty($endDate) && !empty($endDate->expiry_date))
                        session()->flash('changePlan', 'You are already a paid partner with FranchiseIndia.com. Your Subscription for ' . Config('constants.invPlanDetails.' . request()->user()->membership_plan) . ' plan ends on ' . date_format(date_create($endDate->expiry_date), "d, M Y"));
                    return redirect('investor/myaccount/dashboard');
                }

                if ($request->input('invPlan') <= $userdata->membership_plan) {
                    $endDate = PgInvestorPayment::query()->select('expiry_date')->where('investor_id', $userdata->profile_str)->orderBy('investor_pay_id', 'DESC')->first();

                    if (!empty($endDate) && !empty($endDate->expiry_date))
                        session()->flash('changePlan', 'You are already a paid partner with FranchiseIndia.com. Your Subscription for ' . Config('constants.invPlanDetails.' . $userdata->membership_plan) . ' plan ends on ' . date_format(date_create($endDate->expiry_date), "d, M Y"));


                    return redirect('investor/myaccount/dashboard');
                }

                $investorId = $userdata->profile_str;
                $amount = Config('constants.invPlanAmount.' . $request->input('invPlan'));
                $membership = config('constants.invPlanDetails.' . $request->input('invPlan'));
                $planId = $request->input('invPlan');
                $detail = config('constants.invPlanDetails.' . $request->input('invPlan'));
                $gst = $request->gst_no;

                $membership = [$membership, 1];


                return $this->paymentRequest($amount, $detail, $membership, $planId, $investorId, $gst, '');
            }
        }

        session()->flash('loginFailed', 'The user ID or password is incorrect. Kindly re-enter.');
        $plan = $request->input('invPlan');

        return view('inv-campaign.investlogin_new', compact('plan', 'gst'));
    }

    /**
     * @return Factory|View
     */
    public function campaignNewRegistration()
    {
        $plan = request()->invPlan;
        $flag = 2;
        return view('investor/register/investor-quick-registration', compact('flag', 'plan'));
    }

    /**
     *  Function for Investor registration process
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function viewInvestorRegistrationForm()
    {
        return view('investor/register/investor-registration');
    }

    /**
     *  Function for Investor registration create
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function createInvestor(Request $request)
    {


        $checkUser = UserAccount::query()->where('email', $request->input('email'))->first();

        if (!empty($checkUser) && $checkUser->email != 'fiblbrands@franchiseindia.in' && $checkUser->email != 'info@franglobal.com' && $checkUser->profile_status == 4 && $checkUser->profile_type == 1) {
            $franchisorId = $checkUser->profile_str;
            $checkFranchisor = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();

            if ($checkFranchisor->step_completed > 0 && $checkFranchisor->step_completed < 6) {
                FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->delete();
                FranchisorLocState::query()->where('franchisor_id', $franchisorId)->delete();
                FranchisorLocCountry::query()->where('franchisor_id', $franchisorId)->delete();
            }
            UserAccount::query()->where('profile_str', $franchisorId)->delete();
        }

        if ($request->input('email') != 'fiblbrands@franchiseindia.in' && $request->input('email') != 'info@franglobal.com') {
            $this->validate($request, [
                'email' => 'required|email|unique:user_accounts',
            ]);
        }

        //  Validation rules, in case of error
        $this->validate($request, [
            'email' => 'required|email|unique:user_accounts',
            'invName' => 'required|min:3',
            'password' => 'required|min:6',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'mobile' => 'required|numeric',
            'pincode' => 'required|numeric',
            'industry_type' => 'required',
        ]);

        // Generate the unique Investor ID
        $investorId = CommonController::profileUniqStr();

        // Investor Profile Type
        $profileType = config('constants.ProfileType.Investor');

        // Investor Profile status
        $profileStatus = config('constants.ProfileStatus.Pending');

        // Error message to be flashed to client in case of DB insert error
        $error = "Our systems seems to be currently busy. Please try after some time!";

        $isPropOwn = request()->is_property_own;
        $businessCityLooking = request()->business_city_looking;
        $lookingFor = request()->looking_for;
        $serviceType = request()->company_service;
        $businessStateLooking = request()->business_state_looking;
        $franchiseBrandName = request()->franchise_brand_name;
        $companyBusinessName = request()->company_business_name;
        $industryTypeBusiness = request()->industry_type_business;

        // Fetch values from the request
        $name = $request->input('invName');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $address = $request->input('address');
        $country = config('location.countryName.' . $request->input('country'));
        $pincode = $request->input('pincode');
        $state = $request->input('state');
        $city = $request->input('city');
        $mobile = $request->input('mobile');
        $occupation = $request->input('occupation');
        // $dob = $request->input('dob');
        $qualification = $request->input('qualification');

        //step2 data
        $industryType = $request->input('industry_type');
        $investmentRange = $request->input('investment_range');
        $availablecapital = $request->input('available_capital');
        $availablecapitalMin = config('constants.InvestRange.' . $availablecapital . '.min');
        $availablecapitalMax = config('constants.InvestRange.' . $availablecapital . '.max');

        $investmentTime = $request->input('investment_date');
        $investmentRangeMin = config('constants.InvestRange.' . $investmentRange . '.min');
        $investmentRangeMax = config('constants.InvestRange.' . $investmentRange . '.max');
        $loanRequired = $request->input('loan_interest');
        $interestMasterFranchise = $request->input('interest_master_franchise');

        //step3 data
        $isPropCommercial = $request->input('investmentDetailInvestor');
        $propAddress = $request->input('property_address');
        $floorMinArea = $request->input('min_area');
        $floorMaxArea = $request->input('max_area');
        $propertyUse = $request->input('property_use');
        $parkingSpace = $request->input('parking_space');

        //step4 data
        $businessDetailInvestor = $request->input('businessDetailInvestor');
        $businessIndustryType = $request->input('business_industry_type');
        $businessNumberOfYears = $request->input('business_number_of_years');
        $numberOfemployees = $request->input('number_of_employees');
        // $experienceInfranchise = $request->input('experience_in_franchise');
        $businessType = $request->input('business_type');

        //step4 data
        $jobDetailInvestor = $request->input('jobDetailInvestor');
        $jobIndustryType = $request->input('job_industry_type');
        $jobNumberOfYears = $request->input('job_number_of_years');
        $anyOtherIndustry = $request->input('any_other_industry');

        // Laon Form Submit
        if ($loanRequired == 1) {
            $message = "Your details have been submitted successfully";

            $source = "DOTCOM";
            if (!empty(Cookie::get('campaignSource')))
                $source = Cookie::get('campaignSource');

            try {
                PropertyLoan::query()->insert([
                    'name' => $request->input('invName'),
                    'email' => $request->input('email'),
                    'mobile' => $request->input('mobile'),
                    'address' => $request->input('address'),
                    'pincode' => $pincode,
                    'city' => $request->input('city'),
                    'property_type' => $request->input('property_type'),
                    'country' => $country,
                    'property_size' => $request->input('property_size'),
                    'property_value' => $request->input('property_value'),
                    // 'income_range' => $request->input('income_range'),
                    'details' => $request->input('details'),
                    'source' => $source
                ]);
            } catch (\Exception $e) {
                $message = "Oops there is an error please try again..." . $e->getMessage();
            }
        }
        // Begin the transaction
        DB::beginTransaction();

        // Insert into UserAccount Model
        $insertUser = UserAccount::query()->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'mobile' => $mobile,
            'profile_str' => $investorId,
            'profile_type' => $profileType,
            'profile_status' => $profileStatus,
            'title' => request()->title,
            'reg_source' => !empty(Cookie::get('campaignSource')) ? Cookie::get('campaignSource') : ""
        ]);

        // If saving the record in User Model failed
        if (!$insertUser) {
            DB::rollBack();

            // Log the error
            $errorMsg = "Investor Registration Failed: UserAccount Model $email";
            $this->generateLog($errorMsg);

            // Flash the error message in client window
            session()->flash('errorMessage', $error);

            // return back to the investor registration page
            return redirect('investor/create');
        }

        // Insert values in InvestorDetail Model
        $insertInvestor = InvestorDetails::query()
            ->insert([
                'investor_id' => $investorId,
                // 'secondary_email'         => $secondaryEmail,
                // 'secondary_phone_no'      => $secondaryMobileNo,
                'inv_address' => $address,
                'inv_country' => $country,
                'inv_pincode' => $pincode,
                'inv_state' => $state,
                // 'landmark'                => $landmark,
                'inv_city' => $city,
                'occupation' => $occupation,
                // 'dob'                     => $dob,
                'edu_qualification' => $qualification,
                'inv_amt' => $investmentRange,
                // 'income_range'            => request()->income_range,
                'avail_capital' => request()->available_capital,
                'avlcap_min' => $availablecapitalMin,
                'avlcap_max' => $availablecapitalMax,
                'investment_min' => $investmentRangeMin,
                'investment_max' => $investmentRangeMax,
                'investment_time' => $investmentTime,
                'loan_required' => $loanRequired,
                'is_prop_commercial' => $isPropCommercial,
                'prop_address' => $propAddress,
                'area_req_min' => $floorMinArea,
                'area_req_max' => $floorMaxArea,
                'property_type' => (($isPropOwn == 1) ? $propertyUse : 0),
                'is_parking_available' => $parkingSpace,
                'is_current_business' => $businessDetailInvestor,
                'industry_business' => $businessIndustryType,
                'no_of_years_business' => $businessNumberOfYears,
                'no_of_employees' => $numberOfemployees,
                // 'franchise_experience'    => $experienceInfranchise,
                'business_desc' => $businessType,
                'service_type' => $serviceType,
                'service_company_name' => $request->company_service_name,
                'is_job_experience' => $jobDetailInvestor,
                'industry_job' => $jobIndustryType,
                'no_of_years_exp' => $jobNumberOfYears,
                'other_industry' => $anyOtherIndustry,
                'master_franchise_invest' => $interestMasterFranchise,
                'business_company_name' => $companyBusinessName,
                'franchising_brand_name' => $franchiseBrandName,
                'city_looking_business' => $businessCityLooking,
                'state_looking_business' => $businessStateLooking,
                'looking_for' => implode(',', $lookingFor),
                'area_type' => $request->input('area_type')
            ]);

        // If saving the record in InvestorDetail Model failed
        if (!$insertInvestor) {
            DB::rollBack();
            // Log the error

            // Log the error
            $errorMsg = "Investor Registration Failed : InvestorDetail Model  $email";
            $this->generateLog($errorMsg);

            // Flash the error
            session()->flash('errorMessage', $error);
            // Redirect to the Investor registration page
            return redirect('investor/create');
        }

        // Insert the prefered industry sector into InvestorIndustry model
        foreach ($industryType as $val) {
            $insertInvestorIndustryDetails = InvestorIndustry::query()->insert(['investor_id' => $investorId, 'ind_main_cat' => $val]);

            // If saving the record in InvestorDetail Model failed
            if (!$insertInvestorIndustryDetails) {
                DB::rollBack();

                // Log the error
                $errorMsg = "Investor Registration Failed : InvestorIndustry Model  $email";
                $this->generateLog($errorMsg);

                session()->flash('errorMessage', $error);
                return redirect('investor/create');
            }
        }

        if (!empty($industryTypeBusiness)) {
            foreach ($industryTypeBusiness as $val) {
                $insertInvestorIndustryDetails = InvestorIndustryBusiness::query()->insert(['investor_id' => $investorId, 'ind_cat' => $val]);

                // If saving the record in InvestorDetail Model failed
                if (!$insertInvestorIndustryDetails) {
                    DB::rollBack();

                    // Log the error
                    $errorMsg = "Investor Registration Failed : InvestorIndustryBusiness Model  $email";
                    $this->generateLog($errorMsg);

                    session()->flash('errorMessage', $error);
                    return redirect('investor/create');
                }
            }
        }

        // If we reach here, then data is valid and working. Commit the queries!
        DB::commit();

        //sending the email on registration
        $code = Str::random(16);

        //updating user account table for confirmation code
        UserAccount::query()->where('profile_str', $investorId)->update(['email_verification_code' => $code]);
        $data = [
            'companyName' => $name,
            'code' => $code,
        ];
        // dd($email);
        //Mail sending to investor for confirmation
        // Mail::to($email)->send(new confirmed($data));

        if (!empty($request->input('flag'))) {

            $flag = $request->input('flag');

            if ($flag == 1) {
                $amount = 1899;
                $detail = 'Investor Campaign 1899 Membership + 1 Year Magazine Subscription';
                $membership = config('constants.invPlanDetails.405');
                $planId = 405;
            } else {
                $amount = Config('constants.invPlanAmount.' . $request->input('inv_plan'));
                $membership = config('constants.invPlanDetails.' . $request->input('inv_plan'));
                $planId = $request->input('inv_plan');
                $detail = config('constants.invPlanDetails.' . $request->input('inv_plan'));;
            }

            if ($request->input('inv_plan') == 401)
                return view('includes/investor-thanks');

            // NewsLetterController::createNewsLetter($email, "fi");

            $membership = [$membership, 1];
            $gst = request()->gst_no;

            return $this->paymentRequest($amount, $detail, $membership, $planId, $investorId, $gst, '');
        }

        //Return to plan page
        return view('investor.register.investor-plan', compact('investorId'));
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * upgrade investor from myaccount section
     */
    public function upgradeInvestor(Request $request)
    {

        // dd($request->amt);
        if ($request->input('invPlan') == 401) {
            return view('includes/investor-thanks');
        } else {
            $pmode = $request->input('mop');

            if (!array_key_exists($pmode, config('constants.Charges'))) {
                $pmode = "OPTNBK";
            }
          if ($request->has('amt') && $request->amt > 0) {
                // If amt is set and has a value
                $amount_str = $request->amt;
                $cleaned = preg_replace('/[^\d.]/', '', $amount_str); // Remove non-numeric characters (except decimal)
                
                // Convert to float
                $amount_float = (float)$cleaned; 

                // Convert to integer (truncate decimal)
                $amount_int = (int)$amount_float; 

                // Final amount
                $amount = $amount_int;
            } else {
                // If amt is not provided, use configuration values
                $amount = Config('constants.invPlanAmount.' . $request->input('invPlan'));
                
                // Apply tax (18%)
                $amount = $amount + (($amount * 18) / 100);

                // Get mode of payment charges
                $mop = config('constants.Charges.' . $pmode);
            }

           
            // $amount = round($amount + $amount * ($mop) / 100);
           

            // dd($amount);


            $investorId = $request->input('investorId');
            $membership = config('constants.invPlanDetails.' . $request->input('invPlan'));
            $planId = $request->input('invPlan');
            $detail = config('constants.invPlanDetails.' . $request->input('invPlan'));;
            $gst = $request->gst_no;
            $promocode = $request->coupon;

            return $this->paymentRequest_promo($amount, $detail, $membership, $planId, $investorId, $gst, $pmode, $promocode);
        }
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * show business details investor profile
     */
    public function viewprofile(Request $request)
    {
        $investorId = $request->user()->profile_str;
        $userData = UserAccount::query()->where('profile_str', $investorId)->first();
        $data = InvestorDetails::query()->where('investor_id', $investorId)->first();
        $industryData = InvestorIndustry::query()->where('investor_id', $investorId)->get();
        $count = UserActivity::query()->where('investor_id', $investorId)->count();
        $membershipDate = $userData;
        $membershipType = $data;
        $credits = InvestorDetails::query()->select('credit_limit', 'total_credits')->where('investor_id', $investorId)->first();
        $membershipDays = PgInvestorPayment::query()->where('investor_id', $investorId)->where('order_status', 1)->first();

        return view('investor/myAccount/viewprofile', compact('data', 'userData', 'count', 'membershipDate', 'membershipType', 'credits', 'membershipDays'), ['industryData' => $industryData]);
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * show investor profile property details
     */
    public function showPersonalDetails(Request $request)
    {
        $investorId = $request->user()->profile_str;
        $personalData = UserAccount::query()->where('profile_str', $investorId)->select('name', 'mobile', 'title', 'reg_source')->first();
        $data = InvestorDetails::query()->where('investor_id', $investorId)->first();
        //
        return view('investor/myAccount/personal-details', compact('data', 'personalData'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * updating  investor profile property details
     */
    public function updatePersonalDetails(Request $request)
    {
        // dd(Cookie::get('invPercentage'));
        // $this->validate($request, [
        //     'invName' => 'required|min:3',
        //     'address' => 'required',
        //     'country' => 'required',
        //     'state' => 'required',
        //     'city' => 'required',
        //     'dob' => 'required',
        //     'pincode' => 'required|numeric',
        // ]);

        $investorId = $request->user()->profile_str;
        $finalmobile = $request->input('chkmobile');
        $otpstatus = $request->input('otpstatus');
        $name = $request->input('invName');
        $address = $request->input('address');
        $country = config('location.countryName.' . $request->input('country'));
        $pincode = $request->input('pincode');
        $state = $request->input('state');
        $city = $request->input('city');
        $dob = $request->input('dob');
        if ($request->input('chkmobile') == '' && ($request->input('reg_source') == 'google' || $request->input('reg_source') == 'facebook') && $request->input('mobile') != '') {
            if ($otpstatus == 1) {
                $finalmobile = $request->input('mobile');
                $userChk = UserAccount::query()->where('mobile', $finalmobile)->first();
                if ($userChk == null) {
                    $finalmobile = $request->input('mobile');
                } else {
                    session()->flash('errorMessage', 'Error! Mobile number already used');
                    return redirect('/investor/myaccount/personaldetails');
                }
            } else {
                session()->flash('errorMessage', 'Error! Otp Mismatched');
                return redirect('/investor/myaccount/personaldetails');
            }
        }
        // Insert into UserAccount Model
        $updateUser = UserAccount::query()->where('profile_str', $investorId)->update(['name' => $name, 'title' => request()->title, 'mobile' => $finalmobile]);


        // If saving the record in User Model failed
        if (!$updateUser) {
            DB::rollBack();

            // Log the error
            $errorMsg = "updation of investor personal details : UserAccount Model . $investorId";
            $this->generateLog($errorMsg);

            // Flash the error message in client window
            session()->flash('errorMessage', "Update Failed");

            // return back to the investor registration page
            return redirect('investor/myaccount/personaldetails');
        }

        //updating records
        $updatePersonalDetails = InvestorDetails::query()->where('investor_id', $investorId)
            ->update([
                'inv_address' => $address,
                'secondary_email' => $request->secondary_email,
                'secondary_phone_no' => $request->secondary_mobile,
                'inv_country' => $country,
                'inv_pincode' => $pincode,
                'inv_state' => $state,
                'inv_city' => $city,
                'dob' => $dob,
                'landmark' => $request->landmark,
            ]);

        if (!$updatePersonalDetails) {
            // Log the error
            $errorMsg = "updation of investor personal details : InvestorDetail Model . $investorId";
            $this->generateLog($errorMsg);

            session()->flash('errorMessage', 'Update Failed');
            return redirect('/investor/myaccount/personaldetails');
        }
        $this->setPercentage();
        $this->recordUpdateTime();

        //add event statement for event investors 14-06-2024
        $profile_percentage = (Cookie::get('invPercentage'));
        // dd($profile_percentage);
        $credit_points = InvestorDetails::query()->where('investor_id', $request->user()->profile_str)->first();
        if ($request->input('reg_source') == 'DelhiExpoPaid' && $profile_percentage > 59 && $profile_percentage < 100 && $credit_points->event_credit_status == 0) {

            // dd($profile_percentage,$credit_points->total_credits,$credit_points->event_credit_status);
            $credit_add = InvestorDetails::query()->where('investor_id', $investorId)->update(['total_credits' => 5, 'event_credit_status' => '1', 'credit_limit' => 5]);
            // echo $credit_add;exit;
        } else if ($request->input('reg_source') == 'DelhiExpoPaid'  && $profile_percentage == 100 &&               $credit_points->event_credit_status == 1) {
            $newCreditLimit = $credit_points->credit_limit + 2;

            $credit_add = InvestorDetails::query()->where('investor_id', $investorId)->update(['total_credits' => 7, 'event_credit_status' => '2', 'credit_limit' => $newCreditLimit]);
            // dd($credit_add);

        }
        //add event statement for event investors 14-06-2024
        //redirecting to the same page with successful flash data
        session()->flash('Success', 'Successfully Updated');
        return redirect('/investor/myaccount/personaldetails');
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * show business details investor profile
     */
    public function showBusinessDetails(Request $request)
    {
        $data = InvestorDetails::query()->where('investor_id', $request->user()->profile_str)->first();
        $industryData = InvestorIndustryBusiness::query()->where('investor_id', $request->user()->profile_str)->get()->pluck('ind_cat')->toArray();
        return view('investor/myAccount/businessDetails', compact('data', 'industryData'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * updating business details investor profile
     */
    public function updateBusinessDetails(Request $request)
    {
        $investorId = $request->user()->profile_str;
        $industryTypeBusiness = $request->input('industry_type_business');

        //updating records
        $update = InvestorDetails::query()->where('investor_id', $investorId)->update([
            'edu_qualification' => $request->input('qualification'),
            'franchise_experience' => $request->input('experience_in_franchise'),
            'franchising_brand_name' => $request->input('franchise_brand_name'),
            'occupation' => $request->input('occupation'),
            'service_type' => $request->input('company_service'),
            'service_company_name' => $request->input('company_service_name'),
            'business_company_name' => $request->input('company_business_name')
        ]);



        if (!$update) {

            // Log the error
            $errorMsg = "updation of investor business details : InvestorDetail Model . $investorId";
            $this->generateLog($errorMsg);

            session()->flash('errorMessage', 'Update Failed');
            return redirect('/investor/myaccount/businessdetails');
        }


        InvestorIndustryBusiness::query()->where('investor_id', $investorId)->delete();


        if (!empty($industryTypeBusiness)) {
            foreach ($industryTypeBusiness as $val) {


                $insertInvestorIndustryDetails = InvestorIndustryBusiness::query()->insert(['investor_id' => $investorId, 'ind_cat' => $val]);

                // If saving the record in InvestorDetail Model failed
                if (!$insertInvestorIndustryDetails) {
                    DB::getFacadeRoot()->rollback();

                    // Log the error
                    $errorMsg = "Investor Registration Failed : InvestorIndustryBusiness Model  $investorId";
                    $this->generateLog($errorMsg);

                    session()->flash('errorMessage', 'Update Failed');
                    return redirect('investor/create');
                }
            }
        }
        $this->recordUpdateTime();
        $this->setPercentage();

        //redirecting to the same page with successful flash data
        session()->flash('Success', 'Successfully Updated');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * show business details investor profile
     */
    public function showJobDetails(Request $request)
    {
        $investorId = $request->user()->profile_str;
        $data = InvestorDetails::query()->where('investor_id', $investorId)->select('is_job_experience', 'industry_job', 'no_of_years_exp', 'other_industry')->first();
        return view('investor/myAccount/job-details', compact('data'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * updating business details investor profile
     */
    public function updateJobDetails(Request $request)
    {
        $investorId = $request->user()->profile_str;
        $jobDetailInvestor = $request->input('jobDetailInvestor');
        $jobIndustryType = $request->input('job_industry_type');
        $jobNumberOfYears = $request->input('job_number_of_years');
        $anyOtherIndustry = $request->input('any_other_industry');

        //updating records
        $update = InvestorDetails::query()->where('investor_id', '=', $investorId)
            ->update([
                'is_job_experience' => $jobDetailInvestor,
                'industry_job' => $jobIndustryType,
                'no_of_years_exp' => $jobNumberOfYears,
                'other_industry' => $anyOtherIndustry
            ]);
        if (!$update) {
            // Log the error
            $errorMsg = "updation of investor Job details : InvestorDetail Model . $investorId";
            $this->generateLog($errorMsg);

            $error = "Update Failed";
            session()->flash('errorMessage', $error);
            session()->flash('failed', 'Update Failed');
            return redirect('/investor/myaccount/jobdetails');
        }
        $this->setPercentage();
        $this->recordUpdateTime();
        //redirecting to the same page with successful flash data
        session()->flash('Success', 'Successfully Updated');
        return redirect('/investor/myaccount/jobdetails');
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * show investment details for edit
     */
    public function showinvestmentdetails(Request $request)
    {
        $investorId = $request->user()->profile_str;
        $data = InvestorDetails::query()->where('investor_id', $investorId)->first();
        $industryDataInterestedIn = InvestorIndustry::query()->where('investor_id', $investorId)->get()->pluck('ind_main_cat')->toArray();
        return view('investor/myAccount/investment-details', compact('data', 'industryDataInterestedIn'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * update investment details for edit
     */
    public function updateinvestmentdetails(Request $request)
    {
        //  Validation rules, in case of error
        $this->validate($request, [
            'industry_type' => 'required',
            'investment_range' => 'required',
            'investment_date' => 'required'
        ]);

        $investorId = $request->user()->profile_str;
        $industryType = $request->input('industry_type');
        $investmentRange = $request->input('investment_range');

        $update = InvestorDetails::query()->where('investor_id', $investorId)->update([
            'income_range' => request()->income_range,
            'inv_amt' => $investmentRange,
            'investment_min' => config('constants.InvestRangeUpdate.' . $investmentRange . '.min'),
            'investment_max' => config('constants.InvestRangeUpdate.' . $investmentRange . '.max'),
            'investment_time' => $request->input('investment_date'),
            'master_franchise_invest' => $request->input('interest_master_franchise'),
            'loan_required' => $request->input('loan_interest'),
            'state_looking_business' => $request->input('business_state_looking'),
            'city_looking_business' => $request->input('business_city_looking'),
            'looking_for' => implode(',', $request->input('looking_for')),
        ]);

        if (!$update) {
            // Log the error
            $errorMsg = "updation of investor investment details : InvestorDetail Model . $investorId";
            $this->generateLog($errorMsg);

            session()->flash('errorMessage', 'Update Failed');
            return redirect('/investor/myaccount/investmentdetails');
        }

        //deleting previous records
        InvestorIndustry::query()->where('investor_id', $investorId)->delete();

        foreach ($industryType as $val) {
            $insertInvestorIndustryDetails = InvestorIndustry::query()->insert(['investor_id' => $investorId, 'ind_main_cat' => $val]);

            // If saving the record in InvestorDetail Model failed
            if (!$insertInvestorIndustryDetails) {
                // Log the error
                $errorMsg = "updation of investor investment details : InvestorIndustry Model . $investorId";
                $this->generateLog($errorMsg);

                session()->flash('errorMessage', 'Update Failed');
                return redirect('investor/myaccount/investmentdetails');
            }
        }

        $this->recordUpdateTime();

        //redirecting to the same page with successful flash data
        session()->flash('Success', 'Successfully Updated');
        return redirect('/investor/myaccount/investmentdetails');
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * show investor profile property details
     */
    public function showPropertyDetails(Request $request)
    {
        $data = InvestorDetails::query()->where('investor_id', $request->user()->profile_str)->first();
        // dd($data);
        return view('investor/myAccount/property-details', compact('data'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * updating  investor profile property details
     */
    public function updatePropertyDetails(Request $request)
    {
        // dd($request->all());
        $investorId = $request->user()->profile_str;
        $update = InvestorDetails::query()->where('investor_id', $investorId)
            ->update([
                'prop_address' => ($request->input('property_use') != 0 ? $request->input('prop_address') : ""),
                'area_req_min' => ($request->input('property_use') != 0 ? $request->input('min_area') : 0),
                'area_req_max' => ($request->input('property_use') != 0 ? $request->input('max_area') : 0),
                // 'area_type' => $request->input('area_type'),
                'property_type' => $request->input('property_use'),
            ]);
        // dd($update);
        if (!$update) {
            // Log the error
            $errorMsg = "updation of investor property details : InvestorDetail Model . $investorId";
            $this->generateLog($errorMsg);

            session()->flash('errorMessage', 'Update Failed');
            return redirect('/investor/myaccount/propertydetails');
        }

        $this->recordUpdateTime();

        //Setting profile completion percentage
        $this->setPercentage();

        //redirecting to the same page with successful flash data
        session()->flash('Success', 'Successfully Updated');
        return redirect('/investor/myaccount/propertydetails');
    }

    /**
     * @return Factory|View
     */
    public function showPassword()
    {
        return view('investor/myAccount/changepassword');
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * updating investor profile password
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|min:6',
            'password_again' => 'required|same:new_password',
        ]);

        $investorId = $request->user()->profile_str;
        $oldPassword = UserAccount::query()->where('profile_str', '=', $investorId)->select('password')->first();

        if (!Hash::check($request->password, $oldPassword->password)) {
            session()->flash('failed', 'Password did not match please try again with correct password');
            return redirect('investor/myaccount/changepassword');
        }

        $update = UserAccount::query()->where('profile_str', $investorId)->update(['password' => Hash::make($request->new_password)]);


        if (!$update) {
            // Log the error
            $errorMsg = "updation of investor password details : UserAccount Model . $investorId";
            $this->generateLog($errorMsg);

            // Flash the error message in client window
            session()->flash('errorMessage', "update failed");
            session()->flash('failed', 'Update Failed');

            // return back to the franchisor registration page
            return redirect('investor/myaccount/changepassword');
        }
        $this->recordUpdateTime();
        //redirecting to the same page with successful flash data
        session()->flash('Success', 'Password Successfully Updated');
        return redirect('investor/myaccount/changepassword');
    }

    /**
     * @return Factory|RedirectResponse|Redirector|View
     * show feedback form investor profile
     */
    public function showFeedback()
    {
        return view('investor/myAccount/feedback');
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * show Dashboard form investor profile
     */
    public function viewDashboard(Request $request)
    {
        // Initialization
        $viewedFranData = '';
        $expIntFranData = '';
        $investorId = $request->user()->profile_str;
        $userAccountData = UserAccount::select('email', 'name', 'membership_type', 'membership_plan', 'profile_type', 'reg_source', 'profile_status')->where('profile_str', $investorId)->where('reg_source', 'DelhiExpoPaid')->first();
        // dd($userAccountData);
        if ($request->user()->membership_type == 1) {
            $paymentDetail = PgInvestorPayment::query()->select('order_status', 'expiry_date')
                ->where('investor_id', $investorId)
                ->where('order_status', 1)
                ->where('payment_status', 1)
                ->first();
            if ($paymentDetail && $paymentDetail->count() > 0) {
                // Via the global helper...
                session(['membership_expiry' => $paymentDetail->expiry_date]);
            }
        }

        // Fetch 10 records for Expressed Interest
        $expIntBrands = UserActivity::query()->select('franchisor_id', 'visit_date')
            ->where('investor_id', $investorId)
            ->orderBy('clickID', 'DESC')
            ->take(10)
            ->get();

        if (count($expIntBrands) > 0) {
            $expIntFranIdArr = array_column($expIntBrands->toArray(), 'franchisor_id');
            // Fetch Brand details for Viewed by brand
            $expIntFranData = FranchisorBusinessDetail::query()->select(
                'company_logo',
                'membership_type',
                'company_name',
                'franchisor_id',
                'fran_detail_id',
                'profile_name'
            )
                ->whereIn('franchisor_id', $expIntFranIdArr)
                ->get();
        }

        // Total Count of Expressed Interest
        $count = UserActivity::query()->where('investor_id', $investorId)
            ->count();

        // Fetch records for Viewed by brand
        $viewedBrands = UserViewBrand::query()->select('franchisor_id', 'visit_date')
            ->where('investor_id', $investorId)
            ->orderBy('visit_date', 'DESC')
            ->take(10)
            ->get();

        if (count($viewedBrands) > 0) {
            $viewedFranIdArr = array_column($viewedBrands->toArray(), 'franchisor_id');

            // Fetch Brand details for Viewed by brand
            $viewedFranData = FranchisorBusinessDetail::query()->select(
                'company_logo',
                'membership_type',
                'company_name',
                'franchisor_id',
                'fran_detail_id',
                'profile_name'
            )
                ->whereIn('franchisor_id', $viewedFranIdArr)
                ->get();
        }

        $credits = InvestorDetails::query()->select('credit_limit', 'total_credits')->where('investor_id', $investorId)->first();
        $membershipDays = PgInvestorPayment::query()->where('investor_id', $investorId)->where('order_status', 1)->first();


        return view('investor/myAccount/dashboard', compact('count', 'expIntBrands', 'expIntFranData', 'viewedBrands', 'viewedFranData', 'credits', 'membershipDays', 'userAccountData'));
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * show Expressed interest form investor profile
     */
    public function expressInterest(Request $request)
    {
        $investorId = $request->user()->profile_str;
        $count = UserActivity::query()->where('investor_id', $investorId)->count();
        $eiData = UserActivity::query()->where('investor_id', $investorId)->orderBy('clickID', 'DESC')->paginate(15);
        $franchisorData = UserAccount::query()->leftJoin('franchisor_business_details', 'user_accounts.profile_str', '=', 'franchisor_business_details.franchisor_id')
            ->whereIn('user_accounts.profile_str', $eiData->pluck('franchisor_id'))
            ->get();
        $credits = InvestorDetails::query()->select('credit_limit', 'total_credits')->where('investor_id', $investorId)->first();
        $membershipDays = PgInvestorPayment::query()->where('investor_id', $investorId)->where('order_status', 1)->first();
        //Pass data to view
        //return view('investor/myAccount/expressed-interest', compact('count', 'franchisorData', 'membershipDate', 'membershipType', 'eiData', 'credits', 'membershipDays'));
        return view('investor/myAccount/expressed-interest', compact('count', 'franchisorData', 'eiData', 'credits', 'membershipDays'));
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * show Response Manager form investor profile
     */
    public function responseManager(Request $request)
    {
        $investorId = $request->user()->profile_str;
        $count = UserActivity::query()->where('investor_id', $investorId)->count();
        $membershipDate = UserAccount::query()->where('profile_str', $investorId)->select('created_at', 'name')->first();
        $membershipType = InvestorDetails::query()->where('investor_id', $investorId)->select('membership_type')->first();
        $credits = InvestorDetails::query()->select('credit_limit', 'total_credits')->where('investor_id', $investorId)->first();
        $membershipDays = PgInvestorPayment::query()->where('investor_id', $investorId)->where('order_status', 1)->first();
        return view('investor/myAccount/response-manager', compact('count', 'membershipDate', 'membershipType', 'credits', 'membershipDays'));
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function paymentPlan(Request $request)
    {
        $paymentDetail = OnlinePayment::query()->where('profile_id', $request->user()->profile_str)->first();
        return view('investor/myAccount/paymentplan', compact('paymentDetail'));
    }

    /**
     * Setting profile completion percentage method
     */
    public static function setPercentage()
    {
        $value = 0;
        $name = "invPercentage";
        $investorData = InvestorDetails::query()->where('investor_id', request()->user()->profile_str)->first();
        $industryData = InvestorIndustry::query()->where('investor_id', request()->user()->profile_str)->first();
        $userAccountData = UserAccount::query()->where('profile_str', request()->user()->profile_str)->first();


        if (!empty($industryData)) {
            $value = $value + 5;
        }

        if (!empty($investorData)) {
            if (!empty($investorData->inv_address))
                $value = $value + 5;
            if (!empty($investorData->inv_country))
                $value = $value + 5;
            if (!empty($investorData->inv_state))
                $value = $value + 5;
            if (!empty($investorData->inv_city))
                $value = $value + 5;
            if (!empty($investorData->inv_pincode))
                $value = $value + 5;
            if (!empty($investorData->occupation))
                $value = $value + 4;
            if (!empty($investorData->dob))
                $value = $value + 1;
            if (!empty($investorData->edu_qualification))
                $value = $value + 1;
            if (!empty($investorData->inv_amt))
                $value = $value + 5;
            if (!empty($investorData->investment_time))
                $value = $value + 4;
            if (empty($investorData->is_prop_commercial))
                $value = $value + 16;
            if (!empty($investorData->is_prop_commercial)) {
                if (!empty($investorData->prop_address))
                    $value = $value + 4;
                if (!empty($investorData->area_req_min))
                    $value = $value + 4;
                if (!empty($investorData->property_type))
                    $value = $value + 5;
                $value = $value + 3;
            }


            if (empty($investorData->is_current_business))
                $value = $value + 9;

            if ($investorData->is_current_business == 1) {
                if (!empty($investorData->industry_business))
                    $value = $value + 2;
                if (!empty($investorData->no_of_years_business))
                    $value = $value + 2;
                if (!empty($investorData->no_of_employees))
                    $value = $value + 2;
                if (!empty($investorData->business_desc))
                    $value = $value + 1;
                $value = $value + 2;
            }
            if (empty($investorData->is_job_experience))
                $value = $value + 10;

            if (!empty($investorData->is_job_experience)) {
                if (!empty($investorData->industry_job))
                    $value = $value + 4;
                if (!empty($investorData->no_of_years_exp))
                    $value = $value + 3;
                if (!empty($investorData->other_industry))
                    $value = $value + 3;
            }

            //interested in loan(2) & interested in master franchise (2)
            $value = $value + 4;
        }
        if (!empty($userAccountData->mobile)) {
            $value = $value + 5;
        }
        if (request()->user()->membership_type == 1)
            $value = $value + 6;

        if (!empty(request()->user()->name))
            $value = $value + 5;

        // dd($name,$value);
        Cookie::queue($name, $value);
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function viewInvesterLogin(Request $request)
    {

        if (!$request->user())
            return view('inv-campaign.investlogin');

        if ($request->user()->profile_type != config('constants.ProfileType.Investor')) {
            session()->flush();
            return view('inv-campaign.investlogin');
        }

        if ($request->user()->membership_type == 1)
            return redirect('/');

        if (empty($request->user()->mobile))
            return view('inv-campaign.update-social-inv-form');

        $investorId = $request->user()->profile_str;
        $amount = 1899;
        $detail = 'Investor Campaign 1899 Membership + 1 Year Magazine Subscription';
        $membership = config('constants.invPlanDetails.405');
        $planId = 405;
        $gst = $request->gst_no;

        return $this->paymentRequest($amount, $detail, $membership, $planId, $investorId, $gst, '');
    }

    /**
     * @return Factory|View|mixed
     */
    public function viewInvQuickRegForm()
    {
        if (!empty(request()->user()) && request()->user()->profile_type == 1)
            return redirect('franchisor/myaccount/dashboard');

        $flag = 1;
        return view('investor/register/investor-quick-registration', compact('flag'));
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function updateCampaignInfo(Request $request)
    {
        //  Validation rules, in case of error
        $this->validate($request, [
            'invName' => 'required|min:3',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'mobile' => 'required|numeric',
            'pincode' => 'required|numeric',
        ]);

        // Fetch values from the request
        $investorId = $request->user()->profile_str;
        $name = $request->input('invName');
        $address = $request->input('address');
        $country = config('location.countryName.' . $request->input('country'));
        $pincode = $request->input('pincode');
        $state = $request->input('state');
        $city = $request->input('city');
        $mobile = $request->input('mobile');


        // Insert into UserAccount Model
        UserAccount::query()->where('profile_str', $investorId)
            ->update([
                'name' => $name,
                'mobile' => $mobile
            ]);

        // Insert values in InvestorDetail Model
        InvestorDetails::query()->where('investor_id', $investorId)
            ->update([
                'inv_address' => $address,
                'inv_country' => $country,
                'inv_pincode' => $pincode,
                'inv_state' => $state,
                'inv_city' => $city,
            ]);

        $this->recordUpdateTime();

        $amount = 1899;
        $detail = 'Investor Campaign 1899 Membership + 1 Year Magazine Subscription';
        $membership = config('constants.invPlanDetails.405');
        $planId = 405;
        $gst = $request->gst_no;

        return $this->paymentRequest($amount, $detail, $membership, $planId, $investorId, $gst, '');
    }

    /**
     * @param $amount
     * @param $detail
     * @param $membership
     * @param $planId
     * @param $investorId
     * @return Factory|RedirectResponse|Redirector|View
     */
    private function paymentRequest($amount, $detail, $membership, $planId, $investorId, $gst, $pmode)
    {
        $checkCampaign = 0;

        if (is_array($membership)) {
            $membership = $membership[0];
            $checkCampaign = 1;
        }

        $invData = InvestorDetails::query()->select('investor_id', 'inv_city', 'inv_state', 'inv_country', 'inv_address')->where('investor_id', $investorId)->first();
        $userData = UserAccount::query()->select('name', 'email', 'mobile')->where('profile_str', $investorId)->first();

        $country = 'India';
        $name = $userData->name;
        $email = $userData->email;
        $phone = $userData->mobile;
        $city = $invData->inv_city;
        // $amount = $amount;
        $address = $invData->inv_address . ',' . $invData->inv_city . ',' . $invData->inv_state . ', ' . $country;

        //payment
        $txnData = new PgInvestorPayment;
        $txnData->investor_id = $investorId;
        $txnData->amount = $amount;
        $txnData->membership_action = $detail;
        $txnData->name = $name;
        $txnData->phone = $phone;
        $txnData->address = $address;
        $txnData->email = $email;

        // Send Email to Investor Acquisition team for Paid Membership pitching

        $data = "<table> <tr> <td>Name : </td><td>" . $name . "</td></tr><tr> <td>Email : </td><td>" . $email . "</td></tr><tr> <td>Mobile No. : </td><td>" . $phone . "</td></tr><tr> <td>Investor Id : </td><td>" . $investorId . "</td></tr><tr> <td>Address : </td><td>" . $address . ", City: " . $city . ", State: " . $invData->inv_state . ", Country: " . $country . "</td></tr><tr> <td>Time Of Payment : </td><td>" . date('Y-m-d H:i:s') . "</td></tr></table>";

        // *******commented for testing**********
        // Mail::to('techsupport@franchiseindia.net')->send(new RawMail($data, array('subject' => 'Investor Payment Initiated', 'from' => 'no-reply@franchiseindia.com', 'attachment' => '')));

        // End of Email to Investor Acquisition team


        if ($checkCampaign == 1)
            $txnData->is_campaign = $checkCampaign;

        $txnData->country = $country;
        $txnData->membership_type = $membership;
        $txnData->client_ip = request()->ip();

        $txnData->payment_status = config('hdfcpg.paymentStatus.Initiated');
        $txnData->order_status = config('hdfcpg.paymentStatus.Initiated');

        if ($txnData->save()) {
            $tranId = $txnData->investor_pay_id;
        } else {
            return redirect('investor/myaccount/dashboard');
        }

        //Insert record into online payment table
        OnlinePayment::query()->insert([
            'order_no' => $tranId,
            'profile_type' => 2,
            'profile_id' => $investorId,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'country' => $country,
            'product_details' => $detail,
            'membership_plan' => $planId,
            'mopt' => $pmode,
            'amount' => $amount,
            'gst_no' => $gst,
            'payment_status' => 0
        ]);

        if (!empty(request()->user()))
            $this->recordUpdateTime();

        $paymentController = new PaymentController();

        $track_id = $tranId;
        $order_id = "order_id=" . urlencode("InvRegopenPayment_" . $tranId);
        $tid = "tid=" . urlencode(rand() . $track_id);
        $merchant_id = "merchant_id=" . urlencode(Config('hdfcpgnew.merchantKey'));
        $amount = "amount=" . urlencode($amount);
        $currency = "currency=" . urlencode("INR");
        $redirect_url = "redirect_url=" . urlencode(Config('constants.MainDomain') . "/invsuccess");  //Return URL
        $cancel_url = "cancel_url=" . urlencode(Config('constants.MainDomain') . "/invcancelled");  //Return URL
        $language = "language=" . urlencode("EN");
        $billing_name = "billing_name=" . urlencode($name);
        $billing_address = "billing_address=" . urlencode($address);
        $billing_city = "billing_city=" . urlencode("");
        $billing_state = "billing_state=" . urlencode("");
        $billing_zip = "billing_zip=" . urlencode($invData->inv_pincode);
        $billing_country = "billing_country=" . urlencode($invData->inv_country);
        $billing_tel = "billing_tel=" . urlencode($phone);
        $billing_email = "billing_email=" . urlencode($email);
        $payment_option = "payment_option=" . urlencode($pmode);
        $card_type = "card_type=" . urlencode(str_replace("OPT", "", $pmode));
        $merchant_data = $tid . "&" . $merchant_id . "&" . $order_id . "&" . $amount . "&" . $currency . "&" . $redirect_url . "&" . $cancel_url . "&" . $language . "&" . $billing_name . "&" . $billing_address . "&" . $billing_city . "&" . $billing_state . "&" . $billing_zip . "&" . $billing_country . "&" . $billing_tel . "&" . $billing_email . "&" . $payment_option . "&" . $card_type;
        $encrypted_data = $paymentController->encrypt($merchant_data, Config('hdfcpgnew.workingKey')); // Method for encrypting the data.
        $access_code_new = Config('hdfcpgnew.accessCode');
        // dd($access_code_new);
        return view('payment.payment-request')->with(compact('encrypted_data', 'access_code_new'));
    }

    private function paymentRequest_promo($amount, $detail, $membership, $planId, $investorId, $gst, $pmode, $promocode)
    {
        $checkCampaign = 0;

        if (is_array($membership)) {
            $membership = $membership[0];
            $checkCampaign = 1;
        }

        $invData = InvestorDetails::query()->select('investor_id', 'inv_city', 'inv_state', 'inv_country', 'inv_address')->where('investor_id', $investorId)->first();
        $userData = UserAccount::query()->select('name', 'email', 'mobile')->where('profile_str', $investorId)->first();

        $country = 'India';
        $name = $userData->name;
        $email = $userData->email;
        $phone = $userData->mobile;
        $city = $invData->inv_city;
        // $amount = $amount;
        $address = $invData->inv_address . ',' . $invData->inv_city . ',' . $invData->inv_state . ', ' . $country;

        //payment
        $txnData = new PgInvestorPayment;
        $txnData->investor_id = $investorId;
        $txnData->amount = $amount;
        $txnData->membership_action = $detail;
        $txnData->name = $name;
        $txnData->phone = $phone;
        $txnData->address = $address;
        $txnData->email = $email;

        // Send Email to Investor Acquisition team for Paid Membership pitching

        $data = "<table> <tr> <td>Name : </td><td>" . $name . "</td></tr><tr> <td>Email : </td><td>" . $email . "</td></tr><tr> <td>Mobile No. : </td><td>" . $phone . "</td></tr><tr> <td>Investor Id : </td><td>" . $investorId . "</td></tr><tr> <td>Address : </td><td>" . $address . ", City: " . $city . ", State: " . $invData->inv_state . ", Country: " . $country . "</td></tr><tr> <td>Time Of Payment : </td><td>" . date('Y-m-d H:i:s') . "</td></tr></table>";

        // *******commented for testing**********
        // Mail::to('techsupport@franchiseindia.net')->send(new RawMail($data, array('subject' => 'Investor Payment Initiated', 'from' => 'no-reply@franchiseindia.com', 'attachment' => '')));

        // End of Email to Investor Acquisition team


        if ($checkCampaign == 1)
            $txnData->is_campaign = $checkCampaign;

        $txnData->country = $country;
        $txnData->membership_type = $membership;
        $txnData->client_ip = request()->ip();

        $txnData->payment_status = config('hdfcpg.paymentStatus.Initiated');
        $txnData->order_status = config('hdfcpg.paymentStatus.Initiated');

        if ($txnData->save()) {
            $tranId = $txnData->investor_pay_id;
        } else {
            return redirect('investor/myaccount/dashboard');
        }

        //Insert record into online payment table
        OnlinePayment::query()->insert([
            'order_no' => $tranId,
            'profile_type' => 2,
            'profile_id' => $investorId,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'country' => $country,
            'product_details' => $detail,
            'membership_plan' => $planId,
            'mopt' => $pmode,
            'amount' => $amount,
            'gst_no' => $gst,
            'promo_code' => $promocode,
            'payment_status' => 0
        ]);

        if (!empty(request()->user()))
            $this->recordUpdateTime();

        $paymentController = new PaymentController();

        $track_id = $tranId;
        $order_id = "order_id=" . urlencode("InvRegopenPayment_" . $tranId);
        $tid = "tid=" . urlencode(rand() . $track_id);
        $merchant_id = "merchant_id=" . urlencode(Config('hdfcpgnew.merchantKey'));
        $amount = "amount=" . urlencode($amount);
        $currency = "currency=" . urlencode("INR");
        $redirect_url = "redirect_url=" . urlencode(Config('constants.MainDomain') . "/invsuccess");  //Return URL
        $cancel_url = "cancel_url=" . urlencode(Config('constants.MainDomain') . "/invcancelled");  //Return URL
        $language = "language=" . urlencode("EN");
        $billing_name = "billing_name=" . urlencode($name);
        $billing_address = "billing_address=" . urlencode($address);
        $billing_city = "billing_city=" . urlencode("");
        $billing_state = "billing_state=" . urlencode("");
        $billing_zip = "billing_zip=" . urlencode($invData->inv_pincode);
        $billing_country = "billing_country=" . urlencode($invData->inv_country);
        $billing_tel = "billing_tel=" . urlencode($phone);
        $billing_email = "billing_email=" . urlencode($email);
        $payment_option = "payment_option=" . urlencode($pmode);
        $card_type = "card_type=" . urlencode(str_replace("OPT", "", $pmode));
        $merchant_data = $tid . "&" . $merchant_id . "&" . $order_id . "&" . $amount . "&" . $currency . "&" . $redirect_url . "&" . $cancel_url . "&" . $language . "&" . $billing_name . "&" . $billing_address . "&" . $billing_city . "&" . $billing_state . "&" . $billing_zip . "&" . $billing_country . "&" . $billing_tel . "&" . $billing_email . "&" . $payment_option . "&" . $card_type;
        $encrypted_data = $paymentController->encrypt($merchant_data, Config('hdfcpgnew.workingKey')); // Method for encrypting the data.
        $access_code_new = Config('hdfcpgnew.accessCode');
        // dd($access_code_new);
        return view('payment.payment-request')->with(compact('encrypted_data', 'access_code_new'));
    }

    /**
     * @param $errorMsg
     */
    private function generateLog($errorMsg)
    {
        Log::getFacadeRoot()->critical($errorMsg);
    }

    /**
     * Recommendations for Investor
     * @return Factory|View
     */
    public function getRecommendations()
    {
        if (request()->user()->membership_plan == 401)
            return redirect('investor/myaccount/dashboard');

        $investorId = request()->user()->profile_str;
        $userData = UserAccount::query()->where('profile_str', $investorId)->first();
        $applications = UserActivity::query()->where('investor_id', $investorId)->get();
        $count = count($applications);
        $membershipDate = $userData;

        //getting remaining number of credits for logged in user if have any
        $credits = InvestorDetails::query()->select('credit_limit', 'total_credits')->where('investor_id', $investorId)->first();

        $industryData = InvestorIndustry::query()->select('ind_main_cat')->where('investor_id', $investorId)->get();

        //getting remaining membership days
        $membershipDays = PgInvestorPayment::query()->where('investor_id', $investorId)->where('order_status', 1)->first();

        //getting recommended brands from insert leads table
        $recommendations = InsertLead::query()->whereNotIn('franchisor_id', $applications->pluck('franchisor_id'))->where('is_recommend', 1)->select('franchisor_id')->where('status', 1)->take(15)->get()->pluck('franchisor_id');

        //Fetching franchisors from business detail table
        $franchisors = FranchisorBusinessDetail::query()->whereIn('franchisor_id', $recommendations)
            ->where('membership_type', 1)->take(15)->get();

        //Fetching franchisors from business detail table if not have the required franchisors
        if (count($franchisors) < 15) {

            $franchisor2 = FranchisorBusinessDetail::query()->whereNull('fibl_brands')
                ->whereNotIn('franchisor_id', $franchisors->pluck('franchisor_id'))->inRandomOrder()->where('membership_type', 1);

            if (!empty($industryData)) {
                $relatedIndustries = $industryData->pluck('ind_main_cat');
                $franchisor2 = $franchisor2->whereIn('ind_main_cat', $relatedIndustries);
            }

            $franchisors = $franchisors->toArray();

            $franchisor2 = $franchisor2->take(15 - count($franchisors))->get()->toArray();
            $franchisors = array_merge($franchisors, $franchisor2);
        }

        //if still the count of recommendations is less
        // if (count($franchisors) < 15) {
        //     $franchisor3 = FranchisorBusinessDetail::query()->whereNotIn('franchisor_id', array_column($franchisors, 'franchisor_id'))->inRandomOrder()->where('membership_type', 1)->take(15 - count($franchisors))->get();
        //     $franchisors = array_merge($franchisors, $franchisor3);
        // }

        if (count($franchisors) < 15) {
            $franchisor3 = FranchisorBusinessDetail::query()
                ->whereNotIn('franchisor_id', array_column($franchisors, 'franchisor_id'))
                ->inRandomOrder()
                ->where('membership_type', 1)
                ->take(15 - count($franchisors))
                ->get();

            $franchisors = array_merge($franchisors, $franchisor3->toArray());
        }


        //fetching states for the franchisors
        if (is_array($franchisors)) {
            $franchisorStates = FranchisorLocState::query()->select('franchisor_id', 'state')->whereIn('franchisor_id', array_column($franchisors, 'franchisor_id'))->get();
            $likeRate = FranchisorLike::query()->whereIn('franchisor_id', array_column($franchisors, 'franchisor_id'))->get();
        } else {
            $franchisorStates = FranchisorLocState::query()->select('franchisor_id', 'state')->whereIn('franchisor_id', $franchisors->pluck('franchisor_id'))->get();
            $likeRate = FranchisorLike::query()->whereIn('franchisor_id', $franchisors->pluck('franchisor_id'))->get();
        }

        return view('investor.myAccount.recommendations', compact('credits', 'membershipDays', 'membershipDate', 'count', 'franchisors', 'franchisorStates', 'likeRate'));
    }

    /**
     * @param $invData
     * @param $source
     * @internal param $data
     */
    public function convertLeadsToInvestor($invData, $source)
    {
        $checkExistingData = UserAccount::query()->where('email', $invData['email'])->count();

        if ($checkExistingData == 0) {

            $code = Str::random(16);
            $investorId = CommonController::profileUniqStr();
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $randomPassword = substr(str_shuffle($permitted_chars), 0, 10);

            UserAccount::query()->insert([
                'name' => $invData['name'],
                'email' => $invData['email'],
                'password' => Hash::getFacadeRoot()->make($randomPassword),
                'mobile' => $invData['mobile'],
                'profile_type' => 2,
                'profile_status' => 2,
                'reg_source' => $source,
                'email_verification_code' => $code,
                'profile_str' => $investorId,
                'membership_plan' => 401,
                'membership_type' => 0
            ]);

            $investmentMin = 0;
            $investmentMax = 0;

            if (!empty($invData['investment_range']) && is_numeric($invData['investment_range'])) {
                $range = Config('constants.InvestRange.' . $invData['investment_range']);
                if (is_array($range)) {
                    $investmentMin = $range['min'];
                    $investmentMax = $range['max'];
                }
            }

            InvestorDetails::query()->insert([
                'investor_id' => $investorId,
                'inv_address' => $invData['address'],
                'inv_state' => $invData['state'],
                'inv_city' => $invData['city'],
                'inv_pincode' => $invData['pincode'],
                'inv_amt' => $invData['investment_range'],
                'investment_min' => $investmentMin,
                'investment_max' => $investmentMax,
                'source_type' => 'Insta'
            ]);

            if (!empty($invData['category_id'])) {
                InvestorIndustry::query()->insert([
                    'investor_id' => $investorId,
                    'ind_main_cat' => $invData['category_id'],
                ]);
            }

            //updating user account table for confirmation code
            $data = [
                'companyName' => $invData['name'],
                'password' => $randomPassword,
                'code' => $code,
            ];

            //Mail sending to investor for confirmation
            if (!empty($invData['email'])) {
                Mail::getFacadeRoot()->to($invData['email'])->send(new autoInvestorRegistration($data));
            }
        }

        return;
    }

    /**
     * @return int
     */
    public function checkInvestorExistence()
    {
        $checkExistance = 0;
        if (request()->email != 'fiblbrands@franchiseindia.in')
            $checkExistance = UserAccount::query()->where('email', request()->email)->count();
        return $checkExistance;
    }

    /**
     * Update record timing capturing
     */
    public function recordUpdateTime()
    {
        if (!empty(request()->user())) {
            UserRecord::query()->updateOrCreate([
                'profile_str' => request()->user()->profile_str,
            ], [
                'last_updated_by_user' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
