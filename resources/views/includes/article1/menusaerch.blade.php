<!-- ======= Header ======= -->
@php
    $hindiUrl = url('/hi/newcontent');
    $engUrl = url('/newcontent');
@endphp
@php
use Illuminate\Support\Str;
@endphp
@php

    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
    $loginUrl = Config('constants.MainDomain') . '/loginform';
    $loginName = 'Login';
    $class = '';
    $regName = 'Register';
    $regUrl = '#';
    $modelWindow = 'data-toggle=modal data-target=#login-pnl';
    $barndStick = 0;
    $googleSearchTop = 0;
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (request()->segment(1) === 'brands' || (request()->segment(1) === 'hi' && request()->segment(2) === 'brands')) {
        $barndStick = 1;
    }
    $eduUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = 'logo-black.svg';
    $menuicon = 'menu-icon.png';
    $logoClass = 'logo';
    $mainUrl = '';
    $webtitleUrl = request()->segment(1);
    $mangecls = '';
    if ($webtitleUrl == 'content') {
        $dotUrlSelected = 'class=dropactive';
    }
    if ($webtitleUrl == 'education') {
        $eduUrlSelected = 'class=dropactive';
        $logo = 'education-logo-black.svg';
        $menuicon = 'menu-iconei.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'education';
        $mangecls = 'wiei';
    }
    if ($webtitleUrl == 'wellness') {
        $wellUrlSelected = 'class=dropactive';
        $logo = 'wellness-logo-black.svg';
        $menuicon = 'menu-iconwi.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'wellness';
        $mangecls = 'wiei';
    }
@endphp

<!-- Modal -->


