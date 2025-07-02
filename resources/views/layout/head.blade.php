<meta charset="UTF-8">
<meta content="{{ request()->segment(1) == 'hi' ? 'hi-in' : 'en-in' }}" name="language" />
<title> @yield('seoTitle', 'Franchise India - Business Opportunities, Franchise Opportunities')</title>
<meta name="description" content="@yield('seoDesc', 'Franchise India provides franchise opportunities, business opportunities, business ideas,best business in India and buy Franchise in India with affordable range.')" />
@if (request()->segment(1) == 'top-franchise-leaders')
@else
    <meta name="keywords" itemprop="keywords" content="@yield('seoKeywords', 'franchise in india, franchise opportunities,business opportunities, business ideas, buy franchise in india, small business ideas, franchise india')" />
@endif
@php
    $canonicalUrl = url()->current();
    $queryParams = request()->query();
    $queryString = '';

    if (!empty($queryParams)) {
        $queryString = '?';
        foreach ($queryParams as $key => $value) {
            if (is_null($value)) {
                $queryString .= $key . '&';
            } else {
                $queryString .= $key . '=' . urlencode($value) . '&';
            }
        }
        $queryString = rtrim($queryString, '&');
    }
@endphp
<link href="{{ $canonicalUrl . $queryString }}" rel="canonical">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="https://www.franchiseindia.com/favicon.ico" type="image/x-icon" />
<meta property="fb:pages" content="118224094883095" />
<meta property="fb:app_id" content="110294989480112" />
<meta name="google-site-verification" content="8W9CXigRDmfNyf8vOfkZBefougI9sPXO4xvDBFLIjaw" />
<meta name="y_key" content="0f4f718975ac23ed" />
<meta name="msvalidate.01" content="12C27FDAA076F43E6F3763B81B44D01A" />
<meta content="@yield('robot', 'noindex,nofollow')" name="robots" />
@if ($__env->yieldContent('prev'))
    <link href="@yield('prev')" rel="prev">
    <link href="@yield('next')" rel="next">
@endif
@yield('hindibrandUrls')
@if (request()->segment(1) == 'education' ||
        request()->segment(1) == 'wellness' ||
        request()->segment(1) == 'content' ||
        request()->segment(1) == 'gallery' ||
        request()->segment(1) == 'magazine' ||
        request()->segment(1) == 'hi')
    @if ($__env->yieldContent('title'))
        @php
            $hindiUrl = str_replace(
                '/' . request()->segment(1) . '/',
                '/hi/' . request()->segment(1) . '/',
                url()->current(),
            );
            $engUrl = url()->current();
            if (request()->segment(1) == 'hi') {
                $hindiUrl = url()->current();
                $engUrl = str_replace('/hi/', '/', url()->current());
            }
        @endphp
        @yield('ampHindi')
        <meta itemprop="headline" content="@yield('title')" />
        <meta itemprop="description" content="@yield('shortDesc')">
        <meta itemprop="image" content="@yield('imagesrc')">
        <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="@yield('url')" />
        <meta name="original-source" content="@yield('url')" />
        <meta property="article:section" itemprop="articleSection" content="" />
        <meta property="article:tag" content="@yield('seoKeywords')" />
        <meta property="article:published_time" itemprop="datePublished" content="@yield('createTime')" />
        <meta property="article:modified_time" itemprop="dateModified" content="@yield('updateTime')" />
        <meta property="og:title" content="@yield('title')">
        <meta property="og:type" content="article" />
        <meta property="og:url" content="@yield('url')">
        <meta property="og:image:secure_url" content="@yield('imagesrc')" />
        <meta property="og:image" content="@yield('image')">
        <meta property="og:description" content="@yield('shortDesc')">
        <meta property="og:image:width" content="1000" />
        <meta property="og:image:height" content="562" />
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:title" content="@yield('title')">
        <meta name="twitter:image" content="@yield('imagesrc')">
        <meta name="twitter:description" content="@yield('shortDesc')">
        <meta name="twitter:url" content="@yield('url')">
        <meta name="twitter:image:src" content="@yield('imagesrc')">
        @if (request()->segment(1) == 'education' || request()->segment(2) == 'education')
            <meta name="twitter:site" content="@educationbizin">
            <meta name="twitter:domain" content="educationbiz.com">
            <meta name="twitter:creator" content="@educationbizin">
        @elseif(request()->segment(1) == 'wellness' || request()->segment(2) == 'wellness')
            <meta name="twitter:creator" content="@wellnessind">
            <meta name="twitter:site" content="@wellnessind">
            <meta name="twitter:domain" content="wellnessindia.com">
        @else(request()->segment(1) == 'content' || request()->segment(2) == 'content')
            <meta name="twitter:creator" content="@FranchiseIndia">
            <meta name="twitter:site" content="@FranchiseIndia">
            <meta name="twitter:domain" content="franchiseindia.com">
        @endif
    @endif
