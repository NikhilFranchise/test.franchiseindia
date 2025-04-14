<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryFinal;
use App\Models\NewsList;
use App\Models\DealersFranchisor;
use App\Models\FranchisorBusinessDetail;
use App\Models\SeoTagHindi;
use App\Models\InsightList;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\UserAccount;
use App\Models\InvestorDetails;

class DealersAndDistributorController extends Controller
{
    /**
     * @return mixed
     * International Home page data fetching and displaying
     */
    public function getHomePage()
    {
        $brands          = $this->getDealersBrands(25)->shuffle();
        if(request()->segment(1) == 'hi'){
            $tag          = SeoTagHindi::query()->first();
            $newsArticles = NewsList::query()->where('status',1)->where('is_hindi', 1)->orderBy('news_id', 'DESC')->take(9)->get();
            return view('dealers-and-distributor.homepage-hindi')->with(compact('newsArticles', 'brands', 'tag'));
        }
        $newsArticles    = NewsList::query()->orderBy('news_id', 'DESC')->take(18)->get();

        return view('dealers-and-distributor.homepage')->with(compact('newsArticles', 'brands'));
    }

    /**
     * @param $count
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * Get international home page brands
     */
    public function getDealersBrands($count)
  	{	
        // dd('yes');
    	$franchisors = DealersFranchisor::query()->select('franchisor_id')->where('status', 1)->take($count)->get()->pluck('franchisor_id');
    	return FranchisorBusinessDetail::query()->select('fran_detail_id', 'profile_name', 'company_logo', 'unit_inv_min', 'unit_inv_max')->whereIn('franchisor_id', $franchisors)->get();
  	}

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchForDealerHomePage()
    {
        // dd('yeee');
        $companies = FranchisorBusinessDetail::query()
            ->select(DB::raw("CONCAT(franchisor_business_details.company_name, ' - <strong> in ', category_final.catname,'<%2Fstrong>') AS name"))
            ->whereIn('profile_status', [1,11])
            ->where('company_name', 'LIKE', "%".request()->search."%")
            ->leftJoin('category_final', 'category_final.catid', '=', 'franchisor_business_details.ind_sub_cat')
            // ->take(2)
            ->limit(2)
            ->get()
            ->map(function ($item) {
                $item['type'] = 'company';
                return $item;
            });

            $result = CategoryFinal::query()
            ->select("catname as name")
            ->where('category_final.catname', 'LIKE', "%".request()->search."%")
            // ->take(2)
            ->limit(2)
            ->get()
            ->map(function ($item) {
                $item['type'] = 'category'; // Add this line
                return $item;
            });
            // dd($result);
        
        $result2 = InsightList::query()
            ->select('title as name','news_id')  // Renamed 'title' to 'name' for consistency
            ->where('title', 'LIKE', "%".request()->search."%")
            ->where('status', 1)
            // ->take(2)
            ->limit(2)
            ->get()
            ->map(function ($item) {
                $item['type'] = 'article'; // Add this line

                return $item;
            });
        
        // Convert collections to arrays
        $companiesArray = $companies->toArray();
        $resultArray = $result->toArray();
        $result2Array = $result2->toArray();
        
        // Merge the two arrays
        $mergedResults = array_merge($companiesArray, $resultArray, $result2Array);
        // $mergedResults = array_merge($resultArray, $result2Array);
        
        // Now apply the transformations on the names
        foreach ($mergedResults as $key => $res) {
            $mergedResults[$key]['name'] = str_replace('/', '-or-', $res['name']);
            // $mergedResults[$key]['name'] = str_replace('%2F', '/', $res['name']);
            $mergedResults[$key]['name'] = str_replace('%2F', '/', $mergedResults[$key]['name']);
        }
        // dd($mergedResults); // <---- ADD THIS TO SEE RESULT

        // Return the merged and modified result as a JSON response
        return response()->json($mergedResults, 200);
        // return response()->json($result, 200);        
        
    }

    /**
     * result for search submit
     */
    public function searchDealer()
    {
        // dd(request()->search);
        // dd('ues');
        request()->search = str_replace('-or-', '/', request()->search);
        $type = 'm';
        $catId = CategoryFinal::query()->select('catid', 'catname', 'parent_id')->where('catname', request()->search)->first();
        // dd($catId);
        if(!empty($catId)) {
            
            if(!empty($catId->parent_id)){
                $subCatCheck = CategoryFinal::query()->select('parent_id')->where('catid', $catId->parent_id)->first();
                if(!empty($subCatCheck) && empty($subCatCheck->parent_id))
                    $type = 'sc';
                else
                    $type = 'ssc';
            }
            $url =  'business-opportunities/'.Str::slug($catId->catname).'.'.$type.$catId->catid;
            return redirect($url);
        }
 
        return redirect('/category/search?text='.request()->search);
    }

    public function dealerhomepage(Request $request)
    {
        // dd('yes');
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
        ]);
        return response()->json(['success' => true, 'message' => 'Query submitted successfully']);
    }


    public function getRelatedArticles($query)
    {
        // Example: Fetch related articles based on the search query
        // Replace with your actual database or logic to find related articles

        $articles = [
            [
                'title' => 'How to Find Business Opportunities',
                'url' => url('/articles/business-opportunities'),
            ],
            [
                'title' => 'Top Dealers in Your Area',
                'url' => url('/articles/top-dealers'),
            ],
            // You can dynamically fetch articles based on the query from the database
        ];

        // Return the related articles as a JSON response
        return response()->json($articles);
    }
}
