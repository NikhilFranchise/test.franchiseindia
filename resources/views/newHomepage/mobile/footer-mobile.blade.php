@php
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
@endphp
<footer class="footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p class="copy-right">Copyright © 2009 - 2024 Franchise India
                    Holdings Ltd.
                </p>
            </div>
            <div class="col-md-7">
                <ul class="fihl-footer-bottom-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="https://www.franchiseindia.com/about" target="_blank">About Us</a></li>
                    <li><a href="https://www.franchiseindia.com/contact" target="_blank">Contact Us</a></li>
                    <li><a href="https://www.franchiseindia.com/feedback" target="_blank">Feedback</a></li>
                    <li><a href="https://www.franchiseindia.com/sitemap/brands">Brands</a></li>
                    <li><a href="https://www.opportunityindia.com/" target="_blank">News</a></li>
                    <li><a href="https://www.franchiseindia.com/testimonials" target="_blank">Testimonials</a>
                    </li>
                    <li><a href="https://www.franchiseindia.com/terms" target="_blank">Terms</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<div class="cookies-section" id="cookie">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <p>By using our site, you acknowledge that you have read and understand our <a
                        href="https://www.franchiseindia.com/terms" target="_blank">terms and conditions.</a> <button
                        class="btn btn-main seta" onclick="return setCookie();">
                        Accept Cookies
                    </button></p>

            </div>
            <div class="col-md-1 text-center">

            </div>
        </div>
    </div>
