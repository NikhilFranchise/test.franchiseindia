@extends('admin.layout.master')
@section('SM', 'active')
@section('content')
    @push('styles')
        <style>
            .form-inline {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: flex-end;
                /* gap: 10px; */
                margin-left: 40px;
                margin-bottom: 30px;
            }

            .form-inline .form-group {
                min-width: 209px;
            }

            .form-inline input,
            .form-inline select {
                width: 85%;
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
                box-shadow: none;
            }

            .btn-success {
                width: 150px;
                margin-left: 20px;
                border-radius: 2px;
            }

            .table-responsive {
                overflow-x: auto;
                /* margin-top: 20px; */
            }

            @media (max-width: 768px) {
                .form-inline {
                    flex-direction: column;
                    align-items: stretch;
                }

                .form-inline .btn-secondary {
                    width: 100%;
                    margin-top: 15px;
                }
            }

            .pagination {
                display: flex;
                justify-content: center;
                margin-top: 30px;
                list-style: none;
                padding: 0;
                gap: 6px;
            }

            .pagination li {
                display: inline-block;
            }

            .pagination a,
            .pagination span {
                display: block;
                padding: 8px 14px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #f9f9f9;
                color: #333;
                text-decoration: none;
                transition: all 0.2s ease-in-out;
            }

            .pagination a:hover {
                background-color: #007bff;
                color: #fff;
                border-color: #007bff;
            }

            .pagination .active span {
                background-color: #007bff;
                color: #fff;
                border-color: #007bff;
                font-weight: bold;
            }

            .pagination .disabled span {
                color: #999;
                background-color: #eee;
                cursor: not-allowed;
            }

            #searchTable td {
                font-size: 13px;
                text-align: left;
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
                border-bottom-color: transparent;
            }


            .nav-tabs>li>a:hover,
            .nav-tabs>li>a:focus {
                margin-right: 2px;
                line-height: 1.42857143;
                border: 1px solid transparent;
                border-radius: 4px 4px 0 0;
                background-color: #4b4f54;
                color: #fff;
            }

            .widget-title {
                border-top: 1px solid #CDCDCD;

            }
        </style>
    @endpush
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('admin.Dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="{{ url()->current() }}" class="current"><i class="fa fa-search"></i> Search Moniter</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <br>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li @if (url()->current() == route('search.data.form')) class="active" @endif>
                        <a href="{{ route('search.data.form') }}">Search Moniter</a>
                    </li>
                    <li @if (url()->current() == route('insights.stats')) class="active" @endif>
                        <a href="{{ route('insights.stats') }}">Insights Stats</a>
                    </li>
                </ul>
                <div class="widget-box">
                    <h4 style="text-align:center; cursor:pointer; background:#f5f5f5; padding:10px; border-radius:4px;"
                        id="toggleColaps">Search Monitor - Filter by Date & Sort by
                    </h4>
                    <form method="POST" action="{{ route('search.data.fetch') }}" class="form-inline">
                        @csrf

                        <div class="form-group">
                            <label for="from_date" class="form-label">From:</label>
                            <input type="date" name="from_date" required value="{{ old('from_date', $from) }}">
                        </div>

                        <div class="form-group">
                            <label for="to_date" class="form-label">To:</label>
                            <input type="date" name="to_date" required value="{{ old('to_date', $to) }}">
                        </div>

                        <div class="form-group">
                            <label for="sort_order" class="form-label">Sort By:</label>
                            <select name="sort_order" class="form-control">
                                <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>Descending
                                </option>
                                <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>Ascending</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                        <div class="form-group">

                            <a href="{{ route('search.data.form') }}" class="btn btn-secondary" role="button">Reset</a>
                        </div>
                    </form>
                    <div class="widget-title"> <span class="icon"><i class="fa fa-search"></i></span>
                        @if ($results && $results->count() > 0)
                            <h5>Results from {{ $from }} to {{ $to }} (Sorted
                                by count {{ strtoupper($sortOrder) }})
                            </h5>
                        @endif
                    </div>
                    @if ($results && $results->count() > 0)
                        <div class="widget-content nopadding table-responsive">
                            <table class="table table-bordered table-striped" id="searchTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Keyword</th>
                                        <th>Date</th>
                                        <th>Count</th>
                                        <th>Source</th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontent">
                                    @foreach ($results as $index => $row)
                                        <tr>
                                            <td style="text-align: center">{{ $results->firstItem() + $index }}</td>
                                            <td style="text-align: center">{{ $row->keyword }}</td>
                                            <td style="text-align: center">
                                                {{ \Carbon\Carbon::parse($row->date)->format('d-m-Y') }}
                                            </td>
                                            <td style="text-align: center">{{ $row->count }}</td>
                                            <td style="text-align: center">{{ $row->source }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $results->links('pagination::bootstrap-4') }}
                        </div>
                    @elseif($from && $to)
                        <p style="text-align:center; font-size:12px;">No records found in this date range.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const fromInput = document.querySelector('input[name="from_date"]');
            const toInput = document.querySelector('input[name="to_date"]');

            fromInput.addEventListener('change', () => {
                const fromDate = fromInput.value;
                toInput.min = fromDate;

                if (toInput.value < fromDate) {
                    toInput.value = fromDate;
                }
            });

            window.addEventListener('DOMContentLoaded', () => {
                const fromDate = fromInput.value;
                if (fromDate) {
                    toInput.min = fromDate;
                }
            });
        </script>
    @endpush
@endsection
