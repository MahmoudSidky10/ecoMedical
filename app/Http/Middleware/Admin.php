<?php

namespace App\Http\Middleware;

use App\ModulesConst\UserTyps;
use Closure;

class Admin
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth()->check() and auth()->user()->user_type_id == 1)
            return $next($request);
        session()->flash('danger', trans('فقط يستطيع مدير الموقع الدخول الي لوحه التحكم'));
        return redirect('/admin');
    }
}




