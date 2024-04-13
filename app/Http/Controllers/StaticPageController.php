<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyLoan;
use Illuminate\Support\Facades\Cookie;

class StaticPageController extends Controller
{
    public function aboutus()
    {
        return view('static.aboutus');
    }

    public function getTestimonials()
    {
        return view('static.testimonials');
    }
    public function mainTerm()
    {
        return view('static.terms');
    }
    public function getPropertyLoanForm()
    {
        return view('site.property-loan');
    }
    
    public function postPropertyLoanForm()
    {
        // dd(request());
        $message = "Your details have been submitted successfully";

        $source = "DOTCOM";
        if(!empty(Cookie::get('campaignSource')))
            $source = Cookie::get('campaignSource');

        try{
            PropertyLoan::query()->insert([
                'name' => request()->name,
                'email' => request()->email,
                'mobile' => request()->mobile,
                'address' => request()->address,
                'pincode' => request()->pincode,
                'city' => request()->city,
                'property_type' => request()->property_type,
                'end_usage' => request()->end_usage,
                'country' => request()->country,
                'company_name' => request()->company_name,
                'designation' => request()->designation,
                'industry_type' => request()->industry_type,
                'amount' => request()->amount,
                'property_size' => request()->property_size,
                'property_value' => request()->property_value,
                'income_range' => request()->income_range,
                'loan_range' => request()->loan_range,
                'details' => request()->details,
                'source' => $source
            ]);
        } catch (\Exception $e) {
            $message = "Oops there is an error please try again...". $e->getMessage();
        }

        return view('thanks.thanks', compact('message'));
    }
}
