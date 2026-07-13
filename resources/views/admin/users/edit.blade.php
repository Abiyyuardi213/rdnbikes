@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-custom mb-3"><i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar</a>
    <span class="text-uppercase text-muted fw-bold d-block" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Keamanan & Otorisasi</span>
    <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Edit User: {{ $user->name }}</h2>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card card-custom">
            <div class="card-header">
                Form Edit Profil Pengguna
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    @php
                        // Check if the user is editing themselves
                        $isSelf = request()->user() && request()->user()->id === $user->id;
                    @endphp
                    
                    <!-- User Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label form-label-custom">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="form-control form-control-custom @error('name') is-invalid @enderror" 
                               value="{{ old('name', $user->name) }}" 
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
                               value="{{ old('email', $user->email) }}" 
                               placeholder="email@example.com" 
                               required>
                        @error('email')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- User Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label form-label-custom">Password Baru (Opsional)</label>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-control form-control-custom @error('password') is-invalid @enderror" 
                               placeholder="Kosongkan jika tidak ingin mengubah password">
                        <div class="form-text text-muted" style="font-size: 0.8rem;">
                            Hanya isi kolom ini jika Anda ingin mengganti password lama user ini.
                        </div>
                        @error('password')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- User Role Selection -->
                    <div class="mb-4">
                        <label for="role_id" class="form-label form-label-custom">Role / Hak Akses <span class="text-danger">*</span></label>
                        @if($isSelf)
                            <select class="form-control form-control-custom" disabled>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                        {{ strtoupper($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="role_id" value="{{ $user->role_id }}">
                            <div class="form-text text-warning mt-2 fw-semibold" style="font-size: 0.8rem;">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i> Anda tidak dapat mengubah peran akun Anda sendiri saat sedang login untuk mencegah lockout.
                            </div>
                        @else
                            <select name="role_id" 
                                    id="role_id" 
                                    class="form-control form-control-custom @error('role_id') is-invalid @enderror" 
                                    required>
                                <option value="">-- Pilih Peran Pengguna --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                        {{ strtoupper($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                        @error('role_id')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Actions -->
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-custom py-2 px-4">Batal</a>
                        <button type="submit" class="btn btn-turquoise py-2 px-4"><i class="bi bi-save me-2"></i> Perbarui User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card card-custom bg-light border-0">
            <div class="card-header bg-transparent border-0 pb-0">
                <h5 class="display-font text-uppercase" style="font-size: 0.9rem;"><i class="bi bi-info-circle text-turquoise me-2"></i> Informasi Perubahan Data</h5>
            </div>
            <div class="card-body text-muted" style="font-size: 0.85rem; line-height: 1.6;">
                <p>Silakan perhatikan aturan pengeditan profil pengguna berikut:</p>
                <ul class="ps-3 mb-4">
                    <li class="mb-2"><strong>Perubahan Email</strong>: Mengubah alamat email akan mengubah email yang digunakan user untuk login ke dalam sistem RDN Bikes.</li>
                    <li class="mb-2"><strong>Perubahan Password</strong>: Jika kolom password dibiarkan kosong, password user yang lama tetap aktif dan aman (tidak terhapus/berubah).</li>
                    <li><strong>Perubahan Role</strong>: Mengubah role pengguna akan langsung mencabut hak akses lamanya dan menerapkan hak akses baru secara waktu nyata.</li>
                </ul>
                <div class="p-3 bg-white border border-danger border-start border-4">
                    <strong class="text-dark d-block mb-1"><i class="bi bi-shield-slash-fill text-danger me-1"></i> Proteksi Super Admin Utama:</strong>
                    Akun <code>superadmin@rdnbikes.com</code> memiliki hak akses tertinggi sistem dan tidak boleh dihapus atau diturunkan tingkat perannya.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
