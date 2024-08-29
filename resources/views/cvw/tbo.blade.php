<section class="bg-sectionwize best-franchise-opportunity section-30 generic" id="best-franchise-opportunity">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="section-ptb">
                    <h2>{{ Request::segment(1) == 'hi' ? 'शीर्ष कारोबारी अवसर' : 'Top Business Opportunities' }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="trending-franchise-wrap">
                    @foreach ($brandstbo as $logoDetail)

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
                                <a href="{{ url('') . $cat_url }}" target="_blank">{{ $logoDetail['brand_category'] }}</a>
                            </p>
                            <h2>
                                <a href="{{ $brandUrl }}" target="_blank">{{ $logoDetail['brand_heading'] }}
                                </a>
                            </h2>
                            <div class="d-flex">
                                <div class="card-info">  {{ Request::segment(1) == 'hi' ? 'निवेश सीमा' : 'Investment range' }}</div>
                                <div class="card-info-amt">  ₹{{ $logoDetail['investment_range_new'] }}</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info"> {{ Request::segment(1) == 'hi' ? 'क्षेत्र की आवश्यकता है' : 'Area Required' }}</div>
                                <div class="card-info-amt"> {{ $logoDetail['area_required'] }}</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info"> {{ Request::segment(1) == 'hi' ? 'फ्रेंचाइज आउटलेट्स' : 'Franchise Outlets' }}</div>
                                <div class="card-info-amt"> {{ $logoDetail['franchise_outlets'] }}</div>
                            </div>
                            <div class="link-section"><a href="{{ $brandUrl }}" target="_blank">{{ Request::segment(1) == 'hi' ? 'अधिक जानिए' : 'Know More' }}</a></div>
                        </div>
                    </div>
                          @endif
                    @endforeach
                    {{-- <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div>
                    <div class="card card-m card-p-10">
                        <div class="brand-image-section">
                            <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06042064581599.webp" alt="Chess KLUB" height="100" width="205"></a></div>
                        </div>
                        <div class="card-body-section">
                            <p><a href="https://www.franchiseindia.com/business-opportunities/education.m3" target="_blank">Education</a></p>
                            <h2><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Chess KLUB</a></h2>
                            <div class="d-flex">
                                <div class="card-info">Investment range</div>
                                <div class="card-info-amt">₹5L - 10L</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Area Required</div>
                                <div class="card-info-amt">500 - 2000</div>
                            </div>
                            <div class="d-flex">
                                <div class="card-info">Franchise Outlets</div>
                                <div class="card-info-amt">Less than 10</div>
                            </div>
                            <div class="link-section"><a href="https://www.franchiseindia.com/brands/chess-klub.93602" target="_blank">Know More</a></div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>