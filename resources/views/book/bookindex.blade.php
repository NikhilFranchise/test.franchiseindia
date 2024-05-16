@extends('layout.master')
@section('seoTitle', 'Reports and Books - Franchise India')
@section('seoDesc', 'Buy Books and Reports from Franchise India')
@section('seoKeywords', 'books, reports, books and reports')
@section('content')
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
    <style type="text/css">.bookmartop{padding-top:20px;padding-bottom:5px;border:none!important}ul.book-list,ul.book-list-1,ul.book-list-2,ul.book-list-3,ul.book-list-4{margin-left:-15px;margin-right:-15px}.book-subheadingnew,.book-blk .static-subheading,.book-blk-2 .static-subheading,ul.book-list-4 .static-subheading,.book-blk-3 .static-subheading{font-family:'Open Sans Bold';font-size:22px;color:#333;line-height:25px;text-transform:uppercase;margin-bottom:5px;margin-top:10px;margin-left:0}.book-img-i img{border:1px solid #dfdfdf}.book-blk-2{overflow:hidden}.reportborder{height:1px;width:100%;background:#f3f3f3;clear:both}.bookmartop20px{margin-top:20px}.bookmarminus20px{margin-top:-10px}.bookmartop30px{margin-top:30px}@media only screen and (min-width:1px) and (max-width:767px){ul.book-list li,ul.book-list-1 li,ul.book-list-2 li,ul.book-list-3 li{text-align:center;height:auto;margin-bottom:20px}}</style>
    <div class="container formsection margintop60 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"><h1> Reports & Books</h1>
                <div class="book-subheadingnew bookmartop">Books</div>
                <div class="book-blk">
                    <ul class="book-list">
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=srs"><img src="https://www.franchiseindia.com/images/books-inner1.jpg" alt="The Science of Reproducing Success" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=srs">The Science of Reproducing Success</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=srs">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=tc"><img src="https://www.franchiseindia.com/images/books-inner2.jpg" class="bor_ccc" alt="Take Charge Success"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=tc">Take Charge Success</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=tc">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=fc"><img src="https://www.franchiseindia.com/images/books-inner3.jpg" alt="Finance Cracked! Success" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=fc">Finance Cracked! Success</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=fc">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=tango"><img src="https://www.franchiseindia.com/images/books-inner4.jpg" alt="It takes two to tango Success" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=tango">It takes two to tango Success</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=tango">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=syor"><img src="https://www.franchiseindia.com/images/books-inner5.jpg" alt="Start your Own Restaurant" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=syor">Start your Own Restaurant</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=syor">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=francast"><img src="https://www.franchiseindia.com/images/francast.jpg" alt="Francast" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=francast">Francast</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=francast">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=rbc"><img src="https://www.franchiseindia.com/images/coffeetabebook.jpg" alt="Restaurant coffee tabe book" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=rbc">Restaurant coffee tabe book</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=rbc">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=tfe"><img src="https://www.franchiseindia.com/images/topfood.jpg" alt="Top Food Entrepreneurs" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=tfe">Top Food Entrepreneurs</a></span>
                            <span class="book-read-btn"><a class="btn btn-default adddffi" href="/book/view?id=tfe">Read More</a></span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=iswyb"><img src="https://www.franchiseindia.com/images/indiansalon2018.jpg" alt="Indian Salon & Wellness year book" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=iswyb">Indian Salon & Wellness year book</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=iswyb">Read More</a>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="reportborder bookmartop30px"></div>
                <div class="book-blk-2">
                    <div class="static-subheading">Reports 2014</div>
                    <ul class="book-list-1">
                        <li class="col-xs-12 col-sm-6 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=salon2014"><img src="https://www.franchiseindia.com/images/books-2014.jpg" class="bor_ccc" alt="Indian Salon Report 2014"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=salon2014">Indian Salon Report 2014</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=salon2014">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-6 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=education2013"><img src="https://www.franchiseindia.com/images/books-2013-2.jpg" class="bor_ccc" alt="Indian Education Investment Report 2014"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=education2013">Indian Education Investment Report 2014</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=education2013">Read More</a>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="reportborder bookmartop30px"></div>
                <div class="book-blk-2">
                    <div class="static-subheading">Reports 2013</div>
                    <ul class="book-list-2">
                        <li class="col-xs-12 col-sm-6 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=salon2013"><img src="https://www.franchiseindia.com/images/books-2013-1.jpg" class="bor_ccc" alt="Indian Salon Report 2013"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=salon2013">Indian Salon Report 2013</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=salon2013">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-6 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=eretail2013"><img src="https://www.franchiseindia.com/images/india-retail2013.jpg" class="bor_ccc" alt="Indian eRetail Report 2013"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=eretail2013">Indian eRetail Report 2013</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=eretail2013">Read More</a>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="reportborder bookmartop30px"></div>
                <div class="book-blk">
                    <div class="static-subheading">Reports 2012</div>
                    <ul class="book-list">
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=franchise2012"><img src="https://www.franchiseindia.com/images/books-2012-1.jpg" alt="Indian Franchise Report 2012" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=franchise2012">Indian Franchise Report 2012</a></span>
                            <span class="book-read-btn"><a class="btn btn-default adddffi" href="/book/view?id=franchise2012">Read More</a></span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=salon2012"><img src="https://www.franchiseindia.com/images/books-2012-2.jpg" alt="Indian Salon Report 2012" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=salon2012">Indian Salon Report 2012</a></span>
                            <span class="book-read-btn"><a class="btn btn-default adddffi" href="/book/view?id=salon2012">Read More</a></span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=restaurant2012"><img src="https://www.franchiseindia.com/images/books-2012-3.jpg" alt="Indian Restaurant Report 2012" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=restaurant2012">Indian Restaurant Report 2012</a></span>
                            <span class="book-read-btn"><a class="btn btn-default adddffi" href="/book/view?id=restaurant2012">Read More</a></span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=education2012"><img src="https://www.franchiseindia.com/images/books-2013-3.jpg" alt="Education Franchising Report 2012" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=education2012">Education Franchising Report 2012</a></span>
                            <span class="book-read-btn"><a class="btn btn-default adddffi" href="/book/view?id=education2012">Read More</a></span>
                        </li>
                    </ul>
                </div>
                <div class="reportborder"></div>
                <div class="book-blk">
                    <div class="static-subheading">Reports 2011</div>
                    <ul class="book-list">
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=realestate2011"><img src="https://www.franchiseindia.com/images/books-2011-1.jpg" alt="North India Real Estate Report 2011" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=realestate2011">North India Real Estate Report 2011</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=realestate2011">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=education2011"><img src="https://www.franchiseindia.com/images/books-2011-2.jpg" alt="Education Franchising Report 2011" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=education2011">Education Franchising Report 2011</a></span>
                            <span class="book-read-btn"><a class="btn btn-default adddffi" href="/book/view?id=education2011">Read More</a></span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=food2011"><img src="https://www.franchiseindia.com/images/books-2011-3.jpg" alt="The Food Franchising Report 2011" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=food2011">The Food Franchising Report 2011</a></span>
                            <span class="book-read-btn"><a class="btn btn-default adddffi" href="/book/view?id=food2011">Read More</a></span>
                        </li>
                    </ul>
                </div>
                <div class="reportborder"></div>
                <div class="book-blk">
                    <div class="static-subheading">Others</div>
                    <ul class="book-list">
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=smallbusiness"><img src="https://www.franchiseindia.com/images/books-other-1.jpg" alt="India Small Business Report- a year Book on Franchise, Retail &amp; Small Business" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=smallbusiness">India Small Business Report- a year Book on Franchise, Retail &amp; Small Business</a></span>
                            <span class="book-read-btn">
                                <a class="btn btn-default adddffi" href="/book/view?id=smallbusiness">Read More</a>
                            </span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=fashionlifestyle"><img src="https://www.franchiseindia.com/images/books-other-2.jpg" alt="India - Fashion &amp; lifestyle Franchise Report - 2009-10" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=fashionlifestyle">India - Fashion &amp; lifestyle Franchise Report - 2009-10</a></span>
                            <span class="book-read-btn"> <a class="btn btn-default adddffi" href="/book/view?id=fashionlifestyle">Read More</a></span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=education2009"><img src="https://www.franchiseindia.com/images/books-other-3.jpg" alt="Education Franchising Report 2009" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=education2009">Education Franchising Report 2009</a></span>
                            <span class="book-read-btn"><a class="btn btn-default adddffi" href="/book/view?id=education2009">Read More</a></span>
                        </li>
                        <li class="col-xs-12 col-sm-3 col-md-3">
                            <span class="book-img-i"><a href="/book/view?id=food2009"><img src="https://www.franchiseindia.com/images/books-other-4.jpg" alt="The Food Franchising Report 2009" class="bor_ccc"></a></span>
                            <span class="book-head-i"><a href="/book/view?id=food2009">The Food Franchising Report 2009</a></span>
                            <span class="book-read-btn"><a class="btn btn-default adddffi" href="/book/view?id=food2009">Read More</a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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