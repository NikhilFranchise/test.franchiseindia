<div class="slidercomman">
    <div class="container">
        <div class="comhead">{{ App::getLocale() == 'en' ? 'Popular Content' : 'लोकप्रिय कंटेंट' }}
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse ($trendArticles as $article)
                    @php
                        $url = crreUrl($article);
                        $image = imageUrl($article->image);
                    @endphp
                    @if ($loop->index < 8)
                        <!-- below list start here 1-->
                        <div class="swiper-slide">
                            <div class="innerlist">
                                <div class="imgbl"><a href="{{ $url }}"><img src="{{ $image }}"
                                            alt="{{ $article['title'] }} image"></a></div>
                                <div class="conblk">
                                    @forelse($article->category as $cat)
                                        <div class="tagl">{{ $cat->catname }}</div>
                                    @empty
                                    @endforelse
                                    <div class="hname"> <a href="{{ $url }}">{{ $article['title'] }}</a></div>
                                    <div class="aname"><img src="{{ url('/insight-new/images/view.svg') }}"
                                            alt="views">&nbsp;&nbsp;{{ formatViews($article->views) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                @endforelse
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
