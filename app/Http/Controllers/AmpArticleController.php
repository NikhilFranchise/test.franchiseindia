<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentList;


class AmpArticleController extends Controller
{
   /**
     * function for showing kicker's articles
     * @param Request $request
     * @return $this|string
     */
    public function ampCreate(Request $request)
    {
        $siteType   = $request->contentSite;
        if($siteType != 'content' && $siteType != 'restaurant'  && $siteType != 'education'  &&         $siteType != 'wellness' )
            return redirect('/content');

        $contentId           = $request->id;
        $articles            = ContentList::query()->where('content_id', $contentId)->first();

        if($siteType == 'restaurant')
            return redirect('https://www.indianretailer.com/restaurant'.str_replace('/restaurant/', '/article/', request()->getRequestUri()), 301);

        if(empty($articles))
            return redirect('/'.$siteType);

        $articles->content   = $this->changeContentToAmp($articles->content);
        $articles->urlKicker = CommonController::cleanSpecialChar($articles->kicker);

        return view('article/articleinneramp')->with(compact('articles'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getAmpHindiArticle(Request $request)
    {
        $siteType   = $request->contentSite;
        if($siteType != 'content' && $siteType != 'restaurant'  && $siteType != 'education'  && $siteType != 'wellness' )
            return redirect('/content');
        
        $contentId                = $request->id;
        $articles                 = ContentList::query()->find($contentId);
        $articles->hindi->content = $this->changeContentToAmp($articles->hindi->content);
        $seoTag                   = SeoTagHindi::query()->first();
        $seoTitle                 = $articles->hindi->title;
        $seoDesc                  = $articles->hindi->short_desc;

        return view('article/hindi/hindi-amp-inner')->with(compact('articles','seoTag', 'seoDesc', 'seoTitle'));
    }

    /**
     * Amp page for hindi
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ampArticleHindiHome()
    {
        $articles          = ContentList::query()->where('is_hindi', 1)->where('status', 1)->paginate(20); //NewsHome Page News
        $seoTags           = SeoTagHindi::query()->first();
        $seoTitle          = 'Franchise Articles and Information, New Business Ideas - Franchise India';
        $seoDesc           = 'Read our latest and popular collection of franchise articles includes new business ideas,franchise information and franchise opportunities';
        return view('article.hindi.amp-hindi-home', compact('seoDesc', 'seoTitle', 'articles', 'seoTags'));
    }

    /**
     * Hindi Amp kicker list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAmpHindiKickerList()
    {
        $kickerId      = request()->kickerId;
        $kicker        = SeoTagHindi::query()->where('tag_id', $kickerId)->first();

        if(count($kicker) == 0)
            return redirect()->back();


        if(request()->kicker != $kicker->name)
            return redirect('amp/hi/content/'.$kicker->name.'/'.$kickerId);

        $seoTags       = SeoTagHindi::query()->first();
        $contentIds    = ContentTagsAssignedHindi::query()->where('content_type', 1)->where('tag_id', $kickerId)->get()->pluck('content_id');
        $articles      = ContentList::query()->where('is_hindi', 1)->whereIn('content_id', $contentIds)->paginate(25);
        $seoTitle      = 'Franchise Articles and Information, New Business Ideas - Franchise India';
        $seoDesc       = 'Read our latest and popular collection of franchise articles includes new business ideas,franchise information and franchise opportunities';

        return view('article.hindi.amp-hindi-kicker-list', compact('kicker', 'seoDesc', 'seoTitle', 'articles', 'articleTags', 'seoTags'));
    }

    private function changeContentToAmp($text)
    {
        $text = preg_replace("/<img[^>]+\>/i", "", $text);
        $text = preg_replace("/&#?[a-z0-9]+;/i","",$text);
        $text = preg_replace("/<v>/i", "", $text);
        $text = preg_replace('#<iframe[^>]+>.*?</iframe>#is','', $text);
        $text = preg_replace('/style=\\"[^\\"]*\\"/', '', $text);
        return $text = preg_replace('(mso-[a-z\-: ]+; )i', '', $text);

    }
}
