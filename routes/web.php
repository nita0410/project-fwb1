<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManajerController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ElektronikController;

// AUTH ROUTES
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('kirimdata');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/regis', [RegisController::class, 'index'])->name('regis');
Route::get('/', [RegisController::class, 'home'])->name('home');
Route::post('/kirim', [RegisController::class, 'kirim_data'])->name('kirim');

// BARANG ELEKTRONIK 
Route::get('/barang', [ElektronikController::class, 'index'])->name('barang.index');
Route::get('/data_barang', [ElektronikController::class, 'data_elekro'])->name('barang.tampil_data');
Route::post('/barang/store', [ElektronikController::class, 'store'])->name('barang.store');
Route::patch('/barang/{id}/ubah-status', [ElektronikController::class, 'ubahStatus'])->name('barang.ubahStatus');

Route::get('/data_keluar', [ElektronikController::class, 'create'])->name('barang_keluar.create');
Route::get('/tampil_data_keluar', [ElektronikController::class, 'tampil_barang_keluar'])->name('tampil_barang_keluar');
Route::post('/barang_keluar', [ElektronikController::class, 'input_barang_keluar'])->name('barang_keluar.store');
Route::patch('/barang_keluar/{id}/ubahStatus', [ElektronikController::class, 'statusBarangKeluar'])->name('ubahStatusBarangKeluar');

// ADMIN 
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    // Barang
    Route::get('/data_barang', [AdminController::class, 'dataBarang'])->name('admin.barang');
    Route::get('/data_barang/create', [AdminController::class, 'createBarang'])->name('admin.barang.create');
    Route::post('/data_barang', [AdminController::class, 'storeBarang'])->name('admin.barang.store');
    Route::get('/data_barang/{id}/edit', [AdminController::class, 'editBarang'])->name('admin.barang.edit');
    Route::put('/data_barang/{id}', [AdminController::class, 'updateBarang'])->name('admin.barang.update');
    Route::delete('/data_barang/{id}', [AdminController::class, 'destroyBarang'])->name('admin.barang.destroy');

    // Kategori
    Route::get('/kategori', [AdminController::class, 'kategori'])->name('admin.kategori');
    Route::post('/kategori', [AdminController::class, 'storeKategori'])->name('kategori.store');
    Route::delete('/kategori/{id}', [AdminController::class, 'destroyKategori'])->name('kategori.destroy');

    // Pengguna
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
    Route::put('/pengguna/{id}', [AdminController::class, 'updatePengguna'])->name('pengguna.update');
    Route::delete('/pengguna/{id}', [AdminController::class, 'destroyPengguna'])->name('pengguna.destroy');

    // Barang Masuk / Keluar
    Route::get('/barang_masuk', [AdminController::class, 'barangMasuk'])->name('admin.barang.masuk');
    Route::post('/barang_masuk', [AdminController::class, 'storeBarangMasuk'])->name('admin.store.barang_masuk');
    Route::get('/barang_keluar', [AdminController::class, 'barangKeluar'])->name('admin.barang.keluar');
    Route::post('/barang_keluar', [AdminController::class, 'storeBarangKeluar'])->name('admin.store_barang_keluar');
});

// MANAJER 
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [ManajerController::class, 'index'])->name('manajer.master_manajer');
    Route::get('/barang-masuk', [ManajerController::class, 'barangMasuk'])->name('manajer.barang_masuk');
    Route::get('/barang-keluar', [ManajerController::class, 'barangKeluar'])->name('manajer.barang_keluar');
    Route::get('/laporan', [ManajerController::class, 'laporan'])->name('manajer.laporan_barang');

    Route::get('/manajer/laporan-barang', [ManajerController::class, 'laporanBarang'])->name('manajer.laporan.barang');
    Route::get('/manajer/barang-masuk', [ManajerController::class, 'riwayatMasuk'])->name('manajer.riwayat.masuk');
});
Route::get('/manajer/laporan-barang', [ManajerController::class, 'laporanBarang'])->name('manajer.laporan.barang');

Route::get('/manajer/barang-masuk', [ManajerController::class, 'riwayatMasuk'])->name('manajer.barang.masuk');

Route::post('/manajer/setujui-masuk/{id}', [ManajerController::class, 'setujuiMasuk'])->name('manajer.setujui.masuk');

