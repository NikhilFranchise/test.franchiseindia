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
use App\Models\FihlVideoCategory;
use Illuminate\Support\Facades\DB;
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
            ->orderByDesc('created_at')->paginate(10);
        $insightstories = CommonController::contentUrlSlug($insightstories);
        return view('insights.topstories', compact('insightstories'));
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
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->paginate(10);

        // Handle empty results
        if ($insArticles->isEmpty()) {
            return redirect('/insights');
        }

        // Apply the content URL slug logic
        $insArticles = CommonController::contentUrlSlug($insArticles);

        // Return the view with the articles
        return view('insights.articles', compact('insArticles'));
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
            ->paginate(10);
        $interviews = CommonController::contentUrlSlug($interviews);
        if ($interviews->isEmpty()) {
            return redirect('/insights');
        } else {
            return view('insights.interviewslist', compact('interviews'));
        }
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
            ->paginate(10);
        $events_reports = CommonController::contentUrlSlug($events_reports);

        if ($events_reports->isEmpty()) {
            return redirect('/insights');
        } else {
            return view('insights.events_reports', compact('events_reports'));
        }
    }


    // public function authordata(Request $request)
    // {

    //     $author_id =  explode('-', $request->slug);
    //     $id = end($author_id);
    //     if (!is_int($id)) {
    //         $id = (int)$id;
    //         if ($id == 0) return redirect('/insight');
    //     }
    //     if ($request->segment(2) == 'en') {
    //         $author = AuthorList::find($id);
    //         $articleCount = InsightList::where('author_id', $id)
    //             ->whereNotIn('news_type', ['ri', 'ir'])->count();
    //         $article = InsightList::where('author_id', $id)
    //             ->where('status', 1)
    //             ->whereNotIn('news_type', ['ri', 'ir'])
    //             ->whereNotNull('image')
    //             ->whereNotNull('cat_id')
    //             ->orderByDesc('created_at')
    //             ->paginate(6);
    //         $article = CommonController::contentUrlSlug($article);
    //     } else {
    //         $author = AuthorList::find($id);
    //         $articleCount = InsightListHindi::where('author_id', $id)
    //             ->whereNotIn('news_type', ['ri', 'ir'])->count();
    //         $article = InsightListHindi::where('author_id', $id)
    //             ->where('status', 1)
    //             ->whereNotIn('news_type', ['ri', 'ir'])
    //             ->whereNotNull('image')
    //             ->whereNotNull('cat_id')
    //             ->orderByDesc('created_at')
    //             ->paginate(6);
    //         $article = CommonController::contentUrlSlug($article);
    //     }
    //     return view('insights.author', compact('author', 'article', 'articleCount'));
    // }

    public function authordata(Request $request)
    {
        // Extract and validate the author ID from the slug
        $author_id = explode('-', $request->slug);
        $id = (int) end($author_id);

        // Redirect if the ID is invalid
        if ($id == 0) {
            return redirect('/insight');
        }

        // Set the appropriate model and fetch data based on the language
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // Choose the appropriate model based on the locale
        $model = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $author = AuthorList::find($id);

        // Count the articles
        $articleCount = $model::where('author_id', $id)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->count();

        // Fetch articles with the necessary conditions
        $articles = $model::where('author_id', $id)
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->whereNotNull('image')
            ->whereNotNull('cat_id')
            ->orderByDesc('created_at')
            ->paginate(6);

        // Apply URL slug transformation
        $articles = CommonController::contentUrlSlug($articles);

        // Return the view with the author data and articles
        return view('insights.author', compact('author', 'articles', 'articleCount'));
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
            return redirect('/insights');
        } else {
            return view('insights.trendstories', compact('trendstories'));
        }
    }

    public function getInsightsDetails(Request $request)
    {
        $id = $request->id;
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $newsModel = $locale == 'hi' ? InsightListHindi::class : InsightList::class;
        $tagTable = $locale == 'hi' ? ContentTagsAssignedHindi::class : ContentTagsAssigned::class;
        $seoTagModel = $locale == 'hi' ? SeoTagHindi::class : SeoTag::class;
        // dd($id);
        // Fetch news details
        $newsDetails = $newsModel::with(['author', 'category', 'Subcategory'])
            ->where('status', 1)
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->where('news_id', $id)
            ->first();
        // print_r($newsDetails->toSql());die;
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
        // $isEnglish = $request->segment(2) == 'en';

        // Determine the appropriate model
        $locale = request()->segment(2) == 'hi' ? 'hi' : 'en';
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $insightModel = $locale == 'en' ? InsightList::class : InsightListHindi::class;
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

    public static function insightcategory($locale)
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
        // dd($contentData);
        // Return the view with the appropriate language data
        return view('insights.subcatdata', compact('contentData', 'subcatData', 'catData'));
    }

    public function getVideoPodcast(Request $request)
    {
        // Determine the language based on the URL segment
        $isEnglish = $request->segment(2) == 'en' ? 'en' : 'hi';
        $redirectPath = $isEnglish == 'en' ? '/insights' : '/insights/hindi';

        // Set application locale and session locale
        app()->setLocale($isEnglish);
        session()->put('locale', $isEnglish);

        // Set YouTube URL and Image Path for video formatting
        $YOUTUBE_IMAGE_PATH = "https://img.youtube.com/vi/%s/mqdefault.jpg";
        $YOUTUBE_URL = "https://www.youtube.com/watch?v=%s";

        // Determine query parameters
        // $offset = $request->input('offset', 0);
        // $limit = $request->input('limit', 4);
        // $limit = ($limit > 50) ? 50 : $limit; // Ensure limit doesn't exceed 50

        // Fetch video podcasts and additional podcast data
        $listVideoQuery = FihlPodcastVideo::with('category')
            ->where('podcast_type', 'V')
            ->where('pod_lang', $isEnglish)
            ->where('status', 'A')
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
            dd($listVideoQuery);
        // Get total records count for pagination
      //  $total = $listVideoQuery->count();

        // Apply offset and limit
      //  $videos = $listVideoQuery->offset($offset)->limit($limit)->get();

        // Map and format results
        // $mappedVideos = $videos->map(function ($video) use ($YOUTUBE_IMAGE_PATH, $YOUTUBE_URL) {
        //     return [
        //         'sno' => $video->sno,
        //         'title' => $video->title,
        //         'pod_lang' => $video->pod_lang,
        //         'description' => $video->description,
        //         'url' => sprintf($YOUTUBE_URL, $video->videoID),
        //         'image' => sprintf($YOUTUBE_IMAGE_PATH, $video->videoID),
        //         'views' => $video->views,
        //         'createDate' => $video->createDate,
        //         'category' => $video->category->catname ?? null, // Ensure category is safely accessed
        //     ];
        // });

        // Create a paginated response
        // $listVideo = new LengthAwarePaginator(
        //     $mappedVideos, // Items for the current page
        //     $total,        // Total number of items
        //     $limit,        // Items per page
        //     ($offset / $limit) + 1, // Current page
        //     ['path' => request()->url(), 'query' => request()->query()] // Path and query params for pagination links
        // );

        $podcast = FihlPodcastVideo::query()
            ->where('pod_lang', $isEnglish)
            ->where('podcast_type', 'A')
            ->where('status', 'A')
            ->where('podcast_id', '!=', '')
            ->orderByDesc('created_at')
            ->limit(4)
            ->get();

        // dd($videos);
        // Return the view with videos and podcast data
        return view('insights.video', compact('listVideo', 'podcast'));
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


    // public static function createimgurl($image)
    // {
    //     // dd($image);
    //     if ($image) {
    //         $iscont = strstr($image, "/");
    //         $isHttps = strstr($image, 'https');
    //         if ($isHttps) {
    //             $url =  trim($image, '/');
    //         } else {

    //             if ($iscont) {
    //                 $url = Config('constants.franAwsS3Url') . trim($image, '/');
    //             } else {
    //                 if (App::getLocale() != 'en') {

    //                     $url = Config('constants.franAwsS3Url') . Config('constants.ARTICLE_HINDI_UPLOAD_PATH') . trim($image);
    //                 } else {

    //                     $url = Config('constants.franAwsS3Url') . Config('constants.ARTICLE_UPLOAD_PATH') . trim($image);
    //                     //$url = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/' . Config('constants.ARTICLE_UPLOAD_PATH') . trim($image);
    //                 }
    //             }
    //         }
    //     } else {
    //         $url = url('/img/602a695853d99.jpeg');
    //     }


    //     return $url;
    // }

    // public static function authorImageurl($image)
    // {
    //     // dd($image);
    //     if ($image) {
    //         $iscont = strstr($image, "/");
    //         if ($iscont) {
    //             $url = Config('constants.franAwsS3Url') . trim($image, '/');
    //         } else {
    //             $info = @getimagesize('https://franchiseindia.s3.ap-south-1.amazonaws.com/opp/authors/images/' . $image);
    //             if ($info === false) {
    //                 $url = url('images/defaultuser.png');
    //             } else {
    //                 $url = Config('constants.franAwsS3Url') . 'opp/authors/images/' . trim($image);
    //             }
    //         }
    //     } else {
    //         $url = url('images/defaultuser.png');
    //     }

    //     return $url;
    // }

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
}
