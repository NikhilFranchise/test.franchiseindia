<section class="bg-sectionwize feature-franchise-companies section-30
                  w-bg-main"
    id="feature-franchise-companies">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-md-12">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'फीचर्ड फ्रैंचाइज़ कंपनियां' : 'Featured Franchise Companies' }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            {{-- @foreach ($brands->where('brand_section', 5)->take(48)->shuffle() as $logoDetail) --}}
            @foreach ($brandsffc as $logoDetail)
                @php
                    $brandUrl = Config('constants.MainDomain') . $logoDetail['brand_link'];
                    if (isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans)) {
                        $brandUrl = Config('constants.MainDomain') . '/hi' . $logoDetail['brand_link'];
                    }

                @endphp
                <div
                    class="modified-col col-xs-3 col-sm-3
                           col-md-2
                           col-lg-2
                           col-xl-2 mt-2 mb-2">
                    <div class="overlay-card"></div>
                    <div class="card-fihl card-m card-p-10">
                        <div class="brand-ffc-image-section">
                            <div class="brand-main-section">
                                <a href="{{ $brandUrl }}" target="_blank"><img src="{{ $logoDetail['brand_img'] }}"
                                        alt="{{ $logoDetail['brand_alt'] }}"
                                        class="img-b
                                       img-border"></a>
                            </div>
                        </div>
                        <div class="card-body-section">
                            <div class="ffchead"><a href="{{ $brandUrl }}"
                                    target="_blank">{{ mb_strimwidth($logoDetail['brand_alt'], 0, 25, '...') }}</a>
                            </div>
                            <p>
                                {{ Request::segment(1) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}
                            </p>
                            <div class="card-info-amount">
                                ₹{{ $logoDetail['investment_range_new'] }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
