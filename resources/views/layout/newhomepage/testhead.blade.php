<meta charset="UTF-8">
<meta content="{{ request()->segment(1) == 'hi' ? "hi-in" : "en-in" }}" name="language"/>
<title>
    @if(strpos(collect(request()->segments())->last(), 'range-') !== false)

        @php
            $mainTitle = $seoTitle;
            $lastSegment = str_replace("range-","Under Range ",collect(request()->segments())->last());
            $title1 = $lastSegment.' - Franchise India';
            $title = str_replace("- Franchise India",$title1,$seoTitle);
        @endphp
        @php
            if (preg_match("/ - Franchise India/", $title))
            {
                $mainTitle = $title;
            }
            else if(preg_match("/at Franchise India/", $title)){
            $mainTitle = str_replace("at Franchise India",$title1,$seoTitle);
            }
        @endphp
        {{ $mainTitle  }}
        {{--@yield('seoTitle', '-pawan')--}}
    @else
        @yield('seoTitle', 'Franchise India - Business Opportunities, Franchise Opportunities')
    @endif
</title>
<meta name="description" content="@yield('seoDesc', 'Franchise India provides franchise opportunities, business opportunities, business ideas,best business in India and buy Franchise in India with affordable range.')" />
<meta name="keywords" itemprop="keywords" content="@yield('seoKeywords', 'franchise in india, franchise opportunities,business opportunities, business ideas, buy franchise in india, small business ideas, franchise india')" />
<link href="@yield('canonicalUrl', Request::get('page') ? url()->full() : url()->current())/" rel="canonical">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="https://www.franchiseindia.com/favicon.ico" type="image/x-icon" />
<meta property="fb:pages" content="118224094883095" />
<meta property="fb:app_id" content="110294989480112" />
<meta name="google-site-verification" content="8W9CXigRDmfNyf8vOfkZBefougI9sPXO4xvDBFLIjaw" />
<meta name="y_key" content="0f4f718975ac23ed"/>
<meta name="msvalidate.01" content="12C27FDAA076F43E6F3763B81B44D01A" />
<meta name="robots" content="NOODP"/>
<meta content="index,follow" name="robots"/>
@if($__env->yieldContent('prev'))
    <link href="@yield('prev')" rel="prev">
    <link href="@yield('next')" rel="next">
@endif
<!-- Bootstrap CSS CDN -->
<link rel="stylesheet"
      href="{{url('newhomepage/assets/vendor/bootstrap/css/bootstrap.min.css?ver=2.1')}}">
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet"
      href="{{url('newhomepage/assets/vendor/mCustomScrollbar/css/jquery.mCustomScrollbar.min.css?ver=2.1')}}">
<!-- swiper@6.2.0 CSS -->
<link rel="stylesheet"
      href="{{url('newhomepage/assets/vendor/swiper/css/swiper-bundle.min.css?ver=2.1')}}">
<!-- owl.carousel -->
<link href="{{url('newhomepage/assets/vendor/owl.carousel/assets/owl.carousel.min.css?ver=2.1')}}"
      rel="stylesheet">
<!-- Our Custom CSS -->
{{-- @notmobile --}}
@if ($agent->isDesktop() && $agent->isTablest())
<link rel="stylesheet" href="{{url('newhomepage/assets/css/style.css?ver=2.1')}}">
@else
<link rel="stylesheet" href="{{url('newhomepage/assets/css/style-mobile-new.css?ver=2.1')}}">
@endif
{{-- @endnotmobile
@mobile
@endmobile --}}
