<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bikesCategory = Category::where('slug', 'bikes')->first();
        $bikesCategoryId = $bikesCategory ? $bikesCategory->id : null;

        $apparelCategory = Category::where('slug', 'apparel')->first();
        $apparelCategoryId = $apparelCategory ? $apparelCategory->id : null;

        $componentsCategory = Category::where('slug', 'components')->first();
        $componentsCategoryId = $componentsCategory ? $componentsCategory->id : null;

        $products = [
            // ================= 1. ROAD BIKES EXAMPLE =================
            [
                'slug' => 'rdn-carbon-aero-stealth',
                'name' => 'RDN Carbon Aero Stealth Pro',
                'category_id' => $bikesCategoryId,
                'subcategory' => 'Road Bikes',
                'price' => 42500000,
                'allow_frame_only' => true,
                'frame_only_price' => 18500000,
                'description' => 'Sepeda balap aero kelas kompetisi dengan efisiensi aerodinamika maksimal untuk kecepatan tinggi di lintasan datar.',
                'image' => '/images/hero_road_bike.png',
                'specs' => [
                    'Frame' => 'Torayca T1100 Carbon, Aero Optimized, Internal Routing',
                    'Fork' => 'RDN Carbon Aero Integrated',
                    'Groupset' => 'Shimano Ultegra Di2 R8170 12-Speed Electronic',
                    'Wheelset' => 'RDN Carbon Profile 50mm Tubeless Ready',
                    'Tires' => 'Continental Grand Prix 5000 S TR 700x28c',
                    'Cockpit' => 'RDN Integrated Carbon Barstem',
                    'Saddle' => 'Fizik Antares Versus EVO R3',
                    'Weight' => '7.2 kg'
                ],
                'features' => [
                    'Desain Aero Terintegrasi (Kabel Tersembunyi)',
                    'Sistem Pemindah Gigi Elektronik Shimano Di2',
                    'Frame Karbon Seri Torayca T1100 High-Modulus',
                    'Ban Kelas Balap Continental GP 5000'
                ],
                'stocks' => [
                    ['size' => 'S', 'color' => 'Hitam Stealth', 'qty' => 2],
                    ['size' => 'M', 'color' => 'Hitam Stealth', 'qty' => 3],
                ]
            ],

            // ================= 2. GRAVEL BIKES EXAMPLE =================
            [
                'slug' => 'rdn-pathfinder-carbon',
                'name' => 'RDN Pathfinder Carbon Adventure',
                'category_id' => $bikesCategoryId,
                'subcategory' => 'Gravel Bikes',
                'price' => 28500000,
                'allow_frame_only' => true,
                'frame_only_price' => 12500000,
                'description' => 'Sepeda gravel serba bisa yang dirancang untuk kenyamanan berkendara jarak jauh di medan aspal maupun off-road ringan.',
                'image' => '/images/category_gravel.png',
                'specs' => [
                    'Frame' => 'Torayca T800 Carbon, Gravel Geometry, Flat Mount Disc',
                    'Fork' => 'RDN Carbon Gravel Fork',
                    'Groupset' => 'Shimano GRX RX820 1x12-Speed',
                    'Wheelset' => 'RDN Alloy Gravel Disc Tubeless Ready',
                    'Tires' => 'Panaracer GravelKing EXT 700x38c',
                    'Cockpit' => 'RDN Flare Alloy Handlebar',
                    'Saddle' => 'Selle Royal Asphalt',
                    'Weight' => '8.9 kg'
                ],
                'features' => [
                    'Frame Karbon Torayca T800 yang Tangguh',
                    'Groupset Khusus Gravel Shimano GRX 12-Speed',
                    'Tire Clearance Lebar hingga 42mm',
                    'Stang Flare Alloy untuk Handling yang Stabil'
                ],
                'stocks' => [
                    ['size' => 'M', 'color' => 'Desert Sand', 'qty' => 4],
                    ['size' => 'L', 'color' => 'Desert Sand', 'qty' => 4],
                ]
            ],

            // ================= 3. APPAREL - JERSEYS EXAMPLE =================
            [
                'slug' => 'rdn-streamline-azure',
                'name' => 'RDN Streamline Azure Jersey',
                'category_id' => $apparelCategoryId,
                'subcategory' => 'Cycling Jerseys',
                'price' => 580000,
                'allow_frame_only' => false,
                'frame_only_price' => null,
                'description' => 'Jersey premium dengan sirkulasi udara maksimal berkat teknologi rajutan Dry-mesh mikro. Didesain aero-fit mengikuti kontur tubuh untuk performa balapan optimal.',
                'image' => '/images/category_jerseys.png',
                'specs' => [
                    'Material' => '85% Polyester, 15% Elastane Dry-Mesh',
                    'Zipper' => 'Full length YKK Lock Zipper',
                    'Pockets' => '3 Reinforced rear pockets with reflective tab',
                    'Fit' => 'Race Fit / Aero Fit Compression',
                    'Features' => 'UPF 50+ Sun Protection, Quick Dry moisture management'
                ],
                'features' => [
                    'Teknologi Dry-Mesh Mengeringkan Keringat dengan Instan',
                    'Pemotongan Laser-Cut di Bagian Lengan Terasa Mulus',
                    'Resleting Utama YKK dengan Fitur Lock',
                    'Kantong Belakang Dilengkapi Strip Reflektif untuk Keamanan Malam Hari'
                ],
                'stocks' => [
                    ['size' => 'S', 'color' => 'Azure Blue', 'qty' => 10],
                    ['size' => 'M', 'color' => 'Azure Blue', 'qty' => 15],
                ]
            ],

            // ================= 4. APPAREL - BIB SHORTS EXAMPLE =================
            [
                'slug' => 'rdn-pro-elite-bib-shorts',
                'name' => 'RDN Pro Elite Bib Shorts',
                'category_id' => $apparelCategoryId,
                'subcategory' => 'Bib Shorts',
                'price' => 989000,
                'allow_frame_only' => false,
                'frame_only_price' => null,
                'description' => 'Padding gel Italia multi-layer (densitas 120), bahan kompresi otot premium anti-lelah, laser cut leg gripper.',
                'image' => '/images/hero_cyclists.png',
                'specs' => [
                    'Material' => 'Elastic Lycra, Ergonomic Chamois Padding',
                    'Fit' => 'Compression Fit',
                    'Features' => 'Muscle support, Italian gel pad'
                ],
                'features' => [
                    'Padding Gel Densitas Tinggi Buatan Italia',
                    'Bahan Kompresi Mengurangi Lelah Otot',
                    'Strap Mesh Bernapas Nyaman di Bahu',
                    'Leg Gripper Laser Cut Mencegah Melorot'
                ],
                'stocks' => [
                    ['size' => 'L', 'color' => 'Solid Black', 'qty' => 0], // Out of Stock
                ]
            ],

            // ================= 5. APPAREL - VESTS EXAMPLE =================
            [
                'slug' => 'rdn-windbreaker-aero-vest',
                'name' => 'RDN Windbreaker Aero Vest',
                'category_id' => $apparelCategoryId,
                'subcategory' => 'Vests & Outerwear',
                'price' => 649000,
                'allow_frame_only' => false,
                'frame_only_price' => null,
                'description' => 'Bahan depan penahan angin dingin (windproof), bagian punggung panel jala rajut tipis pelepas panas tubuh.',
                'image' => '/images/category_jerseys.png',
                'specs' => [
                    'Material' => 'Windproof Front Membrane, Mesh Back Panel',
                    'Fit' => 'Aero Gilet Fit',
                    'Features' => 'Packable, Windproof, Lightweight'
                ],
                'features' => [
                    'Membran Depan Tahan Angin Dingin',
                    'Bahan Jaring di Punggung untuk Sirkulasi Panas',
                    'Sangat Ringan dan Mudah Dilipat Masuk Saku Jersey',
                    'Resleting YKK Dua Arah untuk Kemudahan Akses'
                ],
                'stocks' => [
                    ['size' => 'M', 'color' => 'Translucent Grey', 'qty' => 12],
                ]
            ],

            // ================= 6. APPAREL - ACCESSORIES EXAMPLE =================
            [
                'slug' => 'rdn-aero-performance-socks',
                'name' => 'RDN Aero Performance Socks',
                'category_id' => $apparelCategoryId,
                'subcategory' => 'Socks & Accessories',
                'price' => 189000,
                'allow_frame_only' => false,
                'frame_only_price' => null,
                'description' => 'Bahan berusuk vertikal aerodinamis khusus di betis goweser, perekat silikon internal mencegah melorot.',
                'image' => '/images/category_jerseys.png',
                'specs' => [
                    'Material' => 'Nylon Ribbed Top, Cotton Padded Footbed',
                    'Fit' => 'Aero Ribbed Fit',
                    'Features' => 'Aero vertical ribs, silicone band grip'
                ],
                'features' => [
                    'Struktur Ribbed Vertikal Mengurangi Hambatan Angin',
                    'Perekat Silikon Internal Menjaga Kaus Kaki Tetap Tegak',
                    'Sol Bawah Empuk Nyaman Mengurangi Panas di Telapak Kaki',
                    'Bahan Cepat Kering Menghindari Jamur dan Bau'
                ],
                'stocks' => [
                    ['size' => 'M', 'color' => 'Pure White', 'qty' => 3], // Low Stock Warning
                ]
            ],

            // ================= 7. COMPONENTS EXAMPLE =================
            [
                'slug' => 'shimano-dura-ace-di2-groupset',
                'name' => 'Shimano Dura-Ace Di2 R9270 Groupset',
                'category_id' => $componentsCategoryId,
                'subcategory' => 'Groupsets',
                'price' => 58500000,
                'allow_frame_only' => false,
                'frame_only_price' => null,
                'description' => 'Sistem transmisi elektronik nirkabel 12-speed kasta tertinggi dari Shimano untuk kecepatan perpindahan gigi puncak dan performa pengereman hidrolik optimal.',
                'image' => '/images/hero_road_bike.png',
                'specs' => [
                    'Brand' => 'Shimano',
                    'Drivetrain Speed' => '2x12-Speed Electronic Wireless Shifting',
                    'Weight' => '2,438 grams (full group weight)',
                    'Material' => 'Titanium, Carbon Fiber, and Alloy Composites',
                    'Brake Type' => 'Hydraulic Disc Brake with Servo Wave Action'
                ],
                'features' => [
                    'Perpindahan gigi belakang 58% lebih cepat dibanding generasi sebelumnya',
                    'Konektivitas nirkabel penuh (Wireless Shifting) di area kokpit',
                    'Piston kaliper rem dengan celah 10% lebih lebar mengurangi gesekan rotor',
                    'Daya tahan baterai andal hingga 1000 kilometer dalam satu pengisian'
                ],
                'stocks' => [
                    ['size' => 'Standard', 'color' => 'Black Chrome', 'qty' => 2], // Low Stock Warning
                ]
            ]
        ];

        foreach ($products as $productData) {
            $stocks = $productData['stocks'] ?? [];
            unset($productData['stocks']);

            $product = Product::updateOrCreate(
                ['slug' => $productData['slug']],
                $productData
            );

            // Re-seed stocks
            $product->stocks()->delete();
            foreach ($stocks as $stockData) {
                $product->stocks()->create($stockData);
            }
        }
    }
}
