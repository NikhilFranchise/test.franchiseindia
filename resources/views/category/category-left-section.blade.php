<style type="text/css">.content{display:none}.subcontent{display:none}</style>
@php
use Illuminate\Support\Str;

    if(empty($minRangeValue))
    $minRangeValue = 10000;
    if(empty($maxRangevalue))
    $maxRangevalue = 100000000;
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script language="javascript">/*<![CDATA[*/
    var minval = 10000;
    var maxval = 100000000;
    $(function () {
        $("#price-range").slider({
            range: true,
            min: minval,
            max: maxval,
            values: [{{$minRangeValue}},{{$maxRangevalue}}],
            slide: function (event, ui) {
                var minval = ui.values[0];
                var maxval = ui.values[1];
                $('#minval').html(minexact(minval));
                $('#maxval').html(maxexact(maxval));
                getPriceRange(minval, maxval);
            },
            change: function (event, ui) {
                var minval = ui.values[0];
                var maxval = ui.values[1];
                getPriceRange(minval, maxval);
            }
        });
    });
    function minexact(minval) {
        if (minval <= 99999)
            return minval;
        if (minval >= 10000000)
            minval = (minval / 10000000).toFixed(2) + ' Cr';
        else if (minval >= 100000)
            minval = (minval / 100000).toFixed(2) + ' Lakh';
        return minval;
    }
    function maxexact(maxval) {
        if (maxval <= 99999)
            return maxval;
        if (maxval >= 10000000)
            maxval = (maxval / 10000000).toFixed(2) + ' Cr';
        else if (maxval >= 100000)
            maxval = (maxval / 100000).toFixed(2) + ' Lakh';

        return maxval;
    }
    /*]]>*/</script>
<div class="loadman" id="loading" style="display:none">
    <div class="thanku">
        <div class="tbl-cell">
            <div class="loader"></div>
        </div></div>
