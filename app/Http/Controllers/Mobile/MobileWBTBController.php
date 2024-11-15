<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Kabkot;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kondisi;
use App\Models\Lokasi;
use App\Models\Wbtb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MobileWBTBController extends Controller
{
    public function list(Request $request)
    {
        $keyword = $request->get('search');

        $dataWbtb = Wbtb::where('nama_wbtb', 'LIKE', "%$keyword%")
                          ->orWhere('deskripsi_wbtb', 'LIKE', "%$keyword%")->latest()->get();

        return view('mobile.wbtb.list', compact('dataWbtb'));
    }

    public function pengajuan()
    {
        $dataWbtb = Wbtb::where('user_id', auth()->user()->id)->get();
        return view('mobile.wbtb.pengajuan', compact('dataWbtb'));
    }

    public function create()
    {
        $kabkots = Kabkot::latest()->get();
        $kecamatans = Kecamatan::latest()->get();
        $kelurahans = Kelurahan::latest()->get();
        $kategoris = Kategori::latest()->get();
        $kondisis = Kondisi::latest()->get();
        return view('mobile.wbtb.tambah_wbtb', compact([
            'kabkots',
            'kecamatans',
            'kelurahans',
            'kategoris',
            'kondisis',
        ]));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_wbtb',
            'nama_lokasi',
            'kabkot',
            'kategori',
            'kondisi',
            'deskripsi_wbtb',
            'galeri' => 'required|array|min:1',
        ]);

        $kategoriIds = Kategori::whereIn('slug', $request->kategori)->pluck('id');
        $kondisi = Kondisi::where('slug', $request->kondisi)->firstOrFail();

        if (Wbtb::where('slug', Str::slug($request->nama_wbtb))->exists()) {
            return back()->withErrors(['tambahwbtb' => 'WBTB sudah ada'])->withToastError('WBTB sudah ada')->withInput($request->all());
        }

        $wbtb = new Wbtb();
        $wbtb->user_id = auth()->user()->id;
        $wbtb->nama_wbtb = $request->nama_wbtb;
        $wbtb->slug = Str::slug($request->nama_wbtb);
        $wbtb->deskripsi_wbtb = $request->deskripsi_wbtb;
        $wbtb->kondisi_id = $kondisi->id;
        $wbtb->save();
        
        $wbtb->kategoris()->sync($kategoriIds);


        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                // Simpan file ke dalam storage dan dapatkan URL publik
                $path = $file->store('public/galeri'); // Menyimpan file di storage/app/public/galeri
                $publicUrl = Storage::url($path); // URL publik untuk akses file
                $fullUrl = url($publicUrl); // URL lengkap

                // Simpan informasi ke dalam database
                $galeri = new Galeri();
                $galeri->wbtb_id = $wbtb->id;
                $galeri->hash_name = basename($path); // Nama file yang tersimpan
                $galeri->url_image = $publicUrl;
                $galeri->full_url_image = $fullUrl; // Menyimpan URL lengkap
                $galeri->original_name = $file->getClientOriginalName();
                $galeri->description_image = $request->description_image;
                $galeri->save();
            }
        }

        $kabkot = Kabkot::where('slug', $request->kabkot)->firstOrFail();
        $kecamatan = Kecamatan::where('slug', $request->kecamatan)->first() ?? null;
        $kelurahan = Kelurahan::where('slug', $request->kelurahan)->first() ?? null;

        $lokasi = new Lokasi();
        $lokasi->wbtb_id = $wbtb->id;
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->slug = Str::slug($request->nama_lokasi);
        $lokasi->kabkot_id = $kabkot->id;
        $lokasi->kecamatan_id = $kecamatan->id ?? null;
        $lokasi->kelurahan_id = $kelurahan->id ?? null;
        $lokasi->save();

        return redirect()->route('mobile.wbtb.pengajuan')->withToastSuccess('WBTB Diajukan');
    }

    public function show($slug)
    {
        $wbtb = Wbtb::where('slug', $slug)->firstOrFail();
        return view('mobile.wbtb.detail', compact('wbtb'));
    }

    public function destroy($slug)
    {
        // $wbtb = Wbtb::where('slug', $slug)->firstOrFail();
        // $galeris = Galeri::where('wbtb_id', $wbtb->id)->get();
        // foreach ($galeris as $galeri) {
        //     Storage::delete('public/galeri/' . $galeri->hash_name);
        //     $galeri->delete();
        // }
        // $wbtb->delete();
        $wbtb = Wbtb::where('slug', $slug)->firstOrFail();
        // Ambil semua data galeri yang terkait dengan $wbtb sebelum menghapusnya
        $galeriItems = $wbtb->galeries;

        // Hapus setiap file gambar yang terkait dengan $wbtb dari storage
        foreach ($galeriItems as $galeri) {
            if ($galeri->url_image) {
                // Menghapus file dari storage
                Storage::delete(str_replace('/storage', 'public', $galeri->url_image));
            }
        }
        $wbtb->delete();
        return back()->withToastSuccess('WBTB Terhapus');
    }
}
