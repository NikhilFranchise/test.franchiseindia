<?php

namespace App\Http\Controllers\Auth;

use App\Models\BrandPopupLead;
use App\Models\FranchisorBusinessDetail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FranchisorController;
use App\Http\Controllers\InvestorController;
use App\Models\InvestorDetails;
use App\Http\Controllers\CommonController;
use App\Models\UserAccount;
use App\Models\User;
use App\Models\UserRecord;
use App\Mail\autoInvestorRegistration;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'logoutProfile');
    }

    /**
     * @param $provider
     * @return mixed
     */
    public function redirectToProvider($provider)
    {
        if($provider != "linkedin")
            return Socialite::getFacadeRoot()->driver($provider)->redirect();

        return abort(404);
    }

    /**
     * @param $provider
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function handleProviderCallback($provider, Request $request)
    {
        if (!$request->has('code') || $request->has('denied')) {
            session()->flash('loginFailed', 'Please try again');
            return redirect('login');
        }

        $user  = Socialite::getFacadeRoot()->driver($provider)->stateless()->user();

        if(empty($user)) {
            session()->flash('loginFailed', 'Please try again');
            return redirect('login');
        }

        if($provider == "facebook") {
            $email = isset($user->user['email']) ? $user->user['email'] : "";
            $socialName = $user->user['name'];
        } else {
            $email = isset($user->email) ? $user->email : "";
            $socialName = $user->name;
        }

        if(empty($email)) {
            session()->flash('loginFailed', 'Please try again');
            return redirect('login');
        }

        $userData = User::query()->where('email', $email)->first();

        if ($userData != null) {

            $check = $this->checkProfile($userData);

            if (!empty($check))
                return $check;

            if ($userData->profile_status == 2) {
                session()->put('loginFailed', 'Dear User, Your Email verification is pending, kindly check your mail inbox for verification mail');
                return redirect('/login');
            }

            if ($userData->profile_status == 3 && $userData->profile_type == 1) {
                session()->put('loginFailed', 'Dear franchisor, Your moderation process is pending');
                return redirect('/login');
            }

            auth()->login($userData);
            $this->recordLoginTime();

            if (Auth::check()) {

                session()->flash('userloggedin', 1);

                if (request()->user()->profile_type == 1) {
                    FranchisorController::franPercentage();
                    return redirect('franchisor/myaccount/dashboard');
                } else {
                    InvestorController::setPercentage();
                    return redirect('/');
                }
            }
        }
        /* Code here for Registration by social login
        */
        else{

            // Generate the unique Investor ID
            $investorId = CommonController::profileUniqStr();
            // Investor Profile Type
            $profileType = config('constants.ProfileType.Investor');

            // Investor Profile status
            $profileStatus = config('constants.ProfileStatus.Active');

            // Error message to be flashed to client in case of DB insert error
            $error = "Our systems seems to be currently busy. Please try after some time!";

            // Fetch values from the request
            $name = $socialName;
            // $email = $email;
            $code = Str::random(16);
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $randomPassword = substr(str_shuffle($permitted_chars), 0, 10);
            $password = Hash::getFacadeRoot()->make($randomPassword);

            // Begin the transaction
            DB::getFacadeRoot()->beginTransaction();

            // Insert into UserAccount Model
            $insertUser = UserAccount::query()->insert([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'profile_str' => $investorId,
                'profile_type' => $profileType,
                'profile_status' => $profileStatus,
                'email_verification_code' => $code,
                'reg_source' =>  $provider
            ]);

            // Insert values in InvestorDetail Model
            $insertInvestor = InvestorDetails::query()
                ->insert([
                    'investor_id'             => $investorId,
                    'secondary_email'         => $email
                ]);
            //updating user account table for confirmation code
            $data = [
                'companyName' => $name,
                'password'    => $randomPassword,
                'code'        => $code,
            ];
            // If saving the record in InvestorDetail Model failed
            if (!$insertInvestor) {
                DB::getFacadeRoot()->rollback();
                // Log the error

                // Log the error
                $errorMsg = "Investor Registration Failed : InvestorDetail Model  $email";
                $this->generateLog($errorMsg);
                // Flash the error
                session()->flash('errorMessage', $error);
                // Redirect to the Investor registration page
                return redirect('investor/create');
            }

            // If we reach here, then data is valid and working. Commit the queries!
            DB::getFacadeRoot()->commit();
            $SocialuserData = User::query()->where('email', $email)->first();
            auth()->login($SocialuserData);
            $this->recordLoginTime();

            if (Auth::check()) {
                //Mail sending to investor for confirmation
                    Mail::getFacadeRoot()->to($email)->send(new autoInvestorRegistration($data));

                session()->flash('userloggedin', 1);
                InvestorController::setPercentage();
                return redirect('investor/myaccount/personaldetails');
            }
        }
        /* Code end for Registration by social login
        */

        if(!empty(session()->pull('lastUrl')))
            BrandPopupLead::query()->firstOrCreate(['email_id' => $email]);

        session()->put('loginFailed', 'Oops! Please register your email address as it is currently not listed on FranchiseIndia.com.');
        return redirect('/login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fiblLogin(Request $request)
    {
        if(empty($request->user()))
            return view('fibl/login');
        else
            return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function fiblLoginCheck(Request $request)
    {
        $admAuthHost = "{mail.franchiseindia.com:143/imap/notls}";
        $userData    = UserAccount::query()->where('profile_str', $request->fid)
						->where('profile_type', 1)
						->where('profile_status', 1)
						//->orWhere('email', 'fiblbrands@franchiseindia.in')
						//->orWhere('email', 'info@opportunityindia.com')
						//->orWhere('email', 'info@franglobal.com')
						->first();
        // dd($userData);
        if ($userData != null) {

            $check = $this->checkProfile($userData);

            if (!empty($check))
                return $check;

            if ($userData->profile_status == 2) {
                session()->put('loginFailed', 'Dear User, Your Email verification is pending, kindly check your mail inbox for verification mail');
                return redirect('fibl/login');
            }

            if ($userData->profile_status == 3 && $userData->profile_type == 1) {
                session()->put('loginFailed', 'Dear franchisor, Your moderation process is pending');
                return redirect('fibl/login');
            }

            if ($userData->profile_status != 1) {
                session()->put('loginFailed', 'Dear User, Your profile is not active. Please contact admin to activate your profile');
                return redirect('fibl/login');
            }

 /*           $mbox = 0;
            try {
                if($mbox = imap_open( $admAuthHost, "fiblbrands@franchiseindia.in", $request->password ))
                    $mbox = 1;
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
			try {
				if($mbox = imap_open( $admAuthHost, "info@opportunityindia.com", $request->password ))
					$mbox = 1;
			} catch (\Exception $e) {
				echo $e->getMessage();
			}
            if($mbox == 0) {
                try {
                    if($mbox = imap_open( $admAuthHost, "info@franglobal.com", $request->password ))
                        $mbox = 1;
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            }*/

           // if($request->password == 'KHBIUB*^211*YIjbkijbclkd%wf' || $mbox) {
            if($request->password == 'Ki5LH,gb-Mkd%wfJU4@siBA0') {

                if (Auth::getFacadeRoot()->login(User::query()->find($userData->user_id))) {
                    $this->recordLoginTime();
                    session()->flash('userloggedin', 1);
                    if (request()->user()->profile_type == 2) {
                        InvestorController::setPercentage();
                        return redirect()->to('/');
                    } else {
                        FranchisorController::franPercentage();
                        $franData = FranchisorBusinessDetail::query()->select('company_name')->where('franchisor_id', Auth::user()->profile_str)->first();
                        session()->put('name', $franData->company_name);
                        return redirect('franchisor/myaccount/dashboard');
                    }
                }
            }

        }

        session()->put('loginFailed', 'The user ID or password is incorrect. Kindly re-enter.');
        return redirect('fibl/login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        // dd($request->all());
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required'
        ));

        $userData = UserAccount::query()->select('profile_status', 'membership_type', 'profile_type', 'profile_str')->where('email', $request->email)->first();
        // dd($request);
        if ($userData != null) {

            if ($userData->profile_status == 2) {
                session()->put('loginFailed', 'Dear User, Your Email verification is pending, kindly check your mail inbox for verification mail');
                return redirect('/login');
            }

            if ($userData->profile_status == 3 && $userData->profile_type == 1) {
                session()->put('loginFailed', 'Dear franchisor, Your moderation process is pending');
                return redirect('/login');
            }
        } else {
            session()->put('loginFailed', 'Oops! The email-ID entered is incorrect');
            return redirect('/login');
        }

        $type = $this->commonLogin($request->email, $request->password);
        if ($type == 1)
            return redirect('franchisor/myaccount/dashboard');
        if ($type == 2)
            // return redirect('/');

            return redirect()->back(); // Redirects to the previous URL

        session()->put('loginFailed', 'Oops! The password entered is incorrect.');
        return redirect('/login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function loginInvCampaign(Request $request)
    {
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required'
        ));

        $userData = UserAccount::query()->select('profile_status', 'membership_type', 'profile_type', 'mobile', 'profile_str')->where('email', $request->email)->first();

        if (count($userData) > 0) {

            $check = $this->checkProfile($userData);

            if (!empty($check))
                return $check;

            if ($userData->profile_type == 1) {
                session()->put('loginFailed', 'Dear User, This login is only for Investors.');
                return redirect()->back();
            }

            if ($userData->profile_status == 2) {
                session()->put('loginFailed', 'Dear User, Your Email verification is pending, kindly check your mail inbox for verification mail');
                return redirect()->back();
            }
        } else {
            session()->put('loginFailed', 'Oops! The email-ID entered is incorrect');
            return redirect()->back();
        }

//        $this->commonLogin($request->email, $request->password);

        if (Auth::guard()->attempt(['email' => $request->email,
                'password' => $request->password,
                'profile_status' => 1]
        )) {

            $this->recordLoginTime();

            session()->flash('userloggedin', 1);

            if (empty($userData->mobile)) {
                session()->put('loginFailed', 'Dear User, Please fill the following information to proceed');
                return view('inv-campaign.update-social-inv-form');
            }

            return redirect('invcampaignlogin');
        } else {
            session()->put('loginFailed', 'Oops! The password entered is incorrect.');
            return redirect()->back()->withInput($request->only('email'));
        }
    }

    /**
     * @param $userName
     * @param $password
     * @return int
     */
    protected function commonLogin($userName, $password)
    {
        if (Auth::guard()->attempt(['email' => $userName, 'password' => $password, 'profile_status' => 1] )) {
            $this->recordLoginTime();
            session()->flash('userloggedin', 1);
            if (request()->user()->profile_type == 2) {
                InvestorController::setPercentage();
                return 2;
            } else {
                FranchisorController::franPercentage();
                $franData = FranchisorBusinessDetail::query()->select('company_name')->where('franchisor_id', Auth::user()->profile_str)->first();
                session()->put('name', $franData->company_name);
                return 1;
            }
        }
        return 0;
    }

    /**
     * @param $userData
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    protected function checkProfile($userData)
    {
        $franCheck = FranchisorBusinessDetail::query()->where('franchisor_id', $userData->profile_str)->first();
        $invCheck  = InvestorDetails::query()->where('investor_id', $userData->profile_str)->first();

        if (empty($franCheck) && empty($invCheck)) {
            session()->put('loginFailed', 'Oops! Kindly contact your account holder to access your dashboard.');
            return redirect('/login');
        }

        return "";
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logoutProfile()
    {
        if (!empty(request()->user())){
            UserRecord::query()->updateOrCreate([
                'profile_str' => request()->user()->profile_str,
            ], [
                'last_logout_time' => date('Y-m-d H:i:s')
            ]);
        }

        session()->flash('userloggedout', 1);
        Auth::logout();
        return redirect('/');
    }

    /**
     * Update record timing capturing
     */
    public function recordLoginTime()
    {
        UserRecord::query()->updateOrCreate([
            'profile_str'   => request()->user()->profile_str,
        ],[
            'last_login_time' => date('Y-m-d H:i:s')
        ]);
    }

}
