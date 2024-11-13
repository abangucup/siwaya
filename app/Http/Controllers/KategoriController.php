<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('dashboard.kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|max:255'
        ]);

        if (Kategori::where('slug', Str::slug($request->nama_kategori))->exists()) {
            return back()->withErrors(['tambahkategori' => 'Kategori sudah ada'])->withToastError('Kategori sudah ada')->withInput($request->all());
        } 

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = Str::slug($request->nama_kategori);
        $kategori->save();

        return back()->withToastSuccess('Kategori Tersimpan');
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|max:255'
        ]);

        if (Kategori::where('slug', '!=', $slug)->where('slug', Str::slug($request->nama_kategori))->exists()) {
            return back()->withToastError('Kategori sudah ada')->withInput($request->all());
        } 

        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);

        return back()->withToastSuccess('Kategori Terupdate');
    }

    public function destroy($slug) 
    {  
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $kategori->delete();
        return back()->withToastSuccess('Kategori Terhapus');
    }
}
