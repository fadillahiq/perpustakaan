<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
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

Route::get('/', function () {
   return redirect()->route('dashboard');
});



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/data-penerbit', [AdminController::class, 'data_penerbit'])->name('data.penerbit');
    Route::get('/data-anggota', [AdminController::class, 'data_anggota'])->name('data.anggota');
    Route::get('/data-buku', [AdminController::class, 'data_buku'])->name('data.buku');
    Route::get('/data-peminjaman', [AdminController::class, 'data_peminjaman'])->name('data.peminjaman');
    // Route::get('/test-spatie', [AdminController::class, 'test_spatie']);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('katalog', KatalogController::class);
    Route::resource('pengarang', PengarangController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('peminjaman', PeminjamanController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}', [HomeController::class, 'profile_get'])->name('profile.get');
Route::post('/profile/Post/{id}', [HomeController::class, 'profile_post'])->name('profile.post');
Route::get('/change-password', [HomeController::class, 'change_password_view'])->name('change.password.view');
Route::post('/change-password/post', [HomeController::class, 'change_password_post'])->name('change.password.post');
Route::get('/change-avatar/{id}', [HomeController::class, 'change_avatar_view'])->name('change.avatar.view');
Route::post('/change-avatar/post/{id}', [HomeController::class, 'change_avatar_post'])->name('change.avatar.post');
