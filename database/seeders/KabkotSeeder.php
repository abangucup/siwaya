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
                'nama_kabkot' => 'Kota Gorontalo',
                'slug' => Str::slug('Kota Gorontalo')
            ]
        ];

        foreach ($kabkots as $kabkot) {
            Kabkot::create($kabkot);
        }
    }
}
