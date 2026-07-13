<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Admin RDN Bikes</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://subjersey.com/cdn/shop/files/Frame_1_5_32x32.png?v=1660193625" type="image/png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <!-- Custom CSS to match Subjersey theme -->
    <style>
        :root {
            --admin-sidebar-width: 260px;
            --rdn-turquoise: #00ccce;
            --rdn-turquoise-hover: #00a8a9;
            --rdn-dark: #111111;
            --rdn-dark-muted: #1d1d1d;
            --rdn-light-gray: #f8f9fa;
            --rdn-border-color: #ebebeb;
            --font-display: 'Montserrat', sans-serif;
            --font-body: 'Inter', sans-serif;
        }
        
        body {
            font-family: var(--font-body);
            background-color: var(--rdn-light-gray);
            color: #333333;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6, .display-font {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--rdn-dark);
        }

        /* Sidebar Styling */
        .sidebar {
            width: var(--admin-sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--rdn-dark);
            color: #ffffff;
            z-index: 1000;
            transition: all 0.3s ease;
            border-right: 1px solid rgba(255,255,255,0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 30px 0;
        }

        .sidebar-brand {
            padding: 0 25px 30px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-brand a {
            font-family: var(--font-display);
            font-weight: 900;
            font-style: italic;
            font-size: 1.4rem;
            letter-spacing: -1.5px;
            text-transform: uppercase;
            color: #ffffff !important;
            text-decoration: none;
        }
        
        .sidebar-brand a span.accent {
            color: var(--rdn-turquoise);
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
            margin: 0;
            flex-grow: 1;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: #aaaaaa;
            text-decoration: none;
            font-family: var(--font-display);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.2s ease;
            border-left: 4px solid transparent;
        }

        .sidebar-menu li a i {
            font-size: 1.1rem;
            margin-right: 15px;
        }

        .sidebar-menu li a:hover {
            color: #ffffff;
            background-color: var(--rdn-dark-muted);
            border-left-color: rgba(255,255,255,0.2);
        }

        .sidebar-menu li a.active {
            color: #ffffff;
            background-color: var(--rdn-dark-muted);
            border-left-color: var(--rdn-turquoise);
        }

        .sidebar-menu li a.active i {
            color: var(--rdn-turquoise);
        }

        .sidebar-footer {
            padding: 0 25px;
            border-top: 1px solid rgba(255,255,255,0.05);
            padding-top: 20px;
        }

        /* Main Panel Styling */
        .main-panel {
            margin-left: var(--admin-sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        /* Top Navbar */
        .admin-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid var(--rdn-border-color);
            padding: 15px 30px;
        }

        .admin-navbar .navbar-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0;
        }

        /* Content Container */
        .admin-content {
            padding: 40px 30px;
            flex-grow: 1;
        }

        /* Card Custom Styling */
        .card-custom {
            border: 1px solid var(--rdn-border-color);
            border-radius: 0;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            margin-bottom: 30px;
        }

        .card-custom .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid var(--rdn-border-color);
            padding: 20px 25px;
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.95rem;
        }

        .card-custom .card-body {
            padding: 25px;
        }

        /* Buttons Custom Styling */
        .btn-turquoise {
            background-color: var(--rdn-turquoise);
            border: 1px solid var(--rdn-turquoise);
            color: #ffffff;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 1px;
            padding: 10px 20px;
            text-transform: uppercase;
            border-radius: 0;
            transition: all 0.2s ease;
        }
        
        .btn-turquoise:hover {
            background-color: var(--rdn-turquoise-hover);
            border-color: var(--rdn-turquoise-hover);
            color: #ffffff;
        }

        .btn-dark-custom {
            background-color: var(--rdn-dark);
            border: 1px solid var(--rdn-dark);
            color: #ffffff;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 1px;
            padding: 10px 20px;
            text-transform: uppercase;
            border-radius: 0;
            transition: all 0.2s ease;
        }

        .btn-dark-custom:hover {
            background-color: #000000;
            border-color: #000000;
            color: #ffffff;
        }

        .btn-outline-custom {
            background-color: transparent;
            border: 1px solid var(--rdn-dark);
            color: var(--rdn-dark);
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 1px;
            padding: 10px 20px;
            text-transform: uppercase;
            border-radius: 0;
            transition: all 0.2s ease;
        }

        .btn-outline-custom:hover {
            background-color: var(--rdn-dark);
            color: #ffffff;
        }

        /* Table custom styling */
        .table-custom {
            margin-bottom: 0;
        }

        .table-custom th {
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            background-color: var(--rdn-light-gray);
            border-bottom: 2px solid var(--rdn-border-color);
            padding: 15px 20px;
        }

        .table-custom td {
            padding: 15px 20px;
            vertical-align: middle;
            font-size: 0.9rem;
            border-bottom: 1px solid var(--rdn-border-color);
        }

        /* Custom Alert colors */
        .alert-success-custom {
            background-color: #e8f9f9;
            border-color: #d1f3f3;
            color: #0c7475;
            border-radius: 0;
        }

        .alert-danger-custom {
            background-color: #fdf2f2;
            border-color: #fbe3e3;
            color: #9b1c1c;
            border-radius: 0;
        }

        /* Pagination custom styling */
        .pagination .page-item .page-link {
            border-radius: 0;
            color: var(--rdn-dark);
            border-color: var(--rdn-border-color);
            font-family: var(--font-display);
            font-weight: 600;
            font-size: 0.85rem;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--rdn-turquoise);
            border-color: var(--rdn-turquoise);
            color: #ffffff;
        }

        .pagination .page-item .page-link:focus {
            box-shadow: none;
        }

        /* Badge Custom */
        .badge-custom {
            font-family: var(--font-display);
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.7rem;
            padding: 5px 10px;
            border-radius: 0;
        }

        .badge-turquoise {
            background-color: #e8f9f9;
            color: #0c7475;
            border: 1px solid #d1f3f3;
        }
        
        .badge-dark {
            background-color: #f1f1f1;
            color: #333;
            border: 1px solid #e1e1e1;
        }

        /* Form Controls Custom */
        .form-control-custom {
            border-radius: 0;
            border: 1px solid #cccccc;
            padding: 10px 15px;
            font-size: 0.9rem;
        }

        .form-control-custom:focus {
            border-color: var(--rdn-turquoise);
            box-shadow: none;
        }
        
        .form-label-custom {
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            color: var(--rdn-dark);
        }

        /* responsive adjustment */
        @media(max-width: 991.98px) {
            .sidebar {
                left: -260px;
            }
            .sidebar.active {
                left: 0;
            }
            .main-panel {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar Section -->
    <aside class="sidebar" id="sidebar">
        <div>
            <!-- Brand Logo -->
            <div class="sidebar-brand text-center">
                <a href="/">
                    RDN<span class="accent">BIKES</span>
                </a>
            </div>
            
            <!-- Menu Navigation -->
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.roles.index') }}" class="{{ Route::is('admin.roles.*') ? 'active' : '' }}">
                        <i class="bi bi-shield-check"></i> Role & Akses
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="{{ Route::is('admin.users.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i> Users
                    </a>
                </li>
                <li>
                    <a href="#" class="">
                        <i class="bi bi-bicycle"></i> Produk Sepeda
                    </a>
                </li>
                <li>
                    <a href="#" class="">
                        <i class="bi bi-palette"></i> Custom Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="">
                        <i class="bi bi-gear"></i> Pengaturan
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Sidebar Footer/Logout -->
        <div class="sidebar-footer">
            <a href="/" class="d-flex align-items-center text-decoration-none text-muted-custom py-2" style="font-family: var(--font-display); font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; color: #888888; transition: color 0.2s;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#888888'">
                <i class="bi bi-arrow-left-circle me-3" style="font-size: 1.1rem;"></i> Kembali ke Toko
            </a>
        </div>
    </aside>

    <!-- Main Content Panel -->
    <div class="main-panel">
        
        <!-- Top Navbar -->
        <header class="admin-navbar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <!-- Mobile Toggler -->
                <button class="btn btn-outline-dark border-0 d-lg-none me-3 p-1" type="button" onclick="toggleSidebar()">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h1 class="navbar-title">Panel Admin</h1>
            </div>
            
            <div class="d-flex align-items-center">
                <!-- User Profile Dropdown -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle border-0 d-flex align-items-center p-0" type="button" id="adminUserDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: var(--font-display); font-weight: 700; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px;">
                        <i class="bi bi-person-circle fs-5 me-2 text-dark"></i> {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-0" aria-labelledby="adminUserDropdown">
                        <li><a class="dropdown-item py-2" href="#" style="font-size: 0.85rem; font-weight: 600;"><i class="bi bi-person me-2"></i> Profil Saya</a></li>
                        <li><a class="dropdown-item py-2" href="#" style="font-size: 0.85rem; font-weight: 600;"><i class="bi bi-gear me-2"></i> Pengaturan Akun</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-2 text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logoutFormAdmin').submit();" style="font-size: 0.85rem; font-weight: 600;">
                                <i class="bi bi-box-arrow-right me-2"></i> Keluar
                            </a>
                            <form id="logoutFormAdmin" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="admin-content">
            
            <!-- Success/Error Session Alerts -->
            @if(session('success'))
                <div class="alert alert-success-custom alert-dismissible fade show border-start border-4 border-success d-flex align-items-center mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-3 fs-5"></i>
                    <div>
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger-custom alert-dismissible fade show border-start border-4 border-danger d-flex align-items-center mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-3 fs-5"></i>
                    <div>
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Sidebar Toggle Script -->
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>
