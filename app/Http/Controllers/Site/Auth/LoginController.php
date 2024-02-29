<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check())
            return redirect('/profile');
        else
            return view('site.auth.login');
    }

    public function check(Request $request)
    {
        $data = $request->validate([
            "mobile" => "required",
            "password" => "required",
        ]);
        if (Auth::attempt(['mobile' => $data['mobile'], 'password' => $data['password']])) {
            $redirectUrl = "/profile";
            if (session('urlRedirect')) {
                $redirectUrl = session('urlRedirect');
            }
            Session::forget('urlRedirect');
            return redirect($redirectUrl);
        } else {
            session()->flash('danger', trans('language.loginError'));
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->regenerate();
        return redirect('/');
    }

    public function needLogin()
    {
        Auth::logout();
        session()->regenerate();
        session()->put('urlRedirect', url()->previous());
        return redirect()->route("login");
    }
}
