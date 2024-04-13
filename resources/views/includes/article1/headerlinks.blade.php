<meta charset="UTF-8">
<meta content="{{ request()->segment(1) == 'hi' ? "hi-in" : "en-in" }}" name="language"/>
<title>@if(strpos(collect(request()->segments())->last(), 'range-') !== false)@php  $mainTitle = ($seoTitle)? $seoTitle : '';
$lastSegment = str_replace("range-","Under Range ",collect(request()->segments())->last());
$title1 = $lastSegment.' - Franchise India';
$title = str_replace("- Franchise India",$title1,$seoTitle);
@endphp
@php if (preg_match("/ - Franchise India/", $title))
{   $mainTitle = $title;
}else if(preg_match("/at Franchise India/", $title)){
    $mainTitle = str_replace("at Franchise India",$title1,$seoTitle);
}
@endphp
{{ $mainTitle  }}
@else @yield('seoTitle', 'Franchise India - Business Opportunities, Franchise Opportunities')@endif</title>

<meta name="description" content="@yield('seoDesc', 'Franchise India provides franchise opportunities, business opportunities, business ideas,best business in India and buy Franchise in India with affordable range.')" />
<meta name="keywords" itemprop="keywords" content="@yield('seoKeywords', 'franchise in india, franchise opportunities,business opportunities, business ideas, buy franchise in india, small business ideas, franchise india')" />
<link href="@yield('canonicalUrl', Request::get('page') ? url()->full() : url()->full())" rel="canonical">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="https://www.franchiseindia.com/favicon.ico" type="image/x-icon" />
<meta property="fb:pages" content="118224094883095" />
<meta property="fb:app_id" content="110294989480112" />
<meta name="google-site-verification" content="8W9CXigRDmfNyf8vOfkZBefougI9sPXO4xvDBFLIjaw" />
<meta name="y_key" content="0f4f718975ac23ed"/>
<meta name="msvalidate.01" content="12C27FDAA076F43E6F3763B81B44D01A" />
<meta content="noindex,nofollow" name="robots"/>
@if($__env->yieldContent('prev'))
    <link href="@yield('prev')" rel="prev">
    <link href="@yield('next')" rel="next">
@endif
@yield('hindibrandUrls')
@if(request()->segment(1) == 'education' || request()->segment(1) == 'wellness' || request()->segment(1) == 'content' || request()->segment(1) == 'gallery' || request()->segment(1) == 'magazine' || request()->segment(1) == 'hi')
    @if($__env->yieldContent('title'))
        @php
            $hindiUrl = str_replace('/'.request()->segment(1).'/', '/hi/'.request()->segment(1).'/', url()->current());
            $engUrl = url()->current();
            if(request()->segment(1) == 'hi') {
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
        @if(request()->segment(1) == 'education' || request()->segment(2) == 'education')
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
    $urlSegment = ['content','education','wellness'];
    if (in_array($segmentId, $urlSegment)) {
        $titleUrl = request()->segment(2);
        if (strpos($titleUrl, '.') !== false) {
            $titleUrlArr = explode('.', $titleUrl);
            if(is_numeric(end($titleUrlArr))) {
                $ampUrl = 'http://' . $_SERVER['SERVER_NAME'].'/amp/'.request()->segment(1).'/'.request()->segment(2);
                $ampFlag = 1;
            }
        }
    }
@endphp
@if($ampFlag == 1)
    <link href="{{$ampUrl}}" rel="amphtml">
@endif
<!--START NEW ARTICLE HYPERLINKS  -->
<!-- Favicons -->
{{--<link href="{{asset('assets/img/favicon.png')}}" rel="icon">--}}
<link href="{{asset('article/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;600;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;600;700&display=swap" rel="stylesheet">
<!-- Vendor CSS Files -->
<link href="{{asset('article/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('article/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
<link href="{{asset('article/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('article/assets/vendor/aos/aos.css')}}" rel="stylesheet">
<link href="{{asset('article/assets/css/swiper.min.css')}}" rel="stylesheet">

<link href="{{asset('article/assets/css/style.css')}}" rel="stylesheet">

<!-- Vendor JS Files -->
<script src="{{asset('article/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('article/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('article/assets/js/swiper.min.js')}}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- END NEW ARTICLE HYPERLINKS  -->
<script>
    $(document).ready(function(){
        @php
            $auth   = new \Illuminate\Support\Facades\Auth();
            $passIp = array('127.0.0.1:8000', '192.168.1.96:8000');
        @endphp
        @if (request()->segment(1) == 'brands' && !in_array(request()->ip(), $passIp))
        @if(!$auth::check() && $franDetails->membership_type == 0)
        $('#login-pnl').modal({ backdrop: 'static', keyboard: false });
        $('#login-pnl').modal('show');
        $("#loginactive").trigger("click");
        $('#login-pnl').modal({ backdrop: 'static', keyboard: false });
        $('#login-pnl .close').css('display','none');
        @endif
        @endif
    });
    $('#registerselect').click(function() {
        $('#registeractive').click();
    });
    $('#loginselect').click(function() {
        $('#loginactive').click();
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
</script>