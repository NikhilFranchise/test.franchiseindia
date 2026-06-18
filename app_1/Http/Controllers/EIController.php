<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentList;

use App\Models\EIArticle;
use App\Models\EIInterview;
use App\Models\EIMagazine;
use App\Models\EINews;
use App\Models\FranchisorBusinessDetail;
class EIController extends Controller
{
    //
    public function articleInner()
    {
 
        $title          = request()->title;
        $contentArr     = explode('-', $title);
        $lastElement    = end($contentArr);
 
        if (!is_numeric($lastElement))
            return redirect('https://www.franchiseindia.com/content/', 301);
 
        $articles       = EIArticle::query()->select('homeTitle','title','shortDesc','content','author','image','caption','tags','category','article_date')
                                        ->where('articleID',$lastElement)
                                        ->where('status','A')->first();
 
        if (empty($articles))
            return redirect('content');
 
        $articles->content = CommonController::cleanContent($articles->content);
        $articles->content = CommonController::cleanImageContent($articles->content);
 
        $tags          = explode(',', $articles['tags']);
 
        $relatedBrands = FranchisorBusinessDetail::query()->select('profile_name','company_name','business_desc','company_logo','membership_type',
                                                            'franchise_start_year','no_fran_outlets','operations_start_year','unit_investment',
                                                            'prop_area_min','city','state','company_name','ind_sub_cat','ind_cat',
                                                            'franchise_partner_type','fran_detail_id')
                                                            ->orderByRaw("RAND()")
                                                            ->where('membership_type',1)
                                                            ->take(4)
                                                            ->get()->toArray();
 
        //for You may like
        $likeArticles = ContentList::query()->where('status',1)
                                        ->where('time','>','2017-05-22 15:37:10')
                                        ->orderByRaw("RAND()")
                                        ->take(8)
                                        ->get();
        //return $likeArticles;
 
        $i = 0;
        while ($i < count($likeArticles)) {
            $likeArticles[$i]['urlTitle']  = CommonController::cleanSpecialChar($likeArticles[$i]['title']);
            $likeArticles[$i]['urlKicker'] = CommonController::cleanSpecialChar($likeArticles[$i]['kicker']);
            $i++;
        }
 
 
        return view('article/eiarticle/eiarticleinner')->with(compact('articles','relatedBrands','tags','likeArticles'));
    }
 
