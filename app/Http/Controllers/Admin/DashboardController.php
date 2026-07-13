<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_roles' => Role::count(),
            'total_users' => User::count(),
            'pending_orders' => 3, // Mocked for design prototyping phase
            'active_products' => 8, // Mocked for design prototyping phase
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
