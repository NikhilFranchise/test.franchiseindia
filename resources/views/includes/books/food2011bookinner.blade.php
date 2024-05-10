@extends('layout.master')
@section('seoTitle', 'The Food Franchising Report 2011 - Franchise India')
@section('seoDesc', 'The Food Franchising Report 2011 is India first exclusive Franchise report on the food industry brought out jointly by FICCI-CIFTI & Franchise India Holdings Ltd')
@section('seoKeywords', 'Fc 2017, Francast, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-2011-3.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">The Food Franchising Report 2011</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="The Food Franchising Report 2011">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.food2011.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.food2011.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.food2011.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.food2011.usa')}}
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


                            <p class="book-st-txt"><strong>The Food Franchising Report 2011</strong> is India's first
                                exclusive Franchise report on the food industry <strong>brought out jointly by
                                    FICCI-CIFTI & Franchise India Holdings Ltd.</strong> The report highlights authentic
                                facts about the Indian Food Franchising Market and showcases extensive know-how about
                                the Indian Food Market, Food Franchising in India & the Indian Food and Beverage
                                Suppliers. This report provides a strategic approach to the opportunities and challenges
                                for growth through the franchise route in the food industry.
                                <br/><br/>
                                <strong>Report Highlights</strong>
                                The primary objective of this report is to provide a snapshot of current trends in Food
                                Franchising vis-a-vis expert analysis of various elements which have an implication on
                                it. The report is divided in 5 parts which cover a range of issues from the Indian
                                Market opportunity to Growth of Food Industry in India, about the Franchising industry
                                at large and about Food Franchising and how it is poised to grow further. The report
                                also gives case studies about suppliers in real-estate, technology, equipment, food
                                materials aiding the franchise food operators. To view Executive Summary of the Report-
                                Click Here
                                <br/><br/>
                                <strong>A Must Buy</strong>
                                Food Franchising Report 2011 gives a comprehensive learning curve for restaurant owners
                                and existing food companies looking out to expand their brand across the country. The
                                Report is a must buy for everyone who is in the food service industry or is planning to
                                enter the food services sector through the franchise route. Master Franchisees of
                                International Food Brands, Multi-unit and multi-concept franchisees in food service
                                industry will find it useful to carry out their growth plans. International Food Brands
                                looking to carve an India entry will find the report a functional guide towards building
                                their growth strategy.
                                <br/><br/>
                                <strong>Food Franchise Directory</strong>
                                This rich content is further supplemented by a "best of" compilation food service
                                franchise operators Directory .For entrepreneurs who are looking to enter or grow in the
                                food service sector, the directory pages have it all, to seek out the franchise that's
                                right for you or grow the business in the world of food outlets. The Directory will give
                                a complete information on over 100 available food franchise systems in India. These
                                pages cover franchise opportunities in bakery goods and pastry shops, candy and snack
                                stores, coffee and espresso bars, full service franchise restaurants and bars, ice cream
                                and frozen yogurt parlors, pizza restaurant franchises, quick service and take out
                                venues, and sandwich shops. </p>


                        </div>

                        <div id="booktabcontent2">


                            <p class="book-st-txt"><strong>INDIA OVERVIEW</strong> India is a country of striking
                                contrasts and enormous ethnic, linguistic and cultural diversity. It has a population of
                                1.21 billion with 28 states and seven Union Territories (under federal government rule).
                                The states differ vastly in resources, culture, food habits, living standards and
                                languages. Vast disparities in per-capita income levels exist between and within the
                                states. About 75 per cent of the country's population lives in six lakh villages and the
                                rest in 7,000 towns and cities. There are 27 cities with population above one million.
                                <br/><br/>
                                Nearly, 48 per cent of Indians spend on food (54 per cent in rural areas and 41 per cent
                                in urban areas); mostly on basic food items like grains, vegetable oils, sugar,
                                vegetables, eggs, fruits etc. Religion has a major influence on eating habits and
                                predominantly supports a vegetarian diet.
                                Per capita expenditure on food consumption by people in rural areas is more than 10 per
                                cent than people in urban parts. The figures on consumption pattern released by the
                                National Sample Survey Office (NSSO) showed that over half of the expenditure by rural
                                households went on food items during 2009-10. The figure for urban India was 40 per cent
                                and the reason for high spending on food items was inflation, which touched 19 per cent
                                during 2009 -10. The data also showed a difference in the consumption patterns of the
                                rural and urban India. In urban parts, one has to spend a lot on rent and transport,
                                which is not the case in rural areas. So, percentage of food expenditure in urban India
                                was less. Per capita consumption expenditure in urban India stood at Rs 1,984.46 per
                                month against Rs 1,053.64 in rural areas in 2009-10.
                                <br/><br/>
                                Some observers are, however, highly optimistic about the consumption growth potential
                                and believe that rising income levels, increasing urbanisation, a changing age profile
                                (more young people), increasing consumerism, a significant rise in the number of single
                                men and women professionals and availability of easy credit will push India onto a new
                                growth trajectory. These segments of the population are aware of quality differences,
                                insist on world standards and are willing to pay a premium for quality. Nonetheless, a
                                major share of Indian consumers has to sacrifice quality for affordable prices.
                                <br/><br/>
                                A peep into economic indicators<br/>
                                The total population of the country as on March 1, 2011, was 1,210,193,422 with
                                623,724,248 males and 586,469,174 females.
                                Some facts about Indian population
                                <br/><br/>

                            <ul class="book-txt-list">
                                <li><i class="fa fa-circle-o"></i> India has 191 million households (approx) out of
                                    which six million, classified as 'rich', have annual income of over USD 4,700, and
                                    75 million classified as 'consuming class', have annual incomes between USD 1,000
                                    and 4,700 <br/><br/></li>
                                <li><i class="fa fa-circle-o"></i> An estimated one million households at the top of
                                    India's income map includes the 'super-rich' in the country. Growing by 20 per cent
                                    every year, this segments' buying behaviour is in line with its corresponding
                                    international segments<br/><br/></li>
                                <li><i class="fa fa-circle-o"></i> More than 50 per cent of the population is less than
                                    25 years<br/><br/></li>
                                <li><i class="fa fa-circle-o"></i> There has also been a phenomenal increase in incomes
                                    especially with the birth of double incomes<br/><br/></li>
                                <li><i class="fa fa-circle-o"></i> The Indian middle class currently comprises less than
                                    30 per cent of the total population<br/><br/></li>
                                <li><i class="fa fa-circle-o"></i> The Indian urban population is projected to increase
                                    from 28 per cent to 40 per cent of the total population by 2020 Presently, India is
                                    among the world's largest economies, following the globalisation and liberalisation
                                    that started about 18 years ago. The economy is growing in leaps and bounds and the
                                    Gross Domestic Product (GDP) was recorded at 9.8 per cent in 2006, 9.3 per cent in
                                    2007, 7.8 per cent in 2008, 7.4 per cent in 2009 and 8.5 per cent in 2010-11 and it
                                    is expected to grow eight per cent in 2012. In the food and beverage market, for
                                    food companies, India's huge population of 1.21 billion consumers is the major
                                    attraction and the factors include rising per capita disposable income, large and
                                    growing middle class, increasing exposure to the West, a slow, but steady
                                    transformation of the retail food sector in cities, growing number of fast food
                                    chains, increasing urbanisation, growing number of working women, growing food
                                    processing industry looking for imported food ingredients, growing health awareness
                                    among the middle class and growing consumerism. Still, there are some major
                                    challenges before the country's Food and Beverage Industry due to divergent food
                                    habits, preference for fresh products and traditional foods, difficulties in
                                    accessing vast untapped rural markets, poor infrastructure, diverse agro-industrial
                                    base, offering products at competitive prices, high tariffs, out-dated food laws,
                                    and unscientific sanitary and phytosanitary restrictions and competition from other
                                    countries.
                                </li>
                            </ul>

                            Service sector playing major role The share of services in India's GDP at factor cost
                            increased rapidly from 30.5 per cent in 1950-51 to 55.2 per cent in 2009-10. If construction
                            is also included then the share increased to 63.4 per cent in 2009-10. These sectors
                            directly and indirectly generate huge employment, resulting in increased income in the hands
                            of the people and in turn increase in consumption. However, as the economy is relatively
                            insulated from the global financial meltdown, India's growth remains on track from a
                            long-term perspective. The growth in Indian economy, from 5.7 per cent in the 90s to 8.6 per
                            cent during 2004-05 to 2009-10, was largely due to the acceleration of the growth rate,
                            Compound Annual Growth Rate (CAGR), in the services sector from 7.5 per cent to 10.3 per
                            cent. The service sector growth was significantly faster than 6.6 per cent for the combined
                            agriculture and industry sectors. In 2009-10, services growth was 10.1 per cent and in
                            2010-11 (advance estimatesAE) it was 9.6 per cent. India's services GDP growth has been
                            continuously above overall GDP growth.
                            <br/><br/>
                            The services categories- trade, hotels, transport and communication, financing, insurance,
                            real estate and business services have performed well with the growth of 11 per cent and
                            10.6 per cent, respectively in 2010-11 (AE). Only community, social and personal services
                            have registered a low growth of 5.7 per cent due to base effect of fiscal stimulus in the
                            previous years, thus contributing to the slight deceleration in the growth of the services
                            sector.
                            <br/><br/>
                            Agri-wise growth The growth rate in agriculture showed an upward trend in the third advanced
                            estimate as compared to the second advanced estimate. Due to this upward trend in the
                            production, the growth rate in agriculture, forestry and fishing sector in 2009-10 showed a
                            growth rate of 0.2 per cent, as against the growth rate of (-) 0.2 per cent in the advance
                            estimates. Mining and quarrying registered a growth rate of 9.7 per cent during 2009-10, as
                            against the growth rate of 8.3 per cent during April-November, 2009, which was used in the
                            advance estimate. Similarly, manufacturing registered a growth rate of 10.9 per cent during
                            2009-10, as against the growth rate of 7.7 per cent during April-November 2009. Due to this
                            increase in the GDP, manufacturing sector is now estimated at 10.8 per cent, as against the
                            advance estimate growth rate of 8.9 per cent.
                            Inflation hurdle Economists forecast the growth in the financial year March 2012, will be
                            7.9 per cent, quite a drop from last year's 8.5, but they are also optimistic about the
                            recovery to 8.4 per cent by March 2013, end. Inflation rate has reduced from double digit to
                            single digit, which is a sign of relief. Increasing commodity prices, especially oil and
                            food articles had fuelled inflation in India in recent times. As per government statistics,
                            India's food price index stood at 7.33 per cent and the fuel price index reached 12.12 per
                            cent in July, 2011. In the previous check, annual food and fuel inflation stood at 7.58 per
                            cent and 11.89 per cent, respectively.
                            <br/><br/>
                            Eating out in India Global slowdown has been fairy resilient on the F&B industry as compared
                            to others. The industry is expected to grow further. With developing economy and large
                            population with rising per capita income are propelling the growth. India and its eating
                            habits are changing dramatically from eating at home to eating out. This transition phase is
                            fuelled due to various economic reasons. The market (eating out) is driven by consumers
                            eating at any form of outlet restaurants, fine dining, Quick Service Restaurants (QSRs),
                            takeaways, 'dhabas' or any other form of unorganised eateries. </p>
                            <br/><br/>
                            <p><strong>Service sector playing major role</strong> The share of services in India's GDP
                                at factor cost increased rapidly from 30.5 per cent in 1950-51 to 55.2 per cent in
                                2009-10. If construction is also included then the share increased to 63.4 per cent in
                                2009-10. These sectors directly and indirectly generate huge employment, resulting in
                                increased income in the hands of the people and in turn increase in consumption.
                                However, as the economy is relatively insulated from the global financial meltdown,
                                India's growth remains on track from a long-term perspective. The growth in Indian
                                economy, from 5.7 per cent in the 90s to 8.6 per cent during 2004-05 to 2009-10, was
                                largely due to the acceleration of the growth rate, Compound Annual Growth Rate (CAGR),
                                in the services sector from 7.5 per cent to 10.3 per cent. The service sector growth was
                                significantly faster than 6.6 per cent for the combined agriculture and industry
                                sectors. In 2009-10, services growth was 10.1 per cent and in 2010-11 (advance
                                estimatesAE) it was 9.6 per cent. India's services GDP growth has been continuously
                                above overall GDP growth.
                                <br/><br/>
                                The services categories- trade, hotels, transport and communication, financing,
                                insurance, real estate and business services have performed well with the growth of 11
                                per cent and 10.6 per cent, respectively in 2010-11 (AE). Only community, social and
                                personal services have registered a low growth of 5.7 per cent due to base effect of
                                fiscal stimulus in the previous years, thus contributing to the slight deceleration in
                                the growth of the services sector.
                                <br/><br/>
                                <strong>Agri-wise growth</strong> The growth rate in agriculture showed an upward trend
                                in the third advanced estimate as compared to the second advanced estimate. Due to this
                                upward trend in the production, the growth rate in agriculture, forestry and fishing
                                sector in 2009-10 showed a growth rate of 0.2 per cent, as against the growth rate of
                                (-) 0.2 per cent in the advance estimates. Mining and quarrying registered a growth rate
                                of 9.7 per cent during 2009-10, as against the growth rate of 8.3 per cent during
                                April-November, 2009, which was used in the advance estimate. Similarly, manufacturing
                                registered a growth rate of 10.9 per cent during 2009-10, as against the growth rate of
                                7.7 per cent during April-November 2009. Due to this increase in the GDP, manufacturing
                                sector is now estimated at 10.8 per cent, as against the advance estimate growth rate of
                                8.9 per cent.
                                <br/><br/>
                                <strong>Inflation hurdle</strong> Economists forecast the growth in the financial year
                                March 2012, will be 7.9 per cent, quite a drop from last year's 8.5, but they are also
                                optimistic about the recovery to 8.4 per cent by March 2013, end. Inflation rate has
                                reduced from double digit to single digit, which is a sign of relief. Increasing
                                commodity prices, especially oil and food articles had fuelled inflation in India in
                                recent times. As per government statistics, India's food price index stood at 7.33 per
                                cent and the fuel price index reached 12.12 per cent in July, 2011. In the previous
                                check, annual food and fuel inflation stood at 7.58 per cent and 11.89 per cent,
                                respectively.
                                <br/><br/>
                                <strong>Eating out in India</strong> Global slowdown has been fairy resilient on the F&B
                                industry as compared to others. The industry is expected to grow further. With
                                developing economy and large population with rising per capita income are propelling the
                                growth. India and its eating habits are changing dramatically from eating at home to
                                eating out. This transition phase is fuelled due to various economic reasons. The market
                                (eating out) is driven by consumers eating at any form of outlet restaurants, fine
                                dining, Quick Service Restaurants (QSRs), takeaways, 'dhabas' or any other form of
                                unorganised eateries.
                                <br/><br/>
                                <strong>Growth drivers</strong>
                            <ul class="book-txt-list">
                                <li><i class="fa fa-circle-o"></i> Increasing number of women joining the workforce</li>
                                <li><i class="fa fa-circle-o"></i> Rising disposable incomes and increase in
                                    double-income households
                                </li>
                                <li><i class="fa fa-circle-o"></i> Growth in nuclear families, particularly in urban
                                    India
                                </li>
                                <li><i class="fa fa-circle-o"></i> Exposure to global media and cuisine</li>
                                <li><i class="fa fa-circle-o"></i> Better logistics</li>
                                <li><i class="fa fa-circle-o"></i> Mall and multiplex boom</li>
                                <li><i class="fa fa-circle-o"></i> Growing preference for branded eateries</li>
                                <li><i class="fa fa-circle-o"></i> Eating out is closely associated with fun time.
                                    Almost 50 per cent of the Indians eat out on regular basis. Indians, on an average
                                    eat out 1.2 times a month, where as it is 40 times in Singapore. Even if the number
                                    goes up to four in India, this will generate the largest opportunity in the market.
                                </li>
                                <li><i class="fa fa-circle-o"></i> Seven per cent of the total restaurant market
                                    includes Quick Service Restaurants (QSR) and the restaurant industry is growing at
                                    20-30 per cent. Foreign fast food companies are also aggressively increasing their
                                    presence.
                                </li>
                                <li><i class="fa fa-circle-o"></i> The industry growth is fuelled by a population of 300
                                    million from the age group 13-24. The key consumption areas are clothing and
                                    accessories, food, entertainment and durables.
                                </li>
                                <li><i class="fa fa-circle-o"></i> Spending power of this segment ranges between Rs
                                    3,000 and 40,000 per month. The size of the Indian restaurant sector is estimated to
                                    be USD six billion and is expected to grow to USD 10 billion by 2018, almost 80 per
                                    cent of the total restaurant industry is unorganised. Despite the economic slowdown,
                                    the unorganised share is estimated to witness five per cent growth, whereas 20-25
                                    per cent growth is estimated in the organised sector.
                                </li>
                            </ul>
                            </p>
                            <p>
                                Plastic money fuelling growth Modern formats such as malls, multiplexes and food courts
                                have favoured the growth in F&B sector, as for majority of the population this is their
                                favourite time pass, capitalising this has improved the performance many folds. Rising
                                per capita income and tier-II and III cities promising growth has maneuvered restaurant
                                owners to tap the left out markets. Increasing base of credit/debit card holders is also
                                fuelling growth in eating out market. It is estimated that 25 million people were using
                                cards for money transactions in 2008 and the growth is poised 20-25 per cent
                                year-on-year. Travel, hotel and dining category accounts for 35 per cent of credit card
                                usage.
                                <br/><br/>
                                Future perfect! India has the potential to be a huge market and long-term opportunities
                                for retailers are immense. According to Mc Kinsey Global Institute (MGI), India is
                                likely to quadruple its consumption and be the fifth largest consumer by market size,
                                continuing economic growth by 2025. A consumer confidence survey by Nielson ranked India
                                as one of the fastest growing markets in the world and the current consumer belief that
                                recession would soon be a thing of the past has fuelled Indians with confidence.
                                According to the recent reports, the Indian consumer sector is attracting more interest
                                from both private equity (PE), mergers and acquisitions. Fragmented nature of the retail
                                sector and liberalisation of the economy indicates that the market will be increasingly
                                attractive to foreign food giants. India's food service entrepreneurs are executing
                                massive expansion plans with the industry expected to grow 48 per cent to USD 667.49
                                million in the next two years. A number of food service players from overseas have
                                already signaled their intent to enter India and many more are likely to follow the
                                suit.
                            </p>

                        </div>


                        <div id="booktabcontent3">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Acknowledgments 06 </strong></li>
                                        <li><strong>Foreword 7-8</strong></li>
                                        <li><strong>Executive Summary 09</strong></li>

                                        <li><strong>Chapter I </strong><br>
                                            <i class="fa fa-arrow-right"></i> Indian Overviews: 10-16<br/>
                                            <i class="fa fa-arrow-right"></i> A peep into economic indicators<br/>
                                            <i class="fa fa-arrow-right"></i> Population density in major cities<br/>
                                            <i class="fa fa-arrow-right"></i> Gross domestic product<br/>
                                            <i class="fa fa-arrow-right"></i> Per capita income<br/>
                                            <i class="fa fa-arrow-right"></i> Increase in saving & investments<br/>
                                            <i class="fa fa-arrow-right"></i> Foreign direct investment<br/>
                                            <i class="fa fa-arrow-right"></i> Strong foreign reserves<br/>
                                            <i class="fa fa-arrow-right"></i> Service sector playing major role<br/>
                                            <i class="fa fa-arrow-right"></i> Agri-wise growth<br/>
                                            <i class="fa fa-arrow-right"></i> Inflation hurdle<br/>
                                            <i class="fa fa-arrow-right"></i> Eating out in India Plastic money fuelling
                                            growth Future perfect<br/>
                                        </li>
                                        <li><strong>Chapter II</strong><br/>
                                            <i class="fa fa-arrow-right"></i> India 18-27<br/>
                                            <i class="fa fa-arrow-right"></i> The rise of franchising<br/>
                                            <i class="fa fa-arrow-right"></i> Arrival of franchisee age<br/>
                                            <i class="fa fa-arrow-right"></i> Franchisees' lookout<br/>
                                            <i class="fa fa-arrow-right"></i> Key to success<br/>
                                            <i class="fa fa-arrow-right"></i> Sector-wise growth in franchising<br/>
                                            <i class="fa fa-arrow-right"></i> Geographical distribution<br/>
                                            <i class="fa fa-arrow-right"></i> Age of systems<br/>
                                            <i class="fa fa-arrow-right"></i> Malls offer right infra for growth<br/>
                                            <i class="fa fa-arrow-right"></i> Small is the new big<br/>
                                            <i class="fa fa-arrow-right"></i> Fall in company-owned units<br/>
                                            <i class="fa fa-arrow-right"></i> Promising number of franchise units<br/>
                                            <i class="fa fa-arrow-right"></i> Franchise employment in India<br/>
                                            <i class="fa fa-arrow-right"></i> Supplementing government revenue<br/>
                                            <i class="fa fa-arrow-right"></i> Myth & realities<br/>
                                            <i class="fa fa-arrow-right"></i> Franchise laws in India<br/>
                                            <i class="fa fa-arrow-right"></i> Contract duration<br/>
                                            <i class="fa fa-arrow-right"></i> Key franchise bodies in India<br/>
                                        </li>
                                        <li><strong>Chapter III</strong><br>
                                            <i class="fa fa-arrow-right"></i> Franchising in Food & Beverage<br/>
                                            <i class="fa fa-arrow-right"></i> Industry 28-39<br/>
                                            <i class="fa fa-arrow-right"></i> Food industry<br/>
                                            <i class="fa fa-arrow-right"></i> Private equity in food service<br/>
                                            <i class="fa fa-arrow-right"></i> Franchising in food service<br/>
                                            <i class="fa fa-arrow-right"></i> International players eyeing India<br/>
                                            <i class="fa fa-arrow-right"></i> Rise in franchise-owned units<br/>
                                            <i class="fa fa-arrow-right"></i> Maximum return in QSRs<br/>
                                            <i class="fa fa-arrow-right"></i> Small formats<br/>
                                            <i class="fa fa-arrow-right"></i> Fine dine restaurants<br/>
                                            <i class="fa fa-arrow-right"></i> Hot favorite!<br/>
                                            <i class="fa fa-arrow-right"></i> Finding the right place<br/>
                                            <i class="fa fa-arrow-right"></i> New locations<br/>
                                            <i class="fa fa-arrow-right"></i> Setting a franchise restaurant chain<br/>
                                            <i class="fa fa-arrow-right"></i> Food franchise agreement<br/>
                                            <i class="fa fa-arrow-right"></i> Indian ingredients for franchising<br/>
                                        </li>
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter IV</strong><br>
                                            <i class="fa fa-arrow-right"></i> Food franchise<br/>
                                            <i class="fa fa-arrow-right"></i> success 41-46<br/>
                                            <i class="fa fa-arrow-right"></i> Bikanervala- Sweet taste of success<br/>
                                            <i class="fa fa-arrow-right"></i> Cafe Coffee Day- Brewing a success
                                            story<br/>
                                            <i class="fa fa-arrow-right"></i> McDonald's- Bite into fast food
                                            success<br/>
                                            <i class="fa fa-arrow-right"></i> Narula's- 'Thalicious' returns!<br/>
                                            <i class="fa fa-arrow-right"></i> Monginis- Earning brownie points<br/>
                                            <i class="fa fa-arrow-right"></i> Subway- Customise a tangy concoction<br/>
                                            <i class="fa fa-arrow-right"></i> Chokhi Dhani- Riding high on
                                            excellence<br/>
                                            <i class="fa fa-arrow-right"></i> Sagar Ratna- South Indian delight<br/>
                                        </li>

                                        <li><strong>Chapter V </strong><br>
                                            <i class="fa fa-arrow-right"></i> Behind the scene 47-62<br/>
                                            <i class="fa fa-arrow-right"></i> Suppliers fuel the growth<br/>
                                            <i class="fa fa-arrow-right"></i> Mall developers<br/>
                                            <i class="fa fa-arrow-right"></i> Salient features for layout of a food
                                            court<br/>
                                            <i class="fa fa-arrow-right"></i> Food courts and franchising<br/>
                                            <i class="fa fa-arrow-right"></i> Retail design<br/>
                                            <i class="fa fa-arrow-right"></i> IT support<br/>
                                            <i class="fa fa-arrow-right"></i> Frozen & packaged foods<br/>
                                            <i class="fa fa-arrow-right"></i> Tools for running a kitchen<br/>
                                            <i class="fa fa-arrow-right"></i> Logistics<br/><br/>
                                            <i class="fa fa-arrow-right"></i> Food & Beverage directory 63-75<br/>
                                            <i class="fa fa-arrow-right"></i> Annexure 76-77<br/>
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
