@extends('admin.layout.master')
@section('DAU', 'active open')
@section('LA', 'active')
@section('content')
    @push('styles')
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
                right: 35px;
                transform: translateY(-50%);
                cursor: pointer;
                color: #888;
            }

            .main_input_box input {
                padding-right: 35px;
            }

            .is-valid {
                border: 1px solid #28a745 !important;
                /* Green */
            }

            .is-invalid {
                border: 1px solid #dc3545 !important;

                /* Red */
            }

            .text-danger {
                color: rgb(224, 16, 16);
                font-size: 12px;
            }
        </style>
    @endpush
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                    class="fa fa-home"></i> Home</a> <a href="{{ route('list.author') }}" class="tip-bottom"
                title="Go to Manage Authors"><i class="fa fa-users"></i>Manage Authors</a> <a href="{{ url()->current() }}"
                class="current">{{ isset($author) ? 'Update' : 'Add' }} Author</a></div>

        {{-- <h1>{{ isset($author) ? 'Update' : 'Add' }} Author</h1> --}}
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"> <i class="fa fa-users"></i> </span>
                    <h5>{{ isset($author) ? 'Update' : 'Add' }} Author</h5>
                </div>
                <div class="widget-content nopadding">
                    {{-- Validation error messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Please fix the following errors:</strong>
                            <ul style="margin-top: 10px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="editform" method="POST"
                        action="{{ route(isset($author) ? 'update.author' : 'register.author') }}"
                        enctype="multipart/form-data" class="form-horizontal" onsubmit="return validateform()">
                        @csrf
                        <input type="hidden" name="author_id" value="{{ $author->author_id ?? '' }}">
                        <div class="row-fluid">
                            <!-- Left column -->
                            <div class="span6">
                                <div class="widget-box">
                                    <div class="widget-title">
                                        <h5>General</h5>
                                    </div>
                                    <div class="widget-content nopadding">

                                        <div class="control-group">
                                            <label class="control-label">Author Name :</label>
                                            <div class="controls">
                                                <input type="text" name="name" class="span11"
                                                    value="{{ old('name', $author->title ?? '') }}"
                                                    placeholder="Enter Author name" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Company :</label>
                                            <div class="controls">
                                                <input type="text" name="company" class="span11"
                                                    value="{{ old('company', $author->company ?? '') }}"
                                                    placeholder="Enter Company Name">
                                                @error('company')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Designation :</label>
                                            <div class="controls">
                                                <input type="text" name="designation" class="span11"
                                                    value="{{ old('designation', $author->designation ?? '') }}"
                                                    placeholder="Enter Designation">
                                                @error('designation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @php
                                            $author = $author ?? null;
                                        @endphp
                                        <div class="control-group">
                                            <label class="control-label">Author Role :</label>
                                            <div class="controls">
                                                <select name="role" class="span11">
                                                    <option value="author"
                                                        {{ old('role', optional(optional($author)->admin)->admin_role) == 'author' ? 'selected' : '' }}>
                                                        Author
                                                    </option>
                                                    <option value="editor"
                                                        {{ old('role', optional(optional($author)->admin)->admin_role) == 'editor' ? 'selected' : '' }}>
                                                        Editor
                                                    </option>
                                                    <option value="manager"
                                                        {{ old('role', optional(optional($author)->admin)->admin_role) == 'manager' ? 'selected' : '' }}>
                                                        Manager
                                                    </option>
                                                    @if (
                                                        (!empty($author) && optional(optional($author)->admin)->admin_role == 'admin') ||
                                                            (Auth::guard('admin')->check() && Auth::guard('admin')->user()->admin_role == 'admin'))
                                                        <option value="admin"
                                                            {{ old('role', optional(optional($author)->admin)->admin_role) == 'admin' ? 'selected' : '' }}>
                                                            Admin
                                                        </option>
                                                    @endif
                                                </select>
                                                @error('role')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status :</label>
                                            <div class="controls">
                                                <select name="status" class="span11">
                                                    <option value="A"
                                                        {{ old('status', $author->status ?? '') == 'A' ? 'selected' : '' }}>
                                                        Active</option>
                                                    <option value="D"
                                                        {{ old('status', $author->status ?? '') == 'D' ? 'selected' : '' }}>
                                                        Inactive</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Password :</label>
                                            <div class="controls">
                                                <div class="main_input_box password-wrapper">
                                                    <input type="password" id="password" name="password"
                                                        placeholder="Password" class="span11 validate-password" />
                                                    <span class="toggle-password"
                                                        onclick="togglePassword('password', this)">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="control-group">
                                            <label class="control-label">Confirm Password :</label>
                                            <div class="controls">
                                                <div class="main_input_box password-wrapper">
                                                    <input type="password" id="password_confirmation"
                                                        name="password_confirmation" placeholder="Confirm Password"
                                                        class="span11 validate-password" />
                                                    <span class="toggle-password"
                                                        onclick="togglePassword('password_confirmation', this)">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Author Image :</label>
                                            <div class="controls">
                                                @if (!empty($author->image))
                                                    <img src="{{ Config('constants.franAwsS3Url') . ltrim($author->image, '/') }}"
                                                        class="img-polaroid" width="120" style="margin-bottom:10px;">
                                                @endif
                                                @if (isset($author))
                                                    <input type="hidden" name="old_image"
                                                        value="{{ isset($author) ? Config('constants.franAwsS3Url') . ltrim($author->image, '/') : '' }}" />
                                                @endif
                                                <input type="file" name="image" class="span11" accept="image/*"
                                                    value="{{ old('image', '') }}">
                                                <span class="help-inline">Note: * Image size 512x512</span>
                                                <br>
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Right column -->
                            <div class="span6">
                                <div class="widget-box">
                                    <div class="widget-title">
                                        <h5>Social</h5>
                                    </div>
                                    <div class="widget-content nopadding">

                                        <div class="control-group">
                                            <label class="control-label">Email ID :</label>
                                            <div class="controls">
                                                <input type="email" name="email" class="span11"
                                                    value="{{ old('email', $author->emailid ?? '') }}"
                                                    placeholder="Enter Email ID">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Phone No :</label>
                                            <div class="controls">
                                                <input type="tel" name="phone_no" class="span11"
                                                    value="{{ old('phone_no', $author->phone_no ?? '') }}"
                                                    placeholder="Enter Phone No">
                                                @error('phone_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Address :</label>
                                            <div class="controls">
                                                <input type="text" name="address" class="span11"
                                                    value="{{ old('address', $author->address ?? '') }}"
                                                    placeholder="Enter Address">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">LinkedIn :</label>
                                            <div class="controls">
                                                <input type="text" name="linkedin_profile" class="span11"
                                                    value="{{ old('linkedin_profile', $author->linkedin_profile ?? '') }}"
                                                    placeholder="Enter LinkedIn Profile">
                                                @error('linkedin_profile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Facebook :</label>
                                            <div class="controls">
                                                <input type="text" name="facebook_profile" class="span11"
                                                    value="{{ old('facebook_profile', $author->facebook_profile ?? '') }}"
                                                    placeholder="Enter Facebook Profile">
                                                @error('facebook_profile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Twitter :</label>
                                            <div class="controls">
                                                <input type="text" name="twitter_profile" class="span11"
                                                    value="{{ old('twitter_profile', $author->twitter_profile ?? '') }}"
                                                    placeholder="Enter Twitter Profile">
                                                @error('twitter_profile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Instagram :</label>
                                            <div class="controls">
                                                <input type="text" name="insta_profile" class="span11"
                                                    value="{{ old('insta_profile', $author->insta_profile ?? '') }}"
                                                    placeholder="Enter Instagram Profile">
                                                @error('insta_profile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @if (in_array(Auth::guard('admin')->user()->admin_role, ['admin']))
                                            <div class="control-group">
                                                <label class="control-label">News Upload Capability :</label>
                                                <div class="controls">
                                                    <select name="upload_capability" class="span11">
                                                        <option value="1"
                                                            {{ old('upload_capability', $author->news_upload_capability ?? '') == 1 ? 'selected' : '' }}>
                                                            Yes</option>
                                                        <option value="0"
                                                            {{ old('upload_capability', $author->news_upload_capability ?? '') == 0 ? 'selected' : '' }}>
                                                            No</option>
                                                    </select>
                                                    @error('upload_capability')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Author Create Capability :</label>
                                                <div class="controls">
                                                    <select name="can_create_author" class="span11">
                                                        <option value="1"
                                                            {{ old('can_create_author', $author->admin->can_create_author ?? '') == 1 ? 'selected' : '' }}>
                                                            Yes</option>
                                                        <option value="0"
                                                            {{ old('can_create_author', $author->admin->can_create_author ?? '') == 0 ? 'selected' : '' }}>
                                                            No</option>
                                                    </select>
                                                    @error('can_create_author')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About section -->
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-box">
                                    <div class="widget-title">
                                        <h5>About</h5>
                                    </div>
                                    <div class="widget-content nopadding">
                                        <div class="control-group">
                                            <div class="controls textarea">
                                                <textarea name="description" id="description" class="span11" rows="5">{{ old('description', $author->text ?? '') }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="form-actions">
                            <a href="{{ route('list.author') }}" class="btn btn-secondary"><i class="fa fa-times"></i>
                                Cancel</a>
                            <button type="submit" class="btn btn-success float-right">
                                <i class="fa fa-save"></i> Save Author</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ url('tinymce/js/tinymce/tinymce.min.js') }}"></script>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#28a745'
                });
            </script>
        @endif

        {{-- // Warning Message --}}
        @if (session('warning'))
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: "{{ session('warning') }}",
                    confirmButtonColor: '#ffc107'
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#dc3545'
                });
            </script>
        @endif
        <script>
            function checkImageSize(fileInput) {
                const minSize = 200 * 1024;
                const maxSize = 250 * 1024;
                // Check if file exists and validate its size
                if (fileInput.files[0] && fileInput.files[0].size > maxSize) {
                    toastr.error('Image size should be 250 KB or less.');
                    $('#showImage_msg_size').css('display', 'block');
                    setTimeout(function() {
                        $('#showImage_msg_size').css('display', 'none');
                    }, 5000);
                    $('#newssubmit').prop('disabled', true); // Disable the submit button
                } else if (fileInput.files[0] && fileInput.files[0].size < minSize) {
                    toastr.error('Image size should be at least 200 KB.');
                    $('#showImage_msg_size').css('display', 'block');
                    setTimeout(function() {
                        $('#showImage_msg_size').css('display', 'none');
                    }, 5000);
                    $('#newssubmit').prop('disabled', true); // Disable the submit button
                } else {
                    // Success: Image size is valid
                    $('#showImage_msg_size').css('display', 'none');
                    $('#newssubmit').prop('disabled', false); // Enable the submit button
                }
            }

            let editor_config = {
                path_absolute: "/",
                height: 300,
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback: function(field_name, url, type) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                        'body')[0].clientWidth;
                    let y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;

                    let cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.open({
                        file: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no"
                    });
                }
            };

            tinymce.init(editor_config);

            // password validation

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

            $(document).ready(function() {
                const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

                function validateform() {
                    const name = $('#name').val().trim();
                    const email = $('#email').val().trim();
                    const designation = $('#designation').val().trim();
                    const company = $('#company').val().trim();
                    const phone_no = $('#phone_no').val().trim();
                    // const address = $('#address').val().trim();
                    // const linkedin = $('#linkedin_profile').val().trim();
                    // const facebook = $('#facebook_profile').val().trim();
                    // const twitter = $('#twitter_profile').val().trim();
                    const description = $('#description').val().trim();
                    const pwd = $('#password').val();
                    const confirmPwd = $('#password_confirmation').val();
                    if (name === '') {
                        toastr.error('Author name is required.');
                        $('#name').focus();
                        return false;
                    }
                    if (email !== '' && !/^\S+@\S+\.\S+$/.test(email)) {
                        toastr.error('Please enter a valid email address.');
                        $('#email').focus();
                        return false;
                    }
                    if (designation === '') {
                        toastr.error('Designation is required.');
                        $('#designation').focus();
                        return false;
                    }
                    if (company === '') {
                        toastr.error('Company name is required.');
                        $('#company').focus();
                        return false;
                    }
                    if (phone_no === '' || !/^\d{10}$/.test(phone_no)) {
                        toastr.error('Please enter a valid 10-digit phone number.');
                        $('#phone_no').focus();
                        return false;
                    }
                    // if (address === '') {
                    //     toastr.error('Address is required.');
                    //     $('#address').focus();
                    //     return false;
                    // }
                    if (description === '') {
                        toastr.error('Description is required.');
                        $('#description').focus();
                        return false;
                    }
                    if (!regex.test(pwd)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Weak Password',
                            text: 'Password must contain at least 6 characters, including an uppercase letter, lowercase letter, and a number.'
                        });
                        $('#password').focus();
                        return false;
                    }

                    if (pwd !== confirmPwd) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Passwords Do Not Match',
                            text: 'Please ensure both password fields match.'
                        });
                        $('#password_confirmation').focus();
                        return false;
                    }

                    return true;
                }

                // live validation on typing
                $('#password').on('input', function() {
                    $(this).removeClass('is-valid is-invalid');
                    $(this).addClass(regex.test($(this).val()) ? 'is-valid' : 'is-invalid');
                });

                $('#password_confirmation').on('input', function() {
                    const pwd = $('#password').val();
                    $(this).removeClass('is-valid is-invalid');
                    $(this).addClass($(this).val() === pwd ? 'is-valid' : 'is-invalid');
                });

                // validate on form submit
                $('#editform').on('submit', function(e) {
                    if (!validateform()) {
                        e.preventDefault();
                    }
                });
            });
        </script>
    @endpush
@endsection
