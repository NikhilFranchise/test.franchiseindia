@php
    $auth = new \Illuminate\Support\Facades\Auth();
    $catTab = 'active';
    $locTab = '';
    $invTab = '';

    if (isset($catTabResult)) {
        if ($locTabResult != 0 || $invTabResult != 0) {
            $catTab = '';
        }
    }

    if (isset($locTabResult)) {
        if ($locTabResult != 0) {
            $locTab = 'active';
        }
    }

    if (isset($invTabResult)) {
        if ($invTabResult != 0) {
            $invTab = 'active';
        }
    }

    $catArr = Config('hindiConstants.CategoryArr');
    asort($catArr);

    if (isset($mc)) {
        $subCat = Config('hindiConstants.subCategoryArr.' . $mc);
        if (!empty($subCat)) {
            asort($subCat);
        }
    }

    if (isset($mc) && !empty($mc) && !empty($sc)) {
        $subSubcat = Config('hindiConstants.subSubCategoryArr.' . $sc);
        if (!empty($subSubcat)) {
            asort($subSubcat);
        }
    }

    $states = Config('location.stateArr');
    asort($states);

    if (isset($loc)) {
        if (!empty($loc[0])) {
            $cities = Config('location.cityArr.' . $loc[0]);
            asort($cities);
        }
    }

    $loginUrl = Config('constants.MainDomain') . '/loginform';
    $loginName = 'लॉगिन';
    $class = '';
    $regName = 'रजिस्टर';
    $regUrl = '#';
    $modelWindow = 'data-toggle=modal data-target=#login-pnl';
    if ($auth::check()) {
        $loginUrl = Config('constants.MainDomain') . '/logoutprofile';
        if (request()->user()->profile_type === config('constants.ProfileType.Franchisor')) {
            $regUrl = Config('constants.MainDomain') . '/franchisor/myaccount/dashboard';
        }
        if (request()->user()->profile_type === config('constants.ProfileType.Investor')) {
            $regUrl = Config('constants.MainDomain') . '/investor/myaccount/dashboard';
        }
        $loginName = 'लॉगआउट ';
        $regName = 'मेरा खाता';
        $modelWindow = '';
        $class = 'mybtn';
    }

    $barndStick = 0;
    $googleSearchTop = 0;
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (request()->segment(1) === 'brands' || (request()->segment(1) === 'hi' && request()->segment(2) === 'brands')) {
        $barndStick = 1;
    }

    $eduUrlSelected = '';
    $resUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = 'logo-black.svg';
    $menuicon = 'menu-iconei.png';
    $logoClass = 'logo';
    $mainUrl = '';
    $webtitleUrl = request()->segment(1);

    if ($webtitleUrl == 'content') {
        $dotUrlSelected = 'class=dropactive';
    }

    if ($webtitleUrl == 'education') {
        $eduUrlSelected = 'class=dropactive';
        $logo = 'education-logo-black.svg';
        $menuicon = 'menu-iconei.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'education';
    }

    if ($webtitleUrl == 'restaurant') {
        $resUrlSelected = 'class=dropactive';
        $logo = 'restaurant-logo-black.svg';
        $menuicon = 'menu-icon.png';
        $logoClass = 'logo ri';
        $mainUrl = 'restaurant';
    }

    if ($webtitleUrl == 'wellness') {
        $wellUrlSelected = 'class=dropactive';
        $logo = 'wellness-logo-black.svg';
        $menuicon = 'menu-iconwi.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'wellness';
    }
@endphp
@if ($barndStick === 0)
    <style type="text/css">
        .bothheadnew {
            top: 0 !important;
            position: fixed !important;
            z-index: 4 !important;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            width: 100%;
            animation: slide-down 0.7s;
        }

        @keyframes slide-down {
            0% {
                opacity: 0;
                transform: translateY(-100%);
            }

            100% {
                opacity: 0.9;
                transform: translateY(10);
            }
        }
    </style>
    <script language="javascript">
        if (screen.width > 1199) {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 1)
                    $('#headsticknew').addClass("bothheadnew");
                else
                    $('#headsticknew').removeClass("bothheadnew");
            });
        }
    </script>
@endif



