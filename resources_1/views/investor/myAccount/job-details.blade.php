@extends('layout.master')
@section('jd')
class="selected"
@endsection
@section('content')
<div class="container myaccount">
    <div class="row row-no-margin">
    <!-- MY ACCOUNT  LEFT sTART -->
@include('includes.myinvestorleft')
    <!-- MY ACCOUNT  LEFT END -->
    <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
            <h1 class="myhead marleft">Job Details</h1>
            <div class="bor-radius backwhite marleft">
            <form class="form-horizontal" class="form-horizontal formInv" name="form_investor" id="investorRegForm" action="updatejobdetails" method="POST"  role="form" >
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
                <div class="blinkline10"></div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 com4mod control-label padcheck">Job Experiences</label>
                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                    <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                        <div class="row checkmargin">
                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding"> 
                            @php
                                $isJobExperience     = "";
                                if ( $data->is_job_experience == 1 )
                                    $isJobExperience = "checked";
                                $isJobExperience1     = "";
                                if ( $data->is_job_experience != 1 )
                                    $isJobExperience1 = "checked";
                            @endphp                               
                                <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="jobDetailInvestor" value="1" {{$isJobExperience}} >Yes</label>                       
                                <label class="col-xs-4 col-sm-3 col-md-3"><input type="radio" name="jobDetailInvestor" value="0" {{$isJobExperience1}} >No</label>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $display = "";
                    if ( $data->is_job_experience == 1 )
                        $display = "display:block";
                @endphp 
                <div class="hidden-area jobDetailInput" style="{{$display}}">
                    <div class="blinkline10"></div>     
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">Industry type</label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{URL::asset('images/industrytype.png')}}" alt="industry type"></span>
                                @php
                                    $jobIndustryType     = "";
                                    if ( $data->is_job_experience == 1 )
                                        $jobIndustryType = "name=job_industry_type";
                                @endphp 
                                <select id="job_industry_type" class="form-control" {{$jobIndustryType}}>
                                    <option value="">Industry Type</option>
                                    @php 
                                        $industry=Config::get('constants.CategoryArr.'.$data->industry_job);
                                        if($industry!="")                                       
                                            echo "<option value=".$data->industry_job." selected>$industry</option>"; 
                                    @endphp                               
                                    @php 
                                        $values=Config::get('constants.CategoryArr');
                                        foreach($values as $index=>$value) {
                                            if($index==$data->industry_job)
                                            echo "";
                                            else{
                                            echo "<option value=".$index.">$value</option>"; 
                                            }
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">No of Years</label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                            <div class="input-group">
                            <span class="input-group-addon"><img src="{{URL::asset('images/calendar.png')}}" alt="years calender"></span>
                                @php
                                    $jobNumberOfYears     = "";
                                    if ( $data->is_job_experience == 1 )
                                        $jobNumberOfYears = "name=job_number_of_years";
                                @endphp 
                             <input type="text" pattern="[0-9]{1,2}" maxlength="2" class="form-control" id="job_number_of_years" placeholder="Enter No. of Years" value="{{$data->no_of_years_exp}}" {{$jobNumberOfYears}} />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label">Any Other Industry</label>
                        <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                        <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                            <div class="input-group">
                            <span class="input-group-addon"><img src="{{URL::asset('images/noofemployees.png')}}" alt="no. of employees"></span>
                                @php
                                    $anyOtherIndustry     = "";
                                    if ( $data->is_job_experience == 1 )
                                        $anyOtherIndustry = "name=any_other_industry";
                                @endphp 
                             <input type="text" class="form-control" id="any_other_industry" value="{{$data->other_industry}}" placeholder="Enter Any Other Industry"  {{$anyOtherIndustry}}>
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
@endsection
