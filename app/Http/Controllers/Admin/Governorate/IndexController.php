<?php

namespace App\Http\Controllers\Admin\Governorate;

use App\Models\Governorate;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("governorates_access");
        $items = Governorate::query();
        $items = $this->filter($request, $items);
        return view('admin.governorates.index', compact('items'));
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
        // $this->authorize("governorates_create");
        $countries = Country::all();
        return view('admin.governorates.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Governorate::create($data);
        toast(trans('language.done'), 'success');
        return redirect(url('/admin/governorates'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // $this->authorize("governorates_edit");
        $countries = Country::all();
        $item = Governorate::findOrFail($id);
        return view('admin.governorates.edit', compact('item', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $item = Governorate::findOrFail($id);
        $data = $request->all();
        $item->update($data);
        toast(trans('language.done'), 'success');
        return redirect(url('/admin/governorates'));
    }

    public function destroy($id)
    {
        // $this->authorize("governorates_delete");
        Governorate::findOrFail($id)->delete();
        toast(trans('language.done'), 'success');
        return redirect(url('/admin/governorates'));
    }
}
