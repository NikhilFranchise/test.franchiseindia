<?php

namespace App\Http\Controllers;

use App\Models\SeoTag;
use App\Models\NewsList;
use App\Models\FihlVideo;
use App\Models\AuthorList;
use App\Models\SeoTagHindi;
use App\Models\ContentList;
use App\Models\ContentComment;
use App\Models\HindiContentRef;
use Illuminate\Http\Request;
use App\Models\ContentTagsAssigned;
use App\Models\ContentTagsAssignedHindi;
use App\Models\ArticleInterviewCommentReply;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
   
    /**
     * function for showing kicker's articles
     * @param Request $request
     * @return $this|string
     */
    public function articleKickersPage(Request $request)
    {
        // dd($request);
        //fetch kicker and replace '-' with ' '
        $kickerContentArr = [];
        $brand            = new BrandController;
        $contentKick      = $request->kicker;
        $contentArr       = explode('.', $contentKick);


		if (count($contentArr) == 2) {
           return $this->articleInner($request);
        } 
		/*else{
            $redirectUrl = 'https://opportunityindia.franchiseindia.com/english/tag/'.strtolower($contentKick);
            return redirect($redirectUrl,301);
        }*/

        //look for if the url contains article id or kicker
        if (count($contentArr) == 2) {
           $articleRes = $this->articleInner($request);
           try {
                $resStatus = $articleRes->status();
            } catch (\Exception $e) {
                $resStatus = 200; 
            }

            if ($resStatus == '301') {
                $testRes   = json_decode($articleRes->content(), true);
                return redirect($testRes['urlSlug'], 301);
            }

           return $articleRes;
        }

        $kicker           = str_replace('-', ' ', $contentKick);
        $kickerarr = strtolower($kicker);
        if( $contentKick != Str::slug($contentKick))
            return redirect('/content/'.Str::slug($contentKick), 301);
        
        $seoTagId         = SeoTag::query()->where('name', 'LIKE','%'. $kickerarr .'%')->first();

        if (empty($seoTagId))
            return redirect('/content', 301);

        //fetching contentTag Assigned data
        $kickerContent    = $seoTagId->contentTagsAssigned->where('content_type', 1);

        if(!empty($kickerContent))
            $kickerContentArr = array_column($kickerContent->toArray(), 'content_id');

        if (count($kickerContentArr) == 0)
            return redirect('/content/franchise', 301);
         
        $articles         = ContentList::query()
                                ->where('kicker', 'LIKE','%'. $kickerarr .'%')
                                // ->whereIn('content_id', $kickerContentArr)
                                ->where('status', 1)
                                ->orderBy('content_id', 'desc')
                                ->paginate(20);
        // dd($articles);exit;

        $articles = CommonController::contentUrlSlug($articles);
        $popularArticle     = ContentList::query()->where('status', 1)->orderBy('views', 'desc')->take(6)->get();
		$popularArticle     = CommonController::contentUrlSlug($popularArticle);

        //if no data related with contentId then show "404 ERROR"
        if (empty($articles))
            return redirect('/content', 301);

        //for Videos
        $videoArticles    = $this->getvideoArticle(9);
        //for News
        $newsArticles     = $this->getNews(4);

        //for related business Articles
        $relatedBrands = $brand->getRandomBrands(6);
        // dd($relatedBrands); exit;
        return view('article/articlelist', compact('articles', 'kicker', 'videoArticles', 'newsArticles', 'relatedBrands', 'contentKick','popularArticle'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getHindiContent()
    {
        $authorDesig = "";
        $contentId   = request()->id;
        $article     = ContentList::query()->find( $contentId);
        $title = preg_replace("/[:?]/", "", $article->hindi->title);
        $slug = preg_replace("/[\s]/", '-', $title);
        $redirectUrl = 'https://opportunityindia.franchiseindia.com/hindi/article/'. $slug.'-'.$article->content_id;

        return redirect($redirectUrl);
        if(empty($article) || $article->is_hindi == 0)
            return redirect()->back();

        $url = 'hi/'.Config('constants.articleArr.'.$article->site_type).'/'.$article->slug.'.'.$article->content_id;

        if( request()->path() != $url)
            return redirect($url);

        $brand       = new BrandController;
        $kicker      = SeoTagHindi::query()->where('tag_id', $article->hindi->kicker)->first();
        $tagArr      = ContentTagsAssignedHindi::query()->where('content_id', $contentId)->where('content_type', 1)->get()->pluck('tag_id');
        $seoVal      = SeoTagHindi::query()->select('tag_id', 'name')->whereIn('tag_id', $tagArr)->get();
        ContentList::query()->where('content_id', $contentId)->increment('views');

        $nextArticle =  $this->getNextArticle($contentId, $article->site_type, 1);

        //fetch designation with selected author
        $authorDesc  = AuthorList::query()->select('designation')->where('title', $article->hindi->author)->first();

        if (count($authorDesc) == 1)
            $authorDesig     = $authorDesc->designation;

        //Related Brands Listing fetch
        $relatedArr          = explode(',', $article->related_brand);
        $relatedBrands       = empty($articles['related_brand']) ? $brand->getRandomBrands(4) : $brand->getArticleInnerBrands($relatedArr);

        //for You may like
        $likeArticles        = $this->likeArticlesArticleInner(25, 1);

        //all Seo tags
        //$tags = $likeArticles->pluck('hindi')->pluck('kicker');
        //$tags =  SeoTagHindi::query()->whereIn('tag_id', $tags)->get();
        $tags = SeoTagHindi::query()->first();

        //Comments Section
        $comments            = ContentComment::query()->select('comment_email', 'comment_content', 'comment_date', 'comment_user', 'commentID') ->where('articleID', request()->id) ->where('status', 'Y') ->get();

        if(!empty($comments))
            $commentReplies  = ArticleInterviewCommentReply::query()->whereIn('comment_id', $comments->pluck('commentID'))->get();

        $redirectUrl = $url;

        return view('article.hindi.articleinner', compact('article', 'authorDesig', 'seoVal', 'comments', 'commentReplies', 'relatedBrands', 'likeArticles', 'nextArticle', 'kicker', 'tags', 'redirectUrl'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contentredirect(Request $request){
        dd($request);

    }
    public function getHindiKickerList()
    {

        $brand         = new BrandController;
        $kickerId      = request()->kickerId;
        $kicker        = SeoTagHindi::query()->where('tag_id', $kickerId)->first();

        if(count($kicker) == 0)
            return redirect()->back();


        if(request()->kicker != $kicker->name)
            return redirect('hi/content/'.$kicker->name.'/'.$kickerId);

        $contentIds    = ContentTagsAssignedHindi::query()->where('content_type', 1)->where('tag_id', $kickerId)->get()->pluck('content_id');
        $contentIds    = HindiContentRef::query()->whereIn('content_id', $contentIds)->paginate(25);
        $relatedBrands = $brand->getRandomBrands(4);
        $articles      = ContentList::query()->where('is_hindi', 1)->whereIn('content_id', $contentIds->pluck('content_id'))->get();
        return view('article.hindi.kicker-list', compact('articles', 'kicker', 'contentIds', 'relatedBrands'));
    }

    /**
     * function for articles' data
     * @param Request $request
     * @return mixed
     */
    public function articleInner(Request $request)
    {
        //fetch URL(combination of homeTitle and contentId)
        $contentId   = $request->kicker;
        $contentArr  = explode('.', $contentId);
        $authorDesig = '';
        $brand       = new BrandController;
	
	/*$redirectUrl = 'https://opportunityindia.franchiseindia.com/article/'. str_slug($contentArr[0]).'-'.$contentArr[1];
        return redirect($redirectUrl,301);*/
	
        if (isset($contentArr[1]))
            $contentIdParam = $contentArr[1];
        else
            return redirect('/content');

        if (!is_numeric($contentIdParam))
           return response()->json(['urlSlug' => '/content'], 301);

        //fetch data with selected contentId
        $articles = ContentList::query()->where('status', 1)->find($contentIdParam);

        if (count($articles) == 0 || $articles->status != 1)
            return response()->json(['urlSlug' => '/content'], 301);

        $artSite     = config('constants.articleArr.' . $articles['site_type']);

       /* $redirectUrl = 'https://opportunityindia.franchiseindia.com/article/'. $articles['slug'].'-'.$contentIdParam;
        return redirect($redirectUrl);*/

        if ($articles['site_type'] != 'fi') {
            $redirectUrl = config('constants.MainDomain') . '/' . $artSite . '/' . $articles['slug'] .'.'. $contentIdParam;
            return redirect($redirectUrl);
        }

        return $this->articleInnerCommon($artSite, $articles, $contentIdParam, $contentArr, $brand, $authorDesig);
    }

    /**
     * function for articles' data
     * @param Request $request
     * @return mixed
     */
    public function commonInner(Request $request)
    {        
        //fetch URL(combination of homeTitle and contentId)
        $contentId           = $request->content_id;
        $authorDesig         = '';
        $brand               = new BrandController;
        $redirectionSite     = request()->segment(1);
        $checkSiteType       = 'fi';

        if($redirectionSite == 'restaurant')
            $checkSiteType   = 'ri';
        if($redirectionSite == 'education')
            $checkSiteType   = 'edu';
        if($redirectionSite == 'wellness')
            $checkSiteType   = 'wi';

        if($checkSiteType == 'ri')
            // return redirect('https://www.restaurantindia.in/'.str_replace('/restaurant/', '/article/', request()->getRequestUri()), 301);
            return redirect('https://www.indianretailer.com/restaurant'.str_replace('/restaurant/', '/article/', request()->getRequestUri()), 301);

        //exlode contentId from URL [0] => 'homeTitle', [1] => 'contentId'
        $contentArr          = explode('.', $contentId);
        
        if ( !isset($contentArr[1]) )
            return redirect('/'.$redirectionSite);

        $contentIdParam      = $contentArr[1];
        
        if( !is_numeric($contentIdParam))
            return redirect('/'.$redirectionSite); 

        //fetch data with selected contentId
        $articles             = ContentList::query()->find($contentIdParam);

        // if ( count($articles) == 0 || $articles->status != 1)
        //     return redirect('/'.$redirectionSite, 301);

        

        $artSite              = config('constants.articleArr.' . $articles['site_type']);
        $redirectUrl = 'http://opportunityindia.franchiseindia.com/article/'. $articles['slug'].'-'.$contentIdParam;
        return redirect($redirectUrl);
        if ($articles['site_type'] != $checkSiteType ) {
            $redirectUrl = config('constants.MainDomain') . '/' . $artSite . '/' . $articles['slug'] .'.'. $contentIdParam;
            return redirect($redirectUrl);
        }

        return $this->articleInnerCommon($artSite, $articles, $contentIdParam, $contentArr, $brand, $authorDesig);
    }

    /**
     * function to show articles' homepage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleHome()
    {
        $time               = date('Y-m-d', strtotime('-30 days'));
        $trendTime          = "2017-06-22 15:37:10";
        $magazineController = new MagazineController;

        //for topmost part :=> latest article
        $homeArticle        = ContentList::query()->where('status', 1)->orderBy('content_id', 'desc')->take(13)->get();
        $homeArticle        = CommonController::contentUrlSlug($homeArticle);
       
        $popularArticle     = $this->getPopularArticleList("", "", 6, 'views');
        
        $mostCommented      = $this->getPopularArticleList("", "", 12, 'totalComment');

        //for trending
        $trendArticles      = $this->getPopularArticleList("", $trendTime, 6, 'totalComment');

        //for most shared
        $mostArticles       = $this->likeArticlesArticleInner(20, 0);

        //Magazine Articles
        $magazineCategory   = $magazineController->getMagazineCategoryArticleHome(2);
        $monthNum           = sprintf("%02d", $magazineCategory[0]['iss_month']);
        $monthName          = date('F', mktime(0, 0, 0, $monthNum, 10));
        $magazine           = $magazineController->getMagazineArticleHome(6, $magazineCategory[0]['category_id']);

        if (count($magazine) == 0)
            $magazine       = $magazineController->getMagazineArticleHome(6, $magazineCategory[1]['category_id']);

        //for Videos
        $videoArticles      = FihlVideo::query()->where('status', 'A')->where('category', 1)->orderBy('sno', 'desc')->take(5) ->get();
        // echo '<pre/>';print_r($homeArticle->all());exit;
        return view('article/articlehome')->with(compact('homeArticle', 'popularArticle', 'trendArticles', 'mostArticles', 'magazine', 'videoArticles', 'magazineCategory', 'monthName', 'mostCommented'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleHindiHome()
    {
        $seoTagIds         = [];
        $articleController = new ArticleController;
        $brand             = new BrandController;
        $articles          = ContentList::query()->where('is_hindi', 1)->where('status', 1)->paginate(20); //NewsHome Page News
        $articleTags       = ContentTagsAssignedHindi::query()->select('content_id', 'tag_id')->whereIn('content_id', $articles->pluck('content_id'))->where('content_type', 1)->get();

        if(!empty($articleTags))
            $seoTagIds     =  array_unique($articleTags->pluck('tag_id')->toArray());

        $seoTags           = SeoTagHindi::query()->select('tag_id', 'name')->whereIn('tag_id', $seoTagIds)->get();  // Fetch tag id and tag name using IN query
        $relatedArr        = $articles->pluck('related_brand');
        $relatedBrands     = empty($articles['related_brand']) ? $brand->getRandomBrands(4) : $brand->getArticleInnerBrands($relatedArr);
        $videoArticles     = $articleController->getvideoArticle(9); // Video Articles

        return view('article.hindi.content-list-home-hindi', compact('articles','videoArticles','relatedBrands', 'seoTagIds', 'articleTags', 'seoTags'));
    }

    /**
     * Function for comments
     * @param Request $request
     * @return mixed
     */
    public function commentForm(Request $request)
    {
        //validation rules
        $this->validate($request, array(
            'name'     => 'required|max:32',
            'email'    => 'required|email|max:255',
            'comment'  => 'required|min:5|max:1000',
            'contType' => 'required',
            'cid'      => 'required',
            'site'     => 'required',
            'opt'      => 'required'
        ));

        //insert into database
        $comments = ContentComment::query()->insert([
                                            'comment_user'    => request()->name,
                                            'comment_email'   => request()->email,
                                            'comment_content' => request()->comment,
                                            'rating'          => request()->opt,
                                            'articleID'       => request()->cid,
                                            'site_type'       => request()->site,
                                            'contentType'     => request()->contType,
                                            'mobile'          => request()->mobile,
                                        ]);
        if (!$comments)
            return 0;

        return 1;
    }

    /**
     * @return mixed
     */
    public function contentPages()
    {
        $redirectionSite = request()->segment(1);
        $brand           = new BrandController;

        //Latest 
        if ($redirectionSite == 'latest') {

            $most            = ContentList::query()->where('status', 1)->orderBy('content_id', 'desc')->take(1)->get();
            if(count($most) == 0)
                return redirect('404');

            $most             = CommonController::contentUrlSlug($most);  
            $popularArticles  = $this->getPopularArticleList($most[0]['content_id'], "", 5, 'content_id');
            $contentIdOmitArr = array_column($popularArticles, 'content_id');

            //Fetch the data with fetched contentId from the table into array
            $articles         = $this->getArticles($contentIdOmitArr, $most[0]['content_id'], "", 15, 'content_id');
            
        }

        //Popular
        if ($redirectionSite == 'popular') {

            $time  = date('Y-m-d', strtotime('-30 days'));
            $most  = ContentList::query()->where('status', 1)
                                ->orderBy('views', 'desc')
                                ->where('time', '>', $time)
                                ->take(1)->get();


            if(count($most) == 0)
                return redirect('404');

            $most             = CommonController::contentUrlSlug($most);        
            $popularArticles  = $this->getPopularArticleList($most[0]['content_id'], $time, 5, 'views');
            $contentIdOmitArr = array_column($popularArticles, 'content_id');

            //Fetch the data with fetched contentId from the table into array
            $articles         = $this->getArticles($contentIdOmitArr, $most[0]['content_id'], $time, 15, 'views');

        }
         
        //Commented   
        if ($redirectionSite == 'commented') {

            $time  = date('Y-m-d', strtotime('-30 days'));
            $most  = ContentList::query()->where('status', 1)
                            ->orderBy('totalComment', 'desc')
                            ->where( 'time', '>', $time )
                            ->take(1)->get();

            if(count($most) == 0)
                return redirect('404');

            $most             = CommonController::contentUrlSlug($most);
            $popularArticles  = $this->getPopularArticleList($most[0]['content_id'], $time, 5, 'totalComment');
            $popularArticles  = CommonController::contentUrlSlug($popularArticles);
            $contentIdOmitArr = array_column($popularArticles, 'content_id');

            //Fetch the data with fetched contentId from the table into array
            $articles         = $this->getArticles($contentIdOmitArr, $most[0]['content_id'], $time, 15, 'totalComment');            

        }            

        //if no data related with contentId then show "404 ERROR"
        if (isset($articles) && count($articles) == 0)
            return redirect('content');

        //for Videos
        $videoArticles    = $this->getvideoArticle(9);

        //for News
        $newsArticles     = $this->getNews(4);

        //for related business Articles
        $relatedBrands    = $brand->getRandomBrands(6);

        return view('article/populararticlelist')->with(compact('most', 'relatedBrands', 'newsArticles', 'videoArticles', 'articles', 'popularArticles'));
    }

    /**
     * @param $count
     * @param $franDetails
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function getContentForBrandLanding($count, $franDetails)
    {

        $articles = ContentList::query()->where('contentType','Article')
            ->where('status',1);

        if($franDetails->ind_main_cat == 1 || $franDetails->ind_main_cat == 11)
            $articles = $articles->where('site_type', "wi");

        if($franDetails->ind_main_cat == 3)
            $articles = $articles->where('site_type', "edu");

        if($franDetails->ind_main_cat == 2)
            $articles = $articles->where('site_type', "ri");

        $articles = $articles->orderBy('content_id', 'DESC')
            ->take($count)
            ->get();
        return $articles;
    }

    /**
     * function for fetching VideoArticle
     * @param $count
     * @return mixed
     */
    public function getvideoArticle($count) 
    {
        //for Videos
        $videoArticles = FihlVideo::query()->select('sno', 'videoID', 'title', 'views', 'create_date', 'category')
                        ->where('status', 'A')
                        ->where('category', 1)
                        ->orderBy('sno', 'desc')
                        ->take($count)
                        ->get();

        if(empty($videoArticles))
            return $videoArticles;

        $videoArticles = $videoArticles->toArray();

        $i = 0;
        while ($i < count($videoArticles)) {
            $videoArticles[$i]['urlTitle'] = CommonController::getVideoUrl($videoArticles[$i]['title']);
            $i++;
        }

        return $videoArticles;
    }

    /**
     * function for fetching News
     * @param $count
     * @return $this|string
     */
    public function getNews($count)
    {
        $newsArticles =  NewsList::query()->where('status', 1)->orderBy('news_id', 'desc')->take($count)->get();
        return CommonController::newsUrlSlug($newsArticles);
    }

    /**
     * function for Fetching Articles
     * @param $id
     * @param $time
     * @param $count
     * @param $orderBy
     * @return mixed
     */
    public function getPopularArticleList($id, $time, $count, $orderBy)
    {
        $popularArticles = ContentList::query()->where('status', 1)
                                      ->where('content_id', '!=', $id)
									  ->where('site_type', '!=', 'ga')
                                      ->orderBy($orderBy, 'desc')
                                      ->where('time', '>', $time)
                                      ->take($count)
                                      ->get();
        if(empty($popularArticles))
            return $popularArticles;

        $popularArticles = $popularArticles->toArray();
        return CommonController::contentUrlSlug($popularArticles);
    }

    /**
     * function for articles' data
     * @param $contentIdOmitArr
     * @param $id
     * @param $time
     * @param $paginateCount
     * @param $orderBy
     * @return mixed
     */
    public function getArticles( $contentIdOmitArr, $id, $time, $paginateCount , $orderBy)
    {
        $articles =  ContentList::query()->where('status', 1)
                                ->where('content_id', '!=', $id )
                                ->whereNotIn('content_id', $contentIdOmitArr)
                                ->orderBy($orderBy, 'desc')
                                ->where('time', '>', $time)
                                ->paginate($paginateCount);
        if(empty($articles))
            return "";
        return CommonController::contentUrlSlug($articles);

    }

    /**
     * function for fetch Articles For kicker
     * @param $contentIdOmitArr
     * @param $kickerContentArr
     * @return mixed
     */
    public function getKickerArticles($contentIdOmitArr, $kickerContentArr)
    {
         //Fetch the data with fetched contentId from the table into array
        $articles = ContentList::query()->where('status', 1)
                               ->whereNotIn('content_id', $contentIdOmitArr)
                               ->whereIn('content_id', $kickerContentArr)
                               ->orderBy('content_id', 'desc')
                               ->paginate(15);
        if(empty($articles))
            return "";
        return CommonController::contentUrlSlug($articles);
    }

    /**
     * function for fetch Next Article For Kiker page
     * @param $contentIdParam
     * @param $siteType
     * @param $is_hindi
     * @return mixed
     */
    public function getNextArticle($contentIdParam, $siteType ,$is_hindi) 
    {
        $nextArticle = ContentList::query()->where('content_id', '>', $contentIdParam);

        if($is_hindi == 1)
            $nextArticle = $nextArticle->where('is_hindi', 1);

        $nextArticle = $nextArticle->where('site_type', $siteType)
                                ->where('status', 1)
                                  ->orderBy('content_id', 'asc')
                                  ->take(1)->get();

        if (count($nextArticle) == 0) {
            $nextArticle = ContentList::query()->where('content_id', '<', $contentIdParam);

            if($is_hindi == 1)
                $nextArticle = $nextArticle->where('is_hindi', 1);

            $nextArticle = $nextArticle->where('site_type', $siteType)
                                       ->where('status', 1)
                                       ->orderBy('content_id', 'desc')
                                       ->take(1)->get();
        }

        if(empty($nextArticle))
            return [];
        return CommonController::contentUrlSlug($nextArticle);
    }

    /**
     * @param $count
     * @param $is_hindi
     * @return array|mixed
     */
    public function likeArticlesArticleInner($count, $is_hindi)
    {
        $likeArticles = ContentList::query()->where('status', 1);

        if($is_hindi == 1)
            $likeArticles = $likeArticles->where('is_hindi', 1)->where('site_type' ,'!=', 'ga');

        $likeArticles = $likeArticles->where('time', '>', '2017-05-22 15:37:10')
                                    ->where('site_type', '!=', 'ga')
									->orderByRaw("RAND()")
                                    ->take($count)
                                    ->get();

        if(empty($likeArticles))
            return [];
        return CommonController::contentUrlSlug($likeArticles);
    }

    /**
     * @param $artSite
     * @param $articles
     * @param $contentIdParam
     * @param $contentArr
     * @param $brand
     * @param $authorDesig
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function articleInnerCommon($artSite, $articles, $contentIdParam, $contentArr, $brand, $authorDesig)
    {
        //initializing variables
        $tagArr         = [];
        $commentReplies = [];
        $redirectUrl = 'http://opportunityindia.franchiseindia.com/article/'. $articles['slug'].'-'.$contentIdParam;
//        $redirectUrl    = config('constants.MainDomain') . '/' . $artSite . '/' . $articles['slug'] .'.'. $contentIdParam;

        if ($articles['slug'] != $contentArr[0])
            return redirect($redirectUrl);

        $comment = ContentComment::query()->select('comment_email', 'comment_content', 'comment_date', 'comment_user', 'commentID')
                                ->where('articleID', $contentIdParam)
                                ->where('status', 'Y')
                                ->get();

        if(!empty($comment))
            $commentReplies = ArticleInterviewCommentReply::query()->whereIn('comment_id', $comment->pluck('commentID'))->get();

        $articles['urlKicker'] = CommonController::cleanSpecialChar($articles['kicker']);

        //update views whenever article is viewed
        ContentList::query()->where('content_id', $contentIdParam)->increment('views');

        $nextArticle =  $this->getNextArticle($contentIdParam, $articles['site_type'], 0);

        $relatedArr  = explode(',', $articles['related_brand']);

        //check data is available with given contentId
        if (count($articles) == 0)
            return redirect('/404');

        //fetch designation with selected author
        $authorDesc = AuthorList::query()->select('designation')->where('title', $articles->author)->first();

        if (count($authorDesc) == 1)
            $authorDesig = $authorDesc->designation;

        // Fetch tag id for a article
        $articleTags = ContentTagsAssigned::query()->select('tag_id')
                                          ->where('content_id', $contentIdParam)
                                          ->where('content_type', 1)
                                          ->get();

        if(!empty($articleTags))
            $articleTags = $articleTags->toArray();

        // Single column array of tag ids
        if(!empty($articleTags))
            $tagArr      = array_column($articleTags, 'tag_id');

        // Fetch tag id and tag name using IN query
        $seoVal      = SeoTag::query()->select('tag_id', 'name')->whereIn('tag_id', $tagArr)->get();

        //change the url with cleanSpecialChar()
        if(!empty( $seoVal )) {
            $i = 0;
            while ($i < count($seoVal)) {
                $content_title = CommonController::cleanSpecialChar($seoVal[$i]['name']);
                $seoVal[$i]['urlSlug'] = $content_title;
                $i++;
            }
        }

        $relatedBrands    = empty($articles['related_brand']) ? $brand->getRandomBrands(4) : $brand->getArticleInnerBrands($relatedArr);

        //for You may like
        $likeArticles     = $this->likeArticlesArticleInner(42, 0);

        return view('article/articleinner', compact('articles', 'authorDesc', 'cmtShow', 'comment', 'articlesCount', 'seoVal', 'likeArticles', 'relatedBrands', 'nextArticle', 'authorDesig', 'redirectUrl', 'commentReplies'));
    }

    /**
     * @param $siteType
     * @param $count
     * @param $whereIn
     * @param $kicker
     * @return mixed|string
     */
    public function siteHomeArticles($siteType, $count, $whereIn, $kicker)
    {
        $articles    =   ContentList::query()->where('site_type', $siteType)
                                    ->where('status',1)
                                    ->orderBy('content_id', 'desc');

        if(!empty($kicker))
            $articles = $articles->where('kicker', $kicker);

        if(!empty($whereIn))
            $articles = $articles->whereIn('content_id', $whereIn);

        $articles     =  $articles->take($count)->get();
                                

        if ( empty( $articles ) )
            return "";
        return CommonController::contentUrlSlug($articles);
    }

    /**
     * @return mixed|string
     */
    public function wellnessTagsArticles()
    {
        $articles =  ContentList::query()->select('kicker')->where('site_type','wi')->orderByRaw("RAND()")->take(16)->get();

        if ( empty( $articles ) )
            return "";
        return CommonController::contentUrlSlug($articles);
    }

    /**
     * @param $count
     * @param $kicker
     * @param $type
     * @return mixed
     */
    public function restaurantTagsArticles($count, $kicker, $type)
    {
        $articles =  ContentList::query()->where('site_type', 'ri')
                                ->where('contentType', $type)
                                ->whereIn('kicker', $kicker)
                                ->where('status',1)
                                ->orderBy('content_id', 'desc')
                                ->take($count)
                                ->get();

        if ( empty( $articles ) )
            return "";

        $articles = $articles->toArray();

        return CommonController::contentUrlSlug($articles);
    }
    public function check(){

        dd('yes');
    }
}
