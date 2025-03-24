<!DOCTYPE html>
<html>

<head>
    @include('layout.newhomepage.head')
</head>

<body>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NW38FD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KW4K6WV6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        
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
        @php
            if (Session::has('advertise-plan')) {
                $advertiseplan = Session::get('advertise-plan');
            } else {
                $advertiseplan = 0;
            }
        @endphp
        <!-- Sidebar End -->
        <!-- Desktop Section Start-->
        @desktop
            <!-- Page Content  -->
            <div id="content">
                @include('layout.newhomepage.header')
                <main class="main" id="main">
                    <!-- pricing section -->
                    <section class="pricing" id="pricing">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12
                  col-lg-12 col-xl-12">
                                    <ul class="breadcrumb">
                                        <li>Home</li>
                                        <li>Pricing</li>
                                    </ul>
                                </div>
                                <div class="whatsapp_icon"
                                    style="text-align:center;margin-top: 45px;color: #000;font-size: 17px;font-weight: 400;">
                                    Chat on <a
                                        href="https://api.whatsapp.com/send?phone=919312650021&amp;text=Hello,%20I%20am%20interested%20in%20knowing%20more%20about ?%20https://www.franchiseindia.com/"
                                        target="_blank"><img
                                            src="https://www.franchiseindia.com/newhomepage/assets/img/whatappsicon.svg"
                                            class="sts" style="width:2%;"></a></div>
                                <!--  -->
                                <!-- Choose Your Plan & Enhance the online presence of your business (24x7) -->
                                <div class="col-xs-12 col-sm-12 col-md-12
                  col-lg-12 col-xl-12 section-hed hide-div"
                                    style="display:none;">
                                    <h1>
                                        Choose Your Plan & Enhance the
                                        online presence of your business
                                        (24x7)
                                    </h1>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12
                  col-lg-12 col-xl-12 mt-9px">
                                    <form class="form-horizontal" id="fran-form" name="form_franchisor"
                                        action="{{ url('franchisor/registration/step/final') }}" method="POST"
                                        role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="franchisorId" value="{{ $franchisorId }}">
                                        <div class="card card-pricing hide-div" style="display:none;">
                                            <table class="pricing-table-section">
                                                <tbody>
                                                    <tr class="heading-table">
                                                        <td>Benefits You Get</td>
                                                        <td>Free Listing</td>
                                                        <td>Super Saver</td>
                                                        <td>Sub Category</td>
                                                        <td>Master Category</td>
                                                    </tr>
                                                    <tr class="subsection1">
                                                        <td></td>
                                                        <td>
                                                            <div class="free"><input class="form-check-input"
                                                                    type="radio" name="memberplan" value="1"
                                                                    @if ($advertiseplan == 1) checked @endif>
                                                                FREE</div>
                                                        </td>
                                                        <td>
                                                            <div class="starting-price-section">
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="113"
                                                                    @if ($advertiseplan == 113) checked @endif>
                                                                <label
                                                                    class="form-check-label
                                  label-main-monthly"
                                                                    for="exampleRadios1">Monthly: &nbsp;
                                                                </label>
                                                                <div class="pricing-section-main-strike">
                                                                    <span class="offerd-price">
                                                                        &#x20B9; 9999
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="middle-price-section">
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="114"
                                                                    @if ($advertiseplan == 114) checked @endif>
                                                                <label
                                                                    class="form-check-label
                                  label-main-monthly"
                                                                    for="exampleRadios1">Quarterly: &nbsp;
                                                                </label>
                                                                <div class="pricing-section-main-strike">
                                                                    <span class="offerd-price">
                                                                        &#x20B9; 24999
                                                                    </span>
                                                                    <span class="strike-through">
                                                                        <span class="strike-text">
                                                                            &#x20B9; 29997
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="savings-section">
                                                                    &#x20B9; 4998 Savings
                                                                </div>
                                                            </div>
                                                            <div class="annually-price-section">
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="122"
                                                                    @if ($advertiseplan == 122) checked @endif>
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="115"
                                                                    @if ($advertiseplan == 115) checked @endif>
                                                                <label
                                                                    class="form-check-label
                                  label-main-monthly"
                                                                    for="exampleRadios1">Annually: &nbsp;
                                                                </label>
                                                                <div class="pricing-section-main-strike">
                                                                    <span class="offerd-price">
                                                                        &#x20B9; 89988
                                                                    </span>
                                                                    <span class="strike-through">
                                                                        <span class="strike-text">
                                                                            &#x20B9; 119988
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="savings-section">
                                                                    &#x20B9; 30000 Savings
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="starting-price-section">
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="116"
                                                                    @if ($advertiseplan == 116) checked @endif>
                                                                <label
                                                                    class="form-check-label
                                  label-main-monthly"
                                                                    for="exampleRadios1">Monthly: &nbsp;
                                                                </label>
                                                                <div class="pricing-section-main-strike">
                                                                    <span class="offerd-price">
                                                                        &#x20B9; 19999
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="middle-price-section">
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="117"
                                                                    @if ($advertiseplan == 117) checked @endif>
                                                                <label
                                                                    class="form-check-label
                                  label-main-monthly"
                                                                    for="exampleRadios1">Quarterly: &nbsp;
                                                                </label>
                                                                <div class="pricing-section-main-strike">
                                                                    <span class="offerd-price">
                                                                        &#x20B9; 49998
                                                                    </span>
                                                                    <span class="strike-through">
                                                                        <span class="strike-text">
                                                                            &#x20B9; 59997
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="savings-section">
                                                                    &#x20B9; 9999 Savings
                                                                </div>
                                                            </div>
                                                            <div class="annually-price-section">
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="123"
                                                                    @if ($advertiseplan == 123) checked @endif>
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="118"
                                                                    @if ($advertiseplan == 118) checked @endif>
                                                                <label
                                                                    class="form-check-label
                                  label-main-monthly"
                                                                    for="exampleRadios1">Annually: &nbsp;
                                                                </label>
                                                                <div class="pricing-section-main-strike">
                                                                    <span class="offerd-price">
                                                                        &#x20B9; 144000
                                                                    </span>
                                                                    <span class="strike-through">
                                                                        <span class="strike-text">
                                                                            &#x20B9; 29997
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="savings-section">
                                                                    &#x20B9; 95988 Savings
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="starting-price-section">
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="119"
                                                                    @if ($advertiseplan == 119) checked @endif>
                                                                <label
                                                                    class="form-check-label
                                  label-main-monthly"
                                                                    for="exampleRadios1">Monthly: &nbsp;
                                                                </label>
                                                                <div class="pricing-section-main-strike">
                                                                    <span class="offerd-price">
                                                                        &#x20B9; 39999
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="middle-price-section">
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="120"
                                                                    @if ($advertiseplan == 120) checked @endif>
                                                                <label
                                                                    class="form-check-label
                                  label-main-monthly"
                                                                    for="exampleRadios1">Quarterly: &nbsp;
                                                                </label>
                                                                <div class="pricing-section-main-strike">
                                                                    <span class="offerd-price">
                                                                        &#x20B9; 90000
                                                                    </span>
                                                                    <span class="strike-through">
                                                                        <span class="strike-text">
                                                                            &#x20B9; 119997
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="savings-section">
                                                                    &#x20B9; 29997 Savings
                                                                </div>
                                                            </div>
                                                            <div class="annually-price-section">
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="124"
                                                                    @if ($advertiseplan == 124) checked @endif>
                                                                <input class="form-check-input" type="radio"
                                                                    name="memberplan" value="121"
                                                                    @if ($advertiseplan == 121) checked @endif>
                                                                <label
                                                                    class="form-check-label
                                  label-main-monthly"
                                                                    for="exampleRadios1">Annually: &nbsp;
                                                                </label>
                                                                <div class="pricing-section-main-strike">
                                                                    <span class="offerd-price">
                                                                        &#x20B9; 240000
                                                                    </span>
                                                                    <span class="strike-through">
                                                                        <span class="strike-text">
                                                                            &#x20B9; 479988
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="savings-section">
                                                                    &#x20B9; 239988 Savings
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main">
                                                        <td>Get Priority over other business listings under</td>
                                                        <td>Listing Pages</td>
                                                        <td>Sub -Sub Category</td>
                                                        <td>Sub and Sub -Sub
                                                            <br />Category
                                                        </td>
                                                        <td>Master, Sub and
                                                            <br />Sub -Sub Category
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                        <td>Get Instant Update over Phone, Email and SMS</td>
                                                        <td>-</td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main ">
                                                        <td>Make your business discoverable with detailed <br>
                                                            business information
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                        <td>Add your brand images to Increase your <br />
                                                            visibility and business enquiries
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main ">
                                                        <td>Boost on Search by Category, <br />Location &
                                                            Investment
                                                        </td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                        <td>Showcase your logo with company listing</td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main ">
                                                        <td>Get access to “My Account” dashboard to track <br />
                                                            views and responses instantly
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                        <td>Thousands of Investors Can View Your Profile</td>
                                                        <td>
                                                            <div class="premium-section-main">
                                                                Only Premium Investors
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main">
                                                        <td>Local, National And International Exposure</td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                        <td>Generating more and better business inquiries</td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                        <td>
                                                            <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                alt="tick">
                                                        </td>
                                                    </tr>
                                                    <tr class="under-section-subsection below-section-main ">
                                                        <td>Visibility & Reach</td>
                                                        <td>
                                                            -
                                                        </td>
                                                        <td>
                                                            40%
                                                        </td>
                                                        <td>
                                                            75%
                                                        </td>
                                                        <td>
                                                            100%
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="payment-main">
                                            <p><strong>Payment Terms: 100% Advance Payment with 18% GST</strong></p>
                                        </div>
                                        <!--frm Start here  -->
                                        <div class="row setpad">
                                            <div class="form-group">
                                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"><span
                                                        class="mandatory">Layout Option</span><br><span
                                                        class="note">(Kindly upload images for the selected layout
                                                        <br>from your dashboard (Appearance section))</span></label>
                                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                    <div class="row checkmarginnew">
                                                        <div class="col-sm-12 row-no-padding optlink">
                                                            <label class="col-sm-12 col-md-12">
                                                                <input type="radio" name="layout_type" value="1"
                                                                    checked data-toggle="modal"
                                                                    data-target="#layoutoption1" /> Basic Layout &nbsp
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#layoutoption1"> ( View Example )</a>
                                                            </label>
                                                            <label class="col-sm-12 col-md-12">
                                                                <input type="radio" name="layout_type" value="2"
                                                                    data-toggle="modal" data-target="#layoutoption2" />
                                                                Sliding Layout
                                                                &nbsp
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#layoutoption2"> ( View Example )</a>
                                                            </label>
                                                            <label class="col-sm-12 col-md-12">
                                                                <input type="radio" name="layout_type" value="3"
                                                                    data-toggle="modal" data-target="#layoutoption3" />
                                                                Gallery Layout
                                                                &nbsp
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#layoutoption3"> ( View Example )</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---->
                                            <div class="modal fade lg-panel formsection" id="layoutoption1"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body option">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"> <span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <img src="{{ url('images/layoutoption1.jpg') }}"
                                                                alt="layout1" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---->
                                            <!---->
                                            <div class="modal fade lg-panel formsection" id="layoutoption2"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body option">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"> <span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <img src="{{ url('images/layoutoption2.jpg') }}"
                                                                alt="layout2" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---->
                                            <!---->
                                            <div class="modal fade lg-panel formsection" id="layoutoption3"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body option">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <img src="{{ url('images/layoutoption3.jpg') }}"
                                                                alt="layout3" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="border-topborder"></div>
                                            <div class="form-group">
                                                <label class="col-xs-12  col-sm-4 com4mod control-label">Upload Company
                                                    Logo (Max 2MB)</label>
                                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><img
                                                                src="{{ url('images/upload.png') }}"
                                                                alt="image upload" /></span>
                                                        <input type="file" name="company_logo" class="form-control"
                                                            id="company_logo" placeholder="Upload your Company Logo"
                                                            required>
                                                    </div>
                                                    <div style="display: none; color: red;" id="company_logo_msg">
                                                        Please select a valid image (jpg / gif / png)</div>
                                                    <div style="display: none; color: red;" id="company_logo_msg_size">
                                                        Please select a image of size(Less
                                                        than 2MB)</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-12  col-sm-4 com4mod control-label">Video Link
                                                </label>
                                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><img
                                                                src="{{ url('images/video-link.png') }}"
                                                                alt="video link" /></span>
                                                        <input type="text" class="form-control" name="video_link"
                                                            id="video_link" placeholder="Enter Your Video link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">GST
                                                    NO.</label>
                                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><img
                                                                src="{{ url('images/commission.png') }}"
                                                                alt="gst no."></span>
                                                        <input type="text" name="gst_no" class="form-control"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Mode
                                                    Of Payment</label>
                                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><img
                                                                src="{{ url('images/commission.png') }}"
                                                                alt="gst no."></span>
                                                        <select name="mop" id="mop" class="form-control">
                                                            <option value="OPTCRDC">Mode Of Payment</option>
                                                            <option value="OPTCRDC">Credit Card</option>
                                                            <option value="OPTDBCRD">Debit Card</option>
                                                            <option value="OPTEMI">EMI</option>
                                                            <option value="OPTNBK">Net Banking</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="amount_to_pay" class="form-control"
                                                id="amount" value="">
                                            <div class="form-group marTopnew">
                                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"></label>
                                                <div class="col-sm-1 com1mod padtop20 hidden-xs"></div>
                                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                    <div class="row checkmargin">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                            <label class="col-xs-12 col-sm-12 col-md-12"> <input
                                                                    type="checkbox" checked name="newsletter_sub"
                                                                    value="1"> Yes, I want to subscribe for weekly
                                                                Newsletter </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row colbg">
                                                <center>
                                                    <input type="submit" id="franchisorsubmit" class=" btn-mainfrm"
                                                        value="Submit" />
                                                </center>
                                            </div>
                                        </div>
                                    </form>
                                    <!--frm end here  -->
                                </div>
                            </div>
                        </div>
                    </section>
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
    {{-- @endif --}}
    <!-- Desktop Section End-->
    <!-- Tablet Section Start-->
    @tablet
        <!-- Page Content  -->
        <div id="content">
            @include('layout.newhomepage.header')
            <main class="main" id="main">
                <!-- pricing section -->
                <section class="pricing" id="pricing">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12
                col-lg-12 col-xl-12">
                                <ul class="breadcrumb">
                                    <li>Home</li>
                                    <li>Pricing</li>
                                </ul>
                            </div>
                            <!-- Choose Your Plan & Enhance the online presence of your business (24x7) -->
                            <div class="col-xs-12 col-sm-12 col-md-12
                col-lg-12 col-xl-12 section-hed hide-div"
                                style="display:none;">
                                <h1>
                                    Choose Your Plan & Enhance the
                                    online presence of your business
                                    (24x7)
                                </h1>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12
                col-lg-12 col-xl-12 mt-9px">
                                <form class="form-horizontal" id="fran-form" name="form_franchisor"
                                    action="{{ url('franchisor/registration/step/final') }}" method="POST"
                                    role="form" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="franchisorId" value="{{ $franchisorId }}">
                                    <div class="card card-pricing hide-div" style="display:none;">
                                        <table class="pricing-table-section">
                                            <tbody>
                                                <tr class="heading-table">
                                                    <td>Benefits You Get</td>
                                                    <td>Free Listing</td>
                                                    <td>Super Saver</td>
                                                    <td>Sub Category</td>
                                                    <td>Master Category</td>
                                                </tr>
                                                <tr class="subsection1">
                                                    <td></td>
                                                    <td>
                                                        <div class="free"><input class="form-check-input"
                                                                type="radio" name="memberplan" value="1"
                                                                @if ($advertiseplan == 1) checked @endif> FREE
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="starting-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="113"
                                                                @if ($advertiseplan == 113) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Monthly: &nbsp;
                                                            </label>
                                                            <div class="pricing-section-main-strike">
                                                                <span class="offerd-price">
                                                                    &#x20B9; 9999
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="middle-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="114"
                                                                @if ($advertiseplan == 114) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Quarterly: &nbsp;
                                                            </label>
                                                            <div class="pricing-section-main-strike">
                                                                <span class="offerd-price">
                                                                    &#x20B9; 24999
                                                                </span>
                                                                <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        &#x20B9; 29997
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="savings-section">
                                                                &#x20B9; 4998 Savings
                                                            </div>
                                                        </div>
                                                        <div class="annually-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="122"
                                                                @if ($advertiseplan == 122) checked @endif>
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="115"
                                                                @if ($advertiseplan == 115) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Annually: &nbsp;
                                                            </label>
                                                            <div class="pricing-section-main-strike">
                                                                <span class="offerd-price">
                                                                    &#x20B9; 89988
                                                                </span>
                                                                <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        &#x20B9; 119988
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="savings-section">
                                                                &#x20B9; 30000 Savings
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="starting-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="116"
                                                                @if ($advertiseplan == 116) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Monthly: &nbsp;
                                                            </label>
                                                            <div class="pricing-section-main-strike">
                                                                <span class="offerd-price">
                                                                    &#x20B9; 19999
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="middle-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="117"
                                                                @if ($advertiseplan == 117) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Quarterly: &nbsp;
                                                            </label>
                                                            <div class="pricing-section-main-strike">
                                                                <span class="offerd-price">
                                                                    &#x20B9; 49998
                                                                </span>
                                                                <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        &#x20B9; 59997
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="savings-section">
                                                                &#x20B9; 9999 Savings
                                                            </div>
                                                        </div>
                                                        <div class="annually-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="123"
                                                                @if ($advertiseplan == 123) checked @endif>
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="118"
                                                                @if ($advertiseplan == 118) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Annually: &nbsp;
                                                            </label>
                                                            <div class="pricing-section-main-strike">
                                                                <span class="offerd-price">
                                                                    &#x20B9; 144000
                                                                </span>
                                                                <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        &#x20B9; 29997
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="savings-section">
                                                                &#x20B9; 95988 Savings
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="starting-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="119"
                                                                @if ($advertiseplan == 119) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Monthly: &nbsp;
                                                            </label>
                                                            <div class="pricing-section-main-strike">
                                                                <span class="offerd-price">
                                                                    &#x20B9; 39999
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="middle-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="120"
                                                                @if ($advertiseplan == 120) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Quarterly: &nbsp;
                                                            </label>
                                                            <div class="pricing-section-main-strike">
                                                                <span class="offerd-price">
                                                                    &#x20B9; 90000
                                                                </span>
                                                                <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        &#x20B9; 119997
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="savings-section">
                                                                &#x20B9; 29997 Savings
                                                            </div>
                                                        </div>
                                                        <div class="annually-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="124"
                                                                @if ($advertiseplan == 124) checked @endif>
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="121"
                                                                @if ($advertiseplan == 121) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Annually: &nbsp;
                                                            </label>
                                                            <div class="pricing-section-main-strike">
                                                                <span class="offerd-price">
                                                                    &#x20B9; 240000
                                                                </span>
                                                                <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        &#x20B9; 479988
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="savings-section">
                                                                &#x20B9; 239988 Savings
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main">
                                                    <td>Get Priority over other business listings under</td>
                                                    <td>Listing Pages</td>
                                                    <td>Sub -Sub Category</td>
                                                    <td>Sub and Sub -Sub
                                                        <br />Category
                                                    </td>
                                                    <td>Master, Sub and
                                                        <br />Sub -Sub Category
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                    <td>Get Instant Update over Phone, Email and SMS</td>
                                                    <td>-</td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main ">
                                                    <td>Make your business discoverable with detailed <br>
                                                        business information
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                    <td>Add your brand images to Increase your <br />
                                                        visibility and business enquiries
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main ">
                                                    <td>Boost on Search by Category, <br />Location &
                                                        Investment
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                    <td>Showcase your logo with company listing</td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main ">
                                                    <td>Get access to “My Account” dashboard to track <br />
                                                        views and responses instantly
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                    <td>Thousands of Investors Can View Your Profile</td>
                                                    <td>
                                                        <div class="premium-section-main">
                                                            Only Premium Investors
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main">
                                                    <td>Local, National And International Exposure</td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main bg-shw-dark">
                                                    <td>Generating more and better business inquiries</td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                            alt="tick">
                                                    </td>
                                                </tr>
                                                <tr class="under-section-subsection below-section-main ">
                                                    <td>Visibility & Reach</td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        40%
                                                    </td>
                                                    <td>
                                                        75%
                                                    </td>
                                                    <td>
                                                        100%
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="payment-main">
                                        <p><strong>Payment Terms: 100% Advance Payment with 18% GST</strong></p>
                                    </div>
                                    <!--frm Start here  -->
                                    <div class="row setpad">
                                        <div class="form-group">
                                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"><span
                                                    class="mandatory">Layout Option</span><br><span class="note">(Kindly
                                                    upload images for the selected layout <br>from your dashboard
                                                    (Appearance section))</span></label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="row checkmarginnew">
                                                    <div class="col-sm-12 row-no-padding optlink">
                                                        <label class="col-sm-12 col-md-12">
                                                            <input type="radio" name="layout_type" value="1"
                                                                checked data-toggle="modal"
                                                                data-target="#layoutoption1" /> Basic Layout &nbsp
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#layoutoption1"> ( View Example )</a>
                                                        </label>
                                                        <label class="col-sm-12 col-md-12">
                                                            <input type="radio" name="layout_type" value="2"
                                                                data-toggle="modal" data-target="#layoutoption2" />
                                                            Sliding Layout &nbsp
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#layoutoption2"> ( View Example )</a>
                                                        </label>
                                                        <label class="col-sm-12 col-md-12">
                                                            <input type="radio" name="layout_type" value="3"
                                                                data-toggle="modal" data-target="#layoutoption3" />
                                                            Gallery Layout &nbsp
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#layoutoption3"> ( View Example )</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                        <div class="modal fade lg-panel formsection" id="layoutoption1" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body option">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"> <span
                                                                aria-hidden="true">&times;</span></button>
                                                        <img src="{{ url('images/layoutoption1.jpg') }}"
                                                            alt="layout1" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                        <!---->
                                        <div class="modal fade lg-panel formsection" id="layoutoption2" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body option">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"> <span
                                                                aria-hidden="true">&times;</span></button>
                                                        <img src="{{ url('images/layoutoption2.jpg') }}"
                                                            alt="layout2" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                        <!---->
                                        <div class="modal fade lg-panel formsection" id="layoutoption3" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body option">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <img src="{{ url('images/layoutoption3.jpg') }}"
                                                            alt="layout3" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="border-topborder"></div>
                                        <div class="form-group">
                                            <label class="col-xs-12  col-sm-4 com4mod control-label">Upload Company Logo
                                                (Max 2MB)</label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/upload.png') }}"
                                                            alt="image upload" /></span>
                                                    <input type="file" name="company_logo" class="form-control"
                                                        id="company_logo" placeholder="Upload your Company Logo" required>
                                                </div>
                                                <div style="display: none; color: red;" id="company_logo_msg">Please
                                                    select a valid image (jpg / gif / png)</div>
                                                <div style="display: none; color: red;" id="company_logo_msg_size">Please
                                                    select a image of size(Less than 2MB)</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12  col-sm-4 com4mod control-label">Video Link </label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/video-link.png') }}"
                                                            alt="video link" /></span>
                                                    <input type="text" class="form-control" name="video_link"
                                                        id="video_link" placeholder="Enter Your Video link">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">GST
                                                NO.</label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/commission.png') }}"
                                                            alt="gst no."></span>
                                                    <input type="text" name="gst_no" class="form-control"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Mode Of
                                                Payment</label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/commission.png') }}"
                                                            alt="gst no."></span>
                                                    <select name="mop" id="mop" class="form-control">
                                                        <option value="OPTCRDC">Mode Of Payment</option>
                                                        <option value="OPTCRDC">Credit Card</option>
                                                        <option value="OPTDBCRD">Debit Card</option>
                                                        <option value="OPTEMI">EMI</option>
                                                        <option value="OPTNBK">Net Banking</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="amount_to_pay" class="form-control" id="amount"
                                            value="">
                                        <div class="form-group marTopnew">
                                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"></label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs"></div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="row checkmargin">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                        <label class="col-xs-12 col-sm-12 col-md-12"> <input
                                                                type="checkbox" checked name="newsletter_sub"
                                                                value="1"> Yes, I want to subscribe for weekly
                                                            Newsletter </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row colbg">
                                            <center>
                                                <input type="submit" id="franchisorsubmit" class=" btn-mainfrm"
                                                    value="Submit" />
                                            </center>
                                        </div>
                                    </div>
                                </form>
                                <!--frm end here  -->
                            </div>
                        </div>
                    </div>
                </section>
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
        <!-- Tablet Section End -->
    @endtablet
    <!-- mobile section start -->
    @mobile
        <!-- Page Content  -->
        <div id="content">
            @include('layout.newhomepage.mobile.header')
            <main class="main" id="main">
                <!-- pricing section -->
                <section class="mt-ex" id="pricing">
                    <div class="container">
                        <div class="row">
                            <!-- breadcrumb section start here -->
                            <div class="col-xs-12 col-sm-12 col-md-12
                col-lg-12 col-xl-12">
                                <ul class="breadcrumb">
                                    <li>Home</li>
                                    <li>Pricing</li>
                                </ul>
                            </div>
                            <!-- Card Section starts here -->
                            <form class="form-horizontal" id="fran-form" name="form_franchisor"
                                action="{{ url('franchisor/registration/step/final') }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="franchisorId" value="{{ $franchisorId }}">
                                <div
                                    class="col-xs-12 col-sm-12 col-md-12
                  col-lg-12 col-xl-12 section-hed">
                                    <h1>
                                        Choose Your Plan &amp; Enhance the
                                        online presence of your business
                                        (24x7)
                                    </h1>
                                    <!-- Swiper -->
                                    <div class="swiper-container pricing-card-main-mob">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="card card-pricing">
                                                    <h2>Free Listing </h2>
                                                    <div class="pricing-mob-form-section">
                                                        <div class="starting-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="1"
                                                                @if ($advertiseplan == 1) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Monthly: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 9999
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card card-pricing">
                                                    <h2>Super Saver </h2>
                                                    <div class="pricing-mob-form-section">
                                                        <div class="starting-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="113"
                                                                @if ($advertiseplan == 113) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Monthly: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 9999
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="middle-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="114"
                                                                @if ($advertiseplan == 114) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Quarterly: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 24999
                                                                </span> <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        ₹ 29997
                                                                    </span> </span>
                                                            </div>
                                                            <div class="savings-section"> ₹ 4998 Savings </div>
                                                        </div>
                                                        <div class="annually-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="122"
                                                                @if ($advertiseplan == 122) checked @endif>
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="115"
                                                                @if ($advertiseplan == 115) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Annually: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 89988
                                                                </span> <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        ₹ 119988
                                                                    </span> </span>
                                                            </div>
                                                            <div class="savings-section"> ₹ 30000 Savings </div>
                                                        </div>
                                                        <div class="section-primary-btn">
                                                            <button
                                                                class="btn btn-p-pricing
                                btn-main-pricing">
                                                                Buy Now </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card card-pricing">
                                                    <h2>Sub Category</h2>
                                                    <div class="pricing-mob-form-section">
                                                        <div class="starting-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="116"
                                                                @if ($advertiseplan == 116) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Monthly: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 19999
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="middle-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="117"
                                                                @if ($advertiseplan == 117) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Quarterly: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 49998
                                                                </span> <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        ₹ 59997
                                                                    </span> </span>
                                                            </div>
                                                            <div class="savings-section"> ₹ 9999 Savings </div>
                                                        </div>
                                                        <div class="annually-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="123"
                                                                @if ($advertiseplan == 123) checked @endif>
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="118"
                                                                @if ($advertiseplan == 118) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Annually: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 144000
                                                                </span> <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        ₹ 29997
                                                                    </span> </span>
                                                            </div>
                                                            <div class="savings-section"> ₹ 95988 Savings </div>
                                                        </div>
                                                        <div class="section-primary-btn">
                                                            <button
                                                                class="btn btn-p-pricing
                                btn-outline-main">
                                                                Buy Now </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card card-pricing">
                                                    <h2>Master Category</h2>
                                                    <div class="pricing-mob-form-section">
                                                        <div class="starting-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="119"
                                                                @if ($advertiseplan == 119) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Monthly: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 39999
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="middle-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="120"
                                                                @if ($advertiseplan == 120) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Quarterly: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 90000
                                                                </span> <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        ₹ 119997
                                                                    </span> </span>
                                                            </div>
                                                            <div class="savings-section"> ₹ 29997 Savings </div>
                                                        </div>
                                                        <div class="annually-price-section">
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="124"
                                                                @if ($advertiseplan == 124) checked @endif>
                                                            <input class="form-check-input" type="radio"
                                                                name="memberplan" value="121"
                                                                @if ($advertiseplan == 121) checked @endif>
                                                            <label
                                                                class="form-check-label
                                label-main-monthly"
                                                                for="exampleRadios1">Annually: &nbsp; </label>
                                                            <div class="pricing-section-main-strike"> <span
                                                                    class="offerd-price">
                                                                    ₹ 240000
                                                                </span> <span class="strike-through">
                                                                    <span class="strike-text">
                                                                        ₹ 479988
                                                                    </span> </span>
                                                            </div>
                                                            <div class="savings-section"> ₹ 239988 Savings </div>
                                                        </div>
                                                        <div class="section-primary-btn">
                                                            <button
                                                                class="btn btn-p-pricing
                                btn-outline-main">
                                                                Buy Now </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Add Pagination -->
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12
                  col-lg-12 col-xl-12">
                                    <div id="table-scroll" class="table-scroll">
                                        <div class="table-wrap">
                                            <table class="main-table">
                                                <thead> </thead>
                                                <tbody>
                                                    <tr class="table-heading">
                                                        <th class="fixed-side2">Benefits You Get</th>
                                                        <td>Free Listing </td>
                                                        <td><a href="#">Super Saver </a></td>
                                                        <td>Sub Category</td>
                                                        <td>Master Category</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Get Priority over other
                                                            <br /> business listings under
                                                        </th>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Get Instant Update over
                                                            <br /> Phone, Email and SMS
                                                        </th>
                                                        <td>
                                                            <div class="image-tick">
                                                                <!-- <img src="./assets/img/tick.svg" alt="tick"> -->
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Make your business
                                                            <br /> discoverable with
                                                            <br>detailed business
                                                            <br /> information
                                                        </th>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Add your brand images
                                                            <br> to Increase your visibility
                                                            <br />and business enquiries
                                                        </th>
                                                        <td>
                                                            <div class="image-tick">
                                                                <!-- <img src="./assets/img/tick.svg" alt="tick"> -->
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Boost on Search by
                                                            <br />Category, Location
                                                            <br />& Investment
                                                        </th>
                                                        <td>
                                                            <div class="image-tick">
                                                                <!-- <img src="./assets/img/tick.svg" alt="tick"> -->
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Showcase your logo
                                                            <br /> with company listing
                                                        </th>
                                                        <td>
                                                            <div class="image-tick">
                                                                <!-- <img src="./assets/img/tick.svg" alt="tick"> -->
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Get access to
                                                            <br />“My Account” dashboard
                                                            <br />to track views and
                                                            <br />responses instantly
                                                        </th>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Thousands of Investors
                                                            <br /> Can View Your Profile
                                                        </th>
                                                        <td>
                                                            <div class="image-tick"> Only Premium
                                                                <br />Investors
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Local, National And
                                                            <br />International Exposure
                                                        </th>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Generating more and
                                                            <br />better business inquiries
                                                        </th>
                                                        <td>
                                                            <div class="image-tick">
                                                                <!-- <img src="./assets/img/tick.svg" alt="tick"> -->
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> <img
                                                                    src="{{ url('newhomepage/assets/img/tick.svg') }}"
                                                                    alt="tick"> </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="fixed-side">Visibility & Reach</th>
                                                        <td>
                                                            <div class="image-tick">
                                                                <!-- <img src="./assets/img/tick.svg" alt="tick"> -->
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> 40% </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> 75% </div>
                                                        </td>
                                                        <td>
                                                            <div class="image-tick"> 100% </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="payment-main">
                                        <p>Payment Terms: 100% Advance Payment with 18% GST</p>
                                    </div>
                                    <!--frm Start here  -->
                                    <div class="row setpad">
                                        <div class="form-group">
                                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"><span
                                                    class="mandatory">Layout Option</span><br><span
                                                    class="note">(Kindly upload images for the selected layout <br>from
                                                    your dashboard (Appearance section))</span></label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="row checkmarginnew">
                                                    <div class="col-sm-12 row-no-padding optlink">
                                                        <label class="col-sm-12 col-md-12">
                                                            <input type="radio" name="layout_type" value="1"
                                                                checked data-toggle="modal"
                                                                data-target="#layoutoption1" /> Basic Layout &nbsp
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#layoutoption1"> ( View Example )</a>
                                                        </label>
                                                        <label class="col-sm-12 col-md-12">
                                                            <input type="radio" name="layout_type" value="2"
                                                                data-toggle="modal" data-target="#layoutoption2" />
                                                            Sliding Layout &nbsp
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#layoutoption2"> ( View Example )</a>
                                                        </label>
                                                        <label class="col-sm-12 col-md-12">
                                                            <input type="radio" name="layout_type" value="3"
                                                                data-toggle="modal" data-target="#layoutoption3" />
                                                            Gallery Layout &nbsp
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#layoutoption3"> ( View Example )</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                        <div class="modal fade lg-panel formsection" id="layoutoption1" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body option">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"> <span
                                                                aria-hidden="true">&times;</span></button>
                                                        <img src="{{ url('images/layoutoption1.jpg') }}"
                                                            alt="layout1" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                        <!---->
                                        <div class="modal fade lg-panel formsection" id="layoutoption2" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body option">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"> <span
                                                                aria-hidden="true">&times;</span></button>
                                                        <img src="{{ url('images/layoutoption2.jpg') }}"
                                                            alt="layout2" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                        <!---->
                                        <div class="modal fade lg-panel formsection" id="layoutoption3" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body option">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <img src="{{ url('images/layoutoption3.jpg') }}"
                                                            alt="layout3" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="border-topborder"></div>
                                        <div class="form-group">
                                            <label class="col-xs-12  col-sm-4 com4mod control-label">Upload Company Logo
                                                (Max 2MB)</label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/upload.png') }}"
                                                            alt="image upload" /></span>
                                                    <input type="file" name="company_logo" class="form-control"
                                                        id="company_logo" placeholder="Upload your Company Logo"
                                                        required>
                                                </div>
                                                <div style="display: none; color: red;" id="company_logo_msg">Please
                                                    select a valid image (jpg / gif / png)</div>
                                                <div style="display: none; color: red;" id="company_logo_msg_size">
                                                    Please select a image of size(Less than 2MB)</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12  col-sm-4 com4mod control-label">Video Link </label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/video-link.png') }}"
                                                            alt="video link" /></span>
                                                    <input type="text" class="form-control" name="video_link"
                                                        id="video_link" placeholder="Enter Your Video link">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">GST
                                                NO.</label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="{{ url('images/commission.png') }}"
                                                            alt="gst no."></span>
                                                    <input type="text" name="gst_no" class="form-control"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="amount_to_pay" class="form-control"
                                            id="amount" value="">
                                        <div class="form-group marTopnew">
                                            <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"></label>
                                            <div class="col-sm-1 com1mod padtop20 hidden-xs"></div>
                                            <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                                <div class="row checkmargin">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                        <label class="col-xs-12 col-sm-12 col-md-12"> <input
                                                                type="checkbox" checked name="newsletter_sub"
                                                                value="1"> Yes, I want to subscribe for weekly
                                                            Newsletter </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row colbg">
                                            <center>
                                                <input type="submit" id="franchisorsubmit" class=" btn-mainfrm"
                                                    value="Submit" />
                                            </center>
                                        </div>
                                    </div>
                            </form>
                            <!--frm end here  -->
                        </div>
                    </div>
                </section>
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
            $('.hide-div').hide();
            $('#myCarouselvideo').carousel({
                pause: true,
                interval: false
            });
        });
    </script>
</body>

</html>
