<section class="top-franchise-opportunities">
    <h2 class="brands-head">{{ Request::segment(1) == 'hi' ? 'शीर्ष फ्रैंचाइज़ अवसर' : 'Top Franchise Opportunities' }}
    </h2>
    <div class="card-wrap">
        @foreach ($brandstfo->shuffle() as $logoDetail)
            @php
                $brandUrl = Config('constants.MainDomain') . $logoDetail['brand_link'];
                if (isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans)) {
                    $brandUrl = Config('constants.MainDomain') . '/hi' . $logoDetail['brand_link'];
                }
                $cat_url =
                    '/business-opportunities/' .
                    strtolower(str_replace(' ', '-', $logoDetail['brand_category'])) .
                    '.m' .
                    $logoDetail['brand_category_id'];
            @endphp
            <div class="leading-card">
                <div class="brand-ins">
                    <a href="{{ $brandUrl }}" target="_blank" aria-label="{{ $logoDetail['brand_heading'] }}"><img loading="lazy" src="{{ $logoDetail['brand_img'] }}"
                            alt="{{ $logoDetail['brand_alt'] }}" width="192" height="86" loading="lazy">
                </div>
                <div class="leading-card-brand-category"><a href="{{ url('') . $cat_url }}"
                    target="_blank" aria-label="{{ $logoDetail['brand_heading'] }}">{{ $logoDetail['brand_category'] }}</a>
                </div>
                <div class="leading-card-brand-title">
                    <h2><a href="{{ $brandUrl }}" target="_blank" aria-label="{{ $logoDetail['brand_heading'] }}">{{ $logoDetail['brand_heading'] }}</a>
                    </h2>
                </div>
                <div class="leading-card-investment">
                    <div class="card-info">{{ Request::segment(1) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}</div>
                    <div class="card-info-amt">₹{{ $logoDetail['investment_range_new'] }}</div>
                </div>
                <div class="leading-card-area">
                    <div class="card-info">{{ Request::segment(1) == 'hi' ? 'क्षेत्र की आवश्यकता है' : 'Area Required' }}</div>
                    <div class="card-info-amt">{{ $logoDetail['area_required'] }}</div>
                </div>
                <a href="{{ $brandUrl }}" target="_blank" class="know-more" aria-label="{{ $logoDetail['brand_heading'] }}">{{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</a>
            </div>
        @endforeach
        {{--  <div class="leading-card">
            <div class="brand-ins">
                <img src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/carlton.webp" alt="Drsmith"
                    width="192" height="94" loading="lazy">
            </div>
            <div class="leading-card-brand-category"><a
                    href="https://www.franchiseindia.com/business-opportunities/fashion.m10" target="_blank">Fashion</a>
            </div>
            <div class="leading-card-brand-title">
                <h2>Westside</h2>
            </div>
            <div class="leading-card-investment">
                <div class="card-info">Investment range</div>
                <div class="card-info-amt">₹1 Cr. - 2 Cr</div>
            </div>
            <div class="leading-card-area">
                <div class="card-info">Area Required</div>
                <div class="card-info-amt">2000 - 3000</div>
            </div>
            <a href="https://www.franchiseindia.com/brands/seeds-pre-school.85746" class="know-more">Know More</a>
        </div>
        <div class="leading-card">
            <div class="brand-ins">
                <img src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/carlton.webp" alt="Drsmith"
                    width="192" height="94" loading="lazy">
            </div>
            <div class="leading-card-brand-category"><a
                    href="https://www.franchiseindia.com/business-opportunities/fashion.m10" target="_blank">Fashion</a>
            </div>
            <div class="leading-card-brand-title">
                <h2>Westside</h2>
            </div>
            <div class="leading-card-investment">
                <div class="card-info">Investment range</div>
                <div class="card-info-amt">₹1 Cr. - 2 Cr</div>
            </div>
            <div class="leading-card-area">
                <div class="card-info">Area Required</div>
                <div class="card-info-amt">2000 - 3000</div>
            </div>
            <a href="https://www.franchiseindia.com/brands/seeds-pre-school.85746" class="know-more">Know More</a>
        </div>  --}}
    </div>
</section>
