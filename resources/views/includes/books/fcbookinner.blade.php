@extends('layout.master')
@section('seoTitle', 'Finance Cracked - Franchise India')
@section('seoDesc', 'Finance is the science behind running a successful business. The real boss of an entrepreneur is the &#039;logic of finance&#039;. Entrepreneurs need to learn the basic concepts of financial analysis, know the core decisions that have to be taken from a financial perspective, and recognise that finance is the ultimate enabler of a business.')
@section('seoKeywords', 'fc, finance cracked, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-inner3.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Finance Cracked</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Finance Cracked">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.fc.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.fc.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.fc.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.fc.usa')}}
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
                            <p class="book-st-txt">Finance is the science behind running a successful business. The real
                                boss of an entrepreneur is the 'logic of finance'. Entrepreneurs need to learn the basic
                                concepts of financial analysis, know the core decisions that have to be taken from a
                                financial perspective, and recognise that finance is the ultimate enabler of a business.
                                <br/><br/>
                                Finance Cracked! has been designed to deliver a finance mindset to the reader. It has
                                three parts that map the three principal aspects of a finance mindset.
                                <br/><br/>
                                After the introductory part on Finance Fundamentals, the book focuses on Finance as an
                                Analytical Tool. The logic behind the Balance Sheet, Income Statement and Cash Flow
                                Statement is explained and the way in which entrepreneurs can use the information
                                provided in these three statements to diagnose the financial health of an enterprise. To
                                have a sharper view of specific aspects of the enterprise Key Financial Ratios are also
                                explored.
                                <br/><br/>
                                The next part of the book deals with How to Manage the Three Core Finance Functions. The
                                core financial function in planning operations is to determine and fix product cost and
                                pricing. Managing Cost and Planning Profit is an integral part of product development
                                and launch.
                                <br/><br/>
                                The other crucial finance input in operations is to ensure that the smooth flow of
                                day-to-day operations is not hampered by lack of funds. The function of Working Capital
                                Management and Arranging Short Term Finance is explained in a simple but insightful
                                manner.
                                <br/><br/>
                                The chapter on Managing Capital Budgeting Decisions and Arranging Long Term Finance
                                spells out the need to not only understand how much funds we need but to also determine
                                how much we can afford to raise.
                                <br/><br/>
                                The final part of the book is on Finance Enablers and has a chapter on Financial Markets
                                and Instruments. This chapter tells us as to where and how we can source our funding
                                requirements and park surplus funds.
                                <br/><br/>
                                Shorn of complex detail, Finance Cracked! works on the realm of insight and perspective.
                            </p>


                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Contents: </strong><br>
                                            <i class="fa fa-arrow-right"></i> Acknowledgements V<br/>
                                            <i class="fa fa-arrow-right"></i> Preface VII<br/>
                                        </li>
                                        <li><strong>Part 1 <br/>
                                                Finance Fundamentals </strong><br/>
                                            <i class="fa fa-arrow-right"></i> Chapter 1 : <strong>Finance</strong> The
                                            logic of business enterprise <strong>(3)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> Chapter 2 : Three key financial concepts
                                            and some terms <strong>(11)</strong><br/>
                                        </li>
                                        <li><strong>Part 2 <br/>
                                                Finance as an Analytical Tool </strong><br>
                                            <i class="fa fa-arrow-right"></i> Chapter 3 : <strong>The Balance
                                                Sheet</strong> Keeping an Even Keel <strong>(25)</strong> <br/>
                                            <i class="fa fa-arrow-right"></i> Chapter 4 : <strong>The Income
                                                Statement</strong> How Much Do We Earn? <strong>(47)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> Chapter 5 : <strong>The Cash Flow
                                                Statement</strong> The Circulation of Value <strong>(61)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> Chapter 6 : <strong>Key Financial
                                                Ratios</strong> Diagnostic Tools <strong>(73)</strong><br/></li>
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Part 3<br/>
                                                How to Manage The 3 Core Finance Functions </strong><br>
                                            <i class="fa fa-arrow-right"></i> Chapter 7 : <strong>Managing Cost</strong>
                                            Planning Profit <strong>(95)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> Chapter 8 : <strong>Working Capital
                                                Management</strong> Arranging Short Term Finance
                                            <strong>(107)</strong><br/>
                                            <i class="fa fa-arrow-right"></i> Chapter 9 : <strong>Managing Capital
                                                Budgeting Decisions</strong> Arranging Long Term Finance
                                            <strong>(119)</strong><br/>
                                        </li>

                                        <li><strong>Part 4 <br/>
                                                Finance Enablers </strong><br>
                                            <i class="fa fa-arrow-right"></i> Chapter 10 : Financial Markets and
                                            Instruments Acquiring and Parking Funds (<strong>137</strong>)
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
        <!--Book end here -->

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
