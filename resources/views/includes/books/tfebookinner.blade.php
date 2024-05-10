@extends('layout.master')
@section('seoTitle', 'Top Food Entrepreneurs book')
@section('seoDesc', 'To simply put it, this book is about top food entrepreneurs of India. ')
@section('seoKeywords', 'Top Food Entrepreneurs , Top Food Entrepreneurs book , ')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com/images/topfood.jpg" alt="topfood"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Top Food Entrepreneurs book</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Top Food Entrepreneurs book">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.tfe.india')}}" class="static_class"
                               checked="checked">India:Special Offer Rs. {{Config::get('constants.BookPrice.tfe.india')}} (MRP : Rs. 5000)
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


                          

                            <p class="book-st-txt">To simply put it, this book is about top food entrepreneurs of India who have not only changed the dining scenario of the country but also played a huge role in putting India on the global culinary map. From sharing stories of top chefs and entrepreneurs to whipping up cuisines that are to die for, this book is a tribute to the food aficionados. Delving into the stories that go beyond just food and fine cooking, this book captures the facets of the foodpreneurs defining a true culinary experience.</p>

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
