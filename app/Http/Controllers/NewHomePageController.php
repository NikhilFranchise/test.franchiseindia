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
		

		$brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

		$cacheKeys = [
			'brandslft' => 'brandslft_cache',
			'brandstbo' => 'brandstbo_cache',
			'brandstfo' => 'brandstfo_cache',
			'brandsffc' => 'brandsffc_cache',
		];
		// Define cache expiration time in seconds
		$cacheExpiration = 90; // You can adjust this as needed
	
		// Check if the 'brandslft' data exists in the cache
		$isBrandslftCached = Cache::has($cacheKeys['brandslft']);
		// dd($isBrandslftCached);
		// dd($request->all());
		$brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();
		
		// Retrieve cached data or fetch and cache if not available
		$brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
			$data = HomePremiumPageBrand::query()
				->where('status', 1)
				->where('brand_section', 2)
				->where('page_type', 1)
				->orderBy('inventory_backup', 'ASC')
				->take(4)
				->get()
				->shuffle();
				return $data;

		});

		$cacheDatalft = Cache::get($cacheKeys['brandslft']);
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
		$cacheDatatbo = Cache::get($cacheKeys['brandstbo']);

		$brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
			return HomePremiumPageBrand::query()
				->where('status', 1)
				->where('brand_section', 4)
				->where('page_type', 1)
				->orderBy('inventory_backup', 'ASC')
				->take(25)
				->get()
				->shuffle();
		});
		$cacheDatatfo = Cache::get($cacheKeys['brandstfo']);

		$brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
			return HomePremiumPageBrand::query()
				->where('status', 1)
				->where('brand_section', 5)
				->orderBy('inventory_backup', 'ASC')
				->take(48)
				->get()
				->shuffle();
		});
		$cacheDataffc = Cache::get($cacheKeys['brandsffc']);

		// $ch = curl_init('https://www.opportunityindia.com/api/article/hindiapidata');
		// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		// $result = curl_exec($ch);
		// curl_close($ch);
		// $articles = json_decode($result, true);
		$filePath = public_path('oidata/articlehindi.json');

		// Read the data back from the JSON file
		if (file_exists($filePath)) {
			$storedData = json_decode(file_get_contents($filePath), true);
			$articles = $storedData['data'] ?? [];
		} else {
			$articles = []; // Default to an empty array if the file does not exist
		}
		return view('layout.hindihomepage')->with(compact('articles', 'brands','brandstfo','brandslft','brandstbo',	'brandsffc'));
	}

<<<<<<< HEAD
		public function homeNew(Request $request)
		{
			$cacheKeys = [
				'brandslft' => 'brandslft_cache',
				'brandstbo' => 'brandstbo_cache',
				'brandstfo' => 'brandstfo_cache',
				'brandsffc' => 'brandsffc_cache',
			];
			// Define cache expiration time in seconds
			$cacheExpiration = 90; // You can adjust this as needed
		
			// Check if the 'brandslft' data exists in the cache
			$isBrandslftCached = Cache::has($cacheKeys['brandslft']);
			// dd($isBrandslftCached);
			// dd($request->all());
			$brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();
			
			// Retrieve cached data or fetch and cache if not available
			$brandslft = Cache::remember($cacheKeys['brandslft'], $cacheExpiration, function () {
				$data = HomePremiumPageBrand::query()
					->where('status', 1)
					->where('brand_section', 2)
					->where('page_type', 1)
					->orderBy('inventory_backup', 'ASC')
					->take(4)
					->get()
					->shuffle();
					return $data;
=======
	public function homeNew()
	{
		$brands = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();

		//  // Define the path where the JSON file is stored
		//  $filePath = public_path('data/articles.json');

		//  // Check if the file exists and read the data from the JSON file
		//  if (file_exists($filePath)) {
		// 	 $articles = json_decode(file_get_contents($filePath), true);
		//  } else {
		// 	 $articles = []; // Provide a default value if the file doesn't exist
		//  }
		// //  dd($articles);


			// Define the path where the JSON file is stored
			$filePath = public_path('oidata/articles.json');
>>>>>>> c22968b68a10757a622628c22bac545f5d29476c

			});

			$cacheDatalft = Cache::get($cacheKeys['brandslft']);
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
			$cacheDatatbo = Cache::get($cacheKeys['brandstbo']);

			$brandstfo = Cache::remember($cacheKeys['brandstfo'], $cacheExpiration, function () {
				return HomePremiumPageBrand::query()
					->where('status', 1)
					->where('brand_section', 4)
					->where('page_type', 1)
					->orderBy('inventory_backup', 'ASC')
					->take(25)
					->get()
					->shuffle();
			});
			$cacheDatatfo = Cache::get($cacheKeys['brandstfo']);

			$brandsffc = Cache::remember($cacheKeys['brandsffc'], $cacheExpiration, function () {
				return HomePremiumPageBrand::query()
					->where('status', 1)
					->where('brand_section', 5)
					->orderBy('inventory_backup', 'ASC')
					->take(48)
					->get()
					->shuffle();
			});
			$cacheDataffc = Cache::get($cacheKeys['brandsffc']);

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
			// 	$brandsffc = HomePremiumPageBrand::query()
			// 	->where('status', 1)
			// 	->where('brand_section', 5)
			// 	->orderBy('inventory_backup', 'ASC')
			// 	->take(48)
			// 	->get()
			// 	->shuffle();
			
				// Define the path where the JSON file is stored
				$filePath = public_path('oidata/articles.json');

				// Read the data back from the JSON file
				if (file_exists($filePath)) {
					$storedData = json_decode(file_get_contents($filePath), true);
					$articles = $storedData['data'] ?? [];
				} else {
					$articles = []; // Default to an empty array if the file does not exist
				}


			return view('layout.masternewhomepage')->with(compact('articles', 'brands','brandstfo','brandslft','brandstbo',	'brandsffc'));

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
	public function top100(){
        return view('static.top-100-franchisors');
    }
}
