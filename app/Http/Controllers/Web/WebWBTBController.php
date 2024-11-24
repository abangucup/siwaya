<?php

namespace App\Http\Controllers\Web;

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

class WebWBTBController extends Controller
{
    public function index()
    {
        $dataWbtb = Wbtb::with('sebarans', 'verifikasi', 'user')->latest()->get();
        return view('dashboard.wbtb.index', compact('dataWbtb'));
    }

    public function create()
    {
        $kabkots = Kabkot::latest()->get();
        $kategoris = Kategori::latest()->get();
        $kondisis = Kondisi::latest()->get();

        return view('dashboard.wbtb.create', compact([
            'kabkots',
            'kategoris',
            'kondisis',
        ]));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_wbtb',
            'kabkot',
            'kategori',
            'kondisi',
            'deskripsi_wbtb',
        ]);

        $kategoriIds = Kategori::whereIn('slug', $request->kategori)->pluck('id');
        $kondisi = Kondisi::where('slug', $request->kondisi)->firstOrFail();

        if (Wbtb::where('slug', Str::slug($request->nama_wbtb))->exists()) {
            return back()->withErrors(['tambahwbtb' => 'WBTB sudah ada'])->withToastError('WBTB sudah ada')->withInput($request->all());
        }

        $wbtb = new Wbtb();
        $wbtb->user_id = auth()->user()->id;
        $wbtb->kondisi_id = $kondisi->id;
        $wbtb->nama_wbtb = $request->nama_wbtb;
        $wbtb->slug = Str::slug($request->nama_wbtb);
        $wbtb->deskripsi_wbtb = $request->deskripsi_wbtb;
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

        $kabkotIds = Kabkot::whereIn('slug', $request->kabkot)->pluck('id');

        $wbtb->sebarans()->sync($kabkotIds);

        return redirect()->route('wbtb.index')->withToastSuccess('WBTB Tersimpan');
    }

    public function edit($slug)
    {
        $kabkots = Kabkot::all();
        $kondisis = Kondisi::all();
        $kategoris = Kategori::all();
        $wbtb = Wbtb::where('slug', $slug)->firstOrFail();
        return view('dashboard.wbtb.edit', compact('wbtb', 'kabkots', 'kategoris', 'kondisis'));
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'nama_wbtb',
            'kabkot',
            'kategori',
            'kondisi',
            'deskripsi_wbtb',
        ]);

        // $kategori = Kategori::where('slug', $request->kategori)->firstOrFail();
        $kategoriIds = Kategori::whereIn('slug', $request->kategori)->pluck('id');

        $kondisi = Kondisi::where('slug', $request->kondisi)->firstOrFail();

        if (Wbtb::where('slug', '!=', $slug)->where('slug', Str::slug($request->nama_wbtb))->exists()) {
            return back()->withErrors(['ubahWbtb' => 'WBTB sudah ada'])->withToastError('WBTB sudah ada')->withInput($request->all());
        }

        $wbtb = Wbtb::where('slug', $slug)->firstOrFail();

        $wbtb->update([
            'kondisi_id' => $kondisi->id,
            'nama_wbtb' => $request->nama_wbtb,
            'slug' => Str::slug($request->nama_wbtb),
            'deskripsi_wbtb' => $request->deskripsi_wbtb,
        ]);

        $wbtb->kategoris()->syncWithoutDetaching($kategoriIds);

        $kabkotIds = Kabkot::whereIn('slug', $request->kabkot)->pluck('id');

        $wbtb->sebarans()->syncWithoutDetaching($kabkotIds);
        //memperbaharui tanpa menghapus
        // $wbtb->sebarans()->atttach($kabkotIds);

        if ($request->hasFile('galeri')) {

            $galeriItems = $wbtb->galeries;
            // Hapus setiap file gambar yang terkait dengan $wbtb dari storage
            foreach ($galeriItems as $galeri) {
                if ($galeri->url_image) {
                    // Menghapus file dari storage
                    Storage::delete(str_replace('/storage', 'public', $galeri->url_image));
                }
                $galeri->delete();
            }

            // Simpan file baru
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

        return redirect()->route('wbtb.index')->withToastSuccess('WBTB Terupdate');
    }

    public function destroy($slug)
    {
        $wbtb = Wbtb::where('slug', $slug)->firstOrFail();
        if ($wbtb->verifikasi || $wbtb->penetapan) {
            return redirect()->back()->withToastError('WBTB sudah diverifikasi');
        }
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
