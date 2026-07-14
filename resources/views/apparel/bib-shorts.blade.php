@extends('layouts.app')

@section('title', 'Bib Shorts - RDN Bikes')

@section('content')
<!-- Page Hero Banner -->
<section class="position-relative py-5 text-white d-flex align-items-center" style="min-height: 350px; background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/images/hero_cyclists.png') center/cover no-repeat;">
    <div class="container text-center py-5">
        <span class="text-uppercase fw-bold text-turquoise mb-2 d-inline-block" style="font-family: var(--font-display); font-size: 0.85rem; letter-spacing: 3px;">Ergonomic Support</span>
        <h1 class="display-4 fw-extrabold text-uppercase mb-3" style="font-family: var(--font-display); letter-spacing: 1px;">Bib Shorts</h1>
        <p class="lead mx-auto mb-0" style="max-width: 600px; font-weight: 300; font-size: 1.1rem; line-height: 1.6;">Didesain dengan padding multi-density ergonomis dan strap rajut elastis untuk meminimalisir tekanan sadel pada perjalanan berdurasi panjang.</p>
    </div>
</section>

<!-- Breadcrumbs & Stats Info -->
<section class="py-3 bg-light border-bottom">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.85rem; font-family: var(--font-display); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Apparel</a></li>
                <li class="breadcrumb-item active text-turquoise" aria-current="page">Bib Shorts</li>
            </ol>
        </nav>
        <span class="text-muted" style="font-size: 0.85rem;">Menampilkan {{ count($products) }} Model Celana Bib Premium</span>
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
                                <div class="product-card-category">{{ $product['specs']['Material'] ?? 'Premium Chamois' }}</div>
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
                    <p class="text-muted">Tidak ada produk celana bib-shorts yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Size Chart Info Section -->
<section class="py-5 bg-light border-top">
    <div class="container text-center">
        <h4 class="display-font text-uppercase fw-bold mb-3"><i class="bi bi-rulers text-turquoise me-2"></i>Panduan Memilih Ukuran Celana Bib</h4>
        <p class="text-muted mx-auto mb-4" style="max-width: 600px; font-size: 0.9rem;">Untuk ukuran pinggul dan paha yang padat/berotot, disarankan memilih satu nomor di atas ukuran standar (Size Up) demi sirkulasi darah otot yang lebih lancar saat kayuhan intensif.</p>
        <a href="https://wa.me/628123456789?text=Halo%20RDN%20Bikes,%20saya%20butuh%20panduan%20fitting%20ukuran%20bibshorts." target="_blank" class="btn btn-outline-dark py-2 px-4 text-uppercase font-family-1" style="font-size: 0.8rem; font-weight: 700; letter-spacing: 1px;"><i class="bi bi-chat-dots me-2"></i>Konsultasi Ukuran Dengan Admin</a>
    </div>
</section>
@endsection
