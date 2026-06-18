<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login at FranchiseIndia Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/css/matrix-login.css') }}" />
    <link href="{{ URL::asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="shortcut icon" href="https://www.franchiseindia.com/favicon.ico" type="image/x-icon" />
    <style>
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
            float: right;
            box-shadow: none;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #5a6268;
            color: #fff;
            box-shadow: none;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
            color: #fff;
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
        }

        .main_input_box input {
            padding-right: 35px;
        }

        .is-valid {
            border: 2px solid #28a745 !important;
            /* Green */
        }

        .is-invalid {
            border: 2px solid #dc3545 !important;
            /* Red */
        }

        .text-danger {
            color: rgb(224, 16, 16);
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div id="loginbox">
        <form id="loginform" class="form-vertical" method="POST" action="{{ route('crreAdmin.Login') }}">
            @csrf
            <div class="control-group normal_text">
                <h3><img src="{{ url('admin/img/logo.png') }}" alt="Logo" /></h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="fa fa-user"></i></span>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="email id & username" name="email" value="{{ old('email') }}" autofocus
                            required />
                    </div>
                    {{-- @error('email')
                        <div class="alert alert-danger">{{ $message }}
                </div>
                @enderror --}}
            </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <div class="main_input_box password-wrapper">
                <span class="add-on bg_ly"><i class="fa fa-lock"></i></span>
                <input type="password" class="validate-password" placeholder="Password" name="password"
                    id="password" required />
                <span class="toggle-password" onclick="togglePassword('password', this)">
                    <i class="fa fa-eye"></i>
            </div>
            {{-- @error('password')
                        <div class="alert alert-danger">{{ $message }}
        </div>
        @enderror --}}
    </div>
    </div>
    <div class="form-actions">
        <span class="pull-left"><a href="{{ route('crreAdmin.reset') }}" class="flip-link btn btn-secondary"
                id="forgotLink" style="display:none;">&laquo; Forgot
                password?</a></span>
        <span class="pull-right"><button type="submit" class="flip-link btn btn-success">Login
                &raquo;</button></span>
    </div>
    </form>
    </div>

    <script src="{{ URL::asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/matrix.login.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: `{!! session('success') !!}`,
            confirmButtonColor: '#28a745'
        });
    </script>
    @endif

    @if (session('warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: `{!! session('warning') !!}`,
            confirmButtonColor: '#ffc107'
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            html: `{!! session('error') !!}`,
            confirmButtonColor: '#dc3545'
        });
    </script>
    @endif

    <script>
        // Toggle Password Visibility
        function togglePassword(id, toggleIcon) {
            const input = document.getElementById(id);
            const icon = toggleIcon.querySelector('i');

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        document.getElementById("password").addEventListener("input", function() {
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
            this.classList.remove('is-valid', 'is-invalid');
            this.classList.add(regex.test(this.value) ? 'is-valid' : 'is-invalid');
        });

        document.addEventListener("DOMContentLoaded", function() {

            const emailInput = document.querySelector('input[name="email"]');
            const forgotLink = document.getElementById("forgotLink");

            emailInput.addEventListener('blur', function() {

                let email = this.value;

                if (email === '') return;

                fetch("{{ route('crreAdmin.checkRole') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            email: email
                        })
                    })
                    .then(res => res.json())
                    .then(data => {

                        if (data.role == "admin" || data.role == "superadmin") {
                            forgotLink.style.display = 'inline-block';
                        } else {
                            forgotLink.style.display = 'none';
                        }

                    });
            });
        });
    </script>

</body>

</html>