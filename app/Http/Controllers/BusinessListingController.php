<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryFinal;
use App\Models\CategoryFinalHindi;
use App\Models\FranchisorLike;
use App\Models\FranchisorLocState;
use App\Models\MappingCategory;
use App\Models\FranchisorSliderImage;
use App\Models\FranchisorSliderTenure;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Support\Facades\Log;


class BusinessListingController extends Controller
{
    public function getSubCatUrl()
    {
        $sscId = 48;
        $catName = CategoryController::getSEOSubSubCategory($sscId);
        return Config('constants.MainDomain') . '/business-opportunities/' . $catName . '.ssc' . $sscId;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchBusiness(Request $request)
    {
        $search = $request['query'];
        $data = FranchisorBusinessDetail::query()
            ->select("company_name")
            ->where('company_name', 'LIKE', "%$search%")
            ->orderby('membership_type', 'DESC')
            ->whereIn('profile_status', [1,11])
            ->take(100)
            ->get()->pluck('company_name');
        return response()->json($data);
    }

    public function listingLocation()
    {
        // Initialize the variables
        $seoTitle = '';
        $seoDesc = '';
        $seoKeywords = '';
        $mainCatId = request()->mc;
        $subCatId = request()->sc;
        $catId = 0;
        $catType = request()->ftype;
        $breadCrumb = '';
        $locArrKey = array();
        $thirdCatId = request()->ssc;
        $thirdCatIdArr = array();
        $searchq = '';
        $text = "";
        $catTabResult = 0;
        $locTabResult = 0;
        $invTabResult = 0;
        $minCost = 0;
        $maxCost = 0;
        $minRangeValue = 0;
        $maxRangevalue = 100000000;
        $loc = request()->city;
        $orderby = request()->sortby;
        $fTypeName = '';
        $locName = 'India';
        $businessOpp = 'Business Opportunities';
        $in = 'in';
        $catName = 'Business Opportunities in ' . ucwords(str_replace('-', ' ', request()->city));
        if ((request()->segment(1) == 'hi')) {
            $businessOpp = 'व्यवसाय के अवसर';
            $in = 'इन';
            $locName = 'इंडिया';
        }

        // Fetch Brand Data
        $franData = FranchisorBusinessDetail::query()->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name', 'state', 'ind_sub_cat', 'operations_start_year', 'looking_tradepartner', 'looking_franchise', 'membership_weightage', 'franchise_start_year', 'no_fran_outlets', 'franchise_partner_type', 'city', 'unit_investment', 'expansion_loc_type', 'business_desc', 'membership_plan', 'prop_area_min', 'prop_area_max', 'profile_status', 'business_desc', 'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'membership_type', 'company_logo', 'unit_inv_min', 'unit_inv_max', 'is_hindi', 'business_desc_hindi', 'free_logo_visibility','brand_verified', 'views','activated_at');

        $franData->whereIn('profile_status',[1,11]);

        $city = "";
        if (!empty(request()->city)) {
            $city = ucwords(str_replace('-', ' ', request()->city));

            $stateNames = config('location.StateCity.' . $city);
            $cityArr = FranchisorLocState::query()->distinct('franchisor_id')
                ->where('city', $city)
                ->get()
                ->pluck('franchisor_id')
                ->toArray();
            if (count($cityArr) == 0) {
                $cityArr = FranchisorLocState::query()->distinct('franchisor_id')
                    ->where('state', $stateNames)
                    ->limit(50)
                    ->get()
                    ->pluck('franchisor_id')
                    ->toArray();
            }
            $franData->whereIn('franchisor_id', $cityArr)->get();
        }
        $orderbyVal = 'membership_weightage';
        $franData->orderBy($orderbyVal, 'desc');

        if ($orderby == 1) {
            $orderbyVal = 'fran_detail_id';
            $franData->orderBy($orderbyVal, 'desc');
        } elseif ($orderby == 2) {
            $orderbyVal = 'company_name';
            $franData->orderBy($orderbyVal, 'asc');
        } elseif ($orderby == 3) {
            $orderbyVal = 'views';
            $franData->orderBy($orderbyVal, 'desc');
        }

        $count           = request()->segment(1) == 'amp' ? 20 : 21;
        $brandResults    = $franData->paginate($count);
        $currentPage = $brandResults->currentPage();
        $lastPage = $brandResults->lastPage();
    
        // If the current page is greater than the last page, redirect to the Category/Subcategory/Subsubcategory page
        if ($currentPage > $lastPage) {
            // Get the current URL without query parameters
            $parentUrl = url()->current();
            return redirect($parentUrl);
        }
        $shuffledResults = $brandResults->shuffle()->sortByDesc('membership_weightage');
        $mc    = $mainCatId;
        $sc    = $subCatId;
        $ssc   = request()->ssc;
        $ftype = request()->ftype;

        if (!empty(request()->state_code))
            $catName     = (request()->segment(1) == 'hi') ?  Config('location.hindiStatesArr.' . Config('location.stateArr.' . $locArrKey[0])) : Config('location.stateArr.' . $locArrKey[0]);

        $franImageData   = [];
        if (!empty($brandResults)) {
            $paidFranchisors = collect($brandResults->toArray()['data']);
            $imageFranchisor = $paidFranchisors->where('membership_type', 1)->pluck('franchisor_id');
            $sliderCheck     = FranchisorSliderTenure::query()
                ->select('franchisor_id')
                ->where('status', 1)
                ->where('end_date', '>=', date('Y-m-d H:i:s'))
                ->get()->pluck('franchisor_id');
            $franImageData = FranchisorSliderImage::query()
                ->select('franchisor_id', 'image_type_slider2', DB::raw('COUNT(franchisor_id) as count'))
                ->where('image_type_slider2', '!=', '')
                ->whereIn('franchisor_id', $imageFranchisor)
                ->whereIn('franchisor_id', $sliderCheck)
                ->where('status', 1)
                ->groupBy('franchisor_id', 'image_type_slider2') // Include image_type_slider2 in GROUP BY
                ->havingRaw('count > 3')
                ->get();
        }

        $view = 'location.category';
        if (request()->segment(1) == 'amp')
            $view = 'category.hindi-category.amp-category';

        if (request()->segment(1) == 'hi')
            //dd($shuffledResults);
            $view = 'location.hindi-category.hindi-category';

        $currentDate = Carbon::now()->format('Y');
        $seoTitle = $brandResults->total() . '+ Business Opportunities in ' . $city . ' for ' . $currentDate . ' (High Profit Making)';
        $seoDesc = $brandResults->total() . '+ Profitable Business Opportunities in ' . $city . '. Explore Franchise Opportunities in ' . $city . ' & Start your own business in ' . $city . ' with FranchiseIndia today!';
        $seoKeywords   = 'Best Business in ' . $city . ', Business Opportunities in  ' . $city . ', New Business Opportunities in  ' . $city . ', Small Business Opportunities in ' . $city . ', Franchise Opportunities in ' . $city . ',  Profitable Business Ideas in ' . $city;
        return view($view, compact(
            'brandResults',
            'shuffledResults',
            'breadCrumb',
            'catName',
            'mc',
            'sc',
            'ssc',
            'ftype',
            'seoTitle',
            'seoDesc',
            'loc',
            'seoKeywords',
            'orderby',
            'minRangeValue',
            'maxRangevalue',
            'text',
            'searchq',
            'catTabResult',
            'locTabResult',
            'invTabResult',
            'minCost',
            'maxCost',
            'franImageData',
            'city'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchBusinessListing(Request $request)
    {
        // dd('searchBusinessListing');
        $searchTerm = $request->route('searchTerm');
        $categoryIds = $request->route('categoryIds');
        $locationIds = $request->route('locationIds');

        // Use dd() to inspect the parameters
        // dd($searchTerm, $categoryIds, $locationIds);
        // dd($request->getRequestUri());
        $requestUri = $request->getRequestUri();
        $segments = explode('/', $requestUri);
        // dd($segments[3]);
        // Check if the segments array has at least 4 elements
        $segment = isset($segments[3]) ? $segments[3] : null;



        if (!empty(request()->franchiseType)) {

            $this->setSearchParams(request()->franchiseType);
        }

        if (!empty(request()->categoryIds)) {

            $this->setSearchParams(request()->categoryIds);
        }
        if (!empty(request()->locationIds)) {
            // dd('hello');
            $this->setSearchParams(request()->locationIds);
        }
        if (!empty(request()->range)) {
            // dd('hello1');
            $this->setSearchParams(request()->range);
        }


        // Initialize the variables

        $seoTitle = '';
        $seoDesc = '';
        // Set SEO title and description based on the segment
        if ($segment) {
            if ($segment == "range-10000-100000") {
                $seoTitle = 'Top Franchises Under 1 Lakh in India: Affordable Business Opportunities 2024';
                $seoDesc = 'Discover the top franchises available under 1 lakh in India for 2024. Invest in affordable, high-return business opportunities ideal for first-time entrepreneurs. Begin your successful business journey today!';
            } elseif ($segment == "range-10000-200000") {
                $seoTitle = 'Top Franchises Under 2 Lakhs in India: Affordable Investments 2024';
                $seoDesc = 'Explore high-potential franchises available under 2 lakhs in India for 2024. Seize low-cost, profitable business opportunities perfect for emerging entrepreneurs. Start your entrepreneurial journey now!';
            } elseif ($segment == "range-10000-300000") {
                $seoTitle = 'Best Franchises Under 3 Lakhs in India: Start Your Business in 2024';
                $seoDesc = 'Discover leading franchises under 3 lakhs in India for 2024. Invest in cost-effective, scalable business opportunities suitable for aspiring entrepreneurs. Launch your successful venture today!';
            } elseif ($segment == "range-10000-500000") {
                $seoTitle = 'Top Franchises Under 5 Lakhs in India: High ROI Business Opportunities 2024';
                $seoDesc = 'Explore the best franchises available under 5 lakhs in India for 2024. Discover affordable, high-return business ventures perfect for budding entrepreneurs. Start your profitable journey today!';
            } elseif ($segment == "range-10000-1000000") {
                $seoTitle = 'Best Franchises Under 10 Lakhs in India: Lucrative Opportunities 2024';
                $seoDesc = 'Uncover top franchises available under 10 lakhs in India for 2024. Choose from profitable, low-cost business opportunities ideal for new entrepreneurs. Begin your successful journey now!';
            } elseif ($segment == "range-10000-1500000") {
                $seoTitle = 'Top Franchises Under 15 Lakhs in India: Affordable Business Ventures 2024';
                $seoDesc = 'Explore affordable franchises under 15 lakhs in India for 2024. Seize low-investment, high-return business opportunities perfect for first-time entrepreneurs. Start building your business empire today!';
            } elseif ($segment == "range-10000-2000000") {
                $seoTitle = 'Best Franchises Under 20 Lakhs in India: Smart Business Choices 2024';
                $seoDesc = 'Explore leading franchises under 20 lakhs in India for 2024. Choose from cost-effective, high-return business opportunities perfect for savvy entrepreneurs looking to make a mark. Start your profitable venture today!';
            } elseif ($segment == "range-10000-2500000") {
                $seoTitle = 'Top Franchises Under 25 Lakh in India: Affordable Business Opportunities 2024';
                $seoDesc = 'Discover leading franchises under 25 lakhs in India for 2024. Invest in cost-effective, high-potential business opportunities suitable for savvy entrepreneurs. Launch your profitable venture today!';
            } elseif ($segment == "range-10000-3000000") {
                $seoTitle = 'Top Franchises Under 30 Lakhs in India: Ideal Investments 2024';
                $seoDesc = 'Explore the most promising franchises under 30 lakhs in India for 2024. Find affordable, scalable business opportunities perfect for emerging entrepreneurs. Kickstart your entrepreneurial success now!';
            } elseif ($segment == "range-10000-5000000") {
                $seoTitle = 'Best Franchises Under 50 Lakhs in India: Profitable Investments 2024';
                $seoDesc = 'Discover top franchises available under 50 lakhs in India for 2024. Secure profitable and sustainable business opportunities ideal for growth-focused entrepreneurs. Start your journey to success today!';
            } elseif ($segment == "range-10000-10000000") {
                $seoTitle = 'Top Franchises Under 1 Crore in India: Lucrative Business Opportunities 2024';
                $seoDesc = 'Uncover leading franchises under 1 crore in India for 2024. Invest in high-return business opportunities suited for ambitious entrepreneurs. Begin your profitable venture now!';
            }
        }


        $seoKeywords = '';
        $mainCatId = request()->mc;

        $subCatId = request()->sc;

        $catId = 0;
        $catType = request()->ftype;
        // dd($catType);
        $breadCrumb = '';
        $locArrKey = array();
        $thirdCatId = request()->ssc;
        $thirdCatIdArr = array();
        $searchq = '';
        $text = "";
        $catTabResult = 0;
        $locTabResult = 0;
        $invTabResult = 0;
        $minCost = 0;
        $maxCost = 0;
        $loc = '';

        if (!empty(request()->catTab))
            $catTabResult = 1;

        if (!empty(request()->locTab))
            $locTabResult = 1;


        if (!empty(request()->invTab))
            $invTabResult = 1;

        if (!empty($mainCatId) && empty($subCatId) && empty($thirdCatId)) {
            $catId = $mainCatId;
            $catType = 'mc';
            $catName = (request()->segment(1) == 'hi') ? Config('hindiConstants.CategoryArr.' . $catId) : Config('constants.CategoryArr.' . $catId);
        }

        if (!empty($subCatId) && empty($thirdCatId)) {
            $catId = $subCatId;
            $catType = 'sc';
            $catName = (request()->segment(1) == 'hi') ? Config('hindiConstants.subCategoryArr.' . $mainCatId . '.' . $subCatId) : Config('constants.subCategoryArr.' . $mainCatId . '.' . $subCatId);
        }

        if (!empty($thirdCatId)) {
            $catId = $thirdCatId;
            $catType = 'ssc';
            $catName = (request()->segment(1) == 'hi') ? Config('hindiConstants.subCategoryArr.' . $mainCatId . '.' . $subCatId) : Config('constants.subCategoryArr.' . $mainCatId . '.' . $subCatId);
        }


        if (request()->segment(2) == 'all' && request()->segment(3) == 'all') {
            $seoTitle = 'Business Opportunities - Franchise India';
            $seoDesc = 'Find 13000+ business opportunities';
            $seoKeywords = 'Business opportunities';

            if ((request()->segment(1) == 'hi')) {
                $seoTitle = 'व्यवसाय के अवसर - फ्रेंचाइजी इंडिया';
                $seoDesc = '13000+ व्यावसायिक अवसर खोजें';
                $seoKeywords = 'व्यवसाय के अवसर';
            }
        }



        $fTypeName = '';
        $locName = 'India';
        $businessOpp = 'Business Opportunities';
        $in = 'in';

        if ((request()->segment(1) == 'hi')) {
            $businessOpp = 'व्यवसाय के अवसर';
            $in = 'इन';
            $locName = 'इंडिया';
        }
        if (!empty(request()->loc) && count(request()->loc) == 1) {
            $locName = Config('location.stateArr.' . request()->loc[0]);
            if ((request()->segment(1) == 'hi')) {
                $locName = Config('location.hindiStatesArr.' . $locName);
            }
        }

        if (!empty(request()->ftype)) {
            $fTypeName = Config('constants.masterfranchiseType')[request()->ftype];

            if ((request()->segment(1) == 'hi'))
                $fTypeName = Config('hindiConstants.masterfranchiseType')[request()->ftype];

            $seoTitle = "$businessOpp $fTypeName  - Franchise India";
            if (!empty(request()->loc) && count(request()->loc) == 1) {
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";

                if (request()->segment(1) == 'hi')
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
            } else if (!empty(request()->loc) && count(request()->loc) > 1) {
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";

                if (request()->segment(1) == 'hi')
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
            }
        }

        if (!empty($catId)) {
            $seoClass = (request()->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
            $catArr = $seoClass->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')
                ->where('catid', $catId)
                ->first();
            if (!empty(request()->loc) && count(request()->loc) == 1 && !empty($fTypeName) && !empty($catArr)) {
                $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities '. $fTypeName .', business opportunities, business ideas. Buy $catArr->catname Franchise in $locName with affordable range.";

                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है '. $fTypeName .', व्यापार के अवसर, व्यापार के विचार। सस्ती सीमा के साथ $locName में $catArr->catname फ्रेंचाइज़ खरीदें।";
                }
            } else if (!empty(request()->loc) && count(request()->loc) > 1 && !empty($fTypeName)) {
                $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities '. $fTypeName .', business opportunities, business ideas,best business in India and buy $catArr->catname Franchise in India with affordable range.";

                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है '. $fTypeName .', व्यापार के अवसर, व्यापार के विचार, भारत में सबसे अच्छा व्यवसाय और सस्ती सीमा के साथ भारत में $catArr->catname फ्रैंचाइज़ खरीदें।";
                }
            } else if (!empty(request()->loc) && count(request()->loc) == 1 && !empty($catArr)) {

                $seoTitle = "$catArr->catname $businessOpp $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities, business opportunities, business ideas. Buy $catArr->catname Franchise in $locName with affordable range.";

                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है ,व्यापार के अवसर, व्यापार के विचार। सस्ती सीमा के साथ $locName में $catArr->catname फ्रेंचाइज़ खरीदें।";
                }
            } else if (!empty(request()->loc) && count(request()->loc) > 1 && !empty($catArr)) {
                $seoTitle = "$catArr->catname $businessOpp $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities, business opportunities, business ideas,best business in India and buy $catArr->catname Franchise in India with affordable range.";

                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है , व्यापार के अवसर, व्यापार के विचार, भारत में सबसे अच्छा व्यवसाय और सस्ती सीमा के साथ भारत में $catArr->catname फ्रैंचाइज़ खरीदें।";
                }
            } else if (!empty($fTypeName) && !empty($catArr)) {
                $seoTitle = "$catArr->catname $businessOpp $fTypeName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities  '. $fTypeName .', business opportunities, business ideas,best business in India and buy $catArr->catname Franchise in India with affordable range.";
                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $fTypeName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है '. $fTypeName .', व्यापार के अवसर, व्यापार के विचार, भारत में सबसे अच्छा व्यवसाय और सस्ती सीमा के साथ भारत में $catArr->catname फ्रैंचाइज़ खरीदें। ";
                }
            } else {
                if (isset($catArr->seoTitle)) {
                    if (!empty($catArr->seoTitle)) {
                        $seoTitle = $catArr->seoTitle;
                    } else {
                        $seoTitle = $catArr->catname . ' - Franchise India';
                    }
                }
            }

            if (isset($catArr->seoTitle)) {
                if (!empty($catArr->description))
                    $seoDesc = $catArr->description;
                if (!empty($catArr->keywords))
                    $seoKeywords = $catArr->keywords;
            }
        }



