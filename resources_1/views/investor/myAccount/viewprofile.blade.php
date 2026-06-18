@extends('layout.master')
@section('vp')
class="selected"
@endsection
@section('content')

<div class="container myaccount">
    <div class="row row-no-margin">
    <!-- MY ACCOUNT  LEFT sTART -->
    @include('includes.myinvestorleft')
    <!-- MY ACCOUNT  LEFT END -->
    <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
    <!-- MY ACCOUNT  info Start -->
    @include('includes.myaccountview')
    <!-- MY ACCOUNT  info END -->
<!-- Personal  Start here -->
        <h2 class="mysubhead marleft fleft"  >Personal Details</h2> <div class="editlink"><a href="personaldetails"> Edit <i class="fa fa-angle-right" aria-hidden="true"></i> <span></span></a></div>
        <div class="clearfix"></div>
        <div class="bor-radius backwhite marleft">                           
        <div class="col-xs-12 pad15 showbg">                  
        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Name
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$userData->name}}
        </div>
        </div>

        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Address
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$data->inv_address}}
        </div>
        </div>

        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Country
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$data->inv_country}}
        </div>
        </div>


        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">State
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$data->inv_state}}
        </div>
        </div>


        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">City
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$data->inv_city}}
        </div>
        </div>


        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Pincode
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$data->inv_pincode}}
        </div>
        </div>

        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Mobile
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$userData->mobile}}
        </div>
        </div>

        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Occupation

        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">
        @php 
            $occupation=Config::get('constants.occupation.'.$data->occupation);                                       
            echo $occupation;
        @endphp
        </div>
        </div>

        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Date of Birth

        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$data->dob}}
        </div>
        </div>


        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Education Qualification

        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">
         @php 
            $edu=Config::get('constants.eduQualification.'.$data->edu_qualification);                                       
            echo $edu;
        @endphp         
        </div>
        </div>
        </div>    

        <div class="clearfix"></div>
        </div>
<!-- Personal  end here -->



<!-- Investment Details  Start here -->
        <h2 class="mysubhead marleft fleft"  >Investment Details</h2> <div class="editlink"><a href="investmentdetails"> Edit <i class="fa fa-angle-right" aria-hidden="true"></i> <span></span></a></div>
        <div class="clearfix"></div>
        <div class="bor-radius backwhite marleft">                           
        <div class="col-xs-12 pad15 showbg">                  
        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Industry Type
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">
        @foreach ($industryData as $data1)
            {{Config::get('constants.CategoryArr.'.$data1->ind_main_cat)}},
        @endforeach
        </div>
        </div>

        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Investment Range
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{ Config::get('constants.investmentRangeFetch.'.$data->investment_min) }}
        </div>
        </div>

        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">How soon would you like to invest?
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{ Config::get('constants.InvestTimeFrame.'.$data->investment_time) }}
        </div>
        </div>


        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Interested in Loans
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">
        @php
            if ( $data->loan_required == 0 ) {
                echo "No";
            }else
            {
                echo "Yes";
            }
        @endphp
        </div>
        </div>


        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Interested in Master Franchise
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">
         @php
            if($data->master_franchise_invest==0){
                echo "No";
            } else {
                echo "Yes";
            }
        @endphp
        </div>
        </div>
        </div>    

        <div class="clearfix"></div>
        </div>
<!-- Investment end here -->


