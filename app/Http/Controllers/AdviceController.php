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
    
    public function freeadvice(Request $request)
    {

        // dd($request->all()); 

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

        $mailTo = ($user != 'franchisor') ? "cnikhil@franchiseindia.net" : "cnikhil@franchiseindia.net";

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
        // dd($users);

        // Check if insertion failed
        if (!$users) {
            return response()->json('Insertion failed..!');
        }
        // dd($request->all()); // or dd($newsLetter); for checking the value of $newsLetter

        // Send email
        Mail::getFacadeRoot()->to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

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
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "info@franchiseindia.com";
        $mailTo = ($user != 'franchisor') ? "cnihkil@franchiseindia.net" : "cnikhil@franchiseindia.net";


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
        
        
            // Mail::getFacadeRoot()->to($mailTo)->bcc("cnikhil@franchiseindia.net")->send(new FreeAdviceForm($request));

        Mail::getFacadeRoot()->to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

        if ($newsLetter == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");

        return response()->json('true');
        // if ($request->expectsJson()) {
        //     return redirect('thanks-advice-form');
        // }
    }

    public function freeadvicelisting(Request $request)
    {
        // dd('freeadvicelisting');
        $request->validate([
            'namefreeadvice' => $request->has('namefreeadvice') && !$request->has('namefreeadvice1') ? 'required' : 'nullable',
            // 'namefreeadvice1' => $request->has('namefreeadvice1') && !$request->has('namefreeadvice') ? 'required' : 'nullable',
        
            'emailfreeadvice' => $request->has('emailfreeadvice') && !$request->has('emailfreeadvice1') ? 'required|email' : 'nullable|email',
            // 'emailfreeadvice1' => $request->has('emailfreeadvice1') && !$request->has('emailfreeadvice') ? 'required|email' : 'nullable|email',
        
            'mobilefreeadvice' => $request->has('mobilefreeadvice') && !$request->has('mobilefreeadvice1') ? 'required' : 'nullable',
            // 'mobilefreeadvice1' => $request->has('mobilefreeadvice1') && !$request->has('mobilefreeadvice') ? 'required' : 'nullable',
        
            'captcha' => $request->has('captcha') && !$request->has('captcha1') ? 'required|captcha' : 'nullable|captcha',
            // 'captcha1' => $request->has('captcha1') && !$request->has('captcha') ? 'required|captcha' : 'nullable|captcha',
        
            'pincodefreeadvice' => $request->has('pincodefreeadvice') && !$request->has('pincodefreeadvice1') ? 'required' : 'nullable',
            // 'pincodefreeadvice1' => $request->has('pincodefreeadvice1') && !$request->has('pincodefreeadvice') ? 'required' : 'nullable',
        
            'detailsfreeadvice' => $request->has('detailsfreeadvice') && !$request->has('detailsfreeadvice1') ? 'required' : 'nullable',
            // 'detailsfreeadvice1' => $request->has('detailsfreeadvice1') && !$request->has('detailsfreeadvice') ? 'required' : 'nullable',
        
            'is_newsletterfreeadvice' => $request->has('is_newsletterfreeadvice') && !$request->has('is_newsletterfreeadvice1') ? 'required' : 'nullable',
            // 'is_newsletterfreeadvice1' => $request->has('is_newsletterfreeadvice1') && !$request->has('is_newsletterfreeadvice') ? 'required' : 'nullable',
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

        // dd($email);
        $pincodeDetails = Pincode::query()->select('city', 'state')->where('pincode', $pincode)->first();
        if (!empty($pincodeDetails)) {
            $city  = ucfirst(strtolower($pincodeDetails->city));
            $state = ucfirst(strtolower($pincodeDetails->state));
        }

        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";
        $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "info@franchiseindia.com";
        // $mailTo = ($user != 'franchisor') ? "cnihkil@franchiseindia.net" : "cnikhil@franchiseindia.net";


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


        // dd($name,$email);
        // return response()->json($users);
        //If insertion fails
        if (!$users)
            return response()->json('Insertion failed..!');
        

        Mail::getFacadeRoot()->to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

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
        $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "info@franchiseindia.com";


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

        Mail::getFacadeRoot()->to($mailTo)->bcc("techsupport@franchiseindia.com")->send(new FreeAdviceForm($request));

        if ($newsLetter == 1)
            NewsLetterController::createNewsLetter($request->input('email'), "fi");

        return response()->json('true');
        // if ($request->expectsJson()) {
        //     return redirect('thanks-advice-form');
        // }
    }
}
