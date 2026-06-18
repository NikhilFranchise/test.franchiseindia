<?php

namespace App\Http\Controllers;
use App\Models\RiPoll;
use App\Models\NewsList;
use App\Models\FihlVideo;
use App\Models\ContentList;
use App\Models\RiPollAnswer;
use App\Models\SitePageBrand;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ArticleController;

class RestaurantController extends Controller
{
  
    public function articleRestaurant()
    {

        return redirect('https://www.restaurantindia.in/', 301);

        // Initialize variables
        $restaurantPopup     = '';
        $ArticleController   = new ArticleController;
        // Check & Set a cookie for Homepage restaurant show banner
        if (empty(Cookie::get('ripopup17'))) {
            $restaurantPopup = 1;
            Cookie::queue(Cookie::make('ripopup17', 'RI2017'));
        }

        //for restaurant category
        $categoryArticles   = RestaurantCategory::select('category_id','cat_name')->take(17)->get();

        //Restaurent Articles
        $restaurantArticles = $ArticleController->siteHomeArticles('ri', 5, "", "");
        
        $kickersVm          = ['VM Design', 'store launch', 'VM & Design'];
        $vmlaunchArticles   = $ArticleController->restaurantTagsArticles(15, $kickersVm, 'Article');

        $kickersPop         = array('entrepreneur', 'Professional', 'Chef');
        $peopleArticles     = $ArticleController->restaurantTagsArticles(7, $kickersPop, 'Interview');
        
        $kickersStartup     = array('startup', 'start-up');
        $startupArticles    = $ArticleController->restaurantTagsArticles(9, $kickersStartup, 'Interview');

        $growthSect         = array('expansion', 'investment');
        $growthArticles     = $ArticleController->restaurantTagsArticles(9, $growthSect, 'Article');

        $fandbSect          = array('food and beverages', 'cuisine', 'Food and Beverage');
        $fbArticles         = $ArticleController->restaurantTagsArticles(9, $fandbSect, 'Article');

        $operationSect      = array('Marketing', 'Supply Chain', 'Technology');
        $operationArticles  = $ArticleController->restaurantTagsArticles(9, $operationSect, 'Article');

        $supplierSect       = array('Meat Supplier', 'Ingredient Supplier', 'Equipment Supplier');
        $supplierArticles   = $ArticleController->restaurantTagsArticles(9, $supplierSect, 'Article');

        $franKicker         = array('franchise');
        $franchiseArticles  = $ArticleController->restaurantTagsArticles(9, $franKicker, 'Article');

        $researchSect       = array('Reports', 'Whitepapers', 'events', 'Research');
        $researchArticles   = $ArticleController->restaurantTagsArticles(9, $researchSect, 'Article');

        //for Videos
        $videoArticles       = $ArticleController->getvideoArticle(9);

        //for News
        $newsArticles        = $ArticleController->getNews(4);

        //For Tags
        $tags                = ContentList::where('site_type','ri')
                                          ->orderByRaw("RAND()")
                                          ->take(16)
                                          ->get();
        if(!empty($tags)) {
          $tags              = $tags->toArray();
          $tags              = CommonController::contentUrlSlug($tags);
        }

        $pollQuestion        = RiPoll::select('pollID','pollQuestion')->where('pollStatus',1)->first();

        $pollAnswers         = RiPollAnswer::select('pollAnswerID','pollAnswervalue')->where('pollID',$pollQuestion->pollID)->get();
        
        $franIds             = SitePageBrand::select('fihl_id')->where('status', 1)->where('page_type',1)->get();

        if(!empty($franIds))
            $franIds = $franIds->pluck('fihl_id');
          
        $bannerData          = FranchisorBusinessDetail::select('fran_detail_id', 'profile_name', 'company_logo')
                                                       ->whereIn('franchisor_id', $franIds)
                                                       ->get();

        return view('article/restaurant/restauranthome', compact('restaurantArticles','startupArticles', 'restaurantPopup',
                                                                     'peopleArticles','growthArticles','fbArticles','operationArticles',
                                                                     'supplierArticles','franchiseArticles','researchArticles',
                                                                      'vmlaunchArticles','tags','videoArticles','newsArticles',
                                                                     'categoryArticles','pollQuestion','pollAnswers', 'bannerData'));
    }


    public function restaurantCategory(Request $request)
    {
        $categoryId  = $request->categoryId;
        $subcategory = RestaurantCategory::select('cat_name')
                                            ->where('parent_id', $categoryId)->get();

        $sub = "<option value=''>Choose a Sub Category</option>";
        foreach($subcategory as $index=>$value) {
            $sub .= "<option value=$index>$value->cat_name</option>";
        }
        return $sub;
    }


    public function restaurantState(Request $request)
    {
        $sub      = "<option value=''>Choose a City</option>";
        $stateId  = $request->state;
        $city     = Config('location.cityArr.'.$stateId);

        foreach($city as $index=>$value) {
            $sub .= "<option value='$value'>$value</option>";
        }

        return $sub;
    }


