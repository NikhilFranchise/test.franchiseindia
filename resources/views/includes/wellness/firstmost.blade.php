<!-- first section start here  -->
<div class="bor-radius backwhite pad20 ovfl mart20">

    @foreach( $wellnessArticles as $article)
        @php
            $site   = Config('constants.articleArr.'.$article['site_type']);
            $kicker = Config('constants.MainDomain').'/content/'.$article['urlKicker'];
            $image  = Config('constants.awsS3Url').$article['image'];
            $url    = Config('constants.MainDomain').'/'.$site.'/'.$article['slug'].'.'.$article['content_id'];
        @endphp
        @if($loop->index == 0)
            <div class="row img-txt-wi-b">
                <div class="col-xs-12 col-sm-6 col-md-6 imgltop">
                    <img src="{{ $image }}" alt="{{$article['homeTitle']}}">
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 rttop">
                    <span class="top-cat-head"><a href="{{ $kicker }}">{{$article['kicker']}}</a></span>
                    <h2 class="tophhhh "><a href="{{ $url }}">
                            {{$article['homeTitle']}}
                            @if($article['homeTitle']=='')
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                            @endif
                        </a>
                    </h2>
                    <p class="content_sort">{{$article['shortDesc']}}</p>
                </div>
            </div>
            <div class="row dotttline">
                <div class="col-xs-12 col-sm-6 col-md-6 left-wi">
                    @endif
                    @if($loop->index > 0 && $loop->index < 3)
                    <span class="top-cat-head"><a href="{{ $kicker }}">{{$article['kicker']}}</a></span>

                    <h2 class="tophhhh2"><a href="{{ $url }}">
                            {{$article['homeTitle']}}
                            @if($article['homeTitle']=='')
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                            @endif
                        </a>
                    </h2>
                    <p class="content_sort2">
                        {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['shortDesc']),0,160)), 0, 20))}}
                        ...
                    </p>
                    @endif
                    @if( $loop->index == 2 )
                </div>
                <!-- rig start-->
                <div class="col-xs-12 col-sm-6 col-md-6 right-wi">
                    <ul class="ri-list-txt">
                @endif
                @if( $loop->index > 2 )
                    <li>
                        <a href="{{ $url }}">
                            {{$article['homeTitle']}}
                            @if($article['homeTitle']=='')
                                {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['title']),0,100)), 0, 10))}}
                            @endif
                        </a>
                    </li>
                @endif
            @endforeach
            </ul>
        </div>
        <!-- rig end -->
    </div>
</div>
<!-- first section end here  --> 
