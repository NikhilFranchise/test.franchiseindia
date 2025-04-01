<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ContentAdmin
{

    protected $except = [
        'login-check'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('login-check')) {
            dd($request->all());  // Check if token is included
        }
        if (!Auth::guard('admin')->check()) {
            return redirect('admin/login')->with('error', 'You must be an admin to access this page.');
        }
        return $next($request);
    }
}
