<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $canonicalUrl = url()->current();
        $queryParams = request()->query();
        $queryString = '';
        $hindiUrl = url('/hi');
        $engUrl = url('/');
        $excludedParams = ['sortby', 'catTab', 'invTab'];

        if (!empty($queryParams)) {
            $queryString = '?';
            foreach ($queryParams as $key => $value) {
                // Skip if the parameter is in the excluded list
                if (in_array($key, $excludedParams)) {
                    continue;
                }
                if (is_null($value)) {
                    $queryString .= $key . '&';
                } else {
                    $queryString .= $key . '=' . urlencode($value) . '&';
                }
                // Remove the trailing '&' and the '?' if no valid query parameters are left
            }
            $queryString = rtrim($queryString, '&');
            if ($queryString === '?') {
                $queryString = '';
            }

            $queryString = rtrim($queryString, '&');
        }
    @endphp
    @section('hindiUrl', $hindiUrl)
    @section('englishUrl', $engUrl)
    <meta charset="UTF-8">
      <meta content="{{ request()->segment(1) == 'hi' ? 'hi-in' : 'en-in' }}" name="language" />
      <title>@if(request()->segment(1) != 'hi')@yield('seoTitle', 'Franchise India - Business Opportunities, Franchise Opportunities')@elseif (request()->segment(1) == 'hi')@yield('seoTitle', 'फ्रैंचाइज़ इंडिया - व्यावसायिक अवसर, फ्रैंचाइज़ अवसर')@endif</title>
      @if (request()->segment(1) == 'hi')<meta name="description" content="@yield('seoDesc', 'फ्रैंचाइज़ इंडिया फ्रैंचाइज़ी के अवसर, व्यापार के अवसर, व्यापारिक विचार, भारत में सबसे अच्छा व्यवसाय प्रदान करता है और सस्ती सीमा के साथ भारत में फ्रैंचाइज़ खरीदता है ।')" />
      <meta name="keywords" itemprop="keywords" content="@yield('seoKeywords', 'भारत में फ्रैंचाइज़, फ्रैंचाइज़ी के अवसर,व्यापार के अवसर, व्यापारिक विचार, भारत में फ्रैंचाइज़ी खरीदें, छोटे व्यवसाय के विचार, फ्रैंचाइज़ भारत')" />
      @else<meta name="description" content="@yield('seoDesc', 'Franchise India provides franchise opportunities, business opportunities, business ideas,best business in India and buy Franchise in India with affordable range.')" />
      <meta name="keywords" itemprop="keywords" content="@yield('seoKeywords', 'franchise in india, franchise opportunities,business opportunities, business ideas, buy franchise in india, small business ideas, franchise india')" />@endif<link href="{{ $canonicalUrl . $queryString }}" rel="canonical">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="https://www.franchiseindia.com/favicon.ico" type="image/x-icon" />
      <meta property="fb:pages" content="118224094883095" />
      <meta property="fb:app_id" content="110294989480112" />
      <meta name="google-site-verification" content="8W9CXigRDmfNyf8vOfkZBefougI9sPXO4xvDBFLIjaw" />
      <meta name="y_key" content="0f4f718975ac23ed" />
      <meta name="msvalidate.01" content="12C27FDAA076F43E6F3763B81B44D01A" />
      <meta content="noindex,nofollow" name="robots" />
    {{-- google codes --}}
    <!-- Google Tag Manager -->
    <script async>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l !== 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NW38FD');
    </script>
    <script async>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KW4K6WV6');</script>
        
    
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8MKFEZLR18"></script>
    <script async>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-8MKFEZLR18');
    </script>

    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-991358906"></script>
    <script async>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-991358906');
    </script> --}}

