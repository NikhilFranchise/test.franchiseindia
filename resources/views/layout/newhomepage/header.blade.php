@php

    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
    $loginUrl = 'https://www.franchiseindia.com/loginform';
    $loginName = 'Login';
    $class = '';
    $regName = 'Register';
    $regUrl = '#';
    $modelWindow = "data-toggle=modal data-target=#login-pnl";
    $barndStick = 0;
    $googleSearchTop = 0;
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if(request()->segment(1) === 'brands' || (request()->segment(1) === 'hi' && request()->segment(2) === 'brands'))
        $barndStick = 1;
    $eduUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = "Logo.svg";
    $menuicon = "menu-icon.png";
    $logoClass = "logo";
    $mainUrl = "";
    $webtitleUrl = request()->segment(1);
    $mangecls = "";
    if ($webtitleUrl == 'content')
        $dotUrlSelected = 'class=dropactive';
    if ($webtitleUrl == 'education') {
        $eduUrlSelected = 'class=dropactive';
        $logo = "education-logo-black.svg";
        $menuicon = "menu-iconei.png";
        $logoClass = "logo wiei";
        $mainUrl = "education";
        $mangecls = "wiei";
    }
    if ($webtitleUrl == 'wellness') {
        $wellUrlSelected = 'class=dropactive';
        $logo = "wellness-logo-black.svg";
        $menuicon = "menu-iconwi.png";
        $logoClass = "logo wiei";
        $mainUrl = "wellness";
        $mangecls = "wiei";
    }
@endphp
@if(request()->segment(1) == 'hi')
    <header class="header" id="header">
      <!--<div class="topmost">
            <marquee>
Franchise India 2022, 18<sup>th</sup> International Franchise and Retail Show <a href="https://www.franchiseindia.com/expo/?id=dotcom" target="_blank">Book your ticket</a>   
</marquee>
<a id="myclose">x</a>
        </div>-->
        <div class="topbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-30 d-flex">
                            <div class="p-2">
                                <ul class="top-navigation">
                                    <li>
                                        <a href="https://www.licenseindia.com/" target="_blank">ब्रांड लाइसेंस खरीदें</a>
                                    </li>
                                    <li>
                                        <a href="https://www.businessex.com/" target="_blank">अपना बिजनेस बेचें</a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"
                                           data-toggle="modal"
                                           data-target="#expandFranchisenew">फ्रैंचाइज़ का विस्तार करें</a>
                                    </li>

                                    <li>
                                        <a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">विज्ञापन दें</a>
                                    </li>

                                    <li>
                                        <a href="https://www.restaurantindia.in/" target="_blank">रेस्टोरेंट इंडिया</a>
                                    </li>
    <li>
                                        <a href="https://www.franchiseindia.com/property-loan/" target="_blank">संपत्ती के बदले कर्ज </a>
                                    </li>                                 

                                </ul>
                            </div>

                            @notmobile
                            @if($__env->yieldContent('hindiUrl'))

                                <div class="p-2 ml-auto">
                                    <div class="input-group
                                          input-group-custom">
                                          <span class="input-group-addon
                                             input-group-prepend-custom"
                                                id="basic-addon1">
                                             <img
                                                     src="{{url('newhomepage/assets/img/language-icon.svg')}}"
                                                     alt="language-icon">
                                          </span>
                                        <div class="form-group form-group-sm">
                                            <select class="form-control
                                                form-control-custom-main"
                                                    id="language-changer">
                                                <option hidden>Language</option>
                                                <option value="@yield('englishUrl')" @if($engUrl == Request::url()) selected @endif>EN - English</option>
                                                <option value="@yield('hindiUrl')" @if($hindiUrl == Request::url()) selected @endif>HI - Hindi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endnotmobile
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="header-btm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex p-30">
                            <div class="p-2">
                                <div id="sidebarCollapse"
                                     class="menu-bar">
                                    <img src="{{url('newhomepage/assets/img/menu-icon.svg')}}"
                                         alt="menu-icon" />
                                    <span>मेन्यू</span>
                                </div>
                            </div>


 <div class="logo"> <a href="{{url('')}}"><img
    src="{{url('newhomepage/assets/img/Logo.svg')}}" alt="@yield('seoTitle','Franchise India - Business Opportunities, Franchise Opportunities')" title="@yield('seoTitle','Franchise India - Business Opportunities, Franchise Opportunities')"></a>

                            </div>

                            <div class="d-flex">
                                <!-- <span
                                id="search" class="search show
                                   slide-right"> -->
                                <span class="search" id="search">
                                          <div class="p-2" data-toggle="modal"
                                               data-target="#search-main">
                                             <img src="{{url('newhomepage/assets/img/Search.svg')}}"
                                                  alt="Search"><span>सर्च</span>
                            </div>
                            </span>
                                <span class="login-text-right text-right
                                          d-main">
                                          <span>
                                             <img src="{{url('newhomepage/assets/img/Login.svg')}}" alt="Franchiseindia Logo"/>
                                             
                                          </span>
                                          <ul class="login-main-section">
                                           @if (Auth::check())
                                                  <li><a href="{{url('investor/myaccount/dashboard')}}">मेरा खाता</a></li>
                                                  <li><a href="{{url('logoutprofile')}}"> लॉग आउट</a></li>
                                              @endif
                                              @if (!Auth::check())
                                                  <li><a href="#"
                                                         data-toggle="modal"
                                                         data-target="#login-pnl"
                                                         id="mobilereg">रजिस्टर</a></li>
                                                  <li><a href="#" data-toggle="modal"
                                                         data-target="#login-pnl"
                                                         id="loginselect">लॉगिन</a></li>
                                              @endif
                                       </ul>
                                       </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@else
    <header class="header" id="header">
            <!--<div class="topmost">
            <marquee>
