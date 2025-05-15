<?php

namespace App\Http\Controllers;

use App\Models\AuthorList;
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
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use DOMDocument;
use Illuminate\Support\Str;


class InsightSitemapController extends Controller
{
    //html sitemap start here //

    // public function sitemap()
    // {
    //     // Query years from English table
    //     $englishYears = InsightList::query()

    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->where('status', 1)
    //         ->selectRaw('YEAR(created_at) as year')
    //         ->groupByRaw('YEAR(created_at)')
    //         ->pluck('year');

    //     // Query years from Hindi table
    //     $hindiYears = InsightListHindi::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->where('status', 1)
    //         ->selectRaw('YEAR(created_at) as year')
    //         ->groupByRaw('YEAR(created_at)')
    //         ->pluck('year');

    //     // Combine and sort the years
    //     $allYears = $englishYears->merge($hindiYears)->unique()->sortDesc()->values();
    //     // dd($allYears);
    //     return view('insights.sitemaps.year_sitemap', compact('allYears'));
    // }
    public function sitemap()
    {
        // Query years from English table
        $englishYears = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->selectRaw('YEAR(COALESCE(published_date, created_at)) as year')
            ->groupByRaw('YEAR(COALESCE(published_date, created_at))')
            ->pluck('year');

        // Query years from Hindi table
        $hindiYears = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->selectRaw('YEAR(COALESCE(published_date, created_at)) as year')
            ->groupByRaw('YEAR(COALESCE(published_date, created_at))')
            ->pluck('year');

        // Merge, deduplicate, and sort the years
        $allYears = $englishYears->merge($hindiYears)->unique()->sortDesc()->values();

        return view('insights.sitemaps.year_sitemap', compact('allYears'));
    }




    // public function monthsitemap(Request $request, $year)
    // {
    //     $Y = $year;
    //     $englishMonths = InsightList::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->where('status', 1)
    //         ->whereRaw('YEAR(created_at) = ?', [$Y])
    //         ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
    //         ->groupByRaw('MONTH(created_at)')
    //         ->pluck('month');

    //     $hindiMonths = InsightListHindi::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->where('status', 1)
    //         ->whereRaw('YEAR(created_at) = ?', [$Y])
    //         ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
    //         ->groupByRaw('MONTH(created_at)')
    //         ->pluck('month');
    //     // Combine and sort the years
    //     $allMonths = $englishMonths->merge($hindiMonths)->unique()->sort()->values();
    //     // dd($allMonths);
    //     return view('insights.sitemaps.month_sitemap', compact('allMonths', 'Y'));
    // }
    public function monthsitemap(Request $request, $year)
    {
        $Y = $year;

        $englishMonths = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereRaw('YEAR(COALESCE(published_date, created_at)) = ?', [$Y])
            ->selectRaw('MONTH(COALESCE(published_date, created_at)) as month, COUNT(*) as total')
            ->groupByRaw('MONTH(COALESCE(published_date, created_at))')
            ->pluck('month');

        $hindiMonths = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereRaw('YEAR(COALESCE(published_date, created_at)) = ?', [$Y])
            ->selectRaw('MONTH(COALESCE(published_date, created_at)) as month, COUNT(*) as total')
            ->groupByRaw('MONTH(COALESCE(published_date, created_at))')
            ->pluck('month');

        $allMonths = $englishMonths->merge($hindiMonths)->unique()->sort()->values();

        return view('insights.sitemaps.month_sitemap', compact('allMonths', 'Y'));
    }


    // public function daysitemap(Request $request, $year, $month)
    // {
    //     $Y = $year;
    //     $M = $month;

    //     $englishDays = InsightList::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->where('status', 1)
    //         ->whereRaw('YEAR(created_at) = ?', [$Y])
    //         ->whereRaw('MONTH(created_at) = ?', [$M])
    //         ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
    //         ->groupByRaw('DAY(created_at)')
    //         ->orderByRaw('DAY(created_at)') // Order by the same column used in GROUP BY
    //         ->pluck('day');

    //     $hindiDays = InsightListHindi::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->where('status', 1)
    //         ->whereRaw('YEAR(created_at) = ?', [$Y])
    //         ->whereRaw('MONTH(created_at) = ?', [$M])
    //         ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
    //         ->groupByRaw('DAY(created_at)')
    //         ->orderByRaw('DAY(created_at)') // Order by the same column used in GROUP BY
    //         ->pluck('day');
    //     $allDays = $englishDays->merge($hindiDays)->unique()->sort()->values();
    //     return view('insights.sitemaps.day_sitemap', compact('allDays', 'M', 'Y'));
    // }
    public function daysitemap(Request $request, $year, $month)
    {
        $Y = $year;
        $M = $month;

        $englishDays = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereRaw('YEAR(COALESCE(published_date, created_at)) = ?', [$Y])
            ->whereRaw('MONTH(COALESCE(published_date, created_at)) = ?', [$M])
            ->selectRaw('DAY(COALESCE(published_date, created_at)) as day, COUNT(*) as total')
            ->groupByRaw('DAY(COALESCE(published_date, created_at))')
            ->orderByRaw('DAY(COALESCE(published_date, created_at))')
            ->pluck('day');

        $hindiDays = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereRaw('YEAR(COALESCE(published_date, created_at)) = ?', [$Y])
            ->whereRaw('MONTH(COALESCE(published_date, created_at)) = ?', [$M])
            ->selectRaw('DAY(COALESCE(published_date, created_at)) as day, COUNT(*) as total')
            ->groupByRaw('DAY(COALESCE(published_date, created_at))')
            ->orderByRaw('DAY(COALESCE(published_date, created_at))')
            ->pluck('day');

        $allDays = $englishDays->merge($hindiDays)->unique()->sort()->values();

        return view('insights.sitemaps.day_sitemap', compact('allDays', 'M', 'Y'));
    }



