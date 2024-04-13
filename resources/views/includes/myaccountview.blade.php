<div class="welhaed marleft investleft">Welcome {{Auth::user()->name}}
    @if(Auth::user()->membership_type == 1)
        <div class="expireplan">Plan expires:
            <span>{{date('d/m/Y', strtotime(session()->get('membership_expiry')))}}</span></div>
    @endif
</div>
<div class="row row-no-margin martn30 investmyprofile">
    <div class="col-sm-12 col-sm-4 col-md-4 padleft10">
        <div class="backwhite bgimgepres pad20">
            <div class="msectio"><span>{{ $count }}</span>
                Expressed Interest
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-sm-4 col-md-4">
        <div class="backwhite bgimgyear pad20">
            <div class="msectio"><span>{{date('d/m/Y', strtotime(Auth::user()->created_at))}}</span>
                Member since
            </div>
        </div>
    </div>

    @php
        switch (Auth::user()->membership_plan) {
            case 402 :
                $planCss = 'copperplan';
                $plan = 'Copper';
            break;
            case 403 :
                $planCss = 'sliverplan';
                $plan = 'silver';
            break;
            case 404 :
                $planCss = 'goldplan';
                $plan = 'Gold';
            break;
            case 405 :
                $planCss = 'platinumplan';
                $plan = 'Platinum';
            break;
            default:
                $planCss = 'basicplan';
                $plan = 'Basic';
        }
    @endphp

    <div class="col-sm-12 col-sm-4 col-md-4">
        <div class="backwhite bgimgship {{ $planCss }} pad20">
            <div class="msectio"><span>{{ $plan }}</span>
                (Membership)
            </div>

            @if(Auth::user()->membership_plan == 401)
                <div class="investviewleft"><a href="{{ Config('constants.MainDomain') }}/investor/myaccount/payment"
                                               class="btn btn-default btnupg">Upgrade Account </a></div>
            @else
                <div class="investviewleft">
                    Credits left:
                    @if (Auth::user()->membership_plan != 405)
                        {{ $credits->credit_limit }} / {{ $credits->total_credits }}
                    @else
                        Unlimited
                    @endif

                    @if(!empty($membershipDays))
                        @php
                            $date1 = new \DateTime($membershipDays->expiry_date);  //current date or any date
                            $date2 = new \DateTime(date('Y-m-d'));   //Future date
                            $diff = $date2->diff($date1)->format("%a");  //find difference
                            $days = intval($diff);   //rounding days
                        @endphp
                    <span>{{ $days }} Days Left</span></div>
                @endif
            @endif
        </div>
    </div>
</div>

    
