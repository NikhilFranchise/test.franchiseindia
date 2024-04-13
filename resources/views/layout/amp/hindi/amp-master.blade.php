<!doctype html>
<html amp>
@include('layout.amp.hindi.amp-head')
<body>
@include('layout.amp.hindi.amp-sidemenu')
<div class="main">
    @include('layout.amp.hindi.amp-header')
    @yield('content')
    @include('layout.amp.hindi.amp-footer')
</div>
</body>
</html>
