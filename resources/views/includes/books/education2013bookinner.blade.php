@extends('layout.master')
@section('seoTitle', 'Indian Education Investment Report 2014 - Franchise India')
@section('seoDesc', 'Indian Education Investment Report 2014 is a pioneering effort on part of Franchise India Holdings Limited to bring forth the persisting gaps, changing consumption patterns, demographical investments and business opportunities existent in the current Indian Education sector.')
@section('seoKeywords', 'ieir, indian education investment report 2014, books and reports')
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

    <div class="container formsection margintop60 staicp">
        <div class="row">

            <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-2013-2.jpg" alt="books-2013-2"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Education Investment Report 2014</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Education Investment Report 2014">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.edu2013.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.edu2013.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.edu2013.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.edu2013.usa')}}
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


                            <p class="book-st-txt">Indian Education Investment Report 2014 is a pioneering effort on
                                part of Franchise India Holdings Limited to bring forth the persisting gaps, changing
                                consumption patterns, demographical investments and business opportunities existent in
                                the current Indian Education sector.<br/><br/>

                                The Education market in India currently stands at a whopping YOY growth of 15 per cent.
                                However, there is further demand of investments to the tune of USD 100 billion for
                                construction and provisioning of educational facilities, especially in K-12 and higher
                                Education segments.<br/><br/>

                                The current spending on education stands at INR 1,035 per month for an urban household
                                and INR 293 for a rural household. However, consumers are willing to spend even higher
                                amounts if given access to quality education and this has brought private players to the
                                forefront. Likewise, the private sector is rapidly spreading its horizon in the
                                education market and currently accounts for 48 per cent of its total revenue. Realising
                                the pertinence of private sector to uplift Indian education, the Government has launched
                                Public
                                Private Partnerships (PPP) to invest in the education market.<br/><br/>

                                Besides being a regulated industry in the formal sector to an extent, the education
                                industry offers numerous investment opportunities for prospective investors. The report
                                highlights some of these opportunities and further elaborates the current demographical
                                investment trends across different education segments:
                            </p>


                            <ul class="book-txt-list">
                                <li><i class="fa fa-circle-o"></i> Preschool education</li>
                                <li><i class="fa fa-circle-o"></i> K-12 education</li>
                                <li><i class="fa fa-circle-o"></i> Higher education</li>
                                <li><i class="fa fa-circle-o"></i> Vocational training/institutions</li>
                            </ul>

                            <p class="book-st-txt">
                                The preschool education market, largely unregulated, is set for a 26 per cent growth
                                over the next few years. This exemplifies the opportunity for education providers to
                                enter preschool education. Some of the new business opportunities existing in the
                                preschool segment include teacher's training, inclusion of day care centres,
                                provisioning of after-school extra-curricular activities and edutainment
                                products.<br/><br/>

                                The K-12 market, though regulated, offers a number of opportunities, especially in the
                                informal sector, such as automated learning platforms, integration of ICT in classrooms,
                                diversification of information sector in formal K-12 market and integration of preschool
                                education with primary schooling.<br/><br/>

                                Higher education market is also flourishing with CAGR of 19 per cent expected over the
                                next couple of years. Investments in this sector are likely to be made in setting up
                                educational hubs and incubation centres, expanding existing institutions, developing
                                physical infrastructure, combining vocational education with mainstream education,
                                making alternative use of premises and e-learning.<br/><br/>

                                In terms of vocational training, the major prospective sectors from an investment
                                perspective seem to be banking and financial services, hospitality, IT/ITES and, beauty
                                & wellness.<br/><br/>

                                Overall, the report aims to capture the current gaps and trends in the education
                                investment market and brings to the forefront the overall consumption patterns,
                                investment opportunities and growth factors that are currently catapulting the Indian
                                education scenario.

                            </p>


                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1 : THE BOOMING ECONOMY OF EDUCATION SECTOR
                                                (10) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Education the ever-growing sector<br/>
                                            <i class="fa fa-arrow-right"></i> Key education segments<br/>
                                            <i class="fa fa-arrow-right"></i> Education budget and policies 2013-14<br/>
                                            <i class="fa fa-arrow-right"></i> Corporate making roads in education sector<br/>
                                            <i class="fa fa-arrow-right"></i> The way ahead
                                        </li>
                                        <li><strong>Chapter 2: PRESCHOOLOPENING GATEWAYS OF GROWTH (22) </strong><br/>
                                            <i class="fa fa-arrow-right"></i> Indian pre-K demographics<br/>
                                            <i class="fa fa-arrow-right"></i> Preschool consumption story<br/>
                                            <i class="fa fa-arrow-right"></i> Indian preschool market<br/>
                                            <i class="fa fa-arrow-right"></i> Franchising preschools<br/>
                                            <i class="fa fa-arrow-right"></i> Investment scenario in preschool
                                            market<br/>
                                            <i class="fa fa-arrow-right"></i> Expansion strategies<br/>
                                            <i class="fa fa-arrow-right"></i> New opportunities for preschool<br/>
                                            <i class="fa fa-arrow-right"></i> Starting a preschool
                                        </li>
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 3: K-12: OPENING GATEWAYS OF OPPORTUNITIES (34)</strong><br>
                                            <i class="fa fa-arrow-right"></i> Indian K-12 market<br>
                                            <i class="fa fa-arrow-right"></i> K-12 sector the gaps<br>
                                            <i class="fa fa-arrow-right"></i> Business opportunities<br>
                                            <i class="fa fa-arrow-right"></i> K-12 market recent investments<br>
                                            <i class="fa fa-arrow-right"></i> Starting a K-12 school
                                        </li>

                                        <li><strong>Chapter 4: HIGHER EDUCATION: ASSESSING THE IMMENSE POTENTIAL FOR NEW
                                                HEIGHTS (50)</strong><br>
                                            <i class="fa fa-arrow-right"></i> Trends in the growth of higher
                                            education<br/>
                                            <i class="fa fa-arrow-right"></i> Business opportunities in higher education<br/>
                                            <i class="fa fa-arrow-right"></i> Sources of investments<br/>
                                            <i class="fa fa-arrow-right"></i> PPP in higher education
                                        </li>

                                        <li><strong>Chapter 5: VOCATIONAL TRAINING GENERATING EMPLOYABLE INDIA
                                                (60)</strong><br>
                                            <i class="fa fa-arrow-right"></i> Indian youth demographics<br/>
                                            <i class="fa fa-arrow-right"></i> Vocational education consumption
                                            story<br/>
                                            <i class="fa fa-arrow-right"></i> Indian vocational education market<br/>
                                            <i class="fa fa-arrow-right"></i> Investment scenario in vocational
                                            sector<br/>
                                            <i class="fa fa-arrow-right"></i> Expansion strategies<br/>
                                            <i class="fa fa-arrow-right"></i> PPP in vocational training<br/>
                                            <i class="fa fa-arrow-right"></i> Starting a vocational institute
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
