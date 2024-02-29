<?php

namespace App\Http\Controllers\Api\User\Address;

use App\Http\Controllers\Controller;
use App\Models\ClientAddress;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $userid = $request->user()->id;
        if (!$userid)
            abort(404);
        $items = ClientAddress::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        return $this->apiResponse($request, trans('language.compare'), $items, true);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "country_id" => "required",
            "governorate_id" => "required",
            "street" => "required",
        ]);

        $data['user_id'] = $request->user()->id;
        ClientAddress::create($data);
        return $this->apiResponse($request, trans('language.message'), null, true);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'address_id' => 'required',
        ]);
        $check = ClientAddress::find($request->address_id);
        $check->delete();
        $items = ClientAddress::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        return $this->apiResponse($request, trans('language.message'), $items, true);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'address_id' => 'required',
            "country_id" => "",
            "governorate_id" => "",
            "street" => "",
        ]);
        $item = ClientAddress::find($request->address_id);
        $item->update($data);
        return $this->apiResponse($request, trans('language.message'), $item, true);
    }

    public function details(Request $request)
    {
        $request->validate([
            'address_id' => 'required',
        ]);
        $item = ClientAddress::find($request->address_id);
        return $this->apiResponse($request, trans('language.message'), $item, true);
    }

}
