@extends('layouts.app')

@section('title', 'RDN Bikes - Premium Bike Store & Custom Apparel')

@section('content')
    <!-- Hero Section (Carousel) -->
    <section class="hero-carousel">
        <div id="heroSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="width: 12px; height: 12px; border-radius: 50%;"></button>
                <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1" aria-label="Slide 2" style="width: 12px; height: 12px; border-radius: 50%;"></button>
            </div>
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="/images/hero_cyclists.png" class="carousel-img" alt="Cyclists Riding Pack">
                    <div class="carousel-caption-custom">
                        <h5>RDN APPAREL ELITE SERIES</h5>
                        <h2>Conquer Every Road</h2>
                        <p>Didesain secara presisi untuk kenyamanan maksimal dan tingkat hambatan angin minimal. Siap mendukung performa gowes harian hingga balapan terjauh Anda.</p>
                        <div class="btn-action">
                            <a href="#" class="btn btn-turquoise me-3">Belanja Jersey</a>
                            <a href="#customJerseySection" class="btn btn-outline-white">Pesan Custom</a>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="/images/hero_road_bike.png" class="carousel-img" alt="Carbon Road Bike">
                    <div class="carousel-caption-custom">
                        <h5>RDN PREMIUM RACING MACHINE</h5>
                        <h2>Engineered For Speed</h2>
                        <p>Sepeda karbon premium dengan struktur aerodinamis modern dan presisi tinggi. Rasakan kecepatan murni dan transfer daya yang efisien di setiap kayuhan.</p>
                        <div class="btn-action">
                            <a href="#" class="btn btn-turquoise me-3">Jelajahi Sepeda</a>
                            <a href="#" class="btn btn-outline-white">Konsultasi Fitting</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Selanjutnya</span>
            </button>
        </div>
    </section>

    <!-- Categories Grid Section -->
    <section class="py-5 my-3">
        <div class="container">
            <div class="row">
                <!-- Category 1 -->
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="/images/hero_road_bike.png" alt="Road Bikes">
                        <div class="category-overlay">
                            <span>Koleksi Sepeda</span>
                            <h4>Road Bikes</h4>
                        </div>
                    </div>
                </div>
                <!-- Category 2 -->
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="/images/category_jerseys.png" alt="Cycling Jerseys">
                        <div class="category-overlay">
                            <span>Suku Cadang & Apparel</span>
                            <h4>Cycling Jerseys</h4>
                        </div>
                    </div>
                </div>
                <!-- Category 3 -->
                <div class="col-md-4">
                    <div class="category-card">
                        <img src="/images/category_gravel.png" alt="Gravel & Dirt">
                        <div class="category-overlay">
                            <span>Petualangan Baru</span>
                            <h4>Gravel & Adventure</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-5" style="border-top: 1px solid var(--rdn-border-color);">
        <div class="container">
            <div class="section-title-wr text-center">
                <span class="section-subtitle">Daftar Produk Unggulan</span>
                <h2 class="section-title">Featured Products</h2>
            </div>
            
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-card-img-wr">
                            <span class="product-badge badge-sale">New</span>
                            <img src="/images/category_jerseys.png" alt="Streamline Jersey Azure">
                            <div class="product-card-overlay">
                                <a href="#" class="btn btn-turquoise py-2 px-4" style="font-size: 0.8rem;">Quick Shop</a>
                            </div>
                        </div>
                        <div class="product-card-info">
                            <div>
                                <div class="product-card-category">Elite Series</div>
                                <a href="#" class="product-card-title">RDN Streamline Unisex Short Sleeve Cycling Jersey Azure</a>
                            </div>
                            <p class="product-card-price">Rp 749.000</p>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-card-img-wr">
                            <span class="product-badge badge-sale">New</span>
                            <img src="/images/category_jerseys.png" alt="Streamline Jersey Rouge" style="filter: hue-rotate(120deg);">
                            <div class="product-card-overlay">
                                <a href="#" class="btn btn-turquoise py-2 px-4" style="font-size: 0.8rem;">Quick Shop</a>
                            </div>
                        </div>
                        <div class="product-card-info">
                            <div>
                                <div class="product-card-category">Elite Series</div>
                                <a href="#" class="product-card-title">RDN Streamline Unisex Short Sleeve Cycling Jersey Rouge</a>
                            </div>
                            <p class="product-card-price">Rp 749.000</p>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-card-img-wr">
                            <span class="product-badge badge-sale">Promo</span>
                            <img src="/images/category_jerseys.png" alt="Fomo Running Jersey Blue" style="filter: hue-rotate(240deg);">
                            <div class="product-card-overlay">
                                <a href="#" class="btn btn-turquoise py-2 px-4" style="font-size: 0.8rem;">Quick Shop</a>
                            </div>
                        </div>
                        <div class="product-card-info">
                            <div>
                                <div class="product-card-category">Running / Active</div>
                                <a href="#" class="product-card-title">RDN Sports Society Men Short Sleeve Running Jersey Blue</a>
                            </div>
                            <p class="product-card-price">
                                <span class="sale-price">Rp 399.000</span>
                                <span class="old-price">Rp 499.000</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="col-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-card-img-wr">
                            <img src="/images/hero_road_bike.png" alt="Aero Stealth Road Bike">
                            <div class="product-card-overlay">
                                <a href="#" class="btn btn-turquoise py-2 px-4" style="font-size: 0.8rem;">Quick Shop</a>
                            </div>
                        </div>
                        <div class="product-card-info">
                            <div>
                                <div class="product-card-category">Racing Bikes</div>
                                <a href="#" class="product-card-title">RDN Carbon Race Bike - Aero Stealth Matte Edition</a>
                            </div>
                            <p class="product-card-price">Rp 45.000.000</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="#" class="btn btn-turquoise" style="background-color: var(--rdn-dark); border-color: var(--rdn-dark);">Lihat Semua Produk</a>
            </div>
        </div>
    </section>

    <!-- Custom Jersey Sublimation Banner Section -->
    <section class="custom-banner" id="customJerseySection">
        <div class="custom-banner-bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="section-subtitle text-white opacity-75">RDN Custom Apparel Service</span>
                    <h3>Buat Jersey <span>Desain Sendiri</span></h3>
                    <p>Wujudkan desain jersey impian untuk komunitas, tim olahraga, event, atau kebutuhan personal Anda dengan jaminan cetak tajam, bahan aero-fit, dan tanpa minimal order.</p>
                    
                    <div class="row">
                        <!-- Step 1 -->
                        <div class="col-sm-6 step-item d-flex align-items-start">
                            <div class="step-num">01</div>
                            <div>
                                <h5 class="step-title">Tanpa Minimal Order</h5>
                                <p class="step-desc">Pesan mulai dari 1 pcs, cocok untuk kebutuhan eksklusif Anda.</p>
                            </div>
                        </div>
                        <!-- Step 2 -->
                        <div class="col-sm-6 step-item d-flex align-items-start">
                            <div class="step-num">02</div>
                            <div>
                                <h5 class="step-title">Desainer Profesional</h5>
                                <p class="step-desc">Konsultasi ide dan tata letak secara gratis dengan tim kami.</p>
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div class="col-sm-6 step-item d-flex align-items-start">
                            <div class="step-num">03</div>
                            <div>
                                <h5 class="step-title">Bahan Premium Fit</h5>
                                <p class="step-desc">Kombinasi bahan berpori, cepat kering, dan sangat elastis.</p>
                            </div>
                        </div>
                        <!-- Step 4 -->
                        <div class="col-sm-6 step-item d-flex align-items-start">
                            <div class="step-num">04</div>
                            <div>
                                <h5 class="step-title">Teknologi Sublimasi</h5>
                                <p class="step-desc">Tinta menyerap sempurna ke serat kain, anti-luntur & awet.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="https://wa.me/628123456789" target="_blank" class="btn btn-turquoise"><i class="bi bi-whatsapp me-2"></i> Hubungi Desainer Kami</a>
                    </div>
                </div>
                
                <div class="col-lg-5 offset-lg-1 d-none d-lg-block position-relative" style="z-index: 2;">
                    <div class="p-2 bg-white rounded-3 shadow-lg" style="transform: rotate(3deg);">
                        <img src="/images/category_jerseys.png" class="img-fluid rounded-3" alt="Jersey Custom RDN">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Stories / Blog Section -->
    <section class="py-5" id="storiesSection">
        <div class="container">
            <div class="section-title-wr text-center">
                <span class="section-subtitle">Kabar Terbaru & Event</span>
                <h2 class="section-title">Our Stories</h2>
            </div>
            
            <div class="row">
                <!-- Blog 1 -->
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
                <!-- Blog 2 -->
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
                <!-- Blog 3 -->
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
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h4>Gabung RDN Bikes Club</h4>
                    <p>Dapatkan informasi diskon jersey eksklusif, rilis unit sepeda terbaru, serta undangan event gowes komunitas kami langsung di inbox Anda.</p>
                </div>
                <div class="col-lg-6">
                    <form class="newsletter-form d-flex">
                        <input type="email" class="form-control" placeholder="Masukkan alamat email Anda" required>
                        <button type="submit" class="btn btn-turquoise" style="background-color: var(--rdn-dark); border-color: var(--rdn-dark);">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
