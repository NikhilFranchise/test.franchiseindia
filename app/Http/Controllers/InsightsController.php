<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoTag;
use App\Models\InsightList;
use App\Models\InsightCategory;
use App\Models\InsightsHindiCategory;
use App\Models\InsightSubcategory;
use App\Models\InsightsHindiSubCategory;
use App\Models\AuthorList;
use App\Models\InstaSubscribe;
use App\Models\FiNewsLetter;
use App\Models\ContentTagsAssigned;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsLetterSubscribe;
use App\Models\ContentTagsAssignedHindi;
use Illuminate\Support\Facades\Log;
use App\Models\FranchisorBusinessDetail;
use App\Models\InsightListHindi;
use App\Models\SeoTagHindi;
use App\Models\FihlPodcastVideo;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class InsightsController extends Controller
{

    public function insightshome()
    {
        $locale = request()->segment(2) === 'hindi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        $model = $locale === 'hi' ? InsightListHindi::class : InsightList::class;

        $homeArticle = $model::with('category')->where('status', 1)
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('news_id')
            ->take(1)
            ->get();

        $homeArticle = CommonController::contentUrlSlug($homeArticle);

        if ($homeArticle->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }

        $topstories = $model::with('category')->where('status', 1)
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->whereNotIn('news_id', $homeArticle->pluck('news_id')->toArray())
            ->orderByDesc('news_id')
            ->take(5)
            ->get();

        $topstories = CommonController::contentUrlSlug($topstories);

        $trendArticles = $model::query()
            ->with('category')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('views')
            ->take(8)
            ->get();

        $trendArticles = CommonController::contentUrlSlug($trendArticles);

        $industry_focus = $model::with('category')->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->take(1)
            ->get();

        $industry_focus = CommonController::contentUrlSlug($industry_focus);

        $industry_data = $model::with('category')->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->whereNotIn('news_id', $industry_focus->pluck('news_id')->toArray())
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        $industry_data = CommonController::contentUrlSlug($industry_data);

        $interview = $model::with('category')->where('insight_type', 'Interview')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->take(8)
            ->get();

        $interview = CommonController::contentUrlSlug($interview);

        $topcategories = SeoTag::orderByDesc('frequency')->take(10)->get();

        // Get author IDs from both tables
        $authorIdsEn = InsightList::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->pluck('author_id')
            ->toArray();

        $authorIdsHi = InsightListHindi::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->pluck('author_id')
            ->toArray();

        // Merge and remove duplicates
        $authorIds = array_unique(array_merge($authorIdsEn, $authorIdsHi));
        // Get article count from both tables
        $authorCountsEn = InsightList::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->selectRaw('author_id, COUNT(*) as article_count')
            ->pluck('article_count', 'author_id')
            ->toArray();

        $authorCountsHi = InsightListHindi::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->selectRaw('author_id, COUNT(*) as article_count')
            ->pluck('article_count', 'author_id')
            ->toArray();

        // Merge article counts for each author
        $authorCounts = [];

        foreach ($authorIds as $authorId) {
            $countEn = $authorCountsEn[$authorId] ?? 0;
            $countHi = $authorCountsHi[$authorId] ?? 0;
            $authorCounts[$authorId] = $countEn + $countHi;
        }

        // Get author details for the filtered IDs
        $authorDetails = AuthorList::query()
            ->whereIn('author_id', $authorIds)
            ->where('status', 'A')
            ->get()
            ->map(function ($author) use ($authorCounts) {
                $author->count = $authorCounts[$author->author_id] ?? 0;
                return $author;
            });

        return view('insights.insight_home', compact(
            'homeArticle',
            'topstories',
            'trendArticles',
            'topcategories',
            'industry_focus',
            'industry_data',
            'interview',
            'authorDetails'
        ));
    }


    public function getinsightstories()
    {
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        $insightstories = $model::with('author')
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('status', 1)
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->paginate(15);

        $popArticles = $model::query()
            ->with('category')
            ->select('title', 'slug', 'news_id', 'insight_type', 'cat_id')
            ->whereIn('insight_type', ['Article'])
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('status', 1)
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        return view('insights.topstories', compact('insightstories', 'popArticles'));
    }

    public function industryfocus()
    {
        // Set the language
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Choose the appropriate model based on the locale
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        // Fetch the insights articles
        $insArticles = $model::query()
            ->with('author')
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->paginate(15);

        // Handle empty results
        if ($insArticles->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }
        // Get the IDs of articles already shown
        $insArticleIds = $insArticles->pluck('news_id');
        $popArticles = $model::query()
            ->with('category')
            ->select('title', 'slug', 'news_id', 'insight_type', 'cat_id')
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->whereNotIn('news_id', $insArticleIds) // Exclude already shown articles
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        // Return the view with the articles
        return view('insights.articles', compact('insArticles', 'popArticles'));
    }

    public function getinsightsinterviews()
    {
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Choose the appropriate model based on the locale
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $interviews  = $model::with('author')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('insight_type', 'Interview')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->paginate(15);
        $interviews = CommonController::contentUrlSlug($interviews);

        if ($interviews->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }
        $popArticles = $model::query()
            ->with('category')
            ->select('title', 'slug', 'news_id', 'insight_type', 'cat_id')
            ->where('insight_type', ['Article'])
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('insights.interviewslist', compact('interviews', 'popArticles'));
    }

    public function geteventsreports()
    {
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Choose the appropriate model based on the locale
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $events_reports = $model::with('author')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Event')
            ->orWhere('insight_type', 'Report')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('news_id')
            ->paginate(15);
        $events_reports = CommonController::contentUrlSlug($events_reports);

        if ($events_reports->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }
        $popArticles = $model::query()
            ->with('category')
            ->select('title', 'slug', 'news_id', 'insight_type', 'cat_id')
            ->where('insight_type', ['Article'])
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('insights.events_reports', compact('events_reports', 'popArticles'));
    }


    // public function authordata(Request $request)
    // {
    //     // Set the appropriate model and fetch data based on the language
    //     $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
    //     app()->setLocale($locale);
    //     session()->put('locale', $locale);
    //     // Extract and validate the author ID from the slug
    //     $author_id = explode('-', $request->slug);
    //     $id = (int) end($author_id);

    //     // Redirect if the ID is invalid
    //     if ($id == 0) {
    //         return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
    //     }
    //     // Choose the appropriate model based on the locale
    //     $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
    //     $author = AuthorList::find($id);

    //     // Count the articles
    //     $articleCount = $model::where('author_id', $id)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->count();

    //     // Fetch articles with the necessary conditions
    //     $latestArticles = $model::where('author_id', $id)
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereNotNull('image')
    //         ->whereNotNull('cat_id')
    //         ->orderByDesc('created_at')
    //         ->paginate(12);
    //     $latestArticles->getCollection()->transform(function ($item) use ($locale) {
    //         $item->lang = $locale;
    //         return $item;
    //     });
    //     // Apply URL slug transformation
    //     $latestArticles = CommonController::contentUrlSlug($latestArticles);

    //     $mostViewedArticles = $model::where('author_id', $id)
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->whereNotNull('image')
    //         ->whereNotNull('cat_id')
    //         ->orderByDesc('views')
    //         ->paginate(12);
    //     $mostViewedArticles->getCollection()->transform(function ($item) use ($locale) {
    //         $item->lang = $locale;
    //         return $item;
    //     });

    //     // Apply URL slug transformation
    //     $mostViewedArticles = CommonController::contentUrlSlug($mostViewedArticles);

    //     $popularArticles = $model::query()->with('category')
    //         ->where('status', 1)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->where('insight_type', 'Article')
    //         ->whereNotNull('image')
    //         ->whereNotNull('cat_id')
    //         ->orderByDesc('created_at')
    //         ->limit(5)->get()
    //         ->map(function ($item) use ($locale) {
    //             $item->lang = $locale;
    //             return $item;
    //         });
    //     // dd($popularArticles);
    //     $popularArticles = CommonController::contentUrlSlug($popularArticles);

    //     // Return the view with the author data and articles
    //     return view('insights.author', compact('author', 'latestArticles', 'mostViewedArticles', 'popularArticles', 'articleCount'));
    // }

    public function authordata(Request $request)
    {
        // Extract and validate the author ID from the slug
        $author_id = explode('-', $request->slug);
        $id = (int) end($author_id);
        $enLocale = 'en';
        $hiLocale = 'hi';

        // Redirect if the ID is invalid
        if ($id == 0) {
            return redirect('/insights');
        }

        // Fetch author details
        $author = AuthorList::find($id);

        // Fetch article count from both tables
        $articleCount = InsightList::where('author_id', $id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->count() +
            InsightListHindi::where('author_id', $id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->count();

        // Fetch latest articles from both tables (without pagination)
        $latestArticlesEn = InsightList::where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($item) use ($enLocale) {
                $item->lang = $enLocale;
                return $item;
            });

        $latestArticlesHi = InsightListHindi::where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($item) use ($hiLocale) {
                $item->lang = $hiLocale;
                return $item;
            });
        // dd($latestArticlesHi);

        // Merge and sort by created_at
        $latestArticles = $latestArticlesEn->merge($latestArticlesHi)->sortByDesc('created_at');

        // Paginate the merged collection
        $currentPage = Paginator::resolveCurrentPage();
        $perPage = 12;
        $sliced = $latestArticles->forPage($currentPage, $perPage);

        $latestArticles = new LengthAwarePaginator(
            $sliced,
            $latestArticles->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        // Fetch most viewed articles (apply same pagination logic)
        $mostViewedArticlesEn = InsightList::where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('views')
            ->get()
            ->map(function ($item) use ($enLocale) {
                $item->lang = $enLocale;
                return $item;
            });

        $mostViewedArticlesHi = InsightListHindi::where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('views')
            ->get()
            ->map(function ($item) use ($hiLocale) {
                $item->lang = $hiLocale;
                return $item;
            });

        // Merge and paginate most viewed articles
        $mostViewedArticles = $mostViewedArticlesEn->merge($mostViewedArticlesHi)->sortByDesc('views');
        $sliced = $mostViewedArticles->forPage($currentPage, $perPage);

        $mostViewedArticles = new LengthAwarePaginator(
            $sliced,
            $mostViewedArticles->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        // Fetch popular articles (top 5)
        $popularArticlesEn = InsightList::query()->with('category')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Article')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get()
            ->map(function ($item) use ($enLocale) {
                $item->lang = $enLocale;
                return $item;
            });

        $popularArticlesHi = InsightListHindi::query()->with('category')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Article')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get()
            ->map(function ($item) use ($hiLocale) {
                $item->lang = $hiLocale;
                return $item;
            });

        $popularArticles = $popularArticlesEn->merge($popularArticlesHi);

        // Return the view with the author data and articles
        return view('insights.author', compact('author', 'latestArticles', 'articleCount', 'mostViewedArticles', 'popularArticles'));
    }

    public function authorarchive(Request $request)
    {
        // Fetch author IDs from both tables
        $authorIdsEn = InsightList::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->pluck('author_id')
            ->toArray();

        $authorIdsHi = InsightListHindi::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->pluck('author_id')
            ->toArray();

        // Merge and remove duplicate author IDs
        $authorIds = array_unique(array_merge($authorIdsEn, $authorIdsHi));

        // Count articles per author from both tables
        $authorCountsEn = InsightList::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->selectRaw('author_id, COUNT(*) as article_count')
            ->pluck('article_count', 'author_id')
            ->toArray();

        $authorCountsHi = InsightListHindi::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->selectRaw('author_id, COUNT(*) as article_count')
            ->pluck('article_count', 'author_id')
            ->toArray();

        // Merge article counts and track language
        $authorCounts = [];
        foreach ($authorIds as $authorId) {
            $countEn = $authorCountsEn[$authorId] ?? 0;
            $countHi = $authorCountsHi[$authorId] ?? 0;
            $authorCounts[$authorId] = [
                'total' => $countEn + $countHi,
                'lang'  => $countEn > 0 ? 'en' : 'hi' // Assign language based on available data
            ];
        }

        // Fetch author details and append article count & language
        $authorDetails = AuthorList::query()
            ->whereNotIn('title', ['Franchise India Bureau', 'Opportunity India Desk', 'TFW Bureau', 'Guest Author'])
            ->whereIn('author_id', $authorIds)
            ->where('status', 'A')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get()
            ->map(function ($author) use ($authorCounts) {
                $author->count = $authorCounts[$author->author_id]['total'] ?? 0;
                $author->lang = $authorCounts[$author->author_id]['lang'] ?? 'en';
                return $author;
            });

        // Fetch Contributory Authors
        $ContributoryAuthor = AuthorList::query()
            ->whereIn('title', ['Franchise India Bureau', 'Opportunity India Desk', 'TFW Bureau'])
            ->whereIn('author_id', $authorIds)
            ->where('status', 'A')
            ->get()
            ->map(function ($author) use ($authorCounts) {
                $author->count = $authorCounts[$author->author_id]['total'] ?? 0;
                $author->lang = $authorCounts[$author->author_id]['lang'] ?? 'en';
                return $author;
            });

        // Fetch Guest Authors
        $guestAuthor = AuthorList::query()
            ->whereIn('title', ['Guest Author'])
            ->where('status', 'A')
            ->get()
            ->map(function ($author) use ($authorCounts) {
                $author->count = $authorCounts[$author->author_id]['total'] ?? 0;
                $author->lang = $authorCounts[$author->author_id]['lang'] ?? 'en';
                return $author;
            });

        return view('insights.author_archive', compact('authorDetails', 'authorCounts', 'ContributoryAuthor', 'guestAuthor'));
    }


    public function insightscategorydata(Request $request)
    {
        $slug = strtolower(str_replace(' ', '-', $request->slug));
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Choose the appropriate model based on the locale

        // Determine the appropriate models based on the language
        $categoryModel = $locale == 'hi' ? InsightsHindiCategory::class : InsightCategory::class;
        $insightListModel = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        // Fetch the category
        $category = $categoryModel::query()
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$category) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }


        // Fetch the insights for the category
        $insightcategories = $insightListModel::query()
            ->where('cat_id', $category->id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByDesc('news_id')
            ->paginate(15);
        // Apply content URL slug transformation
        $insightcategories = CommonController::contentUrlSlug($insightcategories);

        $popularArticles = $insightListModel::query()->with('category')->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByDesc('views')
            ->take(6)->get();
        $popularArticles = CommonController::contentUrlSlug($popularArticles);

        // Check if insights are available
        if ($insightcategories->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }

        // Return the view with compacted data
        return view('insights.categorylist', compact('insightcategories', 'category', 'popularArticles'));
    }


    public function trendstories()
    {
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Choose the appropriate model based on the locale
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $trendstories = $model::with('author')
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->paginate(8);

        $trendstories = CommonController::contentUrlSlug($trendstories);
        if ($trendstories->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }
        return view('insights.trendstories', compact('trendstories'));
    }

    public function getInsightsDetails(Request $request)
    {
        $id = $request->id;
        // dd(Auth::check());
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $newsModel = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $tagTable = $locale == 'hi' ? ContentTagsAssignedHindi::class : ContentTagsAssigned::class;
        $seoTagModel = $locale == 'hi' ? SeoTagHindi::class : SeoTag::class;
        $newsModel::where('news_id', $id)->increment('views');
        // Fetch news details
        $newsDetails = $newsModel::with(['author', 'category', 'Subcategory'])
            // ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('news_id', $id)
            ->first();
        // dd($newsDetails);
        if (!$newsDetails) {
            return redirect('insights/pagenotfound');
        }
        // Handle access permissions
        if ($newsDetails->status == 2) { // If status is 2, check authentication
            if (!auth()->guard('admin')->check()) {  // Ensure admin authentication
                return redirect('insights/pagenotfound')->with('error', 'You must be an admin to view this article.');
            }
        } elseif ($newsDetails->status == 0) { // If status is 0, block access
            return redirect('insights/pagenotfound');
        }
        // dd($newsDetails->author);
        // Fetch author details
        if (empty($newsDetails->author[0])) {
            // dd('hello');
            $authorId = 466;
        } else {
            $authorId = $newsDetails->author_id;
        }
        // dd($authorId);
        $author_details = AuthorList::query()->where('author_id', $authorId)->first();

        // Fetch associated tags
        $associatedTags = $tagTable::query()
            ->where('content_id', $id)
            ->where('content_type', 2)
            ->pluck('tag_id');

        $assocTags = $seoTagModel::query()
            ->whereIn('tag_id', $associatedTags)
            ->select('tag_id', 'name')
            ->distinct()
            ->get();

        // Find brand matches
        $title = strtolower($newsDetails->title);
        $titleWords = preg_split('/\s+/', $title);

        $brandMatches = FranchisorBusinessDetail::where('profile_status', 1)
            ->select('fran_detail_id', 'company_name', 'profile_name')
            ->get()
            ->filter(function ($item) use ($titleWords) {
                $companyWords = array_map('strtolower', explode(' ', $item->company_name));
                $pattern = '/\b' . implode('\b.*?\b', array_map('preg_quote', $companyWords, array_fill(0, count($companyWords), '/'))) . '\b/';
                return preg_match($pattern, implode(' ', $titleWords));
            })
            ->take(10)
            ->map(function ($item) {
                return [
                    'fran_detail_id' => $item->fran_detail_id,
                    'company_name' => $item->company_name,
                    'profile_name' => $item->profile_name,
                ];
            })
            ->values();

        // Prepare franchise data
        $franchiseData = $brandMatches->map(function ($match) use ($title) {
            return [
                'fran_detail_id' => $match['fran_detail_id'],
                'company_name' => $match['company_name'],
                'profile_name' => $match['profile_name'],
                'title' => $title,
            ];
        })->toArray();

        $relatedArticles = $newsModel::with(['category', 'Subcategory'])
            ->where('status', 1)
            ->where('cat_id', $newsDetails->category[0]->id)
            ->whereNot('news_id', $id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereIn('insight_type', ['Article', 'News', 'Interview'])
            ->orderByDesc('created_at')
            ->take(5)->get();
        // dd($trendingArticles);
        $trendingArticles = CommonController::contentUrlSlug($relatedArticles);

        $latestArticles = $newsModel::with(['category', 'Subcategory'])
            ->where('status', 1)
            ->whereNot('news_id', $id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Article')
            ->orderByDesc('created_at')
            ->take(5)->get();
        // dd($trendingArticles);
        // $latestArticles = CommonController::contentUrlSlug($relatedArticles);

        // Return view with compacted variables
        return view('insights.detail', compact('newsDetails', 'author_details', 'franchiseData', 'assocTags', 'trendingArticles', 'latestArticles'));
    }

    public function nextArticle(Request  $request, $catId)
    {
        $loadedNewsIds = $request->input('loadedNewsIds', []);

        // Debugging output
        // dd($loadedNewsIds, $catId);
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $newsModel = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $tagTable = $locale == 'hi' ? ContentTagsAssignedHindi::class : ContentTagsAssigned::class;
        $seoTagModel = $locale == 'hi' ? SeoTagHindi::class : SeoTag::class;

        // $ipAddress = $_SERVER['REMOTE_ADDR'];
        // $ipAsInt = ip2long($ipAddress);
        // // Check if the IP has already viewed this article
        // $ipExists = InsightViews::query()
        //     ->whereNot('insightID', $id)
        //     ->where('ip_address', $ipAddress)
        //     ->exists();

        // // If the IP has not viewed the article, increment the view count
        // if (!$ipExists) {
        //     // Increment the article's view count
        //     $newsModel::where('news_id', $id)->increment('views');

        //     // Add a record of the IP viewing the article
        //     InsightViews::insert([
        //         'insightID' => $id,
        //         'ip_address' => $ipAddress,
        //         'created_at' => now(),
        //     ]);
        // }

        // Fetch news details
        $newsDetails = $newsModel::with(['author', 'category', 'Subcategory'])
            ->where('status', 1)
            ->where('cat_id', $catId)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotIn('news_id', $loadedNewsIds)
            ->orderByDesc('news_id')
            ->first();
        if (!$newsDetails) {
            return redirect('insights/pagenotfound');
        }
        // Fetch author details
        if (empty($newsDetails->author[0])) {
            $authorId = 466;
        } else {
            $authorId = $newsDetails->author_id;
        }
        $author_details = AuthorList::query()->where('author_id', $authorId)->first();

        // Fetch associated tags
        $associatedTags = $tagTable::query()
            ->where('content_id', $newsDetails->news_id)
            // ->where('content_type', 2)
            ->pluck('tag_id');

        $assocTags = $seoTagModel::query()
            ->whereIn('tag_id', $associatedTags)
            ->select('tag_id', 'name')
            ->distinct()
            ->get();

        // Find brand matches
        $title = strtolower($newsDetails->title);
        $titleWords = preg_split('/\s+/', $title);

        $brandMatches = FranchisorBusinessDetail::where('profile_status', 1)
            ->select('fran_detail_id', 'company_name', 'profile_name')
            ->get()
            ->filter(function ($item) use ($titleWords) {
                $companyWords = array_map('strtolower', explode(' ', $item->company_name));
                $pattern = '/\b' . implode('\b.*?\b', array_map('preg_quote', $companyWords, array_fill(0, count($companyWords), '/'))) . '\b/';
                return preg_match($pattern, implode(' ', $titleWords));
            })
            ->take(10)
            ->map(function ($item) {
                return [
                    'fran_detail_id' => $item->fran_detail_id,
                    'company_name' => $item->company_name,
                    'profile_name' => $item->profile_name,
                ];
            })
            ->values();

        // Prepare franchise data
        $franchiseData = $brandMatches->map(function ($match) use ($title) {
            return [
                'fran_detail_id' => $match['fran_detail_id'],
                'company_name' => $match['company_name'],
                'profile_name' => $match['profile_name'],
                'title' => $title,
            ];
        })->toArray();
        // Add the newly fetched `news_id` to the loaded list
        $loadedNewsIds[] = $newsDetails->news_id;
        return view('insights.partials.next-article', compact('newsDetails', 'franchiseData', 'assocTags', 'author_details', 'loadedNewsIds'));
    }



    public function insightSearch(Request $request)
    {
        $search = $request->search;
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $insightModel = $locale == 'en' ? InsightList::class : InsightListHindi::class;
        // Build the base query
        $query = $insightModel::with('author')
            ->where('status', 1)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            })
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id');
        $articlesList = $query->orderByDesc('created_at')->paginate(10);
        $ids = $query->pluck('news_id');
        // Count matching articles

        if ($articlesList->count() < 1) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }

        $articlesList = CommonController::contentUrlSlug($articlesList);
        $popArticles = $insightModel::with('category')
            ->where('status', 1)
            ->whereRaw("title REGEXP ?", ['(^|[[:space:]])' . preg_quote($search) . '([[:space:]]|$)'])
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('cat_id')
            ->whereNotIn('news_id', $ids)
            ->orderByDesc('created_at')
            ->limit(6)->get();
        // Return the view
        return view('insights.search', compact('articlesList', 'search', 'popArticles'));
    }


    public function insightstags(Request $request)
    {
        $tag = $request->tagslug;
        $tagstr = str_replace('-', ' ', $tag);

        // Determine the language and set table/model dynamically
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
            ->with('author')
            ->whereIn('news_id', $articleIds)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->paginate(15);

        // Apply URL slugs
        $articlesList = CommonController::contentUrlSlug($articlesList);

        $popArticles = $insightModel::query()->with('category')->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByDesc('created_at')
            ->take(6)->get();
        // Check for results and return the view or redirect
        if ($articlesList->count() > 0) {
            return view('insights.insightstags', compact('articlesList', 'seoTag', 'popArticles'));
        }

        return redirect($redirectPath);
    }


    public static function calculateReadTime($obj)
    {
        // dd($obj);
        /*Calculating length of total words*/
        $totaltext = $obj->title . ' ' . $obj->content;

        if (App::getLocale() == 'en') {
            $articlelen = str_word_count($totaltext);
        } else {
            $articlelen = count(explode(' ', $totaltext));
        }
        return round($articlelen / 200);
    }

    public static function insightcategory($locale)
    {
        $model = $locale === 'en' ? InsightCategory::class : InsightsHindiCategory::class;

        if ($locale == 'en') {
            $specificCategories = ['Electric Vehicles', 'MSME', 'Education'];
        } else {
            $specificCategories = ['इलेक्ट्रिक वाहन', 'एमएसएमई', 'शिक्षा'];
        }

        $categories = $model::select('id', 'catname', 'slug')
            ->whereNotIn('catname', $specificCategories)
            ->get()
            ->toArray();

        return $categories;
    }
    public static function specificCategories($locale)
    {
        $model = $locale === 'en' ? InsightCategory::class : InsightsHindiCategory::class;
        if ($locale == 'en') {
            $specificCategories = ['Electric Vehicles', 'MSME', 'Education'];
        } else {
            $specificCategories = ['इलेक्ट्रिक वाहन', 'एमएसएमई', 'शिक्षा'];
        }
        $categories = $model::select('id', 'catname', 'slug')
            ->whereIn('catname', $specificCategories)
            ->get()
            ->toArray();

        return $categories;
    }


    // STATIC FUNCTIONS END HERE

    public function newslettersignup()
    {
        $email      = strtolower(request()->email);
        $siteType   = request()->site_type;
        $randValue  = rand(100000, 9999999);
        $checkEmail = FiNewsLetter::query()->select('status')->where('email', $email)->where('site_type', $siteType)->orderby('nid', 'DESC')->first();


        $news   = 'subscribing';

        if ($checkEmail !== null) {
            if ($checkEmail->status == "S") {
                $news = 'alreadysubscribed';
                return view('insights/subscribe')->with(compact('news'));
            }
        }

        $source = "DOTCOM";

        // If no record exists, send the verification mail
        if ($checkEmail === null) {
            $news = 'subscribing';
            FiNewsLetter::query()->insert([
                'email'       => $email,
                'verify_code' => $randValue,
                'site_type'   => $siteType,
                'source_ref'  => $source
            ]);
            if (!empty($email))
                Mail::getFacadeRoot()->to($email)->send(new NewsLetterSubscribe($randValue));
        } elseif ($checkEmail->status == "P") {
            $news = 'pending';
        } elseif ($checkEmail->status == "S") {
            $news = 'subscribed';
        }
        // dd('saved');
        return view('insights.thanks')->with(compact('news'));
    }


    public function instasubsribe(Request $request)
    {
        // $this->validate($request, array(
        //     'email' => 'required|email|max:255',
        //     'tel' => 'required|min:10|max:10'
        // ));

        $email  = $request->email;
        $mobile = $request->tel;
        // dd($mobile);
        $ip     = $request->ip();

        try {
            // Check if the record already exists based on mobileno and emailid
            $recordExists = InstaSubscribe::where('mobileno', $mobile)
                ->orWhere('emailid', $email)
                ->exists();

            if ($recordExists) {

                return response()->json([
                    'error' => true,
                    'message1' => 'This email already exists.',
                    'message2' => 'This mobile already exists.',
                    'fields' => [
                        'email' => $email,
                        'tel' => $mobile,
                    ],
                ]);
            }

            // If no duplicate, insert the new record
            $instaSubData = InstaSubscribe::create([
                'mobileno' => $mobile,
                'emailid' => $email,
                'client_ip' => $ip
            ]);

            return response()->json([
                'error' => false,
                'message' => '1',
            ]);
        } catch (\Exception $e) {

            Log::error($e);


            return response()->json([
                'error' => true,
                'message' => 'An error occurred. Please try again.',
                'exception_message' => $e->getMessage(),
            ]);
        }
    }

    public function insightsubcategory(Request $request)
    {
        // Redirect if category or subcategory is 'kicker'
        if (in_array($request->category, ['kicker']) || in_array($request->subcategory, ['kicker'])) {
            return redirect('/insights');
        }

        $categorySlug = $request->category;
        $subcategorySlug = $request->subcategory;
        // $isEnglish = App::getLocale() == 'en';  // Check if the language is English
        $isEnglish = request()->segment(2) == 'en' ? 'en' : 'hi';
        $redirectPath = $isEnglish == 'en' ? '/insights' : '/insights/hindi';
        app()->setLocale($isEnglish);
        session()->put('locale', $isEnglish);
        // Determine models based on the language (English or Hindi)
        $insightListModel = $isEnglish ? InsightList::class : InsightListHindi::class;
        $insightSubCatModel = $isEnglish ? InsightSubcategory::class : InsightsHindiSubCategory::class;
        $insightCatModel = $isEnglish ? InsightCategory::class : InsightsHindiCategory::class;

        // Fetch subcategory and category data
        $subcatData = $insightSubCatModel::query()->where('slug', $subcategorySlug)->first();
        if (!$subcatData) {
            return redirect('/insights');  // Redirect if subcategory not found
        }
        // dd($subcatData);
        $catData = $insightCatModel::query()
            ->where('slug', $categorySlug)
            ->where('id', $subcatData->mcat_id) // Ensure correct category based on subcategory
            ->first();
        // dd($catData);
        if (!$catData) {
            return redirect('/insights');  // Redirect if category not found
        }

        // Fetch content data for the selected subcategory
        $contentData = $insightListModel::with(['author', 'category', 'subcategory'])
            ->where('subcat_id', $subcatData->id)
            ->whereNotIn('news_type', ['ri', 'ir'])  // Exclude specific news types
            ->where('status', 1)  // Only active insights
            ->whereNotNull('image')  // Only insights with images
            ->whereNotNull('cat_id')  // Ensure category ID is present
            ->whereNotNull('subcat_id')  // Ensure subcategory ID is present
            ->paginate(10);

        $popArticles = $insightListModel::query()->with('category')->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByDesc('created_at')
            ->take(6)->get();

        return view('insights.subcatdata', compact('contentData', 'subcatData', 'catData', 'popArticles'));
    }

    public function getVideoPodcast(Request $request)
    {
        // Determine the language based on the URL segment
        $isEnglish = $request->segment(2) == 'en' ? 'en' : 'hi';
        $redirectPath = $isEnglish == 'en' ? '/insights' : '/insights/hindi';

        // Set application locale and session locale
        app()->setLocale($isEnglish);
        session()->put('locale', $isEnglish);

        $YOUTUBE_IMAGE_PATH = "https://img.youtube.com/vi/%s/mqdefault.jpg";
        $YOUTUBE_URL = "https://www.youtube.com/watch?v=%s";

        // Fetch the videos with the 'VideoCategory' relationship
        $videos = FihlPodcastVideo::with('VideoCategory')
            ->where('podcast_type', 'V')
            ->where('pod_lang', $isEnglish)
            ->where('status', 'A')
            ->orderBy('created_at', 'DESC')
            ->paginate(8);

        $listVideo = $videos->map(function ($video) use ($YOUTUBE_IMAGE_PATH, $YOUTUBE_URL) {
            // Access the category name safely using optional() and first()
            $categoryName = optional($video->VideoCategory->first())->catname;

            return [
                'sno' => $video->sno,
                'title' => $video->title,
                'pod_lang' => $video->pod_lang,
                'description' => $video->description,
                'url' => sprintf($YOUTUBE_URL, $video->videoID),
                'image' => sprintf($YOUTUBE_IMAGE_PATH, $video->videoID),
                'views' => $video->views,
                'createDate' => $video->create_date,
                'category' => $categoryName, // Safely access category name
            ];
        });
        // dd($listVideo);

        // Fetch the latest podcasts (audio type)
        $podcast = FihlPodcastVideo::query()
            ->where('pod_lang', $isEnglish)
            ->where('podcast_type', 'A')
            ->where('status', 'A')
            ->where('podcast_id', '!=', '')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        // Return the view with the mapped videos and podcasts
        return view('insights.video', compact('listVideo', 'videos', 'podcast'));
    }



    public function getpodcast(Request $request)
    {
        $isEnglish = request()->segment(2) == 'en' ? 'en' : 'hi';
        $redirectPath = $isEnglish == 'en' ? '/insights' : '/insights/hindi';
        app()->setLocale($isEnglish);
        session()->put('locale', $isEnglish);
        if ($isEnglish == 'en') {
            $podcasts = FihlPodcastVideo::query()->where('podcast_type', 'A')->where('pod_lang', 'en')->where('status', 'A')->where('podcast_id', '!=', '')->orderByDesc('created_at')->paginate(6);
            $podcastcount = FihlPodcastVideo::query()->where('podcast_type', 'A')->where('pod_lang', 'en')->where('status', 'A')->where('podcast_id', '!=', '')->count();
        } else {
            $podcasts = FihlPodcastVideo::query()->where('podcast_type', 'A')->where('pod_lang', 'hi')->where('status', 'A')->where('podcast_id', '!=', '')->orderByDesc('created_at')->paginate(6);
            $podcastcount = FihlPodcastVideo::query()->where('podcast_type', 'A')->where('pod_lang', 'hi')->where('status', 'A')->where('podcast_id', '!=', '')->count();
        }
        return view('insights.podcast', compact('podcasts', 'podcastcount'));
    }

    public static function createTagSlugUrl($slug)
    {
        // dd($slug);
        $url = '';
        if (App::getLocale() == 'hi') $url .= "/insights/hi";
        if (App::getLocale() == 'en') $url .= "/insights/en";
        $url .= "/" . $slug;
        return $url;
    }

    public static function createimgurl($image)
    {
        // dd($image);
        // Default image URL
        $defaultUrl = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg';

        if (!$image) {
            return $defaultUrl;
        }

        // If the image is an absolute URL (contains 'https')
        if (strstr($image, 'https')) {
            return trim($image, '/');
        }

        $baseUrl = Config('constants.franAwsS3Url');
        $imagePath = ltrim($image, '/'); // Clean the image path

        // Check if the image contains a "/"
        if (strstr($image, '/')) {
            return $baseUrl . $imagePath;
        }

        // Set path based on locale
        $uploadPath = App::getLocale() !== 'en'
            ? Config('constants.ARTICLE_HINDI_UPLOAD_PATH')
            : Config('constants.ARTICLE_UPLOAD_PATH');

        return $baseUrl . $uploadPath . $imagePath;
    }

    public static function createimgurl1($image, $lang)
    {
        // dd($image,$lang);
        // Default image URL
        $defaultUrl = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg';

        if (!$image) {
            return $defaultUrl;
        }

        // If the image is an absolute URL (contains 'https')
        if (strstr($image, 'https')) {
            return trim($image, '/');
        }

        $baseUrl = Config('constants.franAwsS3Url');
        $imagePath = ltrim($image, '/'); // Clean the image path

        // Check if the image contains a "/"
        if (strstr($image, '/')) {
            return $baseUrl . $imagePath;
        }

        // Set path based on locale
        $uploadPath = $lang !== 'en'
            ? Config('constants.ARTICLE_HINDI_UPLOAD_PATH')
            : Config('constants.ARTICLE_UPLOAD_PATH');

        return $baseUrl . $uploadPath . $imagePath;
    }

    public static function authorImageurl($image)
    {
        $defaultUrl = url('images/defaultuser.png');

        if (!$image) {
            return $defaultUrl;
        }

        // Check if the image contains a "/"
        if (strstr($image, "/")) {
            return Config('constants.franAwsS3Url') . ltrim($image, '/');
        }

        // Check if the image exists on S3
        $imagePath = 'opp/authors/images/' . trim($image);
        $s3Url = Config('constants.franAwsS3Url') . $imagePath;

        return @getimagesize($s3Url) !== false ? $s3Url : $defaultUrl;
    }

    public function loadMoreArticles(Request $request)
    {
        $catId = $request->catId;
        $newsId = $request->newsId;
        $page = $request->page;

        // Fetch related articles based on category
        $articles = InsightList::with(['author', 'category', 'subcategory'])
            ->where('cat_id', $catId)
            ->whereNot('news_id', $newsId)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->paginate(1, ['*'], 'page', $page);
        dd($articles);
        $html = "";
        foreach ($articles as $article) {
            $articleUrl = url("/insights/{$article->insight_type}/{$article->slug}.{$article->news_id}");
            $html .= '
                <div class="related-article">
                    <h2><a href="' . $articleUrl . '">' . $article->title . '</a></h2>
                    <p>' . $article->shortDesc . '</p>
                    <img src="' . asset($article->image) . '" class="img-fluid" alt="' . $article->title . '">
                    <hr>
                </div>';
        }

        return response()->json(['html' => $html]);
    }
}
