@php
    $locale = App::getLocale();
@endphp
<div class="slidercomman">
    <div class="container">
        <div class="comhead">{{ App::getLocale() == 'en' ? 'Popular Content' : 'लोकप्रिय कंटेंट' }}
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($trendArticles as $article)
                    @php
                        $url = insightsUrl($article, $locale);
                        $image = insightsImageUrl($article->image, $locale);
                        $category = $article->category;
                        $categoryURL = insightsCategoryUrl($category, $locale);
                        $categoryName = $category?->catname;
                    @endphp
                    @if ($loop->index < 8)
                        <div class="swiper-slide">
                            <div class="innerlist">
                                <div class="imgbl">
                                    <a href="{{ $url }}">
                                        <img src="{{ $image }}" alt="{{ $article->title }} image">
                                    </a>
                                </div>

                                <div class="conblk">
                                    <div class="tagl">
                                        <a href="{{ $categoryURL }}">{{ $categoryName }}</a>

                                        <div class="hname">
                                            <a href="{{ $url }}">{{ $article->title }}</a>
                                        </div>

                                        <div class="aname">
                                            <img src="{{ url('/insight-new/images/view.svg') }}" alt="views">
                                            &nbsp;&nbsp;{{ formatViews($article->views) }}
                                        </div>
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
