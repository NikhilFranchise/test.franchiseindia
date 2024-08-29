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

                    @foreach($brandstfo as $logoDetail)
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
                                <div class="brand-main-section"><a href="{{ $brandUrl }}" target="_blank"><img src="{{ $logoDetail['brand_img'] }}" alt="{{ $logoDetail['brand_alt'] }}" class="img-b img-border" width="192" height="86"></a></div>
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
                    {{-- <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/basketball-training-systems.95400" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06031464539055.webp" alt="Basketball Training Systems" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p><a href="https://www.franchiseindia.com/business-opportunities/sports-fitness-and-entertainment.m11" target="_blank">Sports Fitness and Entertainment</a></p>
                                <h2><a href="https://www.franchiseindia.com/brands/basketball-training-systems.95400" target="_blank">Basketball Training Systems</a></h2>
                                <div class="d-flex">
                                    <div class="card-info">Investment range</div>
                                    <div class="card-info-amt">₹1 Cr. - 2 Cr</div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">Area Required</div>
                                    <div class="card-info-amt">5000 - 10000</div>
                                </div>
                                <div class="link-section"><a href="https://www.franchiseindia.com/brands/basketball-training-systems.95400" target="_blank">Know More</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/03051555931475.webp" alt="Nailashes" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p><a href="https://www.franchiseindia.com/business-opportunities/beauty-and-health.m1" target="_blank">Beauty and Health</a></p>
                                <h2><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Nailashes</a></h2>
                                <div class="d-flex">
                                    <div class="card-info">Investment range</div>
                                    <div class="card-info-amt">₹30L - 50L</div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">Area Required</div>
                                    <div class="card-info-amt">400 - 800</div>
                                </div>
                                <div class="link-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Know More</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/0223361139744.webp" alt="Nailashes" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p><a href="https://www.franchiseindia.com/business-opportunities/beauty-and-health.m1" target="_blank">Beauty and Health</a></p>
                                <h2><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Nailashes</a></h2>
                                <div class="d-flex">
                                    <div class="card-info">Investment range</div>
                                    <div class="card-info-amt">₹30L - 50L</div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">Area Required</div>
                                    <div class="card-info-amt">400 - 800</div>
                                </div>
                                <div class="link-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Know More</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/11171373916781.gif" alt="Nailashes" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p><a href="https://www.franchiseindia.com/business-opportunities/beauty-and-health.m1" target="_blank">Beauty and Health</a></p>
                                <h2><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Nailashes</a></h2>
                                <div class="d-flex">
                                    <div class="card-info">Investment range</div>
                                    <div class="card-info-amt">₹30L - 50L</div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">Area Required</div>
                                    <div class="card-info-amt">400 - 800</div>
                                </div>
                                <div class="link-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Know More</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/esntls.74456" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/02231642823951.webp" alt="ESNTLS" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p><a href="https://www.franchiseindia.com/business-opportunities/business-services.m6" target="_blank">Business Services</a></p>
                                <h2><a href="https://www.franchiseindia.com/brands/esntls.74456" target="_blank">ESNTLS</a></h2>
                                <div class="d-flex">
                                    <div class="card-info">Investment range</div>
                                    <div class="card-info-amt">₹10L - 20L</div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">Area Required</div>
                                    <div class="card-info-amt">200 - 400</div>
                                </div>
                                <div class="link-section"><a href="https://www.franchiseindia.com/brands/esntls.74456" target="_blank">Know More</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/basketball-training-systems.95400" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/06032089618569.webp" alt="Basketball Training Systems" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p><a href="https://www.franchiseindia.com/business-opportunities/sports-fitness-and-entertainment.m11" target="_blank">Sports Fitness and Entertainment</a></p>
                                <h2><a href="https://www.franchiseindia.com/brands/basketball-training-systems.95400" target="_blank">Basketball Training Systems</a></h2>
                                <div class="d-flex">
                                    <div class="card-info">Investment range</div>
                                    <div class="card-info-amt">₹1 Cr. - 2 Cr</div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">Area Required</div>
                                    <div class="card-info-amt">5000 - 10000</div>
                                </div>
                                <div class="link-section"><a href="https://www.franchiseindia.com/brands/basketball-training-systems.95400" target="_blank">Know More</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/04161111117753.webp" alt="Nailashes" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p><a href="https://www.franchiseindia.com/business-opportunities/beauty-and-health.m1" target="_blank">Beauty and Health</a></p>
                                <h2><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Nailashes</a></h2>
                                <div class="d-flex">
                                    <div class="card-info">Investment range</div>
                                    <div class="card-info-amt">₹30L - 50L</div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">Area Required</div>
                                    <div class="card-info-amt">400 - 800</div>
                                </div>
                                <div class="link-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Know More</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/04161111117753.webp" alt="Nailashes" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p><a href="https://www.franchiseindia.com/business-opportunities/beauty-and-health.m1" target="_blank">Beauty and Health</a></p>
                                <h2><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Nailashes</a></h2>
                                <div class="d-flex">
                                    <div class="card-info">Investment range</div>
                                    <div class="card-info-amt">₹30L - 50L</div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">Area Required</div>
                                    <div class="card-info-amt">400 - 800</div>
                                </div>
                                <div class="link-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Know More</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="wtq">
                        <div class="overlay-card"></div>
                        <div class="card card-m card-p-10">
                            <div class="brand-md-image-section">
                                <div class="brand-main-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/tbo/04161111117753.webp" alt="Nailashes" class="img-b img-border" width="192" height="86"></a></div>
                            </div>
                            <div class="card-body-section">
                                <p><a href="https://www.franchiseindia.com/business-opportunities/beauty-and-health.m1" target="_blank">Beauty and Health</a></p>
                                <h2><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Nailashes</a></h2>
                                <div class="d-flex">
                                    <div class="card-info">Investment range</div>
                                    <div class="card-info-amt">₹30L - 50L</div>
                                </div>
                                <div class="d-flex">
                                    <div class="card-info">Area Required</div>
                                    <div class="card-info-amt">400 - 800</div>
                                </div>
                                <div class="link-section"><a href="https://www.franchiseindia.com/brands/nailashes.91974" target="_blank">Know More</a></div>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</section>