@extends('layout.master')
@section('content')

    <style type="text/css">
        ul.yearartielist a { font-family:"Open Sans Light", "serif"; font-size:14px; line-height:18px; color:#333333; }
        ul.yearartielist a span { font-family:"Open Sans Semibold", "serif"; }
        ul.yearartielist a:hover { color:#006699; }
        .sitemapblksect .nav-tabs>li { margin-right:5px; display:inline-block; float:none; }
        .sitemapblksect .nav-tabs>li>a { background:#fff; border:1px solid #d4d4d4;  font-family:"Open Sans Regular", "serif"; font-size:14px; color:#333; line-height:20px; border-radius:4px; padding:10px 31px;}
        .sitemapblksect .nav-tabs>li.active>a, .eventtabblk .nav-tabs>li.active>a:focus, .eventtabblk .nav-tabs>li.active>a:hover { background:#333; border:1px solid #333; color
        :#fff;  }
        .sitemapblksect .nav-tabs>li>a:hover {background:#333; border:1px solid #333; color
        :#fff;  }
        ul.siteartielist { margin-left:0; margin-bottom:20px;}
        ul.siteartielist li{ font-family:"Open Sans Regular", "serif"; font-size:14px; line-height:17px;   padding-right:30px; vertical-align:top; margin-bottom:18px; }
        ul.siteartielist a { color:#333333; }
        ul.siteartielist a:hover { color:#006699; }
        .sitemapsubhead {font-family:"Open Sans Light", "serif"; font-size:25px; line-height:22px; margin-bottom:30px; color:#333333;}
        .sitemapsubhead span{font-family:"Open Sans Semibold", "serif";}
    </style>

    <div class="container formsection margintop60 staicp">
        <div class="">
            <h1>Sitemap</h1>
        </div>
    </div>

    <div class="container sitemapsection">
        <div class="sitemapsubhead">Stories / {{ Request::segment(3)  }} / <span>{{ Request::segment(4)  }}</span></div>
        <div class="row">
            @foreach($articles as $article)
                @if($loop->index == 0 || $loop->index == (round(count($articles)/2)+1) )
                    <div class="col-xs-12 col-sm-4 col-md-6">
                        <ul class="siteartielist">
                            @endif
                            <li><a href="{{ Config('constants.MainDomain') }}/{{ Config('constants.articleArr.'.$article['site_type']) }}/{{ $article['slug'] }}.{{ $article['content_id'] }}">{{ $article['title'] }}</a></li>
                            @if($loop->index == round(count($articles)/2) )
                        </ul>
                    </div>
                    @endif
                    @endforeach
                    </ul>
        </div>
    </div>
    </div>
    <!--form end here -->
    <div class="height40"></div>
@endsection
