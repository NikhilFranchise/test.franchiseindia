@extends('layout-hindi.master')
@section('seoTitle', $seoTitle)
@if (!empty($seoDesc))
    @section('seoDesc', $seoDesc)
@endif
@if (!empty($seoKeywords))
    @section('seoKeywords', $seoKeywords)
@endif
@php
    $hindiUrl =
        Config('constants.MainDomain') . '/hi/brands/' . $franDetails->profile_name . $franDetails->fran_detail_id;
    $engUrl = Config('constants.MainDomain') . '/brands/' . $franDetails->profile_name . $franDetails->fran_detail_id;
@endphp
{{-- @section('hindibrandUrls')
    <link rel="amphtml"   href="{{ Config('constants.MainDomain') }}/amp/hi/brands/{{ $franDetails->profile_name }}.{{ $franDetails->fran_detail_id }}">
    <link rel="alternate" href="{{ Config('constants.MainDomain') }}/brands/{{ $franDetails->profile_name }}.{{ $franDetails->fran_detail_id }}" hreflang="en-IN" />
    <link rel="alternate" href="{{ Config('constants.MainDomain') }}/hi/brands/{{ $franDetails->profile_name }}.{{ $franDetails->fran_detail_id }}" hreflang="hi-IN" />
@endsection --}}
@section('hindibrandUrls')
    {{-- <link rel="amphtml"   href="{{ Config('constants.MainDomain') }}/amp/hi/brands/{{ $franDetails->profile_name }}.{{ $franDetails->fran_detail_id }}"> --}}
    <link rel="alternate"
        href="{{ Config('constants.MainDomain') }}/brands/{{ $franDetails->profile_name }}.{{ $franDetails->fran_detail_id }}"
        hreflang="en-IN" />
    <link rel="alternate"
        href="{{ Config('constants.MainDomain') }}/hi/brands/{{ $franDetails->profile_name }}.{{ $franDetails->fran_detail_id }}"
        hreflang="hi-IN" />
@endsection
@section('hindiUrl', url()->current())
@section('englishUrl', str_replace('hi/', '', url()->current()))

@section('content')

    @include('includes.breadcrumb')

    @if ($franDetails->membership_type != 1)
        <div class="innerloginblk">
            @include('includes.login-events')
        </div>
    @else
        <div class="margintop20"></div>
    @endif
    @if (empty($images) || $images->count() < 4)
    {{-- @if (count($images) < 4 || $franDetails->membership_type != 1) --}}
        @include('includes.brandlanding.hindi.layout-1')
    @elseif($franDetails->page_layout_type == '1')
        @include('includes.brandlanding.hindi.layout-1')
    @elseif($franDetails->page_layout_type == '2')
        @include('includes.brandlanding.hindi.layout-2')
    @else
        @include('includes.brandlanding.hindi.layout-3')
    @endif

    <div class="modal fade lg-panel" id="modalGetFree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="contactform" action="{{ Config('constants.MainDomain') }}/brandcontactinfo">
                    <input type="hidden" name="frandetailsid" id="freeinfovalue" value="{{ $franDetails->franchisor_id }}">
                    <div class="modal-header" style="text-align: center;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="conactheading">आपने जानकारी के लिए अनुरोध किया है
                            <strong>{{ $franDetails->company_name }}</strong></h4>
                    </div>
                    <div class="row popspace" id="ajaxResshowblock" style="display: none">
                        <div class="col-xs-12 col-sm-9 col-md-9">
                            <div class="popbranddetail">
                                <div class="popinfohead" id="companyContact"></div>
                                <div class="popinfo">सीओ नाम:<span id="ceocontact"></span></div>
                                <div class="popinfo">टेलीफोन नंबर:<span id="telephonecontact"></span></div>
                                <div class="popinfo">पता :<span id="addressocontact"></span></div>
                                <div class="popinfo">मोबाइल :<span id="mobilecontact"></span></div>
                                <div class="popinfo">ईमेल :<span id="emailcontact"></span></div>
                                <div class="popinfo">वेबसाइट: <span id="websitecontact"></span></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <div class="popbrandlogo"></div>
                        </div>

                    </div>
                    <div class="modal-body popcentreq" id="ajaxReshideblock">
                        <p id="waitquery" style="display: none">कृपया प्रतीक्षा करें...</p>
                        @if (Auth::user())
                            <div class="requested-frm" id="paidinvBeforeApply" style="display: none">
                                <p id="queryCount">कृपया प्रतीक्षा करें...</p>
                                <Input type="button" class="btn btn-default btn-red" id="paidYesInvestor" value="Yes">
                                <Input type="button" class="btn btn-default btn-red" id="cancelContact" value="Cancel">
                            </div>
                            <div class="requested-frm" id="upgradeContact" style="display: none">
                                <p>संपर्क विवरण देखने के लिए कृपया अपने खाते को अपग्रेड करें</p>
                                <a href="{{ URL('investor/myaccount/payment') }}" class="btn btn-default btn-red">खाते का
                                    उन्नयन</a>
                            </div>
                        @endif

                        @if (!Auth::user())
                            <div class="requested-frm">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="infoname" id="contactname" class="form-control"
                                                placeholder="नाम दर्ज" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" id="contactstate" name="infostate" required
                                                onchange="getcityinfo(this.value)">
                                                <option value="">राज्य चुनें</option>
                                                @php
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
                                                        $stateArrVal = Config('location.stateArr');
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
                                                placeholder="ईमेल दर्ज करें" required name="infoemail">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="infocity" required id="getinfocity">
                                                <option value="">शहर चुनें</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group pos-rel">
                                            <input name="mobile" id="mobile" type="text" pattern="[0-9]{5,10}"
                                                minlength="10" maxlength="10"
                                                onkeyup="getMobileStatuscontact(this.value);" class="form-control"
                                                placeholder="मोबाइल दर्ज करें" required>
                                            <span class="vrfy" onClick="editmobile();" id="editmobilecontact"
                                                style="display: none;">संपादित करें</span>
                                            <span class="vrfy" onClick="validatemobile();" id="validatemobile"
                                                style="display: none">सत्यापित करें</span>
                                            <span id="successmobile" class="showhideright" style="display: none"><i
                                                    class="fa fa-check fa-lg" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contactaddress"
                                                name="address" placeholder="पता लिखिए" required>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-6" style="display: none;" id="otpblock">
                                        <div class="form-group pos-rel">
                                            <input id="otpcontact" type="text" class="form-control" maxlength="4"
                                                placeholder="ओटीपी दर्ज करें">
                                            <span class="vrfy" id="verify_button" style="display: block"
                                                onclick="verify()">सत्यापित करें</span>
                                        </div>
                                        <div style="display: none" id="mismatch">ओटीपी मिस्चैच</div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group pos-rel">
                                            <input id="pincodecontact" type="text" class="form-control"
                                                name = "pincode" pattern="[0-9]{5,6}" minlength="6" maxlength="6"
                                                placeholder="पिनकोड दर्ज करें">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group pos-rel">
                                            <select class="form-control" name="investment_range" required>
                                                <option value="">निवेश सीमा का चयन करें</option>
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
                                                        name="newsletter_sub" checked>हां, मैं साप्ताहिक न्यूज़लेटर का
                                                    ग्राहक बनना चाहूंगा</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group txt-center">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="need_loan">संपत्ति के खिलाफ
                                                    ऋण?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if (!Auth::user())
                        <div class="modal-footer txt-center" id="submitbuttoncontact">
                            <button type="submit" class="btn btn-default btn-red" id="contactsubmit">अनुरोध प्रस्तुत
                                करें</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <!--Landing page end here -->
    <script src="{{ URL::asset('js/jquery.pagenav.js') }}"></script>
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
                                <center>
                                    <input type="reset" class="btn btn-default" value="Cancel" data-dismiss="modal">
                                    <input type="button" class="btn btn-default btntb" value="Submit"
                                        onclick="ratings('{{ $franDetails->franchisor_id }}');">
                                </center>
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
        {{-- @include("includes/brandlanding/hindi/morestories") --}}
    @endif
    <!--apply now btn start here -->
    <div class="aplbtn">
        <span id="applbtn">अभी अप्लाई करें <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
    </div>
    <!--apply now btn end here -->

    <form method="post" id="compareForm" style="display: none;" action="{{ URL('compare-brands') }}">
        <input type="hidden" name="franchisors" id="franchisorsForComparison"
            value="{{ $franDetails->franchisor_id }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="brandRequest" value="Compare" />
    </form>


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
                        $('#creditRemaining').html('आपके पास ' + data +
                            ' शेष हैं| क्या आप क्रेडिट का उपयोग करना चाहते हैं');

                    } else if (data == "showMsg") {

                        window.location.assign(
                            '{{ Config('constants.MainDomain') }}/investor/myaccount/payment');

                    } else {

                        document.getElementById("expbtnloading").style.display = "none";
                        document.getElementById("expmsg").style.display = "block";
                        $('#companyContactinsta').html(data.user.company_name);
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
            var franId = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead') }}',
                data: {
                    franId: franId,
                    "_token": "{{ csrf_token() }}",

                },
                success: function(data) {

                    document.getElementById("expbtnloading").style.display = "none";
                    document.getElementById("expmsg").style.display = "block";
                    $('#companyContactinsta').html(data.user.company_name);
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
                        $('#queryCount').html('आपके पास ' + data +
                            ' शेष हैं| क्या आप क्रेडिट का उपयोग करना चाहते हैं');

                    } else if (data == 'upgrade') {

                        $('#upgradeContact').css('display', 'block');

                    } else {

                        $('#conactheading').html("Contact Details");
                        $('#ajaxReshideblock').css('display', 'none');
                        $('#ajaxResshowblock').css('display', 'block');
                        $('#companyContact').html(data.user.company_name);
                        $('#ceocontact').html(data.user.ceo_name);
                        $('#telephonecontact').html(data.user.telephone);
                        $('#addressocontact').html(data.user.fran_address + "" + data.user.city + "" +
                            data.user.state + "" + data.user.pincode);
                        $('#emailcontact').html("<a href='mailto:" + data.user.email +
                            "' target='_blank'>" + data.user.email + "</a>");
                        $('#mobilecontact').html(data.user.mobile);
                        $('#websitecontact').html("<a href='http://" + data.user.website +
                            "' target='_blank'>" + data.user.website + "</a>");
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
                    var obj = jQuery.parseJSON(data);

                    $('#waitquery').css('display', 'none');
                    $('#conactheading').html("Contact Details");
                    $('#ajaxReshideblock').css('display', 'none');
                    $('#ajaxResshowblock').css('display', 'block');
                    $('#companyContact').html(obj.user.company_name);
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
            });
        });

        //Cancelling the view contact form and sending the normal lead
        $('#cancelContact').on('click', function() {
            $('button.close').click();
            var franId = document.getElementById('freeinfovalue').value;
            $.ajax({
                type: 'post',
                url: '{{ URL('/inv-lead-normal') }}',
                data: {
                    franId: franId,
                    "_token": "{{ csrf_token() }}",

                },
                success: function(data) {
                    console.log('successful');
                }
            });

        });

        //display star ratings
        var a = "{{ $ratings }}";
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
@endsection
