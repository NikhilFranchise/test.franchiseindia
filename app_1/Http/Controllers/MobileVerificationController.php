<?php

namespace App\Http\Controllers;

use App\Models\MobileVerification;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MobileVerificationController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function verifyMobile()
    {
        $mobileNo = request()->mobile;

        if (strlen($mobileNo) == 12 && substr($mobileNo, 0, 2) == '91')
            $mobileNo = substr($mobileNo, 2, 10);

        if (strlen($mobileNo) > 10 || strlen($mobileNo) < 10 || !is_numeric($mobileNo) || !in_array(substr($mobileNo, 0, 1), [9, 8, 7, 6])) {
            Log::getFacadeRoot()->alert('Insert failed in mobile verification  : ' . request()->mobile);
            return response()->json('Temporary problem in OTP system. Please try after some time', 404);
        }

        // Check for mobile number in the records
        $chkMobileNo = MobileVerification::query()
            ->select('mobile_no', 'is_verified')
            ->where('mobile_no', request()->mobile)
            ->first();

        if ($chkMobileNo !== null && $chkMobileNo->count() > 0 && $chkMobileNo->is_verified == 1) {
            return response()->json('numexists');
        }

        $otpCode = $this->generateMobileOtp();

        if ($chkMobileNo !== null && $chkMobileNo->count() > 0 && $chkMobileNo->is_verified != 1) {
            MobileVerification::query()->where('mobile_no', request()->mobile)->update([
                'otp_code' => $otpCode
            ]);
            $this->sendSmsToMobile(request()->mobile, $otpCode);
            return response()->json('Success! OTP sent to customers mobile number');
        }

        // Send SMS
        $this->sendSmsToMobile(request()->mobile, $otpCode);

        // Insert into mobile_verification table
        $mobVerify = new MobileVerification();
        $mobVerify->mobile_no = request()->mobile;
        $mobVerify->otp_code = $otpCode;
        $mobVerify->smspg_response = 'Success';

        if (!$mobVerify->save()) {
            Log::getFacadeRoot()->alert('Insert failed in mobile verification  : ' . request()->mobile);
            return response()->json('Temporary problem in OTP system. Please try after some time', 404);
        }

        return response()->json('Success! OTP sent to customers mobile number');
    }

    public function loginverifyotp()
    {
        $mobileNo = request()->mobile;

        if (strlen($mobileNo) == 12 && substr($mobileNo, 0, 2) == '91')
            $mobileNo = substr($mobileNo, 2, 10);

        if (strlen($mobileNo) > 10 || strlen($mobileNo) < 10 || !is_numeric($mobileNo) || !in_array(substr($mobileNo, 0, 1), [9, 8, 7, 6])) {
            Log::getFacadeRoot()->alert('Insert failed in mobile verification  : ' . request()->mobile);
            return response()->json('Temporary problem in OTP system. Please try after some time', 404);
        }

        $loginmob = UserAccount::query()->where('mobile', $mobileNo)->where('profile_status', 1)->count();
        if ($loginmob > 0) {
            // Check for mobile number in the records
            $chkMobileNo = MobileVerification::query()
                ->select('mobile_no', 'is_verified')
                ->where('mobile_no', request()->mobile)
                ->first();

            if ($chkMobileNo !== null && $chkMobileNo->count() > 0 && $chkMobileNo->is_verified == 1) {
                return response()->json('numexists');
            }

            $otpCode = $this->generateMobileOtp();

            if ($chkMobileNo !== null && $chkMobileNo->count() > 0 && $chkMobileNo->is_verified != 1) {
                MobileVerification::query()->where('mobile_no', request()->mobile)->update([
                    'otp_code' => $otpCode
                ]);
                $this->sendSmsToMobile(request()->mobile, $otpCode);
                return response()->json('Success! OTP sent to customers mobile number');
            }

            // Send SMS
            $this->sendSmsToMobile(request()->mobile, $otpCode);

            // Insert into mobile_verification table
            $mobVerify = new MobileVerification();
            $mobVerify->mobile_no = request()->mobile;
            $mobVerify->otp_code = $otpCode;
            $mobVerify->smspg_response = 'Success';

            if (!$mobVerify->save()) {
                Log::getFacadeRoot()->alert('Insert failed in mobile verification  : ' . request()->mobile);
                return response()->json('Temporary problem in OTP system. Please try after some time', 404);
            }

            return response()->json('Success! OTP sent to customers mobile number');
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function verifySmsOTP()
    {
        // return 'test';
        $mobileNo = request()->mobileNo;
        $otpNo = request()->otpNo;

        // Validate input
        if (empty($mobileNo) || empty($otpNo)) {
            return response('Invalid request.');
        }

        // First check if record exists (count)
        $count = MobileVerification::query()
            ->where('mobile_no', $mobileNo)
            ->where('otp_code', $otpNo)
            ->count();

        if ($count < 1) {
            return response('Notexists');
        }

        // Then get the record and update
        $record = MobileVerification::query()
            ->where('mobile_no', $mobileNo)
            ->where('otp_code', $otpNo)
            ->first();

        $record->update([
            'is_verified' => config('constants.ProfileStatus.Active'),
            'verified_at' => now()
        ]);

        return response('Mobile number verified successfully');
    }

    /**
     * @return int|string
     */
    public function generateMobileOtp()
    {
        // Number of digits for OTP
        $otpLength = config('constants.mobile.OtpLength');

        // To avoid zero in the beginning, start with 1
        $returnString = mt_rand(1, 9);

        // Iterate to generate required length of digits
        while (strlen($returnString) < $otpLength) {
            $returnString .= mt_rand(0, 9);
        }

        return $returnString;
    }

    /**
     * @param $mobileNo
     * @param $otpCode
     */
    public function sendSmsToMobile($mobileNo, $otpCode)
    {
        // $smsMsg = sprintf(config('txtlocal.SmsOtpMsg'), 'User', $otpCode);
        $smsMsg = "User| |" .$otpCode;
        CommonController::f2smsotp($mobileNo, $smsMsg);
    }

    /**
     * @return int
     */
    public function mobCheck()
    {
        // Check for mobile number in the records
        $chkMobileNo = MobileVerification::query()
            ->where('mobile_no', request()->mobile)
            ->where('is_verified', 1)
            ->count();

        return (($chkMobileNo > 0) ? 1 : 0);
    }

    /**
     * @return int
     */
    public function verifyInfoMobile()
    {
        $data = MobileVerification::query()
            ->where('mobile_no', request()->mobile)
            ->where('is_verified', 1)
            ->count();

        return $data;
    }

    public function investerverifyMobile()
    {
        $mobileNo = request()->mobile;

        if (strlen($mobileNo) == 12 && substr($mobileNo, 0, 2) == '91')
            $mobileNo = substr($mobileNo, 2, 10);

        if (strlen($mobileNo) > 10 || strlen($mobileNo) < 10 || !is_numeric($mobileNo) || !in_array(substr($mobileNo, 0, 1), [9, 8, 7, 6])) {
            Log::getFacadeRoot()->alert('Insert failed in mobile verification  : ' . request()->mobile);
            return 'Temporary problem in OTP system. Please try after some time';
        }

        // Check for mobile number in the records
        $chkMobileNo = MobileVerification::query()
            ->select('mobile_no', 'is_verified')
            ->where('mobile_no', request()->mobile)
            ->first();

        if ($chkMobileNo != null && $chkMobileNo->count() > 0 && $chkMobileNo->is_verified == 1)
            return 'numexists';

        $otpCode = $this->generateMobileOtp();

        if ($chkMobileNo != null && $chkMobileNo->count() > 0 && $chkMobileNo->is_verified != 1) {
            MobileVerification::query()->where('mobile_no', request()->mobile)->update([
                'otp_code' => $otpCode
            ]);
            $this->sendSmsToMobile(request()->mobile, $otpCode);
            return 'Success! OTP sent to customers mobile number';
        }

        // Send SMS
        $this->sendSmsToMobile(request()->mobile, $otpCode);

        // Insert into mobile_verification table
        $mobVerify = new MobileVerification();
        $mobVerify->mobile_no = request()->mobile;
        $mobVerify->otp_code = $otpCode;
        $mobVerify->smspg_response = 'Success';

        if (!$mobVerify->save()) {
            Log::getFacadeRoot()->alert('Insert failed in mobile verification  : ' . request()->mobile);
            return 'Temporary problem in OTP system. Please try after some time';
        }

        return 'Success! OTP sent to customers mobile number';
    }

    public function verifyLoginMobile(Request $request)
    {
        $mobileNo = request()->mobile;
        // dd($mobileNo);
        if (strlen($mobileNo) == 12 && substr($mobileNo, 0, 2) == '91')
            $mobileNo = substr($mobileNo, 2, 10);

        if (strlen($mobileNo) > 10 || strlen($mobileNo) < 10 || !is_numeric($mobileNo) || !in_array(substr($mobileNo, 0, 1), [9, 8, 7, 6])) {
            Log::getFacadeRoot()->alert('Insert failed in mobile verification  : ' . request()->mobile);
            return response()->json('Temporary problem in OTP system. Please try after some time', 404);
        }

        // Check for mobile number in the records
        $chkMobileNo = UserAccount::query()
            ->where('mobile', $request->mobile)
            ->where('profile_status', 1)
            ->count();
        if ($chkMobileNo < 1) {
            return response()->json(['data' => 0, 'message' => 'User not registered'], 200);
        }

        $otpCode = $this->generateMobileOtp();
        if ($chkMobileNo > 0) {
            UserAccount::query()->where('mobile', $request->mobile)->update([
                'loginotp_verification_code' => $otpCode
            ]);
            $this->sendSmsToMobile(request()->mobile, $otpCode);
            return response()->json('Success! OTP sent to customers mobile number');
        }

        // Send SMS
        $this->sendSmsToMobile(request()->mobile, $otpCode);
        return response()->json('Success! OTP sent to customers mobile number');
    }
}
