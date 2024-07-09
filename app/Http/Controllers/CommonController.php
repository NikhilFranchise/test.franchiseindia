<?php

namespace App\Http\Controllers;

use App\Models\InvestorDetails;
use App\Models\InvestorIndustry;
use App\Models\Ip2Location;
use App\Models\SeoTag;
use App\Models\Pincode;
use App\Models\Advertise;
use App\Models\PopupLead;
use App\Models\User;
use App\Models\UserAccount;
use App\Models\FiNewsLetter;
use App\Mail\confirmed;
use App\Models\MobileVerification;
use App\Mail\AdvertiseMail;
use App\Models\FranchisorLocState;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Mail\NewsLetterSubscribe;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class CommonController extends Controller
{

    /**
     * @return ResponseFactory|Response
     */
    public function postExitPopup()
    {
        $emailCount = PopupLead::query()->where('email', request()->email)->orWhere('secondary_email', request()->email)->count();
        $phoneCount = PopupLead::query()->where('phone_no', request()->phone_no)->orWhere('secondary_phone_no', request()->phone_no)->count();

        if ($emailCount > 0 && $phoneCount == 0) {
            $id = PopupLead::query()->where('email', request()->email)->orWhere('secondary_email', request()->email)->first();
            PopupLead::query()->where('id', $id->id)->update(['secondary_phone_no' => request()->phone_no]);
        }

        if ($emailCount == 0 && $phoneCount > 0) {
            $id = PopupLead::query()->where('phone_no', request()->phone_no)->orWhere('secondary_phone_no', request()->phone_no)->first();
            PopupLead::query()->where('id', $id->id)->update(['secondary_email' => request()->email]);
        }

        if ($emailCount == 0 && $phoneCount == 0) {

            $source = "DOTCOM";
            if (!empty(Cookie::get('campaignSource')))
                $source = Cookie::get('campaignSource');

            PopupLead::query()->insert(['phone_no' => request()->phone_no, 'email' => request()->email, 'source' => $source]);
        }

        $message = "Your request is successfully submitted";

        return view('thanks.thanks', compact('message'));
    }

    /**
     * @return string
     */
    public function getCityList()
    {
        $cities = '<option value="">Select City</option>';

        if (!is_numeric(request()->state))
            return $cities;
        $city = Config('location.cityArr.' . request()->state);
        if (is_array($city)) {
            foreach ($city as $index => $value) {
                $cities .= "<option value='" . $value . "' slug='" . Str::slug($value) . "'>$value</option>";
            }
        }
        return $cities;
    }

    public function getCityListBystateName()
    {
        $key = array_search(request()->state, Config('location.stateArr'));
        $cities = '<option value="">Select City</option>';

        if (!is_numeric($key))
            return $cities;
        $city = Config('location.cityArr.' . $key);
        if (is_array($city)) {
            foreach ($city as $index => $value) {
                $cities .= "<option value='" . $value . "' slug='" . Str::slug($value) . "'>$value</option>";
            }
        }
        return $cities;
    }

    /**
     * Function to generate city list based upon Franchisor
     * @return string
     */
    public function getCityListLandingPage(Request $request)
    {

        $cities = '<option value="">Select City</option>';

        if (empty($request->franId) || empty($request->state))
            return $cities;

        $city = Config('location.cityArr.' . $request->state);
        $locationType = FranchisorBusinessDetail::query()->select('expansion_loc_type')
            ->where('franchisor_id', $request->franId)->first()->expansion_loc_type;
        // dd($locationType);

        if ($locationType == 2) {
           $citiesType2 = FranchisorLocState::query()->where('franchisor_id', $request->franId)
                ->where('state', Config('location.stateArr.' . $request->state))->get()->pluck('city');

            if (!empty($citiesType2)) {
                $city = $citiesType2;
            }
        }
        dd($city);
        foreach ($city as $index => $value) {
            $cities .= "<option value='" . $value . "'>$value</option>";
        }

        return $cities;
    }

    /**
     * Clearing Views
     */
    public function clearView()
    {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('optimize');
    }

    /**
     * @return string
     */
    public static function profileUniqStr()
    {
        // Generate a random str with prefix FIHL
        $uniqueStr = 'FIHL' . mt_rand(100000, 999999);
        // Check the str whether already exists in the user account table
        $chkExists = UserAccount::query()->where('profile_str', $uniqueStr)->count();

        // If the random str already present, call the same function recursively
        if ($chkExists > 0) {
            $uniqueStr = CommonController::profileUniqStr();
        }
        // return the unique random string
        return $uniqueStr;
    }

    /**
     * @return JsonResponse
     */
    public function getEmailStatus()
    {
        $msg = "";
        $emailCount = UserAccount::query()->select('email')->where('email', '=', request()->email)->count();
        if ($emailCount > 0)
            $msg = "Email Id already exist";
        return response()->json(array('msg' => $msg), 200);
    }

    /**
     * @return JsonResponse
     */
    public function getProfileStatus()
    {
        $profileNameCount = FranchisorBusinessDetail::query()->select('profile_name')->where(
            'profile_name',
            '=',
            request()->profile
        )->count();
        if ($profileNameCount > 0) {
            $msg1 = "Profile name already exist";
        } else {
            $msg1 = "";
        }
        return response()->json(array('msg1' => $msg1), 200);
    }

    /**
     * @return JsonResponse
     */
    public function getPincodeDetails()
    {
        $pinCodeDetails = Pincode::query()->select('city', 'state')->where('pincode', '=', request()->pincode)->first();
        if ($pinCodeDetails) {
            $pinCodeDetails->city = ucfirst(strtolower($pinCodeDetails->city));
            $pinCodeDetails->state = ucfirst(strtolower($pinCodeDetails->state));
            return response()->json($pinCodeDetails);
        } else {
            return response()->json(array('msg3' => "Pincode not found"), 200);
        }
    }

    /**
     * @return array
     */
    public function getCategory()
    {
        $CategoryArr = array(
            "1" => "Beauty & Health",
            "2" => "Food and Beverage",
            "3" => "Education",
            "5" => "Dealers & Distributors",
            "6" => "Business Services",
            "7" => "Home Based Business",
            "8" => "Automotive",
            "9" => "Retail",
            "10" => "Fashion",
            "11" => "Sports & Fitness & Entertainment",
            "263" => "Hotel, Travel & Tourism",
            "573" => "Industrial Machinery & Manufacturing"
        );
        asort($CategoryArr);
        return $CategoryArr;
    }

    /**
     * @param $start
     * @param $current
     * @return array|false
     */
    public function getYear($start, $current)
    {
        $key = [];
        $value = [];
        for ($i = $start; $i <= $current; $i++) {
            $key[] = $i;
            $value[] = $i;
        }
        $val = array_combine($key, $value);
        return $val;
    }

    /**
     * @return array|false
     */
    public function getOutlets()
    {
        $getOutlets = array(
            'No Outlets',
            'Less than 10',
            '10-20',
            '20-50',
            '50-100',
            '100-200',
            '200-500',
            '500-1000',
            '1000-10000',
            'More than 10000'
        );
        $returnArray = array_combine($getOutlets, $getOutlets);
        return $returnArray;
    }

    /**
     * Get Sub Category
     */
    public function getSubCategory()
    {
        echo '<option value="">Select Sector</option>';
        $categoryID = $_REQUEST['categoryID'];
        $GetCategoryData = new CategoryController();
        $subCatArr = $GetCategoryData->getSubCategory($categoryID);

        if (!empty($subCatArr) && is_array($subCatArr)) {
            asort($subCatArr);
            foreach ($subCatArr as $index => $value) {
                if (!is_array($value)) {
                    echo "<option value=" . $index . " slug=" . Config('category.SeoSubCategoryArr.' . $index) . ">$value</option>";
                }
            }
        }
    }

    /**
     * Get sub sub Category
     */
    public function getSubCatCategory()
    {
        $subcategoryID = $_REQUEST['subcategoryID'];
        $GetCategoryData = new CategoryController();
        $subSubCatArr = $GetCategoryData->getSubSubCategory($subcategoryID);
        asort($subSubCatArr);
        echo '<option value="">Select Service/Product</option>';
        foreach ($subSubCatArr as $index => $value) {
            if (!is_array($value))
                echo "<option value=" . $index . " slug=" . Config('category.SeoSubSubCategoryArr.' . $index) . ">$value</option>";
        }
    }

    /**
     * Sub Cat
     */
    public function getSubCat()
    {
        $categoryID = $_REQUEST['categoryID'];
        $GetCategoryData = new CategoryController();
        $subCatArr = $GetCategoryData->getSubCategory($categoryID);
        asort($subCatArr);
        foreach ($subCatArr as $index => $value) {
            if (!is_array($value)) {
                echo '<div class="radio" id="getSubCategoryData">';
                echo '<label><input value=' . $index . ' type="radio">' . $value . '</label>';
                echo '</div>';
            }
        }
    }

    /**
     * Sub Sub Cat
     */
    public function getSubSubCat()
    {
        $subcategoryID = $_REQUEST['subcategoryID'];
        $GetCategoryData = new CategoryController();
        $subSubCatArr = $GetCategoryData->getSubSubCategory($subcategoryID);
        asort($subSubCatArr);
        foreach ($subSubCatArr as $index => $value) {
            if (!is_array($value)) {
                echo '<li>';
                echo '<div class="checkbox" id="getSubSubCategoryData">';
                echo '<label><input value=' . $index . ' type="checkbox">' . $value . '</label>';
                echo '</div>';
                echo '</li>';
            }
        }
    }

    /**
     * @param $mobileNo
     * @param $message
     * @return JsonResponse
     */
    public static function sendTxtSms($mobileNo, $message)
    {
        $mobileNo = (string) ((int) $mobileNo);
        $message = htmlentities($message);

        /**
         *  Check For Mobile Verification Code
         */

        $contains = Str::contains($message, 'verification code is');
        if ($contains == false) {
            return response()->json(['message' => 'SMS Sending Block', 'status' => 'success']);
        }

        if (strlen($mobileNo) == 12 && substr($mobileNo, 0, 2) == "91")
            $mobileNo = substr($mobileNo, 2, 10);

        if (strlen($mobileNo) > 10)
            return response()->json(['message' => 'SMS Sending Failed(Not a valid indian number)', 'status' => 'failed']);

        if (!is_numeric($mobileNo))
            return response()->json(['message' => 'SMS Sending Failed(Not a valid numeric number)', 'status' => 'failed']);

        if (!in_array(substr($mobileNo, 0, 1), [9, 8, 7, 6]))
            return response()->json(['message' => 'SMS Sending Failed(Not a valid number)', 'status' => 'failed']);

        $mobile_regex = "/^[6-9][0-9]{9}$/";
        if (strlen($mobileNo) != 10 || !(preg_match($mobile_regex, $mobileNo) === 1))
            return response()->json(['message' => 'SMS Sending Failed(Not a valid number)', 'status' => 'failed']);

        $mobileNo = CommonController::cleanSpecialChar($mobileNo);

        // Account details
        $userName = urlencode(config('txtlocal.username')); // Username
        $apiKey = urlencode(config('txtlocal.apiKey')); // Hash

        // Message details
        $sender = urlencode(config('txtlocal.sender'));
        $message = rawurlencode($message);

        // Prepare data for POST request
        $data = "username=" . $userName . "&hash=" . $apiKey . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $mobileNo;

        // Send the POST request with cURL
        $ch = curl_init(config('txtlocal.apiUrl'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Process your response here
        $jsonData = json_decode($response, true);

        // If sms sending failed, log the data
        if ($jsonData['status'] == 'failure') {
            echo $jsonData['errors'][0]['message'];
            Log::getFacadeRoot()->alert('SMS sending Failed - CommonController : ' . $jsonData['errors'][0]['message'] . ' -- ' . $message . ' -- ' . $jsonData['errors'][0]['code'] . ' -- ' . $mobileNo);
            return response()->json(['message' => 'SMS Sending Failed', 'status' => 'failure']);
        }
        // If sms sending successful, return true
        return response()->json(['message' => 'SMS Sending successfull', 'status' => 'success']);
    }

    /**
     * @return ResponseFactory|string|Response
     */
    public function pincodeValidation()
    {
        $noResult = '';
        $users = Pincode::query()->select('city', 'state')->where('pincode', '=', request()->search)->first();
        if (count($users) > 0) {
            $users->city = ucfirst(strtolower($users->city));
            $users->state = ucfirst(strtolower($users->state));
            return response($users);
        }
        return $noResult;
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function emailValidation(Request $request)
    {
        $this->validate($request, ['search' => 'required|email']);

        $output['email'] = "";
        if (request()->search == "fiblbrands@franchiseindia.in" || request()->search == "info@opportunityindia.com" || request()->search == "feedback@franchiseindia.net" || request()->search == "info@franglobal.com")
            return response($output);

        $email = UserAccount::query()->where('email', request()->search)->first();

        if (!empty($email) && $email->profile_type == 1) {

            $checkFranchisor = FranchisorBusinessDetail::query()->where('franchisor_id', $email->profile_str)->first();
            if (!empty($checkFranchisor) && $checkFranchisor->step_completed > 0 && $checkFranchisor->step_completed < 6)
                return response($output);
        }
        // dd($email);
        if (!empty($email))
            $output['email'] = "email already exists";

        return response($output);
    }

    /**
     * @return Factory|View
     */
    public function verifyEmail()
    {
        $profileData = UserAccount::query()->where('email_verification_code', request()->id)->first();
        // dd(request()->id);
        if ($profileData === null || $profileData->count() === 0) {
            return view('static.email-reject');
        }


        $status = $profileData->profile_type != 1 ? Config('constants.ProfileStatus.Active') : Config('constants.ProfileStatus.Awaiting');

        $update = UserAccount::query()->where('email_verification_code', request()->id)
            ->update(['email_verification_code' => "", 'profile_status' => $status]);

        if (!$update)
            return view('static.email-reject');

        if ($profileData->profile_type == 2) {
            if (request()->segment(1) == "change-password") {
                Auth::login(User::query()->find($profileData->user_id));
                return redirect('investor/myaccount/changepassword');
            }
            return view('static.email-thanks-inv');
        }

        return view('static.email-thanks');
    }

    /**
     * @return RedirectResponse|Redirector
     */
    public function advertise()
    {
        Advertise::query()->insert([
            'name' => request()->name,
            'email' => request()->email,
            'mobile' => request()->mobile,
            'reg_type' => request()->id
        ]);
        $data[0] = request()->name;
        $data[1] = request()->email;
        $data[2] = request()->mobile;
        $data[3] = request()->id;


        if (request()->id == "Retailer") {
            Mail::to('retailer@franchiseindia.com')->send(new AdvertiseMail($data));
            return redirect('https://www.franchiseindia.com/pdf/retailer-magazine.pdf');
        }

        if (request()->id == "Entrepreneur") {
            Mail::to('aarora@entrepreneurindia.org')->send(new AdvertiseMail($data));
            return redirect('https://www.franchiseindia.com/pdf/entrepreneur-magazine.pdf');
        }

        if (request()->id == "Franchiseindia.com") {
            Mail::to('member@franchiseindia.com')->send(new AdvertiseMail($data));
            return redirect('https://www.franchiseindia.com/pdf/dotcom-media-kit2016.pdf');
        }

        if (request()->id == "TheFranchisingWorld") {
            Mail::to('ashita@franchiseindia.com')->send(new AdvertiseMail($data));
            return redirect('https://www.franchiseindia.com/pdf/tfw-magazine.pdf');
        }
        return redirect('https://www.franchiseindia.com/pdf/tfw-magazine.pdf');
    }

    /**
     * get subcategories for admin panel in article
     */
    public function getSubCategoryarticle()
    {
        $categoryID = $_REQUEST['categoryID'];
        $GetCategoryData = new CategoryController();
        $subCatArr = $GetCategoryData->getSubCategory($categoryID);
        foreach ($subCatArr as $index => $value) {
            echo "<option value=" . $index . ">$value</option>";
        }
    }

    /**
     * get sub sub categories for admin panel in article
     */
    public function getSubCatCategoryarticle()
    {
        $subcategoryID = $_REQUEST['subcategoryID'];
        $GetCategoryData = new CategoryController();
        $subSubCatArr = $GetCategoryData->getSubSubCategory($subcategoryID);
        foreach ($subSubCatArr as $index => $value) {
            echo "<option value=" . $index . ">$value</option>";
        }
    }

    /**
     * function to show change URL, where ' ' => '-'
     * @param $newsData
     * @return mixed
     * @internal param $string
     */
    public static function newsUrlSlug($newsData)
    {

        foreach ($newsData as &$value) {
            $value['urlTitle'] = CommonController::cleanSpecialChar($value['title']);
            $value['urlKicker'] = CommonController::cleanSpecialChar($value['kicker']);
        }

        return $newsData;
    }

    /**
     * function to show change URL, where ' ' => '-'
     * @param $articleData
     * @return mixed
     * @internal param $string
     */
    public static function contentUrlSlug($articleData)
    {
        try {
            if (!empty($articleData)) {
                foreach ($articleData as &$value) {
                    $value['urlTitle'] = CommonController::cleanSpecialChar($value['title']);
                    $value['urlKicker'] = CommonController::cleanSpecialChar($value['kicker']);
                    if ($value['site_type'] == 'ga') {
                        $seoTagId = SeoTag::query()->where('name', $value['kicker'])->first();
                        if (!empty($seoTagId))
                            $value['kicker_id'] = $seoTagId->tag_id;
                    }
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return $articleData;
    }

    /**
     * function to show change URL, where ' ' => '-'
     * @param $string
     * @return mixed
     */
    public static function cleanSpecialChar($string)
    {
        // Replace other special chars
        $specialCharacters = array(
            '#' => '',
            '$' => '',
            '%' => '',
            '&' => '',
            '@' => '',
            '.' => '',
            '?' => '',
            '+' => '',
            '=' => '',
            '§' => '',
            '\\' => '',
            '/' => '',
        );

        // while (list($character, $replacement) = each($specialCharacters)) {
        //     $string = str_replace($character, '-' . $replacement . '-', $string);
        // }
        foreach ($specialCharacters as $character => $replacement) {
            $string = str_replace($character, '-' . $replacement . '-', $string);
        }

        // Remove all remaining other unknown characters
        $string = preg_replace('/[^a-zA-Z0-9\-]/', ' ', $string);
        $string = preg_replace('/^[\-]+/', '', $string);
        $string = preg_replace('/[\-]+$/', '', $string);
        $string = preg_replace('/[\-]{2,}/', ' ', $string);

        $array_title_replace = array("    ", "   ", "  ", " ", "---");
        $content_title1 = str_replace($array_title_replace, "-", trim($string));

        return strtolower($content_title1);
    }

    /**
     * @param $email
     */
    public function createNewsLetter($email)
    {
        $siteType = "fi";
        $randValue = rand(100000, 9999999);
        $oldData = FiNewsLetter::query()->select('status')->where('email', $email)->where('site_type', $siteType)->first();

        // If no record exists, send the verification mail
        if (count($oldData) == 0) {
            FiNewsLetter::query()->insert([
                'email' => $email,
                'verify_code' => $randValue,
                'site_type' => $siteType
            ]);
        } else {
            FiNewsLetter::query()->where('email', $email)->where('site_type', $siteType)->update(['verify_code' => $randValue]);
        }

        Mail::getFacadeRoot()->to($email)->send(new NewsLetterSubscribe($randValue));
    }

    /**
     * @param $email
     * @param $userId
     * @param $name
     */
    public function sendProfileEmailVerificationMail($email, $userId, $name)
    {
        //sending the email on registration
        $code = Str::random(16);
        UserAccount::query()->where('profile_str', $userId)->update(['email_verification_code' => $code]);
        $data = [
            'companyName' => $name,
            'code' => $code,
        ];
        Mail::getFacadeRoot()->to($email)->send(new confirmed($data));
    }

    /**
     * @param $message
     * @param $error
     * @param $redirectLink
     * @return RedirectResponse|Redirector
     */
    public function dbFailedTransactionHandler($message, $error, $redirectLink)
    {

        // Log the error
        Log::getFacadeRoot()->error($message);

        //Put The error in session Variable to display on user's computer screen
        session()->flash('errorMessage', $error);

        //
        return redirect($redirectLink);
    }

    /**
     * @return JsonResponse
     * verify if the phone number already exists in db or not for registration step1
     */
    public function verifyMobile()
    {
        $mobile = request()->input('mobile');
        $check = UserAccount::query()->where('mobile', $mobile)->count();

        if (!empty(request()->input('email'))) {
            $user = UserAccount::query()->where('mobile', $mobile)->where('email', request()->input('email'))->first();
            if (!empty($user) && $user->profile_type == 1 && $user->profile_status == 4) {
                $checkFranchisor = FranchisorBusinessDetail::query()->where('franchisor_id', $user->profile_str)->first();
                if (!empty($checkFranchisor) && $checkFranchisor->step_completed > 0 && $checkFranchisor->step_completed < 6)
                    return response()->json(['check' => 99999999]);
            }
        }

        if (empty($check))
            $check = MobileVerification::query()->where('mobile_no', $mobile)->where('is_verified', 1)->count() != 0 ? 99999999 : 0;

        return response()->json(['check' => $check]);
    }

    /**
     * @return JsonResponse
     * verify the received otp match with the db otp
     */
    public function vrifyOtp()
    {
        $mobile = request()->input('mobileNo');
        $otp = request()->input('otpNo');
        $check = MobileVerification::query()->where('mobile_no', $mobile)->where('otp_code', $otp)->count();
        if ($check > 0) {
            MobileVerification::query()->where('mobile_no', $mobile)->where('otp_code', $otp)->update(['is_verified' => 1]);
        }
        return response()->json(['check' => $check]);
    }

    /**
     * Get location region name using ip
     * @param $locationIp
     * @return string
     */
    public static function getIpLocationState($locationIp)
    {
        $ip = ip2long($locationIp);
        if (empty($ip))
            return "noresult";

        $result = Ip2Location::query()->select('region_name')->where('ip_from', '<=', $ip)->where('ip_to', '>=', $ip)->first();
        if (empty($result))
            return "noresult";

        return $result->region_name;
    }

    /**
     * @param $desc
     * @return null|string|string[]
     */
    public static function cleanContent($desc)
    {
        return preg_replace('/style=\\"[^\\"]*\\"/', '', $desc);
    }

    /**
     * @param $desc
     * @return null|string|string[]
     */
    public static function cleanImageContent($desc)
    {
        return preg_replace("/<img[^>]+\>/i", "(image) ", $desc);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getEvents()
    {
        $XML = Storage::disk('local')->get('public/events.xml');
        // dd($XML);
        return collect(json_decode(json_encode((array) simplexml_load_string($XML)), true));
    }

    /**
     * @return Factory|View
     */
    public function franAutoLogin()
    {
        $franchisorId = base64_decode(request()->id);
        $userData = User::query()->where('profile_str', $franchisorId)->first();

        if (empty($userData) || $userData->profile_type != 1) {
            $message = "Oops this is a wrong request...";
            return view('thanks.thanks', compact('message'));
        }

        auth()->login($userData);
        return redirect('/franchisor/myaccount/dashboard');
    }

    /**
     * @return Factory|View
     */
    public function franCampaignDeactivation()
    {
        $franchisorId = base64_decode(request()->id);
        $userData = User::query()->where('profile_str', $franchisorId)->first();
        if (!empty($userData) && $userData->profile_type == 1) {
            User::query()->where('profile_str', $franchisorId)->update([
                'profile_status' => 7, // 7 is only for campaign data
            ]);
            FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->update([
                'profile_status' => 7, // 7 is only for campaign data
            ]);
        }
        $message = "Your profile has been successfully deactivated";

        return view('thanks.thanks', compact('message'));
    }

    /**
     * @return mixed|string
     */
    public static function checkInvestorApplicationEligibility()
    {
        $eligibility = [
            'abilityToApply' => 1,
            'message' => ""
        ];

        if (empty(request()->user()))
            return $eligibility;

        $profileCompletionPercentage = Cookie::get('invPercentage');
        if ($profileCompletionPercentage < 70) {
            $eligibility = [
                'abilityToApply' => 1,
                'message' => Config('constants.errorMessageProfileCompletionInvestor.1')
            ];
        }

        $industryData = InvestorIndustry::query()->where('investor_id', request()->user()->profile_str)->first();

        if (empty($industryData)) {
            $eligibility = [
                'abilityToApply' => 0,
                'message' => Config('constants.errorMessageProfileCompletionInvestor.2')
            ];
        }

        if (empty(request()->user()->name) || empty(request()->user()->mobile)) {
            $eligibility = [
                'abilityToApply' => 0,
                'message' => Config('constants.errorMessageProfileCompletionInvestor.3')
            ];
        }

        $investorData = InvestorDetails::query()->where('investor_id', request()->user()->profile_str)->first();
        if (empty($investorData) || empty($investorData->investment_time) || empty($investorData->inv_amt)) {
            $eligibility = [
                'abilityToApply' => 0,
                'message' => Config('constants.errorMessageProfileCompletionInvestor.4')
            ];
        }

        return $eligibility;
    }

    /**
     * Api controller method for FRO/BOS/MAGAZINE
     */
    public function investorCreationApi()
    {
        $insertData = [
            'name' => request()->name,
            'email' => request()->email,
            'mobile' => request()->mobile,
            'address' => request()->address,
            'state' => request()->state,
            'city' => request()->city,
            'pincode' => request()->pincode,
            'category_id' => request()->category_id,
            'investment_range' => request()->investment_range,
        ];

        $leadSource = Config('constants.leadSource.' . request()->lead_source);
        $investorController = new InvestorController;
        $investorController->convertLeadsToInvestor($insertData, $leadSource);
        return;
    }

    /**
     *
     */
    public static function checkCampaignUrl()
    {
        if (!empty(request()->utm_source) && !empty(request()->utm_campaign)) {
            Cookie::getFacadeRoot()->queue('campaignSource', base64_decode(request()->utm_source), 21600);
            Cookie::getFacadeRoot()->queue('campaignVersion', base64_decode(request()->utm_campaign), 21600);
        }
    }

    public function investormobileverify()
    {

        $mobile = request()->input('mobile');
        // dd($mobile);
        $check = UserAccount::query()->where('mobile', $mobile)->count();
        return $check;
    }

    public function investervrifyOtp()
    {
        $mobile = request()->input('mobileNo');
        $otp = request()->input('otpNo');
        $check = MobileVerification::query()->where('mobile_no', $mobile)->where('otp_code', $otp)->count();
        if ($check > 0) {
            MobileVerification::query()->where('mobile_no', $mobile)->where('otp_code', $otp)->update(['is_verified' => 1]);
        }
        return $check;
    }

    public function brandNameValidation(Request $request)
    {
        $this->validate($request, ['search' => 'required']);

        $output['brandname'] = "";
        $checkFranchisor = FranchisorBusinessDetail::query()->where('brand_name', request()->search)->first();

        if (!empty($checkFranchisor) && $checkFranchisor->step_completed > 0 && $checkFranchisor->step_completed < 6) {
            return response($output);
        }
        if (!empty($checkFranchisor)) {
            $output['brandname'] = "brand name already exists";
        }
        return response($output);
    }

    //TO clean video Urls//
    public static function getVideoUrl($string)
    {

        // Replace other special chars
        $specialCharacters = array(
            '#' => '',
            '$' => '',
            '%' => '',
            '&' => '',
            '@' => '',
            '.' => '',
            '?' => '',
            '+' => '',
            '=' => '',
            '§' => '',
            '\\' => '',
            '/' => '',
        );

        //while (list($character, $replacement) = each($specialCharacters)) {

        foreach ((array) $specialCharacters as $character => $replacement) { //replaced above code as The each() function is deprecated in php7//

            $string = str_replace($character, '-' . $replacement . '-', $string);
        }

        // Remove all remaining other unknown characters
        $string = preg_replace("/--'/", '', $string); //added to remove 's from string//
        $string = preg_replace('/[^a-zA-Z0-9\-]/', ' ', $string);
        $string = preg_replace('/^[\-]+/', '', $string);
        $string = preg_replace('/[\-]+$/', '', $string);
        $string = preg_replace('/[\-]{2,}/', ' ', $string);
        $array_title_replace = array("    ", "   ", "  ", " ", "---");
        $content_title1 = str_replace($array_title_replace, "-", trim($string));

        return strtolower($content_title1);
        //return str_replace('\'', '', $title);
    }
}
