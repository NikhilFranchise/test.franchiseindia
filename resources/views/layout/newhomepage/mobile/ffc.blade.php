<section class="top-franchise-opportunities section-30 w-bg-main"
         id="top-franchise-opportunities">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-ptb">
                    <h2>{{ (Request::segment(1) == 'hi') ? 'फीचर्ड फ्रैंचाइज़ कंपनियां' : 'Featured Franchise Companies' }} </h2>
                </div>
            </div>
        </div>
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                {{-- @foreach($brands->where('brand_section', 5)->take(48)->shuffle() as $logoDetail) --}}
                @foreach ($brandsffc as $logoDetail)

             @php
                        $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                        if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                        $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                    @endphp
                    <div class="swiper-slide">
                        <div class="overlaybg"></div>
                        <div class="swiper-slide-top-franchise-opportunities">

                            <div class="card-fihl card-m card-p-10">
                                <div class="brand-img-fcc">
                                    <div class="brand-img-section">
                                        <a href="{{$brandUrl}}" target="_blank"><img src="{{$logoDetail['brand_img']}}" alt="{{$logoDetail['brand_alt']}}" ></a>
                                    </div>
                                </div>
                                <div class="card-body-section">
                                     <div class="ffchead"><a href="{{$brandUrl}}" target="_blank">{{mb_strimwidth($logoDetail['brand_alt'], 0, 25, "...")}}</a></div>
                                    <p>
                                        {{ (Request::segment(1) == 'hi') ? 'निवेश सीमा' : 'Investment range' }}
                                    </p>
                                    <div class="card-info-amount">
                                        ₹{{$logoDetail['investment_range_new']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>