<header id="header" class="fixed-top">
    <div class="topmenu">
        <div class="container">
            <div class="topright">
                <ul class="togl" id="Display-none">
                    <li {{ Request::segment(1) == 'hi' ? '' : 'class=active' }}><a href="{{ $engUrl }}">English</a>
                    </li>
                    <li {{ Request::segment(1) == 'hi' ? 'class=active' : '' }}><a href="{{ $hindiUrl }}">Hindi</a>
                    </li>
                </ul>


            </div>
        </div>
    </div>
    @if (request()->segment(1) == 'hi')
        <div class="modal fade lg-panel formsection in" id="login-pnl" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                        <div class="frgt-pwd" id="frg-pnl" style="display:none">
                            <div class="ttl">पासवर्ड भूल गए</div>
                            <div class="desc">
                                अपना ईमेल पता दर्ज करें जो आपके साथ जुड़ा हो
                                फ्रेंचाइजी खाता और हम आपको एक लिंक भेजेंगे
                                अपना पासवर्ड रीसेट करने के लिए।
                            </div>
                            <div class="frm-pnl">
                                <form class="form-horizontal" method="POST"
                                    action="{{ Config('constants.MainDomain') }}/password/email">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input id="email" type="email"
                                            class="form-control
                               blur" name="email"
                                            placeholder="ईमेल-आईडी दर्ज करें" value="" required="">
                                    </div>
                                    <button type="submit"
                                        class="btn btn-default btn-gry
                            btn-prop">पासवर्ड
                                        रीसेट</button> <span class="pipe">|</span> <a class="frg-link" href="#"
                                        onclick="lg_panel()">लॉग इन</a>
                                </form>
                            </div>
                        </div>
                        <div id="lg-pnl" style="display:block">
                            <ul class="nav nav-tabs" role="tablist">
                                <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                                        data-toggle="tab" id="loginactive">लॉग इन</a></li>
                                <li id="registeractiveopen" class="active"><a href="#register" aria-controls="register"
                                        role="tab" data-toggle="tab" id="registeractive"
                                        aria-expanded="true">रजिस्टर</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane" id="login">
                                    <form method="post" action="{{ Config('constants.MainDomain') }}/loginform">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="frm-pnl">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <div class="usersprite"></div>
                                                </span>
                                                <input type="email"
                                                    class="form-control
                                     blur"
                                                    required="" name="email" placeholder="ईमेल-आईडी दर्ज करें">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <div class="pwdsprite"></div>
                                                </span>
                                                <input type="password" required="" name="password"
                                                    class="form-control blur" placeholder="पासवर्ड दर्ज करें">
                                            </div>
                                            <button type="submit"
                                                class="btn btn-default
                                  btn-gry btn-prop">साइन
                                                इन </button>
                                            <span class="pipe">|</span> <a class="frg-link" href="#"
                                                onClick="frg_panel()">पासवर्ड भूल गए</a>
                                        </div>
                                    </form>
                                    <div class="popfi">
                                        <div class="signpop"></div>
                                        <div class="popleft">
                                            <span>या साइन इन करें</span>
                                            <ul class="socl">

                                                <li><a href="{{ Config('constants.MainDomain') }}/auth/google"><img
                                                            src="{{ url('newhomepage/assets/img/google.svg') }}"
                                                            alt="google" class="" /></a></li>
                                            </ul>
                                        </div>
                                        <div class="popright">नया उपयोगकर्ता <a href="#" id="loginselect1">यहाँ
                                                क्लिक करें</a></div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane active" id="register">
                                    <form class="form-horizontal" id="registration">
                                        <div class="frm-pnl">
                                            <div style="text-align:center">
                                                <div><a href="{{ Config('constants.MainDomain') }}/investor/create"
                                                        class="btn btn-large btn-default
                                     btn-gry btn-prop">
                                                        व्यापार की शुरुआत
                                                        आज <br /><span>(इन्वेस्टर
                                                            पंजीकरण) </span> </a>
                                                </div>
                                                <br>
                                                <div><a href="{{ Config('constants.MainDomain') }}/franchisor/registration/step/1"
                                                        class="btn btn-large btn-default
                                     btn-gry btn-prop">चैनल
                                                        पार्टनर नियुक्त करें <br /><span> (फ्रेंचाइज़र पंजीकरण)
                                                        </span></a>
                                                </div>
                                                <br>
                                                <div><a target="_blank"
                                                        href="{{ Config('constants.MainDomain') }}/property-loan"
                                                        class="btn btn- large
                                     btn-default btn-gry btn-prop">संपत्ति
                                                        के खिलाफ ऋण </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="popfi regspace">
                                        <div class="signpop"></div>
                                        पंजीकृत उपयोगकर्ता <a href="#" id="registerselect1">यहां लॉगिन करें</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-ttl">मुझे पंजीकरण क्यों करना चाहिए?</div>
                        <div class="footer-desc">
                            <p>10000+ से अधिक मताधिकार व्यापार करने के लिए पहुँच प्राप्त करने के लिए
                                अवसर।
                            </p>
                            <p>बढ़ते व्यापार समुदाय के साथ नेटवर्क प्राप्त करने के लिए
                                विशेषज्ञ हस्तक्षेप आपको विकसित करने के लिए सीखने देने के लिए
                                तथा फ़्रेंचाइज़िंग के साथ अपने व्यवसाय का विस्तार करें।
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade lg-panel formsection in" id="login-pnl" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                        <div class="frgt-pwd" id="frg-pnl" style="display:none">
                            <div class="ttl">Forgot Password</div>
                            <div class="desc">
                                Enter your email address associated with your
                                Franchiseindia account and we'll send you a link
                                to reset your password.
                            </div>
                            <div class="frm-pnl">
                                <form class="form-horizontal" method="POST"
                                    action="{{ Config('constants.MainDomain') }}/password/email">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input id="email" type="email"
                                            class="form-control
                               blur" name="email"
                                            placeholder="Enter Email-Id" value="" required="">
                                    </div>
                                    <button type="submit"
                                        class="btn btn-default btn-gry
                            btn-prop">Reset
                                        Password</button> <span class="pipe">|</span> <a class="frg-link"
                                        href="#" onclick="lg_panel()">Login</a>
                                </form>
                            </div>
                        </div>
                        <div id="lg-pnl" style="display:block">
                            <ul class="nav nav-tabs" role="tablist">
                                <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab"
                                        data-toggle="tab" id="loginactive">LOGIN</a></li>
                                <li id="registeractiveopen" class="active"><a href="#register"
                                        aria-controls="register" role="tab" data-toggle="tab"
                                        id="registeractive" aria-expanded="true">REGISTER</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane" id="login">
                                    <form method="post" action="{{ Config('constants.MainDomain') }}/loginform">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="frm-pnl">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <div class="usersprite"></div>
                                                </span>
                                                <input type="email"
                                                    class="form-control
                                     blur"
                                                    required="" name="email" placeholder="Enter Your User ID">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <div class="pwdsprite"></div>
                                                </span>
                                                <input type="password" required="" name="password"
                                                    class="form-control blur" placeholder="Enter Your Password">
                                            </div>
                                            <button type="submit"
                                                class="btn btn-default
                                  btn-gry btn-prop">SIGN
                                                IN</button>
                                            <span class="pipe">|</span> <a class="frg-link" href="#"
                                                onClick="frg_panel()">Forgot
                                                Password</a>
                                        </div>
                                    </form>
                                    <div class="popfi">
                                        <div class="signpop"></div>
                                        <div class="popleft">
                                            <span>or Sign in With</span>
                                            <ul class="socl">

                                                <li><a href="{{ Config('constants.MainDomain') }}/auth/google"><img
                                                            src="{{ url('newhomepage/assets/img/google.svg') }}"
                                                            alt="google" class="" /></a></li>
                                            </ul>
                                        </div>
                                        <div class="popright">New User <a href="#" id="loginselect1">Click
                                                here</a></div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane active" id="register">
                                    <form class="form-horizontal" id="registration">
                                        <div class="frm-pnl">
                                            <div style="text-align:center">
                                                <div><a href="{{ Config('constants.MainDomain') }}/investor/create"
                                                        class="btn btn-large btn-default
                                     btn-gry btn-prop">
                                                        Start A Business
                                                        Today <br /><span>(Investor
                                                            Registration) </span> </a>
                                                </div>
                                                <br>
                                                <div><a href="{{ Config('constants.MainDomain') }}/franchisor/registration/step/1"
                                                        class="btn btn-large btn-default
                                     btn-gry btn-prop">Appoint
                                                        Channel
                                                        Partners <br /><span> (Franchisor
                                                            Registration) </span></a>
                                                </div>
                                                <br>
                                                <div><a target="_blank"
                                                        href="{{ Config('constants.MainDomain') }}/property-loan"
                                                        class="btn btn- large
                                     btn-default btn-gry btn-prop">Loan
                                                        Against Property </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="popfi regspace">
                                        <div class="signpop"></div>
                                        Registered User <a href="#" id="registerselect1">Login here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-ttl">Why should I register?</div>
                        <div class="footer-desc">
                            <p>To get access to over 10000+ Franchise Business
                                Opportunities.
                            </p>
                            <p>Network with the growing Business Community to get
                                expert interventions to let you learn to Grow
                                &amp; Expand your Business with Franchising.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="modal modal-cust fade" id="search-main" tabindex="-1" aria-labelledby="search-mainLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-cust">
            <div class="modal-content modal-content-cust">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body modal-body-search-custom">
                    <div class="searchbox">
                        <form method="get" action="{{ url('category/search') }}">
                            <div class="input-group
                                 input-group-search-section-main">
                                <input type="text"
                                    class="form-control
                                    form-control-search-custom"
                                    name="text" placeholder="Search for business opportunities"
                                    id="dealer-bar-search-top" aria-describedby="basic-addon2">
                                <span
                                    class="input-group-addon
                                    input-group-addon-search-custom"
                                    id="basic-addon2">
                                    <button
                                        class="btn expbtn btn-group-sm btn-main
                                       bhide-main"
                                        id="seo-search-popup-icon">
                                        <img src="../article/assets/images/icons/searchnew.png">
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="or-cat">
                        <h2 class="exph2">
                            Or Explore By
                        </h2>
                    </div>
                    <ul class="nav nav-tabs custom-nav-tabs">
                        <li><a data-toggle="tab" href="#categories" class="active">Categories</a></li>
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
                                        <div class="col-md-3 m-cent">
                                            <button
                                                class="expbtn2 btn btn-group-sm btn-main
                                 bhide-main bhide"
                                                id="top-cat-seo-btn-main-hero">
                                                Explore
                                            </button>
                                            <span class="clear clear4">
                                                <a href="javascript:void(0)" onclick="catform.reset();">Clear All</a>
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
                                                    <select
                                                        class="form-control
                                          form-control-search-main-custom"
                                                        id="headercity" name="city">
                                                        <option value="" hidden>Select a City</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 m-cent">
                                            <button
                                                class="expbtn2 btn btn-group-sm btn-main
                                 bhide-main bhide"
                                                id="top-loc-seo-btn-main-hero">
                                                Explore
                                            </button>
                                            <span class="clear clear4">
                                                <a href="javascript:void(0)" onclick="locform.reset();">Clear All</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="investment" class="tab-pane tab-pane-main fade">
                            <form name="invform" class="form-horizontal" method="get"
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
                                                                value="{{ $index }}">{!! $value !!}
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
                                                        <option value="" hidden> Select Max Investment </option>

                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 m-cent">
                                            <button
                                                class="btn expbtn2 btn-group-sm btn-main
                                 bhide-main bhide"
                                                id="top-inv-seo-btn-main-hero">
                                                Explore
                                            </button>
                                            <span class="clear clear4">
                                                <a href="javascript:void(0)" onclick="invform.reset();">Clear All</a>
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
    </div>

    <div class="logobar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 d-flex align-items-center">

                    <!-- Uncomment below if you prefer to use an image logo -->
                    <a href="{{ '/newcontent' }}" class="logo mr-auto"><img
                            src="{{ asset('article/images/logo.svg') }}" alt=""></a>

                    <nav class="nav-menu d-none d-lg-block">
                        <ul>

                            <!--               <li class="active"><a href="#">Home</a></li> -->
                            <li><a
                                    href="{{ Request::segment(1) == 'hi' ? Config('constants.MainDomain') . '/hi/newcontent/छोटे व्यापार/34' : Config('constants.MainDomain') . '/newcontent/small-business' }}">{{ Request::segment(1) == 'hi' ? 'छोटा व्यवसाय' : 'Small Business' }}</a>
                            </li>
                            <li><a
                                    href="{{ Request::segment(1) == 'hi' ? Config('constants.MainDomain') . '/hi/newcontent/स्टार्टअप/21' : Config('constants.MainDomain') . '/newcontent/startup' }}">{{ Request::segment(1) == 'hi' ? 'स्टार्टअप' : 'Startup' }}
                                </a></li>
                            <li><a
                                    href="{{ Request::segment(1) == 'hi' ? Config('constants.MainDomain') . '/hi/newcontent/फ़्रैंचाइजी/63' : Config('constants.MainDomain') . '/newcontent/franchisees' }}">{{ Request::segment(1) == 'hi' ? 'फ़्रैंचाइजी' : 'Franchise' }}
                                </a></li>
                            <li><a
                                    href="{{ Request::segment(1) == 'hi' ? Config('constants.MainDomain') . '/hi/newcontent/इमर्जिंग इंडिया/886' : Config('constants.MainDomain') . '/newcontent/emerging' }}">{{ Request::segment(1) == 'hi' ? 'इमर्जिंग इंडिया' : 'Emerging India' }}
                                </a></li>
                            <li><a
                                    href="{{ Request::segment(1) == 'hi' ? Config('constants.MainDomain') . '/hi/newcontent/रियल एस्टेट/887' : Config('constants.MainDomain') . '/newcontent/real-estate' }}">{{ Request::segment(1) == 'hi' ? 'रियल एस्टेट' : 'Real Estate' }}
                                </a></li>
                            <li><a
                                    href="{{ Request::segment(1) == 'hi' ? url('hi/video-and-podcast') : url('video-and-podcast') }}">
                                    {{ Request::segment(1) == 'hi' ? 'वीडियो और पॉडकास्ट' : 'Video & Podcast' }} </a>
                            </li>

                        </ul>
                    </nav><!-- .nav-menu -->


                    <div class="d-flex">

                        <span class="search" id="search">
                            <div class="p-2" data-toggle="modal" data-target="#search-main">
                                <span class="sr1">
                                    <img src="https://www.franchiseindia.com/newhomepage/assets/img/Search.svg"
                                        alt="Search"></span>

                            </div>
                        </span>
                        <span class="login-text-right d-main">
                            <span class="sr3">
                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/Login.svg"
                                    alt="Login">
                            </span>
                            <ul class="login-main-section sr4">
                                @if (Auth::check())
                                    <li><a href="{{ url('investor/myaccount/dashboard') }}">My Account</a></li>
                                    <li><a href="{{ url('logoutprofile') }}"> Logout</a></li>
                                @endif
                                @if (!Auth::check())
                                    <li><a href="#" data-toggle="modal" data-target="#login-pnl"
                                            id="mobilereg">Register</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#login-pnl"
                                            id="loginselect">Login</a></li>
                                @endif
                            </ul>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        if (screen.width < 767) {
            $(document).ready(function() {
                setTimeout(function() {
                    $("#searchblk").slideUp(800);
                    $('#clickhidebtn').show();
                    $('#clickshowbtn').hide();
                }, 3000);
                $("#clickhidebtn").click(function() {
                    $("#searchblk").slideDown("slow");
                    $('#clickhidebtn').hide();
                    $('#clickshowbtn').show();
                });
                $("#clickshowbtn").click(function() {
                    $("#searchblk").slideUp("slow");
                    $('#clickhidebtn').show();
                    $('#clickshowbtn').hide();
                });
            });
        }
        $('#registerselect').click(function() {
            $('#registeractive').click();
        });
        $('#loginselect').click(function() {
            $('#loginactive').click();
        });
        $('#mobilereg').click(function() {
            $('#registeractive').click();
        });
        $("#changeLang").on('click', function() {
            $('#langType').slideToggle();
        })
        $('#registerselect1').click(function() {
            $('#login').addClass("active");
            $('#register').removeClass("active");
            $('#loginactiveopen').addClass("active");
            $('#registeractiveopen').removeClass("active");
        });
        $('#loginselect1').click(function() {
            $('#login').removeClass("active");
            $('#register').addClass("active");
            $('#loginactiveopen').removeClass("active");
            $('#registeractiveopen').addClass("active");
        });

        function selectMax(selectmaxheaderval) {
            let amountConfigArr = {
                "1": "Rs. 10000",
                "3": "Rs. 50000",
                "5": "Rs. 2lac",
                "7": "Rs. 5lac",
                "9": "Rs. 10lac",
                "11": "Rs. 20lac",
                "13": "Rs. 30lac",
                "15": "Rs. 50lac",
                "17": "Rs. 1 Cr.",
                "19": "Rs. 2 Cr.",
                "21": "Rs. 5 Cr."
            };
            let maxAmount = $('#maxAmount');
            let getSlugAmount = {
                "1": {
                    "min": "10000",
                    "max": "50000"
                },
                "3": {
                    "min": "50000",
                    "max": "200000"
                },
                "5": {
                    "min": "200000",
                    "max": "500000"
                },
                "7": {
                    "min": "500000",
                    "max": "1000000"
                },
                "9": {
                    "min": "1000000",
                    "max": "2000000"
                },
                "11": {
                    "min": "2000000",
                    "max": "3000000"
                },
                "13": {
                    "min": "3000000",
                    "max": "5000000"
                },
                "15": {
                    "min": "5000000",
                    "max": "10000000"
                },
                "17": {
                    "min": "10000000",
                    "max": "20000000"
                },
                "19": {
                    "min": "20000000",
                    "max": "50000000"
                },
                "21": {
                    "min": "50000000",
                    "max": "100000000"
                }
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

        function getSubCategoryHeader(value) {
            $.ajax({
                type: 'GET',
                url: '{{ Config('constants.MainDomain') }}/getsubcategory',
                data: {
                    categoryID: value
                },
                success: function(data) {
                    $("#getSubCategoryDataHeader").html(data);
                }
            });
        }

        function getSubCatCategoryHeader(value) {
            $.ajax({
                type: 'GET',
                url: '{{ Config('constants.MainDomain') }}/getsubcatcategory',
                data: {
                    subcategoryID: value
                },
                success: function(data) {
                    $("#getSubCatCategoryDataHeader").html(data);
                }
            });
        }

        function getcity(value) {
            $.ajax({
                type: 'GET',
                url: '{{ Config('constants.MainDomain') }}/getcitylist',
                data: {
                    state: value
                },
                success: function(data) {
                    $("#headercity").html(data);
                }
            });
        }

        $(document).ready(function() {
            $('#searchoptnew').click(function() {
                $('.searchblknew').show(400);
                $('.searchspace').hide(400);
            });
            $('#closegsearch').click(function() {
                $('.searchspace').show(400);
                $('.searchblknew').hide(400);
            });
            if (screen.width > 1199 && screen.height <= 768)
                $(".gsc-wrapper").css({
                    "max-height": "340px",
                    "overflow": "auto"
                });
            $('#searchopt').click(function() {
                $('.open').click();
                $('.searchoption').toggle(400);
                return false;
            });
            $('#searchopt2').click(function() {
                $('.searchoption').hide(400);
            });
            $('.dropdown-toggle').click(function() {
                $('.searchoption').hide(400);
            });
        });

        function frg_panel() {
            $("#lg-pnl").hide(), $("#frg-pnl").show()
        }
    </script>

    <script type="text/javascript">
        if (screen.width < 767) {
            $(document).ready(function() {
                setTimeout(function() {
                    $("#searchblk").slideUp(800);
                    $('#clickhidebtn').show();
                    $('#clickshowbtn').hide();
                }, 3000);
                $("#clickhidebtn").click(function() {
                    $("#searchblk").slideDown("slow");
                    $('#clickhidebtn').hide();
                    $('#clickshowbtn').show();
                });
                $("#clickshowbtn").click(function() {
                    $("#searchblk").slideUp("slow");
                    $('#clickhidebtn').show();
                    $('#clickshowbtn').hide();
                });
            });
        }
        $('#registerselect').click(function() {
            $('#registeractive').click();
        });
        $('#loginselect').click(function() {
            $('#loginactive').click();
        });
        $('#mobilereg').click(function() {
            $('#registeractive').click();
        });
        $("#changeLang").on('click', function() {
            $('#langType').slideToggle();
        })
        $('#registerselect1').click(function() {
            $('#login').addClass("active");
            $('#register').removeClass("active");
            $('#loginactiveopen').addClass("active");
            $('#registeractiveopen').removeClass("active");
        });
        $('#loginselect1').click(function() {
            $('#login').removeClass("active");
            $('#register').addClass("active");
            $('#loginactiveopen').removeClass("active");
            $('#registeractiveopen').addClass("active");
        });

        function selectMax(selectmaxheaderval) {
            let amountConfigArr = {!! json_encode(Config('constants.investRangeInWordsSingle')) !!};
            let maxAmount = $('#maxAmount');
            let getSlugAmount = {!! json_encode(Config('constants.InvestRange')) !!};
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

        function getSubCategoryHeader(value) {
            $.ajax({
                type: 'GET',
                url: '{{ url('getsubcategory') }}',
                data: {
                    categoryID: value
                },
                success: function(data) {
                    $("#getSubCategoryDataHeader").html(data);
                }
            });
        }

        function getSubCatCategoryHeader(value) {
            $.ajax({
                type: 'GET',
                url: '{{ url('getsubcatcategory') }}',
                data: {
                    subcategoryID: value
                },
                success: function(data) {
                    $("#getSubCatCategoryDataHeader").html(data);
                }
            });
        }

        function getcity(value) {
            $.ajax({
                type: 'GET',
                url: '{{ url('getcitylist') }}',
                data: {
                    state: value
                },
                success: function(data) {
                    $("#headercity").html(data);
                }
            });
        }

        $(document).ready(function() {
            $('#searchoptnew').click(function() {
                $('.searchblknew').show(400);
                $('.searchspace').hide(400);
            });
            $('#closegsearch').click(function() {
                $('.searchspace').show(400);
                $('.searchblknew').hide(400);
            });
            if (screen.width > 1199 && screen.height <= 768)
                $(".gsc-wrapper").css({
                    "max-height": "340px",
                    "overflow": "auto"
                });
            $('#searchopt').click(function() {
                $('.open').click();
                $('.searchoption').toggle(400);
                return false;
            });
            $('#searchopt2').click(function() {
                $('.searchoption').hide(400);
            });
            $('.dropdown-toggle').click(function() {
                $('.searchoption').hide(400);
            });
        });
    </script>
</header><!-- End Header -->
