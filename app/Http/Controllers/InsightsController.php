<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoTag;
use App\Models\InsightList;
use App\Models\InsightCategory;
use App\Models\InsightsHindiCategory;
use App\Models\InsightSubcategory;
use App\Models\InsightsHindiSubcategory;
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
use function PHPUnit\Framework\isNull;

class InsightsController extends Controller
{

    public function insightshome()
    {
        if (request()->segment(2) != 'hindi') {
            app()->setLocale('en');
            session()->put('locale', 'en');

            $homeArticle = InsightList::with('category')->where('status', 1)
                ->where('insight_type', 'News')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('news_id')
                ->take(1)->get();

            $homeArticle = CommonController::contentUrlSlug($homeArticle);

            if (empty($homeArticle)) {
                return redirect('/insights');
            }

            $topstories = InsightList::with('category')
                ->where('status', 1)
                ->where('insight_type', '=', 'News')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('news_id')
                ->whereNotIn('news_id', $homeArticle->pluck('news_id'))
                ->take(5)->get();

            $topstories     = CommonController::contentUrlSlug($topstories);


            $topcategories = SeoTag::orderByDesc('frequency')->take(10)->get();

            $trendArticles = InsightList::with('category')
                ->where('status', 1)
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('views')
                ->take(8)->get();
            $trendArticles      = CommonController::contentUrlSlug($trendArticles);

            $industry_focus = InsightList::with('category')
                ->where('insight_type', '=', 'Article')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')
                ->take(1)->get();

            $industry_focus      = CommonController::contentUrlSlug($industry_focus);

            $industry_data = InsightList::with('category')
                ->where('insight_type', '=', 'Article')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->whereNotIn('news_id', $industry_focus->pluck('news_id'))
                ->orderByDesc('created_at')
                ->take(6)->get();

            $industry_data      = CommonController::contentUrlSlug($industry_data);

            $interview = InsightList::with('category')
                ->where('insight_type', '=', 'Interview')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')
                ->take(8)->get();
            $interview      = CommonController::contentUrlSlug($interview);
        } else {
            app()->setLocale('hi');
            session()->put('locale', 'hi');

            $homeArticle = InsightListHindi::with('category')->where('status', 1)
                ->where('insight_type', 'News')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('news_id')
                ->take(1)->get();

            $homeArticle = CommonController::contentUrlSlug($homeArticle);

            if (empty($homeArticle)) {
                return redirect('/insights');
            }

            $topstories = InsightListHindi::with('category')
                ->where('status', 1)
                ->where('insight_type', '=', 'News')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('news_id')
                ->whereNotIn('news_id', $homeArticle->pluck('news_id'))
                ->take(5)->get();

            $topstories     = CommonController::contentUrlSlug($topstories);


            $topcategories = SeoTag::orderByDesc('frequency')->take(10)->get();

            $trendArticles = InsightListHindi::with('category')
                ->where('status', 1)
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('views')
                ->take(8)->get();
            $trendArticles      = CommonController::contentUrlSlug($trendArticles);

            $industry_focus = InsightListHindi::with('category')
                ->where('insight_type', '=', 'Article')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')
                ->take(1)->get();

            $industry_focus      = CommonController::contentUrlSlug($industry_focus);

            $industry_data = InsightListHindi::with('category')
                ->where('insight_type', '=', 'Article')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->whereNotIn('news_id', $industry_focus->pluck('news_id'))
                ->orderByDesc('created_at')
                ->take(6)->get();

            $industry_data      = CommonController::contentUrlSlug($industry_data);

            $interview = InsightListHindi::with('category')
                ->where('insight_type', '=', 'Interview')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')
                ->take(8)->get();
            $interview      = CommonController::contentUrlSlug($interview);
        }
        return view('insights.insight_home', compact('homeArticle', 'topstories', 'trendArticles', 'topcategories', 'industry_focus', 'industry_data', 'interview'));
    }

