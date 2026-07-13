<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Admin - RDN Bikes</title>
    
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
    
    <style>
        :root {
            --rdn-turquoise: #00ccce;
            --rdn-turquoise-hover: #00a8a9;
            --rdn-dark: #111111;
            --rdn-dark-muted: #1d1d1d;
            --rdn-light-gray: #f8f9fa;
            --font-display: 'Montserrat', sans-serif;
            --font-body: 'Inter', sans-serif;
        }
        
        body {
            font-family: var(--font-body);
            background-color: var(--rdn-dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            padding: 20px 0;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
        }

        .card-login {
            background-color: var(--rdn-dark-muted);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 0;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            padding: 45px 35px;
        }

        .brand-logo {
            font-family: var(--font-display);
            font-weight: 900;
            font-style: italic;
            font-size: 1.8rem;
            letter-spacing: -1.5px;
            text-transform: uppercase;
            text-decoration: none;
            color: #ffffff !important;
            display: inline-block;
            margin-bottom: 25px;
        }

        .brand-logo span.accent {
            color: var(--rdn-turquoise);
        }

        .form-label-custom {
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            color: #aaaaaa;
        }

        .form-control-custom {
            border-radius: 0;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background-color: rgba(255, 255, 255, 0.02);
            padding: 12px 18px;
            font-size: 0.9rem;
            color: #ffffff;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            border-color: var(--rdn-turquoise);
            box-shadow: none;
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }

        .btn-turquoise {
            background-color: var(--rdn-turquoise);
            border: 1px solid var(--rdn-turquoise);
            color: #ffffff;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 1px;
            padding: 12px 30px;
            text-transform: uppercase;
            border-radius: 0;
            width: 100%;
            transition: all 0.2s ease;
        }
        
        .btn-turquoise:hover {
            background-color: var(--rdn-turquoise-hover);
            border-color: var(--rdn-turquoise-hover);
            color: #ffffff;
        }

        .back-to-shop {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #666666;
            text-decoration: none;
            transition: color 0.2s;
            display: inline-flex;
            align-items: center;
        }

        .back-to-shop:hover {
            color: var(--rdn-turquoise);
        }

        .alert-custom {
            border-radius: 0;
            font-size: 0.85rem;
            border: 1px solid transparent;
        }

        .alert-danger-custom {
            background-color: rgba(220, 53, 69, 0.1);
            border-color: rgba(220, 53, 69, 0.2);
            color: #ea868f;
        }

        .alert-success-custom {
            background-color: rgba(0, 204, 206, 0.1);
            border-color: rgba(0, 204, 206, 0.2);
            color: var(--rdn-turquoise);
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Back to shop link -->
        <div class="mb-4 text-start">
            <a href="/" class="back-to-shop">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Toko
            </a>
        </div>

        <div class="card-login text-center">
            <!-- Logo -->
            <a href="/" class="brand-logo">
                RDN<span class="accent">BIKES</span>
            </a>
            
            <h5 class="mb-4 display-font text-uppercase" style="font-size: 0.9rem; letter-spacing: 2px; color: var(--rdn-turquoise);">ADMINISTRATOR PORTAL</h5>

            <!-- Flash Session Alerts -->
            @if(session('success'))
                <div class="alert alert-success-custom alert-custom alert-dismissible fade show text-start mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger-custom alert-custom alert-dismissible fade show text-start mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger-custom alert-custom text-start mb-4">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                
                <!-- Email Field -->
                <div class="mb-3 text-start">
                    <label for="email" class="form-label form-label-custom">Email Administrator</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           class="form-control form-control-custom" 
                           placeholder="admin@rdnbikes.com" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus>
                </div>
                
                <!-- Password Field -->
                <div class="mb-4 text-start">
                    <label for="password" class="form-label form-label-custom">Password</label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           class="form-control form-control-custom" 
                           placeholder="Masukkan password Anda" 
                           required>
                </div>
                
                <!-- Remember Me Checkbox -->
                <div class="mb-4 text-start d-flex align-items-center">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input me-2" style="border-radius: 0; cursor: pointer; border-color: rgba(255,255,255,0.3); background-color: transparent;">
                    <label for="remember" class="form-check-label" style="font-size: 0.85rem; cursor: pointer; user-select: none; color: #aaaaaa;">Ingat saya di perangkat ini</label>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-turquoise mb-4"><i class="bi bi-shield-lock-fill me-2"></i> Masuk Dashboard</button>
            </form>
            
            <p class="text-muted mb-0" style="font-size: 0.8rem;">Gunakan akun administrator terdaftar untuk mengakses.</p>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
