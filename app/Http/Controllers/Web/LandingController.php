<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Kabkot;
use App\Models\User;
use App\Models\Warisan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home(Request $request)
    {
        // $userAgent = str_contains($request->header('User-Agent'), 'Android');

        // $userAgent = $request->header('User-Agent');
        // $deviceAndroid = strpos($userAgent, 'wv');
        // dd($deviceAndroid);

        // dd($userAgent);
        // if (auth()->check()) {
        //     dd('OK');
        // } else {
        //     dd('NOT');
        // }

        $pencatatanTerbaru = Warisan::where('status', 'diajukan')->latest()->take(3)->get();
        $pencatatanTerbaru = Warisan::where('status', 'ditetapkan')->latest()->take(3)->get();
        return view('landing.home', compact('pencatatanTerbaru', 'pencatatanTerbaru'));
    }

    public function demografis()
    {
        $demografis = Kabkot::withCount('lokasis')->get();
        return view('landing.demografis', compact('demografis'));
    }

    public function pencatatanWbtb()
    {
        $pencatatans = Warisan::where('status', 'diajukan')->latest()->get();
        return view('landing.pencatatanWbtb', compact('pencatatans'));
    }

    public function penetapanWbtb()
    {
        $penetapans = Warisan::where('status', 'ditetapkan')->latest()->get();
        return view('landing.penetapanWbtb', compact('penetapans'));
    }

    public function kontak()
    {
        $kontaks = User::where('role_id', 1)->orWhere('role_id', 3)->get();
        return view('landing.kontak', compact('kontaks'));
    }


}
