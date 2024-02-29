<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Design;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function getCategories(Request $request)
    {
        $categories = Category::where("parent_id", $request->category_id)->orderBy("id", "desc")->get();
        $data['categories'] = $categories;
        if (count($categories) > 0) {
            $data["status"] = true;
            if (count($categories) > 0) {
                $data["status"] = true;
            } else {
                $data["status"] = false;
            }
            return response()->json($data);
        } else {
            $data["status"] = false;
        }
        return response()->json($data);
    }

    public function getDesigns(Request $request)
    {
        $category = Category::find($request->category_id);
        $items = Design::where("product_count", "<=", $category->productCount())->orderBy("id", "desc")->get();
        $data['items'] = $items;
        if (count($items) > 0) {
            $data["status"] = true;
            if (count($items) > 0) {
                $data["status"] = true;
            } else {
                $data["status"] = false;
            }
            return response()->json($data);
        } else {
            $data["status"] = false;
        }
        return response()->json($data);
    }

    public function getCities(Request $request)
    {
        $items = Governorate::where("country_id", $request->country_id)->get();
        $data['items'] = $items;
        if (count($items) > 0) {
            $data["status"] = true;
            if (count($items) > 0) {
                $data["status"] = true;
            } else {
                $data["status"] = false;
            }
            return response()->json($data);
        } else {
            $data["status"] = false;
        }
        return response()->json($data);
    }

    public function checkCouponCode(Request $request)
    {
        $item = Coupon::where("code", $request->code)->where("record_state", 1)->whereDate('starts_at', '<=', date('Y-m-d'))->whereDate('expires_at', '>', date('Y-m-d'))->first();
        // check that code is exist
        if (!$item) {
            $data["status"] = false;
            return response()->json($data);
        }

        $usingCount = CouponUser::where("coupon_id", $item->id)->count();
        if ($usingCount >= $item->max_using) {
            $data["status"] = false;
            return response()->json($data);
        }

        $usingCountForUser = CouponUser::where("coupon_id", $item->id)->where("user_id", Auth::id())->count();
        if ($usingCountForUser > $item->user_max_using) {
            $data["status"] = false;
            return response()->json($data);
        }

        $data['item'] = $item;
        $data["status"] = true;
        return response()->json($data);
    }
}
