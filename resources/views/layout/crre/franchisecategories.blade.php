<div class="slidercomman slidercommany">
    <div class="container">
        <div class="comhead">
            <a href="#">{{ App::getLocale() == 'en' ? 'Top Categories' : 'टॉप कैटगॉरी' }}</a>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- below list start here  1-->
                @foreach ($topcategories as $category)
                    @php
                        $slug = Str::slug(str_replace(' ', '-', $category->name));
                        $locale = App::getLocale();
                        $tagsUrl = Config('constants.MainDomain') . '/crre/' . $locale . '/tag/' . strtolower($slug);
                        // Determine image URL based on category name and locale
                        $data = categoryData($category->name, $locale);
                    @endphp
                    <div class="swiper-slide">
                        <div class="innerlist">
                            <div class="imgbl">
                                <a href="{{ $tagsUrl }}" target="_blank">
                                    <img alt="{{ $category->name }}" src="{{ $data['image'] }}">
                                    <span>{{ $data['name'] }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- below list end here  1 -->
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
