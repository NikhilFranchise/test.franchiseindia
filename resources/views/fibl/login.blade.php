<!DOCTYPE html>
<html lang="en">

<head>
    <title>Franchisor Login -Franchise India </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/css/matrix-login.css') }}" />
    <link href="{{ URL::asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <div id="loginbox">
        <form id="loginform" class="form-vertical" action="{{ Config::get('constants.MainDomain') }}/fibl/login"
            method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if ($errors->has('loginFailed'))
                <div class="alert alert-danger">{{ $errors->first('loginFailed') }}</div>
            @endif
            <div class="control-group normal_text">
                <h3><img src="{{ URL::asset('admin/img/logo.png') }}" alt="Logo" /></h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                            placeholder="FRANCHISOR ID" name="fid" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"
                            placeholder="Password" name="password" required />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <!-- <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span> -->
                <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</button></span>
            </div>
        </form>
        {{-- <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</span>
                </div>
            </form> --}}
    </div>

    <script src="{{ URL::asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/matrix.login.js') }}"></script>
</body>

</html>
