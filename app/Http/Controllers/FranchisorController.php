<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpressInstaApply;
use App\Models\FranchisorBusinessDetail;
use App\Models\FranchisorFeedback;
use App\Models\FranchisorLocCountry;
use App\Models\FranchisorLocState;
use App\Models\FranchisorMultiUnit;
use App\Models\FranchisorSliderImage;
use App\Models\FranchisorTradePartner;
use App\Models\FranPaymentHistory;
use App\Models\Insta;
use App\Models\CampaignsFranRegister;
use App\Models\LeadDownload;
use App\Mail\confirmed;
use App\Mail\international;
use App\Mail\UpgradeNotice;
use App\Mail\FranchisorPaymentSachin;
use App\Models\OnlinePayment;
use App\Models\ProfileMembership;
use App\Models\UserAccount;
use App\Models\UserActivity;
use App\Models\UserRecord;
use App\Models\BrandUpdateRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FranchisorController extends Controller
{

    /**
     * FranchisorController constructor.
     */
    public function __construct()
    {
        $this->middleware('franAuth')->except('advertisewithussubmit', 'advertisewithuspayment', 'viewFranchisorRegistrationForm', 'getFranchisorDetails', 'uniqueRandomNumber', 'postFranchisor', 'firstStepSubmit', 'secondStepSubmit', 'thirdStepSubmit', 'fourthStepSubmit', 'fifthStepSubmit', 'finalStepSubmit', 'planSubmit');
    }

    /**
     * show franchisor registration form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function viewFranchisorRegistrationForm()
    {
        if (request()->user()) {
            if (request()->user()->profile_type == config('constants.ProfileType.Franchisor'))
                return redirect('franchisor/myaccount/dashboard');

            if (request()->user()->profile_type == config('constants.ProfileType.Investor'))
                return redirect('investor/myaccount/dashboard');
        }

        if (!empty(request()->source) && request()->source == 'dealer')
            session(['dealerForm' => 'yes']);

        if (!empty(request()->step) && request()->step == 1 && empty(request()->source))
            request()->session()->forget('dealerForm');

        $step = request()->step;

        if (!is_numeric($step) && ($step < 6 || $step > 6))
            abort(403);

        $franchisorId = !empty(request()->franchisorId) ? request()->franchisorId : "";

        $checkRecord = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();

        if ($step != 1 && empty($checkRecord))
            abort(403);

        if (!empty($checkRecord) && $checkRecord->step_completed == 6)
            return redirect('login');

        if (!empty($checkRecord) && $checkRecord->step_completed + 1 < $step)
            return redirect('franchisor/registration/step/' . ($checkRecord->step_completed + 1) . '?franchisorId=' . $franchisorId);

        switch ($step) {
            case 2:
                return $this->getSecondStepForm($franchisorId);
            case 3:
                return $this->getThirdStepForm($franchisorId);
            case 4:
                return $this->getFourthStepForm($franchisorId);
            case 5:
                return $this->getFifthStepForm($franchisorId);
        }

        if ($step == 'final')
            $step = 6;

        return view('franchisor/register/franchisor-registration-step-' . $step, compact('franchisorId'));
    }

    /**
     * @param $franchisorId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function getSecondStepForm($franchisorId)
    {
        $userData = UserAccount::query()->where('profile_str', $franchisorId)->first();
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $tradeData = FranchisorTradePartner::query()->where('franchisor_id', $franchisorId)->get();
        $multiUnitData = FranchisorMultiUnit::query()->where('franchisor_id', $franchisorId)->first();

        return view('franchisor/register/franchisor-registration-step-2', compact('userData', 'franchisorId', 'franData', 'multiUnitData', 'tradeData'));
    }

    /**
     * @param $franchisorId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function getThirdStepForm($franchisorId)
    {
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $country = FranchisorLocCountry::query()->where('franchisor_id', $franchisorId)->select('country_longname')->get();
        $stateOnlyData = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->distinct()->select('state')->pluck('state')->toArray();
        $onlyCity = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->where('city', '!=', '')->select('city')->pluck('city')->toArray();

        return view('franchisor/register/franchisor-registration-step-3', compact('franchisorId', 'franData', 'onlyCity', 'stateOnlyData', 'country'));
    }

    /**
     * @param $franchisorId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function getFourthStepForm($franchisorId)
    {
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();

        $paybackResult[0] = 0;
        if ($franData->payback_period != "0-0 Month" && $franData->payback_period != "") {
            $paybackPeriod = explode('-', $franData->payback_period);
            if (count($paybackPeriod) > 1) {
                $payback = explode(' ', $paybackPeriod[1]);
                $paybackResult[0] = $paybackPeriod[0];
                $paybackResult[1] = $payback[0];
                $paybackResult[2] = $payback[1];
            } else {
                //return 'Hello World';
                $paybackResult[0] = 0;
                $paybackResult[1] = 0;
                $paybackResult[2] = 'Year';
            }
        }
        return view('franchisor/register/franchisor-registration-step-4', compact('franchisorId', 'franData', 'paybackResult'));
    }

    /**
     * @param $franchisorId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function getFifthStepForm($franchisorId)
    {
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        return view('franchisor/register/franchisor-registration-step-5', compact('franchisorId', 'franData'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function firstStepSubmit(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $regSourceValue = !empty(Cookie::get('campaignSource')) ? Cookie::get('campaignSource') : "";

        $checkUser = UserAccount::query()->where('email', $request->input('email'))->first();

        if (!empty($checkUser) && $checkUser->email != 'fiblbrands@franchiseindia.in' && $checkUser->email != 'info@opportunityindia.com' && $checkUser->email != 'info@franglobal.com' && $checkUser->profile_status == 4) {
            $franchisorId = $checkUser->profile_str;
            UserAccount::query()->where('profile_str', $checkUser->email)->update(['profile_type' => 1, 'password' => Hash::getFacadeRoot()->make(request()->password), 'mobile' => request()->mobile]);
            $checkFranchisor = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();

            if (empty($checkFranchisor)) {
                FranchisorBusinessDetail::query()->insert([
                    'franchisor_id' => $franchisorId,
                    'step_completed' => 1,
                    'profile_status' => 4
                ]);

                if (!empty(Cookie::get('campaignSource')))
                    CampaignsFranRegister::query()->create(['franchisor_id' => $franchisorId, 'utm_campaign' => Cookie::get('campaignVersion'), 'utm_source' => Cookie::get('campaignSource')]);

                return $this->getSecondStepForm($franchisorId);
            }

            if ($checkFranchisor->step_completed > 0 && $checkFranchisor->step_completed < 6) {

                switch ($checkFranchisor->step_completed + 1) {
                    case 2:
                        return $this->getSecondStepForm($franchisorId);
                    case 3:
                        return $this->getThirdStepForm($franchisorId);
                    case 4:
                        return $this->getFourthStepForm($franchisorId);
                    case 5:
                        return $this->getFifthStepForm($franchisorId);
                    default:
                        return $this->getSecondStepForm($franchisorId);
                }
            }
        }

        if ($request->input('email') != 'fiblbrands@franchiseindia.in' && $request->input('email') != 'info@opportunityindia.com' && $request->input('email') != 'info@franglobal.com') {
            $this->validate($request, [
                'email' => 'required|email|unique:user_accounts',
            ]);
        }

        $franchisorId = CommonController::profileUniqStr();

        UserAccount::query()->insert([
            'email' => request()->email,
            'mobile' => request()->mobile,
            'password' => Hash::getFacadeRoot()->make(request()->password),
            'profile_str' => $franchisorId,
            'reg_source' => $regSourceValue,
            'profile_type' => config('constants.ProfileType.Franchisor'),
            'profile_status' => 4,
        ]);

        FranchisorBusinessDetail::query()->insert([
            'franchisor_id' => $franchisorId,
            'step_completed' => 1,
            'profile_status' => 4
        ]);

        if (!empty(Cookie::get('franCampaignSource')))
            CampaignsFranRegister::query()->create(['franchisor_id' => $franchisorId, 'utm_campaign' => Cookie::get('franCampaign'), 'utm_source' => Cookie::get('franCampaignSource')]);

        return $this->getSecondStepForm($franchisorId);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function secondStepSubmit(Request $request)
    {

        //  Validation rules, in case of error
        $this->validate($request, [
            'city' => 'required|min:3',
            'country' => 'required',
            'ind_cat' => 'required',
            'ceo_name' => 'required|min:3',
            'ceo_email' => 'required|min:3',
            'ceo_mobile' => 'required|min:10',
            'ind_sub_cat' => 'required',
            'brand_name' => 'required',
            'company_name' => 'required|min:3',
            'fran_manager' => 'required|min:3',
            'ind_main_cat' => 'required',
            'business_desc' => 'required|min:20',
            'operations_start_year' => 'required',
            'franchise_start_year' => 'required'
        ]);

        $franchisorId = $request->franchisorId;
        $profile_name = Str::slug($request->input('brand_name'));
        $pin_code = $request->pincode;
        $state = $request->state;
        $error = config('customErrors.errorType.critical');
        $unitInvMin = 10000;
        $unitInvMax = 50000;
        $lookingTradePartner = 0;
        $lookingFranchise = 0;
        $lookingDealer = 0;
        $franchisorPartnerType = 0;
        $unitInvestment = 0;
        $unitInvBrandFee = "";
        $unitInvRoyalty = "";

        FranchisorMultiUnit::query()->where('franchisor_id', $franchisorId)->delete();
        FranchisorTradePartner::query()->where('franchisor_id', $franchisorId)->delete();

        $outletLocations = @implode(',', $_POST['outlet_locations']);
        $marketingMaterial = $request->input('marketting_material');
        if ($request->input('marketting_material') == "Yes") {
            $marketingMaterial = @implode(',', $_POST['marketting_materials']);
            if (empty($marketingMaterial))
                $marketingMaterial = "Yes";
        }

        if ($request->input('looking_franchise') == config('constants.LookingFor.Franchisor')) {

            $lookingFranchise = 1;
            // dd($request->get('franchise_partner_type'));
            $franchisePartner = $request->get('franchise_partner_type');
            $franchisePartnerCount = $franchisePartner != null;
            $franchisorPartnerType = $franchisePartnerCount == 2 ? 3 : ($franchisePartner[0] == "lookingFrUnit" ? 1 : 2);

            if ($franchisorPartnerType == 3 || $franchisorPartnerType == 1) {
                $unitInvMin = Config('constants.InvestRange.' . $request->input('unit_investment') . '.min');
                $unitInvMax = Config('constants.InvestRange.' . $request->input('unit_investment') . '.max');
                $unitInvestment = $request->input('unit_investment');
                $unitInvBrandFee = $request->input('unitinv_brand_fee');
                $unitInvRoyalty = $request->input('unitinv_royalty');
            }

            if ($franchisorPartnerType != 1) {
                $minArr = [];
                $maxArr = [];
                $countryWise = $request->input('countrywise') == "CountryWise" ? 1 : 0;
                $regionWise = $request->input('regionwise') == "RegionWise" ? 1 : 0;
                $stateWise = $request->input('statewise') == "StateWise" ? 1 : 0;
                $cityWise = $request->input('citywise') == "CityWise" ? 1 : 0;
                if ($countryWise == 1) {
                    $countryMin = Config('constants.InvestRange.' . $request->input('country_investment') . '.min');
                    $countryMax = Config('constants.InvestRange.' . $request->input('country_investment') . '.max');
                    array_push($minArr, $countryMin);
                    array_push($maxArr, $countryMax);
                }
                if ($regionWise == 1) {
                    $regionMin = Config('constants.InvestRange.' . $request->input('region_investment') . '.min');
                    $regionMax = Config('constants.InvestRange.' . $request->input('region_investment') . '.max');
                    array_push($minArr, $regionMin);
                    array_push($maxArr, $regionMax);
                }
                if ($stateWise == 1) {
                    $stateMin = Config('constants.InvestRange.' . $request->input('state_investment') . '.min');
                    $stateMax = Config('constants.InvestRange.' . $request->input('state_investment') . '.max');
                    array_push($minArr, $stateMin);
                    array_push($maxArr, $stateMax);
                }
                if ($cityWise == 1) {
                    $cityMin = Config('constants.InvestRange.' . $request->input('city_investment') . '.min');
                    $cityMax = Config('constants.InvestRange.' . $request->input('city_investment') . '.max');
                    array_push($minArr, $cityMin);
                    array_push($maxArr, $cityMax);
                }

                if (count($minArr) > 0) {
                    $unitInvMin = min($minArr);
                    $unitInvMax = max($maxArr);
                }

                //Inserting data into franchisor multi unit
                $insFranchisorMultiUnit = FranchisorMultiUnit::query()->insert([
                    'franchisor_id' => $franchisorId,
                    'countrywise' => $countryWise,
                    'country_investment' => $request->input('country_investment'),
                    'country_unitfee' => $request->input('country_unitfee'),
                    'country_masterfee' => $request->input('country_masterfee'),
                    'country_royalty' => $request->input('country_royalty'),
                    'regionwise' => $regionWise,
                    'region_investment' => $request->input('region_investment'),
                    'region_unitfee' => $request->input('region_unitfee'),
                    'region_masterfee' => $request->input('region_masterfee'),
                    'region_royalty' => $request->input('region_royalty'),
                    'statewise' => $stateWise,
                    'state_investment' => $request->input('state_investment'),
                    'state_unitfee' => $request->input('state_unitfee'),
                    'state_masterfee' => $request->input('state_masterfee'),
                    'state_royalty' => $request->input('state_royalty'),
                    'citywise' => $cityWise,
                    'city_investment' => $request->input('city_investment'),
                    'city_unitfee' => $request->input('city_unitfee'),
                    'city_masterfee' => $request->input('city_masterfee'),
                    'city_royalty' => $request->input('city_royalty')
                ]);

                // If saving the record in FranchisorMultiUnit Model failed
                if (!$insFranchisorMultiUnit) {
                    DB::getFacadeRoot()->rollback();

                    // Log the error
                    $msg = 'franchisor Registration Failed: FranchisorMultiUnit Model' . $franchisorId;
                    $this->generateLog($msg, $error);

                    // return back to the franchisor registration page
                    return redirect()->back();
                }
            }
        }

        if ($request->input('looking_franchise') == config('constants.LookingFor.TradePartner') || $request->input('looking_franchise') == config('constants.LookingFor.DealerDistributor')) {
            $lookingDealer = 1;
            $lookingTradePartner = 0;
            if ($request->input('looking_franchise') == config('constants.LookingFor.TradePartner')) {
                $lookingTradePartner = 1;
                $lookingDealer = 0;
            }

            $channelType = $request->get('channel_type');
            $tradeInvestment = $request->get('trade_investment');
            $tradeMargin = $request->get('trade_margin');
            $channelTypeCount = count($channelType);
            $tradePartnerCount = 0;

            if (isset($tradeInvestment[0]) && !empty($tradeInvestment[0])) {
                $unitInvMin = Config('constants.InvestRange.' . $tradeInvestment[0] . '.min');
                $unitInvMax = Config('constants.InvestRange.' . $tradeInvestment[0] . '.max');
            }

            while ($tradePartnerCount < $channelTypeCount) {
                $insertFranTradePartner = FranchisorTradePartner::query()->insert([
                    'franchisor_id' => $franchisorId,
                    'channel_type' => $channelType[$tradePartnerCount],
                    'trade_investment' => $tradeInvestment[$tradePartnerCount],
                    'trade_margin' => $tradeMargin[$tradePartnerCount],
                ]);

                // If saving the record in FranchisorTradePartner Model failed
                if (!$insertFranTradePartner) {
                    DB::getFacadeRoot()->rollback();
                    // Log the error
                    $msg = 'franchisor Registration Failed: FranchisorTradePartner Model' . $franchisorId;
                    $this->generateLog($msg, $error);

                    // return back to the franchisor registration page
                    return redirect()->back();
                }
                $tradePartnerCount++;
            }
        }

        $currentSteps = FranchisorController::franchisorData($franchisorId)->step_completed;
        $stepCompleted = $currentSteps > 2 ? $currentSteps : 2;

        FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update([
            'brand_name' => $request->input('brand_name'),
            'company_name' => $request->input('company_name'),
            'ceo_name' => $request->input('ceo_name'),
            'ceo_email' => $request->input('ceo_email'),
            'ceo_mobile' => $request->input('ceo_mobile'),
            'profile_name' => $profile_name,
            'fran_manager' => $request->input('fran_manager'),
            'fran_address' => $request->input('fran_address'),
            'country' => config('location.countryName.' . $request->input('country')),
            'pincode' => $pin_code,
            'state' => $state,
            'city' => $request->input('city'),
            'telephone' => $request->input('telephone'),
            'website' => $request->input('website'),
            'secondary_email' => $request->input('secondary_email'),
            'ind_main_cat' => $request->input('ind_main_cat'),
            'ind_cat' => $request->input('ind_cat'),
            'ind_sub_cat' => $request->input('ind_sub_cat'),
            'operations_start_year' => $request->input('operations_start_year'),
            'franchise_start_year' => $request->input('franchise_start_year'),
            'no_fran_outlets' => $request->input('no_fran_outlets'),
            'no_retail_outlets' => $request->input('no_retail_outlets'),
            'no_company_outlets' => $request->input('no_company_outlets'),
            'outlet_locations' => $outletLocations,
            'marketting_materials' => $marketingMaterial,
            'business_desc' => $request->input('business_desc'),
            'franchise_partner_type' => $franchisorPartnerType,
            'looking_tradepartner' => $lookingTradePartner,
            'looking_franchise' => $lookingFranchise,
            'is_dealer_distributor' => $lookingDealer,
            'unit_investment' => $unitInvestment,
            'unit_inv_min' => $unitInvMin,
            'unit_inv_max' => $unitInvMax,
            'unitinv_brand_fee' => $unitInvBrandFee,
            'unitinv_royalty' => $unitInvRoyalty,
            'step_completed' => $stepCompleted
        ]);

        return $this->getThirdStepForm($franchisorId);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function thirdStepSubmit(Request $request)
    {
        $franchisorId = $request->franchisorId;
        $error = config('customErrors.errorType.critical');
        $isLookingInternational = 0;
        $expansionLocType = 1;

        FranchisorLocState::query()->where('franchisor_id', $franchisorId)->delete();
        FranchisorLocCountry::query()->where('franchisor_id', $franchisorId)->delete();

        //Inserting data into franchisor_loc_countries from step 3
        if ($request->input('is_looking_intl_franchise') == config('constants.InternationalFranchise.yes')) {
            if (!empty($request->get('international_franchise'))) {
                $isLookingInternational = 1;
                $internationalFranchise = $request->get('international_franchise');

                foreach ($internationalFranchise as $country) {
                    $franchisorLocCountries = new FranchisorLocCountry;
                    $franchisorLocCountries->franchisor_id = $franchisorId;
                    $franchisorLocCountries->country_longname = $country;
                    if (!$franchisorLocCountries->save()) {
                        DB::getFacadeRoot()->rollback();
                        // Log the error
                        $msg = 'franchisor Registration Failed: FranchisorLocCountry Model' . $franchisorId;
                        $this->generateLog($msg, $error);

                        // return back to the franchisor registration page
                        return redirect()->back();
                    }
                }
            }
        }

        //Inserting data into franchisor_loc_states for states for diffrent regions
        if ($request->input('expansion_loc_type') == config('constants.ExpansionLocationType.1')) {
            $expansionLocType = 1;

            //north region data
            if (!empty($request->get('state'))) {
                $franchiseNorthStates = $request->get('state');
                $franchiseNorthStatesCount = count($franchiseNorthStates);
                $statesCount = 0;
                $region = "";

                while ($statesCount < $franchiseNorthStatesCount) {

                    $state = $franchiseNorthStates[$statesCount];
                    $northStates = config('location.northStates');
                    $westStates = config('location.westStates');
                    $eastStates = config('location.eastStates');
                    $southStates = config('location.southStates');
                    $centralStates = config('location.centralStates');
                    $unionTerritoryStates = config('location.unionTerriotoryStates');

                    foreach ($northStates as $north)
                        if ($state == $north)
                            $region = 'North';

                    foreach ($westStates as $west)
                        if ($state == $west)
                            $region = 'West';

                    foreach ($eastStates as $east)
                        if ($state == $east)
                            $region = 'East';

                    foreach ($southStates as $south)
                        if ($state == $south)
                            $region = 'South';

                    foreach ($centralStates as $central)
                        if ($state == $central)
                            $region = 'Center';

                    foreach ($unionTerritoryStates as $unionTerritory)
                        if ($state == $unionTerritory)
                            $region = 'UT';


                    $insert = FranchisorLocState::query()->insert([
                        'franchisor_id' => $franchisorId,
                        'region' => $region,
                        'state' => $franchiseNorthStates[$statesCount]
                    ]);

                    // If saving the record in FranchisorLocState Model failed
                    if (!$insert) {
                        DB::getFacadeRoot()->rollback();
                        // Log the error
                        $msg = 'franchisor Registration Failed: FranchisorLocState Model' . $franchisorId;
                        $this->generateLog($msg, $error);

                        // return back to the franchisor registration page
                        return redirect()->back();
                    }

                    $statesCount++;
                }
            }
        }

        //Inserting data into franchisor_loc_states for cities
        if ($request->input('expansion_loc_type') == config('constants.ExpansionLocationType.2')) {

            if (!empty($request->get('looking_expansion_city'))) {
                $expansionLocType = 2;

                // Cities input array
                $franchisorCities = $request->get('looking_expansion_city');

                // Assign the city array to a variable
                $citySubArr = config('location.cityArr');

                // Iterate the input cities array
                foreach ($franchisorCities as $value) {
                    $i = 1;
                    // Iterate the config constants city array
                    while ($i <= count($citySubArr)) {
                        $region = '';
                        $stateKey = array_search($value, $citySubArr[$i]);
                        $state = config("location.stateArr.$i");
                        $northStates = config('location.northStates');
                        $westStates = config('location.westStates');
                        $eastStates = config('location.eastStates');
                        $southStates = config('location.southStates');
                        $centralStates = config('location.centralStates');
                        $unionTerritoryStates = config('location.unionTerriotoryStates');

                        foreach ($northStates as $north)
                            if ($state == $north)
                                $region = 'North';

                        foreach ($westStates as $west)
                            if ($state == $west)
                                $region = 'West';

                        foreach ($eastStates as $east)
                            if ($state == $east)
                                $region = 'East';

                        foreach ($southStates as $south)
                            if ($state == $south)
                                $region = 'South';

                        foreach ($centralStates as $central)
                            if ($state == $central)
                                $region = 'Center';

                        foreach ($unionTerritoryStates as $unionTerritory)
                            if ($state == $unionTerritory)
                                $region = 'UT';

                        // For key value 0 validation, use is_numeric
                        if (is_numeric($stateKey)) {
                            $insert = FranchisorLocState::query()->insert([
                                'franchisor_id' => $franchisorId,
                                'city' => $value,
                                'region' => $region,
                                'state' => $state
                            ]);

                            // If saving the record in FranchisorLocState Model failed
                            if (!$insert) {
                                DB::getFacadeRoot()->rollback();
                                // Log the error
                                $msg = 'franchisor Registration Failed: FranchisorLocState Model' . $franchisorId;
                                $this->generateLog($msg, $error);

                                // return back to the franchisor registration page
                                return redirect()->back();
                            }

                            break;
                        }
                        $i++;
                    }
                }
            }
        }

        $currentSteps = FranchisorController::franchisorData($franchisorId)->step_completed;
        $stepCompleted = $currentSteps > 3 ? $currentSteps : 3;

        //Updating Franchisor Business Details
        FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update([
            'is_looking_intl_franchise' => $isLookingInternational,
            'expansion_loc_type' => $expansionLocType,
            'step_completed' => $stepCompleted
        ]);

        $mailData = UserAccount::query()->where('profile_str', $franchisorId)->first();
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();

        //sending the notification mail to service team
        if ($request->input('is_looking_intl_franchise') == config('constants.InternationalFranchise.yes')) {
            $companyData = [
                'companyName' => $franData->company_name,
                'fid' => $franchisorId,
                'email' => $mailData->email,
                'address' => $franData->fran_address . ',' . config('location.countryName.' . $franData->country) . ',' . $franData->pincode . ',' . $franData->state . ',' . $franData->city,
                'ceoName' => $request->input('ceo_name'),
                'mobile' => $mailData->mobile,
                'manager' => $request->input('fran_manager'),
            ];
            $this->sendMailNotification('sachin@franchiseindia.com', new international($companyData));
        }

        return $this->getFourthStepForm($franchisorId);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fourthStepSubmit(Request $request)
    {
        $franchisorId = $request->franchisorId;
        $payback_period = $request->input('payback_period_min') . '-' . $request->input('payback_period_max') . ' ' . $request->input('payback_period_type');

        $currentSteps = FranchisorController::franchisorData($franchisorId)->step_completed;
        $stepCompleted = $currentSteps > 4 ? $currentSteps : 4;

        FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)
            ->update([
                'is_territorial_rights' => $request->input('is_territorial_rights'),
                'is_perform_guarranty' => $request->input('is_perform_guarranty'),
                'is_marketting_levies' => $request->input('is_marketting_levies'),
                'anticipated_roi' => $request->input('anticipated_roi'),
                'payback_period' => $payback_period,
                'other_investment_req' => $request->input('other_investment_req'),
                'is_finance_aid' => $request->input('is_finance_aid'),
                'property_type' => config('constants.propertyType.' . $request->input('property_type')),
                'prop_area_min' => $request->input('prop_area_min'),
                'prop_area_max' => $request->input('prop_area_max'),
                'pref_prop_location' => $request->input('pref_prop_location'),
                'premise_outfit_arrangement' => $request->input('premise_outfit_arrangement'),
                'site_selection_assistance' => $request->input('site_selection_assistance'),
                'step_completed' => $stepCompleted
            ]);

        return $this->getFifthStepForm($franchisorId);
    }

    /**
     * @param Request $request
     * @return array
     */

    public function advertisewithuspayment(Request $request)
    {

        return view('franchisor.register.advertisewithuspayment', compact('franchisorId'));
    }

    public function advertisewithussubmit(Request $request)
    {
        //echo $request->memberplan;
        session()->put('advertise-plan', $request->memberplan);
        return redirect('franchisor/registration/step/1');
        //return view('franchisor/registration/step/1', compact('franchisorId'));
    }
    public function planform(Request $request)
    {
        return view('franchisor/register/franchisor-registration-step-payment', compact('franchisorId'));
    }

    public function planSubmit(Request $request)
    {
        session()->put('advertise-plan', $request->memberplan);
        $franchisorId = $request->franchisorId;
        return view('franchisor/register/franchisor-registration-step-6-new', compact('franchisorId'));
    }
    public function fifthStepSubmit(Request $request)
    {

        $franchisorId = $request->franchisorId;
        $franchiseTimeDuration = $request->input('franchise_term_duration');

        if ($request->input('franchise_term_duration') == config('constants.FranchiseTermDuration.2'))
            $franchiseTimeDuration = $request->input('franchise_term_year');

        $currentSteps = FranchisorController::franchisorData($franchisorId)->step_completed;
        $stepCompleted = $currentSteps > 5 ? $currentSteps : 5;

        FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)
            ->update([
                'is_detailed_manuals' => $request->input('is_detailed_manuals'),
                'franchise_training_loc' => $request->input('franchise_training_loc'),
                'is_field_assistance' => $request->input('is_field_assistance'),
                'ho_assistance' => $request->input('ho_assistance'),
                'is_it_support' => $request->input('is_it_support'),
                'std_fran_aggreement' => $request->input('std_fran_aggreement'),
                'franchise_term_duration' => $franchiseTimeDuration,
                'term_renewable' => $request->input('term_renewable'),
                'step_completed' => $stepCompleted
            ]);
        if ($request->session()->has('advertise-plan')) {
            // dd('hello');
            return view('franchisor/register/franchisor-registration-step-6-new', compact('franchisorId'));
        } else {
            // dd('hello1');
            return view('franchisor/register/franchisor-registration-step-payment', compact('franchisorId'));
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function finalStepSubmit(Request $request)
    {
        //dd($request);
        $url = ''; //"no url";
//        dd($request->memberplan);
        $franchisorId = $request->franchisorId;
        $layout = $request->layout_type;

        //Logo uploading
        if ($request->hasFile('company_logo')) {
            $companyLogo = $request->file('company_logo');
            $extension = $request->file('company_logo')->getClientOriginalExtension();
            $companyLogoPath = sprintf(config('constants.FranchisorCompanyLogo'), date('md')) . '/' . rand() . '.' . $extension;
            // Storage::disk('s3')->put($companyLogoPath, file_get_contents($companyLogo), 'public');
            $companyLogo->storeAs('public', $companyLogoPath);
            // $url = Storage::disk('s3')->url($companyLogoPath);
            $url = asset('storage/' . $companyLogoPath);
        }

        FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)
            ->update([
                'pre_approved_logo' => $url,
                'page_layout_type' => $layout,
                'video_link' => $request->input('video_link'),
                'activation_date' => date('Y-m-d'),
                'step_completed' => 6,
                'profile_status' => config('constants.ProfileStatus.Pending')
            ]);
        //dd($franchisorId);
        $code = Str::random(16);

        //Updating email verification code
        UserAccount::query()->where('profile_str', $franchisorId)->update(['email_verification_code' => $code, 'profile_status' => config('constants.ProfileStatus.Pending')]);
        $data = [
            'companyName' => $request->input('company_name'),
            'code' => $code,
        ];

        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $userData = UserAccount::query()->where('profile_str', $franchisorId)->first();
        //dd($franData);
        if ($userData->email != 'fiblbrands@franchiseindia.in' && $userData->email != 'info@franglobal.com') {
            $this->sendMailNotification($userData->email, new confirmed($data));
        } else {
            //Updating User Details
            FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update(['profile_status' => Config('constants.ProfileStatus.Awaiting')]);
            UserAccount::query()->where('profile_str', $franchisorId)->update(['profile_status' => Config('constants.ProfileStatus.Awaiting')]);
        }


        if ($request->newsletter_sub == 1)
            NewsLetterController::createNewsLetter($userData->email, "fi");

        //payment
        if (!empty($request->memberplan) && $request->memberplan != 1) {
            $tranId = FranchisorController::uniqueRandomNumber();

            $mopt = $request->mop;
            $plan = $request->memberplan;

            $amt = Config('constants.membershipPlanFranchisor.' . $plan);
            if (!array_key_exists($mopt, config('constants.Charges'))) {
                $mopt = "OPTNBK";
            }
            $mop = config('constants.Charges.' . $mopt);
            $amount = round($amt + $amt * ($mop) / 100);
            $amount = $amount + (($amount * 18) / 100);

            $name = $franData->ceo_name;
            $email = $userData->email;
            $phone = $userData->mobile;
            $country = $franData->country;
            $address = $franData->city . ',' . $franData->country;
            $detail = $franchisorId;

            //Creating entry into online payments table
            OnlinePayment::query()->insert([
                'order_no' => $tranId,
                'profile_type' => 1,
                'profile_id' => $franchisorId,
                'name' => $franData->ceo_name,
                'email' => $userData->email,
                'phone' => $phone,
                'city' => $franData->city,
                'country' => $franData->country,
                'product_details' => Config('constants.membershipPlanFranchisorDetail.' . $plan),
                'membership_plan' => $plan,
                'amount' => $amount,
                'mopt' => $mopt,
                'gst_no' => $request->gst_no,
                'payment_status' => 0
            ]);

            return view('site/franpayment', compact('name', 'email', 'phone', 'country', 'address', 'detail', 'tranId', 'amount', 'mopt'));
        }

        return view('includes/franchisor-thank-page');
    }

    /**
     * insert franchisor registration form data to database
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postFranchisor(Request $request)
    {
        //  Validation rules, in case of error
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'company_name' => 'required|min:3',
            'ceo_name' => 'required|min:3',
            'ceo_email' => 'required|min:3',
            'ceo_mobile' => 'required|min:10',
            'fran_manager' => 'required|min:3',
            'country' => 'required',
            'city' => 'required|min:3',
            'ind_main_cat' => 'required',
            'ind_cat' => 'required',
            'ind_sub_cat' => 'required',
            'operations_start_year' => 'required',
            'franchise_start_year' => 'required',
            'business_desc' => 'required|min:20'
        ]);

        if ($request->input('email') != 'fiblbrands@franchiseindia.in' && $request->input('email') != 'info@franglobal.com') {
            $this->validate($request, [
                'email' => 'required|email|unique:user_accounts',
            ]);
        }

        if (!isset($request->is_international)) {
            $this->validate($request, [
                'state' => 'required|min:3',
                'pincode' => 'required|min:3|numeric',
                'no_fran_outlets' => 'required',
                'no_retail_outlets' => 'required',
                'outlet_locations' => 'required',
                'mobile' => 'required|min:10',
            ]);
        }

        //initialising model objects
        $useraccount = new UserAccount;            //user account model
        $state = $request->state;
        $pincode = $request->pincode;
        $mobile = $request->mobile;
        $layout = $request->layout_type;
        $is_intl = 0;
        $unitInvMin = 10000;
        $unitInvMax = 50000;
        $lookingTradePartner = 0;
        $lookingFranchise = 0;
        $franchisorPartnerType = 0;
        $isLookingInternational = 0;
        $expansionLocType = 1;
        $unitInvestment = 0;
        $unitInvBrandFee = "";
        $unitInvRoyalty = "";
        $is_international_client = 0;
        $lookingDealer = 0;

        if (isset($request->is_international) && $request->is_international == 1) {
            $this->validate($request, [
                'pincode_int' => 'required|min:3|max:10',
                'mobile_int' => 'required|min:8',
            ]);

            $state = $request->state_int;
            $pincode = $request->pincode_int;
            $mobile = $request->country_code . $request->mobile_int;
            $layout = 1;
            $is_intl = 1;
            $is_international_client = 1;
        }

        //step 1
        //Generate a random unique for fihl profile string
        $franchisorId = CommonController::profileUniqStr();

        //error define for log
        $error = config('customErrors.errorType.critical');

        $regSourceValue = "";
        if (!empty($request->reg_source)) {
            $regSource = base64_decode($request->reg_source);

            if ($regSource == "google2019")
                $regSourceValue = "google";

            if ($regSource == "facebook2019")
                $regSourceValue = "facebook";

        }

        //step 1 data insertion
        $useraccount->email = $request->input('email');
        $useraccount->password = Hash::getFacadeRoot()->make($request->input('password'));
        $useraccount->mobile = $mobile;
        $useraccount->profile_type = config('constants.ProfileType.Franchisor');
        $useraccount->profile_status = config('constants.ProfileStatus.Pending');
        $useraccount->profile_str = $franchisorId;
        $useraccount->reg_source = $regSourceValue;
        $url = ''; //"no url";

        //Logo uploading
        if ($request->hasFile('company_logo')) {
            $companyLogo = $request->file('company_logo');
            $extension = Request::getFacadeRoot()->file('company_logo')->getClientOriginalExtension();
            $companyLogoPath = sprintf(config('constants.FranchisorCompanyLogo'), date('md')) . '/' . rand() . '.' . $extension;
            Storage::getFacadeRoot()->disk('s3')->put($companyLogoPath, file_get_contents($companyLogo), 'public');
            $url = Storage::getFacadeRoot()->disk('s3')->url($companyLogoPath);
        }

        // Begin the transaction
        DB::getFacadeRoot()->beginTransaction();

        // Inserting the data into User Account table
        $insUser = $useraccount->save();

        // If saving the record in User Model failed
        if (!$insUser) {
            DB::getFacadeRoot()->rollback();

            // Log the error
            $msg = 'franchisor Registration Failed: UserAccount Model' . $request->input('email');
            $this->generateLog($msg, $error);

            // return back to the franchisor registration page
            return redirect()->back();
        }

        //step 2 data insertion
        $outletLocations = @implode(',', $_POST['outlet_locations']);
        $marketingMaterial = $request->input('marketting_material');
        if ($request->input('marketting_material') == "Yes") {
            $marketingMaterial = @implode(',', $_POST['marketting_materials']);
            if (empty($marketingMaterial))
                $marketingMaterial = "Yes";
        }

        //step 4  data insertion multiple tables
        $payback_period = $request->input('payback_period_min') . '-' . $request->input('payback_period_max') . ' ' . $request->input('payback_period_type');

        //step 5
        $franchiseTimeDuration = $request->input('franchise_term_duration');
        if ($request->input('franchise_term_duration') == config('constants.FranchiseTermDuration.2'))
            $franchiseTimeDuration = $request->input('franchise_term_year');

        //slug for franchisor registration
        $profile_name = $request->input('brand_name') != "" ? $request->input('brand_name') : $request->input('company_name');
        $profile_name = Str::slug($profile_name);

        //Inserting step2 data into franchisor_business_details
        $franchisorDataInsert = FranchisorBusinessDetail::query()->insert([
            'franchisor_id' => $franchisorId,
            'brand_name' => $request->input('brand_name'),
            'company_name' => $request->input('company_name'),
            'ceo_name' => $request->input('ceo_name'),
            'ceo_email' => $request->input('ceo_email'),
            'ceo_mobile' => $request->input('ceo_mobile'),
            'profile_name' => $profile_name,
            'fran_manager' => $request->input('fran_manager'),
            'fran_address' => $request->input('fran_address'),
            'country' => config('location.countryName.' . $request->input('country')),
            'pincode' => $pincode,
            'state' => $state,
            'city' => $request->input('city'),
            'telephone' => $request->input('telephone'),
            'website' => $request->input('website'),
            'secondary_email' => $request->input('secondary_email'),
            'ind_main_cat' => $request->input('ind_main_cat'),
            'ind_cat' => $request->input('ind_cat'),
            'ind_sub_cat' => $request->input('ind_sub_cat'),
            'operations_start_year' => $request->input('operations_start_year'),
            'franchise_start_year' => $request->input('franchise_start_year'),
            'no_fran_outlets' => $request->input('no_fran_outlets'),
            'no_retail_outlets' => $request->input('no_retail_outlets'),
            'no_company_outlets' => $request->input('no_company_outlets'),
            'outlet_locations' => $outletLocations,
            'marketting_materials' => $marketingMaterial,
            'business_desc' => $request->input('business_desc'),
            'is_territorial_rights' => $request->input('is_territorial_rights'),
            'is_perform_guarranty' => $request->input('is_perform_guarranty'),
            'is_marketting_levies' => $request->input('is_marketting_levies'),
            'anticipated_roi' => $request->input('anticipated_roi'),
            'payback_period' => $payback_period,
            'other_investment_req' => $request->input('other_investment_req'),
            'is_finance_aid' => $request->input('is_finance_aid'),
            'property_type' => config('constants.propertyType.' . $request->input('property_type')),
            'prop_area_min' => $request->input('prop_area_min'),
            'prop_area_max' => $request->input('prop_area_max'),
            'pref_prop_location' => $request->input('pref_prop_location'),
            'premise_outfit_arrangement' => $request->input('premise_outfit_arrangement'),
            'site_selection_assistance' => $request->input('site_selection_assistance'),
            'is_detailed_manuals' => $request->input('is_detailed_manuals'),
            'franchise_training_loc' => $request->input('franchise_training_loc'),
            'is_field_assistance' => $request->input('is_field_assistance'),
            'ho_assistance' => $request->input('ho_assistance'),
            'is_it_support' => $request->input('is_it_support'),
            'std_fran_aggreement' => $request->input('std_fran_aggreement'),
            'franchise_term_duration' => $franchiseTimeDuration,
            'term_renewable' => $request->input('term_renewable'),
            'pre_approved_logo' => $url,
            'page_layout_type' => $layout,
            'video_link' => $request->input('video_link'),
            'is_intl' => $is_intl,
            'profile_status' => Config('constants.ProfileStatus.Pending'),
            'step_completed' => 6,
            'activation_date' => date('Y-m-d')
        ]);

        // If saving the record in FranchisorBusinessDetail Model failed
        if (!$franchisorDataInsert) {
            DB::getFacadeRoot()->rollback();

            // Log the error
            $msg = 'franchisor Registration Failed: FranchisorBusinessDetail Model' . $franchisorId;
            $this->generateLog($msg, $error);

            // return back to the franchisor registration page
            return redirect()->back();
        }

        //step 3 data insertion
        if ($request->input('looking_franchise') == config('constants.LookingFor.Franchisor')) {

            $lookingFranchise = 1;
            $franchisePartner = $request->get('franchise_partner_type');
            $franchisePartnerCount = count($franchisePartner);
            $franchisorPartnerType = $franchisePartnerCount == 2 ? 3 : ($franchisePartner[0] == "lookingFrUnit" ? 1 : 2);

            if ($franchisorPartnerType == 3 || $franchisorPartnerType == 1) {
                $unitInvMin = Config('constants.InvestRange.' . $request->input('unit_investment') . '.min');
                $unitInvMax = Config('constants.InvestRange.' . $request->input('unit_investment') . '.max');
                $unitInvestment = $request->input('unit_investment');
                $unitInvBrandFee = $request->input('unitinv_brand_fee');
                $unitInvRoyalty = $request->input('unitinv_royalty');
            }

            if ($franchisorPartnerType != 1) {
                $countryWise = $request->input('countrywise') == "CountryWise" ? 1 : 0;
                $regionWise = $request->input('regionwise') == "RegionWise" ? 1 : 0;
                $stateWise = $request->input('statewise') == "StateWise" ? 1 : 0;
                $cityWise = $request->input('citywise') == "CityWise" ? 1 : 0;
                $minArr = [];
                $maxArr = [];
                if ($countryWise == 1) {
                    $countryMin = Config('constants.InvestRange.' . $request->input('country_investment') . '.min');
                    $countryMax = Config('constants.InvestRange.' . $request->input('country_investment') . '.max');
                    array_push($minArr, $countryMin);
                    array_push($maxArr, $countryMax);
                }
                if ($regionWise == 1) {
                    $regionMin = Config('constants.InvestRange.' . $request->input('region_investment') . '.min');
                    $regionMax = Config('constants.InvestRange.' . $request->input('region_investment') . '.max');
                    array_push($minArr, $regionMin);
                    array_push($maxArr, $regionMax);
                }
                if ($stateWise == 1) {
                    $stateMin = Config('constants.InvestRange.' . $request->input('state_investment') . '.min');
                    $stateMax = Config('constants.InvestRange.' . $request->input('state_investment') . '.max');
                    array_push($minArr, $stateMin);
                    array_push($maxArr, $stateMax);
                }
                if ($cityWise == 1) {
                    $cityMin = Config('constants.InvestRange.' . $request->input('city_investment') . '.min');
                    $cityMax = Config('constants.InvestRange.' . $request->input('city_investment') . '.max');
                    array_push($minArr, $cityMin);
                    array_push($maxArr, $cityMax);
                }

                if (count($minArr) > 0) {
                    $unitInvMin = min($minArr);
                    $unitInvMax = max($maxArr);
                }

                //Updating data into franchisor_multiunit if already exist
                $insFranchisorMultiUnit = FranchisorMultiUnit::query()->insert([
                    'franchisor_id' => $franchisorId,
                    'countrywise' => $countryWise,
                    'country_investment' => $request->input('country_investment'),
                    'country_unitfee' => $request->input('country_unitfee'),
                    'country_masterfee' => $request->input('country_masterfee'),
                    'country_royalty' => $request->input('country_royalty'),
                    'regionwise' => $regionWise,
                    'region_investment' => $request->input('region_investment'),
                    'region_unitfee' => $request->input('region_unitfee'),
                    'region_masterfee' => $request->input('region_masterfee'),
                    'region_royalty' => $request->input('region_royalty'),
                    'statewise' => $stateWise,
                    'state_investment' => $request->input('state_investment'),
                    'state_unitfee' => $request->input('state_unitfee'),
                    'state_masterfee' => $request->input('state_masterfee'),
                    'state_royalty' => $request->input('state_royalty'),
                    'citywise' => $cityWise,
                    'city_investment' => $request->input('city_investment'),
                    'city_unitfee' => $request->input('city_unitfee'),
                    'city_masterfee' => $request->input('city_masterfee'),
                    'city_royalty' => $request->input('city_royalty')
                ]);

                // If saving the record in FranchisorMultiUnit Model failed
                if (!$insFranchisorMultiUnit) {
                    DB::getFacadeRoot()->rollback();

                    // Log the error
                    $msg = 'franchisor Registration Failed: FranchisorMultiUnit Model' . $franchisorId;
                    $this->generateLog($msg, $error);

                    // return back to the franchisor registration page
                    return redirect()->back();
                }
            }
        }

        if ($request->input('looking_franchise') == config('constants.LookingFor.TradePartner') || $request->input('looking_franchise') == config('constants.LookingFor.DealerDistributor')) {

            $lookingDealer = 1;
            $lookingTradePartner = 0;
            if ($request->input('looking_franchise') == config('constants.LookingFor.TradePartner')) {
                $lookingTradePartner = 1;
                $lookingDealer = 0;
            }
            $channelType = $request->get('channel_type');
            $tradeInvestment = $request->get('trade_investment');
            $tradeMargin = $request->get('trade_margin');
            $areaMin = $request->get('area_min');
            $areaMax = $request->get('area_max');
            $areaType = $request->get('area_type');
            $channelTypeCount = count($channelType);
            $tradePartnerCount = 0;

            if (isset($tradeInvestment[0]) && !empty($tradeInvestment[0])) {
                $unitInvMin = Config('constants.InvestRange.' . $tradeInvestment[0] . '.min');
                $unitInvMax = Config('constants.InvestRange.' . $tradeInvestment[0] . '.max');
            }

            while ($tradePartnerCount < $channelTypeCount) {
                $insertFranTradePartner = FranchisorTradePartner::query()->insert([
                    'franchisor_id' => $franchisorId,
                    'channel_type' => $channelType[$tradePartnerCount],
                    'trade_investment' => $tradeInvestment[$tradePartnerCount],
                    'trade_margin' => $tradeMargin[$tradePartnerCount],
                    'area_min' => $areaMin[$tradePartnerCount],
                    'area_max' => $areaMax[$tradePartnerCount],
                    'area_type' => $areaType[$tradePartnerCount]
                ]);

                // If saving the record in FranchisorTradePartner Model failed
                if (!$insertFranTradePartner) {
                    DB::getFacadeRoot()->rollback();
                    // Log the error
                    $msg = 'franchisor Registration Failed: FranchisorTradePartner Model' . $franchisorId;
                    $this->generateLog($msg, $error);

                    // return back to the franchisor registration page
                    return redirect()->back();
                }
                $tradePartnerCount++;
            }
        }

        //Inserting data into franchisor_loc_countries from step 3
        if ($request->input('is_looking_intl_franchise') == config('constants.InternationalFranchise.yes')) {
            if (!empty($request->get('international_franchise'))) {
                $isLookingInternational = 1;
                $internationalFranchise = $request->get('international_franchise');
                foreach ($internationalFranchise as $country) {
                    $franchisorLocCountries = new FranchisorLocCountry;
                    $franchisorLocCountries->franchisor_id = $franchisorId;
                    $franchisorLocCountries->country_longname = $country;
                    if (!$franchisorLocCountries->save()) {
                        DB::getFacadeRoot()->rollback();
                        // Log the error
                        $msg = 'franchisor Registration Failed: FranchisorLocCountry Model' . $franchisorId;
                        $this->generateLog($msg, $error);

                        // return back to the franchisor registration page
                        return redirect()->back();
                    }
                }
            }

        }

        //Inserting data into franchisor_loc_states for states for diffrent regions
        if ($request->input('expansion_loc_type') == config('constants.ExpansionLocationType.1')) {
            $expansionLocType = 1;

            if (!empty($request->get('state'))) {
                $franchiseNorthStates = $request->get('state');
                $franchiseNorthStatesCount = count($franchiseNorthStates);
                $statesCount = 0;
                $region = "";

                while ($statesCount < $franchiseNorthStatesCount) {

                    $state = $franchiseNorthStates[$statesCount];
                    $northStates = config('location.northStates');
                    $westStates = config('location.westStates');
                    $eastStates = config('location.eastStates');
                    $southStates = config('location.southStates');
                    $centralStates = config('location.centralStates');
                    $unionTerritoryStates = config('location.unionTerriotoryStates');

                    foreach ($northStates as $north)
                        if ($state == $north)
                            $region = 'North';

                    foreach ($westStates as $west)
                        if ($state == $west)
                            $region = 'West';

                    foreach ($eastStates as $east)
                        if ($state == $east)
                            $region = 'East';

                    foreach ($southStates as $south)
                        if ($state == $south)
                            $region = 'South';

                    foreach ($centralStates as $central)
                        if ($state == $central)
                            $region = 'Center';

                    foreach ($unionTerritoryStates as $unionTerritory)
                        if ($state == $unionTerritory)
                            $region = 'UT';


                    $insert = FranchisorLocState::query()->insert([
                        'franchisor_id' => $franchisorId,
                        'region' => $region,
                        'state' => $franchiseNorthStates[$statesCount]
                    ]);

                    // If saving the record in FranchisorLocState Model failed
                    if (!$insert) {
                        DB::getFacadeRoot()->rollback();
                        // Log the error
                        $msg = 'franchisor Registration Failed: FranchisorLocState Model' . $franchisorId;
                        $this->generateLog($msg, $error);

                        // return back to the franchisor registration page
                        return redirect()->back();
                    }

                    $statesCount++;
                }
            }
        }

        //Inserting data into franchisor_loc_states for cities
        if ($request->input('expansion_loc_type') == config('constants.ExpansionLocationType.2')) {

            if (!empty($request->get('looking_expansion_city'))) {
                $expansionLocType = 2;

                // Cities input array
                $franchisorCities = $request->get('looking_expansion_city');

                // Assign the city array to a variable
                $citySubArr = config('location.cityArr');

                // Iterate the input cities array
                foreach ($franchisorCities as $value) {
                    $i = 1;
                    // Iterate the config constants city array
                    while ($i <= count($citySubArr)) {
                        $stateKey = array_search($value, $citySubArr[$i]);
                        $state = config("location.stateArr.$i");
                        $region = '';
                        $northStates = config('location.northStates');
                        $westStates = config('location.westStates');
                        $eastStates = config('location.eastStates');
                        $southStates = config('location.southStates');
                        $centralStates = config('location.centralStates');
                        $unionTerritoryStates = config('location.unionTerriotoryStates');

                        foreach ($northStates as $north)
                            if ($state == $north)
                                $region = 'North';

                        foreach ($westStates as $west)
                            if ($state == $west)
                                $region = 'West';

                        foreach ($eastStates as $east)
                            if ($state == $east)
                                $region = 'East';

                        foreach ($southStates as $south)
                            if ($state == $south)
                                $region = 'South';

                        foreach ($centralStates as $central)
                            if ($state == $central)
                                $region = 'Center';

                        foreach ($unionTerritoryStates as $unionTerritory)
                            if ($state == $unionTerritory)
                                $region = 'UT';

                        // For key value 0 validation, use is_numeric
                        if (is_numeric($stateKey)) {
                            $insert = FranchisorLocState::query()->insert([
                                'franchisor_id' => $franchisorId,
                                'city' => $value,
                                'region' => $region,
                                'state' => $state
                            ]);

                            // If saving the record in FranchisorLocState Model failed
                            if (!$insert) {
                                DB::getFacadeRoot()->rollback();
                                // Log the error
                                $msg = 'franchisor Registration Failed: FranchisorLocState Model' . $franchisorId;
                                $this->generateLog($msg, $error);

                                // return back to the franchisor registration page
                                return redirect()->back();
                            }

                            break;
                        }
                        $i++;
                    }
                }
            }
        }

        if (!empty(request()->unit_investment_min) && !empty(request()->unit_investment_max)) {
            $unitInvMin = request()->unit_investment_min;
            $unitInvMax = request()->unit_investment_max;
        }

        //Updating Franchisor Business Details
        FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)
            ->update([
                'franchise_partner_type' => $franchisorPartnerType,
                'is_looking_intl_franchise' => $isLookingInternational,
                'looking_tradepartner' => $lookingTradePartner,
                'is_dealer_distributor' => $lookingDealer,
                'looking_franchise' => $lookingFranchise,
                'expansion_loc_type' => $expansionLocType,
                'unit_investment' => $unitInvestment,
                'unit_inv_min' => $unitInvMin,
                'unit_inv_max' => $unitInvMax,
                'unitinv_brand_fee' => $unitInvBrandFee,
                'unitinv_royalty' => $unitInvRoyalty,
                'is_international_client' => $is_international_client
            ]);

        //closing the database transaction
        DB::getFacadeRoot()->commit();

        if ($request->newsletter_sub == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");

        //sending the notification mail to service team
        if ($request->input('is_looking_intl_franchise') == config('constants.InternationalFranchise.yes')) {
            $companyData = [
                'companyName' => $request->input('company_name'),
                'fid' => $franchisorId,
                'email' => $request->input('email'),
                'address' => $request->input('fran_address') . ',' . config('location.countryName.' . $request->input('country')) . ',' . $pincode . ',' . $state . ',' . $request->input('city'),
                'ceoName' => $request->input('ceo_name'),
                'mobile' => $mobile,
                'manager' => $request->input('fran_manager'),
            ];
            $this->sendMailNotification('sachin@franchiseindia.com', new international($companyData));
        }

        //sending the email on registration
        $code = Str::random(16);

        //Updating email verification code
        UserAccount::query()->where('profile_str', $franchisorId)->update(['email_verification_code' => $code]);
        $data = [
            'companyName' => $request->input('company_name'),
            'code' => $code,
        ];

        if (!empty(Cookie::get('franCampaignSource'))) {
            CampaignsFranRegister::query()->create(['franchisor_id' => $franchisorId, 'utm_campaign' => Cookie::get('franCampaign'), 'utm_source' => Cookie::get('franCampaignSource')]);
        }

        //payment
        if (!empty($request->membership_plan) && $request->membership_plan != 1) {
            $tranId = FranchisorController::uniqueRandomNumber();
            $plan = $request->amount_to_pay;
            $amount = Config('constants.membershipPlanFranchisor.' . $plan);
            $amount = $amount + (($amount * 18) / 100);
            $name = $request->ceo_name;
            $email = $request->email;
            $phone = $mobile;
            $city = $request->city;
            $country = $request->country;
            $address = $city . ',' . $country;
            $detail = $franchisorId;


            //Creating entry into online payments table
            OnlinePayment::query()->insert([
                'order_no' => $tranId,
                'profile_type' => 1,
                'profile_id' => $franchisorId,
                'name' => $request->ceo_name,
                'email' => $request->email,
                'phone' => $mobile,
                'city' => $request->city,
                'country' => $request->country,
                'product_details' => Config('constants.membershipPlanFranchisorDetail.' . $plan),
                'membership_plan' => $plan,
                'amount' => $amount,
                'gst_no' => $request->gst_no,
                'payment_status' => 0
            ]);

            return view('site/franpayment', compact('name', 'email', 'phone', 'country', 'address', 'detail', 'tranId', 'amount'));
        }

        if ($request->input('email') != 'fiblbrands@franchiseindia.in' && $request->input('email') != 'info@franglobal.com') {
            $this->sendMailNotification($request->input('email'), new confirmed($data));
        } else {
            //Updating User Details
            FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update(['profile_status' => Config('constants.ProfileStatus.Awaiting')]);
            UserAccount::query()->where('profile_str', $franchisorId)->update(['profile_status' => Config('constants.ProfileStatus.Awaiting')]);
        }

        //returning to the thanks page view
        return view('includes/franchisor-thank-page');
    }

    /**
     * view profile myAccount Franchisor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function viewProfile()
    {
        $franchisorId = request()->user()->profile_str;
        $userAccount = UserAccount::query()->where('profile_str', $franchisorId)->first();
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $franCountries = FranchisorLocCountry::query()->where('franchisor_id', $franchisorId)->select('country_longname')->get()->pluck('country_longname');
        $franMultiUnitData = FranchisorMultiUnit::query()->where('franchisor_id', $franchisorId)->first();
        $franTradeData = FranchisorTradePartner::query()->where('franchisor_id', $franchisorId)->select('channel_type', 'trade_investment', 'trade_margin', 'area_min', 'area_max')->get();

        //fetching the state wise data
        $StatesEast = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->where('region', 'East')->select('state')->get()->pluck('state');
        $StatesWest = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->where('region', 'West')->select('state')->get()->pluck('state');
        $StatesNorth = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->where('region', 'North')->select('state')->get()->pluck('state');
        $StatesSouth = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->where('region', 'South')->select('state')->get()->pluck('state');
        $StatesCenter = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->where('region', 'Center')->select('state')->get()->pluck('state');
        $StatesUT = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->where('region', 'UT')->select('state')->get()->pluck('state');
        $expressInterest = UserActivity::query()->select('investor_id')
            ->where('franchisor_id', $franchisorId)
            ->whereNotNull('investor_id')
            ->where('investor_id', '!=', 'Anonymous')
            ->orderBy('clickID', 'desc')
            ->get();
        $uniqInvestorsArr = array_unique(array_column($expressInterest->toArray(), 'investor_id'));

        $applyCount = (ExpressInstaApply::query()->where('franchisor_id', $franchisorId)->count()) + (count($uniqInvestorsArr));
        $membershipType = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->select('membership_type')->first();

        $tradeCount = count($franTradeData);

        return view('franchisor/myAccount/view-profile', compact('membershipType', 'userAccount', 'franData', 'franMultiUnitData', 'tradeCount', 'franCountries', 'applyCount'), ['tradePartner' => $franTradeData, 'StatesEast' => $StatesEast, 'StatesWest' => $StatesWest, 'StatesNorth' => $StatesNorth, 'StatesSouth' => $StatesSouth, 'StatesCenter' => $StatesCenter, 'StatesUT' => $StatesUT]);
    }

    /**
     * show feedback form franchisor profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function viewDashboard()
    {
        $franchisorId = request()->user()->profile_str;

        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $leadcount = ExpressInstaApply::query()
            ->where('franchisor_id', $franchisorId)
            ->orderBy('id', 'desc')
            // ->take(5)
            ->count();
        $insta = ExpressInstaApply::query()
            ->where('franchisor_id', $franchisorId)
            ->orderBy('id', 'desc')
            // ->take(5)
            ->get();

        $investorData = "";
        $franchisorId = request()->user()->profile_str;
        $expressedInterests = UserActivity::query()
            ->where('franchisor_id', $franchisorId)
            ->whereNotNull('investor_id')
            ->where('investor_id', '!=', 'Anonymous')
            ->orderBy('clickID', 'desc')
            ->take(5)
            ->get();

        $expressInterestCount = UserActivity::query()
            ->where('franchisor_id', $franchisorId)
            ->whereNotNull('investor_id')
            ->where('investor_id', '!=', 'Anonymous')
            ->orderBy('clickID', 'desc')
            ->count();

        $applyCount = (ExpressInstaApply::query()->where('franchisor_id', $franchisorId)->count()) + ($expressInterestCount);

        return view('franchisor/myAccount/dashboard', compact('investorData', 'insta', 'franData', 'applyCount', 'expressedInterests', 'leadcount'));
    }

    /**
     * method to view business details page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function viewBusinessDetails()
    {
        $franchisorId = request()->user()->profile_str;
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $tradeData = FranchisorTradePartner::query()->where('franchisor_id', $franchisorId)->get();
        $multiUnitData = FranchisorMultiUnit::query()->where('franchisor_id', $franchisorId)->first();

        return view('franchisor/myAccount/business-details', compact('franData', 'multiUnitData', 'tradeData'));
    }

    /**
     * update business details
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateBusinessDetails(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|min:3',
            'ceo_name' => 'required|min:3',
            'ceo_email' => 'required|min:3',
            'ceo_mobile' => 'required|min:10',
            'fran_manager' => 'required|min:3',
            'country' => 'required',
            'pincode' => 'required|min:3|numeric',
            'state' => 'required|min:3',
            'city' => 'required|min:3',
            'ind_main_cat' => 'required',
            'ind_cat' => 'required',
            'ind_sub_cat' => 'required',
            'operations_start_year' => 'required',
            'franchise_start_year' => 'required',
            'outlet_locations' => 'required',
            'business_desc' => 'required'
        ]);

        $franchisorId = request()->user()->profile_str;
        $outletLocations = @implode(',', $_POST['outlet_locations']);
        $marketingMaterial = $request->input('marketting_material');
        $lookingTradePartner = 0;
        $lookingFranchise = 0;
        $franchisorPartnerType = 0;
        $unitInvMin = 10000;
        $unitInvMax = 50000;
        $unitInvestment = 0;
        $unitInvBrandFee = "";
        $unitInvRoyalty = "";
        $lookingDealer = 0;

        if ($request->input('marketting_material') == "Yes")
            $marketingMaterial = @implode(',', $_POST['marketting_materials']);

        //update personal details
        $updatePersonalDetailArray = ['mobile' => $request->input('mobile')];

        if (!empty(request()->email) && UserAccount::where('email', request()->email)->count() == 0) {
            array_unshift($updatePersonalDetailArray, ['email' => request()->email]);
            FranchisorBusinessDetail::where('franchisor_id', $franchisorId)->update(['is_campaign_updated' => 1]);
        }

        UserAccount::query()->where('profile_str', $franchisorId)->update($updatePersonalDetailArray);

        $businessDesc = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)
            ->select('business_desc')
            ->first();
        $detail = "";
        if ($businessDesc->business_desc != $request->input('business_desc')) {
            $detail = $request->input('business_desc');
        }

        //Deleting old data
        FranchisorMultiUnit::query()->where('franchisor_id', $franchisorId)->delete();
        FranchisorTradePartner::query()->where('franchisor_id', $franchisorId)->delete();

        if ($request->input('looking_franchise') == config('constants.LookingFor.Franchisor')) {

            $lookingFranchise = 1;
            $franchisePartner = $request->get('franchise_partner_type');
            $franchisePartnerCount = count($franchisePartner);

            if ($franchisePartnerCount == 2)
                $franchisorPartnerType = 3;
            elseif ($franchisePartner[0] == "lookingFrUnitMultiUnits")
                $franchisorPartnerType = 2;
            else
                $franchisorPartnerType = 1;

            if ($franchisorPartnerType == 3 || $franchisorPartnerType == 1) {
                $unitInvMin = Config('constants.InvestRange.' . $request->input('unit_investment') . '.min');
                $unitInvMax = Config('constants.InvestRange.' . $request->input('unit_investment') . '.max');
                $unitInvestment = $request->input('unit_investment');
                $unitInvBrandFee = $request->input('unitinv_brand_fee');
                $unitInvRoyalty = $request->input('unitinv_royalty');
            }


            if ($franchisorPartnerType == 2 || $franchisorPartnerType == 3) {

                $countryWise = $request->input('countrywise') == "CountryWise" ? 1 : 0;
                $regionWise = $request->input('regionwise') == "RegionWise" ? 1 : 0;
                $stateWise = $request->input('statewise') == "StateWise" ? 1 : 0;
                $cityWise = $request->input('citywise') == "CityWise" ? 1 : 0;
                $minArr = [];
                $maxArr = [];
                if ($countryWise == 1) {
                    $countryMin = Config('constants.InvestRange.' . $request->input('country_investment') . '.min');
                    $countryMax = Config('constants.InvestRange.' . $request->input('country_investment') . '.max');
                    array_push($minArr, $countryMin);
                    array_push($maxArr, $countryMax);
                }
                if ($regionWise == 1) {
                    $regionMin = Config('constants.InvestRange.' . $request->input('region_investment') . '.min');
                    $regionMax = Config('constants.InvestRange.' . $request->input('region_investment') . '.max');
                    array_push($minArr, $regionMin);
                    array_push($maxArr, $regionMax);
                }
                if ($stateWise == 1) {
                    $stateMin = Config('constants.InvestRange.' . $request->input('state_investment') . '.min');
                    $stateMax = Config('constants.InvestRange.' . $request->input('state_investment') . '.max');
                    array_push($minArr, $stateMin);
                    array_push($maxArr, $stateMax);
                }
                if ($cityWise == 1) {
                    $cityMin = Config('constants.InvestRange.' . $request->input('city_investment') . '.min');
                    $cityMax = Config('constants.InvestRange.' . $request->input('city_investment') . '.max');
                    array_push($minArr, $cityMin);
                    array_push($maxArr, $cityMax);
                }

                if (count($minArr) > 0) {
                    $unitInvMin = min($minArr);
                    $unitInvMax = max($maxArr);
                }

                if ($cityWise != 0 || $stateWise != 0 || $regionWise != 0 || $countryWise != 0) {
                    $insFranchisorMultiUnit = FranchisorMultiUnit::query()->insert([
                        'franchisor_id' => $franchisorId,
                        'countrywise' => $countryWise,
                        'country_investment' => $request->input('country_investment'),
                        'country_unitfee' => $request->input('country_unitfee'),
                        'country_masterfee' => $request->input('country_masterfee'),
                        'country_royalty' => $request->input('country_royalty'),
                        'regionwise' => $regionWise,
                        'region_investment' => $request->input('region_investment'),
                        'region_unitfee' => $request->input('region_unitfee'),
                        'region_masterfee' => $request->input('region_masterfee'),
                        'region_royalty' => $request->input('region_royalty'),
                        'statewise' => $stateWise,
                        'state_investment' => $request->input('state_investment'),
                        'state_unitfee' => $request->input('state_unitfee'),
                        'state_masterfee' => $request->input('state_masterfee'),
                        'state_royalty' => $request->input('state_royalty'),
                        'citywise' => $cityWise,
                        'city_investment' => $request->input('city_investment'),
                        'city_unitfee' => $request->input('city_unitfee'),
                        'city_masterfee' => $request->input('city_masterfee'),
                        'city_royalty' => $request->input('city_royalty')
                    ]);

                    // If saving the record in FranchisorMultiUnit Model failed
                    if (!$insFranchisorMultiUnit) {
                        // Log the error
                        $msg = 'franchisor Registration Failed: FranchisorMultiUnit Model' . $franchisorId;
                        $this->generateLog($msg, 'Update Failed');
                        BrandUpdateRequest::query()->where('br_brand_id', $franchisorId)->update(['br_status' => 0, 'updated_at' => date('Y-m-d h:i:s')]);
                        return redirect()->back();
                    }
                }
            }
        }

        //if selected element is trade partners
        if ($request->input('looking_franchise') == config('constants.LookingFor.TradePartner') || $request->input('looking_franchise') == config('constants.LookingFor.DealerDistributor')) {

            $lookingDealer = 1;
            $lookingTradePartner = 0;
            if ($request->input('looking_franchise') == config('constants.LookingFor.TradePartner')) {
                $lookingTradePartner = 1;
                $lookingDealer = 0;
            }

            $channelType = $request->get('channel_type');
            $tradeInvestment = $request->get('trade_investment');
            $tradeMargin = $request->get('trade_margin');
            $channelTypeCount = count($channelType);

            if (isset($tradeInvestment[0]) && !empty($tradeInvestment[0])) {
                $unitInvMin = Config('constants.InvestRange.' . $tradeInvestment[0] . '.min');
                $unitInvMax = Config('constants.InvestRange.' . $tradeInvestment[0] . '.max');
            }
            $tradePartnerCount = 0;
            while ($tradePartnerCount < $channelTypeCount) {
                $insertFranTradePartner = FranchisorTradePartner::query()->insert([
                    'franchisor_id' => $franchisorId,
                    'channel_type' => $channelType[$tradePartnerCount],
                    'trade_investment' => $tradeInvestment[$tradePartnerCount],
                    'trade_margin' => $tradeMargin[$tradePartnerCount]
                ]);

                $tradePartnerCount++;

                // If saving the record in FranchisorTradePartner Model failed
                if (!$insertFranTradePartner) {
                    // Log the error
                    $msg = 'franchisor Registration Failed: FranchisorTradePartner Model' . $franchisorId;
                    $this->generateLog($msg, 'Update Failed');

                    return redirect()->back();
                }
            }

        }

        //updating the database
        $updateBusiness = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update([
            //'company_name' => $request->input('company_name'),
            'ceo_name' => $request->input('ceo_name'),
            'ceo_email' => $request->input('ceo_email'),
            'ceo_mobile' => $request->input('ceo_mobile'),
            'fran_manager' => $request->input('fran_manager'),
            'fran_address' => $request->input('fran_address'),
            'country' => config('location.countryName.' . $request->input('country')),
            'pincode' => $request->input('pincode'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'telephone' => $request->input('telephone'),
            'website' => $request->input('website'),
            'secondary_email' => $request->input('secondary_email'),
            'ind_main_cat' => $request->input('ind_main_cat'),
            'ind_cat' => $request->input('ind_cat'),
            'ind_sub_cat' => $request->input('ind_sub_cat'),
            'operations_start_year' => $request->input('operations_start_year'),
            'franchise_start_year' => $request->input('franchise_start_year'),
            'no_fran_outlets' => $request->input('no_fran_outlets'),
            'no_retail_outlets' => $request->input('no_retail_outlets'),
            'no_company_outlets' => $request->input('no_company_outlets'),
            'outlet_locations' => $outletLocations,
            'marketting_materials' => $marketingMaterial,
            'franchise_partner_type' => $franchisorPartnerType,
            'looking_tradepartner' => $lookingTradePartner,
            'looking_franchise' => $lookingFranchise,
            'is_dealer_distributor' => $lookingDealer,
            'unit_investment' => $unitInvestment,
            'unit_inv_min' => $unitInvMin,
            'unit_inv_max' => $unitInvMax,
            'unitinv_brand_fee' => $unitInvBrandFee,
            'unitinv_royalty' => $unitInvRoyalty,
            'business_desc_update' => $detail
        ]);

        $this->recordUpdateTime();

        // If saving the record in FranchisorBusinessDetail Model failed
        if (!$updateBusiness) {
            // Log the error
            $msg = 'franchisor Registration Failed: FranchisorBusinessDetail Model' . $franchisorId;
            $this->generateLog($msg, 'Update Failed');

            // return back to the franchisor registration page
            return redirect('franchisor/myaccount/businessdetails');
        }
        $this->franPercentage();
        //redirecting to the same page with successful flash data
        session()->flash('Success', 'successfully Updated');

        return redirect()->back();
    }

    /**
     * view property details
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function viewPropertyDetails()
    {
        $franchisorId = request()->user()->profile_str;
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();

        $paybackResult[0] = 0;
        if ($franData->payback_period != "0-0 Month" && $franData->payback_period != "") {
            $paybackPeriod = explode('-', $franData->payback_period);
            if (count($paybackPeriod) > 1) {
                $payback = explode(' ', $paybackPeriod[1]);
                $paybackResult[0] = $paybackPeriod[0];
                $paybackResult[1] = $payback[0];
                $paybackResult[2] = $payback[1];
            } else {
                //return 'Hello World';
                $paybackResult[0] = 0;
                $paybackResult[1] = 0;
                $paybackResult[2] = 'Year';
            }
        }
        return view('franchisor/myAccount/property-details', compact('franData'), ['paybackResult' => $paybackResult]);
    }

    /**
     * view property details
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePropertyDetails(Request $request)
    {
        $franchisorId = request()->user()->profile_str;
        $payback_period = $request->input('payback_period_min') . '-' . $request->input('payback_period_max') . ' ' . $request->input('payback_period_type');
        $update = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update([
            'is_territorial_rights' => $request->input('is_territorial_rights'),
            'is_perform_guarranty' => $request->input('is_perform_guarranty'),
            'is_marketting_levies' => $request->input('is_marketting_levies'),
            'anticipated_roi' => $request->input('anticipated_roi'),
            'payback_period' => $payback_period,
            'other_investment_req' => $request->input('other_investment_req'),
            'is_finance_aid' => $request->input('is_finance_aid'),
            'property_type' => config('constants.propertyType.' . $request->input('property_type')),
            'prop_area_min' => $request->input('prop_area_min'),
            'prop_area_max' => $request->input('prop_area_max'),
            'pref_prop_location' => $request->input('pref_prop_location'),
            'premise_outfit_arrangement' => $request->input('premise_outfit_arrangement'),
            'site_selection_assistance' => $request->input('site_selection_assistance'),
        ]);

        $this->recordUpdateTime();

        // If saving the record in FranchisorBusinessDetail Model failed
        if (!$update) {
            // Log the error
            $msg = 'franchisor Registration Failed: FranchisorBusinessDetail Model' . $franchisorId;
            $this->generateLog($msg, 'Update Failed');

            // return back to the franchisor registration page
            return redirect('franchisor/myaccount/propertydetails');
        }

        //Recalculate franchisor %
        $this->franPercentage();

        //redirecting to the same page with successful flash data
        session()->flash('Success', 'successfully Updated');

        return redirect()->back();
    }

    /**
     * view professional details
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function viewProfessionalDetails()
    {
        //fetching data
        $franchisorId = request()->user()->profile_str;
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $country = FranchisorLocCountry::query()->where('franchisor_id', $franchisorId)->select('country_longname')->get();
        $stateOnlyData = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->distinct()->select('state')->pluck('state')->toArray();
        $onlyCity = FranchisorLocState::query()->where('franchisor_id', $franchisorId)->where('city', '!=', '')->select('city')->pluck('city')->toArray();

        return view('franchisor/myAccount/professional-details', compact('franData', 'onlyCity', 'stateOnlyData', 'country'));
    }

    /**
     * update profile myAccount Franchisor professional page details
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateProfessionalDetails(Request $request)
    {
        $franchisorId = request()->user()->profile_str;
        $error = config('customErrors.errorType.critical');
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $intlCount = 0;
        $expansionLocType = 1;
        $isLookingInternational = 0;

        FranchisorLocCountry::query()->where('franchisor_id', $franchisorId)->delete();
        FranchisorLocState::query()->where('franchisor_id', $franchisorId)->delete();


        //Inserting data into franchisor_loc_states for states for different regions
        if ($request->input('expansion_loc_type') == config('constants.ExpansionLocationType.1')) {
            $expansionLocType = 1;

            //north region data
            if (!empty($request->get('state'))) {
                $franchiseNorthStates = $request->get('state');
                $franchiseNorthStatesCount = count($franchiseNorthStates);
                $statesCount = 0;

                while ($statesCount < $franchiseNorthStatesCount) {
                    $region = "";
                    $state = $franchiseNorthStates[$statesCount];
                    $northStates = config('location.northStates');
                    $westStates = config('location.westStates');
                    $eastStates = config('location.eastStates');
                    $southStates = config('location.southStates');
                    $centralStates = config('location.centralStates');
                    $unionTerritoryStates = config('location.unionTerriotoryStates');

                    foreach ($northStates as $north)
                        if ($state == $north)
                            $region = 'North';

                    foreach ($westStates as $west)
                        if ($state == $west)
                            $region = 'West';

                    foreach ($eastStates as $east)
                        if ($state == $east)
                            $region = 'East';

                    foreach ($southStates as $south)
                        if ($state == $south)
                            $region = 'South';

                    foreach ($centralStates as $central)
                        if ($state == $central)
                            $region = 'Center';

                    foreach ($unionTerritoryStates as $unionTerritory)
                        if ($state == $unionTerritory)
                            $region = 'UT';


                    $insert = FranchisorLocState::query()->insert([
                        'franchisor_id' => $franchisorId,
                        'region' => $region,
                        'state' => $franchiseNorthStates[$statesCount]
                    ]);

                    // If saving the record in FranchisorLocState Model failed
                    if (!$insert) {
                        DB::getFacadeRoot()->rollback();
                        // Log the error
                        $msg = 'franchisor Registration Failed: FranchisorLocState Model' . $franchisorId;
                        $this->generateLog($msg, $error);

                        // return back to the franchisor registration page
                        return redirect()->back();
                    }

                    $statesCount++;
                }
            }
        }

        //Inserting data into franchisor_loc_states for cities
        if ($request->input('expansion_loc_type') == config('constants.ExpansionLocationType.2')) {

            if (!empty($request->get('looking_expansion_city'))) {
                $expansionLocType = 2;

                // Cities input array
                $franchisorCities = $request->get('looking_expansion_city');

                // Assign the city array to a variable
                $citySubArr = config('location.cityArr');

                // Iterate the input cities array
                foreach ($franchisorCities as $value) {
                    $i = 1;
                    // Iterate the config constants city array
                    while ($i <= count($citySubArr)) {
                        $region = '';
                        $stateKey = array_search($value, $citySubArr[$i]);
                        $state = config("location.stateArr.$i");
                        $northStates = config('location.northStates');
                        $westStates = config('location.westStates');
                        $eastStates = config('location.eastStates');
                        $southStates = config('location.southStates');
                        $centralStates = config('location.centralStates');
                        $unionTerritoryStates = config('location.unionTerriotoryStates');

                        foreach ($northStates as $north)
                            if ($state == $north)
                                $region = 'North';

                        foreach ($westStates as $west)
                            if ($state == $west)
                                $region = 'West';

                        foreach ($eastStates as $east)
                            if ($state == $east)
                                $region = 'East';

                        foreach ($southStates as $south)
                            if ($state == $south)
                                $region = 'South';

                        foreach ($centralStates as $central)
                            if ($state == $central)
                                $region = 'Center';

                        foreach ($unionTerritoryStates as $unionTerritory)
                            if ($state == $unionTerritory)
                                $region = 'UT';

                        // For key value 0 validation, use is_numeric
                        if (is_numeric($stateKey)) {
                            $insert = FranchisorLocState::query()->insert([
                                'franchisor_id' => $franchisorId,
                                'city' => $value,
                                'region' => $region,
                                'state' => $state
                            ]);

                            // If saving the record in FranchisorLocState Model failed
                            if (!$insert) {
                                DB::getFacadeRoot()->rollback();
                                // Log the error
                                $msg = 'franchisor Registration Failed: FranchisorLocState Model' . $franchisorId;
                                $this->generateLog($msg, $error);

                                // return back to the franchisor registration page
                                return redirect()->back();
                            }

                            break;
                        }
                        $i++;
                    }
                }
            }
        }

        //Inserting data into franchisor_loc_countries from step 3
        if ($request->input('is_looking_intl_franchise') == config('constants.InternationalFranchise.yes')) {
            if (!empty($request->get('international_franchise'))) {

                $isLookingInternational = 1;
                $internationalFranchise = $request->get('international_franchise');

                while ($intlCount < count($internationalFranchise)) {
                    $insert = FranchisorLocCountry::query()->insert([
                        'franchisor_id' => $franchisorId,
                        'country_longname' => $internationalFranchise[$intlCount]
                    ]);
                    $intlCount++;

                    // If saving the record in FranchisorLocCountry Model failed
                    if (!$insert) {
                        // Log the error
                        $msg = 'franchisor Registration Failed: FranchisorLocCountry Model' . $franchisorId;
                        $this->generateLog($msg, 'Update Failed');

                        // return back to the franchisor registration page
                        return redirect()->back();
                    }
                }
            }
        }

        //Updating Franchisor Business Details
        FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update(['expansion_loc_type' => $expansionLocType, 'is_looking_intl_franchise' => $isLookingInternational]);

        // Send mail if franchisor is international
        if ($request->input('is_looking_intl_franchise') == config('constants.InternationalFranchise.yes')) {
            if ($franData->is_looking_intl_franchise == 0) {
                $companyData = [
                    'companyName' => $franData->company_name,
                    'fid' => $franchisorId,
                    'email' => request()->user()->email,
                    'address' => $franData->fran_address . ',' . $franData->city . ',' . $franData->state . ',' . $franData->pincode . ',' . $franData->country,
                    'ceoName' => $franData->ceo_name,
                    'mobile' => request()->user()->mobile,
                    'manager' => $franData->fran_manager,
                ];

                $this->sendMailNotification('sachin@franchiseindia.com', new international($companyData));

            }
        }

        $this->recordUpdateTime();

        // Flash the error message in client window
        session()->flash('Success', 'Successfully updated');

        $this->franPercentage();

        return redirect()->back();
    }

    /**
     * myaccount view training details
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function viewTrainingAgreement()
    {
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', request()->user()->profile_str)->first();
        return view('franchisor/myAccount/training-agreements', compact('franData'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateTrainingAgreement(Request $request)
    {
        $franchisorId = request()->user()->profile_str;
        $franchiseTimeDuration = $request->input('franchise_term_duration');
        if ($request->input('franchise_term_duration') == config('constants.FranchiseTermDuration.2'))
            $franchiseTimeDuration = $request->input('franchise_term_year');

        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update([
            'is_detailed_manuals' => $request->input('is_detailed_manuals'),
            'franchise_training_loc' => $request->input('franchise_training_loc'),
            'is_field_assistance' => $request->input('is_field_assistance'),
            'ho_assistance' => $request->input('ho_assistance'),
            'is_it_support' => $request->input('is_it_support'),
            'std_fran_aggreement' => $request->input('std_fran_aggreement'),
            'franchise_term_duration' => $franchiseTimeDuration,
            'term_renewable' => $request->input('term_renewable')
        ]);

        $this->recordUpdateTime();

        // If saving the record in FranchisorBusinessDetail Model failed
        if (!$franData) {
            // Log the error
            $msg = 'franchisor Registration Failed: FranchisorBusinessDetail Model' . $franchisorId;
            $this->generateLog($msg, 'Update Failed');

            // return back to the franchisor registration page
            return redirect()->back();
        }

        //redirecting to the same page with successful flash data
        session()->flash('Success', 'successfully Updated');
        return redirect()->back();
    }

    /**
     * show feedback form franchisor profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function showFeedback()
    {
        return view('franchisor/myAccount/feedback');
    }

    /**
     * updating franchisor profile password
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePassword(Request $request)
    {
        //validating the input parameters
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|min:6',
            'password_again' => 'required|same:new_password',
        ]);

        $franchisorId = request()->user()->profile_str;
        $oldPassword = UserAccount::query()->where('profile_str', '=', $franchisorId)->select('password')->first();

        //hash checking the password to be changed
        if (!Hash::getFacadeRoot()->check(request()->password, $oldPassword->password)) {
            session()->flash('failed', 'Password did not match please try again with correct password');
            return redirect('franchisor/myaccount/changepassword');
        } else {
            $update = UserAccount::query()->where('profile_str', $franchisorId)->update(['password' => Hash::getFacadeRoot()->make($request->new_password)]);
            $this->recordUpdateTime();
        }

        // If saving the record in UserAccount Model failed
        if (!$update) {
            // Log the error
            $msg = 'franchisor Registration Failed: UserAccount Model' . $franchisorId;
            $this->generateLog($msg, 'Update Failed');

            // return back to the franchisor registration page
            return redirect('franchisor/myaccount/changepassword');
        }

        //redirecting to the same page with successful flash data
        session()->flash('Success', 'Password Successfully Changed');
        return redirect('franchisor/myaccount/changepassword');
    }

    /**
     * expressed interest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function expressInterest()
    {
        $expressedInterests = UserActivity::query()
            ->where('franchisor_id', request()->user()->profile_str)
            ->whereNotNull('investor_id')
            ->where('investor_id', '!=', 'Anonymous')
            ->orderBy('clickID', 'desc')
            ->paginate(15);

        //Pass data to view
        return view('franchisor.myAccount.xpressed-interest', compact('expressedInterests'));
    }

    /**
     * Insta Responses
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function instaResponse()
    {
        $franchisorId = request()->user()->profile_str;
        $franData = FranchisorBusinessDetail::query()->select('franchisor_id', 'fleads_status')->where('franchisor_id', $franchisorId)->first();
        $insta = ExpressInstaApply::query()
            ->where('franchisor_id', request()->user()->profile_str)
            ->orderBy('id', 'DESC')
            ->paginate(15);

        $instafirst = ExpressInstaApply::query()
            ->where('franchisor_id', request()->user()->profile_str)
            ->orderBy('id', 'ASC')
            ->take(5)
            ->get();

        $fiveids = $instafirst->pluck('id')->toArray();
        $fiveids = collect($fiveids)->map(function ($item) {
            return ['id' => $item];
        })->toArray();

        $count = count($insta);

        return view('franchisor/myAccount/insta-response', compact('insta', 'fiveids', 'franData'));
    }

    /**
     * Response manager
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function viewResponseManager()
    {
        $franchisorId = request()->user()->profile_str;
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $expressInterest = UserActivity::query()->select('investor_id')
            ->where('franchisor_id', $franchisorId)
            ->whereNotNull('investor_id')
            ->where('investor_id', '!=', 'Anonymous')
            ->orderBy('clickID', 'desc')
            ->get();
        $uniqInvestorsArr = array_unique(array_column($expressInterest->toArray(), 'investor_id'));
        $applyCount = (ExpressInstaApply::query()->where('franchisor_id', $franchisorId)->count()) + (count($uniqInvestorsArr));

        $membershipType = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->select('membership_type')->first();
        return view('franchisor/myAccount/response-manager', compact('applyCount', 'membershipType'), ['franData' => $franData]);
    }

    /**
     * Downloading the responses Instant responses
     * @return mixed
     */
    public function allInstaResponse()
    {
        $franchisorId = request()->user()->profile_str;
        $table = Insta::query()->where('franchisor_id', $franchisorId)->orderBy('id', 'DESC')->get();
        $filename = "/tmp/insta_responses.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Name', 'Email', 'Phone', 'Address', 'City', 'State', 'Pincode', 'Investment', 'Date'));
        foreach ($table as $row) {
            $address = $row->address . ',' . $row->city . ',' . $row->state;
            if (request()->user()->membership_type == 1 && $row->visibility == 1) {

                $invAmt = is_numeric($row->investment) ? Config('constants.investRangeInWords.' . $row->investment) : 'Not Visible';
                fputcsv($handle, array($row->name, $row->email, $row->phone, $address, $row->city, $row->state, $row->pincode, $invAmt, $row->create_date));
            } else {
                fputcsv($handle, array($row->name, "anonymous@xyz.com", "Not Visible", "Not Visible", "Not Visible", "Not Visible", "Not Visible", "Not Visible", $row->create_date));
            }
        }
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        $this->recordLeadDownload($franchisorId, 1);

        return Response::getFacadeRoot()->download($filename, 'InstaResponse.csv', $headers);
    }

    /**
     * downloading the interests
     * @return mixed
     */
    public function allInterestToCsv()
    {
        if (empty(request()->user()) || request()->user()->membership_type != 1)
            return "";

        $franchisorId = request()->user()->profile_str;
        $expressedInterests = UserActivity::query()
            ->where('franchisor_id', $franchisorId)
            ->whereNotNull('investor_id')
            ->where('investor_id', '!=', 'Anonymous')
            ->orderBy('clickID', 'desc')
            ->get();
        $filename = "/tmp/express_interest.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Name', 'Email', 'Available Capital', 'Phone', 'Address', 'State', 'City', 'application date'));

        foreach ($expressedInterests as $expData) {
            $address = "Not Visible";
            $invAmt = Config('constants.investRangeInWords.' . $expData->investor->inv_amt);
            $name = $expData->investor->userDetail->name;
            $email = "Not Visible";
            $mobile = "Not Visible";

            $state = "Not Visible";
            $city = "Not Visible";

            if (request()->user()->membership_type == 1 && $expData->franchisor_visibility == 1) {
                $address = "";
                if (!empty($expData->investor->inv_address))
                    $address .= $expData->investor->inv_address . ", ";
                if (!empty($expData->investor->inv_city))
                    $address .= $expData->investor->inv_city . ", ";
                if (!empty($expData->investor->inv_state))
                    $address .= $expData->investor->inv_state . ", ";
                if (!empty($expData->investor->inv_pincode))
                    $address .= "Pin-code:-" . $expData->investor->inv_pincode . ", ";
                if (!empty($expData->investor->inv_country))
                    $address .= $expData->investor->inv_country;

                $email = $expData->investor->userDetail->email;
                $mobile = $expData->investor->userDetail->mobile;

                $state = $expData->investor->inv_state;
                $city = $expData->investor->inv_city;
            }

            fputcsv($handle, array($name, $email, $invAmt, $mobile, $address, $state, $city, $expData->visit_date));
        }

        fclose($handle);

        $headers = ['Content-Type' => 'text/csv'];

        $this->recordLeadDownload($franchisorId, 2);

        return Response::getFacadeRoot()->download($filename, 'ExpressInterest.csv', $headers);
    }

    /**
     * my account view appearance
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function appearance()
    {
        $franData = FranchisorBusinessDetail::query()->select('video_link', 'page_layout_type')->where('franchisor_id', request()->user()->profile_str)->first();
        $sliderData = FranchisorSliderImage::query()->where('franchisor_id', request()->user()->profile_str)->get();
        return view('franchisor/myAccount/appearance', compact('franData', 'sliderData'));
    }

    /**
     * myaccount view appearance
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editAppearance(Request $request)
    {
        $this->validate($request, [
            'sliderimage1' => 'image',
            'sliderimage2' => 'image',
            'sliderimage3' => 'image',
            'sliderimage4' => 'image',
            'sliderimage5' => 'image',
        ]);

        FranchisorBusinessDetail::query()->where('franchisor_id', request()->user()->profile_str)
            ->update([
                'video_link' => $request->video_link,
                'page_layout_type' => $request->layout_type
            ]);
        $this->recordUpdateTime();

        $mail = 0;
        for ($i = 0; $i <= 5; $i++) {
            if ($request->hasFile('sliderimage' . $i)) {
                $sliderImage = $request->file('sliderimage' . $i);
                $extension = Request::getFacadeRoot()->file('sliderimage' . $i)->getClientOriginalExtension();
                $sliderImagePath = sprintf(config('constants.FranchisorSliderPics'), date('md')) . '/' . rand() . '.' . $extension;
                Storage::getFacadeRoot()->disk('s3')->put($sliderImagePath, file_get_contents($sliderImage), 'public');
                $url = Storage::getFacadeRoot()->disk('s3')->url($sliderImagePath);
                //Inserting Image to database
                FranchisorSliderImage::query()->insert([
                    'franchisor_id' => request()->user()->profile_str,
                    'pre_approved_image' => $url
                ]);
                $mail = 1;
            }
        }

        if ($mail == 1) {
            $company = FranchisorBusinessDetail::query()->select('company_name')->where('franchisor_id', request()->user()->profile_str)->first()->company_name;

            $data = " 
                    FranchisorId                                       =   " . request()->user()->profile_str . "
                    Company Name                                       =   " . $company;

            Mail::getFacadeRoot()->raw($data, function ($message) {
                $message->subject('Franchisor Requested For Slider Image Changes');
                $message->to('service@franchiseindia.net');
            });
        }

        return redirect()->back();
    }

    /**
     * deleting slider image
     * @param Request $request
     * @return array
     */
    public function deleteSliderImage(Request $request)
    {
        $abc = parse_url(request()->image);
        Storage::getFacadeRoot()->disk('s3')->delete($abc['path']);
        FranchisorSliderImage::query()->where('image', $request->image)->delete();
        $this->recordUpdateTime();
        return $request->all();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function paymentPlan()
    {

        $data = UserAccount::query()->where('profile_str', request()->user()->profile_str)->first();
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', request()->user()->profile_str)->first();
        // dd($franData);
        if ($data->membership_type == 1) {
            $planDetail = OnlinePayment::query()->where('profile_id', request()->user()->profile_str)->orderBy('payment_id', 'DESC')->first();
            $membershipPlan = ProfileMembership::query()->where('profile_id', request()->user()->profile_str)->orderBy('membership_id', 'DESC')->first();
            return view('franchisor/myAccount/payment-plan', compact('planDetail', 'franData', 'data', 'membershipPlan'));
        } else {

            return view('franchisor/myAccount/payment-plan', compact('franData', 'data'));
        }
    }

    /**
     * upgrade account my account franchisor
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function upgradeAccount(Request $request)
    {
        //Authentication routes
        if (!request()->user())
            return redirect('loginform');

        if (request()->user()->profile_type != config('constants.ProfileType.Franchisor'))
            return redirect('investor/myaccount/dashboard');

        $franchisorId = request()->user()->profile_str;
        $tranId = FranchisorController::uniqueRandomNumber();
        $plan = $request->amount_to_pay;

        FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update(['video_link' => $request->video_link, 'activation_date' => date('Y-m-d')]);
        $this->recordUpdateTime();

        $franDetail = FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $amount = Config('constants.membershipPlanFranchisor.' . $plan);
        $amount = $amount + (($amount * 18) / 100);
        $mopt = $request->mopt;
        OnlinePayment::query()->insert([
            'order_no' => $tranId,
            'profile_type' => 1,
            'profile_id' => $franchisorId,
            'name' => $franDetail->ceo_name,
            'email' => request()->user()->email,
            'phone' => request()->user()->mobile,
            'city' => $franDetail->city,
            'country' => $franDetail->country,
            'product_details' => Config('constants.membershipPlanFranchisorDetail.' . $plan),
            'membership_plan' => $plan,
            'amount' => $amount,
            'gst_no' => $request->gst_no,
            'mopt' => $mopt,
            'payment_status' => 0
        ]);

        $name = $franDetail->ceo_name;
        $email = request()->user()->email;
        $phone = request()->user()->mobile;
        $city = $franDetail->city;
        $country = $franDetail->country;
        $address = $city . ',' . $country;
        $detail = Config('constants.membershipPlanFranchisorDetail.' . $plan);


        return view('site/franpayment', compact('name', 'email', 'phone', 'country', 'address', 'detail', 'tranId', 'amount', 'mopt'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function franPhotoChange()
    {
        $franData = FranchisorBusinessDetail::query()->select('company_logo', 'pre_approved_logo')->where('franchisor_id', request()->user()->profile_str)->first();
        return view('franchisor/myAccount/fran-photochange', compact('franData'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function franPhotoUpload(Request $request)
    {
        $url = "";
        if (!empty($request->pre_approved_logo))
            Storage::getFacadeRoot()->disk('s3')->delete(parse_url($request->pre_approved_logo)['path']);

        // only for testing comment

        if (!empty($request->file('company_logo'))) {
            $companyLogo = $request->file('company_logo');
            $extension = $request->file('company_logo')->getClientOriginalExtension();
            $companyLogoPath = sprintf(config('constants.FranchisorCompanyLogo'), date('md')) . '/' . rand() . '.' . $extension;
            Storage::getFacadeRoot()->disk('s3')->put($companyLogoPath, file_get_contents($companyLogo), 'public');
            $url = Storage::getFacadeRoot()->disk('s3')->url($companyLogoPath);

            FranchisorBusinessDetail::query()->where('franchisor_id', request()->user()->profile_str)
                ->update(['pre_approved_logo' => $url]);
            $this->recordUpdateTime();
        }


        $franData = FranchisorBusinessDetail::query()->select('company_name', 'company_logo', 'pre_approved_logo')->where('franchisor_id', request()->user()->profile_str)->first();

        if (request()->user()->membership_type == 0) {
            //profile upgrade trying Mail
            $mailData[0] = request()->user()->profile_str;
            $mailData[1] = $franData->company_name;
            $mailData[2] = request()->user()->email;
            $mailData[3] = $url;
            $this->sendMailNotification('ashita@franchiseindia.com', new UpgradeNotice($mailData));
        }
        session()->flash('Success', 'Your logo is under moderation process');
        return redirect()->back();
    }

    /**
     * @param $franArr
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getFranchisorDetails($franArr)
    {
        return FranchisorBusinessDetail::query()->whereIn('franchisor_id', $franArr)->get();
    }

    /**
     * Generating franchisor profile completion percentage
     */
    public static function franPercentage()
    {
        $value = 0;
        $cookieNameFran = 'franPercentage';
        $franData = FranchisorBusinessDetail::query()->where('franchisor_id', request()->user()->profile_str)->first();

        if (!empty($franData->brand_name))
            $value = $value + 2;
        if (!empty($franData->ceo_name))
            $value = $value + 2.3;
        if (!empty($franData->company_name))
            $value = $value + 2.3;
        if (!empty($franData->fran_manager))
            $value = $value + 2.3;
        if (!empty($franData->fran_address))
            $value = $value + 2.3;
        if (!empty($franData->country))
            $value = $value + 2;
        if (!empty($franData->pincode))
            $value = $value + 2.3;
        if (!empty($franData->state))
            $value = $value + 2;
        if (!empty($franData->city))
            $value = $value + 2;
        if (!empty($franData->telephone))
            $value = $value + 2;
        if (!empty($franData->secondary_email))
            $value = $value + 2;
        if (!empty($franData->website))
            $value = $value + 2;
        if (!empty($franData->ind_main_cat))
            $value = $value + 2.3;
        if (!empty($franData->ind_cat))
            $value = $value + 2.3;
        if (!empty($franData->ind_sub_cat))
            $value = $value + 2.3;
        if (!empty($franData->operations_start_year))
            $value = $value + 2.3;
        if (!empty($franData->franchise_start_year))
            $value = $value + 2.3;
        if (!empty($franData->no_fran_outlets))
            $value = $value + 2.3;
        if (!empty($franData->no_retail_outlets))
            $value = $value + 2.3;
        if (!empty($franData->no_company_outlets))
            $value = $value + 2;
        if (!empty($franData->outlet_locations))
            $value = $value + 2;
        if (!empty($franData->business_desc))
            $value = $value + 2;

        $value = $value + 10;
        $value = $value + 8;

        $value = $value + 5;

        if (!empty($franData->franchise_term_duration))
            $value = $value + 2;
        if (!empty($franData->franchise_training_loc))
            $value = $value + 2;
        if (!empty($franData->premise_outfit_arrangement))
            $value = $value + 2;
        if (!empty($franData->pref_prop_location))
            $value = $value + 2;
        if (!empty($franData->prop_area_min))
            $value = $value + 2;
        if (!empty($franData->property_type))
            $value = $value + 2;
        if (!empty($franData->other_investment_req))
            $value = $value + 2;
        if (!empty($franData->payback_period))
            $value = $value + 2;
        if (!empty($franData->anticipated_roi))
            $value = $value + 2;

        if ($franData->looking_franchise == 1)
            $value = $value + 4;

        if (!empty($franData->looking_franchise) && $franData->franchise_partner_type == 1) {
            if (!empty($franData->unitinv_brand_fee))
                $value = $value + 1;
            if (!empty($franData->unitinv_royalty))
                $value = $value + 1;
        }

        $multiunitData = FranchisorMultiUnit::query()->where('franchisor_id', request()->user()->profile_str)->first();
        if (!empty($franData->looking_franchise) && $franData->franchise_partner_type == 2) {
            if (!empty($multiunitData)) {
                if ($multiunitData->countrywise == 1 || $multiunitData->regionwise == 1 || $multiunitData->statewise == 1 || $multiunitData->citywise == 1)
                    $value = $value + 2;
            }
        }

        if (!empty($franData->looking_franchise) && $franData->franchise_partner_type == 3) {
            if (!empty($multiunitData)) {
                if ($multiunitData->countrywise == 1 || $multiunitData->regionwise == 1 || $multiunitData->statewise == 1 || $multiunitData->citywise == 1)
                    $value = $value + 2;
            }
        }


        if (!empty($franData->looking_tradepartner))
            $value = $value + 6;

        if (!empty(request()->user()->mobile))
            $value = $value + 2.3;

        if (request()->user()->membership_type == 1)
            $value = $value + 5.1;

        Cookie::getFacadeRoot()->queue($cookieNameFran, $value);
        session()->put('name', $franData->company_name);

        //feedback form logic
        if (request()->user()->membership_type == 1) {
            Cookie::getFacadeRoot()->queue('form_applicable', "0");
            $lastDate = FranPaymentHistory::query()
                ->select('end_date', 'start_date')
                ->where('franchisor_id', request()->user()->profile_str)
                ->where('status', 1)
                ->orderBy('track_id', 'DESC')
                ->first();

            if (!empty($lastDate)) {
                $endDateTime = date_create($lastDate->end_date);
                $todayDateTime = date_create(date('Y-m-d h:i:s'));
                $interval = date_diff($endDateTime, $todayDateTime);

                if ($interval->format('%R%a') > -5) {
                    $time = date('Y-m-d', strtotime('-5 days'));
                    $check = FranchisorFeedback::query()
                        ->where('franchisor_id', request()->user()->profile_str)
                        ->orderBy('feedback_id', 'DESC')
                        ->where('created_at', '>', $time)
                        ->count();

                    if ($check == 0) {
                        Cookie::getFacadeRoot()->queue('form_applicable', "1");

                        $date1 = strtotime($lastDate->start_date);
                        $date2 = strtotime(date('Y-m-d h:i:s'));
                        $months = 0;

                        while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
                            $months++;

                        Cookie::getFacadeRoot()->queue('franchisor_feedback_month', $months);
                    }
                }
            }
        }
    }

    /**
     * @param $msg
     * @param $errorMessage
     */
    private function generateLog($msg, $errorMessage)
    {
        Log::getFacadeRoot()->critical($msg);
        session()->flash('errorMessage', $errorMessage);
    }

    /**
     * @return string
     */
    public static function uniqueRandomNumber()
    {
        // Generate a random str with prefix FIHL
        $uniqueStr = mt_rand(100000, 99999999);

        // Check the str whether already exists in the user account table
        $chkExists = OnlinePayment::query()->where('order_no', $uniqueStr)->count();

        // If the random str already present, call the same function recursively
        if ($chkExists > 0)
            $uniqueStr = FranchisorController::uniqueRandomNumber();

        // return the unique random string
        return $uniqueStr;
    }

    /**
     * @param $email
     * @param $data
     */
    private function sendMailNotification($email, $data)
    {
         Mail::getFacadeRoot()->to($email)->send($data);
    }

    /**
     * @param $franchisorId
     * @param $type
     */
    public function recordLeadDownload($franchisorId, $type)
    {
        LeadDownload::query()->insert(['franchisor_id' => $franchisorId, 'lead_type' => $type]);
    }

    /**
     * Update record timing capturing
     */
    public function recordUpdateTime()
    {
        UserRecord::query()->updateOrCreate([
            'profile_str' => request()->user()->profile_str,
        ], [
            'last_updated_by_user' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * @param $franchisorId
     * @return mixed
     */
    public static function franchisorData($franchisorId)
    {
        return FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
    }
}