    public function getinsightstories()
    {
        if (request()->segment(2) == 'en') {
            $insightstories = InsightList::with('author')
                ->where('insight_type', 'News')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')->paginate(10);
            $insightstories = CommonController::contentUrlSlug($insightstories);
        } else {
            $insightstories = InsightListHindi::with('author')
                ->where('insight_type', 'News')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')->paginate(10);
            $insightstories = CommonController::contentUrlSlug($insightstories);
        }
        return view('insights.topstories', compact('insightstories'));
    }

    public function industryfocus()
    {
        if (request()->segment(2) == 'en') {
            $insArticles = InsightList::with('author')
                ->where('insight_type', '=', 'Article')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->where('status', 1)
                ->orderByDesc('created_at')
                ->paginate(10);
            // dd($insArticles);
            $insArticles      = CommonController::contentUrlSlug($insArticles);
        } else {
            $insArticles = InsightListHindi::with('author')
                ->where('insight_type', '=', 'Article')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->where('status', 1)
                ->orderByDesc('created_at')
                ->paginate(10);
            // dd($insArticles);
            $insArticles      = CommonController::contentUrlSlug($insArticles);
        }
        if ($insArticles->isEmpty()) {
            return redirect('/insights');
        } else {
            return view('insights.articles', compact('insArticles'));
        }
    }

    public function getinsightsinterviews()
    {
        if (request()->segment(2) == 'en') {
            $interviews  = InsightList::with('author')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('insight_type', 'Interview')
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->where('status', 1)
                ->orderByDesc('created_at')
                ->paginate(10);
            $interviews = CommonController::contentUrlSlug($interviews);
        } else {
            $interviews  = InsightListHindi::with('author')
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->where('insight_type', 'Interview')
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->where('status', 1)
                ->orderByDesc('created_at')
                ->paginate(10);
        }
        if ($interviews->isEmpty()) {
            return redirect('/insights');
        } else {
            return view('insights.interviewslist', compact('interviews'));
        }
    }

    public function geteventsreports()
    {
        if (request()->segment(2) == 'en') {
            $events_reports = InsightList::with('author')
                ->where('status', 1)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->where('insight_type', 'Event')
                ->orWhere('insight_type', 'Report')
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('news_id')
                ->paginate(10);
            $events_reports = CommonController::contentUrlSlug($events_reports);
        } else {
            $events_reports = InsightListHindi::with('author')
                ->where('status', 1)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->where('insight_type', 'Event')
                ->orWhere('insight_type', 'Report')
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('news_id')
                ->paginate(10);
            $events_reports = CommonController::contentUrlSlug($events_reports);
        }
        if ($events_reports->isEmpty()) {
            return redirect('/insights');
        } else {
            return view('insights.events_reports', compact('events_reports'));
        }
    }


    public function authordata(Request $request)
    {

        $author_id =  explode('-', $request->slug);
        $id = end($author_id);
        if (!is_int($id)) {
            $id = (int)$id;
            if ($id == 0) return redirect('/insight');
        }
        if ($request->segment(2) == 'en') {
            $author = AuthorList::find($id);
            $articleCount = InsightList::where('author_id', $id)
                ->whereNotIn('news_type', ['ri', 'ir'])->count();
            $article = InsightList::where('author_id', $id)
                ->where('status', 1)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')
                ->paginate(6);
            $article = CommonController::contentUrlSlug($article);
        } else {
            $author = AuthorList::find($id);
            $articleCount = InsightListHindi::where('author_id', $id)
                ->whereNotIn('news_type', ['ri', 'ir'])->count();
            $article = InsightListHindi::where('author_id', $id)
                ->where('status', 1)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')
                ->paginate(6);
            $article = CommonController::contentUrlSlug($article);
        }
        return view('insights.author', compact('author', 'article', 'articleCount'));
    }

    public function insightscategorydata(Request $request)
    {
        $slug = strtolower(str_replace(' ', '-', $request->slug));
        $isEnglish = $request->segment(2) == 'en';

        // Determine the appropriate models based on the language
        $categoryModel = $isEnglish ? InsightCategory::class : InsightsHindiCategory::class;
        $insightListModel = $isEnglish ? InsightList::class : InsightListHindi::class;

        // Fetch the category
        $category = $categoryModel::query()
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$category) {
            return redirect('/insights');
        }

