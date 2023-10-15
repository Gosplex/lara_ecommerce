<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function index()
    {
        $users = User::paginate(5);
        return view('admin.users.index', compact('users'));
    }

    function create() {
        return view('admin.users.create');
    }

    function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'role_as' => 'required|integer'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_as' => $request->role
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }

    function edit(User $user) {
        $user = User::find($user->id);
        return view('admin.users.edit', compact('user'));
    }

    function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'role_as' => 'required|integer'
        ]);

        $user = User::find($user->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_as' => $request->role_as
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    function destroy(User $user) {
        $user = User::find($user->id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
}
