<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserLoginedResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'password' => ['required'],
            'mobile' => ['required'],
            'fire_base_token' => [''],
        ]);

        // check that this email exist
        $mobileExist = User::where('mobile', $request->mobile)->first();
        if (!$mobileExist) {
            return $this->apiResponse($request, trans('language.not_Existemobile'), null, false, 400);
        }

        // check that mobile , pass is correct
        $user = auth()->attempt(["mobile" => $request->mobile, "password" => $request->password]);
        if (!$user)
            return $this->apiResponse($request, trans('auth.failed'), null, false, 400);

        // check that mobile verify ( if not ) send Verify Code :-
        $newData["fire_base_token"] = $request->fire_base_token;
        $this->updateData($newData);
        return $this->response($request);
    }

    public function updateData($newData)
    {
        auth()->user()->update($newData);
    }

    public function response(Request $request)
    {
        $user = auth()->user();
        $token = Auth::user()->createToken('access_token');
        $accessToken = $token->accessToken;
        return $this->sendResponse($request, trans('language.login'), UserLoginedResource::make($user), true, $accessToken, 200);
    }


    public function checkFCM(Request $request)
    {
        $request->validate([
            'fire_base_token' => 'required',
        ]);
        $user = User::where("fire_base_token", $request->fire_base_token)->where("fire_base_token", "!=", null)->first();
        if (!$user) {
            return $this->apiResponse($request, trans('language.user_not_exist'), null, false, 200);
        }
        Auth::login($user);
        $user = auth()->user();
        $token = Auth::user()->createToken('access_token');
        $accessToken = $token->accessToken;
        return $this->sendResponse($request, trans('language.login'), UserLoginedResource::make($user), true, $accessToken, 200);
    }

    public function Logout(Request $request)
    {
        $user = User::find(Auth::id());
        $user->fire_base_token = null;
        $user->save();
        return $this->apiResponse($request, trans('language.done'), [], true, 200);
    }


}
