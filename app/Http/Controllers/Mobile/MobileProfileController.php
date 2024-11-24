<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\PenetapanWbtb;
use App\Models\User;
use App\Models\VerifikasiWbtb;
use App\Models\Wbtb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MobileProfileController extends Controller
{
    public function index()
    {
        $penetapanTerakhir = PenetapanWbtb::latest()->first();
        $verifikasiTerakhir = VerifikasiWbtb::latest()->first();
        $pengajuanTerbaru = Wbtb::where('status', 'diajukan')->latest()->first();

        $menungguVerifikasi = Wbtb::where('status', 'diajukan')->count();
        $menungguPenetapan = Wbtb::where('status', 'diverifikasi')->count();

        $telahDiverifikasi = VerifikasiWbtb::count();
        $telahDitetapkan = PenetapanWbtb::count();

        return view('mobile.profile.index', compact([
            'penetapanTerakhir',
            'verifikasiTerakhir',
            'pengajuanTerbaru',
            'menungguVerifikasi',
            'menungguPenetapan',
            'telahDiverifikasi',
            'telahDitetapkan',
        ]));
    }

    public function show($slug)
    {
        $biodata = Biodata::with('user')->where('slug', $slug)->firstOrFail();
        return view('mobile.profile.show', compact('biodata'));
    }

    public function edit($slug)
    {
        $biodata = Biodata::where('slug', $slug)->with('user', function ($user) {
            $user->where('id', auth()->user()->id);
        })->first();

        return view('mobile.profile.update', compact('biodata'));
    }

    public function update(Request $request, $slug)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            // 'whatsapp' => 'required|string|max:20|regex:/^08\d{10,13}$/',
            'whatsapp' => 'required',
            'nomor_telepon' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required|unique:users,username,' . auth()->user()->id,
            'email' => 'required|unique:users,email,' . auth()->user()->id
        ]);

        if ($validasi->fails()) {
            // dd($validasi->errors());
            return redirect()->back()->withErrors($validasi)->withToastError('Kesalahan Inputan')->withInput();
        }

        $biodata = Biodata::where('slug', $slug)->firstOrFail();
        $user = $biodata->user;
        // dd($user);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        $biodata->update([
            'nama_lengkap' => $request->nama,
            'slug' => Str::slug($request->nama),
            'whatsapp' => $request->whatsapp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir ?? '',
            'alamat' => $request->alamat ?? '',
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        if ($request->hasFile('foto')) {

            // Menghapus file dari storage
            Storage::delete(str_replace('/storage', 'public', $biodata->foto));

            foreach ($request->file('foto') as $file) {
                // Simpan file ke dalam storage dan dapatkan URL publik
                $path = $file->store('public/foto'); // Menyimpan file di storage/app/public/foto
                $publicUrl = Storage::url($path); // URL publik untuk akses file

                // Simpan informasi ke dalam database
                $biodata->update([
                    'foto' => $publicUrl,
                ]);
            }
        }

        // Logout Dahulu
        Auth::logout();

        // Login Kembali
        Auth::login($user);

        return redirect()->route('mobile.profile.index')->withToastSuccess('Berhasil Ubah Biodata');
    }
}
