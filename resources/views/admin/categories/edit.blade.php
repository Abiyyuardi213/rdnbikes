@extends('layouts.admin')

@section('title', 'Edit Kategori Produk - RDN Bikes Admin')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.categories.index') }}" class="text-decoration-none text-dark fw-bold" style="font-size: 0.8rem; font-family: var(--font-display); text-transform: uppercase; letter-spacing: 0.5px;"><i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar</a>
</div>

<div class="card card-custom border-0 shadow-sm col-lg-8">
    <div class="card-header bg-dark text-white rounded-0 py-3">
        <h5 class="card-title text-uppercase fw-bold mb-0" style="font-family: var(--font-display); font-size: 0.9rem; letter-spacing: 1px;"><i class="bi bi-pencil-square text-turquoise me-2"></i> Edit Detail Kategori</h5>
    </div>
    <div class="card-body p-4">
        <!-- Error Validation Alerts -->
        @if ($errors->any())
            <div class="alert alert-danger-custom border-start border-4 border-danger d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-3 fs-5"></i>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Category Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label form-label-custom">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       class="form-control form-control-custom" 
                       placeholder="Contoh: Bikes, Apparel" 
                       value="{{ old('name', $category->name) }}" 
                       required 
                       autofocus>
                <div class="form-text text-muted" style="font-size: 0.75rem;">Nama kategori unik untuk produk e-commerce.</div>
            </div>

            <!-- Category Slug Field -->
            <div class="mb-3">
                <label for="slug" class="form-label form-label-custom">Slug Handle <span class="text-danger">*</span></label>
                <input type="text" 
                       name="slug" 
                       id="slug" 
                       class="form-control form-control-custom" 
                       placeholder="Contoh: bikes, apparel" 
                       value="{{ old('slug', $category->slug) }}" 
                       required>
                <div class="form-text text-muted" style="font-size: 0.75rem;">URL-friendly handle. Jika dikosongkan saat disimpan, sistem akan otomatis menjadikannya huruf kecil & memberi tanda hubung sesuai Nama Kategori baru.</div>
            </div>

            <!-- Description Field -->
            <div class="mb-4">
                <label for="description" class="form-label form-label-custom">Deskripsi Singkat</label>
                <textarea name="description" 
                          id="description" 
                          rows="4" 
                          class="form-control form-control-custom" 
                          placeholder="Masukkan keterangan penjelas kategori produk di sini...">{{ old('description', $category->description) }}</textarea>
            </div>

            <!-- Submit Buttons -->
            <div class="d-flex justify-content-end gap-2 border-top pt-3">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark rounded-0 px-4 text-uppercase fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 0.5px;">Batal</a>
                <button type="submit" class="btn btn-turquoise rounded-0 px-4 text-uppercase fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 0.5px;">Perbarui Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection
