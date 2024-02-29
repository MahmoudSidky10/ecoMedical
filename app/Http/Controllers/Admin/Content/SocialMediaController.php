<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("socialMedia_access");

        $items = SocialMedia::query();
        $result['items'] = $this->filter($request, $items);
        return view('admin.socialMedia.index')->with($result);
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
        // $this->authorize("socialMedia_create");

        return view('admin.socialMedia.create');
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
            $data['image'] = $this->storeImage($request->image,"socialMedia");
        }


        SocialMedia::create($data);

        return redirect()->route('admin.socialMedia.index');
    }

    public function edit($id)
    {
        // $this->authorize("socialMedia_edit");

        $result['item'] = SocialMedia::find($id);
        return view('admin.socialMedia.edit')->with($result);
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
            $data['image'] = $this->storeImage($request->image,"socialMedia");
        }

        $category = SocialMedia::find($id);
        $category->update($data);

        return redirect()->route('admin.socialMedia.index');
    }

    public function destroy($id)
    {
        // $this->authorize("socialMedia_delete");
        SocialMedia::findOrFail($id)->delete();
        return back();
    }
}
