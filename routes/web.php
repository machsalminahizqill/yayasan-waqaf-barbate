<?php

use App\Http\Controllers\admin\berandaAdminController;
use App\Http\Controllers\admin\beritaAdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\donasi\PaymentCallbackController;
use App\Http\Controllers\pages\berandaController;
use App\Http\Controllers\pages\beritaController;
use App\Http\Controllers\pages\donasiController;
use App\Http\Controllers\pages\kontakController;
use App\Http\Controllers\pages\profilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AuthenticatedSessionController::class, 'create']);
        Route::get('/dashboard', [berandaAdminController::class, 'mainPage'])->name('dashboardAdmin');
        Route::get('/berita', [beritaAdminController::class, 'mainPage'])->name('beritaAdmin');
        Route::get('/berita/{slug}/{id}', [beritaAdminController::class, 'detailPage']);
        Route::get('/berita/tambah', [beritaAdminController::class, 'TambahPage'])->name('tambahBeritaAdmin');
        Route::post('/berita/tambah', [beritaAdminController::class, 'addBerita'])->name('createBeritaAdmin');
        Route::get('/berita/edit/{slug}/{id}', [beritaAdminController::class, 'editPage']);
        Route::post('/berita/edit', [beritaAdminController::class, 'editBerita'])->name('editBeritaAdmin');
        Route::get('/berita/hapus/{slug}/{id}', [beritaAdminController::class, 'hapusBerita'])->name('hapusBeritaAdmin');
    });
});


Route::get('/', [berandaController::class, 'page'])->name('berandaPage');
Route::get('/kontak', [kontakController::class, 'page'])->name('kontakPage');
Route::prefix('berita')->group(function () {
    Route::get('/', [beritaController::class, 'page'])->name('beritaPage');
    Route::get('/{slug}.{id}', [beritaController::class, 'detailPage']);
});


Route::prefix('profil')->group(function () {
    Route::get('/visi-dan-misi', [profilController::class, 'visiMisiPage'])->name('visiMisiPage');
});

Route::prefix('donasi')->group(function () {
    Route::get('/', [donasiController::class, 'donasi'])->name('donasiPage');

    Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
