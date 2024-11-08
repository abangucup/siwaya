<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Wbtb;
use Illuminate\Http\Request;

class MobileWBTBController extends Controller
{
    public function pengajuan()
    {
        $dataWbtb = Wbtb::where('user_id', auth()->user()->id)->get();
        return view('mobile.wbtb.pengajuan', compact('dataWbtb'));
    }
}
