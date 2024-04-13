@extends('layout.master')
@section('rec')
    class="selected"
@endsection
@section('content')

    <div class="loadman" id="loading" style="display:none;">
        <div class="thanku">
            <div class="tbl-cell">
                <div class="loader"></div>
            </div>
        </div>
    </div>

    <div class="container row-no-padding margintop60">
        <div class="container myaccount">
            <div class="row">
                <!-- MY ACCOUNT  LEFT sTART -->
            @include('includes.myinvestorleft')
            <!-- MY ACCOUNT  LEFT END -->
                <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">

                    <!-- MY ACCOUNT  info Start -->
                @include('includes.myaccountview')
                <!-- MY ACCOUNT  info END -->
                    <h2 class="mysubhead marleft recan">Recommendations</h2>
                    <div class="recoval"></div>
                    <div class="row cateblock myaccrecommand">
                        @foreach($franchisors as $franchisor)
                            @php
                                $url = Config('constants.MainDomain')."/brands/".$franchisor['profile_name'].'.'.$franchisor['fran_detail_id'];
                                
                                //Area requirement
                                $area = $franchisor['prop_area_min'].' - '.$franchisor['prop_area_max'].' Sq.ft';
                                if(empty($franchisor['prop_area_max']))
                                    $area = $franchisor['prop_area_min'];
                                if (is_numeric($franchisor['prop_area_min']) && empty($franchisor['prop_area_max']))
                                      $area = $franchisor['prop_area_min'] . ' Sq.ft';
                                if (empty($franchisor['prop_area_min']))
                                      $area = '-N/A-';

                                //States for expansion
                                $states = "";
                                if(!empty($franchisorStates)){
                                    $stateCount = 0;
                                    foreach($franchisorStates as $state){
                                        if($state->franchisor_id == $franchisor['franchisor_id']){
                                            $states .= $state->state.', ';
                                            ++$stateCount;
                                        }
                                        if($stateCount > 4)
                                            break;

                                    }
                                    $states = rtrim($states, ', ');
                                }

                                //displaying like and ratings
                                $likes = 0;
                                $rate  = 0; 
                                if(!empty($likeRate)){
                                   foreach($likeRate as $result){
                                       if($result->franchisor_id == $franchisor['franchisor_id']){
                                           $likes = $result->blike;
                                           if($result->brate != 0 && $result->bclick != 0){
                                               $rate = $result->brate/$result->bclick;
                                               $rate = round( $rate, 1);
                                           }
                                       }
                                   }
                                }
                            @endphp
                            <div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
                                <div class="business-list hvr-effect">
                                    <div class="business-list-ttl">
                                        {{ Config('category.SeoSubSubCategoryArr.'.$franchisor['ind_sub_cat']) }}
                                        <div class="business-list-SubTtl">

                                            <a href="{{ $url }}">{{ $franchisor['company_name'] }}</a>
                                        </div>
                                    </div>
                                    <div class="business-list-bdy">
                                        <div class="mycatimg"><a href="{{ $url }}"><img alt="{{ $franchisor['company_name'] }}" src="{{ Config('constants.franAwsImgPath') }}{{$franchisor['company_logo']}}"/></a></div>
                                        <div class="cattext">{{implode(' ', array_slice(explode(' ', substr(strip_tags($franchisor['business_desc']),0,110)), 0, 10))}}...</div>
                                        <div class="subcat">
                                            <div>Investment Range</div>
                                            {{Config('constants.investRangeInWords.'.$franchisor['unit_investment'])}}
                                        </div>
                                        <div class="subcat">
                                            <div>Space required</div>
                                            {{ $area }}
                                        </div>
                                        @if(!empty($states))
                                            <div class="subcat">
                                                <div>Locations looking for expansion</div>
                                                {{ $states }}
                                            </div>
                                        @endif
                                        <div class="catbtn">
                                            <a href="#" class="btn btn-default applybtn" onclick="sendLead(this.id)" id="{{ $franchisor['franchisor_id'] }}">Apply Now</a>
                                        </div>
                                    </div>
                                    <div class="business-list-footer">
                                        <ul>
                                            <li><i class="fa fa-thumbs-up fa-lg"
                                                   aria-hidden="true"></i>@if($likes != 0){{$likes}}@endif</li>
                                            <li><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-half-o fa-lg"
                                                   aria-hidden="true"></i>@if($rate != 0){{$rate}}@endif</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function sendLead(id) {
            $('#loading').show();
            $.ajax({
                type: 'post',
                url: '{{Config('constants.MainDomain')}}/inv-lead?flag=expint',
                data: {
                    franId: id,
                },
                success: function () {
                    window.location.reload();
                }
            });
        }

    </script>
@endsection