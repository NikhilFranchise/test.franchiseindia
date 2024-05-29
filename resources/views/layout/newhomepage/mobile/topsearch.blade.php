@php
    use Illuminate\support\Str;
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
<div class="modal modal-cust fade" id="search" tabindex="-1" aria-labelledby="search-mainLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-cust">
        <div class="modal-content modal-content-cust">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body modal-body-search-custom">
                <div class="searchbox">
                    <form method="get" action="{{ url('category/search') }}">
                        <div class="input-group
                                 input-group-search-section-main">
                            <input type="text"
                                class="form-control
                                    form-control-search-custom"
                                name="text" placeholder="Search For Business Opportunities"
                                id="dealer-bar-search-top" aria-describedby="basic-addon2">
                            <span
                                class="input-group-addon
                                    input-group-addon-search-custom"
                                id="basic-addon2">
                                <button
                                    class="btn btn-group-sm btn-main
                                       bhide-main"
                                    id="seo-search-popup-icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="or-cat">
                    <h2>
                        Or Explore By
                    </h2>
                </div>
                <ul class="nav nav-tabs custom-nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#categories2">Categories</a></li>
                    <li><a data-toggle="tab" href="#location2">Location</a></li>
                    <li><a data-toggle="tab" href="#investment2">Investment</a></li>
                </ul>

                <div class="tab-content">
                    <div id="categories2" class="tab-pane tab-pane-main fade in active">
                        <form name="catform" id="catform" class="form-horizontal" method="get"
                            action="{{ url('category/searchby') }}" onsubmit="return submitCategory()">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div class="form-group form-group-search-section-li">
                                                <input type="hidden" name="catTab" value="1">
                                                <select name="mc" id="getMainCategoryDataHeader"
                                                    onchange="getSubCategoryHeader(this.value)"
                                                    class="form-control form-control-search-main-custom">
                                                    <option value="" hidden>Select Industry</option>
                                                    @foreach ($catArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                            @if (isset($mc) && $index == $mc) selected @endif>
                                                            {!! $value !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="sc" id="getSubCategoryDataHeader2"
                                                    onchange="getSubCatCategoryHeader(this.value)"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="exampleFormControlSelect1">
                                                    <option value="0">Select Sector</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    name="ssc" id="getSubCatCategoryDataHeader2">
                                                    <option value="" hidden>Select Service / Product</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-group-sm btn-main
                                 bhide-main bhide"
                                            id="top-cat-seo-btn-main-hero">
                                            Explore
                                        </button>
                                        <span class="clear">
                                            {{-- <a href="javascript:void(0)" onclick="catform.reset();">Clear All</a> --}}
                                            <a href="javascript:void(0)"
                                                onclick="document.getElementById('catform').reset();">Clear All</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="location2" class="tab-pane tab-pane-main fade">
                        <form name="locform" id="locform" class="form-horizontal" method="get"
                            action="{{ url('category/searchby') }}" onsubmit="return submitLocation()">
                            <input type="hidden" name="locTab" value="1">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    name="mc" id="getMainCategoryDataHeaderLoc">
                                                    <option hidden>Select Industry</option>
                                                    @foreach ($catArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                            @if (isset($mc) && $index == $mc) selected @endif>
                                                            {!! $value !!}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    name="loc" id="stateHeader" onchange="getcity(this.value)"
                                                    required="required">
                                                    <option value="" hidden>Select State</option>
                                                    @foreach ($states as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ strtolower(Str::slug($value)) }}"
                                                            @if (isset($loc[0]) && $loc[0] == $index) selected @endif>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="headercity2" name="city">
                                                    <option value="" hidden>Select a City</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-group-sm btn-main
                                 bhide-main bhide"
                                            id="top-loc-seo-btn-main-hero">
                                            Explore
                                        </button>
                                        <span class="clear">
                                            <a href="javascript:void(0)"
                                                onclick="document.getElementById('locform').reset();">Clear All</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="investment2" class="tab-pane tab-pane-main fade">
                        <form name="invform" id="invform" class="form-horizontal" method="get"
                            action="{{ url('category/searchby') }}" onsubmit="return submitInvestment()">
                            <input type="hidden" name="invTab" value="1">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="mc" id="getMainCategoryDataHeaderInv"
                                                    class="form-control
                                          form-control-search-main-custom">
                                                    <option value="" hidden>Select Industry</option>
                                                    @foreach ($catArr as $index => $value)
                                                        <option value="{{ $index }}"
                                                            slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                                            @if (isset($mc) && $index == $mc) selected @endif>
                                                            {!! $value !!}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="min_cost"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="minAmount" required="required"
                                                    onchange="selectMax1(this.value)">
                                                    <option value="" hidden>Select Min Investment</option>
                                                    @foreach (Config('constants.investRangeInWordsSingle') as $index => $value)
                                                        <option
                                                            slug="{{ Config('constants.InvestRange')[$index]['min'] }}"
                                                            @if (isset($minCost)) @if ($minCost == $index) selected @endif
                                                            @endif
                                                            value="{{ $index }}">{!! $value !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-section-select">
                                            <div
                                                class="form-group
                                       form-group-search-section-li">
                                                <select name="max_cost"
                                                    class="form-control
                                          form-control-search-main-custom"
                                                    id="maxAmount1">
                                                    <option value="0" hidden> Select Max Investment </option>

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button
                                            class="btn btn-group-sm btn-main
                                 bhide-main bhide"
                                            id="top-inv-seo-btn-main-hero">
                                            Explore
                                        </button>
                                        <span class="clear">
                                            <a href="javascript:void(0)" onclick="customResetForm()">Clear All</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    /*<![CDATA[*/
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
        // console.log(selectmaxheaderval);
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
               console.log(data);
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
                $("#getSubCatCategoryDataHeader2").html(data);
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
                $("#headercity2").html(data);
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
    
    // Reset maxAmount1 select element to its default state
    let maxAmount1 = document.getElementById('maxAmount1');
    maxAmount1.innerHTML = '<option value="" hidden>Select Max Investment</option>';
}
    /*]]>*/
</script>
