<?php

namespace App\Http\Controllers\Web;

use App\Exports\LaporanPenetapanExport;
use App\Exports\LaporanPengajuanExport;
use App\Exports\LaporanPenolakanExport;
use App\Exports\LaporanVerifikasiExport;
use App\Http\Controllers\Controller;
use App\Models\Wbtb;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function laporanDitolak()
    {
        $wbtbs = Wbtb::with('galeries', 'kategoris', 'sebarans')->where('status', 'ditolak')->latest()->get();
        return view('dashboard.laporan.laporan_penolakan', compact('wbtbs'));
    }

    public function laporanDiverifikasi()
    {
        $wbtbs = Wbtb::with('galeries', 'kategoris', 'sebarans')->where('status', 'diverifikasi')->latest()->get();
        return view('dashboard.laporan.laporan_verifikasi', compact('wbtbs'));
    }

    public function laporanDitetapkan()
    {
        $wbtbs = Wbtb::with('galeries', 'kategoris', 'sebarans')->where('status', 'ditetapkan')->latest()->get();
        return view('dashboard.laporan.laporan_penetapan', compact('wbtbs'));
    }

    public function laporanDiajukan()
    {
        $wbtbs = Wbtb::with('galeries', 'kategoris', 'sebarans')->where('status', 'diajukan')->latest()->get();
        return view('dashboard.laporan.laporan_pengajuan', compact('wbtbs'));
    }

    public function laporanCetakDitolak()
    {
        $wbtbs = Wbtb::with('galeries', 'kategoris', 'sebarans')->where('status', 'ditolak')->latest()->get();
        $pdf = Pdf::loadView('dashboard.laporan.cetak.laporan_ditolak', compact('wbtbs'))
            ->setPaper('legal', 'landscape');
        return $pdf->stream('laporan_penolakan.pdf');
    }

    public function laporanCetakDiajukan()
    {
        $wbtbs = Wbtb::with('galeries', 'kategoris', 'sebarans')->where('status', 'diajukan')->latest()->get();
        $pdf = Pdf::loadView('dashboard.laporan.cetak.laporan_diajukan', compact('wbtbs'))
            ->setPaper('legal', 'landscape');
        return $pdf->stream('laporan_pengajuan.pdf');
    }

    public function laporanCetakDiverifikasi()
    {
        $wbtbs = Wbtb::with('galeries', 'kategoris', 'sebarans')->where('status', 'diverifikasi')->latest()->get();
        $pdf = Pdf::loadView('dashboard.laporan.cetak.laporan_diverifikasi', compact('wbtbs'))
            ->setPaper('legal', 'landscape');
        return $pdf->stream('laporan_verifikasi.pdf');
    }

    public function laporanCetakDitetapkan()
    {
        $wbtbs = Wbtb::with('galeries', 'kategoris', 'sebarans')->where('status', 'ditetapkan')->latest()->get();
        $pdf = Pdf::loadView('dashboard.laporan.cetak.laporan_ditetapkan', compact('wbtbs'))
            ->setPaper('legal', 'landscape');
        return $pdf->stream('laporan_penetapan.pdf');
    }

    public function exportDitolak()
    {
        return Excel::download(new LaporanPenolakanExport, 'laporan_penolakan.xlsx');
    }

    public function exportDitetapkan()
    {
        return Excel::download(new LaporanPenetapanExport, 'laporan_penetapan.xlsx');
    }

    public function exportDiverifikasi()
    {
        return Excel::download(new LaporanVerifikasiExport, 'laporan_verifikasi.xlsx');
    }

    public function exportDiajukan()
    {
        return Excel::download(new LaporanPengajuanExport, 'laporan_pengajuan.xlsx');
    }
}
