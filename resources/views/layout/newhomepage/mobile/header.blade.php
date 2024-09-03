<header class="header" id="header">
        <div class="topmost">
            <marquee>
Franchise India 2022, 18<sup>th</sup> International Franchise and Retail Show <a href="https://www.franchiseindia.com/expo/?id=dotcom" target="_blank">Book your ticket</a>   
</marquee>
<a id="myclose">x</a>
        </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="d-flex">
                    <div class="p-2">
                        <div id="sidebarCollapse" class="menu-bar">
                            <img src="{{url('newhomepage/assets/img/menu-icon.svg')}}" alt="Menu" />
                        </div>
                    </div>
				<div class="p-2 logo"> <a href="{{url('')}}"><img
                    src="{{url('newhomepage/assets/img/Logo.svg')}}" alt="@yield('seoTitle','Franchise India - Business Opportunities, Franchise Opportunities')" title="@yield('seoTitle','Franchise India - Business Opportunities, Franchise Opportunities')"></a>
						  </div> 

                    <div class="ml-auto d-flex">
                           <span class="login-text-right text-right"
                                 data-toggle="modal" data-target="#search-main">
                           <img src="{{url('newhomepage/assets/img/Search.svg')}}" alt="Home Search">
                           </span>
                        @if(Auth::check())
                            <span class="login-text-right text-right" id="sidebarCollapse-main-login">
                           <img src="{{url('newhomepage/assets/img/Login.svg')}}" alt="Login" id="leftsidebar-open">
                           </span>
                        @else
                            <span class="login-text-right text-right"
                                  data-toggle="modal" data-target="#login-pnl" id="loginselect">
                           <img src="{{url('newhomepage/assets/img/Login.svg')}}" alt="Login">
                           </span>
                        @endif
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overin"></div>
</header>