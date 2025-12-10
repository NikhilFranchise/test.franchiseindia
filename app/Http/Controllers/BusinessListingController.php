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
use App\Models\EventLocPopup;
use App\Models\Regional\DealerRegional;
use App\Models\Regional\FranchiseRegional;
use App\Models\Regional\RegionalFranchisorSliderTenure;
use App\Models\Regional\RegionalFranPaymentHistory;
use App\Models\SearchMonitor;
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
            ->whereIn('profile_status', [1, 11])
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
        $franData = FranchisorBusinessDetail::query()->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name', 'state', 'ind_sub_cat', 'operations_start_year', 'looking_tradepartner', 'looking_franchise', 'membership_weightage', 'franchise_start_year', 'no_fran_outlets', 'franchise_partner_type', 'city', 'unit_investment', 'expansion_loc_type', 'business_desc', 'membership_plan', 'prop_area_min', 'prop_area_max', 'profile_status', 'business_desc', 'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'membership_type', 'company_logo', 'unit_inv_min', 'unit_inv_max', 'is_hindi', 'business_desc_hindi', 'free_logo_visibility', 'brand_verified', 'views', 'activated_at');

        $franData->whereIn('profile_status', [1, 11]);

        $city = "";
        if (!empty(request()->city)) {
            $city = ucwords(str_replace('-', ' ', request()->city));

            $stateNames = config('location.StateCity.' . $city);
            // dd($stateNames);
            $loc_id = array_search($stateNames, config('location.stateArr'));
            // dd($loc_id);
            $today = Carbon::today()->toDateString();
            // dd($today);   
            $popup = EventLocPopup::where('location', $loc_id)
                ->where('start_date', '<=', $today)  // start_date <= today
                ->where('end_date', '>=', $today)    // end_date <= today
                ->where('status', 1)
                ->get();
            // dd($popup);
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
            'city',
            'popup'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchBusinessListing(Request $request)
    {
        // dd('test');
        $searchTerm = $request->route('searchTerm');
        $categoryIds = $request->route('categoryIds');
        $locationIds = $request->route('locationIds');
        $requestUri = $request->getRequestUri();
        $segments = explode('/', $requestUri);
        // Check if the segments array has at least 4 elements
        $segment = isset($segments[3]) ? $segments[3] : null;
        preg_match('/\.LOC(\d+)/', $segments[2], $matches);
        $loc_id = $matches[1] ?? null;

        $today = Carbon::today()->toDateString();
        $popup = EventLocPopup::where('location', $loc_id)
            ->where('start_date', '<=', $today)  // start_date <= today
            ->where('end_date', '>=', $today)    // end_date <= today
            ->where('status', 1)
            ->get();

        // --- Set Search Parameters ---
        foreach (['franchiseType', 'categoryIds', 'locationIds', 'range'] as $param) {
            if (!empty($request->$param)) {
                $this->setSearchParams($request->$param);
            }
        }

        // Initialize the variables
        $seoTitle = '';
        $seoDesc = '';
        $year = date('Y'); // Get the current year
        // dd($year);
        if ($segment) {
            $priceRanges = [
                "range-10000-100000" => [
                    'title' => "Top Franchises Under 1 Lakh in India: Affordable Business Opportunities $year",
                    'desc'  => "Discover the top franchises available under 1 lakh in India for $year. Invest in affordable, high-return business opportunities ideal for first-time entrepreneurs. Begin your successful business journey today!"
                ],
                "range-10000-200000" => [
                    'title' => "Top Franchises Under 2 Lakhs in India: Affordable Investments $year",
                    'desc'  => "Explore high-potential franchises available under 2 lakhs in India for $year. Seize low-cost, profitable business opportunities perfect for emerging entrepreneurs. Start your entrepreneurial journey now!"
                ],
                "range-10000-300000" => [
                    'title' => "Best Franchises Under 3 Lakhs in India: Start Your Business in $year",
                    'desc'  => "Discover leading franchises under 3 lakhs in India for $year. Invest in cost-effective, scalable business opportunities suitable for aspiring entrepreneurs. Launch your successful venture today!"
                ],
                "range-10000-500000" => [
                    'title' => "Top Franchises Under 5 Lakhs in India: High ROI Business Opportunities $year",
                    'desc'  => "Explore the best franchises available under 5 lakhs in India for $year. Discover affordable, high-return business ventures perfect for budding entrepreneurs. Start your profitable journey today!"
                ],
                "range-10000-1000000" => [
                    'title' => "Best Franchises Under 10 Lakhs in India: Lucrative Opportunities $year",
                    'desc'  => "Uncover top franchises available under 10 lakhs in India for $year. Choose from profitable, low-cost business opportunities ideal for new entrepreneurs. Begin your successful journey now!"
                ],
                "range-10000-1500000" => [
                    'title' => "Top Franchises Under 15 Lakhs in India: Affordable Business Ventures $year",
                    'desc'  => "Explore affordable franchises under 15 lakhs in India for $year. Seize low-investment, high-return business opportunities perfect for first-time entrepreneurs. Start building your business empire today!"
                ],
                "range-10000-2000000" => [
                    'title' => "Best Franchises Under 20 Lakhs in India: Smart Business Choices $year",
                    'desc'  => "Explore leading franchises under 20 lakhs in India for $year. Choose from cost-effective, high-return business opportunities perfect for savvy entrepreneurs looking to make a mark. Start your profitable venture today!"
                ],
                "range-10000-2500000" => [
                    'title' => "Top Franchises Under 25 Lakh in India: Affordable Business Opportunities $year",
                    'desc'  => "Discover leading franchises under 25 lakhs in India for $year. Invest in cost-effective, high-potential business opportunities suitable for savvy entrepreneurs. Launch your profitable venture today!"
                ],
                "range-10000-3000000" => [
                    'title' => "Top Franchises Under 30 Lakhs in India: Ideal Investments $year",
                    'desc'  => "Explore the most promising franchises under 30 lakhs in India for $year. Find affordable, scalable business opportunities perfect for emerging entrepreneurs. Kickstart your entrepreneurial success now!"
                ],
                "range-10000-5000000" => [
                    'title' => "Best Franchises Under 50 Lakhs in India: Profitable Investments $year",
                    'desc'  => "Discover top franchises available under 50 lakhs in India for $year. Secure profitable and sustainable business opportunities ideal for growth-focused entrepreneurs. Start your journey to success today!"
                ],
                "range-10000-10000000" => [
                    'title' => "Top Franchises Under 1 Crore in India: Lucrative Business Opportunities $year",
                    'desc'  => "Uncover leading franchises under 1 crore in India for $year. Invest in high-return business opportunities suited for ambitious entrepreneurs. Begin your profitable venture now!"
                ]
            ];
        }


        $seoTitle = $priceRanges[$segment]['title'] ?? '';
        $seoDesc  = $priceRanges[$segment]['desc'] ?? '';
        $seoKeywords = '';
        // Initialize variables
        $mainCatId = $request->mc;
        $subCatId = $request->sc;
        $thirdCatId = $request->ssc;
        $catId = 0;
        $catType = $request->ftype;
        $breadCrumb = '';
        $locArrKey = array();
        $searchq = '';
        $text = "";
        $catTabResult = $locTabResult = $invTabResult = 0;
        $minCost = $maxCost = 0;
        $loc = '';

        // Check for language (Hindi or English)
        $isHindi = $request->segment(1) == 'hi';

        // Initialize default SEO variables
        $seoTitle = $seoDesc = $seoKeywords = '';
        $locName = 'India';

        // Set the location name based on selected location
        if (!empty($request->loc) && count($request->loc) == 1) {
            $locName = Config('location.stateArr.' . $request->loc[0]);
            if ($isHindi) {
                $locName = Config('location.hindiStatesArr.' . $locName);
            }
        }

        // Handle the tab results
        $catTabResult = !empty($request->catTab) ? 1 : 0;
        $locTabResult = !empty($request->locTab) ? 1 : 0;
        $invTabResult = !empty($request->invTab) ? 1 : 0;

        // Set category ID and name
        if (!empty($mainCatId) && empty($subCatId) && empty($thirdCatId)) {
            $catId = $mainCatId;
            $catType = 'mc';
            $catName = $isHindi ? Config('hindiConstants.CategoryArr.' . $catId) : Config('constants.CategoryArr.' . $catId);
        }

        if (!empty($subCatId) && empty($thirdCatId)) {
            $catId = $subCatId;
            $catType = 'sc';
            $catName = $isHindi ? Config('hindiConstants.subCategoryArr.' . $mainCatId . '.' . $subCatId) : Config('constants.subCategoryArr.' . $mainCatId . '.' . $subCatId);
        }

        if (!empty($thirdCatId)) {
            $catId = $thirdCatId;
            $catType = 'ssc';
            $catName = $isHindi ? Config('hindiConstants.subCategoryArr.' . $mainCatId . '.' . $subCatId) : Config('constants.subCategoryArr.' . $mainCatId . '.' . $subCatId);
        }

        // Default SEO for 'all' category
        if ($request->segment(2) == 'all' && $request->segment(3) == 'all') {
            $seoTitle = $isHindi ? 'व्यवसाय के अवसर - फ्रेंचाइजी इंडिया' : 'Business Opportunities - Franchise India';
            $seoDesc = $isHindi ? '15000+ व्यावसायिक अवसर खोजें' : 'Find 15000+ business opportunities';
            $seoKeywords = $isHindi ? 'व्यवसाय के अवसर' : 'Business opportunities';
        }

        // Handle franchise type and location
        $businessOpp = $isHindi ? 'व्यवसाय के अवसर' : 'Business Opportunities';
        $in = $isHindi ? 'इन' : 'in';

        // Franchise type SEO handling
        if (!empty($request->ftype)) {
            $fTypeName = $isHindi ? Config('hindiConstants.masterfranchiseType')[$request->ftype] : Config('constants.masterfranchiseType')[$request->ftype];
            $seoTitle = "$businessOpp $fTypeName - Franchise India";

            if (!empty($request->loc) && count($request->loc) == 1) {
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";
                if ($isHindi) {
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                }
            } else if (!empty($request->loc) && count($request->loc) > 1) {
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";
                if ($isHindi) {
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                }
            }
        }

        // Category-specific SEO handling
        if (!empty($catId)) {
            $seoClass = $isHindi ? CategoryFinalHindi::query() : CategoryFinal::query();
            $catArr = $seoClass->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')->where('catid', $catId)->first();

            if ($catArr) {
                // Build base title and description
                $baseTitle = $catArr->catname . ' ' . $businessOpp;
                $baseDesc = "Franchise India provides $catArr->catname franchise opportunities, business opportunities, business ideas.";

                // Add franchise type if available
                if (!empty($fTypeName)) {
                    $baseTitle .= " $fTypeName";
                    $baseDesc .= " Buy $catArr->catname Franchise with affordable range.";
                }

                // Handle location-specific title and description
                if (!empty($request->loc)) {
                    if (count($request->loc) == 1) {
                        $seoTitle = "$baseTitle $in $locName - Franchise India";
                        $seoDesc = "$baseDesc in $locName";
                        if ($isHindi) {
                            $seoTitle = "$baseTitle $in $locName - फ्रेंचाइजी भारत";
                            $seoDesc = "$baseDesc भारत में $locName";
                        }
                    } else {
                        $seoTitle = "$baseTitle $in $locName - Franchise India";
                        $seoDesc = "$baseDesc across India";
                        if ($isHindi) {
                            $seoTitle = "$baseTitle $in $locName - फ्रेंचाइजी भारत";
                            $seoDesc = "$baseDesc भारत में";
                        }
                    }
                } else {
                    $seoTitle = "$baseTitle - Franchise India";
                    $seoDesc = "$baseDesc across India";
                }

                // Override with SEO title and description from the category
                if (!empty($catArr->seoTitle)) {
                    $seoTitle = $catArr->seoTitle;
                }
                if (!empty($catArr->description)) {
                    $seoDesc = $catArr->description;
                }
                if (!empty($catArr->keywords)) {
                    $seoKeywords = $catArr->keywords;
                }
            }
        }

        // Default values for min and max range
        $minRangeValue = 0;
        $maxRangevalue = 100000000;
        $seoTitle = $seoKeywords = $seoDesc = '';

        // Define price ranges
        $priceRanges = [
            'under-50k'   => ['min' => 10000, 'max' => 50000, 'title' => 'Business Opportunities Under Rs 10000 to 50000'],
            'under-2lac'  => ['min' => 50000, 'max' => 200000, 'title' => 'Business Opportunities Under Rs 50000 to 2 lakhs'],
            'under-5lac'  => ['min' => 200000, 'max' => 500000, 'title' => 'Business Opportunities Under Rs 2 lakhs to 5 lakhs'],
            'under-10lac' => ['min' => 500000, 'max' => 1000000, 'title' => 'Business Opportunities Under Rs 5 lakhs to 10 lakhs'],
            'under-20lac' => ['min' => 1000000, 'max' => 2000000, 'title' => 'Business Opportunities Under Rs 10 lakhs to 20 lakhs'],
            'under-30lac' => ['min' => 2000000, 'max' => 3000000, 'title' => 'Business Opportunities Under Rs 20 lakhs to 30 lakhs'],
            'under-50lac' => ['min' => 3000000, 'max' => 5000000, 'title' => 'Business Opportunities Under Rs 30 lakhs to 50 lakhs'],
            'under-1cr'   => ['min' => 5000000, 'max' => 10000000, 'title' => 'Business Opportunities Under Rs 50 lakhs to 1 cr'],
            'under-2cr'   => ['min' => 10000000, 'max' => 20000000, 'title' => 'Business Opportunities Under Rs 1 cr to 2 cr'],
            'under-5cr'   => ['min' => 20000000, 'max' => 50000000, 'title' => 'Business Opportunities Under Rs 2 cr to 5 cr'],
            '5cr-or-above' => ['min' => 50000000, 'max' => 100000000, 'title' => 'Business Opportunities Under franchises 5 cr or above'],
        ];

        // Check if the price range exists in the predefined ranges
        $priceRange = $request->price_range;
        if (array_key_exists(strtolower($priceRange), $priceRanges)) {
            $range = $priceRanges[strtolower($priceRange)];
            $minRangeValue = $range['min'];
            $maxRangevalue = $range['max'];
            $seoTitle = $range['title'];
            $seoKeywords = "business opportunities, {$range['title']}";
            $seoDesc = "Find {$range['title']}";
        }

        // Handle language-specific SEO titles/descriptions
        if ($isHindi) {
            $hiTitles = [
                'under-50k'   => ['title' => '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर', 'desc' => '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-2lac'  => ['title' => '50 हज़ार से 2 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '50 हज़ार से 2 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-5lac'  => ['title' => '2 लाख से 5 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '2 लाख से 5 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-10lac' => ['title' => '5 लाख से 10 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '5 लाख से 10 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-20lac' => ['title' => '10 लाख से 20 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '10 लाख से 20 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-30lac' => ['title' => '20 लाख से 30 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '20 लाख से 30 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-50lac' => ['title' => '30 लाख से 50 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '30 लाख से 50 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-1cr'   => ['title' => '50 लाख से 1 करोड़ रुपये के बीच व्यावसायिक अवसर', 'desc' => '50 लाख से 1 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-2cr'   => ['title' => '1 करोड़ से 2 करोड़ रुपये के बीच व्यावसायिक अवसर', 'desc' => '1 करोड़ से 2 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-5cr'   => ['title' => '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर', 'desc' => '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                '5cr-or-above' => ['title' => 'फ्रैंचाइजी के बीच व्यवसाय के अवसर- 5 करोड़ से ऊपर', 'desc' => 'फ्रैंचाइजी-5 करोड़ या उससे अधिक के बीच व्यवसाय के अवसर खोजें'],
            ];

            if (array_key_exists(strtolower($priceRange), $hiTitles)) {
                $seoTitle = $hiTitles[strtolower($priceRange)]['title'];
                $seoDesc = $hiTitles[strtolower($priceRange)]['desc'];
            }
        }

        // Handle custom price range from request
        if (!empty($request->minrange)) {
            $minRangeValue = $request->minrange;
        }

        if (!empty($request->maxrange)) {
            $maxRangevalue = $request->maxrange;
        }

        if (!empty($request->min_cost)) {
            $minRangeValue = Config('constants.InvestRange.' . $request->min_cost . '.min');
            $minCost = $request->min_cost;
        }

        if (!empty($request->max_cost)) {
            $maxRangevalue = Config('constants.InvestRange.' . $request->max_cost . '.min');
            $maxCost = $request->max_cost;
        }

        // Validate min and max ranges
        if ($minRangeValue > $maxRangevalue) {
            $maxRangevalue = 100000000;
            $minRangeValue = 10000;
        }

        // Sorting
        $orderby = $request->sortby;


        // Initialize default variables
        $seoTitle = $seoKeywords = $seoDesc = $loc = $catName = '';
        $currentDate = Carbon::now()->format('Y');

        // Handle state_code for SEO
        if (!empty(request()->state_code)) {
            $locId = preg_split('#(?<=[a-z])(?=\d)#i', request()->state_code);
            $locArrKey = explode(',', $locId[1]);
            $stateName = Config('location.stateArr.' . $locArrKey[0]);

            // Generate SEO values
            $seoTitle = "Business Opportunities in {$stateName} for {$currentDate} (High Profit Making)";
            $seoKeywords = "Best Business in {$stateName}, Business Opportunities in {$stateName}, New Business Opportunities in {$stateName}, Small Business Opportunities in {$stateName}, Franchise Opportunities in {$stateName}, Profitable Business Ideas in {$stateName}";
            $seoDesc = "Profitable Business Opportunities in {$stateName}. Explore Franchise Opportunities in {$stateName} & Start your own business in {$stateName} with FranchiseIndia today!";

            // Handle Hindi segment specific SEO
            if ($isHindi) {
                $stateInHindi = Config('location.hindiStatesArr')[$stateName];
                $seoTitle = "{$stateInHindi} में व्यवसाय के अवसर - फ्रेंचाइजी भारत";
                $seoKeywords = "{$stateInHindi} में व्यापार के अवसर, व्यापार के अवसर";
                $seoDesc = "{$stateInHindi} में व्यवसाय के अवसरों का पता लगाएं";
            }

            $loc = $locArrKey;
        }

        // Handle location-specific logic
        if (!empty(request()->loc)) {
            $locArrKey = is_array(request()->loc) ? implode(',', request()->loc) : request()->loc;
            $locArrKey = explode(',', $locArrKey);
            $loc = $locArrKey;
        }

        // Fetch franchise type, category, and subcategory
        $franType = request()->ftype ?? null;
        $mainCatId = request()->mc ?? null;
        $subCatId = request()->sc ?? null;

        // Handle SSC parameter and explode into array if necessary
        $thirdCatIdArr = !empty(request()->ssc) ? (is_array(request()->ssc) ? request()->ssc : explode(',', request()->ssc)) : [];

        // Set default category name if it's not set
        if (empty($catId)) {
            $catName = ($isHindi) ? 'बिज़नेस  ओप्पोर्तुनिटीज़' : 'Business Opportunities';
        }
        // Fetch Brand Data
        $franData = FranchisorBusinessDetail::query()->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name', 'state', 'ind_sub_cat', 'operations_start_year', 'looking_tradepartner', 'looking_franchise', 'membership_weightage', 'franchise_start_year', 'no_fran_outlets', 'franchise_partner_type', 'city', 'unit_investment', 'expansion_loc_type', 'business_desc', 'membership_plan', 'prop_area_min', 'prop_area_max', 'profile_status', 'business_desc', 'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'membership_type', 'company_logo', 'unit_inv_min', 'unit_inv_max', 'is_hindi', 'business_desc_hindi', 'free_logo_visibility', 'brand_verified', 'views', 'activated_at')->whereIn('profile_status', [1, 11]);

        // Handle text search
        if ($text = request()->text) {
            $text = str_replace('-or-', '/', $text);
            $catId = CategoryFinal::where('catname', $text)->first();

            if ($catId) {
                $type = $catId->parent_id ? (CategoryFinal::where('catid', $catId->parent_id)->whereNull('parent_id')->exists() ? 'sc' : 'ssc') : 'm';
                return redirect("business-opportunities/" . Str::slug($catId->catname) . '.' . $type . $catId->catid);
            }

            $franData->where('company_name', 'like', "%{$text}%");
        }

        // Handle search query
        if ($searchq = request()->searchq) {
            $franData->where('company_name', 'LIKE', "%{$searchq}%");
        }

        // Filter by category type
        switch ($catType) {
            case 'ssc':
                $franData->whereIn('ind_sub_cat', $thirdCatIdArr);
                break;
            case 'sc':
                $franData->where('ind_cat', $catId);
                break;
            case 'mc':
                $franData->where('ind_main_cat', $catId);
                break;
        }

        // Filter by franchise type
        if ($franType) {
            $franData->where('franchise_partner_type', $franType);
        }
        $mc    = $mainCatId;
        $sc    = $subCatId;
        $ssc   = request()->ssc;
        $ftype = request()->ftype;
        // Handle location filters
        if ($locArrKey = request()->loc) {
            $stateNames = array_map(fn($val) => config('location.stateArr.' . $val), $locArrKey);
            $franData->where(function ($query) use ($stateNames) {
                $query->where('expansion_location', 'LIKE', '%' . $stateNames[0] . '%');
                foreach (array_slice($stateNames, 1) as $state) {
                    $query->orWhere('expansion_location', 'LIKE', '%' . $state . '%');
                }
            });
        }
        $city = "";
        if (request()->city) {
            /*
            $city = request()->city;
            $cityArr = FranchisorLocState::query()->distinct('franchisor_id')
                ->where('city', request()->city)
                ->get()
                ->pluck('franchisor_id')
                ->toArray();

            $franData->whereIn('franchisor_id', $cityArr)->get();
        */
        }
        // Handle low-cost business filter
        if (request()->lowcost === "lowcost") {
            $seoTitle = 'Low Cost Business Opportunities - Franchise India';
            $seoKeywords = 'low cost Franchise, low cost business opportunities';
            $seoDesc = 'Start your business with low cost franchise business opportunities.';
            $catName = "Low Cost Business Opportunities";

            if ($isHindi) {
                $seoTitle = 'कम लागत के व्यवसाय के अवसर - फ्रेंचाइजी भारत';
                $seoKeywords = 'कम लागत वाले फ्रेंचाइजी, कम लागत वाले व्यवसाय के अवसर';
                $seoDesc = 'कम लागत वाली फ्रेंचाइज़ी के व्यावसायिक अवसरों के साथ अपना व्यवसाय शुरू करें।';
                $catName = "कम लागत व्यापार अवसर";
            }

            $minRangeValue = 0;
            $maxRangevalue = 500000;
        }

        // Handle investment range
        if (!empty($request->investment) && is_numeric($request->investment)) {
            $minRangeValue = Config('constants.InvestRange.' . $request->investment . '.min');
            $maxRangevalue = Config('constants.InvestRange.' . $request->investment . '.max');
        }

        $franData->whereBetween('unit_inv_max', [$minRangeValue, $maxRangevalue]);

        // Sorting logic
        switch ($orderby) {
            case 1:
                $franData->orderBy('fran_detail_id', 'desc');
                break;
            case 2:
                $franData->orderBy('company_name', 'asc');
                break;
            case 3:
                $franData->orderBy('views', 'desc');
                break;
            default:
                $franData->orderBy('membership_weightage', 'desc');
        }

        // Pagination
        $count = (request()->segment(1) == 'amp') ? 20 : 21;
        $brandResults = $franData->paginate($count);
        $currentPage = $brandResults->currentPage();
        $lastPage = $brandResults->lastPage();

        // Redirect if current page exceeds last page
        if ($currentPage > $lastPage) {
            return redirect(url()->current());
        }

        $shuffledResults = $brandResults->shuffle()->sortByDesc('membership_weightage');

        // SEO and other meta data
        $franImageData = [];

        // Retrieve franchisors with images
        if ($brandResults->isNotEmpty()) {
            $paidFranchisors = collect($brandResults->items())->where('membership_type', 1)->pluck('franchisor_id');
            $sliderCheck = FranchisorSliderTenure::where('status', 1)
                ->where('end_date', '>=', now())
                ->get()->pluck('franchisor_id');
            // 3️ Regional paid franchisors
            $franchiseRegional = RegionalFranPaymentHistory::query()->select('franchisor_id')->where('status', 1)->pluck('franchisor_id')->unique();

            // 4️ Regional slider tenure check
            $regionalSliderCheck = RegionalFranchisorSliderTenure::query()->select('franchisor_id')->where('status', 1)->where('end_date', '>=', now())->pluck('franchisor_id')->unique();

            // merge all eligible ids
            $eligibleFranchisors = collect()->merge($paidFranchisors)->merge($franchiseRegional)->merge($sliderCheck)->merge($regionalSliderCheck)->unique()->values();

            // 5) fetch aggregated slider images (same grouping/having as original)
            if ($eligibleFranchisors->isNotEmpty()) {
                $franImageData = FranchisorSliderImage::query()->select('franchisor_id', DB::raw('MAX(image_type_slider2) as image_type_slider2'), DB::raw('COUNT(franchisor_id) as count'))->where('image_type_slider2', '!=', '')->whereIn('franchisor_id', $eligibleFranchisors)->where('status', 1)->groupBy('franchisor_id')->havingRaw('count > 3')->get();
            }
        }

        // Set view based on segment
        $view = 'category.category';
        if (request()->segment(1) == 'amp') $view = 'category.hindi-category.amp-category';
        if (request()->segment(1) == 'hi') $view = 'category.hindi-category.hindi-category';

        // Return the view with necessary data
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
            'city',
            'popup'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBusinessListing(Request $request)
    {
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
        //These are the dealer categories where brands are not present so its redirected to all, and commented from constant file and category file
        $redirectCatids = [
            1024,
            1025,
            1026,
            1029,
            1032,
            1035,
            1037,
            1039,
            1043,
            1044,
            1046,
            1080,
            967,
            1087,
            1094,
            899,
            906,
            1096,
            1097,
            1098,
            1104,
            1105,
            1114,
            856,
            1125,
            1126,
            1127,
            892,
            1132,
            1133,
            1134,
            946,
            949,
            743,
            747,
            1144,
            1145,
            1147,
            1149,
            1154,
            1170,
            1172,
            1174,
            1175,
            1210,
            1213,
            1214,
            1215,
            1217,
            1220,
            1223,
            1225,
            1226,
            1227,
            1047,
            1053,
            1057,
            1061,
            1066,
            1067,
            1070,
            1072,
            1116,
            1119,
            1123,
            1135,
            1137,
            1139,
            1140,
            1141,
            1142,
            1156,
            1177,
            1181,
            1182,
            1184,
            1185,
            1188,
            1191,
            1194,
            1195,
            1196,
            1197,
            1198,
            1199,
            1208,
            1209,
            1231,
            1232,
            1235,
            1238,
            1240,
            1241,
            1242,
            1243,
            1244,
            1159,
            1160,
            1162,
            1163
        ];

        if ($catArr == null || in_array($cid[1], $redirectCatids))
            // if ($catArr == null)
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
            ->whereIn('profile_status',  [1, 11]);


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

        return view($view, compact('brandResults', 'shuffledResults', 'breadCrumb', 'catName', 'mc', 'sc', 'ssc', 'loc', 'ftype', 'seoTitle', 'seoDesc', 'seoKeywords', 'sortby', 'minRangeValue', 'maxRangevalue', 'orderby', 'text', 'searchq', 'franImageData', 'city', 'chk_homebased'));
    }


    //pankaj function normalization

    public function searchBusinessListingnormalization(Request $request)
    {
        // Get the requested URL and segments
        $url = $request->url();
        $requestUri = $request->getRequestUri();
        $segments = explode('/', $requestUri);

        // Extract the lowcost and segment from the request
        $lowcost = $request->lowcost;
        preg_match('/[a-zA-Z]+(\d+)/', $lowcost, $matches);
        $lastIntegers = $matches[1] ?? null; // Get the last set of integers from lowcost parameter
        $segment = $segments[3] ?? null;    // Get the fourth URL segment if available

        // Define SEO category configurations
        $seoCategories = Config('category.SeoCategoryArr');
        $seoSubCategories = Config('category.SeoSubCategoryArr');
        $seoSubSubCategories = Config('category.SeoSubSubCategoryArr');

        // Redirect if lastIntegers match a category, subcategory, or sub-subcategory
        if ($lastIntegers) {
            // Check in SEO categories first
            if (array_key_exists($lastIntegers, $seoCategories)) {
                $category = $seoCategories[$lastIntegers];
                $newUrl = "/business-opportunities/{$category}.m{$lastIntegers}";
                return redirect($newUrl, 301);
            }

            // Check in SEO subcategories
            if (array_key_exists($lastIntegers, $seoSubCategories)) {
                $category = $seoSubCategories[$lastIntegers];
                $newUrl = "/business-opportunities/{$category}.sc{$lastIntegers}";
                return redirect($newUrl, 301);
            }

            // Check in SEO sub-subcategories
            if (array_key_exists($lastIntegers, $seoSubSubCategories)) {
                $category = $seoSubSubCategories[$lastIntegers];
                $newUrl = "/business-opportunities/{$category}.ssc{$lastIntegers}";
                return redirect($newUrl, 301);
            }
        }
        // --- Set Search Parameters ---
        foreach (['franchiseType', 'categoryIds', 'locationIds', 'range'] as $param) {
            if (!empty($request->$param)) {
                $this->setSearchParams($request->$param);
            }
        }
        // Initialize the variables
        $seoTitle = '';
        $seoDesc = '';
        $year = date("Y"); // Get the current year
        if ($segment) {
            $priceRanges = [
                "range-10000-100000" => [
                    'title' => "Top Franchises Under 1 Lakh in India: Affordable Business Opportunities $year",
                    'desc'  => "Discover the top franchises available under 1 lakh in India for $year. Invest in affordable, high-return business opportunities ideal for first-time entrepreneurs. Begin your successful business journey today!"
                ],
                "range-10000-200000" => [
                    'title' => "Top Franchises Under 2 Lakhs in India: Affordable Investments $year",
                    'desc'  => "Explore high-potential franchises available under 2 lakhs in India for $year. Seize low-cost, profitable business opportunities perfect for emerging entrepreneurs. Start your entrepreneurial journey now!"
                ],
                "range-10000-300000" => [
                    'title' => "Best Franchises Under 3 Lakhs in India: Start Your Business in $year",
                    'desc'  => "Discover leading franchises under 3 lakhs in India for $year. Invest in cost-effective, scalable business opportunities suitable for aspiring entrepreneurs. Launch your successful venture today!"
                ],
                "range-10000-500000" => [
                    'title' => "Top Franchises Under 5 Lakhs in India: High ROI Business Opportunities $year",
                    'desc'  => "Explore the best franchises available under 5 lakhs in India for $year. Discover affordable, high-return business ventures perfect for budding entrepreneurs. Start your profitable journey today!"
                ],
                "range-10000-1000000" => [
                    'title' => "Best Franchises Under 10 Lakhs in India: Lucrative Opportunities $year",
                    'desc'  => "Uncover top franchises available under 10 lakhs in India for $year. Choose from profitable, low-cost business opportunities ideal for new entrepreneurs. Begin your successful journey now!"
                ],
                "range-10000-1500000" => [
                    'title' => "Top Franchises Under 15 Lakhs in India: Affordable Business Ventures $year",
                    'desc'  => "Explore affordable franchises under 15 lakhs in India for $year. Seize low-investment, high-return business opportunities perfect for first-time entrepreneurs. Start building your business empire today!"
                ],
                "range-10000-2000000" => [
                    'title' => "Best Franchises Under 20 Lakhs in India: Smart Business Choices $year",
                    'desc'  => "Explore leading franchises under 20 lakhs in India for $year. Choose from cost-effective, high-return business opportunities perfect for savvy entrepreneurs looking to make a mark. Start your profitable venture today!"
                ],
                "range-10000-2500000" => [
                    'title' => "Top Franchises Under 25 Lakh in India: Affordable Business Opportunities $year",
                    'desc'  => "Discover leading franchises under 25 lakhs in India for $year. Invest in cost-effective, high-potential business opportunities suitable for savvy entrepreneurs. Launch your profitable venture today!"
                ],
                "range-10000-3000000" => [
                    'title' => "Top Franchises Under 30 Lakhs in India: Ideal Investments $year",
                    'desc'  => "Explore the most promising franchises under 30 lakhs in India for $year. Find affordable, scalable business opportunities perfect for emerging entrepreneurs. Kickstart your entrepreneurial success now!"
                ],
                "range-10000-5000000" => [
                    'title' => "Best Franchises Under 50 Lakhs in India: Profitable Investments $year",
                    'desc'  => "Discover top franchises available under 50 lakhs in India for $year. Secure profitable and sustainable business opportunities ideal for growth-focused entrepreneurs. Start your journey to success today!"
                ],
                "range-10000-10000000" => [
                    'title' => "Top Franchises Under 1 Crore in India: Lucrative Business Opportunities $year",
                    'desc'  => "Uncover leading franchises under 1 crore in India for $year. Invest in high-return business opportunities suited for ambitious entrepreneurs. Begin your profitable venture now!"
                ]
            ];
        }
        $seoTitle = $priceRanges[$segment]['title'] ?? '';
        $seoDesc  = $priceRanges[$segment]['desc'] ?? '';
        $seoKeywords = '';
        $catArr = '';

        // Initialize variables
        $mainCatId = $request->mc;
        $subCatId = $request->sc;
        $thirdCatId = $request->ssc;
        $catId = 0;
        $catType = $request->ftype;
        $breadCrumb = '';
        $locArrKey = array();
        $searchq = '';
        $text = "";
        $catTabResult = $locTabResult = $invTabResult = 0;
        $minCost = $maxCost = 0;
        $loc = '';
        // Check for language (Hindi or English)
        $isHindi = $request->segment(1) == 'hi';

        // Initialize default SEO variables
        $seoTitle = $seoDesc = $seoKeywords = '';
        $locName = 'India';
        // Set the location name based on selected location
        if (!empty($request->loc) && count($request->loc) == 1) {
            $locName = Config('location.stateArr.' . $request->loc[0]);
            if ($isHindi) {
                $locName = Config('location.hindiStatesArr.' . $locName);
            }
        }
        // Handle the tab results
        $catTabResult = !empty($request->catTab) ? 1 : 0;
        $locTabResult = !empty($request->locTab) ? 1 : 0;
        $invTabResult = !empty($request->invTab) ? 1 : 0;
        // Set category ID and name
        if (!empty($mainCatId) && empty($subCatId) && empty($thirdCatId)) {
            $catId = $mainCatId;
            $catType = 'mc';
            $catName = $isHindi ? Config('hindiConstants.CategoryArr.' . $catId) : Config('constants.CategoryArr.' . $catId);
        }

        if (!empty($subCatId) && empty($thirdCatId)) {
            $catId = $subCatId;
            $catType = 'sc';
            $catName = $isHindi ? Config('hindiConstants.subCategoryArr.' . $mainCatId . '.' . $subCatId) : Config('constants.subCategoryArr.' . $mainCatId . '.' . $subCatId);
        }

        if (!empty($thirdCatId)) {
            $catId = $thirdCatId;
            $catType = 'ssc';
            $catName = $isHindi ? Config('hindiConstants.subCategoryArr.' . $mainCatId . '.' . $subCatId) : Config('constants.subCategoryArr.' . $mainCatId . '.' . $subCatId);
        }

        // Default SEO for 'all' category
        if ($request->segment(2) == 'all' && $request->segment(3) == 'all') {
            $seoTitle = $isHindi ? 'व्यवसाय के अवसर - फ्रेंचाइजी इंडिया' : 'Business Opportunities - Franchise India';
            $seoDesc = $isHindi ? '13000+ व्यावसायिक अवसर खोजें' : 'Find 13000+ business opportunities';
            $seoKeywords = $isHindi ? 'व्यवसाय के अवसर' : 'Business opportunities';
        }

        // Handle franchise type and location
        $businessOpp = $isHindi ? 'व्यवसाय के अवसर' : 'Business Opportunities';
        $in = $isHindi ? 'इन' : 'in';

        // Franchise type SEO handling
        if (!empty($request->ftype)) {
            $fTypeName = $isHindi ? Config('hindiConstants.masterfranchiseType')[$request->ftype] : Config('constants.masterfranchiseType')[$request->ftype];
            $seoTitle = "$businessOpp $fTypeName - Franchise India";

            if (!empty($request->loc) && count($request->loc) == 1) {
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";
                if ($isHindi) {
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                }
            } else if (!empty($request->loc) && count($request->loc) > 1) {
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";
                if ($isHindi) {
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                }
            }
        }

        // Category-specific SEO handling
        if (!empty($catId)) {
            $seoClass = $isHindi ? CategoryFinalHindi::query() : CategoryFinal::query();
            $catArr = $seoClass->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')->where('catid', $catId)->first();

            if ($catArr) {
                // Build base title and description
                $baseTitle = $catArr->catname . ' ' . $businessOpp;
                $baseDesc = "Franchise India provides $catArr->catname franchise opportunities, business opportunities, business ideas.";

                // Add franchise type if available
                if (!empty($fTypeName)) {
                    $baseTitle .= " $fTypeName";
                    $baseDesc .= " Buy $catArr->catname Franchise with affordable range.";
                }

                // Handle location-specific title and description
                if (!empty($request->loc)) {
                    if (count($request->loc) == 1) {
                        $seoTitle = "$baseTitle $in $locName - Franchise India";
                        $seoDesc = "$baseDesc in $locName";
                        if ($isHindi) {
                            $seoTitle = "$baseTitle $in $locName - फ्रेंचाइजी भारत";
                            $seoDesc = "$baseDesc भारत में $locName";
                        }
                    } else {
                        $seoTitle = "$baseTitle $in $locName - Franchise India";
                        $seoDesc = "$baseDesc across India";
                        if ($isHindi) {
                            $seoTitle = "$baseTitle $in $locName - फ्रेंचाइजी भारत";
                            $seoDesc = "$baseDesc भारत में";
                        }
                    }
                } else {
                    $seoTitle = "$baseTitle - Franchise India";
                    $seoDesc = "$baseDesc across India";
                }

                // Override with SEO title and description from the category
                if (!empty($catArr->seoTitle)) {
                    $seoTitle = $catArr->seoTitle;
                }
                if (!empty($catArr->description)) {
                    $seoDesc = $catArr->description;
                }
                if (!empty($catArr->keywords)) {
                    $seoKeywords = $catArr->keywords;
                }
            }
        }

        // Default values for min and max range
        $minRangeValue = 0;
        $maxRangevalue = 100000000;
        $seoTitle = $seoKeywords = $seoDesc = '';

        // Define price ranges
        $priceRanges = [
            'under-50k'   => ['min' => 10000, 'max' => 50000, 'title' => 'Business Opportunities Under Rs 10000 to 50000'],
            'under-2lac'  => ['min' => 50000, 'max' => 200000, 'title' => 'Business Opportunities Under Rs 50000 to 2 lakhs'],
            'under-5lac'  => ['min' => 200000, 'max' => 500000, 'title' => 'Business Opportunities Under Rs 2 lakhs to 5 lakhs'],
            'under-10lac' => ['min' => 500000, 'max' => 1000000, 'title' => 'Business Opportunities Under Rs 5 lakhs to 10 lakhs'],
            'under-20lac' => ['min' => 1000000, 'max' => 2000000, 'title' => 'Business Opportunities Under Rs 10 lakhs to 20 lakhs'],
            'under-30lac' => ['min' => 2000000, 'max' => 3000000, 'title' => 'Business Opportunities Under Rs 20 lakhs to 30 lakhs'],
            'under-50lac' => ['min' => 3000000, 'max' => 5000000, 'title' => 'Business Opportunities Under Rs 30 lakhs to 50 lakhs'],
            'under-1cr'   => ['min' => 5000000, 'max' => 10000000, 'title' => 'Business Opportunities Under Rs 50 lakhs to 1 cr'],
            'under-2cr'   => ['min' => 10000000, 'max' => 20000000, 'title' => 'Business Opportunities Under Rs 1 cr to 2 cr'],
            'under-5cr'   => ['min' => 20000000, 'max' => 50000000, 'title' => 'Business Opportunities Under Rs 2 cr to 5 cr'],
            '5cr-or-above' => ['min' => 50000000, 'max' => 100000000, 'title' => 'Business Opportunities Under franchises 5 cr or above'],
        ];

        // Check if the price range exists in the predefined ranges
        $priceRange = $request->price_range;
        if (array_key_exists(strtolower($priceRange), $priceRanges)) {
            $range = $priceRanges[strtolower($priceRange)];
            $minRangeValue = $range['min'];
            $maxRangevalue = $range['max'];
            $seoTitle = $range['title'];
            $seoKeywords = "business opportunities, {$range['title']}";
            $seoDesc = "Find {$range['title']}";
        }

        // Handle language-specific SEO titles/descriptions
        if ($isHindi) {
            $hiTitles = [
                'under-50k'   => ['title' => '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर', 'desc' => '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-2lac'  => ['title' => '50 हज़ार से 2 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '50 हज़ार से 2 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-5lac'  => ['title' => '2 लाख से 5 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '2 लाख से 5 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-10lac' => ['title' => '5 लाख से 10 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '5 लाख से 10 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-20lac' => ['title' => '10 लाख से 20 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '10 लाख से 20 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-30lac' => ['title' => '20 लाख से 30 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '20 लाख से 30 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-50lac' => ['title' => '30 लाख से 50 लाख रुपये के बीच व्यावसायिक अवसर', 'desc' => '30 लाख से 50 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-1cr'   => ['title' => '50 लाख से 1 करोड़ रुपये के बीच व्यावसायिक अवसर', 'desc' => '50 लाख से 1 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-2cr'   => ['title' => '1 करोड़ से 2 करोड़ रुपये के बीच व्यावसायिक अवसर', 'desc' => '1 करोड़ से 2 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                'under-5cr'   => ['title' => '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर', 'desc' => '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं'],
                '5cr-or-above' => ['title' => 'फ्रैंचाइजी के बीच व्यवसाय के अवसर- 5 करोड़ से ऊपर', 'desc' => 'फ्रैंचाइजी-5 करोड़ या उससे अधिक के बीच व्यवसाय के अवसर खोजें'],
            ];

            if (array_key_exists(strtolower($priceRange), $hiTitles)) {
                $seoTitle = $hiTitles[strtolower($priceRange)]['title'];
                $seoDesc = $hiTitles[strtolower($priceRange)]['desc'];
            }
        }

        // Handle custom price range from request
        if (!empty($request->minrange)) {
            $minRangeValue = $request->minrange;
        }

        if (!empty($request->maxrange)) {
            $maxRangevalue = $request->maxrange;
        }

        if (!empty($request->min_cost)) {
            $minRangeValue = Config('constants.InvestRange.' . $request->min_cost . '.min');
            $minCost = $request->min_cost;
        }

        if (!empty($request->max_cost)) {
            $maxRangevalue = Config('constants.InvestRange.' . $request->max_cost . '.min');
            $maxCost = $request->max_cost;
        }

        // Validate min and max ranges
        if ($minRangeValue > $maxRangevalue) {
            $maxRangevalue = 100000000;
            $minRangeValue = 10000;
        }

        // Sorting
        $orderby = $request->sortby;


        // Initialize default variables
        $seoTitle = $seoKeywords = $seoDesc = $loc = $catName = '';
        $currentDate = Carbon::now()->format('Y');

        // Handle state_code for SEO
        if (!empty(request()->state_code)) {
            $locId = preg_split('#(?<=[a-z])(?=\d)#i', request()->state_code);
            $locArrKey = explode(',', $locId[1]);
            $stateName = Config('location.stateArr.' . $locArrKey[0]);

            // Generate SEO values
            $seoTitle = "Business Opportunities in {$stateName} for {$currentDate} (High Profit Making)";
            $seoKeywords = "Best Business in {$stateName}, Business Opportunities in {$stateName}, New Business Opportunities in {$stateName}, Small Business Opportunities in {$stateName}, Franchise Opportunities in {$stateName}, Profitable Business Ideas in {$stateName}";
            $seoDesc = "Profitable Business Opportunities in {$stateName}. Explore Franchise Opportunities in {$stateName} & Start your own business in {$stateName} with FranchiseIndia today!";

            // Handle Hindi segment specific SEO
            if (request()->segment(1) == 'hi') {
                $stateInHindi = Config('location.hindiStatesArr')[$stateName];
                $seoTitle = "{$stateInHindi} में व्यवसाय के अवसर - फ्रेंचाइजी भारत";
                $seoKeywords = "{$stateInHindi} में व्यापार के अवसर, व्यापार के अवसर";
                $seoDesc = "{$stateInHindi} में व्यवसाय के अवसरों का पता लगाएं";
            }

            $loc = $locArrKey;
        }

        // Handle location-specific logic
        if (!empty(request()->loc)) {
            $locArrKey = is_array(request()->loc) ? implode(',', request()->loc) : request()->loc;
            $locArrKey = explode(',', $locArrKey);
            $loc = $locArrKey;
        }

        // Fetch franchise type, category, and subcategory
        $franType = request()->ftype ?? null;
        $mainCatId = request()->mc ?? null;
        $subCatId = request()->sc ?? null;

        // Handle SSC parameter and explode into array if necessary
        $thirdCatIdArr = !empty(request()->ssc) ? (is_array(request()->ssc) ? request()->ssc : explode(',', request()->ssc)) : [];

        // Set default category name if it's not set
        if (empty($catId)) {
            $catName = ($isHindi) ? 'बिज़नेस  ओप्पोर्तुनिटीज़' : 'Business Opportunities';
        }
        // Fetch Brand Data
        $franData = FranchisorBusinessDetail::query()->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name', 'state', 'ind_sub_cat', 'operations_start_year', 'looking_tradepartner', 'looking_franchise', 'membership_weightage', 'franchise_start_year', 'no_fran_outlets', 'franchise_partner_type', 'city', 'unit_investment', 'expansion_loc_type', 'business_desc', 'membership_plan', 'prop_area_min', 'prop_area_max', 'profile_status', 'business_desc', 'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'membership_type', 'company_logo', 'unit_inv_min', 'unit_inv_max', 'is_hindi', 'business_desc_hindi', 'free_logo_visibility', 'brand_verified', 'views', 'activated_at')->whereIn('profile_status', [1, 11]);

        // Handle text search
        if ($text = $request->text) {
            $text = str_replace('-or-', '/', $text);
            $catId = CategoryFinal::query()->select('catid', 'catname', 'parent_id')->where('catname', $text)->first();

            if ($catId) {
                $type = $catId->parent_id ? (CategoryFinal::query()->select('parent_id')->where('catid', $catId->parent_id)->whereNull('parent_id')->exists() ? 'sc' : 'ssc') : 'm';
                return redirect("business-opportunities/" . Str::slug($catId->catname) . '.' . $type . $catId->catid);
            }

            $franData->where('company_name', 'like', "%{$text}%");
        }

        // Handle search query
        if ($searchq = request()->searchq) {
            $franData->where('company_name', 'LIKE', "%{$searchq}%");
        }

        // Filter by category type
        switch ($catType) {
            case 'ssc':
                $franData->whereIn('ind_sub_cat', $thirdCatIdArr);
                break;
            case 'sc':
                $franData->where('ind_cat', $catId);
                break;
            case 'mc':
                $franData->where('ind_main_cat', $catId);
                break;
        }
        // Filter by franchise type
        if ($franType) {
            $franData->where('franchise_partner_type', $franType);
        }
        $mc    = $mainCatId;
        $sc    = $subCatId;
        $ssc   = $request->ssc;
        $ftype = $request->ftype;

        // Handle location filters
        if ($locArrKey = $request->loc) {
            $stateNames = array_map(fn($val) => config('location.stateArr.' . $val), $locArrKey);
            $franData->where(function ($query) use ($stateNames) {
                $query->where('expansion_location', 'LIKE', '%' . $stateNames[0] . '%');
                foreach (array_slice($stateNames, 1) as $state) {
                    $query->orWhere('expansion_location', 'LIKE', '%' . $state . '%');
                }
            });
        }


        $city = "";

        if (!empty(request()->city)) {
            /*
            $city = request()->city;
            $cityArr = FranchisorLocState::query()->distinct('franchisor_id')
                ->where('city', request()->city)
                ->get()
                ->pluck('franchisor_id')
                ->toArray();

            $franData->whereIn('franchisor_id', $cityArr)->get();
        */
        }

        // Handle low-cost business filter
        if (request()->lowcost === "lowcost") {
            $seoTitle = 'Low Cost Business Opportunities - Franchise India';
            $seoKeywords = 'low cost Franchise, low cost business opportunities';
            $seoDesc = 'Start your business with low cost franchise business opportunities.';
            $catName = "Low Cost Business Opportunities";

            if ($isHindi) {
                $seoTitle = 'कम लागत के व्यवसाय के अवसर - फ्रेंचाइजी भारत';
                $seoKeywords = 'कम लागत वाले फ्रेंचाइजी, कम लागत वाले व्यवसाय के अवसर';
                $seoDesc = 'कम लागत वाली फ्रेंचाइज़ी के व्यावसायिक अवसरों के साथ अपना व्यवसाय शुरू करें।';
                $catName = "कम लागत व्यापार अवसर";
            }

            $minRangeValue = 0;
            $maxRangevalue = 500000;
        }

        // Handle investment range
        if (!empty($request->investment) && is_numeric($request->investment)) {
            $minRangeValue = Config('constants.InvestRange.' . $request->investment . '.min');
            $maxRangevalue = Config('constants.InvestRange.' . $request->investment . '.max');
        }

        $franData->whereBetween('unit_inv_max', [$minRangeValue, $maxRangevalue]);

        // Sorting logic
        switch ($orderby) {
            case 1:
                $franData->orderBy('fran_detail_id', 'desc');
                break;
            case 2:
                $franData->orderBy('company_name', 'asc');
                break;
            case 3:
                $franData->orderBy('views', 'desc');
                break;
            default:
                $franData->orderBy('membership_weightage', 'desc');
        }

        // Pagination
        $count = (request()->segment(1) == 'amp') ? 20 : 21;
        $brandResults = $franData->paginate($count);
        $currentPage = $brandResults->currentPage();
        $lastPage = $brandResults->lastPage();

        // Redirect if current page exceeds last page
        if ($currentPage > $lastPage) {
            return redirect(url()->current());
        }

        $shuffledResults = $brandResults->shuffle()->sortByDesc('membership_weightage');
        // SEO and other meta data
        $franImageData = [];

        // Retrieve franchisors with images
        if ($brandResults->isNotEmpty()) {
            $paidFranchisors = collect($brandResults->items())->where('membership_type', 1)->pluck('franchisor_id');
            $sliderCheck = FranchisorSliderTenure::where('status', 1)
                ->where('end_date', '>=', now())
                ->get()->pluck('franchisor_id');

            // 3️ Regional paid franchisors
            $franchiseRegional = RegionalFranPaymentHistory::query()->select('franchisor_id')->where('status', 1)->pluck('franchisor_id')->unique();

            // 4️ Regional slider tenure check
            $regionalSliderCheck = RegionalFranchisorSliderTenure::query()->select('franchisor_id')->where('status', 1)->where('end_date', '>=', now())->pluck('franchisor_id')->unique();

            // merge all eligible ids
            $eligibleFranchisors = collect()->merge($paidFranchisors)->merge($franchiseRegional)->merge($sliderCheck)->merge($regionalSliderCheck)->unique()->values();

            // 5) fetch aggregated slider images (same grouping/having as original)
            if ($eligibleFranchisors->isNotEmpty()) {
                $franImageData = FranchisorSliderImage::query()->select('franchisor_id', DB::raw('MAX(image_type_slider2) as image_type_slider2'), DB::raw('COUNT(franchisor_id) as count'))->where('image_type_slider2', '!=', '')->whereIn('franchisor_id', $eligibleFranchisors)->where('status', 1)->groupBy('franchisor_id')->havingRaw('count > 3')->get();
            }
        }
        // Set view based on segment
        $view = 'category.category';
        if (request()->segment(1) == 'amp') $view = 'category.hindi-category.amp-category';
        if ($isHindi) $view = 'category.hindi-category.hindi-category';

        return view($view, compact(
            'brandResults',
            'shuffledResults',
            'catArr',
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

    // optimized function
    public function getBusinessListingnormalization(Request $request)
    {
        // dd($request->all());
        // Fetch the request parameters
        $catParam      = $request->category_param;
        $catUrl      = $request->catUrl;
        // try to extract numeric id from param
        preg_match('/[a-zA-Z]+(\d+)/', $catParam, $matches);
        $allIntegers = $matches[1] ?? null;

        // load SEO config arrays
        $seoCategoriesm = Config('category.SeoCategoryArr', []);
        $seoCategoriessc = Config('category.SeoSubCategoryArr', []);
        $seoCategoriesssc = Config('category.SeoSubSubCategoryArr', []);

        // ----- Normalization / Redirect (m / sc / ssc) -----
        if ($allIntegers !== null) {
            // m        
            if (array_key_exists($allIntegers, $seoCategoriesm)) {
                $newAll = 'm' . $allIntegers;
                $configCatUrl = $seoCategoriesm[$allIntegers];
                $newCatUrl = '/business-opportunities/' . $configCatUrl . '.' . $newAll;
                $oldCaturl = '/business-opportunities/' . $catUrl . '.' . $catParam;
                if ($configCatUrl !== false && $newCatUrl != $oldCaturl) {
                    return redirect($newCatUrl, 301);
                }
            }
        }
        // sc
        if (array_key_exists($allIntegers, $seoCategoriessc)) {
            $newAll = 'sc' . $allIntegers;
            $configCatUrl = $seoCategoriessc[$allIntegers];
            $newCatUrl = '/business-opportunities/' . $configCatUrl . '.' . $newAll;
            $oldCaturl = '/business-opportunities/' . $catUrl . '.' . $catParam;
            if ($configCatUrl !== false && $newCatUrl != $oldCaturl) {
                return redirect($newCatUrl, 301);
            }
        }
        // ssc
        if (array_key_exists($allIntegers, $seoCategoriesssc)) {
            $newAll = 'ssc' . $allIntegers;
            $configCatUrl = $seoCategoriesssc[$allIntegers];
            $newCatUrl = '/business-opportunities/' . $configCatUrl . '.' . $newAll;
            $oldCaturl = '/business-opportunities/' . $catUrl . '.' . $catParam;
            if ($configCatUrl !== false && $newCatUrl != $oldCaturl) {
                return redirect($newCatUrl, 301);
            }
        }
        // ----- initialize vars (same names as your original function) -----
        $breadCrumb    = '';
        $sortby        = '';
        $minRangeValue = '';
        $maxRangevalue = '';
        $text          = '';
        $seoDesc       = '';
        $seoKeywords   = '';
        $searchq       = '';
        $city          = '';

        if (isset($request->mainCatmId))
            $catParam = $request->mainCatmId;

        $mainCatId  = 0;
        $subCatId   = 0;
        $thirdCatId = 0;
        $cid        = 0;

        if ($catParam)
            $cid = preg_split('#(?<=[a-z])(?=\d)#i', $catParam);

        if (!is_array($cid) || count($cid) != 2) {
            return redirect('pagenotfound');
        }

        // determine model according to language segment
        $seoClass = (request()->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
        $catArr   = $seoClass->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')
            ->where('catid', $cid[1])
            ->first();

        // Dealer redirect list from config
        $redirectCatids = config('category.DealerRedirectIds', []);
        if ($catArr == null || in_array($cid[1], $redirectCatids)) {
            return redirect('/business-opportunities/all/all', 301);
        }

        $catName = $catArr->catname;

        // ----- Build main Franchisor query (use relations via with()) -----
        $franData = FranchisorBusinessDetail::query()->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name', 'state', 'ind_sub_cat', 'operations_start_year', 'looking_tradepartner', 'looking_franchise', 'membership_weightage', 'franchise_start_year', 'no_fran_outlets', 'franchise_partner_type', 'city', 'unit_investment', 'expansion_loc_type', 'business_desc', 'membership_plan', 'prop_area_min', 'prop_area_max', 'profile_status', 'business_desc', 'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'membership_type', 'company_logo', 'unit_inv_min', 'unit_inv_max', 'is_hindi', 'business_desc_hindi', 'free_logo_visibility', 'brand_verified', 'views', 'activated_at', 'is_fixed_brand')->whereIn('profile_status', [1, 11]);

        // apply category filters (m/sc/ssc)
        if ($cid[0] == 'ssc') {
            $franData->where('ind_sub_cat', $cid[1]);
            $thirdCatId = $cid[1];
            $subCatId   = $catArr->parent_id;

            // replicate your CategoryController mapping
            $catData    = new CategoryController();
            $catDataArr = $catData->getSubCategory();
            foreach ($catDataArr as $key => $subValueArr) {
                if (is_array($subValueArr) && array_key_exists($subCatId, $subValueArr)) {
                    $mainCatId = $key;
                    break;
                }
            }
        } elseif ($cid[0] == 'sc') {
            $franData->where('ind_cat', $cid[1]);
            $subCatId = $cid[1];
            $mainCatId = $catArr->parent_id;
        } elseif ($cid[0] == 'm') {
            $franData->where('ind_main_cat', $cid[1])->orderby('is_fixed_brand', 'desc');
            $mainCatId = $cid[1];
        }

        $franData = $franData->distinct();

        // pagination
        $count = ($request->segment(1) == 'amp') ? 20 : 21;
        $brandResults = $franData->orderby('membership_weightage', 'desc')->orderby('fran_detail_id', 'asc')->paginate($count);

        // if user requested page > last page, redirect to parent URL (same as original)
        if ($brandResults->currentPage() > $brandResults->lastPage()) {
            return redirect(url()->current());
        }

        // ----- Prepare slider images (preserve original aggregation logic) -----
        $franImageData = collect();
        if ($brandResults->count() > 0) {
            // 1 Main paid franchisors (membership_type = 1)
            $paidFranchisors = collect($brandResults->items())->where('membership_type', 1)->pluck('franchisor_id')->filter()->unique();

            // 2️ Main slider tenure check
            $sliderCheck = FranchisorSliderTenure::query()->select('franchisor_id')->where('status', 1)->where('end_date', '>=', now())->pluck('franchisor_id')->unique();

            // 3️ Regional paid franchisors
            $franchiseRegional = RegionalFranPaymentHistory::query()->select('franchisor_id')->where('status', 1)->pluck('franchisor_id')->unique();

            // 4️ Regional slider tenure check
            $regionalSliderCheck = RegionalFranchisorSliderTenure::query()->select('franchisor_id')->where('status', 1)->where('end_date', '>=', now())->pluck('franchisor_id')->unique();

            // merge all eligible ids
            $eligibleFranchisors = collect()->merge($paidFranchisors)->merge($franchiseRegional)->merge($sliderCheck)->merge($regionalSliderCheck)->unique()->values();

            // 5) fetch aggregated slider images (same grouping/having as original)
            if ($eligibleFranchisors->isNotEmpty()) {
                $franImageData = FranchisorSliderImage::query()->select('franchisor_id', DB::raw('MAX(image_type_slider2) as image_type_slider2'), DB::raw('COUNT(franchisor_id) as count'))->where('image_type_slider2', '!=', '')->whereIn('franchisor_id', $eligibleFranchisors)->where('status', 1)->groupBy('franchisor_id')->havingRaw('count > 3')->get();
            }
        }

        // shuffle results (for frontend ordering as in original)
        $shuffledResults = collect($brandResults->items())->shuffle()->sortByDesc('membership_weightage');

        // ----- SEO setup (same as original) -----
        if (!empty($catArr->seoTitle)) {
            $seoTitle = $catArr->seoTitle;
        } else {
            $seoTitle = $catArr->catname . ' - Franchise India';
            if ($request->segment(1) == 'hi') {
                $seoTitle = $catArr->catname . ' - फ्रेंचाइज इंडिया';
            }
        }
        if (!empty($catArr->description)) $seoDesc = $catArr->description;
        if (!empty($catArr->keywords)) $seoKeywords = $catArr->keywords;

        if ($cid[0] == 'ssc') {
            $seoTitle = sprintf('%s Business Opportunity in India – Franchise India', $catArr->catname);
            $seoDesc  = sprintf('Franchise India offers wide variety of %1$s franchise opportunities to run a successful %1$s franchise business. You can explore some of the established and well known %1$s franchises here.', $catArr->catname);

            if ($request->segment(1) == 'hi') {
                $seoTitle = sprintf('%s भारत में व्यावसायिक अवसर - फ्रेंचाइज इंडिया', $catArr->catname);
                $seoDesc  = sprintf('फ्रैंचाइज़ इंडिया विभिन्न प्रकार की पेशकश करता है %1$s फ्रेंचाइजी एक सफल चलाने के अवसर %1$s फ्रेंचाइजी का व्यवसाय। आप कुछ स्थापित और प्रसिद्ध का पता लगा सकते हैं %1$s यहां फ्रेंचाइजी मिली.', $catArr->catname);
            }
        }

        // ----- Home-based detection (same as original) -----
        $chk_homebased = 0;
        $seoClass_subcat = ($request->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
        $catArr_subcat = $seoClass_subcat->select('parent_id')->where('catid', $catArr->parent_id)->first();
        if ($catArr_subcat && $catArr_subcat->parent_id == 7) {
            $chk_homebased = $catArr_subcat->parent_id;
            $seoTitle = 'Home Based Business ' . $seoTitle;
        }

        // choose view (same mapping as original)
        $view = 'category.category';
        if ($request->segment(1) == 'amp') $view = 'category.hindi-category.amp-category';
        if ($request->segment(1) == 'hi')  $view = 'category.hindi-category.hindi-category';

        // prepare some view-scoped vars to match original

        $mc          = $mainCatId;
        $sc          = $subCatId;
        $ssc         = [$thirdCatId];
        $loc         = [];
        $ftype       = '';
        $orderby     = "";

        return view($view, compact(
            'brandResults',
            'shuffledResults',
            'breadCrumb',
            'catName',
            'mc',
            'sc',
            'ssc',
            'loc',
            'ftype',
            'seoTitle',
            'seoDesc',
            'seoKeywords',
            'sortby',
            'minRangeValue',
            'maxRangevalue',
            'orderby',
            'text',
            'searchq',
            'franImageData',
            'city',
            'chk_homebased'
        ));
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

    public function getajax()
    {
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
