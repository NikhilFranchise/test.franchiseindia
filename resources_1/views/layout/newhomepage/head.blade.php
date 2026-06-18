<meta charset="UTF-8">
<meta content="{{ request()->segment(1) == 'hi' ? 'hi-in' : 'en-in' }}" name="language" />
<title>@if (request()->segment(1) != 'hi')@yield('seoTitle', 'Franchise India - Business Opportunities, Franchise Opportunities')@elseif (request()->segment(1) == 'hi')@yield('seoTitle', 'फ्रैंचाइज़ इंडिया - व्यावसायिक अवसर, फ्रैंचाइज़ अवसर')@endif</title>
@if (request()->segment(1) == 'hi')
    <meta name="description" content="@yield('seoDesc', 'फ्रैंचाइज़ इंडिया फ्रैंचाइज़ी के अवसर, व्यापार के अवसर, व्यापारिक विचार, भारत में सबसे अच्छा व्यवसाय प्रदान करता है और सस्ती सीमा के साथ भारत में फ्रैंचाइज़ खरीदता है ।')" />
    <meta name="keywords" itemprop="keywords" content="@yield('seoKeywords', 'भारत में फ्रैंचाइज़, फ्रैंचाइज़ी के अवसर,व्यापार के अवसर, व्यापारिक विचार, भारत में फ्रैंचाइज़ी खरीदें, छोटे व्यवसाय के विचार, फ्रैंचाइज़ भारत')" />
@else
    <meta name="description" content="@yield('seoDesc', 'Franchise India provides franchise opportunities, business opportunities, business ideas,best business in India and buy Franchise in India with affordable range.')" />
    <meta name="keywords" itemprop="keywords" content="@yield('seoKeywords', 'franchise in india, franchise opportunities,business opportunities, business ideas, buy franchise in india, small business ideas, franchise india')" />
@endif
<link href="@yield('canonicalUrl', Request::get('page') ? url()->full() : url()->current())/" rel="canonical">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="https://www.franchiseindia.com/favicon.ico" type="image/x-icon" />
<meta property="fb:pages" content="118224094883095" />
<meta property="fb:app_id" content="110294989480112" />
<meta name="google-site-verification" content="8W9CXigRDmfNyf8vOfkZBefougI9sPXO4xvDBFLIjaw" />
<meta name="y_key" content="0f4f718975ac23ed" />
<meta name="msvalidate.01" content="12C27FDAA076F43E6F3763B81B44D01A" />
<meta content="noindex,nofollow" name="robots" />
@if ($__env->yieldContent('prev'))
    <link href="@yield('prev')" rel="prev">
    <link href="@yield('next')" rel="next">
@endif
<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="{{ url('newhomepage/assets/vendor/bootstrap/css/bootstrap.min.css?ver=2.2') }}">
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet"
    href="{{ url('newhomepage/assets/vendor/mCustomScrollbar/css/jquery.mCustomScrollbar.min.css?ver=2.2') }}">
<!-- swiper@6.2.0 CSS -->
<link rel="stylesheet" href="{{ url('newhomepage/assets/vendor/swiper/css/swiper-bundle.min.css?ver=2.2') }}">
<!-- owl.carousel -->
<link href="{{ url('newhomepage/assets/vendor/owl.carousel/assets/owl.carousel.min.css?ver=2.2') }}" rel="stylesheet">
<!-- Our Custom CSS -->

@mobile
    <link rel="stylesheet" href="{{ url('newhomepage/assets/css/style-mobile-new.css?ver=12.8') }}">
    <script src="https://www.franchiseindia.com/js/jquery-3.1.1.min.js"></script>
    @include('layout.newhomepage.topsearch')
@endmobile
@desktop
    <link rel="stylesheet" href="{{ url('newhomepage/assets/css/style.css?ver=11.0') }}">
@enddesktop
@tablet
    <link rel="stylesheet" href="{{ url('newhomepage/assets/css/style.css?ver=11.0') }}">
@endtablet


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-991358906"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-991358906');
</script>

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
    (function(c, l, a, r, i, t, y) {
        c[a] = c[a] || function() {
            (c[a].q = c[a].q || []).push(arguments)
        };
        t = l.createElement(r);
        t.async = 1;
        t.src = "https://www.clarity.ms/tag/" + i;
        y = l.getElementsByTagName(r)[0];
        y.parentNode.insertBefore(t, y);
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
    
    
