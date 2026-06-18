<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected function redirectTo()
    {
        // dd(Auth::user());
        $user = Auth::user();

        if ($user->profile_type == 2) {
            return '/investor/myaccount/dashboard';
        }

        return '/franchisor/myaccount/dashboard';
    }

    public function __construct()
    {
        $this->middleware('guest');
    }
}
