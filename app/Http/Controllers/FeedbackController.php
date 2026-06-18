<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserAccount;
use App\Models\UserActivity;
use App\Models\InvestorDetails;
use App\Models\FeedbackMembers;
use App\Models\ExpressInstaApply;
use App\Models\FranchisorFeedback;
use App\Mail\UserFeedbackMail;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\LOG;
use Illuminate\Support\Facades\Mail;
use App\Mail\RawMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class FeedbackController extends Controller
{
    //inserting feedback investor profile
    public function feedback(Request $request)
    {
        if (!Auth::user())
            return redirect('loginform');
        //validating the incomming variables
        $this->validate($request, [
            'topic' => 'required',
            'feedbackContent' => 'required',
        ]);

        $profileId = Auth::user()->profile_str;
        $userData = UserAccount::where('profile_str', '=', $profileId)->select('name', 'profile_type', 'mobile', 'email')->first();
        $name = $userData->name;
        $mobile = $userData->mobile;
        $email = $userData->email;
        $profileType = $userData->profile_type;
        $profileMembership = 1;
        //uploading the data with respect to franchisor
        if ($userData->profile_type == Config('constants.ProfileType.Franchisor')) {
            $franData = FranchisorBusinessDetail::where('franchisor_id', '=', $profileId)->select('ceo_name', 'state', 'city', 'company_name')->first();
            $address = $franData->city . "," . $franData->state;
            $company = $franData->company_name;
            $name = $franData->ceo_name;

            //mailing send
            $details['name'] = $franData->ceo_name;
            $details['email'] = $userData->email;
            $details['mobile'] = $userData->mobile;
            $details['id_type'] = "Franchisor";
            $details['address'] = $address;
            $details['topic'] = $request->ftopic;
            $details['feedback'] = $request->feedback;

            Mail::to("ashita@franchiseindia.com")->send(new UserFeedbackMail($details));
            //mailing end
        }
        //uploading the data with respect to investor
        if ($userData->profile_type == Config('constants.ProfileType.Investor')) {
            $invData = InvestorDetails::where('investor_id', '=', $profileId)->select('inv_city', 'inv_state', 'industry_job')->first();
            $address = $invData->inv_city . "," . $invData->inv_state;
            $company = $invData->industry_job;

            //mailing send
            $details['name'] = $userData->name;
            $details['email'] = $userData->email;
            $details['mobile'] = $userData->mobile;
            $details['id_type'] = "Investor";
            $details['address'] = $address;
            $details['topic'] = $request->ftopic;
            $details['feedback'] = $request->feedback;

            Mail::to("ashita@franchiseindia.com")->send(new UserFeedbackMail($details));
            //mailing end
        }

        $topic = $request->ftopic;
        $feedback = $request->feedback;
        $insertRecord = FeedbackMembers::query()->insert([
            'profile_id' => $profileId,
            'user_name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'company' => $company,
            'topic' => $topic,
            'feedback' => $feedback,
            'profile_type' => $profileType,
            'membership_type' => $profileMembership,
            'address' => $address
        ]);
        if (!$insertRecord) {
            // Log the error
            Log::critical('Feedback failed : Feedback Model' . $email);
            // Flash the error message in client window
            session()->flash('errorMessage', 'Please try Again after some time Our servers are busy');
            // return back to the feedback form
            return redirect()->back();
        }

        Session()->flash('message', "Thanks for Providing us Valuable feedback");
        Session()->flash('hide', "display:none;");
        return redirect()->back();
    }


    /**
     * @param Request $request
     * @return string
     */
    public function paidFranchisorFeedback(Request $request)
    {
        if (Auth::user()) {
            $franchisorId = Auth::user()->profile_str;
        } else {
            $franchisorId = $request->franId;
        }

        Cookie::queue('form_applicable', "0");

        $check = FranchisorFeedback::where('franchisor_id', $franchisorId)
            ->where('created_at', '>', date('Y-m-d 00:00:00', strtotime("-5 day")))
            ->count();

        if ($check > 0)
            return "success";


        FranchisorFeedback::query()->insert([
            'franchisor_id' => $franchisorId,
            'quality_leads' => $request->leadQuality,
            'quantity_leads' => $request->leadQuantity,
            'no_of_prospects' => $request->noOfProspects,
            'happiness_rating' => $request->happiness,
            'franchise_exp_rating' => $request->expRating,
            'feedback_comment' => $request->feedbackComment,
            'feedback_month' => $request->feedbackMonth,
        ]);

        $company = FranchisorBusinessDetail::query()->select('company_name')->where('franchisor_id', $franchisorId)->first()->company_name;
        $data = "<table><tr><td>FranchisorId</td><td>&nbsp;:&nbsp;</td><td>" . $franchisorId . "</td></tr><tr><td>Company Name</td><td>&nbsp;:&nbsp;</td><td>" . $company . "</td></tr><tr><td>Experience with FranchiseIndia.com</td><td>&nbsp;:&nbsp;</td><td>" . $request->expRating . "</td></tr><tr><td>Satisfaction level for the quantity of leads</td><td>&nbsp;:&nbsp;</td><td>" . $request->leadQuantity . "</td></tr><tr><td>Satisfaction level for the quality of leads</td><td>&nbsp;:&nbsp;</td><td>" . $request->leadQuality . "</td></tr><tr><td>Number of prospects received from the website</td><td>&nbsp;:&nbsp;</td><td>" . Config('constants.NoOfProspects.' . $request->noOfProspects) . "</td></tr><tr><td>Happiness were you with franchise India's service</td><td>&nbsp;:&nbsp;</td><td>" . $request->happiness . "</td></tr><tr><td>Feedback For Month</td><td>&nbsp;:&nbsp;</td><td>" . $request->feedbackMonth . "</td></tr><tr><td>Comment</td><td>&nbsp;:&nbsp;</td><td>" . $request->feedbackComment . "</td></tr></table>";
        Mail::getFacadeRoot()->to(['service@franchiseindia.net'])->send(new RawMail($data, array('subject' => 'Paid Franchisor Feedback', 'from' => 'no-reply@franchiseindia.com', 'attachment' => '')));
        return "success";
    }

    /*
     *   feedback mailer Feeds
     */
    public function getEmailFeedbackView(Request $request)
    {
        Cookie::queue('franchisor_feedback_month', ($request->month));

        if (empty(Cookie::get('email_fran_id'))) {

            if (!isset($request->franID))
                return redirect('404');

            Cookie::queue('email_fran_id', base64_decode($request->franID));
            return redirect('feedback-email');
        }

        if (!empty(Cookie::get('email_fran_id')) && isset($request->franID) && Cookie::get('email_fran_id') != base64_decode($request->franID)) {
            Cookie::queue('email_fran_id', base64_decode($request->franID));
            return redirect('feedback-email');
        }

        if (!empty(Cookie::get('email_fran_id')) && isset($request->franID) && Cookie::get('email_fran_id') == base64_decode($request->franID))
            return redirect('feedback-email');


        $franData = FranchisorBusinessDetail::query()->select('company_logo', 'company_name', 'created_at', 'views', 'membership_type')
            ->where('franchisor_id', Cookie::get('email_fran_id'))->first();
        if (empty($franData))
            return redirect('404');

        $eICount = UserActivity::distinct('investor_id')
            ->select('investor_id', 'visit_date')
            ->where('franchisor_id', Cookie::get('email_fran_id'))
            ->whereNotNull('investor_id')
            ->where('investor_id', '!=', 'Anonymous')
            ->orderBy('clickID', 'desc')
            ->count();

        $applyCount = (ExpressInstaApply::where('franchisor_id', Cookie::get('email_fran_id'))->count() + $eICount);

        return view('site.emailer-feedback', compact('franData', 'applyCount'));
    }
}
