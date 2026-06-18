@extends('layout.master')
@section('seoTitle', 'Franchise India - Free Lead')
@section('seoDesc', 'Franchise India - Free Lead. This section helps to users for contacting us through query.')
@section('seoKeywords', 'Free Lead, franchise, franchise india')
@section('content')
@php
$states = Config('location.stateArr');
asort($states);
$countries = Config('location.countryName');
@endphp
<div class="container formsection margintop60 staicp">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1>Submit the Details</h1>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 row-no-padding">
        {{-- Success Message --}}
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- Validation Error Message --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin-bottom:0;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="form-horizontal" id="freeLeadForm" method="post" action="{{ route('freeLead.store') }}">
            @csrf
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Name</label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="{{ url('images/user.png') }}" alt="user"></span>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name"
                            maxlength="25">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Email
                </label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="{{ url('images/email.png') }}" alt="email"></span>
                        <input type="text" class="form-control" name="email" placeholder="Enter  Email">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="{{ url('images/mobile.png') }}" alt="mobile"></span>
                        <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile"
                            maxlength="10">
                    </div>
                </div>
            </div>
            <div style="text-align:center">
                <input type="submit" id="btnhome" class="btn btn-default" value="Submit" />
            </div>
        </form>
    </div>
</div>
<div class="height40"></div>
<script type="text/javascript">
    $(document).ready(function() {
        // Initialize form validation
        $("#freeLeadForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 35,
                    pattern: /^[A-Za-z\s]+$/
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Name must be at least 3 characters long",
                    maxlength: "Name cannot exceed 35 characters",
                    pattern: "Name should contain only alphabets"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                mobile: {
                    required: "Please enter your mobile number",
                    digits: "Please enter only numbers",
                    minlength: "Mobile number must be 10 digits",
                    maxlength: "Mobile number must be 10 digits"
                }
            },
            errorElement: "span",
            errorClass: "text-danger",
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function(form) {
                form.submit(); // Allow normal submission (you can also use AJAX here)
            }
        });
    });
</script>
@endsection