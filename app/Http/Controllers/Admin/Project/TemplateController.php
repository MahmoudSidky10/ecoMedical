<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $items = Template::query()->paginate(10);
        return view("admin.templates.index", compact("items"));
    }

    public function create()
    {
        return view('admin.templates.create');
    }

    public function edit($id)
    {
        $item = Template::find($id);
        return view('admin.templates.edit', compact("item"));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        if ($request->image) {
            $data['image'] = $this->storeImage($request->image, "templates");
        }
        Template::create($data);

        return redirect()->route('admin.templates.index');
    }

    public function sort()
    {
        $items = Template::orderBy("sort", "asc")->get();
        return view("admin.templates.sort", compact("items"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Template::find($id);
        $item->update($data);
        return redirect()->route('admin.templates.index');
    }
}
