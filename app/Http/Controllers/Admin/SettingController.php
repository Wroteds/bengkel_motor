<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $maxBooking = Setting::where('key', 'max_booking')->first();
        return view('admin.settings.pengaturan', compact('maxBooking'));
    }

    public function update(Request $request)
    {
        $request->validate(['value' => 'required|numeric|min:1|max:10']);

    Setting::updateOrCreate(['key' => 'max_booking'], ['value' => $request->max_booking]);


        return redirect()->back()->with('success', 'Batas booking berhasil diperbarui!');
    }
}
