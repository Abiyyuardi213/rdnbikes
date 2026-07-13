@extends('layouts.admin')

@section('title', 'Tambah Role Baru')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.roles.index') }}" class="btn btn-sm btn-outline-custom mb-3"><i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar</a>
    <span class="text-uppercase text-muted fw-bold d-block" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Keamanan & Otorisasi</span>
    <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Tambah Role Baru</h2>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card card-custom">
            <div class="card-header">
                Form Input Peran Baru
            </div>
            <div class="card-body">
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    
                    <!-- Role Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label form-label-custom">Nama Role <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="form-control form-control-custom @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" 
                               placeholder="Contoh: manager, supervisor" 
                               required>
                        <div class="form-text text-muted" style="font-size: 0.8rem;">
                            Gunakan nama yang ringkas, tanpa spasi. Hanya boleh mengandung huruf, angka, strip (-), dan garis bawah (_).
                        </div>
                        @error('name')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Role Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label form-label-custom">Deskripsi Role</label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="4" 
                                  class="form-control form-control-custom @error('description') is-invalid @enderror" 
                                  placeholder="Tuliskan penjelasan detail hak akses peran ini...">{{ old('description') }}</textarea>
                        <div class="form-text text-muted" style="font-size: 0.8rem;">
                            Jelaskan tanggung jawab dan batasan akses peran ini agar admin lain memahaminya.
                        </div>
                        @error('description')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Actions -->
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-custom py-2 px-4">Batal</a>
                        <button type="submit" class="btn btn-turquoise py-2 px-4"><i class="bi bi-save me-2"></i> Simpan Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card card-custom bg-light border-0">
            <div class="card-header bg-transparent border-0 pb-0">
                <h5 class="display-font text-uppercase" style="font-size: 0.9rem;"><i class="bi bi-info-circle text-turquoise me-2"></i> Catatan Keamanan</h5>
            </div>
            <div class="card-body text-muted" style="font-size: 0.85rem; line-height: 1.6;">
                <p>Ketika Anda menambahkan role baru ke dalam sistem, pastikan nama peran tersebut unik dan merepresentasikan unit kerja atau level otorisasi pengguna:</p>
                <ul class="ps-3 mb-4">
                    <li class="mb-2"><strong>Unik</strong>: Sistem tidak memperbolehkan dua role memiliki nama yang persis sama.</li>
                    <li class="mb-2"><strong>Case-Insensitive</strong>: Nama role akan secara otomatis dikonversi menjadi huruf kecil oleh sistem saat disimpan (e.g. "MANAGER" menjadi "manager").</li>
                    <li><strong>Konsisten</strong>: Usahakan menggunakan format penulisan yang konsisten, contohnya menggunakan format strip (kebab-case) seperti <code>staff-gudang</code> atau <code>finance-spv</code>.</li>
                </ul>
                <div class="p-3 bg-white border border-warning border-start border-4">
                    <strong class="text-dark d-block mb-1"><i class="bi bi-shield-lock-fill text-warning me-1"></i> Perhatian:</strong>
                    Role yang dibuat belum memiliki pembatasan akses logika program (middleware) secara otomatis. Anda harus meregistrasikan middleware atau melakukan pengecekan <code>$user->isAdmin()</code> atau sejenisnya di dalam controller.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
