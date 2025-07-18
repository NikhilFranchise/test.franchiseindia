<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SearchMonitor;
use Carbon\Carbon; // ← important!

class SearchMonitorController extends Controller
{
    public function showDataForm(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');
        $sortOrder = $request->query('sort_order', 'desc');

        $results = collect();

        if ($from && $to) {
             // Convert date strings to Carbon and strip time
             $startDate = Carbon::parse($from)->startOfDay(); // 00:00:00
             $endDate = Carbon::parse($to)->endOfDay();       // 23:59:59
 
             $results = SearchMonitor::whereBetween('date', [$startDate, $endDate])
                 ->orderBy('count', $sortOrder)
                 ->orderBy('date', 'desc')
                 ->paginate(2)
                 ->appends([
                     'from' => $from,
                     'to' => $to,
                     'sort_order' => $sortOrder,
                 ]);
        }

        return view('admin.search.data', [
            'results' => $results,
            'from' => $from,
            'to' => $to,
            'sortOrder' => $sortOrder,
        ]);
    }

    public function fetchData(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'sort_order' => 'in:asc,desc',
        ]);

        $from = $request->input('from_date');
        $to = $request->input('to_date');
        $sortOrder = $request->input('sort_order', 'desc');

        // Redirect to GET route with filters in query string
        return redirect()->route('search.data.form', [
            'from' => $from,
            'to' => $to,
            'sort_order' => $sortOrder,
        ]);
    }
}
