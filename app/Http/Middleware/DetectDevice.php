<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetectDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna menggunakan perangkat Android
        $userAgent = $request->header('User-Agent');

        if (str_contains($userAgent, 'UserAgentSiwaya')) {
            // Jika perangkat Android di akses dari aplikasi, arahkan ke halaman /mobile
            if (!$request->is('mobile*')) {
                // Jika perangkat telah login arahkan ke halamn home
                if (auth()->check()) {
                    return redirect()->route('mobile.home');
                }
                // Jika belum arahkan ke halaman splash screen
                return redirect()->route('mobile.splash');
            }
        } else {
            // Jika bukan perangkat Mobile, batasi akses ke /mobile
            if ($request->is('mobile*')) {
                return redirect()->route('home');
            }
        }
        
        return $next($request);
    }
}
