<?php

namespace App\Http\Controllers;

use App\Models\AskFranchisor;
use App\Models\AskInvestor;
use App\Mail\FreeAdviceForm;
use App\Models\Pincode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdviceController extends Controller
{
    /**
     * Function to insert free advice data
     * @param Request $request
     * @return bool
     */
    // public function freeadvice(Request $request)
    // {
    //     dd($request->all());
    // 	$this->validate($request, [
    //         'email' => 'required|email',
    //         'name' => 'required|min:2',
    //         'mobile' => 'required|min:10',
    //     ]);

    //     $user = $request->optionsRadios;
    //     $name = $request->name;
    //     $pincode = $request->pincode;
    //     $email = $request->email;
    //     $mobile = $request->mobile;
    //     $details = $request->details;
    //     $newsLetter = $request->is_newsletter;
    //     $city = "";
    //     $state = "";
    //     $ip = $request->ip();
    //     $table = ($user == 'franchisor') ? AskFranchisor::query() : AskInvestor::query();

    //     $pincodeDetails = Pincode::query()->select('city', 'state')->where('pincode', $pincode)->first();
    //     if (!empty($pincodeDetails)) {
    //         $city  = ucfirst(strtolower($pincodeDetails->city));
    //         $state = ucfirst(strtolower($pincodeDetails->state));
    //     }

    //     $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";

    //     $users = $table->insert([
    //         'name' => $name,
    //         'city' => $city,
    //         'state' => $state,
    //         'pincode' => $pincode,
    //         'email' => $email,
    //         'mobile' => $mobile,
    //         'details' => $details,
    //         'ip' => $ip,
    //         'reg_source' => !empty(Cookie::get('campaignSource')) ? Cookie::get('campaignSource') : ""
    //     ]);

    //     //If insertion fails
    //     if (!$users)
    //         return response()->json('Insertion failed..!');

    // 	Mail::getFacadeRoot()->to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

    //     if ($newsLetter == 1)
    //         NewsLetterController::createNewsLetter($request->input('email'), "fi");

    //     return 'true';
    // }

    public function freeadvice(Request $request)
    {
        // dd('yes');
        // Display all request data for debugging
        // dd($request->all());

        // Define validation rules
        $rules = [
            'email' => 'required_without:emailfreeadvice|email',
            'emailfreeadvice' => 'required_without:email|email',
            'mobile' => 'required_without:mobilefreeadvice|min:10',
            'mobilefreeadvice' => 'required_without:mobile|min:10',
            'name' => 'required_without:namefreeadvice|min:2',
            'namefreeadvice' => 'required_without:name|min:2',            
        ];

        // Create validator instance
        $validator = Validator::make($request->all(), $rules);

       

        // Check for validation failures
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $request->validate([
        //     'namefreeadvice' => 'required',
        //     'emailfreeadvice' => 'required|email',
        //     'mobilefreeadvice' => 'required',
        //     'captcha' => 'required|captcha',
        //     'pincodefreeadvice' => 'required',
        //     'detailsfreeadvice' => 'required',
        //     'is_newsletterfreeadvice' => 'required',

        // ]);

        // Process the request data
        $user = $request->optionsRadios;
        $name = $request->name ?? $request->namefreeadvice;
        $email = $request->email ?? $request->emailfreeadvice;
        $mobile = $request->mobile ?? $request->mobilefreeadvice;
        $pincode = $request->pincode ?? $request->pincodefreeadvice;
        $details = $request->details ?? $request->detailsfreeadvice;
        $newsLetter = $request->is_newsletter ?? $request->is_newsletterfreeadvice;
        $city = "";
        $state = "";
        $ip = $request->ip();
        $table = ($user == 'franchisor') ? AskFranchisor::query() : AskInvestor::query();

        // Retrieve pincode details
        $pincodeDetails = Pincode::query()->select('city', 'state')->where('pincode', $pincode)->first();
        // dd($pincodeDetails);
        if (!empty($pincodeDetails)) {
            $city  = ucfirst(strtolower($pincodeDetails->city));
            $state = ucfirst(strtolower($pincodeDetails->state));
        }

        $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";

        // Insert data into the database
        $users = $table->insert([
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

        // Check if insertion failed
        if (!$users) {
            return response()->json('Insertion failed..!');
        }

        // Send email
        // Mail::getFacadeRoot()->to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

        // Subscribe to newsletter if requested
        if ($newsLetter == 1) {
            NewsLetterController::createNewsLetter($request->input('email'), "fi");
        }

        if ($request->expectsJson()) {
            return response()->json('true', 200);
        } else {
            return redirect('thanks-advice-form');
        }
    }

    public function freeadviceHome(Request $request)
    {
        // dd($request->all());
          $request->validate([
            'namefreeadvice' => 'required',
            'emailfreeadvice' => 'required|email',
            'mobilefreeadvice' => 'required',
            'captcha' => 'required|captcha',
            'pincodefreeadvice' => 'required',
            'detailsfreeadvice' => 'required',
            'is_newsletterfreeadvice' => 'required',

        ]);

        // $user = $request->optionsRadios;
        // $name = $request->name;
        // $pincode = $request->pincode;
        // $email = $request->email;
        // $mobile = $request->mobile;
        // $details = $request->details;
        // $newsLetter = $request->is_newsletter;
        // $city = "";
        // $state = "";
        // $ip = $request->ip();
        $user = $request->optionsRadios;
        $name = $request->name ?? $request->namefreeadvice;
        $email = $request->email ?? $request->emailfreeadvice;
        $mobile = $request->mobile ?? $request->mobilefreeadvice;
        $pincode = $request->pincode ?? $request->pincodefreeadvice;
        $details = $request->details ?? $request->detailsfreeadvice;
        $newsLetter = $request->is_newsletter ?? $request->is_newsletterfreeadvice;
        $city = "";
        $state = "";
        $ip = $request->ip();
        $table = ($user == 'franchisor') ? AskFranchisor::query() : AskInvestor::query();

        $pincodeDetails = Pincode::query()->select('city', 'state')->where('pincode', $pincode)->first();
        if (!empty($pincodeDetails)) {
            $city  = ucfirst(strtolower($pincodeDetails->city));
            $state = ucfirst(strtolower($pincodeDetails->state));
        }

        $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";

        $users = $table->insert([
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
        // return response()->json($users);
        //If insertion fails
        if (!$users)
            return response()->json('Insertion failed..!');

        // Mail::getFacadeRoot()->to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

        if ($newsLetter == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");

        return response()->json('true');
        // if ($request->expectsJson()) {
        //     return redirect('thanks-advice-form');
        // }
    }
    public function reloadCaptcha()
    {
        // dd('yes');
        return response()->json(['captcha'=> captcha_img()]);
    }
}
