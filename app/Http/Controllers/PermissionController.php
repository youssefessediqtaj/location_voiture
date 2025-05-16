<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:permissions',
            'description' => 'nullable',
        ]);
        $permission = Permission::create($validated);
        return redirect()->route('permissions.show', $permission)
            ->with('success', 'Permission créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
            'description' => 'nullable',
        ]);
        $permission->update($validated);
        return redirect()->route('permissions.show', $permission)
            ->with('success', 'Permission mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')
            ->with('success', 'Permission supprimée avec succès.');
    }
}
