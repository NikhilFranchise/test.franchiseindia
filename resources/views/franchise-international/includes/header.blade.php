<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="en-in" name="language"/>
        <title>International Franchise, Franchising - Franchise India</title>
        <meta content="Franchise Opportunity " http-equiv="{{ url('/') }}" name="Franchise India Holdings Ltd"/>
        <meta name="Description" content="Welcome to Franchise India for international franchises business opportunities, international franchise services. Know more about international franchise guide." />
        <meta name="Keywords" content="international franchise, franchising, international franchises business opportunities, franchise india, international franchise services, international franchise association, international franchise guide" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <link rel="preload" href="{{ url('https://static.zdassets.com/ekr/asset_composer.js') }}" as="script">
        <link rel="preload" href="{{ url('https://pagead2.googlesyndication.com/pagead/show_ads.js') }}" as="script">
        <link rel="preload" href="{{ url('https://pagead2.googlesyndication.com/pagead/osd.js') }}" as="script">
        <link rel="preload" href="{{ url('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js') }}" as="script">
        <link rel="preload" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js') }}" as="script">
        <link rel="preload" href="{{ url('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js') }}" as="script">
        <link rel="preload" href="{{ url('https://www.googletagservices.com/tag/js/gpt.js') }}" as="script">
        <link rel="preload" href="{{ url('css/font-awesome.min.css') }}" as="style">
        <link rel="preload" href="{{ url('css/bootstrap.min.css') }}" as="style">
        <link rel="preload" href="{{ url('font.css') }}" as="style">
        <link rel="preload" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css') }}" as="style">
        <link rel="preload" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css') }}" as="style">
        <link rel="preload" href="{{ url('franchiseinternational/css/styleuae.css?ver=2') }}" as="style">
        <link rel="preload" href="{{ url('css/testimonial.css') }}" as="style">
        <link rel="preload" href="{{ url('franchiseinternational/css/sidemenu.css') }}" as="style">
        <link rel="preload" href="{{ url('css/jquery.bxslider.css?ver=2') }}" as="style">

        <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{url('css/font.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" type="text/css"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
        <link rel="stylesheet" href="{{url('franchiseinternational/css/styleuae.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{url('franchiseinternational/css/testimonialint.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{url('franchiseinternational/css/sidemenu.css')}}">
        <link rel="stylesheet" href="{{url('css/jquery.bxslider.css?ver=2')}}" type="text/css" />

        <script async src="{{ url('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js') }}"></script>
        <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
        <script>

            window.googletag = window.googletag || {cmd: []};
            googletag.cmd.push(function() {
            //    @desktop
            @if ($agent->isDesktop())

                googletag.defineSlot('/1057625/FIHL/Desktop_HP_970x90_Mid_1', [970, 90], 'adslot970x90_Mid_1').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/Desktop_HP_970x90_BTF', [[728, 90], [970, 90]], 'adslot728x90_BTF').addService(googletag.pubads());
            //    @enddesktop
            @endif
            @if ($agent->isTablet())

            //    @tablet
               googletag.defineSlot('/1057625/FIHL/Tab_ROS_728x90_ATF_1', [728, 90], 'adslot728x90_ATF_1').addService(googletag.pubads());

                googletag.defineSlot('/1057625/FIHL/Tab_HP_728x90_BTF', [728, 90], 'adslot728x90_BTF').addService(googletag.pubads());
                // @endtablet
                @endif
                @if ($agent->isMobile())

                // @mobile
                googletag.defineSlot('/1057625/FIHL/WAP_HP_300x250_ATF', [300, 250], 'adslot300x250_ATF').addService(googletag.pubads());
                googletag.defineSlot('/1057625/FIHL/WAP_HP_300x250_BTF', [300, 250], 'adslot300x250_BTF').addService(googletag.pubads());
                // @endmobile
                @endif
                googletag.pubads().enableSingleRequest();
                googletag.enableServices();
            });
        </script>

    </head>
<body>
@php
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
@endphp

<div class="o-wrapper" id="o-wrapper"></div>
<div class="row bydef" id="headstickae">
    <header >
        <div class="container poshead">
            
            <!--only mode start here -->
            <div class="mobiehe">
                <div class="tolfree">Hotline: 1800 102 2007</div>
                <div> &nbsp;</div>
            </div>
            <!--only mode end  here -->

            <div class="navb"><span id="c-button--slide-left" ><img src="{{url('images/menu-icon.png')}}" alt="Menu Icon"></span></div>
            <div class="logo tbpad15">
                <a href="{{ url('/international') }}"><img src="{{url('images/logo.png')}}" alt="Franchise Logo"></a>
            </div>        
            <div class="headersearch" style="display:none;">
                <form action="{{ url('/category/searchby') }}" id="search-form-top" method="get">
                    <ul class="seablk">
                        <li class="wd">
                            <select name="mc" id="getMainCategoryDataHeaderLocTop" class="form-control myselectclasscat2" required>
                                <option value="">Select Industry</option>
                                @foreach( $catArr as $categoryId => $categoryName)
                                    @php
                                        $url = Config('constants.MainDomain').'/business-opportunities/'.Config('category.SeoCategoryArr.'.$categoryId).'.m'.$categoryId;
                                    @endphp
                                    <option value="{{ $categoryId }}" slug="{{Config('category.SeoCategoryArr.'.$categoryId)}}" url="{{$url}}" >{{ $categoryName }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="wd2">
                            <select class="form-control myselectclasscat" id="stateHeaderTop" name="loc" >
                                <option value="">Select Location</option>
                                @foreach(Config('location.stateArr') as $key => $value)
                                    <option value="{{$key}}" slug="{{strtolower(str_slug($value))}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="wd3">
                            <select class="form-control myselectclasscat" id="investmentTop" name="investment">
                                <option value=""> Select Investment</option>
                                @foreach (Config('constants.investRangeInWords') as $key => $value)
                                    <option value="{{$key}}" min_range="{{ Config('constants.InvestRange.'.$key.'.min') }}" max_range="{{ Config('constants.InvestRange.'.$key.'.max') }}" >{{$value}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="wd4"><input type="submit" class="form-control" value="Search" ></li>
                    </ul>
                </form>
            </div>
                
            <div class="socialregblk">
                <ul class="smedia">
                    <li><a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i class="fa fa-facebook fa-lg"></i></a></li>
                    <li><a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li><a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i class="fa fa-linkedin fa-lg"></i></a></li>
                    <li><a href="http://www.youtube.com/user/FranchiseIndia" target="_blank"><i class="fa fa-youtube-play fa-lg"></i></a></li>
                </ul>

                <div class="btnblk">
                    <ul class="righlink">
                        @php
                            $loginUrl  = Config('constants.MainDomain') . '/loginform';
                            $loginName = 'Login';
                            $class     = '';
                            $regName   = 'Register';
                            $regUrl    = '#';
                            $modelWindow = "data-toggle=modal data-target=#login-pnl";
                            if (Auth::check()) {
                                $loginUrl  = Config('constants.MainDomain') . '/logoutprofile';
                                if ( Auth::user()->profile_type == config('constants.ProfileType.Franchisor') )
                                    $regUrl    = Config('constants.MainDomain') . '/franchisor/myaccount/dashboard';
                                if ( Auth::user()->profile_type == config('constants.ProfileType.Investor') )
                                    $regUrl    = Config('constants.MainDomain') . '/investor/myaccount/dashboard';
                                $loginName = 'Logout';
                                $regName   = 'My Account';
                                $modelWindow = '';
                                $class     = 'mybtn';
                            }
                        @endphp
                        <li class="hidemobilemenu"><a href="{{$regUrl}}" {{$modelWindow}} class="btn btn-default {{$class}}" id="registerselect">{{$regName}}</a></li>
                        @if (Auth::check())
                            <li class="hidedesktopmenu"><span  id="c-button--slide-right" class="btn btn-default myaccount {{$class}}" >My Account</span></li>
                            <li><a href="{{$loginUrl}}" class="btn btn-default {{$class}}" id="loginselect">{{$loginName}}</a></li>
                        @endif
                        @if (!Auth::check())
                            <li class="hidedesktopmenu"><a  href="{{$regUrl}}" {{$modelWindow}} class="btn btn-default {{$class}}" id="mobilereg">Register</a></li>
                            <li><a href="{{$regUrl}}" {{$modelWindow}} class="btn btn-default {{$class}}" id="loginselect">{{$loginName}}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>

<!--new code start here -->
 <div class="topbt">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-2 bdn mrg-mdy txt-center">Hotline: 1800 102 2007</div>
            <div class="col-sm-8 col-md-9 headmodfiy">
                <ul class="sublink">
                    <li><a href="{{ Config('constants.MainDomain') }}/content/">What's New</a></li>
                    <li><a href="https://news.franchiseindia.com/">News</a></li>
                    <li><a href="https://video.franchiseindia.com/">Videos</a></li>
                    <li><a href="{{ Config('constants.MainDomain') }}/advertise-with-us-payment/">Advertise</a></li>
                    <li><a href="https://master.franchiseindia.com/emagazine/" target="_blank">Subscribe</a></li>
                </ul>

                <!--web site url star here-->
                <div class="headarticle sublinkdrop">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">Our Sites <i class="fa fa-angle-down fa-lg"></i></a>
                        <ul class="dropdown-menu website">
                            <li class="dropactive"><a target="_blank" href="{{ Config('constants.MainDomain') }}/" rel="nofollow" class="dotcom"></a></li>
                            <li><a  href="https://retail.franchiseindia.com/" rel="nofollow" target="_blank" class="irin"> </a></li>
                            <li><a href="https://www.entrepreneur.com/" rel="nofollow" target="_blank" class="entin"> </a></li>
                            <li><a href="{{ Config('constants.MainDomain') }}/restaurant" class="riin"> </a></li>
                            <li><a href="{{ Config('constants.MainDomain') }}/wellness" class="wiin"> </a></li>
                            <li><a href="{{ Config('constants.MainDomain') }}/education" class="eiin"></a></li>
                            <li><a href="https://www.licenseindia.com/" target="_blank" class="liin"></a></li>
                            <li><a href="https://www.franchiseindia.com/dealers-distributor" class="dealerin"></a></li>
                        </ul>
                    </div>
                </div>
                <!--web site url end here-->    
                
                <!--location  url start here-->
                <div class="headarticle sublinkdrop2">                    
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">All India <i class="fa fa-angle-down fa-lg"></i></a>
                        <div class="dropdown-menu">
                            <div class="se-c-hide"><a href="#" id="allopt2">X</a></div>
                            <ul class="all-city-link">
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/andhra-pradesh.LOC1">Andhra Pradesh</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/arunachal-pradesh.LOC2">Arunachal Pradesh</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/assam.LOC3">Assam</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/bihar.LOC4">Bihar</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/chandigarh.LOC5">Chandigarh</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/chhattisgarh.LOC6">Chhattisgarh</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/daman-and-diu.LOC7">Daman &amp; Diu</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/goa.LOC8">Goa</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/gujarat.LOC9">Gujarat</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/haryana.LOC10">Haryana</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/himachal-pradesh.LOC11">Himachal Pradesh</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/jammu-and-kashmir.LOC12">Jammu  &amp; Kashmir</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/jharkhand.LOC13">Jharkhand</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/karnataka.LOC14">Karnataka</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/kerala.LOC15">Kerala</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/lakshadweep.LOC16">Lakshadweep</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/madhya-pradesh.LOC17">Madhya Pradesh</a></li>
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/maharashtra.LOC18">Maharashtra</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/manipur.LOC19">Manipur</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/meghalaya.LOC20">Meghalaya</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/mizoram.LOC21">Mizoram</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/nagaland.LOC22">Nagaland</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/delhi.LOC23">Delhi</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/orissa.LOC24">Orissa</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/pondicherry.LOC25">Pondicherry</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/punjab.LOC26">Punjab</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/rajasthan.LOC27">Rajasthan</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/sikkim.LOC28">Sikkim</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/tamilnadu.LOC29">Tamilnadu</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/tripura.LOC30">Tripura</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/uttaranchal.LOC31">Uttaranchal</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/uttar-pradesh.LOC32">Uttar pradesh</a></li>   
                                <li><a href="{{ Config('constants.MainDomain') }}/business-opportunities/west-bengal.LOC33">West-bengal</a></li>   
                            </ul>
                        </div>                  
                    </div> 
                </div>
                <!--location url end here-->   

                <!--search  start here -->
                    <div class="headarticle sublinkdropsearch">                               
                        <span id="searchopt"><i class="fa fa-search"></i></span>
                        <div class="searchoption">
                            <div class="se-c-hide" id="searchopt2">X</div>
                            <div class="searchblk">
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
                        </div>
                    </div>
                    <!--search  end here -->
                </div>
            </div>
        </div>
    </div>


<!-- Login modal Window -->
<div class="modal fade lg-panel formsection" id="login-pnl" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>

                <!-- Nav tabs -->
                <div class="frgt-pwd" id="frg-pnl" style="display:none;">
                    <div class="ttl">Forgot Password</div>
                    <div class="desc">
                        Enter your email address associated with your Franchiseindia account and we'll send you a link
                        to reset your password.
                    </div>
                    <div class="frm-pnl">
                    <form class="form-horizontal" method="POST" action="{{Config('constants.MainDomain')}}/password/email">
                        <div class="input-group">
                            <span class="input-group-addon"><div class="usersprite"></div></span>
                            
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email-Id" value="" required>
                        </div>
                        <button type="submit" class="btn btn-default btn-gry btn-prop">Reset Password</button>    <span class="pipe">|</span> <a class="frg-link" href="#" onClick="lg_panel()">Login</a>
                        </form>
                     
                    </div>
                </div>
                <div id="lg-pnl" style="display:block;">
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="loginactiveopen"><a href="#login" aria-controls="login" role="tab" data-toggle="tab" id="loginactive">LOGIN</a></li>
                        <li id="registeractiveopen"><a href="#register" aria-controls="register" role="tab" data-toggle="tab" id="registeractive">REGISTER</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="login">
                            <form method="post" action="{{Config('constants.MainDomain')}}/loginform">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="frm-pnl">
                                    <div class="input-group">
                                        <span class="input-group-addon"><div class="usersprite"></div></span>
                                        <input type="email" class="form-control" required name="email" placeholder="Enter Your User ID">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><div class="pwdsprite"></div></span>
                                        <input type="password" required name="password" class="form-control" placeholder="Enter Your Password">
                                    </div>
                                    <button type="submit" class="btn btn-default btn-gry btn-prop">SIGN IN</button>
                                    <span class="pipe">|</span> <a class="frg-link" href="#" onClick="frg_panel()">Forgot
                                        Password</a>
                                </div>
                            </form>
                            
                            <div class="popfi">
                                <div class="signpop"></div>
                                <div class="popleft">
                                <span>or Sign in With</span>
                                <ul class="socl">
                                    <li><a href="{{Config('constants.MainDomain')}}/auth/facebook"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li>
                                    <li><a href="{{Config('constants.MainDomain')}}/auth/google"><i class="fa fa-google fa-lg" aria-hidden="true"></i></a></li>
                                    {{--<li><a href="{{Config('constants.MainDomain')}}/auth/linkedin"><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i></a></li>--}}
                                    </ul>
                                </div>
                               <div class='popright'>New User <a href="#" id="loginselect1">Click here</a></div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="register">
                            <form class="form-horizontal" id="registration">
                                <div class="frm-pnl">
                                    <center>
                                           <div><a href="{{Config('constants.MainDomain')}}/investor/create" class="btn btn-large btn-default btn-gry btn-prop"> Start A Business Today<span>(Investor Registration) </span></a></div>
                                           <br>
                                           <div><a href="{{Config('constants.MainDomain')}}/franchisor/registration/step/1" class="btn btn-large btn-default btn-gry btn-prop"  >Appoint Channel Partners <span> (Franchisor Registration) </span> </a></div>
                                    </center>  
                                </div>
                            </form>
                            <div class="popfi regspace">
                                <div class="signpop"></div>
                               Registered User <a href="#" id="registerselect1">Login here</a>                  
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="footer-ttl">Why should I register?</div>
                <div class="footer-desc">
                    <p>To get access to over 10000+ Franchise Business Opportunities.</p>
                    <p>Network with the growing Business Community to get expert interventions to let you learn to Grow
                        & Expand your Business with Franchising.</p>
                </div>
            </div>
        </div>
    </div>
</div>
