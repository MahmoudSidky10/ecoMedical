<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    const VIEW_PATH = "admin.designs.index";
    const ROUTE_PATH = "admin.designs.index";

    public function index(Request $request)
    {
        // $this->authorize("designs_access");

        $items = Design::query();
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
        // $this->authorize("designs_create");

        return view('admin.designs.create');
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
            $data['image'] = $this->storeImage($request->image, "designs");
        }


        Design::create($data);

        return redirect()->route(self::ROUTE_PATH);
    }

    public function edit($id)
    {
        // $this->authorize("designs_edit");

        $result['item'] = Design::find($id);
        return view('admin.designs.edit')->with($result);
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
            $data['image'] = $this->storeImage($request->image, "designs");
        }


        $category = Design::find($id);
        $category->update($data);

        return redirect()->route(self::ROUTE_PATH);
    }

    public function destroy($id)
    {
        // $this->authorize("designs_delete");
        Design::findOrFail($id)->delete();
        return back();
    }
}
