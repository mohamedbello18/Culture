<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate; // Import Gate facade

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id_role', 'desc')->paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_role' => 'required|string|max:50|unique:roles',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')
                         ->with('success', 'Rôle créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom_role' => [
                'required',
                'string',
                'max:50',
                Rule::unique('roles', 'nom_role')->ignore($id, 'id_role'),
            ],
        ]);

        $role = Role::findOrFail($id);
        $role->update($request->all());

        return redirect()->route('roles.index')
                         ->with('success', 'Rôle mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('delete'); // Apply authorization check

        $role = Role::findOrFail($id);

        // SECURITE: Vérifier si le rôle est utilisé avant de le supprimer (nécessite une relation 'utilisateurs' dans le modèle Role)
        // if (method_exists($role, 'utilisateurs') && $role->utilisateurs()->count() > 0) {
        //     return redirect()->route('roles.index')
        //                      ->with('error', 'Impossible de supprimer ce rôle. Il est utilisé par des utilisateurs.');
        // }

        $role->delete();

        return redirect()->route('roles.index')
                         ->with('success', 'Rôle supprimé avec succès.');
    }
}
