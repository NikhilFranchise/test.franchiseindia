@php

    $catArr = Config('hindiConstants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
    $loginUrl = 'https://www.franchiseindia.com/loginform';
    $loginName = 'लॉगिन';
    $class = '';
    $regName = 'पंजीकृत करें';
    $regUrl = '#';
    $modelWindow = "data-toggle=modal data-target=#login-pnl";
    $barndStick = 0;
    $googleSearchTop = 0;
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if(request()->segment(1) === 'brands' || (request()->segment(1) === 'hi' && request()->segment(2) === 'brands'))
        $barndStick = 1;
    $eduUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = "logo-black.svg";
    $menuicon = "menu-icon.png";
    $logoClass = "logo";
    $mainUrl = "";
    $webtitleUrl = request()->segment(1);
    $mangecls = "";
    if ($webtitleUrl == 'content')
        $dotUrlSelected = 'class=dropactive';
    if ($webtitleUrl == 'education') {
        $eduUrlSelected = 'class=dropactive';
        $logo = "education-logo-black.svg";
        $menuicon = "menu-iconei.png";
        $logoClass = "logo wiei";
        $mainUrl = "education";
        $mangecls = "wiei";
    }
    if ($webtitleUrl == 'wellness') {
        $wellUrlSelected = 'class=dropactive';
        $logo = "wellness-logo-black.svg";
        $menuicon = "menu-iconwi.png";
        $logoClass = "logo wiei";
        $mainUrl = "wellness";
        $mangecls = "wiei";
    }
@endphp
<header class="header" id="header">
       
    <div class="topbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-30 d-flex">
                        <div class="p-2">
                            <ul class="top-navigation">
                                <li>
                                    <a href="https://www.businessex.com/"> मौजूदा व्यापार को बेचें / खरीदें</a>
                                </li>
                                <li>
                                    <a href="https://www.franchiseindia.com/#expandFranchise">अपने फ्रैंचाइज़ी का विस्तार करें</a>
                                </li>

                                <li>
                                    <a href="https://www.franchiseindia.com/advertise-with-us-payment" target="_blank">विज्ञापन दें</a>
                                </li>
                                   <li>
                                        <a href="https://www.franchiseindia.com/property-loan/" target="_blank">संपत्ति के खिलाफ ऋण </a>
                                    </li>                                 

                            </ul>
                        </div>
                        {{-- @notmobile --}}
                        @if ($agent->isDesktop())
                            
                       @if($__env->yieldContent('hindiUrl'))
                            <div class="p-2 ml-auto">
                                <div class="input-group
                                          input-group-custom">
                                          <span class="input-group-addon
                                             input-group-prepend-custom"
                                                id="basic-addon1">
                                             <img
                                                     src="{{url('newhomepage/assets/img/language-icon.svg')}}"
                                                     alt="">
                                          </span>
                                    <div class="form-group form-group-sm">
                                        <select class="form-control
                                                form-control-custom-main"
                                                id="language-changer">
                                            <option hidden>Language</option>
                                            <option value="@yield('englishUrl')" @if($engUrl == Request::url()) selected @endif>EN - English</option>
                                            <option value="@yield('hindiUrl')" @if($hindiUrl == Request::url()) selected @endif>HI - Hindi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @endif
                        {{-- @endnotmobile --}}
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="header-btm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex p-30">
                        <div class="p-2">
                            <div id="sidebarCollapse"
                                 class="menu-bar">
                                <img src="{{url('newhomepage/assets/img/menu-icon.svg')}}"
                                             alt="Franchise Menu Icon" />
                                          <span>मेन्यू</span>
                                       </div>
                                    </div>

                                    <div class="logo"> <a href="{{url('')}}"><img
                                             src="https://www.franchiseindia.com/images/filogob.png" alt=" Franchiseindia Logo"></a></div>

                                    <div class="d-flex">
                                       <!-- <span
                                       id="search" class="search show
                                          slide-right"> -->
                                       <span class="search" id="search">
                                          <div class="p-2" data-toggle="modal"
                                             data-target="#search-main">
                                             <img src="{{url('newhomepage/assets/img/Search.svg')}}"
                                     alt="Search"><span>खोज</span>
                            </div>
                            </span>
                            <span class="login-text-right text-right
                                          d-main">
                                          <span>
                                             <img src="{{url('newhomepage/assets/img/Login.svg')}}"
                                              alt="Franchiseindia Login"/>
                                          </span>
                                          <ul class="login-main-section">
                                           @if (Auth::check())
                                                  <li><a href="{{url('investor/myaccount/dashboard')}}">मेरा खाता</a></li>
                                                  <li><a href="{{url('logoutprofile')}}"> लॉग आउट</a></li>
                                              @endif
                                              @if (!Auth::check())
                                                  <li><a href="#"
                                                         data-toggle="modal"
                                                         data-target="#login-pnl"
                                                         id="mobilereg">रजिस्टर</a></li>
                                                  <li><a href="#" data-toggle="modal"
                                                         data-target="#login-pnl"
                                                         id="loginselect">लॉग इनं</a></li>
                                              @endif
                                       </ul>
                                       </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    $(function(){
        // bind change event to select
        $('#language-changer').on('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });
</script>
