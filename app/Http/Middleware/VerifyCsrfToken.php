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
<<<<<<< HEAD
        'loginform',
        'fetch-data'
=======
        // 'loginform',
        'fetch-data',
>>>>>>> 81ce0720eba1fa0b82fe0edca9398c6f283e4237

      
        
    ];
}
