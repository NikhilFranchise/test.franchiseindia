@extends('layout.master')
@section('seoTitle', 'Restaurant coffee table book')
@section('seoDesc', 'Indian Restaurant Book takes you through 75 best restaurants in India. ')
@section('seoKeywords', 'Indian Restaurant Book , Restaurant coffee tabe book , ')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/coffeetabebook.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Restaurant coffee table book</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Restaurant coffee table book">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.rbc.india')}}" class="static_class"
                               checked="checked">India:Special Offer Rs. {{Config::get('constants.BookPrice.rbc.india')}}(MRP : Rs. 5000)
                    </li>

                </ul>

                    <div class="btns">
                        <input type="submit"  class="btn btn-default" value="Buy Now"/>
                    </div>
                </form>


                <div class="booktobmain">
                    <input id="booktab1" type="radio" name="tabsp" checked="">
                    <label for="booktab1">VIEW SUMMARY</label>
                    <span class="bookunderline"></span>
                    <div class="booktabcontent">
                        <div id="booktabcontent1">


                          

                            <p class="book-st-txt">Indian Restaurant Book takes you through 75 best restaurants in
                                India. Capturing the best of the restaurants, cafes, bars and night clubs in India, this
                                book is a 'Mecca' for the food aficionados. It is a one-stop destination to look for the
                                best restaurants in different parts of the country from a luxury restaurant, which
                                specializes in fine dining, to a cafe that celebrates its food, or a legacy
                                luncheonette, which has been serving its customers for generations without altering its
                                menu. Delving into insights that go beyond just facts, this book captures the facets of
                                restaurant business and tries to define dining experiences in India for an epicure and
                                also a casual diner.</p>

                        </div>

                    </div>
                    <div class="clr"></div>
                    <!-- new book section end here -->

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
