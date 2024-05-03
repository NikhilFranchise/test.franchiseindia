<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AskFranchisor;
use App\Models\AskInvestor;
use App\Mail\FreeAdviceForm;
use App\Models\Pincode;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use SparkPost\SparkPost;
use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
class AdviceController extends Controller
{
    /**
     * Function to insert free advice data
     * @param Request $request
     * @return bool
     */
    public function freeadvice(Request $request)
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
        // dd($name);
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";
        $mailTo = ($user != 'franchisor') ? "pganesh@franchiseindia.net" : "ss@franchiseindia.net";

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

        Mail::to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

        if ($newsLetter == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");

            // dd('hello1');
        return 'true';
    }

    public function freeadviceHome(Request $request)
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

        $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";

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

        Mail::to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

        if ($newsLetter == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");

        return response()->json('true');
    }
}
