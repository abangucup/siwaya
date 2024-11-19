<?php

namespace App\Http\Controllers;

use App\Models\VerifikasiWbtb;
use App\Models\Wbtb;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class VerifikasiWbtbController extends Controller
{
    public function index()
    {
        $wbtbDiajukan = Wbtb::where('status', 'diajukan')->get();
        return view('mobile.wbtb.verifikasi.index', compact('wbtbDiajukan'));
    }

    public function verifikasi($slug)
    {
        $wbtb = Wbtb::where('slug', $slug)->firstOrFail();
        if ($wbtb->status == 'diverifikasi' || $wbtb->status !== 'diajukan') {
            return redirect()->route('mobile.wbtb.verifikasi.list')->withToastError('WBTB sudah diverifikasi');
        }

        return view('mobile.wbtb.verifikasi.verifikasi', compact('wbtb'));
    }

    public function storeVerifikasi(Request $request, $slug)
    {
        $wbtb = Wbtb::where('slug', $slug)->first();
        if (!$wbtb) {
            return redirect()->back()->withToastError('WBTB tidak ditemukan')->withInput($request->all());
        }
        
        $verifikasiWbtb = new VerifikasiWbtb();
        $verifikasiWbtb->wbtb_id = $wbtb->id;
        $verifikasiWbtb->status_verifikasi = $request->status_verifikasi ?? 'disetujui';
        $verifikasiWbtb->tanggal_verifikasi = date(now());
        $verifikasiWbtb->user_id = auth()->user()->id;
        $verifikasiWbtb->keterangan = $request->keterangan;
        $verifikasiWbtb->save();

        $wbtb->update(['status' => $verifikasiWbtb->status_verifikasi == 'disetujui' ? 'diverifikasi' : 'ditolak']);

        return redirect()->route('mobile.wbtb.verifikasi.list')->withToastSuccess('Verifikasi WBTB Berhasil');
    }
}   
