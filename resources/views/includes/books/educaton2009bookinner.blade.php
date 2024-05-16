@extends('layout.master')
@section('seoTitle', 'Indian Franchise Report 2009 - Franchise India')
@section('seoDesc', 'INDIA has world&#039;s largest young population. Ironically, despite decades of efforts to offer education to all and billions of rupees being spent, the harsh reality is that India is still falling short in meeting the educational requirements of millions of its young people.')
@section('seoKeywords', 'ifr, indian franchise report 2011, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-other-3.jpg" alt="books-other-3"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Franchise Report 2009</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Franchise Report 2009">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.edu2009.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.edu2009.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.edu2009.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.edu2009.usa')}}
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


                            <p class="book-st-txt">Education sector offers potential business opportunity that emanates
                                from the fact that India has World's largest youth population who wants to boast of
                                receiving quality education with World Class training Systems and also the reality that
                                gap between the number of potentially employable people and corresponding training
                                institutes available to train them is wide.
                                <br/><br/>
                                Part one of Education Franchising Report 2009 gives an overview of the growth of the
                                Indian economy and the consumption. The overview states that Education is the second
                                largest household expenditure after food. Presently in India, not only middle or upper
                                middle class, even poor families spend 20 per cent of their disposable income on private
                                schools and universities; then expose their children to 1.2 million, mostly ill-equipped
                                and under-staffed government school across the country.
                                <br/><br/>
                                Private institutions are typically perceived as hallmarks of quality education and given
                                the demand, Indian education entrepreneur are ready with massive expansion plans, which
                                will provide thrust for the education sector to grow multifold.
                                <br/><br/>
                                Part two of the report discuss about the franchise business in India at large. It claims
                                that franchising sector in India is growing at swift pace of 35 -38 per cent per annum.
                                The market size of franchising sector estimated to be US$ 7.2 billion and is expected to
                                reach US$ 20 billion by 2013. There are around 1200 franchisors in the country, having
                                over 100000 franchisees across country. Out of this number, approximately, 32 per cent
                                are in the Education sector. According to a Franchise India Holding Ltd Education sector
                                is the most franchised sector in India. It is interesting to note that franchise outlets
                                are far higher in number than a company-owned outlet.
                                <br/><br/>
                                Part three of the report gives insights on the education service sector in India both in
                                Formal & Non-Formal education. It states that India is one of the largest markets for
                                education in the world in terms of number of students. Currently, there are over 1.4
                                million schools in India providing education to over 200 million students. With
                                considerable preference for private schools, the average number of students in a private
                                school stands at a much higher 1,200 versus 146 for a public school. Coaching classes
                                market forms 64% of non-formal Education Industry and the tuitions market in-turn forms
                                80 per cent of the total coaching class opportunity. Capacity constraints in higher
                                education are the prime cause of outflow of students from the country. Over US$ 13
                                billion is spent every year by about 450,000 Indian students enrolled in higher
                                education abroad.
                                <br/><br/>
                                Part four states that the franchise growth in the education industry. There are over 390
                                active education franchisors in India which belong to the class of emerging and
                                established. Informal and Supplementary education has the lion's share of education
                                franchising. Professional and Vocational Skills (Including Aviation, Hospitality, Hotel
                                Management, Finishing school, Jewellery & Gem education, Teachers' Training, Retail
                                training, Financial services and insurance in addition to other industry training
                                centers) is the most franchised of the education category capturing almost 33% of the
                                total share followed by IT training. There are approximately 50,000 franchised education
                                outlets in the country while there are only about 2200 company-outlets operational by
                                education franchisors in all. Business Format Franchising in education industry is most
                                rampant in India. Franchising in Pre-school segment has particularly been a growing
                                phenomenon in the last 6-7 years. Foreign investment through franchise route will be
                                more forthcoming in sectors like child skill enhancement, e-learning, teacher training
                                and finishing schools as also for IT and BPO training.
                                <br/><br/>
                                The Report also gives a thorough account on what all preparedness it takes to start
                                franchising in the education sector and also gives valuable techniques to Business
                                Investors looking to take an education franchise. With more domestic players emerging,
                                the education sector is likely to witness consolidation, but at the same time,
                                increasing foreign participation will drive competition and raise standards.
                                <br/><br/>
                                Part five of the Report gives detailed Case Studies of the India's largest Education
                                Companies whose growth and expansion using the franchise route has been exemplary as
                                they talk about their franchise models as their foundations of success. </p>


                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter I - INDIA OVERVIEW ( 8-15 ) </strong><br>
                                            <i class="fa fa-arrow-right"></i> Constitutional Structure<br>
                                            <i class="fa fa-arrow-right"></i> India: An Overview<br>
                                            <i class="fa fa-arrow-right"></i> Consumption<br>
                                            <i class="fa fa-arrow-right"></i> Public Education<br>
                                            <i class="fa fa-arrow-right"></i> Indian IT Education Industry<br>
                                            <i class="fa fa-arrow-right"></i> Education Cess<br>
                                            <i class="fa fa-arrow-right"></i> Public-Private Partnership-The way
                                            ahead<br>
                                            <i class="fa fa-arrow-right"></i> Education Budget 2009-10<br>
                                            <i class="fa fa-arrow-right"></i> Indian Education Sector<br>
                                        </li>
                                        <li><strong>Chapter II - FRANCHISING IN INDIA ( 16-25 )</strong><br/>
                                            <i class="fa fa-arrow-right"></i> The Growth of Indian Franchising<br>
                                            <i class="fa fa-arrow-right"></i> Retail dominates franchising<br>
                                            <i class="fa fa-arrow-right"></i> International Franchising starts appearing<br>
                                            <i class="fa fa-arrow-right"></i> The Franchising Excitement 2004
                                            onwards....<br>
                                            <i class="fa fa-arrow-right"></i> No. of Franchise Systems and outlets<br>
                                            <i class="fa fa-arrow-right"></i> Sector-wise Growth in Franchising<br>
                                            <i class="fa fa-arrow-right"></i> Geographical Distribution<br>
                                            <i class="fa fa-arrow-right"></i> Franchise Law in India<br>
                                            <i class="fa fa-arrow-right"></i> Key Franchise Bodies in India<br>
                                            <i class="fa fa-arrow-right"></i> Challenges in Indian Franchise Sector<br>
                                            <i class="fa fa-arrow-right"></i> Franchise Tipped for Growth in India<br>
                                            <i class="fa fa-arrow-right"></i> Supplementing the Government Revenue<br>
                                            <i class="fa fa-arrow-right"></i> The Franchisor will Mature<br>
                                            <i class="fa fa-arrow-right"></i> The Age of the Franchisee has arrived<br>
                                            <i class="fa fa-arrow-right"></i> Consumer would (again be the King<br>
                                            <i class="fa fa-arrow-right"></i> Franchise Professional - The New
                                            Career<br>
                                            <i class="fa fa-arrow-right"></i> Suppliers find a new market in Franchise
                                            Sector<br>
                                        </li>
                                        <li><strong>Chapter III - INDIAN EDUCATION MARKET ( 26-43 )</strong><br>
                                            <i class="fa fa-arrow-right"></i> India Education System<br><br/>
                                            <i class="fa fa-arrow-right"></i> Structure of Education System<br/>
                                            <i class="fa fa-arrow-right"></i> Primary Education in India<br/>
                                            <i class="fa fa-arrow-right"></i> Secondary School Education in India<br/>
                                            <i class="fa fa-arrow-right"></i> Senior Secondary Schools<br/>
                                            <i class="fa fa-arrow-right"></i> Largest 10+2 population globally<br/>
                                            <i class="fa fa-arrow-right"></i> Growing Private Dominance in The Business
                                            of core Education<br/>
                                            <i class="fa fa-arrow-right"></i> Multimedia-Animation Education<br/>
                                            <i class="fa fa-arrow-right"></i> Higher Education<br/>
                                            <i class="fa fa-arrow-right"></i> Investment and Growth in Higher
                                            Education<br/>
                                            <i class="fa fa-arrow-right"></i> How to Open a School<br/>
                                            <i class="fa fa-arrow-right"></i> Informal and Non-Formal Education in India<br/>
                                            <i class="fa fa-arrow-right"></i> Pre-School market<br/>
                                            <i class="fa fa-arrow-right"></i> Pre-School & Creches Market: Multifold
                                            Growth<br/>
                                            <i class="fa fa-arrow-right"></i> Coaching and Tutoring Classes<br/>
                                            <i class="fa fa-arrow-right"></i> Grad Test Prep Market<br/>
                                            <i class="fa fa-arrow-right"></i> Post Grad Test Prep Market<br/>
                                            <i class="fa fa-arrow-right"></i> Online Tutoring Market<br/>
                                            <i class="fa fa-arrow-right"></i> A case Study: Kota<br/>
                                            <i class="fa fa-arrow-right"></i> IT Training<br/>
                                            <i class="fa fa-arrow-right"></i> Vocational and Professional Skills
                                            Training<br/>
                                            <i class="fa fa-arrow-right"></i> Distance Education-An Alternate Mode<br/>
                                            <i class="fa fa-arrow-right"></i> Foreign Investment in Education
                                            Sector<br/>
                                            <i class="fa fa-arrow-right"></i> Indian Students in Foreign
                                            Universities<br/>
                                            <i class="fa fa-arrow-right"></i> Books Market<br/>
                                            <i class="fa fa-arrow-right"></i> School Stationery Market<br/>
                                            <i class="fa fa-arrow-right"></i> Education Loan<br/>
                                            <i class="fa fa-arrow-right"></i> Government of India on Education<br/>
                                            <i class="fa fa-arrow-right"></i> The Need of the Future<br/>
                                            <i class="fa fa-arrow-right"></i> Key Findings in Education: India and the
                                            World<br/>
                                        </li>
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter IV - The Business of Franchising in Indian Education ( 44-53
                                                )</strong><br>
                                            <i class="fa fa-arrow-right"></i> Size of Education Franchise Industry in
                                            India<br/>
                                            <i class="fa fa-arrow-right"></i> Education Franchising is Growing in
                                            India<br/>
                                            <i class="fa fa-arrow-right"></i> Geographical Break-up for Education
                                            Franchise Systems<br/>
                                            <i class="fa fa-arrow-right"></i> Education Franchising<br/>
                                            <i class="fa fa-arrow-right"></i> Franchising of an Education Business<br/>
                                            <i class="fa fa-arrow-right"></i> Why Franchising<br/>
                                            <i class="fa fa-arrow-right"></i> Getting Ready to Franchise<br/>
                                            <i class="fa fa-arrow-right"></i> The Franchise Model<br/>
                                            <i class="fa fa-arrow-right"></i> Business of Education<br/>
                                            <i class="fa fa-arrow-right"></i> The Franchise Advantage to the
                                            Franchise<br/>
                                            <i class="fa fa-arrow-right"></i> Buying an International master
                                            Franchise<br/>
                                            <i class="fa fa-arrow-right"></i> Branding in Education Sector<br/>
                                            <i class="fa fa-arrow-right"></i> FDI in Education Sector<br/></li>

                                        <li><strong>Chapter V - CASE STUDIES ( 54-61 )</strong><br>
                                            <i class="fa fa-arrow-right"></i> Aptech<br/>
                                            <i class="fa fa-arrow-right"></i> NIIT<br/>
                                            <i class="fa fa-arrow-right"></i> Jetking<br/>
                                            <i class="fa fa-arrow-right"></i> Career Launcher<br/>
                                            <i class="fa fa-arrow-right"></i> Eurokids<br/></li>
                                        <li><strong>Annexure ( 62-69 )</strong></li>
                                        <li><strong>Directory ( 70-105 )</strong></li>
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
