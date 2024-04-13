@if(count($relatedBrands) > 1)
<div class="row row-no-margin cateblock catartiblk artilist">


    <div class="mycatheadarotcle tst">Related Business Opportunities</div>

    <ul id="flexiselDemo1">
        @foreach($relatedBrands as $article)
            @php
                $subsubcat = Config::get('constants.subSubCategoryArr.'.$article['ind_cat'].'.'.$article['ind_sub_cat']);
                $invSize   = Config::get('constants.investRangeInWords.'.$article['unit_investment']);
                $outlets   = Config::get('constants.NoOutlets.'.$article['no_fran_outlets']);
                $fType     = Config::get('constants.masterfranchiseType.'.$article['franchise_partner_type']);

            @endphp
            <li>
                <!--cat 1 start here -->
                <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding">

                <!--premium btn end -->

                    <div class="padfb15">
                        <div class="catlisthead">{{$subsubcat}}</div>
                        <div class="catlist">
                            <a href="{{ Config::get('constants.MainDomain') }}/brands/{{$article['profile_name']}}.{{$article['fran_detail_id']}}">
                                {{$article['company_name']}}
                            </a>

                        </div>
                    </div>
                    <div class="catlistdest">
                        <div class="catdleft pad20">
                            <div class="cattxtimg">
                                @if($article['business_desc']!='')
                                    {{strip_tags(implode(' ', array_slice(explode(' ', substr(strip_tags($article['business_desc']),0,100)), 0, 10)))}}..
                                @endif
                            </div>

                            <div class="subcat"><span>Locations looking for expansion</span>
                                {{$article['state']}}
                                @if($article['state']=='')
                                    -NA-
                                @endif
                            </div>

                            <div class="subcat"><span>Establishment year</span>
                                {{$article['operations_start_year']}}
                                @if($article['operations_start_year']=='')
                                    -NA-
                                @endif
                            </div>
                            <div class="subcat"><span>Franchising Launch Date</span>
                                {{$article['franchise_start_year']}}
                                @if($article['franchise_start_year']=='')
                                    -NA-
                                @endif
                            </div>
                            <!--btn s-->
                            <div class="catbtn">
                                <a href="{{ Config::get('constants.MainDomain') }}/brands/{{$article['profile_name']}}.{{$article['fran_detail_id']}}" class="btn btn-default">View Detail</a>

                            </div>
                            <!--btn E-->

                        </div>
                        <div class="catdright pad20">
                            <div class="catimg">
                                <a href="{{ Config::get('constants.MainDomain') }}/brands/{{$article['profile_name']}}.{{$article['fran_detail_id']}}">
                                @if($article['company_logo']=='')
                                    <img src="{{URL::asset('images/no-img.jpg')}}" alt="no image" />
                                @endif

                                @if($article['company_logo']!='')
                                    <img alt="{{$article['company_name']}}"  src="{{Config::get('constants.franAwsImgPath')}}{{$article['company_logo']}}">
                                @endif
                                </a>
                            </div>
                            <div class="subcat"><span>Investment size</span>
                                {{$invSize}}
                            </div>

                            <div class="subcat"><span>Space required</span>
                                {{$article['prop_area_min']}}
                                @if($article['prop_area_min']=='')
                                    -NA-
                                @endif
                            </div>
                            <div class="subcat"><span>Franchise Outlets</span>
                                {{$outlets}}
                                @if($outlets == '')
                                    -NA-
                                @endif
                            </div>
                            <div class="subcat"><span>Franchise Type</span>
                                {{$fType}}
                                @if($fType=='')
                                    -NA-
                                @endif
                            </div>

                            <div class="subcat"><span>Headquater</span>
                                @if($article['city']||$article['state']!='')
                                    {{$article['city']}} {{$article['state']}}
                                @endif

                                @if($article['city']&& $article['state']=='')
                                    -NA-
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </li>
        @endforeach
    </ul>

    <!--cat 1 end here -->

</div>



<script type="text/javascript" src="{{URL::asset('js/jquery.flexisel.js')}}"></script>
<script language="javascript">
    $(document).ready(function(){
        $("#flexiselDemo1").flexisel({
            visibleItems: 2,
            animationSpeed: 700,
            autoPlay:false,
            autoPlaySpeed: 1000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 1
                }
            }
        });
    });
</script>
@endif
