<div class="col-xs-12 col-sm-6 col-md-6 catlistinfo row-no-padding sec-slide-effect" >
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
                padding: 1px 9px;
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

        <div class="catlist">
            <a href="{{ $brandUrl }}" id="brandnamecategory{{ $brandResult->franchisor_id }}" target="_blank">
                {{ $brandResult->company_name }}    ssr
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
                    {{--  {!! implode(' ', array_slice(explode(' ', strip_tags($brandResult->business_desc)), 0, 10)) !!}  --}}
                    {{--  {{implode(' ', array_slice(explode(' ', substr(strip_tags($brandResult->business_desc),0,110)), 0, 10))}}  --}}
                    {{ implode(' ', array_slice(explode(' ', substr(strip_tags(html_entity_decode($brandResult->business_desc)), 0, 110)), 0, 10)) }}

                </div>
            @endif

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
                        {{-- <span>{{ $mc != 5 ? 'Franchise Type' : 'Channel Type' }}</span> --}}
                        {{ Config('constants.masterfranchiseType.' . $brandResult->franchise_partner_type) }}
                    </div>
                @endif
                <div class="subcat pright">
                    {{-- <span>{{ $mc != 5 ? 'Franchise Outlets' : 'Dealership Outlets' }}</span> --}}
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
                {{-- <span>{{ $mc != 5 ? 'Franchise Outlets' : 'Dealership Outlets' }}</span> --}}
                {{ $brandResult->no_fran_outlets }}
            </div>

            @if ($brandResult->looking_tradepartner != 1)
                <div class="subcat">
                    {{-- @if ($mc != 5)
                        <span>Franchise Type</span>
                    @endif
                    @if ($mc == 5)
                        <span>Channel Type</span>
                    @endif --}}
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
<!-- social mdia code  -->
<div id="mysocial" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Share</h4>
            </div>
            <div class="modal-body">
                <div class="macashare">
                    <ul class="sharecat">
                        <li><a href="http://www.facebook.com/sharer.php?u={{ $brandUrl }}" target="_blank"><img
                                    src="{{ URL::asset('images/facebookcat.gif') }}"
                                    alt="Facebook"><span>Facebook</span></a></li>
                        <li><a href="https://twitter.com/share?url={{ $brandUrl }}" target="_blank"><img
                                    alt="twitter"
                                    src="{{ URL::asset('images/twittercat.gif') }}"><span>Twitter</span></a></li>
                        <li class="btline"><a
                                href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $brandUrl }}"
                                target="_blank"><img alt="linkedin"
                                    src="{{ URL::asset('images/linkedincat.gif') }}"><span>LinkedIn</span></a></li>
                        <li class="webt"><a href="whatsapp://send?text={{ $brandUrl }}" target="_blank"><img
                                    alt="whatsapp"
                                    src="{{ URL::asset('images/whatsappcat.gif') }}"><span>Whatsapp</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!--  End social mdia code  -->
