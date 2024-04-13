@php
    use Illuminate\Support\Str;
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
    $loginUrl = 'https://www.franchiseindia.com/loginform';
    $loginName = 'Login';
    $class = '';
    $regName = 'Register';
    $regUrl = '#';
    $modelWindow = 'data-toggle=modal data-target=#login-pnl';
    $barndStick = 0;
    $googleSearchTop = 0;
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (request()->segment(1) === 'brands' || (request()->segment(1) === 'hi' && request()->segment(2) === 'brands')) {
        $barndStick = 1;
    }
    $eduUrlSelected = '';
    $wellUrlSelected = '';
    $dotUrlSelected = '';
    $logo = 'logo-black.svg';
    $menuicon = 'menu-icon.png';
    $logoClass = 'logo';
    $mainUrl = '';
    $webtitleUrl = request()->segment(1);
    $mangecls = '';
    if ($webtitleUrl == 'content') {
        $dotUrlSelected = 'class=dropactive';
    }
    if ($webtitleUrl == 'education') {
        $eduUrlSelected = 'class=dropactive';
        $logo = 'education-logo-black.svg';
        $menuicon = 'menu-iconei.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'education';
        $mangecls = 'wiei';
    }
    if ($webtitleUrl == 'wellness') {
        $wellUrlSelected = 'class=dropactive';
        $logo = 'wellness-logo-black.svg';
        $menuicon = 'menu-iconwi.png';
        $logoClass = 'logo wiei';
        $mainUrl = 'wellness';
        $mangecls = 'wiei';
    }
