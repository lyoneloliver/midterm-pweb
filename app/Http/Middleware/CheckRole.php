<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string[]  ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = auth()->user();

        // Cek apakah role user ada di daftar roles yang diizinkan
        if (!in_array($user->role, $roles)) {
            // Bisa diarahkan ke halaman dashboard role-nya masing-masing
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard')->with('error', 'Akses tidak diizinkan.');
                case 'lecturer':
                    return redirect()->route('lecturer.dashboard')->with('error', 'Akses tidak diizinkan.');
                case 'student':
                    return redirect()->route('student.dashboard')->with('error', 'Akses tidak diizinkan.');
                default:
                    return redirect()->route('login')->with('error', 'Role tidak valid.');
            }
        }

        return $next($request);
    }
}