</div>
<div class="col-xs-12 col-sm-4 col-md-3 row-no-padding catleft" id="sideslide">
    <div id="closecat"><i class="fa fa-times fa-lg" aria-hidden="true"></i></div>
    <div class="bor-radius">
        <div class="sidedtc pad20">Business Categories</div>
        <div class="cat-filter">
            <div class="cat-type">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#franchise" aria-controls="franchise" role="tab" data-toggle="tab">Franchise</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="franchise">
                        <div class="category-fltr">
                            <div class="category-lst" id="categoryunselect">
                                <ul>
                                    @php
                                        $categArr = Config('constants.CategoryArr');
                                        asort($categArr);
                                    @endphp
                                    @foreach($categArr as $indexMainCat => $mainCat)
                                        @php
                                            $url = Config('constants.MainDomain').'/business-opportunities/'.Config('category.SeoCategoryArr.'.$indexMainCat).'.m'.$indexMainCat;
                                            $mainCheck = "";
                                            $display = "none";
                                            if(isset($mc) && $mc == $indexMainCat){
                                            $mainCheck = "checked";
                                            $display = "block";
                                            }
                                        @endphp
                                        <li>
                                            <a href="JavaScript:Void(0)" class="accordian-arrow main-lst" id="cat-{{ $indexMainCat }}" onclick="accordionCategory(this.id)"></a>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" {{ $mainCheck }} slug="{{Config('category.SeoCategoryArr.'.$indexMainCat)}}" name="mainCat" url="{{$url}}" class="mainCat" id="optionsRadios{{ $indexMainCat }}" value="{{ $indexMainCat }}">
                                                    <a href="{{$url}}" class="cat-disable" id="aoptionsRadios{{ $indexMainCat }}"> {{$mainCat}} </a>
                                                </label>
                                            </div>
                                            <ul class="cat-main-list" id="cat-{{ $indexMainCat }}_1" style="display:{{$display}}">
                                                @foreach (Config('constants.subCategoryArr.'.$indexMainCat) as $subCatIndex => $subCat)
                                                    @php
                                                        $subCatUrl = Config('constants.MainDomain').'/business-opportunities/'.Config('category.SeoSubCategoryArr.'.$subCatIndex).'.sc'.$subCatIndex;
                                                        $subCheck = "";
                                                        $displaysc = "none";
                                                        if(isset($sc) && $sc == $subCatIndex){
                                                        $subCheck = "checked";
                                                        $displaysc = "block";
                                                        }
                                                    @endphp
                                                    <li>
                                                        <a href="JavaScript:Void(0)" class="accordian-arrow sub-lst" id="cat-{{ $indexMainCat }}-{{ $subCatIndex }}" onclick="accordionSubCategory(this.id)"></a>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input value="{{ $subCatIndex }}" {{ $subCheck }} slug="{{Config('category.SeoSubCategoryArr.'.$subCatIndex)}}" mainCat="{{$indexMainCat}}" id="optionsRadiosSub{{ $indexMainCat }}_{{ $subCatIndex }}" url="{{$subCatUrl}}" name="subcat" class="subcatselect" type="radio">
                                                                <a href="{{$subCatUrl}}" class="sub-cat-disable" id="aoptionsRadiosSub{{ $indexMainCat }}_{{ $subCatIndex }}">
                                                                    {{ $subCat }}
                                                                </a>
                                                            </label>
                                                        </div>
                                                        <ul class="cat-sub-list" id="cat-{{ $indexMainCat }}-{{ $subCatIndex }}_1" style="display:{{$displaysc}}">
                                                            @foreach (Config('constants.subSubCategoryArr.'.$subCatIndex) as $subSubCatIndex => $subSubCat)
                                                                @php
                                                                    $subsubcatchecked = "";
                                                                    if (!is_array($ssc)) {
                                                                    $sscArr = explode(',', $ssc);
                                                                    } else {
                                                                    $sscArr = $ssc;
                                                                    }
                                                                    if(in_array($subSubCatIndex, $sscArr))
                                                                    $subsubcatchecked = "checked";
                                                                    $subsubCatUrl = Config('constants.MainDomain').'/business-opportunities/'.Config('category.SeoSubSubCategoryArr.'.$subSubCatIndex).'.ssc'.$subSubCatIndex;
                                                                @endphp
                                                                @if(in_array($subSubCatIndex, json_decode(Storage::get('ssc.json'), true)))
                                                                    <li>
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input value="{{ $subSubCatIndex }}" {{ $subsubcatchecked }} slug="{{Config('category.SeoSubSubCategoryArr.'.$subSubCatIndex)}}" mainCat="{{$indexMainCat}}" subCat="{{$subCatIndex}}" subCat="{{$subCatIndex}}" id="optionsRadiosSubSub{{ $indexMainCat }}_{{ $subSubCatIndex }}" class="subSubCat" name="subSubCat[]" type="checkbox" url="{{ $subsubCatUrl }}" />
                                                                                <a href="{{$subsubCatUrl}}" class="sub-sub-cat-disable" id="aoptionsRadiosSubSub{{ $indexMainCat }}_{{ $subSubCatIndex }}">
                                                                                    {{ $subSubCat }}
                                                                                </a>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="filter-type">
                            <div class="filter-ttl">Franchise Type</div>
                            <div class="franchise-list">
                                <ul>
                                    @php
                                        $masterfranchisetype = Config('constants.masterfranchiseType');
                                    @endphp
                                    <li>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" @if($ftype !=1 && $ftype !=2 && $ftype !=3) checked @endif class="franType" name="franchise_type" value="">
                                                All
                                            </label>
                                        </div>
                                    </li>
                                    @foreach ($masterfranchisetype as $key => $value)
                                        <li>
                                            <div class="radio">
                                                <label>
                                                    @php
                                                        $ftypeCheck = "";
                                                        if($ftype == $key)
                                                        $ftypeCheck = "checked";
                                                    @endphp
                                                    <input type="radio" slug="{{Str::slug($value)}}" {{$ftypeCheck}} url="{{Config('MainDomain')}}/business-opportunities/{{strtolower(Str::slug($value))}}.FT{{ $key }}" class="franType" name="franchise_type" id="ftype{{$key}}" value={{$key}}>
                                                    <a href="{{Config('MainDomain')}}/business-opportunities/{{strtolower(Str::slug($value))}}.FT{{ $key }}" id="aftype{{$key}}" class="sub-cat-disable">
                                                        {{$value}}
                                                    </a>
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="filter-type">
                            <div class="filter-ttl">Price Range</div>
                            <div class="price-pad" id="price-range"></div>
                            <div class="sliderval">
                                @php
                                    $minvalueSlider = $minRangeValue;
                                    if($minvalueSlider <=9999999 && $minvalueSlider> 100000)
                                    $minvalueSlider = substr(($minvalueSlider/100000),0,5).' Lakh';
                                    if($minvalueSlider > 9999999)
                                    $minvalueSlider = substr(($minvalueSlider/10000000),0,5).' Cr';
                                    $maxvalueSlider = $maxRangevalue;
                                    if($maxvalueSlider <=9999999 && $maxvalueSlider> 100000)
                                    $maxvalueSlider = substr(($maxvalueSlider/100000),0,5).' Lakh';
                                    if($maxvalueSlider > 9999999)
                                    $maxvalueSlider = substr(($maxvalueSlider/10000000),0,5).' Cr';
                                @endphp
                                <div class="pull-left" name="minval" id="minval" value="">{{$minvalueSlider}}</div>
                                <div class="pull-right" name="maxval" id="maxval" value="">{{$maxvalueSlider}}</div>
                            </div>
                        </div>
                        <div class="filter-type LocFltr">
                            <div class="filter-ttl rm-bdr">Location</div>
                            <div class="category-fltr">
                                <div class="category-lst">
                                    <ul>
                                        @php
                                            $l = 0;
                                            $state = Config('location.stateArr');
                                            asort($state);
                                            if (empty($loc))
                                            $loc = Array();
                                        @endphp
                                        @foreach ($state as $stateId => $stateValue)
                                            @php
                                                $stateChecked = "";
                                                if(in_array($stateId, $loc))
                                                $stateChecked = "checked";
                                            @endphp
                                            <li>
                                                <div class="checkbox">
                                                    <label>
                                                        <input value="{{$stateId}}" {{$stateChecked}} name="state[]" slug="{{strtolower(Str::slug($stateValue))}}" class="statecheckbox" id="location{{$l}}" type="checkbox" url="{{Config('MainDomain')}}/business-opportunities/{{strtolower(Str::slug($stateValue))}}.LOC{{ $stateId }}">
                                                        <a href="{{Config('MainDomain')}}/business-opportunities/{{strtolower(Str::slug($stateValue))}}.LOC{{ $stateId }}" class="states-link-disable" id="alocation{{$l}}">
                                                            {{$stateValue}}
                                                        </a>
                                                    </label>
                                                </div>
                                            </li>
                                            @php
                                                $l++;
                                            @endphp
                                        @endforeach
                                        <form method="get" action="{{Config('constants.MainDomain')}}/category/search">
                                            <input type="hidden" name="loc" id="loc" value="">
                                            <input type="hidden" name="ftype" id="ftype" value="">
                                            <input type="hidden" name="mc" id="mc" value="">
                                            <input type="hidden" name="sc" id="sc" value="">
                                            <input type="hidden" name="ssc" id="ssc" value="">
                                            <input type="hidden" name="sortby" id="sortby" value="">
                                            <input type="hidden" name="minrange" id="minvaluerange" value="@if(isset($minRangeValue)){{$minRangeValue}}@endif">
                                            <input type="hidden" name="maxrange" id="maxvaluerange" value="@if(isset($maxRangevalue)){{$maxRangevalue}}@endif">
                                            <input type="submit" id="formsubmit" style="display:none">
                                        </form>
                                    </ul>
                                </div>
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
   
