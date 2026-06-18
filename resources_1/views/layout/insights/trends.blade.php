<div class="slidercomman">
    <div class="container">
        <div class="comhead"><a href="#">
                @if (App::getLocale() == 'en')
                    Popular Content
                @else
                    लोकप्रिय कंटेंट
                @endif
            </a></div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($trendArticles as $article)
                    @php
                        $locale = App::getLocale();
                        $url = insightsUrl($article, $locale);
                        $image = insightsImageUrl($article['image'], $locale);
                    @endphp
                    @if ($loop->index < 8)
                        <!-- below list start here  1-->
                        <div class="swiper-slide">
                            <div class="innerlist">
                                <div class="imgbl"><a href="{{ $url }}"><img src="{{ $image }}"
                                            alt="{{ $article['title'] . ' image' }}"></a></div>
                                <div class="conblk">
                                    @foreach ($article->category as $cat)
                                        <div class="tagl"><a
                                                href="{{ insightsCategoryUrl($cat) }}">{{ $cat->catname }}</a></div>
                                    @endforeach
                                    <div class="hname"> <a href="{{ $url }}">{{ $article['title'] }}</a></div>
                                    <div class="aname"><img src="{{ url('/insight-new/images/view.svg') }}"
                                            alt="views">&nbsp;&nbsp;{{ formatViews($article->views) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
