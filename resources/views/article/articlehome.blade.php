@extends('layout.articlemaster')
@section('seoTitle', 'Franchise Articles and Information, New Business Ideas - Franchise India')
@section('seoDesc', 'Read our latest and popular collection of franchise articles includes new business ideas,franchise information and franchise opportunities')
@section('seoKeywords', 'best franchise, franchising, new business ideas, buy franchise, franchise information, small franchise business, best franchise business company in India')
@php
    $hindiUrl = url('/hi/content');//str_replace( '/category/', '/hi/category/', str_replace('/business-opportunities/', '/hi/business-opportunities/', url()->current()));
    $engUrl   = url('/content');//url()->current();
@endphp

@section('hindiUrl', $hindiUrl)
@section('englishUrl', $engUrl)
<!-- Top search header code Start-->
@mobile
@include('layout.newhomepage.mobile.topsearch')
@endmobile
@tablet
@include('layout.newhomepage.topsearch')
@endtablet
@desktop
@include('layout.newhomepage.topsearch')
@enddesktop
<!-- Top search header code End-->
@section('content')
    <div class="artsec">
        <ul class="headarticl">        
            @foreach($homeArticle as $article)
                @php
                    $site   = Config('constants.articleArr.'.$article['site_type']);
                    $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                    $image  = Config('constants.awsS3Url').$article['image'];
                   $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                    if ( $article['site_type'] == 'ga' ) {
                        $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                        $image  = $article['image'];
                        $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                    }

                @endphp
                @if($loop->index < 4)
                    <li>
                        <div class="img-header" onclick="window.location = '{{ $url }}';">
                            @if( $site == "gallery") 
                               <div class="gallopt"><img src="{{url('images/galleyicon.png')}}" alt="gallicon"></div>
                            @endif
                            <div class="img-vaheader">
                                <a href="{{ $url }}">
                                    <img src="{{ $image }}" alt="{{$article['kicker']}}">
                                </a>
                            </div>
                            <span class="text-header">
                                <div class="text-rep-blk">
                                    <div class="a-name-red">
                                        <span>
                                            <a href="{{ $kicker }}">
                                                {{$article['kicker']}}
                                            </a>
                                        </span>
                                    </div>
                                    <div class="show-an-txt">
                                        <a href="{{ $url }}">
                                         @if($article['homeTitle']=='')
                                             {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,160)), 0, 20))}}
                                         @endif
                                         {{$article['homeTitle']}}
                                        </a>
                                        <div class="authorname"> By <span>{{$article['author']}}</span></div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="row headcommbanner artibanner">
        <div class="fullcontainer">

            @desktop
            @include("includes.banners.dfp_970X90")
            @enddesktop
            @mobile
            @include("includes.banners.dfp_320X100")
            @endmobile
            @tablet
            @include("includes.banners.dfp_Tab_728X90")
            @endtablet
        </div>
    </div>

