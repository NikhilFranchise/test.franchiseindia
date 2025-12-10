<?php

namespace App\Http\Controllers\Crre;

use App\Helpers\FranchiseHelper;
use App\Http\Controllers\Controller;
use App\Mail\NewsLetterSubscribe;
use App\Models\Crre\CrreAuthors;
use App\Models\FiNewsLetter;
use App\Models\Crre\CrreContentList;
use App\Models\Crre\CrreHindiContentList;
use App\Models\Crre\CrreCategory;
use App\Models\Crre\CrreContentAssignedTags;
use App\Models\Crre\CrreContentAssignedTagsHindi;
use App\Models\Crre\CrreHindiCategory;
use App\Models\Crre\CrreHindiSubCategory;
use App\Models\Crre\CrreSeotags;
use App\Models\Crre\CrreSeotagshindi;
use App\Models\Crre\CrreSubCategory;
use App\Models\InstaSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CrreController extends Controller
{
    public function homepage($locale = null)
    {
        // -------------------- Locale Handling --------------------
        $locale = $locale === 'hindi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        $model = $locale === 'hi' ? CrreHindiContentList::class : CrreContentList::class;

        // Common select list
        $baseSelect = [
            'news_id',
            'insight_type',
            'news_type',
            'cat_id',
            'title',
            'shortDesc',
            'slug',
            'image'
        ];

        // Common base query builder
        $baseQuery = fn() => $model::query()
            ->with('category')
            ->select($baseSelect)
            ->withEffectiveDate()
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->orderByEffectiveDate('desc');

        // -------------------- Home Article --------------------
        $latestStory = $baseQuery()
            ->where('insight_type', 'News')
            ->take(1)
            ->get();

        // if ($latestStory->isEmpty()) {
        //     return redirect($locale === 'hi' ? '/crre/hindi' : '/crre');
        // }

        // -------------------- Top Stories (skip first news) --------------------
        $topstories = $baseQuery()
            ->where('insight_type', 'News')
            ->skip(1)
            ->take(5)
            ->get();

        // -------------------- Industry Focus (Article) --------------------
        $latestArticle = $baseQuery()
            ->where('insight_type', 'Article')
            ->take(1)
            ->get();

        // Ensure no fatal error if empty
        $articleId = $latestArticle->first()->news_id ?? null;

        // -------------------- Industry Data (Remaining Articles) --------------------
        $topArticles = $baseQuery()
            ->where('insight_type', 'Article')
            ->when($articleId, fn($q) => $q->where('news_id', '!=', $articleId))
            ->take(6)
            ->get();

        // -------------------- Reports --------------------
        $topreports = $baseQuery()
            ->where('insight_type', 'Report')
            ->whereNotNull(['image', 'cat_id'])
            ->take(8)
            ->get();

        // -------------------- Interviews --------------------
        $topinterviews = $baseQuery()
            ->where('insight_type', 'Interview')
            ->take(8)
            ->get();

        // -------------------- Top Categories --------------------
        $topcategories = CrreSeotags::query()
            ->select('tag_id', 'name')
            ->orderByDesc('frequency')
            ->take(10)
            ->get();

        // -------------------- Authors with Article Counts --------------------
        // Optimized: two subqueries instead of N queries inside a loop
        $authors = CrreAuthors::query()
            ->select('author_id', 'title', 'slug', 'image', 'designation')
            ->where('status', 'A')
            ->get();

        $authorDetails = $authors->map(function ($author) {
            $author->count = CrreContentList::where('author_id', $author->author_id)
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->count()
                +
                CrreHindiContentList::where('author_id', $author->author_id)
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->count();

            return $author;
        });

        // -------------------- Trending Articles --------------------
        $trendArticles = $model::query()
            ->with('category')
            ->select([...$baseSelect, 'views'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->orderByDesc('views')
            ->take(8)
            ->get();

        return view('crre.homepage', compact(
            'latestStory',
            'topstories',
            'latestArticle',
            'topArticles',
            'topreports',
            'topinterviews',
            'topcategories',
            'authorDetails',
            'trendArticles'
        ));
    }

    public function topStories()
    {
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        $model = $locale == 'hi' ? CrreHindiContentList::class : CrreContentList::class;

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

        $popArticles = getPopularArticles([], 6);

        return view('crre.topstories', compact('insightstories', 'popArticles', 'locale'));
    }

    public function topArticles($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? CrreHindiContentList::class : CrreContentList::class;

        // Fetch the insights articles
        $insArticles = $model::with('author')
            ->select('news_id', 'insight_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image', 'author_id', 'created_at', 'content', 'published_date')
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id'])
            ->where('status', 1)
            ->orderByEffectiveDate('desc')
            ->paginate(15);

        // Handle empty results
        if ($insArticles->isEmpty()) {
            return redirect($locale === 'hi' ? '/crre/hindi' : '/crre');
        }
        // Get the IDs of articles already shown
        $insArticleIds = $insArticles->pluck('news_id');

        $popArticles = getPopularArticles([$insArticleIds], 6);

        // Return the view with the articles
        return view('crre.articles', compact('insArticles', 'popArticles', 'locale'));
    }

    public function topInterviews($locale)
    {

        app()->setLocale($locale);
        session()->put('locale', $locale);
        $model = $locale == 'hi' ? CrreHindiContentList::class : CrreContentList::class;
        $interviews  = $model::with('author')
            ->select('news_id', 'insight_type', 'cat_id', 'title', 'shortDesc', 'slug', 'image', 'author_id', 'created_at', 'content', 'published_date')
            ->withEffectiveDate()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('insight_type', 'Interview')
            ->whereNotNull(['image', 'cat_id'])
            ->where('status', 1)
            ->orderByEffectiveDate('desc')
            ->paginate(15);

        if ($interviews->isEmpty()) {
            return redirect($locale === 'hi' ? '/crre/hindi' : '/crre');
        }

        $popArticles = getPopularArticles([], 6);

        return view('crre.interviewslist', compact('interviews', 'popArticles', 'locale'));
    }

    public function topEventsReports($locale)
    {

        app()->setLocale($locale);
        session()->put('locale', $locale);
        // Choose the appropriate model based on the locale
        $model = $locale == 'hi' ? CrreHindiContentList::class : CrreContentList::class;
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
            return redirect($locale === 'hi' ? '/crre/hindi' : '/crre');
        }

        $popArticles = getPopularArticles([], 6);

        return view('crre.events_reports', compact('events_reports', 'popArticles', 'locale'));
    }

    public function topCategories(Request $request, $locale, $category)
    {
        // dd($lang);
        $slug = strtolower(str_replace(' ', '-', $request->category));
        app()->setLocale($locale);
        session()->put('locale', $locale);
        // Choose the appropriate model based on the locale

        // Determine the appropriate models based on the language
        $categoryModel = $locale == 'hi' ? CrreHindiCategory::class : CrreCategory::class;
        $subcategoryModel = $locale == 'hi' ? CrreHindiSubCategory::class : CrreSubCategory::class;
        $CrreContentListModel = $locale == 'hi' ? CrreHindiContentList::class : CrreContentList::class;

        // Fetch the category
        $category = $categoryModel::query()
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$category) {
            return redirect($locale === 'hi' ? route('crre.homepage', ['lang' => 'hi']) : route('crre.homepage'));
        }
        // Fetch the insights for the category
        $query = $CrreContentListModel::with(['author'])
            ->select('news_id', 'title', 'cat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('cat_id', $category->id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByEffectiveDate('desc');
        $articleIds = $query->pluck('news_id');
        $insightcategories = $query->paginate(15);
        $popularArticles = getPopularArticles([$articleIds], 6);


        // Subcategories under the main category
        $subcat = $subcategoryModel::query()
            ->select('id', 'subcat_name', 'slug')
            ->where('mcat_id', $category->id)
            ->get();

        $subcatids = $subcat->pluck('id');

        // Get insight articles under those subcategories
        $subcatData = $CrreContentListModel::query()
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
            return redirect($locale === 'hi' ? '/crre/hindi' : '/crre');
        }

        // Return the view with compacted data
        return view('crre.categorylist', compact('insightcategories', 'category', 'popularArticles', 'subcat', 'locale'));
    }

    public function topSubCategory(Request $request, $locale, $category, $subcategory)
    {
        $categorySlug = $category;
        $subcategorySlug = $subcategory;
        $redirectPath = $locale == 'en' ? '/crre' : '/crre/hindi';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        // Determine models based on the language (English or Hindi)
        $CrreContentListModel = $locale ? CrreContentList::class : CrreHindiContentList::class;
        $insightSubCatModel = $locale ? CrreSubCategory::class : CrreHindiSubCategory::class;
        $insightCatModel = $locale ? CrreCategory::class : CrreHindiCategory::class;

        // Fetch subcategory and category data
        $subcatData = $insightSubCatModel::query()->where('slug', $subcategorySlug)->first();
        if (!$subcatData) {
            return redirect('/crre');  // Redirect if subcategory not found
        }
        // dd($subcatData);
        $catData = $insightCatModel::query()
            ->where('slug', $categorySlug)
            ->where('id', $subcatData->mcat_id) // Ensure correct category based on subcategory
            ->first();
        // dd($catData);
        if (!$catData) {
            return redirect('/crre');
        }

        // Fetch content data for the selected subcategory
        $query = $CrreContentListModel::with(['author', 'category', 'subcategory'])
            ->select('news_id', 'title', 'cat_id', 'subcat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('subcat_id', $subcatData->id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('status', 1)
            ->whereNotNull(['image', 'cat_id', 'subcat_id'])
            ->orderByEffectiveDate('desc');
        $articleIds = $query->pluck('news_id');
        $subcategoryData = $query->paginate(15);

        $popArticles = getPopularArticles([$articleIds], 6);

        return view('crre.subcatdata', compact('subcategoryData', 'subcatData', 'catData', 'popArticles', 'locale'));
    }

    public function detailpage(Request $request, $locale, $type, $slug, $id)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $newsModel = $locale == 'hi' ? CrreHindiContentList::class : CrreContentList::class;
        $tagTable = $locale == 'hi' ? CrreContentAssignedTagsHindi::class : CrreContentAssignedTags::class;
        $CrreSeotagsModel = $locale == 'hi' ? CrreSeotagshindi::class : CrreSeotags::class;
        // Fetch news details
        $newsDetails = $newsModel::with(['author', 'category', 'Subcategory'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('news_id', $id)
            ->first();
        if (!$newsDetails) {
            return redirect('crre/pagenotfound');
        }

        $correctSlug = $newsDetails->slug;
        $type = strtolower($newsDetails->insight_type);
        if ($request->slug !== $correctSlug) {
            return redirect()->to(route('crre.detailpage'), 301);
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
                    return redirect('crre/pagenotfound')->with('error', 'You must be an admin to view this article.');
                }
                break;
            case 0:
                // Status 0: Block access
                return redirect('crre/pagenotfound');
        }
        // Fetch author details
        $authorId = empty($newsDetails->author[0]) ? 466 : $newsDetails->author_id;
        $author_details = CrreAuthors::query()->find($authorId);

        // Fetch associated tags
        $associatedTags = $tagTable::query()
            ->where('content_id', $id)
            ->where('content_type', 2)
            ->pluck('tag_id');
        // dd($tagTable);
        $assocTags = $CrreSeotagsModel::query()
            ->whereIn('tag_id', $associatedTags)
            ->select('tag_id', 'name')
            ->distinct()
            ->get();

        $franchiseData = FranchiseHelper::matchFranchisesByTitle($newsDetails->title);

        $trendingArticles = getPopularArticles([$id], 5, $newsDetails->cat_id);
        $latestArticles = getPopularArticles([$id], 5);
        return view('crre.detail', compact('newsDetails', 'author_details', 'franchiseData', 'assocTags', 'trendingArticles', 'latestArticles', 'locale'));
    }

    public function nextArticle(Request $request, $locale)
    {
        $currentId = $request->get('currentId');
        $categoryId = $request->get('categoryId');
        $loadedIds = $request->get('loadedIds', []);
        $direction = $request->get('direction', 'down'); // 'down' or 'up'
        app()->setLocale($locale);
        session()->put('locale', $locale);
        if (!$currentId || !$categoryId) {
            return response()->json(['error' => 'Invalid parameters'], 400);
        }

        // Determine models based on locale
        $newsModel = $locale === 'hi' ? CrreHindiContentList::class : CrreContentList::class;
        $tagTable = $locale === 'hi' ? CrreContentAssignedTagsHindi::class : CrreContentAssignedTags::class;
        $CrreSeotagsModel = $locale === 'hi' ? CrreSeotagshindi::class : CrreSeotags::class;
        // Get current article
        $currentArticle = $newsModel::where('news_id', $currentId)->first();
        if (!$currentArticle) {
            return response()->json(['error' => 'Current article not found'], 404);
        }
        $currentEffectiveDate = $currentArticle->published_date
            ? max($currentArticle->published_date, $currentArticle->created_at)
            : $currentArticle->created_at;

        // CASE expression for effective date (same as trait)
        $caseExpr = "CASE 
        WHEN published_date IS NULL THEN created_at
        WHEN published_date < created_at THEN created_at
        WHEN published_date >= created_at THEN published_date
        ELSE created_at  END";

        // Build base query
        $baseQuery = $newsModel::with(['category', 'Subcategory', 'author'])
            ->where('cat_id', $categoryId)
            ->where('status', 1)
            ->whereNotIn('news_id', $loadedIds)
            ->whereNotIn('news_type', ['ri', 'ir']);

        $article = (clone $baseQuery)
            ->whereRaw("$caseExpr > ?", [$currentEffectiveDate])
            ->orderByRaw("$caseExpr DESC")
            ->first();

        // Fallback: older articles (asc)
        if (!$article) {
            $article = (clone $baseQuery)
                ->whereRaw("$caseExpr < ?", [$currentEffectiveDate])
                ->orderByRaw("$caseExpr ASC")
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

        $assocTags = $CrreSeotagsModel::whereIn('tag_id', $associatedTags)
            ->select('tag_id', 'name')
            ->distinct()
            ->get();
        $trendingArticles = getPopularArticles([$currentId], 5, $categoryId);
        $latestArticles = getPopularArticles([$currentId], 5);


        $franchiseData = FranchiseHelper::matchFranchisesByTitle($article->title);

        // Prepare response data
        $html = view('crre.partials.nextArticle', [
            'nextArticle' => $article,
            'franchiseData' => $franchiseData,
            'assocTags' => $assocTags,
            'trendingArticles' => $trendingArticles,
            'latestArticles' => $latestArticles,
            'locale' => $locale,
            // add any other data your view needs
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'newUrl' => route('crre.detailpage', [
                'locale' => $locale,
                'type' => strtolower($article->insight_type),
                'slug' => $article->slug,
                'id' => $article->news_id,

            ]),
            'nextUrl' => route('crre.nextArticle', [
                'locale' => $locale,
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


    public function SearchContent(Request $request, $locale)
    {
        // dd($request->all(), $locale);
        $search = $request->search;
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $insightModel = $locale == 'en' ? CrreContentList::class : CrreHindiContentList::class;
        // Build the base query
        $query = $insightModel::with('author')
            ->select('news_id', 'title', 'cat_id', 'slug', 'content', 'shortDesc', 'insight_type', 'views', 'author_id', 'image', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            })
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull(['image', 'cat_id']);
        // ->whereNotNull('cat_id');
        $articlesList = $query->orderByEffectiveDate('desc')->paginate(10)->appends(['search' => $search]);
        $articleIds = $query->pluck('news_id');

        $popArticles = getPopularArticles($articleIds, 6);

        // Return the view
        return view('crre.search', compact('articlesList', 'search', 'popArticles', 'locale'));
    }

    public function crreTags(Request $request, $locale)
    {
        $tag = str_replace('-', ' ', $request->tagslug);
        // dd($tag, $locale);
        $locale = $locale === 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $redirectPath = $locale === 'en' ? '/crre' : '/crre/hindi';
        $insightModel = $locale === 'en' ? CrreContentList::class : CrreHindiContentList::class;
        $tagModel = $locale === 'en' ? CrreSeotags::class : CrreSeotagsHindi::class;
        $contentModel = $locale === 'en' ? CrreContentAssignedTags::class : CrreContentAssignedTagsHindi::class;

        $CrreSeotags = $tagModel::where('name', $tag)->first();
        if (!$CrreSeotags) {
            return redirect($redirectPath);
        }

        $articleIds = $contentModel::where('tag_id', $CrreSeotags->tag_id)
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
            ->orderByEffectiveDate('desc')
            ->paginate(15);

        $popArticles = getPopularArticles($articleIds, 6);


        return $articlesList->isNotEmpty()
            ? view('crre.insightstags', compact('articlesList', 'CrreSeotags', 'popArticles', 'locale'))
            : redirect($redirectPath);
    }

    public function authorRecord(Request $request, $slug)
    {
        // Extract ID
        $id = (int) last(explode('-', $slug));
        if ($id === 0) return redirect('/crre');

        $author = CrreAuthors::find($id);
        if (!$author) return redirect('/crre');

        // Correct slug enforcement (SEO)
        $correctSlug = Str::slug($author->title) . '-' . $id;
        if ($slug !== $correctSlug) {
            return redirect()->to(url("/crre/author/{$correctSlug}"), 301);
        }

        // ------- QUERY CONDITIONS -------
        $baseColumns = [
            'news_id',
            'title',
            'slug',
            'cat_id',
            'insight_type',
            'shortDesc',
            'image',
            'created_at',
            'published_date',
            'views',
            DB::raw("'en' as locale"),
        ];

        $baseColumnsHindi = [
            'news_id',
            'title',
            'slug',
            'cat_id',
            'insight_type',
            'shortDesc',
            'image',
            'created_at',
            'published_date',
            'views',
            DB::raw("'hi' as locale"),
        ];

        // ------- UNIFIED Latest Articles Query (EN + HI) -------
        $latestQuery = CrreContentList::query()
            ->select($baseColumns)
            ->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull(['cat_id', 'image']);

        $latestHindiQuery = CrreHindiContentList::query()
            ->select($baseColumnsHindi)
            ->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull(['cat_id', 'image']);

        // Combine EN + HI using UNION (SUPER FAST)
        $latestArticles = $latestQuery
            ->unionAll($latestHindiQuery)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        // ------- UNIFIED Most Viewed --------
        $viewedQuery = CrreContentList::query()
            ->select($baseColumns)
            ->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir']);

        $viewedHindiQuery = CrreHindiContentList::query()
            ->select($baseColumnsHindi)
            ->where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir']);

        $mostViewedArticles = $viewedQuery
            ->unionAll($viewedHindiQuery)
            ->orderBy('views', 'desc')
            ->paginate(15);

        // ------- Article Count (SUPER OPTIMIZED) -------
        $articleCount =
            CrreContentList::where('author_id', $id)->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])->count()
            +
            CrreHindiContentList::where('author_id', $id)->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])->count();

        // ------- Popular Articles (GLOBAL SERVICE) -------
        $popularArticles = getPopularArticles([], 6);
        // dd($popularArticles);
        return view('crre.author', compact(
            'author',
            'latestArticles',
            'mostViewedArticles',
            'articleCount',
            'popularArticles'
        ));
    }

    public function authors(Request $request)
    {
        // Fetch author IDs and count articles per author from both tables in a single query
        $authorCountsEn = CrreContentList::query()
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('author_id')
            ->where('status', 1)
            ->groupBy('author_id')
            ->selectRaw('author_id, COUNT(*) as article_count')
            ->get()
            ->keyBy('author_id');

        $authorCountsHi = CrreHindiContentList::query()
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
        $authorDetails = CrreAuthors::query()
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
        $ContributoryAuthor = CrreAuthors::query()
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
        $guestAuthor = CrreAuthors::query()
            ->select('author_id', 'slug', 'title', 'image', 'designation')
            ->whereIn('title', ['Guest Author'])
            ->where('status', 'A')
            ->get()
            ->map(function ($author) use ($authorCounts) {
                $author->count = $authorCounts[$author->author_id]['total'] ?? 0;
                $author->lang = $authorCounts[$author->author_id]['lang'] ?? 'en';
                return $author;
            });

        return view('crre.author_archive', compact('authorDetails', 'authorCounts', 'ContributoryAuthor', 'guestAuthor'));
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

    public static function insightcategory($locale)
    {
        $model = $locale === 'en' ? CrreCategory::class : CrreHindiCategory::class;

        if ($locale == 'en') {
            $specificCategories = [];
        } else {
            $specificCategories = [];
        }

        $categories = $model::select('id', 'catname', 'slug')
            ->whereNotIn('catname', $specificCategories)
            ->get()
            ->toArray();

        return $categories;
    }
    public static function specificCategories($locale)
    {
        $model = $locale === 'en' ? CrreCategory::class : CrreHindiCategory::class;
        if ($locale == 'en') {
            $specificCategories = [];
        } else {
            $specificCategories = [];
        }
        $categories = $model::select('id', 'catname', 'slug')
            ->whereIn('catname', $specificCategories)
            ->get()
            ->toArray();

        return $categories;
    }
}
