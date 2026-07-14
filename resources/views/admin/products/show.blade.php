@extends('layouts.admin')

@section('title', 'Detail Produk Sepeda - ' . $product->name)

@section('content')
<div class="mb-4 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3">
    <div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-custom mb-3"><i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar</a>
        <span class="text-uppercase text-muted fw-bold d-block" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Katalog Produk</span>
        <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">{{ $product->name }}</h2>
    </div>
    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-turquoise"><i class="bi bi-pencil-square me-2"></i> Edit Sepeda Ini</a>
</div>

<div class="row">
    <!-- Left Column: General Info & Features -->
    <div class="col-lg-6 mb-4">
        <!-- General Info Card -->
        <div class="card card-custom mb-4">
            <div class="card-header">
                Informasi Utama Produk
            </div>
            <div class="card-body">
                <table class="table table-borderless align-middle mb-0" style="font-size: 0.85rem;">
                    <tr>
                        <th class="ps-0 text-muted" style="width: 150px;">Nama Produk</th>
                        <td class="fw-bold text-dark">: {{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Slug Handle</th>
                        <td class="text-turquoise fw-semibold">: {{ $product->slug }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Kategori</th>
                        <td>: {{ $product->category ? $product->category->name : 'Bikes' }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Sub Kategori</th>
                        <td>: 
                            <span class="badge badge-custom {{ $product->subcategory == 'Road Bikes' ? 'badge-dark bg-primary' : 'badge-turquoise text-turquoise border-turquoise' }} text-uppercase" style="font-size: 0.65rem;">
                                {{ $product->subcategory }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Harga Jual Full Bike</th>
                        <td class="fw-bold text-dark" style="font-size: 1.1rem;">: Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Penjualan Frame Only</th>
                        <td>: 
                            @if($product->allow_frame_only)
                                <span class="badge badge-custom badge-turquoise text-turquoise border-turquoise text-uppercase" style="font-size: 0.65rem;">Tersedia</span>
                                <span class="fw-bold text-dark ms-2" style="font-size: 1.0rem;">Rp {{ number_format($product->frame_only_price, 0, ',', '.') }}</span>
                            @else
                                <span class="badge bg-secondary text-white text-uppercase" style="font-size: 0.65rem; padding: 3px 8px; border-radius: 0;">Tidak Tersedia</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Stok Tersedia</th>
                        <td>: 
                            @if(($product->total_stock ?? 0) <= 0)
                                <span class="badge bg-danger text-white text-uppercase" style="font-size: 0.65rem; padding: 3px 8px; border-radius: 0;">Habis</span>
                            @elseif(($product->total_stock ?? 0) <= 3)
                                <span class="badge bg-warning text-dark text-uppercase" style="font-size: 0.65rem; padding: 3px 8px; border-radius: 0;">Menipis ({{ $product->total_stock }} Unit)</span>
                            @else
                                <span class="badge bg-success text-white text-uppercase" style="font-size: 0.65rem; padding: 3px 8px; border-radius: 0;">Tersedia ({{ $product->total_stock }} Unit)</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted" valign="top">Deskripsi</th>
                        <td class="text-muted" style="line-height: 1.6;">: {{ $product->description }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Features Checklist Card -->
        <div class="card card-custom">
            <div class="card-header">
                Daftar Keunggulan Utama
            </div>
            <div class="card-body">
                @if(is_array($product->features) && count($product->features) > 0)
                    <ul class="list-group list-group-flush" style="font-size: 0.85rem;">
                        @foreach($product->features as $feature)
                            <li class="list-group-item px-0 py-2 border-0 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-turquoise me-2 mt-0.5"></i>
                                <span class="text-muted">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0" style="font-size: 0.85rem;">Belum ada daftar keunggulan yang dicantumkan untuk produk ini.</p>
                @endif
            </div>
        </div>

        <!-- Stock Variant Manager Card -->
        <div class="card card-custom mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Manajemen Stok & Varian</span>
                <button type="button" class="btn btn-turquoise btn-sm py-1 px-2" data-bs-toggle="collapse" data-bs-target="#addNewVariantCollapse" aria-expanded="false" style="font-size: 0.75rem;">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Varian
                </button>
            </div>
            <div class="card-body">
                <!-- Add Variant Collapse Form -->
                <div class="collapse mb-4 p-3 border" id="addNewVariantCollapse" style="background-color: #fcfcfc;">
                    <h6 class="fw-bold text-uppercase display-font text-turquoise mb-3" style="font-size: 0.8rem;">Tambah Varian Baru</h6>
                    <form action="{{ route('admin.products.stocks.store', $product->id) }}" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label class="form-label text-muted mb-1" style="font-size: 0.75rem;">Ukuran (Size)</label>
                                <input type="text" name="size" class="form-control form-control-custom py-1.5" placeholder="Contoh: S, M, L" style="font-size: 0.8rem;">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted mb-1" style="font-size: 0.75rem;">Warna (Color)</label>
                                <input type="text" name="color" class="form-control form-control-custom py-1.5" placeholder="Contoh: Hitam" style="font-size: 0.8rem;">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted mb-1" style="font-size: 0.75rem;">Stok (Qty) <span class="text-danger">*</span></label>
                                <input type="number" name="qty" class="form-control form-control-custom py-1.5" placeholder="0" min="0" required style="font-size: 0.8rem;">
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-dark-custom btn-sm py-1.5 px-3" style="font-size: 0.78rem;">Simpan Varian</button>
                        </div>
                    </form>
                </div>

                <!-- Existing Variants Table -->
                <div class="table-responsive">
                    <table class="table table-sm align-middle text-center mb-0" style="font-size: 0.8rem;">
                        <thead class="table-light">
                            <tr>
                                <th>Ukuran</th>
                                <th>Warna</th>
                                <th style="width: 150px;">Jumlah Stok</th>
                                <th style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($product->stocks as $stockItem)
                                <tr>
                                    <td class="fw-bold">{{ $stockItem->size ?? '-' }}</td>
                                    <td>{{ $stockItem->color ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('admin.products.stocks.update', [$product->id, $stockItem->id]) }}" method="POST" class="d-flex align-items-center justify-content-center">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="qty" value="{{ $stockItem->qty }}" min="0" required class="form-control form-control-custom text-center py-1 px-1 me-1" style="width: 70px; font-size: 0.78rem; height: auto; border: 1px solid #ced4da;">
                                            <button type="submit" class="btn btn-sm btn-outline-success p-1" title="Update Stok" style="line-height: 1;"><i class="bi bi-check-lg" style="font-size: 0.75rem;"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.products.stocks.destroy', [$product->id, $stockItem->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus varian stok ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2" style="font-size: 0.7rem;">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted py-3">Belum ada varian stok terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Specs & Image Fallback -->
    <div class="col-lg-6">
        <!-- Specs Table Card -->
        <div class="card card-custom mb-4">
            <div class="card-header">
                Spesifikasi Teknis
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0" style="font-size: 0.85rem;">
                        <thead class="table-dark text-uppercase" style="font-family: var(--font-display); font-size: 0.7rem; letter-spacing: 0.5px;">
                            <tr>
                                <th class="py-2 px-3" style="width: 140px;">Komponen</th>
                                <th class="py-2 px-3">Spesifikasi Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(is_array($product->specs))
                                @foreach($product->specs as $key => $val)
                                    <tr>
                                        <td class="py-2 px-3 fw-bold text-muted">{{ $key }}</td>
                                        <td class="py-2 px-3 text-dark">{{ $val ?: '-' }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2" class="py-3 text-center text-muted">Spesifikasi tidak tersedia.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Image Preview Card -->
        <div class="card card-custom">
            <div class="card-header">
                Pratinjau Gambar Display
            </div>
            <div class="card-body text-center bg-light py-4">
                <div class="position-relative d-inline-block image-hover-zoom" style="cursor: zoom-in;" data-bs-toggle="modal" data-bs-target="#imagePreviewModal">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid border p-2 bg-white" style="max-height: 200px; object-fit: contain; transition: transform 0.2s ease;">
                    <div class="image-zoom-overlay d-flex align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100 opacity-0 bg-dark bg-opacity-25 text-white" style="transition: opacity 0.2s ease;">
                        <i class="bi bi-zoom-in fs-4"></i>
                    </div>
                </div>
                <div class="form-text text-muted mt-2">Klik gambar untuk melihat resolusi penuh. Source: <code>{{ $product->image }}</code></div>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Modal -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0 border-0 bg-transparent">
            <div class="modal-header border-0 p-2 d-flex justify-content-end bg-dark">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 text-center bg-white border border-dark">
                <div class="p-3 bg-light border-bottom text-start">
                    <h5 class="modal-title display-font text-uppercase fw-bold m-0" id="imagePreviewModalLabel" style="font-size: 0.9rem;">Pratinjau Gambar: {{ $product->name }}</h5>
                </div>
                <div class="p-4 bg-light d-flex align-items-center justify-content-center" style="min-height: 300px;">
                    <img src="{{ $product->image }}" class="img-fluid border shadow-sm" style="max-height: 70vh; object-fit: contain;" alt="{{ $product->name }}">
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .image-hover-zoom:hover img {
        transform: scale(1.03);
    }
    .image-hover-zoom:hover .image-zoom-overlay {
        opacity: 1 !important;
    }
</style>
@endsection
