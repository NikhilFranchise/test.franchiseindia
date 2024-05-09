<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\CategoryFinal;
use App\Models\CategoryFinalHindi;
use App\Models\CategorySlider;
use App\Models\FranchisorLike;
use App\Models\FranchisorLocState;
use App\Models\FranchisorSliderImage;
use App\Models\FranchisorSliderTenure;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\DB;

class BrandListingController extends Controller
{
    //

    public function getSubCatUrl()
    {
        $sscId = 48;
        $catName = CategoryController::getSEOSubSubCategory($sscId);
        return Config('constants.MainDomain') .'/business-opportunities/'. $catName .'.ssc'. $sscId;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchBusiness(Request $request)
    {
        $search = $request['query'];
        $data = DB::getFacadeRoot()->table("franchisor_business_details")
            ->select("company_name")
            ->where('company_name','LIKE',"%$search%")
            ->orderby('membership_type','DESC')
            ->where('profile_status', 1)
            ->take(100)
            ->get()->pluck('company_name');
        return response()->json($data);
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchBusinessListing()
    {
        if (!empty(request()->franchiseType)) {
            $this->setSearchParams(request()->franchiseType);
        }
        if (!empty(request()->categoryIds)) {
            $this->setSearchParams(request()->categoryIds);
        }
        if (!empty(request()->locationIds)) {
            $this->setSearchParams(request()->locationIds);
        }
        if (!empty(request()->range)) {
            $this->setSearchParams(request()->range);
        }

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
        $searchQ = '';
        $text = "";
        $minCost = 0;
        $maxCost = 0;
        $loc = '';

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
        if(!empty(request()->loc) && count(request()->loc) ==1) {
            $locName = Config('location.stateArr.' . request()->loc[0]);
            if ((request()->segment(1) == 'hi')) {
                $locName = Config('location.hindiStatesArr.' . $locName);
            }
        }

        if(!empty(request()->ftype)){
            $fTypeName = Config('constants.masterfranchiseType')[request()->ftype];

            if ((request()->segment(1) == 'hi'))
                $fTypeName = Config('hindiConstants.masterfranchiseType')[request()->ftype];

            $seoTitle = "$businessOpp $fTypeName  - Franchise India";
            if(!empty(request()->loc) && count(request()->loc) ==1){
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";

                if(request()->segment(1) == 'hi')
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";

            }else if(!empty(request()->loc) && count(request()->loc) >1){
                $seoTitle = "$businessOpp $fTypeName $in $locName - Franchise India";

                if(request()->segment(1) == 'hi')
                    $seoTitle = "$businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";

            }
        }

        if (!empty($catId)) {
            $seoClass = (request()->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
            $catArr = $seoClass->select('catname', 'parent_id', 'seoTitle', 'description', 'keywords')
                ->where('catid', $catId)
                ->first();
            if(!empty(request()->loc) && count(request()->loc) ==1 && !empty($fTypeName) && !empty($catArr)) {
                $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities '. $fTypeName .', business opportunities, business ideas. Buy $catArr->catname Franchise in $locName with affordable range.";

                if(request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है '. $fTypeName .', व्यापार के अवसर, व्यापार के विचार। सस्ती सीमा के साथ $locName में $catArr->catname फ्रेंचाइज़ खरीदें।";
                }

            }
            else if(!empty(request()->loc) && count(request()->loc) >1 && !empty($fTypeName)) {
                $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities '. $fTypeName .', business opportunities, business ideas,best business in India and buy $catArr->catname Franchise in India with affordable range.";

                if(request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $fTypeName $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है '. $fTypeName .', व्यापार के अवसर, व्यापार के विचार, भारत में सबसे अच्छा व्यवसाय और सस्ती सीमा के साथ भारत में $catArr->catname फ्रैंचाइज़ खरीदें।";
                }
            }
            else if(!empty(request()->loc) && count(request()->loc) ==1 && !empty($catArr)) {

                $seoTitle = "$catArr->catname $businessOpp $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities, business opportunities, business ideas. Buy $catArr->catname Franchise in $locName with affordable range.";

                if(request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है ,व्यापार के अवसर, व्यापार के विचार। सस्ती सीमा के साथ $locName में $catArr->catname फ्रेंचाइज़ खरीदें।";
                }

            }  else if(!empty(request()->loc) && count(request()->loc) > 1 && !empty($catArr)) {
                $seoTitle = "$catArr->catname $businessOpp $in $locName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities, business opportunities, business ideas,best business in India and buy $catArr->catname Franchise in India with affordable range.";

                if(request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $in $locName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है , व्यापार के अवसर, व्यापार के विचार, भारत में सबसे अच्छा व्यवसाय और सस्ती सीमा के साथ भारत में $catArr->catname फ्रैंचाइज़ खरीदें।";
                }

            }  else if(!empty($fTypeName) && !empty($catArr)) {
                $seoTitle = "$catArr->catname $businessOpp $fTypeName - Franchise India";
                $seoDesc = "Franchise India provides $catArr->catname franchise opportunities  '. $fTypeName .', business opportunities, business ideas,best business in India and buy $catArr->catname Franchise in India with affordable range.";
                if(request()->segment(1) == 'hi') {
                    $seoTitle = "$catArr->catname $businessOpp $fTypeName - फ्रेंचाइजी भारत";
                    $seoDesc  = "फ्रेंचाइजी के अवसर $catArr->catname फ्रेंचाइजी भारत प्रदान करता है '. $fTypeName .', व्यापार के अवसर, व्यापार के विचार, भारत में सबसे अच्छा व्यवसाय और सस्ती सीमा के साथ भारत में $catArr->catname फ्रैंचाइज़ खरीदें। ";
                }


            }else {
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

        if (request()->price_range == "under-50k"){
            $minRangeValue = 10000;
            $maxRangeValue = 50000;
            $seoTitle = 'Business Opportunities Under Rs-10000-to-50000 - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-10000-to-50000';
            $seoDesc = 'Find business opportunities Under Rs-10000-to-50000';
            if(request()->segment(1) == 'hi') {
                $seoTitle    = '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 करोड़ से 5 करोड़ के बीच व्यापार के अवसर' ;
                $seoDesc     = '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-2lac") {
            $minRangeValue = 50000;
            $maxRangeValue = 200000;
            $seoTitle = 'Business Opportunities Under Rs-50000-to-2lac - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities between Rs-50000-to-2lac';
            $seoDesc = 'Find business opportunities Under Rs-50000-to-2lac';
            if(request()->segment(1) == 'hi') {
                $seoTitle    = '50 हज़ार से 2 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 50 हज़ार से 2 लाख के बीच व्यापार के अवसर' ;
                $seoDesc     = '50 हज़ार से 2 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-5lac") {
            $minRangeValue = 200000;
            $maxRangeValue = 500000;
            $seoTitle = 'Business Opportunities Under Rs-2lac-to-5lac - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-2lac-to-5lac';
            $seoDesc = 'Find business opportunities Under Rs-2lac-to-5lac';
            if(request()->segment(1) == 'hi') {
                $seoTitle    = '2 लाख से 5 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 लाख से 5 लाख के बीच व्यापार के अवसर' ;
                $seoDesc     = '2 लाख से 5 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-10lac") {
            $minRangeValue = 500000;
            $maxRangeValue = 1000000;
            $seoTitle = 'Business Opportunities Under Rs-5lac-to-10lac - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-5lac-to-10lac';
            $seoDesc = 'Find business opportunities Under Rs-5lac-to-10lac';
            if(request()->segment(1) == 'hi') {
                $seoTitle    = '5 लाख से 10 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 5 लाख से 10 लाख के बीच व्यापार के अवसर' ;
                $seoDesc     = '5 लाख से 10 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-20lac") {
            $minRangeValue = 1000000;
            $maxRangeValue = 2000000;
            $seoTitle = 'Business Opportunities Under Rs-10lac-to-20lac - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-10lac-to-20lac';
            $seoDesc = 'Find business opportunities Under Rs-10lac-to-20lac';
            if(request()->segment(1) == 'hi') {
                $seoTitle    = '10 लाख से 20 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 10 लाख से 20 लाख के बीच व्यापार के अवसर' ;
                $seoDesc     = '10 लाख से 20 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-30lac") {
            $minRangeValue = 2000000;
            $maxRangeValue = 3000000;
            $seoTitle = 'Business Opportunities Under Rs-20lac-to-30lac - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-20lac-to-30lac';
            $seoDesc = 'Find business opportunities Under Rs-20lac-to-30lac';
            if(request()->segment(1) == 'hi') {
                $seoTitle    = '20 लाख से 30 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 20 लाख से 30 लाख के बीच व्यापार के अवसर' ;
                $seoDesc     = '20 लाख से 30 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-50lac") {
            $minRangeValue = 3000000;
            $maxRangeValue = 5000000;
            $seoTitle = 'Business Opportunities Under Rs-30lac-to-50lac - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-30lac-to-50lac';
            $seoDesc = 'Find business opportunities Under Rs-30lac-to-50lac';
            if(request()->segment(1) == 'hi') {
                $seoTitle    = '30 लाख से 50 लाख रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 30 लाख से 50 लाख के बीच व्यापार के अवसर' ;
                $seoDesc     = '30 लाख से 50 लाख रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-1cr") {
            $minRangeValue = 5000000;
            $maxRangeValue = 10000000;
            $seoTitle = 'Business Opportunities Under Rs-50lac-to-1cr - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-50lac-to-1cr';
            $seoDesc = 'Find business opportunities Under Rs-50lac-to-1cr';
            if(request()->segment(1) == 'hi') {
                $seoTitle    = '50 लाख से 1 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 लाख से 1 करोड़ के बीच व्यापार के अवसर' ;
                $seoDesc     = '50 लाख से 1 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-2cr") {
            $minRangeValue = 10000000;
            $maxRangeValue = 20000000;
            $seoTitle = 'Business Opportunities Under Rs-1cr-to-2cr - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-1cr-to-2cr';
            $seoDesc = 'Find business opportunities Under Rs-1cr-to-2cr';
            if(request()->segment(1) == 'hi') {
                $seoTitle    = '1 करोड़ से 2 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 1 करोड़ से 2 करोड़ के बीच व्यापार के अवसर' ;
                $seoDesc     = '1 करोड़ से 2 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }
        } elseif (request()->price_range == "under-5cr") {
            $minRangeValue = 20000000;
            $maxRangeValue = 50000000;
            $seoTitle = 'Business Opportunities Under Rs-2cr-to-5cr - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under Rs-2cr-to-5cr';
            $seoDesc = 'Find business opportunities Under Rs-2cr-to-5cr';

            if(request()->segment(1) == 'hi') {
                $seoTitle    = '2 करोड़ से 5 करोड़ रुपये के बीच व्यावसायिक अवसर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, 2 करोड़ से 5 करोड़ के बीच व्यापार के अवसर' ;
                $seoDesc     = '2 से 5 करोड़ रुपये के बीच व्यापार के अवसरों का पता लगाएं';
            }

        } elseif (request()->price_range == "5cr-or-above") {
            $minRangeValue = 50000000;
            $maxRangeValue = 100000000;
            $seoTitle = 'Business Opportunities Under franchises-5cr-or-above - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities Under franchises-5cr-or-above';
            $seoDesc = 'Find business opportunities Under franchises-5cr-or-above';

            if(request()->segment(1) == 'hi') {
                $seoTitle    = 'फ्रैंचाइजी के बीच व्यवसाय के अवसर- 5 करोड़ से ऊपर - फ्रेंचाइज इंडिया';
                $seoKeywords = 'व्यापार के अवसर, फ्रेंचाइजी के बीच व्यापार के अवसर - 5 करोड़ - या - ऊपर' ;
                $seoDesc     = 'फ्रैंचाइजी-5 करोड़ या उससे अधिक के बीच व्यवसाय के अवसर खोजें';
            }


        } else {
            $minRangeValue = 0;
            $maxRangeValue = 100000000;
        }

        if (!empty(request()->minrange))
            $minRangeValue = request()->minrange;

        if (!empty(request()->maxrange))
            $maxRangeValue = request()->maxrange;

        if (!empty(request()->min_cost)) {
            $minRangeValue = Config('constants.InvestRange.' . request()->min_cost . '.min');
            $minCost = request()->min_cost;
        }

        if (!empty(request()->max_cost)) {
            $maxRangeValue = Config('constants.InvestRange.' . request()->max_cost . '.min');
            $maxCost = request()->max_cost;
        }

        if ($minRangeValue > $maxRangeValue) {
            $maxRangeValue = '100000000';
            $minRangeValue = '10000';
        }

        $orderBy = request()->sortby;

        // Fetch the request parameters
        if (!empty(request()->state_code)) {
            $locId       = preg_split('#(?<=[a-z])(?=\d)#i', request()->state_code);
            $locArrKey   = explode(',', $locId[1]);
            $seoTitle    = 'Business Opportunities in ' . Config('location.stateArr.' . $locArrKey[0]) . ' - Franchise India';
            $seoKeywords = 'business opportunities, business opportunities in ' . Config('location.stateArr.' . $locArrKey[0]);
            $seoDesc     = "Find business opportunities in " . Config('location.stateArr.' . $locArrKey[0]);
            $loc         = $locArrKey;

            if(request()->segment(1) == 'hi') {
                $seoTitle    = Config('location.hindiStatesArr')[Config('location.stateArr.' . $locArrKey[0])] . ' में व्यवसाय के अवसर - फ्रेंचाइजी भारत';
                $seoKeywords = Config('location.hindiStatesArr')[Config('location.stateArr.' . $locArrKey[0])] . ' में व्यापार के अवसर, व्यापार के अवसर ' ;
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
            $catName = (request()->segment(1) == 'hi') ? 'बिज़नेस  ओप्पोर्तुनिटीज़' : 'Business Opportunities';

        // Fetch Brand Data
        $franData = FranchisorBusinessDetail::query()->select('fran_detail_id', 'franchisor_id', 'profile_name', 'company_name',
            'state', 'ind_sub_cat', 'operations_start_year', 'looking_tradepartner', 'looking_franchise', 'membership_weightage',
            'franchise_start_year', 'no_fran_outlets', 'franchise_partner_type', 'city', 'unit_investment',
            'expansion_loc_type', 'business_desc', 'membership_plan', 'prop_area_min', 'prop_area_max', 'profile_status', 'business_desc',
            'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'membership_type', 'company_logo', 'unit_inv_min', 'unit_inv_max', 'is_hindi', 'business_desc_hindi', 'free_logo_visibility');

        $franData->where('profile_status', 1);

        if (isset(request()->text)) {
            $text = request()->text;
            $franData->Where('company_name', 'like', '%' . request()->text . '%');
        }

        if (isset(request()->searchq)){
            $searchq = request()->searchq;
            $franData->where('company_name', 'LIKE', '%'.$searchq.'%');
        }

        if ($catType == 'ssc')
            $franData->whereIn('ind_sub_cat', $thirdCatIdArr);

        if ($catType == 'sc')
            $franData->where('ind_cat', $catId);

        if ($catType == 'mc')
            $franData->where('ind_main_cat', $catId);

        if (!empty($franType))
            $franData->where('franchise_partner_type',  $franType);

        // If state Array data is present
        $stateNames = [];
        if (count($locArrKey) > 0) {
            foreach ($locArrKey as $key => $val)
                $stateNames[$val] = config('location.stateArr.' . $val);

            $stateFranIdArr = FranchisorLocState::query()->select('franchisor_id')->distinct('franchisor_id')->whereIn('state', $stateNames)->get()->toArray();
            $stateFranArr = array_column($stateFranIdArr, 'franchisor_id');
            $franData->whereIn('franchisor_id', $stateFranArr);
        }

        $city = "";

        if(!empty(request()->city)) {
            $city = request()->city;
            $cityArr = FranchisorLocState::query()->distinct('franchisor_id')->where('city', request()->city)->get()->pluck('franchisor_id')->toArray();
            $franData->whereIn('franchisor_id', $cityArr)->get();
        }

        if(request()->lowcost == "lowcost") {
            $maxRangeValue = 500000;
            $minRangeValue = 0;
            $seoTitle      = 'Low Cost Business Opportunities - Franchise India';
            $seoKeywords   = 'low cost Franchise, low cost business opportunities';
            $seoDesc       = 'Start your business with low cost franchise business opportunities.';
            $catName       = "Low Cost Business Opportunities";

            if(request()->segment(1) == 'hi') {
                $seoTitle      = 'कम लागत के व्यवसाय के अवसर - फ्रेंचाइजी भारत';
                $seoKeywords   = 'कम लागत वाले फ्रेंचाइजी, कम लागत वाले व्यवसाय के अवसर';
                $seoDesc       = 'कम लागत वाली फ्रेंचाइज़ी के व्यावसायिक अवसरों के साथ अपना व्यवसाय शुरू करें।';
                $catName       = "कम लागत व्यापार अवसर";
            }
        }

        if(!empty(request()->investment) && is_numeric(request()->investment)) {
            $minRangeValue = Config('constants.InvestRange.'.request()->investment.'.min');
            $maxRangeValue = Config('constants.InvestRange.'.request()->investment.'.max');
        }

        $franData->where('unit_inv_max', '<=', $maxRangeValue);
        $franData->where('unit_inv_max', '>=', $minRangeValue);

        $orderByVal = 'membership_weightage';
        $franData->orderBy($orderByVal, 'desc');

        if ($orderBy == 1){
            $orderByVal = 'fran_detail_id';
            $franData->orderBy($orderByVal, 'desc');
        } elseif ($orderBy == 2){
            $orderByVal = 'company_name';
            $franData->orderBy($orderByVal, 'asc');
        } elseif ($orderBy == 3) {
            $orderByVal = 'views';
            $franData->orderBy($orderByVal, 'desc');
        }

        $totalRecordObj = clone $franData;

        if(!empty(request()->offset) && is_numeric(request()->offset))
            $franData->offset(request()->offset);

        if(!empty(request()->page) && is_numeric(request()->page) && request()->page > 0)
            $franData->offset(request()->page*21);

        $shuffledResults = $franData
            ->take(21)
            ->get()
            ->shuffle()
            ->sortByDesc('membership_weightage')
            ->toArray();

        $totalRecords = $totalRecordObj->count();

        ksort($shuffledResults);

        $franImageData   = [];
        if(!empty($shuffledResults)) {
            $paidFranchisors = collect($shuffledResults);
            $imageFranchisor = $paidFranchisors->where('membership_type', 1)->pluck('franchisor_id');
            $sliderCheck     = FranchisorSliderTenure::query()
                ->select('franchisor_id')
                ->where('status', 1)
                ->where('end_date', '>=', date('Y-m-d H:i:s'))
                ->get()->pluck('franchisor_id');
            $franImageData   = FranchisorSliderImage::query()
                ->select('franchisor_id')
                ->whereIn('franchisor_id', $imageFranchisor)
                ->whereIn('franchisor_id', $sliderCheck)
                ->whereNotNull('image_type_slider2')
                ->where('image_type_slider2' , '!=', '')
                ->where('status', 1)
                ->groupBy('franchisor_id')
                ->get();
        }

        array_multisort( array_column($shuffledResults, "membership_type"), SORT_DESC, $shuffledResults );


        $resultCount = 0;
        foreach ($shuffledResults as $brandResult) {

            $shuffledResults[$resultCount]['premium'] = 0;
            foreach($franImageData as $imgData) {
                if( $imgData->franchisor_id == $shuffledResults[$resultCount]['franchisor_id'] )
                    $shuffledResults[$resultCount]['premium'] = 1;
            }

            $SubCatName = "";

            $brandImagePath = "https://www.franchiseindia.com/images/no-img.gif";
            if(($brandResult['membership_type'] == 1 || $brandResult['free_logo_visibility'] == 1) && !empty($brandResult['company_logo']))
                $brandImagePath = Config('constants.franAwsImgPath') . $brandResult['company_logo'];

            $minValue = $brandResult['unit_inv_min'];
            $area = "-N/A-";

            if ($minValue < 100000 && $minValue > 1000)
                $minValue = substr(($minValue / 1000), 0, 5) . ' K';

            if ($minValue <= 9999999 && $minValue > 100000)
                $minValue = substr(($minValue / 100000), 0, 5) . ' Lac';

            if ($minValue > 9999999)
                $minValue = substr(($minValue / 10000000), 0, 5) . ' Cr';

            $maxValue = $brandResult['unit_inv_max'];
            if ($maxValue < 100000 && $maxValue > 1000)
                $maxValue = substr(($maxValue / 1000), 0, 5) . ' K';

            if ($maxValue <= 9999999 && $maxValue > 100000)
                $maxValue = substr(($maxValue / 100000), 0, 5) . ' Lac';

            if ($maxValue > 9999999)
                $maxValue = substr(($maxValue / 10000000), 0, 5) . ' Cr';

            $priceRange = "INR  $minValue  - $maxValue ";

            foreach (Config('constants.subSubCategoryArr') as $key => $abc) {
                if (array_key_exists($brandResult['ind_sub_cat'], $abc)) {
                    $SubCatName = $abc[$brandResult['ind_sub_cat']];
                }
            }

            if (!empty($brandResult['prop_area_max']))
                $area = $brandResult['prop_area_min'] . " - " . $brandResult['prop_area_max']. " sq. ft.";

            if (empty($brandResult['prop_area_max']))
                $area = $brandResult['prop_area_min'];

            if (empty($brandResult['prop_area_min']))
                $area = "-N/A-";

            //$type = $shuffledResults[$resultCount]['looking_franchise'] == 1 ?  "Franchise Type" : "Channel Type";
            $type = $shuffledResults[$resultCount]['looking_franchise'] == 1 ?  "Type" : "Type";
            $partner_type = "";
            if(is_numeric($brandResult['franchise_partner_type']) && $brandResult['franchise_partner_type'] > 0 && $brandResult['franchise_partner_type'] < 4)
                $partner_type = Config('constants.masterfranchiseType.'.$brandResult['franchise_partner_type']);

            $likes = 0;
            $ratings  = 0;
            $franchisorLikes = FranchisorLike::query()->where('franchisor_id', $brandResult['franchisor_id'])->first();
            if(!empty($franchisorLikes) && count ($franchisorLikes) > 0){
                $likes = $franchisorLikes->blike;
                if($franchisorLikes->brate != 0 && $franchisorLikes->bclick != 0){
                    $ratings = $franchisorLikes->brate/$franchisorLikes->bclick;
                    $ratings = round( $ratings, 1);
                }
            }

            $shuffledResults[$resultCount]['likes'] = $likes;
            $shuffledResults[$resultCount]['ratings'] = $ratings;
            $shuffledResults[$resultCount]['brand_url'] = sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $brandResult['profile_name'], $brandResult['fran_detail_id']);
            $shuffledResults[$resultCount]['area'] = $area;
            $shuffledResults[$resultCount]['sub_category'] = $SubCatName;
            $shuffledResults[$resultCount]['logo'] = $brandImagePath;
            $shuffledResults[$resultCount]['investment'] = $priceRange;
            $shuffledResults[$resultCount]['type'] = $type;
            $shuffledResults[$resultCount]['partner_type'] = $partner_type;
            $shuffledResults[$resultCount]['business_desc'] = implode(' ', array_slice(explode(' ', substr(strip_tags($brandResult['business_desc']),0,210)), 0, 10))."...";

            $franchisorExpansionStates = FranchisorLocState::query()->where('franchisor_id', $brandResult['franchisor_id'])->get();
            $states = "";

            if(count($franchisorExpansionStates) > 0) {
                $stateCount = 0;
                foreach ($franchisorExpansionStates as $state) {
                    $states .= $state->state . ", ";
                    $stateCount++;
                    if($stateCount == 1)
                        break;
                }

                $states = rtrim($states, ', ');
                if($states == "")
                    $states = "No Location selected";
                else {
                    if(count($franchisorExpansionStates) > 2)
                        $states .= $states."...+".(count($franchisorExpansionStates)-2)." More";
                }
            }

            $shuffledResults[$resultCount]['states'] = $states;
            $resultCount++;
        }

        $mc    = $mainCatId;
        $sc    = $subCatId;
        $ssc   = request()->ssc;
        $fType = request()->ftype;

        if (!empty(request()->state_code))
            $catName     = (request()->segment(1) == 'hi') ?  Config('location.hindiStatesArr.'.Config('location.stateArr.'.$locArrKey[0])) : Config('location.stateArr.'.$locArrKey[0]);

        $minvalueSlider = $minRangeValue;
        if($minvalueSlider < 100000 && $minvalueSlider > 1000)
            $minvalueSlider = substr(($minvalueSlider/1000),0,5).' K';

        if($minvalueSlider <= 9999999 && $minvalueSlider > 100000)
            $minvalueSlider = substr(($minvalueSlider/100000),0,5).' Lac';

        if($minvalueSlider > 9999999)
            $minvalueSlider = substr(($minvalueSlider/10000000),0,5).' Cr';

        $maxvalueSlider = $maxRangeValue;
        if($maxvalueSlider < 100000 && $maxvalueSlider > 1000)
            $maxvalueSlider = substr(($maxvalueSlider/1000),0,5).' K';

        if($maxvalueSlider <= 9999999 && $maxvalueSlider > 100000)
            $maxvalueSlider = substr(($maxvalueSlider/100000),0,5).' Lac';

        if($maxvalueSlider > 9999999)
            $maxvalueSlider = substr(($maxvalueSlider/10000000),0,5).' Cr';




        if(request()->ajax())
            return $shuffledResults;


        $h2       = "";
        $desc     = "";
        $currentUrl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        
        if (strpos($currentUrl, '.LOC23')){
            $h2   = Config('constants.catDesc.loc23.title');
            $desc = Config('constants.catDesc.loc23.description');
        } elseif (strpos($currentUrl, 'all/all')){
            $h2   = Config('constants.catDesc.all.title');
            $desc = Config('constants.catDesc.all.description');
        } elseif (strpos($currentUrl, '/lowcost')) {
            $h2   = Config('constants.catDesc.lowcost.title');
            $desc = Config('constants.catDesc.lowcost.description');
        } elseif (strpos($currentUrl, '.LOC9')) {
            $h2   = Config('constants.catDesc.loc9.title');
            $desc = Config('constants.catDesc.loc9.description');
        } elseif (strpos($currentUrl, '.LOC15')) {
            $h2   = Config('constants.catDesc.loc15.title');
            $desc = Config('constants.catDesc.loc15.description');
        } elseif (strpos($currentUrl, '.LOC18')) {
            $h2   = Config('constants.catDesc.loc18.title');
            $desc = Config('constants.catDesc.loc18.description');
        } elseif (strpos($currentUrl, '.LOC29')){
            $h2   = Config('constants.catDesc.loc29.title');
            $desc = Config('constants.catDesc.loc29.description');
        }  elseif (strpos($currentUrl, '.LOC1')) {
            $h2   = Config('constants.catDesc.loc1.title');
            $desc = Config('constants.catDesc.loc1.description');
        }  else {
            if(empty($sc))
                $h2 = Config('constants.catDesc.'.$mc.'.title');
            if(!empty($sc)){
                if($sc > 268)
                    $h2 = Config('constants.catDesc.'.$mc.'.title');
                if(!($sc > 268))
                    $h2 = Config('constants.catDesc.'.$sc.'.title');
            }
            if(empty($sc))
                $desc = Config('constants.catDesc.'.$mc.'.description');
            if(!empty($sc)){
                if($sc > 268)
                    $desc = Config('constants.catDesc.'.$mc.'.description');
                
                if(!($sc > 268))
                    $desc = Config('constants.catDesc.'.$sc.'.description');
            }
        }


        if (strpos($currentUrl, '.LOC10') || strpos($currentUrl, '.LOC14')){
            if(empty($sc))
                $h2 = Config('constants.catDesc.'.$mc.'.title');
            if(!empty($sc)){
                if($sc > 268)
                    $h2 = Config('constants.catDesc.'.$mc.'.title');
                if(!($sc > 268))
                    $h2 = Config('constants.catDesc.'.$sc.'.title');
            }
            if(empty($sc))
                $desc = Config('constants.catDesc.'.$mc.'.description');
            if(!empty($sc)){
                if($sc > 268)
                    $desc = Config('constants.catDesc.'.$mc.'.description');
                if(!($sc > 268))
                    $desc = Config('constants.catDesc.'.$sc.'.description');
            }
        }

        $view = 'business-listing.listing';

        return view($view, compact('brandResults','shuffledResults','breadCrumb','catName','mc','sc','ssc','fType','seoTitle','seoDesc','loc','seoKeywords','orderBy','minRangeValue','maxRangeValue','text','searchQ','minCost','maxCost','city', 'maxvalueSlider', 'minvalueSlider', 'h2', 'desc', 'totalRecords'));

    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBusinessListing()
    {
        // Fetch the request parameters
        $mainCatId = 0;
        $subCatId = 0;
        $thirdCatId = 0;
        $cid = 0;
        $breadCrumb = '';
        $minRangeValue = 0;
        $maxRangeValue = 100000000;
        $text = '';
        $seoDesc = '';
        $seoKeywords = '';
        $searchQ = '';
        $fType = '';
        $orderBy = '';
        $loc = array();
        $ssc = array();
        $catParam = request()->category_param;

        if (isset(request()->mainCatmId))
            $catParam = request()->mainCatmId;

        if ($catParam)
            $cid = preg_split('#(?<=[a-z])(?=\d)#i', $catParam);

        if (count($cid) != 2)
            return redirect('/business-opportunities/all/all', 301);

        $seoClass = (request()->segment(1) == 'hi') ? CategoryFinalHindi::query() : CategoryFinal::query();
        $catArr = $seoClass->where('catid', $cid[1])->first();

        if (count($catArr) == 0)
            return redirect('/business-opportunities/all/all', 301);

        $catName = $catArr->catname;

        $franData = FranchisorBusinessDetail::query()->where('profile_status', 1);

        if ($cid[0] == 'ssc') {
            $franData->where('ind_sub_cat', $cid[1]);
            $thirdCatId = $cid[1];
            $subCatId = $catArr->parent_id;

            $catData = new CategoryController();
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
        }

        $franData->orderby('membership_weightage', 'desc');


        if (!empty($catArr->seoTitle))
            $seoTitle = $catArr->seoTitle;
        else
            $seoTitle = $catArr->catname . ' - Franchise India';

        if (!empty($catArr->description))
            $seoDesc     = $catArr->description;

        if (!empty($catArr->keywords))
            $seoKeywords = $catArr->keywords;

        if ($cid[0] == 'ssc') {
            $seoTitle = sprintf('%s Business Opportunity in India – Franchise India', $catArr->catname);
            $seoDesc  = sprintf('Franchise India offers wide variety of %1$s franchise opportunities to run a successful %1$s franchise business. You can explore some of the established and well known %1$s franchises here.', $catArr->catname);
        }

        $totalRecordObj = clone $franData;

        if(!empty(request()->offset) && is_numeric(request()->offset))
            $franData->offset(request()->offset);


        if(!empty(request()->page) && is_numeric(request()->page) && request()->page > 0)
            $franData->offset(request()->page*21);


        $shuffledResults = $franData
            ->take(21)
            ->get()
            ->shuffle()
            ->sortByDesc('membership_weightage')
            ->toArray();

        $totalRecords = $totalRecordObj->count();

        ksort($shuffledResults);

        $franImageData   = [];
        if(!empty($shuffledResults)) {
            $paidFranchisors = collect($shuffledResults);
            $imageFranchisor = $paidFranchisors->where('membership_type', 1)->pluck('franchisor_id');
            $sliderCheck     = FranchisorSliderTenure::query()
                ->select('franchisor_id')
                ->where('status', 1)
                ->where('end_date', '>=', date('Y-m-d H:i:s'))
                ->get()->pluck('franchisor_id');

            $franImageData   = FranchisorSliderImage::query()
                ->select('franchisor_id')
                ->whereIn('franchisor_id', $imageFranchisor)
                ->whereIn('franchisor_id', $sliderCheck)
                ->whereNotNull('image_type_slider2')
                ->where('image_type_slider2' , '!=', '')
                ->where('status', 1)
                ->groupBy('franchisor_id')
                ->get();
        }

        array_multisort( array_column($shuffledResults, "membership_type"), SORT_DESC, $shuffledResults );

        $resultCount = 0;
        foreach ($shuffledResults as $brandResult) {

            $shuffledResults[$resultCount]['premium'] = 0;
            foreach($franImageData as $imgData) {
                if( $imgData->franchisor_id == $shuffledResults[$resultCount]['franchisor_id'] )
                    $shuffledResults[$resultCount]['premium'] = 1;
            }

            $SubCatName = "";

            $brandImagePath = "https://www.franchiseindia.com/images/no-img.gif";
            if(($brandResult['membership_type'] == 1 || $brandResult['free_logo_visibility'] == 1) && !empty($brandResult['company_logo']))
                $brandImagePath = Config('constants.franAwsImgPath') . $brandResult['company_logo'];

            $minValue = $brandResult['unit_inv_min'];
            $area = "-N/A-";

            if ($minValue < 100000 && $minValue > 1000)
                $minValue = substr(($minValue / 1000), 0, 5) . ' K';

            if ($minValue <= 9999999 && $minValue > 99999)
                $minValue = substr(($minValue / 100000), 0, 5) . ' Lac';

            if ($minValue > 9999999)
                $minValue = substr(($minValue / 10000000), 0, 5) . ' Cr';

            $maxValue = $brandResult['unit_inv_max'];
            if ($maxValue < 100000 && $maxValue > 1000)
                $maxValue = substr(($maxValue / 1000), 0, 5) . ' K';

            if ($maxValue <= 9999999 && $maxValue > 99999)
                $maxValue = substr(($maxValue / 100000), 0, 5) . ' Lac';

            if ($maxValue > 9999999)
                $maxValue = substr(($maxValue / 10000000), 0, 5) . ' Cr';

            $priceRange = "INR  $minValue  - $maxValue ";


            foreach (Config('constants.subSubCategoryArr') as $key => $abc) {
                if (array_key_exists($brandResult['ind_sub_cat'], $abc)) {
                    $SubCatName = $abc[$brandResult['ind_sub_cat']];
                }
            }

            if (!empty($brandResult['prop_area_max']))
                $area = $brandResult['prop_area_min'] . " - " . $brandResult['prop_area_max']. " sq. ft.";

            if (empty($brandResult['prop_area_max']))
                $area = $brandResult['prop_area_min'];

            if (empty($brandResult['prop_area_min']))
                $area = "-N/A-";

            //$type = $shuffledResults[$resultCount]['looking_franchise'] == 1 ?  "Franchise Type" : "Channel Type";
            $type = $shuffledResults[$resultCount]['looking_franchise'] == 1 ?  "Type" : "Type";
            $partner_type = "";
            if(is_numeric($brandResult['franchise_partner_type']) && $brandResult['franchise_partner_type'] > 0 && $brandResult['franchise_partner_type'] < 4)
                $partner_type = Config('constants.masterfranchiseType.'.$brandResult['franchise_partner_type']);

            $likes = 0;
            $ratings  = 0;
            $franchisorLikes = FranchisorLike::query()->where('franchisor_id', $brandResult['franchisor_id'])->first();
            if(!empty($franchisorLikes) && count ($franchisorLikes) > 0){
                $likes = $franchisorLikes->blike;
                if($franchisorLikes->brate != 0 && $franchisorLikes->bclick != 0){
                    $ratings = $franchisorLikes->brate/$franchisorLikes->bclick;
                    $ratings = round( $ratings, 1);
                }
            }

            $shuffledResults[$resultCount]['likes'] = $likes;
            $shuffledResults[$resultCount]['ratings'] = $ratings;
            $shuffledResults[$resultCount]['brand_url'] = sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $brandResult['profile_name'], $brandResult['fran_detail_id']);
            $shuffledResults[$resultCount]['area'] = $area;
            $shuffledResults[$resultCount]['sub_category'] = $SubCatName;
            $shuffledResults[$resultCount]['logo'] = $brandImagePath;
            $shuffledResults[$resultCount]['investment'] = $priceRange;
            $shuffledResults[$resultCount]['type'] = $type;
            $shuffledResults[$resultCount]['partner_type'] = $partner_type;
            $shuffledResults[$resultCount]['business_desc'] = implode(' ', array_slice(explode(' ', substr(strip_tags($brandResult['business_desc']),0,210)), 0, 10))."...";

            $franchisorExpansionStates = FranchisorLocState::query()->where('franchisor_id', $brandResult['franchisor_id'])->get();
            $states = "";

            if(count($franchisorExpansionStates) > 0) {
                $stateCount = 0;
                foreach ($franchisorExpansionStates as $state) {
                    $states .= $state->state . ", ";
                    $stateCount++;
                    if($stateCount == 1)
                        break;
                }

                $states = rtrim($states, ', ');
                if($states == "")
                    $states = "No Location selected";
                else {
                    if(count($franchisorExpansionStates) > 2)
                        $states .= $states."...+".(count($franchisorExpansionStates)-2)." More";
                }
            }

            $shuffledResults[$resultCount]['states'] = $states;
            $resultCount++;
        }


        $minvalueSlider = $minRangeValue;
        if($minvalueSlider < 100000 && $minvalueSlider > 1000)
            $minvalueSlider = substr(($minvalueSlider/1000),0,5).' K';

        if($minvalueSlider <= 9999999 && $minvalueSlider > 99999)
            $minvalueSlider = substr(($minvalueSlider/100000),0,5).' Lac';

        if($minvalueSlider > 9999999)
            $minvalueSlider = substr(($minvalueSlider/10000000),0,5).' Cr';

        $maxvalueSlider = $maxRangeValue;
        if($maxvalueSlider < 100000 && $maxvalueSlider > 1000)
            $maxvalueSlider = substr(($maxvalueSlider/1000),0,5).' K';

        if($maxvalueSlider <= 9999999 && $maxvalueSlider > 99999)
            $maxvalueSlider = substr(($maxvalueSlider/100000),0,5).' Lac';

        if($maxvalueSlider > 9999999)
            $maxvalueSlider = substr(($maxvalueSlider/10000000),0,5).' Cr';


        if(request()->ajax())
            return $shuffledResults;

        $mc    = $mainCatId;
        $sc    = $subCatId;
        $ssc[] = $thirdCatId;
        $h2       = "";
        $desc     = "";
        $currentUrl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if (strpos($currentUrl, '.LOC23')){
            $h2   = Config('constants.catDesc.loc23.title');
            $desc = Config('constants.catDesc.loc23.description');
        } elseif (strpos($currentUrl, 'all/all')){
            $h2   = Config('constants.catDesc.all.title');
            $desc = Config('constants.catDesc.all.description');
        } elseif (strpos($currentUrl, '/lowcost')) {
            $h2   = Config('constants.catDesc.lowcost.title');
            $desc = Config('constants.catDesc.lowcost.description');
        } elseif (strpos($currentUrl, '.LOC9')) {
            $h2   = Config('constants.catDesc.loc9.title');
            $desc = Config('constants.catDesc.loc9.description');
        } elseif (strpos($currentUrl, '.LOC15')) {
            $h2   = Config('constants.catDesc.loc15.title');
            $desc = Config('constants.catDesc.loc15.description');
        } elseif (strpos($currentUrl, '.LOC18')) {
            $h2   = Config('constants.catDesc.loc18.title');
            $desc = Config('constants.catDesc.loc18.description');
        } elseif (strpos($currentUrl, '.LOC29')){
            $h2   = Config('constants.catDesc.loc29.title');
            $desc = Config('constants.catDesc.loc29.description');
        }  elseif (strpos($currentUrl, '.LOC1')) {
            $h2   = Config('constants.catDesc.loc1.title');
            $desc = Config('constants.catDesc.loc1.description');
        }  else {
            if(empty($sc))
                $h2 = Config('constants.catDesc.'.$mc.'.title');
            if(!empty($sc)){
                if($sc > 268)
                    $h2 = Config('constants.catDesc.'.$mc.'.title');
                if(!($sc > 268))
                    $h2 = Config('constants.catDesc.'.$sc.'.title');
            }
            if(empty($sc))
                $desc = Config('constants.catDesc.'.$mc.'.description');
            if(!empty($sc)){
                if($sc > 268)
                    $desc = Config('constants.catDesc.'.$mc.'.description');

                if(!($sc > 268))
                    $desc = Config('constants.catDesc.'.$sc.'.description');
            }
        }


        if (strpos($currentUrl, '.LOC10') || strpos($currentUrl, '.LOC14')){
            if(empty($sc))
                $h2 = Config('constants.catDesc.'.$mc.'.title');
            if(!empty($sc)){
                if($sc > 268)
                    $h2 = Config('constants.catDesc.'.$mc.'.title');
                if(!($sc > 268))
                    $h2 = Config('constants.catDesc.'.$sc.'.title');
            }
            if(empty($sc))
                $desc = Config('constants.catDesc.'.$mc.'.description');
            if(!empty($sc)){
                if($sc > 268)
                    $desc = Config('constants.catDesc.'.$mc.'.description');
                if(!($sc > 268))
                    $desc = Config('constants.catDesc.'.$sc.'.description');
            }
        }

        $view = 'business-listing.listing';

        return view($view, compact('brandResults','shuffledResults','breadCrumb','catName','mc','sc','ssc','fType','seoTitle','seoDesc','loc','seoKeywords','orderBy','minRangeValue','maxRangeValue','text','searchQ','minCost','maxCost','city', 'maxvalueSlider', 'minvalueSlider', 'h2', 'desc', 'totalRecords'));
    }

    /**
     * @return array|string
     */
    public function getBrandSliderImages()
    {
        $images = FranchisorSliderImage::query()->select('image_type_slider2 as image')
            ->where('franchisor_id', request()->franId)
            ->where('image_type_slider2', '!=', '')
            ->where('status', 1)
            ->get()
            ->toArray();

        if(empty($images))
            return "";

        return $images;
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
        if($catIds[0] === 'loc') {
            request()->route()->setParameter('loc', $idsArray);
        }
        if ($catIds[0] === 'ft') {
            request()->route()->setParameter('ftype', $idsArray[0]);
        }
        if ($catIds[0] === 'range') {
            request()->route()->setParameter('minrange', $idsArray[0]);
            request()->route()->setParameter('maxrange', $idsArray[1]);
        }
        if ($catIds[0] === 'ct') {
            $_city = str_replace('ct-', '', $categoryIds);
            request()->route()->setParameter('city', str_replace('-', ' ', $_city));
        }

    }

    /**
     * @param $catId
     * @return array
     */
    public static function sliderData($catId = 0)
    {
        $resultCount = 0;
        $sliderResult =  CategorySlider::query()->select('franchisor_id', 'image');

        if($catId != 0)
            $sliderResult->where('category_id', $catId);

        if($catId == 0)
            $sliderResult->inRandomOrder();

        $sliderResult = $sliderResult->take(4)->get();
        $shuffledResults =  FranchisorBusinessDetail::query()->whereIn('franchisor_id', $sliderResult->pluck('franchisor_id'))->groupBy('franchisor_id')->get()->toArray();

        foreach ($shuffledResults as $brandResult) {

            $shuffledResults[$resultCount]['image'] = "";

            $shuffledResults[$resultCount]['premium'] = 0;

            foreach($sliderResult as $imgData) {
                if( $imgData->franchisor_id == $shuffledResults[$resultCount]['franchisor_id'] )
                    $shuffledResults[$resultCount]['image'] = $imgData->image;
            }

            $SubCatName = "";
            $brandImagePath = "https://www.franchiseindia.com/images/no-img.gif";
            if(($brandResult['membership_type'] == 1 || $brandResult['free_logo_visibility'] == 1) && !empty($brandResult['company_logo']))
                $brandImagePath = Config('constants.franAwsImgPath') . $brandResult['company_logo'];

            $minValue = $brandResult['unit_inv_min'];
            $area = "-N/A-";

            if ($minValue < 100000 && $minValue > 1000)
                $minValue = substr(($minValue / 1000), 0, 5) . ' K';

            if ($minValue <= 9999999 && $minValue > 99999)
                $minValue = substr(($minValue / 100000), 0, 5) . ' Lac';

            if ($minValue > 9999999)
                $minValue = substr(($minValue / 10000000), 0, 5) . ' Cr';

            $maxValue = $brandResult['unit_inv_max'];
            if ($maxValue < 100000 && $maxValue > 1000)
                $maxValue = substr(($maxValue / 1000), 0, 5) . ' K';

            if ($maxValue <= 9999999 && $maxValue > 99999)
                $maxValue = substr(($maxValue / 100000), 0, 5) . ' Lac';

            if ($maxValue > 9999999)
                $maxValue = substr(($maxValue / 10000000), 0, 5) . ' Cr';

            $priceRange = "INR  $minValue  - $maxValue ";


            foreach (Config('constants.subSubCategoryArr') as $key => $abc) {
                if (array_key_exists($brandResult['ind_sub_cat'], $abc)) {
                    $SubCatName = $abc[$brandResult['ind_sub_cat']];
                }
            }

            if (!empty($brandResult['prop_area_max']))
                $area = $brandResult['prop_area_min'] . " - " . $brandResult['prop_area_max']. " sq. ft.";

            if (empty($brandResult['prop_area_max']))
                $area = $brandResult['prop_area_min'];

            if (empty($brandResult['prop_area_min']))
                $area = "-N/A-";

            //$type = $shuffledResults[$resultCount]['looking_franchise'] == 1 ?  "Franchise Type" : "Channel Type";
            $type = $shuffledResults[$resultCount]['looking_franchise'] == 1 ?  "Type" : "Type";
            $partner_type = "";
            if(is_numeric($brandResult['franchise_partner_type']) && $brandResult['franchise_partner_type'] > 0 && $brandResult['franchise_partner_type'] < 4)
                $partner_type = Config('constants.masterfranchiseType.'.$brandResult['franchise_partner_type']);

            $likes = 0;
            $ratings  = 0;
            $franchisorLikes = FranchisorLike::query()->where('franchisor_id', $brandResult['franchisor_id'])->first();
            if(!empty($franchisorLikes) && count ($franchisorLikes) > 0){
                $likes = $franchisorLikes->blike;
                if($franchisorLikes->brate != 0 && $franchisorLikes->bclick != 0){
                    $ratings = $franchisorLikes->brate/$franchisorLikes->bclick;
                    $ratings = round( $ratings, 1);
                }
            }

            $shuffledResults[$resultCount]['likes'] = $likes;
            $shuffledResults[$resultCount]['ratings'] = $ratings;
            $shuffledResults[$resultCount]['brand_url'] = sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $brandResult['profile_name'], $brandResult['fran_detail_id']);
            $shuffledResults[$resultCount]['area'] = $area;
            $shuffledResults[$resultCount]['sub_category'] = $SubCatName;
            $shuffledResults[$resultCount]['logo'] = $brandImagePath;
            $shuffledResults[$resultCount]['investment'] = $priceRange;
            $shuffledResults[$resultCount]['type'] = $type;
            $shuffledResults[$resultCount]['partner_type'] = $partner_type;
            $shuffledResults[$resultCount]['business_desc'] = implode(' ', array_slice(explode(' ', substr(strip_tags($brandResult['business_desc']),0,210)), 0, 10))."...";

            $franchisorExpansionStates = FranchisorLocState::query()->where('franchisor_id', $brandResult['franchisor_id'])->get();
            $states = "";

            if(count($franchisorExpansionStates) > 0) {
                $stateCount = 0;
                foreach ($franchisorExpansionStates as $state) {
                    $states .= $state->state . ", ";
                    $stateCount++;
                    if($stateCount == 1)
                        break;
                }

                $states = rtrim($states, ', ');
                if($states == "")
                    $states = "No Location selected";
                else {
                    if(count($franchisorExpansionStates) > 2)
                        $states .= $states."...+".(count($franchisorExpansionStates)-2)." More";
                }
            }

            $shuffledResults[$resultCount]['states'] = $states;
            $resultCount++;
        }
        return $shuffledResults;
    }
}
