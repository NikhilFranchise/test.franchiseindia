<div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">
    @if(count($nextArticle)!=0)
        @php
            $site = Config('constants.articleArr.'.$nextArticle['site_type']);
        @endphp
        <div class="contiblk">
            <div class="conh"><a href="/{{$site}}/{{$nextArticle['slug']}}.{{$nextArticle['content_id']}}">Continue to next article</a>
                <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="/{{$site}}/{{$nextArticle['slug']}}.{{$nextArticle['content_id']}}">
                            <img src="https://www.franchiseindia.com{{$nextArticle['image']}}" alt="{{substr($nextArticle['homeTitle'],0,50)}}">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    <div class="rightsubhead"><a href="/content/{{$nextArticle['urlKicker']}}">{{$nextArticle['kicker']}}</a></div>
                    <div class="righttartsidetext">
                        <a href="/{{$site}}/{{$nextArticle['slug']}}.{{$nextArticle['content_id']}}">
                            @if($nextArticle['homeTitle']=='')
                                {{substr($nextArticle['title'],0,50)}}
                            @endif
                            {{substr($nextArticle['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="sidearce">
        @include("includes.banners.google_300X250")
    </div>
    @include("includes/magazinesubscribe")
    @notmobile
    <div class="sidearce">
        @include('includes.banners.dfp_600X300')
    </div>
    @endnotmobile
    @include('includes.wellness.widailyupdates')
    <div class="sidearce">
        <div class="mhead">Most Shared</div>
        @php
            $i=0;
        @endphp
        @foreach($likeArticles as $article)
            @php
                $site = Config('constants.articleArr.'.$article['site_type']);
            @endphp
            @if($i==0)
                <div class="rightartbigimg">
                    <a href="/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                        <img src="https://www.franchiseindia.com{{$article['image']}}" alt="{{substr($article['homeTitle'],0,50)}}">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                        <span>Shared (110)</span></div>
                    <div class="rightartsidetext">
                        <a href="/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                            @if($article['homeTitle']=='')
                                {{substr($article['title'],0,50)}}
                            @endif
                            {{substr($article['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            @endif
            @if($i>0 && $i<4) <div class="rigtxtcontain">
                <div class="artsidesubhead"><a href="/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                    <span>Shared (10)</span></div>
                <div class="rightartsidetext">
                    <a href="/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                        @if($article['homeTitle']=='')
                            {{substr($article['title'],0,50)}}
                        @endif
                        {{substr($article['homeTitle'],0,50)}}
                    </a>
                </div>
            </div>
            @endif
            @php
                $i=$i+1;
            @endphp
        @endforeach
    </div>
    <div class="sidearce">
        @include("includes.banners.yahoo_300X250")
    </div>
    <div class="sidearce">
        <div class="mhead">Trending</div>
        @php
            $j=0;
        @endphp
        @foreach($likeArticles as $article)
            @php
                $site = Config('constants.articleArr.'.$article['site_type']);
            @endphp
            @if($j==4)
                <div class="rightartbigimg">
                    <a href="/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                        <img src="https://www.franchiseindia.com{{$article['image']}}" alt="{{substr($article['homeTitle'],0,50)}}">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                        <span>Shared (110)</span></div>
                    <div class="rightartsidetext">
                        <a href="/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                            @if($article['homeTitle']=='')
                                {{substr($article['title'],0,50)}}
                            @endif
                            {{substr($article['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            @endif
            @if($j>4 && $j<8) <div class="rigtxtcontain">
                <div class="artsidesubhead"><a href="/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                    <span>Shared (10)</span></div>
                <div class="rightartsidetext">
                    <a href="/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                        @if($article['homeTitle']=='')
                            {{substr($article['title'],0,50)}}
                        @endif
                        {{substr($article['homeTitle'],0,50)}}
                    </a>
                </div>
            </div>
            @endif
            @php
                $j=$j+1;
            @endphp
        @endforeach
    </div>
    <div class="sidearce">
        @include("includes.banners.rightviewtaboola")
    </div>
    @if(count($nextArticle)!=0)
        @php
            $site = Config('constants.articleArr.'.$nextArticle['site_type']);
        @endphp
        <div class="contiblk">
            <div class="conh"><a href="/{{$site}}/{{$nextArticle['slug']}}.{{$nextArticle['content_id']}}">Continue to next article</a>
                <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="rigtimg">
                        <a href="/{{$site}}/{{$nextArticle['slug']}}.{{$nextArticle['content_id']}}">
                            <img src="https://www.franchiseindia.com{{$nextArticle['image']}}" alt="{{substr($nextArticle['homeTitle'],0,50)}}">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 row-no-padding">
                    <div class="rightsubhead"><a href="/content/{{$nextArticle['urlKicker']}}">{{$nextArticle['kicker']}}</a></div>
                    <div class="righttartsidetext">
                        <a href="/{{$site}}/{{$nextArticle['slug']}}.{{$nextArticle['content_id']}}">
                            @if($nextArticle['homeTitle']=='')
                                {{substr($nextArticle['title'],0,50)}}
                            @endif
                            {{substr($nextArticle['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="sidearce">
        @include('includes.banners.dfp_300X250')
    </div>
</div>