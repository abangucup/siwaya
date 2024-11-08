<?php

namespace App\Http\Controllers\Web\Wilayah;

use App\Http\Controllers\Controller;
use App\Models\Kabkot;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KabkotController extends Controller
{
    public function index()
    {
        $dataKabkot = Kabkot::latest()->get();
        return view('dashboard.wilayah.kabkot.index', compact('dataKabkot'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kabkot' => 'required|max:255'
        ]);

        if (Kabkot::where('slug', Str::slug($request->kabkot))->exists()) {
            return back()->withErrors(['tambahkabkot' => 'Kabupaten/Kota sudah ada'])->withToastError('Kabupaten/Kota sudah ada')->withInput($request->all());
        } 

        $kabkot = new Kabkot();
        $kabkot->nama_kabkot = $request->kabkot;
        $kabkot->slug = Str::slug($request->kabkot);
        $kabkot->save();

        return back()->withToastSuccess('Kabupaten/Kota Tersimpan');
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'kabkot' => 'required|max:255'
        ]);

        if (Kabkot::where('slug', '!=', $slug)->where('slug', Str::slug($request->kabkot))->exists()) {
            return back()->withErrors(['ubahkabkot' => 'Kabupaten/Kota sudah ada'])->withToastError('Kabupaten/Kota sudah ada')->withInput($request->all());
        } 

        $kabkot = Kabkot::where('slug', $slug)->firstOrFail();
        $kabkot->update([
            'nama_kabkot' => $request->kabkot,
            'slug' => Str::slug($request->kabkot),
        ]);

        return back()->withToastSuccess('Kabupaten/Kota Terupdate');
    }

    public function destroy($slug) 
    {  
        $kabkot = Kabkot::where('slug', $slug)->firstOrFail();
        $kabkot->delete();
        return back()->withToastSuccess('Kabupaten/Kota Terhapus');
    }
}
