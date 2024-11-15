<?php

namespace App\Http\Controllers;

use App\Models\Wbtb;
use Illuminate\Http\Request;

class VerifikasiWbtbController extends Controller
{
    public function verifikasi()
    {
        $wbtbDiajukan = Wbtb::where('status', 'diajukan')->get();
        return view('mobile.wbtb.verifikasi.index', compact('wbtbDiajukan'));
    }

    public function storeVerifikasi(Request $request, $slug)
    {
        dd($request->all());
    }
}
