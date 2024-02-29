<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginOutController extends Controller
{
    public function index(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect('/admin');
    }
}
