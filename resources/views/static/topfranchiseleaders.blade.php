@extends('layout.master')
@section('seoTitle', 'Top Franchise Leaders in India 2025 | Visionary Franchise CEOs')
@section('seoDesc',
    'Top 50 Franchise Leaders in India for 2025 — influential leaders and entrepreneurs setting
    benchmarks in growth, strategy and franchising excellence in India.')
@section('canonicalUrl', url('/top-franchise-leaders'))
@section('content')
    @push('styles')
        <style>
            .back-btns a,
            .back-btns {
                color: #ec1d23;
            }

            .top-table {
                width: 100%;
                margin-top: 20px;
            }

            .top-table tr:nth-child(n) {
                background-color: #F9FAFB !important;
            }

            .top-table tr {
                border-bottom: 1px solid #e3e3e3;
            }

            .table-striped>tbody>tr:nth-of-type(2n+1) {
                background-color: #f9f9f9;
            }

            .top-table th {
                padding: 15px !important;
                background-color: #F3F4F6 !important;
                border-top: 1px solid #e3e3e3;
                color: #333333;
                font-size: 16px;
            }

            .top-table td:nth-child(1) {
                width: 10%;
                padding-left: 20px !important;
            }

            .top-table th:nth-child(1) {
                padding-left: 20px !important;
            }

            .top-table td {
                padding: 15px 20px 15px 20px !important;
                color: #333333;
                font-size: 16px;
                font-weight: bold;
            }

            .top-table tr:nth-child(n):hover {
                background-color: #E9ECF4 !important;
            }

            .top-table td:nth-child(2) {
                width: 17%;
            }

            .top-table td:nth-child(3) {
                width: 36%;
                font-weight: 400;
                font-size: 16px;
                line-height: 27px;
            }

            .top-table td:nth-child(4) {
                width: 1%;
            }

            .top-table td:nth-child(5) {
                width: 15%;
            }

            .top-table tr:nth-child(2n) {
                background-color: #ffffff !important;
            }

            .back-btns {
                text-align: right;
                text-decoration: underline;
            }

            a.desklink {
                background-color: #000000;
                padding: 14px 20px;
                border-radius: 5px;
                font-weight: normal;
                display: block;
                font-size: 15px;
                color: #ffffff !important;
                text-align: center;
                width: 110px;
                float: none;
            }

            a.desklink:hover {
                color: #ffffff !important;
            }

            .img-top-fifty {
                width: 90px;
                height: auto;
                border-radius: 200px;
            }

            .top-fifty-mag {
                margin-bottom: 15px;
            }

            .back-btns {
                float: right;
            }

            /* add style 21-01-26 */
            .margintop60 {
                margin-top: 15px;
                margin-bottom: 40px;

            }

            .top-hundred h1 {
                color: #333333;
                font-size: 26px;
                font-weight: 700;
                margin-top: 0px;
            }

            .top-hundred p {
                color: #333333;
                font-size: 16px;
                line-height: 24px;
            }

            .top-hundred-tab h3 {
                color: #333333;
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 11px;
            }

            .top-hundred a {
                color: #ED1C25;
                font-size: 17px;
                text-decoration: underline;
                cursor: pointer;
            }

            .top-hundred a:hover {
                color: #ED1C25;
                text-decoration: underline;
                cursor: pointer;
            }

            .top-hundred-tab {
                border: 1px solid #E9ECF4;
                padding: 0px 20px 20px 20px;
                border-radius: 4px;
                background: #ffffff;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .yeartab li.active {
                background: #3E3E3E;
                padding: 4px 25px;
                border-radius: 4px;
            }

            .yeartab li.active {
                color: #ffffff !important;
                position: relative;
            }

            .yeartab li.active a,
            .yeartab li.active a:focus,
            .yeartab li.active a:visited {
                color: #ffffff !important;
                font-weight: bold;
                font-size: 20px;
                cursor: pointer;
            }

            .yeartab li {
                margin-bottom: 20px;
                background: #ffffff;
                padding: 4px 25px;
            }

            .yeartab li a {
                color: #333333;
                font-weight: bold;
                font-size: 20px;
                cursor: pointer;
            }

            .yeartab {
                display: block !important;
            }

            .yeartab li.active::after {
                border-radius: 10px 20px 20px 5px;
                width: 20px;
                position: absolute;
                padding-left: 40px;
                bottom: 0px;
                left: 50px;
                bottom: 10px;
                display: block;
            }

            .nav>li>a {
                border: none;
            }

            .nav-tabs>li.active>a,
            .nav-tabs>li.active>a:focus,
            .nav-tabs>li.active>a:hover {
                color: #fff;
                cursor: default;
                background-color: rgb(62, 62, 62);
                border: 0 solid rgba(237, 28, 36, .6);
                border-radius: 0 !important;
                padding: 10px 15px !important;
                margin-left: 1px
            }

            .nav>li>a:focus,
            .nav>li>a:hover {
                text-decoration: none;
                background-color: rgb(255, 255, 255);
                color: #000;
                border-radius: 0px;
            }

            .nav-tabs {
                border-bottom: 0 solid #ddd;
                margin-bottom: 0 !important;
                padding-left: 0
            }

            .nav-tabs li.active {
                border-bottom: 1px solid #f00;

            }

            .nav-tabs li:hover span {
                color: #f00;
            }

            .nav-tabs li.active span {
                color: #f00;
            }

            @media screen and (max-width: 768px) {
                .top-fifty-table {
                    overflow: auto;
                    white-space: nowrap;
                }

                .staicp h1 {
                    font-size: 20px !important;
                    font-weight: 600 !important;
                    margin-top: 10px !important;
                }

                .nav-tabs>li.active>a,
                .nav-tabs>li.active>a:focus,
                .nav-tabs>li.active>a:hover {
                    color: rgb(255, 255, 255);
                    cursor: default;
                    background-color: rgb(62, 62, 62) !important;
                    /* border-bottom: 1px solid rgba(237, 28, 36, 0.6) !important; */
                    border-radius: 4px !important;
                    padding: 10px 15px !important;
                    border-top: none !important;
                    border-left: none !important;
                    border-right: none !important;
                }

                .top-hundred {
                    padding: 0px 20px
                }

                .top-hundred-tab .nav-tabs {
                    padding-left: 0px;
                }

                .nav-tabs {
                    margin-left: 20px !important;
                }

                .top-hundred-tab h3 {
                    font-size: 17px;
                }

                .yeartab li {
                    padding: 2px 4px;
                    margin-bottom: 0px !important;
                    margin-right: 5px !important;
                    background: #ffffff;
                }

                .yeartab .nav>li>a,
                .nav-tabs>li.active>a,
                .nav-tabs>li.active>a:focus,
                .nav-tabs>li.active>a:hover {
                    padding: 10px 10px !important;
                }

                .yeartab li.active {
                    padding: 2px 4px !important;
                    font-weight: normal;
                }

                .yeartab li.active a {
                    font-size: 14px !important;
                    font-weight: normal;
                }

                .yeartab li.focus {
                    padding: 2px 4px;
                    font-weight: normal;
                }

                .yeartab li.focus a {
                    font-size: 14px !important;
                    font-weight: normal;
                }

                .yeartab li.active a,
                .yeartab li.active a:focus,
                .yeartab li.active a:visited {
                    font-size: 14px;
                }

                .yeartab li a {
                    font-size: 14px !important;
                    font-weight: normal;
                }
            }
        </style>
    @endpush
    <div class="container formsection margintop60 staicp">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="nav nav-tabs yeartab" role="tablist">
                    @foreach ($availableYears as $yearOption)
                        <li role="presentation" @if ($yearOption == $year) class="active" @endif>
                            <a role="tab" onclick="changeYear({{ $yearOption }})">{{ $yearOption }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($availableYears as $yearOption)
                        <div id="year{{ $yearOption }}" role="tabpanel"
                            class="tab-pane fade @if ($yearOption == $year) in active @endif">
                            <div class="top-hundred">
                                <h1>Top {{ $leadersCount }} Leaders in Franchising - {{ $yearOption }}</h1>
                                @if ($yearOption == 2024)
                                    <img src='{{ asset('/topfranchiseleaders/images/topfifty-2024.webp') }}'
                                        alt="Top 50 Leaders in Franchising {{ $yearOption }}"
                                        class="img-fluid top-fifty-mag">
                                    <p class="static-txt-ter" style="margin-bottom:25px;">Recognize the exceptional leaders
                                        who shaped franchising in 2024. These visionary entrepreneurs and executives have
                                        demonstrated remarkable resilience, innovation, and commitment to excellence. From
                                        expanding their brands across new markets to implementing cutting-edge strategies,
                                        they've set new benchmarks for success in the franchise industry. Explore their
                                        achievements and learn what makes them stand out as top franchise leaders.</p>
                                @elseif ($yearOption == 2025)
                                    <img src='{{ asset('/topfranchiseleaders/images/topfifty-2025.webp') }}'
                                        alt="Top 50 Leaders in Franchising {{ $yearOption }}"
                                        class="img-fluid top-fifty-mag">
                                    <p class="static-txt-ter" style="margin-bottom:25px;">This year’s Top 50 Franchise
                                        Leaders truly reflect what leadership in franchising looks like on the ground.
                                        Through steady growth, practical decisions and a clear understanding of their
                                        markets, they have shown how brands can expand while staying strong at the core.
                                        Their journeys are not just about numbers, but about building teams, supporting
                                        partners, and creating systems that work in the real world.
                                        At The Franchising World, this list has been carefully handpicked from more than 250
                                        nominations received from across the country. Each name has been selected after
                                        closely reviewing their work, performance, and contribution to the franchise
                                        ecosystem.
                                        This recognition is a small way of acknowledging their effort, commitment, and
                                        contribution to the franchise industry. It highlights the work they have done and
                                        the example they set for others who aspire to grow through franchising.</p>
                                @endif
                                <div class="top-fifty-listing">
                                    <div class="top-fifty-table">
                                        <table class="table-striped table-responsive top-table">
                                            <thead>
                                                <tr>
                                                    <th>Leaders </th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Profile</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($leaders as $leader)
                                                    @php
                                                        $link =
                                                            'top-franchise-leaders/' .
                                                            $yearOption .
                                                            '/' .
                                                            Str::slug($leader->name) .
                                                            '/' .
                                                            $leader->id;
                                                    @endphp
                                                    <tr>
                                                        <td><a href="{{ $link }}">
                                                                <img src="{{ $leader->image_path }}" class="img-top-fifty"
                                                                    alt="{{ $leader->name }}"></a>
                                                        </td>
                                                        <td>{{ $leader->name }}</td>
                                                        <td>{{ $leader->designation }}</td>
                                                        <td>
                                                            <a href="{{ $link }}" class="desklink">
                                                                Profile
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" style="text-align: center; padding: 40px;">
                                                            No leaders found for {{ $yearOption }}.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeYear(year) {
            window.location.href = `?year=${year}`;
        }
    </script>

@endsection
