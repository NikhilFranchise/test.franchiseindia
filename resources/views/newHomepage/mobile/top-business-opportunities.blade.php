<section class="top-business-opportunities">
    <h2 class="brands-head">{{ Request::segment(2) == 'hi' ? 'शीर्ष कारोबारी अवसर' : 'Top Business Opportunities' }}</h2>
    <div class="card-wrap">
        @foreach ($brandstbo->shuffle() as $logoDetail)
            @php
                $brandUrl = Config('constants.MainDomain') . $logoDetail['brand_link'];
            @endphp

            @if ($loop->index < 12)
                @php
                    $cat_url =
                        '/business-opportunities/' .
                        strtolower(str_replace(' ', '-', $logoDetail['brand_category'])) .
                        '.m' .
                        $logoDetail['brand_category_id'];
                @endphp
                <div class="leading-card">
                    <div class="brand-ins">
                        <a href="{{ $brandUrl }}" target="_blank" aria-label="{{ $logoDetail['brand_heading'] }}"> <img
                                src="{{ $logoDetail['brand_img'] }}" alt="{{ $logoDetail['brand_heading'] }}"
                                width="205" height="100" loading="lazy"></a>
                    </div>
                    <div class="leading-card-brand-category"><a href="{{ url('') . $cat_url }}" target="_blank"
                            aria-label="{{ $logoDetail['brand_heading'] }}">{{ $logoDetail['brand_category'] }}</a>
                    </div>
                    <div class="leading-card-brand-title">
                        <h2><a href="{{ $brandUrl }}" target="_blank"
                                aria-label="{{ $logoDetail['brand_heading'] }}">{{ $logoDetail['brand_heading'] }}
                            </a></h2>
                    </div>
                    <div class="leading-card-investment">
                        <div class="card-info">{{ Request::segment(2) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}
                        </div>
                        <div class="card-info-amt">₹{{ $logoDetail['investment_range_new'] }}</div>
                    </div>
                    <div class="leading-card-area">
                        <div class="card-info">
                            {{ Request::segment(2) == 'hi' ? 'क्षेत्र की आवश्यकता है' : 'Area Required' }}</div>
                        <div class="card-info-amt">{{ $logoDetail['area_required'] }}</div>
                    </div>
                    <div class="leading-card-outlets">
                        <div class="card-info">
                            {{ Request::segment(2) == 'hi' ? 'फ्रेंचाइज आउटलेट्स' : 'Franchise Outlets' }}</div>
                        <div class="card-info-amt">{{ $logoDetail['franchise_outlets'] }}</div>
                    </div><a href="{{ $brandUrl }}" target="_blank" class="know-more"
                        aria-label="{{ $logoDetail['brand_heading'] }}">{{ Request::segment(2) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</a>
                </div>
            @endif
        @endforeach
    </div>
</section>
