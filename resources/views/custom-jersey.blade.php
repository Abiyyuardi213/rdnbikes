@extends('layouts.app')

@section('title', 'Custom Jersey - RDN Bikes')

@section('content')
<!-- Page Hero Banner -->
<section class="position-relative py-5 text-white d-flex align-items-center" style="min-height: 400px; background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('/images/category_jerseys.png') center/cover no-repeat;">
    <div class="container text-center py-5">
        <span class="text-uppercase fw-bold text-turquoise mb-2 d-inline-block" style="font-family: var(--font-display); font-size: 0.85rem; letter-spacing: 3px;">Custom Sublimation Apparel</span>
        <h1 class="display-4 fw-extrabold text-uppercase mb-3" style="font-family: var(--font-display); letter-spacing: 1px;">Buat Jersey Desain Sendiri</h1>
        <p class="lead mx-auto mb-0" style="max-width: 600px; font-weight: 300; font-size: 1.1rem; line-height: 1.6;">Layanan konveksi khusus jersey olahraga sublimasi premium. Desain full custom bebas warna, tanpa minimal order, proses pengerjaan cepat dan rapi.</p>
    </div>
</section>

<!-- Breadcrumbs -->
<section class="py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.85rem; font-family: var(--font-display); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item active text-turquoise" aria-current="page">Custom Jersey</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Core Features -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="text-uppercase text-turquoise fw-bold" style="font-family: var(--font-display); font-size: 0.8rem; letter-spacing: 2px;">Why RDN Custom?</span>
                <h2 class="display-font text-uppercase fw-extrabold mt-2 mb-4" style="font-size: 2rem;">Kualitas Cetak Tajam & Nyaman Digunakan</h2>
                <p class="text-muted" style="line-height: 1.7;">Kami menggabungkan teknologi digital printing sublimasi terbaik dengan pilihan bahan kain berpori elastis (Dry-Fit/Aero) untuk memastikan performa olahraga Anda tetap prima sekaligus tampil stylish bersama komunitas Anda.</p>
                
                <div class="mt-4">
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-shield-check text-turquoise fs-4 me-3"></i>
                        <div>
                            <h5 class="display-font text-uppercase fw-bold mb-1" style="font-size: 0.95rem;">Tinta Sublimasi Italia Anti Luntur</h5>
                            <p class="text-muted mb-0" style="font-size: 0.85rem;">Tinta ramah lingkungan menyerap sempurna ke serat kain, tidak menutup sirkulasi udara dan warna dijamin tahan bertahun-tahun.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-person-fill-gear text-turquoise fs-4 me-3"></i>
                        <div>
                            <h5 class="display-font text-uppercase fw-bold mb-1" style="font-size: 0.95rem;">Bantuan Desain Mockup 3D Gratis</h5>
                            <p class="text-muted mb-0" style="font-size: 0.85rem;">Cukup kirimkan konsep corak, logo, dan teks Anda. Desainer kami akan memvisualisasikannya ke dalam mockup 3D secara gratis sebelum cetak.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <i class="bi bi-lightning-charge-fill text-turquoise fs-4 me-3"></i>
                        <div>
                            <h5 class="display-font text-uppercase fw-bold mb-1" style="font-size: 0.95rem;">Pengerjaan Cepat (7-14 Hari Kerja)</h5>
                            <p class="text-muted mb-0" style="font-size: 0.85rem;">Dilengkapi mesin print industri berskala besar untuk mendukung penyelesaian pesanan partai besar maupun satuan secara tepat waktu.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative p-2 bg-white rounded-3 shadow-lg" style="transform: rotate(-1.5deg);">
                    <img src="/images/category_jerseys.png" class="img-fluid rounded-3" alt="Mockup Jersey RDN">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ordering Steps -->
