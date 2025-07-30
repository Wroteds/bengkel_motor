<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Import model User

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login'); // Menggunakan login.blade.php yang Anda berikan
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required', 
            'password' => 'required',
        ]);

        // Coba autentikasi menggunakan 'name' sebagai username
        if (Auth::attempt(['name' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
             if (((object) Auth::user())->isAdmin()) { 
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/user/dashboard');
            }
        }

        // Jika autentikasi gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Menampilkan halaman register
    public function showRegistrationForm()
    {
        return view('auth.register'); // Kita akan membuat file ini nanti
    }

    // Menangani proses register
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'user', // Default role saat register adalah 'user'
        ]);

        Auth::login($user);

        return redirect('/user/dashboard')->with('success', 'Registrasi berhasil! Selamat datang!');
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
