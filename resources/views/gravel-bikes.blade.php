@extends('layouts.app')

@section('title', 'Gravel Bikes - RDN Bikes')

@section('content')
<!-- Page Hero Banner -->
<section class="position-relative py-5 text-white d-flex align-items-center" style="min-height: 350px; background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('/images/category_gravel.png') center/cover no-repeat;">
    <div class="container text-center py-5">
        <span class="text-uppercase fw-bold text-turquoise mb-2 d-inline-block" style="font-family: var(--font-display); font-size: 0.85rem; letter-spacing: 3px;">Explore Without Limits</span>
        <h1 class="display-4 fw-extrabold text-uppercase mb-3" style="font-family: var(--font-display); letter-spacing: 1px;">Gravel Bikes</h1>
        <p class="lead mx-auto mb-0" style="max-width: 600px; font-weight: 300; font-size: 1.1rem; line-height: 1.6;">Solusi serba guna untuk aspal kasar maupun jalan tanah berlumpur. Dilengkapi ban lebar bercelah lumpur tinggi dan rasio transmisi menanjak ringan.</p>
    </div>
</section>

<!-- Breadcrumbs & Stats Info -->
<section class="py-3 bg-light border-bottom">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.85rem; font-family: var(--font-display); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Bikes</a></li>
                <li class="breadcrumb-item active text-turquoise" aria-current="page">Gravel Bikes</li>
            </ol>
        </nav>
        <span class="text-muted" style="font-size: 0.85rem;">Menampilkan {{ count($products) }} Model Sepeda Gravel Adventure</span>
    </div>
</section>

<!-- Products Collection -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-md-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-card-img-wr">
                            @if(isset($product['stock']) && $product['stock'] <= 0)
                                <span class="product-badge bg-danger text-white text-uppercase shadow-sm" style="font-size: 0.65rem; padding: 4px 8px; font-weight: bold; border-radius: 0; letter-spacing: 0.5px; z-index: 10;">SOLD OUT</span>
                            @else
                                <span class="product-badge badge-sale">Premium</span>
                            @endif
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" @if(isset($product['stock']) && $product['stock'] <= 0) style="filter: grayscale(0.8) opacity(0.5);" @endif>
                            <div class="product-card-overlay">
                                <a href="{{ route('products.show', $product['slug']) }}" class="btn btn-turquoise py-2 px-3 me-2" style="font-size: 0.75rem;"><i class="bi bi-eye me-1"></i> Detail</a>
                                @if(isset($product['stock']) && $product['stock'] > 0)
                                    <a href="https://wa.me/628123456789?text=Halo%20RDN%20Bikes,%20saya%20tertarik%20dengan%20{{ rawurlencode($product['name']) }}." target="_blank" class="btn btn-outline-light py-2 px-3" style="font-size: 0.75rem;"><i class="bi bi-whatsapp"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="product-card-info">
                            <div>
                                <div class="product-card-category">{{ $product['specs']['Frame'] ?? 'Carbon Gravel Bike' }}</div>
                                <a href="{{ route('products.show', $product['slug']) }}" class="product-card-title">{{ $product['name'] }}</a>
                                <p class="text-muted mb-3" style="font-size: 0.8rem; line-height: 1.4;">{{ $product['description'] }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="product-card-price mb-0">{{ $product['price'] }}</p>
                                @if(isset($product['stock']) && $product['stock'] <= 0)
                                    <span class="text-danger fw-bold" style="font-size: 0.72rem; font-family: var(--font-display);">HABIS</span>
                                @elseif(isset($product['stock']) && $product['stock'] <= 3)
                                    <span class="text-warning fw-bold" style="font-size: 0.72rem; font-family: var(--font-display);">LIMIT ({{ $product['stock'] }})</span>
                                @elseif(isset($product['stock']))
                                    <span class="text-turquoise fw-bold" style="font-size: 0.72rem; font-family: var(--font-display);">READY ({{ $product['stock'] }})</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Tidak ada produk sepeda gravel-bike yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Whatsapp CTA Section -->
<section class="py-5 bg-dark text-white text-center position-relative overflow-hidden">
    <div class="container py-4 position-relative" style="z-index: 2;">
        <h3 class="display-font text-uppercase text-white fw-bold mb-3">Konsultasi Setup Gearing & Tires</h3>
        <p class="text-muted-custom mx-auto mb-4" style="max-width: 600px; color: #bbbbbb;">Kami membantu mencocokkan konfigurasi drivetrain dan clearance ban terbaik sesuai medan gravel yang ingin Anda taklukkan.</p>
        <a href="https://wa.me/628123456789?text=Halo%20RDN%20Bikes,%20saya%20ingin%20konsultasi%20mengenai%20Setup%20Gravelbike." target="_blank" class="btn btn-turquoise px-5 py-3"><i class="bi bi-whatsapp me-2"></i> Hubungi WhatsApp Mechanic Specialist</a>
    </div>
</section>
@endsection
