<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsightList;
use App\Models\InsightListHindi;
use Illuminate\Http\Request;
use App\Models\SearchMonitor;
use Carbon\Carbon; // ← important!
use Illuminate\Support\Facades\DB;

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
                ->paginate(100)
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

    public function monthlyStats(Request $request)
    {
        if ($request->filled(['from_date', 'to_date'])) {
            $startDate = Carbon::parse($request->from_date)->startOfDay();
            $endDate = Carbon::parse($request->to_date)->endOfDay();

            // 1. English Insights Count
            $englishQuery = InsightList::select(
                'insight_type',
                DB::raw("
                CASE 
                    WHEN published_date IS NULL THEN created_at
                    WHEN published_date = created_at THEN created_at
                    WHEN published_date > created_at THEN published_date
                    ELSE created_at
                END AS effective_date
            ")
            )->where('status', 1);

            $englishBase = $englishQuery->toBase();

            $englishCounts = DB::table(DB::raw("({$englishBase->toSql()}) as subquery"))
                ->mergeBindings($englishBase)
                ->whereBetween('effective_date', [$startDate, $endDate])
                ->selectRaw("
                COUNT(CASE WHEN insight_type = 'Article' THEN 0 END) AS article_count,
                COUNT(CASE WHEN insight_type = 'News' THEN 0 END) AS news_count,
                COUNT(CASE WHEN insight_type = 'Interview' THEN 0 END) AS interview_count,
                COUNT(CASE WHEN insight_type = 'Report' THEN 0 END) AS report_count,
                COUNT(CASE WHEN insight_type NOT IN ('Article', 'News', 'Interview', 'Report') THEN 0 END) AS others_count
            ")
                ->first();

            // 2. Hindi Insights Count
            $hindiQuery = InsightListHindi::select(
                'insight_type',
                DB::raw("
                CASE 
                    WHEN published_date IS NULL THEN created_at
                    WHEN published_date = created_at THEN created_at
                    WHEN published_date > created_at THEN published_date
                    ELSE created_at
                END AS effective_date
            ")
            )->where('status', 1);

            $hindiBase = $hindiQuery->toBase();

            $hindiCounts = DB::table(DB::raw("({$hindiBase->toSql()}) as subquery"))
                ->mergeBindings($hindiBase)
                ->whereBetween('effective_date', [$startDate, $endDate])
                ->selectRaw("
                COUNT(CASE WHEN insight_type = 'Article' THEN 0 END) AS article_count,
                COUNT(CASE WHEN insight_type = 'News' THEN 0 END) AS news_count,
                COUNT(CASE WHEN insight_type = 'Interview' THEN 0 END) AS interview_count,
                COUNT(CASE WHEN insight_type = 'Report' THEN 0 END) AS report_count,
                COUNT(CASE WHEN insight_type NOT IN ('Article', 'News', 'Interview', 'Report') THEN 0 END) AS others_count
            ")
                ->first();

            return view('admin.search.insights_stats', [
                'from_date' => $startDate,
                'to_date' => $endDate,
                'englishCounts' => $englishCounts,
                'hindiCounts' => $hindiCounts,
            ]);
        }
        return view('admin.search.insights_stats');
    }
}