@endif
@php
    $ampFlag = 0;
    $segmentId = '';
    $segmentId = request()->segment(1);
    $urlSegment = ['content', 'education', 'wellness'];
    if (in_array($segmentId, $urlSegment)) {
        $titleUrl = request()->segment(2);
        if (strpos($titleUrl, '.') !== false) {
            $titleUrlArr = explode('.', $titleUrl);
            if (is_numeric(end($titleUrlArr))) {
                $ampUrl =
                    'http://' . $_SERVER['SERVER_NAME'] . '/amp/' . request()->segment(1) . '/' . request()->segment(2);
                $ampFlag = 1;
            }
        }
    }
@endphp
{{-- @if ($ampFlag == 1)
    <link href="{{$ampUrl}}" rel="amphtml">
@endif --}}
{{-- <link rel="preload" href="{{ url('js/jquery-3.1.1.min.js') }}" as="script"> --}}
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet"
    href="{{ url('newhomepage/assets/vendor/mCustomScrollbar/css/jquery.mCustomScrollbar.min.css') }}">

{{--  <link rel="preload" href="{{ url('js/jquery.validate.min.js') }}" as="script">  --}}
<link rel="preload" href="{{ url('js/jquery.hint.js') }}" as="script">
<link rel="preload" href="{{ url('js/jquery.bxslider.js') }}" as="script">
<link rel="preload" href="//cdn.sendpulse.com/js/push/10b86845b3b698a88af195580a87545c_1.js" as="script">
<link rel="preload" href="https://static.zdassets.com/ekr/snippet.js?key=a76a1630-c68b-4165-b6f1-ef96b178c0c3"
    as="script">
<link rel="preload" href="{{ url('wle_tracker.js') }}" as="script">
<link rel="preload" href="{{ url('js/bootstrap-filestyle.min.js') }}" as="script">
<link rel="preload" href="{{ url('js/js.cookie.min.js') }}" as="script">
{{--  <link rel="preload" href="{{ url('js/validationInsta.js?ver='.date('d'))}}" as="script">  --}}
<link rel="preload" href="{{ url('js/bootstrap.min.js') }}" as="script">
{{--  <link rel="preload" href="{{ url('js/custom.js?ver='.date('d'))}}" as="script">  --}}
<link rel="preload" href="{{ url('js/lozad.min.js') }}" as="script">
<link rel="preload" href="{{ url('js/bootstrap-typeahead.js') }}" as="script">
@desktop
    <link rel="preload" href="{{ url('js/bioep.js') }}" as="script">
@enddesktop
<link rel="preload" href="{{ url('https://www.google-analytics.com/analytics.js') }}" as="script">
<link rel="preload" href="{{ url('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js') }}"
    as="script">
<link rel="preload" href="{{ url('https://www.googletagservices.com/tag/js/gpt.js') }}" as="script">
<link rel="preload" href="{{ url('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js') }}"
    as="script">
<link rel="preload" href="{{ url('https://www.googletagservices.com/tag/js/gpt.js') }}" as="script">
<link rel="preload"
    href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js') }}" as="script">
