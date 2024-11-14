<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            ['nama_kategori' => 'Adat Istiadat Masyarakat', 'slug' => Str::slug('Adat Istiadat Masyarakat')],
            ['nama_kategori' => 'Ritus', 'slug' => Str::slug('Ritus')],
            ['nama_kategori' => 'Perayaan-Perayaan', 'slug' => Str::slug('Perayaan-Perayaan')],
            ['nama_kategori' => 'Keterampilan dan Kemahiran Kerajinan Tradisional', 'slug' => Str::slug('Keterampilan dan Kemahiran Kerajinan Tradisional')],
            ['nama_kategori' => 'Tradisi dan Ekspresi Lisan', 'slug' => Str::slug('Tradisi dan Ekspresi Lisan')],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
