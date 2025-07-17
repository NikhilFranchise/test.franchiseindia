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
            list-style: none;
            display: flex;
            gap: 6px;
            padding: 0;
        }
        .pagination li {
            display: inline;
        }
        .pagination a,
        .pagination span {
            padding: 6px 10px;
            border: 1px solid #aaa;
            color: #333;
            text-decoration: none;
        }
        .pagination .active span {
            background-color: #eee;
            font-weight: bold;
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
                    <td>{{ $row->date }}</td>
                    <td>{{ $row->count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $results->links() }}
    </div>
@elseif($from && $to)
    <p>No records found in this date range.</p>
@endif

</body>
</html>
