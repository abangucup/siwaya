<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string',
            'whatsapp' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput($request->all())->withToastError('Kesalahan Inputan');
        }

        $biodata = new Biodata();
        $biodata->nama_lengkap = $request->nama_lengkap;
        $biodata->slug = Str::slug($request->nama_lengkap);
        $biodata->jenis_kelamin = $request->jenis_kelamin;
        $biodata->whatsapp = $request->whatsapp;
        $biodata->save();

        $role = Role::where('role_level', 'masyarakat')->first();

        $user = new User();
        $user->biodata_id = $biodata->id;
        $user->username = $request->username;
        $user->slug = Str::slug($request->username);
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->role_id = $role->id;
        $user->save();

        return redirect()->route('mobile.login')->withToastSuccess('Register Berhasil');
    }
}
