<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('landing.auth.register');
    }

    public function postRegister(Request $request)
    {
        dd($request->all());
    }

    public function mobileRegister()
    {
        return view('mobile.auth.register');
    }

    public function mobilePostRegister(Request $request)
    {
        dd($request->all());
    }
}