    // public function datesitemap(Request $request, $year, $month, $day)
    // {
    //     // Fetch English data with a source identifier
    //     $englishData = InsightList::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereRaw('YEAR(created_at) = ?', [$year])
    //         ->whereRaw('MONTH(created_at) = ?', [$month])
    //         ->whereRaw('DAY(created_at) = ?', [$day])
    //         ->orderBy('created_at')
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'en'; // Add source identifier
    //             return $item;
    //         });

    //     // Fetch Hindi data with a source identifier
    //     $hindiData = InsightListHindi::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereRaw('YEAR(created_at) = ?', [$year])
    //         ->whereRaw('MONTH(created_at) = ?', [$month])
    //         ->whereRaw('DAY(created_at) = ?', [$day])
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'hi'; // Add source identifier
    //             return $item;
    //         });

    //     // Combine and process all data
    //     $allData = $englishData->merge($hindiData)->unique()->values();
    //     // dd($allData);
    //     return view('insights.sitemaps.date_sitemap', compact('allData', 'year', 'month', 'day'));
    // }
    public function datesitemap(Request $request, $year, $month, $day)
    {
        // Fetch English data
        $englishData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('YEAR(COALESCE(published_date, created_at)) = ?', [$year])
            ->whereRaw('MONTH(COALESCE(published_date, created_at)) = ?', [$month])
            ->whereRaw('DAY(COALESCE(published_date, created_at)) = ?', [$day])
            ->orderByRaw('COALESCE(published_date, created_at)')
            ->get()
            ->map(function ($item) {
                $item->source = 'en';
                return $item;
            });

        // Fetch Hindi data
        $hindiData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('YEAR(COALESCE(published_date, created_at)) = ?', [$year])
            ->whereRaw('MONTH(COALESCE(published_date, created_at)) = ?', [$month])
            ->whereRaw('DAY(COALESCE(published_date, created_at)) = ?', [$day])
            ->orderByRaw('COALESCE(published_date, created_at)')
            ->get()
            ->map(function ($item) {
                $item->source = 'hi';
                return $item;
            });

        $allData = $englishData->merge($hindiData)->unique()->values();

        return view('insights.sitemaps.date_sitemap', compact('allData', 'year', 'month', 'day'));
    }




    // public function todaysitemap()
    // {
    //     $enTodayData = InsightList::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereDate('created_at', Carbon::today())
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'en'; // Add source identifier
    //             return $item;
    //         });

    //     $hiTodayData = InsightListHindi::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereDate('created_at', Carbon::today())
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'hi'; // Add source identifier
    //             return $item;
    //         });

    //     $allTodayData = $enTodayData->merge($hiTodayData)->unique()->values();

    //     return view('insights.sitemaps.today_sitemap', compact('allTodayData'));
    // }
    public function todaysitemap()
    {
        $today = Carbon::today()->toDateString();

        $enTodayData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('DATE(COALESCE(published_date, created_at)) = ?', [$today])
            ->get()
            ->map(function ($item) {
                $item->source = 'en';
                return $item;
            });

        $hiTodayData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('DATE(COALESCE(published_date, created_at)) = ?', [$today])
            ->get()
            ->map(function ($item) {
                $item->source = 'hi';
                return $item;
            });

        $allTodayData = $enTodayData->merge($hiTodayData)->unique()->values();

        return view('insights.sitemaps.today_sitemap', compact('allTodayData'));
    }


    // public function yesterdaysitemap()
    // {
    //     // Fetch yesterday's data
    //     $englishYdayData = InsightList::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereDate('created_at', Carbon::yesterday())
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'en'; // Add source identifier
    //             return $item;
    //         });
    //     $hindiYdayData = InsightListHindi::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereDate('created_at', Carbon::yesterday())
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'hi'; // Add source identifier
    //             return $item;
    //         });

    //     $allYdayData = $englishYdayData->merge($hindiYdayData)->unique()->values();

    //     return view('insights.sitemaps.yesterday_sitemap', compact('allYdayData'));
    // }
    public function yesterdaysitemap()
    {
        $yesterday = Carbon::yesterday()->toDateString();

        $englishYdayData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('DATE(COALESCE(published_date, created_at)) = ?', [$yesterday])
            ->get()
            ->map(function ($item) {
                $item->source = 'en';
                return $item;
            });

        $hindiYdayData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('DATE(COALESCE(published_date, created_at)) = ?', [$yesterday])
            ->get()
            ->map(function ($item) {
                $item->source = 'hi';
                return $item;
            });

        $allYdayData = $englishYdayData->merge($hindiYdayData)->unique()->values();

        return view('insights.sitemaps.yesterday_sitemap', compact('allYdayData'));
    }

