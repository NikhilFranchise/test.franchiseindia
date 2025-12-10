<!DOCTYPE html>
<html lang="en">

<head>
    <title>Franchiseindia.com Admin Dashboard</title>
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
    </style>
</head>

<body>
    <div id="loginbox">
        <form class="form-vertical" action="{{ route('crreAdmin.forgot') }}" method="POST"
            onsubmit="return validatePassword()">
            @csrf
            <div class="control-group normal_text">
                <h3><img src="{{ url('admin/img/logo.png') }}" width="200" alt="Logo" /></h3>
                <!-- <h4>Reset Admin Password</h4> -->
                <p class="normal_text">Enter your E-mail address and New password below and we will reset your password.
                </p>
            </div>

            {{-- @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif --}}
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="fa fa-user"></i></span>
                        <input type="email" placeholder="Email Address" name="email" required />
                        {{-- @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                </div>
            </div>
            <!-- New Password -->
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box password-wrapper">
                        <span class="add-on bg_ly"><i class="fa fa-lock"></i></span>
                        <input type="password" id="password" name="password" placeholder="New Password" required
                            class="validate-password" />
                        <span class="toggle-password" onclick="togglePassword('password', this)">
                            <i class="fa fa-eye"></i>
                        </span>
                        {{-- @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box password-wrapper">
                        <span class="add-on bg_ls"><i class="fa fa-lock"></i></span>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Password" class="validate-password" />
                        <span class="toggle-password" onclick="togglePassword('password_confirmation', this)">
                            <i class="fa fa-eye"></i>
                        </span>
                        {{-- @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <span class="pull-left">
                    <a href="{{ route('crreAdmin.LoginView') }}" class="flip-link btn btn-primary">&laquo; Back to
                        Login</a>
                </span>
                <span class="pull-right">
                    <button type="submit" class="btn btn-success">Reset Password &raquo;</button>
                </span>
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
                text: '{{ session('success') }}',
                confirmButtonColor: '#28a745'
            });
        </script>
    @endif

    @if (session('warning'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: '{{ session('warning') }}',
                confirmButtonColor: '#ffc107'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                html: '{{ session('error') }}',
                confirmButtonColor: '#dc3545'
            });
        </script>
    @endif
    <script>
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

        function validatePassword() {
            const pwd = document.getElementById("password");
            const confirmPwd = document.getElementById("password_confirmation");
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

            if (!regex.test(pwd.value)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Weak Password',
                    text: 'Password must contain at least 6 characters, including an uppercase letter, lowercase letter, and a number.'
                });
                pwd.focus();
                return false;
            }

            if (pwd.value !== confirmPwd.value) {
                Swal.fire({
                    icon: 'error',
                    title: 'Passwords Do Not Match',
                    text: 'Please ensure both password fields match.'
                });
                confirmPwd.focus();
                return false;
            }

            return true;
        }

        // Live validation for input borders
        document.getElementById("password").addEventListener("input", function() {
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
            this.classList.remove('is-valid', 'is-invalid');
            this.classList.add(regex.test(this.value) ? 'is-valid' : 'is-invalid');
        });

        document.getElementById("password_confirmation").addEventListener("input", function() {
            const pwd = document.getElementById("password").value;
            this.classList.remove('is-valid', 'is-invalid');
            this.classList.add(this.value === pwd ? 'is-valid' : 'is-invalid');
        });
    </script>

</body>

</html>
