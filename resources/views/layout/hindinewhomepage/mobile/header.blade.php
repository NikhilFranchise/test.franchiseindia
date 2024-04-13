<header class="header" id="header">
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
                                    src="https://www.franchiseindia.com/images/filogob.png" alt="Franchise India Logo"></a>

                    </div>


                    
                    <div class="ml-auto d-flex">
                           <span class="login-text-right text-right"
                                 data-toggle="modal" data-target="#search">
                           <img src="{{url('newhomepage/assets/img/Search.svg')}}" alt="Home Search">
                           </span>
                        @if(Auth::check())
                            <span class="login-text-right text-right" id="sidebarCollapse-main-login">
                           <img src="{{url('newhomepage/assets/img/Login.svg')}}" alt="Login">
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
</header>