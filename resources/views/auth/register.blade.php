<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Pelanggan - RDN Bikes</title>
    
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
            --rdn-light-gray: #f8f9fa;
            --font-display: 'Montserrat', sans-serif;
            --font-body: 'Inter', sans-serif;
        }
        
        body {
            font-family: var(--font-body);
            background-color: var(--rdn-light-gray);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333333;
            padding: 40px 0;
        }

        .register-container {
            width: 100%;
            max-width: 480px;
        }

        .card-register {
            background-color: #ffffff;
            border: 1px solid #ebebeb;
            border-radius: 0;
            box-shadow: 0 10px 40px rgba(0,0,0,0.04);
            padding: 40px 35px;
        }

        .brand-logo {
            font-family: var(--font-display);
            font-weight: 900;
            font-style: italic;
            font-size: 1.8rem;
            letter-spacing: -1.5px;
            text-transform: uppercase;
            text-decoration: none;
            color: var(--rdn-dark) !important;
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
            color: var(--rdn-dark);
        }

        .form-control-custom {
            border-radius: 0;
            border: 1px solid #cccccc;
            padding: 12px 18px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            border-color: var(--rdn-turquoise);
            box-shadow: none;
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
            color: #888888;
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
        }
    </style>
</head>
<body>

    <div class="register-container">
        <!-- Back to shop link -->
        <div class="mb-4 text-start">
            <a href="/" class="back-to-shop">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Toko
            </a>
        </div>

        <div class="card-register text-center">
            <!-- Logo -->
            <a href="/" class="brand-logo">
                RDN<span class="accent">BIKES</span>
            </a>
            
            <h5 class="mb-4 display-font text-uppercase" style="font-size: 1rem; letter-spacing: 1px; color: #666666;">Daftar Akun Baru</h5>

            <!-- Error Alerts -->
            @if($errors->any())
                <div class="alert alert-danger alert-custom text-start mb-4">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Registration Form -->
            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="row">
                    <!-- First Name Field -->
                    <div class="col-md-6 mb-3 text-start">
                        <label for="first_name" class="form-label form-label-custom">Nama Depan <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="first_name" 
                               id="first_name" 
                               class="form-control form-control-custom" 
                               placeholder="Contoh: Abiyyu" 
                               value="{{ old('first_name') }}" 
                               required 
                               autofocus>
                    </div>

                    <!-- Last Name Field -->
                    <div class="col-md-6 mb-3 text-start">
                        <label for="last_name" class="form-label form-label-custom">Nama Belakang</label>
                        <input type="text" 
                               name="last_name" 
                               id="last_name" 
                               class="form-control form-control-custom" 
                               placeholder="Contoh: Ardi" 
                               value="{{ old('last_name') }}">
                    </div>
                </div>
                
                <!-- Email Field -->
                <div class="mb-3 text-start">
                    <label for="email" class="form-label form-label-custom">Alamat Email <span class="text-danger">*</span></label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           class="form-control form-control-custom" 
                           placeholder="email@example.com" 
                           value="{{ old('email') }}" 
                           required>
                </div>
                
                <!-- Password Field -->
                <div class="mb-3 text-start">
                    <label for="password" class="form-label form-label-custom">Password <span class="text-danger">*</span></label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           class="form-control form-control-custom" 
                           placeholder="Minimal 6 karakter" 
                           required>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-4 text-start">
                    <label for="password_confirmation" class="form-label form-label-custom">Konfirmasi Password <span class="text-danger">*</span></label>
                    <input type="password" 
                           name="password_confirmation" 
                           id="password_confirmation" 
                           class="form-control form-control-custom" 
                           placeholder="Ulangi password Anda" 
                           required>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-turquoise mb-4"><i class="bi bi-person-plus-fill me-2"></i> Buat Akun Sekarang</button>
            </form>
            
            <hr class="my-4">
            
            <p class="text-muted mb-0" style="font-size: 0.85rem;">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-decoration-none text-dark fw-bold">Masuk Sekarang</a></p>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
