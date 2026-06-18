<?php

use App\Models\Crre\CrreContentList;
use App\Models\Crre\CrreHindiContentList;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Arr;


if (!function_exists('formatViews')) {
    function formatViews($number)
    {
        if ($number >= 100000) {
            return round($number / 100000, 1) . 'Lac'; // For lacs
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'Thousand'; // For thousands
        }
        return $number; // For numbers less than 1000
    }
}

// using below functions for crre

if (!function_exists('crreUrl')) {
    function crreUrl($item)
    {
        $locale = App::getLocale();
        $mainDomain = Config('constants.MainDomain');

        return "{$mainDomain}/crre/{$locale}/" .
            strtolower($item->insight_type) . "/" .
            "{$item->slug}.{$item->news_id}";
    }
}

if (!function_exists('authorUrl')) {
    function authorUrl($author)
    {
        return Config('constants.MainDomain')
            . "/crre/author/{$author->slug}-{$author->author_id}";
    }
}


if (!function_exists('calculateReadTime')) {

    function calculateReadTime($article)
    {
        // Combine title & content
        $text = ($article->title ?? '') . ' ' . ($article->content ?? '');

        // Remove HTML tags
        $text = strip_tags($text);

        // Normalize whitespace
        $text = preg_replace('/\s+/', ' ', $text);

        // Word count based on locale
        if (app()->getLocale() === 'en') {
            $wordCount = str_word_count($text);
        } else {
            // Multibyte-safe split for Hindi/UTF-8
            $wordCount = count(explode(' ', trim($text)));
        }

        // Avoid division by zero
        if ($wordCount < 1) {
            return 1;
        }

        // 200 words per minute
        return max(1, ceil($wordCount / 200));
    }
}

if (!function_exists('categoryUrl')) {
    function categoryUrl($cat)
    {
        $locale = app()->getLocale();

        return Config('constants.MainDomain')
            . "/crre/{$locale}/{$cat->slug}";
    }
}

if (!function_exists('subCategoryUrl')) {
    function subCategoryUrl($subcategory)
    {
        $locale = app()->getLocale();

        // subcategory->category is a collection, so get the first item
        $category = $subcategory->category->first();

        if (!$category) {
            return '#'; // safe fallback
        }

        return Config('constants.MainDomain')
            . "/crre/{$locale}/{$category->slug}/{$subcategory->slug}";
    }
}

function getPopularArticles($articleIds = [], $limit = 6, $cat = null)
{
    $locale = app()->getLocale();

    $model = $locale === 'hi'
        ? CrreHindiContentList::class
        : CrreContentList::class;

    // Ensure article IDs is a FLAT array
    $articleIds = Arr::flatten(is_array($articleIds) ? $articleIds : [$articleIds]);

    $query = $model::with('category')
        ->select('news_id', 'cat_id', 'title', 'slug', 'insight_type')
        ->withEffectiveDate()
        ->where('insight_type', 'Article')
        ->where('status', 1)
        ->whereNotIn('news_type', ['ri', 'ir']);

    // Apply only if articleIds is not empty
    if (!empty($articleIds)) {
        $query->whereNotIn('news_id', $articleIds);
    }

    if (!empty($cat)) {
        $query->where('cat_id', $cat);
    }

    return $query->orderByEffectiveDate('desc')
        ->limit($limit)
        ->get();
}


// insights helper functions 
if (!function_exists('insightsUrl')) {
    function insightsUrl($item, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $mainDomain = config('constants.MainDomain');

        return "{$mainDomain}/insights/{$locale}/" .
            strtolower($item->insight_type) . "/" .
            "{$item->slug}.{$item->news_id}";
    }
}

if (!function_exists('insightsCategoryData')) {
    function insightsCategoryData($name, $locale)
    {
        $map = [
            'Education'         => ['Education.png', 'शिक्षा व्यापार'],
            'Retail'            => ['Retail.png', 'खुदरा व्यापार'],
            'Food and Beverage' => ['FoodBeverage.png', 'खाद्य और पेय पदार्थ'],
            'expansion'         => ['Expansion.png', 'व्यापार विस्तार'],
            'Launch'            => ['StoreLaunch.png', 'नया लॉन्च'],
            'Startup'           => ['Startup.png', 'व्यापार स्टार्टअप'],
            'funding'           => ['Funding.png', 'व्यापार में अनुदान'],
            'expansion plans'   => ['ExpansionPlans.png', 'व्यापार विस्तार योजनाएँ'],
            'Franchise 100'     => ['Franchise100.png', 'फ्रेंचाइज़ 100'],
            'investment'        => ['Investment.png', 'व्यापार में निवेश'],
        ];

        $defaultImage = 'Investment.png';

        $key = $name;

        $image = $map[$key][0] ?? $defaultImage;
        $hindi = $map[$key][1] ?? $name;

        return [
            'image' => url("insight-new/assets/images/$image"),
            'name'  => $locale == 'en' ? ucwords($name) : $hindi,
        ];
    }
}


if (!function_exists('insightsAuthorUrl')) {
    function insightsAuthorUrl($author)
    {
        if (!$author) return null;

        $slug = data_get($author, 'slug');
        $id   = data_get($author, 'author_id');

        if (!$slug || !$id) return null;

        return config('constants.MainDomain') . "/insights/author/{$slug}-{$id}";
    }
}


if (!function_exists('insightsCategoryUrl')) {
    function insightsCategoryUrl($cat)
    {
        if (!$cat || empty($cat->slug)) {
            return '#'; // or null
        }
        $locale = app()->getLocale();

        return Config('constants.MainDomain')
            . "/insights/{$locale}/{$cat->slug}";
    }
}

if (!function_exists('insightsSubCategoryUrl')) {
    function insightsSubCategoryUrl($subcategory)
    {
        if (!$subcategory) {
            return '#';
        }

        $locale = app()->getLocale();
        $category = $subcategory->category;

        if (!$category) {
            return '#';
        }

        return config('constants.MainDomain')
            . "/insights/{$locale}/{$category->slug}/{$subcategory->slug}";
    }
}
