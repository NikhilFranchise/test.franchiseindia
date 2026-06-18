<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\SeoTag;
use App\Models\NewsList;
use App\Models\FihlVideo;
use App\Models\AuthorList;
use App\Models\SeoTagHindi;
use App\Models\ContentList;
use App\Models\ContentComment;
use App\Models\HindiContentRef;
use App\Models\ContentTagsAssigned;
use App\Models\ContentTagsAssignedHindi;
use App\Models\ArticleInterviewCommentReply;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class NewArticleController extends Controller
{
    //

       /**
     * function for showing kicker's articles
     * @param Request $request
     * @return $this|string
     */
    public function articleKickersPage(Request $request)
    {
//        dd($request);
        //fetch kicker and replace '-' with ' '
        $kickerContentArr = [];
        $brand            = new BrandController;
        $contentKick      = $request->kicker;
        $contentArr       = explode('.', $contentKick);

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

        if( $contentKick != Str::slug($contentKick))
            return redirect('/content/'.Str::slug($contentKick), 301);

        $seoTagId         = SeoTag::query()->where('name', 'LIKE', $kicker)->first();

        if (empty($seoTagId))
            return redirect('/content', 301);

        //fetching contentTag Assigned data
        $kickerContent    = $seoTagId->contentTagsAssigned->where('content_type', 1);

        if(!empty($kickerContent))
            $kickerContentArr = array_column($kickerContent->toArray(), 'content_id');

        if (count($kickerContentArr) == 0)
            return redirect('/content/franchise', 301);



        $articles         = ContentList::query()
            ->select(
                'content_list.image as content_image',
                'content_list.title as title',
                'author_list.title as author_name',
                'author_list.image as author_image',
                'content_list.*',
                'author_list.author_id as author_id',
                'author_list.designation as designation',
                'author_list.company as author_company',
                'author_list.text as text',
                'author_list.linkedin_profile as linkedin_profile',
                'author_list.twitter_profile as twitter_profile',
                'author_list.facebook_profile as facebook_profile',
                'author_list.slug as author_slug')
            ->where('content_list.kicker', 'LIKE', $kicker)
            ->orWhereIn('content_list.content_id', $kickerContentArr)
            ->leftJoin('author_list','author_list.title','=','content_list.author')
            ->where('content_list.status', 1)
            ->orderBy('content_list.content_id', 'desc')
            ->paginate(10);


        $articles = CommonController::contentUrlSlug($articles);

        //if no data related with contentId then show "404 ERROR"
        if (empty($articles))
            return redirect('/content', 301);

        //for Videos
        $videoArticles    = $this->getvideoArticle(9);

        //for News
        $newsArticles     = $this->getNews(4);

        //for related business Articles
        $relatedBrands = $brand->getRandomBrands(6);
//        dd($articles);

        return view('article/newarticlelist', compact('articles', 'kicker', 'videoArticles', 'newsArticles', 'relatedBrands', 'contentKick'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getHindiContent()
    {
        $authorDesig = "";
        $contentId   = request()->id;
//        dd($contentId);
        $article     = ContentList::query()->find( $contentId);

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
//        $hindiContentidArray = $article->pluck('content_id');
//        $article = HindiContentRef::query()->whereIn('content_id',$hindiContentidArray)->take(20)->get();
        $nextArticle =  $this->getNextArticle($contentId, $article->site_type,null, 1);

        //fetch designation with selected author
        $authorDesc  = AuthorList::query()->select('*')->where('title','LIKE', $article->hindi->author)->first();


        if (count($authorDesc) == 1)
            $authorDesig     = $authorDesc->designation;

        //Related Brands Listing fetch
        $relatedArr          = explode(',', $article->related_brand);
        $relatedBrands       = empty($articles['related_brand']) ? $brand->getRandomBrands(4) : $brand->getArticleInnerBrands($relatedArr);

        //for You may like
        $likeArticles        = $this->likeArticlesArticleInner(25, 1);

        //all Seo tags
//        $tags = $likeArticles->pluck('hindi')->pluck('kicker');
//        $tags =  SeoTagHindi::query()->whereIn('tag_id', $likeArticles->kicker)->first();
        $tags = SeoTagHindi::query()->first();

        //Comments Section
        $comments   = ContentComment::query()->select('comment_email', 'comment_content', 'comment_date', 'comment_user', 'commentID') ->where('articleID', request()->id) ->where('status', 'Y') ->get();

        if(!empty($comments))
            $commentReplies  = ArticleInterviewCommentReply::query()->whereIn('comment_id', $comments->pluck('commentID'))->get();

        $redirectUrl = $url;
//dd($authorDesc);
        return view('article.articleinner_hindi', compact('article', 'authorDesig', 'seoVal', 'comments', 'commentReplies', 'relatedBrands', 'likeArticles', 'nextArticle', 'kicker', 'tags', 'authorDesc','redirectUrl'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function getHindiKickerList()
//    {
//
//        $brand         = new BrandController;
//        $kickerId      = request()->kickerId;
//        $kicker        = SeoTagHindi::query()->where('tag_id', $kickerId)->first();
//
//        if(count($kicker) == 0)
//            return redirect()->back();
//
//
//        if(request()->kicker != $kicker->name)
//            return redirect('hi/content/'.$kicker->name.'/'.$kickerId);
//
//        $contentIds    = ContentTagsAssignedHindi::query()->where('content_type', 1)->where('tag_id', $kickerId)->get()->pluck('content_id');
//        $contentIds    = HindiContentRef::query()->whereIn('content_id', $contentIds)->paginate(25);
//        $relatedBrands = $brand->getRandomBrands(4);
//        $articles      = ContentList::query()->where('is_hindi', 1)->whereIn('content_id', $contentIds->pluck('content_id'))->get();
//        return view('article.hindi.kicker-list', compact('articles', 'kicker', 'contentIds', 'relatedBrands'));
//    }

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

        if (isset($contentArr[1]))
            $contentIdParam = $contentArr[1];
        else
            return redirect('/content');

        if (!is_numeric($contentIdParam))
            return response()->json(['urlSlug' => '/content'], 301);

        //fetch data with selected contentId
        $articles = ContentList::query()
//            ->select('content_list.image as content_image','author_list.image as author_image','content_list.*','author_list.*')
//            ->leftJoin('author_list','author_list.title','=','content_list.author')
            ->find($contentIdParam);


        if (count($articles) == 0 || $articles->status != 1)
            return response()->json(['urlSlug' => '/content'], 301);

        $artSite     = config('constants.articleArr.' . $articles['site_type']);

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
            return redirect('https://www.restaurantindia.in/'.str_replace('/restaurant/', '/article/', request()->getRequestUri()), 301);

        //exlode contentId from URL [0] => 'homeTitle', [1] => 'contentId'
        $contentArr          = explode('.', $contentId);

        if ( !isset($contentArr[1]) )
            return redirect('/'.$redirectionSite);

        $contentIdParam      = $contentArr[1];

        if( !is_numeric($contentIdParam))
            return redirect('/'.$redirectionSite);

        //fetch data with selected contentId
        $articles             = ContentList::query()->find($contentIdParam);

        if ( count($articles) == 0 || $articles->status != 1)
            return redirect('/'.$redirectionSite, 301);

        $artSite              = config('constants.articleArr.' . $articles['site_type']);

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
        $time               = date('Y-m-d', strtotime('-356 days'));
        $trendTime          = "2017-06-22 15:37:10";
        $magazineController = new MagazineController;

        //for topmost part :=> latest article
        $homeArticle        = ContentList::query()->where('status', 1)->orderBy('content_id', 'desc')->take(13)->get();
        $homeArticle        = CommonController::contentUrlSlug($homeArticle);

//        dd($homeArticle);
        $popularArticle     = $this->getPopularArticleList("", $time, 6,0, 'views');
        $mostCommented      = $this->getPopularArticleList("", $time, 11,0, 'totalComment');

        //for trending
        $trendArticles      = $this->getPopularArticleList("", $trendTime, 12, 0,'totalComment');

        //for most shared
        $mostArticles       = $this->likeArticlesArticleInner(20, 0);
        //Small Business Ideas
        $smallBusiness = $this->categoryWiseArticle(20,'Small Business',0);
        $startupNation = $this->categoryWiseArticle(20,'Startup',0);
        $localBusiness = $this->categoryWiseArticle(20,'franchisees',0);
        $emergingIndia = $this->categoryWiseArticle(20,'Startup',0);
//        dd($mostCommented);
        //Magazine Articles
        $magazineCategory   = $magazineController->getMagazineCategoryArticleHome(2);
        $monthNum           = sprintf("%02d", $magazineCategory[0]['iss_month']);
        $monthName          = date('F', mktime(0, 0, 0, $monthNum, 10));
        $magazine           = $magazineController->getMagazineArticleHome(6, $magazineCategory[0]['category_id']);

        if (count($magazine) == 0)
            $magazine       = $magazineController->getMagazineArticleHome(6, $magazineCategory[1]['category_id']);
        $authorList = AuthorList::query()->inRandomOrder()->take(3)->get();
        //for Videos
        $videoArticles      = FihlVideo::query()->where('status', 'A')->where('category', 1)->orderBy('sno', 'desc')->take(5) ->get();
//            dd($homeArticle);
        return view('article/newarticlehome')->with(compact('homeArticle', 'authorList','popularArticle', 'trendArticles', 'mostArticles', 'magazine', 'videoArticles', 'magazineCategory', 'monthName', 'mostCommented','smallBusiness','startupNation','localBusiness','emergingIndia'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleHindiHome()
    {//DB::enableQueryLog();
        $seoTagIds         = [];
        $articleController = new ArticleController;
        $brand             = new BrandController;
        $articles          = ContentList::query()->where('is_hindi',1)->where('status', 1)->paginate(20); //NewsHome Page News
    

        $articleTags       = ContentTagsAssignedHindi::query()->select('content_id', 'tag_id')->whereIn('content_id', $articles->pluck('content_id'))->where('content_type', 1)->get();
        $time               = date('Y-m-d', strtotime('-356 days'));
        $trendTime          = "2017-06-22 15:37:10";
        $magazineController = new MagazineController;

        //for topmost part :=> latest article
        $homeArticle        = ContentList::all();
        $homeArticle        = $homeArticle->where('status', 1)->where('is_hindi',1)->sortByDesc('content_id')->take(13);
        $homeArticle        = CommonController::contentUrlSlug($homeArticle);

      //  dd($homeArticle);
         $popularArticle     = $this->getPopularArticleListHindi("", $time, 6, 'views');
        $mostCommented      = $this->getPopularArticleListHindi("", $time, 11, 'totalComment');

        //for trending
        $trendArticles      = $this->getPopularArticleListHindi("", $trendTime, 12,'totalComment');
		//dd($trendArticles);

        //for most shared
        $mostArticles       = $this->likeArticlesArticleInner(20, 0);
        //Small Business Ideas
        $smallBusiness = $this->categoryWiseArticleInHindi(20,34);
        $startupNation = $this->categoryWiseArticleInHindi(20,21);
        $localBusiness = $this->categoryWiseArticleInHindi(20,63);
        $emergingIndia = $this->categoryWiseArticleInHindi(20,21);
//        dd($startupNation);
        //Magazine Articles
        $magazineCategory   = $magazineController->getMagazineCategoryArticleHome(2);
        $monthNum           = sprintf("%02d", $magazineCategory[0]['iss_month']);
        $monthName          = date('F', mktime(0, 0, 0, $monthNum, 10));
        $magazine           = $magazineController->getMagazineArticleHome(6, $magazineCategory[0]['category_id']);

        if (count($magazine) == 0)
            $magazine       = $magazineController->getMagazineArticleHome(6, $magazineCategory[1]['category_id']);

        //for Videos

        if(!empty($articleTags))
            $seoTagIds     =  array_unique($articleTags->pluck('tag_id')->toArray());

        $seoTags           = SeoTagHindi::query()->select('tag_id', 'name')->whereIn('tag_id', $seoTagIds)->get();  // Fetch tag id and tag name using IN query
        $relatedArr        = $articles->pluck('related_brand');
        $authorList = AuthorList::query()->inRandomOrder()->take(3)->get();
        $relatedBrands     = empty($articles['related_brand']) ? $brand->getRandomBrands(4) : $brand->getArticleInnerBrands($relatedArr);
//        $videoArticles     = $articleController->getvideoArticle(9); // Video Articles
        $videoArticles      = FihlVideo::query()->where('status', 'A')->where('category', 1)->orderBy('sno', 'desc')->take(5) ->get();
//dd($homeArticle);
        return view('article/newarticlehome', compact('homeArticle','authorList', 'trendArticles', 'mostArticles', 'magazine', 'videoArticles', 'magazineCategory', 'monthName', 'mostCommented','smallBusiness','startupNation','localBusiness','emergingIndia','articles','videoArticles','relatedBrands', 'seoTagIds', 'articleTags', 'seoTags'));
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
            $popularArticles  = $this->getPopularArticleList($most[0]['content_id'], "", 5,0, 'content_id');
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
            $popularArticles  = $this->getPopularArticleList($most[0]['content_id'], $time, 5, 0,'views');
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
            $popularArticles  = $this->getPopularArticleList($most[0]['content_id'], $time, 5, 0, 'totalComment');
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
            $videoArticles[$i]['urlTitle'] = CommonController::cleanSpecialChar($videoArticles[$i]['title']);
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
    public function getPopularArticleList($id, $time, $count, $is_hindi, $orderBy)
    {
        $popularArticles = ContentList::query()->where('status', 1)
            ->where('content_id', '!=', $id)
            ->where('is_hindi', '!=', $is_hindi)
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
    public function getNextArticle($contentIdParam, $siteType ,$kicker = null,$is_hindi)
    {
        $nextArticle = ContentList::query()->where('content_id', '>', $contentIdParam);

        if($is_hindi == 1)
            $nextArticle = $nextArticle->where('is_hindi', 1);
        if($kicker != null){
            $nextArticle = $nextArticle->where('kicker','LIKE', $kicker);
        }
        $nextArticle = $nextArticle->where('site_type', $siteType)
            ->where('status', 1)

            ->orderBy('content_id', 'asc')
            ->take(1)->get();


//        if (count($nextArticle) == 0) {
//            $nextArticle = ContentList::query()->where('content_id', '<', $contentIdParam);
//
//            if($is_hindi == 1)
//                $nextArticle = $nextArticle->where('is_hindi', 1);
//
//            $nextArticle = $nextArticle->where('site_type', $siteType)
//                                       ->where('status', 1)
//                                       ->orderBy('content_id', 'desc')
//                                       ->take(1)->get();
//        }

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
            ->orderByRaw("RAND()")
            ->take($count)
            ->get();

        if(empty($likeArticles))
            return [];
        return CommonController::contentUrlSlug($likeArticles);
    }
    public function categoryWiseArticle($count, $kicker , $is_hindi)
    {
        $list = ContentList::query()->where('status', 1)->where('kicker',$kicker);

        if($is_hindi == 1)
            $list = $list->where('is_hindi', 1)->where('site_type' ,'!=', 'ga');

        $list = $list->where('time', '>', '2017-05-22 15:37:10')
            ->orderByRaw("RAND()")
            ->take($count)
            ->get();

        if(empty($list))
            return [];
        return CommonController::contentUrlSlug($list);
    }
    public function categoryWiseArticleInHindi($count, $kicker)
    {
        $list =ContentList::query()->select(
            'hindi_content_ref.content_id as content_id',
            'content_list.site_type as site_type',
            'content_list.contentType as contentType',
            'seo_tags_hindi.name as hindi_kicker',
            'hindi_content_ref.home_title as hindi_home_title',
            'hindi_content_ref.title as hindi_title',
            'hindi_content_ref.short_desc as hindi_shortDesc',
            'hindi_content_ref.content as hindi_content',
            'content_list.author as author',
            'content_list.company as company',
            'content_list.is_noindexnofollow as is_noindexnofollow',
            'content_list.image as image',
            'content_list.slug as slug',
            'content_list.time as time',
            'content_list.totalComment as totalComment',
            'content_list.totalVotes as totalVotes',
            'content_list.views as views',
            'content_list.is_intl as is_intl',
            'content_list.is_hindi as is_hindi',
            'content_list.status as status',
            'hindi_content_ref.updated_by as updated_by',
            'content_list.created_at as created_at',
            'content_list.updated_at as updated_at',
            'seo_tags_hindi.*'
        )
            ->leftJoin('hindi_content_ref','hindi_content_ref.content_id','=','content_list.content_id')
            ->leftJoin('seo_tags_hindi','seo_tags_hindi.tag_id','=','hindi_content_ref.kicker')
            ->where('content_list.is_hindi', 1)->where('hindi_content_ref.kicker',$kicker)->where('content_list.site_type' ,'!=', 'ga')->where('content_list.status', 1);


        $list = $list->where('time', '>', '2017-05-22 15:37:10')
            ->orderByRaw("RAND()")
            ->take($count)
            ->get();

        if(empty($list))
            return [];
        return CommonController::contentUrlSlug($list);
    }
    public function getPopularArticleListHindi($id, $time, $count, $orderBy)
    {
        $list = ContentList::query()->select(
            'hindi_content_ref.content_id as content_id',
            'content_list.site_type as site_type',
            'content_list.contentType as contentType',
            'seo_tags_hindi.name as hindi_kicker',
            'hindi_content_ref.home_title as hindi_home_title',
            'hindi_content_ref.title as hindi_title',
            'hindi_content_ref.short_desc as hindi_shortDesc',
            'hindi_content_ref.content as hindi_content',
            'content_list.author as author',
            'hindi_content_ref.author as hindi_author',
			'content_list.title as title',
			'content_list.kicker as kicker',
            'content_list.company as company',
            'content_list.is_noindexnofollow as is_noindexnofollow',
            'content_list.image as image',
            'content_list.slug as slug',
            'content_list.time as time',
            'content_list.totalComment as totalComment',
            'content_list.totalVotes as totalVotes',
            'content_list.views as views',
            'content_list.is_intl as is_intl',
            'content_list.is_hindi as is_hindi',
            'content_list.status as status',
            'hindi_content_ref.updated_by as updated_by',
            'content_list.created_at as created_at',
            'content_list.updated_at as updated_at',
            'seo_tags_hindi.*'
        )
            ->leftJoin('hindi_content_ref','hindi_content_ref.content_id','=','content_list.content_id')
            ->leftJoin('seo_tags_hindi','seo_tags_hindi.tag_id','=','hindi_content_ref.kicker')
            ->where('content_list.is_hindi', 1)->where('content_list.site_type' ,'!=', 'ga')->where('content_list.status', 1)
            ->where('content_list.content_id', '!=', $id)
            ->orderBy('content_list.'.$orderBy, 'desc')
            ->where('content_list.time', '>', $time)
            ->take($count)
            ->get();
        if(empty($list))
            return $list;
        $popularArticles = $list->toArray();
        return CommonController::contentUrlSlug($popularArticles);

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

        $redirectUrl    = config('constants.MainDomain') . '/' . $artSite . '/' . $articles['slug'] .'.'. $contentIdParam;

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

        $nextArticle =  $this->getNextArticle($contentIdParam, $articles['site_type'],null, 0);

        $relatedArr  = explode(',', $articles['related_brand']);

        //check data is available with given contentId
        if (count($articles) == 0)
            return redirect('/404');

        //fetch designation with selected author
        $authorDesc = AuthorList::query()->select('author_list.*','designation')->where('title', $articles->author)->first();

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
//        dd($nextArticle);

        return view('article/newarticleinner', compact('articles', 'authorDesc','authorDesc', 'cmtShow', 'comment', 'articlesCount', 'seoVal', 'likeArticles', 'relatedBrands', 'nextArticle', 'authorDesig', 'redirectUrl', 'commentReplies'));
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

    public function getAuthorDetails(Request $request){
        $contentAuthor      = $request->author;
        $brand            = new BrandController;
        $author           = str_replace('-', ' ', $contentAuthor);
        $checkAuthor         = AuthorList::query()->where('title', 'LIKE', $author)->first();

        if (empty($checkAuthor)) {
            return redirect('/content', 301);
        }


        $authorArticles         = ContentList::query()->select('content_list.title as content_title','content_list.image as content_image','author_list.image as author_image','content_list.*','author_list.*')
            ->where('content_list.author', 'LIKE', $author)
//            ->orWhereIn('content_list.content_id', $kickerContentArr)
            ->leftJoin('author_list','author_list.title','=','content_list.author')
            ->where('content_list.status', 1)
            ->orderBy('content_list.content_id', 'desc')
            ->paginate(10);
//        dd($authorArticles);
        //for related business Articles
        $relatedBrands = $brand->getRandomBrands(6);
        return  view('article.author',compact('checkAuthor','relatedBrands','authorArticles'));
    }

    public function getAuthorHindiDetails(Request $request){
        $contentAuthor      = $request->author;
        $brand            = new BrandController;
        $author           = str_replace('-', ' ', $contentAuthor);
        $checkAuthor         = AuthorList::query()->where('title', 'LIKE', $author)->first();

        if (empty($checkAuthor)) {
            return redirect('/hi/content', 301);
        }


        $authorArticles         = ContentList::query()->select(
            'author_list.*',
            'hindi_content_ref.content_id as content_id',
            'content_list.site_type as site_type',
            'content_list.contentType as contentType',
            'seo_tags_hindi.name as hindi_kicker',
            'hindi_content_ref.home_title as hindi_home_title',
            'hindi_content_ref.title as hindi_title',
            'hindi_content_ref.short_desc as hindi_shortDesc',
            'hindi_content_ref.content as hindi_content',
            'content_list.company as company',
            'content_list.is_noindexnofollow as is_noindexnofollow',
            'content_list.image as content_image',
            'content_list.slug as slug',
            'content_list.time as time',
            'content_list.totalComment as totalComment',
            'content_list.totalVotes as totalVotes',
            'content_list.views as views',
            'content_list.is_intl as is_intl',
            'content_list.is_hindi as is_hindi',
            'content_list.status as status',
            'hindi_content_ref.updated_by as updated_by',
            'content_list.created_at as created_at',
            'content_list.updated_at as updated_at',
            'seo_tags_hindi.*'
        )
            ->leftJoin('hindi_content_ref','hindi_content_ref.content_id','=','content_list.content_id')
            ->leftJoin('seo_tags_hindi','seo_tags_hindi.tag_id','=','hindi_content_ref.kicker')
            ->leftJoin('author_list','author_list.title','LIKE','hindi_content_ref.author')
            ->where('content_list.is_hindi', 1) ->where('content_list.site_type' ,'!=', 'ga')->where('content_list.status', 1);


        $authorArticles = $authorArticles->where('hindi_content_ref.author','LIKE',$author)->paginate(10);
//        dd($authorArticles);
        //for related business Articles
        $relatedBrands = $brand->getRandomBrands(6);
        return  view('article.author_hindi',compact('checkAuthor','relatedBrands','authorArticles'));
    }

    public function getNextArticleForRepeat(Request $request){
        $contentId = $request->contentId;
//        dd($contentId);
        $is_hindi           =  ($request->lang == 'hi') ? 1 : 0;
        $siteType           =  (empty($request->sitetype)) ? 'fi' : ($request->sitetype);
//        if(empty($contentId))
//            $contentId = 14166;
//        dd($contentId);

        $brand       = new BrandController;

        //fetch data with selected contentId
        $articles = ContentList::query()
//            ->select('content_list.image as content_image','author_list.image as author_image','content_list.*','author_list.*')
//            ->leftJoin('author_list','author_list.title','=','content_list.author')
            ->find($contentId);


        if (count($articles) == 0 || $articles->status != 1)
            return response()->json(['urlSlug' => '/content'], 301);

        $artSite     = config('constants.articleArr.' . $articles['site_type']);

        if ($articles['site_type'] != 'fi') {
            $redirectUrl = config('constants.MainDomain') . '/' . $artSite . '/' . $articles['slug'] .'.'. $contentId;
            return redirect($redirectUrl);
        }
//        dd($nextArticle);

        if($is_hindi == 1)
            $articles = $articles->where('is_hindi', 1);


        if (count($articles) == 0) {
            $articles = ContentList::query()->where('content_id', '>', $contentId);

            if($is_hindi == 1)
                $articles = $articles->where('is_hindi', 1);

            $articles = $articles->where('site_type', $articles->siteType)
                ->where('status', 1)
                ->orderBy('content_id', 'desc')
                ->take(1)->get();
        }


        $comment = ContentComment::query()->select('comment_email', 'comment_content', 'comment_date', 'comment_user', 'commentID')
            ->where('articleID', $contentId)
            ->where('status', 'Y')
            ->get();

        if(!empty($comment))
            $commentReplies = ArticleInterviewCommentReply::query()->whereIn('comment_id', $comment->pluck('commentID'))->get();

        $articles['urlKicker'] = CommonController::cleanSpecialChar($articles['kicker']);

        //update views whenever article is viewed
        ContentList::query()->where('content_id', $contentId)->increment('views');

        $nextArticle =  $this->getNextArticle($contentId, $articles['site_type'],$articles['kicker'], 0);
//dd($nextArticle);
        if(($nextArticle->isEmpty())){
            return response()->json(['message'=> 'No Data Found']);
        }

        $relatedArr  = explode(',', $articles['related_brand']);

        //check data is available with given contentId
        if (count($articles) == 0)
            return redirect('/404');

        //fetch designation with selected author
        $authorDesc = AuthorList::query()->select('author_list.*','designation')->where('title','LIKE', $nextArticle[0]['author'])->first();


        // Fetch tag id for a article
        $articleTags = ContentTagsAssigned::query()->select('tag_id')
            ->where('content_id', $contentId)
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
        $nextArticle = collect($nextArticle);


        $returnHTML = view('includes.article1.commanrepeat',compact('articles', 'authorDesc', 'cmtShow', 'comment', 'articlesCount', 'seoVal', 'likeArticles', 'relatedBrands', 'nextArticle', 'authorDesig', 'redirectUrl', 'commentReplies'))->render();
        return $returnHTML;

    }
    public function getNextArticleHindiForRepeat(Request $request){
        $authorDesig = "";
        $contentId   = request()->contentId;
//        dd($contentId);
        $article =     HindiContentRef::query()->find($contentId);
        $nextArticle =     HindiContentRef::query()->where('content_id', '>', $contentId)->where('kicker',$article->kicker)->first();

        $brand       = new BrandController;
        $kicker      = SeoTagHindi::query()->where('tag_id', $article->hindi->kicker)->first();
        $tagArr      = ContentTagsAssignedHindi::query()->where('content_id', $contentId)->where('content_type', 1)->get()->pluck('tag_id');
        $seoVal      = SeoTagHindi::query()->select('tag_id', 'name')->whereIn('tag_id', $tagArr)->get();
        ContentList::query()->where('content_id', $contentId)->increment('views');

//        $nextArticle =  $this->getNextArticle($contentId, $article->site_type, 1);

        //fetch designation with selected author
        $authorDesc  = AuthorList::query()->select('*')->where('title','LIKE', $nextArticle->author)->first();
//dd($authorDesc);

        if (count($authorDesc) == 1)
            $authorDesig     = $authorDesc->designation;

        //Related Brands Listing fetch
        $relatedArr          = explode(',', $article->related_brand);
        $relatedBrands       = empty($articles['related_brand']) ? $brand->getRandomBrands(4) : $brand->getArticleInnerBrands($relatedArr);

        //for You may like
        $likeArticles        = $this->likeArticlesArticleInner(25, 1);

        //all Seo tags
//        $tags = $likeArticles->pluck('hindi')->pluck('kicker');
//        $tags =  SeoTagHindi::query()->whereIn('tag_id', $likeArticles->kicker)->first();
        $tags = SeoTagHindi::query()->first();

        //Comments Section
        $comments   = ContentComment::query()->select('comment_email', 'comment_content', 'comment_date', 'comment_user', 'commentID') ->where('articleID', request()->id) ->where('status', 'Y') ->get();

        if(!empty($comments))
            $commentReplies  = ArticleInterviewCommentReply::query()->whereIn('comment_id', $comments->pluck('commentID'))->get();


        if((empty($nextArticle))){
            return response()->json(['message'=> 'No Data Found']);
        }
//        dd($nextArticle->author);
        $returnHTML = view('includes.article1.commanrepeat',compact( 'authorDesc', 'cmtShow', 'comment', 'articlesCount', 'seoVal', 'likeArticles', 'relatedBrands', 'nextArticle', 'authorDesig', 'redirectUrl', 'commentReplies'))->render();
        return $returnHTML;

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

//        $articles = ContentList::all();

        $articles         = ContentList::query()
            ->select('hindi_content_ref.*',
                'hindi_content_ref.content as hindi_content',
                'hindi_content_ref.title as hindi_title',
                'hindi_content_ref.author as hindi_author',
                'hindi_content_ref.kicker as kickerId',
                'content_list.*',
                'author_list.image as author_image',
                'seo_tags_hindi.*')
            ->leftJoin('author_list','author_list.title','=','content_list.author')
            ->leftJoin('hindi_content_ref','hindi_content_ref.content_id','=','content_list.content_id')
            ->leftJoin('seo_tags_hindi','seo_tags_hindi.tag_id','=','hindi_content_ref.kicker')
            ->where('hindi_content_ref.kicker',$kicker->tag_id)
            ->where('content_list.status', 1)
            ->where('content_list.is_hindi', 1)
            ->orderBy('hindi_content_ref.content_id', 'desc')
            ->paginate(10);

        $articles = CommonController::contentUrlSlug($articles);

        //if no data related with contentId then show "404 ERROR"
        if (empty($articles))
            return redirect('/content', 301);


        $articles = CommonController::contentUrlSlug($articles);
        $relatedBrands = $brand->getRandomBrands(4);
//        dd($articles);

        return view('article.articlelist_hindi', compact('articles','kicker', 'relatedBrands'));
    }

    public function getVideoAndPodcast()
    {
        //for Videos
        $videoArticles = FihlVideo::query()->select('*')
            ->where('status', 'A')
            ->where('category', 1)
            ->orderBy('sno', 'desc')
            ->paginate(10);

        if(empty($videoArticles))
            return $videoArticles;

//        $videoArticles = $videoArticles->toArray();

//        $i = 0;
//       $count =  count($videoArticles);
//        while ($i < $count) {
//            $videoArticles[$i]['urlTitle'] = CommonController::cleanSpecialChar($videoArticles[$i]['title']);
//            $i++;
//        }
//        dd($videoArticles);

        return view('article.videoarticlelist',compact('videoArticles'));
    }
    public function slugify($text,  $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }


}