        if (request()->price_range == "under-50k") {
            $minRangeValue = 10000;
            $maxRangevalue = 50000;
            $seoTitle = 'Business Opportunities Under Rs-10000-to-50000 - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-10000-to-50000';
            $seoDesc = 'Find business opportunities Under Rs-10000-to-50000';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 करोड़ से 5 करोड़ के बीच व्यापार के अवसर';
                $seoDesc     = '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-2lac" || request()->price_range == "under-2Lac") {
            $minRangeValue = 50000;
            $maxRangevalue = 200000;
            $seoTitle = 'Business Opportunities Under Rs 50000 to 2 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 50000 to 2 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 50000 to 2 lakh';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '50 हज़ार से 2 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 50 हज़ार से 2 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '50 हज़ार से 2 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-5lac" || request()->price_range == "under-5Lac") {
            $minRangeValue = 200000;
            $maxRangevalue = 500000;
            $seoTitle = 'Business Opportunities Under Rs 2 lakhs to 5 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 2 lakhs to 5 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 2 lakhs to 5 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '2 लाख से 5 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 लाख से 5 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '2 लाख से 5 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-10lac" || request()->price_range == "under-10Lac") {
            $minRangeValue = 500000;
            $maxRangevalue = 1000000;
            $seoTitle = 'Business Opportunities Under Rs 5 lakhs to 10 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 5 lakhs to 10 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 5 lakhs to 10 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '5 लाख से 10 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 5 लाख से 10 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '5 लाख से 10 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-20lac" || request()->price_range == "under-20Lac") {
            $minRangeValue = 1000000;
            $maxRangevalue = 2000000;
            $seoTitle = 'Business Opportunities Under Rs 10 lakhs to 20 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 10 lakhs to 20 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 10 lakhs to 20 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '10 लाख से 20 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 10 लाख से 20 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '10 लाख से 20 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-30lac" || request()->price_range == "under-30Lac") {
            $minRangeValue = 2000000;
            $maxRangevalue = 3000000;
            $seoTitle = 'Business Opportunities Under Rs 20 lakhs to 30 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 20 lakhs to 30 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 20 lakhs to 30 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '20 लाख से 30 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 20 लाख से 30 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '20 लाख से 30 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-50lac" || request()->price_range == "under-50Lac") {
            $minRangeValue = 3000000;
            $maxRangevalue = 5000000;
            $seoTitle = 'Business Opportunities Under Rs 30 lakhs to 50 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under 30 lakhs to 50 lakhs';
            $seoDesc = 'Find business opportunities Under 30 lakhs to 50 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '30 लाख से 50 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 30 लाख से 50 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '30 लाख से 50 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-1cr") {
            $minRangeValue = 5000000;
            $maxRangevalue = 10000000;
            $seoTitle = 'Business Opportunities Under Rs 50 lakhs to 1 cr - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 50 lakhs to 1 cr';
            $seoDesc = 'Find business opportunities Under Rs 50 lakhs to 1 cr';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '50 लाख से 1 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 लाख से 1 करोड़ के बीच व्यापार के अवसर';
                $seoDesc     = '50 लाख से 1 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-2cr") {
            $minRangeValue = 10000000;
            $maxRangevalue = 20000000;
            $seoTitle = 'Business Opportunities Under Rs 1 cr to 2 cr - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 1 cr to 2 cr';
            $seoDesc = 'Find business opportunities Under Rs 1 cr to 2 cr';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '1 करोड़ से 2 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 1 करोड़ से 2 करोड़ के बीच व्यापार के अवसर';
                $seoDesc     = '1 करोड़ से 2 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-5cr") {
            $minRangeValue = 20000000;
            $maxRangevalue = 50000000;
            $seoTitle = 'Business Opportunities Under Rs 2 cr to 5 cr - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 2 cr to 5 cr';
            $seoDesc = 'Find business opportunities Under Rs 2 cr to 5 cr';

            if (request()->segment(1) == 'hi') {
                $seoTitle    = '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 करोड़ से 5 करोड़ के बीच व्यापार के अवसर';
                $seoDesc     = '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "5cr-or-above") {
            $minRangeValue = 50000000;
            $maxRangevalue = 100000000;
            $seoTitle = 'Business Opportunities Under franchises 5 cr or above - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under franchises 5 cr or above';
            $seoDesc = 'Find business opportunities Under franchises 5 cr or above';

            if (request()->segment(1) == 'hi') {
                $seoTitle    = 'फ्रैंचाइजी के बीच व्यवसाय के अवसर- 5 करोड़ से ऊपर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, फ्रेंचाइजी के बीच व्यापार के अवसर - 5 करोड़ - या - ऊपर';
                $seoDesc     = 'फ्रैंचाइजी-5 करोड़ या उससे अधिक के बीच व्यवसाय के अवसर खोजें';
            }
        } else {
            $minRangeValue = 0;
            $maxRangevalue = 100000000;
        }

        if (!empty(request()->minrange))
            $minRangeValue = request()->minrange;

        if (!empty(request()->maxrange))
            $maxRangevalue = request()->maxrange;

        if (!empty(request()->min_cost)) {
            $minRangeValue = Config('constants.InvestRange.' . request()->min_cost . '.min');
            $minCost = request()->min_cost;
        }

        if (!empty(request()->max_cost)) {
            $maxRangevalue = Config('constants.InvestRange.' . request()->max_cost . '.min');
            $maxCost = request()->max_cost;
        }

        if ($minRangeValue > $maxRangevalue) {
            $maxRangevalue = '100000000';
            $minRangeValue = '10000';
        }

        $orderby = request()->sortby;

        // Fetch the request parameters
        if (!empty(request()->state_code)) {
            $currentDate = Carbon::now()->format('Y');

            $locId       = preg_split('#(?<=[a-z])(?=\d)#i', request()->state_code);
            $locArrKey   = explode(',', $locId[1]);
            // $seoTitle    = 'Business Opportunities in ' . Config('location.stateArr.' . $locArrKey[0]) . ' -  Franchise India';
            $seoTitle    = 'Business Opportunities in ' . Config('location.stateArr.' . $locArrKey[0]) . ' for ' .  $currentDate . ' (High Profit Making)';

            // $seoKeywords = 'business opportunities, business opportunities in ' . Config('location.stateArr.' . $locArrKey[0]);
            $seoKeywords = 'Best Business in ' . Config('location.stateArr.' . $locArrKey[0]) . ' , Business Opportunities in ' .  Config('location.stateArr.' . $locArrKey[0]) . ', New Business Opportunities in  ' .  Config('location.stateArr.' . $locArrKey[0]) . ', Small Business Opportunities in ' .  Config('location.stateArr.' . $locArrKey[0]) . ' , Franchise Opportunities in ' . Config('location.stateArr.' . $locArrKey[0]) . ' ,  Profitable Business Ideas in ' . Config('location.stateArr.' . $locArrKey[0]);

            $seoDesc     = "Profitable Business Opportunities in " . Config('location.stateArr.' . $locArrKey[0]) . " Explore Franchise Opportunities in " . Config('location.stateArr.' . $locArrKey[0]) . " & Start your own business in " . Config('location.stateArr.' . $locArrKey[0]) . " with FranchiseIndia today!";

            $loc         = $locArrKey;

            if (request()->segment(1) == 'hi') {
                $seoTitle    = Config('location.hindiStatesArr')[Config('location.stateArr.' . $locArrKey[0])] . ' में व्यवसाय के अवसर - फ्रेंचाइजी भारत';
                $seoKeywords = Config('location.hindiStatesArr')[Config('location.stateArr.' . $locArrKey[0])] . ' में व्यापार के अवसर, व्यापार के अवसर ';
                $seoDesc     = Config('location.hindiStatesArr')[Config('location.stateArr.' . $locArrKey[0])] . ' में व्यवसाय के अवसरों का पता लगाएं';
            }
        }


        if (!empty(request()->loc)) {
            if (is_array(request()->loc)) {
                $locArrKey = implode(',', request()->loc);
            } else {
                $locArrKey = request()->loc;
            }
            $locArrKey = explode(',', $locArrKey);
            $loc = $locArrKey;
        }

        if (!empty(request()->ftype))
            $franType = request()->ftype;

        if (!empty(request()->ssc)) {
            if (is_array(request()->ssc)) {
                $sscStr = implode(',', request()->ssc);
            } else {
                $sscStr = request()->ssc;
            }
            $thirdCatIdArr = explode(',', $sscStr);
        }

        if (!empty(request()->mc))
            $mainCatId = request()->mc;

        if (!empty(request()->sc))
            $subCatId = request()->sc;

        if (empty($catId))
            // dd('hello');
            $catName = (request()->segment(1) == 'hi') ? 'बिज़नेस  ओप्पोर्तुनिटीज़' : 'Business Opportunities';


// dd('yes');

            DB::enableQueryLog();

        // Fetch Brand Data
        // $franData = FranchisorBusinessDetail::query()->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name', 'state', 'ind_sub_cat', 'operations_start_year', 'looking_tradepartner', 'looking_franchise', 'membership_weightage', 'franchise_start_year', 'no_fran_outlets', 'franchise_partner_type', 'city', 'unit_investment', 'expansion_loc_type', 'business_desc', 'membership_plan', 'prop_area_min', 'prop_area_max', 'profile_status', 'business_desc', 'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'membership_type', 'company_logo', 'unit_inv_min', 'unit_inv_max', 'is_hindi', 'business_desc_hindi', 'free_logo_visibility','brand_verified','views','activated_at')->whereIn('profile_status', [1,11])->take(50);

        $franData = FranchisorBusinessDetail::query()
    ->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name', 'state', 'ind_sub_cat', 
             'operations_start_year', 'looking_tradepartner', 'looking_franchise', 'membership_weightage', 
             'franchise_start_year', 'no_fran_outlets', 'franchise_partner_type', 'city', 'unit_investment', 
             'expansion_loc_type', 'business_desc', 'membership_plan', 'prop_area_min', 'prop_area_max', 
             'profile_status', 'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'membership_type', 'company_logo', 
             'unit_inv_min', 'unit_inv_max', 'is_hindi', 'business_desc_hindi', 'free_logo_visibility',
             'brand_verified', 'views', 'activated_at')
    ->where('profile_status', 1);
    // ->take(5)->get();
    // ->get();

