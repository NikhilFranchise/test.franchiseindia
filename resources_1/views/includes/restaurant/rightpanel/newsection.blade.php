<!--New start -->
<div class="cbv">
    <div class="pull-left righead"><a href="{{ Config::get('constants.NewsDomain') }}">News</a></div>
    <div class="pull-right viewmo"><a href="{{ Config::get('constants.NewsDomain') }}">View All</a><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
    </div>
</div>
<div class="sidearce bor-radius backwhite pad20 marfix">
    @php
        $i=1;
    @endphp
    @foreach($newsArticles as $article)
        @php
            $site = Config::get('constants.articleArr.'.$article['news_type']);
        @endphp
        @if($i==1)
            <div class="rigcatheading">{{$article['kicker']}}</div>
            <div class="righeading">
                {{$article['homeTitle']}}

                @if($article['homeTitle']=='')
                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                @endif

            </div>
            <div class="rigtimg"><img src="https://www.franchiseindia.com/{{$article['image']}}"
                                      alt="{{$article['title']}}"></div>
        @endif

        @if($i!=1)
            <div class="smallatcmostright">
                <div class="subrigcatheading"><a href="{{ Config::get('constants.NewsDomain') }}/{{$article['urlKicker']}}">{{$article['kicker']}}</a></div>
                <div class="subartbtmtext">
                    @if($site != 'content')
                        <a href="{{ Config::get('constants.NewsDomain') }}/{{$site}}/{{$article['slug']}}.n{{$article['news_id']}}">
                            @if($article['homeTitle']=='')
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                            @endif
                            {{$article['homeTitle']}}
                        </a>
                    @endif

                    @if($site == 'content')
                        <a href="{{ Config::get('constants.NewsDomain') }}/{{$article['slug']}}-{{$article['news_id']}}">
                            @if($article['homeTitle']=='')
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                            @endif
                            {{$article['homeTitle']}}
                        </a>
                    @endif
                </div>
            </div>
        @endif
        @php
            $i=$i+1;
        @endphp
    @endforeach
</div>
<!-- New end -->