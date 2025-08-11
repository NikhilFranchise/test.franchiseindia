 {{-- <!-- Favicons -->
 <link href="{{url('insight-new/assets/img/favicon.ico')}}" rel="icon">
 <link href="{{url('insight-new/assets/img/favicon-new.png')}}" rel="apple-touch-icon">
 <!-- Google Fonts -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
 <!-- Vendor CSS Files -->
 <link href="{{url('insight-new/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{url('insight-new/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
 <link href="{{url('insight-new/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
 <link href="{{url('insight-new/assets/vendor/aos/aos.css')}}" rel="stylesheet">
<link href="{{url('insight-new/assets/css/swiper.min.css')}}" rel="stylesheet">
 <link href="{{url('insight-new/assets/css/insightstyle.css?ver='.date('d'))}}" rel="stylesheet">
 <link href="{{url('insight-new/assets/css/insight_new.css?ver='.date('d'))}}" rel="stylesheet">
   <!-- Java Script --> --}}
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{url('insight-new/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

@unless (View::hasSection('insights_detail'))
  <link href="{{url('insight-new/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{url('insight-new/assets/vendor/aos/aos.css')}}" rel="stylesheet">
@endunless

<link href="{{url('insight-new/assets/css/swiper.min.css')}}" rel="stylesheet">
<link href="{{url('insight-new/assets/css/insightstyle.css?v=1')}}" rel="stylesheet">
<link href="{{url('insight-new/assets/css/insight_new.css?v=1')}}" rel="stylesheet">