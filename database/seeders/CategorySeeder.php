<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::updateOrCreate(
            ['slug' => 'bikes'],
            [
                'name' => 'Bikes',
                'description' => 'Lini produk sepeda balap premium (Road & Gravel) dengan frame karbon ringan dan performa balap tinggi.'
            ]
        );

        Category::updateOrCreate(
            ['slug' => 'apparel'],
            [
                'name' => 'Apparel',
                'description' => 'Pakaian bersepeda ergonomis berkinerja tinggi (Jerseys, Bib Shorts, Vests, Accessories) bertema premium.'
            ]
        );

        Category::updateOrCreate(
            ['slug' => 'components'],
            [
                'name' => 'Components',
                'description' => 'Komponen dan suku cadang sepeda kelas atas (Groupset, Wheelset, Cockpit, Saddle, dll) untuk meningkatkan performa bersepeda Anda.'
            ]
        );
    }
}
