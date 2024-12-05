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
        // 'loginform',
        'fetch-data',
<<<<<<< HEAD
=======
        'newslettersignup',


>>>>>>> 39fe255a75fc926af81112709aab6e5df0553b57

    ];
}
