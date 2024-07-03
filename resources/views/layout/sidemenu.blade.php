@php
    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if(request()->segment(1) == 'wellness') {
        $fb = "https://www.facebook.com/WellnessInd/";
        $twitter = "https://twitter.com/wellnessind";
        $linkedin = "https://www.linkedin.com/in/indian-salon-and-wellness-congress-2146a8a5/";
        $youtube = "https://www.youtube.com/user/FranchiseIndia";
        $url = "wellness";
        $isinsta = 0;
    } elseif(request()->segment(1) == 'education') {
        $url = "education";
        $fb = "https://www.facebook.com/Educationbizcom-226779064413676/";
        $twitter = "https://twitter.com/educationbizin";
        $linkedin = "https://www.linkedin.com/company/102548?trk=tyah";
        $youtube = "https://www.youtube.com/user/FranchiseIndia";
        $isinsta = 0;
    } else {
        $url = "site";
        $fb = "https://www.facebook.com/FranchiseIndiaMedia";
        $twitter = "https://twitter.com/FranchiseIndia";
        $linkedin = "https://www.linkedin.com/company/102548?trk=tyah";
        $youtube = "https://www.youtube.com/user/FranchiseIndia";
        $isinsta = 1;
    }

@endphp
@mobile
@if (Auth::check())
    @if ( Auth::user()->profile_type == config('constants.ProfileType.Investor') )
        <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span></div>
                <div class="welmy">Welcome
                    <span class="username">{{ Auth::user()->name }}</span>
                    <a href="/logoutprofile"><span class="btn btn-default myacout btn-logout">Logout</span></a>
                </div>
                <div class="myline"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                <div class="upgrade-section">
                    <a href="/investor/myaccount/payment" class=" sidebtn">Upgrade Account </a>
                    <div class="myline"></div>
                    <div class="parblk">
                        <div class="per">You completed <span>44%</span> Profile</div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100" style="width:44%">
                            </div>
                        </div>
                    </div>
                    <div class="myline marbtm"></div>
                    <ul class="nvss">
                        <li><div><span class="icon-spc"><img alt="dashboard" src="https://www.franchiseindia.com/images/dashboard.png"></span><span class="fl"><a href="/investor/myaccount/dashboard">Dashboards</a></span></div></li>
                        <li><div><span class="icon-spc"><img alt="view profile" src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a href="/investor/myaccount/viewprofile">View Profile</a></span></div></li>
                        <li><div><span class="icon-spc"><img alt="response" src="https://www.franchiseindia.com/images/response.png"></span><span><a href="/investor/myaccount/expressed-interest">Expressed Interest</a></span>
                            </div></li>
                    </ul>
                    <div class="nav__list">
                        <input id="group-7" type="checkbox" hidden="" checked="checked">
                        <label for="group-7" class="myperp"> <img alt="manage profiles" src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc"> <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span></label>
                        <ul class="nvss group-list pafdd">
                            <li class="selected"><a href="/investor/myaccount/personaldetails">Personal Details</a></li>
                            <li><a href="/investor/myaccount/investmentdetails">Investment Details</a></li>
                            <li><a href="/investor/myaccount/propertydetails">Property Details</a></li>
                            <li><a href="/investor/myaccount/businessdetails">Professional Details</a></li>
                            <li><a href="/investor/myaccount/payment">Payment</a></li>
                        </ul>
                    </div>
                    <ul class="nvss mymenu">
                        <li><div><span class="icon-spc"><img alt="response manager" src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a href="/investor/myaccount/responsemanager">Response Manager</a></span></div></li>
                        <li><div><span class="icon-spc"><img alt="advertise with us" src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a href="/investor/myaccount/advertisewithus">Advertise With us</a></span></div></li>
                        <li><div><span class="icon-spc"><img alt="change password" src="https://www.franchiseindia.com/images/change-password.png"></span><span><a href="/investor/myaccount/changepassword">Change Password</a></span></div></li>
                    </ul>
                    <div class="myline"></div>
                    <a href="/investor/myaccount/feedback" class="sidebtn">Feedback</a>
                </div>
            </div>
        </nav>
    @endif
    @if ( Auth::user()->profile_type == config('constants.ProfileType.Franchisor') )
        <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img src="https://www.franchiseindia.com/images/close-right.png" alt="close btn" id="close_Btn"></span></div>
                <div class="welmy">Welcome
                    <span class="username">{{ session()->get('name') }}</span>
                    <a href="{{Config('constants.MainDomain')}}/logoutprofile"><span class="btn btn-default myacout btn-logout">Logout</span></a>
                </div>

                <div class="myline"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                <div class="upgrade-section">
                    @if(Auth::user()->membership_plan < 405)
                        <a href="{{Config('constants.MainDomain')}}/franchisor/myaccount/payment-plan" class=" sidebtn">Upgrade Account </a>
                    @endif

                    <div class="myline"></div>

                    <div class="parblk">
                        <div class="per">You completed <span>{{Cookie::get('franPercentage')}}%</span> Profile</div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100" style="width:44%">
                            </div>
                        </div>
                    </div>
                    <div class="myline marbtm"></div>
                    <ul class="nvss">
                        <li><div><span class="icon-spc"><img alt="dashboard" src="https://www.franchiseindia.com/images/dashboard.png"></span><span class="fl"><a href="/franchisor/myaccount/dashboard">Dashboards</a></span></div></li>
                        <li><div><span class="icon-spc"><img alt="view profile" src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a href="/franchisor/myaccount/viewprofile">View Profile</a></span></div></li>
                        <li><div><span class="icon-spc"><img alt="response" src="https://www.franchiseindia.com/images/response.png"></span><span><a href="/franchisor/myaccount/expressed-interest">Expressed Interest</a></span>
                            </div></li>
                    </ul>
                    <div class="nav__list">
                        <input id="group-7" type="checkbox" hidden="" checked="checked">
                        <label for="group-7" class="myperp"> <img alt="manage profiles" src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc"> <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span></label>
                        <ul class="nvss group-list pafdd">
                            <li class="selected"><a href="/franchisor/myaccount/personaldetails">Personal Details</a></li>
                            <li><a href="/franchisor/myaccount/investmentdetails">Investment Details</a></li>
                            <li><a href="/franchisor/myaccount/propertydetails">Property Details</a></li>
                            <li><a href="/franchisor/myaccount/businessdetails">Professional Details</a></li>
                            <li><a href="/franchisor/myaccount/payment">Payment</a></li>
                        </ul>
                    </div>
                    <ul class="nvss mymenu">
                        <li><div><span class="icon-spc"><img alt="response manager" src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a href="/franchisor/myaccount/responsemanager">Response Manager</a></span></div></li>
                        <li><div><span class="icon-spc"><img alt="advertise with us" src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a href="/franchisor/myaccount/advertisewithus">Advertise With us</a></span></div></li>
                        <li><div><span class="icon-spc"><img alt="change password" src="https://www.franchiseindia.com/images/change-password.png"></span><span><a href="/franchisor/myaccount/changepassword">Change Password</a></span></div></li>
                    </ul>
                    <div class="myline"></div>
                    <a href="/franchisor/myaccount/feedback" class="sidebtn">Feedback</a>
                </div>
            </div>
        </nav>
    @endif
