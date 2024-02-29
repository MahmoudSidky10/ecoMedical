<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    const VIEW_PATH = "admin.coupons.index";
    const ROUTE_PATH = "admin.coupons.index";

    public function index(Request $request)
    {
        $items = Coupon::query();
        $result['items'] = $this->filter($request, $items);
        return view(self::VIEW_PATH)->with($result);
    }


    public function filter($request, $items)
    {
        if ($request->name) {
            $items = $items->where("name_en", 'LIKE', '%' . $request->name . '%')->orWhere("name_ar", 'LIKE', '%' . $request->name . '%');
        }
        $items = $items->orderBy("id", "desc")->paginate(15);
        return $items;
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $data["record_state"] = 1;
        if ($request->image) {
            $data['image'] = $this->storeImage($request->image, "coupons");
        }
        Coupon::create($data);
        return redirect()->route(self::ROUTE_PATH);
    }

    public function edit($id)
    {
        $result['item'] = Coupon::find($id);
        return view('admin.coupons.edit')->with($result);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }
        $item = Coupon::find($id);
        $item->update($data);
        return redirect()->route(self::ROUTE_PATH);
    }

    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();
        return back();
    }
}
