<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertise;
use App\Mail\AdvertiseMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
class AdvertiseController extends Controller
{
    //
     /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function advertise()
    {   
        $advertiseData = Advertise::query()->insertGetId([
                                    'name'     => request()->name,
                                    'email'    => request()->email,
                                    'mobile'   => request()->mobile,
                                    'city'     => request()->city,
                                    'reg_type' => request()->id,
                                    'company'  => request()->company_name
                                    ]);

        $data[0] = request()->name;
        $data[1] = request()->email;
        $data[2] = request()->mobile;
        $data[3] = request()->id;
        $data[4] = request()->company_name;
        $data[5] = request()->city;

        if(request()->id == "TheFranchisingWorld"){
            Mail::getFacadeRoot()->to(["advertise@franchiseindia.com", "cem@franchiseindia.net"])->bcc(["techsupport@franchiseindia.com"])->send(new AdvertiseMail($data));
            return redirect('https://www.franchiseindia.com/pdf/tfw-magazine.pdf');
        }

        if(request()->id == "Retailer"){
            Mail::getFacadeRoot()->to(["cem@franchiseindia.net", "advertise@franchiseindia.com"])->bcc(["techsupport@franchiseindia.com"])->send(new AdvertiseMail($data));
            return redirect('https://www.franchiseindia.com/pdf/retailer-magazine.pdf');
        }

        if(request()->id == "Entrepreneur"){
            Mail::getFacadeRoot()->to(["cem@franchiseindia.net", "advertise@franchiseindia.com"])->bcc(["techsupport@franchiseindia.com"])->send(new AdvertiseMail($data));
            return redirect('https://www.franchiseindia.com/pdf/entrepreneur-magazine.pdf');
        }

        if(request()->id == "Franchiseindia.com"){
            Mail::getFacadeRoot()->to(["advertise@franchiseindia.com", "cem@franchiseindia.net"])->bcc(["techsupport@franchiseindia.com"])->send(new AdvertiseMail($data));
            return redirect('https://www.franchiseindia.com/pdf/dotcom-media-kit.pdf');
        }

        $message = "Thanks for showing interest. Our executive will get in touch with you shortly!";

        if(request()->id == "FranchiseRetailOpportunityShow"){
            Mail::getFacadeRoot()->to(["advertise@franchiseindia.com", "cem@franchiseindia.net"])->bcc(["techsupport@franchiseindia.com"])->send(new AdvertiseMail($data));
            return view('thanks.thanks', compact('message'));
        }

        if(request()->id == "BusinessOpportunitiesShow"){
            Mail::getFacadeRoot()->to(["advertise@franchiseindia.com", "cem@franchiseindia.net"])->bcc(["techsupport@franchiseindia.com"])->send(new AdvertiseMail($data));
            return view('thanks.thanks', compact('message'));
        }

        if(request()->id == "FranchiseIndiaForums"){
            Mail::getFacadeRoot()->to("bpreetima@franchiseindia.net")->bcc(["techsupport@franchiseindia.com"])->send(new AdvertiseMail($data));
            return view('thanks.thanks', compact('message'));
        }

        $ch     = curl_init();
        curl_setopt($ch,CURLOPT_URL, url('dotcom-api/advertise-us-salescrm-leads.php?advertise_id='.$advertiseData));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_exec($ch);

        if(curl_errno($ch))
            Log::getFacadeRoot()->alert('SMS Sending in Curl Failed  : ' . curl_error($ch));

        curl_close($ch);  // Close the curl connection

        if(!$advertiseData)
            return response()->json('Insertion failed..!');

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function advertiseView()
    {
        return view('static.advertise');
    }
}
