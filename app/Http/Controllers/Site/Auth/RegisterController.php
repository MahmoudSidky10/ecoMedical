<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\ModulesConst\UserType;
use App\ModulesConst\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check())
            return redirect('/profile');
        else
            return view('site.auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "mobile" => "required|numeric",
            "password" => "required|min:6",
        ]);

        $data["user_type_id"] = UserType::user;
        $data["record_state"] = 1;
        $data["password"] = Hash::make($request->password);
        $user = User::create($data);
        Auth::login($user);

        // create role
        RoleUser::create([
            "role_id" => Role::USER_ROLE,
            "user_id" => $user->id
        ]);
        
        session()->flash('success', trans('language.done'));
        return redirect()->route("profile");
    }
}
