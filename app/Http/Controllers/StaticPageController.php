<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;
use App\Models\PropertyLoan;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\ContentList;
use App\Models\FranchisorBusinessDetail;
use App\Models\TopFranchiseLeader;
use App\Models\TopFranchisorLeaders;
use Illuminate\Support\Facades\DB;

class StaticPageController extends Controller
{
    /**
     * about us page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutus()
    {
        return view('static.aboutus');
    }

    /**
     * site map page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function siteMap()
    {
        $alpha = "";
        $years = [];
        $alphabetCount = 1;
        $alphabeticalKickers = [];

        $allData = ContentList::query()
            ->select('time')
            ->where('status', 1)
            ->orderBy('time', 'ASC')->get()
            ->groupBy(function ($d) {
                return Carbon::parse($d->time)->format('Y-m');
            });

        foreach ($allData as $key => $val) {
            array_push($years, substr($key, 0, 4));
        }
        $years = array_unique($years);


        foreach (range('a', 'z') as $char) {

            if ($alphabetCount == 1)
                $alpha = $char . "to";

            if ($alphabetCount == 3) {
                $alphabetCount = 0;
                $alpha .= $char;
                $alphabeticalKickers[$alpha] = "";
                $alpha = "";
            }
            $alphabetCount = ++$alphabetCount;
        }

        $alphabeticalKickers['ytoz'] = "";

        foreach ($alphabeticalKickers as $kickerRange => $output) {

            $startAlphabet = substr($kickerRange, 0, 1);
            $endAlphabet = substr($kickerRange, 3);
            $kickerSpecificRange = [];

            $data  = ContentList::query()
                ->select('kicker',  DB::getFacadeRoot()->raw('count(kicker) as count'))
                ->where('status', 1)
                ->where('kicker', '!=', '')
                ->where('kicker', 'LIKE', $startAlphabet . '%');
            $checkFirst = 1;
            foreach (range($startAlphabet, $endAlphabet) as $char) {
                if ($checkFirst != 1)
                    $data  = $data->orWhere('kicker', 'LIKE', $char . '%');
                $checkFirst++;
            }

            $data  = $data->orderBy('kicker', 'ASC')
                ->groupBy('kicker')
                ->get()
                ->toArray();

            $kickerSpecificRange[] = $data;

            $alphabeticalKickers[$kickerRange] = $kickerSpecificRange;
            // dd($alphabeticalKickers);
        }

        // return view('static.sitemapnew', compact('years', 'allData', 'kickers', 'alphabeticalKickers'));
        return view('static.sitemapnew', compact('years', 'allData', 'alphabeticalKickers'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticleList()
    {
        $articles = ContentList::query()
            ->select('content_id', 'title', 'site_type', 'slug')
            ->where('status', 1)
            ->whereYear('time', request()->year)
            ->whereMonth('time', date('m', strtotime(request()->month)))
            ->orderBy('time', 'ASC')
            ->get();
        return view('static.sitemapnew2', compact('articles'));
    }

    /**
     * advertise page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function advertise()
    {
        return view('static.advertise');
    }

    /**
     * term page for main website
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mainTerm()
    {
        return view('static.terms');
    }

    public function p_popicy()
    {
        return view('.static.privacy_policy');
    }

    /**
     * events page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function event()
    {
        return view('static.event');
    }

    /**
     * term page for all sub websites
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function siteTerm()
    {
        if (request()->site == "wellness") {
            return view('static.terms');
        } elseif (request()->site == "education") {
            return view('static.education-terms');
        } elseif (request()->site == "restaurant") {
            return view('static.restaurant-terms');
        } else {
            return view('static.terms');
        }
    }

    /**
     * for all category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryAll()
    {
        return view('static.categories');
    }

    /**
     * testimonials page for main website
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTestimonials()
    {
        return view('static.testimonials');
    }

    /**
     * Top100 page for main website
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTopFranchisors()
    {
        return view('static.top-100-franchisors');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPropertyLoanForm()
    {
        return view('site.property-loan');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postPropertyLoanForm(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'email' => 'required|email|max:255',
            'mobile' => 'required|min:10|max:10',
            'address' => 'required',
            'pincode' => 'required|min:6|max:6',
            'city' => 'required|min:3',
            'property_type' => 'required',
            'property_size' => 'required',
            'property_value' => 'required',
            'income_range' => 'required',
            'loan_range' => 'required',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $message = "Your details have been submitted successfully";

        $source = "DOTCOM";
        if (!empty(Cookie::get('campaignSource')))
            $source = Cookie::get('campaignSource');

        try {
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
            $message = "Oops there is an error please try again..." . $e->getMessage();
        }

        return view('thanks.thanks', compact('message'));
    }


    public function topfranchiseleads()
    {
        $leaders = TopFranchiseLeader::query()->get();
        return view('static.topfranchiseleaders', compact('leaders'));
    }
    public function franchiseleader($year, $slug, $id)
    {
        // dd($id);
        $leader = TopFranchiseLeader::query()->where('id', $id)->first();
        // dd($leader);
        return view('static.topfranchiseleaders.leader_profile', compact('leader'));
    }

    // single function for top 200/100

    public function topFranchiseLeaders(Request $request)
    {
        $year = $request->year ?? null;
        $filterType = $request->filterType ?? null;
        $industry = $request->industry ?? null;
        $investment = $request->investmentRange ?? null;
        // $perPage = 25; // Items per page

        // Get available years for the dropdown
        $years = TopFranchisorLeaders::select('franchisor_year')
            ->distinct()
            ->orderByDesc('franchisor_year')
            ->get();

        // If no year is provided, fetch the latest year
        if (!$year) {
            $year = TopFranchisorLeaders::select('franchisor_year')
                ->distinct()
                ->orderByDesc('franchisor_year')
                ->pluck('franchisor_year')
                ->first();
        }

        // Get the franchise type for the selected year
        $franchiseType = TopFranchisorLeaders::where('franchisor_year', $year)->value('franchisor_type');

        // Build the query
        $query = TopFranchisorLeaders::with(['franchisorLeaders' => function ($q) {
            $q->select('franchisor_id', 'profile_name', 'company_name', 'ind_main_cat', 'ind_sub_cat', 'fran_detail_id', 'company_logo', 'unit_inv_min', 'unit_inv_max', 'unit_investment');
        }])->where('franchisor_year', $year);

        // Apply industry filter
        if (!empty($industry)) {
            $query->join('franchisor_business_details as fbd_industry', 'fbd_industry.franchisor_id', '=', 'top_franchisor_brands.franchisor_id')
                ->where('fbd_industry.ind_main_cat', $industry);
        }

        // Apply investment filter
        if (!empty($investment)) {
            $query->join('franchisor_business_details as fbd_investment', 'fbd_investment.franchisor_id', '=', 'top_franchisor_brands.franchisor_id')
                ->where('fbd_investment.unit_investment', $investment);
        }

        // Apply sorting
        if ($filterType == 'top-100') {
            $query->where('franchisor_type', 'top-100');
        } elseif ($filterType == 'top-200') {
            $query->where('franchisor_type', 'top-200');
        } elseif ($filterType == 'alphabetical') {
            $query->join('franchisor_business_details as fbd_order', 'fbd_order.franchisor_id', '=', 'top_franchisor_brands.franchisor_id')
                ->orderBy('fbd_order.company_name', 'asc');
        } elseif ($filterType == 'investMin') {
            $query->join('franchisor_business_details as fbd_order', 'fbd_order.franchisor_id', '=', 'top_franchisor_brands.franchisor_id')
                ->orderBy('fbd_order.unit_inv_min', 'asc');
        } elseif ($filterType == 'investMax') {
            $query->join('franchisor_business_details as fbd_order', 'fbd_order.franchisor_id', '=', 'top_franchisor_brands.franchisor_id')
                ->orderBy('fbd_order.unit_inv_max', 'desc');
        }

        // Use pagination
        $data = $query->get();
        dd($data);
        $count = $data->count();

        // If request is AJAX, return JSON response for filters
        if ($request->ajax()) {
            return response()->json([
                'count' => $data->count(),
                'franchisor_type' => $franchiseType,
                //'hasMore' => $data->hasMorePages(),
                'html' => view('static.topfranchiseleaders.dynamicData', compact('data','count'))->render(),
            ]);
        }

        // If it's a normal request, return the main view
        return view('static.topfranchiseleaders.top-200', compact('data', 'years', 'franchiseType', 'year','count'));
    }
}
