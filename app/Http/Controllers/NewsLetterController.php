<?php

namespace App\Http\Controllers;

use App\Models\FiNewsLetter;
use App\Mail\NewsLetterSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

define('EMAIL_MARKETER_API', 'http://mailer.franchiseindia.com/emailmarketer/xml.php');

class NewsLetterController extends Controller
{
    /**
     * @return mixed
     * function for checking and sending email
     */
    public function newsletter()
    {
        $email = request()->email;
        $siteType = request()->site_type;
        $randValue = rand(100000, 9999999);
        $checkEmail = FiNewsLetter::query()->select('status')->where('email', $email)->where('site_type', $siteType)->orderby('nid', 'DESC')->first();
        $news = 'subscribing';

        if (count($checkEmail) > 0) {
            if ($checkEmail->status == "S") {
                $news = 'alreadysubscribed';
                return view('newsletter/subscribe')->with(compact('news'));
            }
        }

        $source = "DOTCOM";
        if (!empty(Cookie::get('campaignSource')))
            $source = Cookie::get('campaignSource');

        // If no record exists, send the verification mail
        if (count($checkEmail) == 0) {
            $news = 'subscribing';
            FiNewsLetter::query()->insert([
                'email' => $email,
                'verify_code' => $randValue,
                'site_type' => $siteType,
                'source_ref' => $source
            ]);
            if (!empty($email))
                Mail::getFacadeRoot()->to($email)->send(new NewsLetterSubscribe($randValue));

        } else if ($checkEmail->status == "P") {
            $news = 'pending';

        } else if ($checkEmail->status == "U") {
            $news = 'againsubscribe';
            FiNewsLetter::query()->where('email', $email)->where('site_type', $siteType)->update(['verify_code' => $randValue]);
            if (!empty($email))
                Mail::getFacadeRoot()->to($email)->send(new NewsLetterSubscribe($randValue));

        } else if ($checkEmail->status == "S") {
            $news = 'subscribed';
        }

        return view('newsletter/subscribe')->with(compact('news'));
    }

