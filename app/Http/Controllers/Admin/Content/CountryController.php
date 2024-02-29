<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Country;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("countries_access");
        $items = Country::query();
        $items = $this->filter($request, $items);
        return view('admin.countries.index', compact('items'));
    }

    public function filter($request, $items)
    {
        if ($request->name) {
            $items = $items->where('name_ar', 'LIKE', '%' . $request->name . '%')
                ->orWhere('name_en', 'LIKE', '%' . $request->name . '%');
        }
        $items = $items->orderBy('id', 'desc')->paginate(10);
        return $items;
    }

    public function create()
    {
        // $this->authorize("countries_create");
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Country::create($data);
        toast(trans('language.done'), 'success');
        return redirect(url('/admin/countries'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // $this->authorize("countries_update");
        $item = Country::findOrFail($id);
        return view('admin.countries.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Country::findOrFail($id);
        $data = $request->all();
        $item->update($data);
        toast(trans('language.done'), 'success');
        return redirect(url('/admin/countries'));
    }

    public function destroy($id)
    {
        // $this->authorize("countries_delete");
        Country::findOrFail($id)->delete();
        Governorate::where("country_id", $id)->delete();
        toast(trans('language.done'), 'success');
        return redirect(url('/admin/countries'));
    }
}
