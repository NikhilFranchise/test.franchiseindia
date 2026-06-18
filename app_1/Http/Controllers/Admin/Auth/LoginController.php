<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\AuthorList;
use App\Models\InsightList;
use App\Models\InsightListHindi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    protected $redirectTo = '/admin/dashboard';
    /**
     *View the login Page
     */
    public function loginView()
    {
        return view('admin.admin-login');
    }

    /**
     *  login view function
     *  name & password are coming from form data
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminLogin(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'min:6',
                'regex:/[a-z]/',      // at least one lowercase
                'regex:/[A-Z]/',      // at least one uppercase
                'regex:/\d/',         // at least one digit
            ],
        ], [
            'email.required' => 'Email is required.',
            'email.email'    => 'Please enter a valid email address.',

            'password.required' => 'Password is required.',
            'password.min'      => 'Password must be at least 6 characters long.',
            'password.regex'    => 'Password must include at least one uppercase letter, one lowercase letter, and one number.',
        ]);



        // Check if user exists
        $user = AdminUser::with('author')->where('admin_email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'This email is not registered with us.');
        }

        // Check if user is active
        if ($user->admin_is_active != 1) {
            return back()->with('warning', 'Your account is not active. Please contact support.');
        }

        // Try to login using guard
        if (Auth::guard('admin')->attempt([
            'admin_email' => $request->email,
            'password'    => $request->password,
        ])) {
            // Refresh instance after login
            $user = Auth::guard('admin')->user();
            session()->put('role', 'fi');

            // Update last login
            $user->update(['last_login_at' => now()]);
            return redirect()->intended($this->redirectTo)->with(
                'success',
                'Welcome back ' . ucwords($user->author->title ?? $user->admin_name) .
                    '! You are logged in as ' . ucfirst($user->admin_role) . '.'
            );
        }

        // If attempt failed (wrong password)
        return back()->with('error', 'The password you entered is incorrect.');
    }


    /**
     *logout
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.Login');
    }



    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Try to fetch the admin by email
        $admin = AdminUser::where('admin_email', $request->email)->first();

        if (!$admin) {
            return back()->with('error', 'This Email ID is not registered with us.');
        }

        // Update password
        $admin->admin_password = Hash::make($request->password);
        $admin->save();

        // Login the admin after reset
        Auth::guard('admin')->login($admin);

        return redirect('/admin/dashboard')->with('success', 'Password reset successfully. You are now logged in.');
    }

    public function viewDashboard(Request $request)
    {
        $months = 6;
        $startDate = now()->subMonths($months)->startOfMonth();
        $endDate = now()->endOfMonth();

        // --- Helper: insights count by type per month ---
        $getMonthlyInsights = function ($model, $months) {
            $data = [];
            for ($i = $months; $i >= 0; $i--) {
                $start = now()->subMonths($i)->startOfMonth();
                $end = now()->subMonths($i)->endOfMonth();

                $query = $model::select(
                    'insight_type',
                    DB::raw("
                    CASE 
                        WHEN published_date IS NULL THEN created_at
                        WHEN published_date = created_at THEN created_at
                        WHEN published_date > created_at THEN published_date
                        ELSE created_at
                    END AS effective_date
                ")
                );
                // ->where('status', 1)
                $base = $query->toBase();

                $counts = DB::table(DB::raw("({$base->toSql()}) as subquery"))
                    ->mergeBindings($base)
                    ->whereBetween('effective_date', [$start, $end])
                    ->selectRaw("
                    COUNT(CASE WHEN insight_type = 'Article' THEN 1 END) AS article_count,
                    COUNT(CASE WHEN insight_type = 'News' THEN 1 END) AS news_count,
                    COUNT(CASE WHEN insight_type = 'Interview' THEN 1 END) AS interview_count,
                    COUNT(CASE WHEN insight_type = 'Report' THEN 1 END) AS report_count,
                    COUNT(CASE WHEN insight_type = 'Event' THEN 1 END) AS event_count,
                    COUNT(CASE WHEN insight_type NOT IN ('Article','News','Interview','Report','Event') THEN 1 END) AS others_count
                ")
                    ->first();

                $data[] = [
                    'month' => now()->subMonths($i)->format('M Y'),
                    'Article' => $counts->article_count,
                    'News' => $counts->news_count,
                    'Interview' => $counts->interview_count,
                    'Report' => $counts->report_count,
                    'Event' => $counts->event_count,
                    'Others' => $counts->others_count,
                ];
            }

            return $data;
        };

        // Insights data
        $englishInsights = $getMonthlyInsights(InsightList::class, $months);
        $hindiInsights = $getMonthlyInsights(InsightListHindi::class, $months);

        $insightsChart = [];
        foreach ($englishInsights as $index => $monthData) {
            $insightsChart[] = [
                'month' => $monthData['month'],
                'Article' => $monthData['Article'] + $hindiInsights[$index]['Article'],
                'News' => $monthData['News'] + $hindiInsights[$index]['News'],
                'Interview' => $monthData['Interview'] + $hindiInsights[$index]['Interview'],
                'Report' => $monthData['Report'] + $hindiInsights[$index]['Report'],
                'Event' => $monthData['Event'] + $hindiInsights[$index]['Event'],
                'Others' => $monthData['Others'] + $hindiInsights[$index]['Others'],
            ];
        }

        // Users per month
        $usersChart = [];
        for ($i = $months; $i >= 0; $i--) {
            $start = now()->subMonths($i)->startOfMonth();
            $end = now()->subMonths($i)->endOfMonth();
            $usersChart[] = [
                'month' => $start->format('M Y'),
                'count' => AuthorList::whereBetween('created_at', [$start, $end])->count(),
            ];
        }

        return view('admin.admin-dashboard', compact('insightsChart', 'usersChart'));
    }
}
