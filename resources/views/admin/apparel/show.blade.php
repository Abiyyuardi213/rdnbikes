@extends('layouts.admin')

@section('title', 'Detail Produk Apparel')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.apparel.index') }}" class="btn btn-sm btn-outline-custom mb-3"><i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar</a>
    <span class="text-uppercase text-muted fw-bold d-block" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Katalog Produk</span>
    <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Detail Apparel #{{ $product->id }}</h2>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Main Info Card -->
        <div class="card card-custom mb-4">
            <div class="card-header">
                Informasi Utama Produk Apparel
            </div>
            <div class="card-body">
                <table class="table table-borderless align-middle mb-0" style="font-size: 0.85rem;">
                    <tr>
                        <th class="ps-0 text-muted" style="width: 150px;">Nama Apparel</th>
                        <td class="fw-bold text-dark">: {{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Slug Handle</th>
                        <td class="text-turquoise fw-semibold">: {{ $product->slug }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Kategori</th>
                        <td>: {{ $product->category ? $product->category->name : 'Apparel' }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Sub Kategori</th>
                        <td>: 
                            <span class="badge badge-custom badge-turquoise text-turquoise border-turquoise text-uppercase" style="font-size: 0.65rem;">
                                {{ $product->subcategory }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th class="ps-0 text-muted">Harga Jual</th>
                        <td class="fw-bold text-dark" style="font-size: 1.1rem;">: Rp {{ number_format($product->price, 0, ',', '.') }}</td>
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
        <div class="card card-custom mb-4">
            <div class="card-header">
                Daftar Keunggulan Utama
            </div>
            <div class="card-body">
                @if(is_array($product->features) && count($product->features) > 0)
                    <ul class="list-unstyled mb-0 row g-2">
                        @foreach($product->features as $feature)
                            <li class="col-md-6 d-flex align-items-center mb-1 text-muted" style="font-size: 0.85rem;">
                                <i class="bi bi-check-circle-fill text-turquoise me-2 fs-6"></i>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-muted" style="font-size: 0.85rem;">Tidak ada daftar keunggulan spesifik yang ditambahkan.</span>
                @endif
            </div>
        </div>

        <!-- Stock Variant Manager Card -->
        <div class="card card-custom mb-4">
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

        <!-- Specs Details Card -->
        <div class="card card-custom mb-4">
            <div class="card-header">
                Spesifikasi Teknis
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0" style="font-size: 0.85rem;">
                    <tbody>
                        @if(is_array($product->specs))
                            @foreach($product->specs as $key => $val)
                                @if(!empty($val))
                                    <tr>
                                        <td class="fw-bold text-uppercase text-dark py-2 px-4" style="width: 30%;">{{ $key }}</td>
                                        <td class="text-muted py-2 px-4">{{ $val }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" class="text-center text-muted py-3">Tidak ada data spesifikasi teknis.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right Column: Sidebar Action & Image Preview -->
    <div class="col-lg-4">
        <!-- Image Card -->
        <div class="card card-custom mb-4">
            <div class="card-header">
                Pratinjau Gambar Apparel
            </div>
            <div class="card-body text-center bg-light">
                <div class="p-3 border bg-white mx-auto d-flex align-items-center justify-content-center" style="max-width: 250px; height: 200px; overflow: hidden;">
                    <img src="{{ $product->image }}" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                </div>
                <div class="mt-3">
                    <span class="text-uppercase text-muted fw-bold d-block" style="font-size: 0.7rem;">File Path / Source:</span>
                    <code style="font-size: 0.8rem; word-break: break-all;">{{ $product->image }}</code>
                </div>
            </div>
        </div>

        <!-- Administration Card -->
        <div class="card card-custom">
            <div class="card-header">
                Aksi Administratif
            </div>
            <div class="card-body d-grid gap-2">
                <a href="{{ route('admin.apparel.edit', $product->id) }}" class="btn btn-outline-custom py-2"><i class="bi bi-pencil-square me-2"></i> Edit Data Apparel</a>
                <hr class="my-2">
                <form action="{{ route('admin.apparel.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk apparel \'{{ $product->name }}\'? Tindakan ini tidak dapat dibatalkan.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100 py-2 text-white bg-danger border-danger"><i class="bi bi-trash me-2"></i> Hapus Produk</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
