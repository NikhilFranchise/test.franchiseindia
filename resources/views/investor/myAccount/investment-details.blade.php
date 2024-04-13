@extends('layout.master')
@section('id')
    class="selected"
@endsection
@section('content')
    <div class="container myaccount">
        <div class="row row-no-margin">
            <!-- MY ACCOUNT  LEFT sTART -->
        @include('includes.myinvestorleft')
        <!-- MY ACCOUNT  LEFT END -->
            <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                <h1 class="myhead marleft">Investment Details</h1>
                <div class="bor-radius backwhite marleft">
                    <form class="form-horizontal formInv" name="form_investor" id="investorRegForm" action="updateinvestmentdetails" method="POST"  role="form" >
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
                            <div class="form-group">
                                <label class="col-xs-12 col-md-4 col-sm-4 com4mod control-label mandatory">Industry Type ( Interested In )<br><span class="note">Multiple Options Available - MAX 3<br>(Press Control key and select)</span> </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon height100"><img src="{{URL::asset('images/industrytype.png')}}" alt="industry type"></span>
                                        <select name="industry_type[]" id="industry_type" required="required" class="form-control height100" multiple="multiple">
                                            @foreach(Config::get('constants.CategoryArr') as $index => $value)
                                                <option value="{{ $index }}" @if(in_array($index, $industryDataInterestedIn)) selected @endif> {{ $value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory" for="income_range">Income Range</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{url('images/range-rate.png')}}" alt="range rate"></span>
                                        <select class="form-control myselectclass" id="income_range" required="required" name="income_range">
                                            <option value="">select income range</option>
                                            @foreach(Config('constants.investRangeInWords') as $index => $value)
                                                <option value="{{ $index }}"  @if($index == $data->income_range) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Investment Range </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/range-rate.png')}}" alt="investment"></span>
                                        <select class="form-control" id="investment_range" required="required" name="investment_range">
                                            @foreach(Config::get('constants.investmentRangeFetch') as $index => $value)
                                                <option value="{{ $index }}" @if($index == $data->investment_min) selected @endif> {{ $value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Looking For</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin specify">
                                        <div class="col-sm-12 row-no-padding">
                                            @foreach(Config('constants.invLookingFor') as $index => $value)
                                                <label class="col-xs-12 col-sm-6 col-md-4 ">
                                                    <input type="checkbox" name="looking_for[]" value="{{ $index }}" @if(in_array($index, explode(',', $data->looking_for))) checked @endif> {{ $value }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Looking for Business In ( State )</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/state.png')}}" alt="state"></span>
                                        <select class="form-control myselectclass" name="business_state_looking" required="required">
                                            <option value="">select State</option>
                                            @foreach(Config('location.stateArr') as $index => $value)
                                                <option value="{{ $index }}" @if($index == $data->state_looking_business) selected @endif >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Looking for Business In ( City )</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/city.png')}}" alt="city"></span>
                                        <input type="text" name="business_city_looking" class="form-control" minlength="3" placeholder="City" value="{{ $data->city_looking_business }}" >
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">
                                    How soon would you like to invest?
                                </label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/date.png')}}" alt="date"></span>
                                        <select class="form-control" required="required" name="investment_date">
                                            <option value="">select time frame</option>
                                            @foreach(Config::get('constants.InvestTimeFrame') as $index => $value)
                                                <option value="{{ $index }}" @if($index == $data->investment_time) selected @endif> {{ $value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="blinkline10"></div>
                            <div class="form-group">
                                <label class="col-xs-12 col-md-4 col-sm-4 com4mod control-label padcheck">Interested in Loans
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            @php
                                                $checked  = "";
                                                if ( $data->loan_required == 1 )
                                                    $checked = "checked";
                                                $checked1  = "";
                                                if ( $data->loan_required != 1 )
                                                    $checked1 = "checked";
                                            @endphp
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="loan_interest" {{$checked}} value="1"> Yes
                                            </label>
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="loan_interest" {{$checked1}} value="0">No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="blinkline10"></div>
                            <div class="form-group">
                                <label class="col-xs-12 col-md-4 col-sm-4 com4mod control-label padcheck mandatory">
                                    Interested in Master Franchise
                                </label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row checkmargin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">

                                            @php
                                                $checked2  = "";
                                                if ( $data->master_franchise_invest == 1 )
                                                    $checked2 = "checked";
                                                $checked3  = "";
                                                if ( $data->master_franchise_invest != 1 )
                                                    $checked3 = "checked";
                                            @endphp

                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="interest_master_franchise" {{$checked2}} value="1"> Yes
                                            </label>
                                            <label class="col-xs-4 col-sm-3 col-md-3">
                                                <input type="radio" name="interest_master_franchise" {{$checked3}} value="0"> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            <center>
                                <input type="submit" class="btn btn-default nextBtn" id="save1" value="Update"/>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        var verified = [];
        document.querySelector('#industry_type').onchange = function(e) {
            if (this.querySelectorAll('option:checked').length <= 3) {
                verified = Array.apply(null, this.querySelectorAll('option:checked'));
            } else {
                Array.apply(null, this.querySelectorAll('option')).forEach(function(e) {
                    e.selected = verified.indexOf(e) > -1;
                });
            }
        }
    </script>
@endsection
