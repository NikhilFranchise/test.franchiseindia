<div id="others_tab" class="tab-section">
    <h3 class="tab-sec-ttl">समझौता और अवधि विवरण</h3>
    <div class="tab-sec-topics">
        <div class="keypoints">
            @if($franDetails->std_fran_aggreement == 1)
                <p>
                    क्या आपके पास एक मानक {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "वितरण" : "फ्रेंचाइजी" }} समझौता है?
                    <span class='pull-right fnone'> हाँ </span>
                </p>
            @endif
            <p>
                {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "वितरण" : "फ्रेंचाइजी" }} अवधि कितनी देर के लिए और है?
                <span class='pull-right fnone'>
                    @php
                        $aggrementTime = $franDetails->franchise_term_duration;
                        
                        if($aggrementTime == "Life")
                            $aggrementTime = "जीवन काल";
                        else if($aggrementTime == 1)
                            $aggrementTime = "1 साल";
                        else
                            $aggrementTime = $franDetails->franchise_term_duration. " वर्षों";

                    @endphp
                    {{ $aggrementTime }}
                </span>
            </p>
            @if($franDetails->term_renewable == 1)
                <p>
                    क्या शब्द नवीकरणीय है?
                    <span class='pull-right fnone'> हाँ </span>
                </p>
            @endif
        </div>
    </div>
</div>
@notmobile
@include('includes.brandlanding.hindi.wider-insta-apply-form')
@endnotmobile