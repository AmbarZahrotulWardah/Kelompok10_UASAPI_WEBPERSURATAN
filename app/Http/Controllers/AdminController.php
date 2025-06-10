<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan panel admin dengan daftar surat & pengguna
     */
    public function index()
    {
        $daftarSurat = SuratMasuk::with('user')->latest()->get();
        $pengguna = User::all();

        return view('admin.panel', compact('daftarSurat', 'pengguna'));
    }

    /**
     * Memperbarui data surat, termasuk komentar admin
     */
    public function updateSurat(Request $request, $id)
    {
        $request->validate([
            'judul' => 'sometimes|string|max:255',
            'isi' => 'sometimes|string',
            'komentar_admin' => 'nullable|string'
        ]);

        $surat = SuratMasuk::findOrFail($id);

        $surat->update([
            'judul' => $request->judul ?? $surat->judul,
            'isi' => $request->isi ?? $surat->isi,
            'komentar_admin' => $request->komentar_admin,
        ]);

        return redirect()->back()->with('success', 'Surat berhasil diperbarui.');
    }

    /**
     * Menghapus surat
     */
    public function destroySurat($id)
    {
        SuratMasuk::destroy($id);
        return redirect()->back()->with('success', 'Surat berhasil dihapus.');
    }
}
