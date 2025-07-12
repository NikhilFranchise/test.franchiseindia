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
             $profile_name = $leaders->franchisorLeaders->profile_name ?? '';
             $franDetailId = $leaders->franchisorLeaders->fran_detail_id ?? '';

             $brandUrl = sprintf(
                 Config('constants.brandPagePattern'),
                 Config('constants.MainDomain'),
                 $profile_name,
                 $franDetailId,
             );
             $unitInvestment = $leaders->franchisorLeaders->unit_investment ?? null;
             $priceRange = Config('constants.investRangeInWords')[$unitInvestment] ?? null;

             if (empty($priceRange)) {
                 $minValue = $leaders->franchisorLeaders->unit_inv_min ?? '';
                 $maxValue = $leaders->franchisorLeaders->unit_inv_max ?? '';

                 $formattedMin = formatInvestment($minValue);
                 $formattedMax = formatInvestment($maxValue);
                 $priceRange = "INR $formattedMin - $formattedMax";
             }
             $companyLogo = $leaders->franchisorLeaders->company_logo ?? '';
             $companyName = $leaders->franchisorLeaders->company_name ?? '';
             $franId = $leaders->franchisorLeaders->franchisor_id ?? '';
             $indSubCat = $leaders->franchisorLeaders->ind_sub_cat ?? '';

         @endphp
         <div class="col">
             <div class="filter-list-brand">
                 <div class="catimg"><img src="{{ Config('constants.franAwsImgPath') . $companyLogo }}"
                         alt="{{ $companyName }}"></div>
                 <div class="finfo">
                     <div class="catlist">
                         <a href="{{ $brandUrl }}" id="brandnamecategory{{ $franId }}" target="_blank">
                             {{ $companyName }}
                         </a>
                     </div>
                     <span style="display: none;" id="brandinvestment{{ $franId }}">
                         {{ $priceRange }}
                     </span>
                     @foreach (Config('constants.subSubCategoryArr') as $key => $abc)
                         @if (array_key_exists($indSubCat, $abc))
                             @php
                                 $SubCatName = $abc[$indSubCat] ?? '';
                             @endphp
                             <div class="catlisthead">
                                 {{ $SubCatName }}
                             </div>
                         @endif
                     @endforeach
                 </div>
                 <div class="catbtn bview">
                     <input type="checkbox" id="{{ $franId }}" name="getFreeInfo" onclick="getfree()">
                     <label for="{{ $franId }}"><span></span></label>
                 </div>

             </div>
         </div>
     @endforeach
     {{-- @dd(count(config('staticBrands.staticBrands'))); --}}
     @foreach (config('staticBrands.staticBrands') as $brand)
         <div class="col">
             <div class="filter-list-brand">
                 <div class="catimg">
                     <img src="{{ url($brand['logo']) }}" alt="{{ $brand['brand'] }}">
                 </div>
                 <div class="finfo">
                     <div class="catlist">
                         <a href="{{ url('/business-opportunities/all/all') }}" id="brandnamecategory" target="_blank">
                             {{ $brand['brand'] }}
                         </a>
                     </div>
                     <span style="display: none;" id="brandinvestment">
                         {{ $brand['investment'] }}
                     </span>
                     <div class="catlisthead">
                         {{ $brand['sector'] }}
                     </div>
                 </div>
             </div>
         </div>
     @endforeach

 </div>
