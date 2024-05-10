@extends('layout.master')
@section('seoTitle', 'The Food Franchising Report 2009 - Franchise India')
@section('seoDesc', 'The Food Franchising Report 2009 is India&#039;s first exclusive Franchise report on the food industry brought out jointly by FICCI-CIFTI &amp; Franchise India Holdings Ltd. The report highlights authentic facts about the Indian Food Franchising Market and showcases extensive know-how about the Indian Food Market, Food Franchising in India &amp; the Indian Food and Beverage Suppliers.')
@section('seoKeywords', 'ffr, food franchising report 2009, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-other-4.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">The Food Franchising Report 2009</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="The Food Franchising Report 2009">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.food2009.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.food2009.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.food2009.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.food2009.usa')}}
                    </li>
                </ul>

                    <div class="btns">
                        <input type="submit"  class="btn btn-default" value="Buy Now"/>
                    </div>
                </form>


                <!--Book tab Start-->
                <div class="booktobmain">
                    <input id="booktab1" type="radio" name="tabsp" checked>
                    <label for="booktab1">VIEW Details</label>
                    <input id="booktab2" type="radio" name="tabsp">
                    <label for="booktab2">VIEW SUMMARY</label>
                    <input id="booktab3" type="radio" name="tabsp">
                    <label for="booktab3">VIEW CONTENTS</label>
                    <span class="bookunderline"></span>
                    <div class="booktabcontent">
                        <div id="booktabcontent1">


                            <p class="book-st-txt">The Food Franchising Report 2009 is India's first exclusive Franchise report on the food industry brought out jointly by FICCI-CIFTI & Franchise India Holdings Ltd. The report highlights authentic facts about the Indian Food Franchising Market and showcases extensive know-how about the Indian Food Market, Food Franchising in India & the Indian Food and Beverage Suppliers. This report provides a strategic approach to the opportunities and challenges for growth through the franchise route in the food industry.
                                <br /><br />
                                <strong>Report Highlights</strong><br />
                                The primary objective of this report is to provide a snapshot of current trends in Food Franchising vis-a-vis expert analysis of various elements which have an implication on it. The report is divided in 5 parts which cover a range of issues from the Indian Market opportunity to Growth of Food Industry in India, about the Franchising industry at large and about Food Franchising and how it is poised to grow further. The report also gives case studies about suppliers in real-estate, technology, equipment, food materials aiding the franchise food operators. To view Executive Summary of the Report- Click Here
                                <br /><br />
                                <strong>A Must Buy</strong><br />
                                Food Franchising Report 2009 gives a comprehensive learning curve for restaurant owners and existing food companies looking out to expand their brand across the country. The Report is a must buy for everyone who is in the food service industry or is planning to enter the food services sector through the franchise route. Master Franchisees of International Food Brands, Multi-unit and multi-concept franchisees in food service industry will find it useful to carry out their growth plans. International Food Brands looking to carve an India entry will find the report a functional guide towards building their growth strategy.
                                <br /><br />
                                <strong>Food Franchise Directory</strong><br />
                                This rich content is further supplemented by a "best of" compilation food service franchise operators Directory .For entrepreneurs who are looking to enter or grow in the food service sector, the directory pages have it all, to seek out the franchise that's right for you or grow the business in the world of food outlets. The Directory will give a complete information on over 100 available food franchise systems in India. These pages cover franchise opportunities in bakery goods and pastry shops, candy and snack stores, coffee and espresso bars, full service franchise restaurants and bars, ice cream and frozen yogurt parlors, pizza restaurant franchises, quick service and take out venues, and sandwich shops.   </p>


                        </div>

                        <div id="booktabcontent2">


                            <p class="book-st-txt">Food Franchising Report is an outcome of a pioneering initiative taken by Franchise India Holdings Ltd and CIFTI -FICCI. It accords the food franchising sector with the recognition it has long deserved. This report provides strategic approach to the opportunities and challenges being witnessed in food service franchising.
                                <br /><br />
                                Part one of FFI 2009 gives an overview of the growth of the Indian economy and the food consumer market. The overview states that 51 per cent of the consumer wallet share is dedicated to food (54 per cent in rural area and 42 in urban areas). A population of 1.18 billion is the key attraction for food service companies.
                                <br /><br />
                                Report further forecasts that Indian food service entrepreneur is ready with massive expansion plans, which provide thrust to the sector to grow at 48 per cent in the next two years. International Food Service brands are gazing Indian markets as a profitable investment destination and many among them have already started their operations.
                                <br /><br />
                                Part two of the report discuss about the franchise business in India. It claims that franchising sector in India is growing at swift pace of 35 -38 per cent per annum. The market size of franchising sector estimated to be US$ 7.2 billion and is expected to reach US$ 20 billion by 2013. There are about 1,200 active franchise concepts in India and over 100,000 franchisees. According to a Franchise India Holding Ltd and CIFTI - FICCI survey, single franchise outlet hires about 10 people on an average. Franchise networks spread across the country are now established with 90 per cent franchisors setting their agreement tenure of more than 3 years and their contract renewal rate has climbed to 80%. Its interesting to note that franchise outlets are growing faster than a company-owned outlet.
                                <br /><br />
                                Part three of the report gives insights of food service sector in India. It has calculated that size of India's food service sector is $11 billion but organized players enjoy less than 8 per cent of the market share. There are 10 million street vendors in India, of which six million sell ready to eat food. Consumer foodservice value sales grew at a strong 20% in 2007-2008 in India, second only to that of Vietnam and Indonesia.
                                <br /><br />
                                Part four states that like any other industry, food service sector too requires a support system to thrive. The biggest challenge today for the Franchise Industry is that Government has not recognized it as Small Business facilitator in India unlike the US. The lack of laws and Government policies thereof is therefore an impediment in the growth of franchising which has a huge potential to penetrate in the depth and breadth of the country and also a system for Indian brands to get exported overseas.
                                <br /><br />
                                There are several other Governmental permissions that would be required before an international master franchise can be granted in India. There are also restrictions on the number of shares a foreign company or person can hold in an Indian company if the joint venture option is taken, and there are restrictions on payment of royalties if it is a technical collaboration agreement between the foreign master franchisor and Indian master franchisee. Payments for Master franchisors are best spread out between lump sum fees, royalties, consultant's fees, and design and engineering fees.
                                <br /><br />
                                Part Five "F& B Supply: The Scene behind the Scene" reviews food an Beverage supply aspect of franchise food service operation and where Suppliers to the industry play a crucial role
                            </p>

                        </div>







                        <div id="booktabcontent3">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">


                                        <li><strong>Chapter I  </strong><br>
                                            <i class="fa fa-arrow-right"></i> Indian Overviews<br>
                                            <i class="fa fa-arrow-right"></i> Population<br>
                                            <i class="fa fa-arrow-right"></i> Population density<br>
                                            <i class="fa fa-arrow-right"></i> Gross Domestic Product<br>
                                            <i class="fa fa-arrow-right"></i> Consumption Growth in India<br>
                                            <i class="fa fa-arrow-right"></i> Rising Per Capita Income<br>
                                            <i class="fa fa-arrow-right"></i> Foreign Direct Investment<br>
                                            <i class="fa fa-arrow-right"></i> Strong Foreign Reserves<br>
                                            <i class="fa fa-arrow-right"></i> Rich Households to outnumber poor households 2009-10<br>
                                            <i class="fa fa-arrow-right"></i> Service Sector-Major Player<br>
                                            <i class="fa fa-arrow-right"></i> Inflation Moderating<br>
                                            <i class="fa fa-arrow-right"></i> Future Prospectst<br />
                                        </li>
                                        <li><strong>Chapter II</strong><br />
                                            <i class="fa fa-arrow-right"></i> Franchising in India<br />
                                            <i class="fa fa-arrow-right"></i> Growth of Indian Franchising<br />
                                            <i class="fa fa-arrow-right"></i> Sector-wise Growth in Franchising<br />
                                            <i class="fa fa-arrow-right"></i> Geographical distribution<br />
                                            <i class="fa fa-arrow-right"></i> Employment in Indian Franchising<br />
                                            <i class="fa fa-arrow-right"></i> Age of System<br />
                                            <i class="fa fa-arrow-right"></i> Malls first choice for franchising outlets<br />
                                            <i class="fa fa-arrow-right"></i> Franchising Laws in India<br />
                                            <i class="fa fa-arrow-right"></i> Key Franchise Bodies in India<br />
                                            <i class="fa fa-arrow-right"></i> Challenges in Indian Franchise sector<br />
                                            <i class="fa fa-arrow-right"></i> Franchise tipped for Growth in India<br />
                                            <i class="fa fa-arrow-right"></i> Supplementing Government Revenue<br />
                                            <i class="fa fa-arrow-right"></i> Franchising will mature<br />
                                            <i class="fa fa-arrow-right"></i> Age of Franchising has arrived<br />
                                            <i class="fa fa-arrow-right"></i> Consumer would be the King<br />
                                            <i class="fa fa-arrow-right"></i> Franchise Profession-a new career opportunities<br />
                                            <i class="fa fa-arrow-right"></i> New Market for suppliers<br />
                                        </li>

                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter III</strong><br>
                                            <i class="fa fa-arrow-right"></i> Indian Food Market<br />
                                            <i class="fa fa-arrow-right"></i> Size of Indian Restaurants and catering services<br />
                                            <i class="fa fa-arrow-right"></i> Consumer Eating out Patterns<br />
                                            <i class="fa fa-arrow-right"></i> Hotels<br />
                                            <i class="fa fa-arrow-right"></i> Restaurants in Hotels and Resorts<br />
                                            <i class="fa fa-arrow-right"></i> Indian Foodservice Growth Predictions<br />
                                            <i class="fa fa-arrow-right"></i> Food courts: A new phenomena<br />
                                            <i class="fa fa-arrow-right"></i> New Food zones in India<br />
                                            <i class="fa fa-arrow-right"></i> Success of International food chains in India<br />
                                            <i class="fa fa-arrow-right"></i> Food Franchising<br />
                                            <i class="fa fa-arrow-right"></i> Size of Food franchise in India<br />
                                            <i class="fa fa-arrow-right"></i> Food franchise is growing<br />
                                            <i class="fa fa-arrow-right"></i> Geographical break-up of food franchise system<br />
                                            <i class="fa fa-arrow-right"></i> Fastest growing cuisine in food franchise<br />
                                            <i class="fa fa-arrow-right"></i> Branding in food franchising<br />
                                            <i class="fa fa-arrow-right"></i> 10 key components for food franchising in indiaLocation is vital<br />
                                            <i class="fa fa-arrow-right"></i> India-A favored business destination<br />
                                            <i class="fa fa-arrow-right"></i> Appointing Master Franchising vs Regional franchising<br /></li>

                                        <li><strong>Chapter IV</strong><br>
                                            <i class="fa fa-arrow-right"></i> F&B supply: Scene behind the scence<br />
                                            <i class="fa fa-arrow-right"></i> Mall Developers: New Retail and space supplier<br />
                                            <i class="fa fa-arrow-right"></i> Key area negotiating a lease in a food court<br />
                                            <i class="fa fa-arrow-right"></i> Retail design<br />
                                            <i class="fa fa-arrow-right"></i> IT Support: streamlining operation<br />
                                            <i class="fa fa-arrow-right"></i> F&B: Business all about ingredients<br />
                                            <i class="fa fa-arrow-right"></i> Logistics: A means for transport<br /></li>

                                        <li><strong>Chapter V - CASE STUDIES</strong><br>
                                            <i class="fa fa-arrow-right"></i> McDonald<br />
                                            <i class="fa fa-arrow-right"></i> Cafe Coffee Day<br />
                                            <i class="fa fa-arrow-right"></i> Jumboking<br />
                                            <i class="fa fa-arrow-right"></i> Mumbai Dabbawala<br />
                                            <i class="fa fa-arrow-right"></i> Domino's<br />
                                            <i class="fa fa-arrow-right"></i> Sagar Ratna<br />
                                            <i class="fa fa-arrow-right"></i> Yo! China<br />
                                        </li>

                                        <li><strong>Chapter V </strong><br>
                                            <i class="fa fa-arrow-right"></i> Food and Beverage Directory of 100 Promising food companies
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
