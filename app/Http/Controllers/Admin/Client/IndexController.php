<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    const VIEW_PATH = "admin.clients.index";
    const ROUTE_PATH = "admin.clients.index";

    public function index(Request $request)
    {
        // $this->authorize("client_access");

        $items = User::query()->whereHas("roles", function ($query) {
            $query->where('roles.id', Role::USER_ROLE);
        });
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
        // $this->authorize("client_create");

        return view('admin.clients.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        if ($request->record_state) {
            $data["record_state"] = 1;
        } else {
            $data["record_state"] = 0;
        }

        if ($request->password) {
            $data["password"] = Hash::make($request->password);
        }

        $user = User::create($data);

        RoleUser::create([
            "role_id" => Role::USER_ROLE,
            "user_id" => $user->id
        ]);

        return redirect()->route(self::ROUTE_PATH);
    }

    public function edit($id)
    {
        // $this->authorize("client_edit");

        $result['item'] = User::find($id);
        return view('admin.clients.edit')->with($result);
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
            $data['image'] = $this->storeImage($request->image, "clients");
        }

        if ($request->password) {
            $data["password"] = Hash::make($request->password);
        }

        $category = User::find($id);
        $category->update($data);

        return redirect()->route(self::ROUTE_PATH);
    }

    public function destroy($id)
    {
        // $this->authorize("client_delete");
        User::findOrFail($id)->delete();
        return back();
    }
}
