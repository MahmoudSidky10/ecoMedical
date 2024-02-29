<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Models\ClientAddress;
use App\Models\Compare;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $result["user"] = Auth::user();
        return view("site.user.profile")->with($result);
    }

    public function editProfile()
    {
        $result["user"] = Auth::user();
        return view("site.user.editProfile")->with($result);
    }

    public function editProfileUpdate(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "mobile" => "required|numeric"
        ]);
        $user = User::find(Auth::id());
        $user->update($data);
        session()->flash('success', trans('language.done'));
        return back();
    }

    public function orders()
    {
        $result["orders"] = Order::where("user_id", Auth::id())->get();
        return view("site.user.orders")->with($result);
    }

    public function address()
    {
        $result["items"] = ClientAddress::where("user_id", Auth::id())->get();
        return view("site.user.address.index")->with($result);
    }

    public function wishList()
    {
        $result["items"] = WishList::where("user_id", Auth::id())->get();
        return view("site.user.wishList")->with($result);
    }


    public function removeItemFromWishList(Request $request)
    {
        $item = WishList::find($request->item_id);
        $item->delete();
        return response()->json();
    }


    public function storeItemIntoWishList(Request $request)
    {
        // check if exist :-
        $item = WishList::where("user_id", Auth::id())->where("product_id", $request->item_id)->first();
        if (!$item) {
            WishList::create([
                "user_id" => Auth::id(),
                "product_id" => $request->item_id,
            ]);
            $data["status"] = "create";
        } else {
            $item->delete();
            $data["status"] = "delete";
        }
        return response()->json($data);
    }


    public function compareList()
    {
        $result["items"] = Compare::where("user_id", Auth::id())->orderBy("id", "desc")->get();
        return view("site.user.compareList")->with($result);
    }

    public function removeItemFromCompareList(Request $request)
    {
        $item = Compare::find($request->item_id);
        if ($item) {
            $item->delete();
        }
        return response()->json();
    }

    public function storeItemIntoCompareList(Request $request)
    {
        // check if exist :-
        $item = Compare::where("user_id", Auth::id())->where("product_id", $request->item_id)->first();
        if (!$item) {
            Compare::create([
                "user_id" => Auth::id(),
                "product_id" => $request->item_id,
            ]);
            $data["status"] = "create";
        } else {
            $item->delete();
            $data["status"] = "delete";
        }
        return response()->json($data);
    }

    public function addressCreate()
    {
        $result["user"] = Auth::user();
        return view("site.user.address.address-create")->with($result);
    }

    public function addressEdit($id, Request $request)
    {
        $item = ClientAddress::find($id);
        // check if this belongs to this user ,,,
        if ($item->user_id != Auth::id()) {
            dd("you cant access this page .");
        }
        $result["item"] = $item;
        return view("site.user.address.address-edit")->with($result);
    }

    public function addressUpdate($id, Request $request)
    {
        $item = ClientAddress::find($id);
        // check if this belongs to this user ,,,
        if ($item->user_id != Auth::id()) {
            dd("you cant access this page .");
        }
        $item->update($request->all());
        session()->flash('success', trans('language.done'));
        return redirect()->route("user.address");
    }


    public function addressStore(Request $request)
    {
        $request->validate([
            "country_id" => "required",
            "governorate_id" => "required",
            "street" => "required",
        ]);
        $data = $request->all();
        $data["user_id"] = Auth::id();
        ClientAddress::create($data);
        session()->flash('success', trans('language.done'));
        return redirect()->route("user.address");
    }
}
