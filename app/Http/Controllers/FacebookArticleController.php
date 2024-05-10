<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentList;
use App\Http\Controllers\CommonController;
class FacebookArticleController extends Controller
{
    //
    public function rss()
    {
        $contents        = ContentList::where('status', 1)->where('site_type', '!=', 'ga')
                                      ->whereIn('content_id', [11014, 11016, 11015, 11013, 11012, 11011, 11010, 11009, 11008, 11007, 11006] )
                                      ->orderBy('content_id', 'desc')->take(20)->get();
        $contents        = CommonController::contentUrlSlug($contents); 
        header('Content-type: application/xml');             
        return view('rss-feed', compact('contents'));
    }
}
