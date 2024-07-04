<!DOCTYPE html>
<html>
<head>
    @include('layout.newhomepage.head')
</head>
<body>
@php
    $pageType = (request()->segment(1) == 'premiumbrand' || request()->segment(2) == 'premiumbrand') ? 2 : 1;

@endphp
@php
    $hindiUrl = url('hi');
    $engUrl   = url('');
@endphp

@section('hindiUrl', $hindiUrl)
@section('englishUrl', $engUrl)

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NW38FD"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

@mobile
@include('layout.newhomepage.mobile.topsearch')
@endmobile
@tablet
@include('layout.newhomepage.topsearch')
@endtablet
@desktop
@include('layout.newhomepage.topsearch')
@enddesktop
<!-- Login/ Registration Model -->
@include('layout.newhomepage.loginregistration')

<!-- Login/ Registration Model End-->
@include('layout.newhomepage.expeFndfrm')

<div class="wrapper">
    <!-- Sidebar  -->
@include('layout.newhomepage.sidemenu')

<!-- Sidebar End -->
<!-- Desktop Section Start-->
@desktop

<!-- Page Content  -->
    <div id="content">
    @include('layout.newhomepage.header')

    <!-- HERO SECTION STARTS -->
    @include('layout.newhomepage.herosection')

    <!-- HERO SECTION EMDS -->
        <main class="main" id="main">
            <!-- CARD SECTION START  -->
        @include('layout.newhomepage.cardsection')

        <!-- CARD SECTION ENDS HERE -->
            <!-- COVID PROOF BUSINESS OPPORTUNITIES START  -->
        @include('layout.newhomepage.covidproof')

        <!-- COVID PROOF BUSINESS OPPORTUNITIES ENDS -->
            <!-- Best Franchise Opportunity starts -->
        @include('layout.newhomepage.bestfranchiseopportunity')

        <!-- Best Franchise Opportunity ends -->

		<!-- TOP DEALERSHIP OPPORTUNITIES START -->
		@include('layout.newhomepage.top_dealership_opportunities')
		<!-- TOP DEALERSHIP OPPORTUNITIES END -->

		<!-- BUSINESS FOR SALE OPPORTUNITIES START -->
		@include('layout.newhomepage.business_for_sale_opportunities')
		<!-- BUSINESS FOR SALE OPPORTUNITIES END -->

            <!-- Upcoming Events starts -->
        {{--@include('layout.newhomepage.upcomingevents')--}}
        @include('layout.newhomepage.videoevent')
        <!-- Upcoming Events ends -->
		<!-- Top International Opportunities starts -->
        @include('layout.newhomepage.topinternational')
        <!-- Top International Opportunities ends -->

		<!-- HIGH GROWTH POTENTIAL STARTUPS OPPORTUNITIES START -->
		@include('layout.newhomepage.high_growth_potential_startups_opportunities')
		<!-- HIGH GROWTH POTENTIAL STARTUPS OPPORTUNITIES END -->

	    <!-- Top Franchise Opportunities starts -->
        @include('layout.newhomepage.tfo')
        <!-- Top Franchise Opportunities ends -->
            <!-- Featured Franchise Companies starts -->
        @include('layout.newhomepage.ffc')

        <!-- Featured Franchise Companies ends -->
            <!-- News section starts -->
        @include('layout.newhomepage.newssection')

        <!-- News section ends -->
            <!-- Testimonial section starts -->
        @include('layout.newhomepage.testimonialsection')

        <!-- Testimonial section ends -->
            <!-- newsletter section starts -->
        @include('layout.newhomepage.newsletter')

        <!-- newsletter section ends -->
            <!-- about us -->
        @include('layout.newhomepage.aboutus')

        <!-- about us ends -->
            @include('layout.newhomepage.footersection')

        </main>
        @include('layout.newhomepage.footer')

    </div>
</div>
@enddesktop
<!-- Desktop Section End-->

<!-- Tablet Section Start-->
@tablet

<!-- Page Content  -->
<div id="content">
@include('layout.newhomepage.header')

<!-- HERO SECTION STARTS -->
@include('layout.newhomepage.herosection')

