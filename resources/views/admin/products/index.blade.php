@extends('layouts.admin')

@section('title', 'Kelola Produk Sepeda')

@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
    <div>
        <span class="text-uppercase text-muted fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Katalog Produk</span>
        <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Daftar Produk Sepeda</h2>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-turquoise"><i class="bi bi-plus-lg me-2"></i> Tambah Sepeda Baru</a>
</div>

<div class="card card-custom">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center gap-3">
        <span>Tabel Pengaturan Unit Sepeda</span>
        
        <!-- Search Form -->
        <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex flex-column flex-sm-row gap-2">
            <select name="subcategory" class="form-select form-control-custom" style="min-width: 180px;">
                <option value="">Semua Sub Kategori</option>
                <option value="Road Bikes" {{ $subcategory == 'Road Bikes' ? 'selected' : '' }}>Road Bikes</option>
                <option value="Gravel Bikes" {{ $subcategory == 'Gravel Bikes' ? 'selected' : '' }}>Gravel Bikes</option>
            </select>
            <div class="d-flex gap-2">
                <input type="text" name="search" class="form-control form-control-custom" placeholder="Cari nama sepeda..." value="{{ $search }}" style="width: 220px;">
                <button type="submit" class="btn btn-dark-custom py-2"><i class="bi bi-search"></i></button>
                @if($search || $subcategory)
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-custom py-2" title="Reset Pencarian"><i class="bi bi-arrow-clockwise"></i></a>
                @endif
            </div>
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="table table-custom table-hover">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Nama Sepeda</th>
                    <th style="width: 150px;">Sub Kategori</th>
                    <th style="width: 180px;">Harga</th>
                    <th style="width: 120px;">Stok</th>
                    <th>Frame & Groupset</th>
                    <th style="text-align: right; width: 320px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td><strong>#{{ $product->id }}</strong></td>
                        <td>
                            <span class="fw-bold display-font text-uppercase" style="font-size: 0.85rem; color: var(--rdn-dark);">
                                {{ $product->name }}
                            </span>
                            <div class="text-turquoise fw-semibold" style="font-size: 0.75rem;">{{ $product->slug }}</div>
                        </td>
                        <td>
                            <span class="badge badge-custom {{ $product->subcategory == 'Road Bikes' ? 'badge-dark bg-primary' : 'badge-turquoise text-turquoise border-turquoise' }} text-uppercase" style="font-size: 0.7rem; font-family: var(--font-display);">
                                {{ $product->subcategory }}
                            </span>
                        </td>
                        <td>
                            <strong class="text-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
                            @if($product->allow_frame_only)
                                <div class="text-turquoise fw-semibold mt-1" style="font-size: 0.72rem; line-height: 1.2;">
                                    <i class="bi bi-tag-fill me-0.5"></i> Frame Only:<br>Rp {{ number_format($product->frame_only_price, 0, ',', '.') }}
                                </div>
                            @endif
                        </td>
                        <td>
                            @if(($product->total_stock ?? 0) <= 0)
                                <span class="badge bg-danger text-white">Habis</span>
                            @elseif(($product->total_stock ?? 0) <= 3)
                                <span class="badge bg-warning text-dark">{{ $product->total_stock }} (Menipis)</span>
                            @else
                                <span class="badge bg-success text-white">{{ $product->total_stock }} Unit</span>
                            @endif
                        </td>
                        <td>
                            @if(is_array($product->specs))
                                <div class="text-muted" style="font-size: 0.8rem; line-height: 1.4;">
                                    <strong>Frame:</strong> {{ Str::limit($product->specs['Frame'] ?? '-', 35) }}<br>
                                    <strong>Groupset:</strong> {{ Str::limit($product->specs['Groupset'] ?? '-', 35) }}
                                </div>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-outline-custom py-2 px-3" title="Detail Sepeda">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-custom py-2 px-3" title="Edit Sepeda">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk sepeda \'{{ $product->name }}\'? Tindakan ini tidak dapat dibatalkan.')" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-dark-custom py-2 px-3 text-white bg-danger border-danger" title="Hapus Sepeda">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-search fs-1 d-block mb-3"></i>
                            Tidak ada produk sepeda yang ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($products->hasPages())
        <div class="card-footer bg-white border-top py-3">
            <div class="d-flex justify-content-center">
                {{ $products->appends(['search' => $search, 'subcategory' => $subcategory])->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
