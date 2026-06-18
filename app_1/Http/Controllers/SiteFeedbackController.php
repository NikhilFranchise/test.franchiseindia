<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedbackList;
use App\Mail\SiteFeedbackMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class SiteFeedbackController extends Controller
{
    public function feedbackForm(Request $request)
    {
        return view('site.feedback');
    }

    public function feedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|max:32',
            'email'    => 'required|email|max:255',
            'mobile'   => 'required|min:10|max:10',
            'ftopic'   => 'required',
            'feedback' => 'required',
            'site_type'=> 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        FeedbackList::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->mobile,
            'text'          => $request->feedback,
            'feedback_type' => $request->ftopic,
            'ip'            => $request->ip(),
            'site_type'     => $request->site_type,
        ]);

        $details = [
            'name'           => $request->name,
            'email'          => $request->email,
            'mobile'         => $request->mobile,
            'feedback_topic' => $request->ftopic,
            'feedback'       => $request->feedback,
            'site'           => $request->site_type,
        ];

        Mail::to(["ashita@franchiseindia.com"])->send(new SiteFeedbackMail($details));

        return view('static.feedback-response');
    }
}
