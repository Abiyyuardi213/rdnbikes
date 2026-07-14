<!-- Header Section -->
<header class="site-header sticky-top py-3" id="mainHeader">
    <nav class="navbar navbar-expand-lg navbar-light py-0">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                RDN<span class="accent">BIKES</span>
            </a>
            
            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation Links -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="bikesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sepeda
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-0" aria-labelledby="bikesDropdown">
                            <li><a class="dropdown-item py-2 px-3 text-uppercase font-family-1 font-size-sm {{ Route::is('road-bikes') ? 'active' : '' }}" href="{{ route('road-bikes') }}" style="font-size: 0.8rem; font-weight: 600;">Road Bikes</a></li>
                            <li><a class="dropdown-item py-2 px-3 text-uppercase font-family-1 font-size-sm {{ Route::is('gravel-bikes') ? 'active' : '' }}" href="{{ route('gravel-bikes') }}" style="font-size: 0.8rem; font-weight: 600;">Gravel Bikes</a></li>
                            <li><a class="dropdown-item py-2 px-3 text-uppercase font-family-1 font-size-sm {{ Route::is('bike-components') ? 'active' : '' }}" href="{{ route('bike-components') }}" style="font-size: 0.8rem; font-weight: 600;">Components</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="apparelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Apparel
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-0" aria-labelledby="apparelDropdown">
                            <li><a class="dropdown-item py-2 px-3 text-uppercase font-family-1 font-size-sm {{ Route::is('apparel.jerseys') ? 'active' : '' }}" href="{{ route('apparel.jerseys') }}" style="font-size: 0.8rem; font-weight: 600;">Cycling Jerseys</a></li>
                            <li><a class="dropdown-item py-2 px-3 text-uppercase font-family-1 font-size-sm {{ Route::is('apparel.bib-shorts') ? 'active' : '' }}" href="{{ route('apparel.bib-shorts') }}" style="font-size: 0.8rem; font-weight: 600;">Bib Shorts</a></li>
                            <li><a class="dropdown-item py-2 px-3 text-uppercase font-family-1 font-size-sm {{ Route::is('apparel.vests') ? 'active' : '' }}" href="{{ route('apparel.vests') }}" style="font-size: 0.8rem; font-weight: 600;">Vests & Outerwear</a></li>
                            <li><a class="dropdown-item py-2 px-3 text-uppercase font-family-1 font-size-sm {{ Route::is('apparel.accessories') ? 'active' : '' }}" href="{{ route('apparel.accessories') }}" style="font-size: 0.8rem; font-weight: 600;">Socks & Accessories</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('custom-jersey') ? 'active' : '' }}" href="{{ route('custom-jersey') }}">Custom Jersey</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('stories') ? 'active' : '' }}" href="{{ route('stories') }}">Our Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">About Us</a>
                    </li>
                </ul>
            </div>
            
            <!-- Action Icons -->
            <div class="d-flex align-items-center">
                <a href="#" class="header-icon" title="Cari"><i class="bi bi-search"></i></a>
                
                @guest
                    <a href="{{ route('login') }}" class="header-icon" title="Masuk Akun"><i class="bi bi-person"></i></a>
                @else
                    <div class="dropdown d-inline-block">
                        <a href="#" class="header-icon dropdown-toggle border-0 p-0" id="userMenuDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Akun Saya" style="display: inline-block;">
                            <i class="bi bi-person-check text-success"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-0 mt-3" aria-labelledby="userMenuDropdown" style="font-size: 0.85rem; width: 200px;">
                            <li class="px-3 py-2 border-bottom text-muted">
                                <span class="d-block fw-bold text-dark text-uppercase text-truncate" style="font-family: var(--font-display); font-size: 0.75rem;">{{ Auth::user()->name }}</span>
                                <span class="d-block text-truncate" style="font-size: 0.75rem;">{{ Auth::user()->email }}</span>
                            </li>
                            @if(Auth::user()->isAdmin())
                                <li><a class="dropdown-item py-2 fw-semibold" href="{{ route('admin.dashboard') }}"><i class="bi bi-shield-lock me-2 text-dark"></i> Panel Admin</a></li>
                            @endif
                            <li><a class="dropdown-item py-2 fw-semibold" href="#"><i class="bi bi-bag-check me-2"></i> Pesanan Saya</a></li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item py-2 fw-semibold text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutConfirmModalCustomer">
                                    <i class="bi bi-box-arrow-right me-2"></i> Keluar
                                </a>
                                <form id="logoutFormCustomer" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest

                <a href="{{ route('cart.index') }}" class="header-icon position-relative" title="Keranjang">
                    <i class="bi bi-bag"></i>
                    <span class="cart-badge">{{ count(session()->get('cart', [])) }}</span>
                </a>
            </div>
        </div>
    </nav>
</header>

<!-- Logout Confirmation Modal (Customer) -->
<div class="modal fade" id="logoutConfirmModalCustomer" tabindex="-1" aria-labelledby="logoutConfirmModalCustomerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 shadow-lg" style="background-color: #ffffff;">
            <div class="modal-header border-0 bg-dark text-white rounded-0 py-3">
                <h5 class="modal-title text-uppercase fw-bold mb-0" id="logoutConfirmModalCustomerLabel" style="font-family: var(--font-display); font-size: 0.95rem; letter-spacing: 1px;"><i class="bi bi-box-arrow-right text-turquoise me-2"></i> Konfirmasi Keluar</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4 text-center">
                <p class="mb-0 text-muted" style="font-size: 0.95rem; line-height: 1.6;">Apakah Anda yakin ingin keluar dari akun Anda di RDN Bikes?</p>
            </div>
            <div class="modal-footer border-0 pt-0 pb-4 d-flex justify-content-center gap-2">
                <button type="button" class="btn btn-outline-dark rounded-0 px-4 py-2 text-uppercase fw-bold" data-bs-dismiss="modal" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Batal</button>
                <button type="button" class="btn btn-turquoise rounded-0 px-4 py-2 text-uppercase fw-bold" onclick="event.preventDefault(); document.getElementById('logoutFormCustomer').submit();" style="font-family: var(--font-display); font-size: 0.75rem; letter-spacing: 1px;">Ya, Keluar</button>
            </div>
        </div>
    </div>
</div>
