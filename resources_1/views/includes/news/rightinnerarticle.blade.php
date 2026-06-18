<div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">

    <!--next article section start here-->
    @if(!empty($nextArticle))
        @php
            $site = Config::get('constants.articleArr.'.$nextArticle['news_type']);
        @endphp
        <div class="contiblk">
            <div class="conh">
                <a href="{{ Config::get('constants.NewsDomain') }}/{{$site}}/{{$nextArticle['slug']}}.n{{$nextArticle['news_id']}}">
                    Continue to next news</a>
                    <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="{{ Config::get('constants.NewsDomain') }}/{{$site}}/{{$nextArticle['slug']}}.n{{$nextArticle['news_id']}}">
                            <img src="https://www.franchiseindia.com{{$nextArticle['image']}}" alt="{{$nextArticle->title}}">
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    <div class="rightsubhead"><a href="{{ Config::get('constants.NewsDomain') }}/{{$nextArticle['urlKicker']}}">{{$nextArticle['kicker']}}</a></div>
                    <div class="righttartsidetext">
                        <a href="{{Config::get('constants.NewsDomain')}}/{{$site}}/{{$nextArticle['slug']}}.n{{$nextArticle['news_id']}}">
                            @if($nextArticle['homeTitle']=='')
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($nextArticle['title']),0,100)), 0, 10))}}
                            @endif
                            {{$nextArticle['homeTitle']}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--next article section end here-->

    <div class="sidearce">
        @include("includes.banners.google_300X250")
    </div>

    @include("includes.magazinesubscribe")

    <div class="sidearce">
        @include('includes.banners.google_300X250')
    </div>

    @include('includes.restaurant.rightpanel.ridailyupdates')

    <div class="sidearce">

        <div class="mhead">Most Shared</div>

        @foreach($likeArticles as $news)

            @php
                $site = Config::get('constants.articleArr.'.$news['news_type']);
            @endphp
                @if($loop->index < 4)
                    @if($loop->index == 0)
                        <div class="rightartbigimg">
                            <img src="https://www.franchiseindia.com{{$news['image']}}" alt="{{$news['homeTitle']}}">
                        </div>
                    @endif
                    <div class="rigtxtcontain">
                        <div class="artsidesubhead">
                            <a href="{{Config::get('constants.NewsDomain')}}/{{$news['urlKicker']}}">
                                {{$news['kicker']}}
                            </a>
                        </div>
                        <div class="rightartsidetext">
                            <a href="{{Config::get('constants.NewsDomain')}}/{{$site}}/{{$news['slug']}}.n{{$news['news_id']}}">
                                @if($news['homeTitle']=='')
                                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($news['title']),0,100)), 0, 10))}}
                                @endif
                                {{$news['homeTitle']}}
                            </a>
                        </div>
                    </div>
                @endif
        @endforeach

    </div>
   <div class="sidearce">
         @include("includes.banners.yahoo_300X250")
       </div>
    <div class="sidearce">
        <div class="mhead">Trending</div>
        @foreach($likeArticles as $news)
           @php
                $site = Config::get('constants.articleArr.'.$news['news_type']);
            @endphp
                @if($loop->index > 3)
                    @if($loop->index == 4)
                        <div class="rightartbigimg">
                            <img src="https://www.franchiseindia.com{{$news['image']}}" alt="{{$news['homeTitle']}}">
                        </div>
                    @endif
                    <div class="rigtxtcontain">
                        <div class="artsidesubhead">
                            <a href="{{Config::get('constants.NewsDomain')}}/{{$news['urlKicker']}}">
                                {{$news['kicker']}}
                            </a>
                        </div>
                        <div class="rightartsidetext">
                            <a href="{{Config::get('constants.NewsDomain')}}/{{$site}}/{{$news['slug']}}.n{{$news['news_id']}}">
                                @if($news['homeTitle']=='')
                                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($news['title']),0,100)), 0, 10))}}
                                @endif
                                {{$news['homeTitle']}}
                            </a>
                        </div>
                    </div>
                @endif
        @endforeach
    </div>

    <div class="sidearce">
      @if(Request::segment(1) == 'restaurant')
         @include('includes.banners.res-banner300X600')
      @else
         @include('includes.banners.dfp_600X300')
      @endif
    </div>

    <!--next article section start here-->
    @if(!empty($nextArticle))
        @php
            $site = Config::get('constants.articleArr.'.$nextArticle['news_type']);
        @endphp
        <div class="contiblk">
            <div class="conh">
                <a href="{{ Config::get('constants.NewsDomain') }}/{{$site}}/{{$nextArticle['slug']}}.n{{$nextArticle['news_id']}}">
                    Continue to next news
                </a>
                <i class="fa fa-angle-right fa-lg"  aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="{{ Config::get('constants.NewsDomain') }}/{{$site}}/{{$nextArticle['slug']}}.n{{$nextArticle['news_id']}}">
                            <img src="https://www.franchiseindia.com{{$nextArticle['image']}}" alt="{{$nextArticle['homeTitle']}}" />
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    <div class="rightsubhead"><a href="{{ Config::get('constants.NewsDomain') }}/{{$nextArticle['urlKicker']}}">{{$nextArticle['kicker']}}</a></div>
                    <div class="righttartsidetext">
                        <a href="{{Config::get('constants.NewsDomain')}}/{{$site}}/{{$nextArticle['slug']}}.n{{$nextArticle['news_id']}}">
                            @if($nextArticle['homeTitle']=='')
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($nextArticle['title']),0,100)), 0, 10))}}
                            @endif
                            {{$nextArticle['homeTitle']}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--next article section end here-->

    <div class="sidearce newsSpacebottom"></div>
</div>
