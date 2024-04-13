<!-- Beauty And Wellness block start here -->

<div class="bor-radius backwhite pad20 ovfl mart20">
    <div class="ri-headingRt2">
        <h2><span><div>Beauty & Wellness</div></span></h2>
        <div class="ri-c-more"><a href="{{ Config('constants.MainDomain') }}/content/beauty-and-wellness">More >></a></div>
    </div>
    <div class="row">

        @foreach( $beautyArticles as $article )
            @php
                $site   = Config('constants.articleArr.'.$article['site_type']);
                $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
                $image  = Config('constants.awsS3Url').$article['image'];
                $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
            @endphp
            @if($loop->index == 0)
                <div class="col-xs-12 col-sm-4 col-md-4 ri-bigimg-blk">
                    <div> <a href="{{ $url}}"><img src="{{ $image }}" alt="{{$article['homeTitle']}}"></a> </div>
                    <div class="ri-himg-blk"><a href="{{ $kicker }}">{{$article['kicker']}}</a></div>
                    <div class="ri-inner_bullets">
                        <a href="{{ $url }}">
                            {{$article['homeTitle']}}
                            @if($article['homeTitle']=='')
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                            @endif
                        </a>
                        <p class="content_sort">{{$article['shortDesc']}}...</p>
                    </div>
                </div>
        <div class="col-xs-12 col-sm-8 col-md-8 ri-smallimg-blk">
            <ul class="row ri-smallimg-list">
            @endif
                    @if($loop->index > 0)
                        <li class="col-xs-12 col-sm-4 col-md-4">
                            <div> <a href="{{ $url }}"><img src="{{ $image }}" alt="{{$article['title']}}"></a> </div>
                            <div class="ri-inner_bullets">
                                <a href="{{ $url }}">
                                    {{$article['homeTitle']}}
                                    @if($article['homeTitle']=='')
                                        {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,50)), 0, 5))}}
                                    @endif
                                </a>
                                <p class="content_sort">
                                    {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,50)), 0, 5))}}...
                                </p>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Beauty And Wellness block End here-->
