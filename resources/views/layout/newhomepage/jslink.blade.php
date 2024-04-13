<!-- Popper.JS -->
<script src="{{url('newhomepage/assets/vendor/popper/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{url('newhomepage/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="{{url('newhomepage/assets/vendor/mCustomScrollbar/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Font Awesome JS -->
<script defer src="{{url('newhomepage/assets/vendor/fontawesome/js/solid.js')}}"></script>
<script defer src="{{url('newhomepage/assets/vendor/fontawesome/js/fontawesome.js')}}"></script>
<!-- swiper@6.2.0 JS -->
<script src="{{url('newhomepage/assets/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
<!-- Owl carousel -->
<script src="{{url('newhomepage/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>

@if ($agent->isDesktop())
<script src="{{url('newhomepage/assets/js/app.js')}}"></script>

@elseif ($agent->isTablet())

<script src="{{url('newhomepage/assets/js/app.mobile.js')}}"></script>

@else
<script src="{{url('newhomepage/assets/js/app.mobile.js')}}"></script>

@endif
<script type="text/javascript" src="{{url('awesomplete/awesomplete.js') }}"></script>


