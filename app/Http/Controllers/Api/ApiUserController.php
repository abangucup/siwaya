<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function getUser()
    {
        $users = User::all();
        // dd($users);

        return response()->json($users, 200);
    }
}
