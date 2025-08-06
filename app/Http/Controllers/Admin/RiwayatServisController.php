<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatServis;
use App\Models\User;

class RiwayatServisController extends Controller
{
    public function index()
    {
        $users = User::all();
        $riwayats = RiwayatServis::with('user')->latest()->get();
        return view('admin.riwayat.index', compact('riwayats', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_servis' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_servis' => 'required|date',
        ]);

        RiwayatServis::create($request->all());

        return redirect()->back()->with('success', 'Riwayat servis berhasil ditambahkan.');
    }
}

