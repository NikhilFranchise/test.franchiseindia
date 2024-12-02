<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoTag;
use App\Models\InsightList;
use App\Models\InsightCategory;
use App\Models\InsightSubcategory;
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
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $slug = $request->slug;
        $slugr = str_replace(' ', '-', $slug);
        $slugarr = strtolower($slugr);
        // dd($slugarr);

        if (request()->segment(2) == 'en') {
            $category = InsightCategory::query()
                ->where('slug', $slugarr)
                ->where('status', '1')
                ->first();
            // dd($category);
            if ($category) {
                $insightcategories = InsightList::with('author')
                    ->where('cat_id', $category->id)
                    ->where('status', 1)
                    ->whereNotIn('news_type', ['ri','ir'])
                    ->orderByDesc('news_id')
                    ->paginate(10);
                $insightcategories = CommonController::contentUrlSlug($insightcategories);
               // dd($insightcategories);
            }
        } else {
            $category = InsightCategory::query()
                ->where('slug', $slugarr)
                ->where('status', '1')
                ->first();

            if ($category) {
                $insightcategories = InsightListHindi::with('author')
                    ->where('cat_id', $category->id)
                    ->where('status', 1)
                    ->whereNotIn('news_type', ['ri','ir'])
                    ->orderByDesc('news_id')
                    ->paginate(10);
                $insightcategories = CommonController::contentUrlSlug($insightcategories);
            }
        }
        if ($insightcategories->count() > 0) {
            return view('insights.categorylist', compact('insightcategories', 'category'));
        } else {
            return redirect('/insights/hindi');
        }
    }

    public function trendstories()
    {

        $trendstories = InsightList::with('author')
            ->where('insight_type', 'News')
            ->whereNotIn('news_type', ['ri','ir'])
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
    //     $cacheDuration = 3600;

    //     // Cache key for the news details
    //     $newsCacheKey = "news_details_{$id}";

    //     // Retrieve or cache news details
    //     $newsDetails = Cache::remember($newsCacheKey, $cacheDuration, function () use ($id) {
    //         return InsightList::with(['author', 'category', 'Subcategory'])
    //             ->where('status', 1)
    //             ->whereNotIn('news_type', ['ri','ir'])
    //             ->where('news_id', $id)
    //             ->first();
    //     });
    //     // dd($newsDetails->author);

    //     if (empty($newsDetails)) {
    //         return redirect('insights/pagenotfound');
    //     }

    //     // Cache key for the author details
    //     $authorCacheKey = "author_details_{$newsDetails['author_id']}";
    //     if (!empty($newsDetails->author->author_id)) {
    //         $author_details = Cache::remember($authorCacheKey, $cacheDuration, function () use ($newsDetails) {
    //             return AuthorList::query()->where('author_id', $newsDetails->author->author_id)->get();
    //         });
    //     }

    //     // Cache key for associated tags
    //     $tagsCacheKey = "associated_tags_{$id}";

    //     $associatedTags = Cache::remember($tagsCacheKey, $cacheDuration, function () use ($id) {
    //         return ContentTagsAssigned::query()
    //             ->where('content_id', $id)
    //             ->select('tag_id')
    //             ->where('content_type', 2)
    //             ->get();
    //     });

    //     // Get associated SEO tags
    //     $assocTags = [];
    //     foreach ($associatedTags as $tags) {
    //         $tagCacheKey = "seo_tag_{$tags->tag_id}";

    //         $assocTag = Cache::remember($tagCacheKey, $cacheDuration, function () use ($tags) {
    //             return SeoTag::query()
    //                 ->where('tag_id', $tags->tag_id)
    //                 ->select('tag_id', 'name')
    //                 ->distinct()
    //                 ->first();
    //         });

    //         if ($assocTag) {
    //             $assocTags[] = $assocTag;
    //         }
    //     }

    //     $allBrandMatches = [];
    //     //    foreach ($newsDetails as $detail) {
    //     $title = strtolower($newsDetails->title);
    //     $titleWords = preg_split('/\s+/', $title); // Split title into words using spaces

    //     $brandMatches = Cache::remember("brand_matches_" . md5($title), $cacheDuration, function () use ($title, $titleWords) {
    //         // Fetch company details and filter based on exact matches in title words
    //         return FranchisorBusinessDetail::where('profile_status', 1)
    //             ->select('fran_detail_id', 'company_name', 'profile_name')
    //             ->get()
    //             ->filter(function ($item) use ($titleWords) {
    //                 // Split the company name into words and ensure each word is exactly in the title words
    //                 $companyWords = explode(' ', strtolower($item->company_name));
    //                 // Escape regex characters in company words
    //                 $escapedWords = array_map(function ($word) {
    //                     return preg_quote($word, '/');
    //                 }, $companyWords);
    //                 // Form a regex pattern to match words in sequence within the title
    //                 $pattern = '/\b' . implode('\b.*?\b', $escapedWords) . '\b/';
    //                 return preg_match($pattern, implode(' ', $titleWords));
    //             })
    //             ->take(10) // Limit the results after filtering
    //             ->map(function ($item) {
    //                 return [
    //                     'fran_detail_id' => $item->fran_detail_id,
    //                     'company_name' => $item->company_name,
    //                     'profile_name' => $item->profile_name,
    //                 ];
    //             });
    //     });

    //     $allBrandMatches[$title] = $brandMatches;
    //     // }

    //     $franchiseData = [];
    //     foreach ($allBrandMatches as $title => $matches) {
    //         foreach ($matches as $match) {
    //             $franchiseData[] = [
    //                 'fran_detail_id' => $match['fran_detail_id'],
    //                 'company_name' => $match['company_name'],
    //                 'profile_name' => $match['profile_name'],
    //                 'title' => $title

    //             ];
    //         }
    //     }
    //     // dd($newsDetails. $author_details,);

    //     return view('insights.insight_detail')->with(compact('newsDetails', 'author_details', 'franchiseData'));
    // }


    public function getInsightsDetails(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $cacheDuration = 3600;

        // Cache key for news details
        $newsCacheKey = "news_details_{$id}";
        if ($request->segment(2) == 'en') {
            $newsDetails = Cache::remember($newsCacheKey, $cacheDuration, function () use ($id) {
                return InsightList::with(['author', 'category', 'Subcategory'])
                    ->where('status', 1)
                    ->whereNotIn('news_type', ['ri','ir'])
                    ->where('news_id', $id)
                    ->first();
            });
        } else {
            $newsDetails = Cache::remember($newsCacheKey, $cacheDuration, function () use ($id) {
                return InsightListHindi::with(['author', 'category', 'Subcategory'])
                    ->where('status', 1)
                    ->whereNotIn('news_type', ['ri','ir'])
                    ->where('news_id', $id)
                    ->first();
            });
        }
        if (!$newsDetails) {
            return redirect('insights/pagenotfound');
        }

        // Retrieve author details if available, or fallback to default author
        $author_details = null;
        if (!empty($newsDetails->author->author_id)) {
            $authorCacheKey = "author_details_{$newsDetails->author->author_id}";
            $author_details = Cache::remember($authorCacheKey, $cacheDuration, function () use ($newsDetails) {
                return AuthorList::query()
                    ->where('author_id', $newsDetails->author->author_id)
                    ->first(); // Use `first()` instead of `get()` for a single record
            });
        }

        // Fallback to default author if no author details
        if (!$author_details) {
            $defaultAuthorCacheKey = "default_author_437";
            $author_details = Cache::remember($defaultAuthorCacheKey, $cacheDuration, function () {
                return AuthorList::query()
                    ->where('author_id', 437) // Default author_id for "franchiseindia bureau"
                    ->first();
            });
        }

        // Retrieve associated tags
        $tagsCacheKey = "associated_tags_{$id}";
        if ($request->segment(2) == 'en') {
            $associatedTags = Cache::remember($tagsCacheKey, $cacheDuration, function () use ($id) {
                return ContentTagsAssigned::query()
                    ->where('content_id', $id)
                    ->where('content_type', 2)
                    ->pluck('tag_id'); // Use `pluck` to directly get `tag_id` values
            });
        } else {
            $associatedTags = Cache::remember($tagsCacheKey, $cacheDuration, function () use ($id) {
                return ContentTagsAssignedHindi::query()
                    ->where('content_id', $id)
                    ->where('content_type', 2)
                    ->pluck('tag_id'); // Use `pluck` to directly get `tag_id` values
            });
        }

        // Fetch SEO tags
        if ($request->segment(2) == 'en') {
            $assocTags = Cache::remember("seo_tags_{$id}", $cacheDuration, function () use ($associatedTags) {
                return SeoTag::query()
                    ->whereIn('tag_id', $associatedTags)
                    ->select('tag_id', 'name')
                    ->distinct()
                    ->get();
            });
        } else {
            $assocTags = Cache::remember("seo_tags_{$id}", $cacheDuration, function () use ($associatedTags) {
                return SeoTagHindi::query()
                    ->whereIn('tag_id', $associatedTags)
                    ->select('tag_id', 'name')
                    ->distinct()
                    ->get();
            });
        }

        // Find brand matches
        $title = strtolower($newsDetails->title);
        $brandMatchesCacheKey = "brand_matches_" . md5($title);

        $brandMatches = Cache::remember($brandMatchesCacheKey, $cacheDuration, function () use ($title) {
            $titleWords = preg_split('/\s+/', $title); // Split title into words
            return FranchisorBusinessDetail::where('profile_status', 1)
                ->select('fran_detail_id', 'company_name', 'profile_name')
                ->get()
                ->filter(function ($item) use ($titleWords) {
                    $companyWords = array_map('strtolower', explode(' ', $item->company_name));
                    $pattern = '/\b' . implode('\b.*?\b', array_map(function ($word) {
                        return preg_quote($word, '/');
                    }, $companyWords)) . '\b/';
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
                ->values(); // Reset array keys
        });

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
        if ($request->segment(2) == 'en') {
            $articleCount = InsightList::with('author')
                ->where('status', 1)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('kicker', 'LIKE', '%' . $search . '%');
                })
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')->count();
        } else {
            $articleCount = InsightListHindi::with('author')
                ->where('status', 1)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('kicker', 'LIKE', '%' . $search . '%');
                })
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')->count();
        }
        if (($articleCount < 1)) {
            return redirect('/insights');
        }
        if ($request->segment(2) == 'en') {
            $articlesList = InsightList::with('author')
                ->where('status', 1)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('kicker', 'LIKE', '%' . $search . '%');
                })
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->orderByDesc('created_at')
                ->paginate(10);
            $articlesList      = CommonController::contentUrlSlug($articlesList);
        } else {
            $articlesList = InsightListHindi::with('author')
                ->where('status', 1)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('kicker', 'LIKE', '%' . $search . '%');
                })
                ->whereNotIn('news_type', ['ir', 'ri'])
                ->whereNotNull('image')
                ->orderByDesc('created_at')
                ->paginate(10);
            $articlesList      = CommonController::contentUrlSlug($articlesList);
        }
        // dd($articlesList);
        return view('insights.search', compact('articleCount', 'articlesList', 'search'));
    }




    public function insightstags(Request $request)
    {
        $tag = $request->tagslug;
        $tagstr = str_replace('-', ' ', $tag);

        if ($request->segment(2) == 'en') {
            $data = SeoTag::query()->where('name', $tagstr)->first();

            if (is_null($data)) {
                return redirect('/insights');
            }

            $articleIds = ContentTagsAssigned::where([
                ['tag_id', $data->tag_id],
                ['content_type', 2]
            ])
                ->pluck('content_id')
                ->unique()
                ->toArray();

            // Debug only if necessary
            // dd($articleIds);

            $articlesList = InsightList::query()->with('author')
                ->whereIn('news_id', $articleIds)
                //->get();
                //dd($articlesList);
                ->where('status', 1)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')
                ->paginate(10);

            $articlesList = CommonController::contentUrlSlug($articlesList);
        } else {

            $data = SeoTag::query()->where('name', $tagstr)->first();
            if (is_null($data)) {
                return redirect('/insights/hindi');
            }

            $articleIds = ContentTagsAssigned::where([
                ['tag_id', $data->tag_id],
                ['content_type', 2]
            ])
                ->pluck('content_id')
                ->unique()
                ->toArray();

            $articlesList = InsightListHindi::with('author')
                ->whereIn('news_id', $articleIds)
                ->where('status', 1)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->orderByDesc('created_at')
                ->paginate(10);

            $articlesList = CommonController::contentUrlSlug($articlesList);
        }
        // dd($articlesList);
        if ($articlesList->count() > 0) {
            return view('insights.insightstags', compact('articlesList', 'data'));
        } else {
            return redirect('/insights');
        }
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

    public static function insightcategory()
    {
        $categories = InsightCategory::all()->toArray();
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
        // dd($request->category);
        if ($request->category == 'kicker' || $request->subcategory == 'kicker') {
            return redirect('/insights');
        }
        $catslug = $request->category;
        $subcat = $request->subcategory;
        if (App::getLocale() == 'en') {
            $subcat_data = InsightSubcategory::query()->where('slug', $subcat)->first();
            // dd($subcats);
            $cat_data = InsightCategory::query()->where('slug', $catslug)->where('id', $subcat_data->mcat_id)->first();


            $contentdata = InsightList::with(['author', 'category', 'subcategory'])
                ->where('subcat_id', $subcat_data->id)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->whereNotNull('subcat_id')
                ->paginate(10);
            // dd($contentdata);
        } else {
            $subcat_data = InsightSubcategory::query()->where('slug', $subcat)->first();
            // dd($subcats);
            $cat_data = InsightCategory::query()->where('slug', $catslug)->where('id', $subcat_data->mcat_id)->first();


            $contentdata = InsightListHindi::with(['author', 'category', 'subcategory'])
                ->where('subcat_id', $subcat_data->id)
                ->whereNotIn('news_type', ['ri', 'ir'])
                ->where('status', 1)
                ->whereNotNull('image')
                ->whereNotNull('cat_id')
                ->whereNotNull('subcat_id')
                ->paginate(10);
        }
        return view('insights.subcatdata', compact('contentdata', 'subcat_data'));
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
