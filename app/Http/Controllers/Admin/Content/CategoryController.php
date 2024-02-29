<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("categories_access");

        $items = Category::query()->where("parent_id", null);
        $result['items'] = $this->filter($request, $items);
        return view('admin.categories.index')->with($result);
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
        // $this->authorize("categories_create");

        return view('admin.categories.create');
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
            $data['image'] = $this->storeImage($request->image, "categories");
        }


        Category::create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        // $this->authorize("categories_edit");

        $result['item'] = Category::find($id);
        return view('admin.categories.edit')->with($result);
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
            $data['image'] = $this->storeImage($request->image, "categories");
        }


        $category = Category::find($id);
        $category->update($data);

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        // $this->authorize("categories_delete");
        Category::findOrFail($id)->delete();
        return back();
    }
}
