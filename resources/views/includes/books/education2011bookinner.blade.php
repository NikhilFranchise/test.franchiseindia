@extends('layout.master')
@section('seoTitle', 'Indian Franchise Report 2011 - Franchise India')
@section('seoDesc', 'INDIA has world&#039;s largest young population. Ironically, despite decades of efforts to offer education to all and billions of rupees being spent, the harsh reality is that India is still falling short in meeting the educational requirements of millions of its young people.')
@section('seoKeywords', 'ifr, indian franchise report 2009, books and reports')@section('content')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-2011-2.jpg" alt="books-2011-2"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Franchise Report 2011</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Franchise Report 2011">

                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.edu2011.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.edu2011.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.edu2011.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.edu2011.usa')}}
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


                            <p class="book-st-txt">INDIA has world's largest young population. Ironically, despite
                                decades of efforts to offer education to all and billions of rupees being spent, the
                                harsh reality is that India is still falling short in meeting the educational
                                requirements of millions of its young people. In primary education, our national
                                strategy for education and youth development has been too narrowly focused on an
                                academic, classroom-based approach. At higher education level, our system places too
                                much emphasis on a single pathway to success: attending and graduating from a three to
                                four years of college. Yet only 30 per cent of young adults enroll for it. Meanwhile,
                                the scope of vocationalization itself needs to be imbibed from the secondary education
                                stage in India. This would call for a serious restructuring of the 'Education Policy'
                                and education delivery.
                                <br/><br/>
                                The education sector offers a potent business opportunity to investors, which could
                                become as big and lucrative as the telecom and retailing. This opportunity emanates from
                                the fact that India youth still aspire to receive quality education and that the gap
                                between the number of potentially employable people and corresponding training
                                institutes available to train them is still wide. Therefore, educating Indian students
                                en masse creates an immediate business opportunities in the education sector in both
                                formal and informal education categories.
                                <br/><br/>
                                Partnerships enabled by franchising have played a pivotal role in expanding and
                                strengthening the professional and supplemental education infrastructure in the country.
                                However, some of the restrictive government legislations have been an impediment,
                                resulting in the slow growth of franchising in K-12 and higher education sectors. When
                                statistics read that 40 per cent of India's school-going population is trying to
                                register in private schools, which are only 7 per cent of the total, and 11 per cent of
                                the youth are able to enroll for higher education, a mismatch in demand-supply ratio for
                                quality education becomes glaringly obvious. This very fact highlights how private
                                participation can play a larger role and how franchising can facilitate the provision of
                                quality education.
                                <br/><br/>
                                The first edition of 'Education Franchising Report 2009' served as a pertinent reference
                                tool regarding education as an enterprise. In the second edition, we have added and
                                upgraded the scope of opportunities that have lately come to exist in the Indian
                                education sector, analysed the government's role in augmenting education growth in the
                                Union Budget 2011-12, along with an updated directory.
                                <br/><br/>
                                'The Education Franchise Report 2011' gives the education sector, particularly enabled
                                by franchising, the importance it has long deserved. The report is an endeavour to guide
                                readers on the relevant issues and the relevant business opportunity the education
                                sector presents to India's education and training systems. It covers everything from
                                latest developments in education franchising to many broader and relevant issues which
                                are required to be fashioned in a business when franchise route is used for growth. Case
                                studies of original architects of education franchising in India provides an insight
                                into how these organisations grew manifolds.
                                <br/><br/>
                                We have been amassing precious knowledge about franchising in the education sector,
                                which we have put together in this report and feel that it would serve as a reference
                                guide for all education companies looking at the potential of franchising. I urge all
                                the members involved in the education industry to give their support to the 'Education
                                Franchising Report 2011.' </p>

                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter I - Education sector-An overview (8-19)</strong><br>
                                            <i class="fa fa-arrow-right"></i> Constitutional structure 9<br>
                                            <i class="fa fa-arrow-right"></i> Economic planning for education sector
                                            10<br>
                                            <i class="fa fa-arrow-right"></i> National knowledge network 11<br>
                                            <i class="fa fa-arrow-right"></i> Skill development 11<br>
                                            <i class="fa fa-arrow-right"></i> Indian education sector by 2020 13<br>
                                            <i class="fa fa-arrow-right"></i> Core education 13<br>
                                            <i class="fa fa-arrow-right"></i> Supplemental and non-core education 14<br>
                                            <i class="fa fa-arrow-right"></i> Public education 14<br>
                                            <i class="fa fa-arrow-right"></i> Indian IT education industry 15<br>
                                            <i class="fa fa-arrow-right"></i> Education cess 16<br>
                                            <i class="fa fa-arrow-right"></i> Indian education-market overview 17<br>
                                            <i class="fa fa-arrow-right"></i> Public private partnership 18<br>
                                            <i class="fa fa-arrow-right"></i> The way ahead 18<br>
                                        </li>
                                        <li><strong>Chapter II - Franchising in India ( 20-53 )</strong><br/>
                                            <i class="fa fa-arrow-right"></i> Growth of Indian franchising 23<br>
                                            <i class="fa fa-arrow-right"></i> Sector-wise growth in franchising 25<br>
                                            <i class="fa fa-arrow-right"></i> Geographical distribution 26<br>
                                            <i class="fa fa-arrow-right"></i> Age of franchise systems 26<br>
                                            <i class="fa fa-arrow-right"></i> Franchise laws in India 26<br>
                                            <i class="fa fa-arrow-right"></i> Key bodies for franchising 28<br>
                                            <i class="fa fa-arrow-right"></i> Franchise employment in India 29<br>
                                            <i class="fa fa-arrow-right"></i> Contribution to economy 33<br>
                                            <i class="fa fa-arrow-right"></i> Potential ahead 34<br>
                                            <i class="fa fa-arrow-right"></i> Inside the mind 37<br>
                                            <i class="fa fa-arrow-right"></i> Inside the mind of an Indian franchisor 37<br>
                                            <i class="fa fa-arrow-right"></i> Myths and realities about franchising
                                            39<br>
                                            <i class="fa fa-arrow-right"></i> Franchise Insights 41<br>
                                            <i class="fa fa-arrow-right"></i> Inside the mind of a Indian franchisee
                                            41<br>
                                            <i class="fa fa-arrow-right"></i> Franchisee life-cycle 42<br>
                                            <i class="fa fa-arrow-right"></i> Challenges faced by franchisees 44<br>
                                            <i class="fa fa-arrow-right"></i> Current trends 45<br>
                                            <i class="fa fa-arrow-right"></i> Franchisee behaviour 46<br>
                                            <i class="fa fa-arrow-right"></i> Background of franchisees: sector-wise
                                            47<br>
                                            <i class="fa fa-arrow-right"></i> Risks associated with franchisees 48<br>
                                            <i class="fa fa-arrow-right"></i> Inside the mind of a franchise investor 48<br>
                                        </li>
                                        <li><strong>Chapter III - Business of education ( 54-83 )</strong><br>
                                            <i class="fa fa-arrow-right"></i> Formal education system in India 55<br>
                                            <i class="fa fa-arrow-right"></i> Market size 56<br>
                                            <i class="fa fa-arrow-right"></i> Primary Educaton in India 57<br>
                                            <i class="fa fa-arrow-right"></i> Secondary school education 58<br>
                                            <i class="fa fa-arrow-right"></i> Senior secondary education 58<br>
                                            <i class="fa fa-arrow-right"></i> Regulations and authorities for opening a
                                            school 59<br>
                                            <i class="fa fa-arrow-right"></i> Key characters of secondary education
                                            60<br>
                                            <i class="fa fa-arrow-right"></i> Higher education 61<br>
                                            <i class="fa fa-arrow-right"></i> Growth of higher education 63<br>
                                            <i class="fa fa-arrow-right"></i> Informal and non-formal education 66<br>
                                            <i class="fa fa-arrow-right"></i> Market potential pre-schools 66<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: Coaching classes 67<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: Tuitions 68<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: Grad test preparations
                                            68<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: Post grad test prep
                                            68<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: Online tutoring 69<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: IT training 70<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: Vocational and
                                            professional skill training 71<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: Multimedia/animation
                                            education 72<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: Distance education
                                            72<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: E-learning 72<br>
                                            <i class="fa fa-arrow-right"></i> Foreign investment in education 73<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: Books 74<br>
                                            <i class="fa fa-arrow-right"></i> Market potential: schools stationary
                                            74<br>
                                            <i class="fa fa-arrow-right"></i> Venture upbeat on education sector 75<br>
                                            <i class="fa fa-arrow-right"></i> Way ahead 76<br>
                                            <i class="fa fa-arrow-right"></i> Corporate entering into education sector
                                            80<br>
                                            <i class="fa fa-arrow-right"></i> Reforms to lead next level of growth
                                            83<br>
                                            <i class="fa fa-arrow-right"></i> PE investment in education 83
                                        </li>
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter IV - How to franchise your education business ( 84-93
                                                )</strong><br>
                                            <i class="fa fa-arrow-right"></i> Size of education franchise industry
                                            85<br/>
                                            <i class="fa fa-arrow-right"></i> Geographical break-up of education
                                            franchise systems 85<br/>
                                            <i class="fa fa-arrow-right"></i> Profit from franchising education concepts
                                            86<br/>
                                            <i class="fa fa-arrow-right"></i> Franchising education business 86<br/>
                                            <i class="fa fa-arrow-right"></i> Getting ready 86<br/>
                                            <i class="fa fa-arrow-right"></i> Choosing the right model 88<br/>
                                            <i class="fa fa-arrow-right"></i> Full franchising model 88<br/>
                                            <i class="fa fa-arrow-right"></i> Advisory on site selection 89<br/>
                                            <i class="fa fa-arrow-right"></i> Advisory on renovation and set-up 89<br/>
                                            <i class="fa fa-arrow-right"></i> Advisory on employment and training
                                            89<br/>
                                            <i class="fa fa-arrow-right"></i> Transfer of operation expertise 89<br/>
                                            <i class="fa fa-arrow-right"></i> Transfer of programs 90<br/>
                                            <i class="fa fa-arrow-right"></i> Training 90<br/>
                                            <i class="fa fa-arrow-right"></i> Advisory on sourcing of materials 90<br/>
                                            <i class="fa fa-arrow-right"></i> Advertisement and promotions 91<br/>
                                            <i class="fa fa-arrow-right"></i> Audits 91<br/>
                                            <i class="fa fa-arrow-right"></i> Termination of franchisee 91<br/>
                                            <i class="fa fa-arrow-right"></i> Program licensing model 92<br/>
                                            <i class="fa fa-arrow-right"></i> Franchise advantage to franchisee 92
                                        </li>

                                        <li><strong>Chapter V - CASE STUDIES </strong><br>
                                            <i class="fa fa-arrow-right"></i> How to share risk with the franchisee<br/>
                                            <i class="fa fa-arrow-right"></i> How to make your franchise global<br/>
                                            <i class="fa fa-arrow-right"></i> How to ensure quality through
                                            training<br/>
                                            <i class="fa fa-arrow-right"></i> How to expand your idea<br/>
                                            <i class="fa fa-arrow-right"></i> How to create a network of
                                            eduprenuers<br/>
                                            <i class="fa fa-arrow-right"></i> How to innovate as you grow<br/>
                                            <i class="fa fa-arrow-right"></i> How to unplug market potential<br/>
                                            <i class="fa fa-arrow-right"></i> How to sustain growth in a long run<br/>
                                            <i class="fa fa-arrow-right"></i> How to diversify as you grow<br/>
                                            <i class="fa fa-arrow-right"></i> Directory<br/></li>
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
