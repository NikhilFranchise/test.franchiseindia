<div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding sec-slide-effect">
    <div class="comparechk">
        <input type="checkbox" id="compare{{ $loop->index }}" class="brandCompareCheckbox" name="compareCheckbox"
            onClick="getBrandsForComparison()" value="{{ $brandResult->franchisor_id }}">
        <label for="compare{{ $loop->index }}"><span></span></label>
    </div>

    <div class="padfb15"> 
        <a href="{{ $brandUrl }}" target="_blank">
            <div class="catimgmobile">
                <img src="{{ $brandImagepath }}" alt="{{ $brandResult->company_name }}" />
            </div>
        </a>

        <div class="catlisthead">
            {{ $SubCatName }}
            @if($brandResult->brand_verified == 1)
        <div class="brand-verify">
            <i class="fa fa-check"></i> Verified
        </div>
        @endif
            </div> 
        {{-- @dd($brandResult->verified); --}}
        <style>
            .brand-verify{    display: inline-block;
    float: right;
    border: 1px solid #209f0c;
    border-radius: 4px;
    padding: 1px 9px;
    font-size: 11px;
    color: #03931b;
    font-weight: bold;}
    .brand-verify .fa{font-size: 11px;margin-right: 3px;}
    @media screen and (max-width:768px){.brand-verify{position: absolute;right: 15px;top:15px;}}
            </style>

        <div class="catlist">
            <a href="{{ $brandUrl }}" id="brandnamecategory{{ $brandResult->franchisor_id }}" target="_blank">
                {{ $brandResult->company_name }} 
            </a>
        </div>

        <span style="display: none;" id="brandinvestment{{ $brandResult->franchisor_id }}">
            {{ $priceRange }}
        </span>
    </div>
    <div class="catlistdest">
        <div class="catdleft pad20">
            @if ($is_premium == 1)
                <div class="cattxtimg trst">
                    <div class="phoicon">
                        <a data-toggle="modal" data-target="#catgalleryform">
                            <i class="fa fa-camera fa-2x" aria-hidden="true" onclick="getImages(this.id)"
                                id="fran_{{ $brandResult->franchisor_id }}"></i>
                        </a>
                    </div>
                    <img src="{{ $image }}" alt="{{ $brandResult->company_name }}" />
                    <div class="countpho">{{ $imgCount }} Store Photos</div>
                </div>
            @else
                <div class="cattxtimg">
                    {!! implode(' ', array_slice(explode(' ', strip_tags($brandResult->business_desc)), 0, 10)) !!}
                    {{--  {{implode(' ', array_slice(explode(' ', substr(strip_tags($brandResult->business_desc),0,110)), 0, 10))}}  --}}
                </div>
            @endif

            {{--  @if ($brandResult->franchisorLocState !== null && $brandResult->franchisorLocState->count() > 0)
                <div class="subcat">
                    <div>Locations looking for expansion</div>
                    @php $uniqueStates = $brandResult->franchisorLocState->unique()->values()->all(); @endphp
                    @foreach ($uniqueStates->take(3) as $state)
                        {{ $state->state . ', ' }}
                    @endforeach

                    @if ($uniqueStates->count() > 3)
                        .... + {{ $uniqueStates->count() - 3 }} more
                    @endif
                </div>
            @endif  --}}
            @if ($brandResult->franchisorLocState !== null && $brandResult->franchisorLocState->count() > 0)
                <div class="subcat">
                    <div>Locations looking for expansion</div>
                    @php
                        $uniqueStates = $brandResult->franchisorLocState->unique('state')->values();
                        $statesToShow = $uniqueStates->take(3);
                    @endphp
                    @foreach ($statesToShow as $state)
                        {{ $state->state . ', ' }}
                    @endforeach

                    @if ($uniqueStates->count() > 3)
                        .... + {{ $uniqueStates->count() - 3 }} more
                    @endif
                </div>
            @endif


            <div class="commanmbs">
                <div class="subcat">
                    <span>Establishment year</span>
                    {{ $brandResult->operations_start_year }}
                </div>
                <div class="subcat">
                    <span>{{ $brandResult->looking_tradepartner == 1 ? 'Dealership' : 'Franchising' }} Launch
                        Date</span>
                    {{ $brandResult->franchise_start_year }}
                </div>
            </div>
            <!--mobile code 2 start here -->
            <div class="commanmbsmobile">
                <div class="subcat pleft">
                    <span>Establishment year</span>
                    {{ $brandResult->operations_start_year }}
                </div>

                <div class="subcat pright">
                    <span>{{ $brandResult->looking_tradepartner == 1 ? 'Dealership' : 'Franchising' }} Launch
                        Date</span>
                    {{ $brandResult->franchise_start_year }}
                </div>

                <div class="subcat pleft">
                    <span>Investment size</span>
                    {{ $priceRange }}
                </div>

                <div class="subcat pright"><span>Space required</span>
                    {{ $area }}
                </div>
                @if ($brandResult->looking_tradepartner != 1)
                    <div class="subcat pleft">
                        <span>{{ $mc != 5 ? 'Franchise Type' : 'Channel Type' }}</span>
                        {{ Config('constants.masterfranchiseType.' . $brandResult->franchise_partner_type) }}
                    </div>
                @endif
                <div class="subcat pright">
                    <span>{{ $mc != 5 ? 'Franchise Outlets' : 'Dealership Outlets' }}</span>
                    {{ $brandResult->no_fran_outlets }}
                </div>
            </div>
            <!--mobile code 2 start here -->
            <div class="catbtn">
                <input type="checkbox" id="{{ $brandResult->franchisor_id }}" name="getFreeInfo" onClick="getfree()" />
                <label for="{{ $brandResult->franchisor_id }}"><span></span></label>
            </div>
            <!--btn E-->
        </div>
        <!--mobile hide code start 1 -->
        <div class="catdright pad20">
            <a href="{{ $brandUrl }}" target="_blank" id="brandnamecategory{{ $brandResult->franchisor_id }}">
                <div class="catimg"><img src="{{ $brandImagepath }}" alt="{{ $brandResult->company_name }}" /></div>
            </a>

            <div class="subcat"><span>Investment size</span>
                {{ $priceRange }}
            </div>

            <div class="subcat"><span>Space required</span>
                {{ $area }}
            </div>

            <div class="subcat">
                <span>{{ $mc != 5 ? 'Franchise Outlets' : 'Dealership Outlets' }}</span>
                {{ $brandResult->no_fran_outlets }}
            </div>

            @if ($brandResult->looking_tradepartner != 1)
                <div class="subcat">
                    @if ($mc != 5)
                        <span>Franchise Type</span>
                    @endif
                    @if ($mc == 5)
                        <span>Channel Type</span>
                    @endif
                    {{ Config('constants.masterfranchiseType.' . $brandResult->franchise_partner_type) }}
                </div>
            @endif

            <div class="subcat">
                <span>Headquarter</span>
                {{ $brandResult->city }}
            </div>
        </div>
        <!--mobile hide code  end 1 -->
    </div>
    <div class="catbottp">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-4 col-sm-4 col-md-4 bd"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>
                @if ($likes != 0)
                    {{ $likes }}
                @endif
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 bd"><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></div>
            <div class="col-xs-4 col-sm-4 col-md-4 bd"><i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>
                @if ($rate != 0)
                    {{ $rate }}
                @endif
            </div>
        </div>
    </div>
</div>
