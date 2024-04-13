<div class="cbv">
    <div class="pull-left righead"><a href="{{ Config('constants.NewsDomain') }}">News</a></div>
    <div class="pull-right viewmo"><a href="{{ Config('constants.NewsDomain') }}">View All</a><i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
    </div>
</div>
<div class="sidearce bor-radius backwhite pad20 marfix">
    @foreach($newsArticles as $article)
        @php
            $site = Config('constants.articleArr.'.$article['news_type']);
        @endphp
        @if($loop->index == 0)
            <div class="rigcatheading">
                <a href="{{ Config('constants.NewsDomain') }}/{{$article['urlKicker']}}">{{$article['kicker']}}</a>
            </div>
            <div class="righeading">
                <a href="{{ Config('constants.NewsDomain') }}/{{$site}}/{{$article['slug']}}.n{{$article['news_id']}}">
                    @if(empty($article['homeTitle']))
                        {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                    @else
                        {{$article['homeTitle']}}
                    @endif
                </a>
            </div>
            <div class="rigtimg"><img src="{{Config('constants.awsS3Url').$article['image']}}" alt="{{$article['homeTitle']}}"></div>
        @else
            <div class="smallatcmostright">
                <div class="subrigcatheading"><a href="{{ Config('constants.NewsDomain') }}/{{$article['urlKicker']}}">{{$article['kicker']}}</a></div>
                <div class="subartbtmtext">
                    <a href="{{ Config('constants.NewsDomain') }}/{{$site}}/{{$article['slug']}}.n{{$article['news_id']}}">
                        @if(empty($article['homeTitle']))
                            {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                        @else
                            {{$article['homeTitle']}}
                        @endif
                    </a>
                </div>
            </div>
        @endif
    @endforeach
</div>