<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16776470774"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-16776470774');
</script>



    <!-- Facebook Pixel Code -->
    <script async>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
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
            s.parentNode.insertBefore(t, s);
        }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '865253970178641');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=865253970178641&ev=PageView&noscript=1" />
    </noscript>
    {{--  schema newly added 16-oct-2024  --}}
    <script type="application/ld+json" async>
        {
          "@context": "https://schema.org/",
          "@type": "WebSite",
          "name": "FranchiseIndia",
          "url": "https://www.franchiseindia.com/",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https://www.franchiseindia.com/category/search?text={search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
        </script>
        <script type="application/ld+json" async>
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "Franchise India",
          "url": "https://www.franchiseindia.com/",
          "logo": "https://www.franchiseindia.com/newhomepage/assets/img/Logo.svg",
          "alternateName": "FranchiseIndia",
          "sameAs": [
            "https://www.facebook.com/FranchiseIndiaMedia",
            "https://twitter.com/FranchiseIndia",
            "https://www.instagram.com/franchiseindia_/",
            "https://www.youtube.com/user/FranchiseIndia",
            "https://muckrack.com/media-outlet/franchiseindia",
            "https://www.linkedin.com/company/franchiseindia/"
          ],
          "contactPoint": [
            {
              "@type": "ContactPoint",
              "telephone": "1800 102 2007",
              "contactType": "customer service",
              "email": "advertise@franchiseindia.com",
              "contactOption": "TollFree",
              "areaServed": "IN",
              "availableLanguage": [
                "en",
                "hi"
              ]
            }
          ]
        }
        </script>
        {{--  schema newly added 16-oct-2024  --}}
    <!-- End Facebook Pixel Code -->
    <link rel="stylesheet"
        href="https://www.franchiseindia.com/newhomepage/assets/vendor/bootstrap/css/bootstrap.min.css?ver=2.2"
        rel="preload" as="style">
    <link rel="stylesheet"
        href="https://www.franchiseindia.com/newhomepage/assets/vendor/mCustomScrollbar/css/jquery.mCustomScrollbar.min.css?ver=2.2">
    <link rel="stylesheet"
        href="https://www.franchiseindia.com/newhomepage/assets/vendor/swiper/css/swiper-bundle.min.css?ver=2.2"
        rel="preload" as="style">
    <!-- <link rel="stylesheet" href="banner.css"> -->

</head>

