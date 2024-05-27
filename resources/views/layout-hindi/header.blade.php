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
