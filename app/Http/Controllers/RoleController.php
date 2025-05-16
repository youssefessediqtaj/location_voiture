<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles',
            'description' => 'nullable',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);
        $role = Role::create($validated);
        if (isset($validated['permissions'])) {
            $role->permissions()->sync($validated['permissions']);
        }
        return redirect()->route('roles.show', $role)
            ->with('success', 'Rôle créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role->load('permissions');
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $role->load('permissions');
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'description' => 'nullable',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);
        $role->update($validated);
        if (isset($validated['permissions'])) {
            $role->permissions()->sync($validated['permissions']);
        }
        return redirect()->route('roles.show', $role)
            ->with('success', 'Rôle mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Rôle supprimé avec succès.');
    }
}
