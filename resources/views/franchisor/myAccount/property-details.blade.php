@extends('layout.master')
@section('prd')
    class="selected"
@endsection
@section('content')
    <div class="container myaccount">
        <div class="row row-no-margin">
            <!-- MY ACCOUNT  LEFT sTART -->
            @include('includes.myfranchiseleft')
            <!-- MY ACCOUNT  LEFT END -->

            @php
                $regType = $franData->looking_tradepartner == 1 ? 2 : 1;
            @endphp

            <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                <h1 class="myhead marleft">{{ $regType == 1 ? "FRANCHISE" : "DISTRIBUTION" }}/Property Details</h1>
                <div class="bor-radius backwhite marleft">
                    <form class="form-horizontal" id="fran-form" name="form_franchisor" action="updatepropertydetails" method="POST" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-xs-12 pad30 showbg">
                            @if($errors->any())
                                <h4>{{$errors->first()}}</h4>
                            @endif
                            @if (Session::has('Success'))
                                <div class="alert alert-info">{{ Session::get('Success') }}</div>
                            @endif
                            @if (Session::has('failed'))
                                <div class="alert alert-info">{{ Session::get('failed') }}</div>
                            @endif
                            <div class="sidehead">{{ $regType == 1 ? "Franchise" : "Distribution" }}</div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">
                                    Is there exclusive territorial rights given to a {{ $regType == 1 ? "unit franchise" : "channel partner" }}?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                            @php
                                                $isTerritorialRights   = "";
                                                $isTerritorialRightsNo = "";
                                                if ( $franData->is_territorial_rights == 1)
                                                    $isTerritorialRights   = "checked";
                                                if ( $franData->is_territorial_rights != 1 )
                                                    $isTerritorialRightsNo = "checked";
                                            @endphp
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="is_territorial_rights" id="inlineCheckbox1"
                                                       value="1" {{$isTerritorialRights}} > Yes
                                            </label>

                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="is_territorial_rights" id="inlineCheckbox3"
                                                       value="0" {{$isTerritorialRightsNo}} > No
                                            </label>
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
                                            @php
                                                $performance   = "";
                                                $performanceNo = "";
                                                if ( $franData->is_perform_guarranty == 1)
                                                    $performance   = "checked";
                                                if ( $franData->is_perform_guarranty != 1 )
                                                    $performanceNo = "checked";
                                            @endphp
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="is_perform_guarranty" id="inlineCheckbox1"
                                                       value="1" {{$performance}} > Yes
                                            </label>
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="is_perform_guarranty" id="inlineCheckbox3"
                                                       value="0" {{$performanceNo}} > No
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
                                        @php
                                            $markettinglevies   = "";
                                            $markettingleviesNo = "";
                                            if ( $franData->is_marketting_levies == 1)
                                                $markettinglevies   = "checked";
                                            if ( $franData->is_marketting_levies != 1 )
                                                $markettingleviesNo = "checked";
                                        @endphp
                                        <label class="col-xs-4 col-sm-3 col-md-3">
                                            <input type="radio" name="is_marketting_levies" id="inlineCheckbox1"
                                                   value="1" {{$markettinglevies}} >Yes
                                        </label>
                                        <label class="col-xs-4 col-sm-3 col-md-3">
                                            <input type="radio" name="is_marketting_levies" id="inlineCheckbox3"
                                                   value="0" {{$markettingleviesNo}} >No
                                        </label>
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
                                        @php
                                            $disabled1 = "";
                                            if ( $franData->payback_period == "0-0 Month" )
                                                $disabled1 = "disabled";
                                        @endphp
                                        <div class="col-xs-3 col-sm-3 col-md-3 row-no-padding wwidth148">
                                            <select name="payback_period_max" class="form-control myselectclass4" id="range_rate_max" {{$disabled1}} >
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
                                            @php
                                                $financingAid   = "";
                                                $financingAidNo = "";
                                                if ( $franData->is_finance_aid == 1)
                                                    $financingAid   = "checked";
                                                if ( $franData->is_finance_aid != 1 )
                                                    $financingAidNo = "checked";
                                            @endphp
                                            <label class="col-xs-4  col-sm-3 col-md-3">
                                                <input name="is_finance_aid" type="radio" id="inlineCheckbox1" value="1" {{$financingAid}} > Yes
                                            </label>

                                            <label class="col-xs-4  col-sm-3 col-md-3">
                                                <input name="is_finance_aid" type="radio" id="inlineCheckbox3" value="0" {{$financingAidNo}} > No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endif

                        </div>
                        <div class="col-xs-12 col-sm-12  col-md-12 pad30 bgbase bordertop marginminust20 showbg">
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
                                                <option value="{{ $index }}" {{ $index==$franData->property_type ? "selected" : "" }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group multipleinputsetheight50">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Floor Area
                                    Requirements</label>
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
                                <label class="col-xs-12  col-sm-4 col-md-4  com4mod control-label">Preferred
                                    location</label>
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
                                <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label line2padinputbox">
                                    Franchisor or Franchisee will arrange outfit of premises
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="rupee" src="{{url('images/rupee.png')}}"></span>
                                        <input type="text" name="premise_outfit_arrangement" class="form-control" placeholder="Please Specify" value="{{$franData->premise_outfit_arrangement}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">
                                    Do you provide site selection assistance?
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12  col-md-12 row-no-padding">
                                            @php
                                                $siteSelectionAssistant   = "";
                                                $siteSelectionAssistantNo = "";
                                                if ( $franData->site_selection_assistance == 1)
                                                    $siteSelectionAssistant   = "checked";
                                                if ( $franData->site_selection_assistance != 1 )
                                                    $siteSelectionAssistantNo = "checked";
                                            @endphp
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="site_selection_assistance" id="inlineCheckbox1" value="1" {{$siteSelectionAssistant}} > Yes
                                            </label>
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="site_selection_assistance" id="inlineCheckbox3" value="0" {{$siteSelectionAssistantNo}} > No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <div style="text-align: center;">
                                <button class="btn btn-default nextBtn1" id="step4btn" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript">

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