@extends('layout.master')
@section('ep')
    class="selected"
@endsection
@section('content')
    @php $i=0; @endphp
    <div class="container row-no-padding">
        <div class="container myaccount">
            <div class="row row-no-margin">
                <!-- MY ACCOUNT  LEFT sTART -->
                @include('includes.myinvestorleft')
                <!-- MY ACCOUNT  LEFT END -->
                <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                    <!-- MY ACCOUNT  info Start -->
                    @include('includes/myaccountview')
                    <!-- MY ACCOUNT  info END -->
                    <div class="row row-no-margin">
                        <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding padleft10"> 
                            <h2 class="mysubhead fleft">Expressed Interest</h2> 
                            <div class="clearfix"></div>
                            <div class="bor-radius backwhite ovfl exyab">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-6 col-md-6 leftpadd">
                                        <div class="expheadnew tleftradius">Company</div>
                                    </div>
                                    <div class="col-xs-4 col-sm-2 col-md-2 row-no-padding">
                                        <div class="expheadnew">Investment</div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 row-no-padding">
                                        <div class="expheadnew trightradius">Contact Details</div>
                                    </div>
                                </div>
                                @foreach ($franchisorData as $data)                                
                                    @php
                                        $brandLink  = sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $data->profile_name, $data->fran_detail_id);
                                        $compLogo   = ($data->membership_type == 1 ? $data->company_logo : "no-photo.jpg");
                                        
                                        foreach ( $eiData as $invData ) {
                                            $visitDate = ( $invData->franchisor_id == $data->franchisor_id ? $invData->visit_date: date('Y-m-d'));
                                            if ( $invData->franchisor_id == $data->franchisor_id )
                                                $visibility = ($invData->visibility == 1 ? 1 : 0);
                                        }
                                    @endphp

                                    <div class="row bordb">
                                        <div class="col-xs-4 col-sm-6 col-md-6 row-no-padding">
                                            <div>                                                
                                                <a href="{{$brandLink}}">
                                                    <div class="imgle">
                                                        <img src="{{Config('constants.franAwsImgPath')}}{{$compLogo}}" alt="{{$data->company_name}}" />
                                                    </div>
                                                    <div class="exright">
                                                          {{$data->company_name}}<span>{{$visitDate}}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2 row-no-padding">
                                            <div class="exds">
                                                <i class="fa fa-inr" aria-hidden="true"></i>  {{Config('constants.investRangeInWords.'.$data->unit_investment)}}
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 row-no-padding">
                                            <div class="exds rigp">
                                                @if ( $visibility == 1 )
                                                    <span>{{$data->company_name}}</span><br/>
                                                    {{$data->state}}, {{$data->fran_address}} - {{$data->pincode}}, {{$data->country}}<br/>
                                                    <span>Landline:</span> {{$data->telephone}}, <span>M.:</span> {{$data->mobile}} <br/>
                                                    <span>Email Id:</span>
                                                    <a href="mailto:{{$data->email}}">{{$data->email}}</a>
                                                @else
                                                    <button class="btn btn-default asb" id="{{$data->franchisor_id}}" onclick="viewContactButton(this.id)" >View Contact</button>
                                                    <div class="trt" id="sub_{{$data->franchisor_id}}" style="display:none;">
                                                        <p id="p_{{$data->franchisor_id}}">Please wait...</p>
                                                        <div id="div_{{$data->franchisor_id}}">
                                                            <input type="button" value="Yes" id="yes_{{$data->franchisor_id}}" class="btn btn-default yesclick" onclick="revealInfo(this.id)" /> 
                                                            <input type="button" value="No" id="no_{{$data->franchisor_id}}" onclick="noInterest(this.id)" class="btn btn-default noclick" />
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {!! $eiData->links() !!}
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        function viewContactButton(franchisorId) {
            if ({{Auth::user()->membership_type }} == 0) {
                window.location.assign("{{Config('constants.MainDomain')}}/investor/myaccount/payment");
            } else {
                $('#'+franchisorId).hide();
                $('#div_'+franchisorId).hide();
                $('#sub_'+franchisorId).show();

                var franId = franchisorId;

                $.ajax({
                    type: 'post',
                    url: '{{URL('/inv-lead?flag=confirm')}}',
                    data: {
                        franId: franId,
                    },
                    success: function (data) {
                        if ($.isNumeric(data)) {
                            $('#div_'+franId).css('display', 'block');
                            $('#p_'+franId).html('You have '+ data + 'credits remaining. Do you want to procede?');

                        } else {
                            window.location.reload();
                        }
                    }
                });
            }
        }

        function revealInfo(data) {

            $('#div_'+data.substr(4)).hide();
            $('#p_'+data.substr(4)).html('Please wait....');

            $.ajax({
                type: 'post',
                url: '{{URL('/inv-lead?flag=confirmed')}}',
                data: {
                    franId: data.substr(4), 
                },
                success: function () {
                    window.location.reload();
                }
            });

        }

        function noInterest(data) {

            $('#sub_'+data.substr(3)).hide();
            $('#'+data.substr(3)).show();

        }
    </script>
@endsection 
