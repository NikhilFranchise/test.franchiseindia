<section class="leading-franchise">
    <h2 class="brands-head">
        {{ Request::segment(1) == 'hi' ? 'आज की ट्रेंडिंग फ्रैंचाइजी कंपनियां' : 'Leading Franchises Today' }}</h2>
    <div class="card-wrap">
        @foreach ($brandslft->shuffle() as $logoDetail)
            <div class="leading-card">
                <div class="brand-ins"><a href="{{ $logoDetail['brand_link'] }}" target="_blank">
                        <img src="{{ $logoDetail['brand_img'] }}" alt="{{ $logoDetail['brand_heading'] }}" width="308"
                            height="150"></a>
                </div>
                <div class="leading-card-brand-category">
                    
                    @php
                        $cat_url =
                            '/business-opportunities/' .
                            strtolower(str_replace(' ', '-', $logoDetail['brand_category'])) .
                            '.m' .
                            $logoDetail['brand_category_id'];
                    @endphp
                    <p>
                        <a href="{{ url('') . $cat_url }}" target="_blank">{{ $logoDetail['brand_category'] }}</a>
                    </p>
                </div>
                <div class="leading-card-brand-title">
                    {{--  <h2>Westside</h2>  --}}
                    <h2><a href="{{ $logoDetail['brand_link'] }}" target="_blank">{{ $logoDetail['brand_heading'] }}</a>
                    </h2>
                </div>
                <div class="leading-card-investment">
                    <div class="card-info">{{ Request::segment(1) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}</div>
                    <div class="card-info-amt"> ₹{{ $logoDetail['investment_range_new'] }}</div>
                </div>
                <div class="leading-card-area">
                    <div class="card-info">{{ Request::segment(1) == 'hi' ? 'क्षेत्र की आवश्यकता है' : 'Area Required' }}</div>
                    <div class="card-info-amt">{{ $logoDetail['area_required'] }}</div>
                </div>
                <div class="leading-card-outlets">
                    <div class="card-info"> {{ Request::segment(1) == 'hi' ? 'फ्रेंचाइज आउटलेट्स' : 'Franchise Outlets' }}</div>
                    <div class="card-info-amt">{{ $logoDetail['franchise_outlets'] }}</div>
                </div>
                
                <a href="{{ $logoDetail['brand_link']}}" target="_blank" class="know-more">{{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</a>
            </div>
        @endforeach


        {{--  <div class="leading-card">
            <div class="brand-ins">
                <img src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/westside.webp" alt="Westside"
                    width="308" height="150">
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
            <div class="leading-card-outlets">
                <div class="card-info">Franchise Outlets</div>
                <div class="card-info-amt">100-200</div>
            </div>
            <a href="https://www.franchiseindia.com/brands/seeds-pre-school.85746" class="know-more">Know More</a>
        </div>


        <div class="leading-card">
            <div class="brand-ins">
                <img src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/westside.webp" alt="Westside"
                    width="308" height="150">
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
            <div class="leading-card-outlets">
                <div class="card-info">Franchise Outlets</div>
                <div class="card-info-amt">100-200</div>
            </div>
            <a href="https://www.franchiseindia.com/brands/seeds-pre-school.85746" class="know-more">Know More</a>
        </div>  --}}


    </div>
</section>
