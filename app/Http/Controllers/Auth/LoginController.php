<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return redirect()->route('home');
    }

    public function postLogin(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'email_or_username' => 'required|string',
            'password' => 'required|string'
        ], [
            'email_or_username.required' => 'Email atau Username harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        // Validasi inputan jika sudah sesuai
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput($request->all());
        }

        $login_type = filter_var($request->input('email_or_username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $login_type => $request->input('email_or_username'),
            'password' => $request->input('password')
        ];

        if (auth()->attempt($credentials)) {
            if (!auth()->user()->role->role_level == 'masyarakat') {
                return redirect()->route('dashboard')->withToastSuccess('Login Berhasil');
            } else {
                Auth::logout();
                return redirect()->route('login')->withToastError('Login Gagal');
            }
        }

        $user = User::where($login_type, $request->input('email_or_username'))->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email_or_username' => 'Username atau Email Salah'])->withToastError('Username atau Email Salah')->withInput($request->all());
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Password Salah'])->withToastError('Password Salah')->withInput($request->all());
        }
    }
    public function mobileLogin()
    {
        return view('mobile.auth.login');
    }

    public function mobilePostLogin(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'email_or_username' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput($request->all())->withToastError('Kesalahan Inputan');
        }

        $login_type = filter_var($request->input('email_or_username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $login_type => $request->input('email_or_username'),
            'password' => $request->input('password')
        ];

        if (auth()->attempt($credentials)) {
            return redirect()->route('mobile.home')->withToastSuccess('Login Berhasil');
        }

        $user = User::where($login_type, $request->input('email_or_username'))->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email_or_username' => 'Username atau Email Salah'])->withToastError('Username atau Email Salah')->withInput($request->all());
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Password Salah'])->withToastError('Password Salah')->withInput($request->all());
        }
    }
}
