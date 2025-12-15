@php
use Illuminate\Support\Str;
@endphp

<ul class="runnerbrad pad20"><li><a href="{{url('/')}}">Franchise</a></li><li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
    @if( Str::contains(URL::current(), '/business-opportunities/all/all'))
    <li>Business Opportunities</li>
@else
    <li><a href="{{url('/')}}/business-opportunities/all/all">Business Opportunities</a></li>
@endif
    @if($catName != 'Business Opportunities')
        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
        </li><li>{{$catName}}</li>
    @endif
</ul>
@php
// dd(URL::current());
if(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-100000')
$h1 = 'Business opportunities under 1 lakh investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-200000')
$h1 = 'Business opportunities under 2 lakhs investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-300000')
$h1 = 'Business opportunities under 3 lakhs investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-500000')
$h1 = 'Business opportunities under 5 lakhs investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-1000000')
$h1 = 'Business opportunities under 10 lakhs investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-1500000')
$h1 = 'Business opportunities under 15 lakhs investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-2000000')
$h1 = 'Business opportunities under 20 lakhs investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-2500000')
$h1 = 'Business opportunities under 25 lakhs investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-3000000')
$h1 = 'Business opportunities under 30 lakhs investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-5000000')
$h1 = 'Business opportunities under 50 lakhs investment';
elseif(URL::current() ==  Config('constants.MainDomain') . '/business-opportunities/business/range-10000-10000000')
$h1 = 'Business opportunities under 1 crore investment';
elseif(URL::current() == Config('constants.MainDomain') .'/category/search'){
    // @dd(URL::current());
$url = URL::full();
$parsedUrl = parse_url($url);
$path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
$segments = explode('/', trim($path, '/'));
$searchText = request()->query('text');
   if(!$searchText){
    $h1 = 'Business opportunities';
   }
   else{
    $h1 = 'Business/Franchise Opportunities Results For '. $searchText ;
   }
// dd($searchText);
}
else{
    $h1 = 'Business opportunities in '.$catName ;
}

// @dd($h1);

if (strpos($seoTitle, "- Franchise India") !== false){
$_h1 = explode('- Franchise India',$seoTitle);
$h1 = $_h1[0];
}
$chk_homebased = !empty($chk_homebased)? $chk_homebased : 0;
    $gcodeurl = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
@endphp
@php
    function formatIndianCurrencyinnumbers($number) {
        if ($number >= 10000000) {
            // Format to Crores (1 Cr = 10,000,000)
            return number_format($number / 10000000, 3) . ' Cr';
        } elseif ($number >= 100000) {
            // Format to Lakhs (1 Lakh = 100,000)
            return number_format($number / 100000, 3) . ' Lakh';
        } elseif ($number >= 1000) {
            // Format to Thousands (1 K = 1,000)
            return number_format($number / 1000, 3) . ' K';
        } else {
            return $number;
        }
    }
@endphp
@php
    $formattedValue = formatIndianCurrencyinnumbers($maxRangevalue); // Example value: 33769507
@endphp
<link rel=stylesheet href="{{ url('awesomplete/awesomplete.css')}}">
@php
    $catArr = $catArr ?? collect();  // Set $popup to an empty collection if it's not set
    // dd($catArr);
