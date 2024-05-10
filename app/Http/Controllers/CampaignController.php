<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    //
    public function insertHiFiCampaign(Request $request)
    {
        $this->validate($request ,[
            'username' => 'required',
            'txtPhone' => 'required',
            'company'  => 'required',
            'email'    => 'required'
        ]);

        $checkEmail = DB::getFacadeRoot()->table('hi_fi_campaign')->where('email', request()->email)->count();
        if($checkEmail)
            return redirect('/campaign/hi-fi/error.php?email=1');

        $checkMobile = DB::getFacadeRoot()->table('hi_fi_campaign')->where('mobile_no', request()->txtPhone)->count();
        if($checkMobile)
            return redirect('/campaign/hi-fi/error.php?mobile=1');

        DB::getFacadeRoot()->table('hi_fi_campaign')->insert([
            'name' => request()->username,
            'mobile_no' => request()->txtPhone,
            'company' => request()->company,
            'email' => request()->email,
        ]);

        return redirect('/campaign/hi-fi/thanks.php');
    }
}
