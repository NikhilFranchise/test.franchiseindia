@extends('layout.master')
@section('seoTitle', 'Franchisor Registration - franchiseindia.com')
@section('seoDesc', 'Are you a franchisor with a unique business idea? Register with Franchise India and get noticed by multiple investors and expand your client base.')
@section('content')
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
                        <a href="{{ url('franchisor/registration/step/2?franchisorId='.$franchisorId) }}"><p class="activeve hidden-xs" id="head1"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 2 || request()->segment(4) < 2) ?"hidden" : "" }}"></i> Business</p></a>
                        <a href="{{ url('franchisor/registration/step/2?franchisorId='.$franchisorId) }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 2 || request()->segment(4) < 2) ?"hidden" : "" }}"></i> <i class="fa fa-address-book fa-lg" aria-hidden="true"></i></span></a>
                        <a href="{{ url('franchisor/registration/step/2?franchisorId='.$franchisorId) }}" type="button" class="btn btn-default btn-circle overfla activeve2" id="ab1"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ $franData->step_completed > 1 ? url('franchisor/registration/step/3?franchisorId='.$franchisorId) : "#" }}"><p class="{{ $franData->step_completed > 1 ?"activeve" : ""}} hidden-xs" id="head2"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 3 || request()->segment(4) < 3) ?"hidden" : "" }}"></i> Professional <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 3 || request()->segment(4) > 3) ?"hidden" : "" }}"></i></p></a>
                        <a href="{{ $franData->step_completed > 1 ? url('franchisor/registration/step/3?franchisorId='.$franchisorId) : "#" }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 3 || request()->segment(4) < 3) ?"hidden" : "" }}"></i> <i class="fa fa-address-card fa-lg" aria-hidden="true"></i> <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 3 || request()->segment(4) > 3) ?"hidden" : "" }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 1 ? url('franchisor/registration/step/3?franchisorId='.$franchisorId) : "#" }}" type="button" class="btn btn-default btn-circle overfla {{ $franData->step_completed > 1 ?"activeve2" : ""}}" {{ $franData->step_completed < 2 ? "disabled" : ""}} id="ab2"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ $franData->step_completed > 2 ? url('franchisor/registration/step/4?franchisorId='.$franchisorId) : "#" }}"><p class="{{ $franData->step_completed > 2 ?"activeve" : ""}} hidden-xs" id="head3"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 4 || request()->segment(4) < 4) ?"hidden" : "" }}"></i> Property <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 4 || request()->segment(4) > 4) ?"hidden" : "" }}"></i></p></a>
                        <a href="{{ $franData->step_completed > 2 ? url('franchisor/registration/step/4?franchisorId='.$franchisorId) : "#" }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 4 || request()->segment(4) < 4) ?"hidden" : "" }}"></i> <i class="fa fa-building fa-lg" aria-hidden="true"></i> <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 4 || request()->segment(4) > 4) ?"hidden" : "" }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 2 ? url('franchisor/registration/step/4?franchisorId='.$franchisorId) : "#" }}" type="button" class="btn btn-default btn-circle overfla {{ $franData->step_completed > 2 ?"activeve2" : ""}}" {{ $franData->step_completed < 3 ? "disabled" : ""}} id="ab3"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ $franData->step_completed > 3 ? url('franchisor/registration/step/5?franchisorId='.$franchisorId) : "#" }}"><p class="{{ $franData->step_completed > 3 ?"activeve" : ""}} hidden-xs" id="head4"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 5 || request()->segment(4) < 5) ?"hidden" : "" }}"></i> Agreements <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 5 || request()->segment(4) > 5) ?"hidden" : "" }}"></i></p></a>
                        <a href="{{ $franData->step_completed > 3 ? url('franchisor/registration/step/5?franchisorId='.$franchisorId) : "#" }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 5 || request()->segment(4) < 5) ?"hidden" : "" }}"></i> <i class="fa fa-pencil-square fa-lg" aria-hidden="true" title="Training/Agreements"></i> <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 5 || request()->segment(4) > 5) ?"hidden" : "" }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 3 ? url('franchisor/registration/step/5?franchisorId='.$franchisorId) : "#" }}" type="button" class="btn btn-default btn-circle overfla {{ $franData->step_completed > 3 ?"activeve2" : ""}}" {{ $franData->step_completed < 4 ? "disabled" : ""}} id="ab4"></a>
                    </div>
                    <div class="col-xs-2 stepwizard-step">
                        <a href="{{ $franData->step_completed > 4 ? url('franchisor/registration/step/6?franchisorId='.$franchisorId) : "#" }}"><p class="{{ $franData->step_completed > 4 ?"activeve" : ""}} hidden-xs" id="head5"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 6 || request()->segment(4) < 6) ?"hidden" : "" }}"></i> Payment <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 6 || request()->segment(4) > 6) ?"hidden" : "" }}"></i></p></a>
                        <a href="{{ $franData->step_completed > 4 ? url('franchisor/registration/step/6?franchisorId='.$franchisorId) : "#" }}"><span class="disnone"><i class="fa fa-angle-double-left fa-lg {{ (request()->segment(4) == 6 || request()->segment(4) < 6) ?"hidden" : "" }}"></i> <i class="fa fa-credit-card fa-lg" aria-hidden="true" title="Payment"></i> <i class="fa fa-angle-double-right fa-lg {{ (request()->segment(4) == 6 || request()->segment(4) > 6) ?"hidden" : "" }}"></i></span></a>
                        <a href="{{ $franData->step_completed > 4 ? url('franchisor/registration/step/6?franchisorId='.$franchisorId) : "#" }}" type="button" class="btn btn-default btn-circle overfla {{ $franData->step_completed > 4 ?"activeve3" : ""}}" {{ $franData->step_completed < 5 ? "disabled" : ""}} id="ab5"></a>
                    </div>
                </div>
            </div>
            <div class="" style="text-align:center;margin-top: 45px;color: #000;font-size: 17px;font-weight: 400;">Chat on <a href="https://api.whatsapp.com/send?phone=919312650021&amp;text=Hello,%20I%20am%20interested%20in%20knowing%20more%20about ?%20https://www.franchiseindia.com/" target="_blank"><img src="https://www.franchiseindia.com/newhomepage/assets/img/whatappsicon.svg" class="sts"></a></div>
