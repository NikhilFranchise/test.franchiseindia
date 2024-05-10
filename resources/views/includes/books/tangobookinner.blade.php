@extends('layout.master')
@section('seoTitle', 'It Takes two to Tango - Franchise India')
@section('seoDesc', 'The customer is not your spouse; she is your boss! A masterclass on building vibrant relationships in the market by dancing with the customer! We have for too long measured customer impact in terms of demographics and market share. We now need to focus deeper into the impact we make in the lives of individual customers. This calls for a more intimate knowledge of our customer.')
@section('seoKeywords', 'tango, it takes two to tango, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-inner4.jpg" alt="books-inner4"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">It Takes two to Tango</h1>
                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="It Takes two to Tango">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.tango.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.tango.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.tango.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.tango.usa')}}
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

                            <p class="book-st-txt-b">"The customer is not your spouse; she is your boss!"<br>
                                A masterclass on building vibrant relationships in the market by dancing with the
                                customer!<br><br></p>
                            <p class="book-st-txt">We have for too long measured customer impact in terms of
                                demographics and market share. We now need to focus deeper into the impact we make in
                                the lives of individual customers. This calls for a more intimate knowledge of our
                                customer.
                                <br><br>
                                There is no marketing or research agency that can deliver this knowledge to us, as
                                experts focus too much on the numbers game, abstract averages and generic types. We need
                                to directly enter into a conversation with our customers, to learn from them more about
                                themselves, so we can make that value offering they want and need. Or better still
                                invite them to design what they want! We need to do the tango with our customer! </p>
                            <ul class="book-txt-list">
                                <li><i class="fa fa-circle-o"></i> It Takes Two to Tango builds a case for how we have
                                    emerged into a customer dominated, shape-shifting
                                    world. Building customer connect needs to be seen as investing into our customers as
                                    the most valuable asset
                                    of an enterprise.
                                </li>
                                <li><i class="fa fa-circle-o"></i> It Takes Two to Tango shows how the route to building
                                    customer equity is only through delighting our
                                    customers with outstanding customer experience.
                                </li>
                                <li><i class="fa fa-circle-o"></i> It Takes Two to Tango is about how we need to, and
                                    can, master the management of innovation.
                                </li>
                                <li><i class="fa fa-circle-o"></i> It Takes Two to Tango talks about building the
                                    organisation as an organic ecosystem in which key members of
                                    the team are empowered to fulfil the entrepreneurial task of leading the tango with
                                    customers.
                                </li>
                                <li><i class="fa fa-circle-o"></i> It Takes Two to Tango amends the famous Ogilvy quote
                                    to make it more relevant today: "The customer is not
                                    your spouse; she is your boss!"
                                </li>
                            </ul>
                            <p class="book-st-txt">
                                Each chapter presents a step-by-step guide to implement the recommended changes in
                                mindset, strategy and business practice so we call fall into rhythm with our customers.
                                Replete with interesting business examples and practical insight, It Takes Two to Tango
                                will prove invaluable to all marketers who want to build business on the most important
                                revenue source in the world - sales income!</p>

                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 1 : SHIFT HAPPENS</strong><br>
                                            <i class="fa fa-arrow-right"></i> Welcome To The Shape-Shifting World Of
                                            Customer Domination<br/>
                                        </li>
                                        <li><strong>Chapter 2: BUILDING CUSTOMER EQUITY </strong><br/>
                                            <i class="fa fa-arrow-right"></i> Establishing Connect In A
                                            Customer-Dominated World<br/>
                                        </li>
                                        <li><strong>Chapter 3: THE IMPORTANCE OF WOW!</strong><br>
                                            <i class="fa fa-arrow-right"></i> Creating And Delivering Outstanding
                                            Customer Experience
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>Chapter 4: THE IMPORTANCE OF INNOVATION</strong><br>
                                            <i class="fa fa-arrow-right"></i> Replication Is Passe And Innovation Has To
                                            Be Managed<br/>
                                        </li>
                                        <li><strong>Chapter 5: BUILDING THE TANGO TEAM </strong><br/>
                                            <i class="fa fa-arrow-right"></i> Resilient Organic Networks Built On
                                            Command Structures<br/>
                                        </li>
                                        <li><strong>Chapter 6: SHIFT OWNERSHIP</strong><br>
                                            <i class="fa fa-arrow-right"></i> How To Make Customers Dance
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
    <!--Book end here -->

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
