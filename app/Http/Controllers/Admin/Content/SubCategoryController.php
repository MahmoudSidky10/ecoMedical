<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($category_id, Request $request)
    {
        // $this->authorize("categories_access");

        $items = Category::query()->where("parent_id", $category_id);
        $result['items'] = $this->filter($request, $items);
        $result["category_id"] = $category_id;
        return view('admin.subCategories.index')->with($result);
    }


    public function filter($request, $items)
    {
        if ($request->name)
            $items = $items->where("name_en", 'LIKE', '%' . $request->name . '%')->orWhere("name_ar", 'LIKE', '%' . $request->name . '%');

        $items = $items->orderBy("id", "desc")->paginate(15);
        return $items;
    }

    public function create($category_id)
    {
        // $this->authorize("categories_create");

        return view('admin.subCategories.create', compact("category_id"));
    }

    public function store($category_id, Request $request)
    {

        $data = $request->all();

        $data["record_state"] = 1;

        if ($request->image) {
            $data['image'] = $this->storeImage($request->image, "categories");
        }

        $data["parent_id"] = $category_id;
        Category::create($data);

        return redirect()->route('admin.subCategories.index', $category_id);
    }

    public function edit($category_id, $id)
    {
        // $this->authorize("categories_edit");

        $result['item'] = Category::find($id);
        $result["category_id"] = $category_id;
        return view('admin.subCategories.edit')->with($result);
    }

    public function update(Request $request, $category_id, $id)
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

        return redirect()->route('admin.subCategories.index', $category_id);
    }

    public function destroy($category_id, $id)
    {
        // $this->authorize("categories_delete");
        Category::findOrFail($id)->delete();
        return back();
    }
}
