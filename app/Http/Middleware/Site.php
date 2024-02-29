<?php

namespace App\Http\Middleware;


use Closure;

class Site
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth()->check() and auth()->user()->user_type_id != 2) {
            return redirect(url("/admin/dash"));
        }

        return $next($request);
    }
}




