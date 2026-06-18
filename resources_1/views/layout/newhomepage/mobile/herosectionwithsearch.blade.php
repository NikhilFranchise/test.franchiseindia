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

    // function selectMax1(selectmaxheaderval) {
    //     // console.log(selectmaxheaderval);
    //     let amountConfigArr = {!! json_encode(Config('constants.investRangeInWordsSingle')) !!};
    //     let maxAmount = $('#maxAmount2');
    //     let getSlugAmount = {!! json_encode(Config('constants.InvestRange')) !!};
    //     maxAmount.html("");
    //     selectmaxheaderval = parseInt(selectmaxheaderval);
    //     $.each(amountConfigArr, function(key, value) {
    //         if (key > selectmaxheaderval)
    //             $('#maxAmount2').append($("<option></option>").attr({
    //                 "value": key,
    //                 "slug": getSlugAmount[key]['min']
    //             }).text(value));
    //     });
    //     if (selectmaxheaderval === 21)
    //         maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
    // }
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
    function selectMax2(selectmaxheaderval) {
        console.log(selectmaxheaderval);
        let amountConfigArr = {!! json_encode(Config('constants.investRangeInWordsSingle')) !!};
        let maxAmount = $('#maxAmount2');
        let getSlugAmount = {!! json_encode(Config('constants.InvestRange')) !!};
        maxAmount.html("");
        selectmaxheaderval = parseInt(selectmaxheaderval);
        $.each(amountConfigArr, function(key, value) {
            if (key > selectmaxheaderval)
                $('#maxAmount2').append($("<option></option>").attr({
                    "value": key,
                    "slug": getSlugAmount[key]['min']
                }).text(value));
        });
        if (selectmaxheaderval === 21)
            maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
    }

    


    function getSubCategoryHeader(value) {
        // alert(value);
        $.ajax({
            type: 'GET',
            url: '{{ url('getsubcategory') }}',
            data: {
                categoryID: value
            },
            success: function(data) {
                // alert(data);

                $("#getSubCategoryDataHeader").html(data);
                $("#getSubCategoryDataHeader2").html(data);
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
                $("#getSubCatCategoryDataHeader2").html(data);
            }
        });
    }

    function getcity(value) {
        // alert(value);
        $.ajax({
            type: 'GET',
            url: '{{ url('getcitylist') }}',
            data: {
                state: value
            },
            success: function(data) {
                // alert(data);
                $("#headercity").html(data);
                $("#headercity2").html(data);
            }
        });
    }



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

    function customResetForm() {
    let form = document.getElementById('invform');
    
    // Reset the form
    form.reset();
    
    // Reset maxAmount2 select element to its default state
    let maxAmount2 = document.getElementById('maxAmount2');
    maxAmount2.innerHTML = '<option value="" hidden>Select Max Investment</option>';
}
</script>
