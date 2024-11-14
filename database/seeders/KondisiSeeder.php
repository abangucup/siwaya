<?php

namespace Database\Seeders;

use App\Models\Kondisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kondisis = [
            [
                'slug' => Str::slug('Sedang berkembang'),
                'nama_kondisi' => 'Sedang berkembang',
                'kode_kondisi' => '01'
            ],
            [
                'slug' => Str::slug('Masih bertahan'),
                'nama_kondisi' => 'Masih bertahan',
                'kode_kondisi' => '02'
            ],
            [
                'slug' => Str::slug('Sudah berkurang'),
                'nama_kondisi' => 'Sudah berkurang',
                'kode_kondisi' => '03'
            ],
            [
                'slug' => Str::slug('Terancam punah'),
                'nama_kondisi' => 'Terancam punah',
                'kode_kondisi' => '04'
            ],
            [
                'slug' => Str::slug('Sudah punah atau tidak berfungsi lagi dalam masyarakat'),
                'nama_kondisi' => 'Sudah punah atau tidak berfungsi lagi dalam masyarakat',
                'kode_kondisi' => '05'
            ]
        ];

        foreach ($kondisis as $kondisi) {
            Kondisi::create($kondisi);
        }
    }
}
