<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AsignarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $users = User::all();
        $users = User::oldest()->paginate(10);
        return view('dashboard.userList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);

        $roles = Role::all();

        return view('dashboard.userRol', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
    
        if ($request->has('action') && $request->input('action') === 'updateRoles') {
            // Actualizar roles
            $user->roles()->sync($request->roles);
        } elseif ($request->has('action') && $request->input('action') === 'updatePassword') {
            // Actualizar contraseña
            $this->validate($request, [
                'password' => 'required|min:6',
            ]);
    
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('asignar.edit', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('asignar.index')->with('delete', 'Alumnos Eliminado Exitosamente!');
    }
}
