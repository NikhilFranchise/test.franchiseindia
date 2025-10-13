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

        $constants = config('constants');
        $subSubCategoryArr = $constants['subSubCategoryArr'];
        $brandPagePattern = $constants['brandPagePattern'];
        $mainDomain = $constants['MainDomain'];
        $imgPath = $constants['franAwsImgPath'];
        $investmentWords = $constants['investRangeInWords'];
    @endphp

    {{-- Dynamic Brands --}}
    @foreach ($data as $leaders)
        @php
            $leader = $leaders->franchisorLeaders;
            if (!$leader) {
                continue;
            }

            $profileName = $leader->profile_name ?? '';
            $franDetailId = $leader->fran_detail_id ?? '';
            $brandUrl = sprintf($brandPagePattern, $mainDomain, $profileName, $franDetailId);

            $unitInvestment = $leader->unit_investment ?? null;
            $priceRange = $investmentWords[$unitInvestment] ?? null;

            if (empty($priceRange)) {
                $formattedMin = formatInvestment($leader->unit_inv_min ?? '');
                $formattedMax = formatInvestment($leader->unit_inv_max ?? '');
                $priceRange = "INR $formattedMin - $formattedMax";
            }

            $franId = $leader->franchisor_id ?? '';
            $companyLogo = $leader->company_logo ?? '';
            $companyName = $leader->company_name ?? '';
            $indSubCat = $leader->ind_sub_cat ?? '';
        @endphp

        <div class="col">
            <div class="filter-list-brand">
                <div class="catimg">
                    <img src="{{ $imgPath . $companyLogo }}" alt="{{ $companyName }}" loading="lazy">
                </div>
                <div class="finfo">
                    <div class="catlist">
                        <a href="{{ $brandUrl }}" id="brandnamecategory{{ $franId }}" target="_blank">
                            {{ $companyName }}
                        </a>
                    </div>
                    <span style="display: none;" id="brandinvestment{{ $franId }}">
                        {{ $priceRange }}
                    </span>

                    @foreach ($subSubCategoryArr as $abc)
                        @if (array_key_exists($indSubCat, $abc))
                            <div class="catlisthead">
                                {{ $abc[$indSubCat] }}
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

    {{-- Static Brands for 2025 --}}
    @php
        $brands = config("staticBrands.staticBrands.$year") ?? [];
    @endphp

    @foreach ($brands as $brand)
        <div class="col">
            <div class="filter-list-brand">
                <div class="catimg">
                    <img src="{{ url($brand['logo']) }}" alt="{{ $brand['brand'] }}" loading="lazy">
                </div>
                <div class="finfo">
                    <div class="catlist">
                        <a href="{{ url('/business-opportunities/all/all') }}" target="_blank">
                            {{ $brand['brand'] }}
                        </a>
                    </div>
                    <span style="display: none;">
                        {{ $brand['investment'] }}
                    </span>
                    <div class="catlisthead">
                        {{ $brand['sector'] }}
                    </div>
                </div>
                <div class="catbtn bview">
                    <input type="checkbox" name="getFreeInfo">
                    <label>
                        <span onclick="window.open('{{ url('/business-opportunities/all/all') }}', '_blank')"></span>
                    </label>
                </div>
            </div>
        </div>
    @endforeach
</div>
