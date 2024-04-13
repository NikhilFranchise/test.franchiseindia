<section class="bg-sectionwize best-franchise-opportunity section-30" id="best-franchise-opportunity">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-md-12">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'शीर्ष कारोबारी अवसर' : 'Top Business Opportunities' }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @php
                $brandLogo3 = $brands->where('brand_section', 3)->where('page_type', $pageType)->take(12)->shuffle();
            @endphp

            @foreach ($brandLogo3 as $logoDetail)
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
                    <div class="modified-col col-xs-6 col-sm-6 col-md-3 col-lg-3
                           col-xl-3">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-image-section">
                                <div class="brand-main-section">
                                    <a href="{{ $brandUrl }}" target="_blank"> <img
                                            src="{{ $logoDetail['brand_img'] }}"
                                            alt="{{ $logoDetail['brand_heading'] }}"></a>
                                </div>
                            </div>
                            <div class="card-body-section">
                                <p>
                                    <a href="{{ url('') . $cat_url }}"
                                        target="_blank">{{ $logoDetail['brand_category'] }}</a>
                                </p>
                                <h2><a href="{{ $brandUrl }}" target="_blank">{{ $logoDetail['brand_heading'] }}
                                    </a></h2>
                                <div class="d-flex">
                                    <div class="card-info">
                                        {{ Request::segment(1) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}
                                    </div>
                                    <div class="card-info-amt">
                                        ₹{{ $logoDetail['investment_range_new'] }}
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">
                                        {{ Request::segment(1) == 'hi' ? 'क्षेत्र की आवश्यकता है' : 'Area Required' }}
                                    </div>
                                    <div class="card-info-amt">
                                        {{ $logoDetail['area_required'] }}
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">
                                        {{ Request::segment(1) == 'hi' ? 'फ्रेंचाइज आउटलेट्स' : 'Franchise Outlets' }}
                                    </div>
                                    <div class="card-info-amt">
                                        {{ $logoDetail['franchise_outlets'] }}
                                    </div>
                                </div>
                                <div class="link-section">
                                    <a href="{{ $brandUrl }}"
                                        target="_blank">{{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
