<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kabkot;
use App\Models\User;
use App\Models\Wbtb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LandingController extends Controller
{
    public function home()
    {
        $pencatatanTerbaru = Wbtb::where('status', 'diajukan')->latest()->take(3)->get();
        $penetapanTerbaru = Wbtb::where('status', 'ditetapkan')->latest()->take(3)->get();
        return view('landing.home', compact('pencatatanTerbaru', 'penetapanTerbaru'));
    }

    public function demografis()
    {
        // $demografis = Kabkot::withCount('wbtbs')->latest()->get()->toArray();
        // dd($demografis);
        // $akbkot = DB::table('kabkots')->select('id', 'nama_kabkot')->get();
        $kabkot = Kabkot::select('id', 'nama_kabkot')->get();

        $geoWilayahPath = public_path('assets/json/geoWilayahGorontalo.json');
        $geoWilayah = json_decode(File::get($geoWilayahPath), true);

        // Gabungkan data dari database dan JSON
        $demografis = $kabkot->map(function ($item) use ($geoWilayah) {
            // Cari data koordinat berdasarkan nama kabkot
            $regency = collect($geoWilayah)
                ->pluck('regencies') // Ambil semua kabupaten dari JSON
                ->flatten(1) // Flatten array menjadi satu level
                ->firstWhere('name', strtoupper($item->nama_kabkot)); // Cocokkan nama kabkot

            // dd($regency);
            return [
                'id' => $item->id,
                'name' => $item->nama_kabkot,
                'latitude' => $regency['latitude'] ?? null,
                'longitude' => $regency['longitude'] ?? null,
                'total' => $item->wbtbs->count(),
            ];
        });

        // dd($demografis);


        return view('landing.demografis', compact('demografis'));
    }

    public function pencatatanWbtb(Request $request)
    {
        $query = $request->get('search');

        $wbtbs = Wbtb::where('status', 'diajukan')
            ->where(function ($query) use ($request) {
                $query->where('nama_wbtb', 'LIKE', "%{$request->get('search')}%")
                    ->orWhere('deskripsi_wbtb', 'LIKE', "%{$request->get('search')}%");
            })->latest()->get();

        return view('landing.pencatatanWbtb', compact('wbtbs', 'query'));
    }

    public function penetapanWbtb(Request $request)
    {
        $query = $request->get('search');

        $wbtbs = Wbtb::where('status', 'ditetapkan')
            ->where(function ($query) use ($request) {
                $query->where('nama_wbtb', 'LIKE', "%{$request->get('search')}%")
                    ->orWhere('deskripsi_wbtb', 'LIKE', "%{$request->get('search')}%");
            })->latest()->get();
        return view('landing.penetapanWbtb', compact('wbtbs', 'query'));
    }

    public function kontak()
    {
        $kontaks = User::where('role_id', 1)->orWhere('role_id', 3)->get();
        return view('landing.kontak', compact('kontaks'));
    }
}
