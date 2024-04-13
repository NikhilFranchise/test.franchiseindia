<hr>
{{-- @mobile --}}
@if ($agent->isMobile())
<div class="row row-no-margin padtb20 catbannertop">
    <div class="dfp_320X100" style='display:block;'>
		@if(!empty($mc) && $mc == 2)
		{{--<div id='div-gpt-ad-1573467896971-0' style='width: 100%;'><a href="https://www.franchiseindia.com/brands/what-a-sandwich.51513"><img src="https://www.franchiseindia.com/images/go69pizza-mobile.jpg" style="width:100%;" alt="What a Sandwich"/></a></div>--}}
			{{--@elseif(isset($mc) && $mc == 3)--}}
				{{--<div id='div-gpt-ad-1573467896971-x' style='width: 100%;'><a href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://www.franchiseindia.com/images/kidzee-mobile.gif" style="width:100%;" alt="Kidzee"/></a></div>--}}
		@else
            @include("includes.banners.google_cat_468X60")
        @endif
    </div>
</div>
@endif
{{-- @endmobile --}}
