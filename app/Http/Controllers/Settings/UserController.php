<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $dataRole = Role::all();
        $dataInstansi = Instansi::latest()->get();
        $users = User::latest()->get();
        return view('dashboard.settings.user.index', compact('users', 'dataInstansi', 'dataRole'));
    }
}
