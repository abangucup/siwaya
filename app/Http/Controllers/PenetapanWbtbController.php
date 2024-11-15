<?php

namespace App\Http\Controllers;

use App\Models\Wbtb;
use Illuminate\Http\Request;

class PenetapanWbtbController extends Controller
{
    public function penetapan()
    {
        $wbtbDiverifikasi = Wbtb::where('status', 'diverifikasi')->get();
        return view('mobile.wbtb.penetapan.index', compact('wbtbDiverifikasi'));
    }

    public function storePenetapan(Request $request, $slug)
    {
        dd($request->all());
    }
}
