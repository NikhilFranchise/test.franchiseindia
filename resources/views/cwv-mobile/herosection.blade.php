<section class="hero-moblie" id="hero-mobile">
    <div class="lnkblk">
        <a href="https://www.franchiseindia.com/brands/easygym.95394" target="_blank" class="setpat"><img
                src="https://test.franchiseindia.com/dotcom-mobile-fresh-code/images/direct-english.webp"
                alt="direct english" width="237" height="60"></a>
    </div>
    <h1>10000+ Business Options</h1>
    <h2>World&apos;s highest visited franchise website network</h2>
    <div class="warpper">
        <input class="radio" id="one" name="group" type="radio" checked>
        <input class="radio" id="two" name="group" type="radio">
        <input class="radio" id="three" name="group" type="radio">
        <div class="tabs">
            <label class="tab" id="one-tab" for="one">Categories</label>
            <label class="tab" id="two-tab" for="two">Location</label>
            <label class="tab" id="three-tab" for="three">Investment</label>
        </div>
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
                                <option value="8" slug="automotive">
                                    Automotive</option>
                                <option value="1" slug="beauty-and-health">
                                    Beauty &amp; Health</option>
                                <option value="6" slug="business-services">
                                    Business Services</option>
                                <option value="5" slug="dealers-and-distributors">
                                    Dealers &amp; Distributors</option>
                                <option value="3" slug="education">
                                    Education</option>
                                <option value="10" slug="fashion">
                                    Fashion</option>
                                <option value="2" slug="food-and-beverage">
                                    Food And Beverage</option>
                                <option value="7" slug="home-based-business">
                                    Home Based Business</option>
                                <option value="263" slug="hotels-and-resorts">
                                    Hotel, Travel &amp; Tourism</option>
                                <option value="9" slug="retail">
                                    Retail</option>
                                <option value="11" slug="sports-fitness-and-entertainment">
                                    Sports, Fitness &amp; Entertainment</option>

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
                                <option value="8" slug="automotive">
                                    Automotive</option>
                                <option value="1" slug="beauty-and-health">
                                    Beauty &amp; Health</option>
                                <option value="6" slug="business-services">
                                    Business Services</option>
                                <option value="5" slug="dealers-and-distributors">
                                    Dealers &amp; Distributors</option>
                                <option value="3" slug="education">
                                    Education</option>
                                <option value="10" slug="fashion">
                                    Fashion</option>
                                <option value="2" slug="food-and-beverage">
                                    Food And Beverage</option>
                                <option value="7" slug="home-based-business">
                                    Home Based Business</option>
                                <option value="263" slug="hotels-and-resorts">
                                    Hotel, Travel &amp; Tourism</option>
                                <option value="9" slug="retail">
                                    Retail</option>
                                <option value="11" slug="sports-fitness-and-entertainment">
                                    Sports, Fitness &amp; Entertainment</option>

                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <select aria-labelledby="state" name="loc" id="stateHeader1"
                                class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                onchange="getcity1(this.value)">
                                <option value="" hidden="">Select a State</option>
                                <option value="35" slug="andaman-and-nicobar">
                                    Andaman and Nicobar</option>
                                <option value="1" slug="andhra-pradesh">
                                    Andhra Pradesh</option>
                                <option value="2" slug="arunachal-pradesh">
                                    Arunachal Pradesh</option>
                                <option value="3" slug="assam">
                                    Assam</option>
                                <option value="4" slug="bihar">
                                    Bihar</option>
                                <option value="5" slug="chandigarh">
                                    Chandigarh</option>
                                <option value="6" slug="chhattisgarh">
                                    Chhattisgarh</option>
                                <option value="7" slug="daman-and-diu">
                                    Daman and Diu</option>
                                <option value="23" slug="delhi">
                                    Delhi</option>
                                <option value="8" slug="goa">
                                    Goa</option>
                                <option value="9" slug="gujarat">
                                    Gujarat</option>
                                <option value="10" slug="haryana">
                                    Haryana</option>
                                <option value="11" slug="himachal-pradesh">
                                    Himachal Pradesh</option>
                                <option value="12" slug="jammu-and-kashmir">
                                    Jammu and Kashmir</option>
                                <option value="13" slug="jharkhand">
                                    Jharkhand</option>
                                <option value="14" slug="karnataka">
                                    Karnataka</option>
                                <option value="15" slug="kerala">
                                    Kerala</option>
                                <option value="16" slug="lakshadweep">
                                    Lakshadweep</option>
                                <option value="17" slug="madhya-pradesh">
                                    Madhya Pradesh</option>
                                <option value="18" slug="maharashtra">
                                    Maharashtra</option>
                                <option value="19" slug="manipur">
                                    Manipur</option>
                                <option value="20" slug="meghalaya">
                                    Meghalaya</option>
                                <option value="21" slug="mizoram">
                                    Mizoram</option>
                                <option value="22" slug="nagaland">
                                    Nagaland</option>
                                <option value="24" slug="odisha">
                                    Odisha</option>
                                <option value="25" slug="pondicherry">
                                    Pondicherry</option>
                                <option value="26" slug="punjab">
                                    Punjab</option>
                                <option value="27" slug="rajasthan">
                                    Rajasthan</option>
                                <option value="28" slug="sikkim">
                                    Sikkim</option>
                                <option value="29" slug="tamil-nadu">
                                    Tamil Nadu</option>
                                <option value="34" slug="telangana">
                                    Telangana</option>
                                <option value="30" slug="tripura">
                                    Tripura</option>
                                <option value="32" slug="uttar-pradesh">
                                    Uttar Pradesh</option>
                                <option value="31" slug="uttarakhand">
                                    Uttarakhand</option>
                                <option value="33" slug="west-bengal">
                                    West Bengal</option>

                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <select name="city"
                                class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                id="headercity1">
                                <option value="" hidden="">Select a City</option>
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
            <div class="panel" id="three-panel">
                <form class="form-horizontal" method="get"
                    action="https://www.franchiseindia.com/category/searchby" onsubmit="return submitInvestment1()">
                    <input type="hidden" name="invTab" value="1">
                    <ul class="hero-search-main">
                        <li class="p-0 m-0">
                            <select aria-label="industry" name="mc" id="getMainCategoryDataHeaderInv1"
                                class="form-control form-control-custom dropdown-toogle-icon">
                                <option value="" hidden="">Select Industry</option>
                                <option value="8" slug="automotive">
                                    Automotive</option>
                                <option value="1" slug="beauty-and-health">
                                    Beauty &amp; Health</option>
                                <option value="6" slug="business-services">
                                    Business Services</option>
                                <option value="5" slug="dealers-and-distributors">
                                    Dealers &amp; Distributors</option>
                                <option value="3" slug="education">
                                    Education</option>
                                <option value="10" slug="fashion">
                                    Fashion</option>
                                <option value="2" slug="food-and-beverage">
                                    Food And Beverage</option>
                                <option value="7" slug="home-based-business">
                                    Home Based Business</option>
                                <option value="263" slug="hotels-and-resorts">
                                    Hotel, Travel &amp; Tourism</option>
                                <option value="9" slug="retail">
                                    Retail</option>
                                <option value="11" slug="sports-fitness-and-entertainment">
                                    Sports, Fitness &amp; Entertainment</option>

                            </select>
                        </li>
                        <li class="p-0 m-0">
                            <select name="min_cost"
                                class="form-control
                                                   form-control-custom
                                                   dropdown-toogle-icon"
                                id="minAmount1" onchange="selectMax2(this.value)">
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