<div class="container articlesection">
    <div class="row row-no-margin">
        <!--left section start here -->
        <div class="col-xs-12 col-sm-2 col-md-2 row-no-padding artileftpanel">
            <div class="artihaed">Trending</div>
            <!--side art start here -->
            @foreach($trendArticles as $article)
                @php
                    $site   = Config('constants.articleArr.'.$article['site_type']);
                    $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                    $image  = Config('constants.awsS3Url').$article['image'];
                    $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                    if ( $article['site_type'] == 'ga' ) {
                        $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                        $image  = $article['image'];
                        $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                    }

                @endphp

                @if($loop->index == 4)
                    <div class="sidearce">
                        <div class="sidearce">
                            @mobile
                            <div class="row row-no-margin adcebtbtm">
                                @include("includes.banners.dfp_300X250")

                            </div>
                            @endmobile
                        </div>
                    </div>
                @endif
                <div class="sidearce @if($loop->index == 0) firstmargin0 @endif">
                    <div class="artsideimg">
                        @if( $site == "gallery")
                           <div class="gallopt"><img class="lozad" alt="gallery icon franchiseindia" data-src="{{url('images/galleyicon.png')}}"></div>
                        @endif
                        <a href="{{ $url }}">
                            <img class="lozad" data-src="{{$image}}" alt="{{$article['kicker']}}">
                        </a>
                    </div>
                    <div class="artsidesubhead">
                        <a href="{{$kicker}}">
                            {{$article['kicker']}}
                        </a>
                    </div>
                    <div class="artsidetext">
                        <a href="{{ $url }}">
                            @if(empty($article['homeTitle']))
                                {{$article['title']}}
                            @else
                                {{$article['homeTitle']}}
                            @endif
                        </a>
                    </div>
                </div>
             @endforeach

        </div>
        <!--left section end here -->

        <!--middle section start here -->
        <div class="col-xs-12 col-sm-7 col-md-7 artimiddlepanel">
            <div class="artihaed">
                <h1>Recent Stories</h1>
                <a href="{{ Config('constants.MainDomain') }}/latest" class="commanviewallBT">View All</a>
            </div>
            @php
                $a    = date_create($homeArticle[4]['time']);
                $date = date_format($a,"M, d Y");

                $site   = Config('constants.articleArr.'.$homeArticle[4]['site_type']);
                $kicker = Config('constants.MainDomain').'/content/'.str_slug($homeArticle[4]['kicker']);
                $image  = Config('constants.awsS3Url').$homeArticle[4]['image'];
                $url    = Config('constants.MainDomain').'/'.$site.'/'.$homeArticle[4]['slug'].'.'.$homeArticle[4]['content_id'];

                if ( $homeArticle[4]['site_type'] == 'ga' ) {
                    $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($homeArticle[4]['kicker']).'/'.$homeArticle[4]['kicker_id'];
                    $image  = $homeArticle[4]['image'];
                    $url    = Config('constants.MainDomain').'/'.$site.'/'.$homeArticle[4]['slug'].'.'.$homeArticle[4]['content_id'];
                }

            @endphp

            <div class="artbigimg artirel">
                @if( $homeArticle[4]['site_type'] == "ga")
                    <div class="gallopt"><img class="lozad" alt="gallery icon franchise india" data-src="{{url('images/galleyicon.png')}}"></div>
                @endif
                <a href="{{ $url }}">
                    <img class="lozad" data-src="{{ $image }}" alt="{{ $homeArticle[4]['title']}} " />
                </a>
            </div>
            <!-- four artcle and all section start here -->
            <div class="mdeo">
                <div class="artimainhead">
                    <a href="{{ $kicker }}">
                        {{$homeArticle[4]['kicker']}}
                    </a>
                    <span>{{$date}}</span>
                </div>
                <div class="artisubmainhead">
                    <a href="{{ $url }}">
                        @if(empty($homeArticle[4]['homeTitle']))
                            {{$homeArticle[4]['title']}}
                        @else
                            {{$homeArticle[4]['homeTitle']}}
                        @endif
                    </a>
                </div>
                @foreach($homeArticle as $article)

                    @php
                        $site   = Config('constants.articleArr.'.$article['site_type']);
                        $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                        $image  = Config('constants.awsS3Url').$article['image'];
                        $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                        if ( $article['site_type'] == 'ga' ) {
                            $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                            $image  = $article['image'];
                            $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                        }
                    @endphp

                    @if($loop->index > 5)
                        <div class="midesidearce ">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="midimg">
                                        <a href="{{ $url }}">
                                            <img class="lozad" data-src="{{ $image }}" alt="{{$article['kicker']}}" >
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8 row-no-padding respaddingauto">
                                    <div class="middlesubhead">
                                        <a href="{{ $kicker }}">{{$article['kicker']}}</a>
                                        @if( $site == "gallery")
                                            <img class="lozad" data-src="{{url('images/galleyicon2.png')}}" class="gallicon2" />
                                        @endif
                                    </div>
                                    <div class="middletartsidetext">
                                        <a href="{{ $url }}">
                                            @if(empty($article['homeTitle']))
                                                {{$article['title']}}
                                            @else
                                                {{$article['homeTitle']}}
                                            @endif
                                        </a>
                                    </div>
                                    <p>
                                        {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,160)), 0, 20))}}..
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @mobile
                <div class="row row-no-margin adcebtbtm">
                    @include("includes.banners.dfp_300X250_Mid_1")

                </div>
                @endmobile
                <div class="row marminleft bortop">
                    <div class="mohead">
                        Most Commented <!--<a href="{{ Config('constants.MainDomain') }}/commented" class="commanviewall">View All</a>-->
                    </div>

                    @foreach($mostCommented as $article)
                        @php
                            $site   = Config('constants.articleArr.'.$article['site_type']);
                            $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                            $image  = Config('constants.awsS3Url').$article['image'];
                            $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                            if ( $article['site_type'] == 'ga' ) {
                                $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                                $image  = $article['image'];
                                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                            }
                        @endphp

                        @if($loop->index < 2)
                               @if($loop->index == 0)
                                 <div class="avbb">
                               @endif
                                <div class="col-xs-12 col-sm-6 col-md-6 row-npadding ">
                                    <div class="artibtmmiddleimg300 artirel">
                                        @if( $site == "gallery")
                                           <div class="gallopt"><img class="lozad" alt="gallery icon franchise india" data-src="{{url('images/galleyicon.png')}}"></div>
                                        @endif
                                        <a href="{{ $url }}">
                                            <img class="lozad" data-src="{{ $image }}" alt="{{$article['kicker']}}" />
                                        </a>
                                    </div>
                                    <div class="artbtmsubhead">
                                        <a href="{{ $kicker }}">
                                            {{$article['kicker']}}
                                        </a>
                                    </div>
                                    <div class="artbtmtext">
                                        <a href="{{ $url }}">
                                            @if($article['homeTitle']=='')
                                                {{$article['title']}}
                                            @else
                                                {{$article['homeTitle']}}
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                     @if($loop->index == 1)
                                 </div>
                            @endif
                        @endif


                        @if(($loop->index > 1) && ($loop->index < 10))
                            <div class="tdss">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="rigtimg128">
                                            <a href="{{ $url }}">
                                                <img class="lozad" data-src="{{ $image }}" alt="{{$article['kicker']}}" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding respaddingauto">
                                        <div class="rightsubheadmid">
                                            <a href="{{ $kicker }}">
                                                {{$article['kicker']}}
                                                @if( $site == "gallery")
                                                    <img class="lozad" data-src="{{url('images/galleyicon2.png')}}" class="gallicon2">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="righttartsidetextmid">
                                            <a href="{{ $url }}">
                                                @if(empty($article['homeTitle']))
                                                    {{$article['title']}}
                                                @else
                                                    {{$article['homeTitle']}}
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!--video section start here -->
                {{-- <div class="mohead"> Videos <a href="https://video.franchiseindia.com/" class="commanviewall" target="_blank">View All</a> </div> --}}

                {{-- @foreach($videoArticles as $article)
                    @if($loop->index == 0)
                     @php
                         $URL_c = strtolower("Hello WORLD.");
                     @endphp
                    <div class="img-txtlayoutnew">
                        <div class="img-valayout">
                            <a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">
                                <img src="@php printf(Config('constants.youtubeImageUrl'),$article['videoID'])@endphp" alt="{{$article['title']}}">
                            </a>
                        </div>
                        <span class="text-contentnewlayout">
                            <div class="text-rep-blk">
                                <div class="a-name-red">
                                    <span>
                                        <a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">
                                            {{ $article->categoryName->catname }}
                                        </a>
                                    </span>
                                    <a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">
                                        <img class="lozad imgleft" data-src="{{url('images/video-icon.png')}}" alt="video-icon"/>
                                    </a>
                                </div>
                                <div class="show-an-txt">
                                    <a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">{{$article['title']}}</a>
                                </div>
                            </div>
                        </span>
                    </div>
                @else
                    <div class="img-txtlayoutpart">
                        <div class="img-valayoutpart">
                            <a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">
                                <img class="lozad" alt="{{ $article->categoryName->catname }}" data-src="@php printf(Config('constants.youtubeImageUrl'),$article['videoID'])@endphp">
                            </a>
                        </div>
                        <span class="text-contentnewlayoutpart">
                            <div class="text-rep-blkpart">
                                <div class="a-name-redpart">
                                    <a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">
                                        <span>{{ $article->categoryName->catname }}</span>
                                    </a>
                                    <a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/">
                                        <img class="lozad imgleft" alt="video icon franchiseindia" data-src="{{url('images/video-icon.png')}}"/>
                                    </a>
                                </div>
                                <div class="show-an-txtpart">
                                    <a href="https://video.franchiseindia.com/{{str_slug(strtolower($article['title']), '-')}}/{{$article['videoID']}}/"> {{$article['title']}} </a>
                                </div>
                            </div>
                        </span>
                    </div>
                    @endif
                @endforeach --}}

            </div>
            <!-- four article and all section end here -->
        </div>
        <!--middle section end  here -->
        <!--right section start here -->
        <div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">
           <!-- <div class="artihaed">Top franchise 2019 <a href="{{ url('content/Franchise-100') }}" class="commanviewall">View All</a></div>

            <div class="sidearce">
                <a href="{{ url('content/Franchise-100') }}">
                    <img src="{{ url('images/franchisetop100.jpg') }}" alt="India's top franchise 2019">
                </a>
            </div>-->

            <div class="artihaed">Popular Stories <!--<a href="{{ Config('constants.MainDomain') }}/popular" class="commanviewall">View All</a>--></div>

            @foreach($popularArticle as $article)
                @php
                    $site   = Config('constants.articleArr.'.$article['site_type']);
                    $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                    $image  = Config('constants.awsS3Url').$article['image'];
                    $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                    if ( $article['site_type'] == 'ga' ) {
                        $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                        $image  = $article['image'];
                        $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                    }
                @endphp

            @if($loop->index < 6)
            <div class="sidearce @if($loop->index == 0) firstmargin0 @endif ">
                <div class="rightartbigimg artirel">
                    @if( $site == "gallery")
                       <div class="gallopt"><img class="lozad" alt="gallery icon franchise india" data-src="{{url('images/galleyicon.png')}}"></div>
                    @endif

                    <a href="{{ $url }}">
                    <img class="lozad" data-src="{{ $image }}" alt="{{$article['kicker']}}"  />
                </a>
                </div>
                <div class="artsidesubhead"><a href="{{ $kicker }}">{{$article['kicker']}}</a></div>

                @if($article['homeTitle']!='')
                <div class="rightartsidetext">
                    <a href="{{ $url }}">
                        {{$article['homeTitle']}}
                    </a>
                    @endif

                    @if($article['homeTitle']=='')
                        <div class="rightartsidetext">
                            <a href="{{ $url }}">
                                {{$article['title']}}
                            </a>
                    @endif
                </div>
            </div>

            @if($loop->index == 2)
                @notmobile
                <div class="sidearce">
                    @include('includes.banners.dfp_300X600')
                </div>
                @endnotmobile
            @endif

                {{-- @if($loop->index == 5)
                    @notmobile

                        <div class="sidearce">@include("includes.banners.yahoo_300X600_Article")</div>
                    @endnotmobile
					<div class="sidearce">
                        <!-- /1057625/FIHL/Desktop_ROS_300x250_ATF-->
                        <div id='adslot300x250_ATF' >
                            <script>
                                googletag.cmd.push(function() { googletag.display('adslot300x250_ATF'); });
                            </script>
                        </div>
                    </div>
                </div>
                @endif --}}
            @endif
        @endforeach
        <!--right section end here -->
    </div>

