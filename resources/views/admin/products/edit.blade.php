@extends('layouts.admin')

@section('title', 'Edit Detail Sepeda')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-custom mb-3"><i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar</a>
    <span class="text-uppercase text-muted fw-bold d-block" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Katalog Produk</span>
    <h2 class="display-font mt-1 fw-extrabold" style="text-transform: uppercase;">Edit Detail Sepeda</h2>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card card-custom mb-5">
            <div class="card-header">
                Edit Data Unit Sepeda
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Section 1: Informasi Umum -->
                    <h5 class="display-font text-uppercase fw-bold text-dark border-bottom pb-2 mb-3" style="font-size: 0.85rem; letter-spacing: 0.5px;"><i class="bi bi-info-square me-2 text-turquoise"></i> Informasi Umum</h5>
                    
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label form-label-custom">Nama Sepeda <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control form-control-custom @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $product->name) }}" 
                                   placeholder="Contoh: RDN Carbon Aero Stealth Pro" 
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
                                <option value="Road Bikes" {{ old('subcategory', $product->subcategory) == 'Road Bikes' ? 'selected' : '' }}>Road Bikes</option>
                                <option value="Gravel Bikes" {{ old('subcategory', $product->subcategory) == 'Gravel Bikes' ? 'selected' : '' }}>Gravel Bikes</option>
                            </select>
                            @error('subcategory')
                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label form-label-custom">Harga Full Bike (Rupiah) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light rounded-0" style="font-size: 0.85rem; font-weight: bold; border: 1px solid #ced4da; border-right: none;">Rp</span>
                                <input type="number" 
                                       name="price" 
                                       id="price" 
                                       class="form-control form-control-custom @error('price') is-invalid @enderror" 
                                       value="{{ old('price', $product->price) }}" 
                                       placeholder="Contoh: 42500000" 
                                       required>
                                @error('price')
                                    <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label form-label-custom">Ganti Foto Produk (Opsional)</label>
                            <input type="file" 
                                   name="image" 
                                   id="image" 
                                   class="form-control form-control-custom @error('image') is-invalid @enderror" 
                                   accept="image/*">
                            @error('image')
                                <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                            @enderror
                            <div class="form-text text-muted" style="font-size: 0.75rem;">Format: JPG, JPEG, PNG, SVG (Maks. 2MB). Biarkan kosong jika tidak ingin mengganti gambar.</div>
                        </div>
                    </div>

                    <!-- Frame Only Option -->
                    <div class="row mb-4 align-items-end">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="form-check form-switch p-0 ps-5">
                                <input class="form-check-input ms--5" 
                                       type="checkbox" 
                                       name="allow_frame_only" 
                                       id="allow_frame_only" 
                                       value="1" 
                                       {{ old('allow_frame_only', $product->allow_frame_only) ? 'checked' : '' }}
                                       style="width: 2.5em; height: 1.3em; cursor: pointer;">
                                <label class="form-check-label form-label-custom ms-2 mt-1" for="allow_frame_only" style="cursor: pointer;">Bisa Beli Frame Only</label>
                            </div>
                        </div>
                        <div class="col-md-6" id="frame_price_wrapper" style="display: none;">
                            <label for="frame_only_price" class="form-label form-label-custom">Harga Frame Only (Rupiah) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light rounded-0" style="font-size: 0.85rem; font-weight: bold; border: 1px solid #ced4da; border-right: none;">Rp</span>
                                <input type="number" 
                                       name="frame_only_price" 
                                       id="frame_only_price" 
                                       class="form-control form-control-custom @error('frame_only_price') is-invalid @enderror" 
                                       value="{{ old('frame_only_price', $product->frame_only_price) }}" 
                                       placeholder="Contoh: 18500000">
                                @error('frame_only_price')
                                    <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const allowFrameCheckbox = document.getElementById('allow_frame_only');
                            const framePriceWrapper = document.getElementById('frame_price_wrapper');
                            const framePriceInput = document.getElementById('frame_only_price');

                            function toggleFramePrice() {
                                if (allowFrameCheckbox.checked) {
                                    framePriceWrapper.style.display = 'block';
                                    framePriceInput.setAttribute('required', 'required');
                                } else {
                                    framePriceWrapper.style.display = 'none';
                                    framePriceInput.removeAttribute('required');
                                }
                            }

                            allowFrameCheckbox.addEventListener('change', toggleFramePrice);
                            toggleFramePrice();
                        });
                    </script>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label form-label-custom">Deskripsi Lengkap <span class="text-danger">*</span></label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="4" 
                                  class="form-control form-control-custom @error('description') is-invalid @enderror" 
                                  placeholder="Masukkan ulasan penjelas keunggulan sepeda di sini..." 
                                  required>{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback fw-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Section 2: Spesifikasi Teknis -->
                    <h5 class="display-font text-uppercase fw-bold text-dark border-bottom pb-2 mb-3 mt-4" style="font-size: 0.85rem; letter-spacing: 0.5px;"><i class="bi bi-gear-wide-connected me-2 text-turquoise"></i> Spesifikasi Teknis</h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="specs_frame" class="form-label form-label-custom">Frame <span class="text-danger">*</span></label>
                            <input type="text" name="specs[Frame]" id="specs_frame" class="form-control form-control-custom" placeholder="Contoh: Torayca T1100 Carbon" value="{{ old('specs.Frame', $product->specs['Frame'] ?? '') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="specs_fork" class="form-label form-label-custom">Fork</label>
                            <input type="text" name="specs[Fork]" id="specs_fork" class="form-control form-control-custom" placeholder="Contoh: RDN Carbon Aero Integrated" value="{{ old('specs.Fork', $product->specs['Fork'] ?? '') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="specs_groupset" class="form-label form-label-custom">Groupset <span class="text-danger">*</span></label>
                            <input type="text" name="specs[Groupset]" id="specs_groupset" class="form-control form-control-custom" placeholder="Contoh: Shimano Ultegra Di2 12-Speed" value="{{ old('specs.Groupset', $product->specs['Groupset'] ?? '') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="specs_wheelset" class="form-label form-label-custom">Wheelset</label>
                            <input type="text" name="specs[Wheelset]" id="specs_wheelset" class="form-control form-control-custom" placeholder="Contoh: RDN Carbon Profile 50mm" value="{{ old('specs.Wheelset', $product->specs['Wheelset'] ?? '') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="specs_tires" class="form-label form-label-custom">Tires (Ban)</label>
                            <input type="text" name="specs[Tires]" id="specs_tires" class="form-control form-control-custom" placeholder="Contoh: Continental GP 5000 700x28c" value="{{ old('specs.Tires', $product->specs['Tires'] ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="specs_cockpit" class="form-label form-label-custom">Cockpit (Stang)</label>
                            <input type="text" name="specs[Cockpit]" id="specs_cockpit" class="form-control form-control-custom" placeholder="Contoh: Integrated Carbon Barstem" value="{{ old('specs.Cockpit', $product->specs['Cockpit'] ?? '') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="specs_saddle" class="form-label form-label-custom">Saddle (Sadel)</label>
                            <input type="text" name="specs[Saddle]" id="specs_saddle" class="form-control form-control-custom" placeholder="Contoh: Fizik Antares Versus EVO" value="{{ old('specs.Saddle', $product->specs['Saddle'] ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="specs_weight" class="form-label form-label-custom">Weight (Bobot) <span class="text-danger">*</span></label>
                            <input type="text" name="specs[Weight]" id="specs_weight" class="form-control form-control-custom" placeholder="Contoh: 7.2 kg" value="{{ old('specs.Weight', $product->specs['Weight'] ?? '') }}" required>
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
                                  placeholder="Contoh:&#10;Desain Aero Terintegrasi (Kabel Tersembunyi)&#10;Sistem Pemindah Gigi Shimano Di2&#10;Frame Karbon Torayca T1100">{{ old('features_text', $featuresText) }}</textarea>
                        <div class="form-text text-muted" style="font-size: 0.8rem;">
                            Tekan Enter untuk memisahkan setiap baris poin keunggulan produk.
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex gap-2 justify-content-end mt-4 border-top pt-3">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-custom py-2 px-4">Batal</a>
                        <button type="submit" class="btn btn-turquoise py-2 px-4"><i class="bi bi-save me-2"></i> Perbarui Sepeda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card card-custom bg-light border-0">
            <div class="card-header bg-transparent border-0 pb-0">
                <h5 class="display-font text-uppercase" style="font-size: 0.9rem;"><i class="bi bi-info-circle text-turquoise me-2"></i> Pedoman Pengeditan</h5>
            </div>
            <div class="card-body text-muted" style="font-size: 0.85rem; line-height: 1.6;">
                <p>Silakan ikuti instruksi berikut untuk memodifikasi produk sepeda:</p>
                <ul class="ps-3 mb-4">
                    <li class="mb-2"><strong>Modifikasi Nama</strong>: Jika Anda merubah Nama Sepeda, sistem secara otomatis merubah URL slug handle yang bersangkutan.</li>
                    <li class="mb-2"><strong>Perubahan Sub Kategori</strong>: Mengubah sub kategori dari Road ke Gravel (atau sebaliknya) akan otomatis merubah gambar fallback utama yang ditampilkan ke pelanggan.</li>
                    <li class="mb-2"><strong>Sinkronisasi Instan</strong>: Semua data perubahan spesifikasi dan fitur yang Anda simpan di sini akan secara real-time terupdate pada laman katalog dan detail di sisi pembeli storefront RDN Bikes.</li>
                </ul>
                <div class="p-3 bg-white border border-info border-start border-4">
                    <strong class="text-dark d-block mb-1"><i class="bi bi-shield-check text-info me-1"></i> Keamanan Sesi:</strong>
                    Aksi modifikasi data produk ini hanya dapat dieksekusi oleh user dengan hak akses Administrator.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
