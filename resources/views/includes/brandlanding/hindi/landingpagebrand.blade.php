<div class="row row-no-margin cateblock catartiblk landcat">


    <div class="mycatheadarotcle ctal">आपको इन अवसरों में भी रुचि हो सकती है</div>

    <ul id="flexiselDemolist">
        @foreach($relatedBrands as $article)
            @php
                $subsubcat = Config('constants.subSubCategoryArr.'.$article['ind_cat'].'.'.$article['ind_sub_cat']);
                $invSize   = Config('constants.investRangeInWords.'.$article['unit_investment']);
                $outlets   = Config('constants.NoOutlets.'.$article['no_fran_outlets']);
                $fType     = Config('constants.masterfranchiseType.'.$article['franchise_partner_type']);

            @endphp
            <li>
                <!--cat 1 start here -->
                <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding">

                    <div class="padfb15">
                        <div class="catlisthead">{{$subsubcat}}</div>
                        <div class="catlist">
                            <a href="{{ Config('constants.MainDomain') }}/brands/{{$article['profile_name']}}.{{$article['fran_detail_id']}}">
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

                            <div class="subcat"><span>विस्तार की तलाश में स्थान</span>
                                {{$article['state']}}
                                @if($article['state']=='')
                                    -NA-
                                @endif
                            </div>

                            <div class="subcat"><span>स्थापना वर्ष</span>
                                {{$article['operations_start_year']}}
                                @if($article['operations_start_year']=='')
                                    -NA-
                                @endif
                            </div>
                            <div class="subcat"><span>फ़्रैंचाइजिंग लॉन्च तिथि</span>
                                {{$article['franchise_start_year']}}
                                @if($article['franchise_start_year']=='')
                                    -NA-
                                @endif
                            </div>
                            <!--btn s-->
                            <div class="catbtn">
                                <a href="{{ Config('constants.MainDomain') }}/brands/{{$article['profile_name']}}.{{$article['fran_detail_id']}}" class="btn btn-default">विस्तार से देखें</a>

                            </div>
                            <!--btn E-->

                        </div>
                        <div class="catdright pad20">
                            <div class="catimg">
                                <a href="{{ Config('constants.MainDomain') }}/brands/{{$article['profile_name']}}.{{$article['fran_detail_id']}}">
                                @if($article['company_logo']=='')
                                    <img src="{{url('images/no-img.jpg')}}" alt="no image" />
                                @endif

                                @if($article['company_logo']!='')
                                    <img src="{{Config('constants.franAwsImgPath')}}{{$article['company_logo']}}" alt="{{$article['company_name']}}" />
                                @endif
                                </a>
                            </div>
                            <div class="subcat"><span>निवेश का आकार</span>
                                {{$invSize}}
                            </div>

                            <div class="subcat"><span>जगह की जरुरत</span>
                                {{$article['prop_area_min']}}
                                @if($article['prop_area_min']=='')
                                    -NA-
                                @endif
                            </div>
                            <div class="subcat"><span>फ्रेंचाइजी आउटलेट्स</span>
                                {{$outlets}}
                                @if($outlets == '')
                                    -NA-
                                @endif
                            </div>
                            <div class="subcat"><span>फ्रेंचाइजी प्रकार</span>
                                {{$fType}}
                                @if($fType=='')
                                    -NA-
                                @endif
                            </div>

                            <div class="subcat"><span>मुख्यालय</span>
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

</div>
<script type="text/javascript" src="{{url('js/jquery.flexisel.js')}}"></script>
<script language="javascript">
    $(document).ready(function(){
        $("#flexiselDemolist").flexisel({
            visibleItems: 3,
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

              
        


        