        // Fetch the insights for the category
        $insightcategories = $insightListModel::with('author')
            ->where('cat_id', $category->id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->orderByDesc('news_id')
            ->paginate(10);

        // Apply content URL slug transformation
        $insightcategories = CommonController::contentUrlSlug($insightcategories);

        // Check if insights are available
        if ($insightcategories->isEmpty()) {
            return redirect('/insights');
        }

        // Return the view with compacted data
        return view('insights.categorylist', compact('insightcategories', 'category'));
    }


    public function trendstories()
    {

        $trendstories = InsightList::with('author')
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->paginate(6);

        $trendstories = CommonController::contentUrlSlug($trendstories);
        if ($trendstories->isEmpty()) {
            return redirect('/insights');
        } else {
            return view('insights.trendstories', compact('trendstories'));
        }
    }

    // public function getInsightsDetails(Request $request)
    // {
    //     $id = $request->id;
    //     // dd($id);
    //     $cacheDuration = 3600;

    //     // Cache key for news details
    //     $newsCacheKey = "news_details_{$id}";
    //     if ($request->segment(2) == 'en') {
    //         $newsDetails = InsightList::with(['author', 'category', 'Subcategory'])
    //                 ->where('status', 1)
    //                 ->whereNotIn('news_type', ['ri', 'ir'])
    //                 ->where('news_id', $id)
    //                 ->first();
    //         // dd($newsDetails->author[0]->title);
    //     } else {
    //         $newsDetails = InsightListHindi::with(['author', 'category', 'Subcategory'])
    //                 ->where('status', 1)
    //                 ->whereNotIn('news_type', ['ri', 'ir'])
    //                 ->where('news_id', $id)
    //                 ->first();
    //     }
    //     if (!$newsDetails) {
    //         return redirect('insights/pagenotfound');
    //     }

    //     // Retrieve author details if available, or fallback to default author
    //     $author_details = null;
    //     if (!empty($newsDetails->author[0]->author_id)) {
    //         $authorCacheKey = "author_details_{$newsDetails->author[0]->author_id}";
    //         $author_details = AuthorList::query()
    //                 ->where('author_id', $newsDetails->author[0]->author_id)
    //                 ->first(); // Use `first()` instead of `get()` for a single record
    //         }
    //         // dd($author_details);

    //     // Fallback to default author if no author details
    //     if (!$author_details) {
    //         $defaultAuthorCacheKey = "default_author_437";
    //         $author_details = AuthorList::query()
    //                 ->where('author_id', 437) // Default author_id for "franchiseindia bureau"
    //                 ->first();
    //     }
    //     //dd($author_details);


    //     // Retrieve associated tags
    //     $tagsCacheKey = "associated_tags_{$id}";
    //     if ($request->segment(2) == 'en') {
    //         $associatedTags = ContentTagsAssigned::query()
    //                 ->where('content_id', $id)
    //                 ->where('content_type', 2)
    //                 ->pluck('tag_id'); // Use `pluck` to directly get `tag_id` values
    //     } else {
    //         $associatedTags =  ContentTagsAssignedHindi::query()
    //                 ->where('content_id', $id)
    //                 ->where('content_type', 2)
    //                 ->pluck('tag_id'); // Use `pluck` to directly get `tag_id` values
    //     }

    //     // Fetch SEO tags
    //     if ($request->segment(2) == 'en') {
    //         $assocTags =  SeoTag::query()
    //                 ->whereIn('tag_id', $associatedTags)
    //                 ->select('tag_id', 'name')
    //                 ->distinct()
    //                 ->get();
    //     } else {
    //         $assocTags =  SeoTagHindi::query()
    //                 ->whereIn('tag_id', $associatedTags)
    //                 ->select('tag_id', 'name')
    //                 ->distinct()
    //                 ->get();
    //     }

    //     // Find brand matches
    //     $title = strtolower($newsDetails->title);
    //     $brandMatchesCacheKey = "brand_matches_" . md5($title);

