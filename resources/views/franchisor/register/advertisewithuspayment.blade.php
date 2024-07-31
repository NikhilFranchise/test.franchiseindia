<!DOCTYPE html>
<html>

<head>
    @include('layout.newhomepage.head')
    <style type="text/css">
        .footrtwhatsapp-icon {
            display: none;
        }
    </style>
</head>

<body>
    {{-- @php --}}
    {{-- $pageType = (request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand') ? 2 : 1; --}}
    {{-- $franData = \App\FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first(); --}}
    {{-- $regType = $franData->looking_tradepartner == 1 ? 2 : 1; --}}
    {{-- @endphp --}}
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NW38FD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    @php
        $pageType = request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand' ? 2 : 1;
    @endphp
    @mobile
        @include('layout.newhomepage.mobile.topsearch')
    @endmobile
    @include('layout.newhomepage.topsearch');
    <!-- Login/ Registration Model -->
    @include('layout.newhomepage.loginregistration')

    <!-- Login/ Registration Model End-->

    <div class="wrapper">
        <!-- Sidebar  -->
        @include('layout.newhomepage.sidemenu')

        <!-- Sidebar End -->
        <!-- Desktop Section Start-->
        @desktop
            <!-- Page Content  -->
            <div id="content">
                @include('layout.newhomepage.header')

                <main class="main" id="main">
                    <div class="pricblk">
                        <div class="container">
                            <h1 class="headin">More Visibility, More Business</h1>
                            <div class="ctxt">Choose the perfect plan for you, 100% satisfaction guaranteed</div>


                            <div class=""
                                style="text-align:center;margin-top: 45px; margin-bottom:30px; color: #000;font-size: 17px;font-weight: 400;clear: both;">
                                Chat on <a
                                    href="https://api.whatsapp.com/send?phone=919312650021&amp;text=Hello,%20I%20am%20interested%20in%20knowing%20more%20about ?%20https://www.franchiseindia.com/"
                                    target="_blank"><img style="width:2%"
                                        src="https://www.franchiseindia.com/newhomepage/assets/img/whatappsicon.svg"
                                        class="sts"></a></div>





                            <div class="priclist">
                                <div class="priclistinner">
                                    <div class="pritxtn">Free Listing</div>
                                    <form class="form-horizontal" id="fran-form" name="form_franchisor"  action="{{ url('advertise-with-us-payment') }}" method="POST" role="form"  enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="ftyblk">
                                            <div class="rinr cent"><i class="fas fa-rupee-sign"></i>
                                                <span class="pf1">0</span><span class="pf2"></span>
                                            </div>
                                        </div>
                                        <input type="radio" name="memberplan" value="1" checked
                                            style="display: none;">
                                        <input class="btncir" type="submit" value="Try Now">
                                    </form>
                                    <ul class="listp">
                                        <li>Get Priority over other business listings under - <strong>List Page
                                            </strong></li>
                                        <!--<li>Get Maximum 5 Leads in a month</li>-->

                                    </ul>
                                </div>

                                <div class="priclistinner">
                                    <div class="pritxtn">Sub Category</div>
                                    <form class="form-horizontal" name="form_franchisor" action="{{ url('advertise-with-us-payment') }}" method="POST" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="ftyblk">

                                            <div class="rinr otherp">
                                                <div class="radio-item">
                                                    <input type="radio" id="ritema2" name="memberplan"
                                                        value="123">
                                                    <label for="ritema2"></label>
                                                </div>
                                                <i class="fas fa-rupee-sign"></i>
                                                <span class="pf1">1,43,000</span><span
                                                    class="pf2"><!--<del class="dll">1,43,000</del>--> / 6
                                                    Months</span>
                                            </div>
                                            <div class="rinr otherp">
                                                <div class="radio-item">
                                                    <input type="radio" id="ritema3" name="memberplan"
                                                        value="118" checked>
                                                    <label for="ritema3"></label>
                                                </div>
                                                <i class="fas fa-rupee-sign"></i>
                                                <span class="pf1">1,62,500</span><span
                                                    class="pf2"><!--<del class="dll">1,62,500</del>--> / 1
                                                    Year</span>
                                            </div>
                                        </div>
                                        <input class="btncir" type="submit" value="Buy Now">
                                    </form>
                                    <ul class="listp">
                                        <li>Get Priority over other business listings under - <strong>Sub
                                                Category</strong></li>
                                        <li>Visibility & Reach - 70%</li>
                                    </ul>
                                </div>

                                <div class="priclistinner">
                                    <div class="pritxtn">Master Category</div>
                                    <form class="form-horizontal" name="form_franchisor"
                                        action="{{ url('advertise-with-us-payment') }}" method="POST" role="form"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="ftyblk">

                                            <div class="rinr otherp">
                                                <div class="radio-item">
                                                    <input type="radio" id="ritema5" name="memberplan"
                                                        value="120">
                                                    <label for="ritema5"></label>
                                                </div>
                                                <i class="fas fa-rupee-sign"></i>
                                                <span class="pf1">1,43,000</span><span class="pf2"><!--<del class="dll">
     1,43,000</del>--> / 3 Months</span>
                                            </div>
                                            <div class="rinr otherp">
                                                <div class="radio-item">
                                                    <input type="radio" id="ritema6" name="memberplan"
                                                        value="124">
                                                    <label for="ritema6"></label>
                                                </div>
                                                <i class="fas fa-rupee-sign"></i>
                                                <span class="pf1">2,27,500</span><span class="pf2"><!--<del class="dll">
     2,27,500</del>--> / 6 Months</span>
                                            </div>
                                            <div class="rinr otherp">
                                                <div class="radio-item">
                                                    <input type="radio" id="ritema7" name="memberplan"
                                                        value="121" checked>
                                                    <label for="ritema7"></label>
                                                </div>
                                                <i class="fas fa-rupee-sign"></i>
                                                <span class="pf1">2,92,500</span><span
                                                    class="pf2"><!--<del class="dll">2,92,500</del>--> / 1
                                                    Year</span>
                                            </div>
                                        </div>
                                        <input class="btncir" type="submit" value="Buy Now">
                                    </form>
                                    <ul class="listp">
                                        <li>Get Priority over other business listings under - <strong>Master and Sub
                                                Category</strong></li>
                                        <li>Visibility & Reach - 100%</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="feblkcontainer">
                        <div class="container">
                            <div class="feblk_body">
                                <div class="feblk_head"> Know What’s Included with Each Plan </div>
                                <ul class="priceplan">
                                    <li>
                                        <div class="reghead tleft">Get Priority over other business listings under
                                        </div>
                                        <div class="iconblk htset tleft">Get Instant Update over Phone, Email and SMS
                                        </div>

                                        <div class="iconblk htset tleft">Make your business discoverable with detailed
                                            business information</div>
                                        <div class="iconblk htset tleft">Add your brand images to Increase your
                                            visibility and business enquiries</div>
                                        <div class="iconblk htset tleft">Boost on Search by Category, Location &
                                            Investment</div>
                                        <div class="iconblk htset tleft">Showcase your logo with company listing</div>
                                        <div class="iconblk htset tleft">Get access to “My Account” dashboard to track
                                            views and responses instantly</div>
                                        <div class="iconblk htset tleft">Thousands of Investors Can View Your Profile
                                        </div>
                                        <div class="iconblk htset tleft">Local, National And International Exposure
                                        </div>
                                        <div class="iconblk htset tleft">Generating more and better business inquiries
                                        </div>
                                        <div class="iconblk htset tleft">Visibility & Reach</div>

                                    </li>


                                    <li>
                                        <div class="reghead">Listing Pages</div>
                                        <div class="iconblk htset"> </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset"> </div>
                                        <div class="iconblk htset"> </div>
                                        <div class="iconblk htset"> </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue">Only Premium Investors</div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset"> </div>
                                        <div class="iconblk htset"> </div>

                                    </li>

                                    <li>
                                        <div class="reghead">Sub Category</div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue">70%</div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="reghead">Master and Sub Category</div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue"><i class="fas fa-check"></i></div>
                                        </div>
                                        <div class="iconblk htset">
                                            <div class="pvalue">100%</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- newsletter section starts -->
                    @include('layout.newhomepage.newsletter')

                    <!-- newsletter section ends -->
                    <!-- about us -->
                    @include('layout.newhomepage.aboutus')

                    <!-- about us ends -->
                    @include('layout.newhomepage.footersection')
                </main>
                @include('layout.newhomepage.footer')

            </div>
    </div>
    @enddesktop

    <!-- Desktop Section End-->

    <!-- Tablet Section Start-->
    @tablet
        <!-- Page Content  -->
        <div id="content">
            @include('layout.newhomepage.header')

            <main class="main" id="main">
                <div class="pricblk">
                    <div class="container">
                        <h1 class="headin">More Visibility, More Business</h1>
                        <div class="ctxt">Choose the perfect plan for you, 100% satisfaction guaranteed</div>
                        <div class="priclist">
                            <div class="priclistinner">
                                <div class="pritxtn">Free Listing</div>
                                <form class="form-horizontal" id="fran-form" name="form_franchisor"
                                    action="{{ url('advertise-with-us-payment') }}" method="POST" role="form"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="ftyblk">
                                        <div class="rinr cent"><i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">0</span><span class="pf2">/</span>
                                        </div>
                                    </div>
                                    <input type="radio" name="memberplan" value="1" checked
                                        style="display: none;">
                                    <input class="btncir" type="submit" value="Try Now">
                                </form>
                                <ul class="listp">
                                    <li>Get Priority over other business listings under - <strong>List Page
                                        </strong></li>
                                </ul>
                            </div>


                            <div class="priclistinner">
                                <div class="pritxtn">Sub Category</div>
                                <form class="form-horizontal" name="form_franchisor"
                                    action="{{ url('advertise-with-us-payment') }}" method="POST" role="form"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="ftyblk">

                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema2" name="memberplan"
                                                    value="123">
                                                <label for="ritema2"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">1,43,000</span><span class="pf2"> <del
                                                    class="dll">1,43,000</del> / 6 Months</span>
                                        </div>
                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema3" name="memberplan"
                                                    value="118" checked>
                                                <label for="ritema3"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">1,62,500</span><span class="pf2"> <del
                                                    class="dll">1,62,500</del> / 1 Year</span>
                                        </div>
                                    </div>
                                    <input class="btncir" type="submit" value="Buy Now">
                                </form>
                                <ul class="listp">
                                    <li>Get Priority over other business listings under - <strong>Sub Category</strong>
                                    </li>
                                    <li>Visibility & Reach - 70%</li>
                                </ul>
                            </div>

                            <div class="priclistinner">
                                <div class="pritxtn">Master Category</div>
                                <form class="form-horizontal" name="form_franchisor"
                                    action="{{ url('advertise-with-us-payment') }}" method="POST" role="form"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="ftyblk">

                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema5" name="memberplan"
                                                    value="120">
                                                <label for="ritema5"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">1,43,000</span><span class="pf2"> <del
                                                    class="dll">
                                                    1,43,000</del> / 3 Months</span>
                                        </div>
                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema6" name="memberplan"
                                                    value="124">
                                                <label for="ritema6"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">2,27,500</span><span class="pf2"> <del
                                                    class="dll">
                                                    2,27,500</del> / 6 Months</span>
                                        </div>
                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema7" name="memberplan"
                                                    value="121" checked>
                                                <label for="ritema7"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">2,92,500</span><span class="pf2"> <del
                                                    class="dll">2,92,500</del> / 1 Year</span>
                                        </div>
                                    </div>
                                    <input class="btncir" type="submit" value="Buy Now">
                                </form>
                                <ul class="listp">
                                    <li>Get Priority over other business listings under - <strong>Master and Sub
                                            Category</strong></li>
                                    <li>Visibility & Reach - 100%</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feblkcontainer">
                    <div class="container">
                        <div class="feblk_body">
                            <div class="feblk_head"> Know What’s Included with Each Plan </div>
                            <ul class="priceplan">
                                <li>
                                    <div class="reghead tleft">Get Priority over other business listings under</div>
                                    <div class="iconblk htset tleft">Get Instant Update over Phone, Email and SMS</div>

                                    <div class="iconblk htset tleft">Make your business discoverable with detailed
                                        business information</div>
                                    <div class="iconblk htset tleft">Add your brand images to Increase your visibility
                                        and business enquiries</div>
                                    <div class="iconblk htset tleft">Boost on Search by Category, Location & Investment
                                    </div>
                                    <div class="iconblk htset tleft">Showcase your logo with company listing</div>
                                    <div class="iconblk htset tleft">Get access to “My Account” dashboard to track
                                        views and responses instantly</div>
                                    <div class="iconblk htset tleft">Thousands of Investors Can View Your Profile</div>
                                    <div class="iconblk htset tleft">Local, National And International Exposure</div>
                                    <div class="iconblk htset tleft">Generating more and better business inquiries
                                    </div>
                                    <div class="iconblk htset tleft">Visibility & Reach</div>

                                </li>


                                <li>
                                    <div class="reghead">Listing Pages</div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue">Only Premium Investors</div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset"> </div>

                                </li>

                                <li>
                                    <div class="reghead">Sub Category</div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue">70%</div>
                                    </div>
                                </li>

                                <li>
                                    <div class="reghead">Master and Sub Category</div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue">100%</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- newsletter section starts -->
                @include('layout.newhomepage.newsletter')

                <!-- newsletter section ends -->
                <!-- about us -->
                @include('layout.newhomepage.aboutus')

                <!-- about us ends -->
                @include('layout.newhomepage.footersection')
            </main>
            @include('layout.newhomepage.footer')

        </div>
        </div>
        @endtablet

    <!-- Tablet Section End -->
    <!-- mobile section start -->
    @mobile
        <!-- Page Content  -->
        <div id="content">
            @include('layout.newhomepage.mobile.header')
            <main class="main" id="main">
                <div class="pricblk">
                    <div class="container">
                        <h1 class="headin">More Visibility, More Business</h1>
                        <div class="ctxt">Choose the perfect plan for you, 100% satisfaction guaranteed</div>
                        <div class="priclist">
                            <div class="priclistinner">
                                <div class="pritxtn">Free Listing</div>
                                <form class="form-horizontal" id="fran-form" name="form_franchisor"
                                    action="{{ url('advertise-with-us-payment') }}" method="POST" role="form"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="ftyblk">
                                        <div class="rinr cent"><i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">0</span><span class="pf2"></span>
                                        </div>
                                    </div>
                                    <input type="radio" name="memberplan" value="1" checked
                                        style="display: none;">
                                    <input class="btncir" type="submit" value="Try Now">
                                </form>
                                <ul class="listp">
                                    <li>Get Priority over other business listings under - <strong>List Page
                                        </strong></li>
                                </ul>
                            </div>


                            <div class="priclistinner">
                                <div class="pritxtn">Sub Category</div>
                                <form class="form-horizontal" id="fran-form" name="form_franchisor"
                                    action="{{ url('advertise-with-us-payment') }}" method="POST" role="form"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="ftyblk">

                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema21" name="memberplan"
                                                    id="price2" value="123">
                                                <label for="ritema21"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">1,43,000</span><span class="pf2"> <del
                                                    class="dll">1,43,000</del> / 6 Months</span>
                                        </div>
                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema3" name="memberplan"
                                                    value="118" checked>
                                                <label for="ritema3"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">1,62,500</span><span class="pf2"> <del
                                                    class="dll">1,62,500</del> / 1 Year</span>
                                        </div>
                                    </div>
                                    <input class="btncir" type="submit" value="Buy Now">
                                </form>
                                <ul class="listp">
                                    <li>Get Priority over other business listings under - <strong>Sub Category</strong>
                                    </li>
                                    <li>Visibility & Reach - 70%</li>
                                </ul>
                            </div>

                            <div class="priclistinner">
                                <div class="pritxtn">Master Category</div>
                                <form class="form-horizontal" id="fran-form" name="form_franchisor"
                                    action="{{ url('advertise-with-us-payment') }}" method="POST" role="form"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="ftyblk">

                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema5" name="memberplan"
                                                    id="price2" value="120">
                                                <label for="ritema5"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">1,43,000</span><span class="pf2"> <del
                                                    class="dll">
                                                    1,43,000</del> / 3 Months</span>
                                        </div>
                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema51" name="memberplan"
                                                    id="price2" value="124">
                                                <label for="ritema51"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">2,27,500</span><span class="pf2"> <del
                                                    class="dll">
                                                    2,27,500</del> / 6 Months</span>
                                        </div>
                                        <div class="rinr otherp">
                                            <div class="radio-item">
                                                <input type="radio" id="ritema6" name="memberplan"
                                                    value="121" checked>
                                                <label for="ritema6"></label>
                                            </div>
                                            <i class="fas fa-rupee-sign"></i>
                                            <span class="pf1">2,92,500</span><span class="pf2"> <del
                                                    class="dll">2,92,500</del> / 1 Year</span>
                                        </div>
                                    </div>
                                    <input class="btncir" type="submit" value="Buy Now">
                                </form>
                                <ul class="listp">
                                    <li>Get Priority over other business listings under - <strong>Master and Sub
                                            Category</strong></li>
                                    <li>Visibility & Reach - 100%</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feblkcontainer">
                    <div class="container">




                        <div class="feblk_body">
                            <div class="feblk_head"> Know What’s Included with Each Plan </div>
                            <ul class="priceplan">
                                <li>
                                    <div class="reghead tleft">Get Priority over other business listings under</div>
                                    <div class="iconblk htset tleft">Get Instant Update over Phone, Email and SMS</div>

                                    <div class="iconblk htset tleft">Make your business discoverable with detailed
                                        business information</div>
                                    <div class="iconblk htset tleft">Add your brand images to Increase your visibility
                                        and business enquiries</div>
                                    <div class="iconblk htset tleft">Boost on Search by Category, Location & Investment
                                    </div>
                                    <div class="iconblk htset tleft">Showcase your logo with company listing</div>
                                    <div class="iconblk htset tleft">Get access to “My Account” dashboard to track
                                        views and responses instantly</div>
                                    <div class="iconblk htset tleft">Thousands of Investors Can View Your Profile</div>
                                    <div class="iconblk htset tleft">Local, National And International Exposure</div>
                                    <div class="iconblk htset tleft">Generating more and better business inquiries
                                    </div>
                                    <div class="iconblk htset tleft">Visibility & Reach</div>

                                </li>


                                <li>
                                    <div class="reghead">Listing Pages</div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue">Only Premium Investors</div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset"> </div>
                                    <div class="iconblk htset"> </div>


                                </li>
                                <li>
                                    <div class="reghead">Sub Category</div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue">70%</div>
                                    </div>
                                </li>

                                <li>
                                    <div class="reghead">Master and Sub Category</div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue"><i class="fas fa-check"></i></div>
                                    </div>
                                    <div class="iconblk htset">
                                        <div class="pvalue">100%</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- newsletter section starts -->
                @include('layout.newhomepage.mobile.newsletter')

                <!-- newsletter section ends -->
                <!-- about us -->
                @include('layout.newhomepage.mobile.aboutus')

                <!-- about us ends -->
                @include('layout.newhomepage.footersection')
            </main>
            @include('layout.newhomepage.footer')

        </div>
        </div>
        @endmobile

    <!-- mobile section end -->
    <div class="overlay"></div>
    <script src="https://www.franchiseindia.com/js/jquery-3.1.1.min.js"></script>
    @include('layout.newhomepage.jslink')

    {{--  <script>
        $(document).ready(function() {
            function selectMax(selectmaxheaderval) {
                let amountConfigArr = {
                    !!json_encode(Config('constants.investRangeInWordsSingle')) !!
                };
                let maxAmount = $('#maxAmount');
                let getSlugAmount = {
                    !!json_encode(Config('constants.InvestRange')) !!
                };
                maxAmount.html("");
                selectmaxheaderval = parseInt(selectmaxheaderval);
                $.each(amountConfigArr, function(key, value) {
                    if (key > selectmaxheaderval)
                        $('#maxAmount').append($("<option></option>").attr({
                            "value": key,
                            "slug": getSlugAmount[key]['min']
                        }).text(value));
                });
                if (selectmaxheaderval === 21)
                    maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
            }
        });
    </script>  --}}
    <script>
        $(document).ready(function() {
            function selectMax(selectmaxheaderval) {
                let amountConfigArr = @json(Config('constants.investRangeInWordsSingle'));
                let maxAmount = $('#maxAmount');
                let getSlugAmount = @json(Config('constants.InvestRange'));
                maxAmount.html("");
                selectmaxheaderval = parseInt(selectmaxheaderval);
                $.each(amountConfigArr, function(key, value) {
                    if (key > selectmaxheaderval) {
                        $('#maxAmount').append($("<option></option>").attr({
                            "value": key,
                            "slug": getSlugAmount[key]['min']
                        }).text(value));
                    }
                });
                if (selectmaxheaderval === 21) {
                    maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
                }
            }
        });
    </script>

    <script>
        function setCookie() {
            document.cookie = "accept_cookie=ok";
            $('#cookie').hide();
        }

        function getCookie() {
            return checkCookie('accept_cookie');
        }

        function checkCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        // A $( document ).ready() block.
        $(document).ready(function() {
            var cookie = getCookie();
            if (cookie == 'ok') {
                $('#cookie').hide();
            } else {
                $('#cookie').show();
            }
        });
    </script>
    <script>
        //Awesomplete
        const input = document.getElementById('dealer-bar-search');

        // Init awesomplete
        const awesomplete = new Awesomplete(input);
        const navBarSearch = $("#dealer-bar-search");
        //navBarSearch.keypress(function () {
        navBarSearch.on('keypress keyup keypress blur change', function() {
            var search_keyword = $(this).val();
            // Check if atleast 2 chars are typed
            if (search_keyword.length >= 2) {
                $.ajax({
                    url: '/dealers-search/' + search_keyword,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        prepareList(JSON.parse(JSON.stringify(response)));

                    },
                    error: function(err) {
                        console.log(err);

                    }
                });
            }
        });

        function prepareList(list) {
            var c_list = [];

            list.forEach(item => {
                c_list.push(item.name);
            });

            // Assigned the c_list to the list property of Awesomplete instance
            awesomplete.list = c_list;
        }

        navBarSearch.on('awesomplete-selectcomplete', function() {
            if ($("#dealer-bar-search").val() != "") {
                var value = $("#dealer-bar-search").val();
                var items = value.split(' - <strong> in');
                if (items.length > 1)
                    value = items[0];
                window.location.href = '/dealers-india/search/' + value;
            }
        });

        $("#textcompany").on('click', function() {
            if ($("#dealer-bar-search").val() != "") {
                var value = $("#dealer-bar-search").val();
                var items = value.split(' - <strong> in');
                if (items.length > 1)
                    value = items[0];
                window.location.href = '/dealers-india/search/' + value;
            }
        });
    </script>
    <!-- Custom JS -->
    <script type="text/javascript" src="{{ url('newhomepage/assets/js/custom.js') }}"></script>
    @if (
        !(
            !empty(request()->segment(2)) &&
            request()->segment(1) == 'brands' &&
            isset(explode('.', request()->segment(2))[1]) &&
            in_array(explode('.', request()->segment(2))[1], Config('constants.popupBrands'))
        ))
        @notmobile
            @php
                $expoPopup = 0;
                if (empty(Cookie::get('expoppoup17'))) {
                    $expoPopup = 1;
                    Cookie::queue('expoppoup17', 'RI2017', 120);
                }
                $ip = $_SERVER['REMOTE_ADDR'];
                $query = '';
                $query = App\Http\Controllers\CommonController::getIpLocationState($ip);
                if (!empty($query)) {
                    $query = strtolower($query);
                }
                $southCodes = ['andhra pradesh', 'telangana', 'karnataka', 'kerala'];
                $eastCodes = ['west bengal', 'bihar', 'jharkhand', 'odisha', 'nepal'];
                $westCodes = ['maharashtra', 'goa', 'madhya pradesh'];
                $gujaratCodes = ['gujarat', 'goa'];
                $northCodes = [
                    'haryana',
                    'delhi',
                    'uttar pradesh',
                    'punjab',
                    'jammu and kashmir',
                    'jammu',
                    'kashmir',
                    'himachal pradesh',
                    'chandigarh',
                    'uttarakhand',
                ];
                $rajasthan = ['rajasthan'];
                $indiaCodes = [
                    'andhra pradesh',
                    'karnataka',
                    'kerala',
                    'lakshadweep',
                    'pondicherry',
                    'telangana',
                    'tamil nadu',
                    'tamilnadu',
                    'uttar pradesh',
                    'rajasthan',
                    'haryana',
                    'delhi',
                ];
                $haryanaCodes = ['haryana'];
                $otherCodes = ['maharashtra', 'tamil nadu', 'tamilnadu'];
                $jammuCodes = ['punjab', 'jammu and kashmir', 'jammu', 'kashmir'];
                $upCodes = ['uttar pradesh'];
                $rajasthanCodes = ['rajasthan'];
                App\Http\Controllers\CommonController::checkCampaignUrl();
            @endphp
            @if (
                $expoPopup == 1 &&
                    request()->segment(1) != 'property-loan' &&
                    request()->segment(1) != 'myaccount' &&
                    request()->segment(1) != 'payment' &&
                    request()->segment(1) != 'mailer' &&
                    empty(request()->openpopup) &&
                    empty(request()->popup_lead))
                @if (in_array($query, $rajasthan))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 0)
                            @include('includes.banners.popupfranchiseshowmain')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseshowmain')
                    @endif
                @elseif(in_array($query, $southCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 0)
                            @include('includes.banners.popupfranchiseshowmain')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseshowmain')
                    @endif
                @elseif(in_array($query, $westCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 0)
                            @include('includes.banners.popupfranchiseshowmain')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseshowmain')
                    @endif
                @elseif(in_array($query, $eastCodes))
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 0)
                            @include('includes.banners.popupfranchiseshowmain')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseshowmain')
                    @endif
                @else
                    @if (request()->segment(1) == 'brands')
                        @if ($franDetails->membership_type != 0)
                            @include('includes.banners.popupfranchiseshowmain')
                        @endif
                    @else
                        @include('includes.banners.popupfranchiseshowmain')
                    @endif
                @endif
            @endif

            <!-- popupmag Start of franchiseindia Zendesk Widget script  popupmag -->
        @endnotmobile
    @endif
    {{--
		<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=a76a1630-c68b-4165-b6f1-ef96b178c0c3"></script> --}}

    <!-- End of franchiseindia Zendesk Widget script -->
    {{-- @include('includes.exit-popup') --}}

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1055876857756260');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1055876857756260&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
    <script>
        $(document).ready(function($) {
            $('#myCarouselvideo').carousel({
                pause: true,
                interval: false
            });
        });
    </script>
</body>

</html>
