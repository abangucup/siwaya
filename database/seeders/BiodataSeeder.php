<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biodatas = [
            [
                'nama_lengkap' => 'Operator Provinsi Diki',
                'slug' => Str::slug('Operator Provinsi Diki'),
                'tanggal_lahir' => '2000-01-01',
                'alamat' => 'Jl. Jalan',
                'jenis_kelamin' => 'L',
                'nomor_telepon' => '087777777',
                'whatsapp' => '087777777',
            ],
            [
                'nama_lengkap' => 'Verifikator Provinsi Diki',
                'string' => Str::slug('Verifikator Provinsi Diki'),
                'tanggal_lahir' => '2000-01-01',
                'alamat' => 'Jl. Jalan',
                'jenis_kelamin' => 'L',
                'nomor_telepon' => '087777776',
                'whatsapp' => '087777776',
            ],
            [
                'nama_lengkap' => 'Operator Kabkot Diki',
                'slug' => Str::slug('Operator Kabkot Diki'),
                'tanggal_lahir' => '1999-01-01',
                'alamat' => 'Jl. Jalan',
                'jenis_kelamin' => 'L',
                'nomor_telepon' => '0888888888',
                'whatsapp' => '0888888888',
            ],
            [
                'nama_lengkap' => 'Verifikator Kabkot Diki',
                'slug' => Str::slug('Verifikator Kabkot Diki'),
                'tanggal_lahir' => '1999-01-01',
                'alamat' => 'Jl. Jalan',
                'jenis_kelamin' => 'L',
                'nomor_telepon' => '0888888887',
                'whatsapp' => '0888888887',
            ],
            
            [
                'nama_lengkap' => 'Masyarakat Diki',
                'slug' => Str::slug('Masyarakat Diki'),
                'tanggal_lahir' => '1999-01-01',
                'alamat' => 'Jl. Jalan',
                'jenis_kelamin' => 'L',
                'nomor_telepon' => '0888888889',
                'whatsapp' => '0888888889',
            ]
        ];

        foreach ($biodatas as $biodata) {
            Biodata::create($biodata);
        }
    }
}
