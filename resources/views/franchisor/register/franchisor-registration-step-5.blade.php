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
                <form class="form-horizontal" id="fran-form" name="form_franchisor" action="{{ url('franchisor/registration/plan')}}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="franchisorId" value="{{$franchisorId}}">

                    <!-- step 5 start here -->
                    <div class="setup-content" id="step-5">
                        @if( $regType == 1 )
                            <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg TraDtl">
                                <div class="sidehead">Training Details</div>
                                <div class="blinkline10"></div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">Do you currently have detailed operating manuals for franchises?</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                <label class="col-xs-4 col-sm-3 col-md-3">
                                                    <input type="radio" name="is_detailed_manuals" value="1" {{ $franData->is_detailed_manuals == 1 ? "checked" : ""}} > Yes
                                                </label>
                                                <label class="col-xs-4 col-sm-3 col-md-3">
                                                    <input type="radio" name="is_detailed_manuals" value="0" {{ $franData->is_detailed_manuals != 1 ? "checked" : ""}}> No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Where is the franchisee training done?</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img alt="training" src="{{ url('images/train-session.png')}}"></span>
                                            <input type="text" name="franchise_training_loc" class="form-control" id="" placeholder="Enter your Req" value="{{$franData->franchise_training_loc}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="blinkline10"></div>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">Is field assistance available for franchises?</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="is_field_assistance" value="1" {{ $franData->is_field_assistance == 1 ? "checked" : "" }}> Yes</label>
                                                <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="is_field_assistance" value="0" {{ $franData->is_field_assistance != 1 ? "checked" : "" }} > No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">Will the head office be providing assistance to the franchisee?</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                <label class="col-xs-4 col-sm-3 col-md-3 "><input type="radio" name="ho_assistance" value="1" {{ $franData->ho_assistance == 1 ? "checked" : "" }} > Yes</label>
                                                <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="ho_assistance" value="0" {{ $franData->ho_assistance != 1 ? "checked" : "" }} > No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">What IT systems do you presently have that will be included in the franchise?</label>
                                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                                <label class="col-xs-4 col-sm-3 col-md-3">
                                                    <input type="radio" name="is_it_support" value="1" {{ $franData->is_it_support == 1 ? "checked" : "" }} > Yes
                                                </label>
                                                <label class="col-xs-4 col-sm-3 col-md-3">
                                                    <input type="radio" name="is_it_support" value="0" {{ $franData->is_it_support != 1 ? "checked" : "" }} > No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        @endif
                        <!--Agreements Details Start -->
                        <div class="col-sm-12 pad30 bgbase  {{ $regType == 1 ? "bordertop marginminust40" : "" }} showbg AgrDtl">
                            <div class="sidehead">Agreements Details</div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">Do you have a standard {{ $regType == 1 ? "franchise" : "channel partner" }} agreement?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-4 col-sm-3  col-md-3"><input type="radio" name="std_fran_aggreement" value="1" {{ $franData->std_fran_aggreement == 1 ? "checked" : "" }} > Yes</label>
                                            <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="std_fran_aggreement" value="0" {{ $franData->std_fran_aggreement != 1 ? "checked" : "" }} > No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12  col-sm-4 col-md-4 com4mod control-label">Duration of the Contract</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <label class="col-xs-4 col-sm-3 col-md-3 spcasepad">
                                            <input type="radio" name="franchise_term_duration" value="Life" {{ $franData->franchise_term_duration == "Life" ? "checked" : ""}}> Lifetime
                                        </label>
                                        <label class="col-xs-1 col-sm-1 col-md-1 spcasepad">
                                            <input type="radio" name="franchise_term_duration" value="No of years" {{ $franData->franchise_term_duration != "Life" ? "checked" : ""}}>
                                        </label>
                                        <div class="col-xs-3 col-sm-4 col-md-4 row-no-padding">
                                            <div class="input-group">
                                                <span class="input-group-addon"><img alt="calender" src="{{ url('images/calendar.png')}}"></span>
                                                <select name="franchise_term_year" class="form-control myselectclass2" id="term_year_franchise" title="Term Years">
                                                    @for($i=1; $i <= 15; $i++)
                                                        <option value="{{ $i }}" {{ $franData->franchise_term_duration == $i ? "selected" : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <label class="col-xs-3 col-sm-2 col-md-2 spcasepad"> Years</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group paddingt20">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">Is the term renewable?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-4 col-sm-3 col-sm-3 col-md-3"><input type="radio" name="term_renewable" value="1" {{ $franData->term_renewable == 1 ? "checked" : ""}}> Yes </label>
                                            <label class="col-xs-4 col-sm-3 col-sm-3 col-md-3"><input type="radio" name="term_renewable" value="0" {{ $franData->term_renewable != 1 ? "checked" : ""}}> No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
@endsection
