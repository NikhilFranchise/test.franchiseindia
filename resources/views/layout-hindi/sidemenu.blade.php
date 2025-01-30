@php
    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (request()->segment(1) == 'wellness') {
        $fb = 'https://www.facebook.com/WellnessInd/';
        $twitter = 'https://twitter.com/wellnessind';
        $linkedin = 'https://www.linkedin.com/in/indian-salon-and-wellness-congress-2146a8a5/';
        $youtube = 'https://www.youtube.com/user/FranchiseIndia';
        $url = 'wellness';
        $isinsta = 0;
    } elseif (request()->segment(1) == 'education') {
        $url = 'education';
        $fb = 'https://www.facebook.com/Educationbizcom-226779064413676/';
        $twitter = 'https://twitter.com/educationbizin';
        $linkedin = 'https://www.linkedin.com/company/102548?trk=tyah';
        $youtube = 'https://www.youtube.com/user/FranchiseIndia';
        $isinsta = 0;
    } else {
        $url = 'site';
        $fb = 'https://www.facebook.com/FranchiseIndiaMedia';
        $twitter = 'https://twitter.com/FranchiseIndia';
        $linkedin = 'https://www.linkedin.com/company/102548?trk=tyah';
        $youtube = 'https://www.youtube.com/user/FranchiseIndia';
        $isinsta = 1;
    }