     public function newsInner()
     {
 
         $title          = request()->title;
         $contentArr     = explode('-', $title);
         $lastElement    = end($contentArr);
        
         if (!is_numeric($lastElement))
             return redirect('https://www.franchiseindia.com/content/', 301);
 
         $articles       = EINews::query()->select('homeTitle','shortDesc','title','content','image','news_date')
                                     ->where('newsID',$lastElement)
                                     ->where('status','A')->first();
        
         if ($articles == null)
             return redirect('content');
 
         $articles->content = CommonController::cleanContent($articles->content);
         $articles->content = CommonController::cleanImageContent($articles->content);
 
         $tags          = explode(',', $articles['tags']);
 
         $relatedBrands = FranchisorBusinessDetail::query()->select('profile_name','company_name','business_desc','company_logo','membership_type',
                                                         'franchise_start_year','no_fran_outlets','operations_start_year','unit_investment',
                                                         'prop_area_min','city','state','company_name','ind_sub_cat','ind_cat',
                                                         'franchise_partner_type','fran_detail_id')
                                                         ->orderByRaw("RAND()")
                                                         ->where('membership_type',1)
                                                         ->take(4)
                                                         ->get()->toArray();
 
         //for You may like
         $likeArticles = ContentList::query()->where('status',1)
                                         ->where('time','>','2017-05-22 15:37:10')
                                         ->orderByRaw("RAND()")
                                         ->take(8)
                                         ->get();
         //return $likeArticles;
 
         $i = 0;
         while ($i < count($likeArticles)) {
             $likeArticles[$i]['urlTitle']  = CommonController::cleanSpecialChar($likeArticles[$i]['title']);
             $likeArticles[$i]['urlKicker'] = CommonController::cleanSpecialChar($likeArticles[$i]['kicker']);
             $i++;
         }
 
 
         return view('article/eiarticle/eiarticleinner')->with(compact('articles','relatedBrands','tags','likeArticles'));
     }
 
 
     public function interviewInner()
     {
 
 
         $title          = request()->title;
         $contentArr     = explode('-', $title);
         $lastElement    = end($contentArr);
 
         if (!is_numeric($lastElement))
             return redirect('https://www.franchiseindia.com/content/', 301);
 
         $articles       = EIInterview::query()->select('homeTitle','title','shortDesc','content','image','caption','tags','category',
                                               'interview_date','interviewer')
                                         ->where('interviewID',$lastElement)
                                         ->where('status','A')->first();
 
 
         if(empty($articles))
             return redirect('content');
 
         $articles->content = CommonController::cleanContent($articles->content);
         $articles->content = CommonController::cleanImageContent($articles->content);
 
 
         $tags          = explode(',', $articles['tags']);
 
 
         $relatedBrands = FranchisorBusinessDetail::query()->select('profile_name','company_name','business_desc','company_logo','membership_type',
                                                         'franchise_start_year','no_fran_outlets','operations_start_year','unit_investment',
                                                         'prop_area_min','city','state','company_name','ind_sub_cat','ind_cat',
                                                         'franchise_partner_type','fran_detail_id')
                                                         ->orderByRaw("RAND()")
                                                         ->where('membership_type',1)
                                                         ->take(4)
                                                         ->get()->toArray();
 
         //for You may like
         $likeArticles = ContentList::query()->where('status',1)
                                         ->where('time','>','2017-05-22 15:37:10')
                                         ->orderByRaw("RAND()")
                                         ->take(8)
                                         ->get();
         //return $likeArticles;
 
         $i = 0;
         while ($i < count($likeArticles)) {
             $likeArticles[$i]['urlTitle']  = CommonController::cleanSpecialChar($likeArticles[$i]['title']);
             $likeArticles[$i]['urlKicker'] = CommonController::cleanSpecialChar($likeArticles[$i]['kicker']);
             $i++;
         }
 
 
         return view('article/eiarticle/eiarticleinner')->with(compact('articles','relatedBrands','tags','likeArticles'));
     }
 
 
     public function magazineInner()
     {
 
         $title          = request()->title;
         $contentArr     = explode('_', $title);
         if(count($contentArr) < 2)
             return redirect('https://www.franchiseindia.com/content/', 301);
 
         $lastElement    = $contentArr[1];
 
         if (!is_numeric($lastElement))
             return redirect('https://www.franchiseindia.com/content/', 301);
 
         $articles       = EIMagazine::query()->select('article_title','article_writer','small_para','article','image','create_date')
                                             ->where('article_id',$lastElement)
                                             ->where('status','A')->first();
 
         $articles->article = CommonController::cleanContent($articles->article);
         $articles->article = CommonController::cleanImageContent($articles->article);
 
 
         $relatedBrands = FranchisorBusinessDetail::query()->select('profile_name','company_name','business_desc','company_logo','membership_type',
                                                     'franchise_start_year','no_fran_outlets','operations_start_year','unit_investment',
                                                     'prop_area_min','city','state','company_name','ind_sub_cat','ind_cat',
                                                     'franchise_partner_type','fran_detail_id')
                                                     ->orderByRaw("RAND()")
                                                     ->where('membership_type',1)
                                                     ->take(4)
                                                     ->get()->toArray();
 
         //for You may like
         $likeArticles = ContentList::query()->where('status',1)
                                     ->where('time','>','2017-05-22 15:37:10')
                                     ->orderByRaw("RAND()")
                                     ->take(8)
                                     ->get();
         //return $likeArticles;
 
         $i = 0;
         while ($i < count($likeArticles)) {
             $likeArticles[$i]['urlTitle']  = CommonController::cleanSpecialChar($likeArticles[$i]['title']);
             $likeArticles[$i]['urlKicker'] = CommonController::cleanSpecialChar($likeArticles[$i]['kicker']);
             $i++;
         }
 
 
         return view('article/eiarticle/eimagazine')->with(compact('articles','relatedBrands','likeArticles'));
     }
}
