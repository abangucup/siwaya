<?php

namespace Database\Seeders;

use App\Models\Kabkot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KabkotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kabkots = [
            [
                'nama_kabkot' => 'Kabupaten Boalemo',
                'slug' => Str::slug('Kabupaten Boalemo')
            ],
            [
                'nama_kabkot' => 'Kabupaten Bone Bolango',
                'slug' => Str::slug('Kabupaten Bone Bolango')
            ],
            [
                'nama_kabkot' => 'Kabupaten Gorontalo',
                'slug' => Str::slug('Kabupaten Gorontalo')
            ],
            [
                'nama_kabkot' => 'Kabupaten Gorontalo Utara',
                'slug' => Str::slug('Kabupaten Gorontalo Utara')
            ],
            [
                'nama_kabkot' => 'Kota Gorontalo',
                'slug' => Str::slug('Kota Gorontalo')
            ],
            [
                'nama_kabkot' => 'Kabupaten Pohuwato',
                'slug' => Str::slug('Kabupaten Pohuwato')
            ]
        ];

        foreach ($kabkots as $kabkot) {
            Kabkot::create($kabkot);
        }
    }
}
