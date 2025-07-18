<!DOCTYPE html>
<html>
<head>
    <title>Search Monitor</title>
    <meta name="robots" content="noindex, nofollow">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        form {
            margin-bottom: 30px;
        }
        label {
            margin-right: 10px;
        }
        input, select, button {
            margin: 10px;
            padding: 6px 10px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
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
</head>
<body>

<h2>Search Monitor - Filter by Date & Sort by Count</h2>

<form method="POST" action="{{ route('search.data.fetch') }}">
    @csrf

    <label for="from_date">From:</label>
    <input type="date" name="from_date" required value="{{ old('from_date', $from) }}">

    <label for="to_date">To:</label>
    <input type="date" name="to_date" required value="{{ old('to_date', $to) }}">

    <label for="sort_order">Sort By Count:</label>
    <select name="sort_order">
        <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>Descending</option>
        <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>Ascending</option>
    </select>

    <button type="submit">Submit</button>
</form>

@if ($results && $results->count() > 0)
    <h3>Results from {{ $from }} to {{ $to }} (Sorted by count {{ strtoupper($sortOrder) }})</h3>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Keyword</th>
                <th>Date</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $index => $row)
                <tr>
                    <td>{{ $results->firstItem() + $index }}</td>
                    <td>{{ $row->keyword }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->date)->format('Y-m-d') }}</td>
                    <td>{{ $row->count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $results->links('pagination::bootstrap-4') }}  {{-- For Bootstrap --}}


@elseif($from && $to)
    <p>No records found in this date range.</p>
@endif
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

    // Set min to_date on page load if from_date exists
    window.addEventListener('DOMContentLoaded', () => {
        const fromDate = fromInput.value;
        if (fromDate) {
            toInput.min = fromDate;
        }
    });
</script>

</body>
</html>
