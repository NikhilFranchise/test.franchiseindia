<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\FranchisorBusinessDetail;
use App\Models\SeoTag;
use App\Models\NewsList;
use App\Models\ContentList;
use App\Models\SeoTagHindi;
use App\Models\HomePremiumPageBrand;

class HomepageController extends Controller
{
    //
    public function home()
    {

        $articleController = new ArticleController;
        $brands            = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();
        $articles          = ContentList::query()->where('status',1)
                                                 ->orderBy('content_id', 'desc')
                                                 ->take(18)->get()->toArray();

        $i = 0;
        while ($i < count($articles)) {
            $articles[$i]['urlKicker'] = CommonController::cleanSpecialChar($articles[$i]['kicker']);
            if ($articles[$i]['site_type'] == 'ga') {
                $seoTagId                  = SeoTag::query()->where('name', $articles[$i]['kicker'])->first();
                if (!empty($seoTagId))
                    $articles[$i]['kicker_id'] = $seoTagId->tag_id;
            }
            $i++;
        }

        $newsArticles = $articleController->getNews(18);
        return view('franchise-home')->with(compact('articles','newsArticles', 'homeffclogo', 'brands'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function hindiHome()
    {
        $brands            = HomePremiumPageBrand::query()->where('status', 1)->get();
        $hindiFrans   = FranchisorBusinessDetail::query()->select('franchisor_id')
                                                         ->whereIn('franchisor_id', $brands->pluck('fihl_id'))
                                                         ->where('is_hindi', 1)
                                                         ->get()
                                                         ->pluck('franchisor_id')->toArray();


        $articles     = ContentList::query()->where('is_hindi',1)->where('status',1)->orderBy('content_id', 'desc')->take(18)->get();
        $tag          = SeoTagHindi::query()->first();
        $newsArticles = NewsList::query()->where('status',1)->where('is_hindi', 1)->orderBy('news_id', 'DESC')->take(18)->get();

        if(request()->segment(2) == 'premiumbrand')
            return view('franchise-home-hindi')->with(compact('tag','articles','newsArticles', 'hindiFrans', 'brands'));

        return view('franchise-home-hindi')->with(compact('tag','articles','newsArticles', 'homeffclogo', 'hindiFrans', 'brands'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function premiumHome()
    {
        $articleController = new ArticleController;
        $brands            = HomePremiumPageBrand::query()->where('status', 1)->get();
        $articles          = ContentList::query()->where('status',1)
                                                 ->orderBy('content_id', 'desc')
                                                 ->take(18)
                                                 ->get()->toArray();

        $i = 0;
        while ($i < count($articles)) {
            $articles[$i]['urlKicker'] = CommonController::cleanSpecialChar($articles[$i]['kicker']);
            if ($articles[$i]['site_type'] == 'ga') {
                $seoTagId                  = SeoTag::query()->where('name', $articles[$i]['kicker'])->first();
                if (!empty($seoTagId))
                    $articles[$i]['kicker_id'] = $seoTagId->tag_id;
            }
            $i++;
        }

        $newsArticles = $articleController->getNews(18);

        return view('franchise-home')->with(compact('articles', 'newsArticles', 'brands'));
    }
	
	public function homeNew()
	{

    $articleController = new ArticleController;
    $brands            = HomePremiumPageBrand::query()->where('status', 1)->orderBy('inventory_backup', 'ASC')->get();
    $articles          = ContentList::query()->where('status',1)
                                             ->orderBy('content_id', 'desc')
                                             ->take(18)->get()->toArray();

    $i = 0;
    while ($i < count($articles)) {
        $articles[$i]['urlKicker'] = CommonController::cleanSpecialChar($articles[$i]['kicker']);
        if ($articles[$i]['site_type'] == 'ga') {
            $seoTagId                  = SeoTag::query()->where('name', $articles[$i]['kicker'])->first();
            if (!empty($seoTagId))
                $articles[$i]['kicker_id'] = $seoTagId->tag_id;
        }
        $i++;
    }

    $newsArticles = $articleController->getNews(18);
    //return view('franchise-home')->with(compact('articles','newsArticles', 'homeffclogo', 'brands'));
    return view('layout.masternewhomepage')->with(compact('articles','newsArticles', 'homeffclogo', 'brands'));
	}


}
