<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $userAgent = $request->header('User-Agent');

        // Kode Baru
        $redirectLogin = function () use ($userAgent) {
            return $userAgent === "UserAgentSiwaya" ? redirect()->route('mobile.login') : redirect()->route('login');
        };

        if (!auth()->check()) {
            return $redirectLogin();
        }

        if (Auth::user()->role->role_level !== $roles) {
            Auth::logout();
            return $redirectLogin()->withToastError('Anda melanggar hak akses');
        }

        return $next($request);
    }
}