<!-- HERO SECTION EMDS -->
    <main class="main" id="main">
        <!-- CARD SECTION START  -->
    @include('layout.newhomepage.cardsection')

    <!-- CARD SECTION ENDS HERE -->
        <!-- COVID PROOF BUSINESS OPPORTUNITIES START  -->
    @include('layout.newhomepage.covidproof')

    <!-- COVID PROOF BUSINESS OPPORTUNITIES ENDS -->
        <!-- Best Franchise Opportunity starts -->
    @include('layout.newhomepage.bestfranchiseopportunity')

    <!-- Best Franchise Opportunity ends -->

	<!-- TOP DEALERSHIP OPPORTUNITIES START -->
	@include('layout.newhomepage.top_dealership_opportunities')
	<!-- TOP DEALERSHIP OPPORTUNITIES END -->

	<!-- BUSINESS FOR SALE OPPORTUNITIES START -->
	@include('layout.newhomepage.business_for_sale_opportunities')
	<!-- BUSINESS FOR SALE OPPORTUNITIES END -->

        <!-- Upcoming Events starts -->
    {{--@include('layout.newhomepage.upcomingevents')--}}
    @include('layout.newhomepage.videoevent')
    <!-- Upcoming Events ends -->
        <!-- Top International Opportunities starts -->
    @include('layout.newhomepage.topinternational')

    <!-- Top International Opportunities ends -->

	<!-- HIGH GROWTH POTENTIAL STARTUPS OPPORTUNITIES START -->
	@include('layout.newhomepage.high_growth_potential_startups_opportunities')
	<!-- HIGH GROWTH POTENTIAL STARTUPS OPPORTUNITIES END -->

        <!-- Top Franchise Opportunities starts -->
    @include('layout.newhomepage.tfo')

    <!-- Top Franchise Opportunities ends -->
        <!-- Featured Franchise Companies starts -->
    @include('layout.newhomepage.ffc')

    <!-- Featured Franchise Companies ends -->
        <!-- News section starts -->
    @include('layout.newhomepage.newssection')

    <!-- News section ends -->
        <!-- Testimonial section starts -->
    @include('layout.newhomepage.testimonialsection')

    <!-- Testimonial section ends -->
        <!-- newsletter section starts -->
    @include('layout.newhomepage.newsletter')

    <!-- newsletter section ends -->
        <!-- about us -->
    @include('layout.newhomepage.aboutus')

    <!-- about us ends -->
        @include('layout.newhomepage.footersection')

    </main>
    @include('layout.newhomepage.footer')

</div>
</div>
@endtablet
<!-- Tablet Section End -->
<!-- mobile section start -->
@mobile

<div id="content">
@include('layout.newhomepage.mobile.header')

<!-- HERO SECTION STARTS -->
{{--@include('layout.newhomepage.mobile.herosection')--}}
@include('layout.newhomepage.mobile.herosectionwithsearch')
<!-- HERO SECTION EMDS -->
    <main class="main" id="main">
        <!-- COVID PROOF BUSINESS OPPORTUNITIES START  -->
    @include('layout.newhomepage.mobile.covidproof')

    <!-- COVID PROOF BUSINESS OPPORTUNITIES ENDS -->
        <!-- Best Franchise Opportunity starts -->
    @include('layout.newhomepage.mobile.bfo')

    <!-- Best Franchise Opportunity ends -->

	<!-- TOP DEALERSHIP OPPORTUNITIES START -->
	@include('layout.newhomepage.top_dealership_opportunities')
	<!-- TOP DEALERSHIP OPPORTUNITIES END -->

	<!-- BUSINESS FOR SALE OPPORTUNITIES START -->
	@include('layout.newhomepage.business_for_sale_opportunities')
	<!-- BUSINESS FOR SALE OPPORTUNITIES END -->

        <!-- Upcoming Events starts -->
    @include('layout.newhomepage.mobile.upcomingevents')

    <!-- Upcoming Events ends -->

        <!-- Trend Video starts -->
    @include('layout.newhomepage.mobile.trendvideo')

    <!-- Trend Video ends -->
        <!-- Top International Opportunities starts -->
    @include('layout.newhomepage.mobile.topinternational')

    <!-- Top International Opportunities ends -->

	<!-- HIGH GROWTH POTENTIAL STARTUPS OPPORTUNITIES START -->
	@include('layout.newhomepage.high_growth_potential_startups_opportunities')
	<!-- HIGH GROWTH POTENTIAL STARTUPS OPPORTUNITIES END -->

    <!-- Top Franchise Opportunities starts -->
    @include('layout.newhomepage.mobile.tfo')

    <!-- Top Franchise Opportunities ends -->
        <!-- Featured Franchise Companies starts -->
    @include('layout.newhomepage.mobile.ffc')

    <!-- Featured Franchise Companies ends -->
        <!-- News section starts -->
    @include('layout.newhomepage.mobile.newssection')

    <!-- News section ends -->
        <!-- Testimonial section starts -->
    @include('layout.newhomepage.mobile.testimonial')

    <!-- Testimonial section ends -->
        <!-- newsletter section starts -->
    @include('layout.newhomepage.mobile.newsletter')

    <!-- newsletter section ends -->
        <!-- about us -->
    @include('layout.newhomepage.mobile.aboutus')

    <!-- about us ends -->
        @include('layout.newhomepage.footersection')

    </main>
    @include('layout.newhomepage.footer')

