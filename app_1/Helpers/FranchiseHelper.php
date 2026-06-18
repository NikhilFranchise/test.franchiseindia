<?php

namespace App\Helpers;

use App\Models\FranchisorBusinessDetail;

class FranchiseHelper
{
    public static function matchFranchisesByTitle(string $title)
    {
        $titleWords = preg_split('/\s+/', strtolower($title));
        $titleString = implode(' ', $titleWords);

        return FranchisorBusinessDetail::where('profile_status', 1)
            ->select('fran_detail_id', 'company_name', 'profile_name')
            ->get()
            ->filter(function ($item) use ($titleString) {
                $companyWords = array_map('strtolower', explode(' ', $item->company_name));
                $escapedWords = array_map(fn($word) => preg_quote($word, '~'), $companyWords);
                $pattern = '~\b' . implode('\b.*?\b', $escapedWords) . '\b~i'; // Note: using ~ as delimiter
                return preg_match($pattern, $titleString);
            })
            ->take(10)
            ->values()
            ->map(fn($match) => [
                'fran_detail_id' => $match->fran_detail_id,
                'company_name' => $match->company_name,
                'profile_name' => $match->profile_name,
                'title' => $title,
            ])
            ->toArray();
    }
}
