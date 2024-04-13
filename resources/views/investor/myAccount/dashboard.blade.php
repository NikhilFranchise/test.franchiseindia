@extends('layout.master')
@section('db')
class="selected"
@endsection
@section('content')
<div class="container myaccount">
    <div class="row row-no-margin">
    <!-- MY ACCOUNT  LEFT START -->
    @include('includes.myinvestorleft')
    <!-- MY ACCOUNT  LEFT END -->
    <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
    @if (Session::has('changePlan'))
      <div class="alert alert-info">{{ Session::get('changePlan') }}</div>
    @endif

    <!-- MY ACCOUNT  info Start -->
    @include('includes.myaccountview')
    <!-- MY ACCOUNT  info END -->
<!-- Expressed Interest  Start here -->
<div class="row invermarleftzero">
<!---->
        <div class="col-xs-12 col-sm-6 col-md-6 resinver">
        <div class="row newclassmar">
        <h2 class="mysubhead fleft">Expressed Interest</h2> <div class="editlink investview"><a href="expressed-interest">View All <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="widinc"></span></a></div></div>

        <div class="bor-radius backwhite ovfl">
        <div class="exphead">Company</div>
        <ul class="col-xs-12 col-sm-12 col-md-12 explist">
        @php
          if (!empty($expIntFranData)) {
            $expIntFranData = $expIntFranData->toArray();
            $expFranIdArr   = array_column($expIntFranData, 'franchisor_id');
          }
            $brandLink      = '#';
            $compLogo       = 'no-photo.jpg';
            $invMemberType  = Auth::user()->membership_type;
        @endphp
        @if ($expIntFranData != null && $expIntFranData->count() > 0)
                @foreach ($expIntBrands as $expIntBrand)
                    @php
                        $key = array_search($expIntBrand->franchisor_id, $expFranIdArr);
                        // 'brandPagePattern' => '%s/brands/%s.%s',
                        if ($invMemberType == 1)
                            $brandLink = sprintf(Config::get('constants.brandPagePattern'), Config::get('constants.MainDomain'), $expIntFranData[$key]['profile_name'], $expIntFranData[$key]['fran_detail_id']);
                        else
                            $brandLink = '#';

                        if ($expIntFranData[$key]['membership_type'] == 1)
                            $compLogo = $expIntFranData[$key]['company_logo'];
                        else
                            $compLogo = 'no-photo.jpg';

                    //echo $compLogo . '</br>';
                    @endphp

                <li>
                    <a href="{{$brandLink}}">
                    <div class="imgle">
                        <img src="{{Config::get('constants.franAwsImgPath')}}{{$compLogo}}" alt="company logo" />
                    </div>
                    <div class="exright">
                        {{$expIntFranData[$key]['company_name']}}
                        <span>{{date("Y-m-d", strtotime($expIntBrand->visit_date))}}</span>
                    </div>
                    </a>
                </li>
            @endforeach
        @endif
        </ul>
        </div> 
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 resinver">
                 
                    <div class="row newclassmar"><h2 class="mysubhead fleft">Viewed Brands</h2> </div>
            
            
            <div class="clearfix"></div>
            <div class="bor-radius backwhite ovfl">
                <div class="exphead">Company</div>
                <ul class="col-xs-12 col-sm-12 col-md-12 explist">
                @php
                   if (!empty($viewedFranData)) {
                     $viewedFranData = $viewedFranData->toArray();
                     $franIdArr      = array_column($viewedFranData, 'franchisor_id');
                   }
                @endphp
                @if($viewedFranData && $viewedFranData->count() > 0)
                @foreach($viewedBrands as $viewedBrand)
                    @php
                        $key = array_search($viewedBrand->franchisor_id, $franIdArr);
                        // 'brandPagePattern' => '%s/brands/%s.%s',
                        if ($invMemberType == 1)
                            $brandLink = sprintf(Config::get('constants.brandPagePattern'), Config::get('constants.MainDomain'), $viewedFranData[$key]['profile_name'], $viewedFranData[$key]['fran_detail_id']);
                        else
                            $brandLink = '#';

                        if ($viewedFranData[$key]['membership_type'] == 1)
                            $compLogo = $viewedFranData[$key]['company_logo'];
                        else
                            $compLogo = 'no-photo.jpg';

                    @endphp
                <li><a href="{{$brandLink}}">
                <div class="imgle">
                    <img src="{{Config::get('constants.franAwsImgPath')}}{{$compLogo}}" alt="company logo" />
                </div>
                <div class="exright">
                    {{$viewedFranData[$key]['company_name']}}
                    <span>{{date("Y-m-d", strtotime($viewedBrand->visit_date))}}</span>
                </div>
                </a>
                </li>
                @endforeach
                @endif
                </ul>
            </div> 
        </div>
    </div>
    </div>
    </div>  
    </div>
</div> 
@endsection
