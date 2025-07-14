@extends('layout.master')
@push('styles')
    <link rel="stylesheet" href="{{ url('/css/top200.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
@endpush
@section('content')
    <div class="loadman" id="loading" style="display:none">
        <div class="thanku">
            <div class="tbl-cell">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <div class="container formsection margintop60 staicp">

        <div class="top-hundred">
            <br>
            <h1 id="ftype_with_year">{{ $franchiseType == 'top-100' ? 'Top 100' : 'Top 200' }} Franchise 2025</h1>
            <p>Revealing brand impact, consumer value, and dynamic opportunities. Explore trends in Indian franchises,
                including global giants and emerging innovators. Rankings consider financial strength, expansion, growth
                rate, and success, reflecting a distinct identity, robust planning, support, innovation, and cultural
                sensitivity. This analysis assists franchisees and franchisors alike, offering insights into the franchise
                sector that underpin thriving business ventures.</p>

            <div data-target="#topFranchise" data-toggle="modal" class="crit">Understand Selection Criteria</div>
        </div>
        <div class="top-two-hundred-wrap">
            <div class="row">
                <div class="col-md-3 mstick">
                    <div class="filter-wrapper">
                        <div class="filter-head">Filter & Sort <span class="fmob"><img
                                    src="{{ url('/images/topfranchiseleaders/mtoggle.png') }}" alt=""></span></div>
                        <div class="filter-brand-apply">
                            <span class="mcloser"><img src="{{ url('/images/topfranchiseleaders/mcloser.png') }}"
                                    alt=""></span>
                            <div class="flabel lfirst"><img src="{{ url('/images/topfranchiseleaders/dates.png') }}"
                                    class="date"> Sort By
                                Year</div>
                            <select id="yearSelect" class="form-controls">
                                @foreach ($years as $item)
                                    <option value="{{ $item->franchisor_year }}"
                                        {{ $item->franchisor_year == $year ? 'selected' : '' }}>
                                        {{ $item->franchisor_year }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="flabel">Franchise Type</div>
                            <select id="ftypeSelect" class="form-controls">
                                <option value="{{ $franchiseType }}">
                                    {{ $franchiseType == 'top-100' ? 'Top 100' : 'Top 200' }}
                                </option>
                            </select>
                            <div class="flabel"><img src="{{ url('/images/topfranchiseleaders/filter.png') }}"
                                    class="filter">
                                Sort
                                By
                            </div>
                            <div class="main-filter-apply">

                                <div class="sort-row">
                                    <label for="alphabetical">A-Z</label>
                                    <input type="radio" name="sortBy" id="alphabetical" value="alphabetical">
                                </div>
                                <div class="sort-row">
                                    <label for="investMin">Low to High $</label>
                                    <input type="radio" name="sortBy" id="investMin" value="investMin">
                                </div>
                                <div class="sort-row">
                                    <label for="investMax">High to Low $</label>
                                    <input type="radio" name="sortBy" id="investMax" value="investMax">
                                </div>
                                <hr>
                                <div class="sort-row">
                                    <label for="25">Display 25 Results</label>
                                    <input type="radio" name="limit" id="25" value="25" checked>
                                </div>


                                <div class="sort-row">
                                    <label for="50">Display 50 Results</label>
                                    <input type="radio" name="limit" id="50" value="50">
                                </div>

                                <div class="sort-row">
                                    <label for="100">Display 100 Results</label>
                                    <input type="radio" name="limit" id="100" value="100">
                                </div>
                                {{-- <div class="sort-row">
                                    <label for="150">Display 150 Results</label>
                                    <input type="radio" name="limit" id="150" value="150">
                                </div> --}}
                                <div class="sort-row">
                                    <label for="200">Display 200 Results</label>
                                    <input type="radio" name="limit" id="200" value="200">
                                </div>
                            </div>
                            <div class="flabel"><img src="{{ url('/images/topfranchiseleaders/industry.png') }}"
                                    class="industry">
                                Industry</div>
                            @php
                                $categoryArr = Config('constants.CategoryArr');
                                asort($categoryArr);

                            @endphp
                            <select class="form-controls" name="industry_type" id="industry_type">
                                <option value="" selected>Select Industry</option>
                                @foreach ($categoryArr as $key => $catArr)
                                    <option value="{{ $key }}" slug="{{ Str::slug($catArr) }}">
                                        {{ $catArr }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="flabel"><img src="{{ url('/images/topfranchiseleaders/investment.png') }}"
                                    class="investment">
                                Investment Range</div>
                            <select class="form-controls pricings" id="investment_range" name="investment_range">
                                <option value="">Select Investment Range</option>
                                l
                                <option value="1">Rs. 10000 - 50000</option>
                                l
                                <option value="3">Rs. 50000 - 2 Lakh</option>
                                l
                                <option value="5">Rs. 2 Lakh - 5 Lakh</option>
                                l
                                <option value="7">Rs. 5 Lakh - 10 Lakh</option>
                                l
                                <option value="9">Rs. 10 Lakh - 20 Lakh</option>
                                l
                                <option value="11">Rs. 20 Lakh - 30 Lakh</option>
                                l
                                <option value="13">Rs. 30 Lakh - 50 Lakh</option>
                                l
                                <option value="15">Rs. 50 Lakh - 1 Cr</option>
                                l
                                <option value="17">Rs. 1 Cr - 2 Cr</option>
                                l
                                <option value="19">Rs. 2 Cr - 5 Cr</option>
                                l
                                <option value="21">Rs. 5 Cr above</option>
                            </select>
                            <button class="btn btn-primary" onclick="window.location.href='{{ url()->current() }}'">Reset
                                Filters</button>

                        </div>
                    </div>



                </div>



                <!--- Get Free Info stickely start here  -->
                @if (!Auth::check() || Auth::user()->profile_type == 1 || Auth::user()->mobile == '')
                    <div id="getFreeInfo" class="ttl-brnd-list">
                        <span class="count">0</span>Brands in my List
                        <a href="#" data-toggle="modal" data-target="#modalGetFree"
                            id="getfreewindowstate">Request
                            Now</a>
                    </div>
                @else
                    <div id="getFreeInfo" class="ttl-brnd-list">
                        <div class="popblkbtm">
                            <div class="blkpop"> <span class="count">0</span>Brands in my List </div>
                            <form method="post" action="{{ URL('multipleInvFreeinfo') }}">
                                <input type="hidden" name="franchisors" id="franchisorsForInv">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="brandRequest" value="Apply Now" />
                            </form>
                        </div>
                    </div>
                @endif
                <!--- Get Free Info stickely end here  -->

                <div class="col-md-9">
                    @include('category.free-info')
                    <div class="buttons">
                        <span id="recordCount">{{ $count }} RESULTS OF
                            {{ $totalCount + count(config('staticBrands.staticBrands')) }}</span>
                        <div class="list"><i class="fa fa-list"></i></div>
                        <div class="grid"><i class="fa fa-th-large"></i></div>
                    </div>
                    <div class="wrapper" id="wrapper">
                        @include('static.topfranchiseleaders.dynamicData')
                    </div>
                    {{-- @if ($count > 25)
                        <div class="bottom-btns"><button id="loadmore">More Results</button></div>
                    @endif --}}
                </div>
            </div>
        </div>
        @include('static.topfranchiseleaders.businessHotspot')
        <script type="text/javascript">
            var wrapper = document.getElementById("wrapper");

            // Set default view to list
            wrapper.classList.add("list");

            document.addEventListener("click", function(event) {
                if (event.target.matches(".list")) {
                    event.preventDefault();
                    wrapper.classList.add("list");
                }

                if (event.target.matches(".grid")) {
                    event.preventDefault();
                    wrapper.classList.remove("list");
                }
            });
        </script>
        <!--TOP 200 FRANCHISE -->
        <script>
            $(document).ready(function() {
                let isLoading = false;
                let getfreecount = 0; // Initialize the counter
                let staticCount = '{{ count(config('staticBrands.staticBrands')) }}';

                function fetchData() {
                    if (isLoading) return;
                    isLoading = true;

                    let selectedYear = $("#yearSelect").val();
                    let selectedSort = $('input[name="sortBy"]:checked').val();
                    let filterLimit = $('input[name="limit"]:checked').val();
                    let selectedIndustry = $("#industry_type").val();
                    let selectedInvestment = $("#investment_range").val();
                    let brandCount = 0; // Initialize brand count
                    // alert(filterLimit + '-' + selectedSort);
                    $("#loading").show(); // Show loader

                    $.ajax({
                        url: "{{ route('filterFranchisorsByYear') }}",
                        type: "GET",
                        dataType: "json",
                        data: {
                            year: selectedYear,
                            filterType: selectedSort,
                            filterLimit: filterLimit,
                            industry: selectedIndustry,
                            investmentRange: selectedInvestment,

                        },
                        success: function(response) {
                            $("#wrapper").html(response.html);
                            console.log(response.count, response.totalCount, response.year, response
                                .franchisor_type);
                            if (response.year == 2025 && response.count != response.totalCount) {
                                // alert('if');
                                $("#recordCount").text(response.count + " RESULTS OF " + (response
                                    .totalCount + parseInt(staticCount)));
                            } else if (response.count == response.totalCount && response.year == 2025) {
                                // alert('else if');
                                $("#recordCount").text((response.count + parseInt(staticCount)) +
                                    " RESULTS OF " + (response.totalCount + parseInt(staticCount)));
                            } else {
                                // alert('else');
                                $("#recordCount").text(response.count + " RESULTS OF " + response
                                    .totalCount);
                            }

                            if (response.franchisor_type) {
                                $("#ftypeSelect").html(
                                    `<option value="${response.franchisor_type}">
                            ${response.franchisor_type === "top-100" ? "Top 100" : "Top 200"}
                        </option>`
                                );
                                const franchiseYear = $('#yearSelect').val();
                                const franchiseLabel = response.franchisor_type === "top-100" ? "Top 100" :
                                    "Top 200";
                                // Update the heading
                                $('#ftype_with_year').html(`${franchiseLabel} Franchise ${franchiseYear}`);

                            }

                            $("#loading").hide();
                            isLoading = false;

                            reinitializeCheckboxEvents(); // Rebind events after filter update
                            updateGetFreeCount(); // Recalculate checkbox count
                        },
                        error: function(xhr) {
                            console.log("Error:", xhr.responseText);
                            $("#wrapper").html(
                                '<div class="text-danger text-center">Failed to load data. Please try again.</div>'
                            );
                            $("#loading").hide();
                            isLoading = false;
                        }
                    });
                }

                function updateGetFreeCount() {
                    getfreecount = $("input[name='getFreeInfo']:checked").length;

                    if (getfreecount >= 4) {
                        $(".filter-list-brand input[type='checkbox']:not(:checked)").prop("disabled", true);
                    } else {
                        $(".filter-list-brand input[type='checkbox']:not(:checked)").prop("disabled", false);
                    }

                    $("#getFreeInfo .count").html(getfreecount);
                }

                function reinitializeCheckboxEvents() {
                    $(document).off("click", ".filter-list-brand input[type='checkbox']").on("click",
                        ".filter-list-brand input[type='checkbox']",
                        function() {
                            let selectedIds = [];
                            let selectedHtml = "";

                            if ($(this).is(":checked")) {
                                getfreecount++;
                            } else {
                                getfreecount--;
                            }

                            updateGetFreeCount();

                            $("input[name='getFreeInfo']:checked").each(function() {
                                let brandId = $(this).attr("id");
                                let brandName = $("#brandnamecategory" + brandId).html();
                                let brandInvestment = $("#brandinvestment" + brandId).html();

                                selectedHtml += `
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="business-detail">
                        <div class="business-name">${brandName}</div>
                        <div class="business-val">${brandInvestment}</div>
                    </div>
                </div>
            `;
                                selectedIds.push(brandId);
                            });

                            $("#companyblockrequest").html(selectedHtml);
                            $("#freeinfovalue").val(selectedIds.join(","));
                            $(".brandCompareCheckbox").prop("disabled", getfreecount !== 0);
                        });
                }

                // Event listeners for filter changes
                $("#yearSelect, input[name='sortBy'], input[name='limit'], #industry_type, #investment_range").on(
                    "change",
                    function() {
                        fetchData();
                    });

                // Initialize checkbox events on page load
                reinitializeCheckboxEvents();
            });

            function getcityinfo(value) {
                $.ajax({
                    type: 'GET',
                    url: '/getcitylist',
                    data: {
                        state: value
                    },
                    success: function(data) {
                        $("#getinfocity").html(data);
                    }
                });
            }

            $(".fmob").click(function() {
                $(".filter-brand-apply").toggleClass('fshow');
            });
            $(".mcloser").click(function() {
                $(".filter-brand-apply").toggleClass('fshow');
            });
        </script>
    @endsection