    // dd($franData);


        DB::listen(function ($query) {
            // Log query, bindings and execution time
            Log::info('SQL Query: ' . $query->sql);
            Log::info('Bindings: ' . implode(', ', $query->bindings));
            Log::info('Execution Time: ' . $query->time . 'ms');
        });

        // $franData->whereIn('profile_status', [1,11]);

        // dd('passed');

        if (isset(request()->text)) {
            $text = str_replace('-or-', '/', request()->text);
            $type = 'm';
            $catId = CategoryFinal::query()->select('catid', 'catname', 'parent_id')->where('catname', request()->text)->first();

            if (!empty($catId)) {
                if (!empty($catId->parent_id)) {
                    $subCatCheck = CategoryFinal::query()->select('parent_id')->where('catid', $catId->parent_id)->first();
                    if (!empty($subCatCheck) && empty($subCatCheck->parent_id))
                        $type = 'sc';
                    else
                        $type = 'ssc';
                }
                $url =  'business-opportunities/' . Str::slug($catId->catname) . '.' . $type . $catId->catid;
                //dd($url);
                return redirect($url);
            }

            $franData->Where('company_name', 'like', '%' . request()->text . '%');
        }



        if (isset(request()->searchq)) {
            $searchq = request()->searchq;
            $franData->where('company_name', 'LIKE', '%' . $searchq . '%');
        }

        if ($catType == 'ssc')
            $franData->whereIn('ind_sub_cat', $thirdCatIdArr);

        if ($catType == 'sc')
            $franData->where('ind_cat', $catId);
        if ($catType == 'mc')
            $franData->where('ind_main_cat', $catId);
        if (!empty($franType))
            $franData->where('franchise_partner_type',  $franType);

        if (count($locArrKey) > 0) {
            $stateNames = [];

            foreach ($locArrKey as $key => $val) {
                $stateNames[] = config('location.stateArr.' . $val);
            }
            $franData->where(function ($query) use ($stateNames) {
                $query->where('expansion_location', 'LIKE', '%' . $stateNames[0] . '%');

                for ($i = 1; $i < count($stateNames); $i++) {
                    $query->orWhere('expansion_location', 'LIKE', '%' . $stateNames[$i] . '%');
                }
            });
        }


        $city = "";

        if (!empty(request()->city)) {/*
            $city = request()->city;
            $cityArr = FranchisorLocState::query()->distinct('franchisor_id')
                ->where('city', request()->city)
                ->get()
                ->pluck('franchisor_id')
                ->toArray();

            $franData->whereIn('franchisor_id', $cityArr)->get();
        */
        }
        // dd(request()->lowcost);
        if (request()->lowcost == "lowcost") {
            $maxRangevalue = 500000;
            $minRangeValue = 0;
            $seoTitle      = 'Low Cost Business Opportunities - Franchise India';
            $seoKeywords   = 'low cost Franchise, low cost business opportunities';
            $seoDesc       = 'Start your business with low cost franchise business opportunities.';
            $catName       = "Low Cost Business Opportunities";

            if (request()->segment(1) == 'hi') {
                $seoTitle      = 'कम लागत के व्यवसाय के अवसर - फ्रेंचाइजी भारत';
                $seoKeywords   = 'कम लागत वाले फ्रेंचाइजी, कम लागत वाले व्यवसाय के अवसर';
                $seoDesc       = 'कम लागत वाली फ्रेंचाइज़ी के व्यावसायिक अवसरों के साथ अपना व्यवसाय शुरू करें।';
                $catName       = "कम लागत व्यापार अवसर";
            }
        }



        if (!empty(request()->investment) && is_numeric(request()->investment)) {
            $minRangeValue = Config('constants.InvestRange.' . request()->investment . '.min');

            $maxRangevalue = Config('constants.InvestRange.' . request()->investment . '.max');
        }

        $franData->where('unit_inv_max', '<=', $maxRangevalue);
        $franData->where('unit_inv_max', '>=', $minRangeValue);

        $orderbyVal = 'membership_weightage';
        // $franData->orderBy($orderbyVal, 'desc');

        if ($orderby == 1) {
            $orderbyVal = 'fran_detail_id';
            $franData->orderBy($orderbyVal, 'desc');
        } elseif ($orderby == 2) {
            $orderbyVal = 'company_name';
            $franData->orderBy($orderbyVal, 'asc');
        } elseif ($orderby == 3) {
            $orderbyVal = 'views';
            $franData->orderBy($orderbyVal, 'desc');
        }

        $count           = request()->segment(1) == 'amp' ? 20 : 21;
        $brandResults    = $franData->paginate($count);
        $currentPage = $brandResults->currentPage();
        $lastPage = $brandResults->lastPage();
    
        // If the current page is greater than the last page, redirect to the Category/Subcategory/Subsubcategory page
        if ($currentPage > $lastPage) {
            // Get the current URL without query parameters
            $parentUrl = url()->current();
            return redirect($parentUrl);
        }
        $shuffledResults = $brandResults->shuffle()->sortByDesc('membership_weightage');

        $mc    = $mainCatId;
        $sc    = $subCatId;
        $ssc   = request()->ssc;
        $ftype = request()->ftype;

        if (!empty(request()->state_code))
            $catName     = (request()->segment(1) == 'hi') ?  Config('location.hindiStatesArr.' . Config('location.stateArr.' . $locArrKey[0])) : Config('location.stateArr.' . $locArrKey[0]);

        $franImageData   = [];

        if (!empty($brandResults)) {

            $paidFranchisors = collect($brandResults->toArray()['data']);
            $imageFranchisor = $paidFranchisors->where('membership_type', 1)->pluck('franchisor_id');
            $sliderCheck     = FranchisorSliderTenure::query()
                ->select('franchisor_id')
                ->where('status', 1)
                ->where('end_date', '>=', date('Y-m-d H:i:s'))
                ->get()->pluck('franchisor_id');
            $franImageData   = FranchisorSliderImage::query()->select('franchisor_id', 'image_type_slider2', DB::raw('COUNT(franchisor_id) as count'))
                ->where('image_type_slider2', '!=', '')
                ->whereIn('franchisor_id', $imageFranchisor)
                ->whereIn('franchisor_id', $sliderCheck)
                ->where('status', 1)
                // ->groupBy('franchisor_id')
                ->groupBy('franchisor_id', 'image_type_slider2')
                ->havingRaw('count > 3')
                ->get();
        }

        $view = 'category.category';
        if (request()->segment(1) == 'amp')
            $view = 'category.hindi-category.amp-category';

        if (request()->segment(1) == 'hi')
            $view = 'category.hindi-category.hindi-category';
        // dd($brandResults,$shuffledResults,$breadCrumb,$catName);
        //  dd($mc,$sc,$ssc,$ftype,$seoTitle,$seoDesc);
        //  dd($loc,$seoKeywords,$orderby,$minRangeValue,$maxRangevalue,$text,$searchq);
        //  dd($catTabResult,$locTabResult,$invTabResult,$minCost,$maxCost,$franImageData,$city,$view);

