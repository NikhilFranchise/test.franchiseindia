<style type="text/css">
.c-menu { background:#202020;}
</style>
<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left" style="display:block;">
    <div class="wel-list-re">  <span class="c-menu__close"><img src="/images/close-right.png"></span></div>
    <div class="sidelinenew"></div>
    <ul class="side-list">
        <li></li>
        <li><a href="/international">Home</a></li>
        <li><a href="/business-opportunities/automotive.m8" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-1.png')}}" alt="Automotive"> Automotive</a>
        </li>
        <li><a href="/business-opportunities/beauty-and-health.m1" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-2.png')}}" alt="Beauty &amp; Health"> Beauty &amp; Health</a>
        </li>
        <li><a href="/business-opportunities/business-services.m6" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-3.png')}}" alt="Business Services"> Business Services</a>
        </li>
        <li><a href="/business-opportunities/dealers-and-distributors.m5" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-4.png')}}" alt="Dealers &amp; Distributors"> Dealers &amp; Distributors</a>
        </li>
        <li><a href="/business-opportunities/education.m3" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-5.png')}}" alt="Education"> Education</a>
        </li>
        <li><a href="/business-opportunities/fashion.m10" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-6.png')}}" alt="Fashion"> Fashion</a>
        </li>
        <li><a href="/business-opportunities/food-and-beverage.m2" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-7.png')}}" alt="Food &amp; Beverage"> Food &amp; Beverage</a>
        </li>
        <li><a href="/business-opportunities/home-based-business.m7" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-8.png')}}" alt="Home Based Business"> Home Based Business</a>
        </li>
        <li><a href="/business-opportunities/hotels-and-resorts.m263" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-9.png')}}" alt="Hotel, Travel &amp; Tourism"> Hotel, Travel &amp; Tourism</a>
        </li>
        <li><a href="/business-opportunities/industrial-machinery-and-manufacturing.m573" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-10.png')}}" alt="Industrial Machinery &amp; Manufacturing"> Industrial Machinery &amp; Manufacturing</a>
        </li>
        <li><a href="/business-opportunities/retail.m9" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-11.png')}}" alt="Retail"> Retail</a>
        </li>
        <li><a href="/business-opportunities/sports-fitness-and-entertainment.m11" target="_blank">
            <img src="{{url('franchiseinternational/images/cat-12.png')}}" alt="Sports, Fitness &amp; Entertainment"> Sports, Fitness &amp; Entertainment</a>
        </li>
    </ul>
    <div class="sideline"></div>
    <ul class="side-list">
        <li><a href="/advertise-with-us-payment/">Advertise With us</a></li>
        {{-- <li><a href="/emagazine/" target="_blank">Subscribe</a></li>  --}}
        <li><a href="https://master.franchiseindia.com/magazine-subscribe" target="_blank">Subscribe</a></li> 

        <li><a href="https://www.opportunityindia.com">News</a></li>
    </ul>
    <div class="sideline"></div>
    <ul class="side-list">
        <li><a href="/investor/create">Investor Signup</a></li>
        <li><a href="/franchisor/registration/step/1">Franchisor Signup</a></li>
    </ul>
    <div class="sideline"></div>
    <ul class="topsocialside">
        <li><a href="https://www.facebook.com/FranchiseIndiaMedia"  target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://twitter.com/FranchiseIndia"  target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="http://www.linkedin.com/company/102548?trk=tyah"  target="_blank"><i class="fa fa-linkedin"></i></a></li>
        <li><a href="http://www.youtube.com/user/FranchiseIndia"  target="_blank"><i class="fa fa-youtube-play"></i></a></li>
    </ul>
    <ul class="side-bot-list">
        <li><a href="/about">About us</a></li>
        <li><a href="/contact">Contact us</a></li>
        <li><a href="/feedback">Feedback</a></li>
    </ul>
    <div class="side-s-txt">Toll Free 1800 102 2007</div>
</nav>

<!-- /c-menu slide-right -->
@if (Auth::check())
@if ( Auth::user()->profile_type == config('constants.ProfileType.Investor') ) 
    <!-- /c-menu slide-right -->
    <nav id="c-menu--slide-right" class="c-menu c-menu--slide-right myaccount sidemy">
        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
            <div class="wel-list-re">  <span class="c-menu__close"><img alt="close button" src="{{url('images/close-right.png')}}"></span></div>
            <div class="welmy">Welcome
                <span>{{ Auth::user()->name }}</span>
                <a href="{{Config('constants.MainDomain')}}/logoutprofile"><span  class="btn btn-default myacout">Logout</span></a>
            </div>
            <div class="myline"></div> 
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
            <div class="">
                @if(Auth::user()->membership_plan < 405)
                <a href="{{Config('constants.MainDomain')}}/investor/myaccount/payment" class="btn btn-default sidebtn">Upgrade Account </a>
                @endif
                <div class="myline"></div> 
                <div class="parblk">
                    <div class="per">You completed <span>{{Cookie::get('invPercentage')}}%</span> Profile</div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{Cookie::get('invPercentage')}}" aria-valuemin="0" aria-valuemax="100" style="width:{{Cookie::get('invPercentage')}}%">
                        </div>
                    </div>
                </div>    
                <div class="myline marbtm"></div>
                <ul class="nvss">        
                    <li  @yield('db')><div><span class="icon-spc"><img alt="dashboard" src={{url('images/dashboard.png')}}></span><span class="fl"><a href="{{Config('constants.MainDomain')}}/investor/myaccount/dashboard">Dashboards</a></span></div></li>
                    <li  @yield('vp')><div><span class="icon-spc"><img alt="view profile" src={{url('images/view-profile.png')}}></span><span><a href="{{Config('constants.MainDomain')}}/investor/myaccount/viewprofile">View Profile</a></span></div></li>
                    <li  @yield('ep')><div><span class="icon-spc"><img alt="responses" src={{url('images/response.png')}}></span><span><a href="{{Config('constants.MainDomain')}}/investor/myaccount/expressed-interest">Expressed Interest</a></span>
                    </div></li>
                </ul>
                <div class="nav__list">               
                    <input id="group-7" type="checkbox" hidden  checked="checked"/>
                    <label for="group-7" class="myperp"> <img alt="view profile" src="{{url('images/manage-profile.png')}}" class="icon-spc"> <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span></label>
                    <ul class="nvss group-list pafdd">
                            <li @yield('pd')><a href="{{Config('constants.MainDomain')}}/investor/myaccount/personaldetails">Personal Details</a></li>
                            <li @yield('id')><a href="{{Config('constants.MainDomain')}}/investor/myaccount/investmentdetails">Investment Details</a></li>
                            <li @yield('prd')><a href="{{Config('constants.MainDomain')}}/investor/myaccount/propertydetails">Property Details</a></li>
                            <li @yield('bd')><a href="{{Config('constants.MainDomain')}}/investor/myaccount/businessdetails">Business Details</a></li>
                            <li @yield('jd')><a href="{{Config('constants.MainDomain')}}/investor/myaccount/jobdetails">Job Details</a></li>
                            @if(Auth::user()->membership_plan < 405)
                                <li @yield('pp')><a href="{{Config('constants.MainDomain')}}/investor/myaccount/payment">Payment</a></li>
                            @endif
                    </ul>
                </div>
                        
                <ul class="nvss mymenu">
                        <li @yield('rp')><div><span class="icon-spc"><img alt="response manager" src={{url('images/response-manager.png')}}></span><span><a href="{{Config('constants.MainDomain')}}/investor/myaccount/responsemanager">Response Manager</a></span></div></li>
                        <li @yield('AWS')><div><span class="icon-spc"><img alt="advertise with us" src="{{url('images/adverise-with-us.png')}}"></span><span><a href="{{Config('constants.MainDomain')}}/investor/myaccount/advertisewithus">Advertise With us</a></span></div></li>
                        <li @yield('cp')><div><span class="icon-spc"><img alt="password" src={{url('images/change-password.png')}}></span><span><a href="{{Config('constants.MainDomain')}}/investor/myaccount/changepassword">Change Password</a></span></div></li>
                </ul>
                <div class="myline"></div>    
                <a href="{{Config('constants.MainDomain')}}/investor/myaccount/feedback" class="btn btn-default sidebtn">Feedback</a>
            </div>
        </div>
    </nav>
