<div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
    <div class="comparechk">
        <input type="checkbox" id="compare{{ $loop->index }}" class="brandCompareCheckbox" name="compareCheckbox"
            onClick="getBrandsForComparison()" value="{{ $item['franchisor_id'] }}">
        <label for="compare{{ $loop->index }}"><span></span></label>
    </div>
    <div class="business-list hvr-effect">
        <div class="business-list-ttl">
            {{ $SubCatName }}
            <div class="business-list-SubTtl">
                <a href="{{ $brandUrl }}" target="_blank" id="brandnamecategory{{ $item['franchisor_id'] }}">
                    {{ $item['company_name'] }} </a>
            </div>
            <span style="display: none" id="brandinvestment{{ $item['franchisor_id'] }}">
                {{ $priceRange }}
            </span>
        </div>
        <div class="business-list-bdy">
            {{ implode(' ', array_slice(explode(' ', substr(strip_tags(html_entity_decode($item['business_desc'])), 0, 110)), 0, 10)) }}

            @if (!empty($item['franchisorLocState']) && count($item['franchisorLocState']) > 0)
                <div class="subcat">
                    <div>Locations looking for expansion</div>
                    @php
                        $uniqueStates = collect($item['franchisorLocState'])->unique('state')->values();
                        $statesToShow = $uniqueStates->take(3);
                    @endphp
                    @foreach ($statesToShow as $state)
                        {{ $state['state'] . ', ' }}
                    @endforeach

                    @if (count($uniqueStates) > 3)
                        .... + {{ count($uniqueStates) - 3 }} more
                    @endif
                </div>
            @endif
            <div class="subcat">
                <div>Establishment year</div>
                {{ $item['operations_start_year'] }}
            </div>
            <div class="subcat">
                <div>{{ $item['looking_tradepartner'] == 1 ? 'Dealership' : 'Franchising' }} Launch Date</div>
                {{ $item['franchise_start_year'] }}
            </div>
            <div class="catbtn">
                <input type="checkbox" id="{{ $item['franchisor_id'] }}" name="getFreeInfo" onclick="getfree()">
                <label for="{{ $item['franchisor_id'] }}"><span></span></label>
            </div>
        </div>
        <div class="business-list-footer">
            <ul>
                <li class="like-action_{{ $loop->index }}" style="cursor: pointer;">
                    <a onclick="likebtn('{{ $item['franchisor_id'] }}', this.id);" class="like" id="likeButton_{{ $loop->index }}">
                        <i class="fa fa-thumbs-up fa-lg" aria-hidden="true" id="like"></i>
                    </a>
                    <span id="likecount_{{ $loop->index }}">
                        @if ($likes != 0)
                            {{ $likes }}
                        @endif
                    </span>
                </li>
                <li class="seo_shareButton_{{ $loop->index }}" style="cursor: pointer;">
                    <a data-toggle="modal" data-target="#mysocial" id="seo_shareButton_{{ $loop->index }}" data-url="{{ $brandUrl }}">
                        <i class="fa fa-share-alt fa-lg" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="rate-action_{{ $loop->index }}" style="cursor: pointer;">
                    <a data-toggle="modal" onclick="ratebtn('{{ $loop->index }}', '{{ $item['franchisor_id'] }}')" id="rateButton_{{ $loop->index }}">
                        @if ($rate == 5)
                            <i class="fa fa-star fa-lg" aria-hidden="true" style="color: gold;"></i>
                        @else
                            <i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>
                        @endif
                    </a>
                    <span><strong id="rating_{{ $loop->index }}">
                            @if ($rate != 0)
                                {{ $rate }}
                            @endif
                        </strong></span>
                </li>
            </ul>
        </div>
    </div>
</div>
