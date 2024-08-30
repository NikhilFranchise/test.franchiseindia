@extends('layout.master')
@section('content')
<div class="container formsection marginTB45 staicp">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="errorpage">404 <span>The page you requested is not available</span></div>

<div class="mesg">
<p>
Sorry, we are having a problem executing your request. It is possible your bookmark is old one or you just meet broken link.
Please refer to link about information.
</p>
<a  href="" onclick="window.history.go(-1);">Go back</a>  |  <a href="{{Config::get('constants.MainDomain')}}">Return to the homepage</a></div>

	<ul class="row cat-home-list">
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/automotive.m8" ><img src="{{url('images/automotivenew.png')}}" alt="automotivenew"><span>Automotive</span></a></li>
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/beauty-and-health.m1" ><img src="{{url('images/beautynew.png')}}" alt="beautynew"><span>Beauty & Health</span></a></li>
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/business-services.m6" ><img src="{{url('images/businessnew.png')}}" alt="businessnew"><span>Business Services</span></a></li>
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.dealerindia.com" target="_blank" ><img src="{{url('images/dealersnew.png')}}" alt="dealersnew"><span>Dealers & Distributors</span></a></li>
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/education.m3" ><img src="{{url('images/educationnew.png')}}" alt="educationnew"><span>Education</span></a></li>
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/fashion.m10" ><img src="{{url('images/fashionnew.png')}}" alt="fashionnew"><span>Fashion</span></a></li>
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/food-and-beverage.m2" ><img src="{{url('images/foodnew.png')}}" alt="foodnew"><span>Food and Beverage</span></a></li>
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/home-based-business.m7" ><img src="{{url('images/homebasednew.png')}}" alt="homebasednew"><span>Home Based Business</span></a></li>
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/hotels-travel-and-tourism.m263" ><img src="{{url('images/hotelsnew.png')}}" alt="hotelsnew"><span>Hotels,Travel & Tourism</span></a></li>
		{{-- <li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/industrial-machinery-and-manufacturing.m573" ><img src="{{url('images/manufacturingnew.png')}}" alt="manufacturingnew"><span>Industrial Machinery & Manufacturing</span></a></li> --}}
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/retail.m9" ><img src="{{url('images/retailnew.png')}}" alt="retailnew"><span>Retail</span></a></li>
		<li class="col-xs-12 col-sm-2 col-md-2"><a href="{{Config('constants.MainDomain')}}/business-opportunities/sports-fitness-and-entertainment.m11" ><img src="{{url('images/entertainmentnew.png')}}" alt="entertainmentnew"><span>Sports & Fitness & Entertainment</span></a></li>
	</ul>
</div>
</div>
</div>
<!--form end here -->
<div class="height40"></div>
@endsection