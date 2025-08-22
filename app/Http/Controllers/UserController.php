<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
{
    return view('user.booking.buat');
}

public function riwayat()
{
    $riwayatServis = auth()->user()->riwayatServis; 
    return view('dashboard.riwayat', compact('riwayatServis'));
}

public function updatePhoto(Request $request)
{
    $request->validate([
        'profile_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $user = auth()->user();

    if(!$user){
        return back()->with('error','user tidak ada');
    }

    // simpan file 
    $path = $request->file('profile_photo')->store('profile_photos', 'public');

    // update di database
    $user->profile_photo = $path;
    $user->save();

    return back()->with('success', 'Foto profil berhasil diperbarui!');
  
}
}


