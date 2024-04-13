<div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">

    <!--next article section start here-->
    @if(!empty($nextArticle[0]))
        @php
            $site = Config::get('constants.articleArr.'.$nextArticle[0]['site_type']);
        @endphp
        <div class="contiblk">
            <div class="conh">
                <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                    Continue to next article
                </a>
                <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i>
            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                        <img src="https://www.franchiseindia.com{{$nextArticle[0]['image']}}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    <div class="rightsubhead"><a href="{{ Config::get('constants.MainDomain') }}/content/{{$nextArticle[0]['urlKicker']}}">{{$nextArticle[0]['kicker']}}</a></div>
                    <div class="righttartsidetext">
                        <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                            @if($nextArticle[0]['homeTitle']=='')
                                {{substr($nextArticle[0]['title'],0,50)}}
                            @endif
                            {{substr($nextArticle[0]['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endif
    <!--next article section end here-->
    <div class="sidearce"> @include("includes.banners.google_300X250") </div>
    @include("includes.magazinesubscribe")
    @notmobile
    <div class="sidearce"> @include('includes.banners.dfp_600X300') </div>
    @endnotmobile
    @include('includes.restaurant.rightpanel.ridailyupdates')

    <div class="sidearce">
        <div class="mhead">Most Shared</div>
        @foreach($likeArticles as $article)

            @php
                $site = Config::get('constants.articleArr.'.$article['site_type']);
            @endphp
            @if($loop->index == 12)
                <div class="rightartbigimg">
                    <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                    <img
                            src="https://www.franchiseindia.com{{$article['image']}}" alt="">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead"><a href="{{ Config::get('constants.MainDomain') }}/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                       </div>
                    <div class="rightartsidetext">
                        <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                            @if($article['homeTitle']=='')
                                {{substr($article['title'],0,50)}}
                            @endif
                            {{substr($article['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            @endif

            @if($loop->index > 12 && $loop->index < 16)
                <div class="rigtxtcontain">
                    <div class="artsidesubhead"><a href="{{ Config::get('constants.MainDomain') }}/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                        </div>
                    <div class="rightartsidetext">
                        <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                            @if($article['homeTitle']=='')
                                {{substr($article['title'],0,50)}}
                            @endif
                            {{substr($article['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
      
    <div class="sidearce"> @include("includes.banners.yahoo_300X250") </div>

    <div class="sidearce">
        <div class="mhead">Trending</div>
        @foreach($likeArticles as $article)

            @php
                $site = Config::get('constants.articleArr.'.$article['site_type']);
            @endphp
            @if($loop->index == 16)
                <div class="rightartbigimg">
                    <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                    <img
                            src="https://www.franchiseindia.com{{$article['image']}}" alt="">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead"><a href="{{ Config::get('constants.MainDomain') }}/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                        </div>
                    <div class="rightartsidetext">
                        <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                            @if($article['homeTitle']=='')
                                {{substr($article['title'],0,50)}}
                            @endif
                            {{substr($article['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            @endif

            @if ($loop->index > 16  && $loop->index < 20)
                <div class="rigtxtcontain">
                    <div class="artsidesubhead"><a href="{{ Config::get('constants.MainDomain') }}/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                        </div>
                    <div class="rightartsidetext">
                        <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                            @if($article['homeTitle']=='')
                                {{substr($article['title'],0,50)}}
                            @endif
                            {{substr($article['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="sidearce">@include("includes.banners.rightviewtaboola")</div>
     
     <!--next article section start here-->
    @if(!empty($nextArticle[0]))
        @php
            $site = Config::get('constants.articleArr.'.$nextArticle[0]['site_type']);
        @endphp
        <div class="contiblk">
            <div class="conh">
                <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                    Continue to next article
                </a>
                <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                        <img src="https://www.franchiseindia.com{{$nextArticle[0]['image']}}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    <div class="rightsubhead"><a href="{{ Config::get('constants.MainDomain') }}/content/{{$nextArticle[0]['urlKicker']}}">{{$nextArticle[0]['kicker']}}</a></div>
                    <div class="righttartsidetext">
                        <a href="{{ Config::get('constants.MainDomain') }}/{{$site}}/{{$nextArticle[0]['slug']}}.{{$nextArticle[0]['content_id']}}">
                            @if($nextArticle[0]['homeTitle']=='')
                                {{substr($nextArticle[0]['title'],0,50)}}
                            @endif
                            {{substr($nextArticle[0]['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>                
            </div>
        </div>
    @endif
    <!--next article section end here-->
    <div class="sidearce"> @include('includes.banners.google_300X250') </div>

</div>