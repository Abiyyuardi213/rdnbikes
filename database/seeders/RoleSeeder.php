<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(
            ['name' => 'super-admin'],
            ['description' => 'Super Administrator dengan hak akses penuh ke seluruh modul sistem dan konfigurasi.']
        );

        Role::firstOrCreate(
            ['name' => 'admin'],
            ['description' => 'Administrator dengan hak akses operasional toko, katalog, dan pesanan custom.']
        );

        Role::firstOrCreate(
            ['name' => 'customer'],
            ['description' => 'Peran default untuk pembeli dan pengguna yang mendaftar melalui situs depan.']
        );
    }
}
