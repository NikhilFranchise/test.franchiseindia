@extends('layout.master')
@section('seoTitle', 'Indian Education Investment Report 2012 - Franchise India')
@section('seoDesc', 'Indian Education Investment Report 2012 is a pioneering effort on part of Franchise India Holdings Limited to bring forth the persisting gaps, changing consumption patterns, demographical investments and business opportunities existent in the current Indian Education sector.')
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
    </div>

    <div class="container formsection margintop60 staicp">
        <div class="row">

            <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/Books_28.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Franchise Report 2012</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Franchise Report 2012">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.edu2012.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.edu2012.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.edu2012.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.edu2012.usa')}}
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


                            <p class="book-st-txt">The Indian Education Report 2012' is a pioneering effort on part of
                                Franchise India Holdings Limited to bring to the forefront the paradigm shift in the
                                education ecosystem. The business of education is evolving, supported by a strong
                                consumption force, edging the education service providers to take their businesses to
                                the next level of enterprise development. The education report has worked around to
                                bring forward a comprehensive study analysing the consumption and education business in
                                light of growing global competition.<br/><br/>

                                The $80 billion Indian education industry, growing continuously at 13 per cent, is
                                largely fragmented into segments based on learning and further divided into organised
                                and unorganised segments. One of the fastest growing segments is the pre-school space,
                                with growing consumer awareness about early learning initiatives for a child's
                                development and also lowering of the age of an average pre-schooler from 3 years to 2
                                years. This segment is valued at $1 billion, over running the entire industry's growth
                                rate by amplifying at 38 per cent.<br/><br/>

                                Further, the K-12 industry is witnessing a changeover from being exam oriented to again
                                focusing on developmental learning, with digital learning, sports and creative learning
                                tools being a regular aspect of the curriculum. The not-for-profit agenda no longer
                                stands as a mandate for education enterprises. With corporate foraying into education
                                joint ventures, franchising, public-private partnerships and private equity are making
                                inclusions into the education business space.<br/><br/>

                                Given the fast age created by television programmes and CDIT gadgets, a child's exposure
                                to the digital world is much more than what it was a decade ago. Taking a note of this,
                                even the education industry needs to evolve and incorporate ICT to keep up with the
                                learner's pace. Thus, ICT in education has come up as a new faced segment in the
                                education industry as an independent segment.<br/><br/>

                                Also, vocational education as 'further education' is growing amongst the Indian
                                workforce for more practical, hands-on training. Though the vocational education
                                initiatives in India are not as developed as their international counterparts, it is a
                                $3.8 billion market growing at 25 per cent.<br/><br/>

                                The next segment growing leaps and bounds and foraying from unorganised to the organised
                                segment is the coaching industry. With many players setting quality benchmarks for
                                formal institutes and expanding to set foot in the formal education system, the $8
                                billion industry is growing at 19 per cent.<br/><br/>

                                India has only 12 per cent gross enrollment percentage for higher education; around
                                450,000 Indian students spend over $13 billion each year in acquiring higher education
                                overseas. Only 20 per cent of the technical graduates in India are employable. There is
                                a strong need for the higher education curriculum to promote entrepreneurship and
                                formalise 'Further Education' initiatives.<br/><br/>

                                Overall, the report aims to incorporate trends in the industry, as well as bring forward
                                a study of the overall consumption, as these are the factors that govern the growth and
                                evolution of education building up as an enterprise. </p>


                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1 : KNOWLEDGE ECONOMY (09) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Structure And Scope Of Indian Education
                                            Sector<br/>
                                            <i class="fa fa-arrow-right"></i> Education Wallet Share<br/>
                                            <i class="fa fa-arrow-right"></i> Government Policies And Initiatives<br/>
                                            <i class="fa fa-arrow-right"></i> Education Budget 2012-13<br/>
                                            <i class="fa fa-arrow-right"></i> The Way Ahead
                                        </li>
                                        <li><strong>Chapter 2: EARLY LEARNING STRUCTURES (25) </strong></li>
                                        <li><strong>Chapter 3: EVOLVING THE K-12 CLASSROOM (35) </strong></li>
                                        <li><strong>Chapter 4: TIME TO DEGREE SHOP (43) </strong></li>
                                        <li><strong>Chapter 5: FURTHER EDUCATION AVENUES (51) </strong></li>

                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 6: MAKING COACHING SCALABLE (59) </strong></li>

                                        <li><strong>Chapter 7: FUNDING GROWTH (63)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> Equity Investment In Education
                                            Companies<br/>
                                            <i class="fa fa-arrow-right"></i> CSR Initiatives<br/>
                                            <i class="fa fa-arrow-right"></i> Non-Governmental Organisations<br/>
                                            <i class="fa fa-arrow-right"></i> International Funding For Indian Education
                                            NGOs<br/>
                                            <i class="fa fa-arrow-right"></i> Banks
                                        </li>

                                        <li><strong>Chapter 8: EDUCATION FRANCHISING (73) </strong></li>
                                        <li><strong>Chapter 9: BUILDING EDUCATION ENTERPRISE </strong><br/>
                                            <i class="fa fa-arrow-right"></i> Equity Investment In Education
                                            Companies<br/>
                                            <i class="fa fa-arrow-right"></i> Future Of Education: Web 2.0<br/>
                                            <i class="fa fa-arrow-right"></i> Public-Private Partnership Bridging The
                                            Opportunity Gap<br/>
                                            <i class="fa fa-arrow-right"></i> Global Avenues For Business Of
                                            Education<br/>
                                        </li>

                                        <li><strong>CASE STUDIES (95) </strong></li>
                                        <li><strong>DIRECTORY (110) </strong></li>
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

    </div>
    <!--Book end here -->

    </div>

    <!--form end here -->
    <div class="height40"></div>
@endsection
