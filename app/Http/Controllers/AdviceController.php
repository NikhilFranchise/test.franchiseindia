<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AskFranchisor;
use App\Models\AskInvestor;
use App\Mail\FreeAdviceForm;
use App\Models\Pincode;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;


class AdviceController extends Controller
{
    /**
     * Function to insert free advice data
     * @param Request $request
     * @return bool
     */
    public function freeadvice1(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|min:2',
            'mobile' => 'required|min:10',
        ]);
        // dd($request->all());
        $user = $request->optionsRadios;
        $name = $request->name;
        $pincode = $request->pincode;
        $email = $request->email;
        $mobile = $request->mobile;
        $details = $request->details;
        $newsLetter = $request->is_newsletter;
        $city = "";
        $state = "";
        $ip = $request->ip();

        $table = ($user == 'franchisor') ? AskFranchisor::class : AskInvestor::class;
        $pincodeDetails = Pincode::select('city', 'state')->where('pincode', $pincode)->first();
        // dd($pincodeDetails);
        if (!empty($pincodeDetails)) {
            $city = ucfirst(strtolower($pincodeDetails->city));
            $state = ucfirst(strtolower($pincodeDetails->state));
        }
        // dd($email,$mobile);
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";
        $mailTo = ($user != 'franchisor') ? "pganesh@franchiseindia.net" : "pganesh@franchiseindia.net";

        $users = $table::create([
            'name' => $name,
            'city' => $city,
            'state' => $state,
            'pincode' => $pincode,
            'email' => $email,
            'mobile' => $mobile,
            'details' => $details,
            'ip' => $ip,
            'reg_source' => !empty(Cookie::get('campaignSource')) ? Cookie::get('campaignSource') : ""
        ]);
        // dd($users);
        // If insertion fails
        if (!$users)
            return response()->json('Insertion failed..!');

        // Mail::to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));
        Mail::to($mailTo)->bcc("krituraj@franchiseindia.com")->send(new FreeAdviceForm($request));

        if ($newsLetter == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");

        // dd('hello1');
        return response()->json('true');
    }

    public function freeadvice(Request $request)
    // public function freeadviceHome(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|min:2',
            'mobile' => 'required|min:10',
        ]);

        $user = $request->optionsRadios;
        $name = $request->name;
        $pincode = $request->pincode;
        $email = $request->email;
        $mobile = $request->mobile;
        $details = $request->details;
        $newsLetter = $request->is_newsletter;
        $city = "";
        $state = "";
        $ip = $request->ip();
        $table = ($user == 'franchisor') ? AskFranchisor::class : AskInvestor::class;

        $pincodeDetails = Pincode::select('city', 'state')->where('pincode', $pincode)->first();
        if (!empty($pincodeDetails)) {
            $city = ucfirst(strtolower($pincodeDetails->city));
            $state = ucfirst(strtolower($pincodeDetails->state));
        }

        $mailTo = ($user != 'franchisor') ? "pganesh@franchiseindia.net" : "cnikhil@franchiseindia.net";
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";

        $users = $table::create([
            'name' => $name,
            'city' => $city,
            'state' => $state,
            'pincode' => $pincode,
            'email' => $email,
            'mobile' => $mobile,
            'details' => $details,
            'ip' => $ip,
            'reg_source' => !empty(Cookie::get('campaignSource')) ? Cookie::get('campaignSource') : ""
        ]);

        // If insertion fails
        if (!$users)
            return response()->json('Insertion failed..!');

        // Mail::to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));
        Mail::to($mailTo)->bcc("pkumar@franchiseindia.net")->send(new FreeAdviceForm($request));

        if ($newsLetter == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");

        return response()->json('true');
    }
}
