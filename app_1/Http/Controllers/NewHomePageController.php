<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\HomePremiumPageBrand;
use App\Models\Videos;
use App\Models\InsightList;
use App\Models\InsightListHindi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Detection\MobileDetect;

class NewHomePageController extends Controller
{

    // public function test(Request $request){
    //     return view('newHomepage.test');
    // }

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
            'upcoming_events' => 'upcoming_events_cache',

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

        $news = InsightListHindi::query()->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date')
            ->with('category')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('insight_type', 'News')
            ->whereNot('cat_id', '=', '')
            ->orderByEffectiveDate('desc')
            ->limit(16)
            ->get();

        $articles = InsightListHindi::query()->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date')
            ->with('category')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('insight_type', 'Article')
            ->whereNot('cat_id', '=', '')
            ->orderByEffectiveDate('desc')
            ->limit(16)
            ->get();

        $interviews = InsightListHindi::query()->select('slug', 'cat_id', 'image', 'news_id', 'title', 'created_at', 'published_date')
            ->with('category')
            ->withEffectiveDate()
            ->where('status', 1)
            ->where('insight_type', 'Interview')
            ->whereNot('cat_id', '=', '')
            ->orderByEffectiveDate('desc')
            ->limit(16)
            ->get();

        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideohi'], $cacheExpiration, function () use ($youtubeApiKey) {

            $videosData = [];

