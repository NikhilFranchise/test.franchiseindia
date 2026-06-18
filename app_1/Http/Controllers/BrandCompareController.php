<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FranchisorBusinessDetail;
use App\Models\FranchisorLike;

class BrandCompareController extends Controller
{
    public function compareBrands()
    {
        $franchisors = FranchisorBusinessDetail::query()->whereIn('franchisor_id', explode(',', request()->franchisors))->take(3)->get();

        return view('category.compare-brands', compact('franchisors'));
    }

    /**
     * @return array|\Illuminate\Database\Eloquent\Builder
     */
    public function getComparableBrands()
    {
        $result = FranchisorBusinessDetail::query()->select('fran_detail_id', 'profile_name', 'franchisor_id', 'company_logo', 'membership_type', 'company_name', 'unit_investment', 'unit_inv_min', 'unit_inv_max')
            ->where('ind_main_cat', request()->mainCat)
            ->where('profile_status', 1);

        if (!empty(request()->type))
            $result = $result->where('franchise_partner_type', request()->type);

        if (!empty(request()->subCat))
            $result = $result->where('ind_cat', request()->subCat);

        if (!empty(request()->subSubCat))
            $result = $result->where('ind_sub_cat', request()->subSubCat);

        $result = $result->orderBy('membership_type', 'DESC')->take(200)->get()->toArray();

        return $result;
    }

    /**
     * @return array|mixed
     */
    public function getSingleBrand()
    {
        $result = FranchisorBusinessDetail::query()->select('membership_type', 'fran_detail_id', 'profile_name', 'company_name', 'prop_area_min', 'prop_area_max', 'company_logo', 'unitinv_royalty', 'ind_sub_cat', 'ind_cat', 'ind_main_cat', 'no_company_outlets', 'unitinv_brand_fee', 'unit_inv_min', 'unit_inv_max')
            ->where('franchisor_id', request()->franchisor_id)
            ->where('profile_status', 1)
            ->first();

        if (empty($result))
            return "";

        $rating = ['rating' => 0];
        $result = $result->toArray();
        $area = $result['prop_area_min'] . ' - ' . $result['prop_area_max'] . ' Sq.ft';
        $brandUrl = ['url' => url('/brands/' . $result['profile_name'] . '.' . $result['fran_detail_id'])];

        if (empty($result['prop_area_max']))
            $area = $result['prop_area_min'];

        if (is_numeric($result['prop_area_min']) && empty($result['prop_area_max']))
            $area = $result['prop_area_min'] . ' Sq.ft';

        if (empty($result['prop_area_min']))
            $area = '-N/A-';

        $amount = $result['unitinv_brand_fee'];

        if ($amount < 100000 && $amount > 10000)
            $amount = substr(($amount / 1000), 0, 5) . ' K';

        if ($amount <= 9999999 && $amount > 100000)
            $amount = substr(($amount / 100000), 0, 5) . ' Lac';

        if ($amount > 9999999)
            $amount = substr(($amount / 10000000), 0, 5) . ' Cr';

        $result['unitinv_brand_fee'] = $amount;


        $result['company_logo'] = "https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/" . $result['company_logo'];
        if ($result['membership_type'] != 1)
            $result['company_logo'] = "https://www.franchiseindia.com/images/no-img.gif";

        $result['unitinv_brand_fee'] = "INR " . $result['unitinv_brand_fee'];
        $area = ['area' => $area];


        $mainCat = ['main_cat' => Config('constants.CategoryArr.' . $result['ind_main_cat'])];
        $subCat = ['sub_cat' => Config('constants.subCategoryArr.' . $result['ind_main_cat'] . '.' . $result['ind_cat'])];
        $subSubCat = ['sub_sub_cat' => Config('constants.subSubCategoryArr.' . $result['ind_cat'] . '.' . $result['ind_sub_cat'])];

        $minValue = $result['unit_inv_min'];

        if ($minValue < 100000 && $minValue > 10000)
            $minValue = substr(($minValue / 1000), 0, 5) . ' K';

        if ($minValue <= 9999999 && $minValue > 100000)
            $minValue = substr(($minValue / 100000), 0, 5) . ' Lac';

        if ($minValue > 9999999)
            $minValue = substr(($minValue / 10000000), 0, 5) . ' Cr';

        $maxValue = $result['unit_inv_max'];
        if ($maxValue < 100000 && $maxValue > 10000)
            $maxValue = substr(($maxValue / 1000), 0, 5) . ' K';

        if ($maxValue <= 9999999 && $maxValue > 100000)
            $maxValue = substr(($maxValue / 100000), 0, 5) . ' Lac';

        if ($maxValue > 9999999)
            $maxValue = substr(($maxValue / 10000000), 0, 5) . ' Cr';

        $invRange1 = "INR  $minValue  - $maxValue ";

        $invRange = ['investmentRange' => $invRange1];

        $result = array_merge($area, $result);


        $franchisorLikes = FranchisorLike::query()->select('brate', 'bclick')->where('franchisor_id', request()->franchisor_id)->first();

        if (!empty($franchisorLikes))
            $franchisorLikes = $franchisorLikes->toArray();

        if (!empty($franchisorLikes) && !empty($franchisorLikes['brate']) && !empty($franchisorLikes['bclick']))
            $rating = ['rating' => round($franchisorLikes['brate'] / $franchisorLikes['bclick'], 1)];

        unset($result['brate']);
        unset($result['bclick']);
        unset($result['ind_cat']);
        unset($result['ind_main_cat']);
        unset($result['ind_sub_cat']);
        unset($result['prop_area_min']);
        unset($result['prop_area_max']);
        unset($result['unit_inv_min']);
        unset($result['unit_inv_max']);

        $result = array_merge($mainCat, $result);
        $result = array_merge($subCat, $result);
        $result = array_merge($subSubCat, $result);
        $result = array_merge($rating, $result);
        $result = array_merge($invRange, $result);
        $result = array_merge($brandUrl, $result);


        return $result;
    }
}
