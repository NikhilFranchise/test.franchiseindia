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
use Illuminate\Support\Str;
use App\Helpers\FranchiseHelper;


class InsightsController extends Controller
{

    public function insightshome()
    {
        $locale = request()->segment(2) === 'hindi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        $model = $locale === 'hi' ? InsightListHindi::class : InsightList::class;

        $homeArticle = $model::with('category')
            ->select('news_id', 'insight_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->orderByEffectiveDate('desc')
            ->take(1)
            ->get();

        if ($homeArticle->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }
        $topstories = $model::with('category')
            ->select('news_id', 'insight_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->skip(1)
            ->take(5)
            ->get();


        $industry_focus = $model::with('category')
            ->select('news_id', 'insight_type', 'news_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image')->where('insight_type', 'Article')
            ->withEffectiveDate()
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(1)
            ->get();

        $industry_data = $model::with('category')
            ->select('news_id', 'insight_type', 'news_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNot('news_id', $industry_focus[0]->news_id)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            // ->skip(1)
            ->take(6)
            ->get();

        $reports = $model::with('category')
            ->select('news_id', 'insight_type', 'news_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image')
            ->withEffectiveDate()
            ->where('insight_type', 'Report')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->whereNot('image', '=', '')
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(8)
            ->get();

        $interview = $model::with('category')
            ->select('news_id', 'insight_type', 'news_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image')
            ->withEffectiveDate()
            ->where('insight_type', 'Interview')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(8)
            ->get();

        $topcategories = SeoTag::query()->select('tag_id', 'name')->orderByDesc('frequency')->take(10)->get();


        // Fetch author details & count articles (Avoid `whereIn`)
        $authors = AuthorList::query()
            ->select('author_id', 'title', 'slug', 'image', 'designation')
            ->where('status', 'A')
            ->get();
        $authorDetails = $authors->map(function ($author) use ($model) {
            // Count articles for each author (Direct Query, No whereIn)
            $Encount = InsightList::where('author_id', $author->author_id)
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->count();

            $Hicount = InsightListHindi::where('author_id', $author->author_id)
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->count();
            $author->count = $Encount + $Hicount;
            return $author;
        });

        $trendArticles = $model::with('category')
            ->select('news_id', 'insight_type', 'news_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image', 'views')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->orderByDesc('views')
            ->take(8)
            ->get();

        return view('insights.insight_home', compact(
            'homeArticle',
            'topstories',
            'trendArticles',
            'topcategories',
            'industry_focus',
            'industry_data',
            'reports',
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
            ->select('news_id', 'insight_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image', 'author_id', 'created_at', 'content', 'published_date')
            ->withEffectiveDate()
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('status', 1)
            ->whereNotNull(['image', 'cat_id'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->paginate(15);

        $popArticles = $model::with('category')
            ->select('news_id', 'insight_type', 'cat_id', 'title', 'slug')
            // ->select('title', 'slug', 'news_id', 'insight_type', 'cat_id')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('status', 1)
            ->whereNotNull(['image', 'cat_id'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
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
        $insArticles = $model::with('author')
            ->select('news_id', 'insight_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image', 'author_id', 'created_at', 'content', 'published_date')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->where('status', 1)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->paginate(15);

        // Handle empty results
        if ($insArticles->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }
        // Get the IDs of articles already shown
        $insArticleIds = $insArticles->pluck('news_id');
        $popArticles = $model::with('category')
            ->select('title', 'slug', 'news_id', 'insight_type', 'cat_id')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->where('status', 1)
            ->whereNotIn('news_id', $insArticleIds) // Exclude already shown articles
            // ->skip(15)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
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
            ->select('news_id', 'insight_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image', 'author_id', 'created_at', 'content', 'published_date')
            ->withEffectiveDate()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('insight_type', 'Interview')
            ->whereNotNull(['image', 'cat_id'])
            ->where('status', 1)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->paginate(15);

        if ($interviews->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }
        $popArticles = $model::with('category')
            ->select('title', 'slug', 'news_id', 'insight_type', 'cat_id')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->where('status', 1)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
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
            ->select('news_id', 'insight_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image', 'author_id', 'created_at', 'content', 'published_date')
            ->withEffectiveDate()
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Event')
            ->orWhere('insight_type', 'Report')
            ->whereNotNull(['image', 'cat_id'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->paginate(15);

        if ($events_reports->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }
        $popArticles = $model::with('category')->select('title', 'slug', 'news_id', 'insight_type', 'cat_id')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->where('status', 1)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(6)
            ->get();

        return view('insights.events_reports', compact('events_reports', 'popArticles'));
    }


    public function authordata(Request $request)
    {
        $author_id = explode('-', $request->slug);
        $id = (int) end($author_id);

        if ($id == 0) {
            return redirect('/insights');
        }

        $author = AuthorList::find($id);
        if (!$author) {
            return redirect('/insights');
        }

        $correctSlug = Str::slug($author->title) . '-' . $id;
        if ($request->slug !== $correctSlug) {
            return redirect()->to(url("/insights/author/{$correctSlug}"), 301);
        }

        $articleQuery = function ($query) use ($id) {
            $query->where('author_id', $id)
                ->where('status', 1)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->whereNotNull(['image', 'cat_id']);
        };

        $articleCount = InsightList::query()
            ->select('author_id')
            ->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->count()
            + InsightListHindi::query()
            ->select('author_id')
            ->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->count();
        // dd($articleCount);
        $latestArticles = collect([
            InsightList::query()
                ->select('news_id', 'title', 'slug', 'cat_id', 'insight_type', 'shortDesc', 'image')
                ->withEffectiveDate()
                ->where($articleQuery)
                // ->orderByDesc('created_at')
                ->orderByEffectiveDate('desc')
                ->get()
                ->map(fn($item) => $item->setAttribute('lang', 'en')),
            InsightListHindi::query()
                ->select('news_id', 'title', 'slug', 'cat_id', 'insight_type', 'shortDesc', 'image')
                ->withEffectiveDate()
                ->where($articleQuery)
                // ->orderByDesc('created_at')
                ->orderByEffectiveDate('desc')
                ->get()
                ->map(fn($item) => $item->setAttribute('lang', 'hi'))
        ])->flatten()->sortByDesc('created_at');
        // dd($latestArticles);

        $perPage = 15;
        $currentPage = Paginator::resolveCurrentPage();
        $latestArticles = new LengthAwarePaginator(
            $latestArticles->forPage($currentPage, $perPage),
            $latestArticles->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        $mostViewedArticles = collect([
            InsightList::query()
                ->select('news_id', 'title', 'slug', 'cat_id', 'insight_type', 'shortDesc', 'image')
                ->where($articleQuery)
                ->orderByDesc('views')
                ->get()
                ->map(fn($item) => $item->setAttribute('lang', 'en')),
            InsightListHindi::query()
                ->select('news_id', 'title', 'slug', 'cat_id', 'insight_type', 'shortDesc', 'image')
                ->where($articleQuery)
                ->orderByDesc('views')
                ->get()
                ->map(fn($item) => $item->setAttribute('lang', 'hi'))
        ])->flatten()->sortByDesc('views');

        $mostViewedArticles = new LengthAwarePaginator(
            $mostViewedArticles->forPage($currentPage, $perPage),
            $mostViewedArticles->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        $popularArticles = collect([
            InsightList::with('category')
                ->select('news_id', 'title', 'slug', 'cat_id', 'insight_type')
                ->withEffectiveDate()
                ->where($articleQuery)
                ->where('insight_type', 'Article')
                // ->orderByDesc('created_at')
                ->orderByEffectiveDate('desc')
                ->limit(5)
                ->get()
                ->map(fn($item) => $item->setAttribute('lang', 'en')),
            InsightListHindi::with('category')
                ->select('news_id', 'title', 'slug', 'cat_id', 'insight_type')
                ->withEffectiveDate()
                ->where($articleQuery)
                ->where('insight_type', 'Article')
                // ->orderByDesc('created_at')
                ->orderByEffectiveDate('desc')
                ->limit(5)
                ->get()
                ->map(fn($item) => $item->setAttribute('lang', 'hi'))
        ])->flatten();

        return view('insights.author', compact('author', 'latestArticles', 'articleCount', 'mostViewedArticles', 'popularArticles'));
    }


    public function authorarchive(Request $request)
    {
        // Fetch author IDs and count articles per author from both tables in a single query
        $authorCountsEn = InsightList::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->selectRaw('author_id, COUNT(*) as article_count')
            ->get()
            ->keyBy('author_id');

        $authorCountsHi = InsightListHindi::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->selectRaw('author_id, COUNT(*) as article_count')
            ->get()
            ->keyBy('author_id');
        // Merge author IDs and article counts
        $authorCounts = [];
        foreach (array_merge($authorCountsEn->keys()->toArray(), $authorCountsHi->keys()->toArray()) as $authorId) {
            $countEn = $authorCountsEn[$authorId]->article_count ?? 0;
            $countHi = $authorCountsHi[$authorId]->article_count ?? 0;
            $authorCounts[$authorId] = [
                'total' => $countEn + $countHi,
                'lang'  => $countEn > 0 ? 'en' : 'hi'
            ];
        }

        // Fetch author details and append article count & language
        $authorDetails = AuthorList::query()
            ->select('author_id', 'title', 'slug', 'image', 'designation')
            ->whereNotIn('title', ['Franchise India Bureau', 'Opportunity India Desk', 'TFW Bureau', 'Guest Author'])
            ->where('status', 'A')
            ->orderByDesc('created_at')
            ->limit(10)
            ->get()
            ->map(function ($author) use ($authorCounts) {
                $author->count = $authorCounts[$author->author_id]['total'] ?? 0;
                $author->lang = $authorCounts[$author->author_id]['lang'] ?? 'en';
                return $author;
            });

        // Fetch Contributory Authors
        $ContributoryAuthor = AuthorList::query()
            ->select('author_id', 'slug', 'title', 'image', 'designation')
            ->whereIn('title', ['Franchise India Bureau', 'Opportunity India Desk', 'TFW Bureau'])
            ->where('status', 'A')
            ->get()
            ->map(function ($author) use ($authorCounts) {
                $author->count = $authorCounts[$author->author_id]['total'] ?? 0;
                $author->lang = $authorCounts[$author->author_id]['lang'] ?? 'en';
                return $author;
            });

        // Fetch Guest Authors
        $guestAuthor = AuthorList::query()
            ->select('author_id', 'slug', 'title', 'image', 'designation')
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
        // dd('yes');
        $slug = strtolower(str_replace(' ', '-', $request->slug));
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Choose the appropriate model based on the locale

        // Determine the appropriate models based on the language
        $categoryModel = $locale == 'hi' ? InsightsHindiCategory::class : InsightCategory::class;
        $subcategoryModel = $locale == 'hi' ? InsightsHindiSubCategory::class : InsightSubcategory::class;
        $insightListModel = $locale == 'hi' ? InsightListHindi::class : InsightList::class;

        // Fetch the category
        $category = $categoryModel::query()
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();
         // IDs that should redirect to external blog
            $redirectIds = [9, 32, 33];
            if (in_array($category->id, $redirectIds)) {
                $externalSlug = $category->slug;
                $externalUrl = "https://www.entrepreneur.com/blog/{$locale}/{$externalSlug}";
                dd($externalUrl);
                return redirect()->away($externalUrl);
            }
        if (!$category) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }


        // Fetch the insights for the category
        $insightcategories = $insightListModel::with(['author'])
            ->select('news_id', 'title', 'cat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('cat_id', $category->id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            // ->orderByDesc('news_id')
            ->orderByEffectiveDate('desc')
            ->paginate(15);
        // dd($insightcategories);
        // Apply content URL slug transformation

        $popularArticles = $insightListModel::with('category')->select('news_id', 'title', 'cat_id', 'insight_type', 'slug')
            ->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByDesc('views')
            ->take(6)->get();

        // Subcategories under the main category
        $subcat = $subcategoryModel::query()
            ->select('id', 'subcat_name', 'slug')
            ->where('mcat_id', $category->id)
            ->get();

        $subcatids = $subcat->pluck('id');

        // Get insight articles under those subcategories
        $subcatData = $insightListModel::query()
            ->select('subcat_id') // Just need subcat_id for counting
            ->whereIn('subcat_id', $subcatids)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->get();

        // Count the articles per subcategory ID
        $subcatCounts = $subcatData->groupBy('subcat_id')->map(function ($items) {
            return $items->count();
        });

        // Now you can access the count like this:
        foreach ($subcat as $sc) {
            $count = $subcatCounts[$sc->id] ?? 0;
        }

        // Check if insights are available
        if ($insightcategories->isEmpty()) {
            return redirect($locale === 'hi' ? '/insights/hindi' : '/insights');
        }

        // Return the view with compacted data
        return view('insights.categorylist', compact('insightcategories', 'category', 'popularArticles', 'subcat'));
    }

    public function getInsightsDetails(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $newsModel = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $tagTable = $locale == 'hi' ? ContentTagsAssignedHindi::class : ContentTagsAssigned::class;
        $seoTagModel = $locale == 'hi' ? SeoTagHindi::class : SeoTag::class;
        // Fetch news details
        $newsDetails = $newsModel::with(['author', 'category', 'Subcategory'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('news_id', $id)
            ->first();
        // dd($newsDetails); chedch
        if (!$newsDetails) {
            return redirect('insights/pagenotfound');
        }
        // // ✅ Check for specific category IDs
        if (in_array($newsDetails->cat_id, [9, 32, 33])) {
            // Get the current slug (assuming it's in `slug` column)
            $slug = $newsDetails->slug ?? $newsDetails->news_id;
            $type = strtolower($newsDetails->insight_type);
            // Build target domain (change this domain)
            $targetDomain = "https://www.entrepreneurindia.com/blog/{$locale}/{$type}/{$newsDetails->slug}.{$id}";
            // dd($targetDomain);
            return redirect()->away($targetDomain,301);
        }

        $correctSlug = $newsDetails->slug;
        $type = strtolower($newsDetails->insight_type);
        if ($request->slug !== $correctSlug) {
            return redirect()->to(url("/insights/{$locale}/{$type}/{$correctSlug}.{$id}"), 301);
        }
        $newsModel::where('news_id', $id)->increment('views');

        // Handle access permissions based on status
        switch ($newsDetails->status) {
            case 1:
                // Status 1: Proceed as normal
                break;
            case 2:
                // Status 2: Require admin authentication
                if (!auth()->guard('admin')->check()) {
                    return redirect('insights/pagenotfound')->with('error', 'You must be an admin to view this article.');
                }
                break;
            case 0:
                // Status 0: Block access
                return redirect('insights/pagenotfound');
        }
        // Fetch author details
        $authorId = empty($newsDetails->author[0]) ? 466 : $newsDetails->author_id;
        $author_details = AuthorList::query()->find($authorId);
        // dd($authorId);
        // $author_details = AuthorList::query()->where('author_id', $authorId)->first();

        // Fetch associated tags
        $associatedTags = $tagTable::query()
            ->where('content_id', $id)
            ->where('content_type', 2)
            ->pluck('tag_id');
        // dd($tagTable);
        $assocTags = $seoTagModel::query()
            ->whereIn('tag_id', $associatedTags)
            ->select('tag_id', 'name')
            ->distinct()
            ->get();

        // // Find brand matches
        // $titleWords = preg_split('/\s+/', strtolower($newsDetails->title));
        // $brandMatches = FranchisorBusinessDetail::where('profile_status', 1)
        //     ->select('fran_detail_id', 'company_name', 'profile_name')
        //     ->get()
        //     ->filter(function ($item) use ($titleWords) {
        //         $companyWords = array_map('strtolower', explode(' ', $item->company_name));
        //         $pattern = '/\b' . implode('\b.*?\b', array_map(fn($word) => preg_quote($word, '/'), $companyWords)) . '\b/';
        //         return preg_match($pattern, implode(' ', $titleWords));
        //     })
        //     ->take(10)
        //     ->map(function ($item) {
        //         return [
        //             'fran_detail_id' => $item->fran_detail_id,
        //             'company_name' => $item->company_name,
        //             'profile_name' => $item->profile_name,
        //         ];
        //     })
        //     ->values();

        // // Prepare franchise data
        // $franchiseData = $brandMatches->map(fn($match) => [
        //     'fran_detail_id' => $match['fran_detail_id'],
        //     'company_name' => $match['company_name'],
        //     'profile_name' => $match['profile_name'],
        //     'title' => $newsDetails->title,
        // ])->toArray();
        // ✅ Match franchises by article title using helper
        $franchiseData = FranchiseHelper::matchFranchisesByTitle($newsDetails->title);
        $category = $newsDetails->category->first();
        if ($category) {
            $trendingArticles = $newsModel::with(['category', 'Subcategory'])
                ->select('news_id', 'cat_id', 'subcat_id', 'title', 'slug', 'insight_type')
                ->withEffectiveDate()
                ->where('status', 1)
                ->where('cat_id', $newsDetails->category[0]->id)
                ->whereNot('news_id', $id)
                ->whereNotIn('news_type', ['ri', 'ir'])
                // ->whereIn('insight_type', ['Article', 'News', 'Interview'])
                // ->orderByDesc('created_at')
                ->orderByEffectiveDate('desc')
                ->take(5)->get();
        } else {
            $trendingArticles = collect();
        }
        
        $latestArticles = $newsModel::with(['category', 'Subcategory'])
            ->select('news_id', 'cat_id', 'subcat_id', 'title', 'slug', 'insight_type')
            ->withEffectiveDate()
            ->where('status', 1)
            ->whereNot('news_id', $id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('insight_type', 'Article')
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->take(5)->get();

        // Return view with compacted variables
        return view('insights.detail', compact('newsDetails', 'author_details', 'franchiseData', 'assocTags', 'trendingArticles', 'latestArticles'));
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
            ->select('news_id', 'title', 'cat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            })
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id');
        $articlesList = $query->orderByEffectiveDate('desc')->paginate(10)->appends(['search' => $search]);
        $ids = $query->pluck('news_id');

        $popArticles = $insightModel::with('category')
            ->select('news_id', 'cat_id', 'title', 'slug', 'insight_type')
            ->withEffectiveDate()
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('cat_id')
            ->whereNotIn('news_id', $ids)
            ->orderByEffectiveDate('desc')
            ->limit(6)->get();
        // Return the view
        return view('insights.search', compact('articlesList', 'search', 'popArticles'));
    }

    public function insightstags(Request $request)
    {
        $tag = str_replace('-', ' ', $request->tagslug);

        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        $redirectPath = $locale === 'en' ? '/insights' : '/insights/hindi';
        $insightModel = $locale === 'en' ? InsightList::class : InsightListHindi::class;
        $tagModel = $locale === 'en' ? SeoTag::class : SeoTagHindi::class;
        $contentModel = $locale === 'en' ? ContentTagsAssigned::class : ContentTagsAssignedHindi::class;

        $seoTag = $tagModel::where('name', $tag)->first();
        if (!$seoTag) {
            return redirect($redirectPath);
        }

        $articleIds = $contentModel::where('tag_id', $seoTag->tag_id)
            ->where('content_type', 2)
            ->pluck('content_id')
            ->unique()
            ->toArray();

        $articlesList = $insightModel::with('author')
            ->select('news_id', 'title', 'cat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->whereIn('news_id', $articleIds)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull(['image', 'cat_id'])
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->paginate(15);

        $popArticles = $insightModel::with('category')
            ->select('news_id', 'cat_id', 'title', 'slug', 'insight_type')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotIn('news_id', $articleIds)
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->limit(6)
            ->get();

        return $articlesList->isNotEmpty()
            ? view('insights.insightstags', compact('articlesList', 'seoTag', 'popArticles'))
            : redirect($redirectPath);
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


    public function newslettersignup(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => [
                'required',
                'email',
                'not_regex:/@(mailinator\.com|tempmail\.com|10minutemail\.com|guerrillamail\.com|yopmail\.com)$/i'
            ],
        ], [
            'email.not_regex' => 'Please enter a valid business or personal email (No temporary emails).'
        ]);

        $email = strtolower($request->email);
        $siteType = $request->site_type;
        $randValue = rand(100000, 9999999);

        $checkEmail = FiNewsLetter::query()
            ->select('status')
            ->where('email', $email)
            ->where('site_type', $siteType)
            ->orderby('nid', 'DESC')
            ->first();

        if ($checkEmail !== null && $checkEmail->status == "S") {
            return response()->json([
                'error' => true,
                'message' => 'You are already subscribed!',
                'status' => 'subscribed',
            ]);
        }

        $source = "DOTCOM";

        if ($checkEmail === null) {
            FiNewsLetter::query()->insert([
                'email' => $email,
                'verify_code' => $randValue,
                'site_type' => $siteType,
                'source_ref' => $source
            ]);

            if (!empty($email)) {
                Mail::getFacadeRoot()->to($email)->send(new NewsLetterSubscribe($randValue));
            }

            return response()->json([
                'error' => false,
                'message' => 'Your Subscription successfully submitted! Please check your email for verification.',
                'status' => 'success',
            ]);
        } elseif ($checkEmail->status == "P") {
            return response()->json([
                'error' => false,
                'message' => 'Your subscription is pending verification. Please check your email.',
                'status' => 'pending',
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Something went wrong. Please try again later.',
            'status' => 'error',
        ]);
    }


    public function instasubsribe(Request $request)
    {
        // Validate input before checking database
        $validatedData = $request->validate([
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', // Valid email format
                function ($attribute, $value, $fail) {
                    $spamDomains = ['mailinator.com', 'tempmail.com', '10minutemail.com', 'guerrillamail.com', 'yopmail.com'];
                    $domain = substr(strrchr($value, "@"), 1);
                    if (in_array($domain, $spamDomains)) {
                        $fail('Temporary email addresses are not allowed.');
                    }
                },
            ],
            'tel' => ['required', 'regex:/^[6-9]\d{9}$/'], // Mobile must start with 6-9 and have 10 digits
        ]);

        try {
            $email = strtolower($request->email);
            $mobile = $request->tel;
            $ip = $request->ip();

            // **Check if the email exists**
            $emailExists = InstaSubscribe::where('emailid', $email)->exists();

            // **Check if the mobile exists**
            $mobileExists = InstaSubscribe::where('mobileno', $mobile)->exists();

            if ($emailExists || $mobileExists) {
                return response()->json([
                    'error' => true,
                    'message' => $emailExists ? 'This email already exist!' : '',
                    'message1' => $mobileExists ? 'This mobile number already exist!' : '',
                    'fields' => [
                        'email' => $emailExists ? $email : null,
                        'tel' => $mobileExists ? $mobile : null,
                    ],
                ]);
            }

            // Insert new record
            InstaSubscribe::create([
                'mobileno' => $mobile,
                'emailid' => $email,
                'client_ip' => $ip,
            ]);

            return response()->json([
                'error' => false,
                'message' => 'Your Subscription successfully Submitted!',
            ]);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'error' => true,
                'message' => 'An error occurred. Please try again later.',
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
            return redirect('/insights');
        }

        // Fetch content data for the selected subcategory
        $contentData = $insightListModel::with(['author', 'category', 'subcategory'])
            ->select('news_id', 'title', 'cat_id', 'subcat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('subcat_id', $subcatData->id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->whereNotNull('subcat_id')
            ->orderByEffectiveDate('desc')
            ->paginate(15);

        $popArticles = $insightListModel::query()->select('news_id', 'title', 'cat_id', 'subcat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->with('category')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByEffectiveDate('desc')
            ->take(6)->get();
        // dd()

        return view('insights.subcatdata', compact('contentData', 'subcatData', 'catData', 'popArticles'));
    }

    public function getVideoPodcast(Request $request)
    {
        // Determine the language based on the URL segment
        $isEnglish = $request->segment(2) == 'en' ? 'en' : 'hi';
        $redirectPath = $isEnglish == 'en' ? '/insights' : '/insights/hindi';
        app()->setLocale($isEnglish);
        session()->put('locale', $isEnglish);
        // Determine models based on the language (English or Hindi)
        $insightListModel = $isEnglish ? InsightList::class : InsightListHindi::class;
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
            ->paginate(10);

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

        // Fetch the latest podcasts (audio type)
        $podcast = FihlPodcastVideo::query()
            ->where('pod_lang', $isEnglish)
            ->where('podcast_type', 'A')
            ->where('status', 'A')
            ->where('podcast_id', '!=', '')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        $popArticles = $insightListModel::query()->select('news_id', 'title', 'cat_id', 'subcat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->with('category')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByEffectiveDate('desc')
            ->take(6)->get();
        // Return the view with the mapped videos and podcasts
        return view('insights.video', compact('listVideo', 'videos', 'podcast', 'popArticles'));
    }



    public function getpodcast(Request $request)
    {
        $isEnglish = request()->segment(2) == 'en' ? 'en' : 'hi';
        $redirectPath = $isEnglish == 'en' ? '/insights' : '/insights/hindi';
        $insightListModel = $isEnglish == 'en' ? InsightList::class : InsightListHindi::class;

        app()->setLocale($isEnglish);
        session()->put('locale', $isEnglish);
        if ($isEnglish == 'en') {
            $podcasts = FihlPodcastVideo::query()->where('podcast_type', 'A')->where('pod_lang', 'en')->where('status', 'A')->where('podcast_id', '!=', '')->orderByDesc('created_at')->paginate(6);
            $podcastcount = FihlPodcastVideo::query()->where('podcast_type', 'A')->where('pod_lang', 'en')->where('status', 'A')->where('podcast_id', '!=', '')->count();
        } else {
            $podcasts = FihlPodcastVideo::query()->where('podcast_type', 'A')->where('pod_lang', 'hi')->where('status', 'A')->where('podcast_id', '!=', '')->orderByDesc('created_at')->paginate(6);
            $podcastcount = FihlPodcastVideo::query()->where('podcast_type', 'A')->where('pod_lang', 'hi')->where('status', 'A')->where('podcast_id', '!=', '')->count();
        }

        $popArticles = $insightListModel::query()->select('news_id', 'title', 'cat_id', 'subcat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->with('category')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByEffectiveDate('desc')
            ->take(6)->get();

        return view('insights.podcast', compact('podcasts', 'podcastcount', 'popArticles'));
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

    public function exportInsights()
    {
        // Handle localization
        $locale = request()->segment(2) === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Select the correct model based on the locale
        $insightModel = $locale === 'en' ? InsightList::class : InsightListHindi::class;

        // Fetch insights with category relationship
        try {
            $insights = $insightModel::with('category') // Eager loading category
                ->select('news_id', 'title', 'insight_type', 'slug', 'views', 'cat_id', 'published_date', 'created_at')
                ->where('status', 1)
                // ->orderByDesc('views')
                ->orderByDesc('created_at')
                // ->limit(100) // You can adjust the limit based on the number of records you need
                ->get();
        } catch (\Exception $e) {
            // Log the error if the query fails
            Log::error('Error fetching insights: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch insights'], 500);
        }

        // Define CSV headers
        $csvHeader = ['Title', 'URL', 'Insight Type', 'Category', 'Views', 'Created At'];
        $filename = 'insights_export_' . now()->format('dmy_His') . '.csv';

        $callback = function () use ($insights, $csvHeader, $locale) {
            // Clear any previous output
            if (ob_get_level()) {
                ob_end_clean();
            }

            // Open file stream for CSV output
            $file = fopen('php://output', 'w');
            // Add BOM for UTF-8 (important for Excel compatibility)
            fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // Write the header row to the CSV
            fputcsv($file, $csvHeader);

            foreach ($insights as $insight) {
                // Check if category exists and if it has a 'name' property (in case it's a collection)
                $categoryName = $insight->category && $insight->category->isNotEmpty()
                    ? $insight->category->first()->catname : 'N/A';

                // Construct URL for the insight
                $url = config('constants.MainDomain', 'https://www.franchiseindia.com')
                    . '/insights/'
                    . $locale
                    . '/'
                    . strtolower($insight->insight_type)
                    . '/'
                    . $insight->slug
                    . '.'
                    . $insight->news_id;

                // Write the row for each insight
                fputcsv($file, [
                    $insight->title,
                    $url,
                    $insight->insight_type,
                    $categoryName,
                    $insight->views,
                    // $insight->published_date?->format('d-m-Y') ?? 'N/A',
                    $insight->created_at?->format('d-m-Y') ?? 'N/A',
                ]);
            }

            // Close the file
            fclose($file);
        };

        // Return the CSV as a streamed response
        return response()->stream($callback, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=\"$filename\"",
        ]);
    }

    public function nextArticle(Request $request, $lang)
    {
        $currentId = $request->get('currentId');
        $categoryId = $request->get('categoryId');
        $loadedIds = $request->get('loadedIds', []);
        $direction = $request->get('direction', 'down'); // 'down' or 'up'
        $locale = $lang;
        app()->setLocale($locale);
        session()->put('locale', $locale);

        if (!$currentId || !$categoryId) {
            return response()->json(['error' => 'Invalid parameters'], 400);
        }

        // Determine models based on locale
        $newsModel = $locale === 'hi' ? InsightListHindi::class : InsightList::class;
        $tagTable = $locale === 'hi' ? ContentTagsAssignedHindi::class : ContentTagsAssigned::class;
        $seoTagModel = $locale === 'hi' ? SeoTagHindi::class : SeoTag::class;
        // Get current article
        $currentArticle = $newsModel::where('news_id', $currentId)->first();
        if (!$currentArticle) {
            return response()->json(['error' => 'Current article not found'], 404);
        }

        // Calculate effective date for current article (in PHP)
        if (is_null($currentArticle->published_date)) {
            $currentEffectiveDate = $currentArticle->created_at;
        } elseif ($currentArticle->published_date < $currentArticle->created_at) {
            $currentEffectiveDate = $currentArticle->created_at;
        } elseif ($currentArticle->published_date == $currentArticle->created_at) {
            $currentEffectiveDate = $currentArticle->created_at;
        } elseif ($currentArticle->published_date > $currentArticle->created_at) {
            $currentEffectiveDate = $currentArticle->published_date;
        } else {
            $currentEffectiveDate = $currentArticle->created_at;
        }

        // CASE expression for effective date (same as trait)
        $caseExpr = "CASE 
        WHEN published_date IS NULL THEN created_at
        WHEN published_date < created_at THEN created_at
        WHEN published_date = created_at THEN created_at
        WHEN published_date > created_at THEN published_date
        ELSE created_at  END";

        // Build base query
        $baseQuery = $newsModel::with(['category', 'Subcategory', 'author'])
            ->where('cat_id', $categoryId)
            ->where('status', 1)
            ->whereNotIn('news_id', $loadedIds)
            ->whereNotIn('news_type', ['ri', 'ir']);

        $article = (clone $baseQuery)
            ->whereRaw("$caseExpr > ?", [$currentEffectiveDate])
            ->orderByRaw("$caseExpr desc")
            ->first();

        // Fallback: older articles (asc)
        if (!$article) {
            $article = (clone $baseQuery)
                ->whereRaw("$caseExpr < ?", [$currentEffectiveDate])
                ->orderByRaw("$caseExpr asc")
                ->first();
        }
        // Increment views for the selected article
        if ($article) {
            $newsModel::where('news_id', $article->news_id)->increment('views');
        }


        // dd($article);
        if (!$article) {
            return response()->json(['success' => false, 'message' => 'No article available']);
        }

        // Optional: SEO Tags (for future use or analytics)
        $associatedTags = $tagTable::where('content_id', $currentId)
            ->where('content_type', 2)
            ->pluck('tag_id');

        $assocTags = $seoTagModel::whereIn('tag_id', $associatedTags)
            ->select('tag_id', 'name')
            ->distinct()
            ->get();

        // ✅ Match franchises by article title using helper
        $franchiseData = FranchiseHelper::matchFranchisesByTitle($article->title);

        // ✅ Trending & Latest articles
        $trendingArticles = $newsModel::with(['category', 'Subcategory'])
            ->select('news_id', 'cat_id', 'subcat_id', 'title', 'slug', 'insight_type')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('cat_id', $categoryId)
            ->whereNot('news_id', $currentId)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByEffectiveDate('desc')
            ->take(5)
            ->get();

        $latestArticles = $newsModel::with(['category', 'Subcategory'])
            ->select('news_id', 'cat_id', 'subcat_id', 'title', 'slug', 'insight_type')
            ->withEffectiveDate()
            ->where('status', 1)
            ->whereNot('news_id', $currentId)
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByEffectiveDate('desc')
            ->take(5)
            ->get();

        // Prepare response data
        $html = view('insights.partials.nextArticle', [
            'nextArticle' => $article,
            'franchiseData' => $franchiseData,
            'assocTags' => $assocTags,
            'trendingArticles' => $trendingArticles,
            'latestArticles' => $latestArticles,
            'lang' => $lang,
            // add any other data your view needs
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'newUrl' => route('insights.view', [
                'insight_type' => strtolower($article->insight_type),
                'slug' => $article->slug,
                'id' => $article->news_id,
            ]),
            'nextUrl' => route('insights.nextArticle', [
                'lang' => $lang,
                'currentId' => $article->news_id,
                'categoryId' => $categoryId,
                'direction' => $direction,
            ]),
            'articleId' => $article->news_id,
            'meta' => [
                'title' => $article->title,
                'description' => $article->shortDesc,
                'keywords' => $article->shortDesc,
            ],
        ]);
    }
}