@endif
@endmobile
<nav id="sidebar">
    <div id="dismiss">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </div>
    <ul class="list-unstyled components border-bottom-1 pt-35">
        <li>
            <div class="google-search">
                <script>
                    (function() {
                        var cx = '017593288126496616373:bpgflqv932a';
                        var gcse = document.createElement('script');
                        gcse.type = 'text/javascript';
                        gcse.async = true;
                        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                        let s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(gcse, s);
                    })();
                </script>
                <gcse:searchbox-only resultsUrl="{{ url('/search') }}" newWindow="true" queryParameterName="search"></gcse:searchbox-only>
                <link rel="stylesheet" href="https://www.google.com/cse/style/look/greensky.css" type="text/css" />
            </div>
        </li>
        @mobile
        @if($__env->yieldContent('hindiUrl'))
        <li>
        <div class="p-2 language-main-bx">
        <div class="input-group
        input-group-custom">
        <span class="input-group-addon
        input-group-prepend-custom" id="basic-addon1">
        <img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg" alt="Language">
        </span>
        <div class="form-group form-group-sm">

        <select class="form-control
        form-control-custom-main" id="language-changer">
        <option hidden="">Language </option>
        <option value="@yield('englishUrl')" @if($engUrl == Request::url()) selected @endif>EN - English</option>
        <option value="@yield('hindiUrl')" @if($hindiUrl == Request::url()) selected @endif>HI - Hindi</option>
        </select>
        </div>
        </div>
        </div>
        </li>
        @endif
        @endmobile
        <li>&nbsp;</li>
        <li>
            <a target="_blank" href="/">Domestic Brands</a>
        </li>
        <li>
            <a target="_blank" href="/premiumbrand">Premium Brands</a>
        </li>
        <li>
            <a target="_blank" href="/international">International</a>
        </li>
    </ul>
    <ul class="list-unstyled components border-bottom-1">
        <!--<li><a target="_blank" href="/content">Franchise Insights</a></li>
        <li><a target="_blank" href="https://news.franchiseindia.com/">News</a></li>-->
		<li><a target="_blank" href="https://www.franchiseindia.com/insights">Franchise Insights</a></li>
        <li><a target="_blank" href="https://www.opportunityindia.com/">News</a></li>
        <li>
            <a target="_blank" href="https://video.franchiseindia.com/">Video</a>
        </li>
        <li>
            <!-- <a target="_blank" href="/magazine">Magazine</a> -->
            <a target="_blank" href="https://master.franchiseindia.com/magazine-subscribe/">Magazine</a>
        </li>
		<li><a href="{{ url('top-100-franchise') }}" target="_blank">Top 100 Franchise</a></li>
		<li><a href="{{ url('/most-visitedbrands') }}" target="_blank">Most Searched Franchise Brands</a></li>
    </ul>

    <div class="categoryall-franchise border-bottom-1">
        <div class="busheadmebu"><a target="_blank" href="/categoryall">Franchise
                Categories</a>
        </div>
        @php
            $categoryArr = Config('constants.CategoryArr');
            asort($categoryArr);
            $i = 0;
        @endphp
		
      
		<ol class="tree">
                @foreach($categoryArr as $key => $value)
                    @php
                        $catClass = "Cate".$key;
                        $subcatClass = "SubCat".$key;
                        $subsubcatClass = "";
                    @endphp
                    <li>
                    <label for="folder1">
                        <a target="_blank"
                           href="{{($key == '5') ? Config::get('constants.OIDomain') : '/business-opportunities/'.Config('category.SeoCategoryArr.'.$key).'.m'.$key }}
                           ">{{$value}}</a>
                    </label> <input type="checkbox" id="folder1">
                    <ol>
                        @foreach(Config('constants.subCategoryArr.'.$key) as $key1 => $value1) 
                            <li>
                                <label for="subsubfolder1">
                                    <a target="_blank"
                                       href="{{  ($key == '5') ?  Config::get('constants.OIDomain').((!empty(Config::get('category.SeoSubCategoryArr.'.$key1))) ? '/dir/'.Config('category.SeoSubCategoryArr.'.$key1) : '') : '/business-opportunities/'.Config('category.SeoSubCategoryArr.'.$key1).'.sc'.$key1 }}">{{$value1}}</a></label> <input type="checkbox" id="subsubfolder1">
                                <ol>
                                    @foreach(Config('constants.subSubCategoryArr.'.$key1) as $key2 => $value2)
                                        @if(in_array($key2, json_decode(\Illuminate\Support\Facades\Storage::getFacadeRoot()->get('ssc.json'), true)))
                                            <li>
