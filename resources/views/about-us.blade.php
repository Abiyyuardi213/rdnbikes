@extends('layouts.app')

@section('title', 'About Us - RDN Bikes')

@section('content')
<!-- Page Hero Banner -->
<section class="position-relative py-5 text-white d-flex align-items-center" style="min-height: 350px; background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('/images/hero_road_bike.png') center/cover no-repeat; filter: grayscale(100%) brightness(60%);">
    <div class="container text-center py-5">
        <span class="text-uppercase fw-bold text-turquoise mb-2 d-inline-block" style="font-family: var(--font-display); font-size: 0.85rem; letter-spacing: 3px;">Dedicated to Performance & Quality</span>
        <h1 class="display-4 fw-extrabold text-uppercase mb-3" style="font-family: var(--font-display); letter-spacing: 1px;">Tentang RDN Bikes</h1>
        <p class="lead mx-auto mb-0" style="max-width: 600px; font-weight: 300; font-size: 1.1rem; line-height: 1.6;">Menghubungkan kecintaan bersepeda dengan produk dan layanan premium terbaik untuk goweser seluruh Indonesia.</p>
    </div>
</section>

<!-- Breadcrumbs -->
<section class="py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.85rem; font-family: var(--font-display); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item active text-turquoise" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Brand History -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="text-uppercase text-turquoise fw-bold" style="font-family: var(--font-display); font-size: 0.8rem; letter-spacing: 2px;">Our Story</span>
                <h2 class="display-font text-uppercase fw-extrabold mt-2 mb-4" style="font-size: 2rem;">Perjalanan RDN Bikes</h2>
                <p class="text-muted" style="line-height: 1.7; font-size: 0.95rem;">RDN Bikes didirikan dari kecintaan yang mendalam terhadap olahraga bersepeda. Dimulai sebagai garasi perakitan sepeda balap custom, kami bertumbuh menjadi salah satu destinasi utama goweser yang mencari performa tanpa kompromi.</p>
                <p class="text-muted" style="line-height: 1.7; font-size: 0.95rem;">Kami menyadari bahwa setiap pesepeda berhak mendapatkan sepeda dan pakaian (apparel) yang tidak hanya pas secara anatomi, namun juga mengekspresikan jati diri mereka. Oleh karena itu, RDN Bikes hadir menawarkan lini sepeda premium kelas balap, jersey custom sublimasi berteknologi tinggi, serta suku cadang terbaik untuk mendukung petualangan gowes Anda.</p>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-4 bg-light border text-center rounded-2">
                            <span class="display-5 fw-extrabold text-turquoise d-block mb-1" style="font-family: var(--font-display);">2020</span>
                            <span class="text-uppercase font-family-1 fw-bold text-dark" style="font-size: 0.75rem; letter-spacing: 1px;">Tahun Berdiri</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 bg-light border text-center rounded-2">
                            <span class="display-5 fw-extrabold text-turquoise d-block mb-1" style="font-family: var(--font-display);">10k+</span>
                            <span class="text-uppercase font-family-1 fw-bold text-dark" style="font-size: 0.75rem; letter-spacing: 1px;">Jersey Terjual</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 bg-light border text-center rounded-2">
                            <span class="display-5 fw-extrabold text-turquoise d-block mb-1" style="font-family: var(--font-display);">2k+</span>
                            <span class="text-uppercase font-family-1 fw-bold text-dark" style="font-size: 0.75rem; letter-spacing: 1px;">Klien Komunitas</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 bg-light border text-center rounded-2">
                            <span class="display-5 fw-extrabold text-turquoise d-block mb-1" style="font-family: var(--font-display);">100%</span>
                            <span class="text-uppercase font-family-1 fw-bold text-dark" style="font-size: 0.75rem; letter-spacing: 1px;">Jaminan Kualitas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Store Information & Map -->
