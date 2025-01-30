<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
{
    // Validate the email input
    $request->validate(['email' => 'required|email']);

    // Attempt to send the reset link to the email
    $response = Password::sendResetLink($request->only('email'));

    // Check if the reset link was successfully sent
    if ($response == Password::RESET_LINK_SENT) {
        // Redirect back with a success message
        return redirect()->route('password-reset')->with('message', 'We have emailed your password reset link!');
        // return back()->with('status', 'We have emailed your password reset link!');
    } else {
        // If there's an error, redirect back with the error message
        return back()->withErrors(['email' => trans($response)]);
    }
}

}