@endphp
@mobile
    @if (request()->segment(1) != 'hi')
        @if (Auth::check())
            @if (Auth::user()->profile_type == config('constants.ProfileType.Investor'))
                <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                        <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                    src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span></div>
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
                                    <div class="progress-bar" role="progressbar" aria-valuenow="44" aria-valuemin="0"
                                        aria-valuemax="100" style="width:44%">
                                    </div>
                                </div>
                            </div>
                            <div class="myline marbtm"></div>
                            <ul class="nvss">
                                <li>
                                    <div><span class="icon-spc"><img alt="dashboard"
                                                src="https://www.franchiseindia.com/images/dashboard.png"></span><span
                                            class="fl"><a href="/investor/myaccount/dashboard">Dashboards</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="view profile"
                                                src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a
                                                href="/investor/myaccount/viewprofile">View Profile</a></span></div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="response"
                                                src="https://www.franchiseindia.com/images/response.png"></span><span><a
                                                href="/investor/myaccount/expressed-interest">Expressed Interest</a></span>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav__list">
                                <input id="group-7" type="checkbox" hidden="" checked="checked">
                                <label for="group-7" class="myperp"> <img alt="manage profiles"
                                        src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc">
                                    <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span>
                                </label>
                                <ul class="nvss group-list pafdd">
                                    <li class="selected"><a href="/investor/myaccount/personaldetails">Personal Details</a>
                                    </li>
                                    <li><a href="/investor/myaccount/investmentdetails">Investment Details</a></li>
                                    <li><a href="/investor/myaccount/propertydetails">Property Details</a></li>
                                    <li><a href="/investor/myaccount/businessdetails">Professional Details</a></li>
                                    <li><a href="/investor/myaccount/payment">Payment</a></li>
                                </ul>
                            </div>
                            <ul class="nvss mymenu">
                                <li>
                                    <div><span class="icon-spc"><img alt="response manager"
                                                src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a
                                                href="/investor/myaccount/responsemanager">Response Manager</a></span></div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="advertise with us"
                                                src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a
                                                href="/investor/myaccount/advertisewithus">Advertise With us</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="change password"
                                                src="https://www.franchiseindia.com/images/change-password.png"></span><span><a
                                                href="/investor/myaccount/changepassword">Change Password</a></span></div>
                                </li>
                            </ul>
                            <div class="myline"></div>
                            <a href="/investor/myaccount/feedback" class="sidebtn">Feedback</a>
                        </div>
                    </div>
                </nav>
            @endif
            @if (Auth::user()->profile_type == config('constants.ProfileType.Franchisor'))
                <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                        <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                    src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span>
                        </div>
                        <div class="welmy">Welcome
                            <span class="username">{{ session()->get('name') }}</span>
                            <a href="{{ Config('constants.MainDomain') }}/logoutprofile"><span
                                    class="btn btn-default myacout btn-logout">Logout</span></a>
                        </div>

                        <div class="myline"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <div class="upgrade-section">
                            @if (Auth::user()->membership_plan < 405)
                                <a href="{{ Config('constants.MainDomain') }}/franchisor/myaccount/payment-plan"
                                    class=" sidebtn">Upgrade Account </a>
                            @endif

                            <div class="myline"></div>

                            <div class="parblk">
                                <div class="per">You completed <span>{{ Cookie::get('franPercentage') }}%</span> Profile
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="44" aria-valuemin="0"
                                        aria-valuemax="100" style="width:44%">
                                    </div>
                                </div>
                            </div>
                            <div class="myline marbtm"></div>
                            <ul class="nvss">
                                <li>
                                    <div><span class="icon-spc"><img alt="dashboard"
                                                src="https://www.franchiseindia.com/images/dashboard.png"></span><span
                                            class="fl"><a href="/investor/myaccount/dashboard">Dashboards</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="view profile"
                                                src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a
                                                href="/investor/myaccount/viewprofile">View Profile</a></span></div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="response"
                                                src="https://www.franchiseindia.com/images/response.png"></span><span><a
                                                href="/investor/myaccount/expressed-interest">Expressed Interest</a></span>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav__list">
                                <input id="group-7" type="checkbox" hidden="" checked="checked">
                                <label for="group-7" class="myperp"> <img alt="manage profiles"
                                        src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc">
                                    <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span>
                                </label>
                                <ul class="nvss group-list pafdd">
                                    <li class="selected"><a href="/investor/myaccount/personaldetails">Personal
                                            Details</a>
                                    </li>
                                    <li><a href="/investor/myaccount/investmentdetails">Investment Details</a></li>
                                    <li><a href="/investor/myaccount/propertydetails">Property Details</a></li>
                                    <li><a href="/investor/myaccount/businessdetails">Professional Details</a></li>
                                    <li><a href="/investor/myaccount/payment">Payment</a></li>
                                </ul>
                            </div>
                            <ul class="nvss mymenu">
                                <li>
                                    <div><span class="icon-spc"><img alt="response manager"
                                                src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a
                                                href="/investor/myaccount/responsemanager">Response Manager</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="advertise with us"
                                                src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a
                                                href="/investor/myaccount/advertisewithus">Advertise With us</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="change password"
                                                src="https://www.franchiseindia.com/images/change-password.png"></span><span><a
                                                href="/investor/myaccount/changepassword">Change Password</a></span></div>
                                </li>
                            </ul>
                            <div class="myline"></div>
                            <a href="/investor/myaccount/feedback" class="sidebtn">Feedback</a>
                        </div>
                    </div>
                </nav>
            @endif
        @endif
    @else
        @if (Auth::check())
            @if (Auth::user()->profile_type == config('constants.ProfileType.Investor'))
                <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                        <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                    src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span>
                        </div>
                        <div class="welmy">स्वागत हे
                            <span class="username">{{ Auth::user()->name }}</span>
                            <a href="/logoutprofile"><span class="btn btn-default myacout btn-logout">लॉग आउट</span></a>
                        </div>
                        <div class="myline"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <div class="upgrade-section">
                            <a href="/investor/myaccount/payment" class=" sidebtn">खाते का उन्नयन </a>
                            <div class="myline"></div>
                            <div class="parblk">
                                <div class="per">आपने पूरा किया <span>44%</span> प्रोफ़ाइल</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="44" aria-valuemin="0"
                                        aria-valuemax="100" style="width:44%">
                                    </div>
                                </div>
                            </div>
                            <div class="myline marbtm"></div>
                            <ul class="nvss">
                                <li>
                                    <div><span class="icon-spc"><img alt="dashboard"
                                                src="https://www.franchiseindia.com/images/dashboard.png"></span><span
                                            class="fl"><a href="/investor/myaccount/dashboard">डैशबोर्ड</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="view profile"
                                                src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a
                                                href="/investor/myaccount/viewprofile">प्रोफाइल देखिये</a></span></div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="response"
                                                src="https://www.franchiseindia.com/images/response.png"></span><span><a
                                                href="/investor/myaccount/expressed-interest">रुचि व्यक्त की</a></span>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav__list">
                                <input id="group-7" type="checkbox" hidden="" checked="checked">
                                <label for="group-7" class="myperp"> <img alt="manage profiles"
                                        src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc">
                                    <p class="manetxt">प्रोफ़ाइल प्रबंधित करें</p> <span class="fa fa-angle-down"></span>
                                </label>
                                <ul class="nvss group-list pafdd">
                                    <li class="selected"><a href="/investor/myaccount/personaldetails">व्यक्तिगत विवरण</a>
                                    </li>
                                    <li><a href="/investor/myaccount/investmentdetails">निवेश का विवरण</a></li>
                                    <li><a href="/investor/myaccount/propertydetails">संपत्ति ब्यौरा</a></li>
                                    <li><a href="/investor/myaccount/businessdetails">पेशेवर विवरण</a></li>
                                    <li><a href="/investor/myaccount/payment">भुगतान</a></li>
                                </ul>
                            </div>
                            <ul class="nvss mymenu">
                                <li>
                                    <div><span class="icon-spc"><img alt="response manager"
                                                src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a
                                                href="/investor/myaccount/responsemanager">प्रतिक्रिया प्रबंधक</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="advertise with us"
                                                src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a
                                                href="/investor/myaccount/advertisewithus">हमारे साथ विज्ञापन</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="change password"
                                                src="https://www.franchiseindia.com/images/change-password.png"></span><span><a
                                                href="/investor/myaccount/changepassword">पासवर्ड बदलें</a></span></div>
                                </li>
                            </ul>
                            <div class="myline"></div>
                            <a href="/investor/myaccount/feedback" class="sidebtn">प्रतिपुष्टि</a>
                        </div>
                    </div>
                </nav>
            @endif
            @if (Auth::user()->profile_type == config('constants.ProfileType.Franchisor'))
                <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                        <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                    src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span>
                        </div>
                        <div class="welmy">स्वागत हे
                            <span class="username">{{ session()->get('name') }}</span>
                            <a href="{{ Config('constants.MainDomain') }}/logoutprofile"><span
                                    class="btn btn-default myacout btn-logout">लॉग आउट</span></a>
                        </div>

                        <div class="myline"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <div class="upgrade-section">
                            @if (Auth::user()->membership_plan < 405)
                                <a href="{{ Config('constants.MainDomain') }}/franchisor/myaccount/payment-plan"
                                    class=" sidebtn">खाते का उन्नयन </a>
                            @endif

                            <div class="myline"></div>

                            <div class="parblk">
                                <div class="per">आपने पूरा किया <span>{{ Cookie::get('franPercentage') }}%</span>
                                    प्रोफ़ाइल</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="44" aria-valuemin="0"
                                        aria-valuemax="100" style="width:44%">
                                    </div>
                                </div>
                            </div>
                            <div class="myline marbtm"></div>
                            <ul class="nvss">
                                <li>
                                    <div><span class="icon-spc"><img alt="dashboard"
                                                src="https://www.franchiseindia.com/images/dashboard.png"></span><span
                                            class="fl"><a href="/investor/myaccount/dashboard">डैशबोर्ड</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="view profile"
                                                src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a
                                                href="/investor/myaccount/viewprofile">प्रोफाइल देखिये</a></span></div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="response"
                                                src="https://www.franchiseindia.com/images/response.png"></span><span><a
                                                href="/investor/myaccount/expressed-interest">रुचि व्यक्त की</a></span>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav__list">
                                <input id="group-7" type="checkbox" hidden="" checked="checked">
                                <label for="group-7" class="myperp"> <img alt="manage profiles"
                                        src="https://www.franchiseindia.com/images/manage-profile.png" class="icon-spc">
                                    <p class="manetxt">प्रोफ़ाइल प्रबंधित करें</p> <span class="fa fa-angle-down"></span>
                                </label>
                                <ul class="nvss group-list pafdd">
                                    <li class="selected"><a href="/franchisor/myaccount/personaldetails">व्यक्तिगत
                                            विवरण</a></li>
                                    <li><a href="/franchisor/myaccount/investmentdetails">निवेश का विवरण</a></li>
                                    <li><a href="/franchisor/myaccount/propertydetails">संपत्ति ब्यौरा</a></li>
                                    <li><a href="/franchisor/myaccount/businessdetails">पेशेवर विवरण</a></li>
                                    <li><a href="/franchisor/myaccount/payment">भुगतान</a></li>
                                </ul>
                            </div>
                            <ul class="nvss mymenu">
                                <li>
                                    <div><span class="icon-spc"><img alt="response manager"
                                                src="https://www.franchiseindia.com/images/response-manager.png"></span><span><a
                                                href="/franchisor/myaccount/responsemanager">प्रतिक्रिया प्रबंधक</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="advertise with us"
                                                src="https://www.franchiseindia.com/images/adverise-with-us.png"></span><span><a
                                                href="/franchisor/myaccount/advertisewithus">हमारे साथ विज्ञापन</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div><span class="icon-spc"><img alt="change password"
                                                src="https://www.franchiseindia.com/images/change-password.png"></span><span><a
                                                href="/franchisor/myaccount/changepassword">पासवर्ड बदलें</a></span></div>
                                </li>
                            </ul>
                            <div class="myline"></div>
                            <a href="/franchisor/myaccount/feedback" class="sidebtn">Feedback</a>
                        </div>
                    </div>
                </nav>
            @endif
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
                <gcse:searchbox-only resultsUrl="{{ url('/search') }}" newWindow="true"
                    queryParameterName="search"></gcse:searchbox-only>
                <link rel="stylesheet" href="https://www.google.com/cse/style/look/greensky.css" type="text/css" />
            </div>
        </li>
        @mobile
            @if ($__env->yieldContent('hindiUrl'))
                <li>
                    <div class="p-2 language-main-bx">
                        <div class="input-group
        input-group-custom">
                            <span class="input-group-addon
        input-group-prepend-custom" id="basic-addon1">
                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg"
                                    alt="Language">
                            </span>
                            <div class="form-group form-group-sm">
                                <select class="form-control
        form-control-custom-main" id="language-changer">
                                    <option hidden="">Language</option>
                                    <option value="@yield('englishUrl')" @if ($engUrl == Request::url()) selected @endif>EN
                                        - English</option>
                                    <option value="@yield('hindiUrl')" @if ($hindiUrl == Request::url()) selected @endif>HI
                                        - Hindi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
            @endif
        @endmobile

        <li>&nbsp;</li>
        @mobile
            <li class="top-investors">
                <div class="dropdown policydropdown">
                    <button class="btn dropdown-toggle" type="button" id="btnDropdownDemo" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="">इन्वेस्टर <i
                            class="fa fa-caret-down"></i></button>
                    <div class="dropdown-menu policydropdownmenu" aria-labelledby="btnDropdownDemo">
                        <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/ipo"
                            target="_blank">आईपीओ</a>
                        <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/policies"
                            target="_blank">नीतियों</a>
                        <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/corporate-governance"
                            target="_blank">निगम से संबंधित शासन प्रणाली</a>
                    </div>
                </div>
            </li>
        @endmobile
        <li><a target="_blank" href="{{ Config('constants.MainDomain') }}/hi">घरेलू ब्रांड</a></li>
        <li><a target="_blank" href="{{ Config('constants.MainDomain') }}/hi/premiumbrand">प्रीमियम ब्रांड</a>
        </li>
        <li><a target="_blank" href="{{ Config('constants.MainDomain') }}/international">अंतर्राष्ट्रीय
                ब्रांड</a>
        </li>
    </ul>
    <ul class="list-unstyled components border-bottom-1">
        <li><a target="_blank" href="https://www.franchiseindia.com/insights">फ्रेंचाइजी इनसाइट्स</a></li>
        <li><a target="_blank" href="https://opportunityindia.com/hindi">समाचार</a></li>
        <li><a href="https://video.franchiseindia.com/" target="_blank">वीडियो</a></li>
        <li><a target="_blank" href="{{ Config('constants.MainDomain') }}/magazine">पत्रिका</a></li>
    </ul>

    <div class="categoryall-franchise border-bottom-1">
        <div class="busheadmebu"><a target="_blank" href="/categoryall">फ्रेंचाइजी श्रेणिया</a>
        </div>
        @php
            $categoryArr = Config('constants.CategoryArr');
            asort($categoryArr);
        @endphp

        <ol class="tree">

            @foreach ($categoryArr as $key => $value)
                <li>
                    <label for="folder1">
                        <a target="_blank"
                            href="{{  '/business-opportunities/' . Config('category.SeoCategoryArr.' . $key) . '.m' . $key }}
                           ">{{ $value }}</a>
                    </label> <input type="checkbox" id="folder1">
                    <ol>
                        @foreach (Config('constants.subCategoryArr.' . $key) as $key1 => $value1)
                            <li>
                                <label for="subsubfolder1">
                                    <a target="_blank"
                                        href="{{ '/business-opportunities/' . Config('category.SeoSubCategoryArr.' . $key1) . '.sc' . $key1 }}">{{ $value1 }}</a></label>
                                <input type="checkbox" id="subsubfolder1">
                                <ol>
                                    @foreach (Config('constants.subSubCategoryArr.' . $key1) as $key2 => $value2)
                                        @if (in_array($key2, json_decode(\Illuminate\Support\Facades\Storage::getFacadeRoot()->get('ssc.json'), true)))
                                            <li>
                                                <a target="_blank"
                                                    href="{{ '/business-opportunities/' . Config('category.SeoSubSubCategoryArr.' . $key2) . '.ssc' . $key2 }} ">{{ $value2 }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ol>
                </li>
            @endforeach
            <li><span class="shaicon">
                    <div class="reddownrightsprite"></div>
                </span><a target="_blank"
                    href="{{ Config('constants.MainDomain') }}/hi/business-opportunities/lowcost">कम लागत वाले
                    व्यवसाय
                    के अवसर</a></li>
        </ol>


    </div>


    <div class="busheadmebu martop">Our Group website
    </div>
    <ul class="list-unstyled components border-bottom-1">

        <li><a target="_blank" href="https://www.franchiseindia.com/" rel="nofollow">franchiseindia.com</a></li>
        <li><a target="_blank" href="https://www.entrepreneur.com/" rel="nofollow">entrepreneur.com</a></li>
        <li><a target="_blank" href="https://www.indianretailer.com/" rel="nofollow">indianretailer.com</a></li>
        <li><a target="_blank" href="https://restaurant.indianretailer.com/">restaurantindia.in</a></li>
        <li><a target="_blank"
                href="https://opportunityindia.franchiseindia.com/english/tag/health-and-wellness">wellnessindia.org</a>
        </li>
        <li><a target="_blank"
                href="https://opportunityindia.franchiseindia.com/english/tag/education">educationbiz.com</a></li>
        <li><a target="_blank" href="https://www.franchise.ae/" rel="nofollow">franchise.ae</a></li>
        <li><a target="_blank" href="https://www.franchisebangladesh.com/" rel="nofollow">franchisebangladesh.com</a>
        </li>
        <li><a target="_blank" href="https://www.businessex.com/" rel="nofollow">businessex.com</a></li>
        <li><a target="_blank" href="https://www.licenseindia.com/" rel="nofollow">licenseindia.com</a></li>
        <li><a target="_blank" href="https://www.bradfordlicenseindia.com/"
                rel="nofollow">bradfordlicenseindia.com</a>
        </li>
        <li><a target="_blank" href="https://www.franchiseindia.net/" rel="nofollow">franchiseindia.net</a></li>
        <li><a target="_blank" href="https://www.franchiseindia.in/" rel="nofollow">franchiseindia.in</a></li>
        <li><a target="_blank" href="https://www.francorp.in/" rel="nofollow">francorp.in</a></li>
        <li><a target="_blank" href="https://www.franglobal.com/" rel="nofollow">franglobal.com</a></li>
        <li><a target="_blank" href="http://www.franchiseindiaventures.com/"
                rel="nofollow">franchiseindiaventures.com</a></li>
        <li><a target="_blank" href="https://www.gauravmarya.com/" rel="nofollow">gauravmarya.com</a></li>
    </ul>
    <ul class="list-unstyled components border-bottom-1">
        <li><a href="https://www.businessex.com/">मौजूदा व्यवसाय खरीदें / बेचें</a></li>
        <li><a href="#expandFranchise" target="_blank">अपने फ्रैंचाइज़ी का विस्तार करे</a></li>
        <li><a href="https://www.franchiseindia.com/property-loan" target="_blank">संपत्ति के खिलाफ ऋण</a></li>
    </ul>
    <ul class="list-unstyled components border-bottom-1">
        <li><a href="https://www.franchiseindia.com/advertise" target="_blank">हमारे साथ विज्ञापन</a></li>
        <li><a href="https://master.franchiseindia.com/emagazine/" target="_blank">पत्रिका की सदस्यता</a></li>
        <li><a href="https://www.franchiseindia.com/book" target="_blank">रिपोर्ट और किताबें</a>
        </li>
        <li><a href="https://www.franchiseindia.com/event/" target="_blank">इवेंट</a></li>
    </ul>
    <ul class="list-unstyled components">
        <li><a href="https://www.franchiseindia.com/investor/create" target="_blank">निवेशक साइनअप</a></li>
        <li><a href="https://www.franchiseindia.com/franchisor/registration/step/1" target="_blank">फ़्रैंचाइज़र
                साइनअप</a></li>
        <li>
            <div class="side-bar-social">
                <ul class="sidebar-social">
                    <li>
                        <a href="{{ $fb }}" target="_blank">
                            <img src="{{ url('newhomepage/assets/img/fb-icon.svg') }}" alt="facebook-icon">
                        </a>
                    </li>
                    <li>
                        <a href="{{ $twitter }}" target="_blank">
                            <img src="{{ url('newhomepage/assets/img/twitter-icon.svg') }}" alt="twitter-icon">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/franchiseindia_/" target="_blank">
                            <img src="{{ url('newhomepage/assets/img/instagram-icon.svg') }}" alt="instagram-icon">
                        </a>
                    </li>
                    <li>
                        <a href="{{ $youtube }}" target="_blank">
                            <img src="{{ url('newhomepage/assets/img/you-tube-icon.svg') }}" alt="youtube-icon">
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <div class="main-link">
                <ul class="main-link-section">
                    <li><a href="https://www.franchiseindia.com/about" target="_blank">हमारे बारे में</a></li>
                    <li><a href="https://www.franchiseindia.com/contact" target="_blank">हमसे संपर्क करें</a></li>
                    <li><a href="https://www.franchiseindia.com/feedback" target="_blank">प्रतिक्रिया</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="contact-us-section">
                टोल फ्री 1800 102 2007
            </div>
        </li>
    </ul>
</nav>
{{-- <div id="c-mask" class="c-mask"></div> --}}
<script src="{{ URL::asset('js/classList.js') }}"></script>
<script src="{{ URL::asset('js/menu.js') }}"></script>
<script language="javascript">
    var slideLeft = new Menu({
        wrapper: '#o-wrapper',
        type: 'slide-left',
        menuOpenerClass: '.c-button',
        maskId: '#c-mask'
    });
    var slideLeftBtn = document.querySelector('#c-button--slide-left');
    slideLeftBtn.addEventListener('click', function(e) {
        e.preventDefault;
        slideLeft.open();
    });
    @if (Auth::check())
        var slideRight = new Menu({
            wrapper: '#o-wrapper',
            type: 'slide-right',
            menuOpenerClass: '.c-button',
            maskId: '#c-mask'
        });
        var slideRightBtn = document.querySelector('#c-button--slide-right');
        slideRightBtn.addEventListener('click', function(e) {
            e.preventDefault;
            slideRight.open();
        });
    @endif
</script>
<script>
    $(function() {
        // bind change event to select
        $('#language-changer').on('change', function() {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });
</script>
