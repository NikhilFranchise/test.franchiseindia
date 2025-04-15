 <div class="finner" id="finner">
     @php
         if (!function_exists('formatInvestment')) {
             function formatInvestment($value)
             {
                 if (!is_numeric($value)) {
                     return '-N/A-';
                 }
                 if ($value < 100000 && $value > 10000) {
                     return substr($value / 1000, 0, 5) . ' K';
                 } elseif ($value <= 9999999 && $value > 100000) {
                     return substr($value / 100000, 0, 5) . ' Lakh';
                 } elseif ($value > 9999999) {
                     return substr($value / 10000000, 0, 5) . ' Cr';
                 }
                 return '-N/A-';
             }
         }
     @endphp
     @foreach ($data as $leaders)
         @php
             $brandUrl = sprintf(
                 Config('constants.brandPagePattern'),
                 Config('constants.MainDomain'),
                 $leaders->franchisorLeaders->profile_name,
                 $leaders->franchisorLeaders->fran_detail_id,
             );
             $unitInvestment = $leaders->franchisorLeaders->unit_investment ?? null;
             $priceRange = Config('constants.investRangeInWords')[$unitInvestment] ?? null;

             if (empty($priceRange)) {
                 $minValue = $leaders->franchisorLeaders->unit_inv_min;
                 $maxValue = $leaders->franchisorLeaders->unit_inv_max;

                 $formattedMin = formatInvestment($minValue);
                 $formattedMax = formatInvestment($maxValue);
                 $priceRange = "INR $formattedMin - $formattedMax";
             }

         @endphp
         <div class="col">
             <div class="filter-list-brand">
                 <div class="catimg"><img
                         src="{{ Config('constants.franAwsImgPath') . $leaders->franchisorLeaders->company_logo }}"
                         alt="{{ $leaders->franchisorLeaders->company_name }}"></div>
                 <div class="finfo">
                     <div class="catlist">
                         <a href="{{ $brandUrl }}"
                             id="brandnamecategory{{ $leaders->franchisorLeaders->franchisor_id }}" target="_blank">
                             {{ $leaders->franchisorLeaders->company_name }}
                         </a>
                     </div>
                     <span style="display: none;" id="brandinvestment{{ $leaders->franchisorLeaders->franchisor_id }}">
                         {{ $priceRange }}
                     </span>
                     @foreach (Config('constants.subSubCategoryArr') as $key => $abc)
                         @if (array_key_exists($leaders->franchisorLeaders->ind_sub_cat, $abc))
                             @php
                                 $SubCatName = $abc[$leaders->franchisorLeaders->ind_sub_cat];
                             @endphp
                         @endif
                     @endforeach
                     <div class="catlisthead">
                         {{ $SubCatName }}
                     </div>
                 </div>
                 <div class="catbtn bview">
                     <input type="checkbox" id="{{ $leaders->franchisorLeaders->franchisor_id }}" name="getFreeInfo"
                         onclick="getfree()">
                     <label for="{{ $leaders->franchisorLeaders->franchisor_id }}"><span></span></label>
                 </div>

             </div>
         </div>
     @endforeach
 </div>
 
