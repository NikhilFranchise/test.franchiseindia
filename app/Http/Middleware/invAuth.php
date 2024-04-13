<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserRecord;
use App\Models\UserAccount;
class invAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if (empty($request->user()))
        return redirect('loginform');

    if (!empty($request->user())) {
        if( $request->user()->profile_type == 1 )
            return redirect('franchisor/myaccount/dashboard');
    }

    UserRecord::query()->updateOrCreate([
        'profile_str'   => request()->user()->profile_str,
    ],[
        'last_activity_user' => date('Y-m-d H:i:s')
    ]);
        return $next($request);
    }
}
