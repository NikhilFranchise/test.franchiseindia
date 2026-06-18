<!DOCTYPE html>
<html lang="en">
   <head>
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
      <meta charset="UTF-8">
      <meta content="{{ request()->segment(1) == 'hi' ? 'hi-in' : 'en-in' }}" name="language" />
      <title>@if (request()->segment(2) != 'hi') @yield('seoTitle', 'Franchise India - Business Opportunities, Franchise Opportunities')
         @elseif (request()->segment(1) == 'hi') @yield('seoTitle', 'फ्रैंचाइज़ इंडिया - व्यावसायिक अवसर, फ्रैंचाइज़ अवसर') @endif
      </title>
      @if (request()->segment(1) == 'hi')
      <meta name="description" content="@yield('seoDesc', 'फ्रैंचाइज़ इंडिया फ्रैंचाइज़ी के अवसर, व्यापार के अवसर, व्यापारिक विचार, भारत में सबसे अच्छा व्यवसाय प्रदान करता है और सस्ती सीमा के साथ भारत में फ्रैंचाइज़ खरीदता है ।')" />
      <meta name="keywords" itemprop="keywords" content="@yield('seoKeywords', 'भारत में फ्रैंचाइज़, फ्रैंचाइज़ी के अवसर,व्यापार के अवसर, व्यापारिक विचार, भारत में फ्रैंचाइज़ी खरीदें, छोटे व्यवसाय के विचार, फ्रैंचाइज़ भारत')" />
      @else
      <meta name="description" content="@yield('seoDesc', 'Franchise India provides franchise opportunities, business opportunities, business ideas,best business in India and buy Franchise in India with affordable range.')" />
      <meta name="keywords" itemprop="keywords" content="@yield('seoKeywords', 'franchise in india, franchise opportunities,business opportunities, business ideas, buy franchise in india, small business ideas, franchise india')" />
      @endif
      <link href="{{ $canonicalUrl . $queryString }}" rel="canonical">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="https://www.franchiseindia.com/favicon.ico" type="image/x-icon" />
      <meta property="fb:pages" content="118224094883095" />
      <meta property="fb:app_id" content="110294989480112" />
      <meta name="google-site-verification" content="8W9CXigRDmfNyf8vOfkZBefougI9sPXO4xvDBFLIjaw" />
      <meta name="y_key" content="0f4f718975ac23ed" />
      <meta name="msvalidate.01" content="12C27FDAA076F43E6F3763B81B44D01A" />
      <meta content="index,nofollow" name="robots" />
      <link rel="preload" fetchpriority="high" as="image" href="{{ url('cwv-mobile/images/mobile-banner.webp') }}" type="image/webp">
      <link rel="stylesheet" href="{{ url('cwv-mobile/css/style.css')}}" rel="preload" as="style">
      <link rel="stylesheet" href="{{ url('cwv-mobile/css/bootstrap.min.css') }}" rel="preload" as="style">
      <link rel="stylesheet" href="{{ url('cwv-mobile/css/jquery.mCustomScrollbar.min.css') }}" rel="preload" as="style">
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
   </head>
   <body>
       <noscript> <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NW38FD" height="0" width="0"
         style="display:none;visibility:hidden"></iframe></noscript>
     
         
     
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
                        <img src="{{ url('cwv-mobile/images/Search.svg') }}"
                           alt="Home Search" width="22" height="24"></span>
                        @if (Auth::check())
                        <span id="sidebarCollapse-main-login">
                        <img src="{{ url('newhomepage/assets/img/Login.svg') }}" alt="Login"
                           id="leftsidebar-open">
                        </span>
                        @else
                        <span data-toggle="modal" data-target="#login-pnl" id="loginselect">
                        <img src="{{ url('cwv-mobile/images/Login.svg') }}"
                           alt="Login" width="21" height="21">
                        </span>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
