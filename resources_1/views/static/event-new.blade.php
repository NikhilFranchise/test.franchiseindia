@extends('layout.master')
@section('content')
    <!--form start here -->
    <div class="container formsection margintop60 eveblk">


        <style type="text/css">
            h1.evn {
                font-family: "Open Sans Light", "serif";
                font-size: 40px;
                line-height: 30px;
                color: #333333;
                margin-bottom: 15px;
                margin-top: 0;
            }

            .eventbor {
                border-bottom: 1px solid #dfdfdf;
                height: 65px;
                margin-left: 15px;
                margin-right: 15px;
            }

            ul.eventlist {
                margin-left: -15px;
                margin-right: -30px;
            }

            ul.eventlist li {
                border-radius: 4px;
                background: #fff;
                width: 380px;
                height: 480px;
                /*display:inline-block;*/
                float: left;
                margin-left: 15px;
                margin-right: 15px;
                margin-bottom: 30px;
                position: relative;
                border: 1px solid #d4d4d4;
            }

            ul.eventlist li .imgblk {
                position: relative;
                width: 378px;
                height: 231px;
            }

            ul.eventlist li .imgblk img.bdr {
                border-bottom: 2px solid #d4d4d4;
                border-top-right-radius: 4px;
                border-top-left-radius: 4px;
            }

            ul.eventlist li .imgblk .backdr {
                position: absolute;
                /*background: rgba(0, 0, 0, 0.4);*/
                width: 100%;
                height: 100%;
                border-top-right-radius: 4px;
                border-top-left-radius: 4px;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
            }

            ul.eventlist li .imgblk .backdr.moredark {
                background: rgba(0, 0, 0, 0.6);
            }

            ul.eventlist li .logocent {
                height: 228px;
                width: 378px;
                display: table-cell;
                vertical-align: middle;
                text-align: center;
            }

            .demopadding {
                float: none;
                width: 230px;
                text-align: center;
                margin: -22px auto 0;
                position: relative;
            }

            .demopadding .icon {
                position: relative;
                text-align: center;
                width: 41px;
                height: 41px;
                border-radius: 50%;
                color: #999999;
            }

            .demopadding .icon i {
                font-size: 21px;
                position: absolute;
                left: 9px;
                right: 9px;
                top: 9px;
                bottom: 9px;
            }

            .demopadding .icon.social {
                float: left;
                margin: 0 5px 0 0;
                cursor: pointer;
                background: #fff;
                color: #444;
                transition: 0.5s;
                -moz-transition: 0.5s;
                -webkit-transition: 0.5s;
                -o-transition: 0.5s;
                border: 1px solid #444;
            }

            .demopadding .icon.social a {
                color: #444;
            }

            .demopadding .icon.social a:hover {
                color: #ed2027;
            }

            .demopadding .icon.social:hover {
                background: #fff;
                color: #ed2027;
                border: 1px solid #ed2027;
            }

            .demopadding .icon.social:hover a {
                color: #ed2027;
            }

            .demopadding .icon.social.fb i {
                left: 13px;
                top: 9px;
            }

            .demopadding .icon.social.tw i {
                left: 11px;
                top: 8px;
            }

            .demopadding .icon.social.in i {
                left: 11px;
                top: 8px;
            }

            .eventcontentblk {
                text-align: center;
                clear: both;
                overflow: hidden;
            }

            .eventcontentblk .eventhdk {
                font-size: 20px;
                font-family: "Open Sans Bold", "serif";
                line-height: 20px;
                color: #333;
                margin: 20px 0;
                padding: 0 27px;
            }

            .eventcontentblk .venuedate {
                font-size: 16px;
                font-family: "Open Sans Bold", "serif";
                line-height: 18px;
                color: #333;
                margin: 20px 0;
                text-transform: uppercase;
            }

            .eventcontentblk .venuedate span {
                font-family: "Open Sans Regular", "serif";
                display: block;
                font-size: 14px;
            }

            .eventcontentblk .btn-default.eventbtn {
                padding: 5px 15px;
                font-family: "Open Sans Regular", "serif";
                font-size: 14px;
                background: #dc3322;
                text-transform: uppercase;
                color: #fff;
            }

            .eventcontentblk .btn-default.eventbtn:hover {
                background: #333;
                border: 1px solid #333;
            }

            .eventhotline {
                position: absolute;
                bottom: 0;
                text-align: center;
                width: 100%;
                background: #fbfbfb;
                height: 40px;
                border-top: 1px solid #d4d4d4;
                font-family: "Open Sans Bold", "serif";
                font-size: 18px;
                color: #333333;
                padding-top: 7px;
                text-transform: uppercase;
                border-bottom-right-radius: 4px;
                border-bottom-left-radius: 4px;
            }

            .eventhotline span {
                font-family: "Open Sans Semibold";
            }

            .eventtabblk ul.nav-tabs {
                border-bottom: 0;
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
            }

            .eventtabblk .nav-tabs>li {
                margin-right: 5px;
                display: inline-block;
                float: none;
            }

            .eventtabblk .nav-tabs>li>button {
                background: #fff;
                border: 1px solid #d4d4d4;
                font-family: "Open Sans Regular", "serif";
                font-size: 14px;
                color: #333;
                line-height: 20px;
                border-radius: 4px;
                cursor: pointer;
                padding: 10px 28px;
            }

            .eventtabblk .nav-tabs>li>button.active,
            .eventtabblk .nav-tabs>li>button:focus,
            .eventtabblk .nav-tabs>li>button:hover {
                background: #333;
                border: 1px solid #333;
                color: #fff;
                cursor: default;
            }

            .eventtabblk .nav-tabs>li>a:hover {
                background: #333;
                border: 1px solid #333;
                color: #fff;
            }

            .eventserblk {
                float: right;
                text-align: right;
                margin-right: 0;
            }

            /* .eventserblk ul.seablk li:last-child {display:inline-block;   width:46px;} */
            .eventserblk ul.seablk li .form-control {
                box-shadow: none;
                height: 46px;
                border-radius: 5px;
            }

            .eventserblk ul.seablk li .btn-default.searchevent {
                background: #333;
                padding: 5px;
                border: 1px solid #333;
                color: #fff;
                padding: 8px 15px;
                margin-top: -6px;
            }

            .eventserblk ul.seablk li .btn-default.searchevent .fa-search {
                font-size: 15px;
                font-weight: 100;
            }

            .rightp {
                text-align: right;
                margin-top: 13px;
                padding-right: 0;
            }

            .rightp a {
                font-family: "Open Sans Regular", "serif";
                background-color: #fff;
                color: #666;
                padding: 11px 17px 10px;
                font-size: 14px;
                cursor: pointer;
                border-radius: 5px;
                border: 1px solid #d4d4d4;
            }

            .rightp a:hover {
                background: #333;
                color: #fff;
            }

            .eventserblk .dropbtn {
                font-family: "Open Sans Regular", "serif";
                background-color: #fff;
                color: #666;
                padding: 10px 12px 10px;
                font-size: 14px;
                cursor: pointer;
                border-radius: 5px;
                border: 1px solid #d4d4d4;
                width: 188px;
                text-align: left;
            }

            .eventserblk ul.seablk li.rightp a:hover {
                background: #333;
                color: #fff;
            }

            .eventserblk .dropbtn:hover,
            .eventserblk .dropbtn:focus {
                background-color: #fff;
                border: 1px solid #d4d4d4;
            }

            .eventserblk .dropdown {
                position: relative;
                display: inline-block;
            }

            .eventserblk .dropdown-content {
                display: none;
                position: absolute;
                background-color: #fff;
                width: 213px;
                min-width: 160px;
                /*overflow-y: auto;*/
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
                z-index: 3;
                color: #333333;
                padding-top: 20px;

            }

            .eventserblk .dropdown-content a {
                color: black;
                text-decoration: none;
                display: block;
            }

            .eventserblk .dropdown a:hover {
                background-color: #ddd;
            }

            .eventserblk .showDiv {
                display: block;
            }

            .eventserblk .dropbtn img.shercode {
                padding-top: 8px;
                float: right;
            }

            .eventserblk ul.eventlistpkg {
                /* height: 300px; */
                overflow: auto;
                margin-right: 20px;
                margin-bottom: 20px;
            }

            .eventserblk ul.eventlistpkg li {
                display: block;
                width: 100%;
                text-align: left;
                margin-left: 0;
            }

            .eventserblk ul.eventlistpkg li label {
                padding: 3px 7px 3px 15px;
                margin: 0 0 0;
                display: block;
                color: #333333;
            }

            .eventserblk ul.eventlistpkg li label:hover {
                /*background:#eee;*/
                cursor: pointer;
            }

            .eventserblk ul.subevent {
                margin-left: 20px;
            }

            .eventserblk ul.subevent li {}

            .eventserblk .eventclose {
                display: block;
                float: right;
                margin-right: 10px;
                margin-top: -15px;
                cursor: pointer;
            }

            .eveblk .tab-content .tab-pane.active {
                clear: both !important;
            }

            /************Tab Button css************/

            /* Create three equal columns that floats next to each other */
            .column {
                display: none;
                /* Hide all elements by default */
            }

            .showDiv {
                display: block;
            }

            #myBtnContainer .bstimeslider #leftArrow,
            #myBtnContainer .bstimeslider #rightArrow {
                display: none;
            }

            #myBtnContainer .bstimeslider #leftArrow:hover,
            #myBtnContainer .bstimeslider #rightArrow:hover {
                color: #f22406;
            }

            #eventEnquire .modal-dialog {
                width: 460px;
                min-height: 250px;
            }

            #eventEnquire .modal-body {
                padding: 20px 40px 10px;
                font-family: 'Open Sans Regular', "serif";
                font-size: 14px;
            }

            #eventEnquire .modal-body .adhead {
                text-align: center;
                font-size: 18px;
                font-family: 'Open Sans Regular', "serif";
                line-height: 20px;
                margin-bottom: 5px;
                color: #333;
            }

            #eventEnquire .modal-body .subadhead {
                text-align: center;
                font-size: 15px;
                font-family: 'Open Sans Bold', "Serif";
                color: #666;
            }

            #eventEnquire .frm-pnl {
                margin-top: 15px;
                margin-bottom: 15px;
            }

            #eventEnquire .frm-pnl .input-group {
                margin-bottom: 15px;
            }

            #eventEnquire .modal-body .btn-default.btn-propad {
                margin: 0 auto;
                display: block;
                text-align: center;
                float: none;
                background: #333;
                color: #fff;
                border: 1px solid #fff;
            }

            #eventEnquire .modal-body .btn-default.btn-propad:hover {
                background: #fff;
                color: #333;
                border: 1px solid #333;
            }

            @media only screen and (min-width: 320px) and (max-width: 767px) {
                .demopadding {
                    width: 230px;
                }

                #myBtnContainer .bstimeslider #leftArrow,
                #myBtnContainer .bstimeslider #rightArrow {
                    display: block;
                }

                .rm-txt {
                    display: none;
                }

                .bstimeslider {

                    width: 100%;
                    height: 60px;
                    background: transparent;
                    position: relative;
                }

                .bstimeslider ul li {
                    float: left;
                    font-size: 18px;
                    display: block;
                    color: #fff;
                }

                #tslshow {
                    position: absolute;
                    left: 0;
                }

                #leftArrow {

                    width: 15px;
                    height: 42px;
                    position: absolute;
                    left: 15px;
                    z-index: 1;
                    top: 9px;
                }

                #rightArrow {
                    width: 15px;
                    height: 42px;
                    position: absolute;
                    right: 15px;
                    z-index: 1;
                    top: 9px;
                }

                #viewContainer {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    /* left:50%;
                                                                                margin-left:-180px; */
                    overflow: hidden;
                }

                h1.evn {
                    font-size: 25px;
                    line-height: 25px;
                    font-size: 19px;
                    margin-left: 15px;
                    margin-top: 9px;
                }

                .eventbor {
                    height: 100px;
                    padding: 0 10px;
                    margin: 0 auto 20px;
                }

                .eventbor .col-md-3.mdfy {
                    padding: 0;
                    width: 36%;
                    float: left;
                }

                .eventserblk .dropbtn {
                    width: 340px;
                }

                ul.eventlist {
                    margin: 30px auto;
                }

                ul.eventlist li {
                    width: auto;
                    float: none;
                    height: auto;
                    padding-bottom: 60px;
                }

                ul.eventlist li .imgblk {
                    width: 100%;
                    height: auto;
                }

                ul.eventlist li .imgblk img.bdr {
                    width: 100%;
                }

                ul.eventlist li .logocent {
                    height: 174px;
                    width: 320px;
                }

                .eventtabblk ul.nav-tabs {
                    margin-top: 10px;
                }

                .eventtabblk .nav-tabs>li {
                    margin: 0 auto;
                }

                .eventtabblk .nav-tabs>li {
                    display: block;
                    float: left;
                }

                .eventtabblk .nav-tabs>li>a {
                    padding: 10px 10px;
                    font-size: 12px;
                }

                .eventbor .col-md-7.mdfy {
                    width: 50%;
                }

                .eventbor .col-md-3.rightp {
                    width: 50%;
                    padding-right: 20px;
                }

                .eventbor .col-md-2.eventserblk {
                    width: 100%;
                }

                #eventEnquire .modal-dialog {
                    width: 92%;
                }

                .eventserblk .dropdown-content {
                    width: 100%;
                }
            }

            @media only screen and (min-width: 320px) and (max-width: 359px) {

                .eventserblk .dropbtn {
                    width: 300px;
                }

                .eventserblk .dropdown-content {
                    width: 100%;
                }

                h1.evn {
                    font-size: 22px;
                }

            }

            @media only screen and (min-width: 480px) and (max-width: 599px) {

                .eventserblk {
                    text-align: center;
                }

                .eventserblk .dropdown-content {
                    width: 100%;
                }
            }

            @media only screen and (min-width: 600px) and (max-width: 767px) {
                .eventbor .col-md-7.mdfy {
                    width: 28%;
                }

                .eventbor .col-md-3.rightp {
                    width: 35%;
                }

                .eventbor .col-md-2.eventserblk {
                    width: 37%;
                }

                #myBtnContainer .bstimeslider #leftArrow,
                #myBtnContainer .bstimeslider #rightArrow {
                    display: none;
                }

                .bstimeslider {
                    height: auto;
                }

                #viewContainer {
                    position: static;
                    overflow: inherit;
                }

                #tslshow {
                    position: static;
                    left: 0;
                    width: auto;
                }


                .eventserblk ul.seablk li {
                    width: auto;
                    float: none;
                }

                .eventtabblk .nav-tabs>li {
                    display: inline-block;
                    float: none;
                }

                .eventtabblk .nav-tabs>li>button {
                    padding: 10px 13px;
                }
            }

            @media only screen and (min-width: 768px) and (max-width: 1023px) {
                .eventbor {
                    margin-left: 0;
                    margin-right: 0;
                    height: 50px;
                }

                .eventbor .col-md-3.mdfy {
                    padding: 0;
                    width: 21%;
                }

                .eventbor .col-md-7.eventserblk {
                    width: 79%;
                    float: left;
                    padding: 0;
                }

                h1.evn {
                    font-size: 36px;
                    line-height: 30px;
                }

                .eventserblk ul.seablk li {
                    display: inline-block;

                    margin-left: 0;
                }

                .eventserblk .dropbtn {
                    width: 170px
                }

                .eventtabblk .nav-tabs>li {
                    margin-bottom: 10px;
                }

                ul.eventlist li {
                    width: 345px;
                }

                ul.eventlist li .imgblk {
                    width: 100%;
                    height: auto;
                }

                ul.eventlist li .imgblk img.bdr {
                    width: 100%;
                }

            }

            @media only screen and (min-width: 1024px) and (max-width: 1199px) {
                .eventtabblk .nav-tabs>li {
                    margin-bottom: 15px;
                }

                .eventbor .col-md-7.mdfy {
                    width: 50%;
                }

                .eventbor {
                    margin-left: -30px;
                    margin-right: -30px;
                    height: 50px;
                }

                .eventbor .col-md-3.rightp {
                    width: 28%;
                }

                .eventbor .col-md-2.eventserblk {
                    width: 22%;
                }

                ul.eventlist {
                    width: 820px;
                    margin: 0 auto;
                }

                .eventtabblk .nav-tabs>li>a {
                    padding: 10px 12px;
                    font-size: 13px;
                }

            }

            @media only screen and (min-width: 1024px) and (max-width: 1199px) {
                ul.sublink li a {
                    margin-left: 10px;
                }
            }

            @media only screen and (min-width: 768px) and (max-width: 1023px) {
                .sublinkdrop {
                    margin-left: 10px;
                }
            }
        </style>
        <div class="row">
            <div class="eventbor" style="margin-top:40px; ">
                <div class="col-xs-12 col-sm-6 col-md-7 mdfy">
                    <h1 class="evn">Upcoming Events</h1>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 rightp">
                    <a href="{{ Config::get('constants.MainDomain') }}/event-archives">Archives</a>

                </div>
            </div>
        </div>
        <!-- Vikas  -->

        <style type="text/css">
            .countdays {
                font-size: 18px;
                color: #fff;
                position: absolute;
                z-index: 1;
                font-weight: 700;
            }

