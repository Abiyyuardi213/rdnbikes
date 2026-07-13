@extends('layouts.admin')

@section('title', 'Tambah User Baru')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-custom mb-3"><i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar</a>
    <span class="text-uppercase text-muted fw-bold d-block" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Keamanan & Otorisasi</span>
    <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Tambah User Baru</h2>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card card-custom">
            <div class="card-header">
                Form Registrasi Pengguna Baru
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    
                    <!-- User Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label form-label-custom">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="form-control form-control-custom @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" 
                               placeholder="Masukkan nama lengkap" 
                               required>
                        @error('name')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- User Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label form-label-custom">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               class="form-control form-control-custom @error('email') is-invalid @enderror" 
                               value="{{ old('email') }}" 
                               placeholder="email@example.com" 
                               required>
                        @error('email')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- User Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label form-label-custom">Password <span class="text-danger">*</span></label>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-control form-control-custom @error('password') is-invalid @enderror" 
                               placeholder="Minimal 6 karakter" 
                               required>
                        @error('password')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- User Role Selection -->
                    <div class="mb-4">
                        <label for="role_id" class="form-label form-label-custom">Role / Hak Akses <span class="text-danger">*</span></label>
                        <select name="role_id" 
                                id="role_id" 
                                class="form-control form-control-custom @error('role_id') is-invalid @enderror" 
                                required>
                            <option value="">-- Pilih Peran Pengguna --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                    {{ strtoupper($role->name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Actions -->
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-custom py-2 px-4">Batal</a>
                        <button type="submit" class="btn btn-turquoise py-2 px-4"><i class="bi bi-save me-2"></i> Daftarkan User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card card-custom bg-light border-0">
            <div class="card-header bg-transparent border-0 pb-0">
                <h5 class="display-font text-uppercase" style="font-size: 0.9rem;"><i class="bi bi-shield-check text-turquoise me-2"></i> Panduan Peran Pengguna</h5>
            </div>
            <div class="card-body text-muted" style="font-size: 0.85rem; line-height: 1.6;">
                <p>Otoritas akses masing-masing peran ditentukan oleh konvensi hak akses berikut:</p>
                <ul class="ps-3 mb-4">
                    <li class="mb-3">
                        <strong class="text-dark">SUPER-ADMIN:</strong>
                        <span class="d-block">Akses mutlak untuk melakukan perubahan pengaturan, menambah role, mengedit user, serta merubah sistem. Gunakan peran ini hanya untuk akun administrator utama.</span>
                    </li>
                    <li class="mb-3">
                        <strong class="text-dark">ADMIN:</strong>
                        <span class="d-block">Akses operasional harian untuk memantau katalog sepeda, mengunggah promo apparel, serta memproses request pesanan custom dari goweser.</span>
                    </li>
                    <li>
                        <strong class="text-dark">CUSTOMER:</strong>
                        <span class="d-block">Peran pembeli. Pengguna dengan peran ini hanya memiliki hak untuk checkout belanja dan mengisi form mockup order pada halaman depan toko.</span>
                    </li>
                </ul>
                <div class="p-3 bg-white border border-info border-start border-4">
                    <strong class="text-dark d-block mb-1"><i class="bi bi-envelope-check me-1 text-info"></i> Keunikan Email:</strong>
                    Sistem memvalidasi email pengguna secara ketat. Email yang sudah didaftarkan tidak dapat digunakan kembali untuk akun baru.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
