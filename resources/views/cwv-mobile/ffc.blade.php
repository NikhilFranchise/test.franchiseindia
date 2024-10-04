<section class="featured-franchise-opportunities">
    <h2 class="brands-head">
        {{ Request::segment(1) == 'hi' ? 'फीचर्ड फ्रैंचाइज़ कंपनियां' : 'Featured Franchise Companies' }}</h2>
    <div class="card-wrap">
        @foreach ($brandsffc->shuffle() as $logoDetail)
            @php
                $brandUrl = Config('constants.MainDomain') . $logoDetail['brand_link'];
                if (isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans)) {
                    $brandUrl = Config('constants.MainDomain') . '/hi' . $logoDetail['brand_link'];
                }

            @endphp
            <div class="leading-card">
                <div class="brand-ins">
                    <a href="{{ $brandUrl }}" target="_blank"><img loading="lazy" src="{{ $logoDetail['brand_img'] }}" alt="{{ $logoDetail['brand_alt'] }}" width="110" height="54" loading="lazy">
                </div>

                <div class="leading-card-brand-title">
                    <h2><a href="{{ $brandUrl }}" target="_blank">{{ mb_strimwidth($logoDetail['brand_alt'], 0, 25, '...') }}</a></h2>
                </div>
                <div class="leading-card-investment">
                    <div class="card-info">{{ Request::segment(1) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}</div>
                    <div class="card-info-amt">₹{{ $logoDetail['investment_range_new'] }}</div>
                </div>
                {{--  <a href="{{ $brandUrl }}" target="_blank" class="know-more">Know More</a>  --}}
            </div>
        @endforeach

        {{--  <div class="leading-card">
            <div class="brand-ins">
                <img src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/vlcc.webp" alt="Drsmith"
                    width="110" height="54" loading="lazy">
            </div>

            <div class="leading-card-brand-title">
                <h2>Westside</h2>
            </div>
            <div class="leading-card-investment">
                <div class="card-info">Investment range</div>
                <div class="card-info-amt">₹1 Cr. - 2 Cr</div>
            </div>
            <a href="https://www.franchiseindia.com/brands/seeds-pre-school.85746" class="know-more">Know
                More</a>
        </div>

        <div class="leading-card">
            <div class="brand-ins">
                <img src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/vlcc.webp" alt="Drsmith"
                    width="110" height="54" loading="lazy">
            </div>

            <div class="leading-card-brand-title">
                <h2>Westside</h2>
            </div>
            <div class="leading-card-investment">
                <div class="card-info">Investment range</div>
                <div class="card-info-amt">₹1 Cr. - 2 Cr</div>
            </div>
            <a href="https://www.franchiseindia.com/brands/seeds-pre-school.85746" class="know-more">Know
                More</a>
        </div>  --}}

    </div>
</section>
