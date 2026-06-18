@php
    $locale = App::getLocale();
@endphp

<div class="slidercomman slidercommany">
    <div class="container">

        <div class="comhead">
            <a href="#">{{ $locale === 'en' ? 'Top Categories' : 'टॉप कैटगॉरी' }}</a>
        </div>

        <div class="swiper-container">
            <div class="swiper-wrapper">

                @foreach ($topcategories as $category)
                    @php
                        // convert category name to slug
                        $slug = Str::slug($category->name);
                        $tagslug = config('constants.MainDomain') . "/insights/$locale/tag/$slug";

                        // get image + display name using helper
                        $catData = insightsCategoryData($category->name, $locale);
                    @endphp

                    <div class="swiper-slide">
                        <div class="innerlist">
                            <div class="imgbl">
                                <a href="{{ $tagslug }}" target="_blank">
                                    <img src="{{ $catData['image'] }}" alt="{{ $category->name }}">
                                    <span>{{ $catData['name'] }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
    </div>
</div>
