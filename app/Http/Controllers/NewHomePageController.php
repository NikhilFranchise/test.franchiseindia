<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FranchisorBusinessDetail;
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

		// $ch = curl_init('https://www.opportunityindia.com/api/article/hindiapidata');
		// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		// $result = curl_exec($ch);
		// curl_close($ch);
		// $articles = json_decode($result, true);
		$filePath = public_path('oidata/articlehindi.json');

		// Read the data back from the JSON file
		// if (file_exists($filePath)) {
		// 	$storedData = json_decode(file_get_contents($filePath), true);
		// 	$articles = $storedData['data'] ?? [];
		// } else {
		// 	$articles = []; // Default to an empty array if the file does not exist
		// }
		$articles = Cache::remember($cacheKeys['articles_data_cache'], $cacheExpiration, function () use ($filePath) {
			// If the data is not in Redis, read it from the file
			if (file_exists($filePath)) {
				$storedData = json_decode(file_get_contents($filePath), true);
				return $storedData['data'] ?? []; // Return the data or an empty array if not found
			} else {
				return []; // Default to an empty array if the file does not exist
			}
		});
		// dd($articles);
		$brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

		return view('cvw.homepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc'));
	}

	public function homeNew(Request $request)
	{
		$cacheKeys = [
			'brandslft' => 'brandslft_cache',
			'brandstbo' => 'brandstbo_cache',
			'brandstfo' => 'brandstfo_cache',
			'brandsffc' => 'brandsffc_cache',
			'articles_data_cache_english'=>'articles_data_cache_english'
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

		// $brandslft = HomePremiumPageBrand::query()
		// 	->where('status', 1)
		// 	->where('brand_section', 2)
		// 	->where('page_type', 1)
		// 	->orderBy('inventory_backup', 'ASC')
		// 	->take(4)
		// 	->get()
		// 	->shuffle();
		// $brandstbo = HomePremiumPageBrand::query()
		// 	->where('status', 1)
		// 	->where('brand_section', 3)
		// 	->where('page_type', 1)
		// 	->orderBy('inventory_backup', 'ASC')
		// 	->take(12)
		// 	->get()
		// 	->shuffle();
		// $brandstfo = HomePremiumPageBrand::query()
		// 	->where('status', 1)
		// 	->where('brand_section', 4)
		// 	->where('page_type', 1)
		// 	->orderBy('inventory_backup', 'ASC')
		// 	->take(25)
		// 	->get()
		// 	->shuffle();
		// $brandsffc = HomePremiumPageBrand::query()
		// ->where('status', 1)
		// ->where('brand_section', 5)
		// ->orderBy('inventory_backup', 'ASC')
		// ->take(48)
		// ->get()
		// ->shuffle();

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
		
		// dd($articles);
		// if (file_exists($filePath)) {
		// 	$storedData = json_decode(file_get_contents($filePath), true);
		// 	$articles = $storedData['data'] ?? [];
		// 	dd($articles);
		// } else {
		// 	$articles = []; // Default to an empty array if the file does not exist
		// }
		$brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();


		return view('cvw.homepage')->with(compact('articles', 'brands', 'brandstfo', 'brandslft', 'brandstbo',	'brandsffc'));
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
}
