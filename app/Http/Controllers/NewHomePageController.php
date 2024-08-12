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

		return view('layout.hindihomepage')->with(compact('articles', 'brands'));
	}

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

			// Read the data back from the JSON file
			if (file_exists($filePath)) {
				$storedData = json_decode(file_get_contents($filePath), true);
				$articles = $storedData['data'] ?? [];
			} else {
				$articles = []; // Default to an empty array if the file does not exist
			}


		return view('layout.masternewhomepage')->with(compact('articles', 'brands'));

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
