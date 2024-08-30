@extends('layout.master')
@section('prd')
    class="selected"
@endsection
@section('content')
    <div class="container myaccount">
        <div class="row row-no-margin">
            <!-- MY ACCOUNT  LEFT sTART -->
            @include('includes.myinvestorleft')
            <!-- MY ACCOUNT  LEFT END -->
            <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                <h1 class="myhead marleft">Property Details</h1>
                <div class="bor-radius backwhite marleft">
                    <form class="form-horizontal" class="form-horizontal formInv" name="form_investor" id="investorRegForm"
                        action="updatepropertydetails" method="POST" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-xs-12 pad30 showbg">

                            @if ($errors->any())
                                <h4>{{ $errors->first() }}</h4>
                            @endif
                            @if (Session::has('Success'))
                                <div class="alert alert-info">{{ Session::get('Success') }}</div>
                            @endif
                            @if (Session::has('errorMessage'))
                                <div class="alert alert-info">{{ Session::get('errorMessage') }}</div>
                            @endif

                            <div class="blinkline10"></div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">Do you own
                                    a property?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3 ">
                                                <input type="radio" name="is_property_own" value="1"
                                                    @if ($data->property_type != 0) checked @endif> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="is_property_own" value="0"
                                                    @if ($data->property_type == 0) checked @endif> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="propertyRequired" @if ($data->property_type == 0) style="display: none;" @endif>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Property
                                        Type</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img
                                                    src="{{ URL::asset('images/propertyuse.png') }}"
                                                    alt="property use"></span>
                                            <select id="property_use"
                                                @if ($data->property_type != 0) name="property_use" required @endif
                                                class="form-control myselectclass">
                                                <option value="">Select Property Type</option>
                                                @foreach (Config('constants.invPropertyType') as $index => $value)
                                                    <option value="{{ $index }}"
                                                        @if ($data->property_type == $index) selected @endif>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Property
                                        Address Details</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon height100"><img
                                                    src="{{ URL::asset('images/addreess.png') }}" alt="address"></span>
                                            <textarea class="form-control height100" id="propAddress" placeholder="please enter your property address"
                                                minlength="6" @if ($data->property_type != 0) name="prop_address" required @endif>{{ $data->prop_address }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group multipleinputsetheight50">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Floor Area
                                        Requirements</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row row-no-margin">
                                            <div class="col-xs-12 col-sm-6 row-no-padding width184 FlrAreaMin">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><img
                                                            src="https://www.franchiseindia.com/images/calendar.png"
                                                            alt="calender"></span>
                                                    <input type="text" id="prop_area_min"
                                                        @if ($data->property_type != 0) name="min_area" required @endif
                                                        pattern="[0-9]{2,5}" minlength="2" maxlength="5"
                                                        class="form-control" placeholder="Min area"
                                                        value="{{ $data->area_req_min }}">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaMax">
                                                <input type="text" id="prop_area_max"
                                                    @if ($data->property_type != 0) name="max_area" required @endif
                                                    pattern="[0-9]{3,6}" minlength="3" maxlength="6" class="form-control"
                                                    placeholder="Max area" value="{{ $data->area_req_max }}">
                                            </div>
                                            <div class="col-xs-12 col-sm-3 row-no-padding wwidth148 FlrAreaSqFt">
                                                <select id="area_type"
                                                    @if ($data->property_type != 0) name="area_type" @endif
                                                    class="form-control myselectclass">
                                                    @foreach (Config('constants.areaType') as $index => $value)
                                                        <option value="{{ $index }}"
                                                            @if ($data->area_type == $index) selected @endif>
                                                            {{ "$value" }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <input type="submit" class="btn btn-default nextBtn" id="save1" value="Update" />
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        $('input[type=radio][name=is_property_own]').change(function() {
            if (this.value == '1') {
                $("#propertyRequired").show();
                $("#property_use").attr('name', 'property_use');
                $("#property_use").attr('required', true);

                $("#propAddress").attr('name', 'prop_address');
                $("#propAddress").attr('required', true);


                $("#prop_area_min").attr('name', 'min_area');
                $("#prop_area_min").attr('required', true);

                $("#prop_area_max").attr('name', 'max_area');
                $("#prop_area_max").attr('required', true);
            } else {
                $("#propertyRequired").hide();
                $("#property_use").removeAttr('name');
                $("#property_use").removeAttr('required');

                $("#propAddress").removeAttr('name');
                $("#propAddress").removeAttr('required');

                $("#prop_area_min").removeAttr('name');
                $("#prop_area_min").removeAttr('required');

                $("#prop_area_max").removeAttr('name');
                $("#prop_area_max").removeAttr('required');
            }
        });
    </script>
@endsection
