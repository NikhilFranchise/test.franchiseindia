<section class="covidproof section-30" id="covidproof">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-ptb">
                    <h2>{{ (Request::segment(1) == 'hi') ? 'आज की ट्रेंडिंग फ्रैंचाइजी कंपनियां': 'Leading Franchises Today' }}</h2>
                </div>
            </div>
        </div>
        <!-- Swiper -->
        <div class="swiper-container">

            <div class="swiper-wrapper">
                @php
                    $pageType = (request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand') ? 2 : 1;
                @endphp
                {{-- @foreach ($brands->where('brand_section', 2)->where('page_type', $pageType)->take(4)->shuffle() as $logoDetail) --}}
                @foreach($brandslft->shuffle() as $logoDetail)
                    @php
                        $brandUrl = Config('constants.MainDomain').$logoDetail['brand_link'];
                        if(isset($hindiFrans) && is_array($hindiFrans) && in_array($logoDetail['fihl_id'], $hindiFrans))
                        $brandUrl = Config('constants.MainDomain').'/hi'.$logoDetail['brand_link'];
                      $cat_url = "/business-opportunities/".strtolower(str_replace(' ', '-', $logoDetail['brand_category'])).".m". $logoDetail['brand_category_id'];
                    @endphp
                    <div class="swiper-slide">
                        <div class="overlaybg"></div>
                        <div class="swiper-slide-section-main">
                            <div class="overlay-card"></div>
                            <div class="card card-m card-p-10">
                                <div class="brand-img">
                                    <div class="brand-img-section">
                                        <a href="{{ $brandUrl }}">
                                            <a href="{{ $brandUrl }}" target="_blank"><img src="{{ $logoDetail['brand_img'] }}" alt="{{$logoDetail['brand_heading']}}"></a>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body-section">
                                    <p>
                                        <a href="{{url('').$cat_url}}" target="_blank">{{$logoDetail['brand_category']}}</a>
                                    </p>
                                    <h2>{{$logoDetail['brand_heading']}} </h2>
                                    <div class="d-flex">
                                        <div class="card-info">
                                            {{ (Request::segment(1) == 'hi') ? 'निवेश सीमा' : 'Investment range' }}
                                        </div>
                                        <div class="card-info-amt">
                                            ₹{{$logoDetail['investment_range_new']}}
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="card-info">
                                            {{ (Request::segment(1) == 'hi') ? 'क्षेत्र की आवश्यकता है' : 'Area Required' }}
                                        </div>
                                        <div class="card-info-amt">
                                            {{$logoDetail['area_required']}}
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="card-info">
                                            {{ (Request::segment(1) == 'hi') ? 'फ्रेंचाइज आउटलेट्स' : 'Franchise Outlets' }}
                                        </div>
                                        <div class="card-info-amt">
                                            {{$logoDetail['franchise_outlets']}}
                                        </div>
                                    </div>
                                    @if (!empty($logoDetail['operations_start_year']))
                                    <div class="d-flex">
                                        <div class="card-info">
                                            {{ (Request::segment(1) == 'hi') ? 'स्थापना वर्ष' : 'Establishment Year' }}
                                        </div>
                                        <div class="card-info-amt">
                                        
                                            {{$logoDetail['operations_start_year']}}
                                        
                                        </div>
                                    </div>
                                    @endif
                                    <div class="link-section">
                                        <a href="{{ $brandUrl }}"><div class="">
                                                {{ (Request::segment(1) == 'hi') ? 'अधिक जानिए' : 'Know More'}}
                                            </div></a>
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