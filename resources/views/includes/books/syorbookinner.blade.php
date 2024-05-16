@extends('layout.master')
@section('seoTitle', 'Start Your Own Restaurant - Franchise India')
@section('seoDesc', 'In the tradition of self-help this book helps you understand how to start your own restaurant business. It answers all the important questions you need to ask before starting: What type of restaurant do you want to start? How to prepare a business plan? How to get finance? How important is location? What are the licenses and permits needed? How to create an attractive menu? How to create &#039;wow&#039;? How to build a brand that the customers look for? How to promote and market? How to expand the business?')
@section('seoKeywords', 'syor, start your own restaurant, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-inner5.jpg" alt="books-inner5"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Start Your Own Restaurant</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Start Your Own Restaurant">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.syor.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.syor.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.syor.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.syor.usa')}}
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


                            <p class="book-st-txt">In the tradition of self-help this book helps you understand how to
                                start your own restaurant business. It answers all the important questions you need to
                                ask before starting: What type of restaurant do you want to start? How to prepare a
                                business plan? How to get finance? How important is location? What are the licenses and
                                permits needed? How to create an attractive menu? How to create 'wow'? How to build a
                                brand that the customers look for? How to promote and market? How to expand the
                                business?
                                <br/><br/>
                                Start Your Own Restaurant will</p>

                            <ul class="book-txt-list">
                                <li><i class="fa fa-circle-o"></i> Take you closer to realising your dream and give you
                                    a realistic picture of the restaurant industry in India.
                                </li>
                                <li><i class="fa fa-circle-o"></i> Give you a clear view of the many challenges you will
                                    face as you to start your own restaurant.
                                </li>
                                <li><i class="fa fa-circle-o"></i> Address many of the situations that make running a
                                    restaurant exciting and yet unpredictable.
                                </li>

                            </ul>


                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>CONTENTS </strong><br>
                                            <i class="fa fa-arrow-right"></i> Planning Your Restaurant <br/>
                                            <i class="fa fa-arrow-right"></i> Laying the Foundation<br/>
                                            <i class="fa fa-arrow-right"></i> Launching Your Restaurant<br/>
                                            <i class="fa fa-arrow-right"></i> Becoming Growth Ready<br/>
                                            <i class="fa fa-arrow-right"></i> The Growth Path
                                        </li>
                                    </ul>


                                </div>
                                <div class="bookpart2">

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
