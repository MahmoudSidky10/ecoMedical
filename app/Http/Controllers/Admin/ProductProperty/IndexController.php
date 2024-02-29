<?php

namespace App\Http\Controllers\Admin\ProductProperty;

use App\Http\Controllers\Controller;
use App\Models\ProductProperty;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("products_access");

        $items = ProductProperty::query();
        $result['items'] = $this->filter($request, $items);
        return view('admin.ProductProperties.index')->with($result);
    }


    public function filter($request, $items)
    {
        if ($request->name)
            $items = $items->where("name_en", 'LIKE', '%' . $request->name . '%')->orWhere("name_ar", 'LIKE', '%' . $request->name . '%');

        $items = $items->orderBy("id", "desc")->paginate(15);
        return $items;
    }

    public function create()
    {
        // $this->authorize("products_create");

        return view('admin.ProductProperties.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        ProductProperty::create($data);

        return redirect()->route('admin.ProductProperties.index');
    }

    public function edit($id)
    {
        // $this->authorize("products_edit");

        $result['item'] = ProductProperty::find($id);
        return view('admin.ProductProperties.edit')->with($result);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        $category = ProductProperty::find($id);
        $category->update($data);

        return redirect()->route('admin.ProductProperties.index');
    }

    public function destroy($id)
    {
        // $this->authorize("products_delete");
        ProductProperty::findOrFail($id)->delete();
        return back();
    }
}
