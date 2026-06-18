@php
use Illuminate\Support\Str;
@endphp
@php
    $extend = 'amp-master-eng';
        if(request()->segment(2) == 'hi')
            $extend = 'hindi.amp-master';
@endphp
@extends('layout.amp.'.$extend)

@section('content')
    <!--content area start here -->
    <div class="barndmargin">
        <h1>{{ $catName }}</h1>
        <ul class="brandlist">
        @foreach($shuffledResults as $brandResult)
            <!-- category list section start here-->
            @php
                $brandUrl       = sprintf(Config('constants.brandPagePattern'), Config('constants.MainDomain'), $brandResult->profile_name, $brandResult->fran_detail_id);

                if($brandResult->is_hindi == 1 && request()->segment(2) == 'hi')
                    $brandUrl   = str_replace('/brands/', '/hi/brands/', $brandUrl);

                $noImage        = "https://www.franchiseindia.com/images/no-img.gif";
                $image          = $noImage;
                $brandImagepath = Config('constants.franAwsImgPath').$brandResult->company_logo;
                $SubCatName     = "";
                $SubCatNameHindi = "";

                if(empty($brandResult->company_logo))
                    $brandImagepath = $noImage;

                $minValue = $brandResult->unit_inv_min;

                if($minValue < 100000 && $minValue > 10000)
                    $minValue = substr(($minValue/1000),0,5).' K';

                if($minValue <= 9999999 && $minValue > 100000)
                    $minValue = substr(($minValue/100000),0,5).' Lac';

                if($minValue > 9999999)
                    $minValue = substr(($minValue/10000000),0,5).' Cr';

                $maxValue = $brandResult->unit_inv_max;

                if($maxValue < 100000 && $maxValue > 10000)
                    $maxValue = substr(($maxValue/1000),0,5).' K';

                if($maxValue <= 9999999 && $maxValue > 100000)
                    $maxValue = substr(($maxValue/100000),0,5).' Lac';

                if($maxValue > 9999999)
                    $maxValue = substr(($maxValue/10000000),0,5).' Cr';

                foreach  ( Config('constants.subSubCategoryArr') as $key => $abc)
                    if(array_key_exists($brandResult->ind_sub_cat, $abc))
                        $SubCatName = $abc[$brandResult->ind_sub_cat];

                foreach  ( Config('hindiConstants.subSubCategoryArr') as $key => $abc)
                    if(array_key_exists($brandResult->ind_sub_cat, $abc))
                        $SubCatNameHindi = $abc[$brandResult->ind_sub_cat];

            @endphp
            <li>
                <div class="blk">
                    <div  class="brandlogolist"><a href="{{ $brandUrl }}"><amp-img src="{{ $brandImagepath }}" width="199" height="81" layout="responsive"></amp-img></a> </div>
                    <div class="brandcatname"><a href="{{ url('amp/hi/business-opportunities/'.Str::slug($SubCatName).'.ssc'.$brandResult->ind_sub_cat) }}">{{ request()->segment(2) == 'hi' ? $SubCatNameHindi : $SubCatName }}</a></div>
                    <div class="brandname"><a href="{{ $brandUrl }}">{{ $brandResult->company_name }}</a></div>
                    <div class="investvalue">{{ request()->segment(2) == 'hi' ? "निवेश का आकार " : "Investment Size" }}<span>INR {{ $minValue  }} - {{ $maxValue }}</span></div>
                </div>
            </li>
            @endforeach
        </ul>
        @if(count($brandResults) == 0)
            <div class="noresults">No result found</div>
        @endif
        {!! $brandResults->appends(['mc' => $mc,'sc' =>$sc,'ssc'=>$ssc, 'loc'=>$loc, 'ftype'=>$ftype,'sortby'=>$orderby, 'minRangeValue'=>$minRangeValue,'maxRangevalue'=>$maxRangevalue,'text' =>$text,'searchq' => $searchq,'city' => $city])->render() !!}
    </div>
	<amp-analytics type="googleanalytics">
	<script type="application/json"> {
	  "vars": {
		"account": "UA-8863112-1"
	  },
	  "triggers": {
		"trackPageviewWithCustomUrl": {
		  "on": "visible",
		  "request": "pageview",
		  "vars": {
			"title": "{{$seoTitle}}",
			"documentLocation": "{{str_replace('amp/', '', url()->current())}}"
		  }
		}
	  }
	}
	</script>
	</amp-analytics>
@endsection