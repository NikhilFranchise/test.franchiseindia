@extends('layout.master')
@section('ta')
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
            <div class="bor-radius backwhite marleft">
                <form class="form-horizontal" action="updatetrainingaggrementdetails" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if( $regType == 1 )
                <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                  @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                  @endif
                  @if (Session::has('Success'))
                     <div class="alert alert-info">{{ Session::get('Success') }}</div>
                  @endif
                   @if (Session::has('failed'))
                     <div class="alert alert-info">{{ Session::get('failed') }}</div>
                  @endif
                <div class="sidehead">Training Details</div>
                <div class="blinkline10"></div>
                <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">
                    Do you currently have detailed operating manuals for franchises?
                </label>
                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                       <div class="row">
                       @php
                            $isDetailedMannual   = "";
                            $isDetailedMannualNo = "";
                            if ( $franData->is_detailed_manuals == 1)
                                $isDetailedMannual   = "checked";
                            if ( $franData->is_detailed_manuals != 1 )
                                $isDetailedMannualNo = "checked";
                        @endphp
                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <label class="col-xs-4 col-sm-3 col-md-3">
                        <input type="radio" name="is_detailed_manuals" id="inlineCheckbox1" value="1" {{$isDetailedMannual}} > Yes
                        </label>                                      
                        <label class="col-xs-4 col-sm-3 col-md-3">
                        <input type="radio" name="is_detailed_manuals" id="inlineCheckbox3" value="0" {{$isDetailedMannualNo}}> No
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
                <span class="input-group-addon"><img alt="training" src="{{URL::asset('images/train-session.png')}}"></span>
                <input type="text" name="franchise_training_loc" class="form-control" id="" placeholder="Enter your Req" value="{{$franData->franchise_training_loc}}">
                </div>
                </div>
                </div>
                <div class="blinkline10"></div>
                 
                <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">Is field assistance available for franchises?
                </label>
                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                       <div class="row">
                       @php
                            $isFieldAssistant   = "";
                            $isFieldAssistantNo = "";
                            if ( $franData->is_field_assistance == 1)
                                $isFieldAssistant   = "checked";
                            if ( $franData->is_field_assistance != 1 )
                                $isFieldAssistantNo = "checked";
                        @endphp
                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <label class="col-xs-4 col-sm-3 col-md-3">
                        <input type="radio" name="is_field_assistance" id="inlineCheckbox1" value="1" {{$isFieldAssistant}}> Yes
                        </label>
                        <label class="col-xs-4 col-sm-3 col-md-3">
                        <input type="radio" name="is_field_assistance" id="inlineCheckbox3" value="0" {{$isFieldAssistantNo}} > No
                        </label>                         
                        </div>                
                     </div>
                </div>
                </div>
                
                <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">
                    Will the head office be providing assistance to the franchisee?
                </label>
                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                       <div class="row">
                       @php
                            $hoAssistant   = "";
                            $hoAssistantNo = "";
                            if ( $franData->ho_assistance == 1)
                                $hoAssistant   = "checked";
                            if ( $franData->ho_assistance != 1 )
                                $hoAssistantNo = "checked";
                        @endphp
                         <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <label class="col-xs-4 col-sm-3 col-md-3 ">
                            <input type="radio" name="ho_assistance" id="inlineCheckbox1" value="1" {{$hoAssistant}} > Yes
                        </label>                           
                        <label class="col-xs-4 col-sm-3 col-md-3">
                            <input type="radio" name="ho_assistance" id="inlineCheckbox3" value="0" {{$hoAssistantNo}} > No
                        </label>                         
                        </div>
                        
                     </div>
                </div>
                </div>
                
                <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label line2padcheckbox">
                    What IT systems do you presently have that will be included in the franchise?
                </label>
                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                    <div class="row">
                        @php
                            $itSupport   = "";
                            $itSupportNo = "";
                            if ( $franData->is_it_support == 1)
                                $itSupport   = "checked";
                            if ( $franData->is_it_support != 1 )
                                $itSupportNo = "checked";
                        @endphp 
                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <label class="col-xs-4 col-sm-3 col-md-3">
                        <input type="radio" name="is_it_support" id="inlineCheckbox1" value="1" {{$itSupport}} > Yes
                        </label>
                        <label class="col-xs-4 col-sm-3 col-md-3">
                        <input type="radio" name="is_it_support" id="inlineCheckbox3" value="0" {{$itSupportNo}} > No
                        </label>                         
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>
            @endif
            <div class="clearfix"></div>
            <!--Agreements Details Start -->
            <div class="col-sm-12 pad30 bgbase {{ $regType == 1 ? "bordertop marginminust40" : "" }} showbg">
                <div class="sidehead">Agreements Details</div>
                <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">
                    Do you have a standard {{ $regType == 1 ? "franchise" : "channel partner" }} agreement?
                </label>
                <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                       <div class="row">
                        @php
                            $franAggrement   = "";
                            $franAggrementNo = "";
                            if ( $franData->std_fran_aggreement == 1)
                                $franAggrement   = "checked";
                            if ( $franData->std_fran_aggreement != 1 )
                                $franAggrementNo = "checked";
                        @endphp 
                         <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                        <label class="col-xs-4 col-sm-3  col-md-3">
                        <input type="radio" name="std_fran_aggreement" id="inlineCheckbox1" value="1" {{$franAggrement}} > Yes
                        </label>
                                              
                        <label class="col-xs-4 col-sm-3 col-md-3">
                        <input type="radio" name="std_fran_aggreement" id="inlineCheckbox3" value="0" {{$franAggrementNo}} > No
                        </label>                         
                        </div>
                        
                     </div>
                </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12  col-sm-4 col-md-4 com4mod control-label">Duration of the Contract</label>
                    <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">                
                    <div class="row">      
                        @php
                            $franchiseTermDuration   = "";
                            $franchiseTermDurationNo = "";
                            if ( $franData->franchise_term_duration == "Life")
                                $franchiseTermDuration   = "checked";
                            if ( $franData->franchise_term_duration != "Life" )
                                $franchiseTermDurationNo = "checked";
                        @endphp              
                        <label class="col-xs-4 col-sm-3 col-md-3 spcasepad">
                            <input type="radio" name="franchise_term_duration" id="inlineCheckbox1" value="Life" {{$franchiseTermDuration}} > Lifetime 
                        </label>                    
                        <label class="col-xs-1 col-sm-1 col-md-1 spcasepad">
                            <input type="radio" name="franchise_term_duration" id="inlineCheckbox1" value="No of years" {{$franchiseTermDurationNo}}> 
                        </label>
                            <div class="col-xs-3 col-sm-4 col-md-4 row-no-padding">                       
                                <div class="input-group">                    
                                    <span class="input-group-addon"><img alt="calender" src="{{URL::asset('images/calendar.png')}}"></span>
                                    <select name="franchise_term_year" class="form-control myselectclass2" id="term_year_franchise">
                                        @php 
                                            if($franData->franchise_term_duration!="Life")
                                                echo "<option value=".$franData->franchise_term_duration.">$franData->franchise_term_duration</option>";
                                            for($i=1; $i<=15; $i++){
                                                 if($franData->franchise_term_duration==$i){
                                                 echo "";
                                                 }else{
                                                 echo "<option value=".$i.">$i</option>"; 
                                                 }
                                            }
                                        @endphp                        
                                    </select>
                                </div>                 
                            </div>
                            <label class="col-xs-3 col-sm-2 col-md-2 spcasepad"> Years</label>  
                        </div>
                    </div>
                </div>
                
                <div class="form-group paddingt20">
                    <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label padcheck">
                        Is the term renewable?
                    </label>
                    <div class="col-sm-1 com1mod padcheck hidden-xs">:</div>
                    <div  class="col-xs-12 col-sm-7 col-md-7 com7mod">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
                            @php
                                $termRenewable   = "";
                                $termRenewableNo = "";
                                if($franData->term_renewable==1)
                                    $termRenewable   = "checked";
                                if($franData->term_renewable!=1)
                                    $termRenewableNo = "checked";
                            @endphp
                            <label class="col-xs-4 col-sm-3 col-sm-3 col-md-3">
                            <input type="radio" name="term_renewable" id="inlineCheckbox1" value="1" {{$termRenewable}}> Yes </label>
                            <label class="col-xs-4 col-sm-3 col-sm-3 col-md-3">
                            <input type="radio" name="term_renewable" id="inlineCheckbox3" value="0" {{$termRenewableNo}}> No </label>        
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="clearfix"></div>
            <div class="row colbg">
            <center>
            <input type="submit"  class="btn btn-default" value="Update"/> 
            </center>
            </div>  
        </form>  
    </div>
    </div>
    </div>
    </div>
</div>
@endsection
