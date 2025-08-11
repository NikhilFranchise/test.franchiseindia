<!-- Favicons -->
<link href="{{ url('insight-new/assets/img/favicon.ico') }}" rel="icon">
<link href="{{ url('insight-new/assets/img/favicon-new.png') }}" rel="apple-touch-icon">

<!-- Performance hints -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="//franchiseindia.s3.ap-south-1.amazonaws.com">
<link rel="dns-prefetch" href="//securepubads.g.doubleclick.net">
<link rel="dns-prefetch" href="//www.googletagmanager.com">
<link rel="dns-prefetch" href="//www.googletagservices.com">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;600;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ url('insight-new/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('insight-new/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
<link href="{{ url('insight-new/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
<link href="{{ url('insight-new/assets/vendor/aos/aos.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
<link href="{{ url('insight-new/assets/css/swiper.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">

<!-- Site CSS (critical) -->
<link href="{{ url('insight-new/assets/css/insightstyle.css?ver='.date('d')) }}" rel="stylesheet">
<link href="{{ url('insight-new/assets/css/insight_new.css?ver='.date('d')) }}" rel="stylesheet">
<!-- Java Script -->

@mobile
  <script src="{{ url('insight-new/assets/js/insight-mobile.js') }}" defer></script>
@endmobile
@desktop
  <script src="{{ url('insight-new/assets/js/insight-desktop.js') }}" defer></script>
@enddesktop