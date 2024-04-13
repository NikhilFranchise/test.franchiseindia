<div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">
    @include("includes.magazinesubscribe")
    @notmobile
        <div class="sidearce">
            @include('includes.banners.dfp_600X300')
        </div>
    @endnotmobile
    @include('includes.restaurant.rightpanel.ridailyupdates')
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
                    <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                        <img src="{{Config('constants.awsS3Url').$article['image']}}" alt="{{substr($article['homeTitle'],0,50)}}">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead"><a href="{{ Config('constants.MainDomain') }}/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                            @if($article['homeTitle']=='')
                                {{substr($article['title'],0,50)}}
                            @endif
                            {{substr($article['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            @endif

            @if($i>0 && $i<4)
                <div class="rigtxtcontain">
                    <div class="artsidesubhead"><a href="{{ Config('constants.MainDomain') }}/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
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
                    <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                        <img src="{{Config('constants.awsS3Url').$article['image']}}" alt="{{substr($article['homeTitle'],0,50)}}">
                    </a>
                </div>
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="{{ Config('constants.MainDomain') }}/content/{{$article['urlKicker']}}">{{$article['kicker']}} </a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
                            @if($article['homeTitle']=='')
                                {{substr($article['title'],0,50)}}
                            @endif
                            {{substr($article['homeTitle'],0,50)}}
                        </a>
                    </div>
                </div>
            @endif

            @if($j>4 && $j<8)
                <div class="rigtxtcontain">
                    <div class="artsidesubhead">
                        <a href="{{ Config('constants.MainDomain') }}/content/{{$article['urlKicker']}}">{{$article['kicker']}}</a>
                    </div>
                    <div class="rightartsidetext">
                        <a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$article['slug']}}.{{$article['content_id']}}">
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
</div>
