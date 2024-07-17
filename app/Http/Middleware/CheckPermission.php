<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::user()->hasPermissionTo($permission)) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'You do not have permission to access this page.');
    }
}