Franchise India 2022, 18<sup>th</sup> International Franchise and Retail Show <a href="https://www.franchiseindia.com/expo/?id=dotcom" target="_blank">Book your ticket</a>   
</marquee>
<a id="myclose">x</a>
        </div>-->
        <div class="topbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-30 d-flex">
                            <div class="p-2">
                                <ul class="top-navigation">
                                    <li>
                                        <a href="https://www.licenseindia.com/" target="_blank"> Buy a Brand  License</a>
                                    </li>
                                    <li>
                                        <a href="https://www.businessex.com/" target="_blank">Sell your Business</a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"
                                           data-toggle="modal"
                                           data-target="#expandFranchisenew"
                                        >Expand Your Franchise</a>
                                    </li>

                                    <li>
                                        <a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">Advertise</a>
                                    </li>

                                    <li>
                                        <a href="https://www.restaurantindia.in/" target="_blank">Restaurant India</a>
                                    </li>
<li>
                                        <a href="https://www.franchiseindia.com/property-loan/" target="_blank">Loan Against Property </a>
                                    </li>

                                </ul>
                            </div>
                            @notmobile

                            @if($__env->yieldContent('hindiUrl'))
                                <div class="p-2 ml-auto">
                                    <div class="input-group
                                          input-group-custom">
                                          <span class="input-group-addon
                                             input-group-prepend-custom"
                                                id="basic-addon1">
                                             <img
                                                     src="{{url('newhomepage/assets/img/language-icon.svg')}}"
                                                     alt="language-icon">
                                          </span>
                                        <div class="form-group form-group-sm">
                                            <select class="form-control
                                                form-control-custom-main"
                                                    id="language-changer">
                                                <option hidden>Language</option>
                                                <option value="@yield('englishUrl')" @if($engUrl == Request::url()) selected @endif>EN - English</option>
                                                <option value="@yield('hindiUrl')" @if($hindiUrl == Request::url()) selected @endif>HI - Hindi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endnotmobile
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="header-btm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex p-30">
                            <div class="p-2">
                                <div id="sidebarCollapse"
                                     class="menu-bar">
                                    <img src="{{url('newhomepage/assets/img/menu-icon.svg')}}"
                                         alt="menu-icon" />
                                    <span>Menu</span>
                                </div>
                            </div>

                             <div class="logo"> <a href="{{url('')}}"><img
                                src="{{url('newhomepage/assets/img/Logo.svg')}}" alt="@yield('seoTitle','Franchise India - Business Opportunities, Franchise Opportunities')" title="@yield('seoTitle','Franchise India - Business Opportunities, Franchise Opportunities')"></a>

                            </div>

                            <div class="d-flex">
                                <!-- <span
                                id="search" class="search show
                                   slide-right"> -->
                                <span class="search" id="search">
                                          <div class="p-2" data-toggle="modal"
                                               data-target="#search-main">
                                             <img src="{{url('newhomepage/assets/img/Search.svg')}}"
                                                  alt="Search"><span>Search</span>
                            </div>
                            </span>
                                <span class="login-text-right text-right
                                          d-main">
                                          <span>
                                             <img src="{{url('newhomepage/assets/img/Login.svg')}}"
                                             alt="Login" />
                                          </span>
                                          <ul class="login-main-section">
                                           @if (Auth::check())
                                                  <li><a href="{{url('investor/myaccount/dashboard')}}">My Account</a></li>
                                                  <li><a href="{{url('logoutprofile')}}"> Logout</a></li>
                                              @endif
                                              @if (!Auth::check())
                                                  <li><a href="#"
                                                         data-toggle="modal"
                                                         data-target="#login-pnl"
                                                         id="mobilereg">Register</a></li>
                                                  <li><a href="#" data-toggle="modal"
                                                         data-target="#login-pnl"
                                                         id="loginselect">Login</a></li>
                                              @endif
                                       </ul>
                                       </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endif
