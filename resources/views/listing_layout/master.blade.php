@mobile
    @include('newHomepage.mobile.header')
    @include('newHomepage.mobile.sidemenu-mobile')
@endmobile
@notmobile
    @include('newHomepage.header')
    @include('newHomepage.sidemenu')
    @include('newHomepage.loginmodal')
@enddesktop
<link rel="preload" href="{{ url('https://www.google-analytics.com/analytics.js') }}" as="script">
<link rel="preload" href="{{ url('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js') }}" as="script">
<link rel="preload" href="{{ url('https://www.googletagservices.com/tag/js/gpt.js') }}" as="script">
<link rel="preload" href="{{ url('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js') }}" as="script">
<link rel="preload" href="{{ url('https://www.googletagservices.com/tag/js/gpt.js') }}" as="script">
<link rel="preload" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js') }}" as="script">
<link rel="preload" href="{{ url('/css/fonts/Semibold/OpenSans-Semibold.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ url('/css/fonts/Bold/OpenSans-Bold.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ url('/css/fonts/Light/OpenSans-Light.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ url('css/fontfresh.css') }}" as="style">
<link rel="preload" href="{{ url('css/font-awesome.minfresh.css') }}" as="style">
<link rel="preload" href="{{ url('css/owl.carousel.min.css') }}" as="style">
<link rel="preload" href="{{ url('css/owl.theme.min.css') }}" as="style">
<link rel="preload" href="{{ url('css/jquery-ui.min.css') }}" as="style">
<link rel="preload" href="{{ url('css/bootstrap.min.css') }}" as="style">
<link rel="preload" href="{{ url('css/basicfresh.css?version='.date('d')) }}" as="style">
<link rel="preload" href="{{ url('css/jquery.bxslider.css?ver=2.1') }}" as="style">
<link href="{{ url('css/fontfresh.css')}}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/owl.carousel.min.css')}}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/owl.theme.min.css')}}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/jquery-ui.min.css')}}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/bootstrap.min.css')}}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/basicfresh.css?version='.date('d'))}}" type="text/css" rel="stylesheet" />
<link href="https://www.franchiseindia.com/expo/franchise-awards/css/select2.min.css" rel="stylesheet">
<link href="{{ url('css/jquery.bxslider.css?ver=2.1')}}" type="text/css" rel="stylesheet" />
<script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ url('js/jquery.validate.min.js') }}"></script>
<script src="{{ url('js/jquery.hint.js') }}"></script>
@if(request()->segment(1) == 'investor')
    <script src="{{ url('js/validation.js?id=5') }}"></script>
@endif
@if(request()->segment(1) == 'franchisor' || request()->segment(1) == 'franchisor/registration/step/1')
    <script src="{{ url('js/franchisor_validation.js?ver=1.1') }}"></script>
    <script src="{{ url('js/jquery.tabletoCSV.js') }}"></script>
@endif

@include('includes.banners-new.google-tags')
    @yield('content')   
@mobile
    @include('newHomepage.mobile.footer-mobile') 
@endmobile
@notmobile
    @include('newHomepage.footersection')
    @include('newHomepage.footer')
@endnotmobile