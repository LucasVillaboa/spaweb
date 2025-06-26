<?php
namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUsuarioController extends Controller
{
   public function index()
    {
        $usuarios = User::where('id', '!=', auth()->id())->get(); // evita mostrar al admin actual
        return view('admin.usuarios.index', compact('usuarios'));
    }



    public function activar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update(['activo' => true]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario activado correctamente.');
    }

    public function desactivar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update(['activo' => false]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario desactivado correctamente.');
    }

    public function create()
{
    $roles = Role::pluck('name', 'id');
    return view('admin.usuarios.create', compact('roles'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'role_id' => 'required|exists:roles,id'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'activo' => true,
    ]);

    $role = Role::findById($request->role_id);
    $user->assignRole($role);

    return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado correctamente.');
}


}
