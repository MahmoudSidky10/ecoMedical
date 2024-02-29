<?php

namespace App\Http\Controllers\Api\Content;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $item = Setting::latest()->first();
        return $this->apiResponse($request, trans('language.settings'), $item, true);
    }
}
