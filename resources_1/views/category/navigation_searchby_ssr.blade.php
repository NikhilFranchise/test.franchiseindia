
<link rel=stylesheet href="{{ url('awesomplete/awesomplete.css')}}">
<div class="row pad20 row-no-margin">
    <div class="col-xs-12 col-sm-6 col-md-7 row-no-padding">
        <div class="haeding">
            {{-- @if($mc === 2)
            <h1>Food and Beverage - Business Ideas and Franchise Opportunities</h1> 
            @else
            <h1>{{($chk_homebased == 0)? $h1 : 'Home Based ' . $h1 .' Business'}}</h1>
            <!-- <h1>Business Opportunities in {{$catName}}</h1> -->
            @endif --}}
            {{-- <span class="shorttxt">(Showing {{$brandResults->firstItem()}} - {{$brandResults->lastItem()}} Opportunities of {{$brandResults->total()}} Opportunities)</span></div> --}}
            <h1>Business Opportunities </h1>
            <span class="shorttxt">(Showing 1 - 21  Opportunities of 100 Opportunities)</span></div>
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
            <option value="1"  >Most Recent</option>
            <option value="2"  >Alphabetical Order</option>
            <option value="3" >Most Popular</option>
        </select>
    </div>
    
</div>

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
                url: '/fetch-data2', // The URL to call
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
                    shuffledResults = [];

                    // Hide the loader after data is rendered
                    $('#loader').hide();

                    // Check if response is empty
                    if (response.length === 0) {
                        $('#renderedData1').html('<p>No data available.</p>');
                    } else {
                        $('#renderedData1').html(response.html);
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
