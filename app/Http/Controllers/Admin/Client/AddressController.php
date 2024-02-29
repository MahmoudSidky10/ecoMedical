<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\ClientAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index($clientId)
    {
        $items = ClientAddress::where("user_id", $clientId)->paginate(15);
        return view("admin.clients.address.index", compact("items", "clientId"));
    }

    public function destroy($clientId, $id)
    {
        ClientAddress::find($id)->delete();
        toast(trans('language.done'), 'success');
        return back();
    }
}