    // public function thisweeksitemap()
    // {
    //     // Fetch yesterday's data
    //     $engThisWeekData = InsightList::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::MONDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'en';
    //             return $item;
    //         });

    //     $hinThisWeekData = InsightListHindi::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::MONDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'hi';
    //             return $item;
    //         });

    //     $allThisWeekData = $engThisWeekData->merge($hinThisWeekData)->unique()->values();
    //     // Render the view with the data
    //     return view('insights.sitemaps.thisweek_sitemap', compact('allThisWeekData'));
    // }
    public function thisweeksitemap()
    {
        $start = Carbon::now()->startOfWeek(Carbon::MONDAY)->toDateString();
        $end = Carbon::now()->endOfWeek(Carbon::SATURDAY)->toDateString();

        $engThisWeekData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('DATE(COALESCE(published_date, created_at)) BETWEEN ? AND ?', [$start, $end])
            ->get()
            ->map(function ($item) {
                $item->source = 'en';
                return $item;
            });

        $hinThisWeekData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('DATE(COALESCE(published_date, created_at)) BETWEEN ? AND ?', [$start, $end])
            ->get()
            ->map(function ($item) {
                $item->source = 'hi';
                return $item;
            });

        $allThisWeekData = $engThisWeekData->merge($hinThisWeekData)->unique()->values();

        return view('insights.sitemaps.thisweek_sitemap', compact('allThisWeekData'));
    }

    // public function lastweeksitemap()
    // {
    //     // Fetch last week's data
    //     $engLastWeekData = InsightList::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereBetween('created_at', [
    //             Carbon::now()->subWeek()->startOfWeek(Carbon::MONDAY),
    //             Carbon::now()->subWeek()->endOfWeek(Carbon::SUNDAY)
    //         ])
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'en';
    //             return $item;
    //         });

    //     $hinLastWeekData = InsightListHindi::query()
    //         ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereBetween('created_at', [
    //             Carbon::now()->subWeek()->startOfWeek(Carbon::MONDAY),
    //             Carbon::now()->subWeek()->endOfWeek(Carbon::SUNDAY)
    //         ])
    //         ->get()
    //         ->map(function ($item) {
    //             $item->source = 'hi';
    //             return $item;
    //         });

    //     $allLastWeekData = $engLastWeekData->merge($hinLastWeekData)->unique()->values();

    //     // Render the view with the data
    //     return view('insights.sitemaps.lastweek_sitemap', compact('allLastWeekData'));
    // }

    public function lastweeksitemap()
    {
        $start = Carbon::now()->subWeek()->startOfWeek(Carbon::MONDAY)->toDateString();
        $end = Carbon::now()->subWeek()->endOfWeek(Carbon::SUNDAY)->toDateString();

        $engLastWeekData = InsightList::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('DATE(COALESCE(published_date, created_at)) BETWEEN ? AND ?', [$start, $end])
            ->get()
            ->map(function ($item) {
                $item->source = 'en';
                return $item;
            });

        $hinLastWeekData = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereRaw('DATE(COALESCE(published_date, created_at)) BETWEEN ? AND ?', [$start, $end])
            ->get()
            ->map(function ($item) {
                $item->source = 'hi';
                return $item;
            });

        $allLastWeekData = $engLastWeekData->merge($hinLastWeekData)->unique()->values();

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
        $newssitemap = $model::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull(['cat_id', 'image'])
            ->where('status', 1)
            ->orderByEffectiveDate('desc')
            ->get();

        // dd($newssitemap);
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

        $articlesitemap = $model::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Article')
            ->whereNotNull(['cat_id', 'image'])
            ->where('status', 1)->limit(10000)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
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

        $articlesitemap = $model::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Article')
            ->whereNotNull(['cat_id', 'image'])
            ->where('status', 1)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->offset(10000) // Skip the first 12,000 records
            ->limit(10000)   // Fetch the next 10,000 records
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

        $interviewsitemap = $model::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Interview')
            ->whereNotNull(['cat_id', 'image'])
            ->where('status', 1)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->get();
        return response()->view('insights.sitemaps.interview_sitemap', ['interviewsitemap' => $interviewsitemap])->header('Content-type', 'text/xml');
    }

