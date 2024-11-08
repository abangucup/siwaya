<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Kabkot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InstansiController extends Controller
{
    public function index()
    {
        $dataKabkot = Kabkot::latest()->get();
        $dataInstansi = Instansi::latest()->get();
        return view('dashboard.instansi.index', compact('dataInstansi', 'dataKabkot'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_instansi' => 'required',
            'kabkot' => 'required',
        ]);

        $kabkot = Kabkot::where('slug', $request->kabkot)->firstOrFail();

        if ($validasi->fails()) {
            return back()->withErrors($validasi)->withInput($request->all())->withToastError('Data belum lengkap');
        }

        if (Instansi::where('slug', Str::slug($request->nama_instansi).'-'.$kabkot->slug)->exists()) {
            return back()->withErrors(['tambahinstansi' => 'Instansi sudah ada'])->withToastError('Instansi sudah ada')->withInput($request->all());
        }

        $instansi = new Instansi();
        $instansi->nama_instansi = $request->nama_instansi;
        $instansi->slug = Str::slug($request->nama_instansi).'-'.$kabkot->slug;
        $instansi->kabkot_id = $kabkot->id;
        $instansi->save();

        return redirect()->back()->withToastSuccess('Instansi Tersimpan');
    }

    public function update(Request $request, $slug)
    {
        $validasi = Validator::make($request->all(), [
            'nama_instansi' => 'required',
            'kabkot' => 'required',
        ]);

        if ($validasi->fails()) {
            return back()->withErrors($validasi)->withInput($request->all())->withToastError('Data belum lengkap');
        }

        $kabkot = Kabkot::where('slug', $request->kabkot)->firstOrFail();
        $instansi = Instansi::where('slug', $slug)->firstOrFail();

        if (Instansi::where('slug', '!=', $slug)->where('slug', Str::slug($request->nama_instansi).'-'.$kabkot->slug)->exists()) {
            return back()->withToastError('Instansi sudah ada')->withInput($request->all());
        }
        
        $instansi->update([
            'nama_instansi' => $request->nama_instansi,
            'slug' => Str::slug($request->nama_instansi).'-'.$kabkot->slug,
            'kabkot_id' => $kabkot->id,
        ]);

        return back()->withToastSuccess('Instansi Terupdate');
    }

    public function destroy($slug)
    {
        $instansi = Instansi::where('slug', $slug)->firstOrFail();
        $instansi->delete();
        return back()->withToastSuccess('Instansi Terhapus');
    }
}
