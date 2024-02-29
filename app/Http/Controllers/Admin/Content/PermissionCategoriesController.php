<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionCategoryRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionCategoryRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\PermissionCategory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionCategoriesController extends Controller
{
    public function index()
    {
        // $this->authorize("permissions_categories_access");

        $result['items'] = PermissionCategory::paginate(15);

        return view('admin.permissions.permission-categories.index')->with($result);
    }

    public function create()
    {
        // $this->authorize("permissions_categories_create");

        return view('admin.permissions.permission-categories.create');
    }

    public function store(StorePermissionCategoryRequest $request)
    {

        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        PermissionCategory::create($data);

        return redirect()->route('admin.permission-categories.index');
    }

    public function edit($id)
    {
        // $this->authorize("permissions_categories_edit");

        $result['item'] = PermissionCategory::find($id);
        return view('admin.permissions.permission-categories.edit')->with($result);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        $category = PermissionCategory::find($id);
        $category->update($data);

        return redirect()->route('admin.permission-categories.index');
    }

    public function destroy($id)
    {
        // $this->authorize("permissions_categories_delete");
        PermissionCategory::findOrFail($id)->delete();
        return back();
    }

}
