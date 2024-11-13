<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Role;
use App\Models\User;
use App\Models\Wbtb;
use Illuminate\Http\Request;

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
}
