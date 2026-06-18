<div class="cbv">
    <div class="pull-left righead"><a href="{{ Config('constants.MainDomain') }}/insights">Insights</a></div>
    <div class="pull-right viewmo"><a href="{{ Config('constants.MainDomain') }}/insights">View All</a><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
    </div>
</div>
<div class="sidearce bor-radius backwhite pad20 marfix">
    @foreach($newsArticles as $article)
        @php
            $site = Config('constants.articleArr.'.$article['news_type']);
        @endphp
        @if($loop->index == 0)
            {{-- <a href="{{ Config('constants.NewsDomain') }}/{{$article['urlKicker']}}"> --}}
            <a href="{{ Config('constants.MainDomain') }}/insights/{{$article['urlKicker']}}">
                <div class="rigcatheading">{{$article['kicker']}}</div>
            </a>
            <div class="righeading">
                @if(empty($article['homeTitle']))
                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                @else
                    {{$article['homeTitle']}}
                @endif
            </div>
            <div class="rigtimg"><img src="{{Config('constants.awsS3Url').$article['image']}}" alt="{{$article['homeTitle']}}"></div>
        @else
            <div class="smallatcmostright">
                <div class="subrigcatheading">
                    <a href="{{ Config('constants.MainDomain') }}/insights/{{$article['urlKicker']}}">{{$article['kicker']}}</a>
                </div>
                <div class="subartbtmtext">
                    <!--<a href="{{ Config('constants.MainDomain') }}/insights/{{ $article['slug'] }}.{{ $article['news_id'] }}">-->
                        @if(empty($article['homeTitle']))
                            {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                        @else
                            {{$article['homeTitle']}}
                        @endif
                    <!--</a>-->
                </div>
            </div>
        @endif
    @endforeach
</div>