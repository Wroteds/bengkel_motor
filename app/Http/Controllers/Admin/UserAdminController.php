<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index()
    {
        // Ambil semua user kecuali admin
        $users = User::where('role', 'user')->get();

        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        // Hapus user
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }
}