@endphp
<section class="hero-moblie" id="hero-mobile">

    <div class="container-fluid">
        <div class="lnkblk">
            <a href="https://www.franchiseindia.com/brands/direct-english.78387" target="_blank" class="setpat"><img
                    src="https://www.franchiseindia.com/newhomepage/assets/img/direct-english.png"></a>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if (request()->segment(1) == 'hi')
                    <h1>
                        <span>10 हजार से अधिक </span> कारोबारी विक्लपों में अपने लिए तलाश करे
                    </h1>
                    <h2>दुनियाभर में सबसे अधिक तलाश किया जाने वाला फ्रैंचाइज वेबसाइट नेटवर्क।</h2>
                @else
                    <h1>
                        10000+ Business Options
                    </h1>
                    <h2>World's highest visited franchise website network</h2>
                @endif
                <!--  -->
                <div class="hero-search" id="hero-search">
                    <!-- bbotstap 3.3.7 -->
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#categories1" aria-controls="categories1" role="tab"
                                data-toggle="tab">{{ Request::segment(1) == 'hi' ? 'कैटेगरी' : 'Categories' }}</a>
                        </li>
                        <li>
                            <a href="#location1" aria-controls="location1" role="tab"
                                data-toggle="tab">{{ Request::segment(1) == 'hi' ? 'लोकेशन' : 'Location' }}</a>
                        </li>
                        <li>
                            <a href="#investment1" aria-controls="investment1" role="tab"
                                data-toggle="tab">{{ Request::segment(1) == 'hi' ? 'निवेश' : 'Investment' }}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="categories1" class="tab-pane fade in
                                       active">
                            <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                onsubmit="return submitCategory1()">
                                <input type="hidden" name="catTab" value="1">
                                <ul class="hero-search-main">
                                    <li class="p-0 m-0">
                                        <select name="mc"
                                            class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                            id="getMainCategoryDataHeader1"
                                            onchange="getSubCategoryHeader1(this.value)">
                                            <option value="" hidden>Select Industry</option>
                                            @foreach ($catArr as $index => $value)
                                                <option value="{{ $index }}"
                                                    slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                    @if (isset($mc) && $index == $mc) selected @endif>
                                                    {!! $value !!}</option>
                                            @endforeach

                                        </select>
                                    </li>
                                    <li class="p-0 m-0">
                                        <select name="sc" id="getSubCategoryDataHeader1"
                                            onchange="getSubCatCategoryHeader1(this.value)"class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon">
                                            <option value="" hidden>Select Sector</option>
                                        </select>
                                    </li>
                                    <li class="p-0 m-0">
                                        <select
                                            class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                            name="ssc" id="getSubCatCategoryDataHeader1">
                                            <option value="" hidden>Select
                                                Service/Product</option>
                                        </select>
                                    </li>
                                    <li class="p-0 m-0">
                                        <button type="submit"
                                            class="btn
                                                   btn-main
                                                   btn-main-hero"
                                            id="seo-cat-btn-main-hero">
                                            Search
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div id="location1" class="tab-pane fade">
                            <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                onsubmit="return submitLocation1()">
                                <input type="hidden" name="locTab" value="1">
                                <ul class="hero-search-main">
                                    <li class="p-0 m-0">
                                        <select
                                            class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                            name="mc" id="getMainCategoryDataHeaderLoc1">
                                            <option value="" hidden>Select Industry</option>
                                            @foreach ($catArr as $index => $value)
                                                <option value="{{ $index }}"
                                                    slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                    @if (isset($mc) && $index == $mc) selected @endif>
                                                    {!! $value !!}</option>
                                            @endforeach

                                        </select>
                                    </li>
                                    <li class="p-0 m-0">
                                        <select name="loc" id="stateHeader1"
                                            class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                            onchange="getcity1(this.value)">
                                            <option value="" hidden>Select a State</option>
                                            @foreach ($states as $index => $value)
                                                <option value="{{ $index }}"
                                                    slug="{{ strtolower(Str::slug($value)) }}"
                                                    @if (isset($loc[0]) && $loc[0] == $index) selected @endif>
                                                    {!! $value !!}</option>
                                            @endforeach

                                        </select>
                                    </li>
                                    <li class="p-0 m-0">
                                        <select name="city"
                                            class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                            id="headercity1">
                                            <option value="" hidden>Select a City</option>
                                        </select>
                                    </li>
                                    <li class="p-0 m-0">
                                        <button type="submit"
                                            class="btn
                                                   btn-main
                                                   btn-main-hero"
                                            id="seo-loc-btn-main-hero">
                                            Search
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div id="investment1" class="tab-pane fade">
                            <form class="form-horizontal" method="get" action="{{ url('category/searchby') }}"
                                onsubmit="return submitInvestment1()">
                                <input type="hidden" name="invTab" value="1">
                                <ul class="hero-search-main">
                                    <li class="p-0 m-0">
                                        <select name="mc" id="getMainCategoryDataHeaderInv1"
                                            class="form-control form-control-custom dropdown-toogle-icon">
                                            <option value="" hidden>Select Industry</option>
                                            @foreach ($catArr as $index => $value)
                                                <option value="{{ $index }}"
                                                    slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                    @if (isset($mc) && $index == $mc) selected @endif>
                                                    {!! $value !!}</option>
                                            @endforeach

                                        </select>
                                    </li>
                                    <li class="p-0 m-0">
                                        <select name="min_cost"
                                            class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                            id="minAmount1" onchange="selectMax1(this.value)">
                                            <option value="" hidden> Select Min Investment </option>
                                            @foreach (Config('constants.investRangeInWordsSingle') as $index => $value)
                                                <option slug="{{ Config('constants.InvestRange')[$index]['min'] }}"
                                                    @if (isset($minCost)) @if ($minCost == $index) selected @endif
                                                    @endif
                                                    value="{{ $index }}">{!! $value !!}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li class="p-0 m-0">
                                        <select name="max_cost"
                                            class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                            id="maxAmount1">
                                            <option value="" hidden> Select Max Investment </option>

                                        </select>
                                    </li>
                                    <li class="p-0 m-0">
                                        <button type="submit"
                                            class="btn
                                                   btn-main
                                                   btn-main-hero"
                                            id="seo-inv-btn-main-hero">
                                            Search
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <!--  -->

                <!--   <a href="{{ url('investor/create') }}">
                    <div class="btn-main btn-franchise" data-toggle="modal" data-target="#start-franchise">Start a Franchise Business
                        Today
                    </div>
                </a> -->

            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
  
    if (screen.width < 767) {
        $(document).ready(function() {
            setTimeout(function() {
                $("#searchblk").slideUp(800);
                $('#clickhidebtn').show();
                $('#clickshowbtn').hide();
            }, 3000);
            $("#clickhidebtn").click(function() {
                $("#searchblk").slideDown("slow");
                $('#clickhidebtn').hide();
                $('#clickshowbtn').show();
            });
            $("#clickshowbtn").click(function() {
                $("#searchblk").slideUp("slow");
                $('#clickhidebtn').show();
                $('#clickshowbtn').hide();
            });
        });
    }
    $('#registerselect').click(function() {
        $('#registeractive').click();
    });
    $('#loginselect').click(function() {
        $('#loginactive').click();
    });
    $('#mobilereg').click(function() {
        $('#registeractive').click();
    });
    $("#changeLang").on('click', function() {
        $('#langType').slideToggle();
    })
    $('#registerselect1').click(function() {
        $('#login').addClass("active");
        $('#register').removeClass("active");
        $('#loginactiveopen').addClass("active");
        $('#registeractiveopen').removeClass("active");
    });
    $('#loginselect1').click(function() {
        $('#login').removeClass("active");
        $('#register').addClass("active");
        $('#loginactiveopen').removeClass("active");
        $('#registeractiveopen').addClass("active");
    });

    function selectMax1(selectmaxheaderval) {
        let amountConfigArr = {!! json_encode(Config('constants.investRangeInWordsSingle')) !!};
        let maxAmount = $('#maxAmount1');
        let getSlugAmount = {!! json_encode(Config('constants.InvestRange')) !!};
        maxAmount.html("");
        selectmaxheaderval = parseInt(selectmaxheaderval);
        $.each(amountConfigArr, function(key, value) {
            if (key > selectmaxheaderval)
                $('#maxAmount1').append($("<option></option>").attr({
                    "value": key,
                    "slug": getSlugAmount[key]['min']
                }).text(value));
        });
        if (selectmaxheaderval === 21)
            maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
    }

    function getSubCategoryHeader(value) {
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcategory') }}',
            data: {
                categoryID: value
            },
            success: function(data) {
                $("#getSubCategoryDataHeader").html(data);
            }
        });
    }

    function getSubCatCategoryHeader(value) {
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcatcategory') }}',
            data: {
                subcategoryID: value
            },
            success: function(data) {
                $("#getSubCatCategoryDataHeader").html(data);
            }
        });
    }

    function getcity(value) {
        $.ajax({
            type: 'GET',
            url: '{{ url('getcitylist') }}',
            data: {
                state: value
            },
            success: function(data) {
                $("#headercity").html(data);
            }
        });
    }

    {{-- function submitCategory(){var subSubCat=$('#getSubCatCategoryDataHeader').val();var subCat=$('#getSubCategoryDataHeader').val();var mainCat=$('#getMainCategoryDataHeader').val();var url='{{url('business-opportunities')}}/';if(subSubCat){url=url+$('option:selected',$('#getSubCatCategoryDataHeader')).attr('slug')+'.ssc'+subSubCat+"?catTab=1";}else if(subCat){url=url+$('option:selected',$('#getSubCategoryDataHeader')).attr('slug')+'.sc'+subCat+"?catTab=1";}else if(mainCat&&typeof $('option:selected',$('#getMainCategoryDataHeader')).attr('slug')!=="undefined"){url=url+$('option:selected',$('#getMainCategoryDataHeader')).attr('slug')+'.m'+mainCat+"?catTab=1";}else{url=url+'all/all';} --}}
    {{-- window.open(url, '_blank');return false;} --}}
    {{-- function submitLocation(){var mainCat=$('#getMainCategoryDataHeaderLoc').val();var headerCity=$('#headercity').val();var stateHeader=$('#stateHeader').val();var mainCatText=$('option:selected',$('#getMainCategoryDataHeaderLoc')).attr('slug');var headerCityText=$('option:selected',$('#headercity')).attr('slug');var stateHeaderText=$('option:selected',$('#stateHeader')).attr('slug');var url='{{('business-opportunities')}}/';if(mainCat!=''&&stateHeader!=''&&headerCity!=''){url=url+mainCatText+"-in-"+stateHeaderText+"/mc-"+mainCat+"/loc-"+stateHeader+"/ct-"+headerCityText;}else if(mainCat!=''&&stateHeader!=''){url=url+mainCatText+"-in-"+stateHeaderText+"/mc-"+mainCat+"/loc-"+stateHeader;}else if(stateHeader!=''&&headerCity!=''){url=url+"business-in-"+stateHeaderText+"/loc-"+stateHeader+"/ct-"+headerCityText;}else if(stateHeader!=''){url=url+stateHeaderText+".LOC"+stateHeader;}else{url=url+mainCat+".m"+mainCatText;} --}}
    {{-- window.open(url + "?locTab=1", '_blank');return false;} --}}
    {{-- function submitInvestment(){var mainCat=$('#getMainCategoryDataHeaderInv').val();var minAmount=$('#minAmount').val();var maxAmount=$('#maxAmount').val();var mainCatText=$('option:selected',$('#getMainCategoryDataHeaderInv')).attr('slug');var minAmountText=$('option:selected',$('#minAmount')).attr('slug');var maxAmountText=$('option:selected',$('#maxAmount')).attr('slug');var url='https://www.franchiseindia.com/business-opportunities/';if(mainCat!=''&&minAmount!=''&&maxAmount!=''){url=url+mainCatText+"-in-india/mc-"+mainCat+"/range-"+minAmountText+"-"+maxAmountText;}else if(mainCat!=''&&minAmount!=''){url=url+mainCatText+"-in-india/mc-"+mainCat+"/range-"+minAmountText;}else if(minAmount!=''&&maxAmount!=''){url=url+"business/range-"+minAmountText+"-"+maxAmountText;} --}}
    {{-- window.open(url + "?invTab=1", '_blank');return false;} --}}

    function getSubCategoryHeader1(value) {
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcategory') }}',
            data: {
                categoryID: value
            },
            success: function(data) {
                $("#getSubCategoryDataHeader1").html(data);
            }
        });
    }

    function getSubCatCategoryHeader1(value) {
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcatcategory') }}',
            data: {
                subcategoryID: value
            },
            success: function(data) {
                $("#getSubCatCategoryDataHeader1").html(data);
            }
        });
    }

    function getcity1(value) {
        $.ajax({
            type: 'GET',
            url: '{{ url('getcitylist') }}',
            data: {
                state: value
            },
            success: function(data) {
                $("#headercity1").html(data);
            }
        });
    }
    {{-- function submitCategory1(){var subSubCat=$('#getSubCatCategoryDataHeader1').val();var subCat=$('#getSubCategoryDataHeader1').val();var mainCat=$('#getMainCategoryDataHeader1').val();var url='{{url('business-opportunities')}}/';if(subSubCat){url=url+$('option:selected',$('#getSubCatCategoryDataHeader1')).attr('slug')+'.ssc'+subSubCat+"?catTab=1";}else if(subCat){url=url+$('option:selected',$('#getSubCategoryDataHeader1')).attr('slug')+'.sc'+subCat+"?catTab=1";}else if(mainCat&&typeof $('option:selected',$('#getMainCategoryDataHeader1')).attr('slug')!=="undefined"){url=url+$('option:selected',$('#getMainCategoryDataHeader1')).attr('slug')+'.m'+mainCat+"?catTab=1";}else{url=url+'all/all';} --}}
    {{-- window.open(url, '_blank');return false;} --}}
    {{-- function submitLocation1(){var mainCat=$('#getMainCategoryDataHeaderLoc1').val();var headerCity=$('#headercity1').val();var stateHeader=$('#stateHeader1').val();var mainCatText=$('option:selected',$('#getMainCategoryDataHeaderLoc1')).attr('slug');var headerCityText=$('option:selected',$('#headercity1')).attr('slug');var stateHeaderText=$('option:selected',$('#stateHeader1')).attr('slug');var url='{{('business-opportunities')}}/';if(mainCat!=''&&stateHeader!=''&&headerCity!=''){url=url+mainCatText+"-in-"+stateHeaderText+"/mc-"+mainCat+"/loc-"+stateHeader+"/ct-"+headerCityText;}else if(mainCat!=''&&stateHeader!=''){url=url+mainCatText+"-in-"+stateHeaderText+"/mc-"+mainCat+"/loc-"+stateHeader;}else if(stateHeader!=''&&headerCity!=''){url=url+"business-in-"+stateHeaderText+"/loc-"+stateHeader+"/ct-"+headerCityText;}else if(stateHeader!=''){url=url+stateHeaderText+".LOC"+stateHeader;}else{url=url+mainCat+".m"+mainCatText;} --}}
    {{-- window.open(url + "?locTab=1", '_blank');return false;} --}}
    {{-- function submitInvestment1(){var mainCat=$('#getMainCategoryDataHeaderInv1').val();var minAmount=$('#minAmount1').val();var maxAmount=$('#maxAmount1').val();var mainCatText=$('option:selected',$('#getMainCategoryDataHeaderInv1')).attr('slug');var minAmountText=$('option:selected',$('#minAmount1')).attr('slug');var maxAmountText=$('option:selected',$('#maxAmount1')).attr('slug');var url='https://www.franchiseindia.com/business-opportunities/';if(mainCat!=''&&minAmount!=''&&maxAmount!=''){url=url+mainCatText+"-in-india/mc-"+mainCat+"/range-"+minAmountText+"-"+maxAmountText;}else if(mainCat!=''&&minAmount!=''){url=url+mainCatText+"-in-india/mc-"+mainCat+"/range-"+minAmountText;}else if(minAmount!=''&&maxAmount!=''){url=url+"business/range-"+minAmountText+"-"+maxAmountText;} --}}
    {{-- window.open(url + "?invTab=1", '_blank');return false;} --}}


    $(document).ready(function() {
        $('#searchoptnew').click(function() {
            $('.searchblknew').show(400);
            $('.searchspace').hide(400);
        });
        $('#closegsearch').click(function() {
            $('.searchspace').show(400);
            $('.searchblknew').hide(400);
        });
        if (screen.width > 1199 && screen.height <= 768)
            $(".gsc-wrapper").css({
                "max-height": "340px",
                "overflow": "auto"
            });
        $('#searchopt').click(function() {
            $('.open').click();
            $('.searchoption').toggle(400);
            return false;
        });
        $('#searchopt2').click(function() {
            $('.searchoption').hide(400);
        });
        $('.dropdown-toggle').click(function() {
            $('.searchoption').hide(400);
        });
    });
</script>