</div>
@endmobile

<!-- mobile section end -->
<div class="overlay"></div>
<script src="{{ url('/js/jquery-3.1.1.min.js') }}"></script>
@include('layout.newhomepage.jslink')

<script>
    $(document).ready(function() {
        function selectMax(selectmaxheaderval) {
            let amountConfigArr = '<?php echo json_encode(Config('constants.investRangeInWordsSingle')); ?>';

            let maxAmount = $('#maxAmount');
            let getSlugAmount = '<?php echo json_encode(Config('constants.InvestRange')); ?>';

            maxAmount.html("");
            selectmaxheaderval = parseInt(selectmaxheaderval);
            $.each(amountConfigArr, function (key, value) {
                if (key > selectmaxheaderval)
                    $('#maxAmount').append($("<option></option>").attr({
                        "value": key,
                        "slug": getSlugAmount[key]['min']
                    }).text(value));
            });
            if (selectmaxheaderval === 21)
                maxAmount.append($("<option></option>").attr("value", 21).text("Above"));
        }
    });
</script>
<script>
    function setCookie() {
        document.cookie = "accept_cookie=ok";
        $('#cookie').hide();
        const d = new Date();
        d.setTime(d.getTime() + (7*24*60*60*1000));
        let expires = "expires="+d.toUTCString();console.log(expires);
        document.cookie = "username=cookie_user;"+ expires + ";path=/";
    }

    function getCookie() {
        return checkCookie('accept_cookie');
    }

    function checkCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    $(document).ready(function() {
        var cookie = getCookie();
        if (cookie == 'ok') {
            $('#cookie').hide();
        } else {
            $('#cookie').show();
        }
    });
</script>
<script>
    //Awesomplete
    const input = document.getElementById('dealer-bar-search-top');

    // Init awesomplete
    const awesomplete = new Awesomplete(input);
    const navBarSearch = $("#dealer-bar-search-top");
    //navBarSearch.keypress(function () {
    navBarSearch.on('keypress keyup keypress blur change', function() {
        var search_keyword = $(this).val();
        // Check if atleast 2 chars are typed
        if (search_keyword.length >= 2) {
            $.ajax({
                url: '/dealers-search/' + search_keyword,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    prepareList(JSON.parse(JSON.stringify(response)));

                },
                error: function(err) {
                    console.log(err);

                }
            });
        }
    });

    function prepareList(list) {
        var c_list = [];

        list.forEach(item => {
            c_list.push(item.name);
    });

        // Assigned the c_list to the list property of Awesomplete instance
        awesomplete.list = c_list;
    }

    navBarSearch.on('awesomplete-selectcomplete', function() {
        if ($("#dealer-bar-search-top").val() != "") {
            var value = $("#dealer-bar-search-top").val();
            var items = value.split(' - <strong> in');
            if (items.length > 1)
                value = items[0];
            window.location.href = '/dealers-india/search/' + value;
        }
    });

    $("#textcompany").on('click', function() {
        if ($("#dealer-bar-search-top").val() != "") {
            var value = $("#dealer-bar-search-top").val();
            var items = value.split(' - <strong> in');
            if (items.length > 1)
                value = items[0];
            window.location.href = '/dealers-india/search/' + value;
        }
    });
