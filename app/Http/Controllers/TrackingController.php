<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TrackingController extends Controller
{
    //
    function setCustomCookie(string $name, string $value, int $minutes = 60): void
        {
            Cookie::queue($name, $value, $minutes);
        }

    function getCustomCookie(string $name): ?string
        {
        return Cookie::get($name);
        }

     public function getCookieExample()
        {
        $value = getCustomCookie('user_theme');

        dd($value); // Dumps: 'dark' if cookie was previously set by browser
        }   
}
