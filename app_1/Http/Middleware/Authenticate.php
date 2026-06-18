<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }
        // Detect guard name
        $guard = $request->route()->getAction('guard') ?? null;

        switch ($guard) {
            case 'crreAdmin':
                return route('crre.loginview'); // crre login
            case 'admin':
                return route('admin.LoginView'); // admin login
            default:
                return route('franchise.login'); // normal franchise login
        }
    }
}
