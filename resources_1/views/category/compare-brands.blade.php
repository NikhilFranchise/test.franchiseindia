@extends('layout.master')
@section('content')

    @php
        $cat1 = "";
        $cat2 = "";
        $cat3 = "";
        $area1 = "";
        $area2 = "";
        $area3 = "";
        $subCat1 = "";
        $subCat2 = "";
        $subCat3 = "";
        $outlets1 = "";
        $outlets2 = "";
        $outlets3 = "";
        $brandUrl1 = "#";
        $brandUrl2 = "#";
        $brandUrl3 = "#";
        $invRange1 = "";
        $invRange2 = "";
        $invRange3 = "";
        $brandFee1 = "";
        $brandFee2 = "";
        $brandFee3 = "";
        $brandLogo1 = "https://www.franchiseindia.com/images/no-img.gif";
        $brandLogo2 = "https://www.franchiseindia.com/images/no-img.gif";
        $brandLogo3 = "https://www.franchiseindia.com/images/no-img.gif";
        $subSubCat1 = "";
        $subSubCat2 = "";
        $subSubCat3 = "";
        $commission1 = "";
        $commission2 = "";
        $commission3 = "";
        $companyName1 = "";
        $companyName2 = "";
        $companyName3 = "";


        if(isset($franchisors[0])) {
            $area1 = $franchisors[0]->prop_area_min.' - '.$franchisors[0]->prop_area_max.' Sq.ft';
            if(empty($franchisors[0]->prop_area_max))
                $area1 = $franchisors[0]->prop_area_min;
            if (is_numeric($franchisors[0]->prop_area_min) && empty($franchisors[0]->prop_area_max))
                $area1 = $franchisors[0]->prop_area_min . ' Sq.ft';
            if (empty($franchisors[0]->prop_area_min))
                $area1 = '-N/A-';

            $companyName1 = $franchisors[0]->company_name;
            $brandLogo1 = $franchisors[0]->membership_type == 1 ? Config('constants.franAwsImgPath').$franchisors[0]->company_logo : url('/images/no-img.gif');
            $cat1 = Config('constants.CategoryArr.'.$franchisors[0]->ind_main_cat);
            $subCat1 = Config('constants.subCategoryArr.'.$franchisors[0]->ind_main_cat.'.'.$franchisors[0]->ind_cat);
            $outlets1 = $franchisors[0]->no_company_outlets;
            $minValue = $franchisors[0]->unit_inv_min;

            if($minValue < 100000 && $minValue > 10000)
                $minValue = substr(($minValue/1000),0,5).' K';

            //if($minValue <= 9999999 && $minValue > 100000)
               // $minValue = substr(($minValue/100000),0,5).' Lakh';
            if (is_numeric($minValue) && $minValue <= 9999999 && $minValue > 100000) {
                // Format the number to 2 decimal places (or adjust to your needs)
                $minValue = number_format($minValue / 100000, 2) . ' Lakh';
            }


            if($minValue > 9999999)
                $minValue = substr(($minValue/10000000),0,5).' Cr';

            $maxValue = $franchisors[0]->unit_inv_max;
            if($maxValue < 100000 && $maxValue > 10000)
                $maxValue = substr(($maxValue/1000),0,5).' K';

            if(is_numeric($maxValue) <= 9999999 && is_numeric($maxValue) > 100000)
                $maxValue = substr(($maxValue/100000),0,5).' Lakh';

            if($maxValue > 9999999)
                $maxValue = substr(($maxValue/10000000),0,5).' Cr';

            $invRange1 = "INR  $minValue  - $maxValue ";



            $amount = $franchisors[0]->unitinv_brand_fee;

            if($amount < 100000 && $amount > 10000)
                $amount = substr(($amount/1000),0,5).' K';

            if(is_numeric($amount) <= 9999999 && is_numeric($amount) > 100000)
                $amount = substr(($amount/100000),0,5).' Lakh';

            if($amount > 9999999)
                $amount = substr(($amount/10000000),0,5).' Cr';

            $brandFee1 = $amount;

            $subSubCat1 = Config('constants.subSubCategoryArr.'.$franchisors[0]->ind_cat.'.'.$franchisors[0]->ind_sub_cat);
            $commission1 = !empty($franchisors[0]->unitinv_royalty) ? $franchisors[0]->unitinv_royalty."%" : "0%";
            $brandUrl1 = url('/brands/'.$franchisors[0]->profile_name.'.'.$franchisors[0]->fran_detail_id);
        }

        if(isset($franchisors[1])) {
            $area2 = $franchisors[1]->prop_area_min.' - '.$franchisors[1]->prop_area_max.' Sq.ft';
            if(empty($franchisors[1]->prop_area_max))
                $area2 = $franchisors[1]->prop_area_min;
            if (is_numeric($franchisors[1]->prop_area_min) && empty($franchisors[1]->prop_area_max))
                $area2 = $franchisors[1]->prop_area_min . ' Sq.ft';
            if (empty($franchisors[1]->prop_area_min))
                $area2 = '-N/A-';

            $companyName2 = $franchisors[1]->company_name;
            $brandLogo2 = $franchisors[1]->membership_type == 1 ? Config('constants.franAwsImgPath').$franchisors[1]->company_logo : url('/images/no-img.gif');
            $cat2 = Config('constants.CategoryArr.'.$franchisors[1]->ind_main_cat);
            $subCat2 = Config('constants.subCategoryArr.'.$franchisors[1]->ind_main_cat.'.'.$franchisors[1]->ind_cat);
            $outlets2 = $franchisors[1]->no_company_outlets;


            $minValue       = $franchisors[1]->unit_inv_min;

            if($minValue < 100000 && $minValue > 10000)
                $minValue = substr(($minValue/1000),0,5).' K';

            if(is_numeric($minValue) && $minValue <= 9999999 && $minValue > 100000)
                $minValue = substr(($minValue/100000),0,5).' Lakh';

            if($minValue > 9999999)
                $minValue = substr(($minValue/10000000),0,5).' Cr';

            $maxValue = $franchisors[1]->unit_inv_max;
            if($maxValue < 100000 && $maxValue > 10000)
                $maxValue = substr(($maxValue/1000),0,5).' K';

            //if($maxValue <= 9999999 && $maxValue > 100000)
            //    $maxValue = substr(($maxValue/100000),0,5).' Lakh';
            if (is_numeric($minValue) && $minValue <= 9999999 && $minValue > 100000) {
                // Format the number to 2 decimal places (or adjust to your needs)
                $minValue = number_format($minValue / 100000, 2) . ' Lakh';
            }

            if($maxValue > 9999999)
                $maxValue = substr(($maxValue/10000000),0,5).' Cr';

            $invRange2 = "INR  $minValue  - $maxValue ";


            $amount = $franchisors[1]->unitinv_brand_fee;

            if($amount < 100000 && $amount > 10000)
                $amount = substr(($amount/1000),0,5).' K';

            if($amount <= 9999999 && $amount > 100000)
                $amount = substr(($amount/100000),0,5).' Lakh';

            if($amount > 9999999)
                $amount = substr(($amount/10000000),0,5).' Cr';

            $brandFee2 = $amount;


            $subSubCat2 = Config('constants.subSubCategoryArr.'.$franchisors[1]->ind_cat.'.'.$franchisors[1]->ind_sub_cat);
            $commission2 = !empty($franchisors[1]->unitinv_royalty) ? $franchisors[1]->unitinv_royalty."%" : "0%";
            $brandUrl2 = url('/brands/'.$franchisors[1]->profile_name.'.'.$franchisors[1]->fran_detail_id);

        }
        if(isset($franchisors[2])) {
            $area3 = $franchisors[2]->prop_area_min.' - '.$franchisors[2]->prop_area_max.' Sq.ft';
            if(empty($franchisors[2]->prop_area_max))
                $area3 = $franchisors[2]->prop_area_min;
            if (is_numeric($franchisors[2]->prop_area_min) && empty($franchisors[2]->prop_area_max))
                $area3 = $franchisors[2]->prop_area_min . ' Sq.ft';
            if (empty($franchisors[2]->prop_area_min))
                $area3 = '-N/A-';

            $companyName3 = $franchisors[2]->company_name;
            $brandLogo3 = $franchisors[2]->membership_type == 1 ? Config('constants.franAwsImgPath').$franchisors[2]->company_logo : url('/images/no-img.gif');
            $cat3 = Config('constants.CategoryArr.'.$franchisors[2]->ind_main_cat);
            $subCat3 = Config('constants.subCategoryArr.'.$franchisors[2]->ind_main_cat.'.'.$franchisors[2]->ind_cat);
            $outlets3 = $franchisors[2]->no_company_outlets;

            $minValue       = $franchisors[2]->unit_inv_min;

            if($minValue < 100000 && $minValue > 10000)
                $minValue = substr(($minValue/1000),0,5).' K';

            if($minValue <= 9999999 && $minValue > 100000)
                $minValue = substr(($minValue/100000),0,5).' Lakh';

            if($minValue > 9999999)
                $minValue = substr(($minValue/10000000),0,5).' Cr';

            $maxValue = $franchisors[2]->unit_inv_max;
            if($maxValue < 100000 && $maxValue > 10000)
                $maxValue = substr(($maxValue/1000),0,5).' K';

            if($maxValue <= 9999999 && $maxValue > 100000)
                $maxValue = substr(($maxValue/100000),0,5).' Lakh';

            if($maxValue > 9999999)
                $maxValue = substr(($maxValue/10000000),0,5).' Cr';

            $invRange3 = "INR  $minValue  - $maxValue ";




            $amount = $franchisors[2]->unitinv_brand_fee;

            if($amount < 100000 && $amount > 10000)
                $amount = substr(($amount/1000),0,5).' K';

            if($amount <= 9999999 && $amount > 100000)
                $amount = substr(($amount/100000),0,5).' Lakh';

            if($amount > 9999999)
                $amount = substr(($amount/10000000),0,5).' Cr';

            $brandFee3 = $amount;
            $subSubCat3 = Config('constants.subSubCategoryArr.'.$franchisors[2]->ind_cat.'.'.$franchisors[2]->ind_sub_cat);
            $commission3 = !empty($franchisors[2]->unitinv_royalty) ? $franchisors[2]->unitinv_royalty."%" : "0%";
            $brandUrl3 = url('/brands/'.$franchisors[2]->profile_name.'.'.$franchisors[2]->fran_detail_id);

        }
    @endphp
    <div class="comparemainblk">
        <div class="container">
            <div class="comparefullblk">
                <div class="compareleft"> &nbsp;</div>
                <div class="compareright">
                    <ul class="comparelist">
                        <li>
                            <form action="#" id="getListingFirst">
                                <div class="radblk">
                                    <div class="comparehead">Compare With Brand 1 </div>
                                    <div class="selbox">
                                        <select name="type" class="form-control myselectclasssearch">
                                            <option value="">Select Franchise Type</option>
                                            @foreach( Config('constants.masterfranchiseType') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="selbox">
                                        <select name="mainCat" required class="form-control myselectclasssearch"  onchange="getSubCategoryComparinson(this.value, 1);">
                                            <option value="">Select Category</option>
                                            @foreach( Config('constants.CategoryArr') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="selbox">
                                        <select name="subCat"  class="form-control myselectclasssearch" id="getSubCategoryData1" onchange="getSubCatCategoryComparinson(this.value, 1);">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                    <div class="selbox">
                                        <select name="subSubCat" class="form-control myselectclasssearch" id="getSubCatCategoryData1">
                                            <option value="">Select Sub Sub Category</option>
                                        </select>
                                    </div>

                                    <div class="selbox">
                                        <input type="submit" value="submit" class="btn btn-default btn-red"/>
                                    </div>
                                </div>
                                <div class="brandlogoblk">
                                    <div class="bheading" id="companyName1">{{ $companyName1 }}</div>
                                    <div class="brandlogo">
                                        <a href="{{ $brandUrl1 }}" id="brandUrl1">
                                            <img src="{{ $brandLogo1 }}" alt="{{ $companyName1 }}" id="brandLogo1">
                                        </a>
                                    </div>
                                    <div class="bheading showmobile" id="companyNameMobile1">{{ $companyName1 }}</div>
                                </div>

                            </form>
                        </li>
                        <li>
                            <form action="#" id="getListingSecond">
                                <div class="radblk">
                                    <div class="comparehead">Compare With  Brand 2</div>
                                    <div class="selbox">
                                        <select name="type" class="form-control myselectclasssearch">
                                            <option value="">Select Franchise Type</option>
                                            @foreach( Config('constants.masterfranchiseType') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="selbox">
                                        <select name="mainCat" required class="form-control myselectclasssearch"  onchange="getSubCategoryComparinson(this.value, 2);" >
                                            <option value="">Select Category</option>
                                            @foreach( Config('constants.CategoryArr') as $index => $value)
                                                <option value="{{ $index }}" >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="selbox">
                                        <select name="subCat" class="form-control myselectclasssearch"  id="getSubCategoryData2" onchange="getSubCatCategoryComparinson(this.value, 2);">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                    <div class="selbox">
                                        <select name="subSubCat" class="form-control myselectclasssearch" id="getSubCatCategoryData2">
                                            <option value="">Select Sub Sub Category</option>
                                        </select>
                                    </div>

                                    <div class="selbox">
                                        <input type="submit" value="submit" class="btn btn-default btn-red"/>
                                    </div>

                                </div>
                                <div class="brandlogoblk">
                                    <div class="bheading" id="companyName2">{{ $companyName2 }}</div>
                                    <div class="brandlogo">
                                        <a href="{{ $brandUrl2 }}" id="brandUrl2">
                                            <img src="{{ $brandLogo2 }}" alt="{{ $companyName2 }}" id="brandLogo2">
                                        </a>
                                    </div>
                                    <div class="bheading mobieshow" id="companyNameMobile2">{{ $companyName2 }}</div>
                                </div>

                            </form>
                        </li>
                        <li>
                            <form action="#" id="getListingThird" >
                                <div class="radblk">
                                    <div class="comparehead">Compare With Brand 3</div>
                                    <div class="selbox">
                                        <select name="type" class="form-control myselectclasssearch" >
                                            <option value="">Select Franchise Type</option>
                                            @foreach( Config('constants.masterfranchiseType') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="selbox">
                                        <select name="mainCat" required class="form-control myselectclasssearch"  onchange="getSubCategoryComparinson(this.value, 3);">
                                            <option value="">Select Category</option>
                                            @foreach( Config('constants.CategoryArr') as $index => $value)
                                                <option value="{{ $index }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="selbox">
                                        <select name="subCat" class="form-control myselectclasssearch"  id="getSubCategoryData3"  onchange="getSubCatCategoryComparinson(this.value, 3);">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                    <div class="selbox">
                                        <select name="subSubCat" class="form-control myselectclasssearch" id="getSubCatCategoryData3">
                                            <option value="">Select Sub Sub Category</option>
                                        </select>
                                    </div>

                                    <div class="selbox">
                                        <input type="submit" value="submit" class="btn btn-default btn-red"/>
                                    </div>

                                </div>
                                <div class="brandlogoblk">
                                    <div class="bheading" id="companyName3">{{ $companyName3 }}</div>
                                    <div class="brandlogo">
                                        <a href="{{ $brandUrl3 }}" id="brandUrl3">
                                            <img src="{{ $brandLogo3 }}" alt="{{ $companyName3 }}" id="brandLogo3">
                                        </a>
                                    </div>
                                    <div class="bheading mobieshow" id="companyNameMobile3">{{ $companyName3 }}</div>
                                </div>

                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tableblk">
                <table class="table table-bordered">
                    <tbody>



                        <tr>
                            <td class="fi">Area requirement</td>
                            <td id="area1">{{ $area1 }}</td>
                            <td id="area2">{{ $area2 }}</td>
                            <td id="area3">{{ $area3 }}</td>
                        </tr>
                        <tr>
                            <td class="fi">Investment range</td>
                            <td id="invRange1">{{ $invRange1 }}</td>
                            <td id="invRange2">{{ $invRange2 }}</td>
                            <td id="invRange3">{{ $invRange3 }}</td>
                        </tr>
                        <tr>
                            <td class="fi">No of Franchise outlets</td>
                            <td id="outlets1">{{ $outlets1 }}</td>
                            <td id="outlets2">{{ $outlets2 }}</td>
                            <td id="outlets3">{{ $outlets3 }}</td>
                        </tr>
                        <tr>
                            <td class="fi">Franchise / <br class="disp"/> Brand Fee </td>
                            <td id="brandFee1">{{ $brandFee1 }}</td>
                            <td id="brandFee2">{{ $brandFee2 }}</td>
                            <td id="brandFee3">{{ $brandFee3 }}</td>
                        </tr>
                        <tr>
                            <td class="fi">Royalty/ Commission </td>
                            <td id="comission1">{{ $commission1 }}</td>
                            <td id="comission2">{{ $commission2 }}</td>
                            <td id="comission3">{{ $commission3 }}</td>
                        </tr>
                        <tr>
                            <td class="fi">Master Category</td>
                            <td id="mainCat1">{{ $cat1 }}</td>
                            <td id="mainCat2">{{ $cat2 }}</td>
                            <td id="mainCat3">{{ $cat3 }}</td>
                        </tr>
                        <tr>
                            <td class="fi">Sub category</td>
                            <td id="subCat1">{{ $subCat1 }}</td>
                            <td id="subCat2">{{ $subCat2 }}</td>
                            <td id="subCat3">{{ $subCat3 }}</td>
                        </tr>
                        <tr>
                            <td class="fi">Sub-Sub category</td>
                            <td id="subSubCat1">{{ $subSubCat1 }}</td>
                            <td id="subSubCat2">{{ $subSubCat2 }}</td>
                            <td id="subSubCat3">{{ $subSubCat3 }}</td>
                        </tr>
                        <tr>
                            <td class="fi">Investor Rating</td>
                            <td id="rating1"></td>
                            <td id="rating2"></td>
                            <td id="rating3"></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <a href="#" data-toggle="modal" id="openComparePopup" data-target="#comparemodal" style="display: none;">Compare Popup</a>
        </div>
    </div>

    <!--comparepop start here-->
    <div class="modal fade lg-panel" id="comparemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="compareSingleBrand" action="#" >
                    <input type="hidden" id="blockFor" value="1">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeButton" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="comheadnew">Compare Brands</div>
                    </div>
                    <div class="modal-body">
                        <div class="comparepop">
                            <ul class="comparelistsel" id="comparisonBrandBlockDisplay"></ul>
                        </div>
                    </div>
                    <div class="modal-footer txt-center">
                        <div class="btnblkf"><input type="submit" value="submit" class="btn btn-default btn-red"/></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--comparepop End here-->

    <script language="javascript">

        function getSubCategoryComparinson(value, block) {
            $.ajax({
                type:'GET',
                url:'/getsubcategory',
                data:{categoryID : value},
                success:function(data){
                    $("#getSubCategoryData"+block).html(data);
                }
            });
        }

        //fetching sub-sub categories
        function getSubCatCategoryComparinson(value, block){
            $.ajax({
                type:'GET',
                url:'/getsubcatcategory',
                data:{subcategoryID : value},
                success:function(data){
                    $("#getSubCatCategoryData"+block).html(data);
                }
            });
        }

        function franchisorRatings(rating, franchosorNumber) {
            var a = rating;
            var b = Math.round(a);
            var c = "";
            for (var x = 0; x < b ;x++) {
                c += "<i class='fa fa-star fa-lg' aria-hidden='true'></i>";
            }
            if (a > b || a > (b + 0.5)) {
                c += "<i class='fa fa-star-half-o fa-lg' aria-hidden='true'></i>";
            } else {
                if(a < 4.5)
                    c += "<i class='fa fa-star-o fa-lg' aria-hidden='true'></i>";
            }
            var remain = 5 - b;
            for (var y = 0; y < remain-1; y++)
                c += "<i class='fa fa-star-o fa-lg' aria-hidden='true'></i>";

            if(franchosorNumber == 1)
                $("#rating1").html(c);
            else if (franchosorNumber == 2)
                $("#rating2").html(c);
            else if (franchosorNumber == 3)
                $("#rating3").html(c);
        }

        @if(isset($franchisors[0]->franchisorLike->bclick))
            @php
                $click         = $franchisors[0]->franchisorLike->bclick;
                $ratings       = $franchisors[0]->franchisorLike->brate;
            @endphp
            @if($ratings != 0)
                franchisorRatings( {{ $ratings/$click }}, 1);
            @else
                $("#rating1").html("<i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i>");
            @endif
        @elseif(isset($franchisors[0]) && !isset($franchisors[0]->franchisorLike->bclick))
            franchisorRatings( 0, 1);
        @endif

        @if(isset($franchisors[1]->franchisorLike->bclick))
            @php
                $click         = $franchisors[1]->franchisorLike->bclick;
                $ratings       = $franchisors[1]->franchisorLike->brate;
            @endphp
            @if($ratings != 0)
                franchisorRatings( {{ $ratings/$click }}, 2);
            @else
                $("#rating2").html("<i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i>");
            @endif
        @elseif(isset($franchisors[1]) && !isset($franchisors[1]->franchisorLike->bclick))
            franchisorRatings( 0, 2);
        @endif

        @if(isset($franchisors[2]->franchisorLike->bclick))
            @php
                $click         = $franchisors[2]->franchisorLike->bclick;
                $ratings       = $franchisors[2]->franchisorLike->brate;
            @endphp
            @if($ratings != 0)
                franchisorRatings( {{ $ratings/$click }}, 3);
            @else
                $("#rating3").html("<i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i><i class='fa fa-star-o fa-lg' aria-hidden='true'></i>");
            @endif
        @elseif(isset($franchisors[2]) && !isset($franchisors[2]->franchisorLike->bclick))
            franchisorRatings( 0, 3);
        @endif


        $( "#getListingFirst, #getListingSecond, #getListingThird" ).submit(function( event ) {
           event.preventDefault();

            $.ajax({
                thisId: $(this).attr('id'),
                type: 'GET',
                url: '/get-brands',
                dataType: "json",
                data: $(this).serialize(),
                beforeSend: function () {
                    $("#openComparePopup").click();
                },
                success: function (response) {
                    var checkId = this.thisId;
                    let obj = response;
                    var insertHtml = "";

                    if(obj.length == 0)
                        insertHtml = "Please re-enter different category";

                    $.each( obj, function( key, value ) {
                        // alert( key + ": " + value );
                        var selected = "";
                        var checked = "";
                        let catVal = <?php echo json_encode(Config('constants.investRangeInWords')) ?>;
                        if(key == 0) {
                            checked = "checked";
                            selected = "cheborder";
                        }

                        var imageUrl = "https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/"+ value['company_logo'];

                        if(value['membership_type'] !==  1)
                            imageUrl = "https://www.franchiseindia.com/images/no-img.gif";

                        insertHtml = insertHtml + "<li class=\"" +selected +"\">\n" +
                            "   <div class=\"round\">\n" +
                            "       <input class=\"brandCheckbox\" type=\"radio\" id=\"chk"+ key +"\" value=\""+ value['franchisor_id'] +"\" name=\"franchisor_id\" "+ checked +">\n" +
                            "       <label for=\"chk"+ key +"\" ><span></span></label>\n" +
                            "   </div>\n" +
                            "   <div class=\"imgb\">\n" +
                            "       <a href=\""+ value['url'] +"\"><img src=\""+ imageUrl +"\" alt=\""+ value['company_name'] +"\" /> </a>\n" +
                            "   </div>\n" +
                            "   <div class=\"comhead\">" + value['company_name'] + " <span>" + catVal[value['unit_investment']] + "</span></div>" +
                            "</li>";
                    });

                    if(checkId == "getListingFirst") {
                        $("#comparisonBrandBlockDisplay").html(insertHtml);
                        $("#blockFor").attr('value', 1);
                    }

                    if(checkId == "getListingSecond") {
                        $("#comparisonBrandBlockDisplay").html(insertHtml);
                        $("#blockFor").attr('value', 2);
                    }

                    if(checkId == "getListingThird") {
                        $("#comparisonBrandBlockDisplay").html(insertHtml);
                        $("#blockFor").attr('value', 3);
                    }
                }
            });
        });

        $( "#compareSingleBrand" ).submit(function( event ) {
           event.preventDefault();

            $.ajax({
                blockFor: $("#blockFor").attr('value'),
                type: 'GET',
                url: '/get-brand-compare',
                dataType: "json",
                data: $("#compareSingleBrand").serialize(),
                success: function (response) {
                    $("#closeButton").click();
                    $('#area'+this.blockFor).html(response['area']);
                    $('#invRange'+this.blockFor).html(response['investmentRange']);
                    $('#brandLogo'+this.blockFor).attr('src', response['company_logo']);
                    $('#brandLogoMobile'+this.blockFor).attr('src', response['company_logo']);
                    $('#brandUrl'+this.blockFor).attr('href', response['url']);
                    $('#brandUrlMobile'+this.blockFor).attr('href', response['url']);
                    $('#mainCat'+this.blockFor).html(response['main_cat']);
                    $('#subCat'+this.blockFor).html(response['sub_cat']);
                    $('#subSubCat'+this.blockFor).html(response['sub_sub_cat']);
                    $('#companyName'+this.blockFor).html(response['company_name']);
                    $('#companyNameMobile'+this.blockFor).html(response['company_name']);
                    $('#outlets'+this.blockFor).html(response['no_company_outlets']);
                    $('#brandFee'+this.blockFor).html(response['unitinv_brand_fee']);
                    if(response['unitinv_royalty'] != "" && response['unitinv_royalty'] != "null")
                        $('#comission'+this.blockFor).html(response['unitinv_royalty']+"%");
                    else
                        $('#comission'+this.blockFor).html("");

                    franchisorRatings( response['rating'], this.blockFor);
                }
            });
        });

        $(document).on('click', '.brandCheckbox' , function() {
            $('.cheborder').removeClass('cheborder');
            $(this).parent().parent().addClass('cheborder');
        });
    </script>

@endsection
