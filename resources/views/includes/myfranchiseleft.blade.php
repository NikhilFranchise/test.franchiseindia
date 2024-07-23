<div class="col-xs-12 col-sm-2 col-md-2 row-no-padding myaccleft">
    <div class="bor-radius backwhite myshadow">
        @if (!empty(request()->user()) && request()->user()->membership_type == 0)
            <a href="payment-plan" class="btn btn-default sidebtn">Upgrade Account </a>
        @endif
        <div class="myline"></div>
        <div class="parblk">
            <div class="per">You completed <span>{{ Cookie::get('franPercentage') }}%</span> Profile</div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ Cookie::get('franPercentage') }}"
                    aria-valuemin="0" aria-valuemax="100" style="width:{{ Cookie::get('franPercentage') }}%">
                </div>
            </div>
        </div>
        <div class="myline marbtm"></div>
        <ul class="nvss">
            <li @yield('db')>
                <div><span class="icon-spc"><img alt="dashboard"
                            src="{{ URL::asset('images/dashboard.png') }}"></span><span class="fl"><a
                            href="dashboard">Dashboard</a></span></div>
            </li>
            <li @yield('vp')>
                <div><span class="icon-spc"><img alt="view-profile"
                            src="{{ URL::asset('images/view-profile.png') }}"></span><span><a href="view-profile">View
                            Profile</a></span></div>
            </li>
        </ul>
        <div class="nav__list">
            <input id="group-1" type="checkbox" hidden checked="checked" />
            <label for="group-1"> <img alt="response" src="{{ URL::asset('images/response.png') }}" class="icon-spc">
                <p class="manetxt">Response</p> <span class="fa fa-angle-down"></span>
            </label>
            <ul class="nvss group-list pafdd">
                <li @yield('ir')><a href="insta-response">Insta Response</a></li>
                <li @yield('ei')><a href="expressed-interest">Expressed Interest</a></li>
            </ul>
        </div>
        <div class="nav__list">
            <input id="group-2" type="checkbox" hidden checked="checked" />
            <label for="group-2"> <img alt="manage profile" src="{{ URL::asset('images/manage-profile.png') }}"
                    class="icon-spc">
                <p class="manetxt">Manage Profile</p> <span class="fa fa-angle-down"></span>
            </label>
            <ul class="nvss group-list pafdd">
                <li @yield('bd')><a href="businessdetails">Business</a></li>
                <li @yield('pd')><a href="professionaldetails">Business Expansion</a></li>
                <li @yield('prd')><a href="propertydetails">Property</a></li>
                <li @yield('ta')><a href="training-aggrement-details">Agreements</a></li>
                @if (!empty(request()->user()) && request()->user()->membership_type == 0)
                    <li @yield('pp')><a href="payment-plan">Payment</a></li>
                    {{-- @else --}}
                @endif
                <li @yield('AP')><a href="appearance">Appearance</a></li>
                <li @yield('fl')><a href="logo">Logo</a></li>
            </ul>
        </div>
        <ul class="nvss mymenu">
            <li @yield('rp')>
                <div><span class="icon-spc"><img alt="response manager"
                            src="{{ URL::asset('images/response-manager.png') }}"></span><span><a
                            href="responsemanager">Response Manager</a></span></div>
            </li>
            <li @yield('AWU')>
                <div><span class="icon-spc"><img alt="advertise with us"
                            src="{{ URL::asset('images/adverise-with-us.png') }}"></span><span><a
                            href="advertisewithus">Advertise With Us</a></span></div>
            </li>
            <li @yield('cp')>
                <div><span class="icon-spc"><img alt="change password"
                            src="{{ URL::asset('images/change-password.png') }}"></span><span><a
                            href="changepassword">Change Password</a></span></div>
            </li>
        </ul>
        <div class="myline"></div>
        <a href="feedback" class="btn btn-default sidebtn">Feedback</a>
    </div>
