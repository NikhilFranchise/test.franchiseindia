<?php

namespace App\Services;

use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Cache;

class RelatedBrandService
{

    public function getRelatedBrands(int $limit, FranchisorBusinessDetail $baseBrand): array
    {
        $existingIds = [$baseBrand->franchisor_id];
        // dd($limit, $existingIds);

        $result = [];

        // 1. Try by ind_sub_cat
        $result = $this->fetchBrands($limit, $existingIds, ['ind_sub_cat' => $baseBrand->ind_sub_cat]);
        $existingIds = array_merge($existingIds, array_column($result, 'franchisor_id'));

        // 2. Try by ind_cat if not enough
        if (count($result) < $limit) {
            $remaining = $limit - count($result);
            $more = $this->fetchBrands($remaining, $existingIds, ['ind_cat' => $baseBrand->ind_cat]);
            $result = array_merge($result, $more);
            $existingIds = array_merge($existingIds, array_column($more, 'franchisor_id'));
        }

        // 3. Try by ind_main_cat
        if (count($result) < $limit) {
            $remaining = $limit - count($result);
            $more = $this->fetchBrands($remaining, $existingIds, ['ind_main_cat' => $baseBrand->ind_main_cat]);
            $result = array_merge($result, $more);
            $existingIds = array_merge($existingIds, array_column($more, 'franchisor_id'));
        }

        // 4. Fallback: any active brand
        if (count($result) < $limit) {
            $remaining = $limit - count($result);
            $more = $this->fetchBrands($remaining, $existingIds);
            $result = array_merge($result, $more);
        }

        return $result;
    }

    /**
     * Fetch brands with filters and exclude franchisor_ids.
     *
     * @param int $limit
     * @param array $excludeIds
     * @param array $filters
     * @return array
     */
    private function fetchBrands(int $limit, array $excludeIds, array $filters = []): array
    {
        $query = FranchisorBusinessDetail::query()
            ->select('franchisor_id', 'company_name', 'profile_name', 'unit_inv_min', 'unit_inv_max', 'company_logo', 'ind_main_cat', 'ind_cat', 'ind_sub_cat', 'unit_investment', 'no_fran_outlets', 'franchise_partner_type', 'fran_detail_id', 'business_desc', 'state', 'city', 'operations_start_year', 'franchise_start_year', 'prop_area_min')
            ->where('membership_type', 1)
            ->where('profile_status', 1)
            ->whereNotIn('franchisor_id', $excludeIds)
            ->inRandomOrder()
            ->take($limit);

        foreach ($filters as $column => $value) {
            $query->where($column, $value);
        }

        return $query->get()->toArray();
    }
}
