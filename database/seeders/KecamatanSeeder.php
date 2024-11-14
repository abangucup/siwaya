<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatans = [
            ['nama_kecamatan' => 'Dumbo Raya', 'slug' => Str::slug('Dumbo Raya')],
            ['nama_kecamatan' => 'Dungingi', 'slug' => Str::slug('Dungingi')],
            ['nama_kecamatan' => 'Hulonthalangi', 'slug' => Str::slug('Hulonthalangi')],
            ['nama_kecamatan' => 'Sipatana', 'slug' => Str::slug('Sipatana')],
            ['nama_kecamatan' => 'Anggrek', 'slug' => Str::slug('Anggrek')],
            ['nama_kecamatan' => 'Batudaa', 'slug' => Str::slug('Batudaa')],
            ['nama_kecamatan' => 'Batudaa Pantai', 'slug' => Str::slug('Batudaa Pantai')],
            ['nama_kecamatan' => 'Bilato', 'slug' => Str::slug('Bilato')],
            ['nama_kecamatan' => 'Bunulanta', 'slug' => Str::slug('Bunulanta')],
            ['nama_kecamatan' => 'Dulupi', 'slug' => Str::slug('Dulupi')],
            ['nama_kecamatan' => 'Kabila', 'slug' => Str::slug('Kabila')],
            ['nama_kecamatan' => 'Kota Barat', 'slug' => Str::slug('Kota Barat')],
            ['nama_kecamatan' => 'Kota Selatan', 'slug' => Str::slug('Kota Selatan')],
            ['nama_kecamatan' => 'Kota Tengah', 'slug' => Str::slug('Kota Tengah')],
            ['nama_kecamatan' => 'Kota Timur', 'slug' => Str::slug('Kota Timur')],
            ['nama_kecamatan' => 'Kota Utara', 'slug' => Str::slug('Kota Utara')],
            ['nama_kecamatan' => 'Pohuwato', 'slug' => Str::slug('Pohuwato')],
            ['nama_kecamatan' => 'Pulubala', 'slug' => Str::slug('Pulubala')],
            ['nama_kecamatan' => 'Tabongo', 'slug' => Str::slug('Tabongo')],
            ['nama_kecamatan' => 'Tapa', 'slug' => Str::slug('Tapa')],
            ['nama_kecamatan' => 'Tibawa', 'slug' => Str::slug('Tibawa')],
            ['nama_kecamatan' => 'Tilongkabila', 'slug' => Str::slug('Tilongkabila')],
            ['nama_kecamatan' => 'Tolinggula', 'slug' => Str::slug('Tolinggula')],
            ['nama_kecamatan' => 'Tumbihe', 'slug' => Str::slug('Tumbihe')],
            ['nama_kecamatan' => 'Tungoi', 'slug' => Str::slug('Tungoi')],
            ['nama_kecamatan' => 'Buntulia', 'slug' => Str::slug('Buntulia')],
            ['nama_kecamatan' => 'Dengilo', 'slug' => Str::slug('Dengilo')],
            ['nama_kecamatan' => 'Duhiadaa', 'slug' => Str::slug('Duhiadaa')],
            ['nama_kecamatan' => 'Lemito', 'slug' => Str::slug('Lemito')],
            ['nama_kecamatan' => 'Marisa', 'slug' => Str::slug('Marisa')],
            ['nama_kecamatan' => 'Paguat', 'slug' => Str::slug('Paguat')],
            ['nama_kecamatan' => 'Patilanggio', 'slug' => Str::slug('Patilanggio')],
            ['nama_kecamatan' => 'Popayato', 'slug' => Str::slug('Popayato')],
            ['nama_kecamatan' => 'Popayato Barat', 'slug' => Str::slug('Popayato Barat')],
            ['nama_kecamatan' => 'Popayato Timur', 'slug' => Str::slug('Popayato Timur')],
            ['nama_kecamatan' => 'Randangan', 'slug' => Str::slug('Randangan')],
            ['nama_kecamatan' => 'Taluditi', 'slug' => Str::slug('Taluditi')],
            ['nama_kecamatan' => 'Wanggarasi', 'slug' => Str::slug('Wanggarasi')],
            ['nama_kecamatan' => 'Boalemo', 'slug' => Str::slug('Boalemo')],
            ['nama_kecamatan' => 'Paguyaman', 'slug' => Str::slug('Paguyaman')],
            ['nama_kecamatan' => 'Paguyaman Pantai', 'slug' => Str::slug('Paguyaman Pantai')],
            ['nama_kecamatan' => 'Wonosari', 'slug' => Str::slug('Wonosari')],
            ['nama_kecamatan' => 'Atinggola', 'slug' => Str::slug('Atinggola')],
            ['nama_kecamatan' => 'Biau', 'slug' => Str::slug('Biau')],
            ['nama_kecamatan' => 'Bolangitang Barat', 'slug' => Str::slug('Bolangitang Barat')],
            ['nama_kecamatan' => 'Bolangitang Timur', 'slug' => Str::slug('Bolangitang Timur')],
            ['nama_kecamatan' => 'Monano', 'slug' => Str::slug('Monano')],
            ['nama_kecamatan' => 'Sumalata', 'slug' => Str::slug('Sumalata')],
            ['nama_kecamatan' => 'Sumalata Timur', 'slug' => Str::slug('Sumalata Timur')],
            ['nama_kecamatan' => 'Toli-Toli', 'slug' => Str::slug('Toli-Toli')],
            ['nama_kecamatan' => 'Botumoito', 'slug' => Str::slug('Botumoito')],
            ['nama_kecamatan' => 'Bulango Ulu', 'slug' => Str::slug('Bulango Ulu')],
            ['nama_kecamatan' => 'Bulango Selatan', 'slug' => Str::slug('Bulango Selatan')],
            ['nama_kecamatan' => 'Suwawa', 'slug' => Str::slug('Suwawa')],
            ['nama_kecamatan' => 'Suwawa Timur', 'slug' => Str::slug('Suwawa Timur')],
            ['nama_kecamatan' => 'Suwawa Selatan', 'slug' => Str::slug('Suwawa Selatan')],
            ['nama_kecamatan' => 'Kabila Bone', 'slug' => Str::slug('Kabila Bone')],
            ['nama_kecamatan' => 'Telaga', 'slug' => Str::slug('Telaga')],
            ['nama_kecamatan' => 'Telaga Biru', 'slug' => Str::slug('Telaga Biru')],
            ['nama_kecamatan' => 'Tolangohula', 'slug' => Str::slug('Tolangohula')]
        ];

        foreach ($kecamatans as $kecamatan) {
            Kecamatan::create($kecamatan);
        }
    }
}
