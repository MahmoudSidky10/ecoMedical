<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Design;
use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeSectionsController extends Controller
{
    public function index(Request $request)
    {
        $items = HomeSection::query();
        $result['items'] = $this->filter($request, $items);
        $result["designs"] = Design::all();
        return view('admin.home-sections.index')->with($result);
    }

    public function filter($request, $items)
    {
        if ($request->design_id) {
            $items = $items->where("design_id", $request->design_id);
        }
        $items = $items->orderBy("sort", "asc")->paginate(15);
        return $items;
    }

    public function create()
    {
        $homeSections = HomeSection::pluck("category_id")->unique();
        $result['sections'] = Category::where("parent_id", null)->whereNotIn("id", $homeSections)->get();
        return view('admin.home-sections.create')->with($result);
    }

    public function store(Request $request)
    {
        $request->validate([
            "category_id" => "required",
            "design_id" => "",
        ], [
            "category_id.required" => __("language.must add section"),
        ]);
        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        $data["design_id"] = 1;
        HomeSection::create($data);
        return redirect()->route('admin.home-sections.index');
    }

    public function edit($id)
    {
        $result['item'] = HomeSection::find($id);
        $result['sections'] = Category::where("parent_id", null)->get();
        $result["designs"] = Design::where("id", $result['item']->design_id)->get();
        return view('admin.home-sections.edit')->with($result);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "category_id" => "required",
        ], [
            "category_id.required" => __("language.must add section")
        ]);

        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }
        $category = HomeSection::find($id);
        $category->update($data);
        return redirect()->route('admin.home-sections.index');
    }


    public function destroy($id)
    {
        HomeSection::findOrFail($id)->delete();
        return back();
    }

}
