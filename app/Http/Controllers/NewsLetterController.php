<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FiNewsLetter;
use App\Mail\NewsLetterSubscribe;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
class NewsLetterController extends Controller
{
    public static function createNewsLetter($email, $siteType)
    {
        $randCode = rand(100000, 9999999);
        $checkEmail = FiNewsLetter::query()->select('status')->where('site_type', $siteType)->where('email', $email)->first();
        // dd($checkEmail);
        // If no record exists, send the verification mail
        if (empty($checkEmail)) {

            FiNewsLetter::query()->insert([
                'email' => $email,
                'verify_code' => $randCode,
                'site_type' => $siteType
            ]);
            // if(!empty($email))
            //     Mail::getFacadeRoot()->to($email)->send(new NewsLetterSubscribe($randCode));

        } else if (count($checkEmail) != 0 && $checkEmail->status != 'S') {
            FiNewsLetter::query()->where('email', $email)->where('site_type', $siteType)->update(['verify_code' => $randCode]);
            // if(!empty($email))
            //     Mail::getFacadeRoot()->to($email)->send(new NewsLetterSubscribe($randCode));
        }
    }
}