<!-- Property Details  Start here -->
        <h2 class="mysubhead marleft fleft" >Property Details</h2> <div class="editlink"><a href="propertydetails"> Edit <i class="fa fa-angle-right" aria-hidden="true"></i> <span></span></a></div>
        <div class="clearfix"></div>
        <div class="bor-radius backwhite marleft">                           
        <div class="col-xs-12 pad15 showbg">                  
        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Commercial Property
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">
         @php
            if( $data->is_prop_commercial == 0) {
                echo "No";
            } else {
                echo "Yes";
            }
        @endphp
        </div>
        </div>

        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Address
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$data->prop_address}}
        </div>
        </div>

        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Floor area requirement
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$data->area_req_min}} -  {{$data->area_req_max}} sq. ft.

        </div>
        </div>


        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Property Use
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">{{$data->property_type}}
        </div>
        </div>


        <div class="row row-no-margin labeshow">
        <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Parking Space
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6">
        @php
            if ( $data->is_parking_available == 0 ) {
                echo "No";
            } else {
                echo "Yes";
            }
        @endphp
        </div>
        </div>
        </div>    
        <div class="clearfix"></div>
        </div>
<!-- Property Details end here -->

<!-- Business Details  Start here -->
        <h2 class="mysubhead marleft fleft" >Business Details</h2> <div class="editlink"><a href="businessdetails"> Edit <i class="fa fa-angle-right" aria-hidden="true"></i> <span></span></a></div>
        <div class="clearfix"></div>
        <div class="bor-radius backwhite marleft">                           
        <div class="col-xs-12 pad15 showbg">                  
            <div class="row row-no-margin labeshow">
                <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Previous Business
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6">
                @php
                    if ( $data->is_current_business == 0 ) {
                        echo "No";
                    } else {
                        echo "Yes";
                    }
                @endphp
                </div>
            </div>

            <div class="row row-no-margin labeshow">
                <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Industry type
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6">{{$data->industry_business}}
                </div>
            </div>

            <div class="row row-no-margin labeshow">
                <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">No of Years
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6">{{$data->no_of_years_business}}
                </div>
            </div>


            <div class="row row-no-margin labeshow">
                <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">No of Employees
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6">{{$data->no_of_employees}}
                </div>
            </div>


            <div class="row row-no-margin labeshow">
                <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Experience in Franchise
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6">
                @php
                    if ( $data->franchise_experience == 0 ) {
                        echo "No";
                    } else {
                        echo "Yes";
                    }
                @endphp
                </div>
            </div>

            <div class="row row-no-margin labeshow">
                <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Business Type
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6">{{$data->business_desc}}
                </div>
            </div>
        </div>    
        <div class="clearfix"></div>
        </div>
<!-- Business Details end here -->

<!-- Job Details  Start here -->
        <h2 class="mysubhead marleft fleft" >Job Details</h2> <div class="editlink"><a href="jobdetails"> Edit <i class="fa fa-angle-right" aria-hidden="true"></i> <span></span></a></div>
        <div class="clearfix"></div>
        <div class="bor-radius backwhite marleft">                           
        <div class="col-xs-12 pad15 showbg">   

        <div class="row row-no-margin labeshow">
            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Job Experiences
            </div>
            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
            </div>
            <div class="col-xs-12 col-sm-8 col-md-6">
             @php
                    if ( $data->is_job_experience == 0) {
                        echo "No";
                    } else {
                        echo "Yes";
                    }
                @endphp
            </div>
        </div>

        <div class="row row-no-margin labeshow">
            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Industry type
            </div>
            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
            </div>
            <div class="col-xs-12 col-sm-8 col-md-6">{{$data->industry_job}}
            </div>
        </div>

        <div class="row row-no-margin labeshow">
            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">No of Years
            </div>
            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
            </div>
            <div class="col-xs-12 col-sm-8 col-md-6">{{$data->no_of_years_exp}}
            </div>
        </div>


        <div class="row row-no-margin labeshow">
            <div class="col-xs-12 col-sm-3 col-md-5 row-no-padding">Any Other Industry
            </div>
            <div class="col-xs-12 col-sm-1 col-md-1 row-no-padding hidecolon">:
            </div>
            <div class="col-xs-12 col-sm-8 col-md-6">{{$data->other_industry}}
            </div>
        </div>

        </div>    
        <div class="clearfix"></div>
        </div>
<!-- Job Details end here -->
    </div>
    </div>  
    </div> 
</div>
@endsection
