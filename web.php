<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\QRCodeController;
use App\Models\SuratMasuk;

// ========================================
// 1. Halaman Awal
// ========================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ========================================
// 2. Autentikasi (Guest)
// ========================================
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// ========================================
// 3. Autentikasi Laravel Default
// ========================================
require __DIR__.'/auth.php';

// ========================================
// 4. Route Terproteksi Login
// ========================================
Route::middleware('auth')->group(function () {

    // Dashboard dengan kode admin
    Route::match(['GET', 'POST'], '/dashboard', function (Request $request) {
        if ($request->isMethod('post')) {
            if ($request->input('kode_admin') === 'kode123') {
                session(['is_admin' => true]);
                return redirect()->route('admin.panel')->with('success', 'Selamat datang, Admin!');
            } else {
                return redirect()->route('dashboard')->with('kode_admin_error', 'Kode admin salah.');
            }
        }

        $surats = SuratMasuk::with('user')->latest()->get();
        return view('dashboard', compact('surats'));
    })->name('dashboard');

    // Admin Panel
    Route::get('/admin-panel', [DashboardController::class, 'adminPanel'])->name('admin.panel');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Manajemen Surat Masuk (Admin)
    Route::get('/admin/kelola-surat', [SuratMasukController::class, 'kelola'])->name('admin.surat.kelola');
    Route::put('/admin/surat/{id}', [SuratMasukController::class, 'update'])->name('admin.surat.update');
    Route::delete('/admin/surat/{id}', [SuratMasukController::class, 'destroy'])->name('admin.surat.destroy');

    // Manajemen Surat Masuk (User)
    Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
    Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
    Route::get('/daftar-surat', [SuratMasukController::class, 'daftar'])->name('surat-masuk.daftar');

    // Manajemen Profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Logout
    Route::get('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');

    // Manajemen Pengguna (Admin)
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
});

// ========================================
// 5. Detail Surat (Publik)
// ========================================
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');

// ========================================
// 6. QR Code Generator → ke lampiran
// ========================================
Route::get('/qr-code/{id}', [QRCodeController::class, 'generate'])->name('qr-code.generate');

// ========================================
// 7. File Test Bypass (untuk uji akses PDF secara langsung)
// ========================================
Route::get('/file-test', function () {
    $path = storage_path('app/public/lampiran/surat1.pdf');

    if (!file_exists($path)) {
        return 'File tidak ditemukan';
    }

    return response()->file($path);
});


