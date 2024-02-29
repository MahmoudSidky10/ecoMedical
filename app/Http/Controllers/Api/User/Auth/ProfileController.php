<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserLoginedResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return $this->apiResponse($request, trans('language.message'), UserLoginedResource::make($request->user()), true);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "mobile" => "required",
            "email" => "",
        ]);

        $user = User::find(Auth::id());

        // check if this email existed ..
        $EmailCheck = User::where('email', $request->email)->where('id', '!=', $user->id)->where('email', '!=', null)->get();
        if ($EmailCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.Existemail'), null, false, 400);
        }

        $EmailCheck = User::where('mobile', $request->mobile)->where('id', '!=', $user->id)->where('mobile', '!=', null)->get();
        if ($EmailCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.Existmobile'), null, false, 400);
        }

        $user->update($data);
        return $this->apiResponse($request, trans('language.message'), UserLoginedResource::make($user), true);
    }
}
