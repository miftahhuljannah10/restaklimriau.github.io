<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact(var_name: 'users'));
    }

    public function create()
    {

        $roles = Role::all();
        return view('admin.users.create', compact(var_name: 'roles'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role_id' => $validated['role_id'],
        ]);

        return redirect()->route('users.index')->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        $user = User::findOrFail($user->id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::findOrFail($user->id);
        $user->update($request->only(['name', 'email', 'role_id']));

        // $validated = $request->all();
        // $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