    /**
     * @return mixed
     */
    public function subscriptionForm()
    {
        $data = FiNewsLetter::query()->where('verify_code', request()->code)->orderby('nid', 'DESC')->first();
        if ($data == null || $data->count() === 0) {
            $news = "wrong";
            return view('newsletter/subscribe')->with(compact('news'));
        }

        if ($data->site_type == 'ri') {
            $site = "282";
        } elseif ($data->site_type == 'edu') {
            $site = "706";
        } elseif ($data->site_type == 'wi') {
            $site = "428";
        } else {
            $site = "7";
        }

        $xml = '<xmlrequest>
                <username>ebdotcom</username>
                <usertoken>945667f87b2fde2a8957e1ccbb16d7980d434e85</usertoken>
                <requesttype>subscribers</requesttype>
                <requestmethod>AddSubscriberToList</requestmethod>
                <details>
                <emailaddress>' . $data->email . '</emailaddress>
                <mailinglist>' . $site . '</mailinglist>
                <format>html</format>
                <confirmed>yes</confirmed>
                <customfields>                                
                </customfields>
                </details>
                </xmlrequest>
                ';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, EMAIL_MARKETER_API);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close'));
        curl_exec($ch);
        curl_close($ch);

        FiNewsLetter::query()->where('verify_code', request()->code)->update(['status' => 'S', 'verify_code' => '']);

        session()->flash('siteType', $data->site_type);
        session()->flash('newsletterEmail', $data->email);

        if ($data->site_type == "ri")
            return redirect('restaurant/newsletter/subscriptionForm');
        if ($data->site_type == "wi")
            return redirect('wellness/newsletter/subscriptionForm');
        if ($data->site_type == "edu")
            return redirect('education/newsletter/subscriptionForm');

        return redirect('/newsletter/subscriptionForm');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newsletterForm()
    {
        $data[0] = session()->get('siteType');
        $data[1] = session()->get('newsletterEmail');
        return view('newsletter/subscriptionForm', compact('data'));
    }

    /**
     * function to insert the subscription form data
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subscriptionFormsubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'state' => 'required',
            'industry' => 'required',
            'pincode' => 'required',
            'country' => 'required',
            'site_type' => 'required',
            'wantTo' => 'required'
        ]);

        $name = request()->name;
        $email = request()->email;
        $mobile = request()->mobile;
        $country = config('location.countryName.' . request()->input('country'));
        $wantTo = request()->wantTo;
        $industry = implode(',', request()->industry);
        $address = request()->address;
        $pincode = request()->pincode;
        $state = request()->state;
        $about = request()->input('about');
        $info = request()->info;
        $franoppo = request()->franoppo;
        $news = request()->news;
        $events = request()->events;
        $services = request()->services;
        $articles = request()->articles;
        $newsletter = request()->newsletter;
        $other = request()->other;
        $iwant = array();

        if ($franoppo == 1) {
            array_push($iwant, "Business & Franchise opportunities");
        } else {
            $franoppo = '0';
        }
        if ($news == 1) {
            array_push($iwant, "Business News & Trends");
        } else {
            $news = '0';
        }
        if ($events == 1) {
            array_push($iwant, "Events and Seminars");
        } else {
            $events = '0';
        }
        if ($services == 1) {
            array_push($iwant, "Business Services");
        } else {
            $services = '0';
        }
        if ($articles == 1) {
            array_push($iwant, "Articles & Research");
        } else {
            $articles = '0';
        }
        if ($newsletter == 1) {
            array_push($iwant, "Newsletter");
        } else {
            $newsletter = '0';
        }
        if ($other == 1) {
            array_push($iwant, "Others");
        } else {
            $other = '0';
        }
        if ($info == 1) {
            array_push($iwant, "ALL");
        }

        $iam = "";
        $want = implode(',', $iwant);

        if (!empty($about))
            $iam = implode(',', $about);

        $prevRecord = FiNewsLetter::query()->where('email', $email)->where('site_type', request()->site_type)->count();

        if ($prevRecord != 0) {
            FiNewsLetter::query()->where('email', $email)
                ->where('site_type', request()->site_type)
                ->update([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $mobile,
                    'country' => $country,
                    'state' => $state,
                    'i_want_to' => $wantTo,
                    'category' => $industry,
                    'address' => $address,
                    'pincode' => $pincode,
                    'iam' => $iam,
                    'iw_fran_oppor' => $franoppo,
                    'iwant' => $want,
                    'iw_news_trends' => $news,
                    'iw_events_seminars' => $events,
                    'iw_business_service' => $services,
                    'iw_articles_research' => $articles,
                    'iw_newsletter' => $newsletter,
                    'iw_others' => $other,
                    'status' => 'S'
                ]);

            $news = 'thanks';

            if (!empty(request()->site_type)) {

                if (request()->site_type == 'ri')
                    return redirect('restaurant/newsletter/newsub');

                if (request()->site_type == 'wi')
                    return redirect('/wellness/newsletter/newsub');

                if (request()->site_type == 'edu')
                    return redirect('/education/newsletter/newsub');

            }
            return view('newsletter/subscribe')->with(compact('news'));
        }

        FiNewsLetter::query()->insert([
            'name' => $name,
            'email' => $email,
            'phone' => $mobile,
            'country' => $country,
            'state' => $state,
            'i_want_to' => $wantTo,
            'category' => $industry,
            'address' => $address,
            'pincode' => $pincode,
            'iam' => $iam,
            'iw_fran_oppor' => $franoppo,
            'iwant' => $want,
            'iw_news_trends' => $news,
            'iw_events_seminars' => $events,
            'iw_business_service' => $services,
            'iw_articles_research' => $articles,
            'iw_newsletter' => $newsletter,
            'iw_others' => $other,
            'site_type' => request()->site_type,
            'status' => 'S'
        ]);

        $news = 'thanks';

        if (!empty(request()->site_type)) {
            if (request()->site_type == 'ri')
                return redirect('restaurant/newsletter/newsub');

            if (request()->site_type == 'wi')
                return redirect('/wellness/newsletter/newsub');

            if (request()->site_type == 'edu')
                return redirect('/education/newsletter/newsub');
        }
        return view('newsletter/subscribe')->with(compact('news'));
    }

    /**
     * @return mixed
     */
    public function newsletterSub()
    {
        $news = 'thanks';
        return view('newsletter/subscribe')->with(compact('news'));
    }

    /**
     * @param $email
     * @param $siteType
     */
    public static function createNewsLetter($email, $siteType)
    {
        $randCode = rand(100000, 9999999);
        $checkEmail = FiNewsLetter::query()->select('status')->where('site_type', $siteType)->where('email', $email)->first();

        // If no record exists, send the verification mail
        if ($checkEmail == null || $checkEmail->count() == 0) {

            FiNewsLetter::query()->insert([
                'email' => $email,
                'verify_code' => $randCode,
                'site_type' => $siteType
            ]);
            if (!empty($email))
                Mail::to($email)->send(new NewsLetterSubscribe($randCode));

        } else if ($checkEmail->count() != 0 && $checkEmail->status != 'S') {
            FiNewsLetter::query()->where('email', $email)->where('site_type', $siteType)->update(['verify_code' => $randCode]);
            if (!empty($email))
                Mail::to($email)->send(new NewsLetterSubscribe($randCode));
        }
    }
}
