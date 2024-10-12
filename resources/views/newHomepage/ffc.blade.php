<section class="bg-sectionwize feature-franchise-companies section-30 w-bg-main" id="feature-franchise-companies">
    <div class="container">
        <div class="row justify-content-center">
            <div class="modified-col col-md-12">
                <div class="section-ptb">
                    <h2>{{ Request::segment(2) == 'hi' ? 'फीचर्ड फ्रैंचाइज़ कंपनियां' : 'Featured Franchise Companies' }}
                    </h2>
                </div> 
            </div>
        </div>
        <ul>
            @foreach ($brandsffc->shuffle() as $logoDetail)
            @php
                $brandUrl = Config('constants.MainDomain') . $logoDetail['brand_link'];
                if (isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans)) {
                    $brandUrl = Config('constants.MainDomain') . '/hi' . $logoDetail['brand_link'];
                }

            @endphp

            <li>
                <div class="overlay-card"></div>
                <div class="card-fihl card-m card-p-10">
                    <div class="brand-ffc-image-section">
                        <div class="brand-main-section"><a href="{{ $brandUrl }}" target="_blank"><img loading="lazy" src="{{ $logoDetail['brand_img'] }}" alt="{{ $logoDetail['brand_alt'] }}" class="img-b img-border" width="110" height="50"></a></div>
                    </div>
                    <div class="card-body-section">
                        <div class="ffchead"><a href="{{ $brandUrl }}" target="_blank">{{ mb_strimwidth($logoDetail['brand_alt'], 0, 25, '...') }}</a></div>
                        <p>
                                {{ Request::segment(2) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}
                        </p>
                        <div class="card-info-amount">
                            ₹{{ $logoDetail['investment_range_new'] }}
                        </div>
                    </div>
                </div>
            </li>
            @endforeach

        </ul>
    </div>
</section>