<!DOCTYPE html>
<html>
<head>
    @include('layout.head')
</head>
<body onLoad=checkCookie()>
{{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NW38FD" height=0 width=0 style=display:none;visibility:hidden></iframe></noscript> --}}

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KW4K6WV6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <div class=o-wrapper id=o-wrapper></div>
<div class=backdrop id=closecatnew></div>
@include('layout.headernew')
@if( request()->segment(1) == "premiumbrand" || url()->current() == url('/') || request()->segment(1) == "brands" || request()->segment(1) == "content" || request()->segment(1) == "restaurant" || request()->segment(1) == "education" || request()->segment(1) == "wellness" || request()->segment(1) == "magazine" || request()->segment(1) == "payment")
@else
    <div class=innerloginblk>
        @include('includes.login-events')
    </div>
@endif
<!-- Top search header code Start-->
@mobile
@include('layout.newhomepage.mobile.topsearch')
@endmobile
@tablet
@include('layout.newhomepage.topsearch')
@endtablet
@desktop
@include('layout.newhomepage.topsearch')
@enddesktop
<!-- Top search header code End-->
@yield('content')
@include('layout.footer')
@include('layout.sidemenu')
@desktop
{{--@include('includes.exit-popup')--}}
@enddesktop
</body>
</html>
