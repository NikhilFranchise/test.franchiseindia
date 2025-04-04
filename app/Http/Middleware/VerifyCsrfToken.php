<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'franfailed',
        'fransuccess',
        'francancelled',
        'invfailed',
        'invsuccess',
        'invcancelled',
        'book/payment',
        'unsub',
        'payment/cancelled',
        'payment/success',
        'franchisor-feedback',
        'reload-captcha',
        'getfreeinfo',
        'loginform',
        'fetch-data',
        'fetch-data2',
        'newslettersignup',
        'price_filter',
        'feedback',
        'password/email',
        'api/*', 
<<<<<<< HEAD
        'handlePaymentResponse',
        'paymentnewsubmit',
=======
        'admin/login-check',

>>>>>>> 7557ce6ee7357ae75a683444c3068bad76e8a18f

    ];
}
