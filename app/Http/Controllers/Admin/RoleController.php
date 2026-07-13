<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $roles = Role::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->withCount('users')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('admin.roles.index', compact('roles', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:roles,name|alpha_dash',
            'description' => 'nullable|string|max:255',
        ], [
            'name.alpha_dash' => 'Nama role hanya boleh berisi huruf, angka, strip, dan underscore.',
            'name.unique' => 'Nama role sudah terdaftar.',
        ]);

        // Normalize name to lowercase
        $validated['name'] = strtolower($validated['name']);

        Role::create($validated);

        return redirect()->route('admin.roles.index')
            ->with('success', "Role '{$validated['name']}' berhasil ditambahkan.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|alpha_dash|unique:roles,name,' . $role->id,
            'description' => 'nullable|string|max:255',
        ], [
            'name.alpha_dash' => 'Nama role hanya boleh berisi huruf, angka, strip, dan underscore.',
            'name.unique' => 'Nama role sudah terdaftar.',
        ]);

        // Normalize name to lowercase
        $validated['name'] = strtolower($validated['name']);

        // Check if trying to rename default protected roles
        $protectedRoles = ['admin', 'staff', 'customer'];
        if (in_array($role->name, $protectedRoles) && $validated['name'] !== $role->name) {
            return redirect()->back()
                ->withInput()
                ->with('error', "Role sistem bawaan '{$role->name}' tidak boleh diubah namanya.");
        }

        $role->update($validated);

        return redirect()->route('admin.roles.index')
            ->with('success', "Role '{$role->name}' berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Prevent deleting default protected roles
        $protectedRoles = ['admin', 'staff', 'customer'];
        if (in_array($role->name, $protectedRoles)) {
            return redirect()->route('admin.roles.index')
                ->with('error', "Role sistem bawaan '{$role->name}' tidak dapat dihapus.");
        }

        // Check if there are users associated with this role
        if ($role->users()->count() > 0) {
            return redirect()->route('admin.roles.index')
                ->with('error', "Role '{$role->name}' tidak dapat dihapus karena masih digunakan oleh user.");
        }

        $roleName = $role->name;
        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', "Role '{$roleName}' berhasil dihapus.");
    }
}
