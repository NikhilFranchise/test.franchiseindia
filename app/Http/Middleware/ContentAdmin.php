<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ContentAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!($request->session()->has('adminEmail')))
        //     return redirect('admin/login');
        dd(!Auth::guard('admin')->check());
        if (!Auth::guard('admin')->check()) {
            return redirect('admin/login')->with('error', 'You must be an admin to access this page.');
        }
        return $next($request);
    }
}
