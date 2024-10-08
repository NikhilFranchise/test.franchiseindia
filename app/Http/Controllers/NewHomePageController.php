<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FranchisorBusinessDetail;
use App\Models\Videos;
use App\Models\HomePremiumPageBrand;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;



class NewHomePageController extends Controller
{
	public function hindiHomePage()
	{


		$cacheKeys = [
			'brandslft' => 'brandslft_cache',
			'brandstbo' => 'brandstbo_cache',
			'brandstfo' => 'brandstfo_cache',
			'brandsffc' => 'brandsffc_cache',
			'articles_data_cache'=>'articles_data_cache',
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
				->select('fih_id as id', 'fih_title as title', 'fih_url as url', 'fih_imageurl as imageurl',
						'fih_date as date', 'fih_description as description', 'fih_views as views',
						'fih_status as priority')
				->orderBy('fih_date', 'ASC')
				->get();

			// Extract video IDs and make a bulk API call to get view counts
			$videoIds = $videos->map(function($vdo) {
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
		// $brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

		return view('cvw.homepage')->with(compact('articles',  'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));


		// return view('layout.hindihomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
	}

	public function homeNew(Request $request)
	{
		$cacheKeys = [
			'brandslft' => 'brandslft_cache',
			'brandstbo' => 'brandstbo_cache',
			'brandstfo' => 'brandstfo_cache',
			'brandsffc' => 'brandsffc_cache',
			'articles_data_cache_english'=>'articles_data_cache_english',
			'fivideo' => 'fivideo',
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
        // dd($brandslft);
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
			return	HomePremiumPageBrand::query()
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
				->select('fih_id as id', 'fih_title as title', 'fih_url as url', 'fih_imageurl as imageurl',
						'fih_date as date', 'fih_description as description', 'fih_views as views',
						'fih_status as priority')
				->orderBy('fih_date', 'ASC')
				->get();

			// Extract video IDs and make a bulk API call to get view counts
			$videoIds = $videos->map(function($vdo) {
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


		// $brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

		return view('cvw.homepage')->with(compact('articles', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));

		// return view('layout.masternewhomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
	}


	private function extractYouTubeVideoId($url) {
		preg_match('/v=([^\&\?\/]+)/', $url, $matches);
		return $matches[1] ?? null;
	}


	// private function getYouTubeVideoViewCount(array $videoIds, $apiKey) {
	// 	$ids = implode(',', $videoIds);
	// 	$url = "https://www.googleapis.com/youtube/v3/videos?part=statistics&id={$ids}&key={$apiKey}";

	// 	$response = file_get_contents($url);
	// 	$data = json_decode($response, true);

	// 	$viewCounts = [];
	// 	if (isset($data['items'])) {
	// 		foreach ($data['items'] as $item) {
	// 			$viewCounts[$item['id']] = $item['statistics']['viewCount'];
	// 		}
	// 	}

	// 	return $viewCounts;
	// }

	private function getYouTubeVideoViewCount(array $videoIds, $apiKey) {
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



	//Nikhil


	public function cvwhindiHomePage()
	{

		// dd('yes');

		$cacheKeys = [
			'brandslft' => 'brandslft_cache',
			'brandstbo' => 'brandstbo_cache',
			'brandstfo' => 'brandstfo_cache',
			'brandsffc' => 'brandsffc_cache',
			'articles_data_cache'=>'articles_data_cache',
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
				->select('fih_id as id', 'fih_title as title', 'fih_url as url', 'fih_imageurl as imageurl',
						'fih_date as date', 'fih_description as description', 'fih_views as views',
						'fih_status as priority')
				->orderBy('fih_date', 'ASC')
				->get();

			// Extract video IDs and make a bulk API call to get view counts
			$videoIds = $videos->map(function($vdo) {
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
		return view('cvw.homepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));


		// return view('layout.hindihomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
	}

	public function cvwhomeNew(Request $request)
	{
		$cacheKeys = [
			'brandslft' => 'brandslft_cache',
			'brandstbo' => 'brandstbo_cache',
			'brandstfo' => 'brandstfo_cache',
			'brandsffc' => 'brandsffc_cache',
			'articles_data_cache_english'=>'articles_data_cache_english',
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
			return	HomePremiumPageBrand::query()
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
				->select('fih_id as id', 'fih_title as title', 'fih_url as url', 'fih_imageurl as imageurl',
						'fih_date as date', 'fih_description as description', 'fih_views as views',
						'fih_status as priority')
				->orderBy('fih_date', 'ASC')
				->get();

			// Extract video IDs and make a bulk API call to get view counts
			$videoIds = $videos->map(function($vdo) {
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

		return view('cvw.homepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));

		// return view('layout.masternewhomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
	}

    public function cwvMobile(Request $request)
	{
		$cacheKeys = [
			'brandslft' => 'brandslft_cache',
			'brandstbo' => 'brandstbo_cache',
			'brandstfo' => 'brandstfo_cache',
			'brandsffc' => 'brandsffc_cache',
			'articles_data_cache_english'=>'articles_data_cache_english',
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
			return	HomePremiumPageBrand::query()
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
				->select('fih_id as id', 'fih_title as title', 'fih_url as url', 'fih_imageurl as imageurl',
						'fih_date as date', 'fih_description as description', 'fih_views as views',
						'fih_status as priority')
				->orderBy('fih_date', 'ASC')
				->get();

			// Extract video IDs and make a bulk API call to get view counts
			$videoIds = $videos->map(function($vdo) {
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

		return view('cwv-mobile.homepage-mobile')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));

		// return view('layout.masternewhomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
	}

    public function cwvMobilehindiHomePage()
	{
		$cacheKeys = [
			'brandslft' => 'brandslft_cache',
			'brandstbo' => 'brandstbo_cache',
			'brandstfo' => 'brandstfo_cache',
			'brandsffc' => 'brandsffc_cache',
			'articles_data_cache'=>'articles_data_cache',
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
				->select('fih_id as id', 'fih_title as title', 'fih_url as url', 'fih_imageurl as imageurl',
						'fih_date as date', 'fih_description as description', 'fih_views as views',
						'fih_status as priority')
				->orderBy('fih_date', 'ASC')
				->get();

			// Extract video IDs and make a bulk API call to get view counts
			$videoIds = $videos->map(function($vdo) {
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
		return view('cwv-mobile.homepage-mobile')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));


		// return view('layout.hindihomepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc','videos'));
	}
}
