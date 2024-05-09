@extends('layout.master')
@section('seoTitle', 'Restaurant Supplies - Suppliers, Manufacturers &amp; Exporters - RestaurantIndia.in')
@section('seoDesc', 'Restaurant Supplies - Find list of Suppliers, Manufacturers and Exporters from Restaurantindia.in and also get the detailed information and articles about Restaurant Industry.')
@section('seoKeywords', 'articles of restaurant industry, restaurant india articles, restaurant india')
@section('content')
    <div class="bgcol rebotm">
        <div class="container">
            <!--category search  start here -->
            <div class="row risearch">

                <div class="col-xs-12 col-sm-9 col-md-9 formsection widthmdfy768">
                    <div class="row">
                        <form method="post" action="/restaurantsearch">
                        <div class="col-xs-12 col-sm-12 col-md-12 martop25"><h1><span>Search</span> for top <span
                                        class="bold clr_red">Restaurant Suppliers</span> in your city</h1></div>
                        <div class="col-xs-12 col-sm-10 col-md-10">

                                <ul class="row rearch">

                                    <li class="col-xs-12 col-sm-3 col-md-3">
                                        <select id="mainCategory" name="mainCategory" class="form-control myselectclassuni">
                                            <option value="">Choose a category</option>
                                            @foreach($categoryArticles as $article)
                                                <option value="{{$article['category_id']}}">{{$article['cat_name']}}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li class="col-xs-12 col-sm-3 col-md-3">
                                        <select id="subCategory" name="subCategory" class="form-control myselectclassuni">
                                            <option value="">Choose a Sub Category</option>
                                        </select>
                                    </li>
                                    <script>
                                    $(document).ready(function () {
                                        $('#mainCategory').on('change',function (e) {
                                        var categoryId     = document.getElementById('mainCategory').value;
                                            $.ajax({
                                                type  : 'get',
                                                url   : '/restaurantcategory',
                                                data  : {categoryId : categoryId},
                                                success: function (data) {
                                                    $('#subCategory').html(data);
                                                }
                                            });
                                        });
                                    });
                                    </script>

                                    <li class="col-xs-12 col-sm-3 col-md-3">
                                        <select id="stateSection" name="stateSection" class="form-control myselectclassuni">
                                            <option value="">Choose a State</option>
                                            @php
                                                $values=Config::get('location.stateArr');
                                                foreach($values as $index => $value) {
                                                    echo "<option value=".$index.">$value</option>";
                                                }
                                            @endphp
                                        </select>
                                    </li>

                                    <li class="col-xs-12 col-sm-3 col-md-3">
                                        <select id="citySection" name="citySection" class="form-control myselectclassuni">
                                            <option value="">Choose a City</option>
                                        </select>
                                    </li>
                                    <script>
                                        $(document).ready(function () {
                                            $('#stateSection').on('change',function (e) {
                                                var stateId     = document.getElementById('stateSection').value;
                                                $.ajax({
                                                    type  : 'get',
                                                    url   : '/restaurantstate',
                                                    data  : {state : stateId},
                                                    success: function (data) {
                                                        $('#citySection').html(data);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    <!--<li> <input type="submit" value="" name="searchdirectory" class="supplier_search"></li> -->
                                </ul>

                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 pull-right">
                            <input type="submit" value="Search" name="searchdirectory" class="btn btn-default">
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 ser-ri-right">
                    <a href="http://www.restaurantindia.in/directory/advertiseSignup.php" target="_blank">
                        <img src="https://www.franchiseindia.com/riimages/sup_ban.jpg?id=2">
                    </a>
                </div>
            </div>
            <!--category search  end here -->
        </div>
    </div>

    <div class="innerloginblk riinnspc">
        @include('includes.login-events')
    </div>

    <!-- more article section start here -->
    <div class="container mostpopu arttilist">
        <div class="row row-no-margin">
            <div class="col-xs-12 col-sm-12 col-md-9 tablwidt paddingright50 restaurant">
                <!-- restaurant Franchise Opportunities start here  -->
                <div class="bor-radius backwhite pad20 ovfl">
                    <div class="ri-headingRt">
                        <h2><span><div>Restaurant Franchise Opportunities</div></span></h2>
                    </div>
                    <ul class="ri-brnds-logo">
                        @foreach($bannerData as $banner)
                            <li>
                                <a target="_blank" href="{{Config::get('constants.MainDomain')}}/brands/{{$banner->profile_name}}.{{$banner->fran_detail_id}}"> <img src="{{Config::get('constants.franAwsImgPath')}}{{$banner->company_logo}}"></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- restaurant Franchise Opportunities end here  -->


                @include("includes/restaurant/rislider")
                @include("includes/restaurant/restaurantstore")
                @include("includes/restaurant/restaurantpeople")
                @include("includes/restaurant/restaurantstartup")
                @include("includes/restaurant/restaurantgrowthbusiness")
                @include("includes/restaurant/restaurantfb")
                @include("includes/restaurant/restaurantoperations")
                @include("includes/restaurant/restaurantsuppliers")
                @include("includes/restaurant/restaurantfranchise")
                @include("includes/restaurant/restaurantresearchevents")


            </div>
            <!--right section start here -->
            @include("includes/restaurant/restaurantrightpanelcomman")
            <!--right section end here -->
        </div>
    </div>
    <!-- more article section end here -->
    @notmobile
    <div class="sidearce">
        @include("includes.banners.res-banner970X250")
    </div>
    @endnotmobile
@endsection
