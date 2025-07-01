<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstrukturController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Halaman Utama
Route::get('/', fn() => view('homepage'))->name('homepage');


// =====================================================
// 🔐 Autentikasi (Login & Register - untuk semua role)
// =====================================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    // ✍️ Hanya siswa yang bisa registrasi
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');


// =====================================================
// 👨‍🎓 Routes untuk Siswa
// =====================================================
Route::prefix('siswa')->middleware(['auth', 'checkRole:siswa'])->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');

    // Kursus
    Route::get('/kursus', [SiswaController::class, 'listKursus'])->name('siswa.kursus');
    Route::get('/kursus/{id}', [SiswaController::class, 'tampilkanKursus'])->name('siswa.kursus.detail');
    Route::post('/kursus/{id}/beli', [SiswaController::class, 'beliKursus'])->name('siswa.beli.kursus');

    // Profil
    Route::get('/profil', [SiswaController::class, 'edit'])->name('siswa.profil');
    Route::put('/profil', [SiswaController::class, 'update'])->name('siswa.profil.update');

    // Halaman Tambahan
    Route::get('/ganti-sandi', fn() => view('siswa.ganti_sandi'))->name('siswa.ganti_sandi');
    Route::get('/dibeli', [SiswaController::class, 'kursusDibeli'])->name('siswa.kursus_dibeli');
    Route::get('/pembayaran', [SiswaController::class, 'catatanPembayaran'])->name('siswa.pembayaran');
    // Beli Kursus
    Route::post('/kursus/{id}/beli', [SiswaController::class, 'beliKursus'])->name('siswa.beli.kursus');

    // Form upload bukti pembayaran setelah beli
    Route::get('/pembayaran/upload/{id}', [SiswaController::class, 'formUploadBukti'])->name('siswa.pembayaran.form');

    // Kirim bukti pembayaran
    Route::post('/pembayaran/upload/{id}', [SiswaController::class, 'uploadBuktiPembayaran'])->name('siswa.pembayaran.upload');
});



// 🧑‍🏫 Routes untuk Instruktur
Route::prefix('instruktur')->middleware(['auth', 'checkRole:instruktur'])->group(function () {
    Route::get('/dashboard', [InstrukturController::class, 'dashboard'])->name('instruktur.dashboard');

    // Profil dan Halaman Tambahan
    Route::get('/profil', [InstrukturController::class, 'profil'])->name('instruktur.profil');
    Route::post('/profil', [InstrukturController::class, 'updateProfil'])->name('instruktur.profil.update');
    Route::get('/pembayaran', fn() => view('instruktur.pembayaran'))->name('instruktur.pembayaran');
    Route::get('/pesan', fn() => view('instruktur.pesan'))->name('instruktur.pesan');

    // Manajemen Kursus
    Route::get('/kursus', [KursusController::class, 'index'])->name('instruktur.kursus');
    Route::get('/kursus/tambah', [KursusController::class, 'create'])->name('instruktur.kursus.tambah');
    Route::post('/kursus', [KursusController::class, 'store'])->name('instruktur.kursus.store');
    Route::get('/kursus/edit/{id}', [KursusController::class, 'edit'])->name('instruktur.kursus.edit');
    Route::put('/kursus/update/{id}', [KursusController::class, 'update'])->name('instruktur.kursus.update');
    Route::delete('/kursus/delete/{id}', [KursusController::class, 'destroy'])->name('instruktur.kursus.destroy');
    Route::get('/kursus/{id}', [KursusController::class, 'show'])->name('instruktur.kursus.show');

    // Materi Kursus
    Route::get('/kursus/{id}/materi/create', [KursusController::class, 'createMateri'])->name('materi.create');
    Route::post('/kursus/materi', [KursusController::class, 'storeMateri'])->name('materi.store');
});



// =====================================================
// 🧑‍💼 Routes untuk Admin
// =====================================================
Route::prefix('admin')->middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/pengguna', [AdminController::class, 'listUsers'])->name('admin.users');
    Route::get('/kursus', [AdminController::class, 'listKursus'])->name('admin.kursus');
});


// =====================================================
// 🧱 Tambahan dari Laravel Breeze (auth.php)
// =====================================================
require __DIR__ . '/auth.php';


// =====================================================
// 🚫 Fallback jika route tidak ditemukan
// =====================================================
Route::fallback(function () {
    if (view()->exists('errors.404')) {
        return response()->view('errors.404', [], 404);
    }

    return abort(404, 'Halaman tidak ditemukan.');
});
