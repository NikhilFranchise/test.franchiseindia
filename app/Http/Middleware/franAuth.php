<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserAccount;
use App\Models\UserRecord;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class franAuth
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
        if( $request->user()->profile_type == 2 )
            return redirect('investor/myaccount/dashboard');
    }

    UserRecord::query()->updateOrCreate([
        'profile_str'   => request()->user()->profile_str,
    ],[
        'last_activity_user' => date('Y-m-d H:i:s')
    ]);

    return $next($request);

        // return $next($request);
    }
}


