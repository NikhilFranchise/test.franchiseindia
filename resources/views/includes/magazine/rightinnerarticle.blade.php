<div class="col-xs-12 col-sm-3 col-md-3 row-no-padding artirightpanel">
    @include("includes.magazinesubscribe")
    @notmobile
    @include('includes.banners.dfp_600X300')
    @endnotmobile
    @include("includes/magazine/rightpanel/ridailyupdates")
    <div class="sidearce">
        @include('includes.banners.google_300X250')
    </div>
    <div class="sidearce">
        <div class="mhead">Most Shared</div>
        @php
            $i=0;
        @endphp
        @foreach($sharedArticles as $articles)
            @php
                $site = Config('constants.articleArr.'.$articles['site_type']);
            @endphp
            @if($i==0)
                <div class="rightartbigimg"><img src="https://www.franchiseindia.com/{{$articles['image']}}" alt="{{$articles['title']}}"></div>
            @endif
            <div class="rigtxtcontain">
                <div class="artsidesubhead"><a href="/content/{{$articles['urlKicker']}}">{{$articles['kicker']}}</a> <span>Shared ({{$articles['facebook_shared']}})</span></div>
                <div class="rightartsidetext"><a href="/{{$site}}/{{$articles['slug']}}.{{$articles['content_id']}}">{{$articles['title']}}</a>
                </div>
            </div>
            @php
                $i=$i+1;
            @endphp
        @endforeach
    </div>
    <div class="sidearce">
        <div class="sidearce">
            @include('includes.banners.yahoo_300X250')
        </div>
        <div class="mhead">Trending</div>
        @php
            $j=0;
        @endphp
        @foreach($trendArticles as $articles)
            @php
                $site = Config('constants.articleArr.'.$articles['site_type']);
            @endphp
            @if($j==0)
                <div class="rightartbigimg"><img src="https://www.franchiseindia.com{{$articles['image']}}" alt="{{$articles['title']}}"></div>
            @endif
            <div class="rigtxtcontain">
                <div class="artsidesubhead"><a href="{{ Config('constants.MainDomain') }}/content/{{$articles['urlKicker']}}">{{$articles['kicker']}}</a> <span>Shared ({{$articles['facebook_shared']}})</span></div>
                <div class="rightartsidetext"><a href="{{ Config('constants.MainDomain') }}/{{$site}}/{{$articles['slug']}}.{{$articles['content_id']}}">{{$articles['title']}}</a>
                </div>
            </div>
            @php
                $j=$j+1;
            @endphp
        @endforeach
    </div>
    <div style="height:100px"></div>
</div>