</div>
<script language="javascript">/*<![CDATA[*/$(document).on('click','.cat-disable',function(event){event.preventDefault();var input=$(this).attr('id');input=input.replace("a","");$("#"+input).prop('checked','checked');$("#"+input).trigger('click');});$(document).on('click','.sub-cat-disable',function(event){event.preventDefault();var input=$(this).attr('id');input=input.replace("a","");$("#"+input).prop('checked','checked');$("#"+input).trigger('click');});$(document).on('click','.sub-sub-cat-disable',function(event){event.preventDefault();var input=$(this).attr('id');input=input.replace("a","");$("#"+input).trigger('click');});$(document).on('click','.states-link-disable',function(event){event.preventDefault();var input=$(this).attr('id');input=input.replace("a","");$("#"+input).trigger('click');});function getLocationType(){var location_str=[];$('input[name="state[]"]:checked').each(function(){location_str.push($(this).val());});return location_str;}
    function getFranchiseType(){return $("input:radio[name=franchise_type]:checked").val();}
    function getMainCatId(){var mainCatId=$("input:radio[name=mainCat]:checked").val();return(mainCatId!==undefined)?mainCatId:'';}
    function getSubCatId(){var subCatId=$("input:radio[name=subcat]:checked").val();return(subCatId!==undefined)?subCatId:'';}
    function getSubSubCatId(){var subSubCat=[];$('input[name="subSubCat[]"]:checked').each(function(){subSubCat.push($(this).val());});return subSubCat;}
    function getPriceRange(a,b){var minvaluerange=a;var maxvaluerange=b;
        console.log(a,b);
        fetchPriceData(minvaluerange, maxvaluerange);
        // $('#minvaluerange').prop('value',minvaluerange);$('#maxvaluerange').prop('value',maxvaluerange);
        // alert(maxvaluerange);
    }
    function getsortby(){return $('#sortbynew :selected').val();}
    function getCategoryList(){
        var locStr=getLocationType();var franchiseType=getFranchiseType();var mainCatmId=getMainCatId();var subCat=getSubCatId();var subSubCat=getSubSubCatId();var sortby=getsortby();var rangeMin=$('#minvaluerange').val();var rangeMax=$('#maxvaluerange').val();
        // console.log(rangeMin);
        var sort=(sortby&&sortby!='x')?"?sortby="+sortby:"";locStr.sort(function(a,b){return parseInt(a)-parseInt(b);});if(franchiseType==""&&subSubCat.length===0&&mainCatmId==''&&locStr.length===0&&(rangeMin!=10000||rangeMax!=100000000)){window.location="/business-opportunities/business/range-"+rangeMin+"-"+rangeMax;return;}
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
    $(".franType, .statecheckbox").click(function(){getCategoryList();});$(".mainCat").click(function(){$('.subcatselect').prop('checked',false);$('.subSubCat').prop('checked',false);getCategoryList();});$(".subcatselect").click(function(){$('.subSubCat').prop('checked',false);var mainCat=$(this).attr('mainCat');$('#optionsRadios'+mainCat).prop('checked',true);getCategoryList();});$(".subSubCat").click(function(){var mainCat=$(this).attr('mainCat');var subCat=$(this).attr('subCat');var subsubCatid='cat-'+mainCat+'-'+subCat+'_1';$('#optionsRadiosSub'+mainCat+'_'+subCat).prop('checked',true);$('#optionsRadios'+mainCat).prop('checked',true);$("#categoryunselect input[type=checkbox]").each(function(){if($(this).parent().parent().parent().parent().attr('id')!=subsubCatid)
        $(this).attr("checked",false);});getCategoryList();});
        // $('#price-range').mouseup(function(){getCategoryList();}); 
        function changeFunction(){getCategoryList();}
    $('.trigger').click(function(){$('.content').hide();$('.'+$(this).data('rel')).show();$("input.group1").removeAttr("disabled").removeAttr("checked");});$('.subtrigger').click(function(){$('.subcontent').hide();$('.'+$(this).data('rel')).show();});/*]]>*/

    @if(isset($mc) && $mc == 5)
        $('.logo a img').attr('src', '{{ url('images/dealers-india/dealer-logo.png') }}');
    $('.logo a').attr('href', '{{ url('/business-opportunities/dealers-and-distributors.m5') }}');
    $('.logo a img').attr('width', '200px');
    $('#c-button--slide-left img').attr('src', '{{ url('images/menu-iconei.png') }}');
    @endif

</script>


<script>
    var shuffledResults = @json($shuffledResults);

    function fetchPriceData(minvaluerange, maxvaluerange) {
    // Show the loader
    $('#loader').show();
    $('#renderedData').empty(); // Clear the current data while loading

    // AJAX request to fetch the data
    $.ajax({
        url: '/price_filter', // The URL to call
        type: 'POST', // Method type
        data: {
            minvaluerange: minvaluerange,
            maxvaluerange: maxvaluerange,
            // shuffledResults: shuffledResults // Pass the dataset, if needed
        },
        dataType: 'json', // Expecting JSON response
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for security
        },
        success: function (response) {
            console.log('Response:', response);

            // Hide the loader after data is rendered
            $('#loader').hide();

            // Check if response is empty
            if (response.length === 0) {
                $('#prannge').html('<p>No data available.</p>');
            } else {
                $('#prannge').html(response.html);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
            
            // Hide the loader even on error
            $('#loader').hide();
        }
    });
}
</script>
