<?php

namespace App\Services;

use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Cache;
use App\Models\InsightList;

class BrandDetailService
{
    public function getFranchiseDetails($id)
    {
        return FranchisorBusinessDetail::with([
            'franchisorLocState',
            'multiUnit',
            'franchisorLike',
            'userClick',
            'uniqueVisit',
            'franchisorSliderImage',
            'franchisorTradePartner'
        ])->find($id);
    }

    public function getInsightMatches($companyName)
    {
        $cacheKey = "insight_matches_" . md5($companyName);

        return Cache::remember($cacheKey, 604800, function () use ($companyName) {
            $cleanName = preg_replace('/[^a-zA-Z0-9\s]/', '', $companyName);
            $cleanName = preg_replace('/\s+/', ' ', trim($cleanName));
            $pattern = '(?i)(^|[[:space:]])' . preg_quote($cleanName, '/') . '([[:space:]]|$)';

            return InsightList::select('news_id', 'title', 'insight_type', 'slug', 'created_at')
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
    }
}
