<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use App\Models\SeoTag;
use App\Models\NewsList;
use App\Models\FihlVideo;
use App\Models\AuthorList;
use App\Models\ContentList;
use App\Models\MagazineList;
use App\Models\CategoryFinal;
use App\Models\ContentComment;
use App\Models\FihlVideoCategory;
use App\Models\MagazineCategorie;
use App\Models\ContentTagsAssigned;
use App\Models\FranchisorBusinessDetail;
use App\Models\ArticleInterviewCommentReply;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    //
    public function galleryArticleHome()
    {
        //for Popular
        $articles      = ContentList::where('status', 1)
                                    ->orderBy('content_id', 'desc')
                                    ->where('site_type', 'ga')
                                    ->paginate(10);
        
        $i = 0;
        while ($i < count($articles)) {
          $seoTagId                  = SeoTag::where('name', $articles[$i]['kicker'])->first();
          if (!empty($seoTagId))
            $articles[$i]['kicker_id'] = $seoTagId->tag_id;
          $i++;
        }          

        /**
         * for Videos
         */
        $videoArticles = FihlVideo::select('sno', 'videoID', 'title', 'views', 'create_date', 'category')
                                  ->where('status', 'A')
                                  ->orderBy('sno', 'desc')
                                  ->take(9)
                                  ->get()->toArray();


        /**
         * for News
         */
        $newsArticles = NewsList::select('news_id', 'title', 'homeTitle', 'kicker', 'news_type', 'image')
                                ->where('status', 1)
                                ->orderBy('news_id', 'desc')
                                ->take(4)
                                ->get()->toArray();

        //for related business Articles
        $relatedBrands = FranchisorBusinessDetail::where('profile_status', 1)
                                                 ->where('membership_type', 1)
                                                 ->orderByRaw("RAND()")
                                                 ->take(6)
                                                 ->get()->toArray();

        return view('gallery/articlehome')->with(compact('articles',  'articles', 'videoArticles', 'newsArticles', 'relatedBrands'));
    }

    /**
     * function for showing article with article id
     * @param Request $request
     * @return $this|string
     */
    public function galleryArticle(Request $request)
    {
        $commentReplies = [];

        //fetch data with selected contentId
        $articles    = ContentList::where('content_id', $request->id)->first();

        if($articles->count() == 0 || $articles->status == 0 || $articles->site_type != 'ga')
         return redirect('404');
                                
        $slider      = DB::table('content_slider_images')->select('image', 'content')->where('content_id', $request->id)->get();

        $comment     = ContentComment::select('comment_email', 'comment_content', 'comment_date', 'comment_user', 'commentID')
                                     ->where('articleID', $request->id)
                                     ->where('status', 'Y')
                                     ->get();

        if(!empty($comment))
            $commentReplies = ArticleInterviewCommentReply::whereIn('comment_id', $comment->pluck('commentID'))->get();

        $count       = ContentList::select('views')->where('content_id', $request->id)->get();

        $redirectUrl = config('constants.MainDomain') . '/gallery/' .  Str::slug($articles->title) .'.'. $request->id;

        //update views whenever article is viewed
        $updateViews = ContentList::where('content_id', $request->id)->increment('views');

        $nextArticle = ContentList::select('kicker', 'image', 'title', 'homeTitle', 'content_id', 'site_type')
                                  ->where('content_id', '>', $request->id)
                                  ->where('site_type', 'ga')
                                  ->where('status', 1)
                                  ->orderBy('content_id', 'asc')
                                  ->first();

        if ($nextArticle == null || $nextArticle->count() == 0)  {
            $nextArticle = ContentList::select('kicker', 'image', 'title', 'homeTitle', 'content_id', 'site_type')
                                    ->where('content_id', '<', $request->id)
                                    ->where('site_type', 'ga')
                                    ->where('status', 1)
                                    ->orderBy('content_id', 'desc')
                                    ->first();
        }

        if(!empty($nextArticle)) {
          $seoTagId                   = SeoTag::where('name', $nextArticle->kicker)->first();
          $nextArticle['kicker_id']   = (!empty($seoTagId) ? $seoTagId->tag_id : "");
        }

        $relatedArr      = explode(',', $articles['related_brand']);

        //check data is available with given contentId
        if ($articles->count() == 0 || $articles == null) {
            return "NO result found with the given id..!";
        }

        //fetch designation with selected author
        $authorDesc  = AuthorList::select('designation')
                                 ->where('title', $articles->author)
                                 ->first();
        $authorDesig = '';
        if ($authorDesc->count() == 1) {
            $authorDesig = $authorDesc->designation;
        }

        // Fetch tag id for a article
        $articleTags = ContentTagsAssigned::select('tag_id')
                                          ->where('content_id', $request->id)
                                          ->where('content_type', 1)
                                          ->get()->toArray();

        // Single column array of tag ids
        $tagArr = array_column($articleTags, 'tag_id');

        // Fetch tag id and tag name using IN query
        $seoVal = SeoTag::select('tag_id', 'name')
                        ->whereIn('tag_id', $tagArr)
                        ->get();


        if ($articles['related_brand'] == '') {
            $relatedBrands = FranchisorBusinessDetail::select('profile_name', 'company_name', 'business_desc',
                                'company_logo', 'membership_type',
                                'franchise_start_year', 'no_fran_outlets', 'operations_start_year', 'unit_investment',
                                'prop_area_min', 'city', 'state', 'company_name', 'ind_sub_cat', 'ind_cat',
                                'franchise_partner_type', 'fran_detail_id')
                                ->orderByRaw("RAND()")
                                ->where('profile_status', 1)
                                ->where('membership_type', 1)
                                ->take(4)
                                ->get()->toArray();

        } else {
            $relatedBrands = FranchisorBusinessDetail::select('profile_name', 'company_name', 'business_desc',
                'company_logo', 'membership_type',
                'franchise_start_year', 'no_fran_outlets', 'operations_start_year', 'unit_investment',
                'prop_area_min', 'city', 'state', 'company_name', 'ind_sub_cat', 'ind_cat', 'franchise_partner_type',
                'fran_detail_id')
                ->whereIn('franchisor_id', $relatedArr)
                ->where('profile_status', 1)
                ->where('membership_type', 1)
                ->get()->toArray();
        }

        //for You may like
        $likeArticles = ContentList::where('status', 1)
                                   ->orderByRaw("RAND()")
                                   ->where('site_type', 'ga')
                                   ->take(8)
                                   ->get();

        $i = 0;
        while ($i < $likeArticles->count()) {
          $likeArticles[$i]['kicker_id']   = "";
          if ($likeArticles[$i]['site_type'] == 'ga') {
            $seoTagId                  = SeoTag::where('name', $likeArticles[$i]['kicker'])->first();
            if (!empty($seoTagId))
              $likeArticles[$i]['kicker_id'] = $seoTagId->tag_id;
          }
          $i++;
        }

        //for You may like
        $likeContents = ContentList::where('status', 1)
                                   ->orderByRaw("RAND()")
                                   ->where('site_type', 'ga')
                                   ->take(12)
                                   ->get();


        $moreArticles = ContentList::where('status', 1)
                                   ->where('content_id', '<>', $likeContents->pluck('content_id'))
                                   ->orderByRaw("RAND()")
                                   ->where('site_type', 'ga')
                                   ->take(10)
                                   ->get();


        $i = 0;
        while ($i < $moreArticles->count()) {
          $moreArticles[$i]['kicker_id']   = "";
          if ($moreArticles[$i]['site_type'] == 'ga') {
            $seoTagId                  = SeoTag::where('name', $moreArticles[$i]['kicker'])->first();
            if (!empty($seoTagId))
              $moreArticles[$i]['kicker_id'] = $seoTagId->tag_id;
          }

          $i++;
        }

        $tagId                  = SeoTag::select('tag_id')->where('name', $articles['kicker'])->first()->tag_id;

        return view('gallery/articleinner')->with(compact('articles', 'authorDesc', 'comment', 'seoVal', 'likeArticles', 'relatedBrands', 'nextArticle', 'likeContents', 'moreArticles', 'authorDesig', 'redirectUrl', 'slider', 'tagId', 'commentReplies'));
    }


    /**
     * function for showing kicker's articles
     * @param Request $request
     * @return $this|string
     */
    public function galleryArticleKickersPage(Request $request)
    {
        $kicker           = SeoTag::where('tag_id', $request->kicker_id)->first();
        
        if ($kicker->count() == 0 || $kicker == null)
            return redirect('/gallery');

        $kicker           = $kicker->name;
        $kickerContent    = ContentTagsAssigned::where('tag_id', $request->kicker_id)->get();

        if ($kickerContent->count() == 0 || $kickerContent == null)
            return redirect('404');


        $kickerContentArr = $kickerContent->pluck('content_id');

        //for most shared image
        $most = ContentList::where('status', 1)
                           ->where('site_type', 'ga')
                           ->whereIn('content_id', $kickerContentArr)
                           ->orderBy('content_id', 'desc')
                           ->first();

        if ($most->count() == 0 || $most == null)
            return redirect('404');

        //for Popular
        $popularArticles = ContentList::select('title', 'homeTitle', 'content_id', 'site_type')
                                      ->where('status', 1)
                                      ->where('kicker', $kicker)
                                      ->where('content_id', '!=', $most->content_id)
                                      ->orderBy('content_id', 'desc')
                                      ->where('site_type', 'ga')
                                      ->take(5)
                                      ->get();


        if ($popularArticles->count() < 5) {
            $popularArticles = ContentList::select('title', 'homeTitle', 'content_id', 'site_type', 'image')
                                          ->where('status', 1)
                                          ->where('content_id', '!=', $most->content_id)
                                          ->orderBy('content_id', 'desc')
                                          ->where('site_type', 'ga')
                                          ->orderByRaw("RAND()")
                                          ->take(5)
                                          ->get();
        }


        //Fetch the data with fetched contentId from the table into array
        $articles = ContentList::where('status', 1)
                               //->whereNotIn('content_id', $popularArticles->pluck('content_id'))
                               ->whereIn('content_id', $kickerContentArr)
                               ->orderBy('content_id', 'desc')
                               ->where('site_type', 'ga')
                               ->paginate(15);

        $i = 0;
        while ($i < $articles->count()) {
            $articles[$i]['kicker_id']   = "";
            if ($articles[$i]['site_type'] == 'ga') {
              $seoTagId                  = SeoTag::where('name', $articles[$i]['kicker'])->first();
              if (!empty($seoTagId))
                $articles[$i]['kicker_id'] = $seoTagId->tag_id;
            }

            $i++;
        }


        //if no data related with contentId then show "404 ERROR"
        if ($articles->count() == 0 || $articles == null) {
            return redirect('404');
        }

        /**
         * for Videos
         */
        $videoArticles = FihlVideo::select('sno', 'videoID', 'title', 'views', 'create_date', 'category')
                                  ->where('status', 'A')
                                  ->orderBy('sno', 'desc')
                                  ->take(9)
                                  ->get()->toArray();


        /**
         * for News
         */
        $newsArticles = NewsList::select('news_id', 'title', 'homeTitle', 'kicker', 'news_type', 'image')
                                ->where('status', 1)
                                ->orderBy('news_id', 'desc')
                                ->take(4)
                                ->get()->toArray();

        //for related business Articles
        $relatedBrands = FranchisorBusinessDetail::where('profile_status', 1)
                                                 ->where('membership_type', 1)
                                                 ->orderByRaw("RAND()")
                                                 ->take(6)
                                                 ->get()->toArray();

        return view('gallery/articlelist')->with(compact('articles', 'kicker', 'most', 'popularArticles', 'videoArticles', 'newsArticles', 'relatedBrands'));
    }
}
