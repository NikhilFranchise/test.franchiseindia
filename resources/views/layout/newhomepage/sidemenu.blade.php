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

@if (request()->segment(1) == 'hi')
    @if (Auth::check())
        @if (Auth::user()->profile_type == config('constants.ProfileType.Investor'))
            <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                    <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span></div>
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
                                        class="fl"><a href="/investor/myaccount/dashboard">डैशबोर्ड</a></span></div>
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
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
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
                    <link rel="stylesheet" href="https://www.google.com/cse/style/look/greensky.css"
                        type="text/css" />
                </div>
            </li>
            @mobile
                <li>
                    <div class="p-2 language-main-bx">
                        <div class="input-group
        input-group-custom">
                            <span class="input-group-addon
        input-group-prepend-custom" id="basic-addon1">
                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg"
                                    alt="">
                            </span>
                            <div class="form-group form-group-sm">
                                <select class="form-control
        form-control-custom-main"
                                    id="exampleFormControlSelect1">
                                    <option hidden="">Language</option>
                                    <option value="{{ url('') }}">EN - English</option>
                                    <option value="{{ url('hi/') }}">HI - Hindi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
            @endmobile
            <li>&nbsp;</li>
            @mobile
            <li class="top-investors">
                <div class="dropdown policydropdown">
                    <button class="btn dropdown-toggle" type="button" id="btnDropdownDemo" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="">इन्वेस्टर <i
                            class="fa fa-caret-down"></i></button>
                    <div class="dropdown-menu policydropdownmenu" aria-labelledby="btnDropdownDemo">
                        <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/ipo" target="_blank">आईपीओ</a>
                        <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/policies"
                            target="_blank">नीतियों</a>
                        <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/corporate-governance"
                            target="_blank">निगम से संबंधित शासन प्रणाली</a>
                    </div>
                </div>
            </li>
            @endmobile
            <li>
                <a target="_blank" href="/hi">घरेलू ब्रांड</a>
            </li>
            <li>
                <a target="_blank" href="/hi/premiumbrand">प्रीमियम ब्रांड</a>
            </li>
            <li>
                <a target="_blank" href="/international">अंतरराष्ट्रीय</a>
            </li>
        </ul>
        <ul class="list-unstyled components border-bottom-1">

            <li><a target="_blank" href="https://www.opportunityindia.com/hindi">फ्रेंचाइजी इनसाइट्स</a></li>
            <li><a target="_blank" href="https://www.opportunityindia.com/hindi">समाचार</a></li>
            <li>
                <a target="_blank" href="https://video.franchiseindia.com/">वीडियो</a>
            </li>
            <li>
                <a target="_blank" href="/magazine">पत्रिका</a>
            </li>
        </ul>

        <div class="categoryall-franchise border-bottom-1">
            <div class="busheadmebu"><a target="_blank" href="/categoryall">फ्रेंचाइजी श्रेणियां</a>
            </div>
            @php
                $categoryArr = Config('constants.CategoryArr');
                asort($categoryArr);
                $i = 0;
            @endphp

            <ol class="tree">

                @foreach ($categoryArr as $key => $value)
                    <li>
                        <label for="folder1">
                            <a target="_blank"
                                href="{{ $key == '5' ? Config::get('constants.OIDomain') : '/business-opportunities/' . Config('category.SeoCategoryArr.' . $key) . '.m' . $key }}
                           ">{{ $value }}</a>
                        </label> <input type="checkbox" id="folder1">
                        <ol>
                            @foreach (Config('constants.subCategoryArr.' . $key) as $key1 => $value1)
                                <li>
                                    <label for="subsubfolder1">
                                        <a target="_blank"
                                            href="{{ $key == '5' ? Config::get('constants.OIDomain') . (!empty(Config::get('category.SeoSubCategoryArr.' . $key1)) ? '/dir/' . Config('category.SeoSubCategoryArr.' . $key1) : '') : '/business-opportunities/' . Config('category.SeoSubCategoryArr.' . $key1) . '.sc' . $key1 }}">{{ $value1 }}</a></label>
                                    <input type="checkbox" id="subsubfolder1">
                                    <ol>
                                        @foreach (Config('constants.subSubCategoryArr.' . $key1) as $key2 => $value2)
                                            @php
                                                $sscJson = \Illuminate\Support\Facades\Storage::getFacadeRoot()->get(
                                                    'ssc.json',
                                                );
                                                $sscArray = json_decode($sscJson, true);
                                            @endphp
                                            @if (is_array($sscArray) && in_array($key2, $sscArray))
                                                <li>
                                                    <a target="_blank"
                                                        href="{{ $key == '5' ? Config::get('constants.OIDomain') . (!empty(Config::get('category.SeoSubSubCategoryArr.' . $key2)) ? '/dir/' . Config('category.SeoSubSubCategoryArr.' . $key2) : '') : '/business-opportunities/' . Config('category.SeoSubSubCategoryArr.' . $key2) . '.ssc' . $key2 }}">{{ $value2 }}</a>
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
                        व्यवसाय के अवसर</a></li>
            </ol>

        </div>


        <div class="busheadmebu martop">हमारे समूह की वेबसाइट
        </div>
        <ul class="list-unstyled components border-bottom-1">

            <li><a target="_blank" href="https://www.franchiseindia.com/" rel="nofollow">franchiseindia.com</a></li>
            <li><a target="_blank" href="https://www.entrepreneur.com/" rel="nofollow">entrepreneur.com</a></li>
            <li><a target="_blank" href="https://www.indianretailer.com/" rel="nofollow">indianretailer.com</a></li>

            <li><a target="_blank" href="https://restaurant.indianretailer.com/">restaurantindia.in</a></li>
            <li><a target="_blank"
                    href="https://www.opportunityindia.com/english/tag/health-and-wellness">wellnessindia.org</a></li>
            <li><a target="_blank" href="https://www.opportunityindia.com/english/tag/education">educationbiz.com</a>
            </li>

            <li><a target="_blank" href="https://www.franchisebangladesh.com/"
                    rel="nofollow">franchisebangladesh.com</a>
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
            <li><a target="_blank" href="https://www.franchiseafrica.co/" rel="nofollow">franchiseafrica.co</a></li>
        </ul>
        <ul class="list-unstyled components border-bottom-1">

            <li>
                <a href="https://www.businessex.com/" target="_blank">अपना व्यवसाय बेचें</a>
            </li>
            <li>
                <a href="https://www.licenseindia.com/" target="_blank"> ब्रांड लाइसेंस खरीदें</a>
            </li>
            <li><a href="#expandFranchise" target="_blank">अपने फ्रेंचाइजी का विस्तार करें</a></li>


            <li><a href="https://www.franchiseindia.com/property-loan" target="_blank">संपत्ति के खिलाफ ऋण</a></li>
        </ul>
        <ul class="list-unstyled components border-bottom-1">
            <li><a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">हमारे साथ
                    विज्ञापन</a></li>

            <li><a href="https://master.franchiseindia.com/magazine-subscribe/" target="_blank">पत्रिका की सदस्यता
                    लें</a></li>
            <li><a href="https://www.franchiseindia.com/book" target="_blank">रिपोर्टों
                    & पुस्तकें</a>
            </li>
            <li><a href="https://www.franchiseindia.com/event/" target="_blank">प्रतिस्पर्धा</a></li>
        </ul>
        <ul class="list-unstyled components">
            <li><a href="https://www.franchiseindia.com/investor/create" target="_blank">निवेशक साइनअप</a></li>
            <li><a href="https://www.franchiseindia.com/franchisor/registration/step/1" target="_blank">फ्रेंचाइज़र
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
                                <img src="{{ url('newhomepage/assets/img/instagram-icon.svg') }}"
                                    alt="instagram-icon">
                            </a>
                        </li>
                        <li>
                            <a href="{{ $youtube }}" target="_blank">
                                <img src="{{ url('newhomepage/assets/img/you-tube-icon.svg') }}" alt="youtube-icon">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/franchiseindia/" target="_blank">
                                <img src="{{ url('newhomepage/assets/img/linkedin-new.svg') }}" alt="linkedin-icon">
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="main-link">
                    <ul class="main-link-section">
                        <li><a href="https://www.franchiseindia.com/about" target="_blank">हमारे बारे में</a></li>
                        <li><a href="https://www.franchiseindia.com/contact" target="_blank">संपर्क करें</a></li>
                        <li><a href="https://www.franchiseindia.com/feedback" target="_blank">प्रतिपुष्टि</a></li>
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
@else
    @if (Auth::check())
        @if (Auth::user()->profile_type == config('constants.ProfileType.Investor'))
            <nav id="sidebar-login" class="c-menu c-menu--slide-right myaccount sidemy is-active">
                <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding lbt">
                    <div class="wel-list-re" id="dismiss-login"> <span class="c-menu__close"><img
                                src="https://www.franchiseindia.com/images/close-right.png" alt="close btn"></span>
                    </div>
                    <div class="welmy">Welcome
                        <span class="username">{{ Auth::user()->name }}</span>
                        <a href="/logoutprofile"><span class="btn btn-default myacout btn-logout">Logout</span></a>
                    </div>
                    <div class="myline"></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                    <div class="upgrade-section ">
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
                                <li class="selected"><a href="/investor/myaccount/personaldetails">Personal
                                        Details</a></li>
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
                            <div class="per">You completed <span>{{ Cookie::get('franPercentage') }}%</span>
                                Profile</div>
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
                                        class="fl"><a href="/franchisor/myaccount/dashboard">Dashboards</a></span>
                                </div>
                            </li>
                            <li>
                                <div><span class="icon-spc"><img alt="view profile"
                                            src="https://www.franchiseindia.com/images/view-profile.png"></span><span><a
                                            href="/franchisor/myaccount/viewprofile">View Profile</a></span></div>
                            </li>
                            <li>
                                <div><span class="icon-spc"><img alt="response"
                                            src="https://www.franchiseindia.com/images/response.png"></span><span><a
                                            href="/franchisor/myaccount/expressed-interest">Expressed
                                            Interest</a></span>
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
                                <li class="selected"><a href="/franchisor/myaccount/personaldetails">Personal
                                        Details</a></li>
                                <li><a href="/franchisor/myaccount/investmentdetails">Investment Details</a></li>
                                <li><a href="/franchisor/myaccount/propertydetails">Property Details</a></li>
                                <li><a href="/franchisor/myaccount/businessdetails">Professional Details</a></li>
                                <li><a href="/franchisor/myaccount/payment">Payment</a></li>
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
                        <a href="/franchisor/myaccount/feedback" class="sidebtn">Feedback</a>
                    </div>
                </div>
            </nav>
        @endif
    @endif
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
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
                    <link rel="stylesheet" href="https://www.google.com/cse/style/look/greensky.css"
                        type="text/css" />
                </div>
            </li>

            @mobile
                <li>
                    <div class="p-2 language-main-bx">
                        <div class="input-group
        input-group-custom">
                            <span class="input-group-addon
        input-group-prepend-custom" id="basic-addon1">
                                <img src="https://www.franchiseindia.com/newhomepage/assets/img/language-icon.svg"
                                    alt="">
                            </span>
                            <div class="form-group form-group-sm">
                                <select class="form-control
        form-control-custom-main"
                                    id="exampleFormControlSelect1">
                                    <option hidden="">Language</option>
                                    <option value="{{ url('') }}">EN - English</option>
                                    <option value="{{ url('hi/') }}">HI - Hindi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
            @endmobile
            @mobile
                <li>&nbsp;</li>
                <li class="top-investors">
                    <div class="dropdown policydropdown">
                        <button class="btn dropdown-toggle" type="button" id="btnDropdownDemo" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="">Investor <i
                                class="fa fa-caret-down"></i></button>
                        <div class="dropdown-menu policydropdownmenu" aria-labelledby="btnDropdownDemo">
                            <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/ipo" target="_blank">IPO</a>
                            <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/policies"
                                target="_blank">Policies</a>
                            <a class="dropdown-item" href="{{ Config('constants.MainDomain') }}/corporate-governance"
                                target="_blank">Corporate Governance</a>
                        </div>
                    </div>
                </li>
            @endmobile
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
            <li>
                <a target="_blank" href="https://www.franchiseindia.com/insights">Franchise Insights</a>
            </li>
            <li>
                <a target="_blank" href="https://www.opportunityindia.com/">News</a>
            </li>
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
                @foreach ($categoryArr as $key => $value)
                    @php
                        $catClass = 'Cate' . $key;
                        $subcatClass = 'SubCat' . $key;
                        $subsubcatClass = '';
                    @endphp
                    <li>
                        <label for="folder1">
                            <a target="_blank"
                                href="{{ $key == '5' ? Config::get('constants.OIDomain') : '/business-opportunities/' . Config('category.SeoCategoryArr.' . $key) . '.m' . $key }}
                           ">{{ $value }}</a>
                        </label> <input type="checkbox" id="folder1">
                        <ol>
                            @foreach (Config('constants.subCategoryArr.' . $key) as $key1 => $value1)
                                <li>
                                    <label for="subsubfolder1">
                                        <a target="_blank"
                                            href="{{ $key == '5' ? Config::get('constants.OIDomain') . (!empty(Config::get('category.SeoSubCategoryArr.' . $key1)) ? '/dir/' . Config('category.SeoSubCategoryArr.' . $key1) : '') : '/business-opportunities/' . Config('category.SeoSubCategoryArr.' . $key1) . '.sc' . $key1 }}">{{ $value1 }}</a></label>
                                    <input type="checkbox" id="subsubfolder1">
                                    <ol>
                                        @foreach (Config('constants.subSubCategoryArr.' . $key1) as $key2 => $value2)
                                            @php
                                                $sscJson = json_decode(
                                                    \Illuminate\Support\Facades\Storage::getFacadeRoot()->get(
                                                        'ssc.json',
                                                    ),
                                                    true,
                                                );
                                            @endphp 
                                            @if (is_array($sscJson) && in_array($key2, $sscJson))
                                                <li>
                                                    <a target="_blank"
                                                        href="{{ $key == '5' ? Config::get('constants.OIDomain') . (!empty(Config::get('category.SeoSubSubCategoryArr.' . $key2)) ? '/dir/' . Config('category.SeoSubSubCategoryArr.' . $key2) : '') : '/business-opportunities/' . Config('category.SeoSubSubCategoryArr.' . $key2) . '.ssc' . $key2 }} ">{{ $value2 }}</a>
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
                    <a target="_blank" href="{{ Config('constants.MainDomain') }}/business-opportunities/lowcost">Low
                        Cost Business Opportunities</a>
                </li>
            </ol>

        </div>


        <div class="busheadmebu martop">Our Group website
        </div>
        <ul class="list-unstyled components border-bottom-1">

            <li><a target="_blank" href="https://www.franchiseindia.com/" rel="nofollow">franchiseindia.com</a></li>
            <li><a target="_blank" href="https://www.entrepreneur.com/" rel="nofollow">entrepreneur.com</a></li>
            <li><a target="_blank" href="https://www.indianretailer.com/" rel="nofollow">indianretailer.com</a></li>

            <li><a target="_blank" href="https://restaurant.indianretailer.com">restaurantindia.in</a></li>
            <li><a target="_blank"
                    href="https://www.opportunityindia.com/english/tag/health-and-wellness">wellnessindia.org</a></li>
            <li><a target="_blank" href="https://www.opportunityindia.com/english/tag/education">educationbiz.com</a>
            </li>
            <!--<li><a target="_blank" href="https://www.franchise.ae/" rel="nofollow">franchise.ae</a></li>-->
            <li><a target="_blank" href="https://www.franchisebangladesh.com/"
                    rel="nofollow">franchisebangladesh.com</a>
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
            <li><a target="_blank" href="https://www.franchiseafrica.co/" rel="nofollow">franchiseafrica.co</a></li>
        </ul>
        <ul class="list-unstyled components border-bottom-1">

            <li>
                <a href="https://www.businessex.com/" target="_blank">Sell your Business</a>
            </li>
            <li>
                <a href="https://www.licenseindia.com/" target="_blank"> Buy a Brand License</a>
            </li>
            <li><a href="#expandFranchise" target="_blank">Expand Your Franchise</a></li>


            <li><a href="https://www.franchiseindia.com/property-loan" target="_blank">Loan Against Property</a></li>
        </ul>
        <ul class="list-unstyled components border-bottom-1">
            <li><a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">Advertise With
                    us</a></li>
            <li><a href="https://master.franchiseindia.com/magazine-subscribe/" target="_blank">Subscribe Magazine</a>
            </li>
            <li><a href="https://www.franchiseindia.com/book" target="_blank">Reports
                    &amp; Books</a>
            </li>
            <li><a href="https://www.franchiseindia.com/event/" target="_blank">Event</a></li>
        </ul>
        <ul class="list-unstyled components">
            <li><a href="https://www.franchiseindia.com/investor/create" target="_blank">Investor Signup</a></li>
            <li><a href="https://www.franchiseindia.com/franchisor/registration/step/1" target="_blank">Franchisor
                    Signup</a></li>
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
                                <img src="{{ url('newhomepage/assets/img/instagram-icon.svg') }}"
                                    alt="instagram-icon">
                            </a>
                        </li>
                        <li>
                            <a href="{{ $youtube }}" target="_blank">
                                <img src="{{ url('newhomepage/assets/img/you-tube-icon.svg') }}" alt="youtube-icon">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/franchiseindia/" target="_blank">
                                <img src="{{ url('newhomepage/assets/img/linkedin-new.svg') }}" alt="linkedin-icon">
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="main-link">
                    <ul class="main-link-section">
                        <li><a href="https://www.franchiseindia.com/about" target="_blank">About us</a></li>
                        <li><a href="https://www.franchiseindia.com/contact" target="_blank">Contact us</a></li>
                        <li><a href="https://www.franchiseindia.com/feedback" target="_blank">Feedback</a></li>
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
@endif
