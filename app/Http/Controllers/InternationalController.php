<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NewsList;
use App\Models\InsightList;
use App\Models\InternationalFranchisor;
use App\Models\FranchisorBusinessDetail;

class InternationalController extends Controller
{
  //
  //International Home page data fetching and displaying
  public function getHomePage()
  {
    //News
    // $newsArticles    = NewsList::orderBy('news_id', 'DESC')->take(18)->get();
    $newsArticles    = InsightList::with('category')->orderBy('news_id', 'DESC')->where('insight_type', 'News')->where('status', 1)->take(18)->get();
    $newsArticles = CommonController::contentUrlSlug($newsArticles);
    $brands          = $this->getInternationalBrands(15)->shuffle();

    return view('franchise-international.homepage')->with(compact('newsArticles', 'brands'));
  }

  //Get international home page brands
  public function getInternationalBrands($count)
  {
    $franchisors = InternationalFranchisor::select('franchisor_id')->where('status', 1)->take($count)->get()->pluck('franchisor_id');
    return FranchisorBusinessDetail::select('fran_detail_id', 'profile_name', 'company_logo', 'unit_investment')->whereIn('franchisor_id', $franchisors)->get();
  }
}
