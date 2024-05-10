@extends('layout.master')
@section('seoTitle', 'Indian Restaurant Report 2012 - Franchise India')
@section('seoDesc', 'Indian Restaurant Report 2012 is a pioneering effort of FICCI-CIFTI &amp; Franchise India Holdings Limited to bring to the forefront the changing consumption pattern, leading to a paradigm shift in the food services ecosystem. The Indian restaurant industry stands at a staggering Rs 75,000 crore mark, eating-out is growing paramount.')
@section('seoKeywords', 'irr, indian restaurant report 2012, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-2012-3.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Restaurant Report 2012</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Restaurant Report 2012">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.restaurant.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.restaurant.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.restaurant.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.restaurant.usa')}}
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


                            <p class="book-st-txt"><strong>'Indian Restaurant Report 2012'</strong>, is a pioneering
                                effort of <strong>FICCI-CIFTI & Franchise India Holdings Limited</strong> to bring to
                                the forefront the changing consumption pattern, leading to a paradigm shift in the food
                                services ecosystem. The Indian restaurant industry stands at a staggering Rs 75,000
                                crore mark, eating-out is growing paramount. It has a feel good factor attached to it
                                making the food service industry recession proof. Consumers are growing affluent and
                                aspiration driven. With more easily disposable income at hand, they are spending more on
                                entertainment and leisure, which are the prime focal point for the organized food
                                service industry.
                                <br/><br/>
                                Through an elaborate survey of the urban working population, and detailed industry
                                interaction; Franchise India, brings to the forefront the latest report on the
                                restaurant business and consumption. The report reveals that in over a year's time, an
                                average Indian has started to eat-out twice as much. The growth of the organised section
                                is catapulting the industry towards a greater paradigm shift. Driving this growth wave
                                are big national and international food service companies that have ventured into the
                                restaurant business and expanded their horizon beyond the metros.
                                <br/><br/>
                                The report delivers deep insight into the consumption pattern highlighting, the eating
                                out trends and spending pattern of an average Indian, including a detailed study on the
                                following aspects:</p>
                            <ul class="book-txt-list">
                                <li><i class="fa fa-circle-o"></i> Where, what & when do people eat?</li>
                                <li><i class="fa fa-circle-o"></i> Meal at work: Growing need for institutional catering
                                </li>
                                <li><i class="fa fa-circle-o"></i> Beverages consumption on a high rise</li>
                                <li><i class="fa fa-circle-o"></i> Eating at different establishments</li>
                                <li><i class="fa fa-circle-o"></i> How do consumers make their choice?</li>
                            </ul>
                            <p class="book-st-txt">
                                The restaurant industry presently is largely unorganised, and will grow at an average
                                rate of 17 per cent overall in the next decade. But it will more rapidly move towards
                                becoming organised with the entry of international players and national/international
                                food service brands. Thus the internal growth rate of the industry (from unorganised to
                                organised will be much faster). The few major trends that have come out, as a result of
                                this detailed research, is the advent, adaptability and fast growth seen in the
                                restaurant franchising. Food service franchises remain one of the most appealing
                                business concepts for the aspiring entrepreneurs in India. The franchising sector in
                                India is growing at a swift pace of 35 to 40 per cent per annum. The market size of
                                franchising sector is estimated to be Rs 35,000 crore and is likely to reach Rs 80,000
                                crore by 2013.
                                <br/><br/>
                                Overall the report aims to incorporate trends in the industry, as well as brings forward
                                a study of the overall consumption, as these are factors governing growth and change
                                around the business format of the restaurant industry.</p>
                        </div>

                        <div id="booktabcontent2">
                            <!--<span class="static-subheading maginbottom10">Book Index</span>-->
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1: Indian Food Service Economy (09) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Growth Drivers & Challenges <br/>
                                            <i class="fa fa-arrow-right"></i> Making a Global Comparison<br/>
                                            <i class="fa fa-arrow-right"></i> Advent of Branded Food Service
                                            Providers<br/>
                                            <i class="fa fa-arrow-right"></i> Food Service Licensing and Regulations
                                        </li>
                                        <li><strong>Chapter 2: Eating Out Trends: Consumer Study (19) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Where, What and When Do People Eat? <br/>
                                            <i class="fa fa-arrow-right"></i> Meal at Work: Wide Band Width of
                                            Institutional Catering<br/>
                                            <i class="fa fa-arrow-right"></i> Brewing Beverage Consumption<br/>
                                            <i class="fa fa-arrow-right"></i> Eating at Different Establishments<br/>
                                            <i class="fa fa-arrow-right"></i> How do Consumers Choose?
                                        </li>
                                        <li><strong>Chapter 3: Market Segment & Analysis (33)</strong><br>
                                            <i class="fa fa-arrow-right"></i> Fine Dining Restaurants <br/>
                                            <i class="fa fa-arrow-right"></i> QSR and Fast Casual<br/>
                                            <i class="fa fa-arrow-right"></i> Home Delivery<br/>
                                            <i class="fa fa-arrow-right"></i> Grab and Go (Kiosk)<br/>
                                            <i class="fa fa-arrow-right"></i> Cafe<br/>
                                            <i class="fa fa-arrow-right"></i> Food Court<br/>
                                            <i class="fa fa-arrow-right"></i> Transit Food<br/>
                                            <i class="fa fa-arrow-right"></i> Institutional Catering
                                        </li>
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">

                                        <li><strong>Chapter 4: Encompassing Eco System (51)</strong><br>
                                        </li>
                                        <li><strong>Chapter 5: Food Franchising & Beyond (59)</strong><br>
                                            <i class="fa fa-arrow-right"></i> Business Expansion via Franchising<br/>
                                            <i class="fa fa-arrow-right"></i> Joint Venture<br/>
                                            <i class="fa fa-arrow-right"></i> Recruiting Franchisee
                                        </li>
                                        <li><strong>Chapter 6: Funding Growth: Investment Avenues (69)</strong><br></li>
                                        <li><strong>Case Studies (74)</strong><br></li>
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
