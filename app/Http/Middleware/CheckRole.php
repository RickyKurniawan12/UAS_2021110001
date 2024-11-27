<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->role !== $role) {
            // Jika pengguna tidak memiliki peran yang sesuai, arahkan ke halaman lain atau beri pesan error.
            return redirect('home')->with('error', 'Anda tidak memiliki akses.');
        }

        return $next($request); // Lanjutkan ke request berikutnya.
    }
}
