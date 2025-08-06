<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
public function handle($request, Closure $next, $role)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->withErrors(['msg' => 'Silakan login dulu']);
    }

    if ($user->role !== $role) {
        abort(403, 'Akses ditolak.');
    }

    return $next($request);
}
}