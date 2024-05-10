@extends('layout.master')
@section('seoTitle', 'Indian Salon Report 2014 - Franchise India')
@section('seoDesc', 'Indian Salon Report 2014 is a pioneer effort of Franchise India to bring forth the industry analysis and trends, consumer perspectives, revenue streams and growth enablers, together contributing to the future of the industry. Every attempt has been made to make this report exhaustive, covering every aspect of the industry.')
@section('seoKeywords', 'isr, indian salon report 2014, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-2014.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Salon Report 2014</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Salon Report 2014">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.salon2014.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.salon2014.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.salon2014.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.salon2014.usa')}}
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


                            <p class="book-st-txt"><strong>'Indian Salon Report 2014'</strong> is a pioneer effort of
                                Franchise India to bring forth the industry analysis and trends, consumer perspectives,
                                revenue streams and growth enablers, together contributing to the future of the
                                industry. Every attempt has been made to make this report exhaustive, covering every
                                aspect of the industry.
                                <BR/><BR/>
                                Salons have become an integral part of Indian consumers, who are regularly visiting
                                Salons for makeover services. As well, the emergence of new concepts, equipment and
                                technology has taken the Indian Salon Industry to new heights, making it an industry
                                worth USD 2.6 Billion. Presently, the industry is growing at 30 per cent and promises to
                                show improvements in its growth rate.
                                <BR/><BR/>
                                We have conducted an extensive survey for a deeper understanding of the industry. The
                                survey results appear positive and indicate towards growth in consumption in the coming
                                years. The research conducted on the beauty services patterns among the urban Indians
                                reveals that the frequency of visits to their choice of salon has increased over the
                                past year, which is influenced to a greater extent by the 'look-gracious' propaganda.
                                The research also identifies that 61 per cent males and 54 per cent females are visiting
                                a salon on a monthly basis and more than 60 per cent the respondents are spending
                                between INR 1,000-2,000 on beauty services. Another wing of consumers - the brides -
                                spends INR 10,000-15000 (79 per cent) on their pre-bridal and 60 per cent prefer to go
                                to their regular salons.
                                <BR/><BR/>
                                The key players in the industry are wooing the consumers by providing - Convenience,
                                Effective solutions, Styles and Fashion, Exclusivity and Consumer Delight. Also, the
                                players are introducing different concepts of businesses, where they are setting-up
                                single service salons, integration of services, providing private label products, etc.
                                All these efforts are shaping the overall landscape of the industry.
                                <BR/><BR/>
                                Glancing towards the business expansion, franchise route continues to be the best. This
                                route helps the brand enter into new markets rapidly. Hundreds of Salon and Spa brands
                                have strategised their growth plan via franchise expansion - a win-win situation for
                                both franchisee and the brand. Therefore, the Indian Salon industry has around 23 per
                                cent franchise salons, which will boom to USD 260 Million mark by 2015.
                                <BR/><BR/>
                                The report also covers the Indian Spa market, which is worth USD 7.2 Billion. Spas,
                                which were considered to be a luxury earlier, have now become part of people's
                                lifestyle. People are increasingly visiting Spas to rejuvenate their mind, body and
                                soul.
                                <BR/><BR/>
                                Finally, through the case studies' section the report provides a particular brand's
                                growth story and business strategies. </p>


                        </div>

                        <div id="booktabcontent2">


                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1 : INDIAN SALON INDUSTRY: AN ANALYSIS</strong><br>
                                            The growth curve of the Indian Salon Industry is rising high every year.
                                            Thanks to the modern infrastructure which has taken the industry to an
                                            international level and an ever increasing urge of consumers to look good,
                                            Indian salons have and are still evolving at the rate of 30 per cent - from
                                            an unstructured market to a more comprehensive ecosystem.
                                        </li>

                                        <li><strong>Chapter 2: CONSUMER CONNECT WITH INDUSTRY</strong><br>
                                            The "connect" between the consumer and the industry players plays a key role
                                            in the success of any salon or spa. The salon must understand the
                                            consumption pattern, consumer's need and demand, price sensitivity, and
                                            other factors which determine future strategy - expansion, price and
                                            promotion of any brand.
                                        </li>

                                        <li><strong>Chapter 3: THE IMPORTANCE OF WOW!</strong><br>
                                            Brimming with new innovation and valid modification, the two foremost
                                            reasons behind the balancing of industry's eco-system, the Salon Industry is
                                            advancing toward growth. Few brands are opting for PE funds, many brands are
                                            now seeking franchise route for their expansion while a few are seen
                                            collaborating with beauty product brands.
                                        </li>
                                    </ul>
                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 4: SPA: LUXURY TO LIFESTYLE</strong><br>
                                            The Indian Spa Industry has transformed from where it was initially and has
                                            grown into a visible segment. The industry players are now investing their
                                            time and resources to make their Spa division - an Exotic Destination Spa!
                                        </li>
                                        <li><strong>CASE STUDIES</strong><br>
                                            The case study section takes a look at the turnaround stories of the Indian
                                            Salon players - covering their growth story, strategies, people policy,
                                            challenges, milestones and many more aspects which make them prominent in
                                            the industry.
                                        </li>
                                        <li><strong>ANNEXURE - STARTING A SALON BUSINESS</strong><br>
                                            A business plan is the first step towards becoming an entrepreneur. In this
                                            section we have framed the key business and financial aspects required to
                                            start a Salon in India.
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