<section class="py-5 bg-light border-top border-bottom">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-uppercase text-turquoise fw-bold" style="font-family: var(--font-display); font-size: 0.8rem; letter-spacing: 2px;">Easy Ordering Process</span>
            <h2 class="display-font text-uppercase fw-extrabold mt-1">4 Langkah Mudah Pemesanan</h2>
        </div>
        <div class="row g-4 text-center">
            <!-- Step 1 -->
            <div class="col-md-3">
                <div class="p-4 bg-white shadow-sm h-100">
                    <span class="display-1 fw-bold text-turquoise opacity-25 d-block mb-3" style="font-family: var(--font-display); line-height: 1;">01</span>
                    <h5 class="display-font text-uppercase fw-bold mb-2" style="font-size: 0.95rem;">Konsultasi</h5>
                    <p class="text-muted mb-0" style="font-size: 0.85rem;">Hubungi admin WA kami untuk mendiskusikan konsep desain, pilihan pola ukuran, dan kuantitas pemesanan.</p>
                </div>
            </div>
            <!-- Step 2 -->
            <div class="col-md-3">
                <div class="p-4 bg-white shadow-sm h-100">
                    <span class="display-1 fw-bold text-turquoise opacity-25 d-block mb-3" style="font-family: var(--font-display); line-height: 1;">02</span>
                    <h5 class="display-font text-uppercase fw-bold mb-2" style="font-size: 0.95rem;">Mockup & Fitting</h5>
                    <p class="text-muted mb-0" style="font-size: 0.85rem;">Tim desainer mendesain mockup 3D jersey Anda. Anda memilih panduan ukuran dada (XS hingga 5XL).</p>
                </div>
            </div>
            <!-- Step 3 -->
            <div class="col-md-3">
                <div class="p-4 bg-white shadow-sm h-100">
                    <span class="display-1 fw-bold text-turquoise opacity-25 d-block mb-3" style="font-family: var(--font-display); line-height: 1;">03</span>
                    <h5 class="display-font text-uppercase fw-bold mb-2" style="font-size: 0.95rem;">DP & Produksi</h5>
                    <p class="text-muted mb-0" style="font-size: 0.85rem;">Pembayaran uang muka (DP) 50%, lalu pesanan masuk ke tahap printing sublimasi, pemotongan kain, dan penjahitan.</p>
                </div>
            </div>
            <!-- Step 4 -->
            <div class="col-md-3">
                <div class="p-4 bg-white shadow-sm h-100">
                    <span class="display-1 fw-bold text-turquoise opacity-25 d-block mb-3" style="font-family: var(--font-display); line-height: 1;">04</span>
                    <h5 class="display-font text-uppercase fw-bold mb-2" style="font-size: 0.95rem;">Pelunasan & Kirim</h5>
                    <p class="text-muted mb-0" style="font-size: 0.85rem;">Foto hasil jadi dikirimkan ke Anda. Setelah pelunasan selesai, paket pesanan dikirim ke alamat Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Price Packages -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-uppercase text-turquoise fw-bold" style="font-family: var(--font-display); font-size: 0.8rem; letter-spacing: 2px;">Flexible Pricing</span>
            <h2 class="display-font text-uppercase fw-extrabold mt-1">Daftar Paket Harga Custom</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Pack 1 -->
            <div class="col-md-4">
                <div class="card card-custom h-100 border text-center p-4">
                    <h4 class="display-font text-uppercase fw-bold text-muted mb-2" style="font-size: 1.1rem;">Jersey Satuan</h4>
                    <p class="text-muted" style="font-size: 0.8rem;">Tanpa minimum order</p>
                    <hr>
                    <h2 class="display-font fw-extrabold text-turquoise my-3" style="font-size: 2.2rem;">Rp 250.000 <span style="font-size: 0.8rem; color: #888888; font-weight: normal;">/ pcs</span></h2>
                    <ul class="text-start ps-3 mb-4 text-muted" style="font-size: 0.85rem; line-height: 1.8;">
                        <li>Bahan Polyester Dry-Fit Standar</li>
                        <li>Full Sublimation Printing</li>
                        <li>Bantuan Layout Logo Dasar</li>
                        <li>Saku Belakang Standard</li>
                        <li>Pilihan Lengan Pendek saja</li>
                    </ul>
                    <a href="https://wa.me/628123456789?text=Halo%20RDN%20Bikes,%20saya%20ingin%20pesan%20Jersey%20Custom%20Satuan." target="_blank" class="btn btn-outline-dark w-100 py-2 text-uppercase fw-bold" style="font-size: 0.8rem;">Pesan Satuan</a>
                </div>
            </div>
            
            <!-- Pack 2 -->
            <div class="col-md-4">
                <div class="card card-custom h-100 border-turquoise border-2 text-center p-4 position-relative shadow-sm" style="border: 2px solid var(--rdn-turquoise) !important;">
                    <span class="position-absolute top-0 start-50 translate-middle bg-turquoise text-white px-3 py-1 text-uppercase fw-bold" style="font-family: var(--font-display); font-size: 0.65rem; letter-spacing: 1px;">Paling Populer</span>
                    <h4 class="display-font text-uppercase fw-bold text-dark mb-2 mt-2" style="font-size: 1.1rem;">Jersey Tim (Min. 12 pcs)</h4>
                    <p class="text-muted" style="font-size: 0.8rem;">Sangat cocok untuk tim gowes komunitas</p>
                    <hr>
                    <h2 class="display-font fw-extrabold text-turquoise my-3" style="font-size: 2.2rem;">Rp 180.000 <span style="font-size: 0.8rem; color: #888888; font-weight: normal;">/ pcs</span></h2>
                    <ul class="text-start ps-3 mb-4 text-muted" style="font-size: 0.85rem; line-height: 1.8;">
                        <li>Bahan Aero-Mesh Premium High Elasticity</li>
                        <li>Full Custom Desain Grafis Bebas</li>
                        <li>Mockup Visualisasi 3D Komplet</li>
                        <li>Kerah Pendek & Resleting YKK Full / Half</li>
                        <li>Saku Belakang + Saku Resleting Reflektif</li>
                    </ul>
                    <a href="https://wa.me/628123456789?text=Halo%20RDN%20Bikes,%20saya%20ingin%20tanya%20paket%20Jersey%20Custom%20Tim%20Komunitas." target="_blank" class="btn btn-turquoise w-100 py-2 text-uppercase fw-bold" style="font-size: 0.8rem;">Pesan Paket Tim</a>
                </div>
            </div>

            <!-- Pack 3 -->
            <div class="col-md-4">
                <div class="card card-custom h-100 border text-center p-4">
                    <h4 class="display-font text-uppercase fw-bold text-muted mb-2" style="font-size: 1.1rem;">Apparel Event (Min. 100 pcs)</h4>
                    <p class="text-muted" style="font-size: 0.8rem;">Untuk peserta event balapan / fun ride</p>
                    <hr>
                    <h2 class="display-font fw-extrabold text-turquoise my-3" style="font-size: 2.2rem;">Hubungi Kami</h2>
                    <ul class="text-start ps-3 mb-4 text-muted" style="font-size: 0.85rem; line-height: 1.8;">
                        <li>Bahan Ringan Dry-Mesh Cepat Kering</li>
                        <li>Cetak Sublimasi Massal Presisi</li>
                        <li>Pilihan Tipe Potongan Pria & Wanita</li>
                        <li>Harga Khusus Skala Industri Grosir</li>
                        <li>Pengiriman Terjadwal Sistematis</li>
                    </ul>
                    <a href="https://wa.me/628123456789?text=Halo%20RDN%20Bikes,%20saya%20ingin%20negosiasi%20harga%20Jersey%20Custom%20Event%20Skala%20Besar." target="_blank" class="btn btn-outline-dark w-100 py-2 text-uppercase fw-bold" style="font-size: 0.8rem;">Hubungi Sales Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Whatsapp CTA Section -->
<section class="py-5 bg-dark text-white text-center">
    <div class="container py-3">
        <h3 class="display-font text-uppercase text-white fw-bold mb-3">Wujudkan Desain Jersey Impian Anda Sekarang</h3>
        <p class="mx-auto mb-4" style="max-width: 600px; color: #bbbbbb;">Hubungi spesialis custom apparel kami untuk konsultasi layout, estimasi harga akhir, atau sekadar bertanya mengenai bahan kain.</p>
        <a href="https://wa.me/628123456789?text=Halo%20RDN%20Bikes,%20saya%20ingin%20bertanya%20mengenai%20layanan%20pembuatan%20Jersey%20Custom." target="_blank" class="btn btn-turquoise px-5 py-3"><i class="bi bi-whatsapp me-2"></i> Mulai Obrolan di WhatsApp</a>
    </div>
</section>
@endsection
