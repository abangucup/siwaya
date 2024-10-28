<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->withToastSuccess('Logout Berhasil');
    }

    public function mobileLogout()
    {
        Auth::logout();
        return redirect()->route('mobile.splash')->withToastSuccess('Logout Berhasil');
    }
}
