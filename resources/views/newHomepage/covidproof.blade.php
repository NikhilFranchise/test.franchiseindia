<section class="bg-sectionwize covidproof section-30 generic" id="covidproof">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="section-ptb">
                    <h2>
                        {{ Request::segment(1) == 'hi' ? 'आज की ट्रेंडिंग फ्रैंचाइजी कंपनियां' : 'Leading Franchises Today' }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="trending-franchise-wrap">
                @foreach($brandslft->shuffle() as $logoDetail)

                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="{{ $logoDetail['brand_link'] }}" target="_blank">
                                <img src="{{ $logoDetail['brand_img'] }}" alt="{{ $logoDetail['brand_heading'] }}" height="100" width="205" loading="lazy"></a></div>
                        </div>
                        <div class="card-body-section">
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
                            <h2>
                                <a href="{{ $logoDetail['brand_link'] }}" target="_blank">{{ $logoDetail['brand_heading'] }}</a>
                            </h2>
                            <div class="d-flex">
                                <div class="card-info"> {{ Request::segment(1) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}</div>
                                <div class="card-info-amt"> ₹{{ $logoDetail['investment_range_new'] }}</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info"> {{ Request::segment(1) == 'hi' ? 'क्षेत्र की आवश्यकता है' : 'Area Required' }}</div>
                                <div class="card-info-amt"> {{ $logoDetail['area_required'] }}</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info"> {{ Request::segment(1) == 'hi' ? 'फ्रेंचाइज आउटलेट्स' : 'Franchise Outlets' }}</div>
                                <div class="card-info-amt">{{ $logoDetail['franchise_outlets'] }}</div>
                            </div>
                            <div class="link-section"><a href="{{ $logoDetail['brand_link']}}" target="_blank">{{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</a></div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