<!--  -->
        </div>
    </div>
    @php
        $internationalFranchiseDisplay = "";
        $internationalCountries = Config('location.countryName');
        $oneDimensionalCountryArray = array_map('current', $country->toArray());
        if($franData->is_looking_intl_franchise == 1)
        $internationalFranchiseDisplay = "display:block";
        $locationState = "";
        $locationCity = "";
        $locationStateDisplay = "";
        $locationcityDisplay = "";
        $northStates = Config('location.northStates');
        $centralstates = Config('location.centralStates');
        $weststates = Config('location.westStates');
        $eaststates = Config('location.eastStates');
        $southstates = Config('location.southStates');
        $UT = Config('location.unionTerriotoryStates');
        if($franData->expansion_loc_type == 2)
        $locationcityDisplay = "display:block";
        if($franData->expansion_loc_type == 1)
        $locationStateDisplay = "display:block";
        if($franData->expansion_loc_type==1)
        $locationState = "checked";
        if($franData->expansion_loc_type==2)
        $locationCity = "checked";
    @endphp
    <div class="container formsection">
        <div class="row margt0">
            <div class="col-xs-12 col-sm-9 bor-radius backwhite targleft row-no-padding">
                <form class="form-horizontal" id="fran-form" name="form_franchisor" action="{{ url('franchisor/registration/step/4')}}" method="POST" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="franchisorId" value="{{$franchisorId}}">
                    <div class="setup-content ProDtl" id="step-3">
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            <div class="sidehead">Professional Details</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">Are you looking for International Expension?</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row checkmargin">
                                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                <label class="col-xs-6 col-sm-3 col-md-3">
                                                    @php
                                                        $internationalFranchise = "";
                                                        $internationalFranchiseNo = "";
                                                        if($franData->is_looking_intl_franchise==1)
                                                        $internationalFranchise = "checked";
                                                        if($franData->is_looking_intl_franchise!=1)
                                                        $internationalFranchiseNo = "checked";
                                                    @endphp
                                                    <input type="radio" name="is_looking_intl_franchise" value="1" {{ $internationalFranchise }}> Yes
                                                </label>
                                                <label class="col-xs-6 col-sm-3 col-md-3">
                                                    <input type="radio" name="is_looking_intl_franchise" value="0" {{ $internationalFranchiseNo }}>No
                                                </label>
                                                <label class="col-xs-6 col-sm-3 col-md-5" style="color:red;display:none" id="franchiseError">
                                                    Please select atleast one country
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row hidden-area internationalFranchiseeInputs bdr-tp-bt-rmgroup countries" id="international" style="{{$internationalFranchiseDisplay}}">
                                <ul class="col-xs-12 col-sm-12 row-no-padding inter minheigh">
                                    @foreach ($internationalCountries as $value)
                                        <li class="col-xs-6 col-sm-4 col-md-4">
                                            @if(in_array($value, $oneDimensionalCountryArray))
                                                <input value="{{ $value }}" name="international_franchise[]" checked class="international_countries" type="checkbox">
                                            @else
                                                <input value="{{ $value }}" name="international_franchise[]" class="international_countries" type="checkbox">
                                            @endif
                                            <span>{{ $value }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form-group hidden-area AcrossIndiaInput" style="display:block">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck mandatory">What type of expansion are you considering across India ?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin hello1">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="radio" name="expansion_loc_type" required="required" id="statewise1" value="stateWise" {{ $locationState }}> State Wise </label>
                                            <label class="col-xs-6 col-sm-6 col-md-6"><input type="radio" name="expansion_loc_type" required="required" id="citywise1" value="cityWise" {{ $locationCity }}>City Wise</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row hidden-area stateWiseInput bdr-tp-bt-rmgroup" id="dead" style="{{$locationStateDisplay}}">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divNorthState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>North Region</strong></span></li>
                                        @foreach($northStates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox" @if( count($northStates)> 0 && in_array( $value, $stateOnlyData)) checked @endif > <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divWestState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>West Region</strong></span></li>
                                        @foreach($weststates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox" @if( count($weststates)> 0 && in_array( $value, $stateOnlyData)) checked @endif > <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divEastState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>East Region</strong></span></li>
                                        @foreach($eaststates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox" @if( count($eaststates)> 0 && in_array( $value, $stateOnlyData)) checked @endif > <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divSouthState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>South Region</strong></span></li>
                                        @foreach($southstates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox" @if( count($southstates)> 0 && in_array( $value, $stateOnlyData)) checked @endif > <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divUnionTerritories" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>Territories Region</strong></span></li>
                                        @foreach($UT as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox" @if( count($UT)> 0 && in_array( $value, $stateOnlyData)) checked @endif > <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <ul id="divCentralState" class="natio">
                                        <li><input type="checkbox" class="checkAll"><span><strong>Central Region</strong></span></li>
                                        @foreach($centralstates as $index => $value)
                                            <li><input value='{{ $value }}' name="state[]" type="checkbox" @if( count($centralstates)> 0 && in_array( $value, $stateOnlyData)) checked @endif > <span>{{ $value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="row hidden-area cityWiseInput" style="{{$locationcityDisplay}}">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        @foreach(Config('location.stateArr') as $stateId => $stateValue)
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne{{$loop->index+1}}">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$loop->index+1}}" aria-expanded="true" aria-controls="collapseOne{{$loop->index+1}}">
                                                            <input name="looking_expansion_city[]" value="{{$stateValue}}" type="checkbox" @if( count($onlyCity)> 0 && in_array($stateValue, $stateOnlyData)) checked @endif>
                                                            <i class="more-less fa fa-plus"></i>{{$stateValue}}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne{{$loop->index+1}}" class="panel-collapse collapse @if( count($onlyCity) > 0 && in_array($stateValue, $stateOnlyData)) in @endif" role="tabpanel" aria-labelledby="headingOne{{$loop->index+1}}">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <ul class="col-xs-12 col-sm-12">
                                                                @foreach(Config('location.cityArr.'.$stateId) as $cityId => $cityVal)
                                                                    <li class="col-xs-6 col-sm-4 col-md-4">
                                                                        <input name="looking_expansion_city[]" value="{{ $cityVal  }}" type="checkbox" @if(count( $onlyCity )> 0 && in_array($cityVal, $onlyCity)) checked @endif>
                                                                        <span>{{$cityVal}}</span>
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
                        <div class="row colbg text-center">
                            <input type="submit" id="step1button" class="btn btn-default" value="next"/><br>
                        </div>
                    </div>
                </form>
            </div>
            @include('includes.franchisor-faq')
        </div>
    </div>
    <div class="heightspace"></div>
    <script language="javascript">
        $(document).ready(function () {
            $.validator.setDefaults({ignore: ".international_countries .lookingFor"});
            $("#fran-form").validate({
                ignore: "input[type='checkbox']:hidden, input[type='text']:hidden",
                rules: {
                    "international_franchise[]": {required: true},
                    "state[]": {required: true},
                    "looking_expansion_city[]": {required: true},
                    expansion_loc_type: {required: true},
                    looking_for_expansion: {required: true}
                },
                messages: {
                    "international_franchise[]": "Please select at least one country",
                    "state[]": "Please select at least one state",
                    "looking_expansion_city[]": "Please select at least one city",
                    looking_for_expansion: "Please select expansion",
                    expansion_loc_type: "please select citywise or statewise"
                },
                errorPlacement: function (a, b) {
                    if (b.attr("name") === "international_franchise[]") {
                        a.insertAfter(".minheigh")
                    } else {
                        if (b.attr("name") === "state[]") {
                            a.appendTo("#dead")
                        } else {
                            if (b.attr("name") === "looking_expansion_city[]") {
                                a.appendTo(".panel-group")
                            } else {
                                a.appendTo(b.parent().parent())
                            }
                        }
                    }
                }
            })
        });
        $('input:radio[name="expansion_loc_type"]').change(function () {
            if (this.checked && "cityWise" === this.value) {
                $(".stateWiseInput").hide();
                $(".cityWiseInput").show()
            } else {
                $(".stateWiseInput").show();
                $(".cityWiseInput").hide()
            }
        });
        $(".checkAll").click(function () {
            if ($(this).is(":checked")) {
                $(this).parent().siblings().find("input:checkbox").prop("checked", true)
            } else {
                $(this).parent().siblings().find("input:checkbox").prop("checked", false)
            }
        });
        </script>
@endsection