</div>
    <!-- @mobile
    <div class="row row-no-margin adcebtbtm">
        @include("includes.banners.dfp_300X250_Mid_2")

    </div>
@endmobile -->
<!--Top Franchise Categories start here -->
<!--<div class="cat-article">
    <div class="container">
        <div class="row marright0">
            <div class="col-xs-12 col-sm-12 col-md-12 topcat">Top Franchise Categories</div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <ol class="catlistarticle">
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/automotive.m8">Automotive</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/beauty-and-health.m1">Beauty & Health</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/business-services.m6">Business Services</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/dealers-and-distributors.m5">Dealers & Distributors</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/education.m3">Education</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/fashion.m10">Fashion</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/food-and-beverage.m2">Food and Beverage</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/home-based-businesses.m7">Home Based Business</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/hotels-travel-and-tourism.m263">Hotels,Travel &amp; Tourism</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/industrial-machinery-and-manufacturing.m573"> Industrial Manufacturing</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/retail.m9">Retail</a></span></li>
                    <li><span><a href="{{Config('constants.MainDomain')}}/business-opportunities/sports-fitness-and-entertainment.m11">Sports & Fitness & Entertainment</a></span></li>
                </ol>
                <div class="vielink">
                    <a href="https://www.franchiseindia.com/business-opportunities/all/all"> View All Categories</a>
                    <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9">
                <div class="row">
                    @foreach($mostArticles as $article)
                        @php
                            $site   = Config('constants.articleArr.'.$article['site_type']);
                            $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                            $image  = Config('constants.awsS3Url').$article['image'];
                            $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                            if ( $article['site_type'] == 'ga' ) {
                                $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                                $image  = $article['image'];
                                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                            }
                        @endphp

                        @if($loop->index > 13)
                            <div class="col-xs-12 col-sm-4 col-md-4 heifix">
                                    <div class="artifotbtmimg">
                                    @if( $site == "gallery")
                                       <div class="gallopt">
                                           <img class="lozad" data-src="{{url('images/galleyicon.png')}}" alt="{{ $article['homeTitle'] }}">
                                       </div>
                                    @endif
                                    <a href="{{ $url }}">
                                    <img class="lozad" data-src="{{ $image }}" alt="{{$article['kicker']}}" />
                                    </a>
                                </div>
                                <div class="artbtmsubhead">
                                    <a href="{{ $kicker }}">
                                        {{$article['kicker']}}
                                    </a></div>
                                <div class="artbtmtext">
                                    <a href="{{ $url }}">
                                        @if($article['homeTitle']=='')
                                            {{substr($article['title'],0,50)}}..
                                        @endif
                                        {{$article['homeTitle']}}
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->

