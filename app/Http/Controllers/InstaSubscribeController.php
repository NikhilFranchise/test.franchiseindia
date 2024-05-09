<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\InstaSubscribe;
use App\Mail\InstaSubMagazineMail;
use Illuminate\Support\Facades\Mail;


class InstaSubscribeController extends Controller
{
    //
    public function instasubsribe(Request $request)
    {
        $this->validate($request, array(
            'email'   => 'required|email|max:255',
            'mobile'  => 'required|min:10|max:10'));

        $email  = $request->email;
        $mobile = $request->mobile;
        $ip     = $request->ip();

        $data = InstaSubscribe::insert(['mobileno'=>$mobile, 'emailid'=>$email, 'client_ip'=>$ip, 'call_type'=>'C', 'call_status'=>'N']);
        if(!$data)
            $data = '0';

        $instaSubData['email']  = $email;
        $instaSubData['mobile'] = $mobile;

        Mail::to('subscribe@franchiseindia.net')->send(new InstaSubMagazineMail($instaSubData));

        $data = '1';
        return $data;

    }
}
