<div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding sec-slide-effect">
    <div class="comparechk">
        <input type="checkbox" id="compare{{ $loop->index }}" class="brandCompareCheckbox" name="compareCheckbox"
            onClick="getBrandsForComparison()" value="{{ $brandResult->franchisor_id }}">
        <label for="compare{{ $loop->index }}"><span></span></label>
    </div>

    <div class="padfb15">
        <a href="{{ $brandUrl }}" target="_blank">
            <div class="catimgmobile"><img src="{{ $brandImagepath }}" alt="{{ $brandResult->company_name }}" /></div>
        </a>


        <div class="catlisthead hindi">
            {{ $SubCatName }}
            @if ($brandResult->brand_verified == 1)
                <div class="brand-verify">
                    <i class="fa fa-check"></i> Verified
                </div>
            @endif
        </div>
        {{-- @dd($brandResult->verified); --}}
        <style>
            .brand-verify {
                display: inline-block;
                float: right;
                border: 1px solid #209f0c;
                border-radius: 4px;
                padding: 3px 9px;
                font-size: 11px;
                color: #03931b;
                font-weight: bold;
            }

            .brand-verify .fa {
                font-size: 11px;
                margin-right: 3px;
            }

            @media screen and (max-width:768px) {
                .brand-verify {
                    position: absolute;
                    right: 15px;
                    top: 15px;
                }
            }
        </style>


        {{-- <div class="catlisthead hindi">{{ $SubCatName }}</div> --}}
        <div class="catlist"><a href="{{ $brandUrl }}" target="_blank"
                id="brandnamecategory{{ $brandResult->franchisor_id }}">{{ $brandResult->company_name }}</a></div>
        <span style="display: none" id="brandinvestment{{ $brandResult->franchisor_id }}">INR {{ $minValue }} -
            {{ $maxValue }}</span>
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
                    <div class="countpho hindi">{{ $imgCount }} दुकान की तस्वीरें</div>
                </div>
            @else
                <div class="cattxtimg">
                    @if ($brandResult->is_hindi == 1)
                        {{ implode(' ', array_slice(explode(' ', substr(strip_tags($brandResult->business_desc_hindi), 0, 110)), 0, 10)) }}
                    @else
                        {{ implode(' ', array_slice(explode(' ', substr(strip_tags($brandResult->business_desc), 0, 110)), 0, 10)) }}
                    @endif
                </div>
            @endif
            {{--  @dd($brandResult->franchisorLocState);  --}}
            @if ($brandResult->franchisorLocState != null)
                <div class="subcat hindi">
                    <div>Locations looking for expansion</div>
                    @foreach ($brandResult->franchisorLocState->take(3) as $state)
                        {{ Config('location.hindiStatesArr.' . $state->state) . ', ' }}
                    @endforeach

                    @if ($brandResult->franchisorLocState->count() > 3)
                        .... + {{ $brandResult->franchisorLocState->count() - 3 }} more
                    @endif
                </div>
            @endif

            <div class="commanmbs">
                <div class="subcat hindi">
                    <span>स्थापना वर्ष</span>
                    {{ $brandResult->operations_start_year }}
                </div>
                <div class="subcat hindi">
                    <span>{{ $brandResult->looking_tradepartner == 1 ? 'डीलरशिप' : 'फ़्रैंचाइजिंग' }} लॉन्च तिथि</span>
                    {{ $brandResult->franchise_start_year }}
                </div>
            </div>

            <!--mobile code 2 start here -->
            <div class="commanmbsmobile">
                <div class="subcat hindi pleft">
                    <span>स्थापना वर्ष</span>
                    {{ $brandResult->operations_start_year }}
                </div>
                <div class="subcat hindi pright">
                    <span>{{ $brandResult->looking_tradepartner == 1 ? 'डीलरशिप' : 'फ़्रैंचाइजिंग' }} लॉन्च तिथि</span>
                    {{ $brandResult->franchise_start_year }}
                </div>
                <div class="subcat hindi pleft">
                    <span>निवेश का आकार</span>
                    {{ $priceRange }}
                </div>
                <div class="subcat hindi pright">
                    <span>जगह की जरुरत</span>
                    {{ $area }}
                </div>
                @if ($brandResult->looking_tradepartner != 1)
                    <div class="subcat hindi pleft">
                        @if ($mc != 5)
                            <span>फ़्रैंचाइजी प्रकार</span>
                        @endif
                        @if ($mc == 5)
                            <span>चैनल का प्रकार</span>
                        @endif
                        {{ Config('hindiConstants.masterfranchiseType.' . $brandResult->franchise_partner_type) }}
                    </div>
                @endif
                <div class="subcat hindi pright">
                    @if ($mc != 5)
                        <span>फ़्रैंचाइजी आउटलेट्स</span>
                    @endif
                    @if ($mc == 5)
                        <span>डीलरशिप आउटलेट्स</span>
                    @endif
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
            <div class="subcat hindi"><span>निवेश का आकार</span> INR {{ $minValue }} - {{ $maxValue }} </div>

            <div class="subcat hindi">
                <span>जगह की जरुरत</span>
                @if (!empty($brandResult->prop_area_max))
                    {{ $brandResult->prop_area_min }} - {{ $brandResult->prop_area_max }}
                @else
                    {{ empty($brandResult->prop_area_min) ? $brandResult->prop_area_min : '-N/A-' }}
                @endif
            </div>
            <div class="subcat hindi">
                @if ($mc != 5)
                    <span>फ़्रैंचाइजी आउटलेट्स</span>
                @endif
                @if ($mc == 5)
                    <span>डीलरशिप आउटलेट्स</span>
                @endif
                {{ $brandResult->no_fran_outlets }}
            </div>
            @if ($brandResult->looking_tradepartner != 1)
                <div class="subcat hindi">
                    @if ($mc != 5)
                        <span>फ़्रैंचाइजी प्रकार</span>
                    @endif
                    @if ($mc == 5)
                        <span>चैनल का प्रकार</span>
                    @endif
                    {{ Config('hindiConstants.masterfranchiseType.' . $brandResult->franchise_partner_type) }}
                </div>
            @endif
            <div class="subcat hindi">
                <span>मुख्यालय</span>
                {{ $brandResult->city }}
            </div>
        </div>
        <!--mobile hide code  end 1 -->
    </div>
    <div class="catbottp">
        {{--  <div class="col-xs-12 col-sm-12 col-md-12">
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
        </div>  --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="like-action_{{ $loop->index }} col-xs-4 col-sm-4 col-md-4 bd" style="cursor: pointer;">
                <a onclick ="likebtn('{{ $brandResult->franchisor_id }}',this.id);" class="like"
                    id="likeButton_{{ $loop->index }}">
                    <i class="fa fa-thumbs-up fa-lg" aria-hidden="true" id="like"></i></a>
                {{--  <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>  --}}
                <span id="likecount_{{ $loop->index }}">
                    @if ($likes != 0)
                        {{ $likes }}
                    @endif
                </span>

            </div>
            <div class="seo_shareButton_{{ $loop->index }} col-xs-4 col-sm-4 col-md-4 bd" style="cursor: pointer;">
                {{--  <i class="fa fa-share-alt fa-lg" aria-hidden="true"></i>  --}}
                <a data-toggle="modal" data-target="#mysocial" id="seo_shareButton_{{ $loop->index }}"
                    data-url="{{ $brandUrl }}"><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></a>
            </div>
            <div class="rate-action_{{ $loop->index }} col-xs-4 col-sm-4 col-md-4 bd" style="cursor: pointer;">
                {{--  <i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>  --}}
                <a data-toggle="modal" onclick="ratebtn('{{ $loop->index }}','{{ $brandResult->franchisor_id }}')"
                    id="rateButton_{{ $loop->index }}">
                    @if ($rate == 5)
                        <i class="fa fa-star fa-lg" aria-hidden="true" style="color: gold;"></i>
                    @else
                        <i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>
                    @endif
                </a>
                <span><strong id="rating_{{ $loop->index }}">
                        {{--  @dd($rate);  --}}
                        @if ($rate != 0)
                            {{ $rate }}
                        @endif
                    </strong></span>
            </div>


        </div>
    </div>
</div>
