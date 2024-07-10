@extends('layout.master')
@section('pd')
    class="selected"
@endsection
@section('content')
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="container myaccount">
        <div class="row row-no-margin">

            <!-- MY ACCOUNT  LEFT sTART -->
            @include('includes.myfranchiseleft')
            <!-- MY ACCOUNT  LEFT END -->

            <style type="text/css">
                .bdr-tp-bt-col label.error {
                    display: none !important;
                }
            </style>

            <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright ProDtl">
                <h1 class="myhead marleft">Professional Details</h1>
                <div class="bor-radius backwhite marleft">
                    <form class="form-horizontal" id="fran-form" name="form_franchisor" action="updateprofessionaldetails"
                        method="POST" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-xs-12 pad30 showbg">
                            @if ($errors->any())
                                <h4>{{ $errors->first() }}</h4>
                            @endif
                            @if (session()->has('Success'))
                                <div class="alert alert-info">{{ session()->get('Success') }}</div>
                            @endif
                            @if (session()->has('errorMessage'))
                                <div class="alert alert-danger">{{ session()->get('errorMessage') }}</div>
                            @endif

                            <!-- International Start here -->
                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4  com4mod control-label padcheck">Are you
                                        looking for International Expension?</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row checkmargin">
                                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                <label class="col-xs-6 col-sm-3 col-md-3">
                                                    @php
                                                        $internationalFranchise = '';
                                                        $internationalFranchiseNo = '';

                                                        if ($franData->is_looking_intl_franchise == 1) {
                                                            $internationalFranchise = 'checked';
                                                        }

                                                        if ($franData->is_looking_intl_franchise != 1) {
                                                            $internationalFranchiseNo = 'checked';
                                                        }
                                                    @endphp
                                                    <input type="radio" name="is_looking_intl_franchise" value="1"
                                                        {{ $internationalFranchise }}> Yes
                                                </label>
                                                <label class="col-xs-6 col-sm-3 col-md-3">
                                                    <input type="radio" name="is_looking_intl_franchise" value="0"
                                                        {{ $internationalFranchiseNo }}>No
                                                </label>
                                                <label class="col-xs-6 col-sm-3 col-md-5" style="color:red; display:none;"
                                                    id="franchiseError">Please select atleast one country</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start International Franchisee -->

                            @php
                                $internationalFranchiseDisplay = '';
                                $internationalCountries = Config('location.countryName');
                                $oneDimensionalCountryArray = array_map('current', $country->toArray());

                                if ($franData->is_looking_intl_franchise == 1) {
                                    $internationalFranchiseDisplay = 'display:block';
                                }
                            @endphp
                            <div class="row hidden-area internationalFranchiseeInputs bdr-tp-bt-rmgroup countries"
                                id="international" style="{{ $internationalFranchiseDisplay }}">
                                <ul class="col-xs-12 col-sm-12 row-no-padding inter minheigh">
                                    @foreach ($internationalCountries as $value)
                                        <li class="col-xs-6 col-sm-4 col-md-4">
                                            @if (in_array($value, $oneDimensionalCountryArray))
                                                <input value="{{ $value }}" name="international_franchise[]" checked
                                                    class="international_countries" type="checkbox">
                                            @else
                                                <input value="{{ $value }}" name="international_franchise[]"
                                                    class="international_countries" type="checkbox">
                                            @endif
                                            <span>{{ $value }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End International Franchisee -->

                            @php
                                $locationState = '';
                                $locationCity = '';
                                $locationStateDisplay = '';
                                $locationcityDisplay = '';
                                $northStates = Config('location.northStates');
                                $centralstates = Config('location.centralStates');
                                $weststates = Config('location.westStates');
                                $eaststates = Config('location.eastStates');
                                $southstates = Config('location.southStates');
                                $UT = Config('location.unionTerriotoryStates');

                                if ($franData->expansion_loc_type == 2) {
                                    $locationcityDisplay = 'display:block';
                                }

                                if ($franData->expansion_loc_type == 1) {
                                    $locationStateDisplay = 'display:block';
                                }

                                if ($franData->expansion_loc_type == 1) {
                                    $locationState = 'checked';
                                }

                                if ($franData->expansion_loc_type == 2) {
                                    $locationCity = 'checked';
                                }
                            @endphp
                            <!-- State & city Start here -->
                            <div class="form-group hidden-area AcrossIndiaInput" style="display:block;">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck mandatory">What
                                    type of franchisees are you considering across India ?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin hello1">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="radio"
                                                    name="expansion_loc_type" required="required" id="statewise1"
                                                    value="stateWise" {{ $locationState }}> State Wise </label>
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="radio"
                                                    name="expansion_loc_type" required="required" id="citywise1"
                                                    value="cityWise" {{ $locationCity }}>City Wise</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--State section Start-->
                            <div class="row hidden-area stateWiseInput bdr-tp-bt-rmgroup" id="dead"
                                style="{{ $locationStateDisplay }}">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divNorthState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>North
                                                    Region</strong></span></li>
                                        @foreach ($northStates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox"
                                                    @if (count($northStates) > 0 && in_array($value, $stateOnlyData)) checked @endif>
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divWestState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>West
                                                    Region</strong></span></li>
                                        @foreach ($weststates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox"
                                                    @if (count($weststates) > 0 && in_array($value, $stateOnlyData)) checked @endif>
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divEastState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>East
                                                    Region</strong></span></li>
                                        @foreach ($eaststates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox"
                                                    @if (count($eaststates) > 0 && in_array($value, $stateOnlyData)) checked @endif>
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divSouthState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>South
                                                    Region</strong></span></li>
                                        @foreach ($southstates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox"
                                                    @if (count($southstates) > 0 && in_array($value, $stateOnlyData)) checked @endif>
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divUnionTerritories" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>Territories
                                                    Region</strong></span></li>
                                        @foreach ($UT as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox"
                                                    @if (count($UT) > 0 && in_array($value, $stateOnlyData)) checked @endif>
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divCentralState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>Central
                                                    Region</strong></span></li>
                                        @foreach ($centralstates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox"
                                                    @if (count($centralstates) > 0 && in_array($value, $stateOnlyData)) checked @endif>
                                                <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!--State section End-->

                            <!--City section Start-->
                            <div class="row hidden-area cityWiseInput" style="{{ $locationcityDisplay }}">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        @foreach (Config('location.stateArr') as $stateId => $stateValue)
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab"
                                                    id="headingOne{{ $loop->index + 1 }}">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                            href="#collapseOne{{ $loop->index + 1 }}" aria-expanded="true"
                                                            aria-controls="collapseOne{{ $loop->index + 1 }}">
                                                            <input name="looking_expansion_city[]"
                                                                value="{{ $stateValue }}" type="checkbox"
                                                                @if (count($onlyCity) > 0 && in_array($stateValue, $stateOnlyData)) checked @endif>
                                                            <i class="more-less fa fa-plus"></i>{{ $stateValue }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne{{ $loop->index + 1 }}"
                                                    class="panel-collapse collapse @if (count($onlyCity) > 0 && in_array($stateValue, $stateOnlyData)) in @endif"
                                                    role="tabpanel" aria-labelledby="headingOne{{ $loop->index + 1 }}">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <ul class="col-xs-12 col-sm-12">
                                                                @foreach (Config('location.cityArr.' . $stateId) as $cityId => $cityVal)
                                                                    <li class="col-xs-6 col-sm-4 col-md-4">
                                                                        <input name="looking_expansion_city[]"
                                                                            value="{{ $cityVal }}" type="checkbox"
                                                                            @if (count($onlyCity) > 0 && in_array($cityVal, $onlyCity)) checked @endif>
                                                                        <span>{{ $cityVal }}</span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <div style="text-align: center;">
                                <button class="btn btn-default" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script language="javascript">
        $(document).ready(function() {
            $.validator.setDefaults({
                ignore: '.international_countries .lookingFor'
            });

            $("#fran-form").validate({
                ignore: "input[type='checkbox']:hidden, input[type='text']:hidden",
                rules: {
                    "international_franchise[]": {
                        required: true
                    },
                    "state[]": {
                        required: true
                    },
                    "looking_expansion_city[]": {
                        required: true
                    },
                    expansion_loc_type: {
                        required: true
                    },
                    looking_for_expansion: {
                        required: true
                    }
                },
                messages: {
                    "international_franchise[]": "Please select at least one country",
                    "state[]": "Please select at least one state",
                    "looking_expansion_city[]": "Please select at least one city",
                    looking_for_expansion: "Please select expansion",
                    expansion_loc_type: "Please select citywise or statewise"
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "international_franchise[]")
                        error.insertBefore(".minheigh");
                    else if (element.attr("name") === "state[]")
                        error.appendTo("#dead");
                    else if (element.attr("name") === "looking_expansion_city[]")
                        error.prependTo(".panel-group");
                    else
                        error.appendTo(element.parent().parent());
                }
            });
        });

        $('input:radio[name="expansion_loc_type"]').change(function() {
            if (this.checked && "cityWise" === this.value) {
                $(".stateWiseInput").hide();
                $(".cityWiseInput").show();
            } else {
                $(".stateWiseInput").show();
                $(".cityWiseInput").hide();
            }
        });

        $('.checkAll').click(function() {
            if ($(this).is(':checked')) {
                $(this).parent().siblings().find('input:checkbox').prop('checked', true);
            } else {
                $(this).parent().siblings().find('input:checkbox').prop('checked', false);
            }
        });
    </script>
@endsection
