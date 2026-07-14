@extends('layouts.app')

@section('title', 'Keranjang Belanja - RDN Bikes')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-dark text-white text-center position-relative overflow-hidden" style="background-image: linear-gradient(135deg, #111111 0%, #222222 100%);">
    <div class="container position-relative" style="z-index: 2;">
        <h1 class="display-5 text-uppercase fw-extrabold mb-2 text-white">Keranjang Belanja</h1>
        <p class="text-muted-custom mx-auto mb-0" style="max-width: 600px; color: #bbbbbb;">Periksa kembali unit sepeda dan perlengkapan pesanan Anda sebelum checkout.</p>
    </div>
</section>

<!-- Cart Content -->
<section class="py-5">
    <div class="container">
        @if(count($cart) > 0)
            <div class="row g-4">
                <!-- Cart Items List (Left Side) -->
                <div class="col-lg-8">
                    <div class="card border rounded-0 shadow-sm">
                        <div class="card-header bg-light py-3">
                            <h5 class="mb-0 fw-bold text-uppercase display-font" style="font-size: 0.9rem; letter-spacing: 0.5px;">Daftar Pesanan</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle text-center mb-0" style="font-size: 0.9rem;">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 100px;">Produk</th>
                                            <th style="text-align: left;">Detail Produk</th>
                                            <th style="width: 130px;">Harga Satuan</th>
                                            <th style="width: 140px;">Jumlah</th>
                                            <th style="width: 150px;">Subtotal</th>
                                            <th style="width: 60px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart as $key => $item)
                                            <tr>
                                                <td>
                                                    <div class="bg-light p-1 border" style="width: 80px; height: 60px; overflow: hidden; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                                        <img src="{{ $item['image'] }}" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                                    </div>
                                                </td>
                                                <td style="text-align: left;">
                                                    <h6 class="fw-bold mb-1 text-uppercase text-dark" style="font-size: 0.88rem; font-family: var(--font-display);">{{ $item['name'] }}</h6>
                                                    @if(isset($item['option']))
                                                        <div class="text-muted mb-0.5" style="font-size: 0.75rem;"><strong>Opsi:</strong> {{ $item['option'] }}</div>
                                                    @endif
                                                    @if(isset($item['variant']) && $item['variant'])
                                                        <div class="text-turquoise fw-bold" style="font-size: 0.75rem;"><strong>Varian:</strong> {{ $item['variant'] }}</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-semibold">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('cart.update', $key) }}" method="POST" class="d-flex align-items-center justify-content-center">
                                                        @csrf
                                                        <input type="number" 
                                                               name="qty" 
                                                               value="{{ $item['qty'] }}" 
                                                               min="1" 
                                                               required 
                                                               class="form-control text-center py-1 px-1 me-1" 
                                                               style="width: 55px; font-size: 0.8rem; height: auto; border-radius: 0;">
                                                        <button type="submit" class="btn btn-sm btn-outline-dark p-1" title="Update Qty" style="line-height: 1;"><i class="bi bi-arrow-repeat" style="font-size: 0.8rem;"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <strong class="text-dark">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</strong>
                                                </td>
                                                <td>
                                                    <form action="{{ route('cart.remove', $key) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-link text-danger p-0" title="Hapus Item">
                                                            <i class="bi bi-trash" style="font-size: 1.1rem;"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white py-3 d-flex justify-content-between">
                            <a href="{{ route('road-bikes') }}" class="btn btn-outline-dark btn-sm rounded-0 px-3 py-2 text-uppercase fw-bold" style="font-size: 0.75rem;"><i class="bi bi-arrow-left me-1"></i> Lanjut Belanja</a>
                            <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengosongkan keranjang belanja?')">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-0 px-3 py-2 text-uppercase fw-bold" style="font-size: 0.75rem;"><i class="bi bi-trash3 me-1"></i> Kosongkan Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Cart Summary (Right Side) -->
                <div class="col-lg-4">
                    <div class="card border rounded-0 shadow-sm mb-4">
                        <div class="card-header bg-light py-3">
                            <h5 class="mb-0 fw-bold text-uppercase display-font" style="font-size: 0.9rem; letter-spacing: 0.5px;">Ringkasan Belanja</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Total Barang</span>
                                <span class="fw-bold">{{ count($cart) }} Baris</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="text-dark fw-bold" style="font-size: 1rem;">Total Tagihan</span>
                                <span class="text-turquoise fw-extrabold h4 mb-0 display-font">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            
                            <a href="{{ $waLink }}" 
                               target="_blank" 
                               class="btn btn-turquoise w-100 py-3 text-uppercase fw-bold rounded-0" 
                               style="font-size: 0.88rem; letter-spacing: 1px;">
                                <i class="bi bi-whatsapp me-2 fs-5"></i> Checkout via WhatsApp
                            </a>
                            <p class="text-muted text-center mt-2.5 mb-0" style="font-size: 0.75rem; line-height: 1.4;">
                                Pesanan Anda akan dikirimkan ke Admin untuk konfirmasi metode pengiriman, asuransi, & koordinasi pembayaran.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart State -->
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="bi bi-cart-x text-muted" style="font-size: 5rem;"></i>
                </div>
                <h4 class="display-font text-uppercase fw-bold text-dark mb-2">Keranjang Belanja Kosong</h4>
                <p class="text-muted mx-auto mb-4" style="max-width: 450px;">Anda belum menambahkan produk apa pun ke keranjang belanja Anda. Jelajahi katalog sepeda balap dan apparel kami untuk memulai kayuhan Anda!</p>
                <a href="{{ route('road-bikes') }}" class="btn btn-turquoise px-4 py-2.5 rounded-0 text-uppercase fw-bold" style="font-size: 0.85rem; letter-spacing: 0.5px;">Mulai Belanja</a>
            </div>
        @endif
    </div>
</section>
@endsection
