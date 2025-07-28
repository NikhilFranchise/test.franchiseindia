<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FranchisorBusinessDetail;
use App\Models\Videos;
use App\Models\HomePremiumPageBrand;
use App\Models\InsightList;
use App\Models\InsightListHindi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
// use Jenssegers\Agent\Agent;
use Detection\MobileDetect;




class NewHomePageController extends Controller
{

    public function hindiHomePage()
    {
        if (request()->segment(1) == 'hi') {
            app()->setLocale('hi');
            session()->put('locale', 'hi');
        }
        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache' => 'articles_data_cache',
            'fivideohi' => 'fivideohi',
        ];
        // Define cache expiration time in seconds
        $cacheExpiration = 3600; // You can adjust this as needed
        // Check if the 'brandslft' data exists in the cache
        $isBrandslftCached = Cache::has($cacheKeys['brandslft']);

        // Retrieve cached data or fetch and cache if not available
        $brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 2)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(4)
                ->get()
                ->shuffle();
        });

        $brandstbo = Cache::remember($cacheKeys['brandstbo'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 3)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(12)
                ->get()
                ->shuffle();
        });

        $brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
            return  HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 4)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(25)
                ->get()
                ->shuffle();
        });

        $brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
            return  HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 5)
                ->orderBy('inventory_backup', 'ASC')
                ->take(48)
                ->get()
                ->shuffle();
        });

        $news = InsightListHindi::query()->with('category')
            ->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('insight_type', 'News')
            ->whereNot('cat_id', '=', '')
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->limit(16)
            ->get();

        $articles = InsightListHindi::query()->with('category')
            ->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('insight_type', 'Article')
            ->whereNot('cat_id', '=', '')
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->limit(16)
            ->get();

        $interviews = InsightListHindi::with('category')->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('insight_type', 'Interview')
            ->whereNot('cat_id', '=', '')
            // ->orderByDesc('created_at')
            ->orderByEffectiveDate('desc')
            ->limit(16)
            ->get();

        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideohi'], $cacheExpiration, function () use ($youtubeApiKey) {

            $videosData = [];

            // Fetch all videos with the required fields
            $videos = Videos::query()
                ->select(
                    'fih_id as id',
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as imageurl',
                    'fih_date as date',
                    'fih_description as description',
                    'fih_views as views',
                    'fih_status as priority'
                )
                ->orderBy('fih_date', 'ASC')
                ->get();

            // Extract video IDs and make a bulk API call to get view counts
            $videoIds = $videos->map(function ($vdo) {
                return $this->extractYouTubeVideoId($vdo->url);
            })->filter()->toArray();

            // Get view counts for all videos in one API call
            $videoViewCounts = $this->getYouTubeVideoViewCount($videoIds, $youtubeApiKey);
            foreach ($videos as $vdo) {
                $videoId = $this->extractYouTubeVideoId($vdo->url);
                // dd($videoId);
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }

                $videosData[] = $vdo->toArray();
            }

            return $videosData;
        });

        return view('newHomepage.newmasterhomepage')->with(compact('news', 'articles', 'interviews',  'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));
    }

    public function homeNew(Request $request, MobileDetect $detect)
    {
        if (request()->segment(1) != 'hi') {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }
        // $cacheKeys = [
        //     'brandslft' => 'brandslft_cache',
        //     'brandstbo' => 'brandstbo_cache',
        //     'brandstfo' => 'brandstfo_cache',
        //     'brandsffc' => 'brandsffc_cache',
        //     'articles_data_cache_english' => 'articles_data_cache_english',
        //     'fivideo' => 'fivideo',
        // ];

        // // Define cache expiration time in seconds
        // $cacheExpiration = 3600; // You can adjust this as needed

        // // Check if the 'brandslft' data exists in the cache
        // $isBrandslftCached = Cache::has($cacheKeys['brandslft']);

        // // Retrieve cached data or fetch and cache if not available
        // $brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
        //     return HomePremiumPageBrand::query()
        //         ->where('status', 1)
        //         ->where('brand_section', 2)
        //         ->where('page_type', 1)
        //         ->orderBy('inventory_backup', 'ASC')
        //         ->take(4)
        //         ->get()
        //         ->shuffle();
        // });

        // $brandstbo = Cache::remember($cacheKeys['brandstbo'], $cacheExpiration, function () {
        //     return HomePremiumPageBrand::query()
        //         ->where('status', 1)
        //         ->where('brand_section', 3)
        //         ->where('page_type', 1)
        //         ->orderBy('inventory_backup', 'ASC')
        //         ->take(12)
        //         ->get()
        //         ->shuffle();
        // });

        // $brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
        //     return    HomePremiumPageBrand::query()
        //         ->where('status', 1)
        //         ->where('brand_section', 4)
        //         ->where('page_type', 1)
        //         ->orderBy('inventory_backup', 'ASC')
        //         ->take(25)
        //         ->get()
        //         ->shuffle();
        // });


        // $brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
        //     return HomePremiumPageBrand::query()
        //         ->where('status', 1)
        //         ->where('brand_section', 5)
        //         ->orderBy('inventory_backup', 'ASC')
        //         ->take(48)
        //         ->get()
        //         ->shuffle();
        // });


        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache_english' => 'articles_data_cache_english',
            'fivideo' => 'fivideo',
        ];

$cacheExpiration = 3600; // 1 hour

// Define limits per section
$sections = [
    2 => ['key' => $cacheKeys['brandslft'], 'limit' => 4],
    3 => ['key' => $cacheKeys['brandstbo'], 'limit' => 12],
    4 => ['key' => $cacheKeys['brandstfo'], 'limit' => 25],
    5 => ['key' => $cacheKeys['brandsffc'], 'limit' => 48],
];

// Step 1: Load from cache
$cachedBrands = [];
$missingSections = [];

foreach ($sections as $section => $info) {
    $data = Cache::get($info['key']);
    if ($data) {
        $cachedBrands[$section] = $data;
    } else {
        $missingSections[$section] = $info['limit'];
    }
}

// Step 2: If any cache missing, do a single query
if (!empty($missingSections)) {
    $fetched = HomePremiumPageBrand::query()
        ->select('brand_id','brand_img','brand_link','brand_alt','brand_heading','investment_range','investment_range_new','area_required','brand_category','brand_category_id','page_type','weightage','status','brand_section')
        ->where('status', 1)
        ->where('page_type', 1)
        ->whereIn('brand_section', array_keys($missingSections))
        ->orderBy('inventory_backup', 'ASC')
        ->get()
        ->groupBy('brand_section');

    foreach ($missingSections as $section => $limit) {
        $data = ($fetched[$section] ?? collect())->shuffle()->take($limit);
        Cache::put($sections[$section]['key'], $data, $cacheExpiration);
        $cachedBrands[$section] = $data;
    }
}

// Step 3: Assign to existing variables
$brandslft = $cachedBrands[2] ?? collect();
$brandstbo = $cachedBrands[3] ?? collect();
$brandstfo = $cachedBrands[4] ?? collect();
$brandsffc = $cachedBrands[5] ?? collect();
// dd($brandstbo);


// Optional debug log
// logger()->info("Brands loaded: ", ['sections' => array_keys($cachedBrands)]);


        // $news = InsightList::query()->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date')
        //     ->with('category')
        //     ->withEffectiveDate()
        //     ->where('status', 1)
        //     ->where('insight_type', 'News')
        //     ->whereNot('cat_id', '=', '')
        //     ->orderByEffectiveDate('desc')
        //     ->limit(16)
        //     ->get();

        // $articles = InsightList::query()->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date')
        //     ->with('category')
        //     ->withEffectiveDate()
        //     ->where('status', 1)
        //     ->where('insight_type', 'Article')
        //     ->whereNot('cat_id', '=', '')
        //     ->orderByEffectiveDate('desc')
        //     ->limit(16)
        //     ->get();
        //     // dd($articles);
        // $interviews = InsightList::with('category')
        //     ->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date')
        //     ->withEffectiveDate()
        //     ->where('status', 1)
        //     ->where('insight_type', 'Interview')
        //     ->whereNot('cat_id', '=', '')
        //     ->orderByEffectiveDate('desc')
        //     ->limit(16)
        //     ->get();

    // $insights = InsightList::query()
    // ->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date', 'insight_type')
    // ->with('category')
    // ->where('status', 1)
    // ->whereIn('insight_type', ['News', 'Article', 'Interview'])
    // ->whereNotNull('cat_id')
    // ->where('cat_id', '!=', '')
    // ->orderBy('updated_at', 'desc')
    // ->limit(150) // fetch a reasonable subset first
    // ->get()
    // ->groupBy('insight_type');
  
//   $agent = new Agent();

     if (!$detect->isMobile() ) {
        $all = InsightList::query()
            ->with('category')
            ->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date', 'insight_type')
            ->withEffectiveDate()
            ->where('status', 1)
            ->whereNot('cat_id', '')
            ->whereIn('insight_type', ['News', 'Article', 'Interview'])
            ->orderByEffectiveDate('desc')
            ->get()
            ->groupBy('insight_type');

        $news = $all['News']->take(16);
        $articles = $all['Article']->take(16);
        $interviews = $all['Interview']->take(16);
    }


// $news = $grouped->get('News', collect())->take(16);
// $articles = $grouped->get('Article', collect())->take(16);
// $interviews = $grouped->get('Interview', collect())->take(16);





        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideo'], $cacheExpiration, function () use ($youtubeApiKey) {

            $videosData = [];

            // Fetch all videos with the required fields
            $videos = Videos::query()
                ->select(
                    'fih_id as id',
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as imageurl',
                    'fih_date as date',
                    'fih_description as description',
                    'fih_views as views',
                    'fih_status as priority'
                )
                ->orderBy('fih_date', 'ASC')
                ->get();

            // Extract video IDs and make a bulk API call to get view counts
            $videoIds = $videos->map(function ($vdo) {
                return $this->extractYouTubeVideoId($vdo->url);
            })->filter()->toArray();

            // Get view counts for all videos in one API call
            $videoViewCounts = $this->getYouTubeVideoViewCount($videoIds, $youtubeApiKey);
            foreach ($videos as $vdo) {
                $videoId = $this->extractYouTubeVideoId($vdo->url);
                // dd($videoId);
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }

                $videosData[] = $vdo->toArray();
            }

            return $videosData;
        });

        if (!$detect->isMobile()){
        return view('newHomepage.newmasterhomepage')->with(compact('news', 'articles', 'interviews', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));

        }
        else{
        return view('newHomepage.newmasterhomepage')->with(compact('brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));

        }
        // return view('newHomepage.newmasterhomepage')->with(compact('news', 'articles', 'interviews', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));
    }


    private function extractYouTubeVideoId($url)
    {
        preg_match('/v=([^\&\?\/]+)/', $url, $matches);
        return $matches[1] ?? null;
    }



    private function getYouTubeVideoViewCount(array $videoIds, $apiKey)
    {
        // Generate a unique cache key based on the video IDs a
        $cacheKey = 'youtube_video_view_count_' . md5(implode(',', $videoIds));
        $cacheExpiration = 60 * 60; // Cache expiration time in seconds (1 hour)

        // Attempt to retrieve the view counts from cache
        return Cache::remember($cacheKey, $cacheExpiration, function () use ($videoIds, $apiKey) {
            $ids = implode(',', $videoIds);
            $url = "https://www.googleapis.com/youtube/v3/videos?part=statistics&id={$ids}&key={$apiKey}";

            $response = file_get_contents($url);
            $data = json_decode($response, true);

            $viewCounts = [];
            if (isset($data['items'])) {
                foreach ($data['items'] as $item) {
                    $viewCounts[$item['id']] = $item['statistics']['viewCount'];
                }
            }

            return $viewCounts;
        });
    }


    public static function getSlug($title, $id)
    {

        $url = '';
        // dd(request()->segments());
        if (request()->segment(1) == 'hi') {
            $rep = preg_replace("/[:?]/", "", $title);
            $slug = preg_replace("/[\s]/", '-', $rep);
            $url .= "hindi/";
        } else {
            //   $slug = str_slug($title);
            $slug = Str::slug($title);
        }
        $url .= "article/" . $slug . "-" . $id;
        return $url;
    }

    public static function getinsightsSlug($title, $id)
    {

        $url = '';
        // dd(request()->segments());
        if (request()->segment(1) == 'hi') {
            $rep = preg_replace("/[:?]/", "", $title);
            $slug = preg_replace("/[\s]/", '-', $rep);
            // dd($slug);
            $url .= "/";
        } else {
            //   $slug = str_slug($title);
            $slug = Str::slug($title);
        }
        $url .= "/en/news/" . $slug . "." . $id;
        return $url;
    }

    public static function getinsights_interview_Slug($title, $id)
    {

        $url = '';
        // dd(request()->segments());
        if (request()->segment(1) == 'hi') {
            $rep = preg_replace("/[:?]/", "", $title);
            $slug = preg_replace("/[\s]/", '-', $rep);
            $url .= "hindi/";
        } else {
            //   $slug = str_slug($title);
            $slug = Str::slug($title);
        }
        $url .= "/en/interviews/" . $slug . "." . $id;
        return $url;
    }

    public static function getImageUrl($url)
    {
        if (request()->segment(1) == 'hi') {

            $url = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/opp/article/hindi/images/' . $url;
        } elseif (request()->segment(2) == 'hi') {

            $url = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/opp/article/hindi/images/' . $url;
        } else {
            $url = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/opp/article/english/images/' . $url;
        }


        return $url;
    }

    public static function getImageUrlForMobile($url)
    {
        if (request()->segment(1) == 'hi') {

            $url = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/opp/article/hindi/images/295X165/' . $url;
        } else {
            $url = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/opp/article/english/images/295X165/' . $url;
        }


        return $url;
    }
    public function top100()
    {
        return view('static.top-100-franchisors');
    }



    //Nikhil


    public function cvwhindiHomePage()
    {

        // dd('yes');

        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache' => 'articles_data_cache',
            'fivideohi' => 'fivideohi',

        ];
        // Define cache expiration time in seconds
        $cacheExpiration = 3600; // You can adjust this as needed

        // Check if the 'brandslft' data exists in the cache
        $isBrandslftCached = Cache::has($cacheKeys['brandslft']);
        // dd($isBrandslftCached);
        // dd($request->all());

        // Retrieve cached data or fetch and cache if not available
        $brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 2)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(4)
                ->get()
                ->shuffle();
        });

        // dd($cacheDatalft);
        // dd([
        // 	'is_brandslft_cached' => $isBrandslftCached,
        // 	'cache_data' => $cacheData,
        // 	'database_data' => HomePremiumPageBrand::query()
        // 		->where('status', 1)
        // 		->where('brand_section', 2)
        // 		->where('page_type', 1)
        // 		->orderBy('inventory_backup', 'ASC')
        // 		->take(2)
        // 		->get()
        // 		->shuffle(),
        // ]);


        $brandstbo = Cache::remember($cacheKeys['brandstbo'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 3)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(12)
                ->get()
                ->shuffle();
        });

        $brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
            return  HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 4)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(25)
                ->get()
                ->shuffle();
        });

        $brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
            return  HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 5)
                ->orderBy('inventory_backup', 'ASC')
                ->take(48)
                ->get()
                ->shuffle();
        });


        $filePath = public_path('oidata/articlehindi.json');


        $articles = Cache::remember($cacheKeys['articles_data_cache'], $cacheExpiration, function () use ($filePath) {
            // If the data is not in Redis, read it from the file
            if (file_exists($filePath)) {
                $storedData = json_decode(file_get_contents($filePath), true);
                return $storedData['data'] ?? []; // Return the data or an empty array if not found
            } else {
                return []; // Default to an empty array if the file does not exist
            }
        });

        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideohi'], $cacheExpiration, function () use ($youtubeApiKey) {

            $videosData = [];

            // Fetch all videos with the required fields
            $videos = Videos::query()
                ->select(
                    'fih_id as id',
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as imageurl',
                    'fih_date as date',
                    'fih_description as description',
                    'fih_views as views',
                    'fih_status as priority'
                )
                ->orderBy('fih_date', 'ASC')
                ->get();

            // Extract video IDs and make a bulk API call to get view counts
            $videoIds = $videos->map(function ($vdo) {
                return $this->extractYouTubeVideoId($vdo->url);
            })->filter()->toArray();

            // Get view counts for all videos in one API call
            $videoViewCounts = $this->getYouTubeVideoViewCount($videoIds, $youtubeApiKey);
            foreach ($videos as $vdo) {
                $videoId = $this->extractYouTubeVideoId($vdo->url);
                // dd($videoId);
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }

                $videosData[] = $vdo->toArray();
            }
            // dd($vdo->save());

            return $videosData;
        });

        // dd($videos);
        $brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

        //  dd($articles);
        return view('cvw.homepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));


        // return view('layout.hindihomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
    }

    public function cvwhomeNew(Request $request)
    {
        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache_english' => 'articles_data_cache_english',
            'fivideo' => 'fivideo',
        ];

        // Define cache expiration time in seconds
        $cacheExpiration = 3600; // You can adjust this as needed

        // Check if the 'brandslft' data exists in the cache
        $isBrandslftCached = Cache::has($cacheKeys['brandslft']);

        // Retrieve cached data or fetch and cache if not available
        $brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 2)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(4)
                ->get()
                ->shuffle();
        });


        $brandstbo = Cache::remember($cacheKeys['brandstbo'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 3)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(12)
                ->get()
                ->shuffle();
        });

        $brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
            return    HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 4)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(25)
                ->get()
                ->shuffle();
        });


        $brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 5)
                ->orderBy('inventory_backup', 'ASC')
                ->take(48)
                ->get()
                ->shuffle();
        });



        // Define the path where the JSON file is stored
        $filePath = public_path('oidata/articles.json');

        // Read the data back from the JSON file
        $articles = Cache::remember($cacheKeys['articles_data_cache_english'], $cacheExpiration, function () use ($filePath) {
            // If the data is not in Redis, read it from the file
            if (file_exists($filePath)) {
                $storedData = json_decode(file_get_contents($filePath), true);
                return $storedData['data'] ?? []; // Return the data or an empty array if not found
            } else {
                return []; // Default to an empty array if the file does not exist
            }
        });

        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideo'], $cacheExpiration, function () use ($youtubeApiKey) {

            $videosData = [];

            // Fetch all videos with the required fields
            $videos = Videos::query()
                ->select(
                    'fih_id as id',
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as imageurl',
                    'fih_date as date',
                    'fih_description as description',
                    'fih_views as views',
                    'fih_status as priority'
                )
                ->orderBy('fih_date', 'ASC')
                ->get();

            // Extract video IDs and make a bulk API call to get view counts
            $videoIds = $videos->map(function ($vdo) {
                return $this->extractYouTubeVideoId($vdo->url);
            })->filter()->toArray();

            // Get view counts for all videos in one API call
            $videoViewCounts = $this->getYouTubeVideoViewCount($videoIds, $youtubeApiKey);
            foreach ($videos as $vdo) {
                $videoId = $this->extractYouTubeVideoId($vdo->url);
                // dd($videoId);
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }

                $videosData[] = $vdo->toArray();
            }
            // dd($vdo->save());

            return $videosData;
        });


        $brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

        return view('cvw.homepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));

        // return view('layout.masternewhomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
    }

    public function cwvMobile(Request $request)
    {
        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache_english' => 'articles_data_cache_english',
            'fivideo' => 'fivideo',
        ];

        // Define cache expiration time in seconds
        $cacheExpiration = 3600; // You can adjust this as needed

        // Check if the 'brandslft' data exists in the cache
        $isBrandslftCached = Cache::has($cacheKeys['brandslft']);

        // Retrieve cached data or fetch and cache if not available
        $brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 2)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(4)
                ->get()
                ->shuffle();
        });


        $brandstbo = Cache::remember($cacheKeys['brandstbo'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 3)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(12)
                ->get()
                ->shuffle();
        });

        $brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
            return    HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 4)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(25)
                ->get()
                ->shuffle();
        });


        $brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 5)
                ->orderBy('inventory_backup', 'ASC')
                ->take(48)
                ->get()
                ->shuffle();
        });



        // Define the path where the JSON file is stored
        $filePath = public_path('oidata/articles.json');

        // Read the data back from the JSON file
        $articles = Cache::remember($cacheKeys['articles_data_cache_english'], $cacheExpiration, function () use ($filePath) {
            // If the data is not in Redis, read it from the file
            if (file_exists($filePath)) {
                $storedData = json_decode(file_get_contents($filePath), true);
                return $storedData['data'] ?? []; // Return the data or an empty array if not found
            } else {
                return []; // Default to an empty array if the file does not exist
            }
        });

        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideo'], $cacheExpiration, function () use ($youtubeApiKey) {

            $videosData = [];

            // Fetch all videos with the required fields
            $videos = Videos::query()
                ->select(
                    'fih_id as id',
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as imageurl',
                    'fih_date as date',
                    'fih_description as description',
                    'fih_views as views',
                    'fih_status as priority'
                )
                ->orderBy('fih_date', 'ASC')
                ->get();

            // Extract video IDs and make a bulk API call to get view counts
            $videoIds = $videos->map(function ($vdo) {
                return $this->extractYouTubeVideoId($vdo->url);
            })->filter()->toArray();

            // Get view counts for all videos in one API call
            $videoViewCounts = $this->getYouTubeVideoViewCount($videoIds, $youtubeApiKey);
            foreach ($videos as $vdo) {
                $videoId = $this->extractYouTubeVideoId($vdo->url);
                // dd($videoId);
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }

                $videosData[] = $vdo->toArray();
            }
            // dd($vdo->save());

            return $videosData;
        });


        $brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

        return view('cwv-mobile.homepage-mobile')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));

        // return view('layout.masternewhomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
    }

    public function cwvMobilehindiHomePage()
    {
        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache' => 'articles_data_cache',
            'fivideohi' => 'fivideohi',

        ];
        // Define cache expiration time in seconds
        $cacheExpiration = 3600; // You can adjust this as needed

        // Check if the 'brandslft' data exists in the cache
        $isBrandslftCached = Cache::has($cacheKeys['brandslft']);
        // Retrieve cached data or fetch and cache if not available
        $brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 2)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(4)
                ->get()
                ->shuffle();
        });

        $brandstbo = Cache::remember($cacheKeys['brandstbo'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 3)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(12)
                ->get()
                ->shuffle();
        });

        $brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
            return  HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 4)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(25)
                ->get()
                ->shuffle();
        });

        $brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
            return  HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 5)
                ->orderBy('inventory_backup', 'ASC')
                ->take(48)
                ->get()
                ->shuffle();
        });


        $filePath = public_path('oidata/articlehindi.json');


        $articles = Cache::remember($cacheKeys['articles_data_cache'], $cacheExpiration, function () use ($filePath) {
            // If the data is not in Redis, read it from the file
            if (file_exists($filePath)) {
                $storedData = json_decode(file_get_contents($filePath), true);
                return $storedData['data'] ?? []; // Return the data or an empty array if not found
            } else {
                return []; // Default to an empty array if the file does not exist
            }
        });

        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideohi'], $cacheExpiration, function () use ($youtubeApiKey) {

            $videosData = [];

            // Fetch all videos with the required fields
            $videos = Videos::query()
                ->select(
                    'fih_id as id',
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as imageurl',
                    'fih_date as date',
                    'fih_description as description',
                    'fih_views as views',
                    'fih_status as priority'
                )
                ->orderBy('fih_date', 'ASC')
                ->get();

            // Extract video IDs and make a bulk API call to get view counts
            $videoIds = $videos->map(function ($vdo) {
                return $this->extractYouTubeVideoId($vdo->url);
            })->filter()->toArray();

            // Get view counts for all videos in one API call
            $videoViewCounts = $this->getYouTubeVideoViewCount($videoIds, $youtubeApiKey);
            foreach ($videos as $vdo) {
                $videoId = $this->extractYouTubeVideoId($vdo->url);
                // dd($videoId);
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }

                $videosData[] = $vdo->toArray();
            }
            // dd($vdo->save());

            return $videosData;
        });

        // dd($videos);
        $brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

        //  dd($articles);
        return view('cwv-mobile.homepage-mobile')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));


        // return view('layout.hindihomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
    }


    public function newhomepage(Request $request)
    {
        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache_english' => 'articles_data_cache_english',
            'fivideo' => 'fivideo',
        ];

        // Define cache expiration time in seconds
        $cacheExpiration = 3600; // You can adjust this as needed

        // Check if the 'brandslft' data exists in the cache
        $isBrandslftCached = Cache::has($cacheKeys['brandslft']);

        // Retrieve cached data or fetch and cache if not available
        $brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 2)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(4)
                ->get()
                ->shuffle();
        });


        $brandstbo = Cache::remember($cacheKeys['brandstbo'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 3)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(12)
                ->get()
                ->shuffle();
        });

        $brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
            return    HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 4)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(25)
                ->get()
                ->shuffle();
        });


        $brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 5)
                ->orderBy('inventory_backup', 'ASC')
                ->take(48)
                ->get()
                ->shuffle();
        });



        // Define the path where the JSON file is stored
        $filePath = public_path('oidata/articles.json');

        // Read the data back from the JSON file
        $articles = Cache::remember($cacheKeys['articles_data_cache_english'], $cacheExpiration, function () use ($filePath) {
            // If the data is not in Redis, read it from the file
            if (file_exists($filePath)) {
                $storedData = json_decode(file_get_contents($filePath), true);
                return $storedData['data'] ?? []; // Return the data or an empty array if not found
            } else {
                return []; // Default to an empty array if the file does not exist
            }
        });

        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideo'], $cacheExpiration, function () use ($youtubeApiKey) {

            $videosData = [];

            // Fetch all videos with the required fields
            $videos = Videos::query()
                ->select(
                    'fih_id as id',
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as imageurl',
                    'fih_date as date',
                    'fih_description as description',
                    'fih_views as views',
                    'fih_status as priority'
                )
                ->orderBy('fih_date', 'ASC')
                ->get();

            // Extract video IDs and make a bulk API call to get view counts
            $videoIds = $videos->map(function ($vdo) {
                return $this->extractYouTubeVideoId($vdo->url);
            })->filter()->toArray();

            // Get view counts for all videos in one API call
            $videoViewCounts = $this->getYouTubeVideoViewCount($videoIds, $youtubeApiKey);
            foreach ($videos as $vdo) {
                $videoId = $this->extractYouTubeVideoId($vdo->url);
                // dd($videoId);
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }

                $videosData[] = $vdo->toArray();
            }
            // dd($vdo->save());

            return $videosData;
        });


        $brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

        return view('newHomepage.newmasterhomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));

        // return view('layout.masternewhomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
    }

    public function hindinewhomepage()
    {
        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache' => 'articles_data_cache',
            'fivideohi' => 'fivideohi',

        ];
        // Define cache expiration time in seconds
        $cacheExpiration = 3600; // You can adjust this as needed

        // Check if the 'brandslft' data exists in the cache
        $isBrandslftCached = Cache::has($cacheKeys['brandslft']);
        // Retrieve cached data or fetch and cache if not available
        $brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 2)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(4)
                ->get()
                ->shuffle();
        });

        $brandstbo = Cache::remember($cacheKeys['brandstbo'], $cacheExpiration, function () {
            return HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 3)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(12)
                ->get()
                ->shuffle();
        });

        $brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
            return  HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 4)
                ->where('page_type', 1)
                ->orderBy('inventory_backup', 'ASC')
                ->take(25)
                ->get()
                ->shuffle();
        });

        $brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
            return  HomePremiumPageBrand::query()
                ->where('status', 1)
                ->where('brand_section', 5)
                ->orderBy('inventory_backup', 'ASC')
                ->take(48)
                ->get()
                ->shuffle();
        });


        $filePath = public_path('oidata/articlehindi.json');


        $articles = Cache::remember($cacheKeys['articles_data_cache'], $cacheExpiration, function () use ($filePath) {
            // If the data is not in Redis, read it from the file
            if (file_exists($filePath)) {
                $storedData = json_decode(file_get_contents($filePath), true);
                return $storedData['data'] ?? []; // Return the data or an empty array if not found
            } else {
                return []; // Default to an empty array if the file does not exist
            }
        });

        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideohi'], $cacheExpiration, function () use ($youtubeApiKey) {

            $videosData = [];

            // Fetch all videos with the required fields
            $videos = Videos::query()
                ->select(
                    'fih_id as id',
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as imageurl',
                    'fih_date as date',
                    'fih_description as description',
                    'fih_views as views',
                    'fih_status as priority'
                )
                ->orderBy('fih_date', 'ASC')
                ->get();

            // Extract video IDs and make a bulk API call to get view counts
            $videoIds = $videos->map(function ($vdo) {
                return $this->extractYouTubeVideoId($vdo->url);
            })->filter()->toArray();

            // Get view counts for all videos in one API call
            $videoViewCounts = $this->getYouTubeVideoViewCount($videoIds, $youtubeApiKey);
            foreach ($videos as $vdo) {
                $videoId = $this->extractYouTubeVideoId($vdo->url);
                // dd($videoId);
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }

                $videosData[] = $vdo->toArray();
            }
            // dd($vdo->save());

            return $videosData;
        });

        // dd($videos);
        $brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

        //  dd($articles);
        return view('newHomepage.newmasterhomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos'));


        // return view('layout.hindihomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
    }

    public function insights_news()
    {
        $articles = InsightList::query()
            ->where('status', 1)
            ->where('insight_type', ['News'])
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        $articles2 = InsightList::query()
            ->where('status', 1)
            ->where('insight_type', ['Interview'])
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        dd($articles);
        return view('newhomepage.f_news')->with(compact('articles', 'articles2'));
    }


    public function insights_news_hi()
    {
        $articles = InsightListHindi::query()
            ->where('status', 1)
            ->where('insight_type', ['Article'])
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        return view('newhomepage.f_news')->with(compact('articles'));
    }
}
