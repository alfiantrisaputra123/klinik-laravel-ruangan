<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Dipakai di route seperti: middleware('role:admin,petugas')
     * Nilai setelah titik dua ("admin", "petugas") masuk ke $roles.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        // Tolak kalau belum login atau role-nya tidak termasuk daftar yang diizinkan
        if (! $user || ! in_array($user->role, $roles)) {
            abort(403, 'Anda tidak memiliki hak akses ke halaman ini.');
        }

        return $next($request);
    }
}