</div>
{{--  search modal start here  --}}
<div class="modal modal-cust fade in" id="search-main" tabindex="-1" aria-labelledby="search-mainLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-cust">
        <div class="modal-content modal-content-cust"><button type="button" class="close" data-dismiss="modal"
                aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body modal-body-search-custom">
                <div class="searchbox">
                    <form method="get" action="{{ url('category/search') }}">
                        <div class="input-group input-group-search-section-main">
                            <div class="awesomplete"><input type="text"
                                    class="form-control form-control-search-custom" name="text"
                                    placeholder="Search for business opportunities" id="dealer-bar-search-top"
                                    aria-describedby="basic-addon2" autocomplete="off" aria-expanded="false"
                                    aria-owns="awesomplete_list_1" role="combobox">
                                <ul hidden="" role="listbox" id="awesomplete_list_1"></ul><span
                                    class="visually-hidden" role="status" aria-live="assertive" aria-atomic="true">Type
                                    2 or more characters for results.</span>
                            </div><span class="input-group-addon input-group-addon-search-custom"
                                id="basic-addon2"><button class="btn btn-group-sm btn-main bhide-main"
                                    id="seo-search-popup-icon"><svg class="svg-inline--fa fa-search fa-w-16"
                                        aria-hidden="true" data-prefix="fa" data-icon="search" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                        </path>
                                    </svg></button></span>
                        </div>
                    </form>
                </div>
                <div class="or-cat">
                    <h2>Or Explore By</h2>
                </div>
                <ul class="nav nav-tabs custom-nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#categories">Categories</a></li>
                    <li><a data-toggle="tab" href="#location">Location</a></li>
                    <li><a data-toggle="tab" href="#investment">Investment</a></li>
                </ul>
                <div class="tab-content">
                    <div id="categories" class="tab-pane tab-pane-main fade in active">
                        <form name="catform"class="form-horizontal" method="get"
                            action="{{ url('category/searchby') }}" onsubmit="return submitCategory()">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div class="form-group form-group-search-section-li">
                                                <input type="hidden" name="catTab" value="1">
                                                <select name="mc" id="getMainCategoryDataHeader"
                                                    onchange="getSubCategoryHeader(this.value)"
                                                    class="form-control form-control-search-main-custom">
                                                    <option value="" hidden>Select Industry</option>
                                                    @foreach ($catArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                            @if (isset($mc) && $index == $mc) selected @endif>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="sc" id="getSubCategoryDataHeader"
                                                    onchange="getSubCatCategoryHeader(this.value)"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="exampleFormControlSelect1">
                                                    <option value="" hidden>Select Sector</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    name="ssc" id="getSubCatCategoryDataHeader">
                                                    <option value="" hidden>Select Service / Product</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-group-sm btn-main
                                 bhide-main bhide"
                                            id="top-cat-seo-btn-main-hero">
                                            Explore
                                        </button>
                                        <span class="clear">
                                            {{-- <a href="javascript:void(0)" onclick="catform.reset();">Clear All</a> --}}
                                            <a href="#" role="button"
                                                onclick="event.preventDefault(); catform.reset();">
                                                Clear All
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="location" class="tab-pane tab-pane-main fade">
                        <form name="locform" class="form-horizontal" method="get"
                            action="{{ url('category/searchby') }}" onsubmit="return submitLocation()">
                            <input type="hidden" name="locTab" value="1">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    name="mc" id="getMainCategoryDataHeaderLoc"
                                                    required="required">
                                                    <option value="" hidden>Select Industry</option>
                                                    @foreach ($catArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                            @if (isset($mc) && $index == $mc) selected @endif>
                                                            {{ $value }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    name="loc" id="stateHeader" required
                                                    onchange="getcity(this.value)">
                                                    <option value="" hidden>Select State</option>
                                                    @foreach ($states as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ strtolower(Str::slug($value)) }}"
                                                            @if (isset($loc[0]) && $loc[0] == $index) selected @endif>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="headercity" name="city">
                                                    <option value="" hidden>Select a City</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-group-sm btn-main
                                 bhide-main bhide"
                                            id="top-loc-seo-btn-main-hero">
                                            Explore
                                        </button>
                                        <span class="clear">
                                            {{-- <a href="javascript:void(0)" onclick="locform.reset();">Clear All</a> --}}
                                            <a href="#" role="button"
                                                onclick="event.preventDefault(); locform.reset();">
                                                Clear All
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="investment" class="tab-pane tab-pane-main fade">
                        <form name="invform" id="invform_desktop" class="form-horizontal" method="get"
                            action="{{ url('category/searchby') }}" onsubmit="return submitInvestment()">
                            <input type="hidden" name="invTab" value="1">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="mc" id="getMainCategoryDataHeaderInv"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    required="required">
                                                    <option value="" hidden>Select Industry</option>
                                                    @foreach ($catArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                            @if (isset($mc) && $index == $mc) selected @endif>
                                                            {!! $value !!}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="min_cost"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="minAmount" required="required"
                                                    onchange="selectMax(this.value)">
                                                    <option hidden>Select Min Investment</option>
                                                    @foreach (Config('constants.investRangeInWordsSingle') as $index => $value)
                                                        <option
                                                            slug="{{ Config('constants.InvestRange')[$index]['min'] }}"
                                                            @if (isset($minCost)) @if ($minCost == $index) selected @endif
                                                            @endif
                                                            value="{{ $index }}">{{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="max_cost"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="maxAmount" required="required">
                                                    <option value="0"> Select Max Investment </option>

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-group-sm btn-main
                                 bhide-main bhide"
                                            id="top-inv-seo-btn-main-hero">
                                            Explore
                                        </button>
                                        <span class="clear">
                                            <a href="#" role="button"
                                                onclick="event.preventDefault(); customResetForm();">
                                                Clear All
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  search modal end here --}}
{{-- login popup modal start here  --}}
@if (request()->segment(1) == 'hi')
    <div class="modal fade lg-panel formsection" id="login-pnl" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>

                    <!-- Nav tabs -->
                    <div class="frgt-pwd" id="frg-pnl" style="display:none;">
                        <div class="ttl singlehindi">पासवर्ड भूल गए</div>
                        <div class="desc singlehindi">
                            अपने फ्रेंचाइजीडिया खाते से जुड़े अपना ईमेल पता दर्ज करें और हम आपको एक लिंक भेजेंगे अपना
                            पासवर्ड रीसेट करने के लिए।
                        </div>
                        <div class="frm-pnl">
                            <form class="form-horizontal" method="POST"
                                action="{{ Config('constants.MainDomain') }}/password/email">
                                <input type ="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <div class="usersprite"></div>
                                    </span>

                                    <input id="email" type="email" class="form-control" name="email"
                                        placeholder="Enter Email-Id" value="" required>
                                </div>
                                <button type="submit" class="btn btn-default btn-gry btn-prop">पासवर्ड रीसेट</button>
                                <span class="pipe">|</span> <a class="frg-link" href="#"
                                    onclick="lg_panel()">लॉगिन </a>
                            </form>

                        </div>
                    </div>
                    <div id="lg-pnl" style="display:block;">
                        <ul class="nav nav-tabs" role="tablist">
                            <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                                    data-toggle="tab" id="loginactive">लॉगिन </a></li>
                            <li id="registeractiveopen"><a href="#register" aria-controls="register" role="tab"
                                    data-toggle="tab" id="registeractive">रजिस्टर </a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="login">
                                <form method="post" action="{{ Config('constants.MainDomain') }}/loginform">
                                    @csrf
                                    <div class="frm-pnl">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <div class="usersprite"></div>
                                            </span>
                                            <input type="text" class="form-control blur" name="email_or_mobile"
                                                id="email_or_mobile" placeholder="ईमेल-आईडी या मोबाइल नंबर दर्ज करें"
                                                onkeyup="checkInputType()">

                                            <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider"
                                                style="display:none">एडिट</span>
                                            <span class="vrfy" onclick="validateLoginMobileOTP()" id="get_otp_btn"
                                                style="display:none">ओटीपी भेजें</span>
                                        </div>
                                        <div style="display:none; color:red;" id="mismatch-mob"
                                            class="login-pnl-error">
                                            यह मोबाइल नंबर
                                            पंजीकृत नहीं है|</div>

                                        <div class="input-group" id="password_group">
                                            <span class="input-group-addon">
                                                <div class="pwdsprite"></div>
                                            </span>
                                            <input type="password" name="password" class="form-control blur"
                                                placeholder="पासवर्ड दर्ज करें">

                                        </div>
                                        <div class="input-group" id="otp-block-wider"
                                            style="display: none;width:100%;">
                                            <input type="text" name="otp" id="otp-insta-wider" maxlength="4"
                                                class="form-control blur" placeholder="ओटीपी दर्ज करें">

                                            <span class="vrfy" id="resend_otp" onclick="resendOTP()"
                                                style="display:none">ओटीपी पुनः भेजें</span>
                                            <span class="vrfy" id="otp_timer"></span>
                                        </div>
                                        <button type="submit" id="sign_in_btn"
                                            class="btn btn-default btn-gry btn-prop">साइन
                                            इन </button>
                                        <span class="pipe">|</span> <a class="frg-link" href="#"
                                            onClick="frg_panel()">पासवर्ड भूल गए</a>
                                    </div>
                                </form>

                                <div class="popfi">
                                    <div class="signpop"></div>
                                    <div class="popleft">
                                        <span>या सोशल मीडिया के साथ साइन इन करें</span>
                                        <ul class="socl">
                                            {{-- <li><a href="{{ Config('constants.MainDomain') }}/auth/facebook"><i
                                                class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li> --}}
                                            <li><a href="{{ Config('constants.MainDomain') }}/auth/google"><i
                                                        aria-hidden="true"></i>
                                                    <img src="https://www.franchiseindia.com/newhomepage/assets/img/google.svg"
                                                        alt="google" class="">
                                                </a></li>

                                        </ul>
                                    </div>
                                    <div class='popright'>नया उपयोगकर्ता <a href="#" id="loginselect1">यहां
                                            क्लिक
                                            करे</a></div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="register">
                                <form class="form-horizontal" id="registration">
                                    <div class="frm-pnl">
                                        <div style="text-align:center">
                                            <div><a href="https://www.franchiseindia.com/investor/create"
                                                    class="btn btn-large btn-default btn-gry btn-prop"> व्यापार की
                                                    शुरुआत
                                                    आज <br /><span>(इन्वेस्टर
                                                        पंजीकरण) </span> </a></div><br>
                                            <div><a href="https://www.franchiseindia.com/franchisor/registration/step/1"
                                                    class="btn btn-large btn-default btn-gry btn-prop">चैनल
                                                    पार्टनर नियुक्त करें <br /><span> (फ्रेंचाइज़र पंजीकरण)
                                                    </span></a></div><br>
                                            <div><a href="https://www.franchiseindia.com/franchisor/international-registration"
                                                    class="btn btn-large btn-default btn-gry btn-prop">चैनल पार्टनर
                                                    नियुक्त करें
                                                    <br><span>(अंतर्राष्ट्रीय फ्रेंचाइज़र पंजीकरण)</span></a></div><br>
                                            <div><a target="_blank"
                                                    href="https://www.franchiseindia.com/property-loan"
                                                    class="btn btn- large btn-default btn-gry btn-prop">संपत्ति
                                                    के खिलाफ ऋण</a></div>
                                        </div>
                                    </div>
                                </form>
                                <div class="popfi regspace">
                                    <div class="signpop"></div>Registered User<a href="#"
                                        id="registerselect1">Login here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="footer-ttl singlehindi">मुझे पंजीकरण क्यों करना चाहिए?</div>
                    <div class="footer-desc singlehindi">
                        <p>10000 से अधिक फ़्रैंचाइज़ी व्यापार अवसरों तक पहुंच प्राप्त करने के लिए।</p>
                        <p>फ्रैंचाइजींग के साथ अपने व्यवसाय को बढ़ाना और विस्तार करना सीखने के लिए विशेषज्ञ हस्तक्षेप
                            प्राप्त करने के लिए बढ़ते व्यापार समुदाय के साथ नेटवर्क।</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="modal fade lg-panel formsection" id="login-pnl" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>

                    <!-- Nav tabs -->
                    <div class="frgt-pwd" id="frg-pnl" style="display:none;">
                        <div class="ttl">Forgot Password</div>
                        <div class="desc">
                            Enter your email address associated with your Franchiseindia account and we will send you a
                            link
                            to reset your password.
                        </div>
                        <div class="frm-pnl">
                            <form class="form-horizontal" method="POST"
                                action="{{ Config('constants.MainDomain') }}/password/email">
                                @csrf
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <div class="usersprite"></div>
                                    </span>

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input id="email" type="email" class="form-control" name="email"
                                        placeholder="Enter Email-Id" value="" required>
                                </div>
                                <button type="submit" class="btn btn-default btn-gry btn-prop">Reset
                                    Password</button> <span class="pipe">|</span> <a class="frg-link"
                                    href="#" onClick="lg_panel()">Login</a>
                            </form>

                        </div>
                    </div>
                    <div id="lg-pnl" style="display:block;">
                        <ul class="nav nav-tabs" role="tablist">
                            <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                                    data-toggle="tab" id="loginactive">LOGIN</a></li>
                            <li id="registeractiveopen"><a href="#register" aria-controls="register" role="tab"
                                    data-toggle="tab" id="registeractive">REGISTER</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="login">
                                <form method="post" action="{{ Config('constants.MainDomain') }}/loginform">
                                    @csrf
                                    <div class="frm-pnl">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <div class="usersprite"></div>
                                            </span>

                                            <input type="text" class="form-control blur" required=""
                                                name="email_or_mobile" id="email_or_mobile"
                                                placeholder="Enter Your User ID or Mobile Number"
                                                onkeyup="checkInputType()">

                                            <span class="vrfy" onclick="editMobileWider()" id="edit-mobile-wider"
                                                style="display:none">Edit</span>
                                            <span class="vrfy" onclick="validateLoginMobileOTP()" id="get_otp_btn"
                                                style="display:none">Get OTP</span>
                                        </div>
                                        <div style="display:none; color:red;" id="mismatch-mob"
                                            class="login-pnl-error">This mobile number
                                            is not registered.</div>
                                        <div class="input-group" id="password_group">
                                            <span class="input-group-addon">
                                                <div class="pwdsprite"></div>
                                            </span>
                                            <input type="password" name="password" class="form-control blur"
                                                placeholder="Enter Your Password">
                                        </div>

                                        <div class="input-group" id="otp-block-wider"
                                            style="display: none;width:100%;">
                                            <input type="text" name="otp" id="otp-insta-wider" maxlength="4"
                                                class="form-control blur" placeholder="Enter OTP"
                                                style="width:100%;">
                                            <span class="vrfy" id="resend_otp" onclick="resendOTP()"
                                                style="display:none">Resend
                                                OTP</span>
                                            <span class="vrfy" id="otp_timer"></span>
                                        </div>

                                        <button type="submit" id="sign_in_btn"
                                            class="btn btn-default btn-gry btn-prop">SIGN IN</button>
                                        <span class="pipe">|</span> <a class="frg-link" href="#"
                                            onClick="frg_panel()">Forgot
                                            Password</a>
                                    </div>
                                    <div class="popfi">
                                        <div class="signpop"></div>
                                        <div class="popleft">
                                            <span>or Sign in With</span>
                                            <ul class="socl">
                                                {{-- <li><a href="{{ Config('constants.MainDomain') }}/auth/facebook"><i
                                                class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li> --}}
                                                <li><a href="{{ Config('constants.MainDomain') }}/auth/google"><i
                                                            aria-hidden="true"></i>
                                                        <img src="https://www.franchiseindia.com/newhomepage/assets/img/google.svg"
                                                            alt="google" class="">
                                                    </a></li>
                                                {{-- <li><a href="{{Config('constants.MainDomain')}}/auth/linkedin"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a></li> --}}
                                            </ul>
                                        </div>
                                        <div class='popright'>New User <a href="#" id="loginselect1">Click
                                                here</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="register">
                                <form class="form-horizontal" id="registration">
                                    <div class="frm-pnl">
                                        <div style="text-align:center">
                                            <div><a href="https://www.franchiseindia.com/investor/create"
                                                    class="btn btn-large btn-default btn-gry btn-prop">Start A Business
                                                    Today<br><span>(Investor Registration)</span></a></div><br>
                                            <div><a href="https://www.franchiseindia.com/franchisor/registration/step/1"
                                                    class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel
                                                    Partners<br><span>(Franchisor Registration)</span></a></div><br>
                                            <div><a href="https://www.franchiseindia.com/franchisor/international-registration"
                                                    class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel
                                                    Partners<br><span>(International Franchisor Registration)</span></a>
                                            </div><br>
                                            <div><a target="_blank"
                                                    href="https://www.franchiseindia.com/property-loan"
                                                    class="btn btn- large btn-default btn-gry btn-prop">Loan Against
                                                    Property</a></div>
                                        </div>
                                    </div>
                                </form>
                                <div class="popfi regspace">
                                    <div class="signpop"></div>Registered User<a href="#"
                                        id="registerselect1">Login here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="footer-ttl">Why should I register?</div>
                    <div class="footer-desc">
                        <p>To get access to over 20000+ Franchise Business Opportunities.</p>
                        <p>Network with the growing Business Community to get expert interventions to let you learn to
                            Grow
                            & Expand your Business with Franchising.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- login popup modal end here  --}}
{{--  dashobards of mobile frnachisor or investor start here  --}}
    @if (request()->segment(1) == 'hi')
        @if (Auth::check())
            @if (Auth::user()->profile_type == config('constants.ProfileType.Investor'))
                <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                        <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                    src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span>
                        </div>
                        <div class="welmy">स्वागत हे
                            <span class="username">{{ Auth::user()->name }}</span>
                            <a href="/logoutprofile"><span class="btn btn-default myacout btn-logout">लॉग आउट</span></a>
                        </div>
                        <div class="myline"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <div class="upgrade-section">
                            <a href="/investor/myaccount/payment" class=" sidebtn">खाते का उन्नयन </a>
                            <div class="myline"></div>
                            <div class="parblk">
                                <div class="per">आपने पूरा किया <span>{{ Cookie::get('invPercentage') }}%</span>
                                    प्रोफ़ाइल</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        aria-valuenow="{{ Cookie::get('invPercentage') }}" aria-valuemin="0"
                                        aria-valuemax="100" style="width:{{ Cookie::get('invPercentage') }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="myline marbtm"></div>
                            <ul class="nvss">
                                <li>
                                    <div><span class="icon-spc"><img alt="dashboard"
                                                src="https://www.franchiseindia.com/images/dashboard.png"></span><span
                                            class="fl"><a href="/investor/myaccount/dashboard">डैशबोर्ड</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="view profile"
                                                src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a
                                                href="/investor/myaccount/viewprofile">प्रोफाइल देखिये</a></span></div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="response"
                                                src="https://www.franchiseindia.com/images/response.png"></span><span><a
                                                href="/investor/myaccount/expressed-interest">रुचि व्यक्त की</a></span>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav__list">
                                <input id="group-7" type="checkbox" hidden="" checked="checked">
                                <label for="group-7" class="myperp"> <img alt="manage profiles"
                                        src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc">
                                    <p class="manetxt">प्रोफ़ाइल प्रबंधित करें</p> <span class="fa fa-angle-down"></span>
                                </label>
                                <ul class="nvss group-list pafdd">
                                    <li class="selected"><a href="/investor/myaccount/personaldetails">व्यक्तिगत विवरण</a>
                                    </li>
                                    <li><a href="/investor/myaccount/investmentdetails">निवेश का विवरण</a></li>
                                    <li><a href="/investor/myaccount/propertydetails">संपत्ति ब्यौरा</a></li>
                                    <li><a href="/investor/myaccount/businessdetails">पेशेवर विवरण</a></li>
                                    <li><a href="/investor/myaccount/payment">भुगतान</a></li>
                                </ul>
                            </div>
                            <ul class="nvss mymenu">
                                <li>
                                    <div><span class="icon-spc"><img alt="response manager"
                                                src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a
                                                href="/investor/myaccount/responsemanager">प्रतिक्रिया प्रबंधक</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="advertise with us"
                                                src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a
                                                href="/investor/myaccount/advertisewithus">हमारे साथ विज्ञापन</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="change password"
                                                src="https://www.franchiseindia.com/images/change-password.png"></span><span><a
                                                href="/investor/myaccount/changepassword">पासवर्ड बदलें</a></span></div>
                                </li>
                            </ul>
                            <div class="myline"></div>
                            <a href="/investor/myaccount/feedback" class="sidebtn">प्रतिपुष्टि</a>
                        </div>
                    </div>
                </nav>
            @endif
            @if (Auth::user()->profile_type == config('constants.ProfileType.Franchisor'))
                <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                        <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                    src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span>
                        </div>
                        <div class="welmy">स्वागत हे
                            <span class="username">{{ session()->get('name') }}</span>
                            <a href="{{ Config('constants.MainDomain') }}/logoutprofile"><span
                                    class="btn btn-default myacout btn-logout">लॉग आउट</span></a>
                        </div>

                        <div class="myline"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <div class="upgrade-section">
                            @if (Auth::user()->membership_plan < 405)
                                <a href="{{ Config('constants.MainDomain') }}/franchisor/myaccount/payment-plan"
                                    class=" sidebtn">खाते का उन्नयन </a>
                            @endif

                            <div class="myline"></div>

                            <div class="parblk">
                                <div class="per">आपने पूरा किया <span>{{ Cookie::get('franPercentage') }}%</span>
                                    प्रोफ़ाइल</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        aria-valuenow="{{ Cookie::get('franPercentage') }}" aria-valuemin="0"
                                        aria-valuemax="100" style="width:{{ Cookie::get('franPercentage') }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="myline marbtm"></div>
                            <ul class="nvss">
                                <li>
                                    <div><span class="icon-spc"><img alt="dashboard"
                                                src="https://www.franchiseindia.com/images/dashboard.png"></span><span
                                            class="fl"><a href="/investor/myaccount/dashboard">डैशबोर्ड</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="view profile"
                                                src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a
                                                href="/investor/myaccount/viewprofile">प्रोफाइल देखिये</a></span></div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="response"
                                                src="https://www.franchiseindia.com/images/response.png"></span><span><a
                                                href="/investor/myaccount/expressed-interest">रुचि व्यक्त की</a></span>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav__list">
                                <input id="group-7" type="checkbox" hidden="" checked="checked">
                                <label for="group-7" class="myperp"> <img alt="manage profiles"
                                        src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc">
                                    <p class="manetxt">प्रोफ़ाइल प्रबंधित करें</p> <span class="fa fa-angle-down"></span>
                                </label>
                                <ul class="nvss group-list pafdd">
                                    <li class="selected"><a href="/franchisor/myaccount/personaldetails">व्यक्तिगत
                                            विवरण</a></li>
                                    <li><a href="/franchisor/myaccount/investmentdetails">निवेश का विवरण</a></li>
                                    <li><a href="/franchisor/myaccount/propertydetails">संपत्ति ब्यौरा</a></li>
                                    <li><a href="/franchisor/myaccount/businessdetails">पेशेवर विवरण</a></li>
                                    <li><a href="/franchisor/myaccount/payment">भुगतान</a></li>
                                </ul>
                            </div>
                            <ul class="nvss mymenu">
                                <li>
                                    <div><span class="icon-spc"><img alt="response manager"
                                                src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a
                                                href="/franchisor/myaccount/responsemanager">प्रतिक्रिया प्रबंधक</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="advertise with us"
                                                src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a
                                                href="/franchisor/myaccount/advertisewithus">हमारे साथ विज्ञापन</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="change password"
                                                src="https://www.franchiseindia.com/images/change-password.png"></span><span><a
                                                href="/franchisor/myaccount/changepassword">पासवर्ड बदलें</a></span></div>
                                </li>
                            </ul>
                            <div class="myline"></div>
                            <a href="/franchisor/myaccount/feedback" class="sidebtn">Feedback</a>
                        </div>
                    </div>
                </nav>
            @endif
        @endif
    @else
        @if (Auth::check())
            @if (Auth::user()->profile_type == config('constants.ProfileType.Investor'))
                <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                        <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                    src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span>
                        </div>
                        <div class="welmy">Welcome
                            <span class="username">{{ Auth::user()->name }}</span>
                            <a href="/logoutprofile"><span class="btn btn-default myacout btn-logout">Logout</span></a>
                        </div>
                        <div class="myline"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <div class="upgrade-section">
                            <a href="/investor/myaccount/payment" class=" sidebtn">Upgrade Account </a>
                            <div class="myline"></div>
                            <div class="parblk">
                                <div class="per">You completed <span>{{ Cookie::get('invPercentage') }}%</span> Profile
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        aria-valuenow="{{ Cookie::get('invPercentage') }}" aria-valuemin="0"
                                        aria-valuemax="100" style="width:{{ Cookie::get('invPercentage') }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="myline marbtm"></div>
                            <ul class="nvss">
                                <li>
                                    <div><span class="icon-spc"><img alt="dashboard"
                                                src="https://www.franchiseindia.com/images/dashboard.png"></span><span
                                            class="fl"><a href="/investor/myaccount/dashboard">Dashboards</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="view profile"
                                                src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a
                                                href="/investor/myaccount/viewprofile">View Profile</a></span></div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="response"
                                                src="https://www.franchiseindia.com/images/response.png"></span><span><a
                                                href="/investor/myaccount/expressed-interest">Expressed Interest</a></span>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav__list">
                                <input id="group-7" type="checkbox" hidden="" checked="checked">
                                <label for="group-7" class="myperp"> <img alt="manage profiles"
                                        src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc">
                                    <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span>
                                </label>
                                <ul class="nvss group-list pafdd">
                                    <li class="selected"><a href="/investor/myaccount/personaldetails">Personal
                                            Details</a></li>
                                    <li><a href="/investor/myaccount/investmentdetails">Investment Details</a></li>
                                    <li><a href="/investor/myaccount/propertydetails">Property Details</a></li>
                                    <li><a href="/investor/myaccount/businessdetails">Professional Details</a></li>
                                    <li><a href="/investor/myaccount/payment">Payment</a></li>
                                </ul>
                            </div>
                            <ul class="nvss mymenu">
                                <li>
                                    <div><span class="icon-spc"><img alt="response manager"
                                                src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a
                                                href="/investor/myaccount/responsemanager">Response Manager</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="advertise with us"
                                                src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a
                                                href="/investor/myaccount/advertisewithus">Advertise With us</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="change password"
                                                src="https://www.franchiseindia.com/images/change-password.png"></span><span><a
                                                href="/investor/myaccount/changepassword">Change Password</a></span></div>
                                </li>
                            </ul>
                            <div class="myline"></div>
                            <a href="/investor/myaccount/feedback" class="sidebtn">Feedback</a>
                        </div>
                    </div>
                </nav>
            @endif
            @if (Auth::user()->profile_type == config('constants.ProfileType.Franchisor'))
                <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                        <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                    src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span>
                        </div>
                        <div class="welmy">Welcome
                            <span class="username">{{ session()->get('name') }}</span>
                            <a href="{{ Config('constants.MainDomain') }}/logoutprofile"><span
                                    class="btn btn-default myacout btn-logout">Logout</span></a>
                        </div>

                        <div class="myline"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <div class="upgrade-section">
                            @if (Auth::user()->membership_plan < 405)
                                <a href="{{ Config('constants.MainDomain') }}/franchisor/myaccount/payment-plan"
                                    class=" sidebtn">Upgrade Account </a>
                            @endif

                            <div class="myline"></div>

                            <div class="parblk">
                                <div class="per">You completed <span>{{ Cookie::get('franPercentage') }}%</span>
                                    Profile
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        aria-valuenow="{{ Cookie::get('franPercentage') }}" aria-valuemin="0"
                                        aria-valuemax="100" style="width:{{ Cookie::get('franPercentage') }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="myline marbtm"></div>
                            <ul class="nvss">
                                <li>
                                    <div><span class="icon-spc"><img alt="dashboard"
                                                src="https://www.franchiseindia.com/images/dashboard.png"></span><span
                                            class="fl"><a href="/investor/myaccount/dashboard">Dashboards</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="view profile"
                                                src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a
                                                href="/investor/myaccount/viewprofile">View Profile</a></span></div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="response"
                                                src="https://www.franchiseindia.com/images/response.png"></span><span><a
                                                href="/investor/myaccount/expressed-interest">Expressed Interest</a></span>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav__list">
                                <input id="group-7" type="checkbox" hidden="" checked="checked">
                                <label for="group-7" class="myperp"> <img alt="manage profiles"
                                        src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc">
                                    <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span>
                                </label>
                                <ul class="nvss group-list pafdd">
                                    <li class="selected"><a href="/investor/myaccount/personaldetails">Personal
                                            Details</a>
                                    </li>
                                    <li><a href="/investor/myaccount/investmentdetails">Investment Details</a></li>
                                    <li><a href="/investor/myaccount/propertydetails">Property Details</a></li>
                                    <li><a href="/investor/myaccount/businessdetails">Professional Details</a></li>
                                    <li><a href="/investor/myaccount/payment">Payment</a></li>
                                </ul>
                            </div>
                            <ul class="nvss mymenu">
                                <li>
                                    <div><span class="icon-spc"><img alt="response manager"
                                                src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a
                                                href="/investor/myaccount/responsemanager">Response Manager</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="advertise with us"
                                                src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a
                                                href="/investor/myaccount/advertisewithus">Advertise With us</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="change password"
                                                src="https://www.franchiseindia.com/images/change-password.png"></span><span><a
                                                href="/investor/myaccount/changepassword">Change Password</a></span></div>
                                </li>
                            </ul>
                            <div class="myline"></div>
                            <a href="/investor/myaccount/feedback" class="sidebtn">Feedback</a>
                        </div>
                    </div>
                </nav>
            @endif
        @endif
    @endif
{{--  dashobards of mobile frnachisor or investor  end here --}}


<script src="{{ url('cwv-mobile/js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ url('cwv-mobile/js/custom.js') }}"></script>
<script src="https://www.franchiseindia.com/newhomepage/assets/vendor/popper/js/popper.min.js"></script>
<script  src="https://www.franchiseindia.com/newhomepage/assets/vendor/mCustomScrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>

<script  src="https://www.franchiseindia.com/newhomepage/assets/vendor/bootstrap/js/bootstrap.min.js" defer></script>


<!-- Font Awesome JS -->
<script defer src="https://www.franchiseindia.com/newhomepage/assets/vendor/fontawesome/js/solid.js"></script>
<script defer src="https://www.franchiseindia.com/newhomepage/assets/vendor/fontawesome/js/fontawesome.js"></script>

<script>
function setCookie(){document.cookie="accept_cookie=ok",$("#cookie").hide();const e=new Date;e.setTime(e.getTime()+6048e5);let t="expires="+e.toUTCString();console.log(t),document.cookie="username=cookie_user;"+t+";path=/"}function getCookie(){return checkCookie("accept_cookie")}function checkCookie(e){for(var t=e+"=",a=document.cookie.split(";"),i=0;i<a.length;i++){for(var o=a[i];" "==o.charAt(0);)o=o.substring(1);if(0==o.indexOf(t))return o.substring(t.length,o.length)}return""}var otpInterval;function checkInputType(){var e=$("#email_or_mobile").val();validateEmail(e)?($("#password_group").show(),$("#get_otp_btn").hide(),$("#sign_in_btn").prop("disabled",!1)):validateMobile(e)?($("#password_group").hide(),$("#get_otp_btn").show(),$("#sign_in_btn").prop("disabled",!0)):($("#password_group").show(),$("#get_otp_btn").hide(),$("#sign_in_btn").prop("disabled",!1))}function validateEmail(e){return/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e)}function validateMobile(e){return/^\d{10}$/.test(e)}function validateLoginMobileOTP(){var e=$("#email_or_mobile").val();$.ajax({type:"get",url:"/login_verify_mobile",data:{mobile:e},success:function(e){0==e.data?($("#mismatch-mob").show(),$("#email_or_mobile").prop("readonly",!0),$("#sign_in_btn").prop("disabled",!0),$("#edit-mobile-wider").show(),$("#otp-block-wider").hide(),$("#get_otp_btn").hide()):($("#email_or_mobile").prop("readonly",!0),$("#mismatch-mob").hide(),$("#sign_in_btn").prop("disabled",!1),$("#edit-mobile-wider").show(),$("#otp-block-wider").show(),$("#get_otp_btn").hide(),startOTPTimer())}})}function editMobileWider(){$("#email_or_mobile").prop("readonly",!1),$("#edit-mobile-wider").hide(),$("#mismatch-mob").hide(),$("#otp-block-wider").hide(),$("#sign_in_btn").prop("disabled",!0),clearInterval(otpInterval),$("#otp_timer").hide(),$("#resend_otp").hide()}function startOTPTimer(){var e=60;$("#resend_otp").hide(),$("#otp_timer").show(),otpInterval=setInterval((function(){e>0?(e--,$("#otp_timer").text(e+"sec")):(clearInterval(otpInterval),$("#otp_timer").hide(),$("#resend_otp").show(),$("#sign_in_btn").prop("disabled",!0))}),1e3)}function resendOTP(){clearInterval(otpInterval);$("#email_or_mobile").val();startOTPTimer(),validateLoginMobileOTP()}$(document).ready((function(){"ok"==getCookie()?$("#cookie").hide():$("#cookie").show()})),$((function(){$("#language-changer").on("change",(function(){var e=$(this).val();return e&&(window.location=e),!1}))})),$(document).ready((function(){$("#sidebar").mCustomScrollbar({theme:"minimal"}),$("#dismiss, .overlay").on("click",(function(){$("#sidebar").removeClass("active"),$(".overlay").removeClass("active")})),$("#sidebarCollapse").on("click",(function(){$("#sidebar").addClass("active"),$(".overlay").addClass("active"),$(".collapse.in").toggleClass("in"),$("a[aria-expanded=true]").attr("aria-expanded","false")}))})),$(document).ready((function(){$("#sidebar-login").mCustomScrollbar({theme:"minimal"}),$("#dismiss-login, .overlay").on("click",(function(){$("#sidebar-login").removeClass("active"),$(".overlay").removeClass("active")})),$("#sidebarCollapse-main-login").on("click",(function(){$("#sidebar-login").addClass("active"),$(".overlay").addClass("active"),$(".collapse.in").toggleClass("in"),$("a[aria-expanded=true]").attr("aria-expanded","false")}))}));var header=$(".header");function selectMax(e){let t=$("#maxAmount"),a={1:{min:"10000",max:"50000"},3:{min:"50000",max:"200000"},5:{min:"200000",max:"500000"},7:{min:"500000",max:"1000000"},9:{min:"1000000",max:"2000000"},11:{min:"2000000",max:"3000000"},13:{min:"3000000",max:"5000000"},15:{min:"5000000",max:"10000000"},17:{min:"10000000",max:"20000000"},19:{min:"20000000",max:"50000000"},21:{min:"50000000",max:"100000000"}};t.html(""),e=parseInt(e),$.each({1:"Rs. 10000",3:"Rs. 50000",5:"Rs. 2lakh",7:"Rs. 5lakh",9:"Rs. 10lakh",11:"Rs. 20lakh",13:"Rs. 30lakh",15:"Rs. 50lakh",17:"Rs. 1 Cr.",19:"Rs. 2 Cr.",21:"Rs. 5 Cr."},(function(t,i){t>e&&$("#maxAmount").append($("<option></option>").attr({value:t,slug:a[t].min}).text(i))})),21===e&&t.append($("<option></option>").attr("value",21).text("Above"))}function getSubCategoryHeader1(e){$.ajax({type:"GET",url:"/getsubcategory",data:{categoryID:e},success:function(e){console.log(e),$("#getSubCategoryDataHeader1").html(e)}})}function getSubCategoryHeader(e){$.ajax({type:"GET",url:"/getsubcategory",data:{categoryID:e},success:function(e){console.log(e),$("#getSubCategoryDataHeader").html(e)}})}function getSubCatCategoryHeader1(e){$.ajax({type:"GET",url:"/getsubcatcategory",data:{subcategoryID:e},success:function(e){$("#getSubCatCategoryDataHeader1").html(e)}})}function getSubCatCategoryHeader(e){$.ajax({type:"GET",url:"/getsubcatcategory",data:{subcategoryID:e},success:function(e){$("#getSubCatCategoryDataHeader").html(e)}})}function getcity1(e){$.ajax({type:"GET",url:"/getcitylist",data:{state:e},success:function(e){$("#headercity1").html(e)}})}function getcity(e){$.ajax({type:"GET",url:"/getcitylist",data:{state:e},success:function(e){$("#headercity").html(e)}})}function selectMax1(e){let t=JSON.parse('{"1":"Rs. 10000","3":"Rs. 50000","5":"Rs. 2lakh","7":"Rs. 5lakh","9":"Rs. 10lakh","11":"Rs. 20lakh","13":"Rs. 30lakh","15":"Rs. 50lakh","17":"Rs. 1 Cr.","19":"Rs. 2 Cr.","21":"Rs. 5 Cr."}'),a=$("#maxAmount2"),i=JSON.parse('{"1":{"min":"10000","max":"50000"},"3":{"min":"50000","max":"200000"},"5":{"min":"200000","max":"500000"},"7":{"min":"500000","max":"1000000"},"9":{"min":"1000000","max":"2000000"},"11":{"min":"2000000","max":"3000000"},"13":{"min":"3000000","max":"5000000"},"15":{"min":"5000000","max":"10000000"},"17":{"min":"10000000","max":"20000000"},"19":{"min":"20000000","max":"50000000"},"21":{"min":"50000000","max":"100000000"}}');a.html(""),e=parseInt(e),$.each(t,(function(t,a){t>e&&$("#maxAmount2").append($("<option></option>").attr({value:t,slug:i[t].min}).text(a))})),21===e&&a.append($("<option></option>").attr("value",21).text("Above"))}function customResetForm(){document.getElementById("invform").reset(),document.getElementById("maxAmount").innerHTML='<option value="" hidden>Select Max Investment</option>'}function customResetForm(){document.getElementById("invform_desktop").reset(),document.getElementById("maxAmount").innerHTML='<option value="" hidden>Select Max Investment</option>'}$(window).scroll((function(e){0!==header.offset().top?header.hasClass("shadow")||header.addClass("shadow"):header.removeClass("shadow")})),screen.width<767&&$(document).ready((function(){setTimeout((function(){$("#searchblk").slideUp(800),$("#clickhidebtn").show(),$("#clickshowbtn").hide()}),3e3),$("#clickhidebtn").click((function(){$("#searchblk").slideDown("slow"),$("#clickhidebtn").hide(),$("#clickshowbtn").show()})),$("#clickshowbtn").click((function(){$("#searchblk").slideUp("slow"),$("#clickhidebtn").show(),$("#clickshowbtn").hide()}))})),$("#registerselect").click((function(){$("#registeractive").click()})),$("#loginselect").click((function(){$("#loginactive").click()})),$("#mobilereg").click((function(){$("#registeractive").click()})),$("#changeLang").on("click",(function(){$("#langType").slideToggle()})),$("#registerselect1").click((function(){$("#login").addClass("active"),$("#register").removeClass("active"),$("#loginactiveopen").addClass("active"),$("#registeractiveopen").removeClass("active")})),$("#loginselect1").click((function(){$("#login").removeClass("active"),$("#register").addClass("active"),$("#loginactiveopen").removeClass("active"),$("#registeractiveopen").addClass("active")})),document.addEventListener("DOMContentLoaded",(function(){var e=document.getElementById("getMainCategoryDataHeader");e.value&&getSubCategoryHeader(e.value)})),$(document).ready((function(){$("#searchoptnew").click((function(){$(".searchblknew").show(400),$(".searchspace").hide(400)})),$("#closegsearch").click((function(){$(".searchspace").show(400),$(".searchblknew").hide(400)})),screen.width>1199&&screen.height<=768&&$(".gsc-wrapper").css({"max-height":"340px",overflow:"auto"}),$("#searchopt").click((function(){return $(".open").click(),$(".searchoption").toggle(400),!1})),$("#searchopt2").click((function(){$(".searchoption").hide(400)})),$(".dropdown-toggle").click((function(){$(".searchoption").hide(400)}))}));
</script>
