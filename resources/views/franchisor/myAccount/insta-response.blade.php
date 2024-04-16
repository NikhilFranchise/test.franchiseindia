@extends('layout.master')
@section('ir')
	class="selected"
@endsection
@section('content')
	<div class="container myaccount">
		<div class="row row-no-margin">
			@include('includes.myfranchiseleft')
			<div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
				<div class="row row-no-margin">
					<div class="col-xs-12 col-sm-12 col-md-12 row-no-padding padleft10">
						<h2 class="mysubhead fleft marhaedtop">Insta Responses</h2>
						@php
							$href = "href=# disabled";
							if(!empty(request()->user()) && request()->user()->membership_type == 1)
                            	$href = "href=/all-insta-responce-csv";
						@endphp
						<a {{$href}} class="btn btn-default dwlbtn" id="export">Download Response</a>
						<div class="clearfix"></div>
						<div class="bor-radius backwhite ovfl exyab">
							@if(!empty(request()->user()) && request()->user()->membership_type != 1)
								<div class="freeoverh">
									<p>Please upgrade your Account to utilise further benefits.</p>
									<a href="{{url('franchisor/myaccount/payment-plan')}}" class="btn btn-default">Upgrade Account</a>
								</div>
							@endif
							<table class="table table-responsive">
								<thead class="thead-inverse">
								<tr class="tabg">
									<th>Name</th>
									<th>Email</th>
									<th>Address</th>
									<th>Phone</th>
								</tr>
								</thead>
								<tbody>
								@foreach($insta as $instaResult)
									<tr class="extrl">
										<td data-th="Name" class="widthper16">
											<div class="fra-title" id="data">{{$instaResult->name}}<span>{{date('d-m-Y', strtotime($instaResult->create_date))}}</span></div>
										</td>
										
										
								<td data-th="Email" class="widthper24">
								<div class="fra-title" id="data">
									{{ ($instaResult->visibility == 1 || $franData->fleads_status == 1) ? $instaResult->email : "xxxxxxxx@gmail.com"}}
								</div>
								</td>
								<td data-th="Address" class="widthper30">
								<div class="fra-title" id="data">
									{{ ($instaResult->visibility == 1 || $franData->fleads_status == 1) ? $instaResult->address.','.$instaResult->city.','.$instaResult->state.',Pincode:'.$instaResult->pincode.','.$instaResult->country : "xxxxxx,pincode:-xxxxxx,xxxxxx"}}
								</div>
								</td>
								<td data-th="Phone" class="widthper12">
								<div class="fra-title" id="data">
									{{ ($instaResult->visibility == 1 || $franData->fleads_status == 1) ? $instaResult->phone : "xxxxxxxxxx"}}
								</div>
								</td>										
									</tr>
								@endforeach

								{{-- @php
    $counter = 0;
@endphp

@foreach($insta as $instaResult)
    @if($franData->fleads_status == 1 || $instaResult->visibility == 1)
        <tr class="extrl">
            <td data-th="Name" class="widthper16">
                <div class="fra-title" id="data">{{$instaResult->name}}<span>{{date('d-m-Y', strtotime($instaResult->create_date))}}</span></div>
            </td>
            <td data-th="Email" class="widthper24">
                <div class="fra-title" id="data">
                    {{  $instaResult->email  }}
                </div>
            </td>
            <td data-th="Address" class="widthper30">
                <div class="fra-title" id="data">
                    {{  $instaResult->address.','.$instaResult->city.','.$instaResult->state.',Pincode:'.$instaResult->pincode.','.$instaResult->country  }}
                </div>
            </td>
            <td data-th="Phone" class="widthper12">
                <div class="fra-title" id="data">
                    {{  $instaResult->phone  }}
                </div>
            </td>
        </tr>
        @php
            $counter++;
        @endphp
    @elseif($franData->fleads_status != 1 || $instaResult->visibility != 1)
        <tr class="extrl">
            <td data-th="Name" class="widthper16">
                <div class="fra-title" id="data">{{$instaResult->name}}<span>{{date('d-m-Y', strtotime($instaResult->create_date))}}</span></div>
            </td>
            <td data-th="Email" class="widthper24">
                <div class="fra-title" id="data">
                    "xxxxxxxx@gmail.com"
                </div>
            </td>
            <td data-th="Address" class="widthper30">
                <div class="fra-title" id="data">
                    xxxxxxx,pincode:-xxxxxx,xxxxxx
                </div>
            </td>
            <td data-th="Phone" class="widthper12">
                <div class="fra-title" id="data">
                    xxxxxxxxxx
                </div>
            </td>
        </tr>
    @endif
@endforeach --}}

								</tbody>
							</table>
						</div>
						<div class="pull-right">{{ $insta->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection