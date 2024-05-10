@extends('layout.master')
@section('seoTitle', 'INDIAN eRETAIL REPORT 2013 - Franchise India')
@section('seoDesc', 'The Indian online retail sector is young and witnessing a huge growth. The industry is growing at the rate of 40 per cent annually and is likely to touch Rs 3,600-crore mark by the end of 2013. There are huge possibilities in e-retail space because of large population base, changing consumer lifestyle and lack of infrastructure for bigger bricks-and-mortar stores.')
@section('seoKeywords', 'ieir, indian eretail report 2013, books and reports')
@section('content')
    <!--Book start here -->
    <div class="row headcommbanner">
        <div class="fullcontainer">
              {{-- @desktop --}}
              @if ($agent->isDesktop())
              @include("includes.banners.dfp_970X90")
              {{-- @enddesktop --}}
              @elseif ($agent->isMobile())
              {{-- @mobile --}}
              @include("includes.banners.dfp_468X60")
              @include("includes.banners.dfp_320X100")
              {{-- @endmobile --}}
              @elseif ($agent->isTablet())
              {{-- @tablet --}}
              @include("includes.banners.dfp_728X90")
              {{-- @endtablet --}}
              @endif
        </div>
    </div>

    <div class="container formsection margintop60 staicp">
        <div class="row">

            <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/india-retail2013.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">INDIAN eRETAIL REPORT 2013</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="INDIAN eRETAIL REPORT 2013">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.eretail2013.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.eretail2013.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.eretail2013.edu2011.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.eretail2013.usa')}}
                    </li>
                </ul>

                    <div class="btns">
                        <input type="submit"  class="btn btn-default" value="Buy Now"/>
                    </div>
                </form>


                <div class="booktobmain">
                    <input id="booktab1" type="radio" name="tabsp" checked>
                    <label for="booktab1">VIEW SUMMARY</label>
                    <input id="booktab2" type="radio" name="tabsp">
                    <label for="booktab2">VIEW CONTENTS</label>
                    <span class="bookunderline"></span>
                    <div class="booktabcontent">
                        <div id="booktabcontent1">


                            <p class="book-st-txt">The Indian online retail sector is young and witnessing a huge
                                growth. The industry is growing at the rate of 40 per cent annually and is likely to
                                touch Rs 3,600-crore mark by the end of 2013. There are huge possibilities in e-retail
                                space because of large population base, changing consumer lifestyle and lack of
                                infrastructure for bigger bricks-and-mortar stores. Currently, more than 400 e-retails
                                are operating in the sphere and many more are ready to join the game. Certainly,
                                e-retail is going to be a game-changer.<br/><br/>

                                Franchise India has come up with the exclusive market research report "eRetail Report"
                                on the highest performing sectors of online retail. Through an extensive research and
                                analysis, the report identifies the highest selling categories of the online retail. The
                                top categories are apparel, accessories, CDIT, books and music, jewellery, footwear,
                                beauty and wellness, home, and gifts and flowers are the top categories in the e-retail
                                space. Among them, apparel is at the first position, followed by accessories and CDIT,
                                enjoying market share of 17 per cent, 15 per cent and 13 per cent
                                respectively.<br/><br/>

                                A report comes up with separate section on each category that incorporates its market
                                share in respective industry, customer profile, product segmentation and its share and
                                the following details: </p>
                            <ul class="book-txt-list">
                                <li><i class="fa fa-circle-o"></i> Famous websites</li>
                                <li><i class="fa fa-circle-o"></i> Technology provider</li>
                                <li><i class="fa fa-circle-o"></i> Marketing tool box</li>
                                <li><i class="fa fa-circle-o"></i> Transaction per day</li>
                                <li><i class="fa fa-circle-o"></i> Visitors per day</li>
                                <li><i class="fa fa-circle-o"></i> Customer group break-down</li>
                                <li><i class="fa fa-circle-o"></i> Repeat customers</li>
                                <li><i class="fa fa-circle-o"></i> Selling price point</li>
                                <li><i class="fa fa-circle-o"></i> Highest selling products</li>
                                <li><i class="fa fa-circle-o"></i> Most selling brands</li>
                            </ul>
                            <p class="book-st-txt">
                                Through an elaborate survey of the 500 online shoppers across metro cities and tier I
                                and II cities to bring to light the consumption pattern and key transition trends in the
                                Indian online shopping industry. The report discloses that 24 per cent Indians are
                                shopping online once a month, and 57 per cent are spending Rs 500 to Rs 2000 in one go.
                                The survey also gives deep insights into where, what, when and why people shop online,
                                frequency of shopping, their attitude towards online shopping.<br/><br/>

                                Overall, the report aims to incorporate trends of the industry, as well as brings
                                forward a detailed study of the overall consumption pattern, category research, growth
                                factors which are changing the landscape of the e-retail industry. </p>

                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1 : INDIAN e-RETAIL MARKET: OUTLOOK (09) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Global Online Retail Market<br/>
                                            <i class="fa fa-arrow-right"></i> Indian Online Retail and Growth
                                            Drivers<br/>
                                            <i class="fa fa-arrow-right"></i> Choose a Winning eRetail Model <br/>
                                            <i class="fa fa-arrow-right"></i> Funding eRetailers<br/>
                                        </li>
                                        <li><strong>Chapter 2: INDIAN ONLINE SHOPPERS STANDPOINT (17) </strong><br/>
                                            <i class="fa fa-arrow-right"></i> Where, what & when do people shop Online?
                                            <br/>
                                            <i class="fa fa-arrow-right"></i> Consumer Buying Frequency<br/>
                                            <i class="fa fa-arrow-right"></i> Attitude Mapping of Online Shopper<br/>
                                        </li>
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>LEADING RETAIL CATEGORIES IN ONLINE (27) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Apparel<br>
                                            <i class="fa fa-arrow-right"></i> Accessories<br>
                                            <i class="fa fa-arrow-right"></i> Consumer Durables and IT<br>
                                            <i class="fa fa-arrow-right"></i> Books, eBooks, Music<br>
                                            <i class="fa fa-arrow-right"></i> Jewellery (Fine and Intimated)<br>
                                            <i class="fa fa-arrow-right"></i> Footwear<br>
                                            <i class="fa fa-arrow-right"></i> Beauty, Health & Wellness<br/>
                                            <i class="fa fa-arrow-right"></i> Home<br/>
                                            <i class="fa fa-arrow-right"></i> Gifts and Flowers
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="clr"></div>
                            <!-- new book section end here -->
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>


    <!--form end here -->
    <div class="height40"></div>
    <div class="row headcommbanner">
        <div class="fullcontainer">
           {{-- @desktop --}}
           @if ($agent->isDesktop())

           @include("includes.banners.google_970X90")
           {{-- @enddesktop --}}
           @elseif ($agent->isTablet())

           {{-- @tablet --}}
           @include("includes.banners.google_728X90")
           {{-- @endtablet --}}
           @elseif ($agent->isMobile())
           {{-- @mobile --}}
           @include("includes.banners.google_468X60")
           @include("includes.banners.google_320X100")
          @endif
           {{-- @endmobile --}}
        </div>
    </div>
@endsection
