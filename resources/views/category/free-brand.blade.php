<div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
    <div class="comparechk">
      <input type="checkbox" id="compare{{ $loop->index }}" class="brandCompareCheckbox" name="compareCheckbox" onClick="getBrandsForComparison()"  value="{{$brandResult->franchisor_id}}" >
      <label for="compare{{ $loop->index }}"><span></span></label>
    </div>

    <div class="business-list hvr-effect">
        <div class="business-list-ttl">
            {{$SubCatName}}
            <div class="business-list-SubTtl">
                <a href="{{ $brandUrl }}" target="_blank" id="brandnamecategory{{$brandResult->franchisor_id}}"> {{$brandResult->company_name}} </a>
            </div>
            <span style="display: none" id="brandinvestment{{$brandResult->franchisor_id}}">
                {{ $priceRange }}
            </span>
        </div>
        <div class="business-list-bdy">
            {{implode(' ', array_slice(explode(' ', substr(strip_tags($brandResult->business_desc),0,110)), 0, 10))}}
            @if($brandResult->franchisorLocState !== null && $brandResult->franchisorLocState->count() > 0)
                <div class="subcat">
                    <div>Locations looking for expansion</div>
                    @foreach($brandResult->franchisorLocState->take(3) as $state)
                        {{ $state->state.", " }}
                    @endforeach

                    @if($brandResult->franchisorLocState->count() > 3)
                        .... + {{ $brandResult->franchisorLocState->count() - 3 }} more
                    @endif
                </div>
            @endif
            <div class="subcat">
                <div>Establishment year</div>
                {{$brandResult->operations_start_year}}
            </div>
            <div class="subcat">
                <div>{{ $brandResult->looking_tradepartner == 1 ? "Dealership" : "Franchising" }} Launch Date</div>
                {{$brandResult->franchise_start_year}}
            </div>
            <div class="catbtn">
                <input type="checkbox" id="{{$brandResult->franchisor_id}}" name="getFreeInfo" onclick="getfree()">
                <label for="{{$brandResult->franchisor_id}}"><span></span></label>
            </div>
        </div>
        <div class="business-list-footer">
            <ul>
                <li><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>@if($likes != 0){{$likes}}@endif</li>
                <li><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></li>
                <li><i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>@if($rate != 0){{$rate}}@endif</li>
            </ul>
        </div>
    </div>
</div>
