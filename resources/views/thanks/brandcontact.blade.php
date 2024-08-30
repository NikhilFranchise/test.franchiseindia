@extends('layout.master')
@section('content')
     <div class="container mostpopu arttilist settops">
    <!--upcomimg event start here -->
	<div class="thanksmsg"><br>
		{!! $result !!}
		<br><br>
		@if( Auth::check() && Auth::user()->membership_type == 0 && Auth::user()->profile_type == 2 )
			<a href="{{URL('investor/myaccount/payment')}}" class="btn btn-default btn-red" >Upgrade Account</a>
		@endif
	</div>
 	<ul class="row cat-home-list otherpage">
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/automotive.m8" ><img src="{{url('images/automotivenew.png')}}" alt="automotivenew"><span>Automotive</span></a></li>
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/beauty-and-health.m1" ><img src="{{url('images/beautynew.png')}}" alt="beautynew"><span>Beauty & Health</span></a></li>
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/business-services.m6" ><img src="{{url('images/businessnew.png')}}" alt="businessnew"><span>Business Services</span></a></li>
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/dealers-and-distributors.m5" ><img src="{{url('images/dealersnew.png')}}" alt="dealersnew"><span>Dealers & Distributors</span></a></li>
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/education.m3" ><img src="{{url('images/educationnew.png')}}" alt="educationnew"><span>Education</span></a></li>
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/fashion.m10" ><img src="{{url('images/fashionnew.png')}}" alt="fashionnew"><span>Fashion</span></a></li>
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/food-and-beverage.m2" ><img src="{{url('images/foodnew.png')}}" alt="foodnew"><span>Food and Beverage</span></a></li>
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/home-based-business.m7" ><img src="{{url('images/homebasednew.png')}}" alt="homebasednew"><span>Home Based Business</span></a></li>
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/hotels-travel-and-tourism.m263" ><img src="{{url('images/hotelsnew.png')}}" alt="hotelsnew"><span>Hotels,Travel & Tourism</span></a></li>
	{{-- <li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/industrial-machinery-and-manufacturing.m573" ><img src="{{url('images/manufacturingnew.png')}}" alt="manufacturingnew"><span>Industrial Machinery & Manufacturing</span></a></li> --}}
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/retail.m9" ><img src="{{url('images/retailnew.png')}}" alt="retailnew"><span>Retail</span></a></li>
	<li class="col-xs-12 col-sm-2 col-md-2"><a href="https://www.franchiseindia.com/business-opportunities/sports-fitness-and-entertainment.m11" ><img src="{{url('images/entertainmentnew.png')}}" alt="entertainmentnew"><span>Sports & Fitness & Entertainment</span></a></li>
	</ul>
</div>
 @include('includes.banners-new.facebook-pixel')
@endsection
