<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Belum login
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil role user
        $userRole = Auth::user()->role;

        // Cek apakah role user ada di daftar roles
        if (!in_array($userRole, $roles)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
