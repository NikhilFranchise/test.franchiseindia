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

class InsightSitemapController extends Controller
{
    public function newssitemap()
    {
        $isHindi = request()->segment(2) === 'hi';

        if (!$isHindi) {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }

        $model = $isHindi ? InsightListHindi::class : InsightList::class;

        $newssitemap = $model::whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'News')
            ->where('cat_id', '!=', '')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->get();

        return response()
            ->view('insights.sitemaps.news_sitemap', ['newssitemap' => $newssitemap])
            ->header('Content-type', 'text/xml');
    }

    public function articlesitemap()
    {
        $isHindi = request()->segment(2) === 'hi';

        if (!$isHindi) {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }
        $model = $isHindi ? InsightListHindi::class : InsightList::class;

        $articlesitemap = $model::whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Article')
            ->where('cat_id', '!=', '')
            ->where('status', 1)->limit(10000)
            ->orderByDesc('created_at')
            ->get();
        return response()->view('insights.sitemaps.art_sitemap', ['articlesitemap' => $articlesitemap])->header('Content-type', 'text/xml');
    }
    public function articlesitemaptwo()
    {
        $isHindi = request()->segment(2) === 'hi';

        if (!$isHindi) {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }
        $model = $isHindi ? InsightListHindi::class : InsightList::class;
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
    // public function hindiarticlesitemap()
    // {
    //     $articlesitemap = InsightListHindi::whereNotIn('news_type', ['ri', 'ir'])
    //         ->where('insight_type', 'Article')
    //         ->where('cat_id', '!=', '')
    //         ->where('status', 1)->get();
    //     //  dd($articlesitemap->count());
    //     return response()->view('insights.sitemaps.hindiart_sitemap', ['articlesitemap' => $articlesitemap])->header('Content-type', 'text/xml');
    // }


    public function interviewsitemap()
    {
        $isHindi = request()->segment(2) === 'hi';

        if (!$isHindi) {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }
        $model = $isHindi ? InsightListHindi::class : InsightList::class;

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
        $isHindi = request()->segment(2) === 'hi';

        if (!$isHindi) {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }
        $model = $isHindi ? InsightListHindi::class : InsightList::class;

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
        $isHindi = request()->segment(2) === 'hi';

        if (!$isHindi) {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }
        $model = $isHindi ? InsightListHindi::class : InsightList::class;

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
        $isHindi = request()->segment(2) === 'hi';

        if (!$isHindi) {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }
        $model = $isHindi ? InsightListHindi::class : InsightList::class;
        $catmodel = $isHindi ? InsightsHindiCategory::class : InsightCategory::class;
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
        $isHindi = request()->segment(2) === 'hi';

        if (!$isHindi) {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }

        // Determine models dynamically
        $model = $isHindi ? InsightListHindi::class : InsightList::class;
        $catModel = $isHindi ? InsightsHindiCategory::class : InsightCategory::class;
        $subcatModel = $isHindi ? InsightsHindiSubCategory::class : InsightSubcategory::class;

        // Fetch unique subcategory IDs
        $subcatIds = $model::whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereNotNull('cat_id')
            ->whereNotNull('subcat_id')
            ->distinct()
            ->pluck('subcat_id');

        // Fetch subcategories and related data
        $subcategories = $subcatModel::whereIn('id', $subcatIds)
            ->with(['category' => function ($query) use ($catModel) {
                $query->select('id', 'name')->from((new $catModel)->getTable());
            }])
            ->get()
            ->map(function ($subcat) use ($model) {
                return [
                    'category' => $subcat->category,
                    'scategory' => $subcat,
                    'created_at' => $model::where('subcat_id', $subcat->id)
                        ->whereNotIn('news_type', ['ri', 'ir'])
                        ->where('status', 1)
                        ->value('created_at'),
                ];
            });

        // Return the XML response
        return response()
            ->view('insights.sitemaps.subcat_sitemap', ['subcategories' => $subcategories])
            ->header('Content-type', 'text/xml');
    }





    public function tagsitemap()
    {
        $isHindi = request()->segment(2) === 'hi';

        if (!$isHindi) {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }
        $model = $isHindi ? InsightListHindi::class : InsightList::class;
        $catmodel = $isHindi ? InsightsHindiCategory::class : InsightCategory::class;
        $subcatmodel = $isHindi ? InsightsHindiSubCategory::class : InsightSubcategory::class;
        $contentmodel = $isHindi ? ContentTagsAssignedHindi::class : ContentTagsAssigned::class;
        $seomodel = $isHindi ? SeoTagHindi::class : SeoTag::class;

        $insightIds = $model::query()
            ->select('news_id')
            ->distinct()
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('cat_id', '!=', '')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->pluck('news_id');

        $contentTagIds = $contentmodel::query()
            ->select('tag_id')
            ->distinct()
            ->whereIn('content_id', $insightIds)
            ->pluck('tag_id');

        $tags = $seomodel::select('tag_id', 'name')
            ->whereIn('tag_id', $contentTagIds)
            ->get();

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
        }
        // dd($tagsData);
        return response()
            ->view('insights.sitemaps.tags_sitemap', ['tagsData' => $tagsData])
            ->header('Content-type', 'text/xml');
    }
}
