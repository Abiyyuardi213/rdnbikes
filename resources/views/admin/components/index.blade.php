@extends('layouts.admin')

@section('title', 'Kelola Komponen Sepeda')

@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
    <div>
        <span class="text-uppercase text-muted fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Katalog Produk</span>
        <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Daftar Komponen Sepeda</h2>
    </div>
    <a href="{{ route('admin.components.create') }}" class="btn btn-turquoise"><i class="bi bi-plus-lg me-2"></i> Tambah Komponen Baru</a>
</div>

<div class="card card-custom">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center gap-3">
        <span>Tabel Pengaturan Unit Komponen / Suku Cadang</span>
        
        <!-- Search Form -->
        <form action="{{ route('admin.components.index') }}" method="GET" class="d-flex flex-column flex-sm-row gap-2">
            <select name="subcategory" class="form-select form-control-custom" style="min-width: 200px;">
                <option value="">Semua Sub Kategori</option>
                <option value="Groupsets" {{ $subcategory == 'Groupsets' ? 'selected' : '' }}>Groupsets</option>
                <option value="Wheelsets" {{ $subcategory == 'Wheelsets' ? 'selected' : '' }}>Wheelsets</option>
                <option value="Cockpit Parts" {{ $subcategory == 'Cockpit Parts' ? 'selected' : '' }}>Cockpit Parts</option>
                <option value="Saddles" {{ $subcategory == 'Saddles' ? 'selected' : '' }}>Saddles</option>
                <option value="Other Components" {{ $subcategory == 'Other Components' ? 'selected' : '' }}>Other Components</option>
            </select>
            <div class="d-flex gap-2">
                <input type="text" name="search" class="form-control form-control-custom" placeholder="Cari nama komponen..." value="{{ $search }}" style="width: 220px;">
                <button type="submit" class="btn btn-dark-custom py-2"><i class="bi bi-search"></i></button>
                @if($search || $subcategory)
                    <a href="{{ route('admin.components.index') }}" class="btn btn-outline-custom py-2" title="Reset Pencarian"><i class="bi bi-arrow-clockwise"></i></a>
                @endif
            </div>
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="table table-custom table-hover">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th style="width: 100px;">Gambar</th>
                    <th>Nama Komponen</th>
                    <th style="width: 180px;">Sub Kategori</th>
                    <th style="width: 180px;">Harga</th>
                    <th style="width: 120px;">Stok</th>
                    <th>Brand & Berat</th>
                    <th style="text-align: right; width: 320px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td><strong>#{{ $product->id }}</strong></td>
                        <td>
                            <div class="bg-light p-1 border text-center" style="width: 70px; height: 50px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ $product->image }}" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            </div>
                        </td>
                        <td>
                            <span class="fw-bold display-font text-uppercase" style="font-size: 0.85rem; color: var(--rdn-dark);">
                                {{ $product->name }}
                            </span>
                            <div class="text-turquoise fw-semibold" style="font-size: 0.75rem;">{{ $product->slug }}</div>
                        </td>
                        <td>
                            <span class="badge badge-custom badge-turquoise text-turquoise border-turquoise text-uppercase" style="font-size: 0.7rem; font-family: var(--font-display);">
                                {{ $product->subcategory }}
                            </span>
                        </td>
                        <td>
                            <strong class="text-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
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
                                    <strong>Brand:</strong> {{ Str::limit($product->specs['Brand'] ?? '-', 35) }}<br>
                                    @if(isset($product->specs['Weight']))
                                        <strong>Berat:</strong> {{ Str::limit($product->specs['Weight'], 35) }}
                                    @endif
                                </div>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('admin.components.show', $product->id) }}" class="btn btn-sm btn-outline-custom py-2 px-3" title="Detail Komponen">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('admin.components.edit', $product->id) }}" class="btn btn-sm btn-outline-custom py-2 px-3" title="Edit Komponen">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.components.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komponen \'{{ $product->name }}\'? Tindakan ini tidak dapat dibatalkan.')" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-dark-custom py-2 px-3 text-white bg-danger border-danger" title="Hapus Komponen">
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
                            Tidak ada komponen sepeda yang ditemukan.
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
