<?php

namespace App\Http\Controllers\Web\Wilayah;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelurahanController extends Controller
{
    public function index()
    {
        $dataKelurahan = Kelurahan::latest()->get();
        return view('dashboard.wilayah.kelurahan.index', compact('dataKelurahan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kelurahan' => 'required|max:255'
        ]);

        if (Kelurahan::where('slug', Str::slug($request->kelurahan))->exists()) {
            return back()->withErrors(['tambahkelurahan' => 'Kelurahan sudah ada'])->withToastError('Kelurahan sudah ada')->withInput($request->all());
        }

        $kelurahan = new Kelurahan();
        $kelurahan->nama_kelurahan = $request->kelurahan;
        $kelurahan->slug = Str::slug($request->kelurahan);
        $kelurahan->save();

        return back()->withToastSuccess('Kelurahan Tersimpan');
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'kelurahan' => 'required|max:255'
        ]);

        if (Kelurahan::where('slug', '!=', $slug)->where('slug', Str::slug($request->kelurahan))->exists()) {
            return back()->withErrors(['ubahkelurahan' => 'Kelurahan sudah ada'])->withToastError('Kelurahan sudah ada')->withInput($request->all());
        }

        $kelurahan = Kelurahan::where('slug', $slug)->firstOrFail();
        $kelurahan->update([
            'nama_kelurahan' => $request->kelurahan,
            'slug' => Str::slug($request->kelurahan),
        ]);

        return back()->withToastSuccess('Kelurahan Terupdate');
    }

    public function destroy($slug)
    {
        $kelurahan = Kelurahan::where('slug', $slug)->firstOrFail();
        $kelurahan->delete();
        return back()->withToastSuccess('Kelurahan Terhapus');
    }
}
