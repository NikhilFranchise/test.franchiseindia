<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoTag;
use App\Models\InsightList;
use App\Models\InsightCategory;
use App\Models\InsightSubcategory;
use App\Models\ContentTagsAssigned;
use App\Models\InsightListHindi;

class InsightSitemapController extends Controller
{
    public function newssitemap()
    {

        $newssitemap = InsightList::where('news_type', 'fi')
            ->where('insight_type', 'News')
            ->where('cat_id', '!=', '')
            ->where('status', 1)->get();

        return response()->view('insights.sitemaps.news_sitemap', ['newssitemap' => $newssitemap])->header('Content-type', 'text/xml');
    }
    public function articlesitemap()
    {
        // print_r('yes');
        // dd('tesxt');
        // $articlesitemap = InsightList::whereNotIn('news_type', ['ri','ir'])

        $articlesitemap = InsightList::where('news_type', 'fi')

        ->where('insight_type', 'Article')
            ->where('cat_id', '!=', '')
            ->where('status', 1)->get();

         dd($articlesitemap);
        return response()->view('insights.sitemaps.art_sitemap', ['articlesitemap' => $articlesitemap])->header('Content-type', 'text/xml');
    }
    public function hindiarticlesitemap()
    {
        $articlesitemap = InsightListHindi::whereNotIn('news_type', ['ri','ir'])
            ->where('insight_type', 'Article')
            ->where('cat_id', '!=', '')
            ->where('status', 1)->get();
        //  dd($articlesitemap->count());
        return response()->view('insights.sitemaps.hindiart_sitemap', ['articlesitemap' => $articlesitemap])->header('Content-type', 'text/xml');
    }


    public function interviewsitemap()
    {
        $interviewsitemap = InsightList::where('news_type', 'fi')
            ->where('insight_type', 'Interview')
            ->where('cat_id', '!=', '')
            ->where('status', 1)->get();
        return response()->view('insights.sitemaps.interview_sitemap', ['interviewsitemap' => $interviewsitemap])->header('Content-type', 'text/xml');
    }
    public function eventsitemap()
    {
        $eventsitemap = InsightList::where('news_type', 'fi')
            ->where('insight_type', 'Event')
            ->where('cat_id', '!=', '')
            ->where('status', 1)->get();
        return response()->view('insights.sitemaps.event_sitemap', ['eventsitemap' => $eventsitemap])->header('Content-type', 'text/xml');
    }
    public function reportsitemap()
    {
        $reportsitemap = InsightList::where('news_type', 'fi')
            ->where('insight_type', 'Event')
            ->where('cat_id', '!=', '')
            ->where('status', 1)->get();
        return response()->view('insights.sitemaps.report_sitemap', ['reportsitemap' => $reportsitemap])->header('Content-type', 'text/xml');
    }
    public function categorysitemap()
    {
        $categoryIds = InsightList::select('cat_id')
            ->distinct()
            ->where('news_type', 'fi')
            ->where('status', 1)
            ->whereNotNull('cat_id')
            ->pluck('cat_id');

        $categories = InsightCategory::whereIn('id', $categoryIds)->get();

        // Fetch creation date from InsightList for each category
        $categorydata = [];
        foreach ($categories as $category) {
            $categorydata[] = [
                'category' => $category,
                'created_at' => InsightList::where('cat_id', $category->id)->where('news_type', 'fi')
                    ->where('status', 1)->value('created_at')
            ];
        }
        // dd($categorydata);
        return response()->view('insights.sitemaps.categories_sitemap', ['categorydata' => $categorydata])->header('Content-type', 'text/xml');
    }


    public function subcategorysitemap()
    {
        $subcatIds = InsightList::select('subcat_id')
            ->distinct()
            ->where('news_type', 'fi')
            ->where('status', 1)
            ->whereNotNull('cat_id')
            ->whereNotNull('subcat_id')
            ->pluck('subcat_id');
        // dd($subcatIds);
        $subcat = InsightSubcategory::whereIn('id', $subcatIds)->get();

        $subcategories = [];
        foreach ($subcat as $cat) {
            $category = InsightCategory::find($cat->mcat_id); // Changed to find() since it's a single ID
            $scategory = InsightSubcategory::find($cat->id); // Changed to find() since it's a single ID
            $created_at = InsightList::where('subcat_id', $cat->id)
                ->where('news_type', 'fi')
                ->where('status', 1)
                ->value('created_at');

            $subcategories[] = [
                'category' => $category,
                'scategory' => $scategory,
                'created_at' => $created_at
            ];
        }

        // dd($categories); // Check if categories are being fetched correctly

        return response()
            ->view('insights.sitemaps.subcat_sitemap', ['subcategories' => $subcategories])
            ->header('Content-type', 'text/xml');
    }




    public function tagsitemap()
    {
        $insightIds = InsightList::query()
            ->select('news_id')
            ->distinct()
            ->where('news_type', 'fi')
            ->where('cat_id', '!=', '')
            ->where('status', 1)
            ->pluck('news_id');

        $contentTagIds = ContentTagsAssigned::query()
            ->select('tag_id')
            ->distinct()
            ->where('content_type', 2)
            ->whereIn('content_id', $insightIds)
            ->pluck('tag_id');

        $tags = SeoTag::select('tag_id', 'name')
            ->whereIn('tag_id', $contentTagIds)
            ->get();

        $tagsData = [];
        foreach ($tags as $tag) {
            $createdAt = InsightList::whereIn('news_id', $insightIds)
                ->where('news_type', 'fi')
                ->where('status', 1)
                // ->where('content_id', $tag->tag_id)
                ->value('created_at');

            $tagsData[] = [
                'tag' => $tag->name,
                'created_at' => $createdAt
            ];
            // echo '<pre/>';print_r($createdAt);
        }

        return response()
            ->view('insights.sitemaps.tags_sitemap', ['tagsData' => $tagsData])
            ->header('Content-type', 'text/xml');
    }
}
