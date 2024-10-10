<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="en-in" name="language">
    <title>Franchise India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description"
        content="Franchise India provides franchise opportunities, business opportunities, business ideas,best business in India and buy Franchise in India with affordable range.">
    <meta name="keywords" itemprop="keywords"
        content="franchise in india, franchise opportunities,business opportunities, business ideas, buy franchise in india, small business ideas, franchise india">

<link rel="preload" fetchpriority="high" as="image" href="{{ url('cwv-mobile/images/mobile-banner.webp') }}" type="image/webp">

<link rel="stylesheet" href="{{ url('cwv-mobile/css/style.css')}}" rel="preload" as="style">

<link rel="stylesheet" href="https://www.franchiseindia.com/newhomepage/assets/vendor/bootstrap/css/bootstrap.min.css?ver=2.2" rel="preload" as="style">

<link rel="stylesheet" href="https://www.franchiseindia.com/newhomepage/assets/vendor/mCustomScrollbar/css/jquery.mCustomScrollbar.min.css?ver=2.2" rel="preload" as="style">

        <!-- Google Tag Manager -->
    {{--  <script async>
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

    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-991358906"></script>
    <script async>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-991358906');
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
    </noscript>  --}}
</head>

<body>
    {{--  <noscript> <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NW38FD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>  --}}
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="d-flex">
                        <div class="p-2">
                            <div id="sidebarCollapse" class="menu-bar">
                                <img src="{{ url('cwv-mobile/images/menu-icon.svg') }}" alt="Menu" width="25"
                                    height="14">
                            </div>
                        </div>
                        <div class="p-2 logo"> <a href="https://www.franchiseindia.com"><img
                                    src="{{ url('cwv-mobile/images/logo.svg') }}"
                                    alt="Franchise India - Business Opportunities, Franchise Opportunities"
                                    title="Franchise India - Business Opportunities, Franchise Opportunities"
                                    width="200" height="32"></a>
                        </div>

                        <div class="ml-auto d-flex p15">

                            <span data-toggle="modal" data-target="#search-main">
                                <img src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/Search.svg"
                                    alt="Home Search" width="22" height="24"></span>
                            @if (Auth::check())
                                <span class="login-text-right text-right" id="sidebarCollapse-main-login">
                                    <img src="{{ url('newhomepage/assets/img/Login.svg') }}" alt="Login"
                                        id="leftsidebar-open">
                                </span>
                            @else
                                <span data-toggle="modal" data-target="#login-pnl" id="loginselect">
                                    <img src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/Login.svg"
                                        alt="Login" width="21" height="21">
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
