<?php

namespace App\Http\Controllers;

use App\Models\PenetapanWbtb;
use App\Models\Wbtb;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenetapanWbtbController extends Controller
{
    public function index()
    {
        $wbtbDiverifikasi = Wbtb::where('status', 'diverifikasi')->get();
        return view('mobile.wbtb.penetapan.index', compact('wbtbDiverifikasi'));
    }

    public function penetapan($slug)
    {
        $wbtb = Wbtb::where('slug', $slug)->firstOrFail();
        if ($wbtb->status == 'ditetapkan' || $wbtb->status !== 'diverifikasi') {
            return redirect()->route('mobile.wbtb.verifikasi.list')->withToastError('WBTB sudah ditetapkan');
        }

        return view('mobile.wbtb.penetapan.penetapan', compact('wbtb'));
    }

    public function storePenetapan(Request $request, $slug)
    {
        $wbtb = Wbtb::where('slug', $slug)->first();
        if (!$wbtb) {
            return redirect()->back()->withToastError('WBTB tidak ditemukan')->withInput($request->all());
        }

        $penetapanWbtb = new PenetapanWbtb();
        $penetapanWbtb->wbtb_id = $wbtb->id;
        $penetapanWbtb->status_penetapan = $request->status_penetapan;
        $penetapanWbtb->tanggal_penetapan = date(now());
        $penetapanWbtb->user_id = auth()->user()->id;
        $penetapanWbtb->keterangan = $request->keterangan;
        $penetapanWbtb->save();

        if ($request->status_penetapan == 'disetujui') {

            $tahun = Carbon::parse(now())->isoFormat('YYYY');

            $wbtb->update([
                'status' => 'ditetapkan',
                'nomor_wbtb' => 'REK/WBTB/' . $tahun . '/' . $wbtb->kondisi->kode_kondisi . '/' . sprintf("%05d", $penetapanWbtb->id),
            ]);
        } else {
            $wbtb->update([
                'status' => 'ditolak',
            ]);
        }

        return redirect()->route('mobile.wbtb.penetapan.list')->withToastSuccess('Penetapan WBTB Berhasil');
    }
}
