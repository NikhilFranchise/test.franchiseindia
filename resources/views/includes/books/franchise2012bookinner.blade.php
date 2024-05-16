@extends('layout.master')
@section('seoTitle', 'Indian Franchise Report 2012 - Franchise India')
@section('seoDesc', 'Indian Franchise Report 2012 is a pioneering effort on part of Franchise India Holdings Limited to bring to the forefront a decade long journey of the franchise business concept, the changing investment patterns and business insight leading to a paradigm shift in the Indian business ecosystem. The Indian franchise industry stands at a staggering USD 15 Billion mark, and is expected to touch USD 34 billion by 2015.')
@section('seoKeywords', 'ifr, indian franchise report 2012, books and reports')
@section('content')
    <!--Book start here -->
    <div class="row headcommbanner">
        <div class="fullcontainer">
            @desktop
            @include("includes.banners.dfp_970X90")
            @enddesktop
            @mobile
            @include("includes.banners.dfp_468X60")
            @include("includes.banners.dfp_320X100")
            @endmobile
            @tablet
            @include("includes.banners.dfp_728X90")
            @endtablet
        </div>
    </div>

    <div class="container formsection margintop60 staicp">
        <div class="row">

            <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-2012-1.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Franchise Report 2012</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Franchise Report 2012">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.franchise2012.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.franchise2012.india')}}
                    </li>

                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.franchise2012.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.franchise2012.usa')}}
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


                            <p class="book-st-txt">'Indian Franchise Report 2012', is a pioneering effort on part of
                                Franchise India Holdings Limited to bring to the forefront a decade long journey of the
                                franchise business concept, the changing investment patterns and business insight
                                leading to a paradigm shift in the Indian business ecosystem. The Indian franchise
                                industry stands at a staggering USD 15 Billion mark, and is expected to touch USD 34
                                billion by 2015. The Indian franchise eco-system today comprises of over 3700
                                franchisors supported by over 2,00,000 franchisees. The participation by females as
                                front runner in this format still holds a low spot with only 26 per cent of the
                                franchisees being lead by women.
                                <br/><br/>
                                The franchise industry is young and dynamic and what's even more stimulating is the
                                extremely young business class that is ridding this growth journey forward- 69 per cent
                                of the franchisees in India are in the age group of 18 to 35 years. With more easily
                                disposable income at hand, this young class of investors is only going to grow more
                                aggressive and take upon bigger opportunities in the coming decade. Another major trend
                                is the growing clout of professionals entering the business space via franchising. Over
                                85 per cent of the franchises hold a graduation or UG/PG degree.
                                <br/><br/>
                                The report delivers deep insight into the best performing franchise sectors based on the
                                expansion blueprints of top brands, current growth rate and over all sector's
                                performance these are top franchisable sectors:
                            <ul class="book-txt-list">
                                <li><i class="fa fa-circle-o"></i> Education
                                <li>
                                <li><i class="fa fa-circle-o"></i> Health, Beauty and Wellness
                                <li>
                                <li><i class="fa fa-circle-o"></i> Food and Beverages
                                <li>
                                <li><i class="fa fa-circle-o"></i> Retail Franchising
                                <li>
                                <li><i class="fa fa-circle-o"></i> Consumer Services</li>
                            </ul>

                            The franchise industry is largely close knit and integrated, which is expected to grow at an
                            average rate of 28 per cent throughout the next decade. But one of the major factors
                            influencing this growth will eventually not be the consumer or the economic under current
                            but the business relation between the franchisor and franchisee. The few major trends that
                            have come out, as a result of this detailed research, franchise satisfaction survey, which
                            is a cumulative effort to judge the effectiveness and efficiency the present day
                            franchisor-franchisee relationship is that a large majority, i.e. 72 per cent franchisee
                            would recommend their franchise business to prospective franchisees, but at the same time
                            over 41 per cent feel that the toughest time for them was the initial setup, as the support
                            provided by franchisor wasn't adequate enough.
                            <br/><br/>
                            Moreover, leaving aside a few gaps in training initiatives, audit and financial support the
                            Indian investor is happy and content with the franchise business environment which fairs
                            higher that the satisfaction levels of SMEs operating in manufacturing and consumer service
                            businesses, as over 90 per cent of the franchisees if given an opportunity and adequate
                            funding would want to opt to invest in more than one franchise business format. Overall the
                            report aims to incorporate trends in the industry, as well as brings forward a study of the
                            overall franchisor-franchisee relation, as these are factors governing growth and change
                            around the franchise business format.</p>


                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1 : INDIA INC: SME AND ENTREPRENEURSHIP (09)</strong><br>
                                            <i class="fa fa-arrow-right"></i> The Business Ecosystem<br/>
                                            <i class="fa fa-arrow-right"></i> What Makes India a Good SME Market?<br/>
                                            <i class="fa fa-arrow-right"></i> Advent of Retail & Consumer Service
                                            Businesses<br/>
                                            <i class="fa fa-arrow-right"></i> International Comparison<br/>
                                        </li>
                                        <li><strong>Chapter 2: DYNAMICS OF FRANCHISING IN INDIA (15)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> Facilitators For Franchising: Franchisors
                                            & Franchisee <br/>
                                            <i class="fa fa-arrow-right"></i> Reviewing Manpower: Training, Quality
                                            Control & Audits<br/>
                                            <i class="fa fa-arrow-right"></i> Financial Implications of Franchising<br/>
                                            <i class="fa fa-arrow-right"></i> Legal Implications of Franchising<br/>
                                            <i class="fa fa-arrow-right"></i> Analysis of Business Environment
                                        </li>
                                        <li><strong>Chapter 3: SECTOR WATCH: FRANCHISE GAINERS OF THE DECADE
                                                (27) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Education<br/>
                                            <i class="fa fa-arrow-right"></i> Beauty and Wellness<br/>
                                            <i class="fa fa-arrow-right"></i> Food And Beverages<br/>
                                            <i class="fa fa-arrow-right"></i> Retail Industry<br/>
                                            <i class="fa fa-arrow-right"></i> Consumer Services
                                        </li>
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 4: FRANCHISEE SATISFACTION INDEX (FSI) (43)</strong><br>
                                            <i class="fa fa-arrow-right"></i> Demographic Profile<br>
                                            <i class="fa fa-arrow-right"></i> Franchisor-Franchisee Relationship<br>
                                            <i class="fa fa-arrow-right"></i> Franchising -An Expansion Plan<br>
                                            <i class="fa fa-arrow-right"></i> Franchise System<br>
                                            <i class="fa fa-arrow-right"></i> Financial Opportunity<br>
                                            <i class="fa fa-arrow-right"></i> Road Ahead<br>

                                        <li><strong>CASE STUDIES of ANNEXURE (52)</strong></li>


                                        <li><strong>FRANCHISOR DIRECTORY (72)</strong></li>
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
            @desktop
            @include("includes.banners.google_970X90")
            @enddesktop
            @tablet
            @include("includes.banners.google_728X90")
            @endtablet
            @mobile
            @include("includes.banners.google_468X60")
            @include("includes.banners.google_320X100")
            @endmobile
        </div>
    </div>
@endsection
