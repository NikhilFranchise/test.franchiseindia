@extends('layout.master')
@section('seoTitle', 'Indian Salon Report 2012 - Franchise India')
@section('seoDesc', 'Indian Salon Report 2012 is a pioneering effort on the part of Franchise India Holdings Limited to bring to the forefront the changing consumption pattern, leading to a paradigm shift in the beauty services ecosystem. There has always been a distinct premium attached to looking and feeling good, the desire to be attractive has never seen a recession, keeping the salon and beauty industry recession proof.')
@section('seoKeywords', 'isr, indian salon report 2012, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-2012-2.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Salon Report 2012</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Salon Report 2012">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.salon2012.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.salon2012.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.salon2012.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.salon2012.usa')}}
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


                            <p class="book-st-txt">'Indian Salon Report 2012', is a pioneering effort on the part of
                                Franchise India Holdings Limited to bring to the forefront the changing consumption
                                pattern, leading to a paradigm shift in the beauty services ecosystem. There has always
                                been a distinct premium attached to looking and feeling good, the desire to be
                                attractive has never seen a recession, keeping the salon and beauty industry recession
                                proof. Consumers are growing affluent and aspiration driven. With more easily disposable
                                income at hand, they are spending more on how they look. Through an elaborate survey of
                                the urban working population, and detailed industry interaction, Franchise India brings
                                to the forefront the latest report on salon business and consumption. The report reveals
                                that 2012 stands as a year that will lead change through the beauty services business.
                                The growth of the organised section is catapulting the industry towards a greater
                                paradigm shift. Driving this growth wave are big national and international cosmetic
                                companies that have ventured into the salon business and expanded their business
                                boundaries to be a part of the beauty services industry.
                                <br/><br/>
                                The salon industry presently is largely unorganised, and will grow at an average rate of
                                30 per cent over the next decade. But it will more rapidly move towards becoming
                                organised with the entry of international players and national/international cosmetic
                                companies. Thus, the internal growth rate of the industry (from unorganised to organised
                                will be much faster). The few major trends that have come out, as a result of this
                                detailed research, is the advent, adaptability and fast growth seen in the salon
                                franchising. Franchise salons will stand to cover 25 per cent of the overall organised
                                industry by 2020, and grow to be a Rs 4,500 crore industry. The concept of grooming and
                                beauty is only evolving with time, and hence, it is not surprising that both men and
                                women are seeking the services of beauticians and hair stylists for enhancing their
                                appearances. Indian men are getting more beauty conscious than ever.
                                <br/><br/>
                                Of the male respondents, 53 per cent visit a salon once a month and 20 per cent visit a
                                salon twice a month. Males like their female counterparts are experimenting with the
                                newer beauty services. Around 67 per cent of males make use of services like hair
                                massage and spa. The average monthly spend of majority (40%) of respondents is between
                                Rs 500 - 1,000; and they choose service quality over any other factor, as the major
                                reason for staying loyal to a neighbourhood salon.
                                <br/><br/>
                                Overall, the report aims to incorporate trends in the industry, as well as brings
                                forward a study of the overall consumption, as these are factors governing growth and
                                change around the business format of the salon industry. </p>


                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1 : Overriding Beauty Industry (09)</strong><br>
                                            <i class="fa fa-arrow-right"></i> (I) Global Industry Growth
                                            Perspective<br/>
                                            <i class="fa fa-arrow-right"></i> (II) Salon Beauty Industry In India<br/>
                                            <i class="fa fa-arrow-right"></i> (III) Just Cut For the Consumer<br/>
                                            <i class="fa fa-arrow-right"></i> (IV) Wedding Consumption Scaling-Up<br/>
                                        </li>
                                        <li><strong>Chapter 2: Salon Operations- Mastering the Art (19)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> (I) Salon Supplies<br/>
                                            <i class="fa fa-arrow-right"></i> (II) Location Aesthetics<br/>
                                            <i class="fa fa-arrow-right"></i> (III) Training opportunity & The Big
                                            Gap<br/>
                                            <i class="fa fa-arrow-right"></i> (IV) New Age marketing for
                                            Consumption<br/>
                                        </li>

                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 3: Growth Accelerators (27)</strong><br>
                                            <i class="fa fa-arrow-right"></i> (I) Franchise For Business Growth<br/>
                                            <i class="fa fa-arrow-right"></i> (II) Beauty Schools- Expanding
                                            Service<br/>
                                            <i class="fa fa-arrow-right"></i> (III) Private Labels Leading Product<br/>
                                            <i class="fa fa-arrow-right"></i> (IV) Integrating Services: Spa, Salon &
                                            More<br/>
                                            <i class="fa fa-arrow-right"></i> (V) The Big Ticket Investors: PE
                                            Players<br/></li>

                                        <li><strong>Chapter 4: Sprawling Spa Business (35) </strong><br></li>
                                        <li><strong>Case Studies(41) </strong><br></li>
                                        <li><strong>Directory (49)</strong></li>
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
