@extends('layouts.app')

@section('title', $product['name'] . ' - RDN Bikes')

@section('content')
<!-- Breadcrumbs Section -->
<section class="py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.85rem; font-family: var(--font-display); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">{{ $product['category'] }}</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">{{ $product['subcategory'] }}</a></li>
                <li class="breadcrumb-item active text-turquoise" aria-current="page">{{ $product['name'] }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Product Detail Hero -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Left Side: Product Image -->
            <div class="col-md-6">
                <div class="product-gallery bg-white p-4 border text-center position-relative">
                    <img src="{{ $product['image'] }}" 
                         alt="{{ $product['name'] }}" 
                         class="img-fluid rounded-1" 
                         style="max-height: 480px; width: auto; object-fit: contain; @if(isset($product['image_filter'])) filter: {{ $product['image_filter'] }}; @endif">
                    <span class="position-absolute top-3 right-3 badge bg-dark text-uppercase fw-bold py-2 px-3" style="font-size: 0.65rem; letter-spacing: 1px; font-family: var(--font-display);">Original RDN</span>
                </div>
            </div>

            <!-- Right Side: Product Details & Purchase CTA -->
            <div class="col-md-6 d-flex flex-column justify-content-between">
                <div>
                    <span class="text-uppercase text-turquoise fw-bold mb-2 d-inline-block" style="font-family: var(--font-display); font-size: 0.8rem; letter-spacing: 2px;">{{ $product['subcategory'] }}</span>
                    <h1 class="display-font text-uppercase fw-extrabold mb-3" style="font-size: 2.2rem; line-height: 1.2;">{{ $product['name'] }}</h1>
                    
                    <h2 class="display-font fw-extrabold text-turquoise mb-4" style="font-size: 1.8rem;" id="product_price_display">{{ $product['price'] }}</h2>
                    
                    <!-- Stock Indicator -->
                    <div class="mb-4">
                        @if(isset($product['stock']) && $product['stock'] <= 0)
                            <span class="badge bg-danger text-white text-uppercase rounded-0 px-3 py-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">Stok Habis</span>
                        @elseif(isset($product['stock']) && $product['stock'] <= 3)
                            <span class="badge bg-warning text-dark text-uppercase rounded-0 px-3 py-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">Stok Menipis (Tersisa {{ $product['stock'] }} Unit!)</span>
                        @elseif(isset($product['stock']))
                            <span class="badge bg-success text-white text-uppercase rounded-0 px-3 py-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">Stok Tersedia ({{ $product['stock'] }} Unit)</span>
                        @else
                            <span class="badge bg-success text-white text-uppercase rounded-0 px-3 py-2" style="font-size: 0.75rem; letter-spacing: 0.5px;">Stok Tersedia</span>
                        @endif
                    </div>
                    
                    <p class="text-muted mb-4" style="line-height: 1.7; font-size: 0.95rem;">{{ $product['description'] }}</p>

                    @if(isset($product['stocks']) && count($product['stocks']) > 0)
                        <!-- Product Variants Selector/List -->
                        <div class="mb-4">
                            <label class="display-font text-uppercase fw-bold mb-2 text-dark" style="font-size: 0.78rem; letter-spacing: 1px;">Varian Ukuran & Warna:</label>
                            <div class="table-responsive mb-3">
                                <table class="table table-bordered table-sm text-center mb-0" style="font-size: 0.8rem;">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Ukuran</th>
                                            <th>Warna</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product['stocks'] as $variant)
                                            <tr>
                                                <td class="fw-bold">{{ $variant['size'] ?? '-' }}</td>
                                                <td>{{ $variant['color'] ?? '-' }}</td>
                                                <td>
                                                    @if($variant['qty'] <= 0)
                                                        <span class="badge bg-danger text-white px-2 py-0.5" style="font-size: 0.68rem; border-radius: 0;">Habis</span>
                                                    @elseif($variant['qty'] <= 3)
                                                        <span class="badge bg-warning text-dark px-2 py-0.5" style="font-size: 0.68rem; border-radius: 0;">Menipis ({{ $variant['qty'] }})</span>
                                                    @else
                                                        <span class="badge bg-success text-white px-2 py-0.5" style="font-size: 0.68rem; border-radius: 0;">Ready ({{ $variant['qty'] }})</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Interactive Dropdown Selection -->
                            <div class="p-3 border" style="background-color: #fafafa;">
                                <label for="variantSelect" class="display-font text-uppercase fw-bold mb-2 text-dark" style="font-size: 0.75rem; letter-spacing: 0.5px;">Pilih Varian untuk Dipesan: <span class="text-danger">*</span></label>
                                <select id="variantSelect" class="form-select form-control-custom py-2" style="font-size: 0.85rem;" onchange="updateSelectedVariant()">
                                    <option value="" data-qty="0">-- Pilih Ukuran & Warna --</option>
                                    @foreach($product['stocks'] as $variant)
                                        @if($variant['qty'] > 0)
                                            <option value="Ukuran {{ $variant['size'] ?? '-' }} / Warna {{ $variant['color'] ?? '-' }}" data-qty="{{ $variant['qty'] }}">
                                                Ukuran: {{ $variant['size'] ?? '-' }} | Warna: {{ $variant['color'] ?? '-' }} (Stok: {{ $variant['qty'] }} Unit)
                                            </option>
                                        @else
                                            <option value="Ukuran {{ $variant['size'] ?? '-' }} / Warna {{ $variant['color'] ?? '-' }}" data-qty="0" disabled>
                                                Ukuran: {{ $variant['size'] ?? '-' }} | Warna: {{ $variant['color'] ?? '-' }} (Habis / Sold Out)
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <div id="variantStockInfo" class="mt-2 text-muted fw-semibold" style="font-size: 0.78rem;">
                                    Silakan pilih varian ukuran & warna untuk melanjutkan pemesanan.
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    @if(isset($product['allow_frame_only']) && $product['allow_frame_only'])
                        <!-- Product Option Selectors -->
                        <div class="mb-4">
                            <label class="display-font text-uppercase fw-bold mb-2 text-dark" style="font-size: 0.78rem; letter-spacing: 1px;">Pilihan Pembelian:</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="card p-3 border border-dark rounded-0 cursor-pointer product-option-card active" id="option_full_bike" onclick="selectProductOption('full_bike')" style="cursor: pointer; border-width: 2px !important; transition: all 0.2s ease;">
                                        <div class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.5px;">Full Bike</div>
                                        <div class="text-muted" style="font-size: 0.82rem;">{{ $product['price'] }}</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card p-3 border rounded-0 cursor-pointer product-option-card" id="option_frame_only" onclick="selectProductOption('frame_only')" style="cursor: pointer; transition: all 0.2s ease;">
                                        <div class="fw-bold text-uppercase mb-1" style="font-size: 0.72rem; letter-spacing: 0.5px;">Frame Only</div>
                                        <div class="text-turquoise fw-bold" style="font-size: 0.82rem;">{{ $product['frame_only_price'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <script>
                        const initialWaLink = `https://wa.me/628123456789?text=`;
                        const productName = @json($product['name']);
                        const fullPrice = @json($product['price']);
                        const framePrice = @json($product['frame_only_price'] ?? null);

                        function getCheckoutMsg(variantText = '') {
                            let priceText = document.getElementById('product_price_display').innerText;
                            
                            // Check if frame-only option is selected
                            const optFrame = document.getElementById('option_frame_only');
                            let optionType = 'Full Bike';
                            if (optFrame && optFrame.classList.contains('active')) {
                                optionType = 'Frame Only';
                            }
                            
                            let msg = `Halo RDN Bikes, saya tertarik untuk membeli produk ${productName}`;
                            
                            // Add purchase option for bikes
                            if (document.getElementById('option_full_bike')) {
                                msg += ` (${optionType})`;
                            }
                            
                            if (variantText) {
                                msg += ` dengan varian [${variantText}]`;
                            }
                            
                            msg += ` seharga ${priceText}.`;
                            return msg;
                        }

                        function updateSelectedVariant() {
                            const select = document.getElementById('variantSelect');
                            const waBtn = document.getElementById('wa_checkout_btn');
                            const infoDiv = document.getElementById('variantStockInfo');
                            const cartAddBtn = document.getElementById('cart_add_btn');
                            const hiddenVariant = document.getElementById('cart_variant_input');
                            
                            if (!select || !waBtn) return;
                            
                            const selectedOption = select.options[select.selectedIndex];
                            const qty = parseInt(selectedOption.getAttribute('data-qty') || 0);
                            const value = select.value;
                            
                            if (hiddenVariant) {
                                hiddenVariant.value = value;
                            }
                            
                            if (!value) {
                                infoDiv.innerHTML = 'Silakan pilih varian ukuran & warna untuk melanjutkan pemesanan.';
                                infoDiv.className = 'mt-2 text-muted fw-semibold';
                                waBtn.href = `${initialWaLink}${encodeURIComponent(getCheckoutMsg())}`;
                                
                                if (cartAddBtn) {
                                    cartAddBtn.classList.add('disabled');
                                    cartAddBtn.style.pointerEvents = 'none';
                                    cartAddBtn.style.opacity = '0.6';
                                }
                                return;
                            }
                            
                            if (qty <= 0) {
                                infoDiv.innerHTML = `<span class="text-danger"><i class="bi bi-x-circle me-1"></i> Stok untuk varian ${value} habis. Silakan pilih varian lain.</span>`;
                                waBtn.classList.add('disabled');
                                waBtn.style.pointerEvents = 'none';
                                waBtn.style.opacity = '0.6';
                                
                                if (cartAddBtn) {
                                    cartAddBtn.classList.add('disabled');
                                    cartAddBtn.style.pointerEvents = 'none';
                                    cartAddBtn.style.opacity = '0.6';
                                }
                            } else if (qty <= 3) {
                                infoDiv.innerHTML = `<span class="text-warning"><i class="bi bi-exclamation-triangle me-1"></i> Stok menipis! Tersisa ${qty} unit.</span>`;
                                waBtn.classList.remove('disabled');
                                waBtn.style.pointerEvents = 'auto';
                                waBtn.style.opacity = '1';
                                waBtn.href = `${initialWaLink}${encodeURIComponent(getCheckoutMsg(value))}`;
                                
                                if (cartAddBtn) {
                                    cartAddBtn.classList.remove('disabled');
                                    cartAddBtn.style.pointerEvents = 'auto';
                                    cartAddBtn.style.opacity = '1';
                                }
                            } else {
                                infoDiv.innerHTML = `<span class="text-success"><i class="bi bi-check-circle me-1"></i> Varian tersedia: ${qty} unit. Silakan langsung checkout!</span>`;
                                waBtn.classList.remove('disabled');
                                waBtn.style.pointerEvents = 'auto';
                                waBtn.style.opacity = '1';
                                waBtn.href = `${initialWaLink}${encodeURIComponent(getCheckoutMsg(value))}`;
                                
                                if (cartAddBtn) {
                                    cartAddBtn.classList.remove('disabled');
                                    cartAddBtn.style.pointerEvents = 'auto';
                                    cartAddBtn.style.opacity = '1';
                                }
                            }
                        }

                        function selectProductOption(option) {
                            const optFull = document.getElementById('option_full_bike');
                            const optFrame = document.getElementById('option_frame_only');
                            const priceDisplay = document.getElementById('product_price_display');
                            const waBtn = document.getElementById('wa_checkout_btn');
                            const hiddenOption = document.getElementById('cart_option_input');

                            if (option === 'full_bike') {
                                optFull.classList.add('border-dark', 'active');
                                optFull.style.borderWidth = '2px';
                                optFrame.classList.remove('border-dark', 'active');
                                optFrame.style.borderWidth = '1px';
                                
                                priceDisplay.innerText = fullPrice;
                                if (hiddenOption) {
                                    hiddenOption.value = 'Full Bike';
                                }
                            } else {
                                optFrame.classList.add('border-dark', 'active');
                                optFrame.style.borderWidth = '2px';
                                optFull.classList.remove('border-dark', 'active');
                                optFull.style.borderWidth = '1px';
                                
                                priceDisplay.innerText = framePrice;
                                if (hiddenOption) {
                                    hiddenOption.value = 'Frame Only';
                                }
                            }
                            
                            // Re-trigger update of WhatsApp Checkout message with new pricing details
                            const select = document.getElementById('variantSelect');
                            const val = select ? select.value : '';
                            if (waBtn) {
                                waBtn.href = `${initialWaLink}${encodeURIComponent(getCheckoutMsg(val))}`;
                            }
                        }

                        // Initialize button state if variant selector exists
                        document.addEventListener("DOMContentLoaded", function() {
                            const select = document.getElementById('variantSelect');
                            if (select) {
                                updateSelectedVariant();
                            }
                        });
                    </script>

                    <hr class="my-4">
                    
                    <!-- Key Features -->
                    <h5 class="display-font text-uppercase fw-bold mb-3" style="font-size: 0.9rem; letter-spacing: 0.5px;">Fitur & Keunggulan</h5>
                    <ul class="list-unstyled mb-4">
                        @if(isset($product['features']))
                            @foreach($product['features'] as $feature)
                                <li class="d-flex align-items-center mb-2 text-muted" style="font-size: 0.9rem;">
                                    <i class="bi bi-patch-check-fill text-turquoise me-3 fs-5"></i>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        @else
                            <li class="d-flex align-items-center mb-2 text-muted" style="font-size: 0.9rem;">
                                <i class="bi bi-patch-check-fill text-turquoise me-3 fs-5"></i>
                                <span>Material Premium Durabilitas Tinggi</span>
                            </li>
                            <li class="d-flex align-items-center mb-2 text-muted" style="font-size: 0.9rem;">
                                <i class="bi bi-patch-check-fill text-turquoise me-3 fs-5"></i>
                                <span>Didesain khusus untuk meningkatkan kenyamanan berkendara</span>
                            </li>
                        @endif
                    </ul>
                </div>

                <div>
                <div class="card p-4 border rounded-0" style="background-color: #fcfcfc;">
                    <form action="{{ route('cart.add', $product['id']) }}" method="POST">
                        @csrf
                        <input type="hidden" name="option" id="cart_option_input" value="Full Bike">
                        <input type="hidden" name="variant" id="cart_variant_input" value="">
                        
                        @if(isset($product['stock']) && $product['stock'] <= 0)
                            <button type="button" class="btn btn-secondary w-100 py-3 text-uppercase fw-bold rounded-0" style="font-size: 0.9rem; letter-spacing: 1px;" disabled>
                                <i class="bi bi-x-circle me-2 fs-5"></i> Stok Habis / Sold Out
                            </button>
                        @else
                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <label class="form-label text-muted display-font mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">JUMLAH</label>
                                    <input type="number" name="qty" value="1" min="1" class="form-control text-center py-2 fw-bold" style="border-radius: 0; height: auto; border: 1px solid #ced4da;">
                                </div>
                                <div class="col-8 d-flex align-items-end">
                                    <button type="submit" id="cart_add_btn" class="btn btn-outline-dark w-100 py-2 text-uppercase fw-bold rounded-0" style="font-size: 0.75rem; letter-spacing: 0.5px; height: calc(2.25rem + 2px);">
                                        <i class="bi bi-cart-plus me-1 fs-6"></i> Beli
                                    </button>
                                </div>
                            </div>

                            <a href="https://wa.me/628123456789?text=Halo%20RDN%20Bikes,%20saya%20tertarik%20untuk%20membeli%20produk%20{{ urlencode($product['name']) }}%20seharga%20{{ urlencode($product['price']) }}." 
                               target="_blank" 
                               id="wa_checkout_btn"
                               class="btn btn-turquoise w-100 py-2.5 text-uppercase fw-bold rounded-0" 
                               style="font-size: 0.78rem; letter-spacing: 0.5px;">
                                <i class="bi bi-whatsapp me-1.5 fs-6"></i> Tanya CS via WhatsApp
                            </a>
                        @endif
                    </form>
                    <p class="text-muted text-center mt-2.5 mb-0" style="font-size: 0.72rem; line-height: 1.4;">
                        Tambahkan produk ke keranjang untuk mempermudah pemesanan massal, atau hubungi CS langsung.
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Specifications Section -->
<section class="py-5 bg-light border-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="display-font text-uppercase fw-extrabold mb-4 text-center">Spesifikasi Lengkap</h3>
                
                <div class="table-responsive bg-white border shadow-sm p-2">
                    <table class="table table-striped table-hover mb-0" style="font-size: 0.9rem;">
                        <tbody>
                            @foreach($product['specs'] as $key => $val)
                                <tr>
                                    <td class="fw-bold text-uppercase text-dark py-3 px-4" style="width: 35%; font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 0.5px;">{{ $key }}</td>
                                    <td class="text-muted py-3 px-4">{{ $val }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Size Helper Note -->
                @if($product['category'] == 'Apparel')
                    <div class="mt-5 p-4 border bg-white rounded-1 d-flex align-items-start">
                        <i class="bi bi-info-circle-fill text-turquoise fs-4 me-3 mt-1"></i>
                        <div>
                            <h5 class="display-font text-uppercase fw-bold mb-2" style="font-size: 0.95rem;">Panduan Ukuran (Fitting Guide)</h5>
                            <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.6;">Lini apparel RDN didesain fit mengikuti tubuh goweser (Race Cut). Jika Anda menyukai model fitting yang lebih longgar (Regular Fit), kami menyarankan untuk memilih 1 ukuran di atas ukuran standar harian Anda (Size Up).</p>
                        </div>
                    </div>
                @else
                    <div class="mt-5 p-4 border bg-white rounded-1 d-flex align-items-start">
                        <i class="bi bi-info-circle-fill text-turquoise fs-4 me-3 mt-1"></i>
                        <div>
                            <h5 class="display-font text-uppercase fw-bold mb-2" style="font-size: 0.95rem;">Layanan Sizing & Fitting Sepeda Gratis</h5>
                            <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.6;">Pembelian sepeda di RDN Bikes dilengkapi layanan fitting ukuran frame gratis di showroom kami untuk memastikan posisi riding optimal dan efisiensi biomekanika kayuhan Anda maksimal.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
