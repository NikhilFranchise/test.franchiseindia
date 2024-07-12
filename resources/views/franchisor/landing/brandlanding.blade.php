@extends('layout.master')
@section('seoTitle', $seoTitle)
@if (!empty($seoDesc))
    @section('seoDesc', $seoDesc)
@endif
@if (!empty($seoKeywords))
    @section('seoKeywords', $seoKeywords)
@endif
@php
    $hindiUrl =
        Config('constants.MainDomain') .
        '/hi/brands/' .
        $franDetails->profile_name .
        '.' .
        $franDetails->fran_detail_id;
    $engUrl =
        Config('constants.MainDomain') . '/brands/' . $franDetails->profile_name . '.' . $franDetails->fran_detail_id;
@endphp
@section('hindibrandUrls')
    {{-- <link rel="amphtml"
        href="{{ Config('constants.MainDomain') }}/amp/brands/{{ $franDetails->profile_name }}.{{ $franDetails->fran_detail_id }}"> --}}
    @if ($franDetails->is_hindi == 1)
        <link rel="alternate" hreflang="en-IN" href="{{ $engUrl }}" />
        <link rel="alternate" hreflang="hi-IN" href="{{ $hindiUrl }}" />
    @endif
@endsection

@if ($franDetails->is_hindi == 1)
    @section('hindiUrl', url('hi/brands/' . $franDetails->profile_name . '.' . $franDetails->fran_detail_id))
    @section('englishUrl', url('brands/' . $franDetails->profile_name . '.' . $franDetails->fran_detail_id))
@endif

@section('content')