<<<<<<< HEAD
        </style>
        <style type="text/css">
            .countdays { font-size:14px; line-height:20px;  color: #fff; position: absolute; z-index:1;
                font-weight: 700; right:5px; top:5px;
=======
            .countdays {
                font-size: 14px;
                line-height: 20px;
                color: #fff;
                position: absolute;
                z-index: 1;
                font-weight: 700;
                right: 5px;
                top: 5px;
>>>>>>> 44a65acebac476d58bce17b47d051357f1b4f430
                background: #dc3322;
                padding: 5px;
                border-radius: 4px;
            }

        </style>
        @php
            $closed = [];
            $currentd = date('Y/m/d');

            // Define the timecount function if it doesn't already exist
if (!function_exists('timecount')) {
    function timecount($currentd, $eventdate)
    {
        $startTimeStamp = strtotime($currentd);
        $endTimeStamp = strtotime($eventdate);
        $timeDiff = $endTimeStamp - $startTimeStamp;
        $numberDays = $timeDiff / 86400; // 86400 seconds in one day

        // Determine the display value
        if ($numberDays == 0) {
            return 'Today';
        } elseif ($numberDays < 1) {
            return 'Closed';
        } else {
            return 'in ' . intval($numberDays) . ' Days';
                    }
                }
            }
        @endphp
        <br><br>
        <ul class="eventlist" style="clear:both;">
            @foreach ($events as $event)
                @php
                    if (timecount($currentd, $event['start_date']) == 'Closed') {
                        $closed[] = $event;
                    }
                @endphp
                @if (timecount($currentd, $event['start_date']) != 'Closed')
                    <li class="column fro others">
                        <a href="{{ $event['url'] }}" target="_blank">
                            <div class="imgblk">
                                <div class="backdr">
                                    <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{ timecount($currentd, $event['start_date']) }} </div>
                                    <div class="logocent"> </div>
                                </div>

                                <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="bdr">
                            </div>
                        </a>
                        <div class="demopadding">
                            <div class="icon social fb">
                                <a href="{{ $event['facebook'] }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="icon social tw">
                                <a href="{{ $event['twitter'] }}" target="_blank"><img
                                        src="{{ url('images/twitter.jpg') }} " style="width: 22px;margin-top: 7px;"></a>
                            </div>
                            <div class="icon social in">
                                <a href="{{ $event['linkedin'] }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </div>
                            {{-- Instagram --}}
                            <div class="icon social ig">
                                <a href="{{ $event['instagram'] ?? '' }}" target="_blank"><i
                                        class="fa fa-instagram"></i></a>
                            </div>

                            {{-- YouTube --}}
                            <div class="icon social yt">
                                <a href="{{ $event['youtube'] ?? '' }}" target="_blank"><i
                                        class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                        <div class="eventcontentblk">
                            <div class="eventhdk">{{ $event['title'] }}
                            </div>
                            <div class="venuedate">
                                {{ $event['date'] }}

                                <span> {{ $event['venue'] == 'N/A' ? '' : $event['venue'] }}</span>
                            </div>

                            <a href="{{ $event['url'] }}" target="_blank" class="btn btn-default eventbtn">Registration</a>
                        </div>
                        <div class="eventhotline">
                            Hotline: <span>{{ $event['contact'] }}</span>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="height40"></div>
        <div class="">
            <h2>Past Events</h2>
        </div>
        <div class="height40"></div>
        <ul class="eventlist" style="clear:both;">
            @foreach (array_reverse($closed) as $clos)
                <li class="column fro others">
                    <a href="{{ $clos['url'] }}" target="_blank">
                        <div class="imgblk">
                            <div class="backdr">
                                <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    @php echo 'Closed'; @endphp </div>
                                <div class="logocent"> </div>
                            </div>

                            <img src="{{ $clos['image'] }}" alt="{{ $clos['title'] }}" class="bdr">
                        </div>
                    </a>
                    <div class="demopadding">
                        <div class="icon social fb">
                            <a href="{{ $clos['facebook'] }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        </div>
                        <div class="icon social tw">
                            <a href="{{ $clos['twitter'] }}" target="_blank"><img src="{{ url('images/twitter.jpg') }} "
                                    style="width: 22px;margin-top: 7px;"></a>
                        </div>
                        <div class="icon social in">
                            <a href="{{ $clos['linkedin'] }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="eventcontentblk">
                        <div class="eventhdk">{{ $clos['title'] }}
                        </div>
                        <div class="venuedate"> {{ $clos['date'] }}
                            <span>{{ $clos['venue'] }} </span>
                        </div>

                        <a href="{{ $clos['url'] }}" target="_blank" class="btn btn-default eventbtn">Registration
                            Closed</a>
                    </div>
                    <div class="eventhotline">
                        Hotline: <span>{{ $clos['contact'] }}</span>
                    </div>
                </li>
            @endforeach
            <li class="column fro others">
                <a href="https://www.franchiseindia.com/fro/2021/hyderabad/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2021/03/13'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/fronew2021.jpg" alt=""
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/pg/Franchise-UAE-1025610050786384" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/Franchise_UAE" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">FROEXPO Hyderabad 2021
                    </div>
                    <div class="venuedate">
                        March 13-14, 2021 | 09:00 AM - 06:00 PM

                        <span>HITEX Exhibition Centre,Hyderabad</span>
                    </div>

                    <a href="https://www.franchiseindia.com/fro/2021/hyderabad/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9311254088</span>
                </div>
            </li>
            <li class="column fro others">
                <a href="https://www.franchise.ae/franchise-world-expo/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2021/03/03'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/listing-ae.png" alt="franchise-world-expo"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/pg/Franchise-UAE-1025610050786384" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/Franchise_UAE" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise World Expo
                    </div>
                    <div class="venuedate"> 03 March 2021
                        | 10:00 AM Dubai Time
                        <span>Virtual Expo</span>
                    </div>

                    <a href="https://www.franchise.ae/franchise-world-expo/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929557754</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="https://www.licenseindia.com/labels/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2021/02/25'); @endphp
                            </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/label2021.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndiaLicensingExpo/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/indialicensexpo" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indialicensingexpo/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">LABELS
                    </div>
                    <div class="venuedate"> 25 February 2021
                        <span>Virtual - Conference | Awards | Exhibition </span>
                    </div>
                    <a href="https://www.licenseindia.com/labels/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9999034389</span>
                </div>
            </li>










            <li class="column fro others">
                <a href="https://www.franchiseindia.com/smallbusiness/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2021/02/26'); @endphp
                            </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/sba-2021-new.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Small Business Congress & Awards
                    </div>
                    <div class="venuedate"> 26 February 2021
                        <span> Virtual </span>
                    </div>
                    <a href="https://www.franchiseindia.com/smallbusiness/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>














            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-north/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2021/01/30'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/northfs.png" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - North Region
                    </div>
                    <div class="venuedate"> 30 January 2021
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-north/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>








            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2021/02/06'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/westfs.jpg" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - West Region
                    </div>
                    <div class="venuedate"> 06 February 2021
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>






            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-east/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2021/01/16'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/eastfs.png" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - East Region
                    </div>
                    <div class="venuedate"> 16 January 2021
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-east/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>






            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2021/01/23'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/southfs.png" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - South Region
                    </div>
                    <div class="venuedate"> 23 January 2021
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/influencer/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2021/01/15'); @endphp
                            </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/influencerbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Influencer Summit & Awards
                    </div>
                    <div class="venuedate"> 15 January 2021
                        <span> Virtual </span>
                    </div>
                    <a href="https://www.entrepreneurindia.com/influencer/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>













            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/12/28'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/website-dec-378x228.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - West Region
                    </div>
                    <div class="venuedate"> 29th December 2020
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/12/19'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/southfs.png" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - South Region
                    </div>
                    <div class="venuedate"> 19th December 2020
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>










            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-north/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/12/12'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/northfs.png" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - North Region
                    </div>
                    <div class="venuedate"> 12th December 2020
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-north/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>













            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/12/05'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/westfs.png" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - West Region
                    </div>
                    <div class="venuedate"> 05th December 2020
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>








            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/idea/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i>@php echo timecount($currentd,'2020/12/04'); @endphp
                            </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/ideaevent.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">IDEA Awards
                    </div>
                    <div class="venuedate"> 04th December 2020
                        <span> Virtual </span>
                    </div>
                    <a href="https://www.entrepreneurindia.com/idea/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8595350538</span>
                </div>
            </li>







            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-east/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/11/28'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/eastfs.png" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - East Region
                    </div>
                    <div class="venuedate"> 28th November 2020
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-east/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>













            <li class="column fro others">
                <a href="https://www.estateawards.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/11/25'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/estate29.jpg" alt="Estate Awards"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 20px; font-size:17px;"> Estate Awards
                    </div>
                    <div class="venuedate"> 25th November 2020
                        <span>Virtual Awards</span>
                    </div>

                    <a href="https://www.estateawards.com/" target="_blank" class="btn btn-default eventbtn">Registration
                        Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/11/07'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/southfs.png" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - South Region
                    </div>
                    <div class="venuedate"> 07th November 2020
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-south/" target="_blank"
                        class="btn btn-default eventbtn">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>







            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/10/29'); @endphp </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 29th October 2020
                        <span>Virtual Conference | 05:30 PM </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>




            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/11/01'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/westfs.png" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - West Region
                    </div>
                    <div class="venuedate"> 01st November 2020
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-west/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>









            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-north/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/10/24'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/northfs.png" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - North Region
                    </div>
                    <div class="venuedate"> 24th October 2020
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-north/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>











            <li class="column fro others">
                <a href="https://www.restaurantindia.in/webinar/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/10/20'); @endphp </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/rievent20oct.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/restaurantindia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/IndianRestCong" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                            target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 22px; font-size:18px;">How Restaurants are Relooking the
                        Business model
                    </div>
                    <div class="venuedate"> 20th October 2020
                        <span>Virtual Conference </span>
                    </div>

                    <a href="https://www.restaurantindia.in/webinar/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/edawards/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/10/15'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/eduseptnew.jpg" alt="eduseptnew"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 20px; font-size:17px;"> Indian Education Industry
                    </div>
                    <div class="venuedate"> 30th October 2020
                        <span>Virtual Expo</span>
                    </div>

                    <a href="https://www.entrepreneurindia.com/edawards/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>






            <li class="column fro others">
                <a href="https://www.franchiseindia.com/franchise-show-east/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/10/17'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/eastfs.png" alt="eastfs" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show - East Region
                    </div>
                    <div class="venuedate"> 17th October 2020
                        | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/franchise-show-east/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>


            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_JjTruQjjSSSurDpKwjML0w" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/10/13'); @endphp </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-13.jpg" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 22px; font-size:16px;">
                        Rissala Electric Motors Pvt. Ltd

                    </div>
                    <div class="venuedate"> 13th October 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_JjTruQjjSSSurDpKwjML0w" target="_blank"
                        class="btn btn-default
   eventbtn" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 7290093412</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/10/02'); @endphp </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 02th October 2020
                        <span>Virtual Conference | 03:00 PM </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>












            <li class="column  others">
                <a href="http://campaign.businessex.com/essem/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                            <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i>@php echo timecount($currentd,'2020/09/30'); @endphp
                            </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/businessstarup.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:24px;"> Early Stage Startup
                    </div>
                    <div class="venuedate">30th September 2020 | 10:00 AM
                        <span> Expo and Masterclass
                        </span>
                    </div>
                    <a href="http://campaign.businessex.com/essem/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/09/25'); @endphp </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 25th September 2020
                        <span>Virtual Conference | 03:00 PM </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>












            <li class="column fro others">
                <a href="https://www.franchiseindia.com/fro/frovirtual/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/09/26'); @endphp
                            </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/fro11july.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">FROEXPO Virtual
                    </div>
                    <div class="venuedate"> 26th September 2020 | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/fro/frovirtual/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>











            <li class="column fro others">
                <a href="https://www.masterfranchiseshow.in/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/09/26'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/mfs10sept.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Master Franchise Show
                    </div>
                    <div class="venuedate"> 26th September 2020 | 10:00 AM
                        <span>Virtual Expo</span>
                    </div>

                    <a href="https://www.masterfranchiseshow.in/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>


            <li class="column  others">
                <a href="http://campaign.businessex.com/learningseries/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/09/26'); @endphp </div>

                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bexvaluenew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">LEARNING SERIES - BE<span
                            style="text-transform: lowercase;">x</span> VALUE
                    </div>
                    <div class="venuedate">26th SEPTEMBER 2020 | 03:00 PM
                        <span>Virtual Event | Live Q&A
                        </span>
                    </div>
                    <a href="http://campaign.businessex.com/learningseries/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>
















            <li class="column  others">
                <a href="http://campaign.businessex.com/learningseries/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/09/19'); @endphp
                            </div>

                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bexvaluenew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">LEARNING SERIES - BE<span
                            style="text-transform: lowercase;">x</span> VALUE
                    </div>
                    <div class="venuedate">19th SEPTEMBER 2020 | 03:00 PM
                        <span>Virtual Event | Live Q&A
                        </span>
                    </div>
                    <a href="http://campaign.businessex.com/learningseries/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>









            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/09/18'); @endphp </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 18th September 2020
                        <span>Virtual Conference | 03:00 PM </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>












            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_iT-ZKAZgQGqHeb50NSYI5A" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/09/18'); @endphp </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/jumboking.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Mr. Dheeraj Gupta, Founder & MD, Jumboking Foods Pvt. Ltd.
                    </div>
                    <div class="venuedate"> 18th September 2020 | 11:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_iT-ZKAZgQGqHeb50NSYI5A" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>











            <li class="column fro others">
                <a href="http://bit.ly/CXOShadowfox" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                @php echo timecount($currentd,'2020/09/16'); @endphp </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-16sept.png" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 22px; font-size:16px;">Praharsh Chandra, COO, Shadowfax
                        Technologies Private Limited

                    </div>
                    <div class="venuedate"> 16th September 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://bit.ly/3gzNIcX" target="_blank" class="btn btn-default
   eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 7290093412</span>
                </div>
            </li>










            <li class="column  others">
                <a href="http://campaign.businessex.com/learningseries/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/09/12'); @endphp
                            </div>

                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bexvaluenew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">LEARNING SERIES - BE<span
                            style="text-transform: lowercase;">x</span> VALUE
                    </div>
                    <div class="venuedate">12th SEPTEMBER 2020 | 03:00 PM
                        <span>Virtual Event | Live Q&A
                        </span>
                    </div>
                    <a href="http://campaign.businessex.com/learningseries/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>











            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/09/04'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 04th September 2020
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>










            <li class="column  others">
                <a href="https://www.licenseindia.com/virtualexpo/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/28'); @endphp
                            </div>
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/liexpo28aug.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/pages/License-India/1553532794876110" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/licenseind" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/licenseindia" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:18px;">INDIA�S LARGEST BRAND LICENSING &
                        MERCHANDISING
                    </div>
                    <div class="venuedate">28th August 2020 - 1000 HRS IST
                        <span> </span>
                    </div>
                    <a href="https://www.licenseindia.com/virtualexpo/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9999034389</span>
                </div>
            </li>











            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/28'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 28th August 2020
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>








            <li class="column fro others">
                <a href="https://www.franchiseindia.com/fro/frovirtual/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/28'); @endphp
                            </div>
                            <div class="logocent"> </div>
                        </div>

                        <img src="https://www.franchiseindia.com/images/events/fro11july.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">FROEXPO Virtual
                    </div>
                    <div class="venuedate"> 28th August 2020 | 10:00 AM
                        <span>Virtual </span>
                    </div>

                    <a href="https://www.franchiseindia.com/fro/frovirtual/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>











            <li class="column fro others">
                <a href="http://bit.ly/CXOAnytimeFitness" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/26'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-26aug.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 22px; font-size:16px;">Mr. Vikas Jain, MD & CEO, Anytime
                        Fitness India

                    </div>
                    <div class="venuedate"> 26th August 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="http://bit.ly/CXOAnytimeFitness" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>










            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/21'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 21st August 2020
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>











            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_8n9K5LJ7QN-TGEpmLliN5Q" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/19'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-19aug.png" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 22px; font-size:16px;">Franchise CXO Dialogue |Arunabh
                        Sinha, Founder and CEO, UClean

                    </div>
                    <div class="venuedate"> 19th August 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_8n9K5LJ7QN-TGEpmLliN5Q" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 7290093412</span>
                </div>
            </li>


            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/14'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 14th August 2020
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>


            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_XcFv7_BARqKhzEFJw5hDMg" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/12'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-12aug.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 22px; font-size:16px;">Franchise CXO Dialogue | Mr.
                        Sasidhar Nandigam, Chief Strategy Officer,
                        CredR

                    </div>
                    <div class="venuedate"> 12th August 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_XcFv7_BARqKhzEFJw5hDMg" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 7290093412</span>
                </div>
            </li>








            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/07'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 07th August 2020
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>










            <li class="column fro others">
                <a href=" https://us02web.zoom.us/webinar/register/WN_l5aPrN6KSXeFDIS40Sx_Hw" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/06'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/capital06.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 19px; font-size:17px;"> How startups need to find the
                        tradeoff between Unit economics & growth economics
                    </div>
                    <div class="venuedate"> 06 August 2020 | 1:00PM- 2:00PM IST
                        <span>Webinar </span>
                    </div>

                    <a href=" https://us02web.zoom.us/webinar/register/WN_l5aPrN6KSXeFDIS40Sx_Hw" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>







            <li class="column  others">
                <a href="http://campaign.businessex.com/sme-webseries/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                            <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i>@php echo timecount($currentd,'2020/08/06'); @endphp
                            </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/sme-30july.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">SME WEBSERIES - BE<span
                            style="text-transform: lowercase;">x</span>
                    </div>
                    <div class="venuedate">06 August 2020 | 03:00 PM
                        <span>Virtual Conference | Live Q&A
                        </span>
                    </div>
                    <a href="http://campaign.businessex.com/sme-webseries/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_VnWbex6VSWuxodrt-ozn_w" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/05'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-5aug.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 24px; font-size:17px;">Arjun Mohan, CEO-India, upGrad
                        Education Pvt. Ltd.

                    </div>
                    <div class="venuedate"> 05th August 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_VnWbex6VSWuxodrt-ozn_w" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 7290093412</span>
                </div>
            </li>

















            <li class="column fro others">
                <a href="https://www.restaurantindia.in/delivering-sales/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/08/03'); @endphp
                            </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/rest03aug.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/restaurantindia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/IndianRestCong" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                            target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Delivering Sales - New Insights &
                        Lessons Learnt
                    </div>
                    <div class="venuedate">03rd August 2020 | 03:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.restaurantindia.in/delivering-sales/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>

                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/07/31'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 31st July 2020
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>


                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>











            <li class="column  others">
                <a href="http://campaign.businessex.com/sme-webseries/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                            <div class="countdays"> <i class="fa fa-clock-o" aria-hidden="true"></i>@php echo timecount($currentd,'2020/07/30'); @endphp
                            </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/sme-30july.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">SME WEBSERIES - BE<span
                            style="text-transform: lowercase;">x</span>
                    </div>
                    <div class="venuedate">30th July 2020 | 03:00 PM
                        <span>Virtual Conference | Live Q&A
                        </span>
                    </div>
                    <a href="http://campaign.businessex.com/sme-webseries/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>








            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/virtual-awards/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/07/29'); @endphp
                            </div>
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/eiawardsback.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Entrepreneur Awards 2020

                    </div>
                    <div class="venuedate"> 29th July 2020
                        <span>Virtual Awards </span>
                    </div>
                    <a href="https://www.entrepreneurindia.com/virtual-awards/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_jErs3mxCRKSrqUI1hFkizQ" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/07/29'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-29julynew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 24px; font-size:17px;">Amit Chaudhary, COO, Lenskart
                        Solutions Pvt. Ltd.

                    </div>
                    <div class="venuedate"> 29th July 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_jErs3mxCRKSrqUI1hFkizQ" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>









            <li class="column  others">
                <a href="https://us02web.zoom.us/webinar/register/WN_dpIMPmKvQBKpc6hzo4dCXg" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/07/27'); @endphp
                            </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bextally.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">SME WEBSERIES - BE<span
                            style="text-transform: lowercase;">x</span>
                    </div>
                    <div class="venuedate">27th July 2020 | 03:00 PM
                        <span>Virtual Conference | Live Q&A
                        </span>
                    </div>
                    <a href="https://us02web.zoom.us/webinar/register/WN_dpIMPmKvQBKpc6hzo4dCXg" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>










            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/07/24'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 24th July 2020
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>





            <li class="column  others">
                <a href="https://us02web.zoom.us/webinar/register/WN_cXuMVrkVQASSF_ySxzR4DA" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/07/25'); @endphp
                            </div>

                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bexvaluenew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">LEARNING SERIES - BE<span
                            style="text-transform: lowercase;">x</span> VALUE
                    </div>
                    <div class="venuedate">25th July 2020 | 03:00 PM
                        <span>Virtual Event | Live Q&A
                        </span>
                    </div>
                    <a href="https://us02web.zoom.us/webinar/register/WN_cXuMVrkVQASSF_ySxzR4DA" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="https://bit.ly/3hhIWBM" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/07/22'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxolsiting22.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 24px; font-size:17px;">Mr. Harshit Vyas

                        Chief Business Officer, OYO Hotels & Homes
                    </div>
                    <div class="venuedate"> 22nd July 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://bit.ly/3hhIWBM" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_bW7KFWSXSq6TlT64tbP9vg" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/07/22'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/capital22.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk"> Capital Insider Series- Multiplying Your Wealth
                    </div>
                    <div class="venuedate"> 22th July 2020 | 12:30PM- 1:30PM IST
                        <span>Webinar </span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_bW7KFWSXSq6TlT64tbP9vg  " target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>





























            <li class="column fro others">
                <a href="https://www.franchiseindia.com/fro/frovirtual/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/fro11july.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">FROEXPO Virtual
                    </div>
                    <div class="venuedate"> 18th July 2020 | 10:00 AM
                        <span>Virtual</span>
                    </div>

                    <a href="https://www.franchiseindia.com/fro/frovirtual/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9582181817</span>
                </div>
            </li>






            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 17th July 2020 | 03:00 PM
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>









            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_7N67MFN5Q5-TXcRHB6t3Rg" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/capital16july.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:17px;"> Capital Insider Series- Early
                        Stage Investing in the Current Environment
                    </div>
                    <div class="venuedate"> 16th July 2020 | 11:00AM- 12:00PM
                        <span>Webinar Registration</span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_7N67MFN5Q5-TXcRHB6t3Rg" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>





            <li class="column  others">
                <a href="https://us02web.zoom.us/webinar/register/WN_QStSU8KqT9uoVIWQZRgjyg" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">


                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bexscalenew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">LEARNING SERIES - BE<span
                            style="text-transform: lowercase;">x</span> SCALE
                    </div>
                    <div class="venuedate">11th July 2020 | 03:00 PM
                        <span>Virtual Event | Live Q&A
                        </span>
                    </div>
                    <a href="https://us02web.zoom.us/webinar/register/WN_QStSU8KqT9uoVIWQZRgjyg" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>


            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="countdays"><i class="fa fa-clock-o" aria-hidden="true"></i> @php echo timecount($currentd,'2020/07/10'); @endphp
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 10th July 2020 | 03:00 PM
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>





            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_8klH8GMPR1iyTdTlpY-2zw" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/capital09july.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk"> Capital Insider Series-The Tech Advantage
                    </div>
                    <div class="venuedate"> 09th July 2020 | 3:00PM- 4:00PM
                        <span>Webinar </span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_8klH8GMPR1iyTdTlpY-2zw" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>










            <li class="column fro others">
                <a href="https://bit.ly/CXO5paisa" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo08july.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Mr. Prakarsh Gagdani, CEO, 5paisa.com
                    </div>
                    <div class="venuedate"> 08th July 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://bit.ly/CXO5paisa" target="_blank"
                        class="btn btn-default eventbtn"style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>









            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_ILC7b6ZlSsKdOe5hdZrQTA" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>


                        <img src="https://www.franchiseindia.com/images/events/power378.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;"> Power Talk Series- Decoding the
                        Future of Social

                    </div>
                    <div class="venuedate"> 07-July-2020 | 12:00PM- 1:00PM IST
                        <span>Virtual</span>
                    </div>
                    <a href="https://us02web.zoom.us/webinar/register/WN_ILC7b6ZlSsKdOe5hdZrQTA" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9871280628</span>
                </div>
            </li>












            <li class="column  others">
                <a href="https://us02web.zoom.us/webinar/register/WN_0lz38Yk6SYq80aPepAcCQg" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">


                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bexinvestnew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">LEARNING SERIES - BE<span
                            style="text-transform: lowercase;">x</span> INVEST
                    </div>
                    <div class="venuedate">4th July 2020 | 03:00 PM
                        <span>Virtual Event | Live Q&A
                        </span>
                    </div>
                    <a href="https://us02web.zoom.us/webinar/register/WN_0lz38Yk6SYq80aPepAcCQg" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>


            <li class="column fro others">
                <a href="#" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 03rd July 2020 | 03:00 PM
                        <span>Virtual Conference </span>
                    </div>

                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>









            <li class="column fro others">
                <a href="https://bit.ly/3dDjkgw" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxoback01july.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Prajodh Rajan, Group CEO & Co-Founder, EuroKids International
                    </div>
                    <div class="venuedate"> 1st July 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://bit.ly/3dDjkgw" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>



                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>











            <li class="column fro others">
                <a href="https://www.restaurantindia.in/food-beverage/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/rifood.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/restaurantindia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/IndianRestCong" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                            target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Food & beverage sector is unfolding
                        into the New World
                    </div>
                    <div class="venuedate">30 June 2020 | 03:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.restaurantindia.in/food-beverage/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>

                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>













            <li class="column  others">
                <a href="http://campaign.businessex.com/webinar-29june/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bx29june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 21px; font-size:16px;">Emerging Sectors And Factors
                        Influencing An Angel Investor's Decision
                    </div>
                    <div class="venuedate">29th June 2020 | 03:00 PM
                        <span>Webinar </span>
                    </div>
                    <a href="http://campaign.businessex.com/webinar-29june/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>













            <li class="column  others">
                <a href="http://campaign.businessex.com/webinar-27june/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bx27june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Revival & Survival Of Indian Msmes
                        And Way Forward
                    </div>
                    <div class="venuedate">27th June 2020 | 03:00 PM
                        <span>Webinar </span>
                    </div>
                    <a href="http://campaign.businessex.com/webinar-27june/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>










            <li class="column  others">
                <a href="http://campaign.businessex.com/webinar-26june/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bx26june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">RE-THINK, RE-INVENT, RE-OPEN
                    </div>
                    <div class="venuedate">26th June 2020 | 03:00 PM
                        <span>Webinar </span>
                    </div>
                    <a href="http://campaign.businessex.com/webinar-26june/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 26th June 2020 | 03:00 PM
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>









            <li class="column fro others">
                <a href="https://us02web.zoom.us/webinar/register/WN_SfhiGXMGSlS4jjcK3oqjaA" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/ent-25june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 23px; font-size:17px;">Capital Insider Series- Future of
                        Investments in Growth Stage Startups
                    </div>
                    <div class="venuedate"> 25th June 2020 | 3:00PM - 4:00PM
                        <span>Webinar </span>
                    </div>

                    <a href="https://us02web.zoom.us/webinar/register/WN_SfhiGXMGSlS4jjcK3oqjaA" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>









            <li class="column fro others">
                <a href="https://bit.ly/37P1FkE" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxoback24th.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 23px; font-size:17px;">Ajay Menon, Director & CEO -
                        Motilal Oswal Financial Services Ltd.
                    </div>
                    <div class="venuedate"> 24th June 2020 | 11:00 AM
                        <span>Webinar </span>
                    </div>

                    <a href="https://bit.ly/37P1FkE" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 7290093412</span>
                </div>
            </li>














            <li class="column fro others">
                <a href="https://www.indianretailer.com/social-commerce/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/irecnew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">SOCIAL COMMERCE: DECODING THE NEW NORMALCY IN RETAIL

                    </div>
                    <div class="venuedate">22 June 2020 | 03:00 PM
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.indianretailer.com/social-commerce/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>

            <li class="column  others">
                <a href="http://campaign.businessex.com/webinar-19june/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bx19june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">RESCRIPTING YOUR SUCCESS IN A NEW
                        PARADIGM
                    </div>
                    <div class="venuedate">19th June 2020 | 12:00 PM
                        <span>Webinar </span>
                    </div>
                    <a href="http://campaign.businessex.com/webinar-19june/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>




            <li class="column fro others">
                <a href="http://www.globalfranchiseleaders.com/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/gflfbg.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/takechargebook/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/marya_gaurav" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/in/gaurav-marya/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Global Franchise Leaders Forum
                    </div>
                    <div class="venuedate"> 19th June 2020 | 03:00 PM
                        <span>Virtual Conference </span>
                    </div>

                    <a href="http://www.globalfranchiseleaders.com/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>





            <li class="column fro others">
                <a href="https://bit.ly/3f78110" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-17june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk"><strong>Speaker Session</strong> YVS Vijay Kumar, CEO, Mahindra First Choice
                        Services

                    </div>
                    <div class="venuedate"> 17th June 2020 | 11:00 AM IST Onwards
                        <span>Webinar</span>
                    </div>
                    <a href="https://bit.ly/3f78110" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>






            <li class="column fro others">
                <a href="https://www.indianretailer.com/webinar_alavi/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/alavback.png" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Successful Post-Lockdown Strategies For Online Retailers

                    </div>
                    <div class="venuedate"> 11th June 2020 | 05:30 PM
                        <span>Virtual Conference </span>
                    </div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>









            <li class="column fro others">
                <a href="https://campaign.businessex.com/webinar-11june/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bx11june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">CYBER LAWS FOR BUSINESSES
                    </div>
                    <div class="venuedate"> 11th June 2020 | 12:00 PM
                        <span>Webinar </span>
                    </div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>


















            <li class="column fro others">
                <a href="http://campaign.businessex.com/crisis-masterclass/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bx13june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Crisis Innovation Masterclass
                    </div>
                    <div class="venuedate"> 13-14th June 2020 | 02:00-06:00PM
                        <span>Webinar </span>
                    </div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8595350505</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="https://campaign.businessex.com/webinar-15june/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bx15june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">BUSINESS LEADERSHIP IN VUCA WORLD
                    </div>
                    <div class="venuedate"> 15th June 2020 | 03:00 PM
                        <span>Webinar </span>
                    </div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>





















            <li class="column fro others">
                <a href="https://bit.ly/2AFT1bw" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-10june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk"> Session Session: <strong>Shankha Banerjee, COO, Dr Lal PathLabs</strong>

                    </div>
                    <div class="venuedate"> 10th June 2020 | 11:00 AM IST Onwards
                        <span>Virtual Conference </span>
                    </div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/tech25web/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/techback.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Tech & Innovation Summit

                    </div>
                    <div class="venuedate"> 10-June-2020 | 10:00 AM - 05:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>




            <li class="column fro others">
                <a href="http://campaign.businessex.com/webinar-08june/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bx08june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Interactive Workshop On
                        '5 Ways To Massive Profits'
                    </div>
                    <div class="venuedate"> 8th June 2020 | 12:00 PM
                        <span>Webinar </span>
                    </div>
                    <a href="http://campaign.businessex.com/webinar-08june/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>











            <li class="column fro others">
                <a href="http://campaign.businessex.com/webinar-02june/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bx02june.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Improving Productivity & Building
                        Resilience
                    </div>
                    <div class="venuedate"> 2nd June 2020 | 12:00 PM
                        <span>Webinar </span>
                    </div>
                    <a href="http://campaign.businessex.com/webinar-02june/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>


            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/b2b-marketing/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/b2bnew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">B2B Marketing In Unprecedented
                        Times

                    </div>
                    <div class="venuedate"> 05-June-2020 | 03:30 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>




            <li class="column fro others">
                <a href="https://www.restaurantindia.in/f-and-b/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/fandb.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/restaurantindia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/IndianRestCong" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                            target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;"> Importance of 'Safe and Hygiene'
                        Food

                    </div>
                    <div class="venuedate"> 07-June-2020 | 03:30 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.restaurantindia.in/f-and-b/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>





            <li class="column fro others">
                <a href="https://www.restaurantindia.in/realestate-webinar/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/realestate.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Re-Imagine, Re-Engineer and
                        Re-Purpose
                    </div>
                    <div class="venuedate"> 15th May 2020 | 03:30 PM � 04:30 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.restaurantindia.in/realestate-webinar/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="https://www.indianretailer.com/retaildigital/" target="_blank">
                    <div class="imgblk">

                        <img src="https://www.franchiseindia.com/images/events/irec-webinar.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">The New Normal Of Retail

                    </div>
                    <div class="venuedate"> 20th May 2020 | 03:30 PM - 05:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.indianretailer.com/retaildigital/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9158797024</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/b2b-marketing/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/b2b.jpg" alt="#" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">B2B Marketing In Unprecedented
                        Times

                    </div>
                    <div class="venuedate"> 20-May-2020 | 11:30 AM � 02:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.entrepreneurindia.com/b2b-marketing/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="https://www.licenseindia.com/webinar/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/bliback.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Brand Licensing & Merchandising
                        Summit, Asia

                    </div>
                    <div class="venuedate"> 27-May-2020 => 1430 HRS IST | 1000 HRS BST | 0500 HRS EST | 1700 HRS CST
                        Onwards
                    </div>
                    <a href="https://www.licenseindia.com/webinar/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="https://www.restaurantindia.in/dark-kitchen-web/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/dark-kitchen.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Dark Kitchen & Delivery Conference X IRC
                    </div>
                    <div class="venuedate"> 13th May 2020 | 03:00 PM - 06:00 PM
                        <span>Webinar</span>
                    </div>

                    <a href="https://www.restaurantindia.in/dark-kitchen-web/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>













            <li class="column fro others">
                <a href="https://www.restaurantindia.in/supply-chain-management-webinar/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/supply-chain.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Fixing The Supply
                        Chain In Food Service Industry
                    </div>
                    <div class="venuedate"> 07th May 2020 | 03:30 - 04:45 PM
                        <span>Webinar</span>
                    </div>

                    <a href="https://www.restaurantindia.in/supply-chain-management-webinar/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>







            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/hyperlocal/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/hyperlocalnew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Hyperlocal 2.0 Covid 19 Effect

                    </div>
                    <div class="venuedate"> 30th April 2020 | 11:00 AM - 01:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.entrepreneurindia.com/hyperlocal/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>


            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/digital/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>


                        <img src="https://www.franchiseindia.com/images/events/digitalnew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Influencer Marketing:
                        The New Paradigm<br>


                    </div>
                    <div class="venuedate"> 30th April 2020 | 03:30 PM - 05:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.entrepreneurindia.com/digital/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>







            <li class="column fro others">
                <a href="https://www.indianretailer.com/privatelabel/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent">
                                <img src="https://www.franchiseindia.com/images/events/irlogo2020.png"
                                    alt="indianretailer
                                Virtual">
                            </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/webinar2.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Private Labels & Oem Opportunity

                    </div>
                    <div class="venuedate"> 30th April 2020 | 02:30 PM - 04:30 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.indianretailer.com/privatelabel/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9158797024</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/shared-economy/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/sharedeconomynew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">The Future Of Shared
                        Economy Looking Beyond
                        Covid 19


                    </div>
                    <div class="venuedate"> 27th April 2020 | 11:00 AM - 01:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.entrepreneurindia.com/shared-economy/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>




            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/fintech/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/fintechnew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px; font-size:19px;">Innovation
                        Opportunity For
                        Fintech Startups Amidst Covid-19


                    </div>
                    <div class="venuedate"> 28th April 2020 | 11:30 AM - 01:30 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.entrepreneurindia.com/fintech/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>










            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/gaming/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>


                        <img src="https://www.franchiseindia.com/images/events/gamingnew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">How Online Gaming Has Benefitted
                        From The Lockdown



                    </div>
                    <div class="venuedate"> 28th April 2020 | 03:30 PM - 05:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.entrepreneurindia.com/gaming/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>




            <li class="column fro others">
                <a href="https://www.restaurantindia.in/catering/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"></div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cateringnew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Catering Industry
                        Impact Of Covid 19


                    </div>
                    <div class="venuedate"> 25th April 2020 | 11:30 AM - 01:00 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="https://www.restaurantindia.in/catering/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>





            <li class="column fro others">
                <a href="https://www.entrepreneurindia.com/sme/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/smenew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Sme Empowerment
                        Post Covid Scenario<br>


                    </div>
                    <div class="venuedate"> 23rd April 2020 | 11:30 AM - 12:30 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>



            <li class="column fro others">
                <a href="https://www.wellnessindia.org/beauty-wellness/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"></div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/wellnessnew.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Beauty & Wellness
                        Industry Impact Of
                        Covid 19<br>


                    </div>
                    <div class="venuedate"> 23rd April 2020 | 03:30 PM - 05:30 PM IST
                        <span>Virtual Conference </span>
                    </div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>


            <li class="column fro others">
                <a href="http://www.educationcongress.org/virtual-conference/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/educationcongress.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Exchange Ideas, Best Practices
                    </div>
                    <div class="venuedate"> 10th April 2020 | 03:00 - 06:00 PM IST Onwards
                        <span>Webinar</span>
                    </div>

                    <a href="http://www.educationcongress.org/virtual-conference/" target="_blank"
                        class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>

            <li class="column fro others">
                <a href="https://www.restaurantindia.in/webinar/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">

                        </div>
                        <img src="https://www.franchiseindia.com/images/events/restaurant-industry.jpg" alt="#"
                            class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Restaurant Industry
                    </div>
                    <div class="venuedate"> 30th March 2020 | 12:00 PM
                        <span>Webinar</span>
                    </div>

                    <a href="https://www.restaurantindia.in/webinar/" target="_blank" class="btn btn-default eventbtn"
                        style="background:rgba(220,51,34,0.7);">Registration Closed</a>



                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>




        </ul>











    </div>
    <!--form end here -->





    <div class="modal fade lg-panel formsection" id="eventEnquire" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="adhead">Enquire here </div>
                    <div class="subadhead" id="showName">Franchise & Retail Opportunities Show - Chennai </div>

                    <form class="form-horizontal" action="https://master.franchiseindia.com/fro/register_update.php"
                        method="post" id="submitForm">

                        <input type="hidden" name="src" id="src" value="DOTCOM" />
                        <input type="hidden" name="hidType" id="hidType" value="Delhi Show 2018">

                        <input id="ref" name="ref" type="hidden" value="FRO-Insta-Paid">
                        <input type="hidden" value="" name="event_year" id="event_year">
                        <input type="hidden" value="" name="event_title" id="event_title">
                        <input type="hidden" value="" name="event_city" id="event_city">
                        <input id="source" name="source" type="hidden" value="website">

                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img alt="user"
                                        src="{{ URL::asset('images/user.png') }}"></span>
                                <input type="text" class="form-control" placeholder="Enter Your Name" required
                                    name="txtName">
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img alt="email"
                                        src="{{ URL::asset('images/email.png') }}"></span>
                                <input type="email" class="form-control" placeholder="Enter Your Email" required
                                    name="txtEmail">
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img alt="mobile"
                                        src="{{ URL::asset('images/mobile.png') }}"></span>
                                <input type="text" class="form-control" pattern="[0-9]{10,10}" maxlength="10"
                                    placeholder="Enter Mobile" required name="txtPhone">
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img alt="iwanto"
                                        src="{{ URL::asset('images/iwanto.png') }}"></span>
                                <select id="want" name="tfw_interest" class="form-control myselectclass" required
                                    name="selectchoice">
                                    <option value="">Enquire for</option>
                                    <option value="Visit the Expo - Dotcom">Visit the show</option>
                                    <option value="Attend the Conference - Dotcom">Attend the Conference</option>
                                    <option value="Become an Exhibitor - Dotcom">Become an Exhibitor</option>
                                    <option value="Nominate for Awards - Dotcom">Nominate for awards</option>
                                    <option value="Become a Sponsor - Dotcom">Become a sponsor</option>
                                </select>
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img alt="pincode"
                                        src="{{ URL::asset('images/pincode.png') }}"></span>
                                <input type="text" pattern="[0-9]{6,6}" maxlength="6" class="form-control"
                                    placeholder="Enter Pincode" required name="txtPincode">
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon" style="vertical-align:top">
                                    <img alt="comment" src="{{ URL::asset('images/comment.png') }}"></span>
                                <textarea class="form-control height100" placeholder="Enter Your comment" id="comment" required
                                    name="comment"></textarea>
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <button type="submit" class="btn btn-default btn-propad">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ********************Page Filter Code start here*************** -->
    <script>
        function chennaiEvent() {
            $('#want').attr('name', 'tfw_interest');
            $('#ref').attr('value', 'FRO-Insta-Paid');
            $('#comment').attr('name', 'comment');
            $('#submitForm').attr('action', 'https://master.franchiseindia.com/fro/register_update.php');
            $('#event_year').val('Chennai December 2018');
            $('#event_title').val('FRO 2018 Chennai');
            $('#event_city').val('Chennai');
            $('#showName').html('Franchise & Retail Opportunities Show');
        }

        function bengaluruEvent() {
            $('#want').attr('name', 'tfw_interest');
            $('#ref').attr('value', 'FRO-Insta-Paid');
            $('#comment').attr('name', 'comment');
            $('#submitForm').attr('action', 'https://master.franchiseindia.com/fro/register_update.php');
            $('#event_year').val('Bengaluru August 2018');
            $('#event_title').val('FRO 2018 Bengaluru');
            $('#event_city').val('Bengaluru');
            $('#showName').html('Franchise & Retail Opportunities Show');
        }

        function ptagatiMaindanEvent() {
            $('#want').attr('name', 'want');
            $('#ref').attr('value', 'Expo-Insta-Registration');
            $('#comment').attr('name', 'txtDetails');
            $('#submitForm').attr('action', 'https://expo.franchiseindia.com/register_update.php');
            $('#event_year').val('Delhi October 2018');
            $('#event_title').val('FRO 2018 PRAGATI MAIDAN');
            $('#event_city').val('Delhi');
            $('#showName').html('Franchise India Show');
        }
        filterSelection("all");
        var activeTab = 'all';

        function filterSelection(c, l) {
            /****************Update drop down location list************************* */

            if (l != 'all' && l != undefined) {
                $('input:radio[name=eventradi]').each(function() {
                    $(this).parent().css('display', 'none');
                });
                if (Array.isArray(l)) {
                    for (var i = 0; i < l.length; i++) {
                        $("input[type=radio][name=eventradi][value=" + l[i] + "]").parent().css('display', 'inline-block');
                    }
                }
            } else {
                $('input:radio[name=eventradi]').each(function() {
                    $(this).parent().css('display', 'inline-block');
                });
            }
            $(".column").removeAttr("style");
            $('input:radio[name=eventradi]').each(function() {
                $(this).prop('checked', false);
            });
            $('.btnActive').removeClass('active');
            $("#" + c).addClass('active');
            activeTab = c;
            var x, i;
            x = document.getElementsByClassName("column");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                RemoveClass(x[i], "showDiv");
                //RemoveClass(x[i], "showDiv");
                if (x[i].className.indexOf(c) > -1) AddClass(x[i], "showDiv");
                //console.log(x[i]);
            }
        }

        function AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        function RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        /************************Location Filter ****************/
        function locationFilterSelection(ele) {
            if (activeTab != 'all') {
                $('.' + activeTab + '.showDiv').css('display', 'none');
                $('.' + activeTab + '.' + ele.value).css('display', 'block');
                console.log("activeTab-" + activeTab);
                console.log("ele-" + ele.value);
            } else {
                $("#myDropdown").hide();
                $('.column' + '.showDiv').css('display', 'none');
                $('.column' + '.' + ele.value).css('display', 'block');
                console.log(ele.value);
            }
        }

        var view = $("#tslshow");
        var move = $(window).width();
        var sliderLimit = -(move * 3);
        var containerWidth = (move * 5);
        $(document).ready(function() {
            if ($(window).width() < 599) {
                $("#tslshow").css("width", containerWidth);
                $(".bstimeslider ul li").css("width", $(window).width());
            }
        });
        $("#rightArrow").click(function() {
            var currentPosition = parseInt(view.css("left"));
            if (currentPosition >= sliderLimit) view.stop(false, true).animate({
                left: "-=" + move
            }, {
                duration: 400
            })
        });

        $("#leftArrow").click(function() {
            var currentPosition = parseInt(view.css("left"));
            if (currentPosition < 0) view.stop(false, true).animate({
                left: "+=" + move
            }, {
                duration: 400
            })
        });
    </script>
@endsection
