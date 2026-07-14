@extends('layouts.admin')

@section('title', 'Manajemen Stok & Varian Barang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1 text-dark fw-bold display-font">Stok & Varian Barang</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.8rem;">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Stok & Varian</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Filter and Search Row -->
<div class="card card-custom mb-4">
    <div class="card-body py-3">
        <form action="{{ route('admin.stocks.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white" style="border: 1px solid #ced4da; border-right: none; border-radius: 0;">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" 
                           name="search" 
                           class="form-control form-control-custom" 
                           placeholder="Cari produk, ukuran, atau warna..." 
                           value="{{ $search }}">
                </div>
            </div>
            
            <div class="col-md-4">
                <select name="category_id" class="form-select form-control-custom">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $categoryId == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-dark-custom flex-grow-1 py-2"><i class="bi bi-filter me-1"></i> Filter</button>
                @if($search || $categoryId)
                    <a href="{{ route('admin.stocks.index') }}" class="btn btn-outline-custom py-2" title="Reset"><i class="bi bi-arrow-clockwise"></i></a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Stock Grid/Table -->
<div class="card card-custom mb-4">
    <div class="card-header">
        Daftar Varian & Jumlah Stok
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th style="width: 80px;">Gambar</th>
                        <th>Nama Produk</th>
                        <th style="width: 150px;">Kategori</th>
                        <th style="width: 100px;">Ukuran</th>
                        <th style="width: 120px;">Warna</th>
                        <th style="width: 180px; text-align: center;">Jumlah Stok</th>
                        <th style="width: 120px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stocks as $stock)
                        <tr>
                            <td><strong>#{{ $stock->id }}</strong></td>
                            <td>
                                <div class="bg-light p-1 border text-center" style="width: 60px; height: 45px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ $stock->product->image }}" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                </div>
                            </td>
                            <td>
                                <span class="fw-bold display-font text-uppercase" style="font-size: 0.85rem; color: var(--rdn-dark);">
                                    {{ $stock->product->name }}
                                </span>
                                <div class="text-turquoise fw-semibold" style="font-size: 0.72rem;">{{ $stock->product->slug }}</div>
                            </td>
                            <td>
                                <span class="badge badge-custom badge-turquoise text-turquoise border-turquoise text-uppercase" style="font-size: 0.65rem; font-family: var(--font-display);">
                                    {{ $stock->product->category ? $stock->product->category->name : 'Uncategorized' }}
                                </span>
                            </td>
                            <td><span class="fw-bold">{{ $stock->size ?? '-' }}</span></td>
                            <td>{{ $stock->color ?? '-' }}</td>
                            <td>
                                <form action="{{ route('admin.products.stocks.update', [$stock->product_id, $stock->id]) }}" method="POST" class="d-flex align-items-center justify-content-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" 
                                           name="qty" 
                                           value="{{ $stock->qty }}" 
                                           min="0" 
                                           required 
                                           class="form-control form-control-custom text-center py-1 px-1 me-1" 
                                           style="width: 80px; font-size: 0.8rem; height: auto; border: 1px solid #ced4da;">
                                    <button type="submit" class="btn btn-sm btn-outline-success p-1" title="Update Stok" style="line-height: 1;"><i class="bi bi-check-lg" style="font-size: 0.8rem;"></i></button>
                                </form>
                            </td>
                            <td style="text-align: right;">
                                <form action="{{ route('admin.products.stocks.destroy', [$stock->product_id, $stock->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus varian stok ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2.5" style="font-size: 0.75rem;">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">Tidak ada varian stok produk terdaftar yang cocok dengan pencarian Anda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination Linkage -->
<div class="d-flex justify-content-between align-items-center mt-3 mb-4">
    <div class="text-muted" style="font-size: 0.8rem;">
        Menampilkan {{ $stocks->firstItem() ?? 0 }} sampai {{ $stocks->lastItem() ?? 0 }} dari {{ $stocks->total() }} varian stok.
    </div>
    <div>
        {{ $stocks->appends(request()->query())->links() }}
    </div>
</div>
@endsection
