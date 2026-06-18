<?php

namespace App\Http\Controllers\Crre\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Crre\CrreAdminUsers;
use App\Models\Crre\CrreAuthors;
use App\Models\Crre\CrreContentList;
use App\Models\Crre\CrreHindiContentList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $redirectTo = '/crre/admin/dashboard';

    public function loginView()
    {
        return view('crreAdmin.admin-login');
    }

    public function CrreLogin(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'min:6',
                'regex:/[a-z]/',      // lowercase
                'regex:/[A-Z]/',      // uppercase
                'regex:/\d/',         // digit
            ],
        ], [
            'email.required' => 'Email is required.',
            'email.email'    => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
            'password.min'      => 'Password must be at least 6 characters long.',
            'password.regex'    => 'Password must include uppercase, lowercase and a number.',
        ]);
        // ----------------------------------------------------------
        // Check if any admin exists in the system
        // ----------------------------------------------------------
        $totalAdmins = CrreAdminUsers::count();

        // Fetch user if exists
        $user = CrreAdminUsers::with('author')
            ->where('admin_email', $request->email)
            ->first();

        // ----------------------------------------------------------
        // AUTO-CREATE ADMIN + AUTHOR ONLY IF TABLE IS EMPTY
        // ----------------------------------------------------------
        if ($user == null && $totalAdmins == 0) {

            // Create Admin account
            $user = CrreAdminUsers::create([
                'admin_email'     => $request->email,
                'admin_name'      => 'SuperAdmin',
                'admin_role'      => 'superadmin',
                'admin_is_active' => 1,
                'can_create_author' => 1,
                'admin_password'  => Hash::make($request->password),
                'last_login_at'   => now(),
            ]);

            // Create Author entry
            $author = CrreAuthors::create([
                'admin_id'   => $user->admin_id,
                'title'      => 'User',
                'emailid'      => $request->email,
                'slug'       => 'user',
                'designation' => 'Author',
                'status'     => 'A',
            ]);

            //  Attach author_id back to admin
            // $user->author_id = $author->author_id;
            $user->save();
            //  Auto Login newly created admin
            Auth::guard('crreAdmin')->login($user);

            session()->put('role', 'fi');

            return redirect()->intended($this->redirectTo)->with(
                'success',
                'System initialized! First Admin & Author created and logged in.'
            );
        }

        // ----------------------------------------------------------
        // If user doesn't exist but admins already exist
        // ----------------------------------------------------------
        if (!$user) {
            return back()->with('error', 'This email is not registered with us.');
        }

        // ----------------------------------------------------------
        // Check user active
        // ----------------------------------------------------------
        if ($user->admin_is_active != 1) {
            return back()->with('warning', 'Your account is not active. Please contact admin.');
        }



        // ----------------------------------------------------------
        // Normal Login Attempt
        // ----------------------------------------------------------
        if (Auth::guard('crreAdmin')->attempt([
            'admin_email' => $request->email,
            'password'    => $request->password,
        ])) {

            $user = Auth::guard('crreAdmin')->user();

            session()->put('role', 'fi');

            // Update last login
            $user->update(['last_login_at' => now()]);

            return redirect()->intended($this->redirectTo)->with(
                'success',
                'Welcome back ' . ucwords($user->author->title ?? $user->admin_name) .
                    '! You are logged in as ' . ucfirst($user->admin_role) . '.'
            );
        }

        // ----------------------------------------------------------
        // ❌ Wrong Password
        // ----------------------------------------------------------
        return back()->with('error', 'The password you entered is incorrect.');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Try to fetch the admin by email
        $admin = CrreAdminUsers::where('admin_email', $request->email)->first();

        if (!$admin) {
            return back()->with('error', 'This Email ID is not registered with us.');
        }

        // Update password
        $admin->admin_password = Hash::make($request->password);
        $admin->save();

        // Login the admin after reset
        Auth::guard('crreAdmin')->login($admin);

        return redirect()->route('crreAdmin.dashboard')->with('success', 'Password reset successfully. You are now logged in.');
    }

    public function CrreDashboard()
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
        $englishInsights = $getMonthlyInsights(CrreContentList::class, $months);
        $hindiInsights = $getMonthlyInsights(CrreHindiContentList::class, $months);

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
                'count' => CrreAuthors::whereBetween('created_at', [$start, $end])->count(),
            ];
        }

        return view('crreAdmin.admin-dashboard', compact('insightsChart', 'usersChart'));
    }

    public function CrreLogout(Request $request)
    {
        Auth::guard('crreAdmin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('crreAdmin.LoginView');
    }


    public function checkRole(Request $request)
    {
        $user = CrreAdminUsers::where('admin_email', $request->email)->first();

        if (!$user) {
            return response()->json(['role' => null]);
        }

        return response()->json([
            'role' => $user->admin_role   // Example: 'admin', 'crreAdmin', 'editor'
        ]);
    }
}
