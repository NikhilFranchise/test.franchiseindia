<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AskFranchisor;
use App\Models\AskInvestor;
use App\Mail\FreeAdviceForm;
use App\Models\Pincode;
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

    public function freeadvice(Request $request)
    { // Define validation rules
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

        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "info@franchiseindia.com";
        $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "corp@franchiseindia.net";
        $mailcc = ($user != 'franchisor') ? "" : "info@franchiseindia.com";


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
        Mail::getFacadeRoot()->to($mailTo)->cc($mailcc)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

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
        // dd('yes');
        $request->validate([
            'namefreeadvice' => $request->has('namefreeadvice') && !$request->has('namefreeadvice1') ? 'required' : 'nullable',
            'namefreeadvice1' => $request->has('namefreeadvice1') && !$request->has('namefreeadvice') ? 'required' : 'nullable',

            'emailfreeadvice' => $request->has('emailfreeadvice') && !$request->has('emailfreeadvice1') ? 'required|email' : 'nullable|email',
            'emailfreeadvice1' => $request->has('emailfreeadvice1') && !$request->has('emailfreeadvice') ? 'required|email' : 'nullable|email',

            'mobilefreeadvice' => $request->has('mobilefreeadvice') && !$request->has('mobilefreeadvice1') ? 'required' : 'nullable',
            'mobilefreeadvice1' => $request->has('mobilefreeadvice1') && !$request->has('mobilefreeadvice') ? 'required' : 'nullable',

            'captcha' => $request->has('captcha') && !$request->has('captcha1') ? 'required|captcha' : 'nullable|captcha',
            'captcha1' => $request->has('captcha1') && !$request->has('captcha') ? 'required|captcha' : 'nullable|captcha',

            'pincodefreeadvice' => $request->has('pincodefreeadvice') && !$request->has('pincodefreeadvice1') ? 'required' : 'nullable',
            'pincodefreeadvice1' => $request->has('pincodefreeadvice1') && !$request->has('pincodefreeadvice') ? 'required' : 'nullable',

            'detailsfreeadvice' => $request->has('detailsfreeadvice') && !$request->has('detailsfreeadvice1') ? 'required' : 'nullable',
            'detailsfreeadvice1' => $request->has('detailsfreeadvice1') && !$request->has('detailsfreeadvice') ? 'required' : 'nullable',

            'is_newsletterfreeadvice' => $request->has('is_newsletterfreeadvice') && !$request->has('is_newsletterfreeadvice1') ? 'required' : 'nullable',
            'is_newsletterfreeadvice1' => $request->has('is_newsletterfreeadvice1') && !$request->has('is_newsletterfreeadvice') ? 'required' : 'nullable',
        ]);

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

        // dd($request);
        $pincodeDetails = Pincode::query()->select('city', 'state')->where('pincode', $pincode)->first();
        if (!empty($pincodeDetails)) {
            $city  = ucfirst(strtolower($pincodeDetails->city));
            $state = ucfirst(strtolower($pincodeDetails->state));
        }

        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";
        $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "corp@franchiseindia.net";
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "info@franchiseindia.com";
        // $mailTo = ($user != 'franchisor') ? "cnihkil@franchiseindia.net" : "cnikhil@franchiseindia.net";
        $mailcc = ($user != 'franchisor') ? "" : "info@franchiseindia.com";


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


        Mail::getFacadeRoot()->to($mailTo)->cc($mailcc)->bcc("techsupport@franchiseindia.net")->send(new FreeAdviceForm($request));

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
        return response()->json(['captcha' => captcha_img()]);
    }

    public function freeadviceHome_popup(Request $request)
    {
        // dd($request->all()); 
        $request->validate([
            'namefreeadvice1' => 'required',
            'emailfreeadvice1' => 'required|email',
            'mobilefreeadvice1' => 'required',
            // 'captcha' => 'required|captcha',
            'pincodefreeadvice1' => 'required',
            'detailsfreeadvice1' => 'required',
            'is_newsletterfreeadvice1' => 'required',

        ]);

        $user = $request->optionsRadios;
        $name = $request->name ?? $request->namefreeadvice1;
        $email = $request->email ?? $request->emailfreeadvice1;
        $mobile = $request->mobile ?? $request->mobilefreeadvice1;
        $pincode = $request->pincode ?? $request->pincodefreeadvice1;
        $details = $request->details ?? $request->detailsfreeadvice1;
        $newsLetter = $request->is_newsletter ?? $request->is_newsletterfreeadvice1;
        $city = "";
        $state = "";
        $ip = $request->ip();
        $table = ($user == 'franchisor') ? AskFranchisor::query() : AskInvestor::query();

        $pincodeDetails = Pincode::query()->select('city', 'state')->where('pincode', $pincode)->first();
        if (!empty($pincodeDetails)) {
            $city  = ucfirst(strtolower($pincodeDetails->city));
            $state = ucfirst(strtolower($pincodeDetails->state));
        }

        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "info@franchiseindia.com";
        $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "corp@franchiseindia.net";
        $mailcc = ($user != 'franchisor') ? "" : "info@franchiseindia.com";


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

        Mail::getFacadeRoot()->to($mailTo)->cc($mailcc)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

        if ($newsLetter == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");

        return response()->json('true');
        // if ($request->expectsJson()) {
        //     return redirect('thanks-advice-form');
        // }
    }
    public function freeadviceHome_popup2(Request $request)
    {
        // dd('yes'); 
        $validator = Validator::make(
            $request->all(),
            [
                'optionsRadios1' => 'required|in:franchisor,investor',
                'namefreeadvice1' => 'required|string|max:255',
                'emailfreeadvice1' => 'required|email|max:255',
                'mobilefreeadvice1' => ['required', 'regex:/^[6-9][0-9]{9}$/'],
                'pincodefreeadvice1' => 'nullable|digits:6',
                'detailsfreeadvice1' => 'nullable|string|max:1000',
                'captcha' => 'required|captcha'
            ],
            [
                // Custom error messages
                'captcha.captcha' => 'Invalid captcha entered.',
                // 'mobilefreeadvice1.regex' => 'Mobile number must be 10 digits and start with 6, 7, 8, or 9.',
                // 'optionsRadios1.in' => 'Please select a valid option: franchisor or investor.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $request->optionsRadios1;
        $name =  $request->namefreeadvice1;
        $email = $request->emailfreeadvice1;
        $mobile = $request->mobilefreeadvice1;
        $pincode =  $request->pincodefreeadvice1;
        $details =  $request->detailsfreeadvice1;
        $newsLetter =  $request->is_newsletterfreeadvice1;
        $city = "";
        $state = "";
        $ip = $request->ip();
        $table = ($user == 'franchisor') ? AskFranchisor::query() : AskInvestor::query();

        // dd($mobile);
        // dd($request);
        $pincodeDetails = Pincode::query()->select('city', 'state')->where('pincode', $pincode)->first();
        if (!empty($pincodeDetails)) {
            $city  = ucfirst(strtolower($pincodeDetails->city));
            $state = ucfirst(strtolower($pincodeDetails->state));
        }

        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "corp@franchiseindia.net";      
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "info@franchiseindia.com";
        // $mailTo = ($user == 'franchisor') ? "corp@franchiseindia.net" : "subscribe@franchiseindia.net";
        // $mailTo = ($user == 'franchisor') ? "corp@franchiseindia.net" : "";
        $mailTo = ($user == 'franchisor') ? "expo@franchiseindia.com" : "";


        $mailcc = ($user == 'franchisor') ? "" : "info@franchiseindia.com";



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

        $details = (object)[
            'optionsRadios' => $request->optionsRadios1,
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'pincode' => $pincode,
            'details' => $details
        ];
        if (!$users)
            return response()->json('Insertion failed..!');


        Mail::getFacadeRoot()->to($mailTo)->cc($mailcc)->bcc("techsupport@franchiseindia.net")->send(new FreeAdviceForm($details));


        if ($newsLetter == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");




        // Process and save your form logic here...

        return response()->json(['message' => 'Form submitted successfully.']);
    }
}
