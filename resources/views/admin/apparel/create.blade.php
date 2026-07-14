@extends('layouts.admin')

@section('title', 'Tambah Apparel Baru')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.apparel.index') }}" class="btn btn-sm btn-outline-custom mb-3"><i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar</a>
    <span class="text-uppercase text-muted fw-bold d-block" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Katalog Produk</span>
    <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Tambah Apparel Baru</h2>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card card-custom mb-5">
            <div class="card-header">
                Form Input Unit Apparel Baru
            </div>
            <div class="card-body">
                <form action="{{ route('admin.apparel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Section 1: Informasi Umum -->
                    <h5 class="display-font text-uppercase fw-bold text-dark border-bottom pb-2 mb-3" style="font-size: 0.85rem; letter-spacing: 0.5px;"><i class="bi bi-info-square me-2 text-turquoise"></i> Informasi Umum</h5>
                    
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label form-label-custom">Nama Apparel <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control form-control-custom @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" 
                                   placeholder="Contoh: RDN Streamline Aero Jersey" 
                                   required 
                                   autofocus>
                            @error('name')
                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Subcategory -->
                        <div class="col-md-6 mb-3">
                            <label for="subcategory" class="form-label form-label-custom">Sub Kategori <span class="text-danger">*</span></label>
                            <select name="subcategory" id="subcategory" class="form-select form-control-custom @error('subcategory') is-invalid @enderror" required>
                                <option value="">-- Pilih Sub Kategori --</option>
                                <option value="Cycling Jerseys" {{ old('subcategory') == 'Cycling Jerseys' ? 'selected' : '' }}>Cycling Jerseys</option>
                                <option value="Bib Shorts" {{ old('subcategory') == 'Bib Shorts' ? 'selected' : '' }}>Bib Shorts</option>
                                <option value="Vests & Outerwear" {{ old('subcategory') == 'Vests & Outerwear' ? 'selected' : '' }}>Vests & Outerwear</option>
                                <option value="Socks & Accessories" {{ old('subcategory') == 'Socks & Accessories' ? 'selected' : '' }}>Socks & Accessories</option>
                            </select>
                            @error('subcategory')
                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label form-label-custom">Harga (Rupiah) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light rounded-0" style="font-size: 0.85rem; font-weight: bold; border: 1px solid #ced4da; border-right: none;">Rp</span>
                                <input type="number" 
                                       name="price" 
                                       id="price" 
                                       class="form-control form-control-custom @error('price') is-invalid @enderror" 
                                       value="{{ old('price') }}" 
                                       placeholder="Contoh: 580000" 
                                       required>
                                @error('price')
                                    <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label form-label-custom">Foto Produk (Opsional)</label>
                            <input type="file" 
                                   name="image" 
                                   id="image" 
                                   class="form-control form-control-custom @error('image') is-invalid @enderror" 
                                   accept="image/*">
                            @error('image')
                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                            @enderror
                            <div class="form-text text-muted" style="font-size: 0.75rem;">Format: JPG, JPEG, PNG, SVG (Maks. 2MB). Jika dikosongkan, gambar subkategori default akan digunakan.</div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label form-label-custom">Deskripsi Lengkap <span class="text-danger">*</span></label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="4" 
                                  class="form-control form-control-custom @error('description') is-invalid @enderror" 
                                  placeholder="Masukkan ulasan penjelas keunggulan produk apparel di sini..." 
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Section 2: Spesifikasi Material -->
                    <h5 class="display-font text-uppercase fw-bold text-dark border-bottom pb-2 mb-3 mt-4" style="font-size: 0.85rem; letter-spacing: 0.5px;"><i class="bi bi-gear-wide-connected me-2 text-turquoise"></i> Spesifikasi Teknis</h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="specs_material" class="form-label form-label-custom">Bahan Material <span class="text-danger">*</span></label>
                            <input type="text" name="specs[Material]" id="specs_material" class="form-control form-control-custom" placeholder="Contoh: 85% Polyester, 15% Elastane" value="{{ old('specs.Material') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="specs_fit" class="form-label form-label-custom">Tipe Potongan (Fit Type)</label>
                            <input type="text" name="specs[Fit Type]" id="specs_fit" class="form-control form-control-custom" placeholder="Contoh: Race Fit / Aero Cut" value="{{ old('specs.Fit_Type') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="specs_zipper" class="form-label form-label-custom">Zipper / Pad (Opsional)</label>
                            <input type="text" name="specs[Zipper]" id="specs_zipper" class="form-control form-control-custom" placeholder="Contoh: Full-Length YKK / Italian interface pad" value="{{ old('specs.Zipper') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="specs_grip" class="form-label form-label-custom">Hem Gripper / Cuff (Opsional)</label>
                            <input type="text" name="specs[Grip]" id="specs_grip" class="form-control form-control-custom" placeholder="Contoh: Laser-Cut Compression Cuff" value="{{ old('specs.Grip') }}">
                        </div>
                    </div>

                    <!-- Section 3: Feature Checklists -->
                    <h5 class="display-font text-uppercase fw-bold text-dark border-bottom pb-2 mb-3 mt-4" style="font-size: 0.85rem; letter-spacing: 0.5px;"><i class="bi bi-patch-check me-2 text-turquoise"></i> Daftar Keunggulan Utama</h5>
                    
                    <div class="mb-4">
                        <label for="features_text" class="form-label form-label-custom">Poin Keunggulan (Satu Poin Per Baris)</label>
                        <textarea name="features_text" 
                                  id="features_text" 
                                  rows="4" 
                                  class="form-control form-control-custom" 
                                  placeholder="Contoh:&#10;Bahan Ringan Breathable Micro-Mesh&#10;Kerah Rendah Ramping Aerodinamis&#10;Saku Pengaman Dengan Resleting YKK">{{ old('features_text') }}</textarea>
                        <div class="form-text text-muted" style="font-size: 0.8rem;">
                            Tekan Enter untuk memisahkan setiap baris poin keunggulan produk.
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex gap-2 justify-content-end mt-4 border-top pt-3">
                        <a href="{{ route('admin.apparel.index') }}" class="btn btn-outline-custom py-2 px-4">Batal</a>
                        <button type="submit" class="btn btn-turquoise py-2 px-4"><i class="bi bi-save me-2"></i> Simpan Apparel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card card-custom bg-light border-0">
            <div class="card-header bg-transparent border-0 pb-0">
                <h5 class="display-font text-uppercase" style="font-size: 0.9rem;"><i class="bi bi-info-circle text-turquoise me-2"></i> Pedoman Penulisan</h5>
            </div>
            <div class="card-body text-muted" style="font-size: 0.85rem; line-height: 1.6;">
                <p>Silakan ikuti instruksi berikut untuk memastikan kualitas data produk apparel yang ditampilkan di storefront utama:</p>
                <ul class="ps-3 mb-4">
                    <li class="mb-2"><strong>Otomatisasi Slug</strong>: URL slug (handle) untuk navigasi detail produk akan otomatis dibuat berdasarkan Nama Apparel (e.g. "RDN Streamline Azure Jersey" menjadi "rdn-streamline-azure-jersey").</li>
                    <li class="mb-2"><strong>Auto Kategori</strong>: Semua produk apparel yang ditambahkan melalui form ini secara otomatis diasosiasikan dengan kategori database <code>Apparel</code> (Kategori ID Default).</li>
                    <li class="mb-2"><strong>Dukungan Gambar</strong>: Sistem akan mendeteksi sub-kategori pilihan Anda dan mengarahkan path gambar ke asset lokal yang sesuai:
                        <ul class="ps-3 mt-1">
                            <li>Bib Shorts ➔ <code>/images/hero_cyclists.png</code></li>
                            <li>Kategori Lainnya ➔ <code>/images/category_jerseys.png</code></li>
                        </ul>
                    </li>
                    <li class="mb-2"><strong>Format Spesifikasi</strong>: Isian Bahan Material wajib diisi sebagai parameter minimal spesifikasi.</li>
                </ul>
                <div class="p-3 bg-white border border-info border-start border-4">
                    <strong class="text-dark d-block mb-1"><i class="bi bi-whatsapp text-info me-1"></i> WhatsApp Checkout:</strong>
                    Detail apparel yang Anda simpan akan secara otomatis terintegrasi dengan generator tombol pesan instan WhatsApp di halaman detail storefront pelanggan.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