    //     $titleWords = preg_split('/\s+/', $title); // Split title into words
    //     $brandMatches = FranchisorBusinessDetail::where('profile_status', 1)
    //             ->select('fran_detail_id', 'company_name', 'profile_name')
    //             ->get()
    //             ->filter(function ($item) use ($titleWords) {
    //                 $companyWords = array_map('strtolower', explode(' ', $item->company_name));
    //                 $pattern = '/\b' . implode('\b.*?\b', array_map(function ($word) {
    //                     return preg_quote($word, '/');
    //                 }, $companyWords)) . '\b/';
    //                 return preg_match($pattern, implode(' ', $titleWords));
    //             })
    //             ->take(10)
    //             ->map(function ($item) {
    //                 return [
    //                     'fran_detail_id' => $item->fran_detail_id,
    //                     'company_name' => $item->company_name,
    //                     'profile_name' => $item->profile_name,
    //                 ];
    //             })
    //             ->values(); // Reset array keys

    //     // Prepare franchise data
    //     $franchiseData = $brandMatches->map(function ($match) use ($title) {
    //         return [
    //             'fran_detail_id' => $match['fran_detail_id'],
    //             'company_name' => $match['company_name'],
    //             'profile_name' => $match['profile_name'],
    //             'title' => $title,
    //         ];
    //     })->toArray();

    //     // Return view with compacted variables
    //     return view('insights.insight_detail', compact('newsDetails', 'author_details', 'franchiseData', 'assocTags'));
    // }

    public function getInsightsDetails(Request $request)
    {
        $id = $request->id;
        $languageSegment = $request->segment(2);

        // Determine the model and tag tables based on the language segment
        $isEnglish = $languageSegment == 'en';
        $newsModel = $isEnglish ? InsightList::class : InsightListHindi::class;
        $tagTable = $isEnglish ? ContentTagsAssigned::class : ContentTagsAssignedHindi::class;
        $seoTagModel = $isEnglish ? SeoTag::class : SeoTagHindi::class;

        // Fetch news details
        $newsDetails = $newsModel::with(['author', 'category', 'Subcategory'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('news_id', $id)
            ->first();
    // dd($newsDetails);
        if (!$newsDetails) {
            return redirect('insights/pagenotfound');
        }
        // dd($newsDetails->author);
        // Fetch author details
        if (empty($newsDetails->author)) {
            $defaultauthor = 466;
        } else {
            $defaultauthor = $newsDetails->author[0]->author_id;
        }
        $authorId = $defaultauthor; // Default author_id
        $author_details = AuthorList::query()
            ->where('author_id', $authorId)
            ->first();

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

        // Return view with compacted variables
        return view('insights.insight_detail', compact('newsDetails', 'author_details', 'franchiseData', 'assocTags'));
    }



    public function insightSearch(Request $request)
    {
        $search = $request->search;
        $isEnglish = $request->segment(2) == 'en';

        // Determine the appropriate model
        $insightModel = $isEnglish ? InsightList::class : InsightListHindi::class;

        // Build the base query
        $query = $insightModel::with('author')
            ->where('status', 1)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
                //->orWhere('kicker', 'LIKE', '%' . $search . '%');
            })
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id');

        // Count matching articles
        $articleCount = $query->count();

        // Redirect if no articles are found
        if ($articleCount < 1) {
            return redirect('/insights');
        }

        // Fetch paginated articles
        $articlesList = $query->orderByDesc('created_at')->paginate(10);

        // Process articles for URL slug
        $articlesList = CommonController::contentUrlSlug($articlesList);

        // Return the view
        return view('insights.search', compact('articleCount', 'articlesList', 'search'));
    }

    //     public function insightSearch(Request $request)
    // {
    //     $search = $request->search;
    //     $isEnglish = $request->segment(2) == 'en';

    //     // Determine the appropriate models
    //     $insightModel = $isEnglish ? InsightList::class : InsightListHindi::class;
    //     $categoryModel = $isEnglish ? InsightCategory::class : InsightCategoryHindi::class;