<body id="dotcom">
    <noscript> <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KW4K6WV6" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript>
    <noscript> <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NW38FD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>


    @php
        $auth = new \Illuminate\Support\Facades\Auth();
    @endphp
    @if (request()->segment(1) == 'hi')
        <header class="header" id="header">
            <div class="topbar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-30 d-flex">
                                <div class="p-2">
                                    <ul class="top-navigation">
                                        <li><a href="https://www.licenseindia.com" target="_blank">ब्रांड लाइसेंस
                                                खरीदें</a></li>
                                        <li><a href="https://www.businessex.com" target="_blank">अपना बिजनेस बेचें</a>
                                        </li>
                                        <li><a href="#" target="_blank" data-toggle="modal"
                                                data-target="#expandFranchisenew">फ्रैंचाइज़ का विस्तार करें </a></li>
                                        <li><a href="https://www.franchiseindia.com/advertise-with-us-payment"
                                                target="_blank">विज्ञापन दें</a></li>
                                        <li><a href="https://www.restaurantindia.in" target="_blank">रेस्टोरेंट
                                                इंडिया</a></li>
                                        <li><a href="https://www.franchiseindia.com/property-loan"
                                                target="_blank">संपत्ती के बदले कर्ज</a></li>

                                        <li class="top-investors">
                                            <div class="dropdown policydropdown">
                                                <button class="btn dropdown-toggle" type="button" id="btnDropdownDemo"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                    style="">इन्वेस्टर <i class="fa fa-caret-down"></i></button>
                                                <div class="dropdown-menu policydropdownmenu"
                                                    aria-labelledby="btnDropdownDemo">
                                                    <a class="dropdown-item"
                                                        href="{{ Config('constants.MainDomain') }}/ipo"
                                                        target="_blank">आईपीओ</a>
                                                    <a class="dropdown-item"
                                                        href="{{ Config('constants.MainDomain') }}/policies"
                                                        target="_blank">नीतियों</a>
                                                    <a class="dropdown-item"
                                                        href="{{ Config('constants.MainDomain') }}/corporate-governance"
                                                        target="_blank">निगम से संबंधित शासन प्रणाली</a>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="p-2 ml-auto">
                                    <div class="input-group input-group-custom"><span
                                            class="input-group-addon input-group-prepend-custom" id="basic-addon1"><img
                                                src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg"
                                                alt="language-icon" height="15" width="15"></span>
                                        <div class="form-group form-group-sm">

                                            @if ($__env->yieldContent('hindiUrl'))
                                                <select class="form-control form-control-custom-main"
                                                    onchange="changelanguage(value)" aria-label="Language">
                                                    ,<option value=""hidden></option>
                                                    <option value="@yield('englishUrl')"@if ($engUrl == Request::url()) selected @endif>EN - English</option>
                                                    <option value="@yield('hindiUrl')"@if ($hindiUrl == Request::url()) selected @endif>HI - Hindi</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-btm">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex p-30 m-align">
                                <div class="p-2">
                                    <div id="sidebarCollapse" class="menu-bar"><img
                                            src="https://www.franchiseindia.com/newhomepage/assets/img/menu-icon.svg"
                                            width="25" height="14" alt="menu-icon"><span>Menu</span></div>
                                </div>
                                <div class="logo"><a href="https://www.franchiseindia.com">
                                        <img src="https://www.franchiseindia.com/newhomepage/assets/img/Logo.svg"
                                            alt="Franchise India" height="32" width="200"></a></div>
                                <div class="d-flex m-search"><span class="search" id="search">
                                        <div class="p-2" data-toggle="modal" data-target="#search-main"><img
                                                src="https://www.franchiseindia.com/newhomepage/assets/img/Search.svg"
                                                alt="Search"><span>सर्च</span></div>
                                    </span>
                                    <span class="login-text-right text-right d-main"><span>
                                            @if (Auth::check())
                                                <span class="login-text-right text-right"
                                                    id="sidebarCollapse-main-login">
                                                    <img src="{{ url('newhomepage/assets/img/Login.svg') }}"
                                                        alt="Login" id="leftsidebar-open">
                                                </span>
                                            @else
                                                <a data-target="#login-pnl" data-toggle="modal" href="#"><img
                                                        src="https://www.franchiseindia.com/newhomepage/assets/img/Login.svg"
                                                        alt="Login"></a>
                                            @endif


                                        </span>
                                        <ul class="login-main-section">
                                            {{-- @dd(Auth::check()); --}}
                                            @if (Auth::check())
                                                <li><a href="{{ url('investor/myaccount/dashboard') }}">मेरा खाता</a>
                                                </li>
                                                <li><a href="{{ url('logoutprofile') }}"> लॉग आउट</a></li>
                                            @else
                                                <li><a href="#" data-toggle="modal" data-target="#login-pnl"
                                                        id="mobilereg">रजिस्टर</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#login-pnl"
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
            <div class="topbar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-30 d-flex">
                                <div class="p-2">
                                    <ul class="top-navigation">
                                        <li><a href="https://www.licenseindia.com" target="_blank">Buy a Brand
                                                License</a></li>
                                        <li><a href="https://www.businessex.com" target="_blank">Sell your
                                                Business</a></li>
                                        <li><a href="#" target="_blank" data-toggle="modal"
                                                data-target="#expandFranchisenew">Expand Your Franchise</a></li>
                                        <li><a href="https://www.franchiseindia.com/advertise-with-us-payment"
                                                target="_blank">Advertise</a></li>
                                        <li><a href="https://www.restaurantindia.in" target="_blank">Restaurant
                                                India</a></li>
                                        <li><a href="https://www.franchiseindia.com/property-loan"
                                                target="_blank">Loan Against Property</a></li>
                                        <li class="top-investors">
                                            <div class="dropdown policydropdown">
                                                <button class="btn dropdown-toggle" type="button"
                                                    id="btnDropdownDemo" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" style="">Investor <i
                                                        class="fa fa-caret-down"></i></button>
                                                <div class="dropdown-menu policydropdownmenu"
                                                    aria-labelledby="btnDropdownDemo">
                                                    <a class="dropdown-item"
                                                        href="{{ Config('constants.MainDomain') }}/ipo"
                                                        target="_blank">IPO</a>
                                                    <a class="dropdown-item"
                                                        href="{{ Config('constants.MainDomain') }}/policies"
                                                        target="_blank">Policies</a>
                                                    <a class="dropdown-item"
                                                        href="{{ Config('constants.MainDomain') }}/corporate-governance"
                                                        target="_blank">Corporate Governance</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-2 ml-auto">
                                    <div class="input-group input-group-custom"><span
                                            class="input-group-addon input-group-prepend-custom"
                                            id="basic-addon1"><img
                                                src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg"
                                                alt="language-icon" height="15" width="15"></span>
                                        <div class="form-group form-group-sm">
                                            @if ($__env->yieldContent('hindiUrl'))
                                                <select class="form-control form-control-custom-main"
                                                    onchange="changelanguage(this.value)" aria-label="Language">
                                                    <option value="@yield('englishUrl')"
                                                        @if ($engUrl == Request::url()) selected @endif>EN - English
                                                    </option>
                                                    <option value="@yield('hindiUrl')"
                                                        @if ($hindiUrl == Request::url()) selected @endif>HI - Hindi
                                                    </option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-btm">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex p-30 m-align">
                                <div class="p-2">
                                    <div id="sidebarCollapse" class="menu-bar"><img
                                            src="https://www.franchiseindia.com/newhomepage/assets/img/menu-icon.svg"
                                            width="25" height="14" alt="menu-icon"><span>Menu</span></div>
                                </div>
                                <div class="logo"><a href="https://www.franchiseindia.com"><img
                                            src="https://www.franchiseindia.com/newhomepage/assets/img/Logo.svg"
                                            alt="Franchise India" height="32" width="200"></a></div>
                                <div class="d-flex m-search"><span class="search" id="search">

                                        <div class="p-2" data-toggle="modal" data-target="#search-main"><img
                                                src="https://www.franchiseindia.com/newhomepage/assets/img/Search.svg"
                                                alt="Search"><span>Search</span></div>

                                    </span><span class="login-text-right text-right d-main"><span>
                                            @if (Auth::check())
                                                <span class="login-text-right text-right"
                                                    id="sidebarCollapse-main-login">
                                                    <img src="{{ url('newhomepage/assets/img/Login.svg') }}"
                                                        alt="Login" id="leftsidebar-open">
                                                </span>
                                            @else
                                                <a data-target="#login-pnl" data-toggle="modal" href="#"><img
                                                        src="https://www.franchiseindia.com/newhomepage/assets/img/Login.svg"
                                                        alt="Login"></a>
                                            @endif
                                        </span>
                                        <ul class="login-main-section">
                                            @if (Auth::check())
                                                <li><a href="{{ url('investor/myaccount/dashboard') }}">My Account</a>
                                                </li>
                                                <li><a href="{{ url('logoutprofile') }}"> Logout</a></li>
                                            @else
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
            </div>
        </header>
    @endif
  <style>mark{color: #000;background: #ff0!important;}.eshowtxt,.videtxt{color:#828282;font-size:13px}#hero-section h2,.eshowtxt,.videtxt,body,ol.tree li a,ol.tree li label{font-weight:300}.busheadmebu.marmodfy{margin-left:-8px;width:275px}.busheadmebu.marmodfy .gsc-input-box{border:0!important}.busheadmebu a:hover{color:#e62005;text-decoration:underline}.eshowcontent h2,.videcontent h2{color:#333;font-size:19px;margin-top:9px;overflow:hidden}ol.tree li a:hover{color:#000;text-decoration:underline}#myclose,.business-a a:hover,.icon-whatsapp a,.myaccount ul.nvss a:hover,.nav>li>a:hover,.sidemy ul.nvss a:hover,a,a:focus,a:hover,ol.tree li.file a,ul.sublink li a:hover{text-decoration:none}ol.tree li.file{margin-left:-1px!important}ol.tree li.file a{background:url(https://www.franchiseindia.com/images/document.png) no-repeat;color:#fff;padding-left:14px;display:block;font-size:12px}ol.tree li input+ol a:hover{font-weight:400;color:#000}ol.tree li input:checked+ol{background:url(https://www.franchiseindia.com/images/reddown.png?d=2) 40px 1px no-repeat;margin:-19px 0 0 -44px;padding:1.563em 0 0 74px;height:auto}ol.tree li input:checked+ol>li{display:block;margin:0 0 .125em;font-size:13px;line-height:16px}ol.tree li input:checked+ol>li:last-child{margin:0 0 .063em}.generic .card-body-section h2,.generic .card-body-section p a,.generic .card-info,.generic .card-info-amt{text-overflow:ellipsis;overflow:hidden}#content,#dismiss,#dismiss-login,#sidebar,a{transition:.3s}#dismiss,#dismiss-login{line-height:35px;top:10px;right:10px}#dismiss,#dismiss-login,#login-pnl .vrfy,#search,.d-main,.menu-bar,.policydropdown .btn,.radio label,ol.tree li input,ol.tree li label{cursor:pointer}#sidebar-login.active{right:0}#dismiss-login{text-align:center;position:absolute;font-size:25px}.sidemy .myperp .icon-spc img,.sidemy .myperp img.icon-spc,.sidemy ul.nvss li .icon-spc img{filter:brightness(650%)}.sidebtn{background:#ccc;color:#333;margin:15px auto;width:90%;display:block;text-align:center}.progress{height:10px;background:#333}.progress-bar{background:#ccc}.sidemy .myline{border-top:1px solid #2c2c2c}.myaccount .parblk{padding:10px 15px 0}.sidemy .per{color:#999}.myaccount .per{color:#666}.sidemy ul.nvss li{border-left:4px solid #202020}.nvss{list-style-type:none;margin-bottom:0;padding-inline-start:0px}.myaccount ul.nvss li{float:none;width:100%;text-align:left;clear:both;margin:0;padding:10px 0 10px 12px;border-left:0 solid #fff}.icon-spc{float:left;margin:-3px 5px 0 0}.myaccount .manetxt{clear:both;display:inline;position:relative;top:-3px;color:#fff}.btn-logout{width:80px;background:#202020;border:1px solid #ccc;color:#ccc;font-size:12px;line-height:20px;padding:2px 7px;text-transform:uppercase;margin-top:10px}.myaccount .per,.sidemy .per{font-size:13px;margin-bottom:10px}.myaccount .nav__list input[type=checkbox]+label>span{transform:rotate(180deg)}.myaccount .nav__list label>span{float:right;transition:transform .65s}.myaccount .nav__list label{font-size:13px;padding:0 20px 0 15px;color:#333;font-weight:100;display:block;cursor:pointer}.sidemy .per span{color:#fff;font-family:"Open Sans Semibold",serif}.myaccount .welmy{font-size:13px;color:#999;padding-left:15px;padding-top:20px;padding-bottom:20px}.myaccount .sidebtn,.sidemy .sidebtn{margin:15px auto;width:90%;display:block;text-align:center;padding:5px;border-radius:4px}.myaccount.sidemy .nav__list input[type=checkbox]+label>span{transform:rotate(180deg);color:#ccc}.username{font-size:16px;color:#fff;line-height:18px;display:block}.myaccount .nav__list .group-list{transition:max-height .5s ease-in-out}.sidemy ul.nvss li.selected{border-left:4px solid #666;background:#333}.myaccount ul.nvss li.selected{padding:6px 0 6px 12px;color:#000!important}.sidemy ul.nvss li.selected a{color:#ccc!important}#login-pnl .vrfy{border-radius:3px;font-size:14px;color:#fff;padding:7px 14px;width:115px;right:7px;top:7px;margin:0 auto;background:#333;position:absolute;z-index:99999;text-align:center}.login-pnl-error{display:block;font-size:13px;margin:-10px 0 5px}#expandFranchisenew .modal-dialog,#login-pnl .modal-dialog{width:416px}#expandFranchisenew h2{font-weight:600;border-bottom:1px solid #dfdfdf;color:#333;font-size:18px;text-align:center;text-transform:uppercase;padding:0 0 15px}#expandFranchisenew .radio{margin-top:10px!important;margin-right:20px}#expandFranchisenew .frm-input{padding:0 15px}#expandFranchisenew .frm-sec .form-control{padding:11px 12px;border:1px solid #dfdfdf}#expandFranchisenew .frm-sec .btn-default.btn-red{width:180px;margin:10px auto 0;display:block;padding:7px 10px}#expandFranchisenew .btn-default.btn-red{color:#dc3322;border-color:#dc3322;background:0 0}#expandFranchisenew .input-group-addon{padding:0 10px}#expandFranchisenew .btn-default.btn-red:hover{color:#fff;background-color:#dc3322}#expandFranchisenew .input-group{margin-bottom:10px}#expandFranchisenew .frm-type{display:flex;width:90%;margin:auto;align-items:center}.section-ptb h2::after{content:"";display:block;width:67px;height:1px;border-radius:0;background:#ed1c24;margin:11px 0 21px}.section-ptb h2{font-size:26px;font-weight:700}.trending-franchise-wrap{display:flex;justify-content:space-between;flex-wrap:wrap}.generic .card{height:323px;width:24%;display:flex;flex-direction:column;min-width:0;overflow-wrap:break-word;background-color:#fff;background-clip:border-box;border-radius:4px;padding:12px 15px!important;margin-bottom:0;margin-top:15px}#search,.generic .card-body-section{padding-top:2px}.brand-image-section{border:1px solid #e5e5e5;background-color:#fafafa;border-radius:4px;text-align:center;overflow:hidden;position:relative;display:table;width:100%;height:128px}.brand-main-section{display:table-cell;vertical-align:middle}.generic .card-body-section p{font-weight:300;font-size:12px;margin:5px 0 0;color:#828282;text-overflow:ellipsis}.generic .card-body-section p a{white-space:nowrap}.generic .card-info{width:60%;font-size:13px;white-space:nowrap}.generic .card-info-amt{width:40%;text-align:right;font-weight:700;font-size:13px;white-space:nowrap}#dismiss,.contact-us-section,.form-ask-experts h4,.generic .link-section,.input-group-addon{text-align:center}.generic .link-section{color:#ed1c24;border:1px solid #ed1c24;padding:5px;border-radius:4px;margin-top:10px}.generic .card-body-section h2{font-size:14px;line-height:19px;margin-top:9px;margin-bottom:9px;font-weight:600;white-space:nowrap;width:100%}.covidproof .card{height:310px;width:24%}@media screen and (max-width:768px){.trending-franchise-wrap{padding-bottom:15px;display:block;overflow:auto;white-space:nowrap;padding-left:2px}.section-ptb h2{font-size:18px}.brand-img{border:1px solid #e5e5e5;background-color:#fafafa;border-radius:4px;text-align:center;overflow:hidden;position:relative;display:table;width:100%;height:128px}.covidproof .card{height:310px;margin-right:10px;margin-top:0;display:inline-block;width:250px}}.hero-mobile,.mmdesk,.smobile,.top-investor-mobile{display:none}li.top-investors{height:20px}#btnhome,.business-a,.hero-desktop,.policydropdown:hover .policydropdownmenu,.ppdesk,.radio,.smallimp,a.setpat{display:block}.policydropdown .btn{background:top;border:none;padding:0;color:#101010;font-weight:300;font-size:13px}.policydropdownmenu{background:#f5f5f5;border:none;padding:10px;box-shadow:none;top:18px;border-radius:0}.policydropdownmenu a{font-size:12px;display:block;margin-bottom:4px}#main{margin-top:-100px}.about-us{padding-top:30px}#hero-section{margin-top:88px;color:#fff;padding:140px 0;position:relative}#hero-section .banner-expo{position:absolute;top:0;left:0;width:100%;object-fit:cover;height:440px}.lnkblk{width:300px;float:right;top:-43px;position:relative;z-index:1}.lnkblk img{width:100%}#hero-section h1{color:#fff;margin-top:-114px;font-size:33px;margin-bottom:6px}#hero-section h1 span{color:#ff0}#hero-section h2{font-size:25px;color:#fff;z-index:8;text-shadow:2px 2px 8px #4c482f;margin:5px 0 30px}.nav-tabs{border-bottom:0 solid #ddd;margin-bottom:0!important;padding-left:0}.hero-search .nav-tabs>li{margin-bottom:-4px}.nav>li>a:hover{background-color:#fff;color:#000;border-radius:0}.btn-main,.btn-main:focus,.btn-main:hover{color:#fff}.nav-tabs>li.active>a,.nav-tabs>li.active>a:focus,.nav-tabs>li.active>a:hover{color:#fff;cursor:default;background-color:rgba(237,28,36,.6);border:0 solid rgba(237,28,36,.6);border-radius:0!important;padding:10px 15px!important;margin-left:1px}.tab-content .tab-pane.active{transform:translateY(-1px);opacity:1;-webkit-animation:.8s forwards fadeUp;-moz-animation:.8s forwards fadeUp;-o-animation:.8s forwards fadeUp;animation:.8s forwards fadeUp}.tab-content .tab-pane{opacity:0;transition:opacity .8s linear}ul.hero-search-main{list-style:none;margin-bottom:0;padding-inline-start:0px}ul.hero-search-main li{display:inline-block}.m-0{margin:0}ul.hero-search-main li select{width:356px!important}.dropdown-toogle-icon{-webkit-appearance:none;background:url(https://www.franchiseindia.com/images/drop-down-icon.png) 95% center no-repeat #fff!important}.form-control{border:0 solid #ccc}.form-control-custom{height:46px!important;padding:.6rem 7.9rem!important;border-radius:0!important}.btn-main-hero{width:60px;font-size:13px;line-height:1;height:47px!important}.btn-main{border-color:#ed1c24;border-radius:0;outline:0;color:#fff;background-color:#ed1c24}@media only screen and (min-width:993px) and (max-width:1199px){.covidproof .card{height:310px;width:24.3%;padding:10px!important}.policydropdown .btn,ul.top-navigation li a{font-size:12px}ul.top-navigation li{margin-right:5px!important}.business-a{position:relative;z-index:2;margin-bottom:15px}ul.hero-search-main{display:flex;justify-content:space-between}ul.hero-search-main li{width:32%;margin-right:1px}ul.hero-search-main li select{width:100%!important;padding-left:15px!important}ul.hero-search-main li:last-child{width:60px}#hero-section h1{margin-top:-98px!important;font-size:27px!important}#hero-section h2{font-size:23px}}@media only screen and (min-width:769px) and (max-width:992px){.covidproof .card,.generic .card{width:49%!important}.policydropdownmenu a,.top-investor-mobile{display:block;margin-bottom:3px}#sidebar.policydropdown .btn,.policydropdown .btn{margin-left:10px;font-weight:400;margin-bottom:6px}.policydropdown:hover .policydropdownmenu{display:block}.top-navigation .top-investors,ul.top-navigation li:nth-child(6)::after{display:none}.policydropdown .btn{background:top;border:none;padding:0;color:#101010;font-size:15px;cursor:pointer}.policydropdownmenu{border:none;padding:4px 0 15px;box-shadow:none;border-radius:0;width:90%;top:23px;left:10px;background:#fff}.policydropdownmenu a{font-size:13px!important;padding:0!important;font-weight:300}#sidebar.policydropdown .btn{font-size:16px;color:#000}.p-30{padding-right:0!important;padding-left:0!important}select#language-changer,ul.top-navigation li a{font-size:11px!important}ul.top-navigation li{margin-right:0!important}#hero-section h1{font-size:24px!important;margin-top:0!important}#hero-section h2{font-size:19px!important}.lnkblk,.section-ptb a{top:0!important}ul.hero-search-main{display:flex;justify-content:space-between}ul.hero-search-main li{width:32%;margin-right:1px}ul.hero-search-main li select{width:100%!important;padding-left:15px!important}ul.hero-search-main li:last-child{width:60px}.logo{padding-left:118px!important}#card-section h4,.form-ask-experts{margin-top:10px}.business-a{position:relative;z-index:2;margin-bottom:15px}.section-ptb h2{font-size:22px!important;margin-bottom:-10px!important}}body{font-family:Roboto,sans-serif;background:#f1f1f1}.input-group-prepend-custom{background:0 0!important;border:none!important}.menu-bar img,ul.top-navigation li{margin-right:10px}.generic .link-section a:hover{color:#ed1c24;text-decoration:none}a{color:inherit}#header{padding:0;width:100%;position:fixed;z-index:5;top:0}.topbar{background-color:#f5f5f5}.p-2{padding:.5rem!important}.top-navigation,ul.login-main-section{margin-bottom:0;padding-inline-start:0;list-style:none}ul.top-navigation{display:inline-flex;margin-top:3px}ul.top-navigation li a{color:#101010}.top-navigation{font-size:13px}.input-group-prepend-custom{padding:5px;font-size:14px;font-weight:400;line-height:1;color:#555;text-align:center;background-color:rgb(238 238 238 / 0%);border-radius:0}.input-group-prepend-custom img{width:15px}select#language-changer{height:27px!important;padding:3px!important;font-size:13px}.form-control-custom-main{line-height:1.2}ul.top-navigation li::after{content:"|";padding:0 5px}.ml-auto,.mx-auto{margin-left:auto!important}.d-flex{display:flex}.header-btm{padding-top:20px;background:#fff;padding-bottom:15px}.p-30{padding-right:24px;padding-left:24px}.logo{display:block;margin:0 auto;padding-left:175px}.d-main,ul.login-main-section li,ul.sidebar-social li{display:inline-flex}#search{padding-right:16px}.login-text-right img,.search img{width:25px;height:25px}.search span{margin-left:7px}.login-text-right{padding-top:5px}ul.login-main-section{margin-top:4px;margin-left:10px}ul.fihl-loaction-browse li:last-child::after,ul.login-main-section li:last-child::after,ul.top-navigation li:last-child::after{content:""}ul.login-main-section li::after{content:"/";margin:0 5px}.overlay.active{display:block;opacity:1;width:100%;height:119%;margin-top:-21px}.overlay{display:none;width:100vw;background:rgba(0,0,0,.7);z-index:998;opacity:0;transition:.5s ease-in-out;top:0}#sidebar,.overlay{position:fixed;height:100vh}#sidebar{width:300px;top:0;left:-300px;z-index:999;background:#fff;color:rgb(0 0 0);overflow-y:scroll;box-shadow:rgba(0,0,0,.2) 3px 3px 3px}#sidebar.active{left:0}#dismiss{width:35px;height:35px;background:#dc3545;position:absolute}#sidebar .list-unstyled{padding-right:15px;margin-bottom:20px;padding-bottom:20px}.pt-35{padding-top:35px!important}.border-bottom-1,.google-search,.language-main-bx,.side-bar-social{border-bottom:1px solid #dfdfdf}.google-search{padding:10px 2px;border-top:1px solid #dfdfdf;margin-top:30px}#sidebar ul li a{padding:5px 10px;font-size:15px;display:block}.busheadmebu{float:none;font-size:16px;color:#333;margin:10px 0 8px 15px;font-weight:400;padding:0;line-height:22px}ol.tree{padding:0 0 0 15px;width:auto;margin:10px 0}ol.tree li{list-style:none;font-size:15px;margin:12px 0;font-weight:400;position: relative;line-height:18px}ol.tree li label{display:block;padding-left:14px;line-height:20px;margin-bottom:1px}ol.tree li input{position:absolute;left:0;margin-left:0;opacity:0;z-index:2;height:1em;width:1em;top:0}ol.tree li input+ol{background:url(https://www.franchiseindia.com/images/redup.png?d=2) 40px 0 no-repeat;margin:-19px 0 0 -44px;height:1em}ol.tree li input+ol>li{display:none;padding-left:1px;margin:8px 0 8px -18px!important}.martop{margin-top:10px}.side-bar-social{padding-top:5px;margin-top:10px;border-top:1px solid #dfdfdf;padding-bottom:5px}ul.sidebar-social{padding-inline-start:15px;list-style:none}ul.sidebar-social a{padding:5px 0 5px 5px!important;font-size:15px;display:block}ul.main-link-section{list-style:none;display:flex;padding-left:6px;justify-content:center}svg:not(:root).svg-inline--fa{overflow:visible}.svg-inline--fa.fa-w-14{width:.875em}.gsc-search-button-v2,.gsc-search-button-v2:focus,.gsc-search-button-v2:hover{border-color:#dc3545!important;background-color:#dd3a49!important;background-image:none!important;filter:none!important;font-size:0!important;padding:9px 27px!important;width:auto!important;vertical-align:middle!important}.gsc-input-box,.gsc-input-box-focus,.gsc-input-box-hover,input.gsc-input{border-color:transparent!important}.gsib_a{padding:5px 9px 4px}.section-30{padding-bottom:30px}.card{display:flex;flex-direction:column;min-width:0;overflow-wrap:break-word;background-color:#fff;background-clip:border-box;border-radius:4px;padding:12px 15px!important;margin-bottom:15px;margin-top:15px;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(237 28 36 / 20%)}.business-a a:hover{color:#fff}#btnhome{margin:auto}.business-a{border:1px solid #911922;color:rgb(255 255 255)!important;font-size:16px;padding:10px;font-weight:500;border-radius:4px;background-color:#911922}.smallimp{font-size:12px;margin-left:0}.pt-30{padding-top:30px!important}h4{font-size:18px}.form-ask-experts{padding:10px;background-color:#f3f3f3;border-radius:4px}.form-ask-experts h4{font-weight:600}.business-a .icon-bar-main-fihl{position:absolute;right:25px;top:25px}ul.radio-main,ul.socl{margin-bottom:0;text-align:left;padding-inline-start:0;list-style:none}ul.radio-main li{display:inline-block;padding:6px}.radio{position:relative;margin-top:10px;margin-bottom:10px}.radio label{min-height:20px;padding-left:20px;margin-bottom:0;font-weight:400}.radio input[type=radio]{position:absolute;margin-left:-20px}.mb-15{margin-bottom:15px}.icon-section-main img{width:20px}.input-group-addon{font-size:14px;font-weight:400;line-height:1;color:#555;background-color:#eee;border:1px solid #ccc;border-radius:4px}@media screen and (max-width:768px){.policydropdownmenu a,.top-investor-mobile{margin-bottom:3px;display:block}#sidebar.policydropdown .btn,.policydropdown .btn{margin-left:10px;font-weight:400;margin-bottom:6px}#hero-search,.lnkblk{clear:both}.hero-mobile,.mmdesk,.policydropdown:hover .policydropdownmenu,.smobile{display:block}.policydropdown .btn{background:top;border:none;padding:0;color:#101010;font-size:15px;cursor:pointer}.policydropdownmenu{border:none;padding:4px 0 15px;box-shadow:none;border-radius:0;width:90%;top:23px;left:10px;background:#fff}.policydropdownmenu a{font-size:13px!important;padding:0!important;font-weight:300}#sidebar.policydropdown .btn{font-size:16px;color:#000}#hero-section .banner-expo{height:100%}#card-section,.hero-desktop,.menu-bar span,.ppdesk,.search span,.tab-content .search-icon,.topbar,ul.login-main-section{display:none}.hero-search .nav-tabs{margin-bottom:1px}.hero-search .nav-tabs>li{margin-bottom:0}.nav-tabs{border-bottom:0 solid #ddd;text-align:center}.lnkblk img{width:237px;height:60px}#main{margin-top:20px}#hero-section{margin-top:62px;padding-bottom:50px}.lnkblk{width:237px;float:right;overflow:hidden;margin-bottom:20px;position:absolute;z-index:1;margin-top:46px;top:0;right:0}#hero-section h2{font-size:17px;line-height:23px;font-weight:400!important;text-align:center;margin-bottom:30px;color:#fff;text-shadow:2px 2px 8px #4c482f}#hero-section h1{color:#fff;text-align:center;margin-top:0;font-size:23px;clear:both;line-height:34px}.hero-search .tab-content{background:rgba(255,255,255,.7);padding:20px}ul.hero-search-main li{display:block;margin-bottom:15px}.hero-search .form-control-custom{padding:8px 10px 7px!important}ul.hero-search-main li select{width:100%!important}.btn-main-hero{width:100%;font-size:16px;line-height:1;height:47px!important;color:#fff;background-color:#ed1c24;border-color:#ed1c24;outline:0;border-radius:0}.language-main-bx>.input-group{width:146px}#header{padding:10px 0;width:100%;background:#fff;position:fixed;z-index:998;top:0}.m-align{align-items:baseline}.logo img{width:200px;padding-top:3px}.m-search{margin-left:auto}.login-text-right img,.search img{width:22px;height:24px}.header-btm{padding-top:5px;padding-bottom:0}.p-2{padding:.5rem!important}.p-30{padding-right:0;padding-left:0}.logo{margin:0 0 0 4px;padding:0}}
</style>
