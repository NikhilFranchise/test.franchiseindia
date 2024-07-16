@extends('layout.master')

@section('content')
    <!--form start here -->
    <div class="container formsection margintop60 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1>Reset Password</h1>
                <br /><br />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                @csrf
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label mandatory">E-Mail Address :</label>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <img src="{{ URL::asset('images/email.png') }}">
                            </span>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                name="email" value="{{ old('email', $email ?? '') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label mandatory">Password :</label>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <img src="{{ URL::asset('images/pwd.png') }}">
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your Password"
                                id="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label mandatory">Confirm Password :</label>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <img src="{{ URL::asset('images/pwd.png') }}">
                            </span>
                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                                name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <center>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-default">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </center>
            </form>
        </div>
    </div>
    <!--form end here -->
@endsection
