<?php

namespace App\Http\Controllers;

use App\Models\Kondisi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KondisiController extends Controller
{
    public function index()
    {
        $kondisis = Kondisi::latest()->get();
        return view('dashboard.kondisi.index', compact('kondisis'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_kondisi' => 'required',
            'nama_kondisi' => 'required|max:255'
        ]);

        if (Kondisi::where('slug', Str::slug($request->nama_kondisi))->exists()) {
            return back()->withErrors(['tambahkondisi' => 'kondisi sudah ada'])->withToastError('kondisi sudah ada')->withInput($request->all());
        }

        $kondisi = new kondisi();
        $kondisi->kode_kondisi = $request->kode_kondisi;
        $kondisi->nama_kondisi = $request->nama_kondisi;
        $kondisi->slug = Str::slug($request->nama_kondisi);
        $kondisi->save();

        return back()->withToastSuccess('kondisi Tersimpan');
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'nama_kondisi' => 'required|max:255'
        ]);

        if (Kondisi::where('slug', '!=', $slug)->where('slug', Str::slug($request->nama_kondisi))->exists()) {
            return back()->withToastError('kondisi sudah ada')->withInput($request->all());
        }

        $kondisi = Kondisi::where('slug', $slug)->firstOrFail();
        $kondisi->update([
            'nama_kondisi' => $request->nama_kondisi,
            'slug' => Str::slug($request->nama_kondisi),
        ]);

        return back()->withToastSuccess('kondisi Terupdate');
    }

    public function destroy($slug)
    {
        $kondisi = Kondisi::where('slug', $slug)->firstOrFail();
        $kondisi->delete();
        return back()->withToastSuccess('kondisi Terhapus');
    }
}
