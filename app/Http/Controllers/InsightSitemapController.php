<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoTag;
use App\Models\InsightList;
use App\Models\InsightCategory;
use App\Models\InsightsHindiCategory;
use App\Models\InsightSubcategory;
use App\Models\InsightsHindiSubCategory;
use App\Models\ContentTagsAssigned;
use App\Models\ContentTagsAssignedHindi;
use App\Models\InsightListHindi;
use App\Models\SeoTagHindi;
use Illuminate\Support\Carbon;

class InsightSitemapController extends Controller
{
    //html sitemap start here //

    public function sitemap()
    {
        // Query years from English table
        $englishYears = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->selectRaw('YEAR(created_at) as year')
            ->groupByRaw('YEAR(created_at)')
            ->pluck('year');

        // Query years from Hindi table
        $hindiYears = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->selectRaw('YEAR(created_at) as year')
            ->groupByRaw('YEAR(created_at)')
            ->pluck('year');

        // Combine and sort the years
        $allYears = $englishYears->merge($hindiYears)->unique()->sortDesc()->values();
        // dd($allYears);
        return view('insights.sitemaps.year_sitemap', compact('allYears'));
    }



    public function monthsitemap(Request $request, $year)
    {
        $Y = $year;
        $englishMonths = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereRaw('YEAR(created_at) = ?', [$Y])
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupByRaw('MONTH(created_at)')
            ->pluck('month');

        $hindiMonths = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereRaw('YEAR(created_at) = ?', [$Y])
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupByRaw('MONTH(created_at)')
            ->pluck('month');
        // Combine and sort the years
        $allMonths = $englishMonths->merge($hindiMonths)->unique()->sort()->values();
        // dd($allMonths);
        return view('insights.sitemaps.month_sitemap', compact('allMonths', 'Y'));
    }

    public function daysitemap(Request $request, $year, $month)
    {
        $Y = $year;
        $M = $month;
        $englishDays = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereRaw('YEAR(created_at) = ?', [$Y])
            ->whereRaw('MONTH(created_at) = ?', [$M])
            ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
            ->groupByRaw('DAY(created_at)')
            ->orderBy('created_at')
            ->pluck('day');
        $hindiDays = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereRaw('YEAR(created_at) = ?', [$Y])
            ->whereRaw('MONTH(created_at) = ?', [$M])
            ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
            ->groupByRaw('DAY(created_at)')
            ->orderBy('created_at')
            ->pluck('day');

        $allDays = $englishDays->merge($hindiDays)->unique()->sort()->values();
        return view('insights.sitemaps.day_sitemap', compact('allDays', 'M', 'Y'));
    }


    public function datesitemap(Request $request, $year, $month, $day)
    {
        // Fetch English data with a source identifier
        $englishData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('YEAR(created_at) = ?', [$year])
            ->whereRaw('MONTH(created_at) = ?', [$month])
            ->whereRaw('DAY(created_at) = ?', [$day])
            ->orderBy('created_at')
            ->get()
            ->map(function ($item) {
                $item->source = 'en'; // Add source identifier
                return $item;
            });

        // Fetch Hindi data with a source identifier
        $hindiData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('YEAR(created_at) = ?', [$year])
            ->whereRaw('MONTH(created_at) = ?', [$month])
            ->whereRaw('DAY(created_at) = ?', [$day])
            ->get()
            ->map(function ($item) {
                $item->source = 'hi'; // Add source identifier
                return $item;
            });

        // Combine and process all data
        $allData = $englishData->merge($hindiData)->unique()->values();
        // dd($allData);
        return view('insights.sitemaps.date_sitemap', compact('allData', 'year', 'month', 'day'));
    }



    public function todaysitemap()
    {
        $enTodayData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereDate('created_at', Carbon::today())
            ->get()
            ->map(function ($item) {
                $item->source = 'en'; // Add source identifier
                return $item;
            });

        $hiTodayData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereDate('created_at', Carbon::today())
            ->get()
            ->map(function ($item) {
                $item->source = 'hi'; // Add source identifier
                return $item;
            });

        $allTodayData = $enTodayData->merge($hiTodayData)->unique()->values();

        return view('insights.sitemaps.today_sitemap', compact('allTodayData'));
    }

    public function yesterdaysitemap()
    {
        // Fetch yesterday's data
        $englishYdayData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereDate('created_at', Carbon::yesterday())
            ->get()
            ->map(function ($item) {
                $item->source = 'en'; // Add source identifier
                return $item;
            });
        $hindiYdayData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereDate('created_at', Carbon::yesterday())
            ->get()
            ->map(function ($item) {
                $item->source = 'hi'; // Add source identifier
                return $item;
            });

        $allYdayData = $englishYdayData->merge($hindiYdayData)->unique()->values();

        return view('insights.sitemaps.yesterday_sitemap', compact('allYdayData'));
    }
    public function thisweeksitemap()
    {
        // Fetch yesterday's data
        $engThisWeekData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::MONDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
            ->get()
            ->map(function ($item) {
                $item->source = 'en';
                return $item;
            });

        $hinThisWeekData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::MONDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
            ->get()
            ->map(function ($item) {
                $item->source = 'hi';
                return $item;
            });

        $allThisWeekData = $engThisWeekData->merge($hinThisWeekData)->unique()->values();
        // Render the view with the data
        return view('insights.sitemaps.thisweek_sitemap', compact('allThisWeekData'));
    }
    public function lastweeksitemap()
    {
        // Fetch last week's data
        $engLastWeekData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfWeek(Carbon::MONDAY),
                Carbon::now()->subWeek()->endOfWeek(Carbon::SUNDAY)
            ])
            ->get()
            ->map(function ($item) {
                $item->source = 'en';
                return $item;
            });

        $hinLastWeekData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfWeek(Carbon::MONDAY),
                Carbon::now()->subWeek()->endOfWeek(Carbon::SUNDAY)
            ])
            ->get()
            ->map(function ($item) {
                $item->source = 'hi';
                return $item;
            });

        $allLastWeekData = $engLastWeekData->merge($hinLastWeekData)->unique()->values();

        // Render the view with the data
        return view('insights.sitemaps.lastweek_sitemap', compact('allLastWeekData'));
    }


    // html sitemap end here

    // xml sitemap start here
    public function newssitemap()
    {
        // Determine locale based on the URL segment
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Select the appropriate model
        $model = $locale === 'hi' ? InsightListHindi::class : InsightList::class;

        // Fetch news sitemap data
        $newssitemap = $model::where('insight_type', 'News')
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->get();

        // Return XML response
        return response()
            ->view('insights.sitemaps.news_sitemap', ['newssitemap' => $newssitemap])
            ->header('Content-Type', 'text/xml');
    }


    public function articlesitemap()
    {
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        $articlesitemap = $model::whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Article')
            ->where('cat_id', '!=', '')
            ->where('status', 1)->limit(10000)
            ->orderByDesc('created_at')
            ->get();
        //  dd($model,$locale);
        return response()->view('insights.sitemaps.art_sitemap', ['articlesitemap' => $articlesitemap])->header('Content-type', 'text/xml');
    }
    public function articlesitemaptwo()
    {
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        $articlesitemap = $model::whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Article')
            ->where('cat_id', '!=', '')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->offset(10000) // Skip the first 12,000 records
            ->limit(7000)   // Fetch the next 5,000 records
            ->get();

        //  dd($articlesitemap);
        return response()->view('insights.sitemaps.art_sitemap', ['articlesitemap' => $articlesitemap])->header('Content-type', 'text/xml');
    }

    public function interviewsitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        $interviewsitemap = $model::whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Interview')
            ->where('cat_id', '!=', '')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->get();
        return response()->view('insights.sitemaps.interview_sitemap', ['interviewsitemap' => $interviewsitemap])->header('Content-type', 'text/xml');
    }

    public function eventsitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        $eventsitemap = $model::whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Event')
            ->where('cat_id', '!=', '')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->get();
        return response()->view('insights.sitemaps.event_sitemap', ['eventsitemap' => $eventsitemap])->header('Content-type', 'text/xml');
    }
    public function reportsitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        $reportsitemap = $model::whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Event')
            ->where('cat_id', '!=', '')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->get();
        return response()->view('insights.sitemaps.report_sitemap', ['reportsitemap' => $reportsitemap])->header('Content-type', 'text/xml');
    }
    public function categorysitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $catmodel = $locale == 'hi' ? InsightsHindiCategory::class : InsightCategory::class;
        $categoryIds = $model::select('cat_id')
            ->distinct()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereNotNull('cat_id')
            ->pluck('cat_id');

        $categories = $catmodel::whereIn('id', $categoryIds)->get();

        // Fetch creation date from InsightList for each category
        $categorydata = [];
        foreach ($categories as $category) {
            $categorydata[] = [
                'category' => $category,
                'created_at' => $model::where('cat_id', $category->id)->whereNotIn('news_type', ['ri', 'ir'])
                    ->where('status', 1)->value('created_at')
            ];
        }
        // dd($categorydata);
        return response()->view('insights.sitemaps.categories_sitemap', ['categorydata' => $categorydata])->header('Content-type', 'text/xml');
    }


    public function subcategorysitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $catModel = $locale == 'hi' ? InsightsHindiCategory::class : InsightCategory::class;
        $subcatModel = $locale == 'hi' ? InsightsHindiSubCategory::class : InsightSubcategory::class;

        $subcatIds = $model::whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereNotNull('cat_id')
            ->whereNotNull('subcat_id')
            ->distinct()
            ->pluck('subcat_id');

        $subcategories = $subcatModel::whereIn('id', $subcatIds)
            ->with('category') // Ensure eager loading of the category
            ->get()
            ->map(function ($subcat) use ($model) {
                return [
                    'category' => $subcat->category, // This should now be an individual model
                    'scategory' => $subcat,
                    'created_at' => $model::where('subcat_id', $subcat->id)
                        ->whereNotIn('news_type', ['ri', 'ir'])
                        ->where('status', 1)
                        ->value('created_at'),
                ];
            });

        return response()
            ->view('insights.sitemaps.subcat_sitemap', ['subcategories' => $subcategories])
            ->header('Content-type', 'text/xml');
    }






    public function tagsitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Select models based on locale
        $model = $locale === 'hi' ? InsightListHindi::class : InsightList::class;
        $contentmodel = $locale === 'hi' ? ContentTagsAssignedHindi::class : ContentTagsAssigned::class;
        $seomodel = $locale === 'hi' ? SeoTagHindi::class : SeoTag::class;

        // Fetch insight IDs
        $insightIds = $model::query()
            ->select('news_id')
            ->distinct()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('cat_id', '!=', '')
            ->where('status', 1)
            ->limit(10000)
            ->pluck('news_id');

        // Fetch content tag IDs
        $contentTagIds = $contentmodel::query()
            ->select('tag_id')
            ->distinct()
            ->whereIn('content_id', $insightIds)
            ->limit(10000)
            ->pluck('tag_id');

        // Fetch SEO tags
        $tags = $seomodel::query()
            ->select('tag_id', 'name')
            ->whereIn('tag_id', $contentTagIds)
            ->limit(10000)
            ->get();

        // Prepare tags data
        $tagsData = [];
        foreach ($tags as $tag) {
            $createdAt = $model::whereIn('news_id', $insightIds)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->where('status', 1)
                ->value('created_at');

            $tagsData[] = [
                'tag' => $tag->name,
                'created_at' => $createdAt
            ];

            // Stop if we've hit the limit
            if (count($tagsData) >= 10000) {
                break;
            }
        }

        // Return XML response
        return response()
            ->view('insights.sitemaps.tags_sitemap', ['tagsData' => $tagsData])
            ->header('Content-Type', 'text/xml');
    }
}