@include('layout.newhomepage.expeFndfrm')




    @if ($franDetails->membership_type != 1)
        <div class="innerloginblk">
            @include('includes.login-events')
        </div>
        <style type="text/css">
            .bgrunn {
                padding-top: 0px !important;
            }

            .brandwidth {
                border: 1px solid #dfdfdf;
                padding: 20px;
                background: #fff;
                border-radius: 10px;
                margin-top: 10px;
            }

            @media screen and (max-width: 767px) {
                .bgrunn {
                    padding-top: 0px !important;
                    background-color: transparent;
                }
            }
        </style>
    @else
    @endif
    @include('includes.breadcrumb')
    {{-- @if (count($images) < 4 || $franDetails->membership_type != 1) --}}
    @if (count($images) < 4)
        @include('includes.brandlanding.layout-1')
    @elseif($franDetails->page_layout_type == '1')
        @include('includes.brandlanding.layout-1')
    @elseif($franDetails->page_layout_type == '2')
        @include('includes.brandlanding.layout-2')
    @else
        @include('includes.brandlanding.layout-3')
    @endif

    <div class="modal fade lg-panel" id="modalGetFree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="contactform" action="{{ Config::get('constants.MainDomain') }}/brandcontactinfo">
                    @csrf
                    <input type="hidden" name="frandetailsid" id="freeinfovalue" value="{{ $franDetails->franchisor_id }}">
                    <div class="modal-header" style="text-align: center;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="conactheading">You have requested information For
                            <strong>{{ $franDetails->company_name }}</strong>
                        </h4>
                    </div>
                    <div class="row popspace" id="ajaxResshowblock" style="display: none">
                        <div class="col-xs-12 col-sm-9 col-md-9">
                            <div class="popbranddetail">
                                <div class="popinfohead" id="companyContact"></div>
                                {{-- <div class="popinfo">Ceo Name:<span id="ceocontact"></span>nikhil</div> --}}
                                <div class="popinfo">Tel No:<span id="telephonecontact"></span>nikhil</div>
                                <div class="popinfo">Address :<span id="addressocontact"></span></div>
                                <div class="popinfo">Mobile :<span id="mobilecontact"></span></div>
                                <div class="popinfo">Email :<span id="emailcontact"></span></div>
                                <div class="popinfo">Website: <span id="websitecontact"></span></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <div class="popbrandlogo"></div>
                        </div>
                    </div>
                    <div class="modal-body popcentreq" id="ajaxReshideblock">
                        <p id="waitquery" style="display: none">Please wait...</p>
                        @if (Auth::user())
                            <div class="requested-frm" id="paidinvBeforeApply" style="display: none">
                                <p id="queryCount">Please wait...</p>
                                <Input type="button" class="btn btn-default btn-red" id="paidYesInvestor" value="Yes">
                                <Input type="button" class="btn btn-default btn-red" id="cancelContact" value="Cancel">
                            </div>
                            <div class="requested-frm" id="upgradeContact" style="display: none">
                                <p>Please upgrade your account to view the contact details</p>
                                <a href="{{ URL('investor/myaccount/payment') }}" class="btn btn-default btn-red">Upgrade
                                    Account</a>
                            </div>
                        @endif

                        @if (!Auth::user())
                            <div class="requested-frm">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="infoname" id="contactname" class="form-control"
                                                placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" id="contactstate" name="infostate" required
                                                onchange="getcityinfo(this.value)">
                                                <option value="">Select State for Franchise</option>
                                                @php
                                                    if (is_array($stateList)) {
                                                        $states = array_unique(array_column($stateList, 'state'));
                                                        if (count($states) > 0) {
                                                            foreach ($states as $state) {
                                                                $key = 0;
                                                                $array = Config('location.stateArr');
                                                                while ($arrayState = current($array)) {
                                                                    if ($arrayState == $state) {
                                                                        $key = key($array);
                                                                    }
                                                                    next($array);
                                                                }
                                                                echo "<option value='$key'>$state</option>";
                                                            }
                                                        } else {
                                                            $stateArrVal = Config::get('location.stateArr');
                                                            asort($stateArrVal);
                                                            foreach ($stateArrVal as $key => $value) {
                                                                echo "<option value='$key'>$value</option>";
                                                            }
                                                        }
                                                    } else {
                                                        $stateArrVal = Config::get('location.stateArr');
                                                        asort($stateArrVal);
                                                        foreach ($stateArrVal as $key => $value) {
                                                            echo "<option value='$key'>$value</option>";
                                                        }
                                                    }
                                                @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" id="contactemail"
                                                class="form-control check-existing-registered-investor"
                                                placeholder="Enter E-mail" required name="infoemail">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="infocity" required id="getinfocity">
                                                <option value="">Select City for Franchise</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group pos-rel">
                                            <input name="mobile" id="mobile" type="text" pattern="[0-9]{5,10}"
                                                minlength="10" maxlength="10"
                                                onkeyup="getMobileStatuscontact(this.value);" class="form-control"
                                                placeholder="Enter Mobile" required>
                                            <span class="vrfy" onClick="editmobile();" id="editmobilecontact"
                                                style="display: none;">edit</span>
                                            <span class="vrfy" onClick="validatemobile();" id="validatemobile"
                                                style="display: none">VERIFY</span>
                                            <span id="successmobile" class="showhideright" style="display: none"><i
                                                    class="fa fa-check fa-lg" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contactaddress"
                                                name="address" placeholder="Enter Address" required>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-6" style="display: none;" id="otpblock">
                                        <div class="form-group pos-rel">
                                            <input id="otpcontact" type="text" class="form-control" maxlength="4"
                                                placeholder="Enter OTP">
                                            <span class="vrfy" id="verify_button" style="display: block"
                                                onclick="verify()">VERIFY</span>
                                        </div>
                                        <div style="display: none" id="mismatch">OTP Mismatch</div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group pos-rel">
                                            <input id="pincodecontact" type="text" class="form-control"
                                                name = "pincode" pattern="[0-9]{5,6}" minlength="6" maxlength="6"
                                                placeholder="Enter Pincode">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group pos-rel">
                                            <select class="form-control" name="investment_range" required>
                                                <option value="">Select Investment Range</option>
                                                @foreach (Config('constants.investRangeInWords') as $index => $value)
                                                    <option value="{{ $index }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group txt-center">
                                            <div class="checkbox">
                                                <label><input type="checkbox" id="expressinstanewsletters"
                                                        name="newsletter_sub" checked>Yes, i want to subscribe for weekly
                                                    Newsletter</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group txt-center">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="need_loan">Need loan against
                                                    property?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="form-group txt-center">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="is_termsagree" id="is_termsagree1"
                                                        value="1" checked>I agree to the <a
                                                        href="{{ Config('constants.MainDomain') }}/terms"
                                                        target="_blank">Terms & Conditions</a></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                    @if (!Auth::user())
                        <div class="modal-footer txt-center" id="submitbuttoncontact">
                            <button type="submit" class="btn btn-default btn-red" id="contactsubmit">Submit
                                Request</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <!--Landing page end here -->
    <script src="{{ url('js/jquery.pagenav.js') }}"></script>
    <!-- Modal -->
    <div id="myRating" class="modal fade" role="dialog" style = "">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeButton">&times;</button>
                    <h4 class="modal-title">Rating</h4>
                </div>
                <div class="modal-body">
                    <div class="catnew-form-star">
                        <div class="rattxt">Your Rating</div>
                        <div id="ratemsg" style="display: none">Thanks for rating..</div>
                        <div id="ratingmsg">
                            <fieldset class="rating" id="ratingnew">
                                <input type="radio" id="star5" name="rating" value="5"><label
                                    class="full" for="star5" title="Awesome - 5 stars"></label>

                                <input type="radio" id="star4" name="rating" value="4"><label
                                    class="full" for="star4" title="Pretty good - 4 stars"></label>

                                <input type="radio" id="star3" name="rating" value="3"><label
                                    class="full" for="star3" title="Meh - 3 stars"></label>

                                <input type="radio" id="star2" name="rating" value="2"><label
                                    class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                <input type="radio" id="star1" name="rating" value="1"><label
                                    class="full" for="star1" title="Sucks big time - 1 star"></label>
                            </fieldset>
                            <div class="sasnsta">
                                <div style="text-align: center;">
                                    <input type="reset" class="btn btn-default" value="Cancel" data-dismiss="modal">
                                    <input type="button" class="btn btn-default btntb" value="Submit"
                                        onclick="ratings('{{ $franDetails->franchisor_id }}');">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- social mdia code  -->
    <div id="mysocial" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Share</h4>
                </div>
                <div class="modal-body">
                    <div class="macashare">
                        <ul class="sharecat">
                            <li><a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}"
                                    target="_blank"><img src="{{ URL::asset('images/facebookcat.gif') }}"
                                        alt="Facebook"><span>Facebook</span></a></li>
                            <li><a href="https://twitter.com/share?url={{ url()->current() }}" target="_blank"><img
                                        alt="twitter"
                                        src="{{ URL::asset('images/twittercat.gif') }}"><span>Twitter</span></a></li>
                            <li class="btline"><a
                                    href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url()->current() }}"
                                    target="_blank"><img alt="linkedin"
                                        src="{{ URL::asset('images/linkedincat.gif') }}"><span>LinkedIn</span></a></li>
                            <li class="webt"><a href="whatsapp://send?text={{ url()->current() }}"
                                    target="_blank"><img alt="whatsapp"
                                        src="{{ URL::asset('images/whatsappcat.gif') }}"><span>Whatsapp</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  End social mdia code  -->

    <div class="row headcommbanner branddetailads">
        <div class="fullcontainer">
            @desktop
                @include('includes.banners.dfp_970X250')
            @enddesktop
            @tablet
                @include('includes.banners.dfp_728X90')
            @endtablet
            @mobile
                @include('includes.banners.dfp_468X60')
            @endmobile
        </div>
    </div>

    <div class="row landcat bordercat">
        <div class="container">
            @include('includes.brandlanding.landingpagebrand')
        </div>
    </div>

    @if (count($likeArticles) > 3)
        {{-- @include("includes/brandlanding/morestories") --}}
    @endif

    <!--apply now btn start here -->
    <div class="aplbtn">
        <span id="applbtn">Apply Now <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
    </div>
    <!--apply now btn end here -->

    <form method="post" id="compareForm" style="display: none;" action="{{ URL('compare-brands') }}">
        <input type="hidden" name="franchisors" id="franchisorsForComparison"
            value="{{ $franDetails->franchisor_id }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="brandRequest" value="Compare" />
    </form>

    <!-- Brand popup ids -->
    @if (!empty(request()->popup_lead) && !Auth::check())
        @include('includes/brandlanding/lead-popup')
    @endif

    <script type="text/javascript">
        //action on submit your interest
        $('#expbtn').on('click', function() {
            var franId = document.getElementById('freeinfovalue').value;
            document.getElementById("expbtn").style.display = "none";
            document.getElementById("expbtnloading").style.display = "block";
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead?flag=expint') }}',
                data: {
                    franId: franId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {

                    if ($.isNumeric(data)) {
                        $('#expintbutton').css('display', 'block');
                        $('#creditRemaining').html('You have ' + data +
                            ' credits remaining. Do you want to use the credit');
                    } else if (data == "showMsg") {
                        window.location.assign('{{ url('/investor/myaccount/payment') }}');
                    } else {
                        console.log(data);
                        document.getElementById("expbtnloading").style.display = "none";
                        document.getElementById("expmsg").style.display = "block";
                        //                        $('#companyContactinsta').html(data.user.company_name);
                        $('#ceocontactinsta').html(data.user.ceo_name);
                        $('#telephonecontactinsta').html(data.user.telephone);
                        $('#addressocontactinsta').html(data.user.fran_address + "" + data.user.city +
                            "" + data.user.state + "" + data.user.pincode);
                        $('#emailcontactinsta').html("<a href='mailto:" + data.user.email +
                            "' target='_blank'>" + data.user.email + "</a>");
                        $('#mobilecontactinsta').html(data.user.mobile);
                        $('#websitecontactinsta').html("<a href='http://" + data.user.website +
                            "' target='_blank'>" + data.user.website + "</a>");

                    }
                }
            });
        });

        $('#proceedInterest').on('click', function() {
            $('#expintbutton').css('display', 'none');
            $('#creditRemaining').html('Please wait....');
            $('#expbtnloading').removeClass('hidden');
            $('#expmsg').addClass('hidden');
            var franId = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead') }}',
                data: {
                    franId: franId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                    console.log(data.user.ceo_name + data.user.telephone + data.user.fran_address);
                    document.getElementById("expbtnloading").style.display = "none";
                    document.getElementById("expmsg").style.display = "block";
                    //                    $('#companyContactinsta').html(data.user.company_name);
                    $('#ceocontactinsta').html(data.user.ceo_name);
                    $('#telephonecontactinsta').html(data.user.telephone);
                    $('#addressocontactinsta').html(data.user.fran_address + "" + data.user.city + "" +
                        data.user.state + "" + data.user.pincode);
                    $('#emailcontactinsta').html("<a href='mailto:" + data.user.email +
                        "' target='_blank'>" + data.user.email + "</a>");
                    $('#mobilecontactinsta').html(data.user.mobile);
                    $('#websitecontactinsta').html("<a href='http://" + data.user.website +
                        "' target='_blank'>" + data.user.website + "</a>");
                }
            });
        });

        $('#cancelinterest').on('click', function() {
            $('#creditRemaining').html('Please wait...');
            $('#expintbutton').css('display', 'none');
            var franId = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead-normal') }}',
                data: {
                    franId: franId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $('#expbtnloading').css('display', 'none');
                    $('#cancelExpress').css('display', 'block');
                }
            });
        });

        //investor click on view contact button
        $('#Investor').on('click', function() {
            $('#waitquery').css('display', 'block');
            var franId = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead?flag=confirm') }}',
                data: {
                    franId: franId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {

                    $('#waitquery').css('display', 'none');
                    if ($.isNumeric(data)) {
                        $('#paidinvBeforeApply').css('display', 'block');
                        $('#queryCount').html('You have ' + data +
                            ' credits remaining. Do you want to use the credit');
                    } else if (data == 'upgrade') {
                        $('#upgradeContact').css('display', 'block');
                    } else {


                        var obj = jQuery.parseJSON(data);
                        // alert(obj);
                        $('#conactheading').html("Contact Details");
                        $('#ajaxReshideblock').css('display', 'none');
                        $('#ajaxResshowblock').css('display', 'block');
                        $('#ceocontact').html(obj.user.ceo_name);
                        $('#telephonecontact').html(obj.user.telephone);
                        $('#addressocontact').html(obj.user.fran_address + "" + obj.user.city + "" + obj
                            .user.state + "" + obj.user.pincode);
                        $('#emailcontact').html("<a href='mailto:" + obj.user.email +
                            "' target='_blank'>" + obj.user.email + "</a>");
                        $('#mobilecontact').html(obj.user.mobile);
                        $('#websitecontact').html("<a href='http://" + obj.user.website +
                            "' target='_blank'>" + obj.user.website + "</a>");
                    }
                }
            });
        });

        $('#paidYesInvestor').on('click', function() {
    var franId = document.getElementById('freeinfovalue').value;
    $('#waitquery').css('display', 'block');
    $('#paidinvBeforeApply').css('display', 'none');

    $.ajax({
        type: 'post',
        url: '{{ URL('/inv-lead?flag=confirmed') }}',
        data: {
            franId: franId,
            "_token": "{{ csrf_token() }}",
        },
        success: function(data) {
            console.log("AJAX request successful:", data);  // Log the entire response object to see its structure

            if (data && data.user) {
                // Hide the waiting message
                $('#waitquery').css('display', 'none');
                console.log("waitquery hidden");

                // Populate data into elements
                $('#ceocontact').html(data.user.ceo_name || 'N/A');
                $('#telephonecontact').html(data.user.telephone || 'N/A');
                let fullAddress = `${data.user.fran_address || ''} ${data.user.city || ''} ${data.user.state || ''} ${data.user.pincode || ''}`;
                $('#addressocontact').html(fullAddress.trim());
                let email = data.user.email ? `<a href='mailto:${data.user.email}' target='_blank'>${data.user.email}</a>` : 'N/A';
                $('#emailcontact').html(email);
                $('#mobilecontact').html(data.user.mobile || 'N/A');
                let website = data.user.website ? `<a href='http://${data.user.website}' target='_blank'>${data.user.website}</a>` : 'N/A';
                $('#websitecontact').html(website);

                console.log("Data populated");

                // Display elements after a delay of 1 second (1000 milliseconds)
                setTimeout(function() {
                    $('#conactheading').html("Contact Details");
                    $('#ajaxReshideblock').css('display', 'none');
                    $('#ajaxResshowblock').css('display', 'block');
                    console.log("Elements displayed");
                }, 1000); // Delay of 1 second
            } else {
                console.error("Unexpected response structure:", data);
                $('#waitquery').css('display', 'none');
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
            $('#waitquery').css('display', 'none');
        }
    });
});


        // $('#paidYesInvestor').on('click', function() {
        //     var franId = document.getElementById('freeinfovalue').value;
        //     $('#waitquery').css('display', 'block');
        //     $('#paidinvBeforeApply').css('display', 'none');
        //     $.ajax({
        //         type: 'post',
        //         url: '{{ URL('/inv-lead?flag=confirmed') }}',
        //         data: {
        //             franId: franId,
        //             "_token": "{{ csrf_token() }}",
        //         },
        //         success: function(data) {

        //             $('#waitquery').css('display', 'none');
        //             $('#conactheading').html("Contact Details");
        //             $('#ajaxReshideblock').css('display', 'none');
        //             $('#ajaxResshowblock').css('display', 'block');
        //             $('#ceocontact').html(data.user.ceo_name);
        //             $('#telephonecontact').html(data.user.telephone);
        //             $('#addressocontact').html(data.user.fran_address + "" + data.user.city + "" + data
        //                 .user.state + "" + data.user.pincode);
        //             $('#emailcontact').html("<a href='mailto:" + data.user.email +
        //                 "' target='_blank'>" + data.user.email + "</a>");
        //             $('#mobilecontact').html(data.user.mobile);
        //             $('#websitecontact').html("<a href='http://" + data.user.website +
        //                 "' target='_blank'>" + data.user.website + "</a>");
        //         }
        //     });
        // });

        //Cancelling the view contact form and sending the normal lead
        $('#cancelContact').on('click', function() {
            $('button.close').click();
            var franId = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead-normal') }}',
                data: {
                    franId: franId
                },
            });

        });

        //display star ratings
        var a = <?php echo $ratings; ?>;
        var b = Math.round(a);
        var c = "";
        for (var x = 0; x < b; x++) {
            c += "<i class='fa fa-star fa-lg' aria-hidden='true'></i>";
        }
        if (a > b || a > (b + 0.5)) {
            c += "<i class='fa fa-star-half-o fa-lg' aria-hidden='true'></i>";
        } else {
            if (a < 4.5)
                c += "<i class='fa fa-star-o fa-lg' aria-hidden='true'></i>";
        }
        var remain = 5 - b;
        for (var y = 0; y < remain - 1; y++) {
            c += "<i class='fa fa-star-o fa-lg' aria-hidden='true'></i>";
        }
        $("#ratings").html(c);

        //updating and showing star rating function
        function ratings(franId) {
            var rate_id = franId;
            var rate_value = 0;
            if (document.getElementById('star5').checked)
                var rate_value = document.getElementById('star5').value;
            if (document.getElementById('star4').checked)
                var rate_value = document.getElementById('star4').value;
            if (document.getElementById('star3').checked)
                var rate_value = document.getElementById('star3').value;
            if (document.getElementById('star2').checked)
                var rate_value = document.getElementById('star2').value;
            if (document.getElementById('star1').checked)
                var rate_value = document.getElementById('star1').value;

            $.ajax({
                type: 'POST',
                url: '/brandratings',
                data: {
                    "fid": rate_id,
                    "_token": "{{ csrf_token() }}",
                    "rateValue": rate_value
                },
                success: function(data) {
                    var a = data.ratings;
                    var b = Math.round(a);
                    var c = "";
                    for (var x = 0; x < b; x++) {
                        c += "<i class='fa fa-star fa-lg' aria-hidden='true'></i>";
                    }
                    if (a > b || a > (b + 0.5)) {
                        c += "<i class='fa fa-star-half-o fa-lg' aria-hidden='true'></i>";
                    } else {
                        if (a < 4.5)
                            c += "<i class='fa fa-star-o fa-lg' aria-hidden='true'></i>";
                    }
                    var remain = 5 - b;
                    for (var y = 0; y < remain - 1; y++) {
                        c += "<i class='fa fa-star-o fa-lg' aria-hidden='true'></i>";
                    }

                    $("#ratings").html(c);
                    $("#rateButton").html("Rated");
                    $("#rateButton").attr('data-toggle', "#");
                    document.getElementById("ratemsg").style.display = "block";
                    document.getElementById("ratingmsg").style.display = "none";

                    setTimeout(function() {
                        $("#myRating").hide();
                    }, 1000);
                    $(".modal-backdrop").hide();
                    $("#closeButton").click();

                }
            });
        }



        //show go up button
        if (screen.width > 767) {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 1) {
                    $('#landfix').addClass("stickylandp");
                } else {
                    $('#landfix').removeClass("stickylandp");
                }
            });
        }

        // JavaScript Document
        $(document).ready(function() {
            $(".comparebtn").on('click', function() {
                $("#compareForm").submit();
            });

            $('#sortlbtn').click(function() {
                $('#sideslide').toggle(200);
            });

            $('#closecat').click(function() {
                $('#sideslide').hide(200);
            });

            if (window.screen.height == 768 || window.screen.width == 1366)
                $("#tt-img-control").css('margin-top', '305px');

        });

        function getcityinfo(value) {
            var franId = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'GET',
                url: '/get-city-list-landing-page',
                data: {
                    state: value,
                    franId: franId
                },
                success: function(data) {
                    $("#getinfocity").html(data);
                }
            });
        }

        function getcityinfoinsta(value) {
            var franId = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'GET',
                url: '/get-city-list-landing-page',
                data: {
                    state: value,
                    franId: franId
                },
                success: function(data) {
                    $("#city").html(data);
                }
            });
        }

        function getMobileStatuscontact(value) {
            if ($('#successmobile').css('display') != "block") {
                if (value.length == 10) {
                    if ($.isNumeric(value)) {
                        $.ajax({
                            type: 'GET',
                            url: '/mobcheck',
                            data: {
                                mobile: value
                            },
                            success: function(data) {
                                if (data == 1) {
                                    $('#successmobile').css('display', 'block');
                                }
                                if (data == 0) {
                                    $('#contactsubmit').prop('disabled', true);
                                    $('#validatemobile').css('display', 'block');
                                    $('#successmobile').css('display', 'none');
                                }
                            }
                        });
                    }
                }
                if (value.length != 10) {
                    if ($.isNumeric(value)) {
                        $('#successmobile').css('display', 'none');
                        $('#contactsubmit').prop('disabled', false);
                        $('#editmobile').css('display', 'none');
                        $('#validatemobile').css('display', 'none');
                    }
                }
            }
        }

        function editmobile() {
            $('#mobile').attr('readonly', false);
            $('#editmobile').css('display', 'none');
            $('#validatemobile').css('display', 'block');
            $('#otpblock').css('display', 'none');
        }

        function validatemobile() {
            var keyword = document.getElementById('mobile').value;
            $.ajax({
                type: 'get',
                url: '/verify',
                data: {
                    mobile: keyword
                },
            });
            $('#mobile').attr('readonly', true);
            $('#editmobilecontact').css('display', 'block');
            $('#validatemobile').css('display', 'none');
            document.getElementById("otpblock").style.display = "block";
            $('#contactsubmit').prop('disabled', true);
        }

        function verify() {
            var otp = document.getElementById('otpcontact').value;
            var mobile = document.getElementById('mobile').value;
            $.ajax({
                type: 'get',
                url: '/investor/verifyotp',
                data: {
                    otpNo: otp,
                    mobileNo: mobile
                },
                success: function(data) {
                    if (data.check == 0) {
                        $('#mismatch').css('display', 'block');
                    } else {
                        $('#successmobile').css('display', 'block');
                        $('#contactsubmit').prop('disabled', false);
                        $('#otpblock').css('display', 'none');
                        $('#editmobilecontact').css('display', 'none');
                        $('#validatemobile').css('display', 'none');
                    }
                }

            });
        }

        $(document).ready(function() {
            $('#applbtn').click(function() {
                $('.aplbtn').hide();
                $("html, body").animate({
                    scrollTop: $('.insta-apply').offset().top - 150
                }, 1000);
                $("html, body").animate({
                    scrollTop: $('#expbtn').offset().top - 150
                }, 1000);
                return false;
            });

            @if (in_array(explode('.', request()->segment(2))[1], Config('constants.popupBrands')) && !Auth::check())
                @php
                    session()->put('lastUrl', url()->current());
                @endphp
                $("#loginselect").trigger("click");
            @endif
        });

        //like count
        function likebtn(franId) {
            var like_id = franId;
            $.ajax({
                type: 'POST',
                url: '/brandlikes',
                data: {
                    "fid": like_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $("#likecount").html(data.newCount);
                    $("#likeButton").attr('onclick', "#");
                    $("#likeButton").html("Liked");
                }
            });
        }

        $('#newemail').on('keyup', function() {
            $('#newemail').val($.trim($('#newemail').val()));
        });

        $('#name').on('focusout', function() {
            $('#name').val($.trim($('#name').val().replace(/~+$/, '')));
        });
    </script>
    <script>
        $(function() {
            //$('#contactsubmit').prop('disabled', true);
            $('#is_termsagree1').click(function() {
                if ($('#is_termsagree1').is(':checked')) {
                    $('#contactsubmit').prop('disabled', false);
                } else {
                    $('#contactsubmit').prop('disabled', true);
                }
            })
        })
    </script>
@endsection
