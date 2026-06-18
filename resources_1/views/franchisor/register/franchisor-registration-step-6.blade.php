@extends('layout.master')
@section('seoTitle', 'Franchisor Registration - franchiseindia.com')
@section('seoDesc', 'Are you a franchisor with a unique business idea? Register with Franchise India and get noticed by multiple investors and expand your client base.')
@section('content')

    @php
        $franData = \App\FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first();
        $regType = $franData->looking_tradepartner == 1 ? 2 : 1;
    @endphp
<style type="text/css">
.innerloginblk  { padding:0px; } 
#adslot728x90_BTF { display:none}
#Business-Opportunitiessection { display:none}
#Our-Group-Sitessection  { display:none}
.regblkleft { display:none;}
.regblkright { display:none;}
</style>

    <div class="container formsection margintop60 staicp">
        <h1 class="noneunder"> Free listing - join franchiseindia.com today!</h1>
    </div>

    <div class="StepSec">
        <div class="row stepmargtform">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="col-xs-2 stepwizard-step">
                        <p class="activeve hidden-xs">Personal</p>
                        <span class="disnone"> <i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                        <a href="#" type="button" class="btn btn-primary btn-circle overfla activeve"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ url('franchisor/registration/step/2?franchisorId='.$franchisorId) }}"><p class="activeve hidden-xs" id="head1"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 2 || request()->segment(4) < 2)  ? "hidden" : "" }}"></i> Business</p></a>
                        <a href="{{ url('franchisor/registration/step/2?franchisorId='.$franchisorId) }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 2 || request()->segment(4) < 2)  ? "hidden" : "" }}"></i> <i class="fa fa-address-book fa-lg" aria-hidden="true"></i></span></a>
                        <a href="{{ url('franchisor/registration/step/2?franchisorId='.$franchisorId) }}" type="button" class="btn btn-default btn-circle overfla activeve2" id="ab1"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ $franData->step_completed > 1 ? url('franchisor/registration/step/3?franchisorId='.$franchisorId) : "#" }}"><p class="{{ $franData->step_completed > 1 ? "activeve" : ""}} hidden-xs" id="head2"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 3 || request()->segment(4) < 3)  ? "hidden" : "" }}"></i> Professional <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 3 || request()->segment(4) > 3)  ? "hidden" : "" }}"></i></p></a>
                        <a href="{{ $franData->step_completed > 1 ? url('franchisor/registration/step/3?franchisorId='.$franchisorId) : "#" }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 3 || request()->segment(4) < 3)  ? "hidden" : "" }}"></i> <i class="fa fa-address-card fa-lg" aria-hidden="true"></i> <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 3 || request()->segment(4) > 3)  ? "hidden" : "" }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 1 ? url('franchisor/registration/step/3?franchisorId='.$franchisorId) : "#" }}" type="button" class="btn btn-default btn-circle overfla {{ $franData->step_completed > 1 ? "activeve2" : ""}}" {{ $franData->step_completed < 2 ? "disabled" : ""}} id="ab2"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ $franData->step_completed > 2 ? url('franchisor/registration/step/4?franchisorId='.$franchisorId) : "#" }}"><p class="{{ $franData->step_completed > 2 ? "activeve" : ""}} hidden-xs" id="head3"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 4 || request()->segment(4) < 4)  ? "hidden" : "" }}"></i> Property <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 4 || request()->segment(4) > 4)  ? "hidden" : "" }}"></i></p></a>
                        <a href="{{ $franData->step_completed > 2 ? url('franchisor/registration/step/4?franchisorId='.$franchisorId) : "#" }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 4 || request()->segment(4) < 4)  ? "hidden" : "" }}"></i> <i class="fa fa-building fa-lg" aria-hidden="true"></i> <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 4 || request()->segment(4) > 4)  ? "hidden" : "" }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 2 ? url('franchisor/registration/step/4?franchisorId='.$franchisorId) : "#" }}" type="button" class="btn btn-default btn-circle overfla {{ $franData->step_completed > 2 ? "activeve2" : ""}}" {{ $franData->step_completed < 3 ? "disabled" : ""}} id="ab3"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ $franData->step_completed > 3 ? url('franchisor/registration/step/5?franchisorId='.$franchisorId) : "#" }}"><p class="{{ $franData->step_completed > 3 ? "activeve" : ""}} hidden-xs" id="head4"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 5 || request()->segment(4) < 5)  ? "hidden" : "" }}"></i> Agreements <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 5 || request()->segment(4) > 5)  ? "hidden" : "" }}"></i></p></a>
                        <a href="{{ $franData->step_completed > 3 ? url('franchisor/registration/step/5?franchisorId='.$franchisorId) : "#" }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 5 || request()->segment(4) < 5)  ? "hidden" : "" }}"></i> <i class="fa fa-pencil-square fa-lg" aria-hidden="true" title="Training/Agreements"></i> <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 5 || request()->segment(4) > 5)  ? "hidden" : "" }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 3 ? url('franchisor/registration/step/5?franchisorId='.$franchisorId) : "#" }}" type="button" class="btn btn-default btn-circle overfla {{ $franData->step_completed > 3 ? "activeve2" : ""}}" {{ $franData->step_completed < 4 ? "disabled" : ""}} id="ab4"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ $franData->step_completed > 4 ? url('franchisor/registration/step/6?franchisorId='.$franchisorId) : "#" }}"><p class="{{ $franData->step_completed > 4 ? "activeve" : ""}} hidden-xs" id="head5"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 6 || request()->segment(4) < 6)  ? "hidden" : "" }}"></i> Payment <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 6 || request()->segment(4) > 6)  ? "hidden" : "" }}"></i></p></a>
                        <a href="{{ $franData->step_completed > 4 ? url('franchisor/registration/step/6?franchisorId='.$franchisorId) : "#" }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 6 || request()->segment(4) < 6)  ? "hidden" : "" }}"></i> <i class="fa fa-credit-card fa-lg" aria-hidden="true" title="Payment"></i> <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 6 || request()->segment(4) > 6)  ? "hidden" : "" }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 4 ? url('franchisor/registration/step/6?franchisorId='.$franchisorId) : "#" }}" type="button" class="btn btn-default btn-circle overfla {{ $franData->step_completed > 4 ? "activeve3" : ""}}" {{ $franData->step_completed < 5 ? "disabled" : ""}} id="ab5"></a>
                    </div>
                </div>
            </div>
