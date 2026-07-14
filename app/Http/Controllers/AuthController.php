<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    /**
     * Show customer login form.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    /**
     * Handle customer login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // If they are an admin, redirect to admin dashboard if they want, but default is homepage
            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin')
                    ->with('success', 'Selamat datang kembali, Admin!');
            }

            return redirect()->intended('/')
                ->with('success', 'Login berhasil! Selamat datang di RDN Bikes.');
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Email atau password yang Anda masukkan salah.',
            ]);
    }

    /**
     * Show admin login form.
     */
    public function showAdminLoginForm()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin-login');
    }

    /**
     * Handle admin login.
     */
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Check if the user is authorized as an Admin/Super Admin
            if (Auth::user()->isAdmin()) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Login berhasil! Selamat datang di Panel Admin RDN Bikes.');
            }

            // If logged in but NOT admin, log them out immediately of the admin session
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login')
                ->withInput($request->only('email'))
                ->with('error', 'Akses ditolak. Akun Anda tidak terdaftar sebagai administrator.');
        }

        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Email atau password salah.',
            ]);
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('logout_success', 'Anda telah berhasil keluar dari sistem.');
    }

    /**
     * Show customer registration form.
     */
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.register');
    }

    /**
     * Handle customer registration.
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Get default customer role
        $customerRole = Role::where('name', 'customer')->first();

        // Create user
        $user = User::create([
            'name' => trim($request->first_name . ' ' . ($request->last_name ?? '')),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $customerRole ? $customerRole->id : null,
        ]);

        // Log user in
        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/')
            ->with('success', 'Registrasi berhasil! Selamat datang di RDN Bikes.');
    }
}
