@if( $franDetails->is_detailed_manuals == 1 || !empty($franDetails->franchise_training_loc) || $franDetails->is_field_assistance == 1 || $franDetails->ho_assistance == 1 || $franDetails->is_it_support == 1  )
    @if($franDetails->looking_franchise == 1)
    
    <div id="training_tab" class="tab-section">
        <h3 class="tab-sec-ttl">प्रशिक्षण विवरण</h3>
        <div class="tab-sec-topics">
            <div class="keypoints">
                @if($franDetails->is_detailed_manuals == 1)
                    <p>
                        फ्रैंचाइजी के लिए विस्तृत ऑपरेटिंग मैनुअल
                        <span class='pull-right fnone'> हाँ </span>
                    </p>
                @endif
                
                @if(!empty($franDetails->franchise_training_loc))
                    <p>
                        फ़्रैंचाइजी प्रशिक्षण स्थान
                        <span class='pull-right fnone'>
                            {{$franDetails->franchise_training_loc}}
                        </span>
                    </p>
                @endif

                @if($franDetails->is_field_assistance == 1)
                    <p>
                        क्या फ़्रैंचाइजी के लिए फील्ड सहायता उपलब्ध है?
                        <span class='pull-right fnone'> हाँ </span>
                    </p>
                @endif
                
                @if($franDetails->ho_assistance == 1)
                    <p>
                        फ्रेंचाइजी खोलने में हेड ऑफिस से फ़्रैंचाइजी के विशेषज्ञ मार्गदर्शन
                        <span class='pull-right fnone'> हाँ </span>
                    </p>
                @endif
                
                @if($franDetails->is_it_support == 1)
                    <p>
                        फ्रैंचाइजी में मौजूदा आईटी सिस्टम शामिल किए जाएंगे
                        <span class='pull-right fnone'> हाँ </span>
                    </p>
                @endif

            </div>
        </div>
    </div>

    @endif
@endif