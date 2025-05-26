<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->first();
        return view('setting.index',compact('settings'));
    }

    public function store(Request $request)
    {
        $setting = Setting::findOrFail($request->id);

        $setting->update([
            'name_site'  => $request->name_site,
            'address'    => $request->address,
            'phone'      => $request->phone,
        ]);

        return to_route('setting.index')->with('success', 'تمت ضبط الأعدادات بنجاح!');

    }
}
