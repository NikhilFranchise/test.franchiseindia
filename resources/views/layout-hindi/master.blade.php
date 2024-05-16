<!DOCTYPE html>
<html>
<head>
    @include('layout.head')
</head>
<body class=fullhindi onLoad=checkCookie()>
<div class=o-wrapper id=o-wrapper></div>
<div class=backdrop id=closecatnew></div>
@include('layout-hindi.header')
@if(url()->current() == url('hi') || url()->current() == url('hi/premiumbrand'))
@else
    <div class="innerloginblk hindi">
        @include('includes.login-events-hindi')
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
@include('layout-hindi.footer')
@include('layout-hindi.sidemenu')
@desktop
@include('includes.exit-popup')
@enddesktop
</body>
</html>