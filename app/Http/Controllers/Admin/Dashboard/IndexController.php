<?php

namespace App\Http\Controllers\Admin\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function settings()
    {
        // $this->authorize("settings_access");
        $item = Setting::latest()->first();
        if (!$item) {
            Setting::create([]);
        }
        return view('admin.dashboard.settings', compact("item"));
    }

    public function updateSettings(Request $request)
    {
        // $this->authorize("settings_edit");
        $data = $request->all();
        $item = Setting::latest()->first();

        if ($request->app_logo) {
            $data['app_logo'] = $this->storeImage($request->app_logo, "settings");
        }

        $item->update($data);
        toast(trans('language.done'), 'success');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect('/admin');
    }


}