            // Force thumbnail update one time (set TRUE once)
            $forceThumbnailUpdate = false;  // change to true to force regeneration

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
                $thumbnail = $videoId
                    ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg"
                    : null;
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }

                if ($forceThumbnailUpdate || empty($vdo->imageurl) ||  $thumbnail !== $vdo->imageurl) {
                    Videos::query()
                        ->where('fih_id', $vdo->id)
                        ->update(['fih_imageurl' => $thumbnail]);
                }

                $vData = $vdo->toArray();
                $vData['thumbnail'] = $thumbnail;
                $videosData[] = $vData;
                // $videosData[] = $vdo->toArray();
            }

            return $videosData;
        });
        $events = Cache::remember($cacheKeys['upcoming_events'], $cacheExpiration, function () {
            // Fetch upcoming events logic here
            $eventsdata = [];
            $events = Events::query()
                ->select(
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as image',
                    'fih_displaydate as date',
                    'fih_address as venue',
                    'fih_mobile as contact',
                    'fih_homepage as isDisplayOnHome',
                    'fih_status as status',
                )->where('fih_status', 1)
                ->where('fih_homepage', 1)
                ->where('fih_date', '>=', Carbon::now())
                ->orderBy('fih_date', 'ASC')
                ->get();
            foreach ($events as $event) {
                $eventsdata[] = $event->toArray();
            }
            return $eventsdata;
        });

        return view('newHomepage.newmasterhomepage')->with(compact('news', 'articles', 'interviews',  'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos', 'events'));
    }


    public function homeNew(Request $request, MobileDetect $detect)
    {
        if (request()->segment(1) != 'hi') {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }

        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache_english' => 'articles_data_cache_english',
            'fivideo' => 'fivideo',
            'upcoming_events' => 'upcoming_events_cache',
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
                ->select('brand_id', 'brand_img', 'brand_link', 'brand_alt', 'brand_heading', 'investment_range', 'investment_range_new', 'area_required', 'brand_category', 'brand_category_id', 'page_type', 'weightage', 'status', 'brand_section', 'franchise_outlets')
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

        if (!$detect->isMobile()) {
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


        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideo'], $cacheExpiration, function () use ($youtubeApiKey) {
            $videosData = [];
            // Force thumbnail update one time (set TRUE once)
            $forceThumbnailUpdate = false;  // change to true to force regeneration

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
                $thumbnail = $videoId
                    ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg"
                    : null;
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }
               if (
                $forceThumbnailUpdate ||
                empty($vdo->imageurl) ||
                $thumbnail !== $vdo->imageurl
            ) {
                Videos::query()
                    ->where('fih_id', $vdo->id)
                    ->update(['fih_imageurl' => $thumbnail]);
            }

                if ($forceThumbnailUpdate || empty($vdo->imageurl) ||  $thumbnail !== $vdo->imageurl) {
                    Videos::query()
                        ->where('fih_id', $vdo->id)
                        ->update(['fih_imageurl' => $thumbnail]);
                }

                $vData = $vdo->toArray();
                $vData['thumbnail'] = $thumbnail;
                $videosData[] = $vData;
                // $videosData[] = $vdo->toArray();
            }

            return $videosData;
        });
        // events data can be added here similarly if needed
        $events = Cache::remember($cacheKeys['upcoming_events'], $cacheExpiration, function () {
            // Fetch upcoming events logic here
            $eventsdata = [];
            $events = Events::query()
                ->select(
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as image',
                    'fih_displaydate as date',
                    'fih_address as venue',
                    'fih_mobile as contact',
                    'fih_homepage as isDisplayOnHome',
                    'fih_status as status',
                )->where('fih_status', 1)
                ->where('fih_homepage', 1)
                ->where('fih_date', '>=', Carbon::now())
                ->orderBy('fih_date', 'ASC')
                ->get();
            foreach ($events as $event) {
                $eventsdata[] = $event->toArray();
            }
            return $eventsdata;
        });

        if (!$detect->isMobile()) {
            return view('newHomepage.newmasterhomepage')->with(compact('news', 'articles', 'interviews', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos', 'events'));
        } else {
            return view('newHomepage.newmasterhomepage')->with(compact('brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos', 'events'));
        }
    }

      public function nofollow(Request $request, MobileDetect $detect)
    {
        if (request()->segment(1) != 'hi') {
            app()->setLocale('en');
            session()->put('locale', 'en');
        }

        $cacheKeys = [
            'brandslft' => 'brandslft_cache',
            'brandstbo' => 'brandstbo_cache',
            'brandstfo' => 'brandstfo_cache',
            'brandsffc' => 'brandsffc_cache',
            'articles_data_cache_english' => 'articles_data_cache_english',
            'fivideo' => 'fivideo',
            'upcoming_events' => 'upcoming_events_cache',
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
                ->select('brand_id', 'brand_img', 'brand_link', 'brand_alt', 'brand_heading', 'investment_range', 'investment_range_new', 'area_required', 'brand_category', 'brand_category_id', 'page_type', 'weightage', 'status', 'brand_section', 'franchise_outlets')
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

        if (!$detect->isMobile()) {
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


        $youtubeApiKey = 'AIzaSyCB2nVhCCrLyMmHhAdIuGVBOyV_ywUATUA';
        $videos = Cache::remember($cacheKeys['fivideo'], $cacheExpiration, function () use ($youtubeApiKey) {
            $videosData = [];
            // Force thumbnail update one time (set TRUE once)
            $forceThumbnailUpdate = false;  // change to true to force regeneration

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
                $thumbnail = $videoId
                    ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg"
                    : null;
                if ($videoId && isset($videoViewCounts[$videoId])) {
                    $viewCount = $videoViewCounts[$videoId];

                    if ($vdo->fih_views != $viewCount) {
                        // Update the view count in the database
                        Videos::query()->where('fih_url', $vdo->url)
                            ->update(['fih_views' => $viewCount]);
                    }
                }
               if (
                $forceThumbnailUpdate ||
                empty($vdo->imageurl) ||
                $thumbnail !== $vdo->imageurl
            ) {
                Videos::query()
                    ->where('fih_id', $vdo->id)
                    ->update(['fih_imageurl' => $thumbnail]);
            }

                if ($forceThumbnailUpdate || empty($vdo->imageurl) ||  $thumbnail !== $vdo->imageurl) {
                    Videos::query()
                        ->where('fih_id', $vdo->id)
                        ->update(['fih_imageurl' => $thumbnail]);
                }

                $vData = $vdo->toArray();
                $vData['thumbnail'] = $thumbnail;
                $videosData[] = $vData;
                // $videosData[] = $vdo->toArray();
            }

            return $videosData;
        });
        // events data can be added here similarly if needed
        $events = Cache::remember($cacheKeys['upcoming_events'], $cacheExpiration, function () {
            // Fetch upcoming events logic here
            $eventsdata = [];
            $events = Events::query()
                ->select(
                    'fih_title as title',
                    'fih_url as url',
                    'fih_imageurl as image',
                    'fih_displaydate as date',
                    'fih_address as venue',
                    'fih_mobile as contact',
                    'fih_homepage as isDisplayOnHome',
                    'fih_status as status',
                )->where('fih_status', 1)
                ->where('fih_homepage', 1)
                ->where('fih_date', '>=', Carbon::now())
                ->orderBy('fih_date', 'ASC')
                ->get();
            foreach ($events as $event) {
                $eventsdata[] = $event->toArray();
            }
            return $eventsdata;
        });

        if (!$detect->isMobile()) {
            return view('nofollow_home.newmasterhomepage')->with(compact('news', 'articles', 'interviews', 'brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos', 'events'));
        } else {
            return view('nofollow_home.newmasterhomepage')->with(compact('brandstfo', 'brandslft', 'brandstbo',    'brandsffc', 'videos', 'events'));
        }
    }


    private function extractYouTubeVideoId($url)
    {
        preg_match('/v=([^\&\?\/]+)/', $url, $matches);
        return $matches[1] ?? null;
    }



    private function getYouTubeVideoViewCount(array $videoIds, $apiKey)
    {
        // Generate a unique cache key based on the video IDs
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

    public static function getImageUrl($url)
    {
        if (request()->segment(1) == 'hi') {

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

    // public function insights_news()
    // {
    //     $articles = InsightList::query()
    //         ->where('status', 1)
    //         ->whereIn('insight_type', ['News'])
    //         ->orderByDesc('created_at')
    //         ->limit(10)
    //         ->get();

    //     $articles2 = InsightList::query()
    //         ->where('status', 1)
    //         ->whereIn('insight_type', ['Interview'])
    //         ->orderByDesc('created_at')
    //         ->limit(10)
    //         ->get();

    //     return view('newhomepage.f_news')->with(compact('articles', 'articles2'));
    // }


    // public function insights_news_hi()
    // {
    //     $articles = InsightListHindi::query()
    //         ->where('status', 1)
    //         ->whereIn('insight_type', ['Article'])
    //         ->orderByDesc('created_at')
    //         ->limit(10)
    //         ->get();

    //     return view('newhomepage.f_news')->with(compact('articles'));
    // }
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
}
