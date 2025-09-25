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
        return view('user.booking.riwayat', compact('riwayatServis'));
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = auth()->user();

        if (!$user) {
            return back()->with('error', 'User tidak ada');
        }

        // simpan file ke storage/app/public/profile_foto
        $path = $request->file('profile_foto')->store('profile_foto', 'public');

        // update di database
        $user->profile_foto = $path;
        $user->save();

        return back()->with('success', 'Foto profil berhasil diperbarui!');
    }
}
