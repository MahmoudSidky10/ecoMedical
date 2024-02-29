<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\PermissionCategory;
use App\Models\Role;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class RolesController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize("role_access");

        $items = Role::query()
            ->when($request->global_search, function ($query) use ($request) {
                $query->where('title_ar', 'LIKE', '%' . $request->global_search . '%')
                    ->orWhere('title_en', 'LIKE', '%' . $request->global_search . '%');
            })
            ->paginate(15);
        return view('admin.roles.index', compact('items'));
    }

    public function create()
    {
        // abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $result["permissionCategories"] = PermissionCategory::whereHas('permissions')->get();
        $result["permissions"] = Permission::all()->pluck('title', 'id');
        $result["roles"] = Role::get();
        return view('admin.roles.create')->with($result);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        $role = Role::create($data);
        $role->permissions()->sync($request->input('permissions', []));
        return redirect('admin/roles');
    }

    public function edit(Role $role)
    {
        // abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item = $role;
        $permissionCategories = PermissionCategory::whereHas('permissions')->get();
        $permissions = Permission::all()->pluck('title', 'id');
        $item->load('permissions');
        return view('admin.roles.edit', compact('item', 'permissions', 'permissionCategories'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {

        $data = $request->all();

        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        $role->update($data);

        if ($request->permissions) {
            $role->permissions()->sync($request->input('permissions', []));
        } else {
            DB::table("permission_role")->where("role_id", $role->id)->delete();
        }
        return redirect('admin/roles');
    }

    public function show(Role $role)
    {
        // abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        // abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role->delete();
        return back();
    }

    public function getSelectedCheck(Request $request)
    {
        $item = Role::find($request->role_id);
        $permissionCategories = PermissionCategory::whereHas('permissions')->get();
        $permissions = Permission::all()->pluck('title', 'id');
        $item->load('permissions');
        $data["html"] = view('admin.roles.roles-check-boxes', compact('permissionCategories', 'permissions', 'item'))->render();
        return response()->json($data);
    }
}
