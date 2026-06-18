@if( $franDetails->is_detailed_manuals == 1 || !empty($franDetails->franchise_training_loc) || $franDetails->is_field_assistance == 1 || $franDetails->ho_assistance == 1 || $franDetails->is_it_support == 1  )
    @if($franDetails->looking_franchise == 1)
        <div id="training_tab" class="tab-section">
            <!--<h3 class="tab-sec-ttl">Training Details</h3>-->
			<h2 class="tab-sec-ttl">{{$franDetails->company_name}} Franchise Training</h2>
            <div class="tab-sec-topics">
                <div class="keypoints">
                    @if($franDetails->is_detailed_manuals == 1)
                        <p>
                            Detailed operating manuals for {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "dealerships" : "franchisees" }}
                            <span class='pull-right fnone'> Yes </span>
                        </p>
                    @endif

                    @if(!empty($franDetails->franchise_training_loc))
                        <p>
                            {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "Dealership" : "Franchisee" }} training location
                            <span class='pull-right fnone'>
                                {{$franDetails->franchise_training_loc}}
                            </span>
                        </p>
                    @endif

                    @if($franDetails->is_field_assistance == 1)
                        <p>
                            Is field assistance available for {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "Dealership" : "franchisee" }} ?
                            <span class='pull-right fnone'> Yes </span>
                        </p>
                    @endif

                    @if($franDetails->ho_assistance == 1)
                        <p>
                            Expert guidance from Head Office to franchisee in opening the {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "dealership" : "franchise" }}
                            <span class='pull-right fnone'> Yes </span>
                        </p>
                    @endif

                    @if($franDetails->is_it_support == 1)
                        <p>
                            Current IT systems will be included in the {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "dealership" : "franchise" }}
                            <span class='pull-right fnone'> Yes </span>
                        </p>
                    @endif

                </div>
            </div>
        </div>
    @endif
@endif