
    @foreach ($shuffledResults as $brandResult)
        <!-- category list section start here-->
        @php
            $brandUrl = sprintf(
                Config('constants.brandPagePattern'),
                Config('constants.MainDomain'),
                $brandResult->profile_name,
                $brandResult->fran_detail_id,
            );  
            $is_premium = 0;
            $imgCount = 0;
            $SubCatName = '';
            $noImage = 'https://www.franchiseindia.com/images/no-img.gif';
            $image = $noImage;
            $brandImagepath = Config('constants.franAwsImgPath') . $brandResult->company_logo;
            $minValue = $brandResult->unit_inv_min;
            $area = '-N/A-';
            if (is_numeric($minValue)) {
                if ($minValue < 100000 && $minValue > 10000) {
                    $minValue = substr($minValue / 1000, 0, 5) . ' K';
                } elseif ($minValue <= 9999999 && $minValue > 100000) {
                    $minValue = substr($minValue / 100000, 0, 5) . ' Lakh';
                } elseif ($minValue > 9999999) {
                    $minValue = substr($minValue / 10000000, 0, 5) . ' Cr';
                }
            }
            $maxValue = $brandResult->unit_inv_max;
            if (is_numeric($maxValue)) {
                if ($maxValue < 100000 && $maxValue > 10000) {
                    $maxValue = substr($maxValue / 1000, 0, 5) . ' K';
                } elseif ($maxValue <= 9999999 && $maxValue > 100000) {
                    $maxValue = substr($maxValue / 100000, 0, 5) . ' Lakh';
                } elseif ($maxValue > 9999999) {
                    $maxValue = substr($maxValue / 10000000, 0, 5) . ' Cr';
                }
            }
            $priceRange = "INR $minValue - $maxValue ";
            if (empty($brandResult->company_logo)) {
                $brandImagepath = $noImage;
            }
            foreach (Config('constants.subSubCategoryArr') as $key => $abc) {
                if (array_key_exists($brandResult->ind_sub_cat, $abc)) {
                    $SubCatName = $abc[$brandResult->ind_sub_cat];
                }
            }
            // foreach ($franImageData as $imgData) {
            //     if ($imgData->franchisor_id == $brandResult->franchisor_id) {
            //         $image = $imgData->image_type_slider2;
            //         $is_premium = 1;
            //         $imgCount = $imgData->count;
            //     }
            // }
            if (!empty($brandResult->prop_area_max)) {
                $area = $brandResult->prop_area_min . ' - ' . $brandResult->prop_area_max;
            }
            if (empty($brandResult->prop_area_max)) {
                $area = $brandResult->prop_area_min;
            }
            if (empty($brandResult->prop_area_min)) {
                $area = '-N/A-';
            }
            $likes = 0;
            $rate = 0;

            if (!empty($brandResult->franchisorLike)) {
                $likes = $brandResult->franchisorLike->blike;
                if (
                    $brandResult->franchisorLike->brate != 0 &&
                    $brandResult->franchisorLike->bclick != 0
                ) {
                    $rate =
                        $brandResult->franchisorLike->brate / $brandResult->franchisorLike->bclick;
                    $rate = round($rate, 1);
                }
                // dd($rate);
            }
        @endphp
        

        @if ($brandResult->membership_type == 1 || $brandResult->free_logo_visibility == 1)

            @include('ssr.paidbrand')

           

            {{-- @php
                $banner++;
                $i++;
            @endphp --}}
        @elseif($brandResult->membership_type == 0)
            @php
                $flag = 1;
            @endphp
            @if ($i % 2 != 0)
                <div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding">
                    @desktop
                        <div class="dfp_240X400">
                            {{-- <div id='div-gpt-ad-1504794961823-0' style='height:400px; width:240px; margin:0 auto;'></div> --}}
                            <!-- /1057625/FIHL/Desktop_Category_240x400_Mid_1-->
                            <div id='adslot240x400_Mid_{{ $flag }}'
                                style='height:400px; width:240px; margin:0 auto;'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot240x400_Mid_{{ $flag }}');
                                    });
                                </script>
                            </div>
                        </div>
                    @enddesktop
                    @tablet
                        <div class="dfp_240X400">
                            {{-- <div id='div-gpt-ad-1504794961823-0' style='height:400px; width:240px; margin:0 auto;'></div> --}}
                            <!-- /1057625/FIHL/Desktop_Category_240x400_Mid_1-->
                            <div id='adslot240x400_Mid_{{ $flag }}'
                                style='height:400px; width:240px; margin:0 auto;'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot240x400_Mid_{{ $flag }}');
                                    });
                                </script>
                            </div>
                        </div>
                    @endtablet
                    @mobile
                        <div class="dfp_300X250">
                            {{-- <div id='div-gpt-ad-1504794961823-0' style='height:400px; width:240px; margin:0 auto;'></div> --}}
                            <!-- /1057625/FIHL/Desktop_Category_240x400_Mid_1-->
                            <div id='adslot300X250_Mid_{{ $flag }}'
                                style='height:300px; width:250px; margin:0 auto;'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('adslot300X250_Mid_{{ $flag }}');
                                    });
                                </script>
                            </div>
                        </div>
                    @endmobile

                </div>
                @php
                    $flag++;
                    $i = $i + 1;
                @endphp
            @endif

            @if ($longbanner == 0)
                @if ($i > 1)
                    <div class="row row-no-margin borderbd padtb20 catbannertop">
                        @desktop
                            <div class="yahoo_728X90">

                                <!-- /1057625/FIHL/Desktop_Category_728x90_Mid_1-->
                                <div id='adslot728x90_Mid_1' style='height:90px; width:728px;'>
                                    <script>
                                        googletag.cmd.push(function() {
                                            googletag.display('adslot728x90_Mid_1');
                                        });
                                    </script>
                                </div>
                            </div>
                        @enddesktop
                        @mobile
                            <div class="yahoo_cat_468X60">
                                {{-- <div id='div-gpt-ad-1563348795825-2' style='width: 300px; height: 250px;'></div> --}}
                                <!-- /1057625/FIHL/Desktop_Category_300x250_Mid_3-->
                                <div id='adslot300x250_Mid_1' style='width: 300px; height: 250px;'>
                                    <script>
                                        googletag.cmd.push(function() {
                                            googletag.display('adslot300x250_Mid_3');
                                        });
                                    </script>
                                </div>
                            </div>
                            {{-- <div class="yahoo_cat_468X60"> --}}
                            {{-- <div id="div-gpt-ad-1536149771913-0" style='height:60px; width:468px;'></div> --}}
                            {{-- </div> --}}
                            {{-- <div class="yahoo_300X250cat"> --}}
                            {{-- <div id="div-gpt-ad-1531467713014-0" style='height:250px; width:300px;'></div> --}}
                            {{-- </div> --}}
                        @endmobile
                    </div>
                @endif
                @php
                    $longbanner++;
                @endphp
            @endif

         

            @include('category.free-brand')

          
        @endif
    @endforeach
    <div class="pagination">
            {{ $shuffledResults->links('vendor.pagination.ajax') }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Intercept pagination clicks
            $(document).on('click', '.pagination a', function(event) {
    $('#loader').show();

                event.preventDefault();
                var url = $(this).attr('href'); // Get the URL of the next page
                getItems(url);
            });

            // Function to fetch items using AJAX
            function getItems(url) {
                $.ajax({
                    url: url,
                    type: 'get',
                    success: function(response) {
                        $('#items-list').html(response.html); // Update the items list with new data
    $('#loader').hide();

                    },
                    error: function(xhr, status, error) {
                        console.log('Error loading items:', error);
    $('#loader').hide();

                    }
                });
            }
        });
    </script>
