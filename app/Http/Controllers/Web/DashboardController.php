<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Kabkot;
use App\Models\Kategori;
use App\Models\Role;
use App\Models\User;
use App\Models\Wbtb;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Role::where('role_level', 'masyarakat')->first();

        $totalUser = User::count();
        $totalMasyarakat = User::where('role_id', $role->id)->count();
        $totalInstansi = Instansi::count();
        $totalWbtb = Wbtb::count();
        $totalWbtbTerverifikasi = Wbtb::where('status', 'diverifikasi')->count();
        $totalWbtbBelumTerverifikasi = Wbtb::where('status', 'diajukan')->count();
        $totalWbtbDitetapkan = Wbtb::where('status', 'ditetapkan')->count();
        $totalWbtbDitolak = Wbtb::where('status', 'ditolak')->count();

        $register = User::where('role_id', $role->id)->latest()->take(5)->get();
        
        $datas = [
            'Total User' => $totalUser,
            'Total Masyarakat' => $totalMasyarakat,
            'Total Instansi' => $totalInstansi,
            'Total WBTB' => $totalWbtb,
            'Total WBTB Terverifikasi' => $totalWbtbTerverifikasi,
            'Total WBTB Belum Terverifikasi' => $totalWbtbBelumTerverifikasi,
            'Total WBTB Ditetapkan' => $totalWbtbDitetapkan,
            'Total WBTB Ditolak' => $totalWbtbDitolak
        ];

        $dataWbtb = Wbtb::latest()->take(5)->get();

        return view('dashboard.dashboard', compact('datas', 'register', 'dataWbtb'));
    }

        public function search(Request $request)
        {
            $key = $request->search;

            $wbtb = Wbtb::where('nama_wbtb', 'LIKE', "%{$key}%")->first();

            $user = User::where('username', 'LIKE', "%{$key}%")->first();

            $kategori = Kategori::where('nama_kategori', 'LIKE', "%{$key}%")->first();

            $kabkot = Kabkot::where('nama_kabkot', 'LIKE', "%{$key}%")->first();

            $instansi = Instansi::where('nama_instansi', 'LIKE', "%{$key}%")->first();

            switch (true) {
                case !is_null($wbtb):
                    return redirect()->route('wbtb.index')
                        ->with('success', "Ditemukan WBTB dengan nama '{$key}'");
                case !is_null($user):
                    return redirect()->route('settings.user.index')
                        ->with('success', "Ditemukan pengguna dengan username '{$key}'");
                case !is_null($kategori):
                    return redirect()->route('kategori.index')
                        ->with('success', "Ditemukan kategori dengan nama '{$key}'");
                case !is_null($kabkot):
                    return redirect()->route('wilayah.kabkot.index')
                        ->with('success', "Ditemukan kabupaten/kota dengan nama '{$key}'");
                case !is_null($instansi):
                    return redirect()->route('instansi.index')
                        ->with('success', "Ditemukan instansi dengan nama '{$key}'");
                default:
                    return redirect()->back()->with('error', "Kata kunci '{$key}' tidak ditemukan");
            }

        }
}
