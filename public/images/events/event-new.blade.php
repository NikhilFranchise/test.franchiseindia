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
                height: 480px; /*display:inline-block;*/
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
            ul.eventlist li .imgblk .backdr.moredark {          background: rgba(0, 0, 0, 0.6); }
            ul.eventlist li .logocent {
                height: 228px;
                width: 378px;
                display: table-cell;
                vertical-align: middle;
                text-align: center;
            }

            .demopadding {
                float: none;
                width: 138px;
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
                top: 10px;
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

            .eventtabblk .nav-tabs > li {
                margin-right: 5px;
                display: inline-block;
                float: none;
            }

            .eventtabblk .nav-tabs > li > button {
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

            .eventtabblk .nav-tabs > li > button.active, .eventtabblk .nav-tabs > li > button:focus, .eventtabblk .nav-tabs > li > button:hover {
                background: #333;
                border: 1px solid #333;
                color: #fff;
                cursor: default;
            }

            .eventtabblk .nav-tabs > li > a:hover {
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

            .eventserblk .dropbtn:hover, .eventserblk .dropbtn:focus {
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

            .eventserblk ul.subevent li {
            }

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
                display: none; /* Hide all elements by default */
            }

            .showDiv {
                display: block;
            }

            #myBtnContainer .bstimeslider #leftArrow, #myBtnContainer .bstimeslider #rightArrow {
                display: none;
            }

            #myBtnContainer .bstimeslider #leftArrow:hover, #myBtnContainer .bstimeslider #rightArrow:hover {
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
                #myBtnContainer .bstimeslider #leftArrow, #myBtnContainer .bstimeslider #rightArrow {
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
                    line-height: 25px; font-size:19px;
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

                .eventtabblk .nav-tabs > li {
                    margin: 0 auto;
                }

                .eventtabblk .nav-tabs > li {
                    display: block;
                    float: left;
                }

                .eventtabblk .nav-tabs > li > a {
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

                #myBtnContainer .bstimeslider #leftArrow, #myBtnContainer .bstimeslider #rightArrow {
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

                .eventtabblk .nav-tabs > li {
                    display: inline-block;
                    float: none;
                }

                .eventtabblk .nav-tabs > li > button {
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

                .eventtabblk .nav-tabs > li {
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
                .eventtabblk .nav-tabs > li {
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

                .eventtabblk .nav-tabs > li > a {
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
            <div class="eventbor">
                <div class="col-xs-12 col-sm-6 col-md-7 mdfy"><h1 class="evn">All Events</h1></div>
                <div class="col-xs-12 col-sm-3 col-md-3 rightp">
                    <a href="{{ Config::get('constants.MainDomain') }}/event-archives">Archives</a>

                </div>

                <div class="col-xs-12 col-sm-3 col-md-2 eventserblk">
                    <div class="dropdown">
                        <button class="dropbtn">Location <img class="shercode" src="https://www.franchiseindia.com/images/drop-down-icon.png"/>
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <span class="eventclose">X</span>
                            <ul class="eventlistpkg">
                                <!--<li>
                                    <label>
                                        <input type="radio" name="eventradi" value="tamilNadu"
                                               onclick="locationFilterSelection(this)"/>Tamil Nadu
                                    </label>
                                </li> -->
                                <!--     <li>
                                         <label>
                                             <input type="radio" name="eventradi" value="maharashtra"
                                                    onclick="locationFilterSelection(this)"/>Maharashtra
                                         </label>
                                     </li>
                                     <li>
                                         <label>
                                             <input type="radio" name="eventradi" value="eastIndia"
                                                    onclick="locationFilterSelection(this)"/>West Bengal
                                         </label>
                                     </li>

                                     <li>
                                         <label>
                                             <input type="radio" name="eventradi" value="eastIndia"
                                                    onclick="locationFilterSelection(this)"/>Orissa
                                         </label>
                                     </li>

                                     <li>
                                         <label>
                                             <input type="radio" name="eventradi" value="eastIndia"
                                                    onclick="locationFilterSelection(this)"/>Jharkhand
                                         </label>
                                     </li>
                                     <li>
                                         <label>
                                             <input type="radio" name="eventradi" value="eastIndia"
                                                    onclick="locationFilterSelection(this)"/>Bihar
                                         </label>
                                     </li>
                                     <li>
                                         <label>
                                             <input type="radio" name="eventradi" value="eastIndia"
                                                    onclick="locationFilterSelection(this)"/>Assam
                                         </label>
                                     </li>




                                     <li>
                                         <label>
                                             <input type="radio" name="eventradi" value="tamilNadu"
                                                    onclick="locationFilterSelection(this)"/>TamilNadu
                                         </label>
                                     </li>-->



                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="delhi"
                                               onclick="locationFilterSelection(this)"/>Delhi NCR
                                    </label>
                                </li>




                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="hyderabad"
                                               onclick="locationFilterSelection(this)"/>Hyderabad
                                    </label>
                                </li>





                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="mumbai"
                                               onclick="locationFilterSelection(this)"/>Mumbai
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="bangalore"
                                               onclick="locationFilterSelection(this)"/>Bangalore
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="kolkata"
                                               onclick="locationFilterSelection(this)"/>Kolkata
                                    </label>
                                </li>


                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="chennai"
                                               onclick="locationFilterSelection(this)"/>Chennai
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="jammu"
                                               onclick="locationFilterSelection(this)"/>Jammu
                                    </label>
                                </li>


                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="chandigarh"
                                               onclick="locationFilterSelection(this)"/>Chandigarh
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="amritsar"
                                               onclick="locationFilterSelection(this)"/>amritsar
                                    </label>
                                </li>


                                <li>
                                    <label>
                                        <input type="radio" name="eventradi" value="ludhiana"
                                               onclick="locationFilterSelection(this)"/>Ludhiana
                                    </label>
                                </li>



              {{----}}

                                {{--<li>--}}
                                    {{--<label>--}}
                                        {{--<input type="radio" name="eventradi" value="southindia"--}}
                                               {{--onclick="locationFilterSelection(this)"/>Karnataka--}}
                                    {{--</label>--}}
                                {{--</li>--}}












 {{--<li>--}}
                                    {{--<label>--}}
                                        {{--<input type="radio" name="eventradi" value="southindia"--}}
                                               {{--onclick="locationFilterSelection(this)"/>Telangana--}}
                                    {{--</label>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<label>--}}
                                        {{--<input type="radio" name="eventradi" value="southindia"--}}
                                               {{--onclick="locationFilterSelection(this)"/>Andhra pradesh--}}
                                    {{--</label>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<label>--}}
                                        {{--<input type="radio" name="eventradi" value="southindia"--}}
                                               {{--onclick="locationFilterSelection(this)"/>Kerala--}}
                                    {{--</label>--}}
                                {{--</li>--}}
                              {{----}}
                            </ul>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $(".dropbtn").click(function () {
                                $("#myDropdown").toggle();
                            });
                            $(".eventclose").click(function () {
                                $("#myDropdown").hide();
                            });
                        });
                    </script>

                </div>


            </div>
        </div>
        <!-- Vikas  -->
        <div class="eventtabblk" id="myBtnContainer">
            <div class="bstimeslider">
                <div id="rightArrow"><i class="fa fa-angle-right fa-3x" aria-hidden="true"></i></div>
                <div id="viewContainer">
                    <ul class="nav nav-tabs eventtab" id="tslshow">
                        <li>
                            <button id="all" class="btnActive active" onclick="filterSelection('all', 'all')">All
                                Events
                            </button>
                        </li>
                        <li>
                            <button id="forums" class="btnActive" onclick="filterSelection('forums', ['delhi'])">
                                Franchise India
                                Forums
                            </button>
                        </li>
                        <li>
                            <button id="fro" class="btnActive"
                                    onclick="filterSelection('fro', ['maharashtra', 'karnataka', 'tamilNadu', 'delhi'])">
                                FRO <span class="rm-txt">- Franchise & Retail Opportunity show</span>
                            </button>
                        </li>
                        <li>
                            <button id="bos" class="btnActive"
                                    onclick="filterSelection('bos', ['uttarpradesh', 'gujarat', 'madhyaPradesh', 'maharashtra','eastindia'])">
                                BOS <span class="rm-txt">- Business Opportunity show</span>
                            </button>
                        </li>
                        <li>
                            <button id="other" class="btnActive" onclick="filterSelection('other', ['delhi','noida'])">Other
                                Event
                            </button>
                        </li>
                    </ul>
                </div>
                <div id="leftArrow"><i class="fa fa-angle-left fa-3x" aria-hidden="true"></i></div>
            </div>
        </div>
        <ul class="eventlist" style="clear:both;">










        <!-- <li class="column other delhi">
                <a href="https://www.indianretailer.com/noida/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/noida-logo.png')}}"
                                                       alt="Future of Noida Retail Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{ URL::asset('images/events/noida-bg.jpg') }}" alt="Future of Noida Retail" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Future of Noida Retail 2019
                    </div>
                    <div class="venuedate"> 25 January 2019
                        <span>Wave City Center Noida</span></div>
                    <a href="https://www.indianretailer.com/noida/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9311789272</span>
                </div>
            </li>-->
            {{--<li class="column other">--}}
                {{--<a href="http://www.franchiseindiaevents.com/megafranmatch-franchise-business-opportunities/" target="_blank">--}}
                    {{--<div class="imgblk">--}}
                        {{--<div class="backdr">--}}
                            {{--<div class="logocent"><img src="{{URL::asset('images/events/mfm-logo.png')}}"--}}
                                                       {{--alt="Mega Fran Match Logo " class="ev-logo"/></div>--}}
                        {{--</div>--}}
                        {{--<img src="{{ URL::asset('images/events/mfm-bg.jpg') }}" alt="Mega Fran Match" class="bdr">--}}
                    {{--</div>--}}
                {{--</a>--}}
                {{--<div class="demopadding">--}}
                    {{--<div class="icon social fb">--}}
                        {{--<a href="https://www.facebook.com/franchiseindiabrandslimited" target="_blank"><i--}}
                                    {{--class="fa fa-facebook"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="icon social tw">--}}
                        {{--<a href="https://twitter.com/franchiseindiab" target="_blank"><i--}}
                                    {{--class="fa fa-twitter"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="icon social in">--}}
                        {{--<a href="https://www.linkedin.com/company/franchise-india-brands-limited"--}}
                           {{--target="_blank"><i class="fa fa-linkedin"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="eventcontentblk">--}}
                    {{--<div class="eventhdk">Mega Fran Match 2019--}}
                    {{--</div>--}}
                    {{--<div class="venuedate">July 2019--}}
                    {{--</div>--}}
                    {{--<a href="http://www.franchiseindiaevents.com/megafranmatch-franchise-business-opportunities/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>--}}
                {{--</div>--}}
                {{--<div class="eventhotline">--}}
                    {{--Hotline: <span>+91 8447555568</span>--}}
                {{--</div>--}}
            {{--</li>--}}



























        <!--   <li class="column fro ahmedabad">
                <a href="https://www.franchiseindia.com/fro/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/fro-ahmedabad.png')}}"
                                                       alt="FRO 2019 Ahmedabad Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{ URL::asset('images/events/frochennai-bg.jpg') }}" alt="FRO 2019 Ahmedabad" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise & Retail
                        Opportunities Show 2019
                    </div>
                    <div class="venuedate"> 16 - 17 February 2019
                        <span>Hyatt Regency ,Ashram Road ,Ahmedabad  </span></div>
                    <a href="https://www.franchiseindia.com/fro/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9971332113</span>
                </div>
            </li>-->





















           



           














































          

























            <!-- <li class="column forums mumbai showDiv">
                <a href="https://www.entrepreneurindia.com/shepreneur/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/shepreneur-logo.png')}}" alt="Shepreneur Logo" class="ev-logo"></div>
                        </div>
                        <img src="{{URL::asset('images/events/ent-bg.jpg')}}" alt="Entrepreneur" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>

                <div class="eventcontentblk">
                    <div class="eventhdk" id="showName">SHEPRENEURS  2020  </div>


                    <div class="venuedate">17 March 2020
                        <span>Hotel Sahara Star, Mumbai</span></div>

                    <a href="https://www.entrepreneurindia.com/shepreneur/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>

                </div>

                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>


            </li> -->

            {{--<li class="column fro mumbai">--}}
                {{--<a href="https://www.franchiseindia.com/franchise-show/" target="_blank">--}}
                    {{--<div class="imgblk">--}}
                        {{--<div class="backdr">--}}
                            {{--<div class="logocent"><img src="{{URL::asset('images/events/franchise-show.png')}}"--}}
                                                       {{--alt="Franchise Show Logo " class="ev-logo"/></div>--}}
                        {{--</div>--}}
                        {{--<img src="{{ URL::asset('images/events/frodelhi-bg.jpg') }}" alt="Franchise Show" class="bdr">--}}
                    {{--</div>--}}
                {{--</a>--}}
                {{--<div class="demopadding">--}}
                    {{--<div class="icon social fb">--}}
                        {{--<a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i--}}
                                    {{--class="fa fa-facebook"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="icon social tw">--}}
                        {{--<a href="http://twitter.com/FranchiseIndia" target="_blank"><i--}}
                                    {{--class="fa fa-twitter"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="icon social in">--}}
                        {{--<a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"--}}
                           {{--target="_blank"><i class="fa fa-linkedin"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="eventcontentblk">--}}
                    {{--<div class="eventhdk">Franchise Show</div>--}}
                    {{--<div class="venuedate" style="margin-top: -10px;">  	29   MARCH 2020--}}
                        {{--<span> Hotel Sahara Star, Mumbai  </span></div>--}}
                    {{--<a href="https://www.franchiseindia.com/franchise-show/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>--}}
                {{--</div>--}}
                {{--<div class="eventhotline">--}}
                    {{--Hotline: <span>+91 8588804788</span>--}}
                {{--</div>--}}
            {{--</li>--}}

            <!-- <li class="column fro chennai bangalore delhi mumbai">
                <a href="https://www.franchiseindia.com/franchise-show/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/franchise-show.png')}}"
                                                       alt="franchise-show Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{ URL::asset('images/events/frodelhi-bg.jpg') }}" alt="FRO " class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Show</div>
                    <div class="venuedate" style="margin-top: -10px;">  	21   March - 29 MARCH 2020
                        <span> Bengaluru, Chennai, Delhi, Mumbai</span></div>
                    <a href="https://www.franchiseindia.com/franchise-show/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588804788</span>
                </div>
            </li> -->

            <!-- <li class="column fro kolkata">
                <a href="https://www.franchiseindia.com/fro/fro_bos/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/froexpo-logo.png')}}"
                                                       alt="Franchise Expo   Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{ URL::asset('images/events/frodelhi-bg.jpg') }}" alt="Franchise Expo " class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Expo 2020
                    </div>
                    <div class="venuedate" style="margin-top: -10px;">12  April  2020
                        <span>
THE LALIT GREAT EASTERN, <br> KOLKATA </span></div>
                    <a href="https://www.franchiseindia.com/fro/fro_bos/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588804788</span>
                </div>
            </li> -->

            <!-- <li class="column bos jammu chandigarh ludhiana amritsar">
                <a href="https://www.franchiseindia.com/bos/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/boslogo2020.png')}}" alt="Bos Logo"
                                                       class="ev-logo"/></div>
                        </div>
                        <img src="{{URL::asset('images/events/bos-bg.jpg')}}" class="bdr" alt="Bos">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/franchiseeindia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Business Opportunities Show

                    </div>
                    <div class="venuedate">  15 April - 19 April 2020
                        <span>Jammu, Amritsar, Ludhiana, Chandigarh</span></div>

                    <a href="https://www.franchiseindia.com/bos/" class="btn btn-default eventbtn" target="_blank">Visit Website</a>

                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9814405454</span>
                </div>
            </li>

            <li class="column fro kolkata">
                <a href="https://www.franchiseindia.com/fro/fro_bos/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/froexpo-logo.png')}}"
                                                       alt="Franchise Expo   Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{ URL::asset('images/events/frodelhi-bg.jpg') }}" alt="Franchise Expo " class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Expo 2020
                    </div>
                    <div class="venuedate" style="margin-top: -10px;">26  April  2020
                        <span>
Bombay Convention & Exhibition Centre, <br> INDORE </span></div>
                    <a href="https://www.franchiseindia.com/fro/fro_bos/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588804788</span>
                </div>
            </li>






 -->






















           <!--  <li class="column forums  bangalore">
                <a href="https://www.irec.asia/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/irec-logo2020.png')}}"
                                                       alt="IReCAsia Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{ URL::asset('images/events/irec-bg.jpg') }}" alt="IReCAsia" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">IReC 2020
                    </div>
                    <div class="venuedate">5-6 May 2020
                        <span>Hotel Sheraton Grand, Bengaluru </span></div>
                    <a href="https://www.irec.asia/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>


            <li class="column fro mumbai">
                <a href="https://www.franchiseindia.com/fro/2020/mumbai/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/fro-mumbai2020.png')}}"
                                                       alt="FRO Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{ URL::asset('images/events/frodelhi-bg.jpg') }}" alt="FRO  Chennai" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise Retail Opportunity Expo 2020
                    </div>
                    <div class="venuedate" style="margin-top:-10px;">22-23 May  2020
                        <span>
Bombay Convention & Exhibition Centre,  <br> Mumbai </span></div>
                    <a href="https://www.franchiseindia.com/fro/2020/mumbai/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588804788</span>
                </div>
            </li>





            <li class="column fro  delhi">
                <a href="http://www.masterfranchiseshow.in/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/mfs-logo.png')}}"
                                                       alt="MFS Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{ URL::asset('images/events/mfs-bg.jpg') }}" alt="MFS " class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Master Franchise
                        Show 2020
                    </div>
                    <div class="venuedate">27-28 June 2020
                        <span>JW Marriott Hotel, New Delhi </span></div>
                    <a href="http://www.masterfranchiseshow.in/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9971332113</span>
                </div>
            </li>

            <li class="column forums  delhi">
                <a href="https://www.franchiseindia.com/wfc/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/wfc-logo.png')}}"
                                                       alt="WFC Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{ URL::asset('images/events/wfc-bg.jpg') }}" alt="WFC" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">World Franchise Congress & Awards
                    </div>
                    <div class="venuedate">29 June 2020
                        <span>Hotel JW Marriott, New Delhi </span></div>
                    <a href="https://www.franchiseindia.com/wfc/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>

            <li class="column forums delhi showDiv">
                <a href="https://www.restaurantindia.in/congress/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr moredark">
                            <div class="logocent"><img src="{{URL::asset('images/events/ri-logo.png')}}" alt="Restaurant India  Logo" class="ev-logo"></div>
                        </div>
                        <img src="{{URL::asset('images/events/restaurantindia-bg.jpg')}}" alt="Restaurant India" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/RestaurantIndia" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/IndianRestCong" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/restaurantindia/" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>

                <div class="eventcontentblk">
                    <div class="eventhdk" id="showName">Indian Restaurant Congress & Awards 2020 </div>


                    <div class="venuedate">29-30 June 2020
                        <span>JW MARRIOTT HOTEL, NEW DELHI</span></div>

                    <a href="https://www.restaurantindia.in/congress/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>

                </div>

                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>


            </li>
 -->

















<li class="column fro others">
                <a href="https://www.entrepreneurindia.com/tech25web/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>
                      

                                                       <img src="https://www.franchiseindia.com/images/events/techback.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Tech & Innovation Summit

                    </div>
                    <div class="venuedate"> 10-June-2020 | 10:00 AM - 05:00 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="https://www.entrepreneurindia.com/tech25web/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>




<li class="column fro others">
                <a href="https://www.entrepreneurindia.com/virtual-awards/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"> </div>
                        </div>
                      

                                                       <img src="https://www.franchiseindia.com/images/events/eiawardsback.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Entrepreneur Awards 2020

                    </div>
                    <div class="venuedate"> 29th July 2020 
                        <span>Virtual Awards  </span></div>
                    <a href="https://www.entrepreneurindia.com/virtual-awards/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>







<li class="column fro others">
                <a href="https://bit.ly/2AFT1bw" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/cxo-10june.jpg" alt="#" class="bdr">
                    </div>
                </a>
     <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="http://www.linkedin.com/company/102548?trk=tyah" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk"> Session Session: <strong>Shankha Banerjee, COO, Dr Lal PathLabs</strong>

                    </div>
                    <div class="venuedate"> 10th June 2020 |  11:00 AM IST Onwards
                        <span>Virtual Conference </span></div>
                    <a href="https://bit.ly/2AFT1bw" target="_blank" class="btn btn-default eventbtn">View Website</a>
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
                        <img src="https://www.franchiseindia.com/images/events/alavback.png" alt="#" class="bdr">
                    </div>
                </a>
     <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Successful Post-Lockdown Strategies For Online Retailers

                    </div>
                    <div class="venuedate"> 11th June 2020 |  05:30 PM
                        <span>Virtual Conference </span></div>
                    <a href="https://www.indianretailer.com/webinar_alavi/" target="_blank" class="btn btn-default eventbtn">View Website</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/bx11june.jpg" alt="#" class="bdr">
                    </div>
                </a>
      <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">CYBER LAWS FOR BUSINESSES
                    </div>
                    <div class="venuedate"> 11th June 2020 | 12:00 PM 
                        <span>Webinar  </span></div>
                   <a href="https://campaign.businessex.com/webinar-11june/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/bx13june.jpg" alt="#" class="bdr">
                    </div>
                </a>
      <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Crisis Innovation Masterclass
                    </div>
                    <div class="venuedate"> 13-14th June 2020 | 02:00-06:00PM
                        <span>Webinar  </span></div>
                   <a href="http://campaign.businessex.com/crisis-masterclass/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/bx15june.jpg" alt="#" class="bdr">
                    </div>
                </a>
      <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">BUSINESS LEADERSHIP IN VUCA WORLD
                    </div>
                    <div class="venuedate"> 15th June 2020 | 03:00 PM 
                        <span>Webinar  </span></div>
                   <a href="https://campaign.businessex.com/webinar-15june/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8929600710</span>
                </div>
            </li>





<li class="column fro others">
                <a href="https://www.indianretailer.com/social-commerce/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/irecbacknew.jpg" alt="#" class="bdr">
                    </div>
                </a>
     <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">SOCIAL COMMERCE: DECODING THE NEW NORMALCY IN RETAIL

                    </div>
                    <div class="venuedate"> 17th June 2020 |  03:00 PM
                        <span>Virtual Conference </span></div>
                    <a href="https://www.indianretailer.com/social-commerce/" target="_blank" class="btn btn-default eventbtn">View Website</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/bx08june.jpg" alt="#" class="bdr">
                    </div>
                </a>
      <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Interactive Workshop On
'5 Ways To Massive Profits'
                    </div>
                    <div class="venuedate"> 8th June 2020 | 12:00 PM 
                        <span>Webinar  </span></div>
                   <a href="http://campaign.businessex.com/webinar-08june/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/bx02june.jpg" alt="#" class="bdr">
                    </div>
                </a>
      <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/BusinessEx.co.in/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/BusinessExIndia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://in.linkedin.com/company/businessex.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Improving Productivity & Building Resilience
                    </div>
                    <div class="venuedate"> 2nd June 2020 | 12:00 PM 
                        <span>Webinar  </span></div>
                   <a href="http://campaign.businessex.com/webinar-02june/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/b2bnew.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">B2B Marketing In Unprecedented Times

                    </div>
                    <div class="venuedate"> 05-June-2020 | 03:30 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/fandb.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/restaurantindia" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/IndianRestCong" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;"> Importance of 'Safe and Hygiene' Food

                    </div>
                    <div class="venuedate"> 07-June-2020 | 03:30 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/realestate.jpg" alt="#" class="bdr">
                    </div>
                </a>
      <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Re-Imagine, Re-Engineer and Re-Purpose
                    </div>
                    <div class="venuedate"> 15th May 2020 | 03:30 PM – 04:30 PM IST
                        <span>Virtual Conference  </span></div>
                   <a href="https://www.restaurantindia.in/realestate-webinar/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>



<li class="column fro others">
                <a href="https://www.indianretailer.com/retaildigital/" target="_blank">
                    <div class="imgblk">
                      
                        <img src="https://www.franchiseindia.com/images/events/irec-webinar.jpg" alt="#" class="bdr">
                    </div>
                </a>
     <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">The New Normal Of Retail

                    </div>
                    <div class="venuedate">  20th May 2020 | 03:30 PM - 05:00 PM IST
                        <span>Virtual Conference </span></div>
                    <a href="https://www.indianretailer.com/retaildigital/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">B2B Marketing In Unprecedented Times

                    </div>
                    <div class="venuedate"> 20-May-2020 | 11:30 AM – 02:00 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="https://www.entrepreneurindia.com/b2b-marketing/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/bliback.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Brand Licensing & Merchandising Summit, Asia

                    </div>
                    <div class="venuedate"> 27-May-2020 => 1430 HRS IST | 1000 HRS BST | 0500 HRS EST | 1700 HRS CST Onwards
                        </div>
                    <a href="https://www.licenseindia.com/webinar/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/hyperlocalnew.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Hyperlocal 2.0 Covid 19 Effect

                    </div>
                    <div class="venuedate"> 30th April 2020 | 11:00 AM - 01:00 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="https://www.entrepreneurindia.com/hyperlocal/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                      

                                                       <img src="https://www.franchiseindia.com/images/events/digitalnew.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Influencer Marketing:
The New Paradigm<br>


                    </div>
                    <div class="venuedate"> 30th April 2020 |  03:30 PM - 05:00 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="https://www.entrepreneurindia.com/digital/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>







<li class="column fro others">
                <a href="https://www.indianretailer.com/privatelabel/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="https://www.franchiseindia.com/images/events/irlogo2020.png"></div>
                        </div>
                        <img src="https://www.franchiseindia.com/images/events/webinar2.jpg" alt="#" class="bdr">
                    </div>
                </a>
     <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndianRetailer/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://www.twitter.com/IReCAsia" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indian-retailer/" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Private Labels & Oem Opportunity

                    </div>
                    <div class="venuedate"> 30th April 2020 |  02:30 PM - 04:30 PM IST
                        <span>Virtual Conference </span></div>
                    <a href="https://www.indianretailer.com/privatelabel/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9158797024</span>
                </div>
            </li>

<li class="column fro others">
                <a href="https://www.entrepreneurindia.com/shared-economy/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent">  </div>
                        </div>
                      

                                                       <img src="https://www.franchiseindia.com/images/events/sharedeconomynew.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">The Future Of Shared
Economy Looking Beyond
Covid 19


                    </div>
                    <div class="venuedate"> 27th April 2020 |  11:00 AM - 01:00 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="https://www.entrepreneurindia.com/shared-economy/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>




<li class="column fro others">
                <a href="https://www.entrepreneurindia.com/fintech/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent">  </div>
                        </div>
                      

                                                       <img src="https://www.franchiseindia.com/images/events/fintechnew.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px; font-size:19px;">Innovation Opportunity For
Fintech Startups Amidst Covid-19


                    </div>
                    <div class="venuedate"> 28th April 2020 | 11:30 AM - 01:30 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="https://www.entrepreneurindia.com/fintech/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>










<li class="column fro others">
                <a href="https://www.entrepreneurindia.com/gaming/" target="_blank">
                   <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent">  </div>
                        </div>
                      

                                                       <img src="https://www.franchiseindia.com/images/events/gamingnew.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">How Online Gaming Has Benefitted From The Lockdown



                    </div>
                    <div class="venuedate"> 28th April 2020 |  03:30 PM - 05:00 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="https://www.entrepreneurindia.com/gaming/" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                        <img src="https://www.franchiseindia.com/images/events/cateringnew.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Catering Industry
Impact Of Covid 19


                    </div>
                    <div class="venuedate"> 25th April 2020 |  11:30 AM - 01:00 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                        <img src="https://www.franchiseindia.com/images/events/smenew.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Sme Empowerment
Post Covid Scenario<br>


                    </div>
                    <div class="venuedate"> 23rd April 2020 |  11:30 AM - 12:30 PM IST
                        <span>Virtual Conference  </span></div>
                    <a href="#" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
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
                        <img src="https://www.franchiseindia.com/images/events/wellnessnew.jpg" alt="#" class="bdr">
                    </div>
                </a>
             <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk" style="line-height: 25px; font-size:19px;">Beauty & Wellness
Industry Impact Of
Covid 19<br>


                    </div>
                    <div class="venuedate"> 23rd April 2020 |  03:30 PM - 05:30 PM IST
                        <span>Virtual Conference  </span></div>
                  <a href="#" target="_blank" class="btn btn-default eventbtn" style="background:rgba(220,51,34,0.7);">Registration Closed</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>
            </li>















            <!-- <li class="column forums delhi showDiv">
                <a href="https://www.entrepreneurindia.com/congress/" target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/ent-logo2020.png')}}" alt="Entrepreneur Logo" class="ev-logo"></div>
                        </div>
                        <img src="{{URL::asset('images/events/ent-bg.jpg')}}" alt="Entrepreneur" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/EntrepreneurInd" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/EntrepreneurIND" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company-beta/7433460" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>

                <div class="eventcontentblk">
                    <div class="eventhdk" id="showName">Entrepreneur 2020  </div>


                    <div class="venuedate">28 - 29 July 2020
                        <span>JW MARRIOTT HOTEL, NEW DELHI</span></div>

                    <a href="https://www.entrepreneurindia.com/congress/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>

                </div>

                <div class="eventhotline">
                    Hotline: <span>+91 8588898248</span>
                </div>


            </li>


            <li class="column other mumbai">
                <a href="http://www.unbrandasia.com/"  target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/unbrandasia-logo.png')}}"
                                                       alt="UnbrandAsia Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{URL::asset('images/events/unbrandasia-bg.jpg')}}" alt="UnbrandAsia Logo " class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/Unbrand-Asia-108199804068289/" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/AsiaUnbrand" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/unbrand-asia/about/?viewAsMember=true"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk"> Unbrand Asia</div>
                    <div class="venuedate"> 28 & 29 August 2020
                        <span>Bombay Convention & Exhibition Centre,<br> Mumbai</span></div>
                    <a href="http://www.unbrandasia.com/"  class="btn btn-default eventbtn" >Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 9810939740</span>
                </div>
            </li>






            <li class="column other mumbai">
                <a href="https://www.licenseindia.com/expo/"  target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/ile-logo2020.png')}}"
                                                       alt="India Licensing Expo Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{URL::asset('images/events/ile-bg.jpg')}}" alt="India Licensing Expo" class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="https://www.facebook.com/IndiaLicensingExpo/" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="https://twitter.com/indialicensexpo" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/indialicensingexpo/"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk"> India Licensing Expo 2020</div>
                    <div class="venuedate"> 28 & 29 August 2020
                        <span>Bombay Convention & Exhibition Centre,<br> Mumbai</span></div>
                    <a href="https://www.licenseindia.com/expo/"  class="btn btn-default eventbtn" >Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 7290049926</span>
                </div>
            </li>


            <li class="column fro delhi">
                <a href="https://expo.franchiseindia.com/"  target="_blank">
                    <div class="imgblk">
                        <div class="backdr">
                            <div class="logocent"><img src="{{URL::asset('images/events/expologo-logo.png')}}"
                                                       alt="Franchise India Expo Logo " class="ev-logo"/></div>
                        </div>
                        <img src="{{URL::asset('images/events/frodelhi-bg.jpg')}}" alt="Franchise India Delhi " class="bdr">
                    </div>
                </a>
                <div class="demopadding">
                    <div class="icon social fb">
                        <a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                    <div class="icon social tw">
                        <a href="http://twitter.com/FranchiseIndia" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    </div>
                    <div class="icon social in">
                        <a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="eventcontentblk">
                    <div class="eventhdk">Franchise India 2020</div>
                    <div class="venuedate"> 17 - 18 October 2020
                        <span>PRAGATI MAIDAN, NEW DELHI</span></div>
                    <a href="https://expo.franchiseindia.com/"  class="btn btn-default eventbtn" >Visit Website</a>
                </div>
                <div class="eventhotline">
                    Hotline: <span>+91 8588804788</span>
                </div>
            </li>




 -->























            {{--<li class="column forums delhi">--}}
                {{--<a href="http://www.estateawards.com/" target="_blank">--}}
                    {{--<div class="imgblk">--}}
                        {{--<div class="backdr">--}}
                            {{--<div class="logocent"><img src="{{URL::asset('images/events/estate-logo.png')}}"--}}
                                                       {{--alt="Estate Awards Logo " class="ev-logo"/></div>--}}
                        {{--</div>--}}
                        {{--<img src="{{ URL::asset('images/events/estateawards-bg.jpg') }}" alt="Estate Awards 2019" class="bdr">--}}
                    {{--</div>--}}
                {{--</a>--}}
                {{--<div class="demopadding">--}}
                    {{--<div class="icon social fb">--}}
                        {{--<a href="http://www.facebook.com/FranchiseIndiaMedia" target="_blank"><i--}}
                                    {{--class="fa fa-facebook"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="icon social tw">--}}
                        {{--<a href="http://twitter.com/FranchiseIndia" target="_blank"><i--}}
                                    {{--class="fa fa-twitter"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="icon social in">--}}
                        {{--<a href="https://www.linkedin.com/company/franchise-india-holdings-limited?trk=tyah"--}}
                           {{--target="_blank"><i class="fa fa-linkedin"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="eventcontentblk">--}}
                    {{--<div class="eventhdk">Estate Awards 2019--}}
                    {{--</div>--}}
                    {{--<div class="venuedate"> 21 August--}}
                        {{--<span>JW Marriott Hotel, New Delhi</span></div>--}}
                    {{--<a href="http://www.estateawards.com/" target="_blank" class="btn btn-default eventbtn">Visit Website</a>--}}
                {{--</div>--}}
                {{--<div class="eventhotline">--}}
                    {{--Hotline: <span>+91 9313034080</span>--}}
                {{--</div>--}}
            {{--</li>--}}










        </ul>
    </div>
    <!--form end here -->
    <div class="height40"></div>
    <div class="modal fade lg-panel formsection" id="eventEnquire" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <div class="adhead">Enquire here </div>
                    <div class="subadhead" id="showName">Franchise & Retail Opportunities Show - Chennai </div>

                    <form class="form-horizontal" action="https://master.franchiseindia.com/fro/register_update.php" method="post" id="submitForm">

                        <input type="hidden" name="src" id="src" value="DOTCOM" />
                        <input type="hidden" name="hidType" id="hidType" value="Delhi Show 2018">

                        <input id="ref" name="ref" type="hidden" value="FRO-Insta-Paid">
                        <input type="hidden" value="" name="event_year" id="event_year">
                        <input type="hidden" value="" name="event_title" id="event_title">
                        <input type="hidden" value="" name="event_city" id="event_city">
                        <input id="source" name="source" type="hidden" value="website">

                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{URL::asset('images/user.png')}}"></span>
                                <input type="text" class="form-control" placeholder="Enter Your Name" required name="txtName">
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{URL::asset('images/email.png')}}"></span>
                                <input type="email" class="form-control" placeholder="Enter Your Email" required name="txtEmail">
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{URL::asset('images/mobile.png')}}"></span>
                                <input type="text" class="form-control" pattern="[0-9]{10,10}" maxlength="10" placeholder="Enter Mobile" required name="txtPhone">
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{URL::asset('images/iwanto.png')}}"></span>
                                <select id="want" name="tfw_interest" class="form-control myselectclass" required name="selectchoice">
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
                                <span class="input-group-addon"><img src="{{URL::asset('images/pincode.png')}}"></span>
                                <input type="text" pattern="[0-9]{6,6}" maxlength="6" class="form-control" placeholder="Enter Pincode" required name="txtPincode">
                            </div>
                        </div>
                        <div class="frm-pnl">
                            <div class="input-group">
                                <span class="input-group-addon" style="vertical-align:top">
                                    <img src="{{URL::asset('images/comment.png')}}"></span>
                                <textarea class="form-control height100" placeholder="Enter Your comment" id="comment" required name="comment"></textarea>
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
                $('input:radio[name=eventradi]').each(function () {
                    $(this).parent().css('display', 'none');
                });
                if (Array.isArray(l)) {
                    for (var i = 0; i < l.length; i++) {
                        $("input[type=radio][name=eventradi][value=" + l[i] + "]").parent().css('display', 'inline-block');
                    }
                }
            }
            else {
                $('input:radio[name=eventradi]').each(function () {
                    $(this).parent().css('display', 'inline-block');
                });
            }
            $(".column").removeAttr("style");
            $('input:radio[name=eventradi]').each(function () {
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
            }
            else {
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
        $(document).ready(function () {
            if ($(window).width() < 599) {
                $("#tslshow").css("width", containerWidth);
                $(".bstimeslider ul li").css("width", $(window).width());
            }
        });
        $("#rightArrow").click(function () {
            var currentPosition = parseInt(view.css("left"));
            if (currentPosition >= sliderLimit) view.stop(false, true).animate({left: "-=" + move}, {duration: 400})
        });

        $("#leftArrow").click(function () {
            var currentPosition = parseInt(view.css("left"));
            if (currentPosition < 0) view.stop(false, true).animate({left: "+=" + move}, {duration: 400})
        });

    </script>
@endsection
