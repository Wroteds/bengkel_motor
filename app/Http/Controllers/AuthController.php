<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('login'); // ini memanggil login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->only('username', 'password');

        // Contoh login manual
        if ($credentials['username'] === 'admin' && $credentials['password'] === '1234') {
            return redirect('/')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['error' => 'Username atau password salah']);
    }
}
