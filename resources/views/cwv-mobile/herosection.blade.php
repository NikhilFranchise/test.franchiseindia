@php
    use Illuminate\Support\Str;
    $catArr = Config('constants.CategoryArr');
    asort($catArr);
    $states = Config('location.stateArr');
    asort($states);
@endphp
<section class="hero-moblie" id="hero-mobile">
    <img src="{{ url('cwv-mobile/images/mobile-banner.webp')}}" class="hero-banner"
    alt="Franchise India" fetch-priority="high" height="885" width="618">
    <div class="lnkblk">
        <a href="https://www.franchiseindia.com/brands/easygym.95394" target="_blank" fetch-priority="high" class="setpat"><img
                src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/direct-english.webp"
                alt="direct english" width="237" height="60"></a>
    </div>
    @if (request()->segment(2) == 'hi')
        <h1><span>20 हजार से अधिक </span> कारोबारी विक्लपों में अपने लिए तलाश करें</h1>
        <h2>दुनियाभर में सबसे अधिक तलाश किया जाने वाला फ्रैंचाइज वेबसाइट नेटवर्क।</h2>
    @else
        <h1>10000+ Business Options</h1>
        <h2>World&apos;s highest visited franchise website network</h2>
    @endif
    <div class="warpper">
        <input class="radio" id="one" name="group" type="radio" checked>
        <input class="radio" id="two" name="group" type="radio">
        <input class="radio" id="three" name="group" type="radio">
        @if (request()->segment(2) == 'hi')
            <div class="tabs">
                <label class="tab" id="one-tab" for="one">कैटेगरी</label>
                <label class="tab" id="two-tab" for="two">लोकेशन</label>
                <label class="tab" id="three-tab" for="three">निवेश</label>
            </div>
        @else
            <div class="tabs">
                <label class="tab" id="one-tab" for="one">Categories</label>
                <label class="tab" id="two-tab" for="two">Location</label>
                <label class="tab" id="three-tab" for="three">Investment</label>
            </div>
        @endif
        <div class="panels">
            <div class="panel" id="one-panel">
                <form class="form-horizontal" method="get" action="https://www.franchiseindia.com/category/searchby"
                    onsubmit="return submitCategory1()">
                    <input type="hidden" name="catTab" value="1">
                    <ul class="hero-search-main">
                        <li class="p-0 m-0">
                            <select aria-label="industry" name="mc"
                                class="form-control form-control-custom dropdown-toogle-icon"
                                id="getMainCategoryDataHeader1" onchange="getSubCategoryHeader1(this.value)">
                                <option value="" hidden="">Select Industry</option>
                                @foreach ($catArr as $index => $value)
                                    <option value="{{ $index }}"
                                        slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                        @if (isset($mc) && $index == $mc) selected @endif>
                                        {{ $value }}</option>
                                @endforeach

                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <select aria-label="sector" name="sc" id="getSubCategoryDataHeader1"
                                onchange="getSubCatCategoryHeader1(this.value)"
                                class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon">
                                <option value="" hidden="">Select Sector</option>
                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <select aria-label="service"
                                class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                name="ssc" id="getSubCatCategoryDataHeader1">
                                <option value="" hidden="">Select
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
            <div class="panel" id="two-panel">
                <form class="form-horizontal" method="get" action="https://www.franchiseindia.com/category/searchby"
                    onsubmit="return submitLocation1()">
                    <input type="hidden" name="locTab" value="1">
                    <ul class="hero-search-main">
                        <li class="p-0 m-0">
                            <select aria-label="industry"
                                class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                name="mc" id="getMainCategoryDataHeaderLoc1">
                                <option value="" hidden="">Select Industry</option>
                                @foreach ($catArr as $index => $value)
                                    <option value="{{ $index }}"
                                        slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                        @if (isset($mc) && $index == $mc) selected @endif>
                                        {{ $value }}</option>
                                @endforeach

                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <select aria-labelledby="state" name="loc" id="stateHeader1"
                                class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                onchange="getcity1(this.value)">
                                <option value="" hidden="">Select a State</option>
                                @foreach ($states as $index => $value)
                                    <option value="{{ $index }}" slug="{{ strtolower(Str::slug($value)) }}"
                                        @if (isset($loc[0]) && $loc[0] == $index) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <select name="city" class="form-control form-control-custom dropdown-toogle-icon"
                                id="headercity1">
                                <option value="" hidden="">Select a City</option>
                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <button type="submit" class="btn btn-main btn-main-hero" id="seo-loc-btn-main-hero">
                                Search
                            </button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="panel" id="three-panel">
                <form class="form-horizontal" method="get"
                    action="https://www.franchiseindia.com/category/searchby" onsubmit="return submitInvestment1()">
                    <input type="hidden" name="invTab" value="1">
                    <ul class="hero-search-main">
                        <li class="p-0 m-0">
                            <select aria-label="industry" name="mc" id="getMainCategoryDataHeaderInv1"
                                class="form-control form-control-custom dropdown-toogle-icon">
                                <option value="" hidden="">Select Industry</option>
                                @foreach ($catArr as $index => $value)
                                    <option value="{{ $index }}"
                                        slug="{{ Config('category.SeoCategoryArr.' . $index) }}"
                                        @if (isset($mc) && $index == $mc) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <select name="min_cost" class="form-control form-control-custom dropdown-toogle-icon"
                                id="minAmount1" onchange="selectMax1(this.value)">
                                <option value="" hidden=""> Select Min Investment </option>
                                <option slug="10000" value="1">Rs. 10000</option>
                                <option slug="50000" value="3">Rs. 50000</option>
                                <option slug="200000" value="5">Rs. 2lakh</option>
                                <option slug="500000" value="7">Rs. 5lakh</option>
                                <option slug="1000000" value="9">Rs. 10lakh</option>
                                <option slug="2000000" value="11">Rs. 20lakh</option>
                                <option slug="3000000" value="13">Rs. 30lakh</option>
                                <option slug="5000000" value="15">Rs. 50lakh</option>
                                <option slug="10000000" value="17">Rs. 1 Cr.</option>
                                <option slug="20000000" value="19">Rs. 2 Cr.</option>
                                <option slug="50000000" value="21">Rs. 5 Cr.</option>
                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <select name="max_cost"
                                class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                id="maxAmount2">
                                <option value="" hidden=""> Select Max Investment </option>

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
</section>