    //     // Fetch category IDs matching the search term
    //     $categoryIds = $categoryModel::query()
    //         ->where('title', 'LIKE', '%' . $search . '%')
    //         ->orWhere('slug', 'LIKE', '%' . $search . '%')
    //         ->pluck('id');

    //     // Build the base query
    //     $query = $insightModel::with('author')
    //         ->where('status', 1)
    //         ->where(function ($query) use ($search, $categoryIds) {
    //             $query->where('title', 'LIKE', '%' . $search . '%')
    //                 ->orWhereIn('cat_id', $categoryIds); // Match by category IDs
    //         })
    //         ->whereNotIn('news_type', ['ir', 'ri'])
    //         ->whereNotNull('image')
    //         ->whereNotNull('cat_id');

    //     // Count matching articles
    //     $articleCount = $query->count();

    //     // Redirect if no articles are found
    //     if ($articleCount < 1) {
    //         return redirect('/insights');
    //     }

    //     // Fetch paginated articles
    //     $articlesList = $query->orderByDesc('created_at')->paginate(10);

    //     // Process articles for URL slug
    //     $articlesList = CommonController::contentUrlSlug($articlesList);

    //     // Return the view
    //     return view('insights.search', compact('articleCount', 'articlesList', 'search'));
    // }




    public function insightstags(Request $request)
    {
        $tag = $request->tagslug;
        $tagstr = str_replace('-', ' ', $tag);

        // Determine the language and set table/model dynamically
        $isEnglish = $request->segment(2) == 'en';
        $redirectPath = $isEnglish ? '/insights' : '/insights/hindi';
        $insightModel = $isEnglish ? InsightList::class : InsightListHindi::class;

        // Fetch the tag data
        $seoTag = SeoTag::query()->where('name', $tagstr)->first();
        if (is_null($seoTag)) {
            return redirect($redirectPath);
        }

        // Fetch the associated content IDs
        $articleIds = ContentTagsAssigned::where([
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
            ->paginate(10);

        // Apply URL slugs
        $articlesList = CommonController::contentUrlSlug($articlesList);

        // Check for results and return the view or redirect
        if ($articlesList->count() > 0) {
            return view('insights.insightstags', compact('articlesList', 'seoTag'));
        }

        return redirect($redirectPath);
    }



    // STATIC FUNCTIONS START HERE

    public function getNextArticle($contentIdParam)
    {
        $nextArticle = InsightList::query()->where('status', 1)->where('news_id', '>', $contentIdParam);
        $nextArticle = $nextArticle->where('status', 1)
            ->orderBy('news_id', 'asc')
            ->take(1)->get();

        if (count($nextArticle) == 0) {
            $nextArticle = InsightList::query()->where('news_id', '<', $contentIdParam);
            $nextArticle = $nextArticle->where('status', 1)
                ->orderBy('news_id', 'desc')
                ->take(1)->get();
        }
        if (empty($nextArticle))
            return [];
        return CommonController::contentUrlSlug($nextArticle);
    }
    public static function calculateReadTime($obj)
    {

        /*Calculating length of total words*/
        $totaltext = $obj->title . ' ' . $obj->content;

        if (App::getLocale() == 'en') {
            $articlelen = str_word_count($totaltext);
        } else {
            $articlelen = count(explode(' ', $totaltext));
        }
        return round($articlelen / 200);
    }

    public static function insightCategory($locale)
    {
        $model = $locale === 'en' ? InsightCategory::class : InsightsHindiCategory::class;

        // Use select to limit retrieved columns (optional)
        $categories = $model::select('id', 'catname', 'slug')->get()->toArray();

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


    // public function insightsubcategory(Request $request)
    // {
    //     // Redirect if category or subcategory is 'kicker'
    //     if (in_array($request->category, ['kicker']) || in_array($request->subcategory, ['kicker'])) {
    //         return redirect('/insights');
    //     }

    //     $categorySlug = $request->category;
    //     $subcategorySlug = $request->subcategory;
    //     $isEnglish = App::getLocale() == 'en';

    //     // Determine models based on the language
    //     $insightListModel = $isEnglish ? InsightList::class : InsightListHindi::class;
    //     $insightSubCatModel = $isEnglish ? InsightSubcategory::class : InsightsHindiSubcategory::class;
    //     $insightCatModel = $isEnglish ? InsightCategory::class : InsightsHindiCategory::class;

    //     // Fetch subcategory and category data
    //     $subcatData = $insightSubCatModel::query()->where('slug', $subcategorySlug)->first();
    //     dd($subcatData);
    //     $catData = $insightCatModel::query()
    //         ->where('slug', $categorySlug)
    //         ->where('id', $subcatData->mcat_id)
    //         ->first();

    //     if (!$subcatData || !$catData) {
    //         return redirect('/insights');
    //     }

    //     // Fetch content data
    //     $contentData = $insightListModel::with(['author', 'category', 'subcategory'])
    //         ->where('subcat_id', $subcatData->id)
    //         ->whereNotIn('news_type', ['ri', 'ir'])
    //         ->where('status', 1)
    //         ->whereNotNull('image')
    //         ->whereNotNull('cat_id')
    //         ->whereNotNull('subcat_id')
    //         ->paginate(10);

    //     // Return the view
    //     return view('insights.subcatdata', compact('contentData', 'subcatData'));
    // }

    public function insightsubcategory(Request $request)
    {
        // Redirect if category or subcategory is 'kicker'
        if (in_array($request->category, ['kicker']) || in_array($request->subcategory, ['kicker'])) {
            return redirect('/insights');
        }

        $categorySlug = $request->category;
        $subcategorySlug = $request->subcategory;
        $isEnglish = App::getLocale() == 'en';  // Check if the language is English

        // Determine models based on the language (English or Hindi)
        $insightListModel = $isEnglish ? InsightList::class : InsightListHindi::class;
        $insightSubCatModel = $isEnglish ? InsightSubcategory::class : InsightsHindiSubcategory::class;
        $insightCatModel = $isEnglish ? InsightCategory::class : InsightsHindiCategory::class;

        // Fetch subcategory and category data
        $subcatData = $insightSubCatModel::query()->where('slug', $subcategorySlug)->first();
        if (!$subcatData) {
            return redirect('/insights');  // Redirect if subcategory not found
        }

        $catData = $insightCatModel::query()
            ->where('slug', $categorySlug)
            ->where('id', $subcatData->mcat_id) // Ensure correct category based on subcategory
            ->first();

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

        // Return the view with the appropriate language data
        return view('insights.subcatdata', compact('contentData', 'subcatData', 'catData'));
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
        if ($image) {
            $iscont = strstr($image, "/");
            $isHttps = strstr($image, 'https');
            if ($isHttps) {
                $url =  trim($image, '/');
            } else {

                if ($iscont) {
                    $url = env('S3_BUCKET_URL2', '') . trim($image, '/');
                } else {
                    if (App::getLocale() != 'en') {

                        $url = env('S3_BUCKET_URL2', '') . Config('constants.ARTICLE_HINDI_UPLOAD_PATH') . trim($image);
                    } else {

                        $url = env('S3_BUCKET_URL2', '') . Config('constants.ARTICLE_UPLOAD_PATH') . trim($image);
                        //$url = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/' . Config('constants.ARTICLE_UPLOAD_PATH') . trim($image);
                    }
                }
            }
        } else {
            $url = url('/img/602a695853d99.jpeg');
        }


        return $url;
    }

    public static function authorImageurl($image)
    {
        // dd($image);
        if ($image) {
            $iscont = strstr($image, "/");
            if ($iscont) {
                $url = env('S3_BUCKET_URL2', '') . trim($image, '/');
            } else {
                $info = @getimagesize('https://franchiseindia.s3.ap-south-1.amazonaws.com/opp/authors/images/' . $image);
                if ($info === false) {
                    $url = url('images/defaultuser.png');
                } else {
                    $url = env('S3_BUCKET_URL2', '') . 'opp/authors/images/' . trim($image);
                }
            }
        } else {
            $url = url('images/defaultuser.png');
        }

        return $url;
    }
}