</script>
<!-- Custom JS -->
<script type="text/javascript" src="{{url('newhomepage/assets/js/custom.js')}}"></script>
@if( !(!empty(request()->segment(2)) && request()->segment(1) == "brands" && isset(explode('.', request()->segment(2))[1]) && in_array(explode('.', request()->segment(2))[1], Config('constants.popupBrands')) ))
    @notmobile
    @php
        $expoPopup = 0;
        if (empty(Cookie::get('expoppoup17'))) {
        $expoPopup = 1;
        Cookie::queue("expoppoup17", 'RI2017', 120);
        }
        $ip    = $_SERVER['REMOTE_ADDR'];
        $query = "";
        $query = App\Http\Controllers\CommonController::getIpLocationState($ip);
        if(!empty($query))
        $query = strtolower($query);
		$southCodes = ['tamil nadu', 'telangana', 'kerala', 'pondicherry'];
        $eastCodes = ['bihar', 'jharkhand', 'odisha', 'nepal', 'arunachal pradesh', 'assam', 'meghalaya', 'orissa', 'tripura'];
        $westCodes  = ['goa', 'gujarat',  'rajasthan'];
        $northCodes  = ['punjab', 'jammu and kashmir', 'jammu', 'kashmir', 'himachal pradesh', 'chandigarh', 'uttarakhand', 'uttar pradesh', 'delhi', 'haryana'];
		$centerCodes = ['madhya pradesh', 'chhattisgarh', 'maharashtra'];
        $indiaCodes  = ['andhra pradesh', 'kerala', 'lakshadweep', 'pondicherry', 'telangana', 'tamil nadu', 'tamilnadu', 'uttar pradesh', 'rajasthan', 'haryana'];
        $GreenTrends  =  ['west bengal', 'karnataka', 'andhra pradesh'];

        App\Http\Controllers\CommonController::checkCampaignUrl();
    @endphp

    @if($expoPopup == 1 && request()->segment(1) != 'property-loan' && request()->segment(1) != 'myaccount' && request()->segment(1) != 'payment' && request()->segment(1) != 'mailer' && empty(request()->openpopup) && empty(request()->popup_lead))
		@if(in_array($query, $southCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfranchiseexpohyderabad')
                @endif
            @else
                @include('includes.banners.popupfranchiseexpohyderabad')
            @endif
		@elseif(in_array($query, $eastCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfranchiseexpodelhi')
                @endif
            @else
                @include('includes.banners.popupfranchiseexpodelhi')
            @endif

		@elseif(in_array($query, $westCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfranchiseexpodelhi')
                @endif
            @else
                @include('includes.banners.popupfranchiseexpodelhi')
            @endif

		@elseif(in_array($query, $northCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfranchiseexpodelhi')
                @endif
            @else
                @include('includes.banners.popupfranchiseexpodelhi')
            @endif

		@elseif(in_array($query, $centerCodes))
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfranchiseexpodelhi')
                @endif
            @else
                @include('includes.banners.popupfranchiseexpodelhi')
            @endif

		@else
            @if(request()->segment(1) == 'brands')
                @if($franDetails->membership_type != 1)
                    @include('includes.banners.popupfranchiseexpodelhi')
				@endif
			@else
		        @include('includes.banners.popupfranchiseexpodelhi')
			@endif
		@endif
    @endif
    <!-- popupmag Start of franchiseindia Zendesk Widget script  popupmag -->
    @endnotmobile
@endif

		<!--<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=a76a1630-c68b-4165-b6f1-ef96b178c0c3"></script> -->



<!-- End of franchiseindia Zendesk Widget script -->
{{--@include('includes.exit-popup')--}}

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '865253970178641');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=865253970178641&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<script>
    $(document).ready(function($) {
        $('#myCarouselvideo').carousel({
            pause: true,
            interval: false
        });
    });
</script>

<script>
    $(function(){
        // bind change event to select
        $('#language-changer').on('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });
</script>

</body>
</html>
