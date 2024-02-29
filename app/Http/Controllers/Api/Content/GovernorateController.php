<?php

namespace App\Http\Controllers\Api\Content;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "country_id" => ""
        ]);
        if ($request->country_id) {
            $items = Governorate::where("country_id", $request->country_id)->orderBy("id", "desc")->get();
        } else {
            $items = Governorate::orderBy("id", "desc")->get();
        }
        return $this->apiResponse($request, trans('language.countries'), $items, true, 200);
    }
}
