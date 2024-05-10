@extends('layout.master')
@section('seoTitle', 'Francast - Franchise India')
@section('seoDesc', 'Francorp has made a humble effort to forecast the developments expected in the franchising industry in India both at a national and regional level')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/francast.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Francast</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Francast">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.francast.india')}}" class="static_class"
                               checked="checked">India: Special Offer Rs. {{Config::get('constants.BookPrice.francast.india')}}(MRP : Rs. 2000)
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
                            <p class="book-st-txt">This whitepaper is an assessment of the current franchise landscape
                                and explores the current franchise scenario in India. Francorp has made a humble effort
                                to forecast the developments expected in the franchising industry in India both at a
                                national and regional level. This whitepaper also attempts to highlight the challenges
                                faced by the industry and provide tools to equip potential and existing franchise
                                players to brace the same. The purpose of this paper is to provide thought leadership to
                                all stakeholders within the franchise fraternity.<br><br></p>


                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->


                            <p class="book-st-txt-b">
                                Being one of Asia's largest franchise consulting company, Francorp collaborate all their
                                research done throughout the year in a single document to help out readers get a
                                detailed perspective of the Indian market. They assess and analyze the franchising
                                ecosystem in India. It is done to present readers a view of the Indian franchising
                                scenario from local as well as global perspective.
                                <br><br>
                                The first section of the document talks about how organizations in different countries
                                view the Indian market. It also covers the congeniality of investing and operating in
                                India for a global player. In the document, Francorp enumerate the global brands that
                                entered in the Indian market in the last year. There are various modes to enter into the
                                Indian market by global brands, namely - Joint Venture (JV) with Indian company, through
                                licensing, master franchisee, solely on their own.
                                <br><br>
                                In the second and third section, Francorp have presented a holistic view of India by
                                segregating the country into five different regions - North, West, South, East and
                                Central. We have also given an insight on the potential of all major cities in these
                                regions from business point of view. They have detailed about the major markets, malls
                                and shopping complexes in these cities, their footfall, rentals, upcoming local brands
                                and challenges faced by them.
                                <br><br>
                                The fourth section presents the interviews of industry veterans who have achieved
                                exceptionally high growth in their businesses through franchising. The interviews give
                                an insight on stories of Founders/Directors/'C' level Executives in expanding their
                                businesses, challenges faced by them and methodologies adopted to overcome those
                                challenges. They also shared their thoughts on future of franchising ecosystem and
                                described the growth avenues of their respective industries.
                                <br><br>
                                The last section concludes about upcoming brands and new concepts in franchising. It
                                also discusses about integration of e-commerce with franchising business and vice versa
                                it also includes changing dynamics of franchising - franchisor and franchisee psyche.
                                Francorp have also touched upon best industry practices in franchising and how legal
                                documents safeguard the interests of both the parties.<br><br></p>


                            <div class="clr"></div>
                            <!-- new book section end here -->
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!--Book end here -->

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
