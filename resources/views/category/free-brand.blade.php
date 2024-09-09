<div class="col-xs-12 col-sm-6 col-md-4 catlistmar sec-slide-effect">
    <div class="comparechk">
        <input type="checkbox" id="compare{{ $loop->index }}" class="brandCompareCheckbox" name="compareCheckbox"
            onClick="getBrandsForComparison()" value="{{ $brandResult->franchisor_id }}">
        <label for="compare{{ $loop->index }}"><span></span></label>
    </div>
    <div class="business-list hvr-effect">
        <div class="business-list-ttl">
            {{ $SubCatName }}
            <div class="business-list-SubTtl">
                <a href="{{ $brandUrl }}" target="_blank" id="brandnamecategory{{ $brandResult->franchisor_id }}">
                    {{ $brandResult->company_name }} </a>
            </div>
            <span style="display: none" id="brandinvestment{{ $brandResult->franchisor_id }}">
                {{ $priceRange }}
            </span>
        </div>
        <div class="business-list-bdy">
            {{--  {!! implode(' ', array_slice(explode(' ', strip_tags($brandResult->business_desc)), 0, 10)) !!}  --}}
            {{ implode(' ', array_slice(explode(' ', substr(strip_tags(html_entity_decode($brandResult->business_desc)), 0, 110)), 0, 10)) }}

            @if ($brandResult->franchisorLocState !== null && $brandResult->franchisorLocState->count() > 0)
                <div class="subcat">
                    <div>Locations looking for expansion</div>
                    @foreach ($brandResult->franchisorLocState->take(3) as $state)
                        {{ $state->state . ', ' }}
                    @endforeach

                    @if ($brandResult->franchisorLocState->count() > 3)
                        .... + {{ $brandResult->franchisorLocState->count() - 3 }} more
                    @endif
                </div>
            @endif
            <div class="subcat">
                <div>Establishment year</div>
                {{ $brandResult->operations_start_year }}
            </div>
            <div class="subcat">
                <div>{{ $brandResult->looking_tradepartner == 1 ? 'Dealership' : 'Franchising' }} Launch Date</div>
                {{ $brandResult->franchise_start_year }}
            </div>
            <div class="catbtn">
                <input type="checkbox" id="{{ $brandResult->franchisor_id }}" name="getFreeInfo" onclick="getfree()">
                <label for="{{ $brandResult->franchisor_id }}"><span></span></label>
            </div>
        </div>
        <div class="business-list-footer">
            <ul>
                {{--  <li><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>@if ($likes != 0){{$likes}}@endif</li>
                <li><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></li>
                <li><i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>@if ($rate != 0){{$rate}}@endif</li>  --}}
                <li class="like-action_{{ $loop->index }}" style="cursor: pointer;"><a onclick ="likebtn('{{ $brandResult->franchisor_id }}',this.id);" class="like"
                        id="likeButton_{{ $loop->index }}">
                        <i class="fa fa-thumbs-up fa-lg" aria-hidden="true" id="like"></i></a>
                    {{--  <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>  --}}
                    <span id="likecount_{{ $loop->index }}">
                        @if ($likes != 0)
                            {{ $likes }}
                        @endif
                    </span>
                </li>
                <li class="seo_shareButton_{{ $loop->index }}" style="cursor: pointer;"><a data-toggle="modal" data-target="#mysocial" id="seo_shareButton_{{ $loop->index }}"
                        data-url="{{ $brandUrl }}"><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></a>
                </li>
                <li class="rate-action_{{ $loop->index }}" style="cursor: pointer;"><a data-toggle="modal"
                        onclick="ratebtn('{{ $loop->index }}','{{ $brandResult->franchisor_id }}')"
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
                </li>
            </ul>
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
