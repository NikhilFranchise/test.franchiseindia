@extends('layout.master')
@section('seoTitle','Franchise Login – Investor | Franchisor – FranchiseIndia')
@section('seoDesc','Franchise login for investors and Franchisors. Login now or Create New Account as investor or Franchisor and expand your business with FranchiseIndia today!')
@section('content')

    <!--form start here -->
    <div class="container formsection  mabs">
        <div class="row loginpanel">
            <div class="leftpanel">
                <div class="loghead">Login</div>
                <form class="form-horizontal" method="post" action="{{route('franchise.login.submit')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @if (session()->has('loginFailed'))
                        <div class="alert alert-info">{{ session()->get('loginFailed') }}</div>
                    @endif

                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{URL::asset('images/user.png')}}"></span>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter Your User ID" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{URL::asset('images/pwd.png')}}"></span>
                                <input type="password" name="password" class="form-control"
                                       placeholder="Enter Your Password" required>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="">
                        <input type="submit" class="btn btn-default loginsign" value="Sign in"/> <span
                                class="pipe">|</span> <a class="frg-link" data-toggle="modal" data-target="#login-pnl"
                                                         href="#" onclick="frg_panel()">Forgot
                            Password</a>
                    </div>
                </form>
                <div class="dissol">
                    <div class="signpop"><span>or Sign in With</span></div>
                    <ul class="socl">
                        <li><a href="{{Config::get('constants.MainDomain')}}/auth/google"><i class="fa fa-google fa-lg" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="rightpanel">
                <div class="memtxt">
                    Not a<br/>
                    Member?
                </div>
                <div class="loginblklink">
                    <span class="baprt">Start A Business Today</span>
                    <a href="{{Config::get('constants.MainDomain')}}/investor/create" class="btn btn-default loginlink">Investor
                        Registration</a>
                </div>
                <div class="loginblklink">
                    <span class="baprt">Appoint a channel partner</span>
                    <a href="{{Config::get('constants.MainDomain')}}/franchisor/registration/step/1"
                       class="btn btn-default loginlink">Franchisor Registration</a>
                </div>

            </div>
        </div>

    </div>
@endsection





