<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Wbtb;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function splash()
    {
        return view('mobile.splash');
    }

    public function home()
    {
        $totalDiverifikasi = Wbtb::where('status', 'diverifikasi')->count();
        $totalDitetapkan = Wbtb::where('status', 'ditetapkan')->count();
        $totalDitolak = Wbtb::where('status', 'ditolak')->count();
        $totalDiajukan = Wbtb::where('status', 'diajukan')->count();

        $wbtbDitetapkan = Wbtb::where('status', 'ditetapkan')->latest()->take(3)->get();
        $wbtbDiverifikasi = Wbtb::where('status', 'diverifikasi')->latest()->take(3)->get();

        $data = [
            'WBTB Diverifikasi' => $totalDiverifikasi,
            'WBTB Ditetapkan' => $totalDitetapkan,
            'WBTB Ditolak' => $totalDitolak,
            'WBTB Diajukan' => $totalDiajukan
        ];

        return view('mobile.home', compact('data', 'wbtbDiverifikasi', 'wbtbDitetapkan'));
    }
}
