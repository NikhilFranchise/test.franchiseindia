@extends('layout.master')
@section('content')

<!--form start here -->
<div class="container formsection margintop60 staicp">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">


            <h1>Franchise Categories</h1>


            <ul class="row cat-home-list">
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/automotive.m8"><img
                                src="{{URL::asset('images/automotivenew.png')}}" alt="automotive"><span>Automotive</span></a>
                </li>
 
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/beauty-and-health.m1"><img
                                src="{{URL::asset('images/beautynew.png')}}" alt="beauty and health"><span>Beauty &amp; Health</span></a>
                </li>
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/business-services.m6"><img
                                src="{{URL::asset('images/businessnew.png')}}" alt="buisness services"><span>Business Services</span></a>
                </li>
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="https://www.dealerindia.com" target="_blank"><img
                                src="{{URL::asset('images/dealersnew.png')}}" alt="dealers and distributors"><span>Dealers &amp; Distributors</span></a>
                </li>
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/education.m3"><img
                                src="{{URL::asset('images/educationnew.png')}}" alt="education"><span>Education</span></a>
                </li>
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/fashion.m10"><img
                                src="{{URL::asset('images/fashionnew.png')}}" alt="fashion"><span>Fashion</span></a>
                </li>
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/food-and-beverage.m2"><img
                                src="{{URL::asset('images/foodnew.png')}}" alt="food and beverage"><span>Food and Beverage</span></a>
                </li>
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/home-based-business.m7"><img
                                src="{{URL::asset('images/homebasednew.png')}}" alt="home based buisness"><span>Home Based Business</span></a>
                </li>
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/hotels-travel-and-tourism.m263"><img
                                src="{{URL::asset('images/hotelsnew.png')}}" alt="hotels,travel and tourism"><span>Hotels,Travel &amp; Tourism</span></a>
                </li>
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/retail.m9"><img
                                src="{{URL::asset('images/retailnew.png')}}" alt="retail"><span>Retail</span></a></li>
                <li class="col-xs-12 col-sm-2 col-md-2"><a
                            href="{{Config::get('constants.MainDomain')}}/business-opportunities/sports-fitness-and-entertainment.m11"><img
                                src="{{URL::asset('images/entertainmentnew.png')}}" alt="sports and fitness"><span>Sports &amp; Fitness
	&amp; Entertainment</span></a></li>
            </ul>


        </div>
    </div>


    <div class="full-seven-blk-left">

        <div class="sevenbusblock" id="automotive">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/car.png?id=2')}}" alt="automotive"></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/automotive.m8">Automotive</a></div>

            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/two-wheeler.sc341">Two Wheelers</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/automobile-accessories.ssc262">Automobile Accessories</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/automobile-showrooms.ssc170">Automobile Showrooms</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/batteries.ssc266">Batteries</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/car-wash-and-maintenance.ssc171">Car Wash and Maintenance</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/tractors-and-farming-equipments.ssc173">Tractors and Farming
                            Equipments</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/tyres-windshields-and-car-beauty.ssc172">Tyres, Windshields and
                            Car Beauty</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/security-and-helpline-services.ssc174">Security &amp; Helpline
                            Services</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-four-and-two-wheelers.ssc176">Others</a></li>
                </ul>

            </div>
        </div>

        <div class="sevenbusblock" id="beauty">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/beauty-2.png?id=2')}}" alt="beauty and health"></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/beauty-and-health.m1">Beauty and Health</a></div>

            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/beauty-salons-and-supplies.sc13">Beauty
                        Salons &amp; Supplies</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/beauty-salons.ssc47">Beauty Salons</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/tattoo-piercing-and-nail-art.ssc48">Tattoo, Piercing &amp; Nail
                            Art</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/cosmetics-and-beauty-product-stores.ssc49">Cosmetics &amp;
                            Beauty Product Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/pet-grooming.ssc50">Pet Grooming</a></li>
                </ul>

                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/health-care-and-fitness.sc14">Health Care
                        &amp; Fitness</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/pathological-labs.ssc51">Pathological Labs</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/gyms-and-fitness-centres.ssc52">Gyms and Fitness Centres</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/spas.ssc53">Spas</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/medical-spas-med-spas-medi-spas.ssc54">Medical Spas/Med
                            Spas/Medi Spas</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/massage-centres.ssc55">Message Centres</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/clinics-and-nursing-homes.ssc56">Clinics &amp; Nursing
                            Homes</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/hospitals.ssc57">Hospitals</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/pharmacies.ssc58">Pharmacies</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/healthcare-products.ssc59">Healthcare Products</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/slimming-center.ssc60">Slimming Center</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/diet-consultancy.ssc61">Diet Consultancy</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62">Ayurvedic, Herbal
                            &amp; Organic Products</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-health-care-and-fitness.ssc63">others</a></li>
                </ul>

            </div>
        </div>

        <div class="sevenbusblock" id="business">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/business.png?id=2')}}" alt="buisness services"></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/business-services.m6">Business Services</a></div>

            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/logistics.sc25">Logistics</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/courier-and-delivery.ssc127">Courier &amp; delivery</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/supply-chain-management.ssc128">Supply Chain Management</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/transportation.ssc129">Transportation</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/it-services.sc26">IT Services</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/security-services.ssc130">Security Services</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/computer-and-ict-services.ssc131">Computer and ICT Services</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/cartridge-refilling.ssc132">Cartridge Refilling</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/printing-services.ssc133">Printing Services</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/telecom.ssc134">Telecom</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/financial.sc27">Financial</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/insurance.ssc135">Insurance</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/post-office-services.ssc136">Post Office Services</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/finance-advisors-and-brokers.ssc137">Finance Advisors &amp;
                            Brokers</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/microfinance.ssc137">Microfinance</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/equity-and-debt-providers.ssc139">Equity &amp; Debt
                            Providers</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/foreign-exchange.ssc140">Foreign Exchange (FOREX)</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/pawn-brokers.ssc141">Pawn Brokers</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-financial.ssc142">Others</a></li>
                </ul>

                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/repair.sc29">Repair</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/repair-services.ssc148">Repair Services</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/cleaning.sc30">Cleaning</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/institutional-facility-cleaning.ssc149">Institutional/Facility
                            Cleaning</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/laundry-and-dry-cleaning.ssc150">Laundry &amp; Dry Cleaning</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/housekeeping.ssc151">Housekeeping</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/pest-control.ssc152">Pest Control</a></li>
                </ul>

                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/travel.ssc28">Travel</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/travel-agents.ssc143">Travel Agent</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/tour-packages.ssc144">Tour Packages</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/car-rental-and-cab-services.ssc145">Car Rental &amp; Cab
                            Services</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/online-travel-services.ssc146">Online Travel Services</a></li>

                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-travel.ssc147">Others</a></li>
                </ul>

                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/consultancy.sc31">Consultancy</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/business.ssc153">Business</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/financial-consultancy.ssc154">Financial</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/matrimonial.ssc156">Matrimonial</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/bpo.ssc157">BPO</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/career-counseling.ssc158">Career Counseling</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/service-for-smes.ssc159">Service for SMEs</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/immigration.ssc160">Immigration</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/hr-and-recruitment.ssc161">HR &amp; Recruitment</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-consultancy.ssc162">Others</a></li>
                </ul>

                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/real-estate.sc154">Real Estate</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/real-estate-sub.ssc267">Real Estate</a></li>
                </ul>

            </div>
        </div>

        <div class="sevenbusblock" id="dealers">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/car.png?id=2')}}" alt="dealers and distributors"></span><a
                        href="https://www.dealerindia.com" target="_blank">Dealers &amp; Distributors</a>
            </div>

            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/dealers-and-distributors-sub.sc24">Dealers
                        &amp; Distributors</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/beauty-and-health-sub.ssc114">Beauty &amp; Health</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/electronics-and-electrical-components.ssc115">Electronics and
                            Electrical Components</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/solar-energy-and-components.ssc272">Energy and Power</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/solar-energy-and-components.ssc272">Solar Energy &amp;
                            Components</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/automobiles-and-ancillary.ssc116">Automobiles &amp;
                            Ancillary</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/clothing.ssc117">Clothing</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/mobile-and-communication.ssc118">Mobile &amp; Communication</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/computer-hardware-and-it.ssc119">Computer Hardware &amp; IT</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/security.ssc120">Security</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/fmcg.ssc121">FMCG</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/building-and-construction-material.ssc122">Building &amp;
                            Construction Material</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/kids-and-infant-products.ssc123">Kids and Infant Products</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/home-products.ssc124">Home Products</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/resellers.ssc125">Resellers</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-dealers-and-distributors.ssc126">Others</a></li>
                </ul>

            </div>
        </div>


        <div class="sevenbusblock" id="education">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/education.jpg?id=2')}}" alt="education"></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/education.m3">Education</a></div>

            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/early-education.sc17">Early
                        Education</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/preschools.ssc85">Preschool</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/activity-centres-day-care-creches.ssc86">Activity Centres, Day
                            Care, Creches</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/after-school-activities.ssc87">After School Activities</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/education-consultants.sc264">Education
                        Consultants</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/education-career-counseling.ssc265">Education Career
                            Counseling</a></li>
                </ul>

                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/k-education.sc18">K-12 Education</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/schools.ssc88">Schools</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/extra-curriculum-activities.ssc261">Extra Curriculum
                            Activities</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/coaching-and-tutoring.sc19">Coaching &amp;
                        Tutoring</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/competitive-exam-coaching-institute.ssc89">Competitive Exam
                            Coaching Institute</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/online-coaching.ssc90">Online Coaching</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/robotics-and-technical-training.ssc91">Robotics &amp; Technical
                            Training</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/school-tutoring.ssc92">School Tutoring</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/online-education.sc22">Online
                        Education</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/online-learning-e-learning.ssc107">Online
                            learning/E-learning</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-online-education.ssc108">Others</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/higher-education.sc20">Higher
                        Education</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/professional-education-colleges.ssc93">Professional Education
                            Colleges</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/degree-diploma-colleges.ssc94">Degree/Diploma Colleges</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/universities.ssc95">Universities (including Overseas Fr</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/distance-learning-centres.ssc96">Distance Learning Centres</a>
                    </li>
                </ul>

                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/vocational-training.sc21">Vocational
                        Training</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/language-schools.ssc97">Language Schools</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/bpo-kpo-training-institutes.ssc98">BPO/KPO Training
                            Institutes</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/it-education.ssc99">IT Education</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/financial-advisory.ssc100">Financial Advisory</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/retail-training-institutes.ssc101">Retail Training
                            Institutes</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/beauty-and-wellness-training-institute.ssc102">Beauty &amp;
                            Wellness Training Institutes</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/banking-and-insurance-training-institute.ssc103">Banking &amp;
                            Insurance Training Institutes</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/aviation-and-hospitality-training-institute.ssc104">Aviation
                            &amp; Hospitality Training Institutes</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/personality-development.ssc105">Personality Development</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-vocational-training.ssc106">Others</a></li>
                </ul>

            </div>
        </div>

        <div class="sevenbusblock" id="entertainment">

            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/entertainment.jpg?id=2')}}" alt="entertainment"></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/education.m3">Entertainment</a></div>

            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/entertainment-and-leisure.sc45">Entertainment
                        &amp; Leisure</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/movies-multiplex.ssc249">Movies (Multiplex)</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/sports-and-gaming.ssc250">Sports &amp; Gaming</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/kids-entertainment-zones.ssc251">Kids Entertainment Zones</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/video-game-centres.ssc252">Video Game Centres</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/amusement-centres.ssc253">Amusement Centres</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/clubs.ssc254">Clubs</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-entertainment-and-leisure.ssc255">Others</a></li>
                </ul>
            </div>
        </div>

        <div class="sevenbusblock" id="fashion">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/fashionnew.jpg?id=2')}}" alt="fashion"></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/fashion.m10">Fashion</a></div>
            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/clothing.sc40">Clothing</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/textiles.ssc224">Textiles</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/kids-wear.ssc225">Kids Wear</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/mens-wear.ssc226">Mens Wear</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/womens-wear.ssc227">Womens Wear</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/departmental-unisex.ssc228">Departmental/Unisex</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/ethnic-stores.229">Ethnic Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/readymade.ssc231">Readymade</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/woollens.ssc231">Woollens</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/lingerie-and-innerwear.ssc232">Lingerie &amp; Innerwear</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-clothing.ssc233">Others</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/accessories.sc44">Accessories</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/opticians-eye-wear.ssc246">Opticians/Eye Wear</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/luggage-and-hand-bags.ssc247">Luggage &amp; Hand bags</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/fashion-accessories.ssc248">Fashion Accessories</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/jewellery.sc42">Jewellery</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/imitation-art-junk-jewellery.ssc239">Imitation/Art/Junk
                            Jewellery</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/gems-and-stones.ssc240">Gems and Stones</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/precious-jewellery.ssc241">Precious Jewellery</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/time-and-writing-instruments.ssc242">Time &amp; Writing
                            Instruments</a></li>
                </ul>

                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/luxury-premium.sc43">Luxury/Premium</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/designer-wear.ssc243">Designer Wear</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/vintage-stores.ssc244">Vintage Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/luxury-labels.ssc245">Luxury Labels</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/footwear.sc41">Footwear</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/formals.ssc234">Formals</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/casuals.ssc235">Casuals</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/sports.ssc236">Sports</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/designer.ssc237">Designers</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/kids.ssc238">Kids</a></li>
                </ul>
            </div>
        </div>

        <div class="sevenbusblock" id="food">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/food.jpg?id=2')}}" food and beverage></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/food-and-beverage.m2">Food and Beverage</a></div>
            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/food-and-beverage-sub.sc16">Food and Beverage
                        sub</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/juices-smoothies-bar.ssc68">Juices / Smoothies bar</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/ice-cream-and-yogurt-parlours.ssc69">Ice Cream and Yogurt
                            Parlours</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/bakery-and-confectionary.ssc70">Bakery &amp; Confectionary</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/chocolate-stores.ssc71">Chocolate Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/fine-dine-restaurant.ssc72">Fine Dine Restaurant</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/casual-dine-restaurant.ssc73">Casual Dine Restaurant</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/sweet-shops.ssc74">Sweet Shops</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/quick-service-restaurants.ssc75">Quick Service Restaurants
                            (QSRs)</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/express-food-joints-drive-through.ssc76">Express Food Joints /
                            Drive Through</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/coffee-chains.ssc77">Tea and Coffee Chains</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/multi-cuisine-restaurant.ssc78">Multi Cuisine Restaurant</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/kiosks-and-carts-mobile-vans.ssc79">Kiosks &amp; Carts / Mobile
                            Vans</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/bars-pubs-and-lounge.ssc80">Bars, Pubs &amp; Lounge</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/online-food-ordering-services.ssc81">Online Food Ordering
                            Services</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/theme-restaurants.ssc82">Theme Restaurants</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/catering.ssc83">Catering</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-food-service.ssc84">Others</a></li>
                </ul>
            </div>
        </div>

        <div class="sevenbusblock" id="hotels">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/hotels.jpg?id=2')}}" alt="hotels and resorts"></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/hotels-travel-and-tourism.m263">Hotels and Resorts</a></div>
            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/hotels-and-resorts-sub.sc15">Hotels and
                        Resorts sub</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/resort.ssc64">Resorts</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/guest-house-service-apartments.ssc65">Guest House / Service
                            Apartments</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/motels-and-b-and-b.ssc66">Motels and B&amp;B </a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/hotel-chain.ssc67">Hotel Chain</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/hotel-supplier.ssc260">Hotel Supplier</a></li>
                </ul>
            </div>
        </div>

        <div class="sevenbusblock" id="home">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/home.jpg?id=2')}}" alt="home based buisness"></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/home-based-business.m7">Home Based Business</a></div>
            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/home-based-businesses.sc32">Home Based
                        Business</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/astrology-and-tarot.ssc163">Astrology &amp; Tarot</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/consulting.ssc164">Consulting</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/part-time-flexi-time-businesses.ssc165">Part time/Flexi time
                            Businesses</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/boutique.ssc166">Boutique</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/direct-selling.ssc167">Direct Selling (Door-to-Door etc.)</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/mlm-businesses.ssc168">MLM Businesses</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/others-home-based-businesses.ssc169">Others</a></li>
                </ul>
            </div>
        </div>

        {{--<div class="sevenbusblock" id="manufacturing">--}}
            {{--<div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/manufacturing.jpg?id=2')}}"></span><a--}}
                        {{--href="{{Config::get('constants.MainDomain')}}/business-opportunities/industrial-machinery-and-manufacturing.m573">Manufacturing</a></div>--}}
            {{--<div class="seven-list-block">--}}
                {{--<div class="subhead-7000"><a--}}
                            {{--href="{{Config::get('constants.MainDomain')}}/business-opportunities/manufacturing-sub.sc46">Manufacturing</a><span--}}
                            {{--class="txt_666"> </span></div>--}}
                {{--<ul class="seven-list">--}}
                    {{--<li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/home-furnishings.ssc256">Home Furnishing</a></li>--}}
                    {{--<li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/building-material.ssc257">Building Material</a></li>--}}
                    {{--<li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/welding-cutting-and-allied-processes.ssc258">Welding, Cutting--}}
                            {{--&amp; Allied Processes</a></li>--}}
                    {{--<li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/manufacturing-and-ancillary.ssc259">Manufacturing &amp;--}}
                            {{--Ancillary</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="sevenbusblock" id="retail">
            <div class="mainhead-7000"><span class="img-icon"><img src="{{URL::asset('images/retail-2.png?id=2')}}" alt="retail" ></span><a
                        href="{{Config::get('constants.MainDomain')}}/business-opportunities/retail.m9">Retail</a></div>
            <div class="seven-list-block">
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/consumer-durables-and-it.sc34">Consumer
                        Durables &amp; IT</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/consumer-electronics.ssc177">Consumer Electronics</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/computers-and-peripherals.ssc178">Computers &amp;
                            Peripherals</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/mobile-and-communication-internet-connections.ssc179">Mobile
                            &amp; Communication/Internet Connections</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/dvd-rentals.ssc180">DVD Rentals</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/music-equipment-and-music-stores.ssc181">Music Equipment &amp;
                            Music Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/web-design-and-applications.ssc183">Web design &amp;
                            Applications</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/photography.ssc184">Photography</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/other-electronics-and-electrical-prod.ssc185">Other Electronics
                            &amp; Electrical Products</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/supermarkets-and-marts.sc35">Supermarkets
                        &amp; Marts</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/superstores.ssc186">Superstores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/department-and-convenience-stores.ssc187">Department &amp;
                            Convenience Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/kiosks.ssc189">Kiosks</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/food-marts.ssc190">Food Marts</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/pet-stores.ssc191">Pet Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/dairy-f-and-v-stores.ssc192">Dairy/F&amp;V Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/meat-and-chicken-shops.ssc193">Meat &amp; Chicken Shops</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/wine-shops.ssc194">Wine shops</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/gourmet-stores.ssc195">Gourmet Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/organic-products.ssc196">Organic Products</a></li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/home-and-office.sc38">Home &amp;
                        Office</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/bathroom-and-ceramics.ssc211">Bathroom &amp; Ceramics</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/kitchen.ssc212">Kitchen</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/furniture-home-decor-and-furnishing.ssc213">Furniture/Home
                            Decor &amp; Furnishing</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/hardware-stores.ssc214">Hardware Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/art-craft-antique-and-framing.ssc215">Art, Craft, Antique &amp;
                            Framing</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/home-security.ssc216">Home Security</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/handicrafts.ssc217">Handicrafts</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/lighting-electrical-and-plumbing.ssc218">Lighting, Electrical
                            &amp; Plumbing</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/painting.ssc219">Painting</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/garden-stores.ssc220">Garden Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/building-material-stores.ssc221">Building Material Stores</a>
                    </li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/e-retail.sc39">E-Retail</a><span
                            class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/tv-web-shopping.ssc222">TV/Web Shopping</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/e-commerce-and-related.ssc223">E-Commerce &amp; Related</a>
                    </li>
                </ul>

                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/sports-fitness-and-entertainment.m11">Sports
                        Goods &amp; Fitness Stores</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/golf-stores.ssc2208">Golf Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/fitness-equipment-stores.ssc209">Fitness Equipment Stores</a>
                    </li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/sports-equipment-stores.ssc210">Sports Equipment Stores</a>
                    </li>
                </ul>
                <div class="subhead-7000"><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/books-toys-and-gifts.sc36">Books, Toys &amp;
                        Gifts</a><span class="txt_666"> </span></div>
                <ul class="seven-list">
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/book-stores.ssc197">Book Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/stationery-stores.ssc198">Stationery Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/gift-shops-and-card-galleries.ssc199">Gift Shops &amp; Card
                            Galleries</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/kids-candy-stores.ssc200">Kids/Candy Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/toy-shops.ssc201">Toy Shops</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/kiosks.ssc202">Kiosks</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/souvenir-shops.ssc203">Souvenir Shops</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/candle-stores.ssc204">Candle Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/office-supply-stores.ssc205">Office Supply Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/deal-value-stores.ssc206">Deal/Value Stores</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/florists.ssc207">Florists</a></li>
                    <li><a href="{{Config::get('constants.MainDomain')}}/business-opportunities/party-supplies.ssc268">Party Supplies</a></li>
                </ul>
            </div>
        </div>

    </div>


</div>

<!--form end here -->
<div class="height40"></div>
    @endsection
