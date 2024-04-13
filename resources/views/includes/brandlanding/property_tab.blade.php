@if(!empty( $franDetails->property_type ) ||  $area != '-N/A-' ||  !empty( $franDetails->pref_prop_location ) ) 
<div id="property_tab" class="tab-section">
    <!--<h3 class="tab-sec-ttl">Property Details</h3>-->
	<h2 class="tab-sec-ttl">{{$franDetails->company_name}} Franchise Requirements</h2>
    <div class="tab-sec-topics">
        <div class="keypoints">
            
            @if(!empty( $franDetails->property_type ))
                <p>
                    Type of property required for this {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "dealership" : "franchise" }} opportunity
                    <span class='pull-right fnone'>
                        {{ $franDetails->property_type }}
                    </span>
                </p>
            @endif

            @if($area != '-N/A-')
            <p>
                Floor area requirement
                <span class='pull-right fnone'>
                    {{ $area }}
                </span>
            </p>
            @endif
            @if(!empty( $franDetails->pref_prop_location ))
                <p>
                    Preferred location of unit {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "dealership" : "franchise" }} outlet
                    <span class='pull-right fnone'>
                        {{ $franDetails->pref_prop_location }}
                    </span>
                </p>
            @endif

        </div>
    </div>
</div>
@endif