<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    public function contactUsForm()
    {
        return view('site/contact');
    }

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'email' => 'required|email|max:255',
            'mobile' => 'required|min:10|max:10',
            'address' => 'required',
            'pincode' => 'required|min:6|max:6',
            'contreason' => 'required',
            'country' => 'required',
            'city' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contactData = ContactUs::insertGetId([
            'want' => $request->contreason,
            'basedIn' => $request->country,
            'statename' => $request->state,
            'cityname' => $request->city,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'user_ip' => $request->ip(),
            'pincode' => $request->pincode,
            // 'source' => Cookie::get('campaignSource', 'DOTCOM'),
        ]);

        if ($contactData) {
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'contreason' => $request->contreason,
                'address' => $request->address . ', ' . $request->city . ', ' . $request->state . ', ' . $request->country . ', Pincode:- ' . $request->pincode,
            ];

            $mailTo = '';
            $mailBcc = ['techsupport@franchiseindia.com'];
            switch ($request->contreason) {
                case "Advertise with www.franchiseindia.com":
                case "Advertise in Magazine":
                case "Exhibit in Shows":
                    $mailTo = 'advertise@franchiseindia.com';
                    break;
                case "Expand my Company through Franchising":
                    $mailTo = 'ashita@franchiseindia.com';
                    break;
                case "Buy a Franchise (Business)":
                case "Sell my Existing Business":
                case "Subscribe to the Magazine":
                    $mailTo = 'dharmendra@franchiseindia.net';
                    break;
                case "Feedback":
                    $mailTo = 'techsupport@franchiseindia.com';
                    break;
                case "Others":
                    $mailTo = 'ashita@franchiseindia.com';
                    break;
            }

            if ($mailTo) {
                Mail::to($mailTo)->bcc($mailBcc)->send(new ContactUsMail($details));
            }
        }

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, url('dotcom-api/contact-us-salescrm-leads.php?contact_id=' . $contactData));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_exec($ch);

        // if (curl_errno($ch)) {
        //     Log::alert('SMS Sending in Curl Failed  : ' . curl_error($ch));
        // }

        // curl_close($ch);

        $message = $contactData ? "Contact form submitted successfully..." : "Contact form submission failed...";

        return view('thanks.thanks', compact('message')); 
    }
}
