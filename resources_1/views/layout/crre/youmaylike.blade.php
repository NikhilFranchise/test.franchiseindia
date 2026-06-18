<div class="maycontentblk">
    <div class="container">
        <div class="headbh">You May Also like</div>

        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- 1  -->
                @foreach($trendArticles as $article)
                @if($loop->index < 7)
                    @php $kicker=Config('constants.MainDomain') . '/insightlist/' . $article['urlKicker'];
                    $image=Config('constants.awsS3Url') . $article['image'];
                    $url=Config('constants.MainDomain') . '/insight/' . $article['slug'] . '.' . $article['news_id'];
                    @endphp
                    <div class="swiper-slide">
                    <div class="mabox">
                        <div class="imgsec">
                            <a href="{{ $url }}"><img src="{{ $image }}" alt="{{$article->title}}" /></a>
                        </div>
                        <div class="catblk">
                            <div class="catname"><a href="{{ $kicker }}">{{ $article->kicker }}</a></div>
                            <div class="artihead"><a href="{{ $url }}">{{ $article->homeTitle }}</a></div>
                        </div>
                    </div>
            </div>
            <!--1  -->
            @endif
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
</div>