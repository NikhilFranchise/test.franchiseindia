<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\FranchisorBusinessDetail;
use App\Models\FiNewsLetter;
define('EMAIL_MARKETER_API', 'http://mailer.franchiseindia.com/emailmarketer/xml.php');


class MailerController extends Controller
{
    public function feedbackMailer(Request $request)
    {
        ob_start();
        $bid        = $request->bid;
        $apply      = $request->apply;
        $Iname      = "";
        $Iemail     = "";
        $Iphone     = "";
        $Icity      = "";
        $Iaddress   = "";
        $Franresult = 0;

        if ($apply == "SmartSchool") {
            $Franresult = FranchisorBusinessDetail::query()->where('fran_detail_id', 6124)->first();
            return view('mailer.mailer-smart-school', compact('Franresult'));
        }
        if ($apply == "SmartSchool-Junior") {
            $Franresult = FranchisorBusinessDetail::query()->where('fran_detail_id', 19721)->first();
            return view('mailer.mailer-smart-school-junior', compact('Franresult'));
        }

        if(substr($bid, 0, 4) == "FIHL"){
            $encbrandid = base64_encode($bid);
            session()->put('emailerId',$bid);
            return redirect("https://www.franchiseindia.com/advertisement/feedbackmailer.php?apply=$apply&bid=$encbrandid");
        }

        if(session()->has('emailerId'))
            $Franresult = FranchisorBusinessDetail::query()->where('franchisor_id',session()->get('emailerId'))->first();

        return view('mailer.mailer',compact('Iname','Iemail','Iphone','Icity','Iaddress','Franresult','apply'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function unsub(Request $request){
        $pid  = $request->pid;
        $eid  = $request->eid;
        $site = $request->segment(1);
        return view('mailer.unsubscribe', compact('pid', 'eid', 'site'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function unsubMailer(Request $request){

        $unsubscribe_reason = $request->reason;
        $site               = $request->site_type;
        $siteType           = 'fi';

        if($site == 'restaurant')
            $siteType = 'ri';
        
        if($site == 'wellness')
            $siteType = 'wi';
        
        if($site == 'education')
            $siteType = 'edu';
        


        if($request->reason == "")
            $unsubscribe_reason = "Your emails are too frequent";
        

        $unsubData = FiNewsLetter::query()->where('email',$request->eid)->where('site_type', $siteType)->where('status', 'S')->first();
        
        FiNewsLetter::query()->where('email',$request->eid)->where('site_type', $siteType)->update(['status' => 'U', 'unsubscribe_reason'=>$unsubscribe_reason, 'comment' => $request->txtFeedback]);
        
        if ($siteType == 'ri') {
            $site = "282";
        } elseif ($siteType == 'edu') {
            $site = "706";        
        } elseif ($siteType == 'fi') {
            $site = "7";        
        } elseif ($siteType == 'wi') {
            $site = "428";        
        } else {
            $site = "174";
        }

        $xml = '<xmlrequest>
                    <username>ebdotcom</username>
                    <usertoken>945667f87b2fde2a8957e1ccbb16d7980d434e85</usertoken>
                    <requesttype>subscribers</requesttype>
                    <requestmethod>DeleteSubscriber</requestmethod>
                    <details><emailaddress>'.$request->eid.'</emailaddress><list>'.$site.'</list></details>
                </xmlrequest>';
            
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, EMAIL_MARKETER_API);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close'));
        curl_exec($ch);
        curl_close($ch);

        if( empty($unsubData) )
            return redirect('/newsletter/unsubscribe/thanks');



        if(!empty($siteType)){            
            
            if($siteType == 'ri')
                return redirect('restaurant/newsletter/thanks');
            
            if($siteType == 'wi')
                return redirect('/wellness/newsletter/thanks');
            
            if($siteType == 'edu')
                return redirect('/education/newsletter/thanks');            

        }
        return redirect('/newsletter/unsubscribe/thanks');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newsletterUnsub(){
        return view('thanks/newsletterunsub');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function thanksMessage(){
        return view('static.mailerthanks');
    }
}
