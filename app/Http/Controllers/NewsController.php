<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoTag;
use App\Models\NewsList;
use App\Models\FihlVideo;
use App\Models\ContentList;
use App\Models\NewsComment;
use App\Models\ContentComment;
use App\Models\ContentTagsAssigned;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ArticleController;

class NewsController extends Controller
{
    //
    public function newsHome()
    {
        $seoTagIds         = [];
        $articleController = new ArticleController;
        $brand             = new BrandController;
        
        //NewsHome Page News
        $newsArticles      = $this->getNews(20);
        $articleTags       = ContentTagsAssigned::select('content_id', 'tag_id')
                                                ->whereIn('content_id', $newsArticles->pluck('news_id'))
                                                ->where('content_type', 2)
                                                ->get();   

        if(!empty($articleTags))
            $seoTagIds     =  array_unique($articleTags->pluck('tag_id')->toArray());

        // Fetch tag id and tag name using IN query
        $seoTags           = SeoTag::select('tag_id', 'name')->whereIn('tag_id', $seoTagIds)->get();

        if ( !empty($seoTags) ) {
            foreach ($seoTags as &$value) {
                $value['urlKicker']  = CommonController::cleanSpecialChar($value['name']);                    
            } 
        }

        $relatedArr        = $newsArticles->pluck('related_brand');
        $relatedBrands     = empty($articles['related_brand']) ? $brand->getRandomBrands(4) : $brand->getArticleInnerBrands($relatedArr);

        // Video Articles
        $videoArticles     = $articleController->getvideoArticle(9);

        return view('news/newslisthome')->with(compact('newsArticles','videoArticles','relatedBrands', 'seoTagIds', 'articleTags', 'seoTags'));
    }    

    //for kicker based listing page for news
    public function newsKickerList(Request $request)
    {
        $newsIdOmitArr     = [];
        $seoTagIds         = [];
        $articleController = new ArticleController;
        $brand             = new BrandController;
        $originalKicker    = $request->kicker;
        $contentArr        = explode('-', $originalKicker);
        $lastElement       = end($contentArr);

        //redirection -ID urls
        if (is_numeric($lastElement)) {
            
            $check   = NewsList::where('news_id', $lastElement)->first();

            if(empty($check))
                return redirect('/');

            $redirectUrl = Config('constants.NewsDomain')."/".Config('constants.articleArr.'.$check->news_type)."/".$check->slug.".n".$check->news_id;

            return redirect($redirectUrl, 301);
        }

        if (starts_with($lastElement, 'n') && is_numeric(substr($lastElement,1))) {

            $lastElement = substr($lastElement,1);

            //redirection -nID urls
            $check   = NewsList::where('news_id', $lastElement)->first();

            if(empty($check))
                return redirect('/');

            $redirectUrl = Config('constants.NewsDomain')."/".Config('constants.articleArr.'.$check->news_type)."/".$check->slug.".n".$check->news_id;

            return redirect($redirectUrl, 301);

        }

        $kicker = str_replace('-', ' ', $originalKicker);

        //for most shared image
        $most   = NewsList::where('status', 1)
                          ->orderBy('news_id', 'desc')
                          ->where('kicker', $kicker)
                          ->first();

        if ( count($most) == 0 )
            return redirect('/');

        $most['urlKicker']   = CommonController::cleanSpecialChar($most['kicker']);

        //for Popular       
        $popularArticles     = $this->getNewsArticles($kicker ,$most->news_id, 5, 0);

        if (count($popularArticles) < 5)
            $popularArticles =  $this->getNewsArticles(0, $most->news_id, 5 , 1); 

        if(!empty($popularArticles))
            $newsIdOmitArr   = $popularArticles->pluck( 'news_id' );

        $kickerArticles      = $this->getkickerArticles($kicker, $newsIdOmitArr, $most->news_id, 15);
        $articleTags         = ContentTagsAssigned::select('content_id', 'tag_id')->whereIn('content_id', $kickerArticles->pluck('news_id'))
                                                  ->where('content_type', 2)
                                                  ->get();   

        if(!empty($articleTags))
            $seoTagIds     =  array_unique($articleTags->pluck('tag_id')->toArray());

        // Fetch tag id and tag name using IN query
        $seoTags           = SeoTag::select('tag_id', 'name')->whereIn('tag_id', $seoTagIds)->get();

        if ( !empty($seoTags) ) {
            foreach ($seoTags as &$value) {
                $value['urlKicker']  = CommonController::cleanSpecialChar($value['name']);
            } 
        }

        //Video Articles
        $videoArticles     = $articleController->getvideoArticle(9);
        $newsArticles      = NewsList::where('status', 1)->orderBy('news_id', 'desc')->take(4)->get();
        $newsArticles      = CommonController::newsUrlSlug($newsArticles);
        $relatedBrands     = $brand->getRandomBrands(6);

        return view('news/newslistsecond', compact('kickerArticles','videoArticles','most','popularArticles', 'kicker','newsArticles','relatedBrands','originalKicker', 'seoTagIds', 'articleTags', 'seoTags'));
    }

