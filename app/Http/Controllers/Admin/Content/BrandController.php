<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\School;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    const VIEW_PATH = "admin.brands.index";
    const ROUTE_PATH = "admin.brands.index";

    public function index(Request $request)
    {
        // $this->authorize("brands_access");

        $items = Brand::query();
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
        // $this->authorize("brands_create");

        return view('admin.brands.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        if ($request->image) {
            $data['image'] = $this->storeImage($request->image, "brands");
        }


        Brand::create($data);

        return redirect()->route(self::ROUTE_PATH);
    }

    public function edit($id)
    {
        // $this->authorize("brands_edit");

        $result['item'] = Brand::find($id);
        return view('admin.brands.edit')->with($result);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        if ($request->image) {
            $data['image'] = $this->storeImage($request->image, "brands");
        }


        $category = Brand::find($id);
        $category->update($data);

        return redirect()->route(self::ROUTE_PATH);
    }

    public function destroy($id)
    {
        // $this->authorize("brands_delete");
        Brand::findOrFail($id)->delete();
        return back();
    }

}
