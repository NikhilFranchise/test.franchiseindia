<section class="bg-sectionwize top-franchise-opportunities section-30 generic" id="top-franchise-opportunities">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'शीर्ष फ्रैंचाइज़ अवसर' : 'Top Franchise Opportunities' }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="top-franchise">

                    @foreach($brandstfo->shuffle() as $logoDetail)
                    @php
                         $brandUrl = Config('constants.MainDomain') . $logoDetail['brand_link'];
                         if (
                             isset($hindiFrans) &&
                             is_array($hindiFrans) &&
                             in_array($logoDetail['fihl_id'], $hindiFrans)
                         ) {
                             $brandUrl = Config('constants.MainDomain') . '/hi' . $logoDetail['brand_link'];
                         }
                         $cat_url =
                             '/business-opportunities/' .
                             strtolower(str_replace(' ', '-', $logoDetail['brand_category'])) .
                             '.m' .
                         $logoDetail['brand_category_id'];
                     @endphp
                    <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="{{ $brandUrl }}" target="_blank"><img loading="lazy" src="{{ $logoDetail['brand_img'] }}" alt="{{ $logoDetail['brand_alt'] }}" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p>
                                    <a href="{{ url('') . $cat_url }}"
                                        target="_blank">{{ $logoDetail['brand_category'] }}</a>
                                </p>

                                <h2><a href="{{ $brandUrl }}" target="_blank">{{ $logoDetail['brand_heading'] }}</a>
                                </h2>

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
                                <div class="link-section"><a href="{{ $brandUrl }}" target="_blank">{{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</a></div>
                            </div>
                        </div>
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>