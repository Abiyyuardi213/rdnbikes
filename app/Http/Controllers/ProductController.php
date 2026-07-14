<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Get all products list.
     */
    private function getProducts()
    {
        return [
            // ==========================================
            // ROAD BIKES
            // ==========================================
            'rdn-carbon-aero-stealth' => [
                'slug' => 'rdn-carbon-aero-stealth',
                'name' => 'RDN Carbon Aero Stealth Pro',
                'category' => 'Bikes',
                'subcategory' => 'Road Bikes',
                'price' => 'Rp 42.500.000',
                'description' => 'Sepeda balap aero kelas kompetisi dengan efisiensi aerodinamika maksimal untuk kecepatan tinggi di lintasan datar.',
                'image' => '/images/hero_road_bike.png',
                'image_filter' => 'grayscale(100%) brightness(35%)',
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
                ]
            ],
            'rdn-climber-pro-sl' => [
                'slug' => 'rdn-climber-pro-sl',
                'name' => 'RDN Climber Pro Superlight',
                'category' => 'Bikes',
                'subcategory' => 'Road Bikes',
                'price' => 'Rp 45.000.000',
                'description' => 'Didesain khusus untuk penakluk tanjakan dengan bobot frame super ringan dan transfer daya kayuhan yang instan.',
                'image' => '/images/hero_road_bike.png',
                'image_filter' => 'hue-rotate(120deg) grayscale(30%) brightness(25%)',
                'specs' => [
                    'Frame' => 'Ultralight Torayca T1000 Carbon, Climb Optimized',
                    'Fork' => 'RDN Carbon Superlight Fork',
                    'Groupset' => 'SRAM Force AXS Gen 2 12-Speed Wireless',
                    'Wheelset' => 'RDN Carbon Profile 35mm Light-Weight',
                    'Tires' => 'Schwalbe Pro One TLE 700x25c',
                    'Cockpit' => 'RDN Superlight Carbon Handlebar & Stem',
                    'Saddle' => 'Selle Italia SLR Boost Carbonio',
                    'Weight' => '6.7 kg'
                ],
                'features' => [
                    'Bobot Ultra Ringan Hanya 6.7 kg',
                    'Groupset Nirkabel SRAM Force AXS',
                    'Geometri Khusus Tanjakan (Climb Optimized)',
                    'Sadel Rel Karbon Selle Italia SLR'
                ]
            ],
            'rdn-criterium-expert' => [
                'slug' => 'rdn-criterium-expert',
                'name' => 'RDN Criterium Expert Carbon',
                'category' => 'Bikes',
                'subcategory' => 'Road Bikes',
                'price' => 'Rp 29.500.000',
                'description' => 'Tangguh dan responsif untuk balapan sirkuit Criterium dengan akselerasi tajam di tikungan.',
                'image' => '/images/hero_road_bike.png',
                'image_filter' => 'hue-rotate(240deg) grayscale(30%) brightness(30%)',
                'specs' => [
                    'Frame' => 'Torayca T800 Carbon, Compact Geometry',
                    'Fork' => 'RDN Carbon Racing Fork',
                    'Groupset' => 'Shimano 105 Di2 R7170 12-Speed Electronic',
                    'Wheelset' => 'Shimano RS171 Disc Tubeless Ready',
                    'Tires' => 'Vittoria Corsa N.Ext 700x26c',
                    'Cockpit' => 'Easton EA70 Alloy Bar & Stem',
                    'Saddle' => 'Prologo Dimension Space',
                    'Weight' => '7.9 kg'
                ],
                'features' => [
                    'Geometri Compact Lincah Bermanuver',
                    'Shifting Presisi Shimano 105 Di2 12-Speed',
                    'Frame Karbon Torayca T800 Kuat & Kaku',
                    'Ban Vittoria Corsa Grip Maksimal di Tikungan'
                ]
            ],
            'rdn-chrono-tt-master' => [
                'slug' => 'rdn-chrono-tt-master',
                'name' => 'RDN Chrono TT Master',
                'category' => 'Bikes',
                'subcategory' => 'Road Bikes',
                'price' => 'Rp 64.000.000',
                'description' => 'Senjata pamungkas Time Trial dan Triathlon untuk memecahkan rekor waktu pribadi Anda.',
                'image' => '/images/hero_road_bike.png',
                'image_filter' => 'hue-rotate(300deg) grayscale(40%) brightness(20%)',
                'specs' => [
                    'Frame' => 'Torayca T1100 Carbon, TT Aero Specific',
                    'Fork' => 'RDN TT Integrated Carbon Fork',
                    'Groupset' => 'Shimano Dura-Ace Di2 R9270 with TT Shifters',
                    'Wheelset' => 'RDN Carbon Disc Rear Wheel + 80mm Front Wheel',
                    'Tires' => 'Continental GP 5000 TT TdF 700x25c',
                    'Cockpit' => 'RDN TT Carbon Integrated Aero Extensions',
                    'Saddle' => 'Selle Italia Watt Gel Superflow TT',
                    'Weight' => '8.5 kg'
                ],
                'features' => [
                    'Konfigurasi Roda Belakang Full Disc Carbon',
                    'Aerobar Kokpit Integrasi Serat Karbon',
                    'Sadel Khusus Time Trial / Triathlon',
                    'Groupset Flagship Shimano Dura-Ace Di2'
                ]
            ],

            // ==========================================
            // GRAVEL BIKES
            // ==========================================
            'rdn-pathfinder-carbon' => [
                'slug' => 'rdn-pathfinder-carbon',
                'name' => 'RDN Pathfinder Carbon Adventure',
                'category' => 'Bikes',
                'subcategory' => 'Gravel Bikes',
                'price' => 'Rp 28.500.000',
                'description' => 'Petualang segala medan dengan frame karbon tangguh yang meredam getaran jalanan kasar dengan maksimal.',
                'image' => '/images/category_gravel.png',
                'image_filter' => 'grayscale(90%) brightness(40%)',
                'specs' => [
                    'Frame' => 'Torayca T800 Gravel Carbon, Mud Clearance',
                    'Fork' => 'RDN Adventure Carbon Fork with Mounts',
                    'Groupset' => 'Shimano GRX RX820 1x12-Speed',
                    'Wheelset' => 'DT Swiss G1800 Spline Gravel',
                    'Tires' => 'Maxxis Rambler 700x40c Tubeless Ready',
                    'Cockpit' => 'Ritchey WCS VentureMax Flare Bar',
                    'Saddle' => 'WTB Silverado Medium Chromoly',
                    'Weight' => '8.9 kg'
                ],
                'features' => [
                    'Groupset Khusus Gravel Shimano GRX 1x12',
                    'Wheelset Handal DT Swiss Spline',
                    'Stang Lebar Ritchey Flare Bar Stabil',
                    'Frame Karbon Peredam Getaran Makadam'
                ]
            ],
            'rdn-trail-grinder-sl' => [
                'slug' => 'rdn-trail-grinder-sl',
                'name' => 'RDN Trail Grinder Superlight',
                'category' => 'Bikes',
                'subcategory' => 'Gravel Bikes',
                'price' => 'Rp 31.000.000',
                'description' => 'Agresif di jalan tanah, lincah di aspal. Gravel bike dengan keseimbangan bobot dan durabilitas.',
                'image' => '/images/category_gravel.png',
                'image_filter' => 'hue-rotate(60deg) grayscale(80%) brightness(30%)',
                'specs' => [
                    'Frame' => 'Torayca T900 Carbon, Aggressive Gravel Geometry',
                    'Fork' => 'RDN Carbon Gravel Disc Fork',
                    'Groupset' => 'SRAM Apex AXS XPLR 1x12-Speed Wireless',
                    'Wheelset' => 'RDN Gravel Carbon Profile 30mm',
                    'Tires' => 'Panaracer GravelKing SK 700x38c',
                    'Cockpit' => 'RDN Flare Carbon Integrated Handlebar',
                    'Saddle' => 'Fizik Terra Argo X5',
                    'Weight' => '8.3 kg'
                ],
                'features' => [
                    'Groupset Nirkabel SRAM Apex AXS',
                    'Velg Karbon RDN Carbon Gravel',
                    'Ban Serba Guna Panaracer GravelKing',
                    'Sadel Khusus Gravel Fizik Terra Argo'
                ]
            ],
            'rdn-expedition-pro' => [
                'slug' => 'rdn-expedition-pro',
                'name' => 'RDN Expedition Pro Bike-Packing',
                'category' => 'Bikes',
                'subcategory' => 'Gravel Bikes',
                'price' => 'Rp 24.500.000',
                'description' => 'Sahabat bikepacking sejati dengan puluhan eyelet dudukan tas, rak, mudguard, dan botol minum.',
                'image' => '/images/category_gravel.png',
                'image_filter' => 'hue-rotate(180deg) grayscale(60%) brightness(40%)',
                'specs' => [
                    'Frame' => 'Double Butted Chromoly Steel (Reynolds 725)',
                    'Fork' => 'Chromoly Steel Touring Fork with Mounts',
                    'Groupset' => 'Shimano GRX RX610 2x12-Speed Wide-Range',
                    'Wheelset' => 'Alexrims GD26 Double Wall Disc',
                    'Tires' => 'Teravail Rutland 700x42c Durable',
                    'Cockpit' => 'Salsa Cowchipper Handlebar & Alloy Stem',
                    'Saddle' => 'Brooks Cambium C17 All Weather',
                    'Weight' => '10.5 kg'
                ],
                'features' => [
                    'Frame Reynolds 725 Steel Sangat Nyaman',
                    'Eyelet Dudukan Tas & Rak Bikepacking',
                    'Sadel Legendaris Brooks Cambium',
                    'Drivetrain Rasio Lebar Shimano GRX 2x12'
                ]
            ],
            'rdn-cyclocross-racer' => [
                'slug' => 'rdn-cyclocross-racer',
                'name' => 'RDN Cyclocross Racer Pro',
                'category' => 'Bikes',
                'subcategory' => 'Gravel Bikes',
                'price' => 'Rp 32.500.000',
                'description' => 'Dibuat khusus untuk akselerasi instan di medan berlumpur dan lincah bermanuver di sirkuit cyclocross.',
                'image' => '/images/category_gravel.png',
                'image_filter' => 'hue-rotate(280deg) grayscale(70%) brightness(35%)',
                'specs' => [
                    'Frame' => 'Torayca T800 Carbon, CX Geometry, Flat Top Tube',
                    'Fork' => 'RDN Carbon CX Fork',
                    'Groupset' => 'SRAM Rival AXS 1x12-Speed Wireless',
                    'Wheelset' => 'Vision Team 30 Disc',
                    'Tires' => 'Challenge Grifo Pro 700x33c (UCI Compliant)',
                    'Cockpit' => 'Zipp Service Course Bar & Stem',
                    'Saddle' => 'Prologo Scratch M5',
                    'Weight' => '8.1 kg'
                ],
                'features' => [
                    'Desain Frame Mudah Dipikul (Flat Top)',
                    'Groupset Wireless SRAM Rival AXS',
                    'Ban UCI Compliant Challenge Grifo',
                    'Geometri Agresif Responsif Tinggi'
                ]
            ],

            // ==========================================
            // APPAREL - JERSEYS
            // ==========================================
            'rdn-streamline-azure' => [
                'slug' => 'rdn-streamline-azure',
                'name' => 'RDN Streamline Azure Cycling Jersey',
                'category' => 'Apparel',
                'subcategory' => 'Cycling Jerseys',
                'price' => 'Rp 580.000',
                'description' => 'Jersey balap aero premium dengan gradasi biru Azure yang memikat, menggunakan bahan super elastis yang mengoptimalkan aliran udara.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'grayscale(40%) brightness(95%)',
                'specs' => [
                    'Fabric' => '85% Polyester, 15% Spandex (Dry-Fit Technology)',
                    'Fit Type' => 'Aero Fit (Race Cut)',
                    'Weight' => '110 grams (Size M)',
                    'Zipper' => 'YKK Full Length Auto-Lock',
                    'Pockets' => '3 Rear Pockets with reflective piping',
                    'Gripper' => 'Laser-cut sleeve cuffs with internal silicone grip',
                    'Temperature' => '18°C - 35°C'
                ],
                'features' => [
                    'Serat Kain Bernapas (Breathable Mesh)',
                    'Bahan Elastis 4 Arah Mengikuti Tubuh',
                    'Resleting YKK Orisinil Sangat Halus',
                    'Pita Reflektif untuk Keamanan Malam Hari'
                ]
            ],
            'rdn-streamline-rouge' => [
                'slug' => 'rdn-streamline-rouge',
                'name' => 'RDN Streamline Rouge Cycling Jersey',
                'category' => 'Apparel',
                'subcategory' => 'Cycling Jerseys',
                'price' => 'Rp 580.000',
                'description' => 'Tampil agresif dengan gradasi merah membara. Dibuat dengan panel samping jala bersirkulasi udara tinggi.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'hue-rotate(120deg) saturate(120%) brightness(80%)',
                'specs' => [
                    'Fabric' => '85% Polyester, 15% Spandex (Dry-Fit Technology)',
                    'Fit Type' => 'Aero Fit (Race Cut)',
                    'Weight' => '110 grams (Size M)',
                    'Zipper' => 'YKK Full Length Auto-Lock',
                    'Pockets' => '3 Rear Pockets with reflective piping',
                    'Gripper' => 'Laser-cut sleeve cuffs with internal silicone grip',
                    'Temperature' => '18°C - 35°C'
                ],
                'features' => [
                    'Panel Jala Samping Pendingin Instan',
                    'Warna Merah Gradasi Menawan',
                    'Kantong Belakang Luas & Kokoh',
                    'Perekat Silikon Mencegah Jersey Terangkat'
                ]
            ],
            'rdn-aero-race-pro-emerald' => [
                'slug' => 'rdn-aero-race-pro-emerald',
                'name' => 'RDN Aero Race Pro Emerald',
                'category' => 'Apparel',
                'subcategory' => 'Cycling Jerseys',
                'price' => 'Rp 620.000',
                'description' => 'Warna hijau Emerald premium eksklusif untuk pebalap jalan raya sejati. Sangat pas di badan tanpa kerutan untuk meredam gesekan udara.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'hue-rotate(240deg) saturate(110%) brightness(75%)',
                'specs' => [
                    'Fabric' => 'Italian MITI fabric on front, high-ventilated mesh on back',
                    'Fit Type' => 'Pro Fit (Aggressive Cut)',
                    'Weight' => '98 grams (Ultra-lightweight)',
                    'Zipper' => 'YKK Camlock Zipper',
                    'Pockets' => '3 Standard pockets + 1 waterproof zip pocket',
                    'Gripper' => 'Extended sleeves with seamless bonding',
                    'Temperature' => '22°C - 38°C'
                ],
                'features' => [
                    'Bahan Premium Impor Italia MITI',
                    'Saku Tambahan Dengan Resleting Tahan Air',
                    'Jahitan Seamless (Tanpa Benang Menjolok)',
                    'Sangat Ringan Hanya 98 gram'
                ]
            ],
            'rdn-classic-training-midnight-black' => [
                'slug' => 'rdn-classic-training-midnight-black',
                'name' => 'RDN Classic Training Midnight Black',
                'category' => 'Apparel',
                'subcategory' => 'Cycling Jerseys',
                'price' => 'Rp 490.000',
                'description' => 'Jersey harian warna hitam pekat klasik yang nyaman digunakan berjam-jam untuk rute latihan.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'grayscale(100%) brightness(30%)',
                'specs' => [
                    'Fabric' => '100% Breathable Polyester Dry-Fit',
                    'Fit Type' => 'Regular Fit (Club Cut)',
                    'Weight' => '125 grams',
                    'Zipper' => 'SBS Full Length',
                    'Pockets' => '3 Rear pockets',
                    'Gripper' => 'Elastic waist gripper',
                    'Temperature' => '15°C - 30°C'
                ],
                'features' => [
                    'Tipe Potongan Regular Nyaman (Tidak Ketat)',
                    'Warna Hitam Pekat Elegan & Garang',
                    'Bahan Awet Tahan Cuci Berulang Kali',
                    'Ideal untuk Gowes Santai Akhir Pekan'
                ]
            ],

            // ==========================================
            // APPAREL - BIB SHORTS
            // ==========================================
            'rdn-pro-elite-bib-shorts' => [
                'slug' => 'rdn-pro-elite-bib-shorts',
                'name' => 'RDN Pro Elite Ergonomic Chamois Bib Shorts',
                'category' => 'Apparel',
                'subcategory' => 'Bib Shorts',
                'price' => 'Rp 989.000',
                'description' => 'Celana bib balap dengan pad gel multi-densitas buatan Italia untuk kenyamanan berkendara di atas sadel lebih dari 5 jam.',
                'image' => '/images/hero_cyclists.png',
                'image_filter' => 'grayscale(100%) brightness(30%)',
                'specs' => [
                    'Chamois Pad' => 'Elastic Interface® Italian multi-density gel pad (120 density)',
                    'Material' => 'Lycra compression fabric (78% Polyamide, 22% Elastane)',
                    'Straps' => 'High elasticity seamless elastic braces',
                    'Leg Gripper' => '7cm Italian silicone powerband',
                    'Features' => 'Flatlock stitching to prevent chafing, reflective logos'
                ],
                'features' => [
                    'Padding Premium Elastic Interface Italia',
                    'Kompresi Otot Mengurangi Asam Laktat',
                    'Tali Bahu Seamless Sangat Lembut',
                    'Jahitan Flatlock Menghindari Gesekan Kulit'
                ]
            ],
            'rdn-endurance-cargo-bib-shorts' => [
                'slug' => 'rdn-endurance-cargo-bib-shorts',
                'name' => 'RDN Endurance Cargo Bib Shorts',
                'category' => 'Apparel',
                'subcategory' => 'Bib Shorts',
                'price' => 'Rp 1.149.000',
                'description' => 'Bib shorts khusus gravel/touring yang dilengkapi saku jala di bagian samping untuk menyimpan energi bar dan HP.',
                'image' => '/images/hero_cyclists.png',
                'image_filter' => 'hue-rotate(60deg) grayscale(80%) brightness(40%)',
                'specs' => [
                    'Chamois Pad' => 'RDN Endurance High Density Foam Pad (14mm thickness)',
                    'Material' => 'Heavy-duty Lycra (75% Polyamide, 25% Spandex)',
                    'Straps' => 'Lightweight mesh back panel for maximum ventilation',
                    'Pockets' => '2 side mesh pockets + 2 rear mesh pockets on waistband',
                    'Leg Gripper' => 'Silicone microdots print',
                    'Features' => 'Cargo storage, UPF 50+ protection'
                ],
                'features' => [
                    'Dua Kantong Jala Samping (Cargo Pockets)',
                    'Padding Foam Tebal untuk Rute Kasar Gravel',
                    'Bahan Tebal Tahan Robekan Ranting/Kerikil',
                    'Panel Punggung Jala Sirkulasi Angin Lancar'
                ]
            ],
            'rdn-classic-training-bib-shorts' => [
                'slug' => 'rdn-classic-training-bib-shorts',
                'name' => 'RDN Classic Training Cycling Bib Shorts Black',
                'category' => 'Apparel',
                'subcategory' => 'Bib Shorts',
                'price' => 'Rp 849.000',
                'description' => 'Celana bib harian yang awet dan kokoh untuk latihan endurance rutin mingguan.',
                'image' => '/images/hero_cyclists.png',
                'image_filter' => 'hue-rotate(180deg) grayscale(80%) brightness(30%)',
                'specs' => [
                    'Chamois Pad' => 'RDN Classic anatomical gel pad',
                    'Material' => '80% Nylon, 20% Spandex',
                    'Straps' => 'Standard elastic strap',
                    'Leg Gripper' => 'Elastic fold-over band',
                    'Features' => 'Basic compression, quick-dry fabric'
                ],
                'features' => [
                    'Bahan Elastis Cepat Kering',
                    'Pad Busa Anatomis Redam Tekanan Sadel',
                    'Konstruksi Kokoh untuk Dipakai Setiap Hari',
                    'Sangat Cocok untuk Gowes 50-80 KM'
                ]
            ],
            'rdn-womens-aero-bib-shorts' => [
                'slug' => 'rdn-womens-aero-bib-shorts',
                'name' => 'RDN Women\'s Aero Performance Bib Shorts',
                'category' => 'Apparel',
                'subcategory' => 'Bib Shorts',
                'price' => 'Rp 989.000',
                'description' => 'Didesain khusus mengikuti anatomi tubuh wanita untuk kenyamanan berkendara balap yang maksimal.',
                'image' => '/images/hero_cyclists.png',
                'image_filter' => 'hue-rotate(280deg) grayscale(80%) brightness(40%)',
                'specs' => [
                    'Chamois Pad' => 'Italian Women-Specific 3D anatomical pad',
                    'Material' => 'Premium compression Lycra',
                    'Straps' => 'Comfort-crossed strap design on front',
                    'Leg Gripper' => 'Seamless raw cut edge with laser silicone print',
                    'Features' => 'Women-specific cut, sweat wicking'
                ],
                'features' => [
                    'Potongan Pola Anatomi Khusus Wanita',
                    'Tali Bahu Silang Menghindari Tekanan Dada',
                    'Padding Wanita Elastis Interface Italia',
                    'Ujung Kaki Seamless Nyaman Tanpa Tekanan'
                ]
            ],

            // ==========================================
            // APPAREL - VESTS
            // ==========================================
            'rdn-windbreaker-aero-vest' => [
                'slug' => 'rdn-windbreaker-aero-vest',
                'name' => 'RDN Windbreaker Packable Aero Cycling Vest',
                'category' => 'Apparel',
                'subcategory' => 'Vests & Outerwear',
                'price' => 'Rp 649.000',
                'description' => 'Rompi penahan angin tipis ultra ringan yang sangat mudah dilipat sekecil kepalan tangan masuk saku jersey.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'hue-rotate(30deg) saturate(50%) brightness(80%)',
                'specs' => [
                    'Material' => '100% Windproof Polyester front, mesh back panel',
                    'Weight' => '75 grams (Size M)',
                    'Features' => 'Packable, reflective details, double-sided zipper for easy pocket access'
                ],
                'features' => [
                    'Sangat Ringan Hanya 75 Gram',
                    'Bisa Dilipat Masuk Kantong Jersey',
                    'Bagian Depan Penahan Angin Sempurna',
                    'Resleting Dua Arah Mempermudah Akses Saku'
                ]
            ],
            'rdn-thermal-gilet-vest' => [
                'slug' => 'rdn-thermal-gilet-vest',
                'name' => 'RDN Thermal Gilet Water-Resistant Cycling Vest',
                'category' => 'Apparel',
                'subcategory' => 'Vests & Outerwear',
                'price' => 'Rp 789.000',
                'description' => 'Dilengkapi fleece tipis di bagian dada untuk gowes pagi hari di area pegunungan dingin.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'hue-rotate(150deg) saturate(50%) brightness(60%)',
                'specs' => [
                    'Material' => 'Windproof & water-resistant outer membrane, micro-fleece lining inner',
                    'Weight' => '140 grams',
                    'Features' => 'Water repellent (DWR coated), high collar protection, 3 rear pockets'
                ],
                'features' => [
                    'Lapisan Fleece Hangat di Bagian Dada',
                    'Lapisan Luar Anti Percikan Air (DWR)',
                    'Kerah Tinggi Melindungi Leher dari Angin',
                    'Dilengkapi 3 Kantong Belakang Mandiri'
                ]
            ],
            'rdn-rain-jacket-pro' => [
                'slug' => 'rdn-rain-jacket-pro',
                'name' => 'RDN Rain Jacket Pro - Fully Seam-Sealed Coat',
                'category' => 'Apparel',
                'subcategory' => 'Vests & Outerwear',
                'price' => 'Rp 1.489.000',
                'description' => 'Jaket hujan premium yang 100% tahan air (fully waterproof) dengan seam-sealed jahitan dalam namun tetap bernapas.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'hue-rotate(240deg) saturate(50%) brightness(70%)',
                'specs' => [
                    'Material' => '3-Layer waterproof membrane (15,000mm rating)',
                    'Breathability' => '10,000g/m²/24h MVTR',
                    'Features' => 'Taped seams, waterproof zipper, drop tail, adjustable cuffs'
                ],
                'features' => [
                    '100% Tahan Air Dengan Segel Jahitan (Taped Seams)',
                    'Uap Panas Tubuh Tetap Bisa Menguap Keluar',
                    'Bagian Punggung Lebih Panjang Menghalangi Cipratan Ban',
                    'Resleting Khusus Anti Air'
                ]
            ],
            'rdn-dry-mesh-base-layer' => [
                'slug' => 'rdn-dry-mesh-base-layer',
                'name' => 'RDN Dry-Mesh Sleeveless Base Layer Undergarment',
                'category' => 'Apparel',
                'subcategory' => 'Vests & Outerwear',
                'price' => 'Rp 329.000',
                'description' => 'Pakaian dalam jala (mesh) tipis tanpa lengan yang mempercepat penguapan keringat di balik jersey Anda.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'grayscale(100%) brightness(95%)',
                'specs' => [
                    'Material' => '92% Polyester Mesh, 8% Elastane',
                    'Fit' => 'Skin-tight fit (Super stretch)',
                    'Features' => 'Flatlock seams, open honeycomb mesh structure, anti-odor treatment'
                ],
                'features' => [
                    'Struktur Jala Sarang Lebah (Honeycomb)',
                    'Mempercepat Pengeringan Keringat',
                    'Bahan Elastis Menempel Sempurna di Kulit',
                    'Jahitan Datar Nyaman Tanpa Menusuk Kulit'
                ]
            ],

            // ==========================================
            // APPAREL - ACCESSORIES
            // ==========================================
            'rdn-aero-cycling-socks' => [
                'slug' => 'rdn-aero-cycling-socks',
                'name' => 'RDN Aero Performance Silicone Grip Cycling Socks',
                'category' => 'Apparel',
                'subcategory' => 'Socks & Accessories',
                'price' => 'Rp 189.000',
                'description' => 'Kaos kaki aero dengan rusuk vertikal yang terbukti mengurangi gesekan udara di area kaki bawah.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'hue-rotate(90deg) saturate(30%) brightness(90%)',
                'specs' => [
                    'Material' => '80% Nylon, 20% Elastane Aero fabric cuff, Coolmax footbed',
                    'Cuff Height' => '15 cm / 6 inches',
                    'Features' => 'Aerodynamic vertical ribbing, internal silicone grip cuff, breathable foot area'
                ],
                'features' => [
                    'Garis Rusuk Vertikal Aero Mengurangi Drag',
                    'Pita Silikon Dalam Menjaga Kaos Kaki Melorot',
                    'Bagian Telapak Kaki Coolmax Adem & Tebal Pas',
                    'Tinggi 15cm Sesuai Standar Balapan UCI'
                ]
            ],
            'rdn-summer-cycling-cap' => [
                'slug' => 'rdn-summer-cycling-cap',
                'name' => 'RDN Summer Classic Cotton Cycling Cap',
                'category' => 'Apparel',
                'subcategory' => 'Socks & Accessories',
                'price' => 'Rp 249.000',
                'description' => 'Topi sepeda katun klasik untuk memblokir sinar matahari langsung di bawah helm Anda.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'hue-rotate(200deg) saturate(30%) brightness(85%)',
                'specs' => [
                    'Material' => '100% Breathable Cotton',
                    'Size' => 'One size fits most (elastic back band)',
                    'Features' => 'Traditional flip-up visor, center ribbon design, anti-sweat brow band'
                ],
                'features' => [
                    'Bahan Katun Alami Menyerap Keringat Kepala',
                    'Brim Topi Melindungi Mata dari Silau Matahari',
                    'Karet Belakang Elastis Menyesuaikan Ukuran Kepala',
                    'Desain Vintage Klasik Stylish'
                ]
            ],
            'rdn-winter-arm-warmers' => [
                'slug' => 'rdn-winter-arm-warmers',
                'name' => 'RDN Winter Fleece UV Protection Arm Warmers',
                'category' => 'Apparel',
                'subcategory' => 'Socks & Accessories',
                'price' => 'Rp 289.000',
                'description' => 'Manset lengan hangat berpelindung sinar UV UPF 50+ dengan lapisan fleece tipis di bagian dalam.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'grayscale(100%) brightness(40%)',
                'specs' => [
                    'Material' => '85% Polyester, 15% Spandex with brushed fleece inner',
                    'Protection' => 'UPF 50+ UV protection rating',
                    'Features' => 'Non-slip silicone upper arm gripper, anatomical left/right construction'
                ],
                'features' => [
                    'Lapisan Bulu Halus (Fleece) Menjaga Suhu Lengan',
                    'Perlindungan Maksimal UV UPF 50+',
                    'Karet Silikon Atas Lengan Anti Melorot',
                    'Konstruksi Potongan Anatomi Kiri-Kanan Berbeda'
                ]
            ],
            'rdn-padded-leather-gloves' => [
                'slug' => 'rdn-padded-leather-gloves',
                'name' => 'RDN Padded Leather Premium Short Cycling Gloves',
                'category' => 'Apparel',
                'subcategory' => 'Socks & Accessories',
                'price' => 'Rp 399.000',
                'description' => 'Sarung tangan kulit kambing premium berpadding gel tebal untuk meredam getaran stang jalanan makadam.',
                'image' => '/images/category_jerseys.png',
                'image_filter' => 'grayscale(100%) brightness(30%)',
                'specs' => [
                    'Material' => 'Real Goat Leather palm, breathable mesh backing',
                    'Padding' => 'Multi-zone gel pads protection',
                    'Features' => 'Finger pull loops for easy removal, soft sweat-wipe thumb panel'
                ],
                'features' => [
                    'Bahan Kulit Kambing Asli di Telapak Tangan',
                    'Padding Gel Tebal Mencegah Kesemutan Tangan',
                    'Panel Handuk Lembut di Jempol untuk Usap Keringat',
                    'Tali Penarik Jari Mempermudah Lepas Sarung Tangan'
                ]
            ]
        ];
    }

    /**
     * Show road bikes catalog list.
     */
    public function roadBikes()
    {
        // 1. Fetch from database
        $dbProducts = \App\Models\Product::where('subcategory', 'Road Bikes')->get();
        
        $products = [];
        foreach ($dbProducts as $item) {
            $products[] = [
                'slug' => $item->slug,
                'name' => $item->name,
                'price' => 'Rp ' . number_format($item->price, 0, ',', '.'),
                'description' => $item->description,
                'image' => $item->image,
                'specs' => $item->specs,
                'features' => $item->features,
                'stock' => $item->total_stock
            ];
        }

        // 2. Fallback to hardcoded list if empty
        if (count($products) === 0) {
            $allHardcoded = $this->getProducts();
            foreach ($allHardcoded as $item) {
                if ($item['subcategory'] === 'Road Bikes') {
                    $products[] = $item;
                }
            }
        }

        return view('road-bikes', compact('products'));
    }

    /**
     * Show gravel bikes catalog list.
     */
    public function gravelBikes()
    {
        // 1. Fetch from database
        $dbProducts = \App\Models\Product::where('subcategory', 'Gravel Bikes')->get();
        
        $products = [];
        foreach ($dbProducts as $item) {
            $products[] = [
                'slug' => $item->slug,
                'name' => $item->name,
                'price' => 'Rp ' . number_format($item->price, 0, ',', '.'),
                'description' => $item->description,
                'image' => $item->image,
                'specs' => $item->specs,
                'features' => $item->features,
                'stock' => $item->total_stock
            ];
        }

        // 2. Fallback to hardcoded list if empty
        if (count($products) === 0) {
            $allHardcoded = $this->getProducts();
            foreach ($allHardcoded as $item) {
                if ($item['subcategory'] === 'Gravel Bikes') {
                    $products[] = $item;
                }
            }
        }

        return view('gravel-bikes', compact('products'));
    }

    /**
     * Show bike components catalog list.
     */
    public function bikeComponents()
    {
        // 1. Fetch from database (where category slug is components)
        $componentsCategory = \App\Models\Category::where('slug', 'components')->first();
        $dbProducts = [];
        if ($componentsCategory) {
            $dbProducts = \App\Models\Product::where('category_id', $componentsCategory->id)->get();
        }
        
        $products = [];
        foreach ($dbProducts as $item) {
            $products[] = [
                'slug' => $item->slug,
                'name' => $item->name,
                'price' => 'Rp ' . number_format($item->price, 0, ',', '.'),
                'description' => $item->description,
                'image' => $item->image,
                'specs' => $item->specs,
                'features' => $item->features,
                'stock' => $item->total_stock
            ];
        }

        // 2. Fallback to hardcoded list if empty
        if (count($products) === 0) {
            $allHardcoded = $this->getProducts();
            foreach ($allHardcoded as $item) {
                if ($item['category'] === 'Components') {
                    $products[] = $item;
                }
            }
        }

        return view('components', compact('products'));
    }

    /**
     * Show cycling jerseys catalog list.
     */
    public function cyclingJerseys()
    {
        $dbProducts = \App\Models\Product::where('subcategory', 'Cycling Jerseys')->get();
        
        $products = [];
        foreach ($dbProducts as $item) {
            $products[] = [
                'slug' => $item->slug,
                'name' => $item->name,
                'price' => 'Rp ' . number_format($item->price, 0, ',', '.'),
                'description' => $item->description,
                'image' => $item->image,
                'specs' => $item->specs,
                'features' => $item->features,
                'stock' => $item->total_stock
            ];
        }

        if (count($products) === 0) {
            $allHardcoded = $this->getProducts();
            foreach ($allHardcoded as $item) {
                if ($item['subcategory'] === 'Cycling Jerseys') {
                    $products[] = $item;
                }
            }
        }

        return view('apparel.jerseys', compact('products'));
    }

    /**
     * Show bib shorts catalog list.
     */
    public function bibShorts()
    {
        $dbProducts = \App\Models\Product::where('subcategory', 'Bib Shorts')->get();
        
        $products = [];
        foreach ($dbProducts as $item) {
            $products[] = [
                'slug' => $item->slug,
                'name' => $item->name,
                'price' => 'Rp ' . number_format($item->price, 0, ',', '.'),
                'description' => $item->description,
                'image' => $item->image,
                'specs' => $item->specs,
                'features' => $item->features,
                'stock' => $item->total_stock
            ];
        }

        if (count($products) === 0) {
            $allHardcoded = $this->getProducts();
            foreach ($allHardcoded as $item) {
                if ($item['subcategory'] === 'Bib Shorts') {
                    $products[] = $item;
                }
            }
        }

        return view('apparel.bib-shorts', compact('products'));
    }

    /**
     * Show vests & outerwear catalog list.
     */
    public function vestsOuterwear()
    {
        $dbProducts = \App\Models\Product::where('subcategory', 'Vests & Outerwear')->get();
        
        $products = [];
        foreach ($dbProducts as $item) {
            $products[] = [
                'slug' => $item->slug,
                'name' => $item->name,
                'price' => 'Rp ' . number_format($item->price, 0, ',', '.'),
                'description' => $item->description,
                'image' => $item->image,
                'specs' => $item->specs,
                'features' => $item->features,
                'stock' => $item->total_stock
            ];
        }

        if (count($products) === 0) {
            $allHardcoded = $this->getProducts();
            foreach ($allHardcoded as $item) {
                if ($item['subcategory'] === 'Vests & Outerwear') {
                    $products[] = $item;
                }
            }
        }

        return view('apparel.vests', compact('products'));
    }

    /**
     * Show socks & accessories catalog list.
     */
    public function socksAccessories()
    {
        $dbProducts = \App\Models\Product::where('subcategory', 'Socks & Accessories')->get();
        
        $products = [];
        foreach ($dbProducts as $item) {
            $products[] = [
                'slug' => $item->slug,
                'name' => $item->name,
                'price' => 'Rp ' . number_format($item->price, 0, ',', '.'),
                'description' => $item->description,
                'image' => $item->image,
                'specs' => $item->specs,
                'features' => $item->features,
                'stock' => $item->total_stock
            ];
        }

        if (count($products) === 0) {
            $allHardcoded = $this->getProducts();
            foreach ($allHardcoded as $item) {
                if ($item['subcategory'] === 'Socks & Accessories') {
                    $products[] = $item;
                }
            }
        }

        return view('apparel.accessories', compact('products'));
    }

    /**
     * Show product detail view.
     */
    public function show($slug)
    {
        // 1. Try to find the product in the database first (supports real-time admin CRUD updates)
        $dbProduct = \App\Models\Product::where('slug', $slug)->first();
        if ($dbProduct) {
            $product = [
                'id' => $dbProduct->id,
                'slug' => $dbProduct->slug,
                'name' => $dbProduct->name,
                'category' => $dbProduct->category ? $dbProduct->category->name : 'Bikes',
                'subcategory' => $dbProduct->subcategory,
                'price' => 'Rp ' . number_format($dbProduct->price, 0, ',', '.'),
                'raw_price' => $dbProduct->price,
                'stock' => $dbProduct->total_stock,
                'stocks' => $dbProduct->stocks->map(function ($st) {
                    return [
                        'size' => $st->size,
                        'color' => $st->color,
                        'qty' => $st->qty,
                    ];
                })->toArray(),
                'allow_frame_only' => $dbProduct->allow_frame_only,
                'frame_only_price' => $dbProduct->frame_only_price ? 'Rp ' . number_format($dbProduct->frame_only_price, 0, ',', '.') : null,
                'raw_frame_only_price' => $dbProduct->frame_only_price,
                'description' => $dbProduct->description,
                'image' => $dbProduct->image,
                'specs' => $dbProduct->specs,
                'features' => $dbProduct->features
            ];
            return view('products.show', compact('product'));
        }

        // 2. Fallback to hardcoded array
        $products = $this->getProducts();

        if (!array_key_exists($slug, $products)) {
            abort(404, 'Produk tidak ditemukan.');
        }

        $product = $products[$slug];

        return view('products.show', compact('product'));
    }
}
