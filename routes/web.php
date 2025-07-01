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
Route::get('/', function () {
    // Menghapus data sesi spesifik. Ganti 'nama_key_sesi_anda' dengan key yang ingin dihapus.
    session()->forget('laravel_session');
    session()->forget('XSRF-TOKEN'); // Contoh: menghapus pesan sukses setelah ditampilkan
    session()->flush();

    return view('homepage');
})->name('homepage');

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
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Pengguna (Instruktur)
    Route::get('/pengguna', [AdminController::class, 'listUsers'])->name('users');
    Route::get('/pengguna/tambah', [AdminController::class, 'createInstruktur'])->name('instruktur.create');
    Route::post('/pengguna/tambah', [AdminController::class, 'storeInstruktur'])->name('instruktur.store');
    Route::get('/pengguna/{id}/detail', [AdminController::class, 'detailInstruktur'])->name('instruktur.detail');
    Route::get('/pengguna/{id}/edit', [AdminController::class, 'editInstruktur'])->name('instruktur.edit');
    Route::put('/pengguna/{id}', [AdminController::class, 'updateInstruktur'])->name('instruktur.update');
    Route::delete('/pengguna/{id}', [AdminController::class, 'destroyInstruktur'])->name('instruktur.destroy');

    // Siswa
    Route::get('/siswa', [AdminController::class, 'listSiswa'])->name('siswa');
    Route::get('/siswa/{id}/detail', [AdminController::class, 'detailSiswa'])->name('siswa.detail');

    // Kursus
    Route::get('/kursus', [AdminController::class, 'listKursus'])->name('kursus');
    Route::get('/kursus/tambah', [AdminController::class, 'createKursus'])->name('kursus.create');
    Route::post('/kursus/tambah', [AdminController::class, 'storeKursus'])->name('kursus.store');
    Route::get('/kursus/{id}/detail', [AdminController::class, 'detailKursus'])->name('kursus.detail');
    Route::get('/kursus/{id}/edit', [AdminController::class, 'editKursus'])->name('kursus.edit');
    Route::put('/kursus/{id}', [AdminController::class, 'updateKursus'])->name('kursus.update');
    Route::delete('/kursus/{id}', [AdminController::class, 'destroyKursus'])->name('kursus.destroy');

    // Pembayaran (dummy sementara)
    Route::get('/pembayaran', function () {
        return view('admin.pembayaran');
    })->name('pembayaran');
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
