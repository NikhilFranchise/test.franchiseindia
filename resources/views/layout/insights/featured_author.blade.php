<div class="sliderauthor slidercommany">
    <div class="container">
        <div class="comhead">Featured Authors
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse ($authorDetails as $title)
                @php
                $locale = App::getLocale();
                $image = \App\Http\Controllers\InsightsController::authorImageurl($title->image);
                $authorURL = Config('constants.MainDomain') . "/insights/{$locale}/author/{$title->slug}". "-{$title->author_id}";
                @endphp
                <div class="swiper-slide">
                    <div class="home-author-list">
                        <div class="home-author-thumb"><img src="{{ $image }}" class="img-fluid"
                                alt="{{ $title->title }}" height="200px" width="180px"></div>
                        <div class="home-author-name">{{ $title->title }}</div>
                        <div class="home-author-des">{{ $title->designation }}</div>
                        <div class="home-author-count">No. of Stories - <span>{{ $title->count }}</span></div>
                        <a href="{{ $authorURL }}">View Articles</a>
                    </div>
                </div>
                @empty
                <div>No result.</div>
                @endforelse
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