<!--Top Franchise Categories end here -->

<!-- more article section start here -->
<div class="container mostpopu">
    <div class="row row-no-margin">
        <div class="col-xs-12 col-sm-9 col-md-9 paddingright50 responleft">
            <div class="topcat">More Stories</div>

            @php
                $date = date_format($a,"M, d Y");
            @endphp

            <div class="row mostw">
                <div class="col-xs-12 col-sm-9 col-xs-9 mdfiarti">

                    @foreach($mostArticles as $article)
                        @php
                            $site   = Config('constants.articleArr.'.$article['site_type']);
                            $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                            $image  = Config('constants.awsS3Url').$article['image'];
                            $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                            if ( $article['site_type'] == 'ga' ) {
                                $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                                $image  = $article['image'];
                                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                            }
                        @endphp

                        @if($loop->index == 0)
                            <div class="arimg578 artirel">
                                @if( $site == "gallery")
                                   <div class="gallopt"><img class="lozad" data-src="{{url('images/galleyicon.png')}}"></div>
                                @endif
                                <a href="{{ $url }}">
                                    <img class="lozad" data-src="{{ $image }}" alt="{{$article['kicker']}}" />
                                </a>
                            </div>
                            <div>
                                <div class="artimainhead">
                                    <a href="{{ $kicker }}">
                                        {{$article['kicker']}}
                                    </a>
                                    <span>{{$date}}</span>
                                </div>
                                <div class="artisubmainhead">
                                    <a href="{{ $url }}">
                                        @if(empty($article['homeTitle']))
                                            {{$article['title']}}
                                        @else
                                            {{$article['homeTitle']}}
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @endif


                        <!--cta start here -->
                        @if($loop->index > 0 && $loop->index < 3)
                            <div class="row atbs">
                                <div class="col-xs-12 col-sm-4 col-md-4 row-no-padding">
                                    <div class="arimg198">
                                        @if( $site == "gallery")
                                           <div class="gallopt"><img class="lozad" data-src="{{url('images/galleyicon.png')}}"></div>
                                        @endif
                                        <a href="{{ $url }}">
                                            <img class="lozad" data-src="{{ $image }}" alt="{{$article['kicker']}}" >
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 dtst">
                                    <div class="artbtmsubhead">
                                        <a href="{{ $kicker }}">
                                            {{$article['kicker']}}
                                        </a>
                                    </div>
                                    <div class="artbtmtext">
                                        <a href="{{ $url }}">
                                            @if($article['homeTitle']=='')
                                                {{$article['title']}}
                                            @endif
                                            {{$article['homeTitle']}}
                                        </a>
                                    </div>
                                    <p>
                                        {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,100)), 0, 20))}}..
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 mrigh">
                    @foreach($mostArticles as $article)
                        @if($loop->index > 3 && $loop->index < 13)
                            @php
                                $site   = Config('constants.articleArr.'.$article['site_type']);
                                $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                                $image  = Config('constants.awsS3Url').$article['image'];
                                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];

                                if ( $article['site_type'] == 'ga' ) {
                                    $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                                    $image  = $article['image'];
                                    $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
                                }
                            @endphp
                            <div class="smallatc">
                                <div class="artbtmsubhead">
                                    <a href="{{ $kicker }}">{{$article['kicker']}}</a>
                                    @if( $site == "gallery")
                                       <img class="gallicon2 lozad" data-src="{{url('images/galleyicon2.png')}}"  alt="gallico">
                                    @endif
                                </div>
                                <div class="artbtmtext">
                                    <a href="{{ $url }}">
                                        @if($article['homeTitle']=='')
                                            {{$article['title']}}
                                        @endif
                                        {{$article['homeTitle']}}
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="borbtm"></div>

            <!--Current Issue Mag start here -->
            <div class="row  marbtm40">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="topcat pull-left">Current Issue</div>
                    <div class="pull-right seeinsi"><a href="{{ Config('constants.MainDomain') }}/magazine">See All Issues</a> ></div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 responmagleft">
                    <a href="{{ Config('constants.MainDomain') }}/magazine/{{$magazineCategory[0]['iss_year']}}/{{$monthName}}/The-Franchising-World-{{$magazineCategory[0]['iss_year']}}-{{$magazineCategory[0]['category_id']}}">
                        <img class="magimga lozad" alt="magazine franchise india" data-src="{{Config('constants.awsS3Url').$magazineCategory[0]['image']}}">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 responmagright">
                    @php
                    $a=1;
                    @endphp
                    @foreach($magazine as $mag)
                        <div class="witwr">
                            <div class="auth">By <a>{{$mag['author']}}</a></div>
                            <p class="amagtxt">
                                <a href="{{ Config('constants.MainDomain') }}/magazine/{{$magazineCategory[0]['iss_year']}}/{{$monthName}}/{{$mag['urlTitle']}}.{{$mag['item_id']}}">
                                    {{$mag['title']}}
                                </a>
                            </p>
                            <p>
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($mag['subtitle']),0,100)), 0, 10))}}..
                            </p>
                        </div>
                        @if($a%2 == 0 && $a<5)
                            <br class="clr magc">
                        @endif
                        @php
                            $a=$a+1;
                        @endphp
                    @endforeach
                </div>
            </div>
            <!--Current Issue Mag end here -->
        </div>

    </div>
</div>
</div>
<!-- more article section end here -->
    @desktop
    <div class="row row-no-margin adcebtbtm">
        @include("includes.banners.dfp_Desktop_728X90_BTF")

    </div>
    @enddesktop
    @tablet
    <div class="row row-no-margin adcebtbtm">
        @include("includes.banners.dfp_Tablet_728X90_BTF")

    </div>
    @endtablet
    @mobile
    <div class="row row-no-margin adcebtbtm">
        @include("includes.banners.dfp_300X250_BTF")

    </div>
    @endmobile
@include('layout.articlefooter')
<!--form end here -->
@endsection
