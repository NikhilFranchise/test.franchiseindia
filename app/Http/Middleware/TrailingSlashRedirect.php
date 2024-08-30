<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class TrailingSlashRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->path();
        Log::info('Handling request path: ' . $path);

        if (preg_match('/.+\/$/', $request->getRequestUri())) {
            $redirectUrl = rtrim($request->getRequestUri(), '/');
            Log::info('Redirecting to: ' . $redirectUrl);
            return Redirect::to($redirectUrl, 301);
        }

        return $next($request);
    }
}
