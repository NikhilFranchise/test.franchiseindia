<div class="slidercomman slidercommany">
    <div class="container">
        <div class="comhead"><a href="#">{{ App::getLocale() == 'en' ? 'Top Categories' : 'टॉप कैटगॉरी' }}</a>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- below list start here  1-->
                @foreach ($topcategories as $category)
                    @php
                        $slug = Str::slug(str_replace(' ', '-', $category->name));
                        $locale = App::getLocale();
                        $tagslug =
                            Config('constants.MainDomain') . '/insights/' . $locale . '/tag/' . strtolower($slug);

                        // Determine image URL based on category name and locale
                        $imageMap = [
                            'Education' => 'Education.png',
                            'Retail' => 'Retail.png',
                            'Food and Beverage' => 'FoodBeverage.png',
                            'expansion' => 'Expansion.png',
                            'Launch' => 'StoreLaunch.png',
                            'Startup' => 'Startup.png',
                            'funding' => 'Funding.png',
                            'expansion plans' => 'ExpansionPlans.png',
                            'Franchise 100' => 'Franchise100.png',
                            'investment' => 'Investment.png',
                        ];

                        $hindiCategoryNames = [
                            'Education' => 'शिक्षा व्यापार',
                            'Retail' => 'खुदरा व्यापार',
                            'Food and Beverage' => 'खाद्य और पेय पदार्थ',
                            'expansion' => 'व्यापार विस्तार',
                            'Launch' => 'नया लॉन्च',
                            'Startup' => 'व्यापार स्टार्टअप',
                            'funding' => 'व्यापार में अनुदान',
                            'expansion plans' => 'व्यापार विस्तार योजनाएँ',
                            'Franchise 100' => 'फ्रेंचाइज़ 100',
                            'investment' => 'व्यापार में निवेश',
                        ];

                        $categoryImage = isset($imageMap[$category->name])
                            ? url('insight-new/assets/images/' . $imageMap[$category->name])
                            : url('insight-new/assets/images/Investment.png');

                        $displayName =
                            $locale == 'en'
                                ? ucwords($category->name)
                                : $hindiCategoryNames[$category->name] ?? $category->name;
                    @endphp
                    <div class="swiper-slide">
                        <div class="innerlist">
                            <div class="imgbl">
                                <a href="{{ $tagslug }}" target="_blank">
                                    <img alt="{{ $category->name }}" src="{{ $categoryImage }}">
                                    <span>{{ $displayName }}</span>
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
