@extends('layouts.admin')

@section('title', 'Kelola Kategori Produk - RDN Bikes Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="display-font text-uppercase fw-extrabold mb-1">Kategori Produk</h4>
        <p class="text-muted mb-0" style="font-size: 0.85rem;">Kelola master kategori klasifikasi produk sepeda dan pakaian (apparel) RDN Bikes.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-turquoise text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;"><i class="bi bi-plus-circle me-2"></i> Tambah Kategori</a>
</div>

<!-- Filter & Search Bar -->
<div class="card card-custom border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <form action="{{ route('admin.categories.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-4 col-sm-8">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Cari nama atau deskripsi..." value="{{ $search }}" style="font-size: 0.85rem;">
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <button type="submit" class="btn btn-dark-custom btn-sm w-100 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Cari</button>
            </div>
            @if($search)
                <div class="col-md-2">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-sm w-100 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Reset</a>
                </div>
            @endif
        </form>
    </div>
</div>

<!-- Categories Table -->
<div class="card card-custom border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.85rem;">
                <thead class="table-dark text-uppercase" style="font-family: var(--font-display); font-size: 0.7rem; letter-spacing: 0.5px;">
                    <tr>
                        <th class="py-3 px-4" style="width: 80px;">ID</th>
                        <th class="py-3 px-4">Nama Kategori</th>
                        <th class="py-3 px-4">Slug Handle</th>
                        <th class="py-3 px-4">Deskripsi</th>
                        <th class="py-3 px-4 text-end" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="py-3 px-4 fw-bold text-muted">#{{ $category->id }}</td>
                            <td class="py-3 px-4 fw-bold text-dark">{{ $category->name }}</td>
                            <td class="py-3 px-4 text-turquoise fw-semibold">{{ $category->slug }}</td>
                            <td class="py-3 px-4 text-muted">{{ Str::limit($category->description, 75) ?: '-' }}</td>
                            <td class="py-3 px-4 text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-dark" title="Edit Kategori"><i class="bi bi-pencil-square"></i></a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus Kategori" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal{{ $category->id }}"><i class="bi bi-trash"></i></button>
                                </div>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-0 border-0 text-start">
                                            <div class="modal-header border-0 bg-dark text-white rounded-0 py-3">
                                                <h5 class="modal-title text-uppercase fw-bold mb-0" id="deleteCategoryModalLabel{{ $category->id }}" style="font-family: var(--font-display); font-size: 0.9rem; letter-spacing: 1px;"><i class="bi bi-exclamation-triangle-fill text-danger me-2"></i> Hapus Kategori</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body py-4">
                                                <p class="mb-0 text-muted">Apakah Anda yakin ingin menghapus kategori produk <strong>{{ $category->name }}</strong>? Tindakan ini tidak dapat dibatalkan.</p>
                                            </div>
                                            <div class="modal-footer border-0 pt-0 pb-4 d-flex justify-content-end gap-2">
                                                <button type="button" class="btn btn-outline-dark btn-sm rounded-0 text-uppercase fw-bold" data-bs-dismiss="modal" style="font-size: 0.7rem; letter-spacing: 0.5px;">Batal</button>
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm rounded-0 text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">Ya, Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-5 text-center text-muted">
                                <i class="bi bi-tags display-5 d-block mb-3"></i>
                                Tidak ada data kategori ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination Links -->
<div class="mt-3">
    {{ $categories->appends(['search' => $search])->links() }}
</div>
@endsection
