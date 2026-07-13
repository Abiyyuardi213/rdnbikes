<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get Role IDs
        $superAdminRole = Role::where('name', 'super-admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $customerRole = Role::where('name', 'customer')->first();

        if (!$superAdminRole || !$adminRole || !$customerRole) {
            return;
        }

        // 1. Seed Super Admin
        User::firstOrCreate(
            ['email' => 'superadmin@rdnbikes.com'],
            [
                'name' => 'Super Admin RDN',
                'password' => bcrypt('admin123'),
                'role_id' => $superAdminRole->id,
            ]
        );

        // 2. Seed Admin
        User::firstOrCreate(
            ['email' => 'admin@rdnbikes.com'],
            [
                'name' => 'Admin RDN Bikes',
                'password' => bcrypt('admin123'),
                'role_id' => $adminRole->id,
            ]
        );

        // 3. Seed Customer
        User::firstOrCreate(
            ['email' => 'customer@rdnbikes.com'],
            [
                'name' => 'Customer RDN',
                'password' => bcrypt('admin123'),
                'role_id' => $customerRole->id,
            ]
        );

        // 4. Seed 5 dummy customers for list testing
        $dummyCustomers = [
            ['name' => 'Abiyyu Ardilian', 'email' => 'abiyyu@rdnbikes.com'],
            ['name' => 'Budi Santoso', 'email' => 'budi@rdnbikes.com'],
            ['name' => 'Charlie Penjelajah', 'email' => 'charlie@rdnbikes.com'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi@rdnbikes.com'],
            ['name' => 'Eka Pratama', 'email' => 'eka@rdnbikes.com'],
        ];

        foreach ($dummyCustomers as $customer) {
            User::firstOrCreate(
                ['email' => $customer['email']],
                [
                    'name' => $customer['name'],
                    'password' => bcrypt('admin123'),
                    'role_id' => $customerRole->id,
                ]
            );
        }
    }
}
