<style type="text/css">.content{display:none}.subcontent{display:none}</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<div class="loadman" id="loading" style="display:none">
    <div class="thanku">
        <div class="tbl-cell">
            <div class="loader"></div>
        </div></div>
</div>
<div class="col-xs-12 col-sm-4 col-md-3 row-no-padding catleft" id="sideslide">
    <div id="closecat"><i class="fa fa-times fa-lg" aria-hidden="true"></i></div>
    <div class="bor-radius">
        <div class="sidedtc pad20">स्थान के अनुसार ब्राउज़ करें</div>
        <div class="cat-filter">
            <div class="cat-type">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#franchise" aria-controls="franchise" role="tab" data-toggle="tab">Top City</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="franchise">
                        <div class="category-fltr">
                            <div class="category-lst" id="categoryunselect">
                                <ul>
                                    @php
                                        $cityArr = Config('location.Hindicity');
                                        $englishCityNames = [
                                            "आगरा" => "Agra",
                                            "अहमदाबाद" => "Ahmedabad",
                                            "अमृतसर" => "Amritsar",
                                            "औरंगाबाद" => "Aurangabad",
                                            "बेंगलुरु" => "Bengaluru",
                                            "भोपाल" => "Bhopal",
                                            "भुवनेश्वर" => "Bhubaneswar",
                                            "चंडीगढ़" => "Chandigarh",
                                            "चेन्नई" => "Chennai",
                                            "कोयंबटूर" => "Coimbatore",
                                            "देहरादून" => "Dehradun",
                                            "फरीदाबाद" => "Faridabad",
                                            "गाजियाबाद" => "Ghaziabad",
                                            "गुरुग्राम" => "Gurugram",
                                            "गुवाहाटी" => "Guwahati",
                                            "हैदराबाद" => "Hyderabad",
                                            "इंदौर" => "Indore",
                                            "जबलपुर" => "Jabalpur",
                                            "जयपुर" => "Jaipur",
                                            "जमशेदपुर" => "Jamshedpur",
                                            "जोधपुर" => "Jodhpur",
                                            "कानपुर" => "Kanpur",
                                            "कोच्चि" => "Kochi",
                                            "कोलकाता" => "Kolkata",
                                            "कोटा" => "Kota",
                                            "लखनऊ" => "Lucknow",
                                            "लुधियाना" => "Ludhiana",
                                            "मदुरै" => "Madurai",
                                            "मैंगलोर" => "Mangalore",
                                            "मेरठ" => "Meerut",
                                            "मुंबई" => "Mumbai",
                                            "मैसूरु" => "Mysuru",
                                            "नागपुर" => "Nagpur",
                                            "नासिक" => "Nashik",
                                            "नवी मुंबई" => "Navi Mumbai",
                                            "नई दिल्ली" => "New Delhi",
                                            "नोएडा" => "Noida",
                                            "पटना" => "Patna",
                                            "प्रयागराज" => "Prayagraj",
                                            "पुणे" => "Pune",
                                            "रायपुर" => "Raipur",
                                            "राजकोट" => "Rajkot",
                                            "रांची" => "Ranchi",
                                            "शिमला" => "Shimla",
                                            "सूरत" => "Surat",
                                            "तिरुवनंतपुरम" => "Thiruvananthpuram",
                                            "उदयपुर" => "Udaipur",
                                            "वडोदरा" => "Vadodara",
                                            "वाराणसी" => "Varanasi",
                                            "विजयवाड़ा" => "Vijayawada",
                                            "विशाखापत्तनम" => "Visakhapatnam"
                                        ];
                                    @endphp

                                    @foreach($cityArr as $indexcity => $city)
                                        @php
                                            $trimmedCity = trim($city);
                                            $citySlug = strtolower(str_replace(' ', '-', $englishCityNames[$trimmedCity]));
                                        @endphp
                                        <li>
                                            <div class="radio">
                                                <label>
                                                    <a href="{{url('/location').'/'.$citySlug}}" > {{$trimmedCity}} </a>
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @desktop
    <div class="catleftbanner300 catleftban">
        @include("includes.banners.dfp_300X600")
    </div>
    <div class="catleftbanner300">
        @include("includes.banners.google_300X600")
    </div>
    <div class="catleftyahoobanner300">
        @include("includes.banners.yahoo_300X600")
    </div>
    @enddesktop

    {{--@notmobile--}}
    {{--<div class="catleftbanner300 catleftban">--}}
    {{--@include("includes.banners.dfp_300X600")--}}
    {{--</div>--}}
    {{--<div class="catleftbanner300">--}}
    {{--@include("includes.banners.google_300X600")--}}
    {{--</div>--}}
    {{--<div class="catleftyahoobanner300">--}}
    {{--@include("includes.banners.yahoo_300X600")--}}
    {{--</div>--}}
    {{--@endnotmobile--}}
