@extends('layout.master')
@section('seoTitle', 'Franchisor Registration - franchiseindia.com')
@section('seoDesc', 'Are you a franchisor with a unique business idea? Register with Franchise India and get noticed by multiple investors and expand your client base.')
@section('content')

    @php
        $regType = \App\Models\FranchisorBusinessDetail::query()->where('franchisor_id', $franchisorId)->first()->looking_tradepartner == 1 ? 2 : 1;
    @endphp
<style type="text/css">
.innerloginblk  { padding:0px; } 
#adslot728x90_BTF { display:none}
#Business-Opportunitiessection { display:none}
#Our-Group-Sitessection  { display:none}
.regblkleft { display:none;}
.regblkright { display:none;}
</style>

    <!--step process start  here -->
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
                <form class="form-horizontal" id="fran-form" name="form_franchisor" action="{{ url('franchisor/registration/step/5')}}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="franchisorId" value="{{$franchisorId}}">

                    <!-- step 4 start here -->
                    <div class="setup-content" id="step-4">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg FranDtl">
                            <div class="sidehead">{{ $regType == 1 ? "FRANCHISE" : "DISTRIBUTION" }} Details</div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox Head"> Are there exclusive territorial rights given to a {{ $regType == 1 ? "unit franchise" : "channel partner" }}? </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                            <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="is_territorial_rights" id="inlineCheckbox1" value="1" {{ $franData->is_territorial_rights == 1 ? "checked" : "" }} > Yes</label>
                                            <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="is_territorial_rights" id="inlineCheckbox3" value="0" {{ $franData->is_territorial_rights != 1 ? "checked" : "" }} > No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padcheckbox">
                                    Are any performance guarantees given to {{ $regType == 1 ? "unit franchisee" : "channel partner" }}?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="is_perform_guarranty" id="inlineCheckbox1" value="1" {{ $franData->is_perform_guarranty == 1 ? "checked" : "" }} > Yes
                                            </label>
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="is_perform_guarranty" id="inlineCheckbox3" value="0" {{ $franData->is_perform_guarranty != 1 ? "checked" : "" }} > No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($regType == 1)
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padcheckbox">
                                        Are any advertising / marketing levies payable to the franchisor?
                                    </label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                                <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="is_marketting_levies" id="inlineCheckbox1" value="1" {{ $franData->is_marketting_levies == 1 ? "checked" : "" }} >Yes</label>
                                                <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="is_marketting_levies" id="inlineCheckbox3" value="0" {{ $franData->is_marketting_levies != 1 ? "checked" : "" }} >No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 col-md-4  com4mod control-label line2padinputbox">
                                    What is the anticipated percentage return on investment?
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="commission" src="{{url('images/commission.png')}}"></span>
                                        <input name="anticipated_roi" type="text" pattern="[0-9]{1,4}" maxlength="4" class="form-control" placeholder="enter %" value="{{$franData->anticipated_roi}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 col-md-4  com4mod control-label line2padinputbox">
                                    What is the likely payback period of capital for a {{ $regType == 1 ? "unit franchise" : "channel partner" }}?
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row row-no-margin">
                                        <div class="col-xs-6 col-sm-6 col-md-6 row-no-padding width184">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img alt="date calender" src="{{url('images/calendar.png')}}"></span>
                                                <select name="payback_period_min" class="form-control myselectclass4" id="range_rate_min">
                                                    <option value="0">Min</option>
                                                    @for($i = 0; $i <= 11; $i++)
                                                        <option value="{{ $i }}" {{ isset($paybackResult[0]) && $paybackResult[0] == $i ? "selected" : "" }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 row-no-padding wwidth148">
                                            <select name="payback_period_max" class="form-control myselectclass4" id="range_rate_max">
                                                <option value="0">Max</option>
                                                @for($i = 0; $i <= 11; $i++)
                                                    <option value="{{ $i }}" {{ isset($paybackResult[1]) && $paybackResult[1] == $i ? "selected" : "" }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        @php
                                            $mothSelected = "selected";
                                            $yearSelected = "";

                                            if ( count($paybackResult) > 1 && $paybackResult[2] == "Year") {
                                                $mothSelected = "";
                                                $yearSelected = "selected";
                                            }
                                        @endphp

                                        <div class="col-xs-3 col-sm-3 col-md-3 row-no-padding width148">
                                            <select name="payback_period_type" class="form-control myselectclass4" title="payback_period_type">
                                                <option value="Month" {{ $mothSelected }}>Month</option>
                                                <option value="Year" {{ $yearSelected }}>Year</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padinputbox">
                                    Are there any other investment requirements?
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="rupee" src="{{url('images/rupee.png')}}"></span>
                                        <input type="text" name="other_investment_req" class="form-control"  placeholder="Enter other investment requirements" value="{{$franData->other_investment_req}}">
                                    </div>
                                </div>
                            </div>

                            @if( $regType == 1 )
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">
                                        Do you provide aid in financing?
                                    </label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                                <label class="col-xs-4  col-sm-3 col-md-3"><input name="is_finance_aid" type="radio" id="inlineCheckbox1" value="1" {{ $franData->is_finance_aid == 1 ? "checked" : "" }} > Yes</label>
                                                <label class="col-xs-4  col-sm-3 col-md-3"><input name="is_finance_aid" type="radio" id="inlineCheckbox3" value="0" {{ $franData->is_finance_aid != 1 ? "checked" : "" }} > No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="clearfix"></div>
                        <!--property detail start here -->
                        <div class="col-xs-12 col-sm-12  col-md-12 pad30 bgbase bordertop marginminust20 showbg PropDtl">
                            <div class="sidehead">Property Details</div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padinputbox">
                                    What type of property is required for this {{ $regType == 1 ? "franchise" : "dealership" }} opportunity ?
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="company" src="{{url('images/company.png')}}"></span>
                                        <select name="property_type" class="form-control myselectclass" id="range-rate" >
                                            <option value="">select property type</option>
                                            @foreach(Config('constants.propertyType') as $index => $value)
                                                <option value="{{ $index }}" {{ $index == $franData->property_type ? "selected" : "" }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group multipleinputsetheight50">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Floor Area Requirements</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row row-no-margin">
                                        <div class="col-xs-12 col-sm-6 row-no-padding width184 FlrAreaMin">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img alt="floor area requirement" src="{{url('images/calendar.png')}}"></span>
                                                <input type="text" value="{{$franData->prop_area_min}}" name="prop_area_min" id="prop_area_min" pattern="[0-9]{2,5}" minlength="2" maxlength="5" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaMax">
                                            <input type="text" value="{{$franData->prop_area_max}}" name="prop_area_max" id="prop_area_max" pattern="[0-9]{3,6}" minlength="3" maxlength="6" class="form-control" />
                                        </div>
                                        <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaSqFt">
                                            <input class="form-control sqclas" id="range-rate" disabled placeholder="Sq. Ft.">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 col-md-4  com4mod control-label">Preferred location</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="city" src="{{url('images/city.png')}}"></span>
                                        <input type="text" name="pref_prop_location" class="form-control"  placeholder="Enter Preferred location" value="{{$franData->pref_prop_location}}">
                                    </div>
                                </div>
                            </div>

                            @if( $regType == 1 )
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padinputbox"> Franchisor or Franchisee will arrange outfit of premises </label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img alt="rupee" src="{{url('images/rupee.png')}}"></span>
                                            <input type="text" name="premise_outfit_arrangement" class="form-control" placeholder="Please Specify" value="{{$franData->premise_outfit_arrangement}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">Do you provide site selection assistance?</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                                <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="site_selection_assistance" value="1" {{ $franData->site_selection_assistance == 1 ? "checked" : "" }} > Yes</label>
                                                <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="site_selection_assistance" value="0" {{ $franData->site_selection_assistance != 1 ? "checked" : "" }} > No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg text-center">
                            <button class="btn btn-default" type="submit">Next</button>
                        </div>
                    </div>
                    <!-- step 4 end here -->
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
    <!-- end phone number validation -->
    <script>
        $(document).ready(function () {

            $("#range_rate_min").keyup(function () {
                $("#fran-form").validate().element('#range_rate_max');
            });

            $("#range_rate_max").keyup(function () {
                $("#fran-form").validate().element('#range_rate_min');
            });

            $("#prop_area_max").keyup(function () {
                $("#fran-form").validate().element('#prop_area_min');
            });

            $("#prop_area_min").keyup(function () {
                $("#fran-form").validate().element('#prop_area_max');
            });

            $.validator.addMethod("greaterThan", function (value, element, param) {
                var $min = $(param);
                if (this.settings.onfocusout) {
                    $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
                            $(element).valid();
                        }
                    );
                }
                if(value !=='' && $min.val() !=='' && typeof value !== 'undefined' && typeof $min.val() !== 'undefined') {
                    return parseInt(value) >= parseInt($min.val());
                } else {
                    return true;
                }

            });

            $.validator.addMethod("checkMinEmpty", function (value, element, param) {

                var minVal = parseInt($(param).val());
                var maxVal = parseInt(value);

                if( isNaN(minVal))
                    minVal = 0;

                if (isNaN(maxVal))
                    maxVal = 0;

                return !(maxVal > 0 && minVal === 0);
            });

            $.validator.addMethod("checkMaxEmpty", function (value, element, param) {
                var maxVal = parseInt($(param).val());
                var minVal = parseInt(value);

                if( isNaN(minVal))
                    minVal = 0;

                if (isNaN(maxVal))
                    maxVal = 0;

                return !(minVal > 0 && maxVal === 0);

            });

            $("#fran-form").validate({

                    rules: {
                        prop_area_min: {number: true, minlength:2, maxlength: 5, checkMaxEmpty:'#prop_area_max'},
                        prop_area_max: {number: true, minlength:3, maxlength: 6, checkMinEmpty:'#prop_area_min', greaterThan: '#prop_area_min'},
                        payback_period_min: {checkMaxEmpty:'#range_rate_max'},
                        payback_period_max: {checkMinEmpty:'#range_rate_min', greaterThan: '#range_rate_min'}
                    },
                    messages: {
                        prop_area_min: {number:"Please enter in numeric",  minlength: jQuery.format("Please enter minimum {0} digits area"), maxlength: jQuery.format("Please enter maximum {0} digits area"), checkMaxEmpty: 'maximum area should not be empty'},
                        prop_area_max: {number:"Please enter in numeric",  minlength: jQuery.format("Please enter minimum {0} digits area"), maxlength: jQuery.format("Please enter maximum {0} digits area"),greaterThan: "should be greater than min area", checkMinEmpty: "minimum area should not be empty" },
                        payback_period_min: {checkMaxEmpty:'Select max value'},
                        payback_period_max: {checkMinEmpty:'Select min value', greaterThan: 'should be greater than min'}
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") === "prop_area_max" || element.attr("name") === "prop_area_min")
                            error.appendTo( element.parent().parent().parent());
                        else
                            error.appendTo( element.parent().parent());
                    }
                }
            );
        });
    </script>
@endsection
