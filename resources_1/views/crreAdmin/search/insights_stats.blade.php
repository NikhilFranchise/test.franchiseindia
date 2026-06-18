@extends('crreAdmin.layout.master')
@section('IN', 'active open')
@section('SM', 'active')
@section('content')
    @push('styles')
        <style>
            .form-inline {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: flex-end;
                margin-left: 40px;
                margin-bottom: 30px;
            }

            .form-inline .form-group {
                /* flex: auto; */
                min-width: 209px;
            }

            .form-inline input,
            .form-inline select {
                width: 100%;
                border-radius: 2px;
                border: 1px solid #CDCDCD;
                height: auto;
            }

            .form-inline .form-label {
                font-weight: 500;
                display: block;
            }

            .form-inline .btn-secondary {
                width: 150px;
                border-radius: 2px;
                height: auto;
                color: #fff;
                background-color: #4b4f54;
                border-color: #4b4f54;
            }

            #searchTable td {
                font-size: 13px;
                text-align: center;
            }

            #searchTable th {
                font-size: 13px;
                padding: 7px;
            }

            .nav-tabs>li.active>a,
            .nav-tabs>li.active>a:hover,
            .nav-tabs>li.active>a:focus {
                color: #fff;
                cursor: default;
                background-color: #4b4f54;
                border: 1px solid #ddd;
                /* border-bottom-color: transparent; */
            }


            .nav-tabs>li>a:hover,
            .nav-tabs>li>a:focus {
                border: 1px solid transparent;
                background-color: #4b4f54;
                color: #fff;
            }

            .widget-title {
                border-top: 1px solid #CDCDCD;

            }

            .btn-success {
                width: 180px;
                margin-left: 30px;
                border-radius: 2px;
            }
        </style>
    @endpush
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('crreAdmin.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>
                Home</a>
            <a href="{{ url()->current() }}" class="current"><i class="fa fa-search"></i>Content Statistics</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <br>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <h4 style="text-align:center; cursor:pointer; background:#f5f5f5; padding:10px; border-radius:4px;"
                        id="toggleColaps">Monthly Statistics of Content</h4>
                    <form method="get" class="form-inline">
                        @csrf

                        <div class="form-group">
                            <label for="from_date" class="form-label">From:</label>
                            <input type="date" name="from_date" required value="{{ request('from_date') }}">
                        </div>

                        <div class="form-group">
                            <label for="to_date" class="form-label">To:</label>
                            <input type="date" name="to_date" required value="{{ request('to_date') }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('crreAdmin.content.stats') }}" class="btn btn-secondary"
                                role="button">Reset</a>
                        </div>
                    </form>
                    <div class="widget-title"> <span class="icon"><i class="fa fa-search"></i></span>
                        @if (isset($englishCounts) && isset($hindiCounts))
                            @php
                                $fromDate = \Carbon\Carbon::parse(request('from_date'));
                                $toDate = \Carbon\Carbon::parse(request('to_date'));
                            @endphp
                            <h5>Results from {{ $fromDate->format('d-m-Y') }} to {{ $toDate->format('d-m-Y') }}</h5>
                        @endif

                    </div>
                    <div class="widget-content nopadding">
                        @if (isset($englishCounts) && isset($hindiCounts))
                            <table class="table table-bordered table-striped" id="searchTable">
                                <thead>
                                    <tr>
                                        <th>Content Type</th>
                                        <th>English Count</th>
                                        <th>Hindi Count</th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontent">
                                    <tr>
                                        <td>Articles</td>
                                        <td>{{ $englishCounts->article_count }}</td>
                                        <td>{{ $hindiCounts->article_count }}</td>
                                    </tr>
                                    <tr>
                                        <td>News</td>
                                        <td>{{ $englishCounts->news_count }}</td>
                                        <td>{{ $hindiCounts->news_count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Interviews</td>
                                        <td>{{ $englishCounts->interview_count }}</td>
                                        <td>{{ $hindiCounts->interview_count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Reports</td>
                                        <td>{{ $englishCounts->report_count }}</td>
                                        <td>{{ $hindiCounts->report_count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Others</td>
                                        <td>{{ $englishCounts->others_count }}</td>
                                        <td>{{ $hindiCounts->others_count }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
