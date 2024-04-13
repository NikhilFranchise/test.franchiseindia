@extends('layout.master')
@section('seoTitle', 'Take Charge - Franchise India')
@section('seoDesc', 'Take Charge is about owning a dream and making it a reality. Take charge is about how to build a team that works for the vision of one that&#039;s shared by all. Take charge is about 10 entrepreneur mindset strategies that will build excellence in enterprise. Take charge challenges the reader to demand more from self and always look higher.')
@section('seoKeywords', 'tc, take charge, books and reports')
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
                <div class="bookimg"><img src="https://www.franchiseindia.com//images/books-inner2.jpg" alt="books-inner2"/></div>
            </div>


            <div class="col-xs-12 col-sm-9 col-md-9">
                <h1 class="bookhead">Take Charge</h1>

                <form action="{{Config::get('constants.MainDomain')}}/book/payment" method="post">
                    <input type="hidden" name="bookname"  value="Take Charge">
                <div class="costbok">Cost of book:</div>
                <ul class="bookrate">
                    <li><input type="radio" name="price" value="Rs {{Config::get('constants.BookPrice.tc.india')}}" class="static_class"
                               checked="checked">India: Rs. {{Config::get('constants.BookPrice.tc.india')}}


                    </li>
                    <li><input type="radio" name="price" value="${{Config::get('constants.BookPrice.tc.usa')}}" class="static_class">
                        Overseas: USD {{Config::get('constants.BookPrice.tc.usa')}}
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


                            <ul class="book-txt-list">
                                <li><i class="fa fa-circle-o"></i> 200 pages of lucid text that deliver the attitude
                                    needed to build a fantasy.
                                </li>
                                <li><i class="fa fa-circle-o"></i> Take Charge is about owning a dream and making it a
                                    reality.
                                </li>
                                <li><i class="fa fa-circle-o"></i> Take charge is about how to build a team that works
                                    for the vision of one that's shared by all.
                                </li>
                                <li><i class="fa fa-circle-o"></i> Take charge is about 10 entrepreneur mindset
                                    strategies that will build excellence in enterprise
                                </li>
                                <li><i class="fa fa-circle-o"></i> Take charge challenges the reader to demand more from
                                    self and always look higher
                                </li>
                            </ul>
                        </div>

                        <div id="booktabcontent2">
                            <!-- new book section start here -->
                            <div class="bookpart">
                                <div class="bookpart1">
                                    <ul class="book-capt-list">
                                        <li><strong>CONTENTS:</strong><br>
                                            <i class="fa fa-arrow-right"></i> Acknowledgements ix<br/>
                                            <i class="fa fa-arrow-right"></i> Preface xiii
                                        </li>
                                        <li><strong>INTRODUCTION: ENTREPRENEURS AND THEIR ENTERPRISE (3)</strong></li>
                                        <li><strong>FEAR-FUN-FANTASY: THE ENTREPRENEUR EQUILIBRIUM (17)</strong></li>
                                        <li><strong>BUILD A GROWTH FANTASY (29)</strong></li>
                                        <li><strong>LAY THE FOUNDATION OF THE FANTASY (37)</strong></li>
                                    </ul>


                                </div>
                                <div class="bookpart2">
                                    <ul class="book-capt-list">
                                        <li><strong>LIVE THE FANTASY: 10 STRATEGIES FOR ENTREPRENEUR EXCELLENCE</strong><br>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 1: Jack be
                                            Nimble, Jack be Quick!<br/> 74<br>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 2: Let's
                                            Walk Before We Run 88<br>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 3: When We
                                            Stumble... We Learn<br/> 100<br>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 4: The
                                            Business Can Look After Itself-Let's Build the Brand 109<br>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 5: To Sell
                                            We Need to "Connect"<br/> and "Re-connect" 134<br>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 6: A Team to
                                            Build the Fantasy<br/> With 142<br>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 7:
                                            Ultimately it is "Us Only", Let's Build Personal Capacity 155<br/>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 8: Share the
                                            Reward, Own the Risk 164<br/>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 9: On the
                                            job 24/7, Where to Find the Time 170<br/>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 9: On the
                                            job 24/7, Where to Find the Time 170<br/>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Strategy 10: If We
                                            Aren't Having Fun - Let's Change the Game 178<br/>
                                            <i class="fa fa-arrow-right"></i> Entrepreneur Mindset Toolbox 186
                                        </li>

                                        <li><strong>Always Higher (189)</strong><br>

                                            <i class="fa fa-arrow-right"></i> Bibliography 192
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