<link rel="preload" href="{{ url('/css/fonts/Semibold/OpenSans-Semibold.woff2') }}" as="font"
    type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ url('/css/fonts/Bold/OpenSans-Bold.woff2') }}" as="font" type="font/woff2"
    crossorigin="anonymous">
<link rel="preload" href="{{ url('/css/fonts/Light/OpenSans-Light.woff2') }}" as="font" type="font/woff2"
    crossorigin="anonymous">
<link rel="preload" href="{{ url('css/fontfresh.css') }}" as="style">
<link rel="preload" href="{{ url('css/font-awesome.minfresh.css') }}" as="style">
<link rel="preload" href="{{ url('css/owl.carousel.min.css') }}" as="style">
<link rel="preload" href="{{ url('css/owl.theme.min.css') }}" as="style">
<link rel="preload" href="{{ url('css/jquery-ui.min.css') }}" as="style">
<link rel="preload" href="{{ url('css/bootstrap.min.css') }}" as="style">
<link rel="preload" href="{{ url('css/basicfresh.css?version=' . date('d')) }}" as="style">
<link rel="preload" href="{{ url('css/jquery.bxslider.css?ver=2.1') }}" as="style">
<link href="{{ url('css/fontfresh.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/owl.carousel.min.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/owl.theme.min.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/jquery-ui.min.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/basicfresh.css?version=' . date('d')) }}" type="text/css" rel="stylesheet" />
<link href="https://www.franchiseindia.com/expo/franchise-awards/css/select2.min.css" rel="stylesheet">
@notmobile
    <link rel="stylesheet" href="{{ url('newhomepage/assets/css/style.css?ver=2.10') }}">
@endnotmobile
@mobile
    <link rel="stylesheet" href="{{ url('newhomepage/assets/css/style-mobile-new.css?ver=2.10') }}">
@endmobile
<link href="{{ url('css/jquery.bxslider.css?ver=2.1') }}" type="text/css" rel="stylesheet" />
<script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ url('js/jquery.validate.min.js') }}"></script>
<script src="{{ url('js/jquery.hint.js') }}"></script>
@if (request()->segment(1) == 'investor')
    <script src="{{ url('js/validation.js?id=5') }}"></script>
@endif
@if (request()->segment(1) == 'franchisor' || request()->segment(1) == 'franchisor/registration/step/1')
    <script src="{{ url('js/franchisor_validation.js?ver=1.1') }}"></script>
    <script src="{{ url('js/jquery.tabletoCSV.js') }}"></script>
@endif

@include('includes.banners-new.google-tags')

<!-- Google Tag Manager -->
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NW38FD');
</script>
<!-- End Google Tag Manager -->
        {{-- @dd($isAuthenticated, $mainMembershipType, $regionalMembershipType, request()->ip(), $passIp); --}}

<script>
    $(document).ready(function() {
        @php
            use Illuminate\Support\Facades\Auth;
            $isAuthenticated = Auth::check();
            $passIp = ['127.0.0.1', '182.76.132.82'];
            $regionalMembershipType = $regionalFranchisorMembership ?? 0;
            $mainMembershipType = isset($franDetails->membership_type) ? (int) $franDetails->membership_type : 0;
        @endphp
        @if (request()->segment(1) == 'brands' && !in_array(request()->ip(), $passIp))
            @if (!$isAuthenticated && $mainMembershipType === 0 && $regionalMembershipType === 0)
                $('#login-pnl').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#login-pnl').modal('show');
                $("#loginactive").trigger("click");
                $('#login-pnl').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#login-pnl .close').css('display', 'none');
            @endif
        @endif
    });
</script>
<script async='async' src='https://lwgadm.com/lw/pbjs?pid=cd827928-eb06-4537-bace-58b63e0f7d46'></script>

<script type='text/javascript'>
    var lwhb = lwhb || {
        cmd: []
    };
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16776470774"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-16776470774');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8MKFEZLR18"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-8MKFEZLR18');
</script>
{{--
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "gnbfg0nm67");
</script> --}}

<script type="application/ld+json">
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
<script type="application/ld+json">
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