        return view($view, compact(
            'brandResults',
            'shuffledResults',
            'breadCrumb',
            'catName',
            'mc',
            'sc',
            'ssc',
            'ftype',
            'seoTitle',
            'seoDesc',
            'loc',
            'seoKeywords',
            'orderby',
            'minRangeValue',
            'maxRangevalue',
            'text',
            'searchq',
            'catTabResult',
            'locTabResult',
            'invTabResult',
            'minCost',
            'maxCost',
            'franImageData',
            'city'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBusinessListing(Request $request)
    {
        // dd($request);
        // Fetch the request parameters
        $catParam      = request()->category_param;
        $mcat      = request()->catUrl;

        $breadCrumb    = '';
        $sortby        = '';
        $minRangeValue = '';
        $maxRangevalue = '';
        $text          = '';
        $seoDesc       = '';
        $seoKeywords   = '';
        $searchq       = '';
        $city          = '';

        if (isset(request()->mainCatmId))
            $catParam = request()->mainCatmId;

        // Initialize the variables
        $mainCatId  = 0;
        $subCatId   = 0;
        $thirdCatId = 0;
        $cid        = 0;

        if ($catParam)
            $cid = preg_split('#(?<=[a-z])(?=\d)#i', $catParam);

        if (count($cid) != 2)
            return redirect('pagenotfound');

        $seoClass = (request()->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
        $catArr   = $seoClass->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')
            ->where('catid', $cid[1])
            ->first();
        if ($catArr == null)
            return redirect('/business-opportunities/all/all', 301);

        $catName = $catArr->catname;

        //Category Redirection Start
        $catChk = array(5, 443, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 735, 736, 801, 802, 803, 444, 457, 458, 459, 460, 461, 462, 463, 476, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 495, 496, 959, 477, 497, 498, 499, 500, 501, 502, 503, 504, 822, 823, 824, 825, 826, 827, 828, 829, 830, 831, 832, 833, 834, 835, 836, 837, 838, 478, 505, 506, 507, 508, 509, 510, 511, 512, 513, 839, 840, 841, 842, 843, 844, 845, 479, 514, 515, 516, 517, 518, 519, 520, 521, 522, 523, 524, 525, 526, 527, 528, 529, 530, 531, 887, 888, 889, 890, 891, 892, 893, 894, 895, 738, 739, 740, 741, 742, 743, 744, 745, 746, 747, 748, 749, 750, 751, 752, 753, 754, 755, 756, 757, 758, 759, 760, 964, 965, 761, 762, 763, 764, 765, 766, 767, 768, 769, 961, 770, 771, 772, 773, 774, 775, 776, 777, 778, 779, 780, 781, 782, 783, 784, 785, 786, 787, 788, 789, 790, 791, 792, 793, 794, 795, 796, 797, 798, 799, 805, 806, 807, 808, 809, 810, 811, 812, 813, 814, 815, 816, 817, 818, 819, 820, 821, 469, 472, 473, 958, 846, 847, 848, 849, 850, 851, 852, 853, 854, 855, 856, 857, 858, 859, 464, 468, 860, 861, 862, 863, 864, 865, 866, 867, 960, 868, 869, 870, 871, 872, 873, 874, 875, 876, 877, 878, 879, 880, 881, 882, 883, 884, 885, 886, 896, 897, 898, 899, 900, 901, 902, 903, 904, 905, 906, 907, 908, 966, 909, 910, 911, 912, 913, 914, 915, 916, 917, 918, 919, 920, 921, 922, 923, 924, 967, 925, 926, 927, 928, 929, 930, 931, 932, 933, 934, 935, 936, 937, 938, 939, 940, 941, 942, 943, 944, 945, 946, 947, 948, 949, 963, 962, 950, 951, 952, 953, 954, 956, 955, 957, 969, 970, 971);

        // if (in_array($cid[1], $catChk)) {
        //     $oiCategory = MappingCategory::query()->where('fi_category_id', $cid[1])->first();
        //     //$oiCategory = MappingCategory::query()->where('fi_category', $catName)->first();			
        //     if (!empty($oiCategory)) {
        //         $ioRedirect = ($oiCategory->slug != '') ? Config('constants.OIDomain') . '/dir/' . $oiCategory->slug : Config('constants.OIDomain');
        //         return redirect($ioRedirect, 301);
        //     }
        // }
        //Category Redirection End

        $franData = FranchisorBusinessDetail::query()->select(
            'fran_detail_id',
            'franchisor_id',
            'profile_name',
            'company_name',
            'state',
            'ind_sub_cat',
            'operations_start_year',
            'looking_tradepartner',
            'looking_franchise',
            'membership_weightage',
            'franchise_start_year',
            'no_fran_outlets',
            'franchise_partner_type',
            'city',
            'unit_investment',
            'expansion_loc_type',
            'business_desc',
            'membership_plan',
            'prop_area_min',
            'prop_area_max',
            'profile_status',
            'business_desc',
            'ind_main_cat',
            'ind_cat',
            'ind_sub_cat',
            'membership_type',
            'company_logo',
            'unit_inv_min',
            'unit_inv_max',
            'is_hindi',
            'business_desc_hindi',
            'free_logo_visibility'
        )
            ->whereIn('profile_status',  [1,11]);


        if ($cid[0] == 'ssc') {
            //$franData->where('ind_sub_cat', $cid[1])->orderby('membership_type', 'desc');
            $franData->where('ind_sub_cat', $cid[1]);
            $thirdCatId = $cid[1];
            $subCatId   = $catArr->parent_id;

            $catData    = new CategoryController();
            $catDataArr = $catData->getSubCategory();
            foreach ($catDataArr as $key => $subValueArr) {
                if (array_key_exists($subCatId, $subValueArr)) {
                    $mainCatId = $key;
                    break;
                }
            }
        }

        if ($cid[0] == 'sc') {
            $franData->where('ind_cat', $cid[1]);
            $subCatId = $cid[1];
            $mainCatId = $catArr->parent_id;
        }

        if ($cid[0] == 'm') {
            $franData->where('ind_main_cat', $cid[1])->orderby('is_fixed_brand', 'desc');
            $mainCatId = $cid[1];
            // dd($mainCatId);
        }

        $count = request()->segment(1) == 'amp' ? 20 : 21;

        $brandResults = $franData->orderby('membership_weightage', 'desc')->paginate($count);
        $currentPage = $brandResults->currentPage();
        $lastPage = $brandResults->lastPage();
    
        // If the current page is greater than the last page, redirect to the Category/Subcategory/Subsubcategory page
        if ($currentPage > $lastPage) {
            // Get the current URL without query parameters
            $parentUrl = url()->current();
            return redirect($parentUrl);
        }
        $franImageData   = [];
        if (!empty($brandResults)) {
            $paidFranchisors = collect($brandResults->toArray()['data']);
            $imageFranchisor = $paidFranchisors->where('membership_type', 1)->pluck('franchisor_id');
            $sliderCheck     = FranchisorSliderTenure::query()
                ->select('franchisor_id')
                ->where('status', 1)
                ->where('end_date', '>=', date('Y-m-d H:i:s'))
                ->get()->pluck('franchisor_id');
            $franImageData   = FranchisorSliderImage::query()->select('franchisor_id', 'image_type_slider2', DB::raw('COUNT(franchisor_id) as count'))
                ->where('image_type_slider2', '!=', '')
                ->whereIn('franchisor_id', $imageFranchisor)
                ->whereIn('franchisor_id', $sliderCheck)
                ->where('status', 1)
                // ->groupBy('franchisor_id')
                ->groupBy('franchisor_id', 'image_type_slider2') // Include image_type_slider2 in the GROUP BY clause

                ->havingRaw('count > 3')
                ->get();
        }

        $shuffledResults = $brandResults->shuffle()->sortByDesc('membership_weightage');
        // echo $shuffledResults;exit;
        if (!empty($catArr->seoTitle)) {
            $seoTitle = $catArr->seoTitle;
            // dd($catArr);
        } else {
            $seoTitle = $catArr->catname . ' - Franchise India';

            if (request()->segment(1) == 'hi')
                $seoTitle = $catArr->catname . ' - फ्रेंचाइज इंडिया';
        }


        if (!empty($catArr->description))
            // $seoDesc     = $catArr->description;

            if ($cid[0] != 'ssc') {
                $currentDate = Carbon::now();
                $formattedDate = $currentDate->format('j F Y');

                $seoDesc     = $brandResults->total() . '+ ' . $catArr->catname .  ' Business, Franchise Opportunities' . ' | ' . $formattedDate  .  ' | ' . $catArr->description;
                // dd($seoDesc);
            }


        if (!empty($catArr->keywords))
            $seoKeywords = $catArr->keywords;

        if ($cid[0] == 'ssc') {
            $currentDate = Carbon::now();
            $formattedDate = $currentDate->format('j F Y');
            $seoTitle = sprintf('%s Business Opportunity in India – Franchise India', $catArr->catname);
            $seoDesc  = sprintf($brandResults->total() . '+ ' . $catArr->catname .  ' Business, Franchise Opportunities | ' . $formattedDate . ' | Franchise India offers wide variety of %1$s franchise opportunities to run a successful %1$s franchise business. You can explore some of the established and well known %1$s franchises here.', $catArr->catname);
            if (request()->segment(1) == 'hi') {
                $seoTitle = sprintf('%s भारत में व्यावसायिक अवसर - फ्रेंचाइज इंडिया', $catArr->catname);
                $seoDesc  = sprintf('फ्रैंचाइज़ इंडिया विभिन्न प्रकार की पेशकश करता है %1$s फ्रेंचाइजी एक सफल चलाने के अवसर %1$s फ्रेंचाइजी का व्यवसाय। आप कुछ स्थापित और प्रसिद्ध का पता लगा सकते हैं %1$s यहां फ्रेंचाइजी मिली.', $catArr->catname);
            }
        }

        $ssc         = array();
        $mc          = $mainCatId;
        $sc          = $subCatId;
        $ssc[]       = $thirdCatId;
        $loc         = array();
        $ftype       = '';
        $orderby     = "";

        $view = 'category.category';
        if (request()->segment(1) == 'amp')
            $view = 'category.hindi-category.amp-category';

        if (request()->segment(1) == 'hi')
            $view = 'category.hindi-category.hindi-category';

        $chk_homebased = 0;

        if ($catArr->count() > 0) {
            $seoClass_subcat = (request()->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
            $catArr_subcat  = $seoClass_subcat->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')
                ->where('catid', $catArr->parent_id)
                ->first();
            if ($catArr_subcat != null && $catArr_subcat->count() > 0 && $catArr_subcat->parent_id == 7) {
                $chk_homebased = $catArr_subcat->parent_id;

                $seoTitle = 'Home Based Business ' . $seoTitle;
            }
        }

        // return view($view, compact('brandResults', 'shuffledResults', 'breadCrumb', 'catName', 'mc', 'sc', 'ssc', 'loc', 'ftype', 'seoTitle', 'seoDesc', 'seoKeywords','sortby','minRangeValue','maxRangevalue','orderby','text', 'searchq', 'franImageData', 'city', 'resultType', 'reqSt', 'chk_homebased'));


        return view($view, compact('brandResults', 'shuffledResults', 'breadCrumb', 'catName', 'mc', 'sc', 'ssc', 'loc', 'ftype', 'seoTitle', 'seoDesc', 'seoKeywords', 'sortby', 'minRangeValue', 'maxRangevalue', 'orderby', 'text', 'searchq', 'franImageData', 'city', 'chk_homebased'));
    }


    //pankaj function normalization

    public function searchBusinessListingnormalization(Request $request)
    {
        // dd('yes');
        $url = $request->url();
        $lowcost      = request()->lowcost;
        preg_match('/[a-zA-Z]+(\d+)/', $lowcost, $matches);
        $requestUri = $request->getRequestUri();
        $segments = explode('/', $requestUri);
        // dd($segments[3]);
        // Check if the segments array has at least 4 elements
        $segment = isset($segments[3]) ? $segments[3] : null;

        // preg_match('/[a-zA-Z]+(\d+)$/', $lowcost, $matches);    // Match all integers at the end of $lowcost
        $lastIntegers = $matches[1] ?? null;    // Get the last set of integers
        $seoCategoriesm = Config('category.SeoCategoryArr'); // Corrected variable name
        $seoCategoriessc = Config('category.SeoSubCategoryArr'); // Corrected variable name
        $seoCategoriesssc = Config('category.SeoSubSubCategoryArr'); // Corrected variable name

        //   dd($lastIntegers);
        if (array_key_exists($lastIntegers, $seoCategoriesm)) {

            $category = $seoCategoriesm[$lastIntegers];
            // dd($category);
            $newUrl = '/business-opportunities/' . $category . '.' . 'm' . $lastIntegers;
            return redirect($newUrl, 301);
        } else if (array_key_exists($lastIntegers, $seoCategoriessc)) {
            $category = $seoCategoriessc[$lastIntegers];
            $newUrl = '/business-opportunities/' . $category . '.' . 'sc' . $lastIntegers;
            return redirect($newUrl, 301);
        } else if (array_key_exists($lastIntegers, $seoCategoriesssc)) {
            $category = $seoCategoriesssc[$lastIntegers];
            // dd($category);
            $newUrl = '/business-opportunities/' . $category . '.' . 'ssc' . $lastIntegers;
            return redirect($newUrl, 301);
        }
        // else {
        //             $defaultUrl = 'business-opportunities/all/all';
        //             return redirect($defaultUrl);
        //         }

        if (!empty(request()->franchiseType)) {

            $this->setSearchParams(request()->franchiseType);
        }
        if (!empty(request()->categoryIds)) {

            $this->setSearchParams(request()->categoryIds);
        }
        if (!empty(request()->locationIds)) {
            // dd('hello');
            $this->setSearchParams(request()->locationIds);
        }
        if (!empty(request()->range)) {
            // dd('hello1');
            $this->setSearchParams(request()->range);
        }
        // Initialize the variables
        $seoTitle = '';
        $seoDesc = '';
        if ($segment) {
            if ($segment == "range-10000-100000") {
                $seoTitle = 'Top Franchises Under 1 Lakh in India: Affordable Business Opportunities 2024';
                $seoDesc = 'Discover the top franchises available under 1 lakh in India for 2024. Invest in affordable, high-return business opportunities ideal for first-time entrepreneurs. Begin your successful business journey today!';
            } elseif ($segment == "range-10000-200000") {
                $seoTitle = 'Top Franchises Under 2 Lakhs in India: Affordable Investments 2024';
                $seoDesc = 'Explore high-potential franchises available under 2 lakhs in India for 2024. Seize low-cost, profitable business opportunities perfect for emerging entrepreneurs. Start your entrepreneurial journey now!';
            } elseif ($segment == "range-10000-300000") {
                $seoTitle = 'Best Franchises Under 3 Lakhs in India: Start Your Business in 2024';
                $seoDesc = 'Discover leading franchises under 3 lakhs in India for 2024. Invest in cost-effective, scalable business opportunities suitable for aspiring entrepreneurs. Launch your successful venture today!';
            } elseif ($segment == "range-10000-500000") {
                $seoTitle = 'Top Franchises Under 5 Lakhs in India: High ROI Business Opportunities 2024';
                $seoDesc = 'Explore the best franchises available under 5 lakhs in India for 2024. Discover affordable, high-return business ventures perfect for budding entrepreneurs. Start your profitable journey today!';
            } elseif ($segment == "range-10000-1000000") {
                $seoTitle = 'Best Franchises Under 10 Lakhs in India: Lucrative Opportunities 2024';
                $seoDesc = 'Uncover top franchises available under 10 lakhs in India for 2024. Choose from profitable, low-cost business opportunities ideal for new entrepreneurs. Begin your successful journey now!';
            } elseif ($segment == "range-10000-1500000") {
                $seoTitle = 'Top Franchises Under 15 Lakhs in India: Affordable Business Ventures 2024';
                $seoDesc = 'Explore affordable franchises under 15 lakhs in India for 2024. Seize low-investment, high-return business opportunities perfect for first-time entrepreneurs. Start building your business empire today!';
            } elseif ($segment == "range-10000-2000000") {
                $seoTitle = 'Best Franchises Under 20 Lakhs in India: Smart Business Choices 2024';
                $seoDesc = 'Explore leading franchises under 20 lakhs in India for 2024. Choose from cost-effective, high-return business opportunities perfect for savvy entrepreneurs looking to make a mark. Start your profitable venture today!';
            } elseif ($segment == "range-10000-2500000") {
                $seoTitle = 'Top Franchises Under 25 Lakh in India: Affordable Business Opportunities 2024';
                $seoDesc = 'Discover leading franchises under 25 lakhs in India for 2024. Invest in cost-effective, high-potential business opportunities suitable for savvy entrepreneurs. Launch your profitable venture today!';
            } elseif ($segment == "range-10000-3000000") {
                $seoTitle = 'Top Franchises Under 30 Lakhs in India: Ideal Investments 2024';
                $seoDesc = 'Explore the most promising franchises under 30 lakhs in India for 2024. Find affordable, scalable business opportunities perfect for emerging entrepreneurs. Kickstart your entrepreneurial success now!';
            } elseif ($segment == "range-10000-5000000") {
                $seoTitle = 'Best Franchises Under 50 Lakhs in India: Profitable Investments 2024';
                $seoDesc = 'Discover top franchises available under 50 lakhs in India for 2024. Secure profitable and sustainable business opportunities ideal for growth-focused entrepreneurs. Start your journey to success today!';
            } elseif ($segment == "range-10000-10000000") {
                $seoTitle = 'Top Franchises Under 1 Crore in India: Lucrative Business Opportunities 2024';
                $seoDesc = 'Uncover leading franchises under 1 crore in India for 2024. Invest in high-return business opportunities suited for ambitious entrepreneurs. Begin your profitable venture now!';
            }
        }
        $seoKeywords = '';
        $mainCatId = request()->mc;

        $subCatId = request()->sc;

        $catId = 0;
        $catType = request()->ftype;
        // dd($catType);
        $breadCrumb = '';
        $locArrKey = array();
        $thirdCatId = request()->ssc;
        $thirdCatIdArr = array();
        $searchq = '';
        $text = "";
        $catTabResult = 0;
        $locTabResult = 0;
        $invTabResult = 0;
        $minCost = 0;
        $maxCost = 0;
        $loc = '';

        if (!empty(request()->catTab))
            $catTabResult = 1;

        if (!empty(request()->locTab))
            $locTabResult = 1;


        if (!empty(request()->invTab))
            $invTabResult = 1;

        if (!empty($mainCatId) && empty($subCatId) && empty($thirdCatId)) {
            $catId = $mainCatId;
            $catType = 'mc';
            $catName = (request()->segment(1) == 'hi') ? Config('hindiConstants.CategoryArr.' . $catId) : Config('constants.CategoryArr.' . $catId);
        }

        if (!empty($subCatId) && empty($thirdCatId)) {
            $catId = $subCatId;
            $catType = 'sc';
            $catName = (request()->segment(1) == 'hi') ? Config('hindiConstants.subCategoryArr.' . $mainCatId . '.' . $subCatId) : Config('constants.subCategoryArr.' . $mainCatId . '.' . $subCatId);
        }

        if (!empty($thirdCatId)) {
            $catId = $thirdCatId;
            $catType = 'ssc';
            $catName = (request()->segment(1) == 'hi') ? Config('hindiConstants.subCategoryArr.' . $mainCatId . '.' . $subCatId) : Config('constants.subCategoryArr.' . $mainCatId . '.' . $subCatId);
        }


        if (request()->segment(2) == 'all' && request()->segment(3) == 'all') {
            $seoTitle = 'Business Opportunities - Franchise India';
            $seoDesc = 'Find 13000+ business opportunities';
            $seoKeywords = 'Business opportunities';

            if ((request()->segment(1) == 'hi')) {
                $seoTitle = 'व्यवसाय के अवसर - फ्रेंचाइजी इंडिया';
                $seoDesc = '13000+ व्यावसायिक अवसर खोजें';
                $seoKeywords = 'व्यवसाय के अवसर';
            }
        }



        $fTypeName = '';
        $locName = 'India';
        $businessOpp = 'Business Opportunities';
        $in = 'in';

        if ((request()->segment(1) == 'hi')) {
            $businessOpp = 'व्यवसाय के अवसर';
            $in = 'इन';
            $locName = 'इंडिया';
        }
        if (!empty(request()->loc) && count(request()->loc) == 1) {
            $locName = Config('location.stateArr.' . request()->loc[0]);
            if ((request()->segment(1) == 'hi')) {
                $locName = Config('location.hindiStatesArr.' . $locName);
            }
        }

        if (!empty(request()->ftype)) {
            $fTypeName = Config('constants.masterfranchiseType')[request()->ftype];

            if ((request()->segment(1) == 'hi'))
                $fTypeName = Config('hindiConstants.masterfranchiseType')[request()->ftype];

            $seoTitle = "$businessOpp $fTypeName  - Franchise India";
            if (!empty(request()->loc) && count(request()->loc) == 1) {
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";

                if (request()->segment(1) == 'hi')
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
            } else if (!empty(request()->loc) && count(request()->loc) > 1) {
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";

                if (request()->segment(1) == 'hi')
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
            }
        }

        if (!empty($catId)) {
            $seoClass = (request()->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
            $catArr = $seoClass->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')
                ->where('catid', $catId)
                ->first();
            if (!empty(request()->loc) && count(request()->loc) == 1 && !empty($fTypeName) && !empty($catArr)) {
                $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities '. $fTypeName .', business opportunities, business ideas. Buy $catArr->catname Franchise in $locName with affordable range.";

                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है '. $fTypeName .', व्यापार के अवसर, व्यापार के विचार। सस्ती सीमा के साथ $locName में $catArr->catname फ्रेंचाइज़ खरीदें।";
                }
            } else if (!empty(request()->loc) && count(request()->loc) > 1 && !empty($fTypeName)) {
                $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities '. $fTypeName .', business opportunities, business ideas,best business in India and buy $catArr->catname Franchise in India with affordable range.";

                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है '. $fTypeName .', व्यापार के अवसर, व्यापार के विचार, भारत में सबसे अच्छा व्यवसाय और सस्ती सीमा के साथ भारत में $catArr->catname फ्रैंचाइज़ खरीदें।";
                }
            } else if (!empty(request()->loc) && count(request()->loc) == 1 && !empty($catArr)) {

                $seoTitle = "$catArr->catname $businessOpp $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities, business opportunities, business ideas. Buy $catArr->catname Franchise in $locName with affordable range.";

                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है ,व्यापार के अवसर, व्यापार के विचार। सस्ती सीमा के साथ $locName में $catArr->catname फ्रेंचाइज़ खरीदें।";
                }
            } else if (!empty(request()->loc) && count(request()->loc) > 1 && !empty($catArr)) {
                $seoTitle = "$catArr->catname $businessOpp $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities, business opportunities, business ideas,best business in India and buy $catArr->catname Franchise in India with affordable range.";

                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है , व्यापार के अवसर, व्यापार के विचार, भारत में सबसे अच्छा व्यवसाय और सस्ती सीमा के साथ भारत में $catArr->catname फ्रैंचाइज़ खरीदें।";
                }
            } else if (!empty($fTypeName) && !empty($catArr)) {
                $seoTitle = "$catArr->catname $businessOpp $fTypeName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities  '. $fTypeName .', business opportunities, business ideas,best business in India and buy $catArr->catname Franchise in India with affordable range.";
                if (request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $fTypeName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है '. $fTypeName .', व्यापार के अवसर, व्यापार के विचार, भारत में सबसे अच्छा व्यवसाय और सस्ती सीमा के साथ भारत में $catArr->catname फ्रैंचाइज़ खरीदें। ";
                }
            } else {
                if (isset($catArr->seoTitle)) {
                    if (!empty($catArr->seoTitle)) {
                        $seoTitle = $catArr->seoTitle;
                    } else {
                        $seoTitle = $catArr->catname . ' - Franchise India';
                    }
                }
            }

            if (isset($catArr->seoTitle)) {
                if (!empty($catArr->description))
                    $seoDesc = $catArr->description;
                if (!empty($catArr->keywords))
                    $seoKeywords = $catArr->keywords;
            }
        }



        if (request()->price_range == "under-50k") {
            $minRangeValue = 10000;
            $maxRangevalue = 50000;
            $seoTitle = 'Business Opportunities Under Rs-10000-to-50000 - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-10000-to-50000';
            $seoDesc = 'Find business opportunities Under Rs-10000-to-50000';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 करोड़ से 5 करोड़ के बीच व्यापार के अवसर';
                $seoDesc     = '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-2lac" || request()->price_range == "under-2Lac") {
            $minRangeValue = 50000;
            $maxRangevalue = 200000;
            $seoTitle = 'Business Opportunities Under Rs 50000 to 2 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 50000 to 2 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 50000 to 2 lakh';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '50 हज़ार से 2 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 50 हज़ार से 2 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '50 हज़ार से 2 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-5lac" || request()->price_range == "under-5Lac") {
            $minRangeValue = 200000;
            $maxRangevalue = 500000;
            $seoTitle = 'Business Opportunities Under Rs 2 lakhs to 5 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 2 lakhs to 5 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 2 lakhs to 5 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '2 लाख से 5 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 लाख से 5 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '2 लाख से 5 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-10lac" || request()->price_range == "under-10Lac") {
            $minRangeValue = 500000;
            $maxRangevalue = 1000000;
            $seoTitle = 'Business Opportunities Under Rs 5 lakhs to 10 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 5 lakhs to 10 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 5 lakhs to 10 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '5 लाख से 10 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 5 लाख से 10 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '5 लाख से 10 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-20lac" || request()->price_range == "under-20Lac") {
            $minRangeValue = 1000000;
            $maxRangevalue = 2000000;
            $seoTitle = 'Business Opportunities Under Rs 10 lakhs to 20 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 10 lakhs to 20 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 10 lakhs to 20 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '10 लाख से 20 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 10 लाख से 20 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '10 लाख से 20 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-30lac" || request()->price_range == "under-30Lac") {
            $minRangeValue = 2000000;
            $maxRangevalue = 3000000;
            $seoTitle = 'Business Opportunities Under Rs 20 lakhs to 30 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 20 lakhs to 30 lakhs';
            $seoDesc = 'Find business opportunities Under Rs 20 lakhs to 30 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '20 लाख से 30 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 20 लाख से 30 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '20 लाख से 30 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-50lac" || request()->price_range == "under-50Lac") {
            $minRangeValue = 3000000;
            $maxRangevalue = 5000000;
            $seoTitle = 'Business Opportunities Under Rs 30 lakhs to 50 lakhs - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under 30 lakhs to 50 lakhs';
            $seoDesc = 'Find business opportunities Under 30 lakhs to 50 lakhs';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '30 लाख से 50 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 30 लाख से 50 लाख के बीच व्यापार के अवसर';
                $seoDesc     = '30 लाख से 50 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-1cr") {
            $minRangeValue = 5000000;
            $maxRangevalue = 10000000;
            $seoTitle = 'Business Opportunities Under Rs 50 lakhs to 1 cr - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 50 lakhs to 1 cr';
            $seoDesc = 'Find business opportunities Under Rs 50 lakhs to 1 cr';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '50 लाख से 1 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 लाख से 1 करोड़ के बीच व्यापार के अवसर';
                $seoDesc     = '50 लाख से 1 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-2cr") {
            $minRangeValue = 10000000;
            $maxRangevalue = 20000000;
            $seoTitle = 'Business Opportunities Under Rs 1 cr to 2 cr - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 1 cr to 2 cr';
            $seoDesc = 'Find business opportunities Under Rs 1 cr to 2 cr';
            if (request()->segment(1) == 'hi') {
                $seoTitle    = '1 करोड़ से 2 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 1 करोड़ से 2 करोड़ के बीच व्यापार के अवसर';
                $seoDesc     = '1 करोड़ से 2 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-5cr") {
            $minRangeValue = 20000000;
            $maxRangevalue = 50000000;
            $seoTitle = 'Business Opportunities Under Rs 2 cr to 5 cr - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs 2 cr to 5 cr';
            $seoDesc = 'Find business opportunities Under Rs 2 cr to 5 cr';

            if (request()->segment(1) == 'hi') {
                $seoTitle    = '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 करोड़ से 5 करोड़ के बीच व्यापार के अवसर';
                $seoDesc     = '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "5cr-or-above") {
            $minRangeValue = 50000000;
            $maxRangevalue = 100000000;
            $seoTitle = 'Business Opportunities Under franchises 5 cr or above - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under franchises 5 cr or above';
            $seoDesc = 'Find business opportunities Under franchises 5 cr or above';

            if (request()->segment(1) == 'hi') {
                $seoTitle    = 'फ्रैंचाइजी के बीच व्यवसाय के अवसर- 5 करोड़ से ऊपर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, फ्रेंचाइजी के बीच व्यापार के अवसर - 5 करोड़ - या - ऊपर';
                $seoDesc     = 'फ्रैंचाइजी-5 करोड़ या उससे अधिक के बीच व्यवसाय के अवसर खोजें';
            }
        } else {
            $minRangeValue = 0;
            $maxRangevalue = 100000000;
        }

        if (!empty(request()->minrange))
            $minRangeValue = request()->minrange;

        if (!empty(request()->maxrange))
            $maxRangevalue = request()->maxrange;

        if (!empty(request()->min_cost)) {
            $minRangeValue = Config('constants.InvestRange.' . request()->min_cost . '.min');
            $minCost = request()->min_cost;
        }

        if (!empty(request()->max_cost)) {
            $maxRangevalue = Config('constants.InvestRange.' . request()->max_cost . '.min');
            $maxCost = request()->max_cost;
        }

        if ($minRangeValue > $maxRangevalue) {
            $maxRangevalue = '100000000';
            $minRangeValue = '10000';
        }

        $orderby = request()->sortby;

        // Fetch the request parameters
        if (!empty(request()->state_code)) {
            $locId       = preg_split('#(?<=[a-z])(?=\d)#i', request()->state_code);
            $locArrKey   = explode(',', $locId[1]);
            $seoTitle    = 'Business Opportunities in ' . Config('location.stateArr.' . $locArrKey[0]) . ' - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities in ' . Config('location.stateArr.' . $locArrKey[0]);
            $seoDesc     = "Find business opportunities in " . Config('location.stateArr.' . $locArrKey[0]);
            $loc         = $locArrKey;

            if (request()->segment(1) == 'hi') {
                $seoTitle    = Config('location.hindiStatesArr')[Config('location.stateArr.' . $locArrKey[0])] . ' में व्यवसाय के अवसर - फ्रेंचाइजी भारत';
                $seoKeywords = Config('location.hindiStatesArr')[Config('location.stateArr.' . $locArrKey[0])] . ' में व्यापार के अवसर, व्यापार के अवसर ';
                $seoDesc     = Config('location.hindiStatesArr')[Config('location.stateArr.' . $locArrKey[0])] . ' में व्यवसाय के अवसरों का पता लगाएं';
            }
        }


        if (!empty(request()->loc)) {
            if (is_array(request()->loc)) {
                $locArrKey = implode(',', request()->loc);
            } else {
                $locArrKey = request()->loc;
            }
            $locArrKey = explode(',', $locArrKey);
            $loc = $locArrKey;
        }

        if (!empty(request()->ftype))
            $franType = request()->ftype;

        if (!empty(request()->ssc)) {
            if (is_array(request()->ssc)) {
                $sscStr = implode(',', request()->ssc);
            } else {
                $sscStr = request()->ssc;
            }
            $thirdCatIdArr = explode(',', $sscStr);
        }

        if (!empty(request()->mc))
            $mainCatId = request()->mc;

        if (!empty(request()->sc))
            $subCatId = request()->sc;

        if (empty($catId))
            // dd('hello');
            $catName = (request()->segment(1) == 'hi') ? 'बिज़नेस  ओप्पोर्तुनिटीज़' : 'Business Opportunities';

        // Fetch Brand Data
        $franData = FranchisorBusinessDetail::query()->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name', 'state', 'ind_sub_cat', 'operations_start_year', 'looking_tradepartner', 'looking_franchise', 'membership_weightage', 'franchise_start_year', 'no_fran_outlets', 'franchise_partner_type', 'city', 'unit_investment', 'expansion_loc_type', 'business_desc', 'membership_plan', 'prop_area_min', 'prop_area_max', 'profile_status', 'business_desc', 'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'membership_type', 'company_logo', 'unit_inv_min', 'unit_inv_max', 'is_hindi', 'business_desc_hindi', 'free_logo_visibility','brand_verified','views','activated_at');

        $franData->whereIn('profile_status', [1,11]);


        if (isset(request()->text)) {
            $text = str_replace('-or-', '/', request()->text);
            $type = 'm';
            $catId = CategoryFinal::query()->select('catid', 'catname', 'parent_id')->where('catname', request()->text)->first();
            if (!empty($catId)) {
                if (!empty($catId->parent_id)) {
                    $subCatCheck = CategoryFinal::query()->select('parent_id')->where('catid', $catId->parent_id)->first();
                    if (!empty($subCatCheck) && empty($subCatCheck->parent_id))
                        $type = 'sc';
                    else
                        $type = 'ssc';
                }
                $url =  'business-opportunities/' . Str::slug($catId->catname) . '.' . $type . $catId->catid;
                // dd($url);
                return redirect($url);
            }

            $franData->Where('company_name', 'like', '%' . request()->text . '%');
        }



        if (isset(request()->searchq)) {
            $searchq = request()->searchq;
            $franData->where('company_name', 'LIKE', '%' . $searchq . '%');
        }

        if ($catType == 'ssc')
            $franData->whereIn('ind_sub_cat', $thirdCatIdArr);

        if ($catType == 'sc')
            $franData->where('ind_cat', $catId);
        if ($catType == 'mc')
            $franData->where('ind_main_cat', $catId);
        if (!empty($franType))
            $franData->where('franchise_partner_type',  $franType);

        if (count($locArrKey) > 0) {
            $stateNames = [];

            foreach ($locArrKey as $key => $val) {
                $stateNames[] = config('location.stateArr.' . $val);
            }
            $franData->where(function ($query) use ($stateNames) {
                $query->where('expansion_location', 'LIKE', '%' . $stateNames[0] . '%');

                for ($i = 1; $i < count($stateNames); $i++) {
                    $query->orWhere('expansion_location', 'LIKE', '%' . $stateNames[$i] . '%');
                }
            });
        }


        $city = "";

        if (!empty(request()->city)) {/*
            $city = request()->city;
            $cityArr = FranchisorLocState::query()->distinct('franchisor_id')
                ->where('city', request()->city)
                ->get()
                ->pluck('franchisor_id')
                ->toArray();

            $franData->whereIn('franchisor_id', $cityArr)->get();
        */
        }

        if (request()->lowcost == "lowcost") {
            $maxRangevalue = 500000;
            $minRangeValue = 0;
            $seoTitle      = 'Low Cost Business Opportunities - Franchise India';
            $seoKeywords   = 'low cost Franchise, low cost business opportunities';
            $seoDesc       = 'Start your business with low cost franchise business opportunities.';
            $catName       = "Low Cost Business Opportunities";

            if (request()->segment(1) == 'hi') {
                $seoTitle      = 'कम लागत के व्यवसाय के अवसर - फ्रेंचाइजी भारत';
                $seoKeywords   = 'कम लागत वाले फ्रेंचाइजी, कम लागत वाले व्यवसाय के अवसर';
                $seoDesc       = 'कम लागत वाली फ्रेंचाइज़ी के व्यावसायिक अवसरों के साथ अपना व्यवसाय शुरू करें।';
                $catName       = "कम लागत व्यापार अवसर";
            }
        }



        if (!empty(request()->investment) && is_numeric(request()->investment)) {
            $minRangeValue = Config('constants.InvestRange.' . request()->investment . '.min');
            $maxRangevalue = Config('constants.InvestRange.' . request()->investment . '.max');
        }

        $franData->where('unit_inv_max', '<=', $maxRangevalue);
        $franData->where('unit_inv_max', '>=', $minRangeValue);

        $orderbyVal = 'membership_weightage';
        $franData->orderBy($orderbyVal, 'desc');

        if ($orderby == 1) {
            $orderbyVal = 'fran_detail_id';
            $franData->orderBy($orderbyVal, 'desc');
        } elseif ($orderby == 2) {
            $orderbyVal = 'company_name';
            $franData->orderBy($orderbyVal, 'asc');
        } elseif ($orderby == 3) {
            $orderbyVal = 'views';
            $franData->orderBy($orderbyVal, 'desc');
        }

        $count           = request()->segment(1) == 'amp' ? 20 : 21;
        $brandResults    = $franData->paginate($count);
        $currentPage = $brandResults->currentPage();
        $lastPage = $brandResults->lastPage();
    
        // If the current page is greater than the last page, redirect to the Category/Subcategory/Subsubcategory page
        if ($currentPage > $lastPage) {
            // Get the current URL without query parameters
            $parentUrl = url()->current();
            return redirect($parentUrl);
        }
        $shuffledResults = $brandResults->shuffle()->sortByDesc('membership_weightage');

        $mc    = $mainCatId;
        $sc    = $subCatId;
        $ssc   = request()->ssc;
        $ftype = request()->ftype;

        if (!empty(request()->state_code))
            $catName     = (request()->segment(1) == 'hi') ?  Config('location.hindiStatesArr.' . Config('location.stateArr.' . $locArrKey[0])) : Config('location.stateArr.' . $locArrKey[0]);

        $franImageData   = [];
        if (!empty($brandResults)) {
            $paidFranchisors = collect($brandResults->toArray()['data']);
            $imageFranchisor = $paidFranchisors->where('membership_type', 1)->pluck('franchisor_id');
            $sliderCheck     = FranchisorSliderTenure::query()
                ->select('franchisor_id')
                ->where('status', 1)
                ->where('end_date', '>=', date('Y-m-d H:i:s'))
                ->get()->pluck('franchisor_id');
            $franImageData   = FranchisorSliderImage::query()->select('franchisor_id', 'image_type_slider2', DB::raw('COUNT(franchisor_id) as count'))
                ->where('image_type_slider2', '!=', '')
                ->whereIn('franchisor_id', $imageFranchisor)
                ->whereIn('franchisor_id', $sliderCheck)
                ->where('status', 1)
                // ->groupBy('franchisor_id')
                ->groupBy('franchisor_id', 'image_type_slider2')
                ->havingRaw('count > 3')
                ->get();
        }

        $view = 'category.category';
        if (request()->segment(1) == 'amp')
            $view = 'category.hindi-category.amp-category';

        if (request()->segment(1) == 'hi')
            $view = 'category.hindi-category.hindi-category';
        return view($view, compact(
            'brandResults',
            'shuffledResults',
            'breadCrumb',
            'catName',
            'mc',
            'sc',
            'ssc',
            'ftype',
            'seoTitle',
            'seoDesc',
            'loc',
            'seoKeywords',
            'orderby',
            'minRangeValue',
            'maxRangevalue',
            'text',
            'searchq',
            'catTabResult',
            'locTabResult',
            'invTabResult',
            'minCost',
            'maxCost',
            'franImageData',
            'city'
        ));
    }
    public function getBusinessListingnormalization(Request $request)
    {
        // dd('yes');
        // $lowcost = $request->route('lowcost');

        // Fetch the request parameters
        $catParam      = request()->category_param;
        $catUrl      = request()->catUrl;
        preg_match('/[a-zA-Z]+(\d+)/', $catParam, $matches);

        $allIntegers = $matches[1] ?? null;
        // dd($catUrl,$catParam,$allIntegers);
        $seoCategoriesm = Config('category.SeoCategoryArr'); // Corrected variable name
        $seoCategoriessc = Config('category.SeoSubCategoryArr'); // Corrected variable name
        $seoCategoriesssc = Config('category.SeoSubSubCategoryArr'); // Corrected variable name
        // dd($catUrl, $catParam,$allIntegers,$seoCategoriessc,$seoCategoriesssc);

        // Check if $allIntegers exists in $seoCategoriesm configuration array
        if (array_key_exists($allIntegers, $seoCategoriesm)) {
       
            // If $allIntegers exists in $seoCategoriesm, add "m" to $allIntegers
            $allIntegers = 'm' . $allIntegers;
            if (strpos($allIntegers, "m") !== false) {
                // dd($allIntegers);
                $category = substr($allIntegers, 1, 3);
                // dd($allIntegers,$category);
                $configCatUrl = Config('category.SeoCategoryArr.' . $category);
                // dd($configCatUrl);
                $newCatUrl = '/business-opportunities/' . $configCatUrl . '.' . $allIntegers;
                // dd($newCatUrl);
                $oldCaturl = '/business-opportunities/' . $catUrl . '.' . $catParam;
                // dd($oldCaturl);
                // dd($category,$configCatUrl,$newCatUrl, $oldCaturl);
                if ($configCatUrl !== false) {
                    $newCatUrl = '/business-opportunities/' . $configCatUrl . '.' . $allIntegers;
                    if ($newCatUrl != $oldCaturl) {
                        // dd($newCatUrl);
                        return redirect($newCatUrl, 301);
                    }
                }
            }
        }
       
        //http://localhost:8000/business-opportunities/telecommunications.sc1011
        if (array_key_exists($allIntegers, $seoCategoriessc)) {
            // If $allIntegers exists in $seoCategoriesm, add "m" to $allIntegers
            $allIntegers = 'sc' . $allIntegers;
            // dd($allIntegers);

            if (strpos($allIntegers, "sc") !== false) {

                // dd($allIntegers);
                $category = substr($allIntegers, 2, 4);
                // dd($allIntegers,$category);
                $configCatUrl = Config('category.SeoSubCategoryArr.' . $category);
                // dd($allIntegers,$configCatUrl);
                $newCatUrl = '/business-opportunities/' . $configCatUrl . '.' . $allIntegers;
                // dd($newCatUrl);
                $oldCaturl = '/business-opportunities/' . $catUrl . '.' . $catParam;
                // dd($oldCaturl);
                // dd($category,$configCatUrl,$newCatUrl, $oldCaturl);
                if ($configCatUrl !== false) {
                    $newCatUrl = '/business-opportunities/' . $configCatUrl . '.' . $allIntegers;
                    // dd($newCatUrl ,$oldCaturl);
                    if ($newCatUrl != $oldCaturl) {
                        // dd($newCatUrl);
                        return redirect($newCatUrl, 301);
                    }
                    // else if ($newCatUrl == $oldCaturl) {
                    //     // dd($newCatUrl);
                    //     // return redirect($newCatUrl, 301);
                    //     return response($newCatUrl, 200);
                    // }

                }
                // return redirect($newCatUrl);

            }
        } else if (array_key_exists($allIntegers, $seoCategoriesssc)) {
        

            // If $allIntegers exists in $seoCategoriesm, add "m" to $allIntegers
            $allIntegers = 'ssc' . $allIntegers;
            // dd($allIntegers);

            if (strpos($allIntegers, "ssc") !== false) {
                // dd($allIntegers);
                $category = substr($allIntegers, 3, 4);
                // dd($allIntegers,$category);
                $configCatUrl = Config('category.SeoSubSubCategoryArr.' . $category);
                // dd($configCatUrl);
                $newCatUrl = '/business-opportunities/' . $configCatUrl . '.' . $allIntegers;
                // dd($newCatUrl);
                $oldCaturl = '/business-opportunities/' . $catUrl . '.' . $catParam;
                // dd($oldCaturl);
                // dd($category,$configCatUrl,$newCatUrl, $oldCaturl);
                if ($configCatUrl !== false) {
                    $newCatUrl = '/business-opportunities/' . $configCatUrl . '.' . $allIntegers;
                    if ($newCatUrl != $oldCaturl) {
                        // dd($newCatUrl);
                        return redirect($newCatUrl, 301);
                    }
                }
            }
        }

        // else{

        //     $defaultUrl = 'business-opportunities/all/all';
        //     return redirect($defaultUrl);
        // }
        $breadCrumb    = '';
        $sortby        = '';
        $minRangeValue = '';
        $maxRangevalue = '';
        $text          = '';
        $seoDesc       = '';
        $seoKeywords   = '';
        $searchq       = '';
        $city          = '';

        if (isset(request()->mainCatmId))
            $catParam = request()->mainCatmId;

        // Initialize the variables
        $mainCatId  = 0;
        $subCatId   = 0;
        $thirdCatId = 0;
        $cid        = 0;

        if ($catParam)
            $cid = preg_split('#(?<=[a-z])(?=\d)#i', $catParam);

        if (count($cid) != 2)
            return redirect('pagenotfound');

        $seoClass = (request()->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
        $catArr   = $seoClass->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')
            ->where('catid', $cid[1])
            ->first();
            // dd($catArr);
        if ($catArr == null)
            return redirect('/business-opportunities/all/all', 301);

        $catName = $catArr->catname;

        //Category Redirection Start
        $catChk = array(5, 443, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 735, 736, 801, 802, 803, 444, 457, 458, 459, 460, 461, 462, 463, 476, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 495, 496, 959, 477, 497, 498, 499, 500, 501, 502, 503, 504, 822, 823, 824, 825, 826, 827, 828, 829, 830, 831, 832, 833, 834, 835, 836, 837, 838, 478, 505, 506, 507, 508, 509, 510, 511, 512, 513, 839, 840, 841, 842, 843, 844, 845, 479, 514, 515, 516, 517, 518, 519, 520, 521, 522, 523, 524, 525, 526, 527, 528, 529, 530, 531, 887, 888, 889, 890, 891, 892, 893, 894, 895, 738, 739, 740, 741, 742, 743, 744, 745, 746, 747, 748, 749, 750, 751, 752, 753, 754, 755, 756, 757, 758, 759, 760, 964, 965, 761, 762, 763, 764, 765, 766, 767, 768, 769, 961, 770, 771, 772, 773, 774, 775, 776, 777, 778, 779, 780, 781, 782, 783, 784, 785, 786, 787, 788, 789, 790, 791, 792, 793, 794, 795, 796, 797, 798, 799, 805, 806, 807, 808, 809, 810, 811, 812, 813, 814, 815, 816, 817, 818, 819, 820, 821, 469, 472, 473, 958, 846, 847, 848, 849, 850, 851, 852, 853, 854, 855, 856, 857, 858, 859, 464, 468, 860, 861, 862, 863, 864, 865, 866, 867, 960, 868, 869, 870, 871, 872, 873, 874, 875, 876, 877, 878, 879, 880, 881, 882, 883, 884, 885, 886, 896, 897, 898, 899, 900, 901, 902, 903, 904, 905, 906, 907, 908, 966, 909, 910, 911, 912, 913, 914, 915, 916, 917, 918, 919, 920, 921, 922, 923, 924, 967, 925, 926, 927, 928, 929, 930, 931, 932, 933, 934, 935, 936, 937, 938, 939, 940, 941, 942, 943, 944, 945, 946, 947, 948, 949, 963, 962, 950, 951, 952, 953, 954, 956, 955, 957, 969, 970, 971);

        // if (in_array($cid[1], $catChk)) {
        //     $oiCategory = MappingCategory::query()->where('fi_category_id', $cid[1])->first();
        //     //$oiCategory = MappingCategory::query()->where('fi_category', $catName)->first();			
        //     if (!empty($oiCategory)) {
        //         $ioRedirect = ($oiCategory->slug != '') ? Config('constants.OIDomain') . '/dir/' . $oiCategory->slug : Config('constants.OIDomain');
        //         return redirect($ioRedirect, 301);
        //     }
        // }
        //Category Redirection End

        $franData = FranchisorBusinessDetail::query()->select(
            'fran_detail_id',
            'franchisor_id',
            'profile_name',
            'company_name',
            'state',
            'ind_sub_cat',
            'operations_start_year',
            'looking_tradepartner',
            'looking_franchise',
            'membership_weightage',
            'franchise_start_year',
            'no_fran_outlets',
            'franchise_partner_type',
            'city',
            'unit_investment',
            'expansion_loc_type',
            'business_desc',
            'membership_plan',
            'prop_area_min',
            'prop_area_max',
            'profile_status',
            'business_desc',
            'ind_main_cat',
            'ind_cat',
            'ind_sub_cat',
            'membership_type',
            'company_logo',
            'unit_inv_min',
            'unit_inv_max',
            'is_hindi',
            'business_desc_hindi',
            'free_logo_visibility',
            'brand_verified',
             'views',
             'activated_at',
             'is_fixed_brand'
        )
            ->whereIn('profile_status', [1,11]);
           

         if($cid[0] == 'ssc') {
            //$franData->where('ind_sub_cat', $cid[1])->orderby('membership_type', 'desc');
            $franData->where('ind_sub_cat', $cid[1]);
            $thirdCatId = $cid[1];
            $subCatId   = $catArr->parent_id;

            $catData    = new CategoryController();
            $catDataArr = $catData->getSubCategory();
            foreach ($catDataArr as $key => $subValueArr) {
                if (array_key_exists($subCatId, $subValueArr)) {
                    $mainCatId = $key;
                    break;
                }
            }
        }

        if ($cid[0] == 'sc') {
            $franData->where('ind_cat', $cid[1]);
            $subCatId = $cid[1];
            $mainCatId = $catArr->parent_id;
        }

        if ($cid[0] == 'm') {
            $franData->where('ind_main_cat', $cid[1])->orderby('is_fixed_brand', 'desc');

            $mainCatId = $cid[1];
            // dd($mainCatId);
        }
        $franData= $franData->distinct();

        $count = request()->segment(1) == 'amp' ? 20 : 21;
        $brandResults = $franData->orderby('membership_weightage','desc') ->orderby('fran_detail_id', 'asc') ->paginate($count);
        // dd($brandResults->pluck('fran_detail_id'));
           // Get the current page and last page
        $currentPage = $brandResults->currentPage();
        $lastPage = $brandResults->lastPage();
    
        // If the current page is greater than the last page, redirect to the Category/Subcategory/Subsubcategory page
        if ($currentPage > $lastPage) {
            // Get the current URL without query parameters
            $parentUrl = url()->current();
            return redirect($parentUrl);
        }
        $franImageData   = [];
        if (!empty($brandResults)) {
            $paidFranchisors = collect($brandResults->toArray()['data']);
            $imageFranchisor = $paidFranchisors->where('membership_type', 1)->pluck('franchisor_id');
            $sliderCheck     = FranchisorSliderTenure::query()
                ->select('franchisor_id')
                ->where('status', 1)
                ->where('end_date', '>=', date('Y-m-d H:i:s'))
                ->get()->pluck('franchisor_id');
            $franImageData = FranchisorSliderImage::query()
                ->select('franchisor_id', DB::raw('MAX(image_type_slider2) as image_type_slider2'), DB::raw('COUNT(franchisor_id) as count'))
                ->where('image_type_slider2', '!=', '')
                ->whereIn('franchisor_id', $imageFranchisor)
                ->whereIn('franchisor_id', $sliderCheck)
                ->where('status', 1)
                ->groupBy('franchisor_id')
                ->havingRaw('count > 3')
                ->get();
            // $franImageData   = FranchisorSliderImage::query()->select('franchisor_id', 'image_type_slider2', DB::raw('COUNT(franchisor_id) as count'))
            //     ->where('image_type_slider2', '!=', '')
            //     ->whereIn('franchisor_id', $imageFranchisor)
            //     ->whereIn('franchisor_id', $sliderCheck)
            //     ->where('status', 1)
            //     // ->groupBy('franchisor_id')
            //     ->groupBy('franchisor_id', 'image_type_slider2') // Include image_type_slider2 in the GROUP BY clause

            //     ->havingRaw('count > 3')
            //     ->get();
        }

        $shuffledResults = $brandResults->shuffle()->sortByDesc('membership_weightage');

        // dd($shuffledResults->pluck('company_name'));  
        if (!empty($catArr->seoTitle)) {
            $seoTitle = $catArr->seoTitle;
            // dd($catArr);
        } else {
            $seoTitle = $catArr->catname . ' - Franchise India';
            if (request()->segment(1) == 'hi')
                $seoTitle = $catArr->catname . ' - फ्रेंचाइज इंडिया';
        } 
        if (!empty($catArr->description))
            $seoDesc     = $catArr->description;

        if (!empty($catArr->keywords))
            $seoKeywords = $catArr->keywords;

        if ($cid[0] == 'ssc') {
            $seoTitle = sprintf('%s Business Opportunity in India – Franchise India', $catArr->catname);
            $seoDesc  = sprintf('Franchise India offers wide variety of %1$s franchise opportunities to run a successful %1$s franchise business. You can explore some of the established and well known %1$s franchises here.', $catArr->catname);
            if (request()->segment(1) == 'hi') {
                $seoTitle = sprintf('%s भारत में व्यावसायिक अवसर - फ्रेंचाइज इंडिया', $catArr->catname);
                $seoDesc  = sprintf('फ्रैंचाइज़ इंडिया विभिन्न प्रकार की पेशकश करता है %1$s फ्रेंचाइजी एक सफल चलाने के अवसर %1$s फ्रेंचाइजी का व्यवसाय। आप कुछ स्थापित और प्रसिद्ध का पता लगा सकते हैं %1$s यहां फ्रेंचाइजी मिली.', $catArr->catname);
            }
        }

        $ssc         = array();
        $mc          = $mainCatId;
        $sc          = $subCatId;
        $ssc[]       = $thirdCatId;
        $loc         = array();
        $ftype       = '';
        $orderby     = "";

        $view = 'category.category';
        if (request()->segment(1) == 'amp')
            $view = 'category.hindi-category.amp-category';

        if (request()->segment(1) == 'hi')
            $view = 'category.hindi-category.hindi-category';

        $chk_homebased = 0;

        if ($catArr->count() > 0) {
            $seoClass_subcat = (request()->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
            $catArr_subcat  = $seoClass_subcat->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')
                ->where('catid', $catArr->parent_id)
                ->first();
            if ($catArr_subcat != null && $catArr_subcat->count() > 0 && $catArr_subcat->parent_id == 7) {
                $chk_homebased = $catArr_subcat->parent_id;

                $seoTitle = 'Home Based Business ' . $seoTitle;
            }
        }

        // return view($view, compact('brandResults', 'shuffledResults', 'breadCrumb', 'catName', 'mc', 'sc', 'ssc', 'loc', 'ftype', 'seoTitle', 'seoDesc', 'seoKeywords','sortby','minRangeValue','maxRangevalue','orderby','text', 'searchq', 'franImageData', 'city', 'resultType', 'reqSt', 'chk_homebased'));


        return view($view, compact('brandResults', 'shuffledResults', 'breadCrumb', 'catName', 'mc', 'sc', 'ssc', 'loc', 'ftype', 'seoTitle', 'seoDesc', 'seoKeywords', 'sortby', 'minRangeValue', 'maxRangevalue', 'orderby', 'text', 'searchq', 'franImageData', 'city', 'chk_homebased'));
    }

    /**
     * @return array|string
     */
    public function getbrandSliderImages()
    {
        $images = FranchisorSliderImage::query()->select('image_type_slider2')
            ->where('franchisor_id', request()->franId)
            ->where('image_type_slider2', '!=', '')
            ->where('status', 1)
            ->get();
        if (empty($images))
            return "";

        $i               = 0;
        $data            = [];
        $images          = $images->pluck('image_type_slider2');
        $resultdata      = "<div class='popgallery'><div class='gallery' id='push-gallery'>";

        foreach ($images as $image) {
            $first       = $i == 0 ? "current" : "";
            $resultdata .= "<div class='gallery__img-block " . $first . "'><img src='" . $image . "' thumb-url='" . $image . "' alt='image'></div>";
            $i           = ++$i;
        }

        $resultdata     .= "<div class='gallery__controls'></div></div></div>";
        $data[0]         = $resultdata;
        $data[1]         = (!empty($expIntData) && $expIntData->visibility != 1) ? 1 : 0;

        return $data;
    }

    /**
     * @param $categoryIds
     */
    private function setSearchParams($categoryIds)
    {

        $catIds = explode('-', $categoryIds);
        $idsArray = array_slice($catIds, 1);

        if ($catIds[0] === "ssc") {
            request()->route()->setParameter('ssc', implode(",", $idsArray));
            foreach (Config('constants.subSubCategoryArr') as $key => $abc) {
                if (array_key_exists($idsArray[0], $abc)) {
                    request()->route()->setParameter('sc', $key);
                    break;
                }
            }
            foreach (Config('constants.subCategoryArr') as $key => $abc) {
                if (array_key_exists(request()->sc, $abc)) {
                    request()->route()->setParameter('mc', $key);
                    break;
                }
            }
        }
        if ($catIds[0] === "sc") {
            request()->route()->setParameter('sc', $idsArray[0]);
            foreach (Config('constants.subCategoryArr') as $key => $abc) {
                if (array_key_exists($idsArray[0], $abc)) {
                    request()->route()->setParameter('mc', $key);
                    break;
                }
            }
        }
        if ($catIds[0] === "mc") {
            request()->route()->setParameter('mc', $idsArray[0]);
        }
        if ($catIds[0] === 'loc') {
            request()->route()->setParameter('loc', $idsArray);
        }
        if ($catIds[0] === 'ft') {
            request()->route()->setParameter('ftype', $idsArray[0]);
        }
        if ($catIds[0] === 'range') {
            request()->route()->setParameter('minrange', $idsArray[0]);
            request()->route()->setParameter('maxrange', $idsArray[1]);
            // dd( $idsArray[0]);
        }
        if ($catIds[0] === 'ct') {
            $_city = str_replace('ct-', '', $categoryIds);
            request()->route()->setParameter('city', str_replace('-', ' ', $_city));
        }
    }


    public function pricefilter(Request $request)
{
    $minrange = $request->input('minvaluerange');
    $maxrange = $request->input('maxvaluerange');
   
$shuffledResults = FranchisorBusinessDetail::query()->select(
    'fran_detail_id',
    'franchisor_id',
    'profile_name',
    'company_name',
    'state',
    'ind_sub_cat',
    'operations_start_year',
    'looking_tradepartner',
    'looking_franchise',
    'membership_weightage',
    'franchise_start_year',
    'no_fran_outlets',
    'franchise_partner_type',
    'city',
    'unit_investment',
    'expansion_loc_type',
    'business_desc',
    'membership_plan',
    'prop_area_min',
    'prop_area_max',
    'profile_status',
    'business_desc',
    'ind_main_cat',
    'ind_cat',
    'ind_sub_cat',
    'membership_type',
    'company_logo',
    'unit_inv_min',
    'unit_inv_max',
    'is_hindi',
    'business_desc_hindi',
    'free_logo_visibility',
    'brand_verified',
    'views',
    'activated_at'
)
->whereIn('profile_status', [1, 11])
->where('membership_type', 1)
// ->sortByDesc('membership_weightage')
// ->get();
->paginate(10); // Fetch the results as a collection

// $shuffledResults = $franData->shuffle()->sortByDesc('membership_weightage');


    if ($request->ajax()) {
        return response()->json([
            'html' => view('ssr.listing', compact('shuffledResults'))->render(),
            'next_page' => $shuffledResults->nextPageUrl(), // Next page URL for AJAX request
        ]);
    }
    return view('ssr.category', compact('shuffledResults'));
}

public function getajax(){
    return view('category.ssr');
}
public function fetchtest(Request $request)
{
    $items = FranchisorBusinessDetail::paginate(5);  // Adjust the pagination number as needed

        if ($request->ajax()) {
            // Return the paginated view with data
            dd('test');
            return response()->json(view('ssr.data', compact('items'))->render());
        }

        // Regular page load
        return view('ssr.index', compact('items'));
    
}
public function index(Request $request)
{
    // $items = FranchisorBusinessDetail::paginate(5); // 10 items per page
    $items = FranchisorBusinessDetail::query()->select(
        'fran_detail_id',
        'franchisor_id',
        'profile_name',
        'company_name',
        'state',
        'ind_sub_cat',
        'operations_start_year',
        'looking_tradepartner',
        'looking_franchise',
        'membership_weightage',
        'franchise_start_year',
        'no_fran_outlets',
        'franchise_partner_type',
        'city',
        'unit_investment',
        'expansion_loc_type',
        'business_desc',
        'membership_plan',
        'prop_area_min',
        'prop_area_max',
        'profile_status',
        'business_desc',
        'ind_main_cat',
        'ind_cat',
        'ind_sub_cat',
        'membership_type',
        'company_logo',
        'unit_inv_min',
        'unit_inv_max',
        'is_hindi',
        'business_desc_hindi',
        'free_logo_visibility',
        'brand_verified',
        'views',
        'activated_at'
    )
    ->whereIn('profile_status', [1, 11])
    ->where('membership_type', 1)
    // ->sortByDesc('membership_weightage')
    // ->get();
    ->paginate(10); 

    // If the request is an AJAX request
    if ($request->ajax()) {
        return response()->json([
            'html' => view('ssr.pagination', compact('items'))->render(),
            'next_page' => $items->nextPageUrl(), // Next page URL for AJAX request
        ]);
    }

    return view('ssr.index', compact('items'));
}
}

