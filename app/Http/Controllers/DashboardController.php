<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Verifikasi kode admin dari form.
     * Jika berhasil, aktifkan session dan arahkan ke panel admin.
     */
    public function verifikasiAdmin(Request $request)
    {
        $request->validate([
            'kode_admin' => 'required'
        ]);

        if ($request->kode_admin === 'admin123') {
            session(['is_admin' => true]);
            return redirect('/admin-panel')->with('success', 'Kode admin benar. Akses Panel Admin diaktifkan.');
        }

        return redirect()->back()->with('error', 'Kode admin salah.');
    }

    /**
     * Tampilkan halaman Panel Admin jika session is_admin true.
     */
    public function adminPanel()
    {
        if (!session('is_admin')) {
            return redirect('/dashboard')->with('error', 'Akses ditolak. Anda bukan admin.');
        }

        $daftarSurat = SuratMasuk::with('user')->latest()->get();
        $pengguna = User::all();

        return view('admin.panel', compact('daftarSurat', 'pengguna'));
    }
}
