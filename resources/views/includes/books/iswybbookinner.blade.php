@extends('layout.master')
@section('seoTitle', 'Indian Salon & Wellness year book')
@section('seoDesc', 'Salon & Wellness brands India introduces to the 45 chic Salon & Spa brands in India ')
@section('seoKeywords', 'Top Food Entrepreneurs , Indian Salon & Wellness year book , ')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com/images/indiansalon2018.jpg" alt="franchiseindia book"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Indian Salon & Wellness year book</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Indian Salon & Wellness year book">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.iswyb.india')}}" class="static_class"
                               checked="checked">India:Special Offer Rs. {{Config::get('constants.BookPrice.iswyb.india')}} (MRP : Rs. 4000)
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


                          

                            <p class="book-st-txt">Salon & Wellness brands India introduces to the 45 chic Salon & Spa brands in India. Highlighting the best experiences, which portray both, style & class, this book redefines rejuvenation for all. It serves as a port to look for the best Salons & Spas around the country. Readers will not only discover great brands though this book, but they will also get a chance to know the brand up and close. Get ready to dwell in the realm of impeccable relaxation and eye-catching decor that will entice and encourage you to avail various services offered. </p>

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
