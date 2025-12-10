<div class="sliderauthor slidercommany">
    <div class="container">
        <div class="comhead">{{ App::getLocale() == 'en' ? 'Featured Authors' : 'फीचर्ड ऑथर्स' }}</div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($authorDetails as $author)
                    @php
                        $image = authorImageUrl($author->image);
                        $url = authorUrl($author);
                    @endphp
                    <div class="swiper-slide">
                        <div class="home-author-list">
                            <div class="home-author-thumb">
                                <a href="{{ $url }}">
                                    <img src="{{ $image }}" class="img-fluid" alt="{{ $author->title }}"
                                        height="200px" width="180px">
                            </div>
                            <div class="home-author-name"><a href="{{ $url }}">{{ $author->title }}</a></div>
                            <div class="home-author-des">{{ $author->designation }}</div>
                            <div class="home-author-count"><span>{{ $author->count }}</span> Stories</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
