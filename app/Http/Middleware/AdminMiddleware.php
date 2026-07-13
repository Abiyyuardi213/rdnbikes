<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu untuk mengakses panel admin.');
        }

        // 2. Check if user has admin/super-admin privileges
        if (!Auth::user()->isAdmin()) {
            return redirect('/')
                ->with('error', 'Akses ditolak. Anda tidak memiliki hak akses administrator.');
        }

        return $next($request);
    }
}
