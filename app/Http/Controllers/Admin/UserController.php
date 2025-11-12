<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 🔹 List semua user
    public function index()
    {
        $users = User::all(); // ambil semua user (admin, user, pending, active)
        return view('admin.users.index', compact('users'));
    }

    // 🔹 Approve user langsung
    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        return redirect()->route('admin.users.index')
                         ->with('success', "User {$user->name} berhasil di-approve!");
    }

    // 🔹 Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', "User {$user->name} berhasil dihapus!");
    }
}
