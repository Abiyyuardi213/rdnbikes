@extends('layouts.admin')

@section('title', 'Kelola Role')

@section('content')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4 gap-3">
    <div>
        <span class="text-uppercase text-muted fw-bold" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Keamanan & Otorisasi</span>
        <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Daftar Role & Akses</h2>
    </div>
    <a href="{{ route('admin.roles.create') }}" class="btn btn-turquoise"><i class="bi bi-plus-lg me-2"></i> Tambah Role Baru</a>
</div>

<div class="card card-custom">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center gap-3">
        <span>Tabel Pengaturan Hak Akses</span>
        
        <!-- Search Form -->
        <form action="{{ route('admin.roles.index') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="search" class="form-control form-control-custom" placeholder="Cari nama/deskripsi..." value="{{ $search }}" style="width: 240px;">
            <button type="submit" class="btn btn-dark-custom py-2"><i class="bi bi-search"></i></button>
            @if($search)
                <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-custom py-2" title="Reset Pencarian"><i class="bi bi-arrow-clockwise"></i></a>
            @endif
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="table table-custom table-hover">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th style="width: 180px;">Nama Role</th>
                    <th>Deskripsi</th>
                    <th style="text-align: center; width: 140px;">Jumlah Users</th>
                    <th style="width: 180px;">Dibuat Pada</th>
                    <th style="text-align: right; width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td><strong>#{{ $role->id }}</strong></td>
                        <td>
                            @php
                                $protected = in_array($role->name, ['admin', 'staff', 'customer']);
                            @endphp
                            <span class="fw-bold display-font text-uppercase" style="font-size: 0.85rem; color: var(--rdn-dark);">
                                {{ $role->name }}
                            </span>
                            @if($protected)
                                <div class="mt-1"><span class="badge badge-custom badge-turquoise">Sistem</span></div>
                            @endif
                        </td>
                        <td class="text-muted">{{ $role->description ?? '-' }}</td>
                        <td style="text-align: center;">
                            <span class="badge badge-custom badge-dark" style="font-size: 0.8rem;">
                                {{ $role->users_count }}
                            </span>
                        </td>
                        <td class="text-muted">{{ $role->created_at->format('d M Y, H:i') }}</td>
                        <td style="text-align: right;">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-outline-custom py-2 px-3" title="Edit Role">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                
                                @if(!$protected)
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus role \'{{ $role->name }}\'? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-dark-custom py-2 px-3 text-white bg-danger border-danger" title="Hapus Role">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-dark-custom py-2 px-3 opacity-50" disabled title="Role sistem bawaan tidak dapat dihapus">
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
                            Tidak ada role yang ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($roles->hasPages())
        <div class="card-footer bg-white border-top py-3">
            <div class="d-flex justify-content-center">
                {{ $roles->appends(['search' => $search])->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
