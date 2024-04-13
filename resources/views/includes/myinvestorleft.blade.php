<div class="col-xs-12 col-sm-2 col-md-2 row-no-padding myaccleft">
    <div class="bor-radius backwhite myshadow">
        @if(Auth::user()->membership_plan < 405)
            <a href="payment" class="btn btn-default sidebtn">Upgrade Account </a>
        @endif
        <div class="myline"></div>
        <div class="parblk">
            <div class="per">You completed <span>{{Cookie::get('invPercentage')}}%</span> Profile</div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{Cookie::get('invPercentage')}}"
                     aria-valuemin="0" aria-valuemax="100" style="width:{{Cookie::get('invPercentage')}}%">
                </div>
            </div>
        </div>
        <div class="myline marbtm"></div>

        <ul class="nvss">
            <li @yield('db')><div><span class="icon-spc"><img alt="dashboard" src={{URL::asset('images/dashboard.png')}}></span><span class="fl"><a href="dashboard">Dashboard</a></span></div></li>
            <li @yield('vp')><div><span class="icon-spc"><img alt="view profile" src={{URL::asset('images/view-profile.png')}}></span><span><a href="viewprofile">View Profile</a></span></div></li>
            <li @yield('ep')><div><span class="icon-spc"><img alt="response" src={{URL::asset('images/response.png')}}></span><span><a href="expressed-interest">Expressed Interest</a></span></div></li>
            @if(Auth::user()->membership_plan != 401)
                <li @yield('rec')><div><span class="icon-spc"><img alt="recommendation" src="/images/recommendationbtn.png"></span><a href="recommendations" class="trsts">Recommendation</a><span class="pright">15</span></div></li>
            @endif
        </ul>

        <div class="nav__list">
            <input id="group-2" type="checkbox" hidden checked="checked"/>
            <label for="group-2"> <img src="{{URL::asset('images/manage-profile.png')}}" class="icon-spc">
                <p class="manetxt">Manage Profile</p>
                <span class="fa fa-angle-down"></span>
            </label>
            <ul class="nvss group-list pafdd">
                <li @yield('pd')><a href="personaldetails">Personal Details</a></li>
                <li @yield('id')><a href="investmentdetails">Investment Details</a></li>
                <li @yield('prd')><a href="propertydetails">Property Details</a></li>
                <li @yield('bd')><a href="businessdetails">Professional Details</a></li>
                @if(Auth::user()->membership_plan < 405)
                    <li @yield('pp')><a href="payment">Payment</a></li>
                @endif
            </ul>
        </div>
        <ul class="nvss">
            <li @yield('rp')>
                <div>
                    <span class="icon-spc">
                        <img alt="response manager" src={{URL::asset('images/response-manager.png')}}></span><span>
                        <a href="responsemanager">Response Manager</a>
                    </span>
                </div>
            </li>
            <li @yield('AWU')>
                <div>
                    <span class="icon-spc">
                        <img alt="advertise with us" src="{{URL::asset('images/adverise-with-us.png')}}"></span><span>
                        <a href="advertisewithus">Advertise With Us</a>
                    </span>
                </div>
            </li>
            <li @yield('cp')>
                <div>
                    <span class="icon-spc">
                        <img alt="change password" src={{URL::asset('images/change-password.png')}}></span><span><a href="changepassword">Change Password</a>
                    </span>
                </div>
            </li>
        </ul>
        <div class="myline"></div>
        <a href="feedback" class="btn btn-default sidebtn">Feedback</a>
    </div>
</div>