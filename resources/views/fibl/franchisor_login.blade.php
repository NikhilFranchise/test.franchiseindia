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
    <style>
        .select {
            height: 38px;
            vertical-align: top;
            border: 0px;
            display: inline-block;
            width: 77%;
            line-height: 0px;
            margin-bottom: 2px;
        }
    </style>
</head>

<body>
    <div id="loginbox">
        <form id="loginform" class="form-vertical" action="{{ Config::get('constants.MainDomain') }}/fihl/login"
            method="POST">
            {{--  <input type="hidden" name="_token" value="{{ csrf_token() }}">  --}}
            @csrf
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
                            placeholder="Email ID" name="email_id" onkeyup="franchisorlogin(this.value)" required />
                    </div>
                </div>
            </div>
            <div class="control-group" id="company_div" style="display: none">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                        <select class="select" name="fihl_id" id="fihl_id">
                            <option value="">Select Company</option>

                        </select>
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

    </div>

    <script src="{{ URL::asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/matrix.login.js') }}"></script>
</body>
<script>
    function franchisorlogin(fihlmail) {
        let fmail = fihlmail;

        $.ajax({
            type: "GET",
            data: {
                fmail: fmail
            },
            url: '/getrecord',
            success: function(data) {
                console.log(data); // Check what data is coming in

                if (Array.isArray(data) && data.length > 0) { // If data is an array and has elements
                    let select = $("#fihl_id");
                    document.getElementById('company_div').style.display = 'block'; // Show the div
                    select.empty(); // Clear the existing options
                    select.append('<option value="">Select Company</option>'); // Add default option

                    // Loop through the data to append each option
                    $.each(data, function(index, value) {
                        select.append('<option value="' + value.profile_str + '">' + value
                            .company_name + '</option>');
                    });
                } else if (typeof data === 'object' && data !== null && Object.keys(data).length > 0) {
                    // Handle case where data is an object and not an array
                    let select = $("#fihl_id");
                    document.getElementById('company_div').style.display = 'block'; // Show the div
                    select.empty(); // Clear the existing options
                    select.append('<option value="">Select Company</option>'); // Add default option
                    select.append('<option value="' + data.profile_str + '">' + data.company_name +
                        '</option>');
                } else {
                    document.getElementById('company_div').style.display =
                    'none'; // Hide the div if no data
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error); // Handle any errors
                document.getElementById('company_div').style.display =
                'none'; // Hide the div if an error occurs
            }
        });
    }
</script>

</html>