    public function newsOthersInner(Request $request)
    {
        $articleController = new ArticleController;
        $brand             = new BrandController;
        $urlTitle          = $request->title;
        $site              = $request->site;
        $newsId            = $request->id;
        $id                = substr($newsId,1);
        $news              = NewsList::where('status', 1)
                                     ->where('news_id', substr($newsId,1))
                                     ->first();

        if (empty($news) || !starts_with($newsId, 'n'))
            return redirect('/', 301);

        if (starts_with($newsId, 'n') && is_numeric( $id )) {

            if($news->slug != $urlTitle || Config('constants.articleArr.'.$news->news_type) != $site) {
                $redirectUrl = Config('constants.NewsDomain')."/".Config('constants.articleArr.'.$news->news_type)."/".$news->slug.".".$newsId;
                return redirect($redirectUrl, 301);
            }
        }

        //Change Kicker Url Pattern
        $news->urlKicker  = CommonController::cleanSpecialChar($news['kicker']);

        //update views whenever article is viewed
        NewsList::where('news_id',$id)->increment('views');

        $nextArticle      =  $this->nextArticle($id, $news->news_type);

        $comment          = ContentComment::select('comment_email','comment_content','comment_date')
                                          ->where('articleID',$id)
                                          ->where('status','Y')
                                          ->get();        

        // Fetch tag id for a article
        $articleTags      = ContentTagsAssigned::select('tag_id')
                                               ->where('content_id', $id )
                                               ->where('content_type', 2)
                                               ->get()->toArray();

        // Single column array of tag ids
        $tagArr           = array_column($articleTags, 'tag_id');

        // Fetch tag id and tag name using IN query
        $seoVal           = SeoTag::select('tag_id', 'name')
                                 ->whereIn('tag_id', $tagArr)
                                 ->get();

        //change the url with cleanSpecialChar()
        $i = 0;
        while ($i < count($seoVal)) {
            $seoVal[$i]['urlSlug']   = CommonController::cleanSpecialChar($seoVal[$i]['name']);
            $i++;
        }

        $relatedArr        = $news->pluck('related_brand');
        $relatedBrands     = empty($news['related_brand']) ? $brand->getRandomBrands(4) : $brand->getArticleInnerBrands($relatedArr);        
        $likeArticles      = $this->getNewsArticles( 0, 0, 8, 1);

        //for more news 
        $newsArticles      = $this->getNewsArticles( 0, 0, 12, 0);

        return view('news/newsinner')->with(compact('news','comment','relatedBrands','seoVal','likeArticles', 'newsArticles','nextArticle'));
    }

    //Get Home Page News with pagination
    public function getNews($count)
    {
        //return NewsList::where('status', 1)->orderBy('news_id', 'desc')->paginate($count);
        $newsArticles =  NewsList::where('status', 1)->orderBy('news_id', 'desc')->paginate($count);
        return CommonController::newsUrlSlug($newsArticles);
    }

    //Get News with diffrent perameters
    public function getNewsArticles( $kicker, $excludeId, $count, $checkRand )
    {
        $newsArticles =  NewsList::where('status', 1)
                                 ->orderBy('news_id', 'desc');
        if(!empty($excludeId))
            $newsArticles =  $newsArticles->where('news_id', '!=', $excludeId);

        if($checkRand == 1)
            $newsArticles =  $newsArticles->orderByRaw("RAND()");

        if(!empty($kicker))
            $newsArticles =  $newsArticles->where('kicker', $kicker);
        
        $newsArticles     =  $newsArticles->take($count)->get();

        return CommonController::newsUrlSlug($newsArticles);
    }

    public function getkickerArticles($kicker,$newsIdOmitArr, $excludeId, $count )
    {
        $newsArticles =  NewsList::where('kicker', $kicker)
                                 ->orderBy('news_id', 'desc')
                                 ->whereNotIn('news_id', $newsIdOmitArr)
                                 ->where('news_id', '!=', $excludeId)
                                 ->where('status', 1)
                                 ->paginate($count);

        //return $newsArticles;
        return CommonController::newsUrlSlug($newsArticles);
    }

    public function commentForm(Request $request)
    {
        $this->validate($request, array(
            'name'    => 'required|max:32',
            'email'   => 'required|email|max:255',
            'comment' => 'required|min:5|max:1000',
            'contType'=> 'required',
            'cid'     => 'required',
            'site'    => 'required',
            'opt'     => 'required'));

        $contType = $request->contType;
        $contId   = $request->cid;
        $siteType = $request->site;
        $name     = $request->name;
        $email    = $request->email;
        $cmnt     = $request->comment;
        $opt      = $request->opt;

        $comments = NewsComment::insert(['comment_user' => $name, 'comment_email' => $email, 'comment_content' => $cmnt,
            'rating' => $opt, 'newsID' => $contId, 'contentType' => $contType]);
        if (!$comments)
            return '0';
        return '1';
    }


    public function nextArticle($id, $newsType)
    {
       $nextNews     = NewsList::where('news_id','>',$id)
                               ->where('news_type', $newsType)
                               ->where('status',1)
                               ->orderBy('news_id', 'asc')
                               ->take(1)
                               ->get();

       if (count($nextNews) == 0) {
           $nextNews = NewsList::where('news_id', '<', $id)
                                ->where('news_type', $newsType)
                                ->orderBy('news_id', 'desc')
                                ->where('status', 1)
                                ->take(1)
                                ->get();
       }

       if(!empty($nextNews))
           return CommonController::newsUrlSlug($nextNews)[0];

       return "";
    }

}
