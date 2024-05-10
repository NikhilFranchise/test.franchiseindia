@extends('layout.master')
@section('seoTitle', 'The Science of Reproducing Success - Franchise India')
@section('seoDesc', 'The classic bestseller by the man who enjoys the confidence of franchise leaders of the world! Franchising provides an ambitious business aspirant with the benefit of the skills, knowledge and best practices in management, from people who have run a successful business over many years.')
@section('seoKeywords', 'srs, science of reproducing success, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-inner1.jpg" alt="books-inner1"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">The Science of Reproducing Success</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="The Science of Reproducing Success">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.srs.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.srs.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.srs.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.srs.usa')}}
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


                            <p class="book-st-txt">The classic bestseller by the man who enjoys the confidence of
                                franchise leaders of the world!
                                <br/><br/>
                                Franchising provides an ambitious business aspirant with the benefit of the skills,
                                knowledge and best practices in management, from people who have run a successful
                                business over many years.
                                <br/><br/>
                                At the same time franchising offers successful business enterprises with a fast-track
                                route to growth, that bypasses the obstacles of finance and human resources.
                                <br/><br/>
                                Franchising has now emerged in India as a growth industry with great potential. It is
                                franchising that will provide the last mile connect in the world's largest consumption
                                market.
                                <br/><br/>
                                There still is little available literature on the subject. Across Asia, consulting and
                                management knowledge in franchising is the preserve of only those practicing in this
                                field. Franchising: The Science of Reproducing Success has proved to be the best primer
                                on this subject. The fifth edition has been updated with fresh case studies and made
                                more reader-friendly. The text rings with the authenticity of the leading expert in the
                                field of franchising in India. </p>

                        </div>

                        <div id="booktabcontent2">


                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1: The Foundation of Franchising</strong></li>
                                        <li><strong>Chapter 2: What a Franchisee Needs to Know</strong></li>
                                        <li><strong>Chapter 3: What a Franchisor Needs to Know?</strong></li>
                                        <li><strong>Chapter 4: Franchisor-Franchisee Relationship</strong></li>
                                        <li><strong>Acknowledgments (xi)</strong></li>
                                        <li><strong>Preface (xiii)</strong></li>
                                        <li><strong>Chapter 1: The Foundation of Franchising (1)</strong><br>
                                            <i class="fa fa-arrow-right"></i> What is Franchising? (3)<br/>
                                            <i class="fa fa-arrow-right"></i> Why Franchise? (5)<br/>
                                            <i class="fa fa-arrow-right"></i> Categorizing Franchising (8)<br/>
                                            <i class="fa fa-arrow-right"></i> The Franchise Scenario (17)
                                        </li>
                                        <li><strong>Case Study 1: Investing in the Future: (22)</strong><br>
                                            <i class="fa fa-arrow-right"></i> Pre-school Franchise
                                        </li>
                                        <li><strong>Case Study 2: Walk-in Clinics: Franchising (24)</strong><br>
                                            <i class="fa fa-arrow-right"></i> Options in Healthcare in India
                                        </li>

                                        <li><strong>Chapter 2: What a Franchisee Needs to Know (27)</strong><br>
                                            <i class="fa fa-arrow-right"></i> The Deliberation Stage (28)<br>
                                            <i class="fa fa-arrow-right"></i> Are You Ready for a Franchise? (30)<br>
                                            <i class="fa fa-arrow-right"></i> Choosing the Right Franchise (34)
                                        </li>
                                        <li><strong>Step 1: Examine your opportunities (34)</strong></li>
                                        <li><strong>Step 2: Examine franchisor and franchise (36)</strong></li>
                                        <li><strong>Step 3: Evaluate options (43)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> The Planning Stage (48)<br/>
                                            <i class="fa fa-arrow-right"></i> Plan Franchise Finances (49)<br/>
                                            <i class="fa fa-arrow-right"></i> Evaluate Demand for the Franchise Products
                                            (54)<br/>
                                            <i class="fa fa-arrow-right"></i> Find The Ideal Location (56)<br/>
                                            <i class="fa fa-arrow-right"></i> Select a Business Entity (59)<br/>
                                            <i class="fa fa-arrow-right"></i> Financing a Franchise (62)<br/>
                                            <i class="fa fa-arrow-right"></i> The Franchise Business Plan (65)<br/>
                                            <i class="fa fa-arrow-right"></i> The Management Stage (73)<br/>
                                            <i class="fa fa-arrow-right"></i> Find Good Employees (73)<br/>
                                            <i class="fa fa-arrow-right"></i> Design Promotional Strategies (75)<br/>
                                            <i class="fa fa-arrow-right"></i> Manage Franchise-Franchisor Relations (77)<br/>
                                            <i class="fa fa-arrow-right"></i> An Exit Strategy (82)<br/>
                                            <i class="fa fa-arrow-right"></i> Franchising in India Today (84)<br/>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 3: What a Franchisor Needs to Know?(87)</strong>
                                            <br/>
                                            <i class="fa fa-arrow-right"></i> Do You have a Growth Vision? (87)<br/>
                                            <i class="fa fa-arrow-right"></i> Why Franchise? (88)<br/>
                                            <i class="fa fa-arrow-right"></i> The Deliberation Stage (101)<br/>
                                            <i class="fa fa-arrow-right"></i> Qualities of a Successful Franchisor (102)<br/>
                                            <i class="fa fa-arrow-right"></i> Evaluate Your Enterprise (105)<br/>
                                            <i class="fa fa-arrow-right"></i> Evaluate the Market (108)<br/>
                                            <i class="fa fa-arrow-right"></i> Franchisor Feasibility Study (109)<br/>
                                            <i class="fa fa-arrow-right"></i> The Planning Stage (118)<br/>
                                            <i class="fa fa-arrow-right"></i> Business Planning (118)<br/>
                                            <i class="fa fa-arrow-right"></i> Strategic Planning (120)<br/>
                                            <i class="fa fa-arrow-right"></i> Documentation Stage (123)<br/>
                                            <i class="fa fa-arrow-right"></i> The Management Stage (130)<br/>
                                            <i class="fa fa-arrow-right"></i> Nature of Managerial Work (130)<br/>
                                            <i class="fa fa-arrow-right"></i> Developing the Franchise Systems
                                            (135)<br/>
                                            <i class="fa fa-arrow-right"></i> Setting up a Franchise Network in India
                                            (137)<br/>

                                        </li>


                                        <li><strong>Chapter 4: Franchisor-Franchisee Relationship(104)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> A Partner or a Parent? (141)<br/>
                                            <i class="fa fa-arrow-right"></i> The Legalities of the Relationship
                                            (142)<br/>
                                            <i class="fa fa-arrow-right"></i> Important International Laws (143)<br/>
                                            <i class="fa fa-arrow-right"></i> Important Indian Laws (146)<br/>
                                            <i class="fa fa-arrow-right"></i> Franchise Documentation (152)<br/>
                                            <i class="fa fa-arrow-right"></i> Negotiating a Franchise Agreement
                                            (155)<br/>
                                            <i class="fa fa-arrow-right"></i> Future Trends in Franchising (163)<br/>
                                        </li>

                                        <li><strong>Appendix A: Franchise Categories (165)</strong></li>
                                        <li><strong>Appendix B: Outline of Franchise Business Plan (168)</strong></li>
                                        <li><strong>Appendix C: A Sample Income Statement Format (170)</strong></li>
                                        <li><strong>Appendix D: Draft Franchise Agreement (172)</strong></li>


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