@endphp
@if ($catArr !== '')
        <div class="row pad20 row-no-margin">
            <div class="col-xs-12 col-sm-6 col-md-7 row-no-padding">
                <div class="haeding">
                    {{-- Pankaj start for cat+investment --}}
                        @if($mc !== 5)
                        {{-- First Case: When $maxRangevalue is not empty --}}
                            @if(!empty($maxRangevalue) && empty($loc) && $minRangeValue !== 0 && $maxRangevalue !==100000000)
                                <h1>{{'Business Opportunities in ' . $catArr->catname .' under ' . $formattedValue }}</h1> 
                                {{-- Second Case: When both $maxRangevalue and $loc are not empty --}}
                                @elseif(!empty($maxRangevalue) && !empty($loc) && $minRangeValue !== 0 && $maxRangevalue !==100000000)
                                    @php
                                        $stateId = $loc[0];
                                        $stateName = Config::get("location.stateArr.$stateId");
                                    @endphp
                                    <h1>{{'Business Opportunities in ' . $catArr->catname .' under ' . $formattedValue . ' in ' . $stateName . ', India'}}</h1> 
                                @endif
                            @endif
                        {{-- /// Start For Dealer cat+investment rane --}}
                        @if($mc == 5)
                        {{-- First Case: When $maxRangevalue is not empty --}}
                            @if(!empty($maxRangevalue) && empty($loc) && $minRangeValue !== 0 && $maxRangevalue !==100000000 )
                                <h1>{{'Dealership & Distributorship in ' . $catArr->catname .' under ' . $formattedValue }}</h1> 
                                {{-- Second Case: When both $maxRangevalue and $loc are not empty --}}
                            @elseif(!empty($maxRangevalue) && !empty($loc) && $minRangeValue !== 0 && $maxRangevalue !==100000000)
                                @php
                                    $stateId = $loc[0];
                                    $stateName = Config::get("location.stateArr.$stateId");
                                @endphp
                            <h1>{{'Dealership & Distributorship in ' . $catArr->catname .' under ' . $formattedValue . ' in ' . $stateName . ', India'}}</h1> 
                        @endif
                        @endif
                        @if($mc == 5  && !empty($loc) && $minRangeValue == 0 && $maxRangevalue ==100000000)
                            @php
                            $stateId = $loc[0];
                            $stateName = Config::get("location.stateArr.$stateId");
                            @endphp
                            <h1>{{'Dealership & Distributorship in ' . $catArr->catname . ' in ' . $stateName }}</h1> 
                        @elseif($mc !== 5  && !empty($loc) && $minRangeValue == 0 && $maxRangevalue ==100000000)
                        {{-- @dd($formattedValue); --}}
                            @php
                            $stateId = $loc[0];
                            $stateName = Config::get("location.stateArr.$stateId");
                            @endphp
                            @isset($catArr->catname)
                            <h1>{{ 'Business Opportunities in ' . $catArr->catname . ' in ' . $stateName }}</h1>
                        {{-- @elseif(request()->is('business-opportunities/ladakh.LOC36'))
                            <h1>Business Opportunities in Ladakh</h1> --}}
                        @else
                            <h1>{{ 'Business Opportunities in ' . $stateName }}</h1>
                        @endisset
                        {{-- <h1>{{'Buseiness Opportunities in ' . $catArr->catname . ' in ' . $stateName }}</h1>  --}}
                        @endif

                        {{-- @dd($minRangeValue); --}}
                        @if($mc == 5 && $minRangeValue == "" && $maxRangevalue == "" )
                        <h1>Dealership & Distributorship Opportunities in  {{$catName}}</h1>
                        @elseif($mc !== 5 && $minRangeValue == "" && $maxRangevalue == "" )
                        <h1>Business Opportunities in {{$catName}}</h1>
                        @endif
                    {{-- ///End For Dealer cat+investment rane --}}
                    {{-- Pankaj end for cat+investment --}}
                    @if($mc === 2)
                    <h1>Food and Beverage - Business Ideas and Franchise Opportunities</h1> 
                    @else
                    {{-- <h1>{{($chk_homebased == 0)? $h1 : 'Home Based ' . $h1 .' Business'}}</h1> --}}
                {{-- <h1>Business Opportunities in {{$catName}}</h1> --}}
                    @endif 
                    <span class="shorttxt">(Showing {{$brandResults->firstItem()}} - {{$brandResults->lastItem()}} Opportunities of {{$brandResults->total()}} Opportunities)</span></div>
                    
            </div>
            
            <div class="col-xs-12 col-sm-3 col-md-3 row-no-padding catmleft">
                <div class="form-group posrelv">
                    <form method="get" action="{{Config('constants.MainDomain')}}/category/search">
                        <input type="text" name="text" class="form-control" id="dealer-bar-search" placeholder="Start Search">
                        <span id="textcompany" class="catseaicon"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
                    </form>
                </div>
            </div>

        
            <div class="col-xs-12 col-sm-3 col-md-2 row-no-padding">
                <select name="sortby" id="fetchDataBtn"  class="form-control myselectclasscat" >
                    <option value="x" selected="selected">Sort By</option>
                    <option value="1" @if($orderby == 1) selected @endif>Most Recent</option>
                    <option value="2" @if($orderby == 2) selected @endif>Alphabetical Order</option>
                    <option value="3" @if($orderby == 3) selected @endif>Most Popular</option>
                </select>
            </div>
            
        </div>


@else        
<div class="row pad20 row-no-margin">
    <div class="col-xs-12 col-sm-6 col-md-7 row-no-padding">
        <div class="haeding">
            @if($mc === 2)
            <h1>Food and Beverage - Business Ideas and Franchise Opportunities</h1> 
            @else
            <h1>{{($chk_homebased == 0)? $h1 : 'Home Based ' . $h1 .' Business'}}</h1>
            <!-- <h1>Business Opportunities in {{$catName}}</h1> -->
            @endif
            <span class="shorttxt">(Showing {{$brandResults->firstItem()}} - {{$brandResults->lastItem()}} Opportunities of {{$brandResults->total()}} Opportunities)</span></div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3 row-no-padding catmleft">
        <div class="form-group posrelv">
            <form method="get" action="{{Config('constants.MainDomain')}}/category/search">
                <input type="text" name="text" class="form-control" id="dealer-bar-search" placeholder="Start Search">
                <span id="textcompany" class="catseaicon"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </form>
        </div>
    </div>
    {{-- <div class="col-xs-12 col-sm-3 col-md-2 row-no-padding">
        <select name="sortby" id="sortbynew" class="form-control myselectclasscat" onchange="changeFunction();">
            <option value="x" selected="selected">Sort By</option>
            <option value="1" @if($orderby == 1) selected @endif>Most Recent</option>
            <option value="2" @if($orderby == 2) selected @endif>Alphabetical Order</option>
            <option value="3" @if($orderby == 3) selected @endif>Most Popular</option>
        </select>
    </div> --}}
  
    <div class="col-xs-12 col-sm-3 col-md-2 row-no-padding">
        <select name="sortby" id="fetchDataBtn"  class="form-control myselectclasscat" >
            <option value="x" selected="selected">Sort By</option>
            <option value="1" @if($orderby == 1) selected @endif>Most Recent</option>
            <option value="2" @if($orderby == 2) selected @endif>Alphabetical Order</option>
            <option value="3" @if($orderby == 3) selected @endif>Most Popular</option>
        </select>
    </div>
    
</div>
@endif
{{-- 
<div id="renderedData">
    <div class="data-item">
        <h3 class="company-name">Company Name</h3>
        <p class="franchisor-id">Franchisor ID: 12345</p>
    </div>
</div>

<div  id="renderedData">
    <p class="myid">test</p>
</div> --}}

<style>
    #loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999; /* Ensure it appears above other content */
}

/* Spinner styles */
.spinner {
    width: 50px;
    height: 50px;
    border: 5px solid rgba(255, 255, 255, 0.3);
    border-top: 5px solid white; /* Color of the spinning bar */
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Spinner animation */
@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>

<div id="loader" style="display: none;">
    <div class="spinner"></div>
</div>

<script>
    var shuffledResults = @json($shuffledResults);

    $(document).ready(function () {
        $('#fetchDataBtn').change(function () {
            var sortby = $(this).val();

            // Show the loader
            $('#loader').show();
            $('#renderedData').empty(); // Clear the current data while loading

            $.ajax({
                url: '/fetch-data', // The URL to call
                type: 'POST', // Method type
                data: {
                    sortby: sortby,
                    shuffledResults: shuffledResults // Pass the dataset
                },
                dataType: 'json', // Expecting JSON response
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for security
                },
                success: function (response) {
                    console.log('Response:', response);

                    // Hide the loader after data is rendered
                    $('#loader').hide();

                    // Check if response is empty
                    if (response.length === 0) {
                        $('#renderedData').html('<p>No data available.</p>');
                    } else {
                        $('#renderedData').html(response.html);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    
                    // Hide the loader even on error
                    $('#loader').hide();
                }
            });
        });
    });
</script>
