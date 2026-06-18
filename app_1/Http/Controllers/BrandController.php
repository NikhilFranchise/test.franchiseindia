<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserClick;
use App\Models\FranchisorTradePartner;
use App\Models\UniqueVisit;
use App\Models\ContentList;
use App\Models\UserViewBrand;
use App\Models\FranchisorSliderTenure;
use App\Models\FranchisorLike;
use App\Models\OiBrands;
use App\Models\FranchisorBusinessDetail;
use App\Models\InvestorDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\InsightList;
use App\Models\Regional\DealerRegional;
use App\Models\Regional\FranchiseRegional;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class BrandController extends Controller
{
    //pankaj redis implementation start
    public function brandDetails(Request $request)
    {
        // dd(Cookie::get('utm_source'));
        // $referrer = $request->headers->get('referer', 'No referrer found');
        // dd($referrer);
        // $referrer = 'https://www.franchiseindia.net/tamil-nadu/';
        // $referrer = 'http://localhost/franchise.net_api/jammu-kashmir/';

        //     if ($referrer && parse_url($referrer, PHP_URL_HOST) === 'localhost') {
        //         $path = parse_url($referrer, PHP_URL_PATH);
        //         $segments = explode('/', trim($path, '/'));
        //         $state = end($segments);

        //         $cookieValue = 'DOTNET ' . strtoupper(str_replace('-', ' ', $state));

        //         Cookie::queue('utm_source', $cookieValue, 60 * 24); // minutes

        //         // return response('Cookie queued'); // MUST return a response
        //     }


         $utmCampaign = $request->query('utm_campaign');

            if ($utmCampaign) {
                $cookieValue = strtoupper(str_replace('-', ' ', $utmCampaign)); // Optional: format nicely
            } else {
                // 2. Fallback to referrer logic
                $referrer = $request->headers->get('referer');

                if ($referrer && parse_url($referrer, PHP_URL_HOST) === 'localhost') {
                    $path = parse_url($referrer, PHP_URL_PATH); // e.g. /franchise.net_api/jammu-kashmir/
                    $segments = explode('/', trim($path, '/'));
                    $state = end($segments);
                    $cookieValue = 'DOTNET ' . strtoupper(str_replace('-', ' ', $state));
                } else {
                    // No UTM or valid referrer – do nothing or set default
                    $cookieValue = null;
                }
            }

            // 3. Set the cookie if we have a value
            if ($cookieValue) {
                Cookie::queue('utm_source', $cookieValue, 60 * 24); // 24 hours
            }

            // Proceed with response
            // return response('Cookie handled');
        

            // dd(Cookie::get('utm_source'));

    
        $ratings = 0;
        $likesCnt = 0;
        $brandUrlParam = $request->profileName;         // Fetch the request parameter
        $brandParamsArr = explode('.', $brandUrlParam);  // Explode it by separator & fetch details from DB
        $images = [];
        $view = "brandlanding";
        if ($brandUrlParam == "fpf.96936") {
            $brandUrlParam = "fiery-pot-foods.103010";
            return redirect(Config('constants.MainDomain') . '/brands/' . $brandUrlParam, 301);
        }
        if ($brandUrlParam == "berger-paints-india-limited.59427") {
            $brandUrlParam = "berger-paints.93087";
            return redirect(Config('constants.MainDomain') . '/brands/' . $brandUrlParam, 301);
        }
        // dd($brandParamsArr);
        if (count($brandParamsArr) < 2 || !is_numeric($brandParamsArr[1])) {
            return redirect(Config('constants.MainDomain') . '/business-opportunities/all/all', 301);
        }
        //cache start

        $cacheDuration = 604800;
        $franDetails = FranchisorBusinessDetail::query()->find($brandParamsArr[1]);

        //  dd($franDetails);
        $main_cat = Config('constants.CategoryArr');
        $a = $franDetails->ind_main_cat;
        $index_value = $main_cat[$a];
        $u_slug = Config('category.SeoCategoryArr');
        $url_slug = $u_slug[$a];
        $fran_new_data = FranchisorBusinessDetail::query()
            ->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name', 'unit_inv_min', 'unit_inv_max', 'company_logo', 'ind_main_cat')
            ->where('profile_status', 1)
            ->where('membership_type', 1)
            ->where('ind_main_cat', $franDetails->ind_main_cat)
            ->take(9)
            ->get();
        // Cache key for insight matches
        $insightMatchesCacheKey = "insight_matches_{$franDetails->company_name}";
        $insightMatches = Cache::remember($insightMatchesCacheKey, $cacheDuration, function () use ($franDetails) {
            // Prepare the regex pattern
            $cleanCompanyName = preg_replace('/[^a-zA-Z0-9\s]/', '', $franDetails->company_name);
            $cleanCompanyName = preg_replace('/\s+/', ' ', trim($cleanCompanyName));
            $companyNameRegex = preg_quote($cleanCompanyName, '/');
            $pattern = '(?i)(^|[[:space:]])' . $companyNameRegex . '([[:space:]]|$)';


            return InsightList::query()
                ->select('news_id', 'title', 'insight_type', 'slug', 'created_at')
                ->where('status', 1)
                ->whereRaw("LOWER(title) REGEXP LOWER(?)", [$pattern])
                ->orderByDesc('created_at')
                ->limit(3)
                ->get()
                ->map(function ($item) {
                    $item->url = url('insights/en/' . strtolower($item->insight_type) . '/' . $item->slug . '.' . $item->news_id);
                    return $item;
                });
        });

        $combinedDataCollection = $insightMatches->toArray();
        $combinedDataCollection = collect($combinedDataCollection);
        //OI Redirection Code End

        if (!empty($franDetails) && request()->segment(1) == 'hi' && $franDetails->is_hindi == 0)
            return redirect()->back();

        if (!empty($franDetails) && $franDetails->franchisor_id == "FIHL978776")
            return redirect(Config('constants.MainDomain') . '/brands/GodrejInterio-123.8762', 301);

        if (empty($franDetails) || ($franDetails->profile_status != 1 && $franDetails->profile_status != 11))
            return redirect(Config('constants.MainDomain') . '/business-opportunities/all/all', 301);

        if ($franDetails->profile_name != $brandParamsArr[0] && $request->segment(1) == 'brands')
            return redirect('brands/' . $franDetails->profile_name . '.' . $brandParamsArr[1], 301);

        if ($franDetails->profile_name != $brandParamsArr[0] && $request->segment(1) != 'brands')
            return redirect('hi/brands/' . $franDetails->profile_name . '.' . $brandParamsArr[1], 301);

        $region = $franDetails->multiUnit;
        $stateList = (!empty($franDetails->franchisorLocState) ? $franDetails->franchisorLocState->toArray() : "");
        // dd($region, $stateList);
        $likeTableData = $franDetails->franchisorLike;
        $pageLayout = $franDetails->page_layout_type;

        $franDetails->business_desc = CommonController::cleanContent($franDetails->business_desc);

        // Update number of views in franchisor_business_details table
        $update = $franDetails->increment('views');

        // User Likes & Ratings
        if ($likeTableData !== null && $likeTableData->count() > 0) {
            $likesCnt = $likeTableData->blike; //like count

            // User Ratings
            if (!empty($likeTableData->brate))
                $ratings = ($likeTableData->brate / $likeTableData->bclick);
        }


        // Insert into unique visits table if there is no entry
        $uniqVisitsCheck = $franDetails->uniqueVisit;
        // dd($uniqVisitsCheck);

        if (!empty($uniqVisitsCheck))
            $uniqVisitsCheck = $uniqVisitsCheck->where('ip', $request->ip())->where('date', date('Y-m-d'))->first();

        if (empty($uniqVisitsCheck)) {
            $insUniqVisit = UniqueVisit::query()->create([
                'franchisor_id' => $franDetails->franchisor_id,
                'ip' => $request->ip(),
                'date' => date('Y-m-d')
            ]);
        }

        $regionalFranchisorMembership = FranchiseRegional::query()
            ->where('fihl_id', $franDetails->franchisor_id)
            ->where('status', 1)
            ->value('membership_type'); // returns the first column value directly

        if ($regionalFranchisorMembership == 0) {
            $regionalFranchisorMembership = DealerRegional::query()
                ->where('fihl_id', $franDetails->franchisor_id)
                ->where('status', 1)
                ->value('membership_type');
        }

        // Check for the userclicks table count
        $click = $franDetails->userClick;

        if (!empty($click))
            $click = $click->toArray();

        // If there's no record, create a new one
        if (empty($click)) {
            $firstClick = UserClick::query()->create([
                'franchisor_id' => $franDetails->franchisor_id,
                'clicks' => 0
            ]);
        }

        // If record exists, iterate the value by 1
        if (!empty($click))
            UserClick::query()->where('franchisor_id', $franDetails->franchisor_id)->increment('clicks');

        //layout image selection conditions and selection
        $layoutType = ($pageLayout == 3) ? "image_type_slider2" : "image_type_slider1";

        $sliderCheck = FranchisorSliderTenure::query()->where('franchisor_id', $franDetails->franchisor_id)->first();

        if (!empty($sliderCheck) && $sliderCheck->status == 1 && $sliderCheck->end_date >= date('Y-m-d H:i:s')) {

            if ($pageLayout == 3 || $pageLayout == 2) {

                //Fetching the slider images with frandetail object
                $images = $franDetails->franchisorSliderImage;

                if (!empty($images))
                    $images = $images->select($layoutType)
                        ->where($layoutType, '!=', '')
                        ->where('franchisor_id', $franDetails->franchisor_id)
                        ->where('status', 1)
                        ->get();
            }
        }

        $franTradePartnerData = FranchisorTradePartner::query()->where('franchisor_id', $franDetails->franchisor_id)->get();


        if ($franDetails->franchisor_id == "FIHL231593") {
            // SEO Meta Tags
            $seoTitle = "3D Technology Dealership and Distributorship Opportunities in India";
            $seoDesc = "Get 3D Technology distributorship opportunities for sale to drive commercial growth. You will find here distributors of 3D printer, 3D scanner, Steam Lab, Atal Lab, 3D consumables manufacturers in India.";
            $seoKeywords = "3D printer dealers, 3D printer distributors 3D scanner distributors, Steam Lab distributors, Atal Lab distributors, 3D consumables manufacturer, 3D printer distributors";
        } elseif ($franDetails->ind_main_cat == 5) {
            $seoTitle = sprintf('%s  Dealership & Distributorship – Cost, How to Get, Contact, Fee, Apply', $franDetails->company_name);
            $seoDesc = sprintf('Get %1$s Dealership & Distributorship. Get the %1$s dealership/distributorship information including start-up costs, dealership fees, requirements, growth history and more. Join %1$s dealership/distributorship and be on your way to owning and running a successful business.', $franDetails->company_name);
            $seoKeywords = sprintf('%1$s Dealership, %1$s Distributorship, %1$s dealership cost, %1$s distributorship cost, %1$s contact number, how to get %1$s dealership/distributorship, %1$s dealership/distributorship profit, %1$s franchise enquiry, %1$s dealership/distributorship requirements, %1$s dealership/distributorship apply , %1$s fee, %1$s dealership/distributorship monthly income.', $franDetails->company_name);
        } else {
            // SEO Meta Tags
            // SEO Meta Tags
            $seoTitle = sprintf('%s Franchise Cost |How to Get | Contact| Fee | Apply', $franDetails->company_name);
            $seoDesc = sprintf('Own your %1$s franchise. Get the %1$s franchising information including start-up costs, franchise fees, requirements, growth history and more. Join %1$s franchise and be on your way to owning and running a successful franchise business.', $franDetails->company_name);
            $seoKeywords = sprintf('%1$s franchise in India, %1$s franchise cost, %1$s franchise contact number, how to get %1$s franchise, %1$s franchise profit, %1$s franchise enquiry, %1$s franchise requirements, %1$s franchise apply , %1$s franchise fee, %1$s franchise monthly income, %1$s franchise reviews', $franDetails->company_name);
        }


        //for related business Articles
        $relatedBrands = $this->getRelatedBrands(6, $franDetails);

        //Investor Auth check and fetch expressed interest data
        $expIntVal = $this->investorDataSet($franDetails);

        $isHindi = request()->segment(1) == 'hi' ? 1 : 0;

        //for You may like
        $likeArticles = $this->getContentForBrandLanding(10, $franDetails, $isHindi);

        if (request()->segment(1) == 'hi') {
            $view = "brandlanding-hindi";
        }
        if (Auth::check()) {
            $inv_credits =  InvestorDetails::select('investor_details.credit_limit', 'user_accounts.reg_source')
                ->join('user_accounts', 'investor_details.investor_id', '=', 'user_accounts.profile_str')
                ->where('investor_details.investor_id', request()->user()->profile_str)->where('user_accounts.reg_source', 'DelhiExpoPaid')
                ->first();

            // return the investor data to blade view
            return view('franchisor/landing/' . $view, compact('seoTitle', 'seoDesc', 'seoKeywords', 'franDetails', 'region', 'stateList', 'likesCnt', 'ratings', 'expIntVal', 'images', 'relatedBrands', 'likeArticles', 'franTradePartnerData', 'inv_credits', 'combinedDataCollection', 'regionalFranchisorMembership'));
        } else {
            // return the data to blade view
            return view('franchisor/landing/' . $view, compact('seoTitle', 'seoDesc', 'seoKeywords', 'franDetails', 'region', 'stateList', 'likesCnt', 'ratings', 'expIntVal', 'images', 'relatedBrands', 'likeArticles', 'franTradePartnerData', 'combinedDataCollection', 'fran_new_data', 'index_value', 'main_cat', 'url_slug', 'regionalFranchisorMembership'));
        }
    }

    //pankaj redis implementation end

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function ampBrandDetails(Request $request)
    {
        // Initialize the variables
        $brandUrlParam = $request->profileName;         // Fetch the request parameter
        $brandParamsArr = explode('.', $brandUrlParam);  // Explode it by separator & fetch details from DB
        $view = "brandlanding-amp";

        if (count($brandParamsArr) < 2)
            return redirect(Config('constants.MainDomain') . '/business-opportunities/all/all', 301);

        $franDetails = FranchisorBusinessDetail::query()->find($brandParamsArr[1]);

        if (!empty($franDetails) && request()->segment(1) == 'hi' && $franDetails->is_hindi == 0)
            return redirect()->back();

        if (empty($franDetails) || $franDetails->profile_status != 1)
            return redirect(Config('constants.MainDomain') . '/business-opportunities/all/all', 301);

        if ($franDetails->profile_name != $brandParamsArr[0] && $request->segment(2) != 'hi')
            return redirect('amp/brands/' . $franDetails->profile_name . '.' . $brandParamsArr[1], 301);

        if ($franDetails->profile_name != $brandParamsArr[0] && $request->segment(2) == 'hi')
            return redirect('amp/hi/brands/' . $franDetails->profile_name . '.' . $brandParamsArr[1], 301);

        $franDetails->business_desc = preg_replace("/<img[^>]+\>/i", "", $franDetails->business_desc);
        $franDetails->business_desc = preg_replace("/&#?[a-z0-9]+;/i", "", $franDetails->business_desc);
        $franDetails->business_desc = preg_replace("/<v>/i", "", $franDetails->business_desc);
        $franDetails->business_desc = preg_replace('#<iframe[^>]+>.*?</iframe>#is', '', $franDetails->business_desc);
        $franDetails->business_desc = preg_replace('/style=\\"[^\\"]*\\"/', '', $franDetails->business_desc);
        $franDetails->business_desc = preg_replace('(mso-[a-z\-: ]+; )i', '', $franDetails->business_desc);

        $region = $franDetails->multiUnit;
        $stateList = (!empty($franDetails->franchisorLocState) ? $franDetails->franchisorLocState->toArray() : "");

        // Update number of views in franchisor_business_details table
        $franDetails->increment('views');

        // Insert into unique visits table if there is no entry
        $uniqVisitsCheck = $franDetails->uniqueVisit;

        if (!empty($uniqVisitsCheck))
            $uniqVisitsCheck = $uniqVisitsCheck->where('ip', $request->ip())->where('date', date('Y-m-d'))->first();

        if (empty($uniqVisitsCheck)) {
            UniqueVisit::query()->create([
                'franchisor_id' => $franDetails->franchisor_id,
                'ip' => $request->ip(),
                'date' => date('Y-m-d')
            ]);
        }

        // Check for the userclicks table count
        $click = $franDetails->userClick;

        if (!empty($click))
            $click = $click->toArray();

        // If there's no record, create a new one
        if (empty($click)) {
            $firstClick = UserClick::query()->create([
                'franchisor_id' => $franDetails->franchisor_id,
                'clicks' => 0
            ]);
        }

        // If record exists, iterate the value by 1
        if (!empty($click))
            UserClick::query()->where('franchisor_id', $franDetails->franchisor_id)->increment('clicks');

        $franTradePartnerData = FranchisorTradePartner::query()->where('franchisor_id', $franDetails->franchisor_id)->get();

        if (request()->segment(2) == 'brands')
            $view = "brandlanding-amp-eng";

        $seoTitle = sprintf('%s Franchise Opportunity - Franchise India', $franDetails->company_name);
        $seoDesc = sprintf('Own your %1$s franchise. Get the %1$s franchising information including start-up costs, franchise fees, requirements, growth history and more. Join %1$s franchise and be on your way to owning and running a successful franchise business.', $franDetails->company_name);
        $seoKeywords = sprintf('%1$s franchise, %1$s franchise opportunities, %1$s business opportunities, %1$s franchising, %1$s franchise cost, %1$s franchise fee', $franDetails->company_name);


        // return the data to blade view
        return view('franchisor/landing/' . $view, compact('seoTitle', 'seoDesc', 'seoKeywords', 'franDetails', 'region', 'stateList', 'franTradePartnerData'));
    }

    /**
     * @param $count
     * @param $franDetails
     * @param $is_hindi
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function getContentForBrandLanding($count, $franDetails, $is_hindi)
    {

        $articles = ContentList::query()->where('contentType', 'Article')
            ->where('status', 1);

        if ($is_hindi == 1)
            $articles = $articles->where('is_hindi', 1)->where('site_type', '!=', "ga");

        if ($franDetails->ind_main_cat == 1 || $franDetails->ind_main_cat == 11)
            $articles = $articles->where('site_type', "wi");

        if ($franDetails->ind_main_cat == 3)
            $articles = $articles->where('site_type', "edu");

        if ($franDetails->ind_main_cat == 2)
            $articles = $articles->where('site_type', "ri");

        $articles = $articles->orderBy('content_id', 'DESC')
            ->take($count)
            ->get();

        return CommonController::contentUrlSlug($articles);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function likes(Request $request)
    // {
    //     // Fetch the variables
    //     $franchisorId = $request->fid;
    //     $likesFranData = FranchisorLike::query()->select('blike')->where('franchisor_id', $franchisorId)->first();

    //     // If the record count is 0, create new entry by franchisor_id
    //     if ($likesFranData == null || $likesFranData->count() == 0) {
    //         $likesFranData = 0;
    //         FranchisorLike::query()->insert(['franchisor_id' => $franchisorId, 'blike' => 1]);
    //     } else {
    //         $likesFranData = $likesFranData->blike;
    //     }

    //     if (!empty(Cookie::get('franLike' . $franchisorId)))
    //         return response()->json(array('newCount' => $likesFranData), 200);


    //     // Update the like by increment 1
    //     $updatedLikeCount = ++$likesFranData;
    //     FranchisorLike::query()->where('franchisor_id', $franchisorId)->increment('blike');

    //     Cookie::queue("franLike" . $franchisorId, 1, 43800);

    //     return response()->json(array('newCount' => $updatedLikeCount), 200);
    // }
    public function likes(Request $request)
    {
        // Fetch the franchisor ID from the request
        $franchisorId = $request->fid;

        // Retrieve the existing like data for the given franchisor ID
        $likeRecord = FranchisorLike::query()
            ->where('franchisor_id', $franchisorId)
            ->first();
        // Check if the like record exists

        if ($likeRecord) {
            // If the user has already liked this franchisor, check the cookie
            if (!empty(Cookie::get('franLike' . $franchisorId))) {
                return response()->json(['newCount' => $likeRecord->blike], 200);
            }

            // Increment the like count
            $likeRecord->blike++;
            $likeRecord->save();
        } else {
            // If no record exists, create a new entry with an initial like count of 1
            FranchisorLike::create([
                'franchisor_id' => $franchisorId,
                'blike' => 1
            ]);
        }

        // Set a cookie to prevent the user from liking the same franchisor again
        Cookie::queue("franLike" . $franchisorId, 1, 43800);

        return response()->json(['newCount' => $likeRecord->blike ?? 1], 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function ratings(Request $request)
    // {
    //     // Initialize the variables
    //     $click = 0;
    //     $ratings = 0;
    //     $averageRating = 0;

    //     // Fetch the variables
    //     $franchisorId = $request->fid;
    //     $rate = $request->rateValue;

    //     // Query the database
    //     $LikeRateData = FranchisorLike::query()->where('franchisor_id', $franchisorId)->first();
    //     $LikeRateDatacount = FranchisorLike::query()->where('franchisor_id', $franchisorId)->count();

    //     // If record count is 0, create new record
    //     if ($LikeRateData == null)
    //         FranchisorLike::query()->insert(['franchisor_id' => $franchisorId]);

    //     if ($LikeRateDatacount == 1) {
    //         $click = $LikeRateData->bclick;
    //         $ratings = $LikeRateData->brate;
    //     }

    //     // dd($ratings,$click);
    //     if (!empty(Cookie::get('franRate' . $franchisorId)))
    //         $averageRating = ($click > 0) ? round($ratings / $click, 1) : 0;
    //     return response()->json(['ratings' => $averageRating], 200);

    //     // Increment the click by 1
    //     $updatedClick = $click + 1;

    //     // Add the ratings val to the existing value
    //     $newRatings = $ratings + $rate;
    //     $updatedRatings = round($newRatings / $updatedClick, 1);
    //     FranchisorLike::query()->where('franchisor_id', $franchisorId)
    //         ->update([
    //             'brate' => $newRatings,
    //             'bclick' => $updatedClick
    //         ]);

    //     Cookie::queue("franRate" . $franchisorId, 1, 43800);

    //     return response()->json(array('ratings' => $updatedRatings), 200);
    // }
    public function ratings(Request $request)
    {
        // Initialize variables
        $franchisorId = $request->fid;
        $rate = $request->rateValue;
        //dd($franchisorId,$rate);
        // Ensure rate is between 1 and 5
        if ($rate < 1) {
            $rate = 1;
        } elseif ($rate > 5) {
            $rate = 5;
        }

        $averageRating = 0;

        // Query the database for the existing record
        $LikeRateData = FranchisorLike::query()->where('franchisor_id', $franchisorId)->first();

        if ($LikeRateData) {
            // Check if brate or bclick are null or 0, then set to 1
            $currentClick = $LikeRateData->bclick ?? 0;
            $currentRatings = $LikeRateData->brate ?? 0;

            $updatedClick = $currentClick + 1;
            $newRatings = $currentRatings + $rate;
            $averageRating = round($newRatings / $updatedClick, 1);
            // dd($updatedClick,$newRatings);
            $rates = FranchisorLike::query()->where('franchisor_id', $franchisorId)
                ->update([
                    'brate' => $newRatings,
                    'bclick' => $updatedClick
                ]);
            //dd($rates,'helo');
        } else {
            // Insert new record
            FranchisorLike::query()->insert([
                'franchisor_id' => $franchisorId,
                'brate' => $rate,
                'bclick' => 1
            ]);
            $averageRating = round($rate, 1);
        }

        // Set a cookie to track the rating for this franchisor
        Cookie::queue("franRate" . $franchisorId, 1, 43800);

        // Return the average rating as JSON response
        return response()->json(['ratings' => $averageRating], 200);
    }



    /**
     * @param $count
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function getRandomBrands($count)
    {
        return FranchisorBusinessDetail::query()->where('membership_type', 1)
            ->where('profile_status', 1)
            ->orderByRaw("RAND()")
            ->take($count)
            ->get();
    }

    /**
     * @param $relatedArr
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getArticleInnerBrands($relatedArr)
    {
        $brands = FranchisorBusinessDetail::query()->whereIn('franchisor_id', $relatedArr)
            ->where('profile_status', 1)
            ->where('membership_type', 1)
            ->get();
        if (!empty($brands))
            $brands = $brands->toArray();

        return $brands;
    }

    /**
     * @param $franDetails
     * @return string
     */
    public function investorDataSet($franDetails)
    {
        // If Investor is logged in
        if (Auth::check()) {

            // Insert into user_viewbrand table
            UserViewBrand::query()->create([
                'email' => Auth::user()->email,
                'investor_id' => Auth::user()->profile_str,
                'franchisor_id' => $franDetails->franchisor_id,
                'expressInt' => 'Y'
            ]);

            // Check whether logged in user already expressed interest
            $data = $franDetails->userActivity;

            if (!empty($data))
                $data = $data->where('investor_id', Auth::user()->profile_str)
                    ->where('franchisor_id', $franDetails->franchisor_id)
                    ->orderBy('clickID', 'DESC')->first();

            return $data;
        }

        return "";
    }

    /**
     * @param $count
     * @param $cat
     * @return mixed
     */
    private function getRelatedBrands($count, $cat)
    {
        $brands = FranchisorBusinessDetail::query()
            ->where('membership_type', 1)
            ->where('profile_status', 1)
            ->where('ind_sub_cat', $cat->ind_sub_cat)
            ->inRandomOrder()
            ->take($count)
            ->get()
            ->toArray();

        if (count($brands) < $count) {
            $brands1 = FranchisorBusinessDetail::query()
                ->where('membership_type', 1)
                ->where('profile_status', 1)
                ->where('ind_cat', $cat->ind_cat)
                ->whereNotIn('franchisor_id', array_column($brands, 'franchisor_id'))
                ->inRandomOrder()
                ->take($count - count($brands))
                ->get()
                ->toArray();
            if (count($brands1) > 0)
                $brands = array_merge($brands1, $brands);
        }

        if (count($brands) < $count) {
            $brands2 = FranchisorBusinessDetail::query()->where('membership_type', 1)
                ->where('profile_status', 1)
                ->where('ind_main_cat', $cat->ind_main_cat)
                ->whereNotIn('franchisor_id', array_column($brands, 'franchisor_id'))
                ->inRandomOrder()
                ->take($count - count($brands))
                ->get()
                ->toArray();
            if (count($brands2) > 0)
                $brands = array_merge($brands2, $brands);
        }

        if (count($brands) < $count) {

            $brands3 = FranchisorBusinessDetail::query()
                ->where('membership_type', 1)
                ->where('profile_status', 1)
                ->whereNotIn('franchisor_id', array_column($brands, 'franchisor_id'))
                ->inRandomOrder()
                ->take($count - count($brands))
                ->get()
                ->toArray();
            if (count($brands3) > 0)
                $brands = array_merge($brands3, $brands);
        }

        return $brands;
    }
}
