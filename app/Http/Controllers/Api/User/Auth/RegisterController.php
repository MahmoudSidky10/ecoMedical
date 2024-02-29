<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserLoginedResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => ['unique:users,mobile'],
            'email' => ['unique:users,email'],
            'password' => 'required',
            'fire_base_token' => '',
        ], [
            "name.required" => __("language.name required"),
            "mobile.required" => __("language.mobile required"),
            "email.unique" => __("language.Email unique"),
            "identity.unique" => __("language.Identity Unique"),
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        Auth::login($user);

        // return data ...
        $user = Auth::user();
        $token = Auth::user()->createToken('access_token');
        $accessToken = $token->accessToken;
        return $this->sendResponse($request, trans('language.login'), UserLoginedResource::make($user), true, $accessToken, 200);
    }
}
