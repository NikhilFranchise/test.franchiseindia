
@extends('admin.layout.master')
@section('content')
<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i
                class="icon-home"></i> Home</a> <a href="data" class="tip-bottom">User Top Search Data</a>
        <a href="" class="current"> </a>
    </div>
    {{-- <h1> Insights Listing</h1> --}}
</div>
<br>
<!--End-breadcrumbs-->
<style>
    .insights-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        max-width: 1100px;
        margin: 40px auto;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .insights-title {
        font-weight: 600;
        color: #333333;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-inline {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-end;
        gap: 10px;
    }

    .form-inline .form-group {
        flex: 1 1 220px;
        min-width: 180px;
    }

    .form-inline input,
    .form-inline select {
        width: 100%;
        padding: 5px;
        border-radius: 3px;
        border: 1px solid #161515;
        height:33px;
    }

    .form-inline .form-label {
        font-weight: 500;
        display: block;
        margin-bottom: 5px;
    }

    .form-inline .btn-primary {
        width: 180px;
        border-radius: 2px;
        height:34px;
    }

    .table-responsive {
        overflow-x: auto;
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .form-inline {
            flex-direction: column;
            align-items: stretch;
        }

        .form-inline .btn-primary {
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
</style>
<div clas= "top">
<div class="insights-container">
    <h2 class="insights-title">Search Monitor - Filter by Date & Sort by Count</h2>

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
            <label for="sort_order" class="form-label">Sort By Count:</label>
            <select name="sort_order" class="form-control">
                <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>Descending</option>
                <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>Ascending</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if ($results && $results->count() > 0)
        <h3 style="margin-top: 30px;">Results from {{ $from }} to {{ $to }} (Sorted by count {{ strtoupper($sortOrder) }})</h3>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Keyword</th>
                        <th>Date</th>
                        <th>Count</th>
                        <th>Source</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $index => $row)
                        <tr>
                            <td style="text-align: center">{{ $results->firstItem() + $index }}</td>
                            <td style="text-align: center">{{ $row->keyword }}</td>
                            <td style="text-align: center">{{ \Carbon\Carbon::parse($row->date)->format('Y-m-d') }}</td>
                            <td style="text-align: center">{{ $row->count }}</td>
                            <td style="text-align: center">{{ $row->source }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $results->links('pagination::bootstrap-4') }}
    @elseif($from && $to)
        <p>No records found in this date range.</p>
    @endif
</div>
</div>
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
@endsection
