<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryFinal;
use App\Models\NewsList;
use App\Models\DealersFranchisor;
use App\Models\FranchisorBusinessDetail;
use App\Models\SeoTagHindi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    	$franchisors = DealersFranchisor::query()->select('franchisor_id')->where('status', 1)->take($count)->get()->pluck('franchisor_id');
    	return FranchisorBusinessDetail::query()->select('fran_detail_id', 'profile_name', 'company_logo', 'unit_inv_min', 'unit_inv_max')->whereIn('franchisor_id', $franchisors)->get();
  	}

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchForDealerHomePage()
    {
        $companies = FranchisorBusinessDetail::query()
            ->select(DB::raw("CONCAT(franchisor_business_details.company_name, ' - <strong> in ', category_final.catname,'<%2Fstrong>') AS name"))
            ->where('profile_status', 1)
            ->where('company_name', 'LIKE', "%".request()->search."%")
            ->leftJoin('category_final', 'category_final.catid', '=', 'franchisor_business_details.ind_sub_cat');

        $result = CategoryFinal::query()
            ->select("catname as name") 
            ->where('category_final.catname', 'LIKE', "%".request()->search."%")
            ->union($companies)
            ->take(20)
            ->get();
        $i = 0;
        foreach ($result as $res) {
            $result[$i]['name'] = str_replace('/', '-or-', $result[$i]['name']);
            $result[$i]['name'] = str_replace('%2F', '/', $result[$i]['name']);
            $i++;
        }

        return response()->json($result, 200);
    }

    /**
     * result for search submit
     */
    public function searchDealer()
    {
        request()->search = str_replace('-or-', '/', request()->search);
        $type = 'm';
        $catId = CategoryFinal::query()->select('catid', 'catname', 'parent_id')->where('catname', request()->search)->first();
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

}
