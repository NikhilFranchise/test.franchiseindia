@extends('layout.master')
@section('ei')
    class="selected"
@endsection
@section('content')
    <div class="container myaccount">
        <div class="row row-no-margin">
            @include('includes.myfranchiseleft')
            <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                <div class="row row-no-margin">
                    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding padleft10">
                        <h2 class="mysubhead fleft marhaedtop">Expressed Interest</h2>
                        @php
                            $href = "href=# disabled";
                            if(!empty(request()->user()) && request()->user()->membership_type == 1)
                            $href = "href=/all-interests-csv";
                        @endphp
                        <a {{$href}} class="btn btn-default dwlbtn" id="export">Download Response</a>
                        <div class="clearfix"></div>
                        <div class="bor-radius backwhite ovfl exyab">
                            @if(request()->user()->membership_type != 1)
                                <div class="freeoverh">
                                    <p>Please upgrade your Account to utilise further benifits.</p>
                                    <a href="{{url('franchisor/myaccount/payment-plan')}}" class="btn btn-default">Upgrade Account</a>
                                </div>
                            @endif
                            <table class="table table-responsive">
                                <thead class="thead-inverse">
                                <tr class="tabg">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Investment</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($expressedInterests as $expData)
                                    @php
                                        $address = "Not Visible";
                                        $invAmt  = Config('constants.investRangeInWords.'.$expData->investor->inv_amt);
                                        $name    = $expData->investor->userDetail->name;
                                        $email   = "xxxxx@gmail.com";
                                        $mobile  = "99xxxxxxxx";
                                        $address = "xxxxxxxx,Pin-code:-xxxxxx";

                                        if(request()->user()->membership_type == 1 && $expData->franchisor_visibility == 1 ) {
                                            $address = "";
                                            if(!empty($expData->investor->inv_address))
                                                $address .= $expData->investor->inv_address.", ";
                                            if(!empty($expData->investor->inv_city))
                                                $address .= $expData->investor->inv_city.", ";
                                            if(!empty($expData->investor->inv_state))
                                                $address .= $expData->investor->inv_state.", ";
                                            if(!empty($expData->investor->inv_pincode))
                                                $address .= "Pin-code:-".$expData->investor->inv_pincode.", ";
                                            if(!empty($expData->investor->inv_country))
                                                $address .= $expData->investor->inv_country;

                                            $email  = $expData->investor->userDetail->email;
                                            $mobile = $expData->investor->userDetail->mobile;
                                        }
                                    @endphp
                                    <tr class="extrl">
                                        <td data-th="Name" class="widthper16">
                                            <div class="fra-title" id="data">
                                                {{ $name }} <span>{{ $expData->visit_date }}</span>
                                            </div>
                                        </td>
                                        <td data-th="Email" class="widthper24">
                                            <div class="fra-title" id="data">
                                                {{ $email }}
                                            </div>
                                        </td>
                                        <td data-th="Available Capital" class="widthper16">
                                            <div class="fra-title" id="data">
                                                {{ $invAmt }}
                                            </div>
                                        </td>
                                        <td data-th="Address" class="widthper30">
                                            <div class="fra-title" id="data">
                                                {{ $address }}
                                            </div>
                                        </td>
                                        <td data-th="Mobile" class="widthper12">
                                            <div class="fra-title" id="data">
                                                {{ $mobile }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right"> {{ $expressedInterests->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection