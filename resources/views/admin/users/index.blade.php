@extends('layouts.admin')

@section('title', 'Kelola Users')

@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
    <div>
        <span class="text-uppercase text-muted fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Keamanan & Otorisasi</span>
        <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Daftar Pengguna / Users</h2>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-turquoise"><i class="bi bi-plus-lg me-2"></i> Tambah User Baru</a>
</div>

<div class="card card-custom">
    <div class="card-header d-flex flex-column flex-lg-row justify-content-between align-items-stretch align-items-lg-center gap-3">
        <span>Tabel Akun Pengguna</span>
        
        <!-- Filter and Search Form -->
        <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex flex-column flex-md-row gap-2">
            <!-- Filter Role -->
            <select name="role_id" class="form-control form-control-custom" style="width: 200px;" onchange="this.form.submit()">
                <option value="">-- Semua Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $roleFilter == $role->id ? 'selected' : '' }}>
                        {{ strtoupper($role->name) }}
                    </option>
                @endforeach
            </select>
            
            <div class="d-flex gap-2">
                <!-- Input Search -->
                <input type="text" name="search" class="form-control form-control-custom" placeholder="Cari nama atau email..." value="{{ $search }}" style="width: 240px;">
                <button type="submit" class="btn btn-dark-custom py-2"><i class="bi bi-search"></i></button>
                @if($search || $roleFilter)
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-custom py-2" title="Reset"><i class="bi bi-arrow-clockwise"></i></a>
                @endif
            </div>
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="table table-custom table-hover">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat Email</th>
                    <th style="width: 180px;">Role / Akses</th>
                    <th style="width: 180px;">Tanggal Terdaftar</th>
                    <th style="text-align: right; width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td><strong>#{{ $user->id }}</strong></td>
                        <td><span class="fw-bold text-dark">{{ $user->name }}</span></td>
                        <td><span class="text-muted">{{ $user->email }}</span></td>
                        <td>
                            @if($user->role)
                                @if($user->role->name === 'super-admin')
                                    <span class="badge badge-custom badge-turquoise">SUPER ADMIN</span>
                                @elseif($user->role->name === 'admin')
                                    <span class="badge badge-custom" style="background-color: var(--rdn-dark); color: white; border: 1px solid var(--rdn-dark);">ADMIN</span>
                                @else
                                    <span class="badge badge-custom badge-dark">CUSTOMER</span>
                                @endif
                            @else
                                <span class="badge badge-custom bg-secondary text-white">BELUM DIATUR</span>
                            @endif
                        </td>
                        <td class="text-muted">{{ $user->created_at->format('d M Y, H:i') }}</td>
                        <td style="text-align: right;">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-custom py-2 px-3" title="Edit User">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                
                                @if($user->email !== 'superadmin@rdnbikes.com')
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user \'{{ $user->name }}\'? Akun ini tidak akan dapat login lagi.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-dark-custom py-2 px-3 text-white bg-danger border-danger" title="Hapus User">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-dark-custom py-2 px-3 opacity-50" disabled title="Super Admin utama tidak dapat dihapus">
                                        <i class="bi bi-lock-fill"></i> Hapus
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-search fs-1 d-block mb-3"></i>
                            Tidak ada pengguna yang ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($users->hasPages())
        <div class="card-footer bg-white border-top py-3">
            <div class="d-flex justify-content-center">
                {{ $users->appends(['search' => $search, 'role_id' => $roleFilter])->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