</div>
<script language="javascript">/*<![CDATA[*/$(document).on('click','.cat-disable',function(event){event.preventDefault();var input=$(this).attr('id');input=input.replace("a","");$("#"+input).prop('checked','checked');$("#"+input).trigger('click');});$(document).on('click','.sub-cat-disable',function(event){event.preventDefault();var input=$(this).attr('id');input=input.replace("a","");$("#"+input).prop('checked','checked');$("#"+input).trigger('click');});$(document).on('click','.sub-sub-cat-disable',function(event){event.preventDefault();var input=$(this).attr('id');input=input.replace("a","");$("#"+input).trigger('click');});$(document).on('click','.states-link-disable',function(event){event.preventDefault();var input=$(this).attr('id');input=input.replace("a","");$("#"+input).trigger('click');});function getLocationType(){var location_str=[];$('input[name="state[]"]:checked').each(function(){location_str.push($(this).val());});return location_str;}
    function getFranchiseType(){return $("input:radio[name=franchise_type]:checked").val();}
    function getMainCatId(){var mainCatId=$("input:radio[name=mainCat]:checked").val();return(mainCatId!==undefined)?mainCatId:'';}
    function getSubCatId(){var subCatId=$("input:radio[name=subcat]:checked").val();return(subCatId!==undefined)?subCatId:'';}
    function getSubSubCatId(){var subSubCat=[];$('input[name="subSubCat[]"]:checked').each(function(){subSubCat.push($(this).val());});return subSubCat;}
    function getPriceRange(a,b){var minvaluerange=a;var maxvaluerange=b;$('#minvaluerange').prop('value',minvaluerange);$('#maxvaluerange').prop('value',maxvaluerange);}
    function getsortby(){return $('#sortbynew :selected').val();}
    function getCategoryList(){var locStr=getLocationType();var franchiseType=getFranchiseType();var mainCatmId=getMainCatId();var subCat=getSubCatId();var subSubCat=getSubSubCatId();var sortby=getsortby();var rangeMin=$('#minvaluerange').val();var rangeMax=$('#maxvaluerange').val();var sort=(sortby&&sortby!='x')?"?sortby="+sortby:"";locStr.sort(function(a,b){return parseInt(a)-parseInt(b);});if(franchiseType==""&&subSubCat.length===0&&mainCatmId==''&&locStr.length===0&&(rangeMin!=10000||rangeMax!=100000000)){window.location="/business-opportunities/business/range-"+rangeMin+"-"+rangeMax;return;}
        if(franchiseType==""&&subSubCat.length===0&&mainCatmId==''&&locStr.length===0&&rangeMin==10000&&rangeMax==100000000){window.location="/business-opportunities/all/all";return;}
        if(franchiseType>=1&&subSubCat.length===0&&mainCatmId==''&&locStr.length===0&&rangeMin==10000&&rangeMax==100000000){window.location=$("input:radio[value='"+franchiseType+"'][class='franType']").attr('url');return;}
        if(subSubCat.length===1&&locStr.length===0&&franchiseType==''&&rangeMin==10000&&rangeMax==100000000){window.location=$("input:checkbox[value='"+subSubCat[0]+"'][class='subSubCat']").attr('url')+sort;return;}
        if(subSubCat.length===0&&mainCatmId==''&&franchiseType==''&&locStr.length===1&&rangeMin==10000&&rangeMax==100000000){window.location=$("input:checkbox[value='"+locStr[0]+"'][class='statecheckbox']").attr('url')+sort;return;}
        if(subSubCat.length===0&&mainCatmId==''&&locStr.length===1&&franchiseType>=1&&rangeMin==10000&&rangeMax==100000000){var ft=$("input:radio[value='"+franchiseType+"'][class='franType']").attr('slug')
            var loc=$("input:checkbox[value='"+locStr[0]+"'][class='statecheckbox']").attr('slug')
            window.location="/business-opportunities/business-"+ft+"-in-"+loc+"/loc-"+locStr.join("-")+"/ft-"+franchiseType+sort;return;}
        if(subSubCat.length===0&&mainCatmId==''&&locStr.length>1&&franchiseType>=1&&rangeMin==10000&&rangeMax==100000000){var ft=$("input:radio[value='"+franchiseType+"'][class='franType']").attr('slug')
            window.location="/business-opportunities/business-"+ft+"-in-india/loc-"+locStr.join("-")+"/ft-"+franchiseType+sort;return;}
        if(subSubCat.length===0&&mainCatmId==''&&locStr.length>1&&rangeMin==10000&&rangeMax==100000000){window.location="/business-opportunities/business-in-india/loc-"+locStr.join("-")+sort;return;}
        if(subSubCat.length===0&&subCat!==''&&locStr.length===0&&franchiseType==''&&rangeMin==10000&&rangeMax==100000000){window.location=$("input:radio[value='"+subCat+"'][class='subcatselect']").attr('url')+sort;return;}
        if(subSubCat.length===0&&mainCatmId!==''&&locStr.length===0&&franchiseType==''&&rangeMin==10000&&rangeMax==100000000){window.location=$("input:radio[value='"+mainCatmId+"'][class='mainCat']").attr('url')+sort;return;}
        $('#loc').prop('value',locStr);$('#ftype').prop('value',franchiseType);$('#mc').prop('value',mainCatmId);$('#sc').prop('value',subCat);$('#ssc').prop('value',subSubCat);$('#sortby').prop('value',sortby);console.log(subSubCat);var location="india";var catText=$("input:radio[value='"+mainCatmId+"'][class='mainCat']").attr('slug');var catId="mc-"+mainCatmId;if(locStr.length===1){location=$("input:checkbox[value='"+locStr[0]+"'][class='statecheckbox']").attr('slug');}
        if(subSubCat.length===1){catText=$("input:checkbox[value='"+subSubCat[0]+"'][class='subSubCat']").attr('slug');catId="ssc-"+subSubCat[0];}else if((subSubCat.length>1)||(subSubCat.length===0&&subCat)){catText=$("input:radio[value='"+subCat+"'][class='subcatselect']").attr('slug');if(subSubCat.length>1){catId="ssc-"+subSubCat.join('-');}else{catId="sc-"+subCat;}}
        var url="/business-opportunities/"+catText;if(franchiseType&&franchiseType>=1){url+="-"+$("input:radio[value='"+franchiseType+"'][class='franType']").attr('slug');}
        url+="-in-"+location;if(franchiseType&&franchiseType>=1){url+="/ft-"+franchiseType;}
        url+="/"+catId;if(locStr.length>0){url+="/loc-"+locStr.join("-");}
        if(rangeMin!=10000||rangeMax!=100000000){url+="/range-"+rangeMin+"-"+rangeMax;}
        window.location=url+sort;$('#loading').css('display','block');}
    $(".franType, .statecheckbox, #price-range").click(function(){getCategoryList();});$(".mainCat").click(function(){$('.subcatselect').prop('checked',false);$('.subSubCat').prop('checked',false);getCategoryList();});$(".subcatselect").click(function(){$('.subSubCat').prop('checked',false);var mainCat=$(this).attr('mainCat');$('#optionsRadios'+mainCat).prop('checked',true);getCategoryList();});$(".subSubCat").click(function(){var mainCat=$(this).attr('mainCat');var subCat=$(this).attr('subCat');var subsubCatid='cat-'+mainCat+'-'+subCat+'_1';$('#optionsRadiosSub'+mainCat+'_'+subCat).prop('checked',true);$('#optionsRadios'+mainCat).prop('checked',true);$("#categoryunselect input[type=checkbox]").each(function(){if($(this).parent().parent().parent().parent().attr('id')!=subsubCatid)
        $(this).attr("checked",false);});getCategoryList();});$('#price-range').mouseup(function(){getCategoryList();});function changeFunction(){getCategoryList();}
    $('.trigger').click(function(){$('.content').hide();$('.'+$(this).data('rel')).show();$("input.group1").removeAttr("disabled").removeAttr("checked");});$('.subtrigger').click(function(){$('.subcontent').hide();$('.'+$(this).data('rel')).show();});/*]]>*/

    @if(isset($mc) && $mc == 5)
        $('.logo a img').attr('src', '{{ url('images/dealers-india/dealer-logo.png') }}');
    $('.logo a').attr('href', '{{ url('/business-opportunities/dealers-and-distributors.m5') }}');
    $('.logo a img').attr('width', '200px');
    $('#c-button--slide-left img').attr('src', '{{ url('images/menu-iconei.png') }}');
    @endif

</script>