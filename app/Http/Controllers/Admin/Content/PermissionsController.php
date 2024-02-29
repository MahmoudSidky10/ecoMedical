<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use App\Models\PermissionCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("permission_access");

        $items = Permission::query()
            ->when($request->global_search, function ($query) use ($request) {
                $query->where('name_ar', 'LIKE', '%' . $request->global_search . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $request->global_search . '%')
                    ->orWhere('title', 'LIKE', '%' . $request->global_search . '%');
            })->orderBy("id", "desc")->paginate();

        return view('admin.permissions.index', compact('items'));
    }

    public function create()
    {
        // $this->authorize("permission_create");
        $result['categories'] = PermissionCategory::all();
        return view('admin.permissions.create')->with($result);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }
        Permission::create($data);
        return redirect('admin/permissions');
    }

    public function edit(Permission $permission)
    {
        // abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $result['categories'] = PermissionCategory::all();
        $result['item'] = $permission;
        return view('admin.permissions.edit')->with($result);
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $data = $request->all();

        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        $permission->update($data);

        return redirect('admin/permissions');
    }

    public function show(Permission $permission)
    {
        // abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        // abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return back();
    }

}