@endif

@if ( Auth::user()->profile_type == config('constants.ProfileType.Franchisor') ) 
<!-- /c-menu slide-right -->
<nav id="c-menu--slide-right" class="c-menu c-menu--slide-right myaccount sidemy">
    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
        <div class="wel-list-re">  <span class="c-menu__close"><img alt="close" src="{{url('images/close-right.png')}}"></span></div>
        <div class="welmy">Welcome
        <span>{{ session()->get('name') }}</span>
        <a href="{{Config('constants.MainDomain')}}/logoutprofile"><span  class="btn btn-default myacout">Logout</span></a>
        </div>
        <div class="myline"></div> 
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
        <div class="">
            @if(Auth::user()->membership_plan < 405)
                <a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/payment-plan" class="btn btn-default sidebtn">Upgrade Account </a> 
            @endif        
            <div class="myline"></div>
            <div class="parblk">
                <div class="per">You completed <span>{{Cookie::get('franPercentage')}}%</span> Profile</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{Cookie::get('franPercentage')}}" aria-valuemin="0" aria-valuemax="100" style="width:{{Cookie::get('franPercentage')}}%"></div>
                </div>
            </div>
            <div class="myline marbtm"></div>
            <ul class="nvss">        
                <li @yield('db')><div><span class="icon-spc"><img alt="dashboard" src="{{url('images/dashboard.png')}}"></span><span class="fl"><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/dashboard">Dashboard</a></span></div></li>
                <li @yield('vp')><div><span class="icon-spc"><img alt="view profile" src="{{url('images/view-profile.png')}}"></span><span><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/view-profile">View Profile</a></span></div></li>
            </ul>
            
             <div class="nav__list">
               <input id="group-5" type="checkbox" hidden  checked="checked"/>
                <label for="group-5" class="myperp"> <img alt="response" src="{{url('images/response.png')}}" class="icon-spc"> <p class="manetxt">Response</p> <span class="fa fa-angle-down"></span></label>
                <ul class="nvss group-list pafdd">
                    <li @yield('ir')><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/insta-response">Insta Response</a></li>
                    <li @yield('ei')><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/expressed-interest">Expressed Interest</a></li>      
                </ul>   
            </div>
            
            <div class="nav__list">               
                <input id="group-4" type="checkbox" hidden  checked="checked"/>
                <label for="group-4" class="myperp"> <img alt="manage profile" src="{{url('images/manage-profile.png')}}" class="icon-spc"> <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span></label>
                <ul class="nvss group-list pafdd">
                    <li @yield('bd')><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/businessdetails">Business</a></li>
                    <li @yield('pd')><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/professionaldetails">Professional</a></li>
                    <li @yield('prd')><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/propertydetails">Franchise/Property</a></li>
                    <li @yield('ta')><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/training-aggrement-details">Training/Agreements</a></li>
                    @if(Auth::user()->membership_type == 0)
                       <li @yield('pp')><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/payment-plan">Payment</a></li>
                    @else
                       <li @yield('Ap')><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/appearance">appearance</a></li>
                    @endif
                </ul>
            </div>            
            
            <ul class="nvss">     
                <li @yield('rp')><div><span class="icon-spc"><img alt="response manager" src="{{url('images/response-manager.png')}}"></span><span><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/responsemanager">Response Manager</a></span></div></li>
                <li @yield('AWS')><div><span class="icon-spc"><img alt="advertise with us" src="{{url('images/adverise-with-us.png')}}"></span><span><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/advertisewithus">Advertise With us</a></span></div></li>
                <li @yield('cp')><div><span class="icon-spc"><img alt="change password" src="{{url('images/change-password.png')}}"></span><span><a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/changepassword">Change Password</a></span></div></li>
            </ul>

            <div class="myline"></div>    
            <a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/feedback" class="btn btn-default sidebtn">Feedback</a>
        </div>        
    </div>
</nav>
@endif
@endif
<!-- /c-menu slide-right -->
<div id="c-mask" class="c-mask"></div>
<!-- /c-mask -->
