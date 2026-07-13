<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $roleFilter = $request->input('role_id');

        $users = User::query()
            ->with('role')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when($roleFilter, function ($query, $roleFilter) {
                return $query->where('role_id', $roleFilter);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        $roles = Role::orderBy('name', 'asc')->get();

        return view('admin.users.index', compact('users', 'roles', 'search', 'roleFilter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'asc')->get();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ], [
            'email.unique' => 'Alamat email sudah digunakan oleh pengguna lain.',
            'password.min' => 'Password minimal terdiri dari 6 karakter.',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', "User '{$validated['name']}' berhasil ditambahkan.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name', 'asc')->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ], [
            'email.unique' => 'Alamat email sudah digunakan oleh pengguna lain.',
            'password.min' => 'Password minimal terdiri dari 6 karakter.',
        ]);

        // Safety check: Prevent modifying own role
        if ($request->user() && $request->user()->id === $user->id && $validated['role_id'] != $user->role_id) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Anda tidak diperbolehkan mengubah role akun Anda sendiri.');
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', "User '{$user->name}' berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        // Safety check: Prevent deleting logged-in account
        if ($request->user() && $request->user()->id === $user->id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri yang sedang digunakan.');
        }

        // Prevent deleting the primary superadmin account
        if ($user->email === 'superadmin@rdnbikes.com') {
            return redirect()->route('admin.users.index')
                ->with('error', 'Akun Super Admin utama tidak dapat dihapus.');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', "User '{$userName}' berhasil dihapus.");
    }
}
