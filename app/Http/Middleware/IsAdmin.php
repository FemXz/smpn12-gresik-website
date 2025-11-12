<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        // Cek login dulu
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Cek role
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak! Ini area admin.');
        }

        return $next($request);
    }
}
