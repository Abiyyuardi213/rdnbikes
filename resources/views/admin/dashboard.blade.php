@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="mb-4">
    <span class="text-uppercase text-muted fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Ikhtisar Sistem</span>
    <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Dashboard Utama</h2>
</div>

<div class="row g-4">
    <!-- Stat Card 1: Users -->
    <div class="col-sm-6 col-xl-3">
        <div class="card card-custom border-start border-4 border-dark h-100 mb-0">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 0.5px;">Total Users</h6>
                    <p class="h2 display-font mb-0 fw-extrabold">{{ $stats['total_users'] }}</p>
                </div>
                <div class="bg-light p-3 border">
                    <i class="bi bi-people fs-4 text-dark"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stat Card 2: Roles -->
    <div class="col-sm-6 col-xl-3">
        <div class="card card-custom border-start border-4" style="border-left-color: var(--rdn-turquoise) !important; h-100; margin-bottom: 0;">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 0.5px;">Total Roles</h6>
                    <p class="h2 display-font mb-0 fw-extrabold">{{ $stats['total_roles'] }}</p>
                </div>
                <div class="bg-light p-3 border">
                    <i class="bi bi-shield-check fs-4 text-dark"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stat Card 3: Active Products -->
    <div class="col-sm-6 col-xl-3">
        <div class="card card-custom border-start border-4 border-dark h-100 mb-0">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 0.5px;">Active Products</h6>
                    <p class="h2 display-font mb-0 fw-extrabold">{{ $stats['active_products'] }}</p>
                </div>
                <div class="bg-light p-3 border">
                    <i class="bi bi-bicycle fs-4 text-dark"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stat Card 4: Pending Custom Orders -->
    <div class="col-sm-6 col-xl-3">
        <div class="card card-custom border-start border-4" style="border-left-color: var(--rdn-turquoise) !important; h-100; margin-bottom: 0;">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase text-muted fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 0.5px;">Custom Orders</h6>
                    <p class="h2 display-font mb-0 fw-extrabold">{{ $stats['pending_orders'] }}</p>
                </div>
                <div class="bg-light p-3 border">
                    <i class="bi bi-palette fs-4 text-dark"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-lg-8">
        <div class="card card-custom h-100 mb-0">
            <div class="card-header">
                Aktivitas Sistem RDN Bikes
            </div>
            <div class="card-body">
                <p class="text-muted">Selamat datang di sistem manajemen toko RDN Bikes. Di panel admin ini, Anda dapat mengelola akun pengguna, mendefinisikan hak akses peran (Roles), menerbitkan produk sepeda, serta memantau desain jersey custom sublimasi yang masuk dari sisi customer.</p>
                <hr>
                <h6 class="display-font text-uppercase mb-3" style="font-size: 0.85rem;">Panduan Singkat Modul Role & Akses</h6>
                <ul class="text-muted ps-3">
                    <li class="mb-2"><strong>admin</strong>: Akses penuh ke seluruh fitur dan pengaturan toko RDN Bikes.</li>
                    <li class="mb-2"><strong>staff</strong>: Mengurus operasional katalog produk, stok sepeda, dan approval pesanan apparel custom.</li>
                    <li><strong>customer</strong>: Peran default bagi pengguna yang mendaftar di situs depan untuk berbelanja.</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card card-custom h-100 mb-0">
            <div class="card-header">
                Tautan Cepat
            </div>
            <div class="card-body">
                <div class="d-grid gap-3">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-turquoise text-center"><i class="bi bi-shield-check me-2"></i> Kelola Role & Akses</a>
                    <a href="#" class="btn btn-dark-custom text-center"><i class="bi bi-people me-2"></i> Lihat Daftar Users</a>
                    <a href="/" target="_blank" class="btn btn-outline-custom text-center"><i class="bi bi-eye me-2"></i> Pratinjau Toko Utama</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
