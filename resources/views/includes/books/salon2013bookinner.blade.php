@extends('layout.master')
@section('seoTitle', 'Indian Salon Report 2013 - Franchise India')
@section('seoDesc', 'Indian Salon Report 2013 is a pioneering effort on the part of Franchise India Holdings Limited to bring to the forefront the changing consumption patterns, leading to a paradigm shift in the beauty services landscape, and a decade long journey of the Salon franchise business concept in India.')
@section('seoKeywords', 'isr, indian salon report 2013, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-2013-1.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Salon Report 2013</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Salon Report 2013">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.salon2013.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.salon2013.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.salon2013.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.salon2013.usa')}}
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

                            <p class="book-st-txt"><strong>'Indian Salon Report 2013'</strong> is a pioneering effort on
                                the part of Franchise India Holdings Limited to bring to the forefront the changing
                                consumption patterns, leading to a paradigm shift in the beauty services landscape, and
                                a decade long journey of the Salon franchise business concept in India. The Indian Salon
                                industry stands at a staggering USD 2 billion mark and is expected to touch USD 3.5
                                billion by 2015.
                                <br><br>
                                Glancing at the high growth pattern, private equity investors are eyeing the salon
                                business and this has proven to be the key funding source for the salon industry's
                                growth. Today India comprises of 25 per cent organised salon market, which will increase
                                its share to 30 per cent by 2015. The backbone of the organised salon industry is an
                                aggressive expansion of franchisees across the nation. The Indian Salon franchise
                                ecosystem today has a support of over 5000 franchisees. Franchise salons will stand to
                                cover 25 per cent of the overall organised industry by 2015 and will grow to be more
                                than USD 1 billion. The report also presents the legal aspect of salon franchise, in
                                which the implications of various laws are majorly discussed.<br>
                                <br>
                                An online survey was conducted to understand the salon franchisee profile. The survey
                                result revealed that 56 per cent of the franchisee owners who take the lead of the salon
                                franchising in India are in the age bracket of 25-35 years and reaping high returns.
                                Forty-four per cent of the respondents reported that they are getting good returns and
                                30 per cent reported that the returns are excellent. Also, 60 per cent of the
                                franchisees reported that they are interested in taking up an additional beauty salon
                                franchise.
                                In this report, Franchise India also tracked the beauty services consumption pattern
                                through an elaborate survey of the urban working population. The report reveals that 38
                                per cent of women visit the salon twice a month and 61 per cent men visit it once a
                                month. The major services which women opt are hygiene, skin care and haircare, while men
                                prefer haircut and haircare.
                                <br><br>
                                Overall, the report aims to incorporate trends in the industry as well as bring forward
                                a study of the overall consumption, as these are factors governing growth and change
                                around the business format of the salon industry.</p>


                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1 : THE BUSINESS OF SALON (09) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Upsurging Indian Salon Industry<br/>
                                            <i class="fa fa-arrow-right"></i> Starting a Salon Business<br/>
                                            <i class="fa fa-arrow-right"></i> Salon Industry Funding<br/>
                                            <i class="fa fa-arrow-right"></i> The Crucial Role of Retail Location<br/>
                                            <i class="fa fa-arrow-right"></i> Bringing Multiple Services Under One
                                            Roof<br/>
                                            <i class="fa fa-arrow-right"></i> Private Labels -An Extension to Beauty
                                            Business<br/>
                                            <i class="fa fa-arrow-right"></i> Wedding Industry -A profitable Wing
                                        </li>
                                        <li><strong>Chapter 2: CONSUMPTION INFLUENCE (15) </strong><br/>
                                            <i class="fa fa-arrow-right"></i> Frequency Of Services<br/>
                                            <i class="fa fa-arrow-right"></i> Indian Preferences For Beauty
                                            Services<br/>
                                            <i class="fa fa-arrow-right"></i> Salon Consumer - Attitude Mapping<br/>
                                            <i class="fa fa-arrow-right"></i> Bridal Consumer Mapping
                                        </li>
                                        <li><strong>Chapter 3: SECTOR WATCH: FRANCHISE GAINERS OF THE DECADE
                                                (31) </strong><br>
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
                                        <li><strong>Chapter 4: FRANCHISING BEAUTY BUSINESS (43) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Franchise In India<br>
                                            <i class="fa fa-arrow-right"></i> Franchise In Salon Industry<br>
                                            <i class="fa fa-arrow-right"></i> Franchising -An Expansion Plan<br>
                                            <i class="fa fa-arrow-right"></i> Arranging Finances<br>
                                            <i class="fa fa-arrow-right"></i> Franchisor -Franchisee Dynamics<br>
                                            <i class="fa fa-arrow-right"></i> Salon Franchisee Profile: Key Facts<br>
                                            <i class="fa fa-arrow-right"></i> Laws Applicable To Beauty Franchising
                                        </li>

                                        <li><strong>Chapter 6: Funding Growth: Investment Avenues (69)</strong><br></li>
                                        <li><strong>CASE STUDIES of ANNEXURE (52) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Sample Franchise Agreement
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
