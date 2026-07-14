@extends('layouts.app')

@section('title', 'Our Stories & News - RDN Bikes')

@section('content')
<!-- Page Hero Banner -->
<section class="position-relative py-5 text-white d-flex align-items-center" style="min-height: 350px; background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('/images/hero_cyclists.png') center/cover no-repeat;">
    <div class="container text-center py-5">
        <span class="text-uppercase fw-bold text-turquoise mb-2 d-inline-block" style="font-family: var(--font-display); font-size: 0.85rem; letter-spacing: 3px;">Stories, Tips & Community Events</span>
        <h1 class="display-4 fw-extrabold text-uppercase mb-3" style="font-family: var(--font-display); letter-spacing: 1px;">Our Stories</h1>
        <p class="lead mx-auto mb-0" style="max-width: 600px; font-weight: 300; font-size: 1.1rem; line-height: 1.6;">Ikuti jurnal petualangan gowes komunitas kami, tips perawatan sepeda balap, hingga analisis aerodinamika apparel untuk performa berkendara terbaik Anda.</p>
    </div>
</section>

<!-- Breadcrumbs -->
<section class="py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.85rem; font-family: var(--font-display); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item active text-turquoise" aria-current="page">Our Stories</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Stories Grid -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Article 1 -->
            <div class="col-md-4">
                <div class="story-card">
                    <div class="story-card-img-wr">
                        <img src="/images/hero_cyclists.png" alt="Bromo KOM">
                    </div>
                    <div class="story-date">Event - Juni 2026</div>
                    <a href="#" class="story-title">Menaklukkan Tanjakan Bromo KOM Challenge 2026 Bersama RDN Bikes</a>
                    <p class="story-desc">Ratusan cyclist RDN Bikes menantang batas kekuatan mereka mendaki tanjakan ekstrem Wonokitri Pasuruan. Keseruan gowes tahunan ini...</p>
                    <a href="#" class="story-link">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="col-md-4">
                <div class="story-card">
                    <div class="story-card-img-wr">
                        <img src="/images/category_gravel.png" alt="Gravel Riding Tips">
                    </div>
                    <div class="story-date">Tips & Trick - Mei 2026</div>
                    <a href="#" class="story-title">5 Tips Memilih Tekanan Ban Sepeda Gravel Untuk Berbagai Medan Jalan</a>
                    <p class="story-desc">Bagi penjelajah medan gravel, menentukan tekanan ban yang pas adalah kunci kenyamanan dan traksi optimal. Berikut panduan praktis untuk Anda...</p>
                    <a href="#" class="story-link">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="col-md-4">
                <div class="story-card">
                    <div class="story-card-img-wr">
                        <img src="/images/category_jerseys.png" alt="Aero Fit Jersey Science">
                    </div>
                    <div class="story-date">Sains Apparel - April 2026</div>
                    <a href="#" class="story-title">Mengapa Aero-Fit Jersey Menjadi Penting Untuk Menghemat Energi Anda?</a>
                    <p class="story-desc">Sains di balik jersey ketat balap sepeda modern. Bagaimana bahan aerodinamis dapat mengurangi gesekan angin secara signifikan dan menambah kecepatan...</p>
                    <a href="#" class="story-link">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Article 4 -->
            <div class="col-md-4">
                <div class="story-card">
                    <div class="story-card-img-wr">
                        <img src="/images/hero_road_bike.png" alt="Road Bike Fitting">
                    </div>
                    <div class="story-date">Bike Tech - Maret 2026</div>
                    <a href="#" class="story-title">Panduan Lengkap Memilih Lebar Sadel Sepeda Balap untuk Gowes Jarak Jauh</a>
                    <p class="story-desc">Sadel yang tidak pas adalah mimpi buruk goweser. Pelajari bagaimana cara mengukur jarak tulang duduk (sit bones) Anda untuk menemukan ukuran sadel yang tepat.</p>
                    <a href="#" class="story-link">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Article 5 -->
            <div class="col-md-4">
                <div class="story-card">
                    <div class="story-card-img-wr">
                        <img src="/images/hero_cyclists.png" alt="Gowes Malang" style="filter: hue-rotate(180deg);">
                    </div>
                    <div class="story-date">Komunitas - Februari 2026</div>
                    <a href="#" class="story-title">Keseruan Event Gowes Bareng RDN Bikes: Rute Surabaya - Malang 100K</a>
                    <p class="story-desc">Merayakan kebersamaan goweser Jawa Timur. Simak keseruan peleton RDN Bikes menempuh jarak 100km menyusuri jalur pedesaan asri hingga garis finish di Malang.</p>
                    <a href="#" class="story-link">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Article 6 -->
            <div class="col-md-4">
                <div class="story-card">
                    <div class="story-card-img-wr">
                        <img src="/images/hero_road_bike.png" alt="Maintenance" style="filter: hue-rotate(290deg);">
                    </div>
                    <div class="story-date">Perawatan - Januari 2026</div>
                    <a href="#" class="story-title">Tips Perawatan Rantai & Drivetrain Sepeda Agar Tetap Senyap dan Presisi</a>
                    <p class="story-desc">Jangan biarkan rantai yang berisik mengurangi kesenangan gowes Anda. Berikut panduan membersihkan (degreasing) dan pelumasan ulang rantai secara berkala.</p>
                    <a href="#" class="story-link">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <nav class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link border-0 text-dark" href="#" tabindex="-1" aria-disabled="true" style="font-family: var(--font-display); font-weight: 700; font-size: 0.8rem;">Sebelumnya</a>
                </li>
                <li class="page-item active"><a class="page-link border-0 bg-dark text-white rounded-0" href="#" style="font-family: var(--font-display); font-weight: 700; font-size: 0.8rem;">1</a></li>
                <li class="page-item"><a class="page-link border-0 text-dark" href="#" style="font-family: var(--font-display); font-weight: 700; font-size: 0.8rem;">2</a></li>
                <li class="page-item"><a class="page-link border-0 text-dark" href="#" style="font-family: var(--font-display); font-weight: 700; font-size: 0.8rem;">3</a></li>
                <li class="page-item">
                    <a class="page-link border-0 text-dark" href="#" style="font-family: var(--font-display); font-weight: 700; font-size: 0.8rem;">Selanjutnya</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection
