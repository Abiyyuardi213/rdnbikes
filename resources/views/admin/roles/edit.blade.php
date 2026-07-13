@extends('layouts.admin')

@section('title', 'Edit Role')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.roles.index') }}" class="btn btn-sm btn-outline-custom mb-3"><i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar</a>
    <span class="text-uppercase text-muted fw-bold d-block" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Keamanan & Otorisasi</span>
    <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Edit Role: {{ $role->name }}</h2>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card card-custom">
            <div class="card-header">
                Form Edit Peran
            </div>
            <div class="card-body">
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    @php
                        $protected = in_array($role->name, ['admin', 'staff', 'customer']);
                    @endphp
                    
                    <!-- Role Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label form-label-custom">Nama Role <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="form-control form-control-custom @error('name') is-invalid @enderror" 
                               value="{{ old('name', $role->name) }}" 
                               placeholder="Contoh: manager, supervisor" 
                               required
                               {{ $protected ? 'readonly' : '' }}>
                        
                        @if($protected)
                            <div class="form-text text-warning mt-2 fw-semibold" style="font-size: 0.8rem;">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i> Perhatian: Ini adalah role bawaan sistem. Untuk menjaga keamanan otorisasi sistem, nama role ini tidak dapat diubah.
                            </div>
                        @else
                            <div class="form-text text-muted" style="font-size: 0.8rem;">
                                Gunakan nama yang ringkas, tanpa spasi. Hanya boleh mengandung huruf, angka, strip (-), dan garis bawah (_).
                            </div>
                        @endif
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
                                  placeholder="Tuliskan penjelasan detail hak akses peran ini...">{{ old('description', $role->description) }}</textarea>
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
                        <button type="submit" class="btn btn-turquoise py-2 px-4"><i class="bi bi-save me-2"></i> Perbarui Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card card-custom bg-light border-0">
            <div class="card-header bg-transparent border-0 pb-0">
                <h5 class="display-font text-uppercase" style="font-size: 0.9rem;"><i class="bi bi-shield-check text-turquoise me-2"></i> Dampak Perubahan</h5>
            </div>
            <div class="card-body text-muted" style="font-size: 0.85rem; line-height: 1.6;">
                <p>Mengubah data role akan langsung memengaruhi seluruh pengguna yang terasosiasi dengan peran ini secara waktu nyata (real-time):</p>
                <ul class="ps-3 mb-4">
                    <li class="mb-2"><strong>Perubahan Nama</strong>: Jika Anda mengubah nama role, pastikan kode logika program (seperti pengecekan role di Controller/Middleware) juga diperbarui agar tidak menimbulkan error akses.</li>
                    <li class="mb-2"><strong>Daftar Pengguna</strong>: Saat ini, terdapat <span class="badge bg-dark text-white rounded-pill px-2 py-1">{{ $role->users()->count() }} user</span> yang aktif menggunakan role ini.</li>
                    <li><strong>Peran Sistem Bawaan</strong>: Peran <code>admin</code>, <code>staff</code>, dan <code>customer</code> sangat krusial bagi fungsionalitas inti web ini. Hubungi tim developer jika Anda membutuhkan perubahan struktur yang mendalam pada peran-peran tersebut.</li>
                </ul>
                <div class="p-3 bg-white border border-info border-start border-4">
                    <strong class="text-dark d-block mb-1"><i class="bi bi-info-circle-fill text-info me-1"></i> Tips Pengeditan:</strong>
                    Deskripsi role dapat diubah kapan saja tanpa berdampak pada batasan akses kode program. Berikan deskripsi yang jelas agar tim administrasi toko RDN Bikes Anda dapat membedakan tugas tiap staff dengan mudah.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
