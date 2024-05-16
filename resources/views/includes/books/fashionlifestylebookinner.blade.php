@extends('layout.master')
@section('seoTitle', 'India - Fashion &amp; Lifestyle Franchise Report - 2009-10 - Franchise India')
@section('seoDesc', 'Indian Education Investment Report 2014 is a pioneering effort on part of Franchise India Holdings Limited to bring forth the persisting gaps, changing consumption patterns, demographical investments and business opportunities existent in the current Indian Education sector.')
@section('seoKeywords', 'iflr, indian fashion lifestyle franchise report 2014, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-other-2.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">India - Fashion & Lifestyle Franchise Report - 2009-10</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="India - Fashion & Lifestyle Franchise Report - 2009-10">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.fashion.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.fashion.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.fashion.fashion.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.fashion.usa')}}
                    </li>
                </ul>

                    <div class="btns">
                        <input type="submit"  class="btn btn-default" value="Buy Now"/>
                    </div>
                </form>


                <!--Book tab Start-->
                <div class="booktobmain">
                    <input id="booktab1" type="radio" name="tabsp" checked>
                    <label for="booktab1">VIEW SUMMARY</label>
                    <input id="booktab2" type="radio" name="tabsp">
                    <label for="booktab2">VIEW CONTENTS</label>
                    <span class="bookunderline"></span>
                    <div class="booktabcontent">
                        <div id="booktabcontent1">
                            <p class="book-st-txt"><strong>India Fashion Retail Opportunity:</strong> The Indian retail market is expected to be about US $ 535 billion by 2013. With an anticipated US$ 30 billion fresh investments over next 5 years, modern retail will show impressive CAGR of 40%.Fashion concepts contribute 13% of this market and with the consumer dynamic evolving, this segment is poised to grow at a faster rate with a lesser risk as compared to other retail investments
                                <br /><br />
                                <strong>Franchising in India:</strong> Today Indian franchise sector is growing at the rate of 38 per cent per annum with a present market size of US$ 7.2 billion and is expected to reach US$ 20 billion by 2013. There are 1200 active franchise concepts in India and over 110,000 franchisees. Education and retail are two important sectors where franchising is prominent.
                                <br /><br />
                                <strong>Fashion Franchising:</strong> The retail and franchise business models mature to gradually evolve into the best mode to tap the proven potential of Indian fashion retail. There are at present approximately 210 fashion franchise concepts in India, which includes both domestic as well as International. The nation presently has around 125 apparel, 10 lingerie, 35 jewellery, 30 footwear and 10 accessory franchise concepts. This number is bound to grow further as the industry is growing as annual rate of 12%. Most of the fashion franchisors are based in northern and western part of the country largely attributed to the manufacturing clusters present in these regions.
                                <br /><br />
                                <strong>The Report:</strong> The fashion & lifestyle Franchise Report is an outcome of a pioneering initiative taken by Franchise India Holdings Ltd. It accords the fashion franchising sector with the recognition it has long deserved. This report provides strategic approach to the opportunities and challenges being witnessed in fashion franchising.
                                <br /><br />
                                The primary objective of this report is to provide a snapshot of current trends in fashion franchising vis-a-vis expert analysis of various elements having implications on it.
                                <br /><br />
                                The Fashion & Lifestyle Franchising Report 2009 gives a comprehensive learning curve for fashion concept store owners and existing fashion entrepreneurs as well as companies to look out and replicate their brands success, through franchising across the country.
                                <br /><br />
                                <strong>Apparel Franchising:</strong> The 25 billion USD apparel retail industry, is one of the most franchised fashion concept. The report discussed the market size , segmentation , retail trends as well as the growth projections Report concludes that men's wear apparel segment observes the maximum franchise activity The kid's wear franchise activity presently at 25% is expected to increase in near future. Business format franchising is expected to increase in this segment. The report also discusses franchise model considerations as well as its various implications, including the minimum guarantee model which is slowly losing importance as the franchisors seek operational efficiency along with visibility and penetration.
                                <br /><br />
                                <strong>Lingerie Franchising:</strong> Lingerie retail in India is very naive and the concepts seeks maturity in terms of acceptability. Presently only 3% of the lingerie stores are franchised as most of the business comes from the MBO formats. MBOs make economic sense though the experts believe that a exclusive brand outlets have positive feasibility to succeed
                                <br /><br />
                                <strong>Footwear Franchising:</strong> The Indian footwear retail market is expected to grow at a CAGR of over 20 per cent for the period spanning from 2009 to 2011. Presently, the Indian footwear market is dominated by men's footwear market that accounts for nearly 58 per cent of the total Indian footwear retail market, and by products, the Indian footwear market is dominated by casual footwear market that makes up for nearly two-thirds of the total footwear retail market. .International franchisors have been trying to optimize brand positioning as well as the price points to tap Indian footwear market. At the same time the sports footwear Majority of international franchisors based in Europe and Italy. The segment has the highest franchise activity (23%)
                                <br /><br />
                                <strong>Jewellery Franchising:</strong> Diamond remains one of the most franchised concept led by Gitanjali and D'damas. This could be attributed to the fact that diamond retail being a new concept in early 90's, preferred to expand through franchising. Majority of the indigenous family jewelers based in Indore, Kolkota, Ludhiana and Delhi , realized the importance of branding by building significant brand equity and expanded through franchising. Western states seems to be leading this trend !</p>

                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>INDIA: LAND OF OPPORTUNITIES - ( 8-18 ) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Indian Retail Environment<br>
                                            <i class="fa fa-arrow-right"></i> Key factors responsible for growth of retail sector<br>
                                            <i class="fa fa-arrow-right"></i> Regulatory scenario<br>
                                            <i class="fa fa-arrow-right"></i> FDI in Retail<br>
                                            <i class="fa fa-arrow-right"></i> FASHION INDUSTRY AND CHANGING CONSUMER MINDSET<br>
                                            <i class="fa fa-arrow-right"></i> India's fashion overview<br>
                                            <i class="fa fa-arrow-right"></i> Transformation of Indian Fashion Industry<br>
                                            <i class="fa fa-arrow-right"></i> Fashion era is yet to begin<br>
                                            <i class="fa fa-arrow-right"></i> Indian fashion industry spreads its wings globally<br>
                                        </li>
                                        <li><strong>Chapter 2: CONSUMPTION INFLUENCE (15)  </strong><br />
                                            <i class="fa fa-arrow-right"></i> Frequency Of Services<br />
                                            <i class="fa fa-arrow-right"></i> Indian Preferences For Beauty Services<br />
                                            <i class="fa fa-arrow-right"></i> Salon Consumer - Attitude Mapping<br />
                                            <i class="fa fa-arrow-right"></i> Bridal Consumer Mapping
                                        </li>
                                        <li><strong>Chapter 3: SECTOR WATCH: FRANCHISE GAINERS OF THE DECADE (31) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Education<br />
                                            <i class="fa fa-arrow-right"></i> Beauty and Wellness<br />
                                            <i class="fa fa-arrow-right"></i> Food And Beverages<br />
                                            <i class="fa fa-arrow-right"></i> Retail Industry<br />
                                            <i class="fa fa-arrow-right"></i> Consumer Services</li>
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
                                            <i class="fa fa-arrow-right"></i> Laws Applicable To Beauty Franchising</li>

                                        <li><strong>Chapter 6:   Funding Growth: Investment Avenues (69)</strong><br></li>
                                        <li><strong>CASE STUDIES of ANNEXURE (52) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Sample Franchise Agreement</li>
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
