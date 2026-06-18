@if(Request::segment(1) != 'hi')
<div class="maycontentblk">
    <div class="container">
        <div class="headbh">You May Also like</div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- 1  -->
                @foreach($likeArticles as $article)
                    @if($loop->index < 10)
                        @php
                            $site   = Config('constants.articleArr.'.$article->site_type);
                            $image  = Config('constants.awsS3Url').$article->image;
                            $url    = Config('constants.MainDomain').'/newcontent/'.$article->slug.'.'.$article->content_id;
                            $lenght = strlen($article['content']);
                            $kicker = Config('constants.MainDomain').'/newcontent/'.$article['urlKicker'];
                            $time = ($lenght/200);
                            if ( $article->site_type == 'ga' )
                                $image  = $article->image;
                        @endphp
                <div class="swiper-slide">
                    <div class="mabox">
                        <div class="imgsec">
                            <a href="{{ $url }}"><img src="{{$image}}" alt="{{ucwords($article['kicker'])}}" ></a>
                        </div>
                        <div class="catblk">
                            <div class="catname"><a href="{{$kicker}}">{{ucwords($article['kicker'])}}</a></div>
                            <div class="artihead"><a href="{{$url}}">{{ empty($article['homeTitle']) ? $article['title'] : $article['homeTitle'] }}</a></div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
                <!--1  -->
            </div>
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
@endif
@if(Request::segment(1) == 'hi')
<div class="maycontentblk">
    <div class="container">
        <div class="headbh">You May Also like</div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- 1  -->
                @foreach($likeArticles as $article)
                    @if($loop->index < 10)
                        @php
                            $tagName = \App\SeoTagHindi::query()->where('tag_id',$article->hindi->kicker)->first();
                                $site   = Config('constants.articleArr.'.$article->site_type);
                                $image  = Config('constants.awsS3Url').$article->image;
                                $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article->slug.'.'.$article->hindi->content_id;
                                $lenght = strlen($article['content']);
                                $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$tagName['name'];
                                $time = ($lenght/200);
                                if ( $article->site_type == 'ga' )
                                    $image  = $article->image;

                        @endphp
                        <div class="swiper-slide">
                            <div class="mabox">
                                <div class="imgsec">
                                    <a href="{{ $url }}"><img src="{{$image}}" alt="{{($tagName['name'])}}" ></a>
                                </div>
                                <div class="catblk">
                                    <div class="catname"><a href="{{$kicker}}">{{$tagName['name']}}</a></div>
                                    <div class="artihead"><a href="{{$url}}">{{ empty($article->hindi->home_title) ? $article->hindi->title : $article->hindi->home_title }}</a></div>
                                </div>
                            </div>
                        </div>
                @endif
            @endforeach
            <!--1  -->
            </div>
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
@endif