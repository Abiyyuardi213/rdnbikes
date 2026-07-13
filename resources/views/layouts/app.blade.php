<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="RDN Bikes - Toko Sepeda & Custom Jersey Premium. Pilihan terbaik untuk sepeda balap, gravel, apparel, dan pembuatan jersey custom berkualitas tinggi.">
    <title>@yield('title', 'RDN Bikes - Premium Bike Store & Custom Apparel')</title>
    
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
    
    <!-- Custom CSS to replicate Subjersey theme -->
    <style>
        :root {
            --rdn-turquoise: #00ccce;
            --rdn-turquoise-hover: #00a8a9;
            --rdn-dark: #111111;
            --rdn-light-gray: #f8f9fa;
            --rdn-border-color: #ebebeb;
            --rdn-gold: #c3935b;
            --font-display: 'Montserrat', sans-serif;
            --font-body: 'Inter', sans-serif;
        }
        
        body {
            font-family: var(--font-body);
            color: #212529;
            background-color: #ffffff;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6, .display-font {
            font-family: var(--font-display);
            font-weight: 700;
            letter-spacing: -0.5px;
            color: var(--rdn-dark);
        }

        /* Announcement Bar */
        .announcement-bar {
            background-color: var(--rdn-turquoise);
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 8px 0;
            text-transform: uppercase;
            font-family: var(--font-display);
            text-align: center;
        }
        
        /* Navbar Styling */
        .site-header {
            transition: all 0.3s ease-in-out;
            border-bottom: 1px solid var(--rdn-border-color);
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1030;
        }
        
        .site-header.scrolled {
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 5px 0 !important;
        }

        .navbar-brand {
            font-family: var(--font-display);
            font-weight: 900;
            font-style: italic;
            font-size: 1.6rem;
            letter-spacing: -1.5px;
            text-transform: uppercase;
            color: var(--rdn-dark) !important;
            transition: opacity 0.2s;
        }
        
        .navbar-brand span.accent {
            color: var(--rdn-turquoise);
        }
        
        .navbar-brand:hover {
            opacity: 0.85;
        }

        .nav-link {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--rdn-dark) !important;
            padding: 10px 15px !important;
            transition: color 0.2s ease;
            position: relative;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--rdn-turquoise) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 4px;
            left: 15px;
            background-color: var(--rdn-turquoise);
            transition: width 0.2s ease;
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: calc(100% - 30px);
        }
        
        .header-icon {
            color: var(--rdn-dark);
            font-size: 1.25rem;
            padding: 8px;
            transition: color 0.2s;
            position: relative;
        }
        
        .header-icon:hover {
            color: var(--rdn-turquoise);
        }

        .cart-badge {
            position: absolute;
            top: 2px;
            right: 0px;
            background-color: var(--rdn-turquoise);
            color: white;
            font-size: 0.65rem;
            padding: 2px 5px;
            border-radius: 50%;
            font-weight: 700;
            font-family: var(--font-display);
        }

        /* Hero Carousel */
        .hero-carousel {
            margin-top: 0;
        }
        
        .carousel-item {
            height: 85vh;
            min-height: 480px;
            background-color: #000;
        }
        
        .carousel-img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            opacity: 0.65;
            transition: transform 8s ease;
        }

        .active .carousel-img {
            transform: scale(1.05);
        }
        
        .carousel-caption-custom {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            color: #ffffff;
            text-align: center;
            width: 80%;
            max-width: 800px;
        }
        
        .carousel-caption-custom h5 {
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--rdn-turquoise);
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .carousel-caption-custom h2 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            text-transform: uppercase;
            margin-bottom: 25px;
            color: #fff;
            animation: fadeInUp 1s ease 0.2s forwards;
            opacity: 0;
        }
        
        .carousel-caption-custom p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            font-weight: 300;
            animation: fadeInUp 1s ease 0.4s forwards;
            opacity: 0;
        }

        .carousel-caption-custom .btn-action {
            animation: fadeInUp 1s ease 0.6s forwards;
            opacity: 0;
        }
        
        .btn-turquoise {
            background-color: var(--rdn-turquoise);
            border: 2px solid var(--rdn-turquoise);
            color: #ffffff;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            padding: 12px 30px;
            text-transform: uppercase;
            border-radius: 0;
            transition: all 0.3s ease;
        }
        
        .btn-turquoise:hover {
            background-color: transparent;
            border-color: #ffffff;
            color: #ffffff;
        }

        .btn-outline-white {
            background-color: transparent;
            border: 2px solid #ffffff;
            color: #ffffff;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            padding: 12px 30px;
            text-transform: uppercase;
            border-radius: 0;
            transition: all 0.3s ease;
        }
        
        .btn-outline-white:hover {
            background-color: #ffffff;
            color: var(--rdn-dark);
        }

        /* Category Grid */
        .category-card {
            position: relative;
            overflow: hidden;
            background-color: #000;
            height: 380px;
            cursor: pointer;
            margin-bottom: 24px;
        }
        
        .category-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.75;
            transition: transform 0.5s ease, opacity 0.5s ease;
        }
        
        .category-card:hover img {
            transform: scale(1.08);
            opacity: 0.6;
        }
        
        .category-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 40px;
            z-index: 2;
        }

        .category-overlay::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 60%, rgba(0,0,0,0) 100%);
            z-index: -1;
        }
        
        .category-overlay h4 {
            color: #ffffff;
            font-size: 1.5rem;
            text-transform: uppercase;
            font-weight: 800;
            margin-bottom: 5px;
        }
        
        .category-overlay span {
            color: var(--rdn-turquoise);
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            position: relative;
            padding-right: 15px;
            transition: padding-left 0.3s ease;
        }

        .category-card:hover .category-overlay span {
            padding-left: 10px;
        }
        
        .category-overlay span::after {
            content: '\2192';
            position: absolute;
            right: 0;
            top: -1px;
        }

        /* Featured Products */
        .section-title-wr {
            margin-bottom: 50px;
            position: relative;
        }
        
        .section-subtitle {
            color: var(--rdn-turquoise);
            font-size: 0.8rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .section-title {
            font-size: 2.2rem;
            font-weight: 800;
            text-transform: uppercase;
            color: var(--rdn-dark);
            margin: 0;
        }

        .product-card {
            border: 1px solid var(--rdn-border-color);
            background: #fff;
            transition: all 0.3s ease;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .product-card:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-color: #d1d1d1;
        }
        
        .product-card-img-wr {
            position: relative;
            overflow: hidden;
            aspect-ratio: 1/1;
            background-color: var(--rdn-light-gray);
        }
        
        .product-card-img-wr img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        
        .product-card:hover .product-card-img-wr img {
            transform: scale(1.05);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            font-family: var(--font-display);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 5px 12px;
            text-transform: uppercase;
            z-index: 5;
        }
        
        .badge-new {
            background-color: var(--rdn-dark);
            color: #ffffff;
        }
        
        .badge-sale {
            background-color: var(--rdn-turquoise);
            color: #ffffff;
        }

        .product-card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255,255,255,0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 4;
        }

        .product-card:hover .product-card-overlay {
            opacity: 1;
        }

        .product-card-info {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .product-card-category {
            color: #888888;
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        
        .product-card-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--rdn-dark);
            text-transform: uppercase;
            margin-bottom: 10px;
            text-decoration: none;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 2.4rem;
        }
        
        .product-card-title:hover {
            color: var(--rdn-turquoise);
        }

        .product-card-price {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--rdn-dark);
            margin: 0;
        }
        
        .product-card-price span.sale-price {
            color: #ff334b;
            margin-right: 8px;
        }
        
        .product-card-price span.old-price {
            color: #bbbbbb;
            text-decoration: line-through;
            font-size: 0.85rem;
            font-weight: 400;
        }

        /* Custom Jersey Service Banner */
        .custom-banner {
            background-color: var(--rdn-dark);
            color: #ffffff;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .custom-banner-bg {
            position: absolute;
            top: 0;
            right: 0;
            width: 45%;
            height: 100%;
            background-image: url('/images/category_jerseys.png');
            background-size: cover;
            background-position: center;
            opacity: 0.15;
            z-index: 1;
        }
        
        .custom-banner .container {
            position: relative;
            z-index: 2;
        }
        
        .custom-banner h3 {
            color: #ffffff;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .custom-banner h3 span {
            color: var(--rdn-turquoise);
        }

        .custom-banner p {
            font-size: 1.1rem;
            color: #cccccc;
            max-width: 600px;
            margin-bottom: 40px;
            font-weight: 300;
        }

        .step-item {
            margin-bottom: 25px;
        }
        
        .step-num {
            font-family: var(--font-display);
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--rdn-turquoise);
            margin-right: 15px;
            line-height: 1;
        }
        
        .step-title {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.95rem;
            margin-bottom: 5px;
            color: #ffffff;
        }
        
        .step-desc {
            font-size: 0.85rem;
            color: #aaaaaa;
            margin: 0;
        }

        /* Our Stories */
        .story-card {
            border: none;
            background: none;
            margin-bottom: 30px;
        }
        
        .story-card-img-wr {
            overflow: hidden;
            margin-bottom: 20px;
            height: 240px;
        }
        
        .story-card-img-wr img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .story-card:hover .story-card-img-wr img {
            transform: scale(1.05);
        }
        
        .story-date {
            color: var(--rdn-turquoise);
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        
        .story-title {
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.4;
            color: var(--rdn-dark);
            text-transform: uppercase;
            margin-bottom: 12px;
            text-decoration: none;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 3.2rem;
        }

        .story-title:hover {
            color: var(--rdn-turquoise);
        }
        
        .story-desc {
            font-size: 0.9rem;
            color: #666666;
            line-height: 1.6;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .story-link {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 1px;
            color: var(--rdn-dark);
            text-transform: uppercase;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .story-link:hover {
            color: var(--rdn-turquoise);
        }

        /* Newsletter Banner */
        .newsletter-section {
            background-color: var(--rdn-light-gray);
            border-top: 1px solid var(--rdn-border-color);
            border-bottom: 1px solid var(--rdn-border-color);
            padding: 60px 0;
        }

        .newsletter-section h4 {
            font-size: 1.8rem;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        
        .newsletter-section p {
            color: #666666;
            font-size: 0.95rem;
            margin-bottom: 0;
        }
        
        .newsletter-form .form-control {
            border-radius: 0;
            border: 1px solid #cccccc;
            padding: 12px 20px;
            font-size: 0.9rem;
        }
        
        .newsletter-form .form-control:focus {
            border-color: var(--rdn-turquoise);
            box-shadow: none;
        }
        
        .newsletter-form .btn {
            border-radius: 0;
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px 30px;
        }

        /* Footer */
        .site-footer {
            background-color: #000000;
            color: #cccccc;
            padding: 80px 0 30px 0;
            font-size: 0.85rem;
        }
        
        .site-footer h5 {
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 25px;
        }
        
        .site-footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .site-footer ul li {
            margin-bottom: 12px;
        }
        
        .site-footer ul li a {
            color: #888888;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .site-footer ul li a:hover {
            color: var(--rdn-turquoise);
        }
        
        .site-footer p {
            color: #888888;
            line-height: 1.6;
        }

        .footer-social-links a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background-color: #1a1a1a;
            color: #ffffff;
            text-align: center;
            line-height: 36px;
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.2s ease;
        }

        .footer-social-links a:hover {
            background-color: var(--rdn-turquoise);
            color: #ffffff;
        }
        
        .footer-bottom {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid #1a1a1a;
        }
        
        .footer-bottom p {
            margin: 0;
        }

        .payment-icons img {
            height: 24px;
            margin-left: 10px;
            opacity: 0.6;
            transition: opacity 0.2s;
        }
        
        .payment-icons img:hover {
            opacity: 1;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <!-- Announcement Bar -->
    <div class="announcement-bar">
        RDN CUSTOM JERSEY - CETAK DESAIN CUSTOM TANPA MINIMUM ORDER. MULAI DARI 1 PCS!
    </div>

    <!-- Session Alerts -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 rounded-0 text-center m-0 py-2 d-flex justify-content-center align-items-center" role="alert" style="background-color: #e8f9f9; color: #0c7475; font-size: 0.85rem; font-family: var(--font-display); font-weight: 600;">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 rounded-0 text-center m-0 py-2 d-flex justify-content-center align-items-center" role="alert" style="background-color: #fdf2f2; color: #9b1c1c; font-size: 0.85rem; font-family: var(--font-display); font-weight: 600;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Navbar Component -->
    @include('layouts.partials.navbar')

    <!-- Page Content Section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Component -->
    @include('layouts.partials.footer')

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scroll Header Script -->
    <script>
        window.addEventListener('scroll', function() {
            var header = document.getElementById('mainHeader');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
