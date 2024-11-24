<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Instansi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $dataRole = Role::all();
        $dataInstansi = Instansi::latest()->get();
        $users = User::with('role', 'biodata', 'instansi')->latest()->get();
        return view('dashboard.settings.user.index', compact('users', 'dataInstansi', 'dataRole'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'instansi' => 'required',
            'nama_lengkap' => 'required',
            'nomor_telepon' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        if (User::where('email', $request->email)->exists() || User::where('username', $request->username)->exists()) {
            return redirect()->route('settings.user.index')->withErrors(['tambahuser' => 'Email atau Username sudah terdaftar'])->withToastError('Email atau Username sudah terdaftar');
        }

        $role = Role::where('role_level', $request->role)->firstOrFail();
        $instansi = Instansi::where('slug', $request->instansi)->firstOrFail();
        
        $biodata = new Biodata();
        $biodata->nama_lengkap = $request->nama_lengkap;
        $biodata->slug = Str::slug($request->nama_lengkap);
        $biodata->nomor_telepon = $request->nomor_telepon;
        $biodata->jenis_kelamin = $request->jenis_kelamin;
        $biodata->save();

        $user = new User();
        $user->biodata_id = $biodata->id;
        $user->instansi_id = $instansi->id;
        $user->role_id = $role->id;
        $user->username = $request->username;
        $user->slug = Str::slug($request->username);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('settings.user.index')->withToastSuccess('User ditambahkan');
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'instansi' => 'required',
            'nama_lengkap' => 'required',
            'nomor_telepon' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        if (User::where('slug', '!=', $slug)->where('email', $request->email)->exists() || User::where('slug', '!=', $slug)->where('username', $request->username)->exists()) {
            return redirect()->route('settings.user.index')->withErrors(['tambahuser' => 'Email atau Username sudah terdaftar'])->withToastError('Email atau Username sudah terdaftar');
        }

        $role = Role::where('role_level', $request->role)->firstOrFail();
        $instansi = Instansi::where('slug', $request->instansi)->firstOrFail(); 

        $user = User::where('slug', $slug)->firstOrFail();

        if ($request->password != null) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
        
        $user->update([
            'biodata_id' => $user->biodata_id,
            'instansi_id' => $instansi->id,
            'role_id' => $role->id,
            'username' => $request->username,
            'slug' => Str::slug($request->username),
            'email' => $request->email,
        ]);

        

        $biodata = Biodata::where('id', $user->biodata_id)->firstOrFail();
        $biodata->update([
            'nama_lengkap' => $request->nama_lengkap,
            'slug' => Str::slug($request->nama_lengkap),
            'nomor_telepon' => $request->nomor_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('settings.user.index')->withToastSuccess('User diubah');
    }
    
    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $user->delete();
        $user->biodata()->delete();
        return redirect()->route('settings.user.index')->withToastSuccess('User dihapus');
    }
}
