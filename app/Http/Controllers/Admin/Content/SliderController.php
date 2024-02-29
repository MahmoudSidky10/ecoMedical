<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("sliders_access");

        $items = Slider::query();
        $result['items'] = $this->filter($request, $items);
        return view('admin.sliders.index')->with($result);
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
        // $this->authorize("sliders_create");

        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        if($request->image){
            $data['image'] = $this->storeImage($request->image,"sliders");
        }


        Slider::create($data);

        return redirect()->route('admin.sliders.index');
    }

    public function edit($id)
    {
        // $this->authorize("sliders_edit");

        $result['item'] = Slider::find($id);
        return view('admin.sliders.edit')->with($result);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        if($request->image){
            $data['image'] = $this->storeImage($request->image,"sliders");
        }

        $category = Slider::find($id);
        $category->update($data);

        return redirect()->route('admin.sliders.index');
    }

    public function destroy($id)
    {
        // $this->authorize("sliders_delete");
        Slider::findOrFail($id)->delete();
        return back();
    }
}
