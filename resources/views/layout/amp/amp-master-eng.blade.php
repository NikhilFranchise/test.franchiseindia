<!doctype html>
<html amp>
@include('layout.amp.amp-head')
<body>
@include('layout.amp.amp-sidemenu')
<div class="main">
    @include('layout.amp.amp-header')
    @yield('content')
    @include('layout.amp.amp-footer')
</div>
</body>
</html>
