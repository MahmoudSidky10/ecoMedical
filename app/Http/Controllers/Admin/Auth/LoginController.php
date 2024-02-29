<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/admin/dash');
        } else {
            return view('admin.auth.login');
        }
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect('/admin/dash');
        } else {
            session()->flash('danger', trans('language.loginError'));
            return back();
        }
    }


}
