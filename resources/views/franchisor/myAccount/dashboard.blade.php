@extends('layout.master')
@section('db')
    class="selected"
@endsection
@section('content')
    <div class="container myaccount">
        <div class="row row-no-margin">
            @include('includes.myfranchiseleft')
            <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                @include('includes.myaccountfranchiseview')
                <h2 class="myheadAUdi">Audience Overview</h2>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 marleft">
                        <div class="row newclassmar">
                            <h2 class="mysubhead fleft">Insta Interest</h2>
                            <div class="viewlink"><a href="{{ url('franchisor/myaccount/insta-response') }}"> View All <i
                                        class="fa fa-angle-right" aria-hidden="true"></i> <span></span></a></div>
                        </div>
                        <div class="bor-radius backwhite ovfl exyab">
                            @if (request()->user()->membership_type != 1)
                                <div class="freeoverhdash">
                                    <p>Please upgrade your Account to utilise further benifits.</p>
                                    <a href="{{ url('franchisor/myaccount/payment-plan') }}" class="btn btn-default">Upgrade
                                        Account</a>
                                </div>
                            @endif
                            <table class="table table-responsive">
                                <thead class="thead-inverse">
                                    <tr class="tabg">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                        $ded = 0;
                                        $basic_count = 5;
                                    @endphp
                                    @foreach ($insta->take(5) as $instaApply)
                                        @if ($leadcount > $basic_count)
                                            @php
                                                $ded = $leadcount - $basic_count; // Calculate the difference

                                            @endphp
                                        @endif
                                        @if ($i < $ded)
                                            <tr class="extrl">
                                                <td>
                                                    <div class="fra-title">{{ $instaApply->name . '' . $instaApply->lname }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fra-title">
                                                        {{ $instaApply->visibility == 1 ? $instaApply->email : 'Not Visible' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fra-title">
                                                        {{ $instaApply->visibility == 1 ? $instaApply->phone : 'Not Visible' }}
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @elseif($i >= $ded && $i <= $basic_count)
                                            <tr class="extrl">
                                                <td>
                                                    <div class="fra-title">{{ $instaApply->name . '' . $instaApply->lname }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fra-title">
                                                        {{ $franData->fleads_status == 1 || $instaApply->visibility == 1 ? $instaApply->email : 'Not Visible' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fra-title">
                                                        {{ $franData->fleads_status == 1 || $instaApply->visibility == 1 ? $instaApply->phone : 'Not Visible' }}
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @elseif ($i <= $basic_count)
                                            <tr class="extrl">
                                                <td>
                                                    <div class="fra-title">{{ $instaApply->name . '' . $instaApply->lname }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fra-title">
                                                        {{ $franData->fleads_status == 1 || $instaApply->visibility == 1 ? $instaApply->email : 'Not visible' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fra-title">
                                                        {{ $franData->fleads_status == 1 || $instaApply->visibility == 1 ? $instaApply->phone : 'Not visible' }}
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 marleftmir">
                        <div class="row newclassmar">
                            <h2 class="mysubhead fleft">Expressed Interest</h2>
                            <div class="viewlink"><a href="{{ url('franchisor/myaccount/expressed-interest') }}"> View All
                                    <i class="fa fa-angle-right" aria-hidden="true"></i> <span></span></a></div>
                        </div>
                        <div class="bor-radius backwhite ovfl exyab">
                            @if (!empty(request()->user()) && request()->user()->membership_type != 1)
                                <div class="freeoverhdash">
                                    <p>Please upgrade your Account to utilise further benefits.</p>
                                    <a href="{{ url('franchisor/myaccount/payment-plan') }}"
                                        class="btn btn-default">Upgrade Account</a>
                                </div>
                            @endif
                            <table class="table table-responsive">
                                <thead class="thead-inverse">
                                    <tr class="tabg">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($expressedInterests))
                                        @foreach ($expressedInterests as $expData)
                                            @if (!is_null($expData->investor) && !is_null($expData->investor->userDetail))
                                                @php
                                                    $name = $expData->investor->userDetail->name;

                                                    $email = 'Not visible';
                                                    $mobile = 'Not visible';
                                                    if (
                                                        request()->user()->membership_type == 1 &&
                                                        $expData->franchisor_visibility == 1
                                                    ) {
                                                        $email = $expData->investor->userDetail->email;
                                                        $mobile = $expData->investor->userDetail->mobile;
                                                    }
                                                @endphp
                                                <tr class="extrl">
                                                    <td>
                                                        <div class="fra-title">{{ $name }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="fra-title">{{ $email }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="fra-title">{{ $mobile }}</div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
