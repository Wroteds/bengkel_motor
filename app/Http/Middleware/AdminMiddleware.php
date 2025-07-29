<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request):
     */
     public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login
        if (Auth::check()) {
        /** @var \App\Models\User $user */ // <-- Tambahkan baris ini
        $user = Auth::user();

        if ($user->isAdmin()) { // <-- Panggil dari $user
                return $next($request);
        }
    }
        
    return redirect('/')->with('error','Anda tidak memiliki akses sebagai admin.');
 }
}