<section class="py-5 bg-light border-top border-bottom">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <span class="text-uppercase text-turquoise fw-bold" style="font-family: var(--font-display); font-size: 0.8rem; letter-spacing: 2px;">Visit Our Showroom</span>
                <h2 class="display-font text-uppercase fw-extrabold mt-2 mb-4" style="font-size: 1.8rem;">Lokasi & Kontak Toko</h2>
                
                <div class="mb-4">
                    <h6 class="display-font text-uppercase fw-bold text-dark mb-2" style="font-size: 0.85rem;"><i class="bi bi-geo-alt-fill text-turquoise me-2"></i>Alamat Showroom:</h6>
                    <p class="text-muted mb-0" style="font-size: 0.9rem; line-height: 1.6;">Jl. Ahmad Yani No. 88, Ketintang, Gayungan, Kota Surabaya, Jawa Timur 60231, Indonesia.</p>
                </div>

                <div class="mb-4">
                    <h6 class="display-font text-uppercase fw-bold text-dark mb-2" style="font-size: 0.85rem;"><i class="bi bi-clock-fill text-turquoise me-2"></i>Jam Operasional:</h6>
                    <p class="text-muted mb-0" style="font-size: 0.9rem; line-height: 1.6;">Senin - Sabtu: 09.00 - 18.00 WIB<br>Minggu: 09.00 - 15.00 WIB</p>
                </div>

                <div class="mb-4">
                    <h6 class="display-font text-uppercase fw-bold text-dark mb-2" style="font-size: 0.85rem;"><i class="bi bi-envelope-open-fill text-turquoise me-2"></i>Kontak Dukungan:</h6>
                    <p class="text-muted mb-0" style="font-size: 0.9rem; line-height: 1.6;">WhatsApp: +62 812-3456-789<br>Email: support@rdnbikes.com</p>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="card card-custom border-0 shadow-sm overflow-hidden h-100" style="min-height: 350px;">
                    <!-- Embed static placeholder representing interactive map card layout -->
                    <div class="h-100 bg-white d-flex flex-column align-items-center justify-content-center text-center p-5 position-relative" style="background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.95)), url('/images/hero_road_bike.png') center/cover no-repeat;">
                        <i class="bi bi-map-fill text-turquoise display-3 mb-3"></i>
                        <h5 class="display-font text-uppercase fw-bold text-dark mb-2">Peta Navigasi Showroom</h5>
                        <p class="text-muted mx-auto mb-4" style="max-width: 400px; font-size: 0.85rem;">Klik tombol di bawah ini untuk membuka navigasi rute mengemudi langsung menuju showroom RDN Bikes di Google Maps.</p>
                        <a href="https://maps.google.com" target="_blank" class="btn btn-dark-custom py-2 px-4 text-uppercase fw-bold font-family-1" style="font-size: 0.8rem; letter-spacing: 1px;"><i class="bi bi-compass me-2"></i>Buka Google Maps</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Value Propositions -->
<section class="py-5 text-center">
    <div class="container py-3">
        <h3 class="display-font text-uppercase fw-bold mb-5">Komitmen Pelayanan RDN Bikes</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <i class="bi bi-award text-turquoise display-4 mb-3"></i>
                <h5 class="display-font text-uppercase fw-bold mb-2" style="font-size: 1rem;">Garansi Keaslian</h5>
                <p class="text-muted" style="font-size: 0.85rem; line-height: 1.6;">Kami menjamin 100% keaslian unit sepeda, apparel gowes, suku cadang, dan komponen aksesoris yang kami jual.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-wrench-adjustable text-turquoise display-4 mb-3"></i>
                <h5 class="display-font text-uppercase fw-bold mb-2" style="font-size: 1rem;">Mekanik Berpengalaman</h5>
                <p class="text-muted" style="font-size: 0.85rem; line-height: 1.6;">Setiap sepeda dirakit dan di-setup secara teliti oleh mekanik berpengalaman tinggi demi keselamatan berkendara Anda.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-suit-heart text-turquoise display-4 mb-3"></i>
                <h5 class="display-font text-uppercase fw-bold mb-2" style="font-size: 1rem;">Dukungan Goweser</h5>
                <p class="text-muted" style="font-size: 0.85rem; line-height: 1.6;">Tim kami siap membantu merekomendasikan setup yang pas dan apparel penunjang gowes terbaik untuk Anda.</p>
            </div>
        </div>
    </div>
</section>
@endsection