<div class="" style="text-align:center;margin-top: 45px;color: #000;font-size: 17px;font-weight: 400;">Chat on <a href="https://api.whatsapp.com/send?phone=919312650021&amp;text=Hello,%20I%20am%20interested%20in%20knowing%20more%20about ?%20https://www.franchiseindia.com/" target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/whatappsicon.svg" class="sts"></a></div>
<!--  -->
            
        </div>
    </div>
    <!--step process end  here -->
    <!--form start here -->
    <div class="container formsection">
        <div class="row margt0">
            <!--left form section start here -->
            <div class="col-xs-12 col-sm-9 bor-radius backwhite targleft row-no-padding">
                <!---->
                <form class="form-horizontal" id="fran-form" name="form_franchisor" action="{{ url('franchisor/registration/step/final')}}" method="POST" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="franchisorId" value="{{$franchisorId}}">

                    <!-- step 6 start here -->
                    <div class="setup-content" id="step-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            <div class="sidehead">Payment Plans</div>
                            <!--price box start here -->
                            <div class="pricesection">
                                <!--1-->
                                <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                    <label class="pad15b5"><input type="radio" name="membership_plan" checked="checked" value="1"> Basic Plan</label>
                                    <div class="priceshow"><span>Free of Cost</span>No Time Limit</div>
                                    <ul class="pad15">
                                        <li>Listing on the website</li>
                                        <li>Get notifications from investors</li>
                                    </ul>
                                </div>
                                <!--1-->

                                <!--2 Silver Plan start -->
                                <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                    <label class="pad15b5"><input type="radio" name="membership_plan" id="silverplanmain" value="2"> Sub-Sub Category</label>
                                    <div class="priceshow"><span>Rs. <strong id="silverPlan">50700</strong></span>
                                        <div class="txtgst">+18% GST</div>
                                        <div class="">
                                            <select name="membership_plan_month" id="membership_plan_month_sub_sub" onclick="getPlanTotal(this.id);" onchange="getPlanTotal(this.id);" class="form-control width110">
                                                {{--<option value=101>1 Month</option>--}}
                                                <option value=102>3 Month</option>
                                                <option value=103>6 Month</option>
                                                <option value=104>12 Month</option>
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="pad15">
                                        <li>Listing in the service/product category of the website</li>
                                        <li>Get notifications from investors</li>
                                        <li>Receive contact details of investors</li>
                                        <li>Logo Presence in the Service/Product category</li>
                                        <li>Third-highest Visibility</li>
                                        <li>Third-priority Response rate</li>
                                        <li>Basic display in the service/product category of the website</li>
                                    </ul>
                                </div>
                                <!--2 Silver Plan end-->

                                <!--3 Gold plan Start -->
                                <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                    <label class="pad15b5"><input type="radio" name="membership_plan" id="goldplanmain" value="3"> Sub Category</label>
                                    <div class="priceshow"><span>Rs. <strong id="goldPlan">78000</strong></span>
                                        <div class="txtgst">+18% GST</div>
                                        <div class="">
                                            <select name="membership_plan_month" id="membership_plan_month_sub" onclick="getPlanTotal(this.id);" onchange="getPlanTotal(this.id);" class="form-control width110">
                                                {{--<option value=105>1 Month</option>--}}
                                                <option value=106>3 Month</option>
                                                <option value=107>6 Month</option>
                                                <option value=108>12 Month</option>
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="pad15">
                                        <li>Listing in the sector category of the website</li>
                                        <li>Get notifications from investors</li>
                                        <li>Receive contact details of investors</li>
                                        <li>Logo Presence in the Sector and Service/Product categories</li>
                                        <li>Second-highest Visibility</li>
                                        <li>Second-priority Response rate</li>
                                        <li>Advanced display in the sector category of the website</li>
                                    </ul>
                                </div>
                                <!--3 Gold Plan end here -->

                                <!--4-->
                                <div class="col-xs-12 col-sm-3 col-md-3 bor-radius row-no-padding boxheight boxwidth">
                                    <label class="pad15b5"><input type="radio" name="membership_plan" id="platinumplanmain" value="4"> Master Category</label>
                                    <div class="priceshow"><span>Rs. <strong id="platinumPlan">87750</strong></span>
                                        <div class="txtgst">+18% GST</div>
                                        <div class="">
                                            <select name="membership_plan_month" id="membership_plan_month_master" onclick="getPlanTotal(this.id);" onchange="getPlanTotal(this.id);" class="form-control width110">
                                                {{--<option value=109>1 Month</option>--}}
                                                <option value=110>3 Month</option>
                                                <option value=111>6 Month</option>
                                                <option value=112>12 Month</option>
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="pad15">
                                        <li>Listing in the industry category of the website</li>
                                        <li>Get notifications from investors</li>
                                        <li>Receive contact details of investors</li>
                                        <li>Logo Presence in all categories</li>
                                        <li>Highest Visibility</li>
                                        <li>Top Priority Response rate</li>
                                        <li>Premium display in the industry category of the website</li>
                                    </ul>
                                </div>
                                <!--4-->

                            </div>
                            <!--price box end here -->

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"><span
                                            class="mandatory">Layout Option</span><br><span class="note">(Kindly upload images for the selected layout  <br>from your dashboard (Appearance section))</span></label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmarginnew">
                                        <div class="col-sm-12 row-no-padding optlink">
                                            <label class="col-sm-12 col-md-12">
                                                <input type="radio" name="layout_type" value="1" checked data-toggle="modal" data-target="#layoutoption1"/>Basic Layout &nbsp
                                                <a href="#" data-toggle="modal" data-target="#layoutoption1"> ( View Example )</a>
                                            </label>
                                            <label class="col-sm-12 col-md-12">
                                                <input type="radio" name="layout_type" value="2" data-toggle="modal" data-target="#layoutoption2"/>Sliding Layout &nbsp
                                                <a href="#" data-toggle="modal" data-target="#layoutoption2"> ( View Example )</a>
                                            </label>
                                            <label class="col-sm-12 col-md-12">
                                                <input type="radio" name="layout_type" value="3" data-toggle="modal" data-target="#layoutoption3"/>Gallery Layout &nbsp
                                                <a href="#" data-toggle="modal" data-target="#layoutoption3"> ( View Example )</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!---->
                            <div class="modal fade lg-panel formsection" id="layoutoption1" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body option">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                                            <img src="{{url('images/layoutoption1.jpg')}}" alt="layout1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->

                            <!---->
                            <div class="modal fade lg-panel formsection" id="layoutoption2" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body option">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                                            <img src="{{url('images/layoutoption2.jpg')}}" alt="layout2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->

                            <!---->
                            <div class="modal fade lg-panel formsection" id="layoutoption3" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body option">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <img src="{{url('images/layoutoption3.jpg')}}" alt="layout3" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="border-topborder"></div>

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 com4mod control-label">Upload Company Logo (Max 2MB)</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{url('images/upload.png')}}" alt="image upload" /></span>
                                        <input type="file" name="company_logo" class="form-control" id="company_logo" placeholder="Upload your Company Logo" required>
                                    </div>
                                    <div style="display: none; color: red;" id="company_logo_msg">Please select a valid image (jpg / gif / png)</div>
                                    <div style="display: none; color: red;" id="company_logo_msg_size">Please select a image of size(Less than 2MB)</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 com4mod control-label">Video Link </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{url('images/video-link.png')}}" alt="video link" /></span>
                                        <input type="text" class="form-control" name="video_link" id="video_link" placeholder="Enter Your Video link">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">GST NO.</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{url('images/commission.png')}}" alt="gst no."></span>
                                        <input type="text" name="gst_no" class="form-control"  placeholder="">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="amount_to_pay" class="form-control" id="amount" value="">
                            <div class="form-group marTopnew">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label"></label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs"></div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-12 col-sm-12 col-md-12"> <input type="checkbox" checked name="newsletter_sub" value="1"> Yes, I want to subscribe for weekly Newsletter </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <input type="submit" id="franchisorsubmit" class="btn btn-default" value="Submit"/>
                            </center>
                        </div>
                    </div>
                    <!-- step 6 end here -->
                </form>
                <!---->
            </div>
            <!--left form section end here -->
            <!--right form section start here -->
        @include('includes.franchisor-faq')
        <!--right form section end hefre -->
        </div>
    </div>
    <!--form end here -->
    <div class="heightspace"></div>
    <script language="javascript">

        $("#company_logo").change(function () {
            var val = $(this).val();
            switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                case 'gif':
                case 'jpg':
                case 'png':
                    $('#company_logo_msg').css('display', 'none');
                    $('#franchisorsubmit').prop('disabled', false);
                    break;
                default:
                    $(this).val('');
                    $('#company_logo_msg').css('display', 'block');
                    $('#franchisorsubmit').prop('disabled', true);
                    break;
            }
        });
        $('#company_logo').bind('change', function () {
            if (this.files[0].size > 2097152) {
                $('#company_logo_msg_size').css('display', 'block');
                $('#franchisorsubmit').prop('disabled', true);
            } else {
                $('#company_logo_msg_size').css('display', 'none');
                $('#franchisorsubmit').prop('disabled', false);
            }
        });


        let membershipPlanFranchisor = <?php echo json_encode(Config('constants.membershipPlanFranchisor'));?>;


        $('#silverplanmain').click(function () {
            $("#amount").prop("value", $('#membership_plan_month_sub_sub').val());
            $('#membership_plan_month_master').val(109);
            $('#membership_plan_month_sub').val(105);
            document.getElementById("silverPlan").innerHTML = membershipPlanFranchisor[$('#membership_plan_month_sub_sub').val()];
            document.getElementById("goldPlan").innerHTML = "32500";
            document.getElementById("platinumPlan").innerHTML = "39000";

            $("#company_logo").prop('required', true);
            $("#company_logo").prop('name', 'company_logo');
            $("#video_link").prop('name', 'video_link');
        });

        $('#goldplanmain').click(function () {
            $("#amount").prop("value", $('#membership_plan_month_sub').val());
            $('#membership_plan_month_master').val(109);
            $('#membership_plan_month_sub_sub').val(101);
            document.getElementById("silverPlan").innerHTML = "19500";
            document.getElementById("goldPlan").innerHTML = membershipPlanFranchisor[$('#membership_plan_month_sub').val()];
            document.getElementById("platinumPlan").innerHTML = "39000";

            $("#company_logo").prop('required', true);
            $("#company_logo").prop('name', 'company_logo');
            $("#video_link").prop('name', 'video_link');
        });

        $('#platinumplanmain').click(function () {
            $("#amount").prop("value", $('#membership_plan_month_master').val());
            $('#membership_plan_month_sub').val(105);
            $('#membership_plan_month_sub_sub').val(101);
            document.getElementById("silverPlan").innerHTML = "19500";
            document.getElementById("goldPlan").innerHTML = "32500";
            document.getElementById("platinumPlan").innerHTML = membershipPlanFranchisor[$('#membership_plan_month_master').val()];

            $("#company_logo").prop('required', true);
            $("#company_logo").prop('name', 'company_logo');
            $("#video_link").prop('name', 'video_link');
        });

        function getPlanTotal(id) {
            $("#amount").prop("value", $('#'+id).val());
            if(id == "membership_plan_month_sub_sub") {
                $("#silverplanmain").prop("checked", true);
                document.getElementById("silverPlan").innerHTML = membershipPlanFranchisor[$('#'+id).val()];
                document.getElementById("goldPlan").innerHTML = "32500";
                document.getElementById("platinumPlan").innerHTML = "39000";
                $('#membership_plan_month_sub').val(105);
                $('#membership_plan_month_master').val(109);

                $("#company_logo").prop('required', true);
                $("#company_logo").prop('name', 'company_logo');
                $("#video_link").prop('name', 'video_link');
            }

            if(id == "membership_plan_month_sub") {
                $("#goldplanmain").prop("checked", true);
                document.getElementById("silverPlan").innerHTML = "19500";
                document.getElementById("goldPlan").innerHTML = membershipPlanFranchisor[$('#'+id).val()];
                document.getElementById("platinumPlan").innerHTML = "39000";
                $('#membership_plan_month_master').val(109);
                $('#membership_plan_month_sub_sub').val(101);

                $("#company_logo").prop('required', true);
                $("#company_logo").prop('name', 'company_logo');
                $("#video_link").prop('name', 'video_link');
            }
            if(id == "membership_plan_month_master") {
                $("#platinumplanmain").prop("checked", true);
                document.getElementById("silverPlan").innerHTML = "19500";
                document.getElementById("goldPlan").innerHTML = "32500";
                document.getElementById("platinumPlan").innerHTML = membershipPlanFranchisor[$('#'+id).val()];
                $('#membership_plan_month_sub').val(105);
                $('#membership_plan_month_sub_sub').val(101);

                $("#company_logo").prop('required', true);
                $("#company_logo").prop('name', 'company_logo');
                $("#video_link").prop('name', 'video_link');
            }
        }

        $('input:radio[name="membership_plan"]').change(function(){
            if (this.checked && this.value == 1)
                $('#franchisorsubmit').prop('disabled', false);
        });

    </script>
    <!-- end phone number validation -->
@endsection
