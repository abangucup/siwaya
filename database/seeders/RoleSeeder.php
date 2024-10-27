<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'role_name' => 'Operator Provinsi', //1
                'role_level' => 'operator_provinsi',
                'role_description' => 'Melakukan penginputan dan pengecekan data pada warisan dari kabupaten kota'
            ],
            [
                'role_name' => 'Verifikator Provinsi', //2
                'role_level' => 'verifikator_provinsi',
                'role_description' => 'Melakukan verifikasi terhadap warisan yang telah diperiksa'
            ],
            [
                'role_name' => 'Operator Kabupaten / Kota', //3
                'role_level' => 'operator_kabkot',
                'role_description' => 'Melakukan penginputan dan pengecekan data pada warisan'
            ],
            [
                'role_name' => 'Verifikator Kabupaten / Kota', //4
                'role_level' => 'verifikator_kabkot',
                'role_description' => 'Melakukan verifikasi terhadap warisan yang telah diperiksa'
            ],
            [
                'role_name' => 'Masyarakat', //5
                'role_level' => 'masyarakat',
                'role_description' => 'Melakukan penginputan dan melihat warisan'
            ],
            
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
