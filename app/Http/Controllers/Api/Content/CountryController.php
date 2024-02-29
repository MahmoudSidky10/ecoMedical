<?php

namespace App\Http\Controllers\Api\Content;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $items = Country::query()->orderBy("id", "desc")->get();
        return $this->apiResponse($request, trans('language.countries'), $items, true, 200);
    }
}