</div>
@if (!empty(Cookie::get('form_applicable')) && Cookie::get('form_applicable') == 1)
    <style type="text/css">
        #feedmyacc {
            margin-top: 60px
        }

        #feedmyacc .modal-dialog {
            width: 580px
        }

        .fdkblk {
            width: 100%;
            margin: 0 auto;
            background: #fff;
            padding: 10px;
            text-align: center
        }

        .hdkblk {
            font-size: 20px;
            font-family: 'Open Sans Bold';
            line-height: 20px;
            text-transform: uppercase
        }

        .hdkblk span {
            display: block;
            font-size: 14px;
            font-family: 'Open Sans Regular';
            margin-top: 0;
            text-transform: capitalize
        }

        .bdrline {
            height: 1px;
            background: #dbdbdb;
            margin-top: 15px;
            margin-bottom: 20px
        }

        .sbkblk {
            margin-top: 0;
            margin-bottom: 5px
        }

        .hdk {
            font-family: 'Open Sans Semibold';
            line-height: 20px;
            font-size: 18px;
            margin-bottom: 10px
        }

        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            width: 100%
        }

        .rating input {
            position: absolute;
            left: -999999px
        }

        .rating label {
            display: inline-block;
            font-size: 0
        }

        .rating>label:before {
            position: relative;
            font: 30px/1 FontAwesome;
            display: block;
            content: "\f005";
            color: #ccc;
            background: -webkit-linear-gradient(-45deg, #d9d9d9 0, #b3b3b3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before,
        .rating>label.selected:before,
        .rating>label.selected~label:before {
            color: #f22406;
            background: -webkit-linear-gradient(-45deg, #f22406 0, #f22406 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .ratingleads {
            unicode-bidi: bidi-override;
            direction: rtl;
            width: 100%
        }

        .ratingleads input {
            position: absolute;
            left: -999999px
        }

        .ratingleads label {
            display: inline-block;
            font-size: 0
        }

        .ratingleads>label:before {
            position: relative;
            font: 30px/1 FontAwesome;
            display: block;
            content: "\f005";
            color: #ccc;
            background: -webkit-linear-gradient(-45deg, #d9d9d9 0, #b3b3b3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .ratingleads>label:hover:before,
        .ratingleads>label:hover~label:before,
        .ratingleads>label.selected:before,
        .ratingleads>label.selected~label:before {
            color: #f22406;
            background: -webkit-linear-gradient(-45deg, #f22406 0, #f22406 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .ratingleadsquality {
            unicode-bidi: bidi-override;
            direction: rtl;
            width: 100%
        }

        .ratingleadsquality input {
            position: absolute;
            left: -999999px
        }

        .ratingleadsquality label {
            display: inline-block;
            font-size: 0
        }

        .ratingleadsquality>label:before {
            position: relative;
            font: 30px/1 FontAwesome;
            display: block;
            content: "\f005";
            color: #ccc;
            background: -webkit-linear-gradient(-45deg, #d9d9d9 0, #b3b3b3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .ratingleadsquality>label:hover:before,
        .ratingleadsquality>label:hover~label:before,
        .ratingleadsquality>label.selected:before,
        .ratingleadsquality>label.selected~label:before {
            color: #f22406;
            background: -webkit-linear-gradient(-45deg, #f22406 0, #f22406 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .ratingservice {
            unicode-bidi: bidi-override;
            direction: rtl;
            width: 100%
        }

        .ratingservice input {
            position: absolute;
            left: -999999px
        }

        .ratingservice label {
            display: inline-block;
            font-size: 0
        }

        .ratingservice>label:before {
            position: relative;
            font: 30px/1 FontAwesome;
            display: block;
            content: "\f005";
            color: #ccc;
            background: -webkit-linear-gradient(-45deg, #d9d9d9 0, #b3b3b3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .ratingservice>label:hover:before,
        .ratingservice>label:hover~label:before,
        .ratingservice>label.selected:before,
        .ratingservice>label.selected~label:before {
            color: #f22406;
            background: -webkit-linear-gradient(-45deg, #f22406 0, #f22406 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .sbt {
            color: #333 !important;
            padding: 10px 20px !important;
            text-transform: uppercase;
            border: 1px solid #333 !important;
            font-size: 14px;
            font-family: 'Open Sans Light';
            background: transparent
        }

        .sbt:hover {
            background: #333;
            color: #fff !important
        }

        ul.webrating {
            margin-bottom: 25px
        }

        ul.webrating li {
            display: inline-block;
            width: 23%
        }

        .sbkblk {
            margin-top: 0;
            margin-bottom: 35px
        }

        .hdk {
            font-family: 'Open Sans Semibold';
            line-height: 22px;
            font-size: 18px;
            margin-bottom: 10px
        }

        .txtarea textarea {
            margin-top: 5px;
            width: 80%;
            height: 140px;
            background: #f3f3f3;
            border-radius: 5px;
            border: 1px solid #dfdfdf;
            padding: 10px;
            font-size: 14px;
            color: #999;
            -webkit-box-shadow: inset 0 5px 5px 0 rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset inset 0 5px 5px 0 rgba(0, 0, 0, 0.05);
            box-shadow: inset inset 0 5px 5px 0 rgba(0, 0, 0, 0.05)
        }

        @media only screen and (min-width:1px) and (max-width:640px) {
            #feedmyacc .modal-dialog {
                width: 95%
            }
        }
    </style>
    <div id="feedmyacc" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog" data-keyboard="false"
        data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="feedback-form">
                        @csrf
                        <input type="hidden" name="franchisor_feedback_month" id="franchisor_feedback_month"
                            value="{{ Cookie::get('franchisor_feedback_month') }}">
                        <div class="fdkblk">
                            <div class="hdkblk">
                                Help Us Serve You Better!! <span>Kindly share your feedback before you proceed to your
                                    dashboard.</span>
                            </div>
                            <div class="bdrline"></div>
                            <div class="sbkblk">
                                <div class="hdk">How was your Experience with FranchiseIndia.com?</div>
                                <div class="rating">
                                    <label><input type="radio" name="exp_rating" value="5" title="5 stars">
                                        5</label>
                                    <label><input type="radio" name="exp_rating" value="4" title="4 stars">
                                        4</label>
                                    <label><input type="radio" name="exp_rating" value="3" title="3 stars">
                                        3</label>
                                    <label><input type="radio" name="exp_rating" value="2" title="2 stars">
                                        2</label>
                                    <label><input type="radio" name="exp_rating" value="1" title="1 star">
                                        1</label>
                                </div>
                                <label id="rating1" style="display:none;color:red">Please select your rating</label>
                            </div>
                            <div class="sbkblk">
                                <div class="hdk">Rate your satisfaction level for the quantity of leads.</div>
                                <div class="ratingleads">
                                    <label><input type="radio" name="leads_quantity" value="5"
                                            title="5 stars"> 5</label>
                                    <label><input type="radio" name="leads_quantity" value="4"
                                            title="4 stars"> 4</label>
                                    <label><input type="radio" name="leads_quantity" value="3"
                                            title="3 stars"> 3</label>
                                    <label><input type="radio" name="leads_quantity" value="2"
                                            title="2 stars"> 2</label>
                                    <label><input type="radio" name="leads_quantity" value="1"
                                            title="1 star"> 1</label>
                                </div>
                                <label id="rating2" style="display:none;color:red">Please select your rating</label>
                            </div>
                            <div class="sbkblk">
                                <div class="hdk">Rate your satisfaction level for the quality of leads.</div>
                                <div class="ratingleadsquality">
                                    <label><input type="radio" name="ratingleadsquality" value="5"
                                            title="5 stars"> 5</label>
                                    <label><input type="radio" name="ratingleadsquality" value="4"
                                            title="4 stars"> 4</label>
                                    <label><input type="radio" name="ratingleadsquality" value="3"
                                            title="3 stars"> 3</label>
                                    <label><input type="radio" name="ratingleadsquality" value="2"
                                            title="2 stars"> 2</label>
                                    <label><input type="radio" name="ratingleadsquality" value="1"
                                            title="1 star"> 1</label>
                                </div>
                                <label id="rating3" style="display:none;color:red">Please select your rating</label>
                            </div>
                            <div class="sbkblk">
                                <div class="hdk">Kindly share the number of prospects received from the website.
                                </div>
                                <ul class="webrating">
                                    <li><input type="radio" name="websiterating" value="1" title="0-5"
                                            checked="checked">0-5</li>
                                    <li><input type="radio" name="websiterating" value="2"
                                            title="6-10">6-10</li>
                                    <li><input type="radio" name="websiterating" value="3"
                                            title="11-20">11-20</li>
                                    <li><input type="radio" name="websiterating" value="4"
                                            title="Above 20">Above 20</li>
                                </ul>
                            </div>
                            <div class="sbkblk">
                                <div class="hdk">How happy were you with franchise India's service?</div>
                                <div class="ratingservice">
                                    <label><input type="radio" name="ratingservice" value="5"
                                            title="5 stars"> 5</label>
                                    <label><input type="radio" name="ratingservice" value="4"
                                            title="4 stars"> 4</label>
                                    <label><input type="radio" name="ratingservice" value="3"
                                            title="3 stars"> 3</label>
                                    <label><input type="radio" name="ratingservice" value="2"
                                            title="2 stars"> 2</label>
                                    <label><input type="radio" name="ratingservice" value="1"
                                            title="1 stars"> 1 </label>
                                </div>
                                <label id="rating5" style="display:none;color:red">Please select your rating</label>
                            </div>
                            <div class="sbkblk">
                                <div class="hdk">Have more to say? Kindly share your comments with us.</div>
                                <div class="txtarea">
                                    <textarea cols="4" rows="5" name="feedback_comment" id="feedback_comment"> </textarea>
                                </div>
                            </div>
                            <input type="submit" value="Send" class="btn sbt" id="feedbackSubmit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript">
        /*<![CDATA[*/
        $(".rating input").change(function() {
            var a = $(this);
            $(".rating .selected").removeClass("selected");
            a.closest("label").addClass("selected")
        });
        $(".ratingleads input").change(function() {
            var a = $(this);
            $(".ratingleads .selected").removeClass("selected");
            a.closest("label").addClass("selected")
        });
        $(".ratingleadsquality input").change(function() {
            var a = $(this);
            $(".ratingleadsquality .selected").removeClass("selected");
            a.closest("label").addClass("selected")
        });
        $(".ratingservice input").change(function() {
            var a = $(this);
            $(".ratingservice .selected").removeClass("selected");
            a.closest("label").addClass("selected")
        });
        $(document).ready(function() {
            $("#feedmyacc").modal("show")
        });
        $("#feedback-form").submit(function(h) {
            h.preventDefault();
            $("#feedbackSubmit").prop("disabled", true);
            var f = $("input[name=exp_rating]:checked", "#feedback-form").val();
            var d = $("input[name=ratingleadsquality]:checked", "#feedback-form").val();
            var b = $("input[name=ratingservice]:checked", "#feedback-form").val();
            var i = $("input[name=leads_quantity]:checked", "#feedback-form").val();
            var g = $("input[name=websiterating]:checked", "#feedback-form").val();
            var c = $("#feedback_comment").val();
            var a = $("#franchisor_feedback_month").val();
            if (f == undefined) {
                $("#rating1").show().fadeOut("slow")
            }
            if (i == undefined) {
                $("#rating2").show().fadeOut("slow")
            }
            if (d == undefined) {
                $("#rating3").show().fadeOut("slow")
            }
            if (b == undefined) {
                $("#rating5").show().fadeOut("slow")
            }
            if (f != undefined && i != undefined && d != undefined && b != undefined) {
                $.ajax({
                    type: "post",
                    url: "{{ Config::get('constants.MainDomain') }}/franchisor-feedback",
                    data: {
                        expRating: f,
                        happiness: b,
                        leadQuality: d,
                        leadQuantity: i,
                        noOfProspects: g,
                        feedbackComment: c,
                        feedbackMonth: a,
                    },
                    success: function(e) {
                        $("#feedmyacc").modal("hide")
                    }
                })
            }
        }); /*]]>*/
    </script>
@endif
