<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::all(); // Ambil semua data pengguna
        return view('admin.pengguna.index', compact('pengguna'));

        $user->delete();  // hapus user dari database
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}

