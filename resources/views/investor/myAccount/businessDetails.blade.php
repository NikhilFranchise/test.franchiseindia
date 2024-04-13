@extends('layout.master')
@section('bd')
	class="selected"
@endsection
@section('content')
	<div class="container myaccount">
		<div class="row row-no-margin">
			<!-- MY ACCOUNT  LEFT sTART -->
		@include('includes.myinvestorleft')
		<!-- MY ACCOUNT  LEFT END -->
			<div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
				<h1 class="myhead marleft">Professional Details</h1>
				<div class="bor-radius backwhite marleft">
					<form class="form-horizontal formInv" name="form_investor" id="investorRegForm" action="updatebusinessdetails" method="POST" role="form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="col-xs-12 pad30 showbg">
							@if($errors->any())
								<h4>{{$errors->first()}}</h4>
							@endif
							@if (Session::has('Success'))
								<div class="alert alert-info">{{ Session::get('Success') }}</div>
							@endif
							@if (Session::has('errorMessage'))
								<div class="alert alert-info">{{ Session::get('errorMessage') }}</div>
							@endif
							<div class="blinkline10"></div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Education Qualification</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/education.png')}}" alt="education"></span>
                                        <select id="investor-edu_qual" class="form-control" name="qualification" required>
                                            <option value="">select Education Qualification</option>
                                            @foreach(Config('constants.eduQualification') as $index => $value)
                                                <option value="{{ $index }}" @if($data->edu_qualification == $index) selected @endif >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox mandatory">Franchise Experience?</label>
                                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                                            <label class="col-xs-6 col-sm-6 col-md-3 ">
                                                <input type="radio" name="experience_in_franchise" value="1" @if($data->franchise_experience == 1) checked @endif> Yes
                                            </label>
                                            <label class="col-xs-6 col-sm-6 col-md-3">
                                                <input type="radio" name="experience_in_franchise" value="0" @if($data->franchise_experience != 1) checked @endif> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="isFranchiseExp" @if($data->franchise_experience != 1) style="display: none;" @endif >
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Brand Name ( Franchising )</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{URL::asset('images/company.png')}}" alt="company name"></span>
                                            <input type="text" id="franchiseExperienceBrand" minlength="3" class="form-control"  placeholder="Enter Brand Name" @if($data->franchise_experience == 1) name="franchise_brand_name" required @endif value="{{ $data->franchising_brand_name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Occupation</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src="{{URL::asset('images/occupation.png')}}" alt="occupation"></span>
                                        <select id="investor-occupation" class="form-control" name="occupation" required="required">
                                            <option value="">select Occupation</option>
                                            @foreach(Config('constants.occupation') as $index => $value)
                                                <option value="{{ $index }}" @if($data->occupation == $index) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="occupationService"  @if($data->occupation != 2)  style="display: none;" @endif>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Service</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{URL::asset('images/occupation.png')}}" alt="occupation"></span>
                                            <select id="investorService" class="form-control" @if($data->occupation == 2)  name="company_service" required @endif>
                                                <option value="">select Service</option>
                                                <option value="1" @if($data->service_type == 1)  selected @endif >MNC</option>
                                                <option value="2" @if($data->service_type == 2)  selected @endif>Pvt.</option>
                                                <option value="3" @if($data->service_type == 3)  selected @endif>Govt.</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Company name</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{URL::asset('images/occupation.png')}}" alt="company name"></span>
                                            <input type="text" id="investorServiceCompany" minlength="3" class="form-control"  placeholder="Enter Company Name" @if($data->occupation == 2)  name="company_service_name" required @endif value="{{ $data->service_company_name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="businessOccupation"  @if($data->occupation != 3)  style="display: none;" @endif>
                                <div class="form-group">
                                    <label class="col-xs-12 col-md-4 col-sm-4 com4mod control-label"><span class="mandatory">Industry Type (Business In)</span><br><span class="note">Multiple Options Available - MAX 3<br>(Press Control key and select)</span></label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon height100"><img src="{{URL::asset('images/industrytype.png')}}" alt="industry type"></span>
                                            <select id="industry_type_business" class="form-control height100" multiple="multiple"   @if($data->occupation == 3) name="industry_type_business[]" required @endif>
                                                @foreach(Config('constants.CategoryArr') as $index => $value)
                                                    <option value="{{ $index }}" @if(in_array($index, $industryData)) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Company name</label>
                                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                        <div class="input-group">
                                            <span class="input-group-addon"><img src="{{URL::asset('images/occupation.png')}}" alt="company name"></span>
                                            <input type="text" id="investorBusinessCompany" minlength="3" class="form-control"  placeholder="Enter Company Name" @if($data->occupation == 3) name="company_business_name" required @endif value="{{ $data->business_company_name }}">
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

    <script>
        $('input[type=radio][name=experience_in_franchise]').change(function() {
            if (this.value == '1') {
                $("#isFranchiseExp").show();
                $("#franchiseExperienceBrand").attr('name', 'franchise_brand_name');
                $("#franchiseExperienceBrand").attr('required', true);
            } else {
                $("#isFranchiseExp").hide();
                $("#franchiseExperienceBrand").removeAttr('name');
                $("#franchiseExperienceBrand").removeAttr('required');
            }
        });

        $("#investor-occupation").change(function() {
            var id=$(this).val();
            var dataString = 'id='+ id;

            if(id == 2) {
                $("#occupationService").show();
                $("#investorService").attr('name', 'company_service');
                $("#investorService").attr('required', true);
                $("#investorServiceCompany").attr('name', 'company_service_name');
                $("#investorServiceCompany").attr('required', true);
            } else {
                $("#occupationService").hide();
                $("#investorService").removeAttr('name');
                $("#investorService").removeAttr('required');
                $("#investorServiceCompany").removeAttr('name');
                $("#investorServiceCompany").removeAttr('required');
            }

            if( id == 3 ) {
                $("#businessOccupation").show();
                $("#industry_type_business").attr('name', 'industry_type_business[]');
                $("#industry_type_business").attr('required', true);
                $("#investorBusinessCompany").attr('name', 'company_business_name');
                $("#investorBusinessCompany").attr('required', true);
            } else {
                $("#businessOccupation").hide();
                $("#industry_type_business").removeAttr('name');
                $("#industry_type_business").removeAttr('required');
                $("#investorBusinessCompany").removeAttr('name');
                $("#investorBusinessCompany").removeAttr('required');
            }

            return false;
        });
    </script>
@endsection
