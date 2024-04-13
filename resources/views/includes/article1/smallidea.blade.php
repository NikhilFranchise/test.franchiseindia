<div class="slidercomman">


<div class="container">
<div class="comhead"><a href="{{(Request::segment(1) == 'hi') ? Config('constants.MainDomain').'/hi/newcontent/'.$smallBusiness[0]['name'].'/'.$smallBusiness[0]['tag_id']  : Config('constants.MainDomain').'/newcontent/'.$smallBusiness[0]['urlKicker']}}">{{ (Request::segment(1) == 'hi') ? 'लघु व्यवसाय विचार' : 'Small Business Ideas' }}</a> <span class="slidervall"><a href="{{(Request::segment(1) == 'hi') ? Config('constants.MainDomain').'/hi/newcontent/'.$smallBusiness[0]['name'].'/'.$smallBusiness[0]['tag_id']  : Config('constants.MainDomain').'/newcontent/'.$smallBusiness[0]['urlKicker']}}">View All</a></div>
<div class="swiper-container">
<div class="swiper-wrapper">
    <!-- below list start here  1-->
    @if((Request::segment(1) != 'hi'))
    @foreach($smallBusiness as $article)
        @php
            $art = new \App\Http\Controllers\NewArticleController();
            $site   = Config('constants.articleArr.'.$article['site_type']);
            $kicker = Config('constants.MainDomain').'/newcontent/'.$article['urlKicker'];
            $image  = Config('constants.awsS3Url').$article['image'];
           $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
            $authorUrl  = Config('constants.MainDomain').'/newcontent/author/'.$art->slugify($article['author'],'-');
            if ( $article['site_type'] == 'ga' ) {
                $kicker = Config('constants.MainDomain').'/gallery/'.str_slug($article['kicker']).'/'.$article['kicker_id'];
                $image  = $article['image'];
                $url    = Config('constants.MainDomain').'/newcontent/'.$article['slug'].'.'.$article['content_id'];
            }
        @endphp
        @if($loop->index < 5)
<div class="swiper-slide"> 
<div class="innerlist">
<div class="imgbl"><a href="{{$url}}"><img src="{{ $image }}" alt="{{$article['kicker']}}"></a></div>
<div class="conblk">
<div class="tagl">
    <a href="{{ $kicker }}">
        {{ucwords($article['kicker'])}}
    </a>
</div>
<div class="hname">
    <a href="{{$url}}">
        @if($article['homeTitle']=='')
            {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['homeTitle']),0,100)), 0, 20))}}
        @endif
        {{$article['homeTitle']}}
    </a>
</div>
<div class="aname">
    <a href="{{$authorUrl}}">{{$article['author']}}</a>
    <span class="h1w"></span>
    <?php
    echo date('F d, Y', strtotime($article['time'])); //June, 2017
    ?>
</div>
</div>
</div>
</div>
<!-- below list end here  1 -->
@endif
    @endforeach
    @endif

    @if((Request::segment(1) == 'hi'))
        @foreach($smallBusiness as $article)
            @php
                $art = new \App\Http\Controllers\NewArticleController();
                 $site   = Config('constants.articleArr.'.$article['site_type']);
                 $kicker = Config('constants.MainDomain').'/hi/newcontent/'.$article['name'].'/'.$article['tag_id'];
                 $image  = Config('constants.awsS3Url').$article['image'];
                $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];
                 $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$art->slugify($article['author'],'-');
                 if ( $article['site_type'] == 'ga' ) {
                     $kicker = Config('constants.MainDomain').'/hi/gallery/'.str_slug($article['name']).'/'.$article['tag_id'];
                     $image  = $article['image'];
                     $url    = Config('constants.MainDomain').'/hi/newcontent/'.$article['slug'].'.'.$article['content_id'];
                     $authorUrl  = Config('constants.MainDomain').'/hi/newcontent/author/'.$article['author'];
                 }
            @endphp
            @if($loop->index < 5)
                <div class="swiper-slide">
                    <div class="innerlist">
                        <div class="imgbl"><a href="{{$url}}"><img src="{{ $image }}" alt="{{$article['name']}}"></a></div>
                        <div class="conblk">
                            <div class="tagl">
                                <a href="{{ $kicker }}">
                                    {{$article['name']}}
                                </a>
                            </div>
                            <div class="hname">
                                <a href="{{$url}}">
                                    @if($article['hindi_home_title']=='')
                                        {{implode(' ', array_slice(explode(' ', substr(strip_tags($article['hindi_title']),0,100)), 0, 20))}}
                                    @endif
                                    {{$article['hindi_home_title']}}
                                </a>
                            </div>
                            <div class="aname">
                                <a href="{{$authorUrl}}">{{$article['author']}}</a>
                                <span class="h1w"></span>
                                <?php
                                echo date('F d, Y', strtotime($article['time'])); //June, 2017
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- below list end here  1 -->
            @endif
        @endforeach
        @endif

</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>



</div>	

</div>