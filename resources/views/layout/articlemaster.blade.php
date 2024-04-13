<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Article" @if(Request::segment(1) == 'hi') lang="hi" @endif>
<head>
@include('layout.head')
</head>
<body onload="checkCookie();">

<div class="o-wrapper" id="o-wrapper"></div>
@include('layout.headernew')
@yield('content')
@include('layout.sidemenu')
@include('includes.exit-popup')
</body>
</html>
