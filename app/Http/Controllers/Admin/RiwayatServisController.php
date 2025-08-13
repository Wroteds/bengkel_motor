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
        $users = User::paginate(10);
        $riwayats = RiwayatServis::with('user')->latest()->paginate(10);
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

         RiwayatServis::create([
            'user_id' => $request->user_id,
            'nama_servis' => $request->nama_servis,
            'deskripsi' => $request->deskripsi,
            'tanggal_servis' => $request->tanggal_servis,
        ]);

        return redirect()->back()->with('success', 'Riwayat servis berhasil ditambahkan.');
    }

      public function edit($id)
    {
        $riwayat = RiwayatServis::findOrFail($id);
        $users = User::all();
        return view('admin.riwayat.edit', compact('riwayat', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_servis' => 'required|string|max:255',
            'tanggal_servis' => 'required|date',
        ]);

        $riwayat = RiwayatServis::findOrFail($id);
        $riwayat->update($request->all());

        return redirect()->route('admin.riwayat.index')->with('success', 'Riwayat servis berhasil diperbarui.');
    }
    public function hapus($id)
    {
    $riwayat = RiwayatServis::findOrFail($id);
    $riwayat->delete();

    return redirect()->back()->with('success', 'Riwayat servis berhasil dihapus.');
    }

}


