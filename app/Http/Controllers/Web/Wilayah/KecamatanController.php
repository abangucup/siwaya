<?php

namespace App\Http\Controllers\Web\Wilayah;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KecamatanController extends Controller
{
    public function index()
    {
        $dataKecamatan = Kecamatan::latest()->get();
        return view('dashboard.wilayah.kecamatan.index', compact('dataKecamatan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kecamatan' => 'required|max:255'
        ]);

        if (Kecamatan::where('slug', Str::slug($request->kecamatan))->exists()) {
            return back()->withErrors(['tambahkecamatan' => 'Kecamatan sudah ada'])->withToastError('Kecamatan sudah ada')->withInput($request->all());
        } 

        $kecamatan = new kecamatan();
        $kecamatan->nama_kecamatan = $request->kecamatan;
        $kecamatan->slug = Str::slug($request->kecamatan);
        $kecamatan->save();

        return back()->withToastSuccess('Kecamatan Tersimpan');
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'kecamatan' => 'required|max:255'
        ]);

        if (Kecamatan::where('slug', '!=', $slug)->where('slug', Str::slug($request->kecamatan))->exists()) {
            return back()->withErrors(['ubahkecamatan' => 'Kecamatan sudah ada'])->withToastError('Kecamatan sudah ada')->withInput($request->all());
        } 

        $kecamatan = Kecamatan::where('slug', $slug)->firstOrFail();
        $kecamatan->update([
            'nama_kecamatan' => $request->kecamatan,
            'slug' => Str::slug($request->kecamatan),
        ]);

        return back()->withToastSuccess('Kecamatan Terupdate');
    }

    public function destroy($slug) 
    {  
        $kecamatan = Kecamatan::where('slug', $slug)->firstOrFail();
        $kecamatan->delete();
        return back()->withToastSuccess('Kecamatan Terhapus');
    }
}