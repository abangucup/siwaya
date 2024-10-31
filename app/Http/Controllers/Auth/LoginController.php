<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
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
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput($request->all());
        }

        $login_type = filter_var($request->input('email_or_username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $login_type => $request->input('email_or_username'),
            'password' => $request->input('password')
        ];

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withToastError('error', 'Email atau Username dan Password salah')->withInput($request->all());
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
            return redirect()->back()->withErrors($validasi)->withInput($request->all());
        }

        $login_type = filter_var($request->input('email_or_username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $login_type => $request->input('email_or_username'),
            'password' => $request->input('password')
        ];

        if (auth()->attempt($credentials)) {
            return redirect()->route('mobile.home');
        }

        return redirect()->back()->withToastError('error', 'Email atau Username dan Password salah')->withInput($request->all());
    }
}
