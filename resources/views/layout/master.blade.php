<!DOCTYPE html>
<html>
<head>
    @include('layout.head')
</head>
<body onLoad=checkCookie()>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NW38FD" height=0 width=0 style=display:none;visibility:hidden></iframe></noscript>
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
{{-- @mobile --}}
@if ($agent->isMobile())
@include('layout.newhomepage.mobile.topsearch')
@elseif ($agent->isTablet())    
@include('layout.newhomepage.topsearch')
@else
@include('layout.newhomepage.topsearch')
@endif
{{-- @endmobile
@tablet
@endtablet
@desktop
@enddesktop --}}
<!-- Top search header code End-->
@yield('content')
@include('layout.footer')
@include('layout.sidemenu')

</body>
</html>