    public function eventsitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        $eventsitemap = $model::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Event')
            ->whereNotNull(['cat_id', 'image'])
            ->where('status', 1)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->get();
        return response()->view('insights.sitemaps.event_sitemap', ['eventsitemap' => $eventsitemap])->header('Content-type', 'text/xml');
    }
    public function reportsitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        $reportsitemap = $model::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Report')
            ->whereNotNull(['cat_id', 'image'])
            ->where('status', 1)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->get();
        return response()->view('insights.sitemaps.report_sitemap', ['reportsitemap' => $reportsitemap])->header('Content-type', 'text/xml');
    }

    public function categorysitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        $model = $locale === 'hi' ? InsightListHindi::class : InsightList::class;
        $catmodel = $locale === 'hi' ? InsightsHindiCategory::class : InsightCategory::class;

        // Step 1: Get all unique category IDs that have effective items
        $categoryIds = $model::select('cat_id')
            ->distinct()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereNotNull(['cat_id', 'image'])
            ->pluck('cat_id');

        // dd($categoryIds);
        // Step 2: Get category records
        $categories = $catmodel::whereIn('id', $categoryIds)->get();

        // Step 3: Build category + latest article effective date
        $categorydata = [];
        foreach ($categories as $category) {
            $createdAt = $model::query()
                ->withEffectiveDate()
                ->where('cat_id', $category->id)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->where('status', 1)
                ->orderByEffectiveDate('desc')
                ->value('effective_date'); // This now returns the latest effective date

            $categorydata[] = [
                'category' => $category,
                'created_at' => $createdAt,
            ];
        }
        // dd($categorydata);
        return response()
            ->view('insights.sitemaps.categories_sitemap', ['categorydata' => $categorydata])
            ->header('Content-Type', 'text/xml');
    }


    public function subcategorysitemap()
    {
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        $model = $locale === 'hi' ? InsightListHindi::class : InsightList::class;
        $catModel = $locale === 'hi' ? InsightsHindiCategory::class : InsightCategory::class;
        $subcatModel = $locale === 'hi' ? InsightsHindiSubCategory::class : InsightSubcategory::class;

        // Step 1: Get unique subcat_ids from valid insights
        $subcatIds = $model::query()
            ->distinct()
            // ->withEffectiveDate()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereNotNull('cat_id')
            ->whereNotNull('subcat_id')
            ->pluck('subcat_id');

        // Step 2: Load subcategories + category + latest effective_date
        $subcategories = $subcatModel::whereIn('id', $subcatIds)
            ->with('category') // eager load related category
            ->get()
            ->map(function ($subcat) use ($model) {
                return [
                    'category' => $subcat->category,
                    'scategory' => $subcat,
                    'created_at' => $model::query()
                        ->withEffectiveDate()
                        ->where('subcat_id', $subcat->id)
                        ->whereNotIn('news_type', ['ri', 'ir'])
                        ->where('status', 1)
                        ->orderByEffectiveDate('desc')
                        ->value('effective_date'), // Latest effective date for this subcategory
                ];
            });
        // dd($subcategories);
        return response()
            ->view('insights.sitemaps.subcat_sitemap', ['subcategories' => $subcategories])
            ->header('Content-Type', 'text/xml');
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
        $insightIds = $model::query()->select('news_id')
            ->distinct()
            // ->withEffectiveDate()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('cat_id', '!=', '')
            ->where('status', 1)
            ->limit(10000)
            ->pluck('news_id');

        // Fetch content tag IDs used in those insights
        $contentTagIds = $contentmodel::query()
            ->select('tag_id')
            ->distinct()
            ->whereIn('content_id', $insightIds)
            ->pluck('tag_id');

        // Fetch SEO tags with tag_id and name
        $tags = $seomodel::query()
            ->select('tag_id', 'name')
            ->whereIn('tag_id', $contentTagIds)
            ->get();

        // Prepare tag sitemap data
        $tagsData = [];

        foreach ($tags as $tag) {
            // Get latest effective date of content that uses this tag
            $tagContentIds = $contentmodel::where('tag_id', $tag->tag_id)->pluck('content_id');

            $createdAt = $model::query()
                ->withEffectiveDate()
                ->whereIn('news_id', $tagContentIds)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->where('status', 1)
                ->orderByEffectiveDate('desc')
                ->value('effective_date');

            if ($createdAt) {
                $tagsData[] = [
                    'tag' => $tag->name,
                    'created_at' => $createdAt
                ];
            }

            // Stop if we've hit the limit
            if (count($tagsData) >= 10000) {
                break;
            }
        }

        return response()
            ->view('insights.sitemaps.tags_sitemap', ['tagsData' => $tagsData])
            ->header('Content-Type', 'text/xml');
    }


    public function rssFeed()
    {
        $locale = App::getLocale();
        $catModel = $locale == 'hi' ? InsightsHindiCategory::class : InsightCategory::class;
        $newsModel = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $categories = $catModel::all();

        $latestarticles = $newsModel::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('insight_type', 'Article')
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->limit(5)->get();
        // dd($latestarticles);
        return view('insights.rss-feed', compact('categories', 'latestarticles'));
    }


    public function generateRssFeed(Request $request)
    {
        // Extract insight type from slug (remove '/rss' suffix if present)
        // $slug = str_replace('/rss', '', $request->slug);
        $slug = request()->segment(3);
        $locale = request()->segment(2);
        // dd($slug);

        // Define insight types
        $insight_types = [
            'topstories' => 'News',
            'industryfocus' => 'Article',
            'interviews' => 'Interview',
            'events_reports' => ['Event', 'Report'], // Multiple types
        ];

        // Get the mapped insight type(s), default to an empty array
        $insight_type = $insight_types[$slug] ?? [];
        $insight_type_str = is_array($insight_type) ? implode(' & ', $insight_type) : $insight_type;
        $insight_type_str = htmlspecialchars($insight_type_str, ENT_XML1, 'UTF-8');
        // dd($insight_type_str, $insight_types);
        // $locale = App::getLocale();
        $newsModel = $locale === 'hi' ? InsightListHindi::class : InsightList::class;

        // Query articles
        $query = $newsModel::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date', 'shortDesc', 'image', 'author_id')
            ->with(['author', 'category'])
            ->withEffectiveDate()
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(15);

        // Apply filtering based on type
        if (!empty($insight_type)) {
            is_array($insight_type) ? $query->whereIn('insight_type', $insight_type) : $query->where('insight_type', $insight_type);
        }

        $articles = $query->get();
        // dd($articles);
        // Create RSS Feed
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $rss = $dom->createElement('rss');
        $rss->setAttribute('version', '2.0');
        $dom->appendChild($rss);

        $channel = $dom->createElement('channel');
        $rss->appendChild($channel);

        // Add channel metadata
        $channel->appendChild($dom->createElement('title', "Latest Insights: $insight_type_str"));
        // $channel->appendChild($dom->createElement('link', url()->current()));
        // $channel->appendChild($dom->createElement('link', URL::to('/insights/' . $locale . '/' . $insight_types[$slug])));
        $channel->appendChild($dom->createElement('link', URL::to('/insights/' . $locale . '/' . $slug)));
        $channel->appendChild($dom->createElement('description', "Latest Insights on $insight_type_str"));
        $channel->appendChild($dom->createElement('language', $locale));

        foreach ($articles as $article) {
            $item = $dom->createElement('item');
            $item->appendChild($dom->createElement('title', htmlspecialchars($article->title, ENT_XML1, 'UTF-8')));
            $item->appendChild($dom->createElement('link', URL::to("/insights/$locale/" . strtolower($article->insight_type) . "/{$article->slug}.{$article->news_id}")));
            $item->appendChild($dom->createElement('description', htmlspecialchars($article->shortDesc ?? '', ENT_XML1, 'UTF-8')));
            $item->appendChild($dom->createElement('pubDate', date('M, d Y', strtotime($article->effective_date))));

            // Safely fetch author
            $authorName = $article->author->first()->title ?? 'Unknown';
            $item->appendChild($dom->createElement('author', htmlspecialchars($authorName, ENT_XML1, 'UTF-8')));

            // Safely fetch category
            $categoryName = $article->category->first()->catname ?? null;
            if ($categoryName) {
                $item->appendChild($dom->createElement('category', htmlspecialchars($categoryName, ENT_XML1, 'UTF-8')));
            }

            // Add media content (image URL)
            if (!empty($article->image)) {
                $imageUrl = \App\Http\Controllers\InsightsController::createimgurl($article->image);
                $imageDetails = @getimagesize($imageUrl);
                $width = is_array($imageDetails) ? $imageDetails[0] : 0;
                $height = is_array($imageDetails) ? $imageDetails[1] : 0;

                $mediaContent = $dom->createElement('media:content');
                $mediaContent->setAttribute('url', htmlspecialchars($imageUrl, ENT_XML1, 'UTF-8'));
                $mediaContent->setAttribute('medium', 'image');
                $mediaContent->setAttribute('width', $width);
                $mediaContent->setAttribute('height', $height);
                $item->appendChild($mediaContent);
            }

            $channel->appendChild($item);
        }

        return response($dom->saveXML(), 200)->header('Content-Type', 'application/rss+xml');
    }


    public function generateCatRssFeed(Request $request)
    {
        // dd($request->slug);
        $locale = App::getLocale();
        $dataModel = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $categoryModel = $locale == 'hi' ? InsightsHindiCategory::class : InsightCategory::class;
        $slug = $request->slug;
        $categoryId = $categoryModel::query()
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();
        // dd($categoryId);
        $articles = $dataModel::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date', 'shortDesc', 'image', 'author_id')
            ->with(['author', 'category'])
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('cat_id', $categoryId->id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(15)->get();
        // dd($query);

        // Create a new DOMDocument
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        // Create the root RSS element
        $rss = $dom->createElement('rss');
        $rss->setAttribute('version', '2.0');
        $dom->appendChild($rss);

        // Create the channel element
        $channel = $dom->createElement('channel');
        $rss->appendChild($channel);

        // Add channel metadata
        $channel->appendChild($dom->createElement('title', "Latest Insights " . htmlspecialchars($categoryId->catname, ENT_XML1, 'UTF-8')));
        $channel->appendChild($dom->createElement('link', URL::to('/insights/' . $locale . '/' . $categoryId->slug)));
        $channel->appendChild($dom->createElement('description', 'Latest insights ' . htmlspecialchars($categoryId->catname, ENT_XML1, 'UTF-8')));
        $channel->appendChild($dom->createElement('language', $locale));

        foreach ($articles as $article) {
            $item = $dom->createElement('item');
            $item->appendChild($dom->createElement('title', htmlspecialchars($article->title)));
            $item->appendChild($dom->createElement('link', URL::to('/insights/' . $locale . '/' . strtolower($article->insight_type) . '/' . $article->slug . '.' . $article->news_id)));
            $item->appendChild($dom->createElement('description', htmlspecialchars($article->shortDesc ?? '')));
            $item->appendChild($dom->createElement('pubDate', date('d-M-Y', strtotime($article->effective_date))));

            $author = $article->author->first()->title ?? 'Unknown';
            $item->appendChild($dom->createElement('author', htmlspecialchars($author)));

            if (!empty($article->category->first()->catname)) {
                $item->appendChild($dom->createElement('category', htmlspecialchars($article->category->first()->catname)));
            }
            // Add media content (image URL)
            // Generate the image URL using createimgurl()
            $imageUrl = \App\Http\Controllers\InsightsController::createimgurl($article->image);
            // Get image size safely
            $imageDetails = @getimagesize($imageUrl);
            $width = is_array($imageDetails) ? $imageDetails[0] : 0;
            $height = is_array($imageDetails) ? $imageDetails[1] : 0;
            if (!empty($article->image)) {
                $mediaContent = $dom->createElement('media:content');
                $mediaContent->setAttribute('url', htmlspecialchars($imageUrl));
                $mediaContent->setAttribute('medium', 'image');
                $mediaContent->setAttribute('width', $width);  // You can set proper width
                $mediaContent->setAttribute('height', $height);  // You can set proper height
                $item->appendChild($mediaContent);
            }

            $channel->appendChild($item);
        }

        // Generate the formatted XML
        $rssFeed = $dom->saveXML();

        return response($rssFeed, 200)->header('Content-Type', 'application/rss+xml');
    }

    public function generateSubCatRssFeed(Request $request)
    {
        $locale = App::getLocale();

        // Determine the correct models based on locale
        $dataModel = $locale === 'hi' ? InsightListHindi::class : InsightList::class;
        $categoryModel = $locale === 'hi' ? InsightsHindiCategory::class : InsightCategory::class;
        $subcatModel = $locale === 'hi' ? InsightsHindiSubCategory::class : InsightSubcategory::class;

        // Fetch category and subcategory
        $category = $categoryModel::where('slug', $request->cat)->where('status', 1)->firstOrFail();
        $subCategory = $subcatModel::where('slug', $request->subcat)->where('mcat_id', $category->id)->firstOrFail();

        // Fetch articles efficiently
        $articles = $dataModel::with(['author', 'category', 'Subcategory'])->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'subcat_id', 'created_at', 'published_date', 'shortDesc', 'image', 'author_id')
            ->withEffectiveDate()
            ->where([
                ['status', 1],
                ['cat_id', $category->id],
                ['subcat_id', $subCategory->id],
            ])
            ->whereNotIn('news_type', ['ri', 'ir'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(15)
            ->get();

        // Create XML document
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $rss = $dom->createElement('rss');
        $rss->setAttribute('version', '2.0');
        $dom->appendChild($rss);

        $channel = $dom->createElement('channel');
        $rss->appendChild($channel);

        $channel->appendChild($dom->createElement('title', htmlspecialchars("Latest Insights {$category->catname} - {$subCategory->subcat_name}", ENT_XML1, 'UTF-8')));
        $channel->appendChild($dom->createElement('link', URL::to("/insights/{$locale}/{$category->slug}/{$subCategory->slug}")));
        $channel->appendChild($dom->createElement('description', htmlspecialchars("Latest insights in {$category->catname} - {$subCategory->subcat_name}", ENT_XML1, 'UTF-8')));
        $channel->appendChild($dom->createElement('language', $locale));

        foreach ($articles as $article) {
            $item = $dom->createElement('item');

            $item->appendChild($dom->createElement('title', htmlspecialchars($article->title, ENT_XML1, 'UTF-8')));
            $item->appendChild($dom->createElement('link', URL::to("/insights/{$locale}/" . strtolower($article->insight_type) . "/{$article->slug}.{$article->news_id}")));
            $item->appendChild($dom->createElement('description', htmlspecialchars($article->shortDesc ?? '', ENT_XML1, 'UTF-8')));
            $item->appendChild($dom->createElement('pubDate', date('M, d Y', strtotime($article->effective_date))));

            // Get author name safely
            $authorTitle = $article->author->pluck('title')->first() ?? 'Unknown';
            $item->appendChild($dom->createElement('author', htmlspecialchars($authorTitle, ENT_XML1, 'UTF-8')));

            // Get category name safely
            $categoryName = $article->category->pluck('catname')->first();
            if ($categoryName) {
                $item->appendChild($dom->createElement('category', htmlspecialchars($categoryName, ENT_XML1, 'UTF-8')));
            }
            $subCategoryName = $article->Subcategory->pluck('subcat_name')->first();
            if ($subCategoryName) {
                $item->appendChild($dom->createElement('subcategory', htmlspecialchars($subCategoryName, ENT_XML1, 'UTF-8')));
            }

            // Append image if available
            if (!empty($article->image)) {
                $imageUrl = \App\Http\Controllers\InsightsController::createimgurl($article->image);
                $imageDetails = @getimagesize($imageUrl);

                $mediaContent = $dom->createElement('media:content');
                $mediaContent->setAttribute('url', htmlspecialchars($imageUrl, ENT_XML1, 'UTF-8'));
                $mediaContent->setAttribute('medium', 'image');
                $mediaContent->setAttribute('width', is_array($imageDetails) ? $imageDetails[0] : 0);
                $mediaContent->setAttribute('height', is_array($imageDetails) ? $imageDetails[1] : 0);

                $item->appendChild($mediaContent);
            }

            $channel->appendChild($item);
        }

        return response($dom->saveXML(), 200)->header('Content-Type', 'application/rss+xml');
    }

    public function generateAuthorRssFeed(Request $request)
    {
        $locale = App::getLocale();
        $enLocale = 'en';
        $hiLocale = 'hi';

        // Extract Author ID from Slug
        $author_id = explode('-', $request->slug);
        $id = (int) end($author_id);

        // Fetch Author or Abort if Not Found
        $author = AuthorList::findOrFail($id);
        // Generate correct slug from Author title
        $correctSlug = Str::slug($author->title) . '-' . $id;

        // If the provided slug is incorrect, redirect to the correct one
        if ($request->slug !== $correctSlug) {
            return redirect()->to(url("/insights/author/{$correctSlug}/rss"), 301);
        }
        // Fetch latest 15 articles from both English & Hindi sources
        $latestArticlesEn = InsightList::with(['category'])->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date', 'shortDesc', 'image', 'author_id')
            ->withEffectiveDate()
            ->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(15)
            ->get()
            ->map(function ($item) use ($enLocale) {
                $item->lang = $enLocale;
                return $item;
            });

        $latestArticlesHi = InsightListHindi::with(['category'])->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date', 'shortDesc', 'image', 'author_id')
            ->withEffectiveDate()
            ->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(15)
            ->get()
            ->map(function ($item) use ($hiLocale) {
                $item->lang = $hiLocale;
                return $item;
            });

        // Merge and keep only latest 15 articles
        $latestArticles = $latestArticlesEn->merge($latestArticlesHi)->sortByDesc('effective_date')->take(15);

        // Create RSS Feed
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $rss = $dom->createElement('rss');
        $rss->setAttribute('version', '2.0');
        $dom->appendChild($rss);

        $channel = $dom->createElement('channel');
        $rss->appendChild($channel);

        // Add channel metadata
        $channel->appendChild($dom->createElement('title', htmlspecialchars("Latest Insights News & Articles by " . $author->title, ENT_XML1, 'UTF-8')));
        $channel->appendChild($dom->createElement('link', URL::to("/author/{$request->slug}")));
        $channel->appendChild($dom->createElement('description', htmlspecialchars("Latest Insights News & Articles by " . $author->title, ENT_XML1, 'UTF-8')));
        $channel->appendChild($dom->createElement('language', "$enLocale-$hiLocale"));

        foreach ($latestArticles as $article) {
            $item = $dom->createElement('item');

            $item->appendChild($dom->createElement('title', htmlspecialchars($article->title, ENT_XML1, 'UTF-8')));
            $item->appendChild($dom->createElement('link', URL::to("/insights/{$article->lang}/" . strtolower($article->insight_type) . "/{$article->slug}.{$article->news_id}")));
            $item->appendChild($dom->createElement('description', htmlspecialchars($article->shortDesc ?? '', ENT_XML1, 'UTF-8')));
            $item->appendChild($dom->createElement('pubDate', date('M, d Y', strtotime($article->effective_date))));

            // Fetch category safely
            if ($article->cat_id) {
                $category = $article->lang === 'hi' ? InsightsHindiCategory::find($article->cat_id) : InsightCategory::find($article->cat_id);
                if ($category) {
                    $item->appendChild($dom->createElement('category', htmlspecialchars($category->catname, ENT_XML1, 'UTF-8')));
                }
            }

            // Process image
            if (!empty($article->image)) {
                $imageUrl = \App\Http\Controllers\InsightsController::createimgurl($article->image);
                $imageDetails = @getimagesize($imageUrl);

                $mediaContent = $dom->createElement('media:content');
                $mediaContent->setAttribute('url', htmlspecialchars($imageUrl, ENT_XML1, 'UTF-8'));
                $mediaContent->setAttribute('medium', 'image');
                $mediaContent->setAttribute('width', is_array($imageDetails) ? $imageDetails[0] : 0);
                $mediaContent->setAttribute('height', is_array($imageDetails) ? $imageDetails[1] : 0);

                $item->appendChild($mediaContent);
            }

            $channel->appendChild($item);
        }

        return response($dom->saveXML(), 200)->header('Content-Type', 'application/rss+xml');
    }

    public function generateTagRssFeed(Request $request)
    {
        $tag = $request->tagslug;
        $tagstr = str_replace('-', ' ', $tag);
        // dd($tag, $tagstr);
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        $redirectPath = $locale == 'en' ? '/insights' : '/insights/hindi';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $insightModel = $locale == 'en' ? InsightList::class : InsightListHindi::class;
        $tagModel = $locale == 'en' ? SeoTag::class : SeoTagHindi::class;
        $contentModel = $locale == 'en' ? ContentTagsAssigned::class : ContentTagsAssignedHindi::class;

        // Fetch the tag data
        $seoTag = $tagModel::query()->where('name', $tagstr)->first();
        if (is_null($seoTag)) {
            return redirect($redirectPath);
        }

        // Fetch the associated content IDs
        $articleIds = $contentModel::where([
            ['tag_id', $seoTag->tag_id],
            ['content_type', 2]
        ])->pluck('content_id')->unique()->toArray();

        // Fetch the articles with conditions
        $articlesList = $insightModel::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date', 'shortDesc', 'image', 'author_id')
            ->withEffectiveDate()
            ->with(['author', 'category', 'Subcategory'])
            ->whereIn('news_id', $articleIds)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(15)->get()
            ->map(function ($item) use ($locale) {
                $item->lang = $locale;
                return $item;
            });

        // dd($articlesList);
        // Create RSS Feed
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $rss = $dom->createElement('rss');
        $rss->setAttribute('version', '2.0');
        $dom->appendChild($rss);

        $channel = $dom->createElement('channel');
        $rss->appendChild($channel);

        // Add channel metadata
        $channel->appendChild($dom->createElement('title', htmlspecialchars("Latest Insights News & Articles by " . $tagstr . " tag", ENT_XML1, 'UTF-8')));
        $channel->appendChild($dom->createElement('link', URL::to("/author/{$request->slug}")));
        $channel->appendChild($dom->createElement('description', htmlspecialchars("Latest Insights News & Articles by " . $tagstr . " tag", ENT_XML1, 'UTF-8')));
        $channel->appendChild($dom->createElement('language', "$locale"));

        foreach ($articlesList as $article) {
            $item = $dom->createElement('item');

            $item->appendChild($dom->createElement('title', htmlspecialchars($article->title, ENT_XML1, 'UTF-8')));
            $item->appendChild($dom->createElement('link', URL::to("/insights/{$article->lang}/" . strtolower($article->insight_type) . "/{$article->slug}.{$article->news_id}")));
            $item->appendChild($dom->createElement('description', htmlspecialchars($article->shortDesc ?? '', ENT_XML1, 'UTF-8')));
            $item->appendChild($dom->createElement('pubDate', date('M, d Y', strtotime($article->effective_date))));

            // Fetch category safely
            if ($article->cat_id) {
                $category = $article->lang === 'hi' ? InsightsHindiCategory::find($article->cat_id) : InsightCategory::find($article->cat_id);
                if ($category) {
                    $item->appendChild($dom->createElement('category', htmlspecialchars($category->catname, ENT_XML1, 'UTF-8')));
                }
            }

            // Process image
            if (!empty($article->image)) {
                $imageUrl = \App\Http\Controllers\InsightsController::createimgurl($article->image);
                $imageDetails = @getimagesize($imageUrl);

                $mediaContent = $dom->createElement('media:content');
                $mediaContent->setAttribute('url', htmlspecialchars($imageUrl, ENT_XML1, 'UTF-8'));
                $mediaContent->setAttribute('medium', 'image');
                $mediaContent->setAttribute('width', is_array($imageDetails) ? $imageDetails[0] : 0);
                $mediaContent->setAttribute('height', is_array($imageDetails) ? $imageDetails[1] : 0);

                $item->appendChild($mediaContent);
            }

            $channel->appendChild($item);
        }

        return response($dom->saveXML(), 200)->header('Content-Type', 'application/rss+xml');
    }

    public function googleNewsSitemap()
    {
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        $insightModel = $locale == 'en' ? InsightList::class : InsightListHindi::class;
        $tagModel = $locale == 'en' ? SeoTag::class : SeoTagHindi::class;
        $contentModel = $locale == 'en' ? ContentTagsAssigned::class : ContentTagsAssignedHindi::class;

        // Fetch articles
        $articles = $insightModel::query()->select('news_id', 'title', 'slug', 'insight_type', 'cat_id', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('cat_id', '!=', '')
            ->where('insight_type', 'News')
            ->orderByEffectiveDate('desc')
            ->limit(25)->get()
            ->map(function ($item) use ($locale) {
                $item->lang = $locale;
                return $item;
            });
        // dd($articles);

        // Extract article IDs
        $articleIds = $articles->pluck('news_id')->toArray();

        // Get associated tag IDs for each article
        $associatedTags = $contentModel::query()
            ->whereIn('content_id', $articleIds)
            ->where('content_type', 2)
            ->select('content_id', 'tag_id') // Select both columns
            ->get()
            ->groupBy('content_id'); // Group by news_id
        // $tagIds = $associatedTags->pluck('tag_id')->flatten()->unique()->toArray();
        $tagIds = collect($associatedTags)->flatten()->pluck('tag_id')->unique()->toArray();

        $tagNames = $tagModel::query()
            ->whereIn('tag_id', $tagIds) // Now it's a proper array
            ->pluck('name', 'tag_id'); // key = tag_id, value = tag_name

        // Group tags by news_id
        $groupedTags = [];
        foreach ($associatedTags as $newsId => $tags) {
            $groupedTags[$newsId] = collect($tags)->pluck('tag_id')->map(function ($tagId) use ($tagNames) {
                return $tagNames[$tagId] ?? null;
            })->filter()->toArray();
        }

        // Generate XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . "\n";

        foreach ($articles as $article) {
            $tags = isset($groupedTags[$article->news_id]) ? implode(', ', $groupedTags[$article->news_id]) : '';

            $xml .= "    <url>\n";
            $xml .= "        <loc>" . URL::to("/insights/{$article->lang}/" . strtolower($article->insight_type) . "/{$article->slug}.{$article->news_id}") . "</loc>\n";
            $xml .= "        <news:news>\n";
            $xml .= "            <news:publication>\n";
            $xml .= "                <news:name>" . Config('constants.MainDomain') . "/insights</news:name>\n";
            $xml .= "                <news:language>{$locale}</news:language>\n";
            $xml .= "            </news:publication>\n";
            $xml .= "            <news:publication_date>" . date('Y-m-d', strtotime($article->effective_date)) . "</news:publication_date>\n";
            $xml .= "            <news:title>" . htmlspecialchars($article->title) . "</news:title>\n";
            $xml .= "            <news:keywords>" . htmlspecialchars($tags) . "</news:keywords>\n"; // Add keywords

            $xml .= "        </news:news>\n";
            $xml .= "    </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
