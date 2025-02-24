<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('seoTitle', 'Franchise News India Today ' . date('Y') . ' : Startups & Franchise Expansion | FranchiseIndia')</title>
    <meta name="description" content="@yield('seoDesc', 'Get the latest franchise news in India ' . date('d-M-Y') . '!Explore articles on startups, franchisor updates, business & industry trends. Discover franchisee success stories, expansion plans, tie-ups, and new launches. Find your perfect franchise opportunity!')" />
    @if (Request::url() == config('constants.MainDomain') . '/insights')
        <meta name="keywords" content="@yield('seoKeywords', 'franchise news india, franchise business india, india franchise opportunities, franchise in india, new franchise india ' . date('Y') . ', best franchise india, franchise for startups india, franchise expansion india, franchise tie ups india, franchise launches india, franchisor news india, franchisee success stories india, franchise industry trends india.')" />
    @endif
    <meta name="original-source" content="@yield('url')" />
    <meta name='robots' content='noindex, nofollow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <link href="@yield('canonicalUrl', request()->get('page') ? url()->full() : url()->current())" rel="canonical">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8MKFEZLR18"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-8MKFEZLR18');
    </script>
    <meta property="fb:pages" content="118224094883095" />
    <meta itemprop="headline" content="@yield('seoTitle')" />
    <meta itemprop="description" content="@yield('shortDesc')">
    <meta itemprop="image" content="@yield('imagesrc')">
    <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="@yield('url')" />
    <meta property="article:section" itemprop="articleSection" content="@yield('shortDesc')">
    <meta property="article:tag" content="@yield('tag')">
    <meta property="article:published_time" itemprop="datePublished" content="@yield('datePublished')">
    <meta property="article:modified_time" itemprop="dateModified" content="@yield('dateModified')">
    <meta property="og:title" content="@yield('seoTitle')">
    <meta property="og:type" content="article">
    <meta property="og:url" content="@yield('url')">
    <meta property="og:image:secure_url" content="@yield('imagesrc')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:description" content="@yield('shortDesc')">
    <meta property="og:image:width" content="@yield('width')">
    <meta property="og:image:height" content="@yield('height')">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="@yield('seoTitle')">
    <meta name="twitter:image" content="@yield('imagesrc')">
    <meta name="twitter:description" content="@yield('shortDesc')">
    <meta name="twitter:url" content="@yield('url')">
    <meta name="twitter:image:src" content="@yield('imagesrc')">
    <meta name="twitter:creator" content="@franchiseindia">
    <meta name="twitter:site" content="@franchiseindia">
    <meta name="twitter:domain" content="franchiseindia.com">
    {{-- <meta content="@yield('index', 'index,follow')" name="robots" /> --}}
    <meta property="fb:app_id" content="110294989480112" />
    <meta name="google-site-verification" content="8W9CXigRDmfNyf8vOfkZBefougI9sPXO4xvDBFLIjaw" />
    <meta name="y_key" content="0f4f718975ac23ed" />
    <meta name="msvalidate.01" content="12C27FDAA076F43E6F3763B81B44D01A" />
    @include('layout.insights.headerlinks')
    @include('includes.banners-new.google-tags')
    @yield('header-schema')
    @include('layout.insights.menu')
</head>
<body>
    @yield('content')
    <div class="fixsocial">
        <ul class="sociallist">
            <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><img
                        src="https://www.franchiseindia.com/newhomepage/assets/img/fb-icon.svg" alt="facebook"></a></li>
            <li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><img
                        src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg"
                        alt=""></a></li>
            <li><a href="https://twitter.com/FranchiseIndia" target="_blank"><img
                        src="https://www.franchiseindia.com/newhomepage/assets/img/twitter-icon.svg" alt="twitter"></a>
            </li>
            <li><a href="https://www.youtube.com/user/FranchiseIndia" target="_blank"><img
                        src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg"
                        alt="youtube"></a></li>
        </ul>
    </div>
    @include('layout.insights.newsletter')
    @include('layout.insights.footer')
    @include('layout.insights.footerlinks')
</body>
</html>
