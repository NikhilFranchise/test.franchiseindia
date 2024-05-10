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
{{-- @mobile --}}
@if ($agent->isMobile())

@include('layout.newhomepage.mobile.topsearch')
{{-- @endmobile --}}
@elseif ($agent->isTablet())

{{-- @tablet --}}
@include('layout.newhomepage.topsearch')
{{-- @endtablet --}}
@elseif ($agent->isDesktop())
{{-- @desktop --}}
@include('layout.newhomepage.topsearch')
@endif
{{-- @enddesktop --}}
<!-- Top search header code End-->

@yield('content')
@include('layout-hindi.footer')
@include('layout-hindi.sidemenu')
@if ($agent->isDesktop())
{{-- @desktop --}}
@include('includes.exit-popup')
@endif
{{-- @enddesktop --}}
</body>
</html>