    public function restaurantSearch(Request $request)
    {
        $category          = $request->mainCategory;
        $subCategory       = $request->subCategory;
        $state             = $request->stateSection;
        $city              = $request->citySection;

        $categoryArticles  = RestaurantCategory::select('cat_name')
                                               ->where('category_id',$category)->first();

        $categoryUrl       = CommonController::cleanSpecialChar(strtolower($categoryArticles['cat_name']));
        $cityUrl           = CommonController::cleanSpecialChar($city);

       if (($category != '') && ($subCategory != '') && ($state != '') && ($city != ''))
           return redirect('http://www.restaurantindia.in/supplier/'.$categoryUrl.'/'.$cityUrl.'/');
       else if (($category != '') && ($subCategory != '') && ($state != '') && ($city == ''))
           return redirect('http://www.restaurantindia.in/supplier/'.$categoryUrl.'/'.$state.'/');
       else if (($category != '') && ($subCategory != '') && ($state == '') && ($city == ''))
           return redirect('http://www.restaurantindia.in/supplier/'.$categoryUrl.'/all/');
       else if (($category == '') && ($subCategory == '') && ($state != '') && ($city != ''))
           return redirect('http://www.restaurantindia.in/supplier/all/'.$cityUrl.'/');
       else
           return redirect('http://www.restaurantindia.in/supplier/all/all/');
    }

    public function vote(Request $request)
    {
        $value  = $request->poll;
        $points = 0;
        if (Cookie::get('poll') !== null)
            return "voted";
        else {
            $answerPoint = RiPollAnswer::select('pollAnswerPoints', 'pollID')
                                            ->where('pollAnswerValue', $value)
                                            ->first();

            RiPollAnswer::where('pollAnswerValue', $value)
                           ->update(['pollAnswerPoints' => $answerPoint->pollAnswerPoints + 1]);

            $totalPoints = RiPollAnswer::select('pollAnswerPoints')
                                    ->where('pollID', $answerPoint->pollID)->get();

            $i = 0;
            while ($i < count($totalPoints)) {
                $points += $totalPoints[$i]['pollAnswerPoints'];
                $i++;
            }

            $percent1 = round((($totalPoints[0]['pollAnswerPoints'] * 100) / $points), 3);
            $percent2 = round((($totalPoints[1]['pollAnswerPoints'] * 100) / $points), 3);
            $percent3 = round((($totalPoints[2]['pollAnswerPoints'] * 100) / $points), 3);
            $percent4 = round((($totalPoints[3]['pollAnswerPoints'] * 100) / $points), 3);

            $expire = time() + 60 * 60 * 24 * 30;
            Cookie::queue(Cookie::make('poll', 'poll', $expire));
            return response()->json(array
                                        ("point1" => $percent1,
                                        "point2" => $percent2,
                                        "point3" => $percent3,
                                        "point4" => $percent4,"point5"  => "<div class=\"progress\"><div class=\"progress-bar red\" role=\"progressbar\"
                                                                          aria-valuenow=$percent1 aria-valuemin=\"0\" aria-valuemax=\"100\"
                                                                         style=\"width:$percent1%\"></div></div>",
                                        "point6"  => "<div class=\"progress\"><div class=\"progress-bar green\" role=\"progressbar\" 
                                                                         aria-valuenow=$percent2 aria-valuemin=\"0\" aria-valuemax=\"100\"
                                                                         style=\"width:$percent2%\"> </div> </div>",
                                        "point7"  => "<div class=\"progress\"><div class=\"progress-bar yellow\" role=\"progressbar\" 
                                                                         aria-valuenow=$percent3 aria-valuemin=\"0\" aria-valuemax=\"100\"
                                                                         style=\"width:$percent3%\"> </div> </div>",
                                        "point8"  => "<div class=\"progress\"><div class=\"progress-bar blue\" role=\"progressbar\" 
                                                                         aria-valuenow=$percent4 aria-valuemin=\"0\" aria-valuemax=\"100\"
                                                                         style=\"width:$percent4%\"> </div> </div>",
                                         ), 200);
        }
    }

    public function viewResult()
    {
        $questionId = RiPoll::select('pollID')->where('pollStatus',1)->first();
        $answers    = RiPollAnswer::select('pollAnswerPoints')
                                   ->where('pollID', $questionId->pollID)->get();

        $i      = 0;
        $points = 0;
        while ($i < count($answers)) {
            $points += $answers[$i]['pollAnswerPoints'];
            $i++;
        }

        $percent1 = round((($answers[0]['pollAnswerPoints'] * 100) / $points), 3);
        $percent2 = round((($answers[1]['pollAnswerPoints'] * 100) / $points), 3);
        $percent3 = round((($answers[2]['pollAnswerPoints'] * 100) / $points), 3);
        $percent4 = round((($answers[3]['pollAnswerPoints'] * 100) / $points), 3);

        return response()->json(array
                                    ("point1" => $percent1,
                                        "point2"  => $percent2,
                                        "point3"  => $percent3,
                                        "point4"  => $percent4,
                                        "point5"  => "<div class=\"progress\"><div class=\"progress-bar red\" role=\"progressbar\"
                                                                              aria-valuenow=$percent1 aria-valuemin=\"0\" aria-valuemax=\"100\"
                                                                             style=\"width:$percent1%\"></div></div>",
                                        "point6"  => "<div class=\"progress\"><div class=\"progress-bar yellow\" role=\"progressbar\" 
                                                                             aria-valuenow=$percent2 aria-valuemin=\"0\" aria-valuemax=\"100\"
                                                                             style=\"width:$percent2%\"> </div> </div>",
                                        "point7"  => "<div class=\"progress\"><div class=\"progress-bar green\" role=\"progressbar\" 
                                                                             aria-valuenow=$percent3 aria-valuemin=\"0\" aria-valuemax=\"100\"
                                                                             style=\"width:$percent3%\"> </div> </div>",
                                        "point8"  => "<div class=\"progress\"><div class=\"progress-bar blue\" role=\"progressbar\" 
                                                                             aria-valuenow=$percent4 aria-valuemin=\"0\" aria-valuemax=\"100\"
                                                                             style=\"width:$percent4%\"> </div> </div>",
                                    ),200);
    }

}

