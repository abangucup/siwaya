<?php

namespace App\Exports;

use App\Models\Wbtb;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class LaporanPenolakanExport implements FromCollection, WithHeadings, WithDrawings
{
    private $rowIndex = 2; // Baris data dimulai dari baris ke-2 setelah heading

    public function collection()
    {
        return Wbtb::with([
            'kategoris',
            'penetapan',
            'verifikasi',
            'user',
            'kondisi',
            'sebarans'
        ])->where('status', 'ditolak')->get()
            ->map(function ($wbtb, $index) {
                return [
                    'No' => $index+1,
                    'Nomor WBTB' => $wbtb->nomor_wbtb,
                    'Nama WBTB' => $wbtb->nama_wbtb,
                    'Kategori' => $wbtb->kategoris()->pluck('nama_kategori')->implode(', '),
                    'Kondisi' => $wbtb->kondisi->nama_kondisi,
                    'Deskripsi' => $wbtb->deskripsi_wbtb,
                    'Status' => $wbtb->status,
                    'Sebaran' => $wbtb->sebarans()->pluck('nama_kabkot')->implode(', '),
                    'Instansi' => $wbtb->user->instansi?->nama_instansi ?? 'Masyarakat',
                    'Pembuat' => $wbtb->user->biodata->nama_lengkap,
                    'Status Verif' => $wbtb->verifikasi?->status_verifikasi,
                    'Keterangan Verif' => $wbtb->verifikasi?->keterangan,
                    'Tanggal Verif' => Carbon::parse($wbtb->verifikasi?->tanggal_verifikasi)->isoFormat('LL'),
                    'Status Penetapan' => $wbtb->penetapan?->status_penetapan,
                    'Keterangan Penetapan' => $wbtb->penetapan?->keterangan,
                    'Tanggal Penetapan' => Carbon::parse($wbtb->penetapan?->tanggal_penetapan)->isoFormat('LL'),
                    'Url Gambar' => $wbtb->galeries()?->pluck('full_url_image')->implode(', ')
                ];
            });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nomor WBTB',
            'Nama WBTB',
            'Kategori',
            'Kondisi',
            'Deskripsi',
            'Status',
            'Sebaran',
            'Instansi',
            'Pembuat',
            'Status Verif',
            'Keterangan Verif',
            'Tanggal Verif',
            'Status Penetapan',
            'Keterangan Penetapan',
            'Tanggal Penetapan',
            'Url Gambar',
            'Gambar',
        ];
    }

    public function drawings()
    {
        $drawings = [];
        $wbtbs = Wbtb::with('galeries')->where('status', 'ditolak')->get(); // Pastikan sama dengan data di `collection()`

        foreach ($wbtbs as $index => $wbtb) {
            $imageUrl = $wbtb->galeries()->first()?->full_url_image;

            if ($imageUrl) {
                $drawing = new Drawing();
                $drawing->setName('Gambar');
                $drawing->setDescription('Gambar WBTB');
                $drawing->setPath(public_path('' . parse_url($imageUrl, PHP_URL_PATH))); // Path ke file lokal
                $drawing->setHeight(50); // Ukuran gambar
                $drawing->setCoordinates('R' . ($index + $this->rowIndex)); // Kolom Gambar (Q)
                $drawings[] = $drawing;
            }
        }

        return $drawings;
    }
}
