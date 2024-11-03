<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MobileWBTBController extends Controller
{
    public function pengajuan()
    {
        return view('mobile.wbtb.pengajuan');
    }
}
