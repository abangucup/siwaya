<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function storeResetPassword(Request $request)
    {
        if (auth()->check()) {
            $request->validate([
                'password_baru' => 'required',
            ]);

            $user = User::where('slug', auth()->user()->slug)->first();
            $user->update([
                'password' => Hash::make($request->password_baru)
            ]);

            // Logout Dahulu
            Auth::logout();

            // Login Kembali
            Auth::login($user);

            return redirect()->route('profile.index')->withToastSuccess('Password berhasil diubah');
        } else {
            $request->validate([
                'email' => 'required|email',
                'password_baru' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->password = bcrypt($request->password_baru);
                $user->save();
                
                return redirect()->route('login')->withToastSuccess('Password berhasil diubah');
            } else {
                return redirect()->route('login')->withToastError('Email tidak ditemukan');
            }
        }
    }

    public function mobileResetPassword()
    {
        return view('mobile.auth.reset-password');
    }

    public function mobileStoreResetPassword(Request $request)
    {
        if (auth()->check()) {
            $request->validate([
                'password_baru' => 'required',
            ]);

            $user = User::where('slug', auth()->user()->slug)->first();
            $user->update([
                'password' => Hash::make($request->password_baru)
            ]);

            // Logout Dahulu
            Auth::logout();

            // Login Kembali
            Auth::login($user);

            return redirect()->route('mobile.profile.index')->withToastSuccess('Password berhasil diubah');
        } else {
            $request->validate([
                'email' => 'required|email',
                'password_baru' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->password = bcrypt($request->password_baru);
                $user->save();
                
                return redirect()->route('mobile.login')->withToastSuccess('Password berhasil diubah');
            } else {
                return redirect()->route('mobile.login')->withToastError('Email tidak ditemukan');
            }
        }
    }
}
