<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AskFranchisor;
use App\Models\AskInvestor;
use App\Mail\FreeAdviceForm;
use App\Mail\Enquirenow;

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
       $request->validate([
            'captcha' => 'required|captcha',
     ]);

     
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

        $countryCode = $request->country_code ?? '+91';
        $mobileRaw   = $request->mobile ?? $request->mobilefreeadvice;

        // Remove spaces, dashes, etc.
        $mobileRaw = preg_replace('/\D/', '', $mobileRaw);
        $mobile = $countryCode . ' ' . $mobileRaw;
        // Append country code only if NOT +91
        // if ($countryCode !== '+91') {
        //     $mobile = $countryCode . ' ' . $mobileRaw;
        // } else {
        //     $mobile = $mobileRaw;
        // }
        $request->merge([
            'mobile' => $mobile,
            'name'   => $request->name ?? $request->namefreeadvice,
            'country_code' => $countryCode
        ]);
        // dd($mobile);
        // Process the request data
        $user = $request->optionsRadios;
        $name = $request->name ?? $request->namefreeadvice;
        $email = $request->email ?? $request->emailfreeadvice;
        $mobile = $mobile ?? $request->mobilefreeadvice;
        $pincode = $request->pincode ?? $request->pincodefreeadvice;
        $details = $request->details ?? $request->detailsfreeadvice;
        $newsLetter = $request->is_newsletter ?? $request->is_newsletterfreeadvice;
        $city = "";
        $state = "";
        $ip = $request->ip();
        $table = ($user == 'franchisor') ? AskFranchisor::query() : AskInvestor::query();

        // Process the request data
        // $user = $request->optionsRadios;
        // $name = $request->name ?? $request->namefreeadvice;
        // $email = $request->email ?? $request->emailfreeadvice;
        // $mobile = $request->mobile ?? $request->mobilefreeadvice;
        // $pincode = $request->pincode ?? $request->pincodefreeadvice;
        // $details = $request->details ?? $request->detailsfreeadvice;
        // $newsLetter = $request->is_newsletter ?? $request->is_newsletterfreeadvice;
        // $city = "";
        // $state = "";
        // $ip = $request->ip();
        // $table = ($user == 'franchisor') ? AskFranchisor::query() : AskInvestor::query();

        // Retrieve pincode details
        $pincodeDetails = Pincode::query()->select('city', 'state')->where('pincode', $pincode)->first();
        // dd($pincodeDetails);
        if (!empty($pincodeDetails)) {
            $city  = ucfirst(strtolower($pincodeDetails->city));
            $state = ucfirst(strtolower($pincodeDetails->state));
        }

        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "mgaurav@franchiseindia.com";
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "info@franchiseindia.com";
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "expo@franchiseindia.com";
        $mailTo = ($user != 'franchisor') ? "" : "expo@franchiseindia.com";
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
        // if ($newsLetter == 1) {
        //     NewsLetterController::createNewsLetter($request->input('email'), "fi");
        // }

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
        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "expo@franchiseindia.com";      
        $mailTo = ($user != 'franchisor') ? "" : "expo@franchiseindia.com";

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

        // $mailTo = ($user != 'franchisor') ? "subscribe@franchiseindia.net" : "expo@franchiseindia.com";
        $mailTo = ($user != 'franchisor') ? "" : "expo@franchiseindia.com";
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
        $validator = Validator::make($request->all(), [
            'optionsRadios1'    => 'required|in:franchisor,investor',
            'namefreeadvice1'   => 'required|string|max:255',
            'emailfreeadvice1'  => 'required|email|max:255',
            'mobilefreeadvice1' => ['required', 'regex:/^[6-9][0-9]{9}$/'],
            'pincodefreeadvice1' => 'nullable|digits:6',
            'detailsfreeadvice1' => 'nullable|string|max:1000',
            'captcha'           => 'required|captcha',
        ], [
            'optionsRadios1.required'    => 'Please select either "Expand My Brand" or "Buy a Franchise".',
            'optionsRadios1.in'          => 'Invalid selection for user type.',
            'namefreeadvice1.required'   => 'Name is required.',
            'namefreeadvice1.string'     => 'Name must be a valid string.',
            'namefreeadvice1.max'        => 'Name cannot exceed 255 characters.',
            'emailfreeadvice1.required'  => 'Email is required.',
            'emailfreeadvice1.email'     => 'Please enter a valid email address.',
            'emailfreeadvice1.max'       => 'Email cannot exceed 255 characters.',
            'mobilefreeadvice1.required' => 'Mobile number is required.',
            'mobilefreeadvice1.regex'    => 'Mobile number must be 10 digits and start with 6, 7, 8, or 9.',
            'pincodefreeadvice1.digits'  => 'Pincode must be exactly 6 digits.',
            'detailsfreeadvice1.string'  => 'Details must be a valid text.',
            'detailsfreeadvice1.max'     => 'Details cannot exceed 1000 characters.',
            'captcha.required'           => 'Captcha is required.',
            'captcha.captcha'            => 'Invalid captcha entered.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        $userType = $data['optionsRadios1'];

        // Fetch city and state based on pincode if provided
        $pincodeDetails = optional(Pincode::select('city', 'state')->where('pincode', $data['pincodefreeadvice1'])->first());

        $city  = $pincodeDetails->city ? ucfirst(strtolower($pincodeDetails->city)) : '';
        $state = $pincodeDetails->state ? ucfirst(strtolower($pincodeDetails->state)) : '';

        // Choose model based on user type
        $model = ($userType === 'franchisor') ? new AskFranchisor() : new AskInvestor();

        // Prepare data for insertion
        $insertData = [
            'name'       => $data['namefreeadvice1'],
            'city'       => $city,
            'state'      => $state,
            'pincode'    => $data['pincodefreeadvice1'] ?? '',
            'email'      => $data['emailfreeadvice1'],
            'mobile'     => $data['mobilefreeadvice1'],
            'details'    => $data['detailsfreeadvice1'] ?? '',
            'ip'         => $request->ip(),
            'reg_source' => Cookie::get('campaignSource') ?? '',
        ];

        $saved = $model->create($insertData);

        if (!$saved) {
            return response()->json(['message' => 'Insertion failed..!'], 500);
        }

        // Prepare mail details object
        $mailDetails = (object)[
            'optionsRadios' => $userType,
            'name'         => $insertData['name'],
            'email'        => $insertData['email'],
            'mobile'       => $insertData['mobile'],
            'pincode'      => $insertData['pincode'],
            'details'      => $insertData['details'],
        ];

        $mailTo = $userType === 'franchisor' ? 'expo@franchiseindia.com' : '';
        $mailCc = $userType === 'franchisor' ? '' : 'info@franchiseindia.com';

        Mail::to($mailTo)
            ->cc($mailCc)
            ->bcc('techsupport@franchiseindia.net')
            ->send(new FreeAdviceForm($mailDetails));

        // Subscribe to newsletter if checked
        if (($request->input('is_newsletterfreeadvice1') ?? 0) == 1) {
            NewsLetterController::createNewsLetter($data['emailfreeadvice1'], 'fi');
        }

        return response()->json(['message' => 'Form submitted successfully.']);
    }

 public function submitEnquiry(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name'   => 'required|string|max:255',
        'mobile' => 'required',
        'email'  => 'required|email',
        'message'=> 'required|string',
        'state'  => 'required',
        'city'   => 'required',
        'user'   => 'required|in:franchisor,investor',
        'brand_name' => 'required_if:user,franchisor',
        'country' => 'required',
        'pincode' => 'required',
        'captcha' => 'required|captcha',

    ]);

    // Return JS-friendly validation errors
    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422);
    }
    
        $countryCode = $request->country_code ?? '+91';
        $mobileRaw   = $request->mobile ;

        // Remove spaces, dashes, etc.
        $mobileRaw = preg_replace('/\D/', '', $mobileRaw);

        $mobile = $countryCode . ' ' . $mobileRaw;

    $user = $request->user;
    $table = ($user == 'franchisor') ? AskFranchisor::query() : AskInvestor::query();

    $insertData = [
        'name'     => $request->name,
        'email'    => $request->email,
        'mobile'   => $mobile,
        'details'  => $request->message,
        'city'     => $request->city,
        'state'    => $request->state,
        'ip'       => $request->ip(),
        'country'  =>  $request->country,
        'pincode'  => $request->pincode
    ];

    if ($user == 'franchisor') {
        $insertData['brand_name'] = $request->brand_name;
    }

    $inserted = $table->insert($insertData);

    if (!$inserted) {
        return response()->json([
            'status' => 'error',
            'message' => 'Database insert failed.'
        ], 500);
    }
        $mailTo = ($user != 'franchisor') ? "" : "expo@franchiseindia.com";
        $mailcc = ($user != 'franchisor') ? "" : "info@franchiseindia.com";
        // $mailTo = ($user != 'franchisor') ? "" : "cnikhil@franchiseindia.net";

        Mail::getFacadeRoot()->to($mailTo)->cc($mailcc)->bcc("techsupport@franchiseindia.com")->send(new Enquirenow($request));


    return response()->json([
        'status' => 'success',
        'message' => 'Your enquiry has been submitted!',
        'redirect' => url('thanks-advice-form')
    ]);
}

 
public function submitEnquiry2(Request $request)
{
    // Validate form fields
    $request->validate([
        'name'   => 'required|string|max:255',
        'mobile' => 'required|digits:10',
        'email'  => 'required|email',
        'message'=> 'required|string',
        'state'  => 'required',
        'city'   => 'required',
        'brand_name' => 'required',
        'user'   => 'required|in:franchisor,investor',
    ]);

    // Read common fields
    $user       = $request->user; // franchisor OR investor
    $name       = $request->name;
    $email      = $request->email;
    $mobile     = $request->mobile;
    $city       = $request->city;
    $state      = $request->state;
    $details    = $request->message;
    $brand_name = $request->brand_name;
    $ip         = $request->ip();
   
    
    // Choose table dynamically
    $table = ($user == 'franchisor') ? AskFranchisor::query() : AskInvestor::query();

    // Insert data
    $insertData = [
        'name'       => $name,
        'city'       => $city,
        'state'      => $state,
        'email'      => $email,
        'mobile'     => $mobile,
        'details'    => $details,
        'brand_name'    => $brand_name,
        'ip'         => $ip,
        'country'    => "India",
        
    ];

    // Extra field only for Investor (tab 2)
    if ($user == 'investor') {
        $insertData['brand_name'] = $brand_name;
    }

    // Insert into database
    $saved = $table->insert($insertData);
    
    // dd('saved?', $saved, $insertData);


    if (!$saved) {
        return response()->json("Error: Could not save data", 500);
    }

  
    // If JS/AJAX submission
    if ($request->expectsJson()) {
        return response()->json("true", 200);
    }

    // Normal browser submit
    // return redirect()->back()->with('success', 'Your enquiry has been submitted!');
    return redirect('thanks-advice-form');
}

}