<a target="_blank" href="{{ ($key == '5') ? Config::get('constants.OIDomain').((!empty(Config::get('category.SeoSubSubCategoryArr.'.$key2))) ? '/dir/'.Config('category.SeoSubSubCategoryArr.'.$key2) : '') : '/business-opportunities/'.Config('category.SeoSubSubCategoryArr.'.$key2).'.ssc'.$key2 }} ">{{$value2}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ol>
                </li>

                @endforeach
                <li>
				  <span class="shaicon">
					<div class="rightdimg"></div>
				  </span>
                    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lowcost">Low Cost Business Opportunities</a>
                </li>
            </ol>
    </div>

    <div class="busheadmebu martop">Our Group website
    </div>
    <ul class="list-unstyled components border-bottom-1">

        <li><a target="_blank" href="https://www.franchiseindia.com/"
               rel="nofollow">franchiseindia.com</a></li>
        <li><a target="_blank"
               href="https://www.entrepreneur.com/" rel="nofollow">entrepreneur.com</a></li>
        <li><a target="_blank" href="https://www.indianretailer.com/"
               rel="nofollow">indianretailer.com</a></li>
        <!--<li><a target="_blank" href="https://www.restaurantindia.in">restaurantindia.in</a></li>
        <li><a target="_blank" href="https://www.franchiseindia.com/wellness/">wellnessindia.org</a></li>
        <li><a target="_blank" href="https://www.franchiseindia.com/education/">educationbiz.com</a></li>-->
		<li><a target="_blank" href="https://restaurant.indianretailer.com">restaurantindia.in</a></li>
        <li><a target="_blank" href="https://www.opportunityindia.com/english/tag/health-and-wellness">wellnessindia.org</a></li>
        <li><a target="_blank" href="https://www.opportunityindia.com/english/tag/education">educationbiz.com</a></li>
        <!--<li><a target="_blank" href="https://www.franchise.ae/" rel="nofollow">franchise.ae</a></li>-->
        <li><a target="_blank" href="https://www.franchisebangladesh.com/"
               rel="nofollow">franchisebangladesh.com</a> </li>
        <li><a
                    target="_blank" href="https://www.businessex.com/" rel="nofollow">businessex.com</a></li>
        <li><a target="_blank" href="https://www.licenseindia.com/"
               rel="nofollow">licenseindia.com</a></li>
        <li><a target="_blank"
               href="https://www.bradfordlicenseindia.com/" rel="nofollow">bradfordlicenseindia.com</a>
        </li>
        <li><a target="_blank" href="https://www.franchiseindia.net/"
               rel="nofollow">franchiseindia.net</a></li>
        <li><a target="_blank"
               href="https://www.franchiseindia.in/" rel="nofollow">franchiseindia.in</a></li>
        <li><a target="_blank" href="https://www.francorp.in/" rel="nofollow">francorp.in</a></li>
        <li><a target="_blank" href="https://www.franglobal.com/"
               rel="nofollow">franglobal.com</a></li>
        <li><a target="_blank"
               href="http://www.franchiseindiaventures.com/" rel="nofollow">franchiseindiaventures.com</a></li>
        <li><a target="_blank" href="https://www.gauravmarya.com/"
               rel="nofollow">gauravmarya.com</a></li>
                <li><a target="_blank" href="https://www.franchiseafrica.co/"
               rel="nofollow">franchiseafrica.co</a></li>
    </ul>
    <ul class="list-unstyled components border-bottom-1">
        <li>
            <a href="https://www.businessex.com/" target="_blank">Sell your Business</a>
        </li>
		<li>
        <a href="https://www.licenseindia.com/" target="_blank">Buy a Brand License</a>
        </li>
        <li><a href="#expandFranchise" target="_blank">Expand Your Franchise</a></li>
        <li><a href="https://www.franchiseindia.com/property-loan" target="_blank">Loan Against Property</a></li>
    </ul>
    <ul class="list-unstyled components border-bottom-1">
        <li><a href="https://www.franchiseindia.com/advertise-with-us-payment"
               target="_blank">Advertise With us</a></li>
<!--         <li><a href="https://master.franchiseindia.com/emagazine/"
               target="_blank">Subscribe Magazine</a></li> -->
               <li><a href="https://master.franchiseindia.com/magazine-subscribe/"
               target="_blank">Subscribe Magazine</a></li>
        <li><a href="https://www.franchiseindia.com/book" target="_blank">Reports
                &amp; Books</a>
        </li>
        <li><a href="https://www.franchiseindia.com/event/" target="_blank">Event</a></li>
    </ul>
    <ul class="list-unstyled components">
        <li><a href="https://www.franchiseindia.com/investor/create"
               target="_blank">Investor Signup</a></li>
        <li><a href="https://www.franchiseindia.com/franchisor/registration/step/1"
               target="_blank">Franchisor Signup</a></li>
        <li>
            <div class="side-bar-social">
                <ul class="sidebar-social">
                    <li>
                        <a href="{{$fb}}"
                           target="_blank">
                            <img src="{{url('newhomepage/assets/img/fb-icon.svg')}}" alt="facebook-icon">
                        </a>
                    </li>
                    <li>
                        <a href="{{$twitter}}" target="_blank">
                            <img src="{{url('newhomepage/assets/img/twitter-icon.svg')}}" alt="twitter-icon">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/franchiseindia_/"
                           target="_blank">
                            <img src="{{url('newhomepage/assets/img/instagram-icon.svg')}}" alt="instagram-icon">
                        </a>
                    </li>
                    <li>
                        <a href="{{ $youtube }}"
                           target="_blank">
                            <img src="{{url('newhomepage/assets/img/you-tube-icon.svg')}}" alt="youtube-icon">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/franchiseindia/"
                           target="_blank">
                            <img src="{{url('newhomepage/assets/img/linkedin-new.svg')}}" alt="linkedin-icon">
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <div class="main-link">
                <ul class="main-link-section">
                    <li><a href="https://www.franchiseindia.com/about"
                           target="_blank">About us</a></li>
                    <li><a href="https://www.franchiseindia.com/contact"
                           target="_blank">Contact us</a></li>
                    <li><a href="https://www.franchiseindia.com/feedback"
                           target="_blank">Feedback</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="contact-us-section">
                Toll Free 1800 102 2007
            </div>
        </li>
    </ul>
</nav>



{{--@php--}}
    {{--$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];--}}
    {{--if(request()->segment(1) == 'wellness') {--}}
        {{--$fb = "https://www.facebook.com/WellnessInd/";--}}
        {{--$twitter = "https://twitter.com/wellnessind";--}}
        {{--$linkedin = "https://www.linkedin.com/in/indian-salon-and-wellness-congress-2146a8a5/";--}}
        {{--$youtube = "https://www.youtube.com/user/FranchiseIndia";--}}
        {{--$url = "wellness";--}}
        {{--$isinsta = 0;--}}
    {{--} elseif(request()->segment(1) == 'education') {--}}
        {{--$url = "education";--}}
        {{--$fb = "https://www.facebook.com/Educationbizcom-226779064413676/";--}}
        {{--$twitter = "https://twitter.com/educationbizin";--}}
        {{--$linkedin = "https://www.linkedin.com/company/102548?trk=tyah";--}}
        {{--$youtube = "https://www.youtube.com/user/FranchiseIndia";--}}
        {{--$isinsta = 0;--}}
    {{--} else {--}}
        {{--$url = "site";--}}
        {{--$fb = "https://www.facebook.com/FranchiseIndiaMedia";--}}
        {{--$twitter = "https://twitter.com/FranchiseIndia";--}}
        {{--$linkedin = "https://www.linkedin.com/company/102548?trk=tyah";--}}
        {{--$youtube = "https://www.youtube.com/user/FranchiseIndia";--}}
        {{--$isinsta = 1;--}}
    {{--}--}}
{{--@endphp--}}
{{--<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left">--}}
    {{--<div class="login-p-home">--}}
        {{--<ul class="wel-list">--}}
            {{--<li>--}}
                {{--<a href="{{ url('/') }}">Home</a> <!--web site url end here-->--}}
				{{--@mobile--}}
                {{--@if($__env->yieldContent('hindiUrl'))--}}
                    {{--<!--web site url end here-->--}}
                    {{--<div class="mainrighthindi" id="changeLang1"> <div class="rigarthindi">अ / A <i class="fa fa-chevron-down" aria-hidden="true"></i></div>--}}
                        {{--<div class="contwid" id="langType1">--}}
                            {{--<div class="linkdrop"><a href="@yield('hindiUrl')">हिंदी</a></div>--}}
                            {{--<div class="linkdrop"><a href="@yield('englishUrl')">English</a></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endif--}}
				{{--@endmobile--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<div class="wel-list-re"> <button class="c-menu__close"><div class="login-closesprite"></div></button></div>--}}
    {{--</div>--}}
    {{--<div class="busheadmebu marmodfy">--}}
        {{--<div class="searchblk">--}}
            {{--<script>--}}
                {{--(function() {--}}
                    {{--var cx = '017593288126496616373:bpgflqv932a';--}}
                    {{--var gcse = document.createElement('script');--}}
                    {{--gcse.type = 'text/javascript';--}}
                    {{--gcse.async = true;--}}
                    {{--gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;--}}
                    {{--let s = document.getElementsByTagName('script')[0];--}}
                    {{--s.parentNode.insertBefore(gcse, s);--}}
                {{--})();--}}
            {{--</script>--}}
            {{--<gcse:searchbox-only resultsUrl="{{ url('/search') }}" newWindow="true" queryParameterName="search"></gcse:searchbox-only>--}}
            {{--<link rel="stylesheet" href="https://www.google.com/cse/static/style/look/greensky.css" type="text/css" />--}}
        {{--</div>--}}

    {{--</div>--}}
    {{--<div class="sideline"></div>--}}

    {{--<ul class="side-list">--}}
        {{--<li>--}}
            {{--hgcfxcghjk--}}
            {{--<div class="p-2 language-main-bx">--}}
                {{--<div class="input-group--}}
                                      {{--input-group-custom">--}}
                                      {{--<span class="input-group-addon--}}
                                         {{--input-group-prepend-custom" id="basic-addon1">--}}
                                         {{--<img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg" alt="">--}}
                                      {{--</span>--}}
                    {{--<div class="form-group form-group-sm">--}}
                        {{--<select class="form-control--}}
                                            {{--form-control-custom-main" id="exampleFormControlSelect1">--}}
                            {{--<option hidden="">Language</option>--}}
                            {{--<option>EN - English</option>--}}
                            {{--<option>HI - Hindi</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</li>--}}
        {{--<li><a target="_blank" href="/">Domestic Brands</a></li>--}}
        {{--<li><a target="_blank" href="/premiumbrand">Premium Brands</a></li>--}}
        {{--<li><a target="_blank" href="/international">International</a></li>--}}
    {{--</ul>--}}
    {{--<div class="sideline"></div>--}}
    {{--<ul class="side-list">--}}
        {{--<li><a target="_blank" href="/content">Franchise Insights</a></li>--}}
        {{--<li><a target="_blank" href="https://news.franchiseindia.com/">News</a></li>--}}
        {{--<li><a target="_blank" href="https://video.franchiseindia.com/" target="_blank">Video</a></li>--}}
        {{--<li><a target="_blank" href="/magazine">Magazine</a></li>--}}
    {{--</ul>--}}
    {{--<div class="sideline"></div>--}}
    {{--<div class="busheadmebu"><a target="_blank" href="/categoryall">Franchise Categories</a></div>--}}
    {{--<ol class="tree">--}}
        {{--@php--}}
            {{--$categoryArr = Config('constants.CategoryArr');--}}
            {{--asort($categoryArr);--}}
        {{--@endphp--}}
        {{--@foreach($categoryArr as $key => $value)--}}
            {{--<li>--}}
                {{--<label for="folder1">--}}
                    {{--<a target="_blank" href="/business-opportunities/{{Config('category.SeoCategoryArr.'.$key)}}.m{{$key}}">{{$value}}</a>--}}
                {{--</label> <input type="checkbox" id="folder1" />--}}
                {{--<ol>--}}
                    {{--@foreach(Config('constants.subCategoryArr.'.$key) as $key1 => $value1)--}}
                        {{--<li>--}}
                            {{--<label for="subsubfolder1"><a target="_blank" href="/business-opportunities/{{Config('category.SeoSubCategoryArr.'.$key1)}}.sc{{$key1}}">{{$value1}}</a></label> <input type="checkbox" id="subsubfolder1" />--}}
                            {{--<ol>--}}
                                {{--@foreach(Config('constants.subSubCategoryArr.'.$key1) as $key2 => $value2)--}}
                                    {{--@if(in_array($key2, json_decode(\Illuminate\Support\Facades\Storage::getFacadeRoot()->get('ssc.json'), true)))--}}
                                        {{--<li><a target="_blank" href="/business-opportunities/{{Config('category.SeoSubSubCategoryArr.'.$key2)}}.ssc{{$key2}}">{{$value2}}</a></li>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--</ol>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ol>--}}
            {{--</li>--}}
        {{--@endforeach--}}
        {{--<li><span class="shaicon"><div class="reddownrightsprite"></div></span><a target="_blank" href="{{ url('business-opportunities/lowcost') }}">Low Cost Business Opportunities</a></li>--}}
    {{--</ol>--}}
    {{--<div class="sideline"></div>--}}
    {{--<div class="busheadmebu">Our Group website</div>--}}
    {{--<ul class="side-list"> <li><a target="_blank" href="https://www.franchiseindia.com/" rel="nofollow">franchiseindia.com</a></li> <li><a target="_blank" href="http://www.entrepreneur.com/" rel="nofollow">entrepreneur.com</a></li> <li><a target="_blank" href="https://www.indianretailer.com/" rel="nofollow">indianretailer.com</a></li> <li><a target="_blank" href="https://www.restaurantindia.in">restaurantindia.in</a></li> <li><a target="_blank" href="https://www.franchiseindia.com/wellness/">wellnessindia.org</a></li> <li><a target="_blank" href="https://www.franchiseindia.com/education/" target="_blank">educationbiz.com</a></li> <li><a target="_blank" href="http://www.franchise.ae/" rel="nofollow">franchise.ae</a></li> <li><a target="_blank" href="http://www.franchisebangladesh.com/" rel="nofollow">franchisebangladesh.com</a> </li> <li><a target="_blank" href="http://www.businessex.com/" rel="nofollow">businessex.com</a></li> <li><a target="_blank" href="https://www.licenseindia.com/" rel="nofollow">licenseindia.com</a></li> <li><a target="_blank" href="https://www.bradfordlicenseindia.com/" rel="nofollow">bradfordlicenseindia.com</a> </li> <li><a target="_blank" href="https://www.franchiseindia.net/" rel="nofollow">franchiseindia.net</a></li> <li><a target="_blank" href="https://www.franchiseindia.in/" rel="nofollow">franchiseindia.in</a></li> <li><a target="_blank" href="https://www.francorp.in/" rel="nofollow">francorp.in</a></li> <li><a target="_blank" href="https://www.franglobal.com/" rel="nofollow">franglobal.com</a></li> <li><a target="_blank" href="http://www.franchiseindiaventures.com/" rel="nofollow">franchiseindiaventures.com</a></li> <li><a target="_blank" href="https://www.gauravmarya.com/" rel="nofollow">gauravmarya.com</a></li> </ul>--}}
    {{--<div class="sidelinenew"></div>--}}
    {{--<ul class="side-list">--}}
        {{--<li><a href="https://www.businessex.com/">Buy/Sell Existing Business</a></li>--}}
        {{--<li><a href="{{ url('#expandFranchise') }}" target="_blank">Expand Your Franchise</a></li>--}}
        {{--<li><a href="{{ url('property-loan') }}" target="_blank">Loan Against Property</a></li>--}}
    {{--</ul>--}}
    {{--<div class="sideline"></div>--}}
    {{--<ul class="side-list">--}}
        {{--<li><a href="{{ url('advertise') }}" target="_blank">Advertise With us</a></li>--}}
        {{--<li><a href="https://master.franchiseindia.com/emagazine/shop/" target="_blank">Subscribe Magazine</a></li>--}}
        {{--<li><a href="{{ url('book') }}" target="_blank">Reports & Books</a></li>--}}
        {{--<li><a href="https://www.franchiseindia.com/event/" target="_blank">Event</a></li>--}}
    {{--</ul>--}}
    {{--<div class="sideline"></div>--}}
    {{--<ul class="side-list">--}}
        {{--<li><a href="https://www.franchiseindia.com/investor/create" target="_blank">Investor Signup</a></li>--}}
        {{--<li><a href="https://www.franchiseindia.com/franchisor/registration/step/1" target="_blank">Franchisor Signup</a></li>--}}
    {{--</ul>--}}
    {{--<div class="sideline"></div>--}}
    {{--<ul class="topsocialside">--}}
        {{--<li><a href="{{ $fb }}" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>--}}
        {{--<li><a href="{{ $twitter }}" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>--}}
        {{--<li><a href="{{ $linkedin }}" target="_blank"><i class="fa fa-linkedin fa-lg"></i></a></li>--}}
        {{--<li><a href="{{ $youtube }}" target="_blank"><i class="fa fa-youtube-play fa-lg"></i></a></li>--}}
        {{--@if($isinsta == 1)--}}
            {{--<li><a href="https://www.instagram.com/franchiseindia_/" target="_blank"><i class="fa fa-instagram fa-lg"></i></a></li>--}}
        {{--@endif--}}
    {{--</ul>--}}
    {{--<ul class="side-bot-list">--}}
        {{--<li><a href="https://www.franchiseindia.com/about" target="_blank">About us</a></li>--}}
        {{--<li><a href="https://www.franchiseindia.com/contact" target="_blank">Contact us</a></li>--}}
        {{--<li><a href="https://www.franchiseindia.com/feedback" target="_blank">Feedback</a></li>--}}
    {{--</ul>--}}
    {{--<div class="side-s-txt">Toll Free 1800 102 2007</div>--}}
{{--</nav>--}}
{{--@if (Auth::check())--}}
    {{--@if ( Auth::user()->profile_type == config('constants.ProfileType.Investor') )--}}
        {{--<nav id="c-menu--slide-right" class="c-menu c-menu--slide-right myaccount sidemy">--}}
            {{--<div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">--}}
                {{--<div class="wel-list-re"> <span class="c-menu__close"><img src="{{url('images/close-right.png')}}" alt="close btn"></span></div>--}}
                {{--<div class="welmy">Welcome--}}
                    {{--<span>{{ Auth::user()->name }}</span>--}}
                    {{--<a href="/logoutprofile"><span class="btn btn-default myacout">Logout</span></a>--}}
                {{--</div>--}}
                {{--<div class="myline"></div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">--}}
                {{--<div class="">--}}
                    {{--@if(Auth::user()->membership_plan < 405)--}}
                        {{--<a href="/investor/myaccount/payment" class="btn btn-default sidebtn">Upgrade Account </a>--}}
                    {{--@endif--}}
                    {{--<div class="myline"></div>--}}
                    {{--<div class="parblk">--}}
                        {{--<div class="per">You completed <span>{{Cookie::get('invPercentage')}}%</span> Profile</div>--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar" role="progressbar" aria-valuenow="{{Cookie::get('invPercentage')}}" aria-valuemin="0" aria-valuemax="100" style="width:{{Cookie::get('invPercentage')}}%">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="myline marbtm"></div>--}}
                    {{--<ul class="nvss">--}}
                        {{--<li @yield('db')><div><span class="icon-spc"><img alt="dashboard" src={{url('images/dashboard.png')}}></span><span class="fl"><a href="/investor/myaccount/dashboard">Dashboards</a></span></div></li>--}}
                        {{--<li @yield('vp')><div><span class="icon-spc"><img alt="view profile" src={{url('images/view-profile.png')}}></span><span><a href="/investor/myaccount/viewprofile">View Profile</a></span></div></li>--}}
                        {{--<li @yield('ep')><div><span class="icon-spc"><img alt="response" src={{url('images/response.png')}}></span><span><a href="/investor/myaccount/expressed-interest">Expressed Interest</a></span>--}}
                            {{--</div></li>--}}
                        {{--@if(Auth::user()->membership_plan == 405)--}}
                            {{--<li @yield('rec')>--}}
                                {{--<div><span class="icon-spc"><img alt="recommendations" src="/images/recommendationbtn.png"></span><a href="recommendations" class="trsts">Recommendation</a><span class="pright">15</span>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--</ul>--}}
                    {{--<div class="nav__list">--}}
                        {{--<input id="group-7" type="checkbox" hidden checked="checked"/>--}}
                        {{--<label for="group-7" class="myperp"> <img alt="manage profiles" src="{{url('images/manage-profile.png')}}" class="icon-spc"> <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span></label>--}}
                        {{--<ul class="nvss group-list pafdd">--}}
                            {{--<li @yield('pd')><a href="/investor/myaccount/personaldetails">Personal Details</a></li>--}}
                            {{--<li @yield('id')><a href="/investor/myaccount/investmentdetails">Investment Details</a></li>--}}
                            {{--<li @yield('prd')><a href="/investor/myaccount/propertydetails">Property Details</a></li>--}}
                            {{--<li @yield('bd')><a href="/investor/myaccount/businessdetails">Professional Details</a></li>--}}
                            {{--@if(Auth::user()->membership_plan < 405)--}}
                                {{--<li @yield('pp')><a href="/investor/myaccount/payment">Payment</a></li>--}}
                            {{--@endif--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<ul class="nvss mymenu">--}}
                        {{--<li @yield('rp')><div><span class="icon-spc"><img alt="response manager" src={{url('images/response-manager.png')}}></span><span><a href="/investor/myaccount/responsemanager">Response Manager</a></span></div></li>--}}
                        {{--<li @yield('AWS')><div><span class="icon-spc"><img alt="advertise with us" src="{{url('images/adverise-with-us.png')}}"></span><span><a href="/investor/myaccount/advertisewithus">Advertise With us</a></span></div></li>--}}
                        {{--<li @yield('cp')><div><span class="icon-spc"><img alt="change password" src={{url('images/change-password.png')}}></span><span><a href="/investor/myaccount/changepassword">Change Password</a></span></div></li>--}}
                    {{--</ul>--}}
                    {{--<div class="myline"></div>--}}
                    {{--<a href="/investor/myaccount/feedback" class="btn btn-default sidebtn">Feedback</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}
    {{--@endif--}}
    {{--@if ( Auth::user()->profile_type == config('constants.ProfileType.Franchisor') )--}}
        {{--<nav id="c-menu--slide-right" class="c-menu c-menu--slide-right myaccount sidemy">--}}
            {{--<div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">--}}
                {{--<div class="wel-list-re"> <span class="c-menu__close"><img alt="close right" src="{{url('images/close-right.png')}}"></span></div>--}}
                {{--<div class="welmy">Welcome--}}
                    {{--<span>{{ session()->get('name') }}</span>--}}
                    {{--<a href="/logoutprofile"><span class="btn btn-default myacout">Logout</span></a>--}}
                {{--</div>--}}
                {{--<div class="myline"></div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">--}}
                {{--<div class="">--}}
                    {{--@if(Auth::user()->membership_plan < 405)--}}
                        {{--<a href="/franchisor/myaccount/payment-plan" class="btn btn-default sidebtn">Upgrade Account </a>--}}
                    {{--@endif--}}
                    {{--<div class="myline"></div>--}}
                    {{--<div class="parblk">--}}
                        {{--<div class="per">You completed <span>{{Cookie::get('franPercentage')}}%</span> Profile</div>--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar" role="progressbar" aria-valuenow="{{Cookie::get('franPercentage')}}" aria-valuemin="0" aria-valuemax="100" style="width:{{Cookie::get('franPercentage')}}%">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="myline marbtm"></div>--}}
                    {{--<ul class="nvss">--}}
                        {{--<li @yield('db')><div><span class="icon-spc"><img alt="dashboard" src="{{url('images/dashboard.png')}}"></span><span class="fl"><a href="/franchisor/myaccount/dashboard">Dashboard</a></span></div></li>--}}
                        {{--<li @yield('vp')><div><span class="icon-spc"><img alt="view profiles" src="{{url('images/view-profile.png')}}"></span><span><a href="/franchisor/myaccount/view-profile">View Profile</a></span></div></li>--}}
                    {{--</ul>--}}
                    {{--<div class="nav__list">--}}
                        {{--<input id="group-5" type="checkbox" hidden checked="checked"/>--}}
                        {{--<label for="group-5" class="myperp"> <img alt="response" src="{{url('images/response.png')}}" class="icon-spc"> <p class="manetxt">Response</p> <span class="fa fa-angle-down"></span></label>--}}
                        {{--<ul class="nvss group-list pafdd">--}}
                            {{--<li @yield('ir')><a href="/franchisor/myaccount/insta-response">Insta Response</a></li>--}}
                            {{--<li @yield('ei')><a href="/franchisor/myaccount/expressed-interest">Expressed Interest</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="nav__list">--}}
                        {{--<input id="group-4" type="checkbox" hidden checked="checked"/>--}}
                        {{--<label for="group-4" class="myperp"> <img alt="manage profile" src="{{url('images/manage-profile.png')}}" class="icon-spc"> <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span></label>--}}
                        {{--<ul class="nvss group-list pafdd">--}}
                            {{--<li @yield('bd')><a href="/franchisor/myaccount/businessdetails">Business</a></li>--}}
                            {{--<li @yield('pd')><a href="/franchisor/myaccount/professionaldetails">Professional</a></li>--}}
                            {{--<li @yield('prd')><a href="/franchisor/myaccount/propertydetails">Franchise/Property</a></li>--}}
                            {{--<li @yield('ta')><a href="/franchisor/myaccount/training-aggrement-details">Training/Agreements</a></li>--}}
                            {{--@if(Auth::user()->membership_type == 0)--}}
                                {{--<li @yield('pp')><a href="/franchisor/myaccount/payment-plan">Payment</a></li>--}}
                            {{--@else--}}
                                {{--<li @yield('Ap')><a href="/franchisor/myaccount/appearance">appearance</a></li>--}}
                            {{--@endif--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<ul class="nvss mymenu">--}}
                        {{--<ul class="nvss">--}}
                            {{--<li @yield('rp')><div><span class="icon-spc"><img alt="response manager" src="{{url('images/response-manager.png')}}"></span><span><a href="/franchisor/myaccount/responsemanager">Response Manager</a></span></div></li>--}}
                            {{--<li @yield('AWS')><div><span class="icon-spc"><img alt="advertise with us" src="{{url('images/adverise-with-us.png')}}"></span><span><a href="/franchisor/myaccount/advertisewithus">Advertise With us</a></span></div></li>--}}
                            {{--<li @yield('cp')><div><span class="icon-spc"><img alt="change password" src="{{url('images/change-password.png')}}"></span><span><a href="/franchisor/myaccount/changepassword">Change Password</a></span></div></li>--}}
                        {{--</ul>--}}
                        {{--<div class="myline"></div>--}}
                        {{--<a href="/franchisor/myaccount/feedback" class="btn btn-default sidebtn">Feedback</a>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}
    {{--@endif--}}
{{--@endif--}}
{{--<div id="c-mask" class="c-mask"></div>--}}
{{--<script src="{{url('js/classList.js')}}"></script>--}}
{{--<script src="{{url('js/menu.js')}}"></script>--}}
{{--<script language="javascript">var slideLeft=new Menu({wrapper:'#o-wrapper',type:'slide-left',menuOpenerClass:'.c-button',maskId:'#c-mask'});var slideLeftBtn=document.querySelector('#c-button--slide-left');slideLeftBtn.addEventListener('click',function(e){e.preventDefault;slideLeft.open();});@if(Auth::check()) var slideRight=new Menu({wrapper:'#o-wrapper',type:'slide-right',menuOpenerClass:'.c-button',maskId:'#c-mask'});var slideRightBtn=document.querySelector('#c-button--slide-right');slideRightBtn.addEventListener('click',function(e){e.preventDefault;slideRight.open();});@endif</script>--}}


{{--<script>--}}
    {{--$("#leftsidebar-open").click(function(){--}}
        {{--$("#sidebar-login").show();--}}
    {{--});--}}

    {{--$("#close_Btn").click(function(){--}}
        {{--$("#sidebar-login").hide();--}}
    {{--});--}}
{{--</script>--}}