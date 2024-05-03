@section('seoTitle', 'Franchise India - Advertise With Us')
@section('seoDesc', 'Advertise with Franchise India')
@section('seoKeywords', 'Advertise with us, Franchise India')

@extends('layout.master')
@section('content')

    <link href="{{url('css/advertise.css')}}" type="text/css" rel="stylesheet" />

    <!--form start here -->
    <div class="container advertsection">
        <h1>Advertise With Franchise India</h1>
    </div>
    <div class="tfw">
        <div class="container advertsection">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 advertblk">
                    <div class="advertimgleft"><img src="{{ url('images/magazine/tfw-297x402.jpg')}}"/></div>
                    <div class="advertright">
                        <div class="advetsubhead">The Franchising World</div>
                        <div class="adverttxt">
                            India's most comprehensive and leading end-to-end business and franchise magazine, The Franchising World, has become a benchmark in its years of existence since 1999. It is a gateway to the world of franchise opportunities. The magazine has an exhaustive subscriber's base and is present on stands nationwide.
                        </div>
                        <ul class="advertvalue">
                            <li>Circulation <span>1,00,000</span></li>
                            <li>Subscribers <span>69.2 %</span></li>
                            <li>Newsstand <span>30.8%</span></li>
                        </ul>
                        <div class="advertinfo">
                            {{--<div class="advertname">Sanjay Bhat</div>--}}
                            {{--<div class="advertdetail"><span>Mobile:</span> + 91 (0) 9312650021</div>--}}
                            {{--<div class="advertdetail"><span>Email:</span> <a href="mailto:advertising@franchiseindia.com">advertising@franchiseindia.com</a></div>--}}
                            <div class="adverbtn">
                                <a class="btn btn-default adddffi" id="FranchisingWorld" href="#" data-toggle="modal" data-target="#advertise">Advertise</a>
                                <a class="btn btn-default adddffi" href="{{url('pdf/tfw-magazine.pdf')}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Downlaod Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Gallery start here -->
            <div class="adglyblk">
                <div id="tfwAdvertslider" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <ul class="advertlist">
                                <li class="fulladvert">
                                    <a data-toggle="modal" data-id="tfw-full-big.jpg" class="adverimg" href="#" data-target="#advertiseimgage">
                                        <div class="adveffect"><img src="{{url('images/advertise/advertisefullhover.png')}}" alt="Image"></div>
                                        <img src="{{url('images/advertise/tfwadvertisefull_01.jpg')}}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="tfw-mothercare.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{url('images/advertise/advertisehalfhover.png')}}" alt="Image"></div>
                                        <img src="{{url('images/advertise/tfw-mothercare-small.jpg')}}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="tfw-yogorino.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{url('images/advertise/advertisehalfhover.png')}}" alt="Image"></div>
                                        <img src="{{url('images/advertise/tfw-yogorino-small.jpg')}}" alt="Image" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="modal" data-id="tfw-br.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-br-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>


                                <li>
                                    <a data-toggle="modal" data-id="tfw-dipinto.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-dipinto-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="tfw-icecream.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-icecream-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                            </ul>
                            <!--/row-->
                        </div>


                        <div class="item">
                            <ul class="advertlist">

                                <li>
                                    <a data-toggle="modal" data-id="tfw-marwa.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-marwa-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="tfw-sportseed.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-sportseed-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="tfw-miton.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-miton-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="tfw-true-fit-hill.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-true-fit-hill-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="tfw-raymonds.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-raymonds-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="tfw-liberty.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-liberty-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="tfw-eurokids.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/tfw-eurokids-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#tfwAdvertslider" data-slide="prev"><img src="{{ url( 'images/leftarrow.png') }}" alt="Image"></a>
                    <a class="right carousel-control" href="#tfwAdvertslider" data-slide="next"><img src="{{ url( 'images/rightarrow.png') }}" alt="Image"></a>
                </div>
            </div>
            <!--Gallery end here -->
        </div>
    </div>


    <!--Entrepreneur Mag Start here -->
    <div class="entrepreneursection">
        <div class="container advertsection">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 advertblk">
                    <div class="advertimgleft"><img src="{{ url('images/magazine/sme-297x402.jpg')}}"/></div>
                    <div class="advertright">
                        <div class="advetsubhead">Entrepreneur</div>
                        <div class="adverttxt">
                            The Indian face of America’s #1 Entrepreneur magazine will give you all the insights you need about the entrepreneurial ecosystem of India. Learn the how to’s and why to’s of entrepreneurship and know what the best of Indian entrepreneurial minds have to say.
                        </div>
                        <ul class="advertvalue">
                            <li>Audience <span>25,000</span></li>
                            <li>Subscribers <span>60,000</span></li>
                            <li>Institutional orders <span>8000</span></li>
                        </ul>
                        <div class="advertinfo">
                            {{--<div class="advertname">Kapil Jaiswal</div>--}}
                            {{--<div class="advertdetail"><span>Mobile:</span> + 91 (0) 9911281658</div>--}}
                            {{--<div class="advertdetail"><span>Email:</span> <a href="mailto:kjaiswal@startuppublication.com">kjaiswal@startuppublication.com</a></div>--}}
                            {{--<div class="advertdetail"><span>Website:</span> <a href="https://www.entrepreneur.com/">www.entrepreneurindia.com</a></div>--}}
                            <div class="adverbtn">
                                <a class="btn btn-default adddffi" id="entrepreneur" href="#" data-toggle="modal" data-target="#advertise">Advertise</a>
                                <a class="btn btn-default adddffi" href="{{ url('pdf/entrepreneur-magazine.pdf' ) }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Downlaod Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Gallery start here -->
            <div class="adglyblk">
                <div id="entrepreneurAdvertslider" class="carousel slide">
                    <!-- Carousel items -->

                    <div class="carousel-inner">
                        <div class="item active">
                            <ul class="advertlist">
                                <li class="fulladvert">
                                    <a data-toggle="modal" data-id="sme-full-lumi.jpg" class="adverimg" href="#" data-target="#advertiseimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisefullhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-full-lumi-small.jpg') }}" alt="Lumi" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-safeexpress.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-safeexpress-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-dell.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-dell-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-frederique.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-frederique-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-fastas.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-fastas-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-trump-hotels.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-trump-hotels-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                            </ul>
                            <!--/row-->
                        </div>

                        <div class="item">
                            <ul class="advertlist">

                                <li>
                                    <a data-toggle="modal" data-id="sme-citrus-ventures.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-citrus-ventures-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-pure-momentum(500x700).jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-pure-momentum(143x204).jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-beyyond-strenth(500x700).jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-beyyond-strenth(143x204).jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-eleavtor(500x700).jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-eleavtor(143x204).jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="modal" data-id="sme-moooooo(500x700).jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-moooooo(143x204).jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-reliable(500x700).jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-reliable(143x204).jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="sme-the-future(500x700).jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/sme-the-future(143x204).jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#entrepreneurAdvertslider" data-slide="prev">
                        <img src="{{ url( 'images/leftarrow.png') }}" alt="Image" >
                    </a>
                    <a class="right carousel-control" href="#entrepreneurAdvertslider" data-slide="next"><img src="{{ url( 'images/rightarrow.png') }}" alt="Image"></a>
                </div>
            </div>
            <!--Gallery end here -->
        </div>
    </div>
    <!--Entrepreneur Mag end here -->

    <!--Retailer Mag Start here -->
    <div class="retailersection">
        <div class="container advertsection">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 advertblk">

                    <div class="advertimgleft"><img src="{{ url('images/magazine/retailer-297x402.jpg') }}"/></div>

                    <div class="advertright">
                        <div class="advetsubhead">Retailer</div>
                        <div class="adverttxt">
                            Leading retail opportunity and consumer insight magazine, Retailer has left its mark amongst the retail stakeholders comprising of small and medium retailers, retail professionals, suppliers and vendors and mall developers over its years of operation.
                        </div>
                        <ul class="advertvalue">
                            <li>Total Circulation <span>80,000</span></li>
                            <li>Subscribers <span>27,000</span></li>
                            <li>Monthly Reach <span>75 Cities</span></li>
                        </ul>
                        <div class="advertinfo">
                            {{--<div class="advertname">Pawan S Kulkarni</div>--}}
                            {{--<div class="advertdetail"><span>Mobile:</span> + 91 (0) 9343694792</div>--}}
                            {{--<div class="advertdetail"><span>Email:</span> <a href="mailto:retailer@franchiseindia.com">retailer@franchiseindia.com</a></div>--}}
                            {{--<div class="advertdetail"><span>Website:</span> <a href="https://www.indianretailer.com/">www.indianretailer.com</a></div>--}}
                            <div class="adverbtn">
                                <a class="btn btn-default adddffi" id="retailer" href="#" data-toggle="modal" data-target="#advertise">Advertise</a>
                                <a class="btn btn-default adddffi" href="{{ url('pdf/retailer-magazine.pdf' ) }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Downlaod Pdf</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--Gallery start here -->
            <div class="adglyblk chgback">
                <div id="retailerAdvertslider" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <ul class="advertlist">
                                <li class="fulladvert">
                                    <a data-toggle="modal" data-id="retailer-full-vivramall.jpg" class="adverimg" href="#" data-target="#advertiseimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisefullhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-full-vivramall-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-club-burgoyne.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-club-burgoyne-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-bharti.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-bharti-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-dell.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-dell-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-espon.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-espon-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-gati.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-gati-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                            </ul>
                            <!--/row-->
                        </div>

                        <div class="item">
                            <ul class="advertlist">

                                <li>
                                    <a data-toggle="modal" data-id="retailer-ginesys.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-ginesys-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-happy.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-happy-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-inorbit-mall.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-inorbit-mall-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-iris.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-iris-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="modal" data-id="retailer-pitney-bowes.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-pitney-bowes-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-plazzo.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-plazzo-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="modal" data-id="retailer-porter.jpg" class="adverimgone" href="#" data-target="#advertiseoneimgage">
                                        <div class="adveffect"><img src="{{ url( 'images/advertise/advertisehalfhover.png') }}" alt="Image"></div>
                                        <img src="{{ url( 'images/advertise/retailer-porter-small.jpg') }}" alt="Image" class="img-responsive">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#retailerAdvertslider" data-slide="prev">
                        <img src="{{ url( 'images/leftarrow.png') }}" alt="Image" ></a>
                    <a class="right carousel-control" href="#retailerAdvertslider" data-slide="next"><img src="{{ url( 'images/rightarrow.png') }}" alt="Image" ></a>
                </div>
            </div>
            <!--Gallery end here -->
        </div>
    </div>
    <!--Retailer Mag end here -->

    <!--franchise india web  Start here -->
    <div class="franchisesection">
        <div class="container advertsection">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 advertblk">

                    <div class="advertimgleft noneborder"><img src="{{ url( 'images/magazine/webadvertise.jpg') }}"/></div>
                    <div class="advertright">
                        <div class="advetsubhead">Franchiseindia.com</div>
                        <div class="adverttxt">
                            World's #1 franchise website and an Entrepreneur’s daily dose. From franchise and business opportunities to partnerships, manufacturing, distribution, retail and much more, Franchiseindia.com is the one stop solution for every business’ expansion plans.
                        </div>
                        <ul class="advertvalue">
                            <li>Monthly Visitors <span>7,68,806</span></li>
                            <li>Page Views <span>24,44,405</span></li>
                            <li>Page Views <span>24,44,405</span></li>
                        </ul>
                        <div class="advertinfo">
                            {{--<div class="advertname">Susheela Negi</div>--}}
                            {{--<div class="advertdetail"><span>Mobile:</span> + 91 (0) 9310089102</div>--}}
                            {{--<div class="advertdetail"><span>Email:</span> <a href="mailto:advertise@franchiseindia.com">advertise@franchiseindia.com</a></div>--}}
                            {{--<div class="advertdetail"><span>Website:</span> <a href="https://www.franchiseindia.com/">www.franchiseindia.com</a></div>--}}
                            <div class="adverbtn">
                                <a class="btn btn-default adddffi" id="Franchiseindia_com" href="#" data-toggle="modal" data-target="#advertise">Advertise</a>
                                <a class="btn btn-default adddffi" href="{{ url('pdf/dotcom-media-kit.pdf' ) }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Downlaod Media Kit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Gallery start here -->
            <div class="adglyblk">
                <div id="webAdvertslider" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <ul class="advertlist">
                                <li><a href="#"><img src="{{ url( 'images/advertise/webad1.jpg') }}" alt="Image" class="img-responsive"></a></li>
                                <li><a href="#"><img src="{{ url( 'images/advertise/webad2.jpg') }}" alt="Image" class="img-responsive"></a></li>
                                <li><a href="#"><img src="{{ url( 'images/advertise/webad3.jpg') }}" alt="Image" class="img-responsive"></a></li>
                                <li><a href="#"><img src="{{ url( 'images/advertise/webad4.jpg') }}" alt="Image" class="img-responsive"></a></li>
                            </ul>
                        </div>

                        <div class="item">
                            <ul class="advertlist">
                                <li><a href="#"><img src="{{ url( 'images/advertise/webad5.jpg') }}" alt="Image" class="img-responsive"></a></li>
                                <li><a href="#"><img src="{{ url( 'images/advertise/webad6.jpg') }}" alt="Image" class="img-responsive"></a></li>
                                <li><a href="#"><img src="{{ url( 'images/advertise/webad7.jpg') }}" alt="Image" class="img-responsive"></a></li>
                                <li><a href="#"><img src="{{ url( 'images/advertise/webad8.jpg') }}" alt="Image" class="img-responsive"></a></li>
                            </ul>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#webAdvertslider" data-slide="prev"><img src="{{ url( 'images/leftarrow.png') }}" alt="Image" ></a>
                    <a class="right carousel-control" href="#webAdvertslider" data-slide="next"><img src="{{ url( 'images/rightarrow.png') }}" alt="Image" ></a>
                </div>
            </div>
            <!--Gallery end here -->
        </div>
    </div>
    <!--franchise india web end here -->


    <div class="advereventsection">
        <div class="container advertsection">

            <ul class="eventlist" style="clear:both;">
                <li>
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="https://www.franchiseindia.com/images/events/expologo-logo.png" alt="Franchise & Retail Opportunity Show (FRO) Logo" class="ev-logo"/></div>
                        </div>
                        <img src="{{ url( 'images/advertise/expoevent-bg.jpg') }}" alt="Franchise & Retail Opportunity Show (FRO)" class="bdr">
                    </div>

                    <div class="demopadding">
                        <div class="icon social fb">
                            <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i class="fa fa-facebook"></i></a>
                        </div>
                        <div class="icon social tw">
                            <a href="https://twitter.com/franchiseeindia" target="_blank"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="icon social in">
                            <a href="https://www.linkedin.com/company/franchise-india-holdings-limited" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="eventcontentblk">
                        <div class="eventhdk">Franchise & Retail Opportunity Show (FRO)</div>
                        <div><br></div>
                        <div class="adverbtn">
                            <a class="btn btn-default adddffi" id="FranchiseRetailOpportunityShow" href="#" data-toggle="modal" data-target="#advertise">Exhibit</a>
                            <a class="btn btn-default adddffi" href="https://www.franchiseindia.net/domestic_event.php" target="_blank">Calendar</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="https://www.franchiseindia.org/bos/" target="_blank">
                        <div class="imgblk">
                            <div class="backdr">
                                <div class="logocent"><img src="https://www.franchiseindia.com/images/events/bos-logo2019.png" alt="Business Opportunity show Logo" class="ev-logo"/></div>
                            </div>
                            <img src="{{ url( 'images/advertise/bosevent-bg.jpg') }}" alt="Business Opportunity show" class="bdr">
                        </div>
                    </a>
                    <div class="demopadding">
                        <div class="icon social fb">
                            <a href="https://www.facebook.com/BusinessOpportunitiesShows" target="_blank"><i class="fa fa-facebook"></i></a>
                        </div>
                        <div class="icon social tw">
                            <a href="https://twitter.com/franchiseeindia" target="_blank"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="icon social in">
                            <a href="https://www.linkedin.com/company/franchise-india-holdings-limited" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="eventcontentblk">
                        <div class="eventhdk">Business Opportunities Show (BOS)</div>
                        <div><br></div>
                        <div class="adverbtn">
                            <a class="btn btn-default adddffi" id="BusinessOpportunitiesShow" href="#" data-toggle="modal" data-target="#advertise">Exhibit</a>
                            <a class="btn btn-default adddffi" href="https://www.franchiseindia.com/bos/event-calendar-2019.php" target="_blank">Calendar</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{ url( 'images/advertise/forumlogo.png') }}" alt="Franchise India Forums (FI Forums) Logo" class="ev-logo"/></div>
                        </div>
                        <img src="{{ url( 'images/advertise/forumevent-bg.jpg') }}" alt="Franchise India Forums (FI Forums)" class="bdr">
                    </div>

                    <div class="demopadding">
                        <div class="icon social fb">
                            <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i class="fa fa-facebook"></i></a>
                        </div>
                        <div class="icon social tw">
                            <a href="https://twitter.com/franchiseeindia" target="_blank"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="icon social in">
                            <a href="https://www.linkedin.com/company/franchise-india-holdings-limited" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="eventcontentblk">
                        <div class="eventhdk">Franchise India Forums (FI Forums)</div>
                        <div><br></div>
                        <div class="adverbtn">
                            <a class="btn btn-default adddffi" id="FranchiseIndiaForums" href="#" data-toggle="modal" data-target="#advertise">Exhibit</a>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <!--form end here -->
    <div class="height40"></div>
    <!-- full image banner start here -->
    <div class="modal fade" tabindex="-1" id="advertiseimgage" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <img src="{{ url( 'images/advertise/tfwadvertisefull_02.jpg') }}" alt="Image" id="picture"/>
                </div>
            </div>
        </div>
    </div>
    <!-- full image banner end here -->

    <!-- one image banner start here -->
    <div class="modal fade" tabindex="-1" id="advertiseoneimgage" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <img src="{{ url( 'images/advertise/onepage-ad2.jpg') }}" alt="Image" id="subpicture"/>
                </div>
            </div>
        </div>
    </div>
    <!-- full image banner end here -->

    <!---->
    <div class="modal fade lg-panel formsection" id="advertise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="adhead">Advertise With Us - Requested from</div>
                    <div class="subadhead" id="titleadvertise">The Franchising World</div>
                    <div class="subadheadthanks" id="titleadvertisethanks" style="display: none">Thanks for showing interest. Our executive will  get in touch with you shortly!</div>

                    <form class="form-horizontal" method="POST" action="{{Config('constants.MainDomain')}}/advertise/addform" id="advertise_form">
                        <input type="hidden" name="_csrf" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="" id="hiddenId">
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{url('images/user.png')}}"></span>
                                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{url('images/email.png')}}"></span>
                                <input type="email" class="form-control" placeholder="Enter Your Email" name="email" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{url('images/mobile.png')}}"></span>
                                <input type="text" class="form-control" pattern="[0-9]{5,10}" maxlength="10" minlength="10" placeholder="Enter Mobile" name="mobile" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{url('images/city.png')}}"></span>
                                <input type="text" class="form-control" placeholder="Enter Your City" name="city" required>
                            </div>


                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{url('images/company.png')}}"></span>
                                <input type="text" class="form-control" minlength="2" placeholder="Enter Company Name" name="company_name" required>
                            </div>

                            <button type="submit" class="btn btn-default btn-propad" id="submitButton">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <script language="javascript">
        $(document).ready(function () {
            $('#tfwAdvertslider').carousel({
                interval: 10000
            });
            $('#retailerAdvertslider').carousel({
                interval: 10000
            });
            $('#webAdvertslider').carousel({
                interval: 10000
            });
        });

        $(".adverimg").click(function () {
            let imgcall = $(this).data('id');
            $('#picture').attr('src', '{{ Config('constants.MainDomain') }}/images/advertise/' + imgcall);
        });

        $(".adverimgone").click(function () {
            let imgcall = $(this).data('id');
            $('#subpicture').attr('src', '{{ Config('constants.MainDomain') }}/images/advertise/' + imgcall);
        });

        $( "#advertise_form" ).submit(function() {
            $('#advertise_form').css('display','none');
            $('#titleadvertisethanks').css('display','block');
        });

        $('#FranchisingWorld').click(function (){
            $('#hiddenId').val("TheFranchisingWorld");
            $('#titleadvertise').html("TheFranchisingWorld");
        });
        $('#retailer').click(function (){
            $('#hiddenId').val("Retailer");
            $('#titleadvertise').html("Retailer");
        });
        $('#entrepreneur').click(function (){
            $('#hiddenId').val("Entrepreneur");
            $('#titleadvertise').html("Entrepreneur");
        });
        $('#Franchiseindia_com').click(function (){
            $('#hiddenId').val("Franchiseindia.com");
            $('#titleadvertise').html("Franchiseindia.com");
        });
        $('#FranchiseIndiaForums').click(function (){
            $('#hiddenId').val("FranchiseIndiaForums");
            $('#titleadvertise').html("FranchiseIndiaForums");
        });

        $('#FranchiseRetailOpportunityShow').click(function (){
            $('#hiddenId').val("FranchiseRetailOpportunityShow");
            $('#titleadvertise').html("FranchiseRetailOpportunityShow");
        });
        $('#BusinessOpportunitiesShow').click(function (){
            $('#hiddenId').val("BusinessOpportunitiesShow");
            $('#titleadvertise').html("BusinessOpportunitiesShow");
        });
    </script>
@endsection
