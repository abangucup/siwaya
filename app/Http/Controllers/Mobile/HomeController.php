<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function splash()
    {
        return view('mobile.splash');
    }

    public function home()
    {
        return view('mobile.home');
    }
}
