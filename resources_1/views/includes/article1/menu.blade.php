@php
    $hindiUrl = url('/hi/content');//str_replace( '/category/', '/hi/category/', str_replace('/business-opportunities/', '/hi/business-opportunities/', url()->current()));
    $engUrl   = url('/content');//url()->current();
@endphp
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
<div class="topmenu">
<div class="container">
<div class="topright">
  <ul class="togl">
    <li {{ (Request::segment(1) == 'hi') ? '' : 'class=active' }}><a href="{{$engUrl}}">English</a></li>
    <li {{ (Request::segment(1) == 'hi') ? 'class=active' : '' }}><a href="{{$hindiUrl}}">Hindi</a></li>
  </ul>
  <div class="tuser"><img src="{{asset('article/images/profile-user.svg')}}" alt=""></div>
</div>
</div>
</div>
<div class="logobar">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-12 d-flex align-items-center">

          <!-- Uncomment below if you prefer to use an image logo -->
           <a href="#" class="logo mr-auto"><img src="{{asset('article/images/logo.svg')}}" alt=""></a>

          <nav class="nav-menu d-none d-lg-block">
            <ul>

<!--               <li class="active"><a href="#">Home</a></li> -->
                <li><a href="#">Small Business</a></li>
              <li><a href="#">Startup Nation/ Start It Up</a></li>
              <li><a href="#">Local Business</a></li>
              <li><a href="#">EmergIndia</a></li>
              <li><a href="#">Media</a></li>
                       <li><a href="#">Video & Podcast</a></li>

            </ul>
          </nav><!-- .nav-menu -->
          <div class="sear ml-auto"><a href="#" ><img src="{{asset('article/images/searchicon.svg')}}" alt=""></a></div>

        </div>
      </div>
    </div>
   </div>
  </header><!-- End Header -->