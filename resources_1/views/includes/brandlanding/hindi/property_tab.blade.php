@if(!empty( $franDetails->property_type ) ||  $area != '-N/A-' ||  !empty( $franDetails->pref_prop_location ) ) 
<div id="property_tab" class="tab-section brandcontenthindi">
    <h3 class="tab-sec-ttl">संपत्ति ब्यौरा</h3>
    <div class="tab-sec-topics">
        <div class="keypoints">
            
            @if(!empty( $franDetails->property_type ))
                <p>
                    इस {{ $franDetails->looking_franchise == 1 ? "फ्रेंचाइजी" : "वितरण" }} के अवसर के लिए आवश्यक संपत्ति का प्रकार
                    <span class='pull-right fnone'>
                        {{ $franDetails->property_type }}
                    </span>
                </p>
            @endif

            @if($area != '-N/A-')
            <p>
                तल क्षेत्र की आवश्यकता
                <span class='pull-right fnone'>
                    {{ $area }}
                </span>
            </p>
            @endif
            @if(!empty( $franDetails->pref_prop_location ))
                <p>
                    इकाई {{ $franDetails->looking_franchise == 1 ? "फ्रेंचाइजी" : "वितरण" }} आउटलेट का पसंदीदा स्थान
                    <span class='pull-right fnone'>
                        {{ $franDetails->pref_prop_location }}
                    </span>
                </p>
            @endif

        </div>
    </div>
</div>
@endif