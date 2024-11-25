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
use Illuminate\Support\Facades\Log;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Cache;


class InsightsController extends Controller
{


    public function insightshome()
    {

        $homeArticle = InsightList::with('category')->where('status', 1)
            ->where('insight_type', 'News')
            ->where('news_type', 'fi')
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
            ->where('news_type', 'fi')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('news_id')
            ->whereNotIn('news_id', $homeArticle->pluck('news_id'))
            ->take(5)->get();

        $topstories     = CommonController::contentUrlSlug($topstories);


        $topcategories = SeoTag::orderByDesc('frequency')->take(10)->get();

        $trendArticles = InsightList::with('category')
            ->where('status', 1)
            ->where('news_type', '=', 'fi')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('views')
            ->take(8)->get();
        $trendArticles      = CommonController::contentUrlSlug($trendArticles);

        $industry_focus = InsightList::with('category')
            ->where('insight_type', '=', 'Article')
            ->where('news_type', '=', 'fi')
            ->where('status', 1)
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->take(1)->get();

        $industry_focus      = CommonController::contentUrlSlug($industry_focus);

        $industry_data = InsightList::with('category')
            ->where('insight_type', '=', 'Article')
            ->where('news_type', '=', 'fi')
            ->where('status', 1)
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->whereNotIn('news_id', $industry_focus->pluck('news_id'))
            ->orderByDesc('created_at')
            ->take(6)->get();

        $industry_data      = CommonController::contentUrlSlug($industry_data);

        $interview = InsightList::with('category')
            ->where('insight_type', '=', 'Interview')
            ->where('news_type', '=', 'fi')
            ->where('status', 1)
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->take(8)->get();
        $interview      = CommonController::contentUrlSlug($interview);

        return view('insights.insight_home', compact('homeArticle', 'topstories', 'trendArticles', 'topcategories', 'industry_focus', 'industry_data', 'interview'));
    }

    public function getinsightstories()
    {
        $insightstories = InsightList::with('author')
            ->where('insight_type', 'News')
            ->where('news_type', 'fi')
            ->where('status', 1)
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')->paginate(6);
        $insightstories = CommonController::contentUrlSlug($insightstories);

        return view('insights.topstories', compact('insightstories'));
    }

    public function industryfocus()
    {
        // $insArticles = InsightList::with(['author','category','Subcategory'])
        $insArticles = InsightList::with('author')
            ->where('insight_type', '=', 'Article')
            ->where('news_type', '=', 'fi')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->paginate(6);
        // dd($insArticles);
        $insArticles      = CommonController::contentUrlSlug($insArticles);

        if ($insArticles->isEmpty()) {
            return redirect('/insights');
        } else {
            return view('insights.articles', compact('insArticles'));
        }
    }

    public function getinsightsinterviews()
    {

        $interviews  = InsightList::with('author')
            ->where('news_type', 'fi')
            ->where('insight_type', 'Interview')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->paginate(6);
        $interviews = CommonController::contentUrlSlug($interviews);
        if ($interviews->isEmpty()) {
            return redirect('/insights');
        } else {
            return view('insights.interviewslist', compact('interviews'));
        }
    }

    public function geteventsreports()
    {

        $events_reports = InsightList::with('author')
            ->where('status', 1)
            ->where('news_type', 'fi')
            ->where('insight_type', 'Event')
            ->orWhere('insight_type', 'Report')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('news_id')
            ->paginate(6);
        $events_reports = CommonController::contentUrlSlug($events_reports);

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
        $author = AuthorList::find($id);

        $articleCount = InsightList::where('author_id', $id)
            ->where('news_type', 'fi')->count();
        $article = InsightList::where('author_id', $id)
            ->where('status', 1)
            ->where('news_type', 'fi')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->paginate(6);
        $article = CommonController::contentUrlSlug($article);

        return view('insights.author', compact('author', 'article', 'articleCount'));
    }

    public function insightscategorydata(Request $request)
    {


        $slug      = $request->slug;
        $slugr = str_replace(' ', '-', $slug);
        $slugarr = strtolower($slugr);

        $category = InsightCategory::query()
            ->where('slug', 'LIKE', '%' . $slugarr . '%')
            ->where('status', '1')
            ->first();

        if ($category) {
            $insightcategories = InsightList::with('author')
                ->where('cat_id', $category->id)
                ->where('status', 1)
                ->where('news_type', 'fi')
                ->orderByDesc('news_id')
                ->paginate(6);
            $insightcategories = CommonController::contentUrlSlug($insightcategories);

            if ($insightcategories->count() > 0) {
                return view('insights.categorylist', compact('insightcategories', 'category'));
            } else {
                return redirect('/insights');
            }
        }
    }

    public function trendstories()
    {

        $trendstories = InsightList::with('author')
            ->where('insight_type', 'News')
            ->where('news_type', 'fi')
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

    public function getInsightsDetails(Request $request)
    {
        $id = $request->id;
        $cacheDuration = 3600; // Cache duration in seconds (1 hour)

        // Cache key for the news details
        $newsCacheKey = "news_details_{$id}";

        // Retrieve or cache news details
        $newsDetails = Cache::remember($newsCacheKey, $cacheDuration, function () use ($id) {
            return InsightList::with(['author', 'category', 'Subcategory'])
                ->where('status', 1)
                ->where('news_type', 'fi')
                ->where('news_id', $id)
                ->get();
        });

        if ($newsDetails->isEmpty()) {
            return redirect('insights/pagenotfound');
        }

        // Cache key for the author details
        $authorCacheKey = "author_details_{$newsDetails[0]['author_id']}";

        $author_details = Cache::remember($authorCacheKey, $cacheDuration, function () use ($newsDetails) {
            return AuthorList::query()->where('author_id', $newsDetails[0]['author_id'])->get();
        });

        // Cache key for associated tags
        $tagsCacheKey = "associated_tags_{$id}";

        $associatedTags = Cache::remember($tagsCacheKey, $cacheDuration, function () use ($id) {
            return ContentTagsAssigned::query()
                ->where('content_id', $id)
                ->select('tag_id')
                ->where('content_type', 2)
                ->get();
        });

        // Get associated SEO tags
        $assocTags = [];
        foreach ($associatedTags as $tags) {
            $tagCacheKey = "seo_tag_{$tags->tag_id}";

            $assocTag = Cache::remember($tagCacheKey, $cacheDuration, function () use ($tags) {
                return SeoTag::query()
                    ->where('tag_id', $tags->tag_id)
                    ->select('tag_id', 'name')
                    ->distinct()
                    ->first();
            });

            if ($assocTag) {
                $assocTags[] = $assocTag;
            }
        }

        $allBrandMatches = [];
<<<<<<< HEAD
=======

>>>>>>> 87c755c817b3229489ddc4343300e6d60d14a8f1
        foreach ($newsDetails as $detail) {
            $title = strtolower($detail->title);
            $titleWords = preg_split('/\s+/', $title); // Split title into words using spaces

            $brandMatches = Cache::remember("brand_matches_" . md5($title), $cacheDuration, function () use ($title, $titleWords) {
                // Fetch company details and filter based on exact matches in title words
                return FranchisorBusinessDetail::where('profile_status', 1)
                    ->select('fran_detail_id', 'company_name', 'profile_name')
                    ->get()
                    ->filter(function ($item) use ($titleWords) {
                        // Split the company name into words and ensure each word is exactly in the title words
                        $companyWords = explode(' ', strtolower($item->company_name));
                        // Escape regex characters in company words
                        $escapedWords = array_map(function($word) {
                            return preg_quote($word, '/');
                        }, $companyWords);
                        // Form a regex pattern to match words in sequence within the title
                        $pattern = '/\b' . implode('\b.*?\b', $escapedWords) . '\b/';
                        return preg_match($pattern, implode(' ', $titleWords));
                    })
                    ->take(10) // Limit the results after filtering
                    ->map(function ($item) {
                        return [
                            'fran_detail_id' => $item->fran_detail_id,
                            'company_name' => $item->company_name,
                            'profile_name' => $item->profile_name,
                        ];
                    });
            });

            $allBrandMatches[$title] = $brandMatches;
        }

        $franchiseData = [];
        foreach ($allBrandMatches as $title => $matches) {
            foreach ($matches as $match) {
                $franchiseData[] = [
                    'fran_detail_id' => $match['fran_detail_id'],
                    'company_name' => $match['company_name'],
                    'profile_name'=>$match['profile_name'],
                    'title' => $title

                ];
            }
        }
       // dd($newsDetails);

        return view('insights.insight_detail')->with(compact('newsDetails', 'author_details', 'franchiseData'));
    }

    public function insightSearch(Request $request)
    {
        $search = $request->search;
        $articleCount = InsightList::with('author')
            ->where('status', 1)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('kicker', 'LIKE', '%' . $search . '%');
            })
            ->where('news_type', 'fi')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')->count();
        if (($articleCount < 1)) {
            return redirect('/insights');
        }

        $articlesList = InsightList::with('author')
            ->where('status', 1)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('kicker', 'LIKE', '%' . $search . '%');
            })
            ->where('news_type', 'fi')
            ->whereNotNull('image')
            ->orderByDesc('created_at')
            ->paginate(5);

        $articlesList      = CommonController::contentUrlSlug($articlesList);
        return view('insights.search', compact('articleCount', 'articlesList', 'search'));
    }

    public function insightstags(Request $request)
    {
        $tag = $request->tagslug;
        $tagstr = str_replace('-', ' ', $tag);
        $tagword = ucfirst($tagstr);

        $data = SeoTag::query()->where('name', $tagword)->first();

        if (is_null($data)) {
            return redirect('/insights');
        }

        $articleIds = ContentTagsAssigned::query()
            ->select('content_id')
            ->where('tag_id', $data->tag_id)
            ->where('content_type', 2)
            ->distinct()
            ->pluck('content_id')
            ->toArray();

        $articlesList = InsightList::with('author')
            ->whereIn('news_id', $articleIds)
            ->where('status', 1)
            ->where('news_type', 'fi')
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->paginate(6);

        $articlesList = CommonController::contentUrlSlug($articlesList);

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
        $subcat_data = InsightSubcategory::query()->where('slug', $subcat)->first();
        $cat_data = InsightCategory::query()->where('slug', $catslug)->where('id', $subcat_data->mcat_id)->first();

        $contentdata = InsightList::with(['author', 'category', 'subcategory'])
            ->where('subcat_id', $subcat_data->id)
            ->where('news_type', 'fi')
            ->where('status', 1)
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->whereNotNull('subcat_id')
            ->paginate(10);
        // dd($contentdata);
        return view('insights.subcatdata', compact('contentdata', 'subcat_data'));
    }
}
