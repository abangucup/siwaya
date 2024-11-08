<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'operatorprov',
                'slug' => 'operatorprov',
                'email' => 'operatorprov@siwaya.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'biodata_id' => 1
            ],
            [
                'username' => 'verifikatorprov',
                'slug' => 'verifikatorprov',
                'email' => 'verifikatorprov@siwaya.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'biodata_id' => 2
            ],
            [
                'username' => 'operatorkabkot',
                'slug' => 'operatorkabkot',
                'email' => 'operatorkabkot@siwaya.com',
                'password' => Hash::make('password'),
                'role_id' => 3,
                'biodata_id' => 3
            ],
            [
                'username' => 'verifikatorkabkot',
                'slug' => 'verifikatorkabkot',
                'email' => 'verifikatorkabkot@siwaya.com',
                'password' => Hash::make('password'),
                'role_id' => 4,
                'biodata_id' => 4
            ],
            [
                'username' => 'masyarakat',
                'slug' => 'masyarakat',
                'email' => 'masyarakat@siwaya.com',
                'password' => Hash::make('password'),
                'role_id' => 5,
                'biodata_id' => 5
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