<!-- header code start Here -->
@php

    $catArr = Config('hindiConstants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
    $loginUrl = 'https://www.franchiseindia.com/loginform';
    $loginName = 'लॉगिन';
    $class = '';
    $regName = 'पंजीकृत करें';
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
@mobile
    @include('layout.hindinewhomepage.mobile.header')
@endmobile
@notmobile
    @include('layout.hindinewhomepage.header')
@endnotmobile
<!-- Login/ Registration Model -->
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
                            action="https://www.franchiseindia.com/password/email">
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
                                role="tab" data-toggle="tab" id="registeractive" aria-expanded="true">रजिस्टर</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="login">
                            <form method="post" action="https://www.franchiseindia.com/loginform">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="frm-pnl">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="email"
                                            class="form-control
                                       blur"
                                            required="" name="email" placeholder="अपनी उपयोगकर्ता आईडी दर्ज करें">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="pwdsprite"></div>
                                        </span>
                                        <input type="password" required="" name="password" class="form-control blur"
                                            placeholder="अपना पासवर्ड डालें">
                                    </div>
                                    <button type="submit"
                                        class="btn btn-default
                                    btn-gry btn-prop">साइन
                                        इन</button>
                                    <span class="pipe">|</span> <a class="frg-link" href="#"
                                        onclick="frg_panel()">पासवर्ड भूल गए</a>
                                </div>
                            </form>
                            <div class="popfi">
                                <div class="signpop"></div>
                                <div class="popleft">
                                    <span>या साइन इन</span>
                                    <ul class="socl">
                                        <!-- <li><a
                                                    href="https://www.franchiseindia.com/auth/facebook">
                                                <img src="{{ url('newhomepage/assets/img/facebook-login.svg') }}" class="" alt="facebook login"/></a>
                                        </li>-->
                                        <li><a href="https://www.franchiseindia.com/auth/google"><img
                                                    src="{{ url('newhomepage/assets/img/google.svg') }}"
                                                    alt="google" class="" /></a></li>
                                    </ul>
                                </div>
                                <div class="popright">नया उपयोगकर्ता <a href="#" id="loginselect1">यहाँ क्लिक
                                        करें</a></div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane active" id="register">
                            <form class="form-horizontal" id="registration">
                                <div class="frm-pnl">
                                    <div style="text-align:center">
                                        <div><a href="https://www.franchiseindia.com/investor/create"
                                                class="btn btn-large btn-default
                                       btn-gry btn-prop">
                                                आज एक व्यवसाय शुरू करें<br /><span>(निवेशक पंजीकरण) </span> </a>
                                        </div>
                                        <br>
                                        <div><a href="https://www.franchiseindia.com/franchisor/registration/step/1"
                                                class="btn btn-large btn-default
                                       btn-gry btn-prop">चैनल
                                                पार्टनर नियुक्त करें <br /><span> (फ्रैंचाइज़ी पंजीकरण) </span></a>
                                        </div>
                                        <br>
                                        <div><a target="_blank" href="https://www.franchiseindia.com/property-loan"
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
                    <p> 10000+ से अधिक तक पहुँचने के लिए मताधिकार व्यापार
                        अवसर।
                    </p>
                    <p> प्राप्त करने के लिए बढ़ते व्यावसायिक समुदाय के साथ नेटवर्क
                        विशेषज्ञ हस्तक्षेप आपको विकसित करने के लिए सीखने देने के लिए
                        & फ़्रेंचाइज़िंग के साथ अपने व्यवसाय का विस्तार करें।
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login/ Registration Model End-->

{{-- <div class="modal fade lg-panel formsection" id="login-pnl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"> --}}
{{-- <div class="modal-dialog" role="document"> --}}
{{-- <div class="modal-content"> --}}
{{-- <div class="modal-body"> --}}
{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> --}}
{{-- </button> --}}
{{-- <div class="frgt-pwd" id="frg-pnl" style="display:none"> --}}
{{-- <div class="ttl">Forgot Password</div> --}}
{{-- <div class="desc"> --}}
{{-- Enter your email address associated with your Franchiseindia account and we'll send you a link --}}
{{-- to reset your password. --}}
{{-- </div> --}}
{{-- <div class="frm-pnl"> --}}
{{-- <form class="form-horizontal" method="POST" action="{{Config('constants.MainDomain')}}/password/email"> --}}
{{-- <div class="input-group"> --}}
{{-- <span class="input-group-addon"><div class="usersprite"></div></span> --}}
{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
{{-- <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email-Id" value="" required> --}}
{{-- </div> --}}
{{-- <button type="submit" class="btn btn-default btn-gry btn-prop">Reset Password</button> <span class="pipe">|</span> <a class="frg-link" href="#" onclick="lg_panel()">Login</a> --}}
{{-- </form> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div id="lg-pnl" style="display:block"> --}}
{{-- <ul class="nav nav-tabs" role="tablist"> --}}
{{-- <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab" data-toggle="tab" id="loginactive">LOGIN</a></li> --}}
{{-- <li id="registeractiveopen"><a href="#register" aria-controls="register" role="tab" data-toggle="tab" id="registeractive">REGISTER</a></li> --}}
{{-- </ul> --}}
{{-- <div class="tab-content"> --}}
{{-- <div role="tabpanel" class="tab-pane" id="login"> --}}
{{-- <form method="post" action="{{Config('constants.MainDomain')}}/loginform"> --}}
{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
{{-- <div class="frm-pnl"> --}}
{{-- <div class="input-group"> --}}
{{-- <span class="input-group-addon"><div class="usersprite"></div></span> --}}
{{-- <input type="email" class="form-control" required name="email" placeholder="Enter Your User ID"> --}}
{{-- </div> --}}
{{-- <div class="input-group"> --}}
{{-- <span class="input-group-addon"><div class="pwdsprite"></div></span> --}}
{{-- <input type="password" required name="password" class="form-control" placeholder="Enter Your Password"> --}}
{{-- </div> --}}
{{-- <button type="submit" class="btn btn-default btn-gry btn-prop">SIGN IN</button> --}}
{{-- <span class="pipe">|</span> <a class="frg-link" href="#" onclick="frg_panel()">Forgot --}}
{{-- Password</a> --}}
{{-- </div> --}}
{{-- </form> --}}
{{-- <div class="popfi"> --}}
{{-- <div class="signpop"></div> --}}
{{-- <div class="popleft"> --}}
{{-- <span>or Sign in With</span> --}}
{{-- <ul class="socl"> --}}
{{-- <li><a href="{{Config('constants.MainDomain')}}/auth/facebook"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li> --}}
{{-- <li><a href="{{Config('constants.MainDomain')}}/auth/google"><i class="fa fa-google fa-lg" aria-hidden="true"></i></a></li> --}}
{{-- <li><a href="{{Config('constants.MainDomain')}}/auth/linkedin"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a></li> --}}
{{-- </ul> --}}
{{-- </div> --}}
{{-- <div class='popright'>New User <a href="#" id="loginselect1">Click here</a></div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div role="tabpanel" class="tab-pane" id="register"> --}}
{{-- <form class="form-horizontal" id="registration"> --}}
{{-- <div class="frm-pnl"> --}}
{{-- <div style="text-align:center"> --}}
{{-- <div><a href="{{Config('constants.MainDomain')}}/investor/create" class="btn btn-large btn-default btn-gry btn-prop"> Start A Business Today <span>(Investor Registration) </span> </a></div> --}}
{{-- <br> --}}
{{-- <div><a href="{{Config('constants.MainDomain')}}/franchisor/registration/step/1" class="btn btn-large btn-default btn-gry btn-prop">Appoint Channel Partners <span> (Franchisor Registration) </span></a></div> --}}
{{-- <br/> --}}
{{-- <div><a target="_blank" --}}
{{-- href="{{Config('constants.MainDomain')}}/property-loan" class="btn btn- large btn-default btn-gry btn-prop">Loan Against Property </a></div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </form> --}}
{{-- <div class="popfi regspace"> --}}
{{-- <div class="signpop"></div> --}}
{{-- Registered User <a href="#" id="registerselect1">Login here</a> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="modal-footer"> --}}
{{-- <div class="footer-ttl">Why should I register?</div> --}}
{{-- <div class="footer-desc"> --}}
{{-- <p>To get access to over 10000+ Franchise Business Opportunities.</p> --}}
{{-- <p>Network with the growing Business Community to get expert interventions to let you learn to Grow & Expand your Business with Franchising.</p> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="newheader hindiver" id="headsticknew"> --}}
{{-- <div class="tolfree">हॉटलाइन: 1800 102 2007</div> --}}
{{-- <div class="newstickly"> --}}
{{-- <div class="headerblack {{ request()->segment(1) == 'restaurant' ? 'ri' : '' }}"> --}}
{{-- <div class="container"> --}}
{{-- <div class="navb"><span id="c-button--slide-left"><img src="{{url('images/'. $menuicon)}}" alt="menu icon"></span></div> --}}
{{-- <div class="{{$logoClass}} hi"><a href="{{Config('constants.MainDomain')}}/{{ $mainUrl }}"><img src="{{ url('images/'. $logo) }}" alt="logo"></a></div> --}}
{{-- <div class="headrightblk"> --}}
{{-- <div class="searchfixrightblk"> --}}
{{-- <div class="searchspace"> --}}
{{-- <ul class="headersublink"> --}}
{{-- <li><a href="https://www.businessex.com/" target="_blank"><strong>मौजूदा व्यापार को बेचें / खरीदें</strong></a></li> --}}
{{-- <li>|</li> --}}
{{-- <li><a href="https://www.franchiseindia.com/#expandFranchise"><strong>अपने फ्रैंचाइज़ी का विस्तार करें</strong></a></li> --}}
{{-- <li>|</li> --}}
{{-- <li><a href="https://www.franchiseindia.com/advertise" target="_blank">विज्ञापन दें</a></li> --}}
{{-- <li>|</li> --}}
{{-- <li><a href="https://master.franchiseindia.com/emagazine/" target="_blank">पत्रिका की सदस्यता</a></li> --}}
{{-- </ul> --}}
{{-- </div> --}}
{{-- @notmobile --}}
{{-- @if ($__env->yieldContent('hindiUrl')) --}}
{{-- <!--web site url end here--> --}}
{{-- <div class="mainrighthindi toppa" id="changeLang1"> <div class="rigarthindi">अ / A <i class="fa fa-chevron-down" aria-hidden="true"></i></div> --}}
{{-- <div class="contwid" id="langType1"> --}}
{{-- <div class="linkdrop"><a href="@yield('hindiUrl')">हिंदी</a></div> --}}
{{-- <div class="linkdrop"><a href="@yield('englishUrl')">English</a></div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- @endif --}}
{{-- @endnotmobile --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="imgff ftanimated bouncenew"><a href="http://www.equityindia.com/contact.php" target="_blank"><img src="{{Config('constants.MainDomain')}}/images/equityindia.com.jpg"></a> </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <!--start here --> --}}
{{-- <div class="headerbright"> --}}
{{-- <div class="container"> --}}
{{-- <div class="hotlineblk"> --}}
{{-- <div class="numblknew"><span>हॉटलाइन: </span> 1800 102 2007 </div> --}}
{{-- <div class="numberline"></div> --}}
{{-- <ul class="social"> --}}
{{-- <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i class="fa fa-facebook"></i></a></li> --}}
{{-- <li><a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a></li> --}}
{{-- <li><a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i class="fa fa-linkedin"></i></a></li> --}}
{{-- <li><a href="http://www.youtube.com/user/FranchiseIndia" target="_blank"><i class="fa fa-youtube-play"></i></a></li> --}}
{{-- </ul> --}}
{{-- </div> --}}

{{-- <div class="searchright"> --}}

{{-- <!--advertize and  subcribe end here --> --}}
{{-- <div class="sear" id="searchblk"> --}}
{{-- <div class="simptestloanmob text animated pulse"><a href="{{ url('property-loan') }}">संपत्ति के खिलाफ ऋण</a></div> --}}
{{-- <ul class="nav nav-tabs" role="tablist"> --}}
{{-- <li class="simptest">व्यवसाय के अवसर खोजें</li> --}}
{{-- <li class="{{$catTab}}"><a href="#categories" aria-controls="categories" role="tab" data-toggle="tab">केटेगरी</a></li> --}}
{{-- <li class="{{$locTab}}"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">स्थान</a></li> --}}
{{-- <li class="{{$invTab}}"><a href="#investment" aria-controls="investment" role="tab" data-toggle="tab">निवेश</a></li> --}}
{{-- <li class="simptestloan text animated pulse"><a href="{{ url('property-loan') }}">संपत्ति के खिलाफ ऋण</a></li> --}}
{{-- </ul> --}}
{{-- <!-- Tab panes --> --}}
{{-- <div class="tab-content"> --}}
{{-- <div role="tabpanel" class="tab-pane {{$catTab}}" id="categories"> --}}
{{-- <form class="form-horizontal" method="get" action="{{Config('constants.MainDomain')}}/hi/category/searchby" onsubmit="return submitCategory()"> --}}
{{-- <input type="hidden" name="catTab" value="1"> --}}
{{-- <ul class="searblk"> --}}
{{-- <li> --}}
{{-- <select name="mc" class="form-control myselectclasssearch" id="getMainCategoryDataHeader" required onchange="getSubCategoryHeader(this.value);" > --}}
{{-- <option>उद्योग का चयन करें</option> --}}
{{-- @foreach ($catArr as $index => $value) --}}
{{-- <option value="{{ $index }}" slug="{{Config('category.SeoCategoryArr.'.$index)}}" @if (isset($mc) && $index == $mc) selected @endif>{!! $value !!}</option> --}}
{{-- @endforeach --}}
{{-- </select> --}}
{{-- </li> --}}
{{-- <li> --}}
{{-- <select class="form-control myselectclasssearch" name="sc" id="getSubCategoryDataHeader" onchange="getSubCatCategoryHeader(this.value);" > --}}
{{-- <option value="">क्षेत्र का चयन करें</option> --}}
{{-- @if (!empty($subCat)) --}}
{{-- @foreach ($subCat as $index => $value) --}}
{{-- <option slug="{{Config('category.SeoSubCategoryArr.'.$index)}}" value="{{ $index }}" @if (isset($sc) && $index == $sc) selected @endif>{!! $value !!}</option> --}}
{{-- @endforeach --}}
{{-- @endif --}}
{{-- </select> --}}
{{-- </li> --}}
{{-- <li class="rdi"> --}}
{{-- <select name="ssc" id="getSubCatCategoryDataHeader" class="form-control myselectclasssearch" > --}}
{{-- <option value="">सेवा / उत्पाद का चयन करें</option> --}}
{{-- @if (isset($subSubcat) && isset($ssc)) --}}
{{-- @foreach ($subSubcat as $index => $value) --}}
{{-- <option slug="{{Config('category.SeoSubSubCategoryArr.'.$index)}}" value="{{ $index }}" @if ($index == $ssc) selected @endif>{!! $value !!}</option> --}}
{{-- @endforeach --}}
{{-- @endif --}}
{{-- </select> --}}
{{-- </li> --}}
{{-- <li> --}}
{{-- <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i><span class="searchmhide">Search</span></button> --}}
{{-- </li> --}}
{{-- </ul> --}}
{{-- </form> --}}
{{-- </div> --}}
{{-- <div role="tabpanel" class="tab-pane {{$locTab}}" id="location"> --}}
{{-- <form class="form-horizontal" method="get" action="{{Config('constants.MainDomain')}}/hi/category/searchby" onsubmit="return submitLocation()"> --}}
{{-- <input type="hidden" name="locTab" value="1"> --}}
{{-- <ul class="searblk"> --}}
{{-- <li> --}}
{{-- <select name="mc" id="getMainCategoryDataHeaderLoc" class="form-control myselectclasssearch" > --}}
{{-- <option value="">उद्योग का चयन करें</option> --}}
{{-- @foreach ($catArr as $index => $value) --}}
{{-- <option value="{{ $index }}" slug="{{Config('category.SeoCategoryArr.'.$index)}}" @if (isset($mc) && $index == $mc) selected @endif>{!! $value !!}</option> --}}
{{-- @endforeach --}}
{{-- </select> --}}
{{-- </li> --}}
{{-- <li> --}}
{{-- <select name="loc" id="stateHeader" class="form-control myselectclasssearch" required onchange="getcity(this.value)" > --}}
{{-- <option value="">एक राज्य का चयन करे</option> --}}
{{-- @foreach ($states as $index => $value) --}}
{{-- <option slug="{{strtolower(str_slug($value))}}" value="{{ $index }}" @if (isset($loc[0]) && $loc[0] == $index) selected @endif>{{ Config('location.hindiStatesArr.'.$value) }}</option> --}}
{{-- @endforeach --}}
{{-- </select> --}}
{{-- </li> --}}
{{-- <li class="rdi"> --}}
{{-- <select name="city" class="form-control myselectclasssearch" id="headercity" > --}}
{{-- <option value="">एक शहर का चयन करें</option> --}}
{{-- @if (isset($cities)) --}}
{{-- @foreach ($cities as $value) --}}
{{-- <option  value="{!! $value !!}" @if (!empty($city) && $city == $value) selected @endif>{!! $value !!} </option> --}}
{{-- @endforeach --}}
{{-- @endif --}}
{{-- </select> --}}
{{-- </li> --}}
{{-- <li> --}}
{{-- <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i><span class="searchmhide">Search</span></button> --}}
{{-- </li> --}}
{{-- </ul> --}}
{{-- </form> --}}
{{-- </div> --}}
{{-- <div role="tabpanel" class="tab-pane {{$invTab}}" id="investment"> --}}
{{-- <form class="form-horizontal" method="get" action="{{Config('constants.MainDomain')}}/hi/category/searchby" onsubmit="return submitInvestment()"> --}}
{{-- <input type="hidden" name="invTab" value="1"> --}}
{{-- <ul class="searblk"> --}}
{{-- <li> --}}
{{-- <select name="mc" id="getMainCategoryDataHeaderInv" class="form-control myselectclasssearch" title="mainCat"> --}}
{{-- <option value="">उद्योग का चयन करें</option> --}}
{{-- @foreach ($catArr as $index => $value) --}}
{{-- <option value="{{ $index }}" slug="{{Config('category.SeoCategoryArr.'.$index)}}" @if (isset($mc) && $index == $mc) selected @endif>{!! $value !!}</option> --}}
{{-- @endforeach --}}
{{-- </select> --}}
{{-- </li> --}}
{{-- <li> --}}
{{-- <select name="min_cost" class="form-control myselectclasssearch" id="minAmount" required onchange="selectMax(this.value)" > --}}
{{-- <option value=""> न्यूनतम निवेश का चयन करें </option> --}}
{{-- @foreach (Config('constants.investRangeInWordsSingle') as $index => $value) --}}
{{-- <option slug="{{Config('constants.InvestRange')[$index]['min']}}" @if (isset($minCost)) @if ($minCost == $index) selected @endif @endif value="{{ $index }}">{!! $value !!}</option> --}}
{{-- @endforeach --}}
{{-- </select> --}}
{{-- </li> --}}
{{-- <li class="rdi"> --}}
{{-- <select name="max_cost" class="form-control myselectclasssearch" id="maxAmount" > --}}
{{-- <option value=""> अधिकतम निवेश का चयन करें </option> --}}
{{-- @foreach (Config('constants.investRangeInWordsSingle') as $index => $value) --}}
{{-- <option slug="{{Config('constants.InvestRange')[$index]['min']}}" @if (isset($maxCost)) @if ($maxCost == $index) selected @endif @endif value="{{ $index }}">{{ ($value == 21) ? "above" : $value }}</option> --}}
{{-- @endforeach --}}
{{-- </select> --}}
{{-- </li> --}}
{{-- <li> --}}
{{-- <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i><span class="searchmhide">Search</span></button> --}}
{{-- </li> --}}
{{-- </ul> --}}

{{-- </form> --}}
{{-- </div> --}}
{{-- </div> --}}

{{-- </div> --}}
{{-- <div class="ltrright"> --}}
{{-- <ul class="righlink"> --}}
{{-- <li class="hidemobilemenu"><a href="{{$regUrl}}" {{$modelWindow}} class="btn btn-default {{$class}}" id="registerselect">{{$regName}}</a></li> --}}
{{-- @if ($auth::check()) --}}
{{-- <li class="hidedesktopmenu"><span  id="c-button--slide-right" class="btn btn-default myaccount {{$class}}" >मेरा खाता</span></li> --}}
{{-- <li><a href="{{$loginUrl}}" class="btn btn-default {{$class}}" id="loginselect">{{$loginName}}</a></li> --}}
{{-- @endif --}}
{{-- @if (!$auth::check()) --}}
{{-- <li class="hidedesktopmenu"><a  href="{{$regUrl}}" {{$modelWindow}} class="btn btn-default {{$class}}" id="mobilereg">रजिस्टर</a></li> --}}
{{-- <li><a href="{{$regUrl}}" {{$modelWindow}} class="btn btn-default {{$class}}" id="loginselect">{{$loginName}}</a></li> --}}
{{-- @endif --}}
{{-- </ul> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <!--start here --> --}}
{{-- </div> --}}
{{-- </div> --}}
<!--search start -->

<!-- header code end Here -->
<!-- Login modal Window -->
{{-- <div class="modal fade lg-panel formsection" id="login-pnl" tabindex="-1" role="dialog" --}}
{{-- aria-labelledby="exampleModalLabel"> --}}
{{-- <div class="modal-dialog" role="document"> --}}
{{-- <div class="modal-content"> --}}
{{-- <div class="modal-body"> --}}
{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> --}}
{{-- </button> --}}

{{-- <!-- Nav tabs --> --}}
{{-- <div class="frgt-pwd" id="frg-pnl" style="display:none;"> --}}
{{-- <div class="ttl singlehindi">पासवर्ड भूल गए</div> --}}
{{-- <div class="desc singlehindi"> --}}
{{-- अपने फ्रेंचाइजीडिया खाते से जुड़े अपना ईमेल पता दर्ज करें और हम आपको एक लिंक भेजेंगे अपना पासवर्ड रीसेट करने के लिए। --}}
{{-- </div> --}}
{{-- <div class="frm-pnl"> --}}
{{-- <form class="form-horizontal" method="POST" action="{{Config('constants.MainDomain')}}/password/email"> --}}
{{-- <div class="input-group"> --}}
{{-- <span class="input-group-addon"><div class="usersprite"></div></span> --}}

{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
{{-- <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email-Id" value="" required> --}}
{{-- </div> --}}
{{-- <button type="submit" class="btn btn-default btn-gry btn-prop">पासवर्ड रीसेट</button> --}}
{{-- <span class="pipe">|</span> <a class="frg-link" href="#" onclick="lg_panel()">लॉगिन </a> --}}
{{-- </form> --}}

{{-- </div> --}}
{{-- </div> --}}
{{-- <div id="lg-pnl" style="display:block;"> --}}
{{-- <ul class="nav nav-tabs" role="tablist"> --}}
{{-- <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab" data-toggle="tab" id="loginactive">लॉगिन </a></li> --}}
{{-- <li id="registeractiveopen"><a href="#register" aria-controls="register" role="tab" data-toggle="tab" id="registeractive">रजिस्टर </a></li> --}}
{{-- </ul> --}}
{{-- <!-- Tab panes --> --}}
{{-- <div class="tab-content"> --}}
{{-- <div role="tabpanel" class="tab-pane" id="login"> --}}
{{-- <form method="post" action="{{Config('constants.MainDomain')}}/loginform"> --}}
{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
{{-- <div class="frm-pnl"> --}}
{{-- <div class="input-group"> --}}
{{-- <span class="input-group-addon"><div class="usersprite"></div></span> --}}
{{-- <input type="email" class="form-control" required name="email" placeholder="अपना यूज़र आईडी दर्ज करें"> --}}
{{-- </div> --}}
{{-- <div class="input-group"> --}}
{{-- <span class="input-group-addon"><div class="pwdsprite"></div></span> --}}
{{-- <input type="password" required name="password" class="form-control" placeholder="अपना पासवर्ड डालें"> --}}
{{-- </div> --}}
{{-- <button type="submit" class="btn btn-default btn-gry btn-prop">सिग्न इन </button> --}}
{{-- <span class="pipe">|</span> <a class="frg-link" href="#" onclick="frg_panel()"> फॉरगॉट  पासवर्ड </a> --}}
{{-- </div> --}}
{{-- </form> --}}

{{-- <div class="popfi"> --}}
{{-- <div class="signpop"></div> --}}
{{-- <div class="popleft"> --}}
{{-- <span>या सोशल मीडिया के साथ साइन इन करें</span> --}}
{{-- <ul class="socl"> --}}
{{-- <li><a href="{{Config('constants.MainDomain')}}/auth/facebook"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li> --}}
{{-- <li><a href="{{Config('constants.MainDomain')}}/auth/google"><i class="fa fa-google fa-lg" aria-hidden="true"></i></a></li> --}}
{{-- <li><a href="{{Config('constants.MainDomain')}}/auth/linkedin"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a></li> --}}
{{-- </ul> --}}
{{-- </div> --}}
{{-- <div class='popright'>नया उपयोगकर्ता <a href="#" id="loginselect1">यहां क्लिक करे</a></div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div role="tabpanel" class="tab-pane" id="register"> --}}
{{-- <form class="form-horizontal" id="registration"> --}}
{{-- <div class="frm-pnl"> --}}
{{-- <div style="text-align: center;"> --}}
{{-- <div><a href="{{Config('constants.MainDomain')}}/investor/create" class="btn btn-large btn-default btn-gry btn-prop"> आज एक बिजनेस शुरू करें <span>(निवेशक पंजीकरण) </span> </a></div> --}}
{{-- <br> --}}
{{-- <div><a href="{{Config('constants.MainDomain')}}/franchisor/registration/step/1" class="btn btn-large btn-default btn-gry btn-prop"  >चैनल पार्टनर नियुक्त करें <span> (फ़्रैंचाइज़र पंजीकरण) </span></a></div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </form> --}}
{{-- <div class="popfi regspace"> --}}
{{-- <div class="signpop"></div> --}}
{{-- पंजीकृत उपयोगकर्ता<a href="#" id="registerselect1"> यहां लॉगिन करें --}}
{{-- </a> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="modal-footer"> --}}
{{-- <div class="footer-ttl singlehindi">मुझे पंजीकरण क्यों करना चाहिए?</div> --}}
{{-- <div class="footer-desc singlehindi"> --}}
{{-- <p>10000 से अधिक फ़्रैंचाइज़ी व्यापार अवसरों तक पहुंच प्राप्त करने के लिए।</p> --}}
{{-- <p>फ्रैंचाइजींग के साथ अपने व्यवसाय को बढ़ाना और विस्तार करना सीखने के लिए विशेषज्ञ हस्तक्षेप प्राप्त करने के लिए बढ़ते व्यापार समुदाय के साथ नेटवर्क।</p> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}

<!-- header code end Here -->
@if ($_SERVER['REQUEST_URI'] != '/')
    <div class="banhsow">
        <span id="clickhidebtn" class="hide-cat-search" style="display:none"> Search Business Opportunities <i
                class="fa fa-plus-square-o" aria-hidden="true"></i></span>
        <span id="clickshowbtn" class="show-cat-search">Search Business Opportunities <i class="fa fa-minus-square-o"
                aria-hidden="true"></i></span>
    </div>
    <script language="javascript">
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
    </script>
@endif

<script language="javascript">
    function selectMax(selectmaxheaderval) {
        let amountConfigArr = {!! json_encode(Config('constants.investRangeInWordsSingle')) !!};
        let getSlugAmount = {!! json_encode(Config('constants.InvestRange')) !!};
        let maxAmount = $('#maxAmount');

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

    $(document).ready(function() {
        $('#searchoptnew').click(function() {
            $('.searchblknew').show(400);
            $('.searchspace').hide(400);

            // $('.searchblknew').show("slide", {direction: "right"}, 1000);
            // $('.searchspace').hide("slide", {direction: "right"}, 1000);
        });

        $('#closegsearch').click(function() {
            $('.searchspace').show(400);
            $('.searchblknew').hide(400);
            //$('.searchspace').show("slide", {direction: "right"}, 1000);
            //$('.searchblknew').hide("slide", {direction: "right"}, 1000);
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

    $('#registerselect').click(function() {
        $('#registeractive').click();
    });
    $('#loginselect').click(function() {
        $('#loginactive').click();
    });
    $('#mobilereg').click(function() {
        $('#registeractive').click();
    });

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

    //fetching the subcategories
    function getSubCategoryHeader(value) {
        $.ajax({
            type: 'GET',
            url: '/hindi-get-sub-cat',
            data: {
                categoryID: value
            },
            success: function(data) {
                $("#getSubCategoryDataHeader").html(data);
            }
        });
    }

    //fetching sub-sub categories
    function getSubCatCategoryHeader(value) {
        $.ajax({
            type: 'GET',
            url: '/hindi-get-sub-sub-cat',
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
            url: '/hindi-get-city-list',
            data: {
                state: value
            },
            success: function(data) {
                $("#headercity").html(data);
            }
        });
    }
</script>
