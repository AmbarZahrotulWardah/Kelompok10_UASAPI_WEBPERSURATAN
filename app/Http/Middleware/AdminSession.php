<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('is_admin')) {
            return redirect('/dashboard')->with('error', 'Akses hanya untuk admin.');
        }

        return $next($request);
    }
}
