<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Menampilkan daftar surat masuk (untuk user)
     */
    public function index()
    {
        $surats = SuratMasuk::with('user')->latest()->get();
        return view('surat-masuk', compact('surats'));
    }

    /**
     * Menyimpan surat masuk baru (oleh user)
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'lampiran' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
        }

        SuratMasuk::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'lampiran' => $lampiranPath,
        ]);

        return redirect()->back()->with('success', 'Surat berhasil dikirim.');
    }

    /**
     * Menampilkan detail surat
     */
    public function show($id)
    {
        $surat = SuratMasuk::with('user')->findOrFail($id);
        return view('surat-masuk.show', compact('surat'));
    }

    /**
     * Menampilkan daftar surat (public/user)
     */
    public function daftar()
    {
        $surats = SuratMasuk::with('user')->latest()->get();
        return view('surat-masuk.daftar', compact('surats'));
    }

    /**
     * Menampilkan halaman kelola surat untuk admin
     */
    public function kelola()
    {
        $surats = SuratMasuk::with('user')->latest()->get();
        return view('admin.kelola', compact('surats')); // ✅ Sesuaikan folder view
    }

    /**
     * Memperbarui komentar admin (admin only)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'komentar_admin' => 'nullable|string|max:1000',
        ]);

        $surat = SuratMasuk::findOrFail($id);
        $surat->komentar_admin = $request->komentar_admin;
        $surat->save();

        return redirect()->route('admin.surat.kelola')->with('success', 'Komentar berhasil diperbarui.');
    }

    /**
     * Menghapus surat masuk (admin only)
     */
    public function destroy($id)
    {
        $surat = SuratMasuk::findOrFail($id);

        // Hapus lampiran jika ada
        if ($surat->lampiran && Storage::disk('public')->exists($surat->lampiran)) {
            Storage::disk('public')->delete($surat->lampiran);
        }

        $surat->delete();

        return redirect()->route('admin.surat.kelola')->with('success', 'Surat berhasil dihapus.');
    }
}
