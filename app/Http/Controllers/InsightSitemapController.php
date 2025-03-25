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
            ->orderByRaw('DAY(created_at)') // Order by the same column used in GROUP BY
            ->pluck('day');

        $hindiDays = InsightListHindi::query()
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereRaw('YEAR(created_at) = ?', [$Y])
            ->whereRaw('MONTH(created_at) = ?', [$M])
            ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
            ->groupByRaw('DAY(created_at)')
            ->orderByRaw('DAY(created_at)') // Order by the same column used in GROUP BY
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
            ->whereNotNull(['cat_id', 'image'])
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
            ->whereNotNull(['cat_id', 'image'])
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
            ->whereNotNull(['cat_id', 'image'])
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
            ->whereNotNull(['cat_id', 'image'])
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
            ->whereNotNull(['cat_id', 'image'])
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
            ->where('insight_type', 'Report')
            ->whereNotNull(['cat_id', 'image'])
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
            ->whereNotNull(['cat_id', 'image'])
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

    public function rssFeed()
    {
        $locale = App::getLocale();
        $catModel = $locale == 'hi' ? InsightsHindiCategory::class : InsightCategory::class;
        $newsModel = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $categories = $catModel::all();

        $latestarticles = $newsModel::query()
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('insight_type', 'Article')
            ->orderByDesc('created_at')
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
        $query = $newsModel::with(['author', 'category'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByDesc('created_at')
            ->take(15);

        // Apply filtering based on type
        if (!empty($insight_type)) {
            is_array($insight_type) ? $query->whereIn('insight_type', $insight_type) : $query->where('insight_type', $insight_type);
        }

        $articles = $query->get();

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
            $item->appendChild($dom->createElement('pubDate', date('M, d Y', strtotime($article->created_at))));

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
        $articles = $dataModel::with(['author', 'category'])
            ->where('status', 1)
            ->where('cat_id', $categoryId->id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByDesc('created_at')
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
            $item->appendChild($dom->createElement('pubDate', date('d-M-Y', strtotime($article->created_at))));

            $author = $article->author[0]->title ?? 'Unknown';
            $item->appendChild($dom->createElement('author', htmlspecialchars($author)));

            if (!empty($article->category[0]->catname)) {
                $item->appendChild($dom->createElement('category', htmlspecialchars($article->category[0]->catname)));
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
        $articles = $dataModel::with(['author', 'category', 'Subcategory'])
            ->where([
                ['status', 1],
                ['cat_id', $category->id],
                ['subcat_id', $subCategory->id],
            ])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByDesc('created_at')
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
            $item->appendChild($dom->createElement('pubDate', date('M, d Y', strtotime($article->created_at))));

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
        $latestArticlesEn = InsightList::with(['category'])->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->take(15)
            ->get()
            ->map(function ($item) use ($enLocale) {
                $item->lang = $enLocale;
                return $item;
            });

        $latestArticlesHi = InsightListHindi::with(['category'])->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->take(15)
            ->get()
            ->map(function ($item) use ($hiLocale) {
                $item->lang = $hiLocale;
                return $item;
            });

        // Merge and keep only latest 15 articles
        $latestArticles = $latestArticlesEn->merge($latestArticlesHi)->sortByDesc('created_at')->take(30);

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
            $item->appendChild($dom->createElement('pubDate', date('M, d Y', strtotime($article->created_at))));

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
        $articlesList = $insightModel::query()
            ->with(['author', 'category', 'Subcategory'])
            ->whereIn('news_id', $articleIds)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->take(15)->get();

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
            $item->appendChild($dom->createElement('pubDate', date('M, d Y', strtotime($article->created_at))));

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
}
