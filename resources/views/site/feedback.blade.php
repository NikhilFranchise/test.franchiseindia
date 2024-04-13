@php

    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, '/wellness') !== false) {
        $seoTitle = 'Wellness India - Feedback';
        $seoDesc = 'Wellness India - Sitemap. This section helps to users for submitting their feedbacks.';
        $seoKeywords = 'feedback, wellness, wellness india';
    } elseif (strpos($url, '/education') !== false) {
        $seoTitle = 'Education India - Feedback';
        $seoDesc = 'education India - Sitemap. This section helps to users for submitting their feedbacks.';
        $seoKeywords = 'feedback, education, education india';
    } elseif (strpos($url, '/restaurant') !== false) {
        $seoTitle = 'Restaurant India - Feedback';
        $seoDesc = 'Restaurant India - Sitemap. This section helps to users for submitting their feedbacks.';
        $seoKeywords = 'feedback, restaurant, restaurant india';
    } else {
        $seoTitle = 'Franchise India Feedback, Franchise India Customer Feedback - Franchiseindia.com';
        $seoDesc =
            'Franchise India Customer Feedback - Do you have feedback you wish to submit? Please complete the form with *mark are mandatory, Franchise India will get back to you as soon as possible.';
        $seoKeywords = 'feedback, franchise, franchise india';
    }

@endphp
@section('seoTitle', $seoTitle)
@section('seoDesc', $seoDesc)
@section('seoKeywords', $seoKeywords)

@extends('layout.master')
@section('content')
    <!--form start here -->

    <!--form start here -->
    <div class="container formsection margintop60 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1>Feedback</h1>


                <p class="simtxt">
                    <span class="subhead"> Tell us what you think!</span>
                    Your opinions and comments are very important to us and we read every message that we receive. Due to a
                    high volume of messages, we're not always able to provide a personal response, but your few minutes for
                    filling the feedback form will help us to provide you with improved quality services.<br /><br />
                </p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
            <!---->
            <form class="form-horizontal" id="feedbackform" name="feedbackform" method="post"
                action="{{ Config::get('constants.MainDomain') }}/feedback">

                <div class="sidehead2">
                    i'm writing about something i saw on franchiseindia.com
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory ">Name</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ URL::asset('images/user.png') }}"
                                    alt="user"></span>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Your Name" maxlength="30">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Mobile</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ URL::asset('images/mobile.png') }}"
                                    alt="mobile"></span>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                placeholder="Enter Mobile" maxlength="10">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Email</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ URL::asset('images/email.png') }}"
                                    alt="email"></span>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter Email">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Feedback topic</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><img src="{{ URL::asset('images/topic.png') }}"
                                    alt="topic"></span>
                            <input type="text" class="form-control" id="ftopic" name="ftopic"
                                placeholder="Enter feedback topic" maxlength="50">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Feedback </label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon height100"><img src="{{ URL::asset('images/comment.png') }}"
                                    alt="comment"></span>
                            <textarea class="form-control height100" id="feedback" name="feedback" placeholder="Enter Your feedback"></textarea>
                        </div>
                    </div>
                </div>
                @php
                    $siteType = 'fi';
                    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                    if (strpos($url, '/wellness') !== false) {
                        $siteType = 'wi';
                    } elseif (strpos($url, '/education') !== false) {
                        $siteType = 'edu';
                    } else {
                        $siteType = 'fi';
                    }
                @endphp
                <input type="hidden" class="form-control" name="site_type" value="{{ $siteType }}">
                <div style="text-align: center;">
                    <input type="submit" class="btn btn-default" id="btnfeedback" value="Send"
                        onclick="validfeedback()" />
                </div>
            </form>
        </div>
    </div>
    </div>
    <div class="height40"></div>
    <!--form end here -->
    <script type="text/javascript">
        $(document).ready(function() {

            $('input[title!=""]').hint();
            $('textarea[title!=""]').hint();
            $('select[title!=""]').hint();
            var validator = $("#feedbackform").validate({

                rules: {

                    name: {
                        required: true,
                        accept: "[a-zA-Z\s]+",
                        minlength: 3,
                        maxlength: 35
                    },

                    email: {
                        required: true,
                        email: true
                    },

                    mobile: {
                        required: true,
                        accept: "[0-9]",
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },

                    ftopic: {
                        required: true,
                        minlength: 6,
                        maxlength: 50
                    },

                    feedback: "required"
                },


                messages: {
                    name: {
                        required: "",
                        accept: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format(""),
                    },

                    email: {
                        required: "",
                        email: ""
                    },

                    mobile: {
                        required: "",
                        accept: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format(""),
                        number: ""
                    },

                    ftopic: {
                        required: "",
                        minlength: jQuery.format(""),
                        maxlength: jQuery.format(""),
                    },

                    feedback: "",

                },



            });
        });

        function validfeedback() {
            if (
                $("#feedbackform").validate({
                    rules: {

                        name: {
                            required: true,
                            accept: "[a-zA-Z\s]+",
                            minlength: 3,
                            maxlength: 35
                        },

                        email: {
                            required: true,
                            email: true
                        },

                        mobile: {
                            required: true,
                            accept: "[0-9]",
                            minlength: 10,
                            maxlength: 10,
                            number: true
                        },

                        ftopic: {
                            required: true,
                            minlength: 3,
                            maxlength: 50
                        },

                        feedback: "required"
                    },


                    messages: {
                        name: {
                            required: "",
                            accept: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format(""),
                        },

                        email: {
                            required: "",
                            email: ""
                        },

                        mobile: {
                            required: "",
                            accept: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format(""),
                            number: ""
                        },

                        ftopic: {
                            required: "",
                            minlength: jQuery.format(""),
                            maxlength: jQuery.format(""),
                        },

                        feedback: "",

                    },

                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent().parent())
                    },
                }).form())
                return true;
        }
    </script>
@endsection
