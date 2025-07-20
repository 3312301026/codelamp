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
Route::prefix('admin')->middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // 👥 Pengguna
    Route::get('/pengguna', [AdminController::class, 'listUsers'])->name('admin.users');
    Route::get('/pengguna/instruktur', [AdminController::class, 'listInstruktur'])->name('admin.users.instruktur');
    Route::get('/pengguna/siswa', [AdminController::class, 'listSiswa'])->name('admin.users.siswa');

    // CRUD Instruktur
    Route::get('/instruktur', [AdminController::class, 'listInstruktur'])->name('admin.instruktur.index');
    Route::get('/instruktur/create', [AdminController::class, 'createInstruktur'])->name('admin.instruktur.create');
    Route::post('/instruktur', [AdminController::class, 'storeInstruktur'])->name('admin.instruktur.store');
    Route::get('/instruktur/{id}/edit', [AdminController::class, 'editInstruktur'])->name('admin.instruktur.edit');
    Route::put('/instruktur/{id}', [AdminController::class, 'updateInstruktur'])->name('admin.instruktur.update');
    Route::delete('/instruktur/{id}', [AdminController::class, 'destroyInstruktur'])->name('admin.instruktur.destroy');

    // CRUD Siswa
    Route::get('/pengguna/siswa/create', [AdminController::class, 'createSiswa'])->name('admin.siswa.create');
    Route::post('/pengguna/siswa', [AdminController::class, 'storeSiswa'])->name('admin.siswa.store');
    Route::get('/pengguna/siswa/edit/{id}', [AdminController::class, 'editSiswa'])->name('admin.siswa.edit');
    Route::put('/pengguna/siswa/update/{id}', [AdminController::class, 'updateSiswa'])->name('admin.siswa.update');
    Route::delete('/pengguna/siswa/delete/{id}', [AdminController::class, 'destroySiswa'])->name('admin.siswa.destroy');

    // CRUD Kursus (oleh admin)
    Route::get('/kursus', [AdminController::class, 'listKursus'])->name('admin.kursus');
    Route::get('/kursus/create', [AdminController::class, 'createKursus'])->name('admin.kursus.create');
    Route::post('/kursus', [AdminController::class, 'storeKursus'])->name('admin.kursus.store');
    Route::get('/kursus/edit/{id}', [AdminController::class, 'editKursus'])->name('admin.kursus.edit');
    Route::put('/kursus/update/{id}', [AdminController::class, 'updateKursus'])->name('admin.kursus.update');
    Route::delete('/kursus/delete/{id}', [AdminController::class, 'destroyKursus'])->name('admin.kursus.destroy');
    Route::get('/kursus/{id}', [AdminController::class, 'showKursus'])->name('admin.kursus.show');
    Route::patch('/admin/kursus/{id}/update-status', [KursusController::class, 'updateStatus'])
        ->name('admin.kursus.updateStatus');

    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('admin.pembayaran');
    // Route::post('/pembayaran/{id}/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('admin.pembayaran.konfirmasi');
    Route::put('/admin/pembayaran/{id}/update-status', [PembayaranController::class, 'updateStatus'])
    ->name('admin.pembayaran.updateStatus');
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
