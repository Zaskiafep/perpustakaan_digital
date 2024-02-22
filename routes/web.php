<?php
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/kategori/tambah', [KategoriController::class,'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/tambah', [BukuController::class, 'create'])->name('buku.create');
Route::delete('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/tambah', [PeminjamanController::class, 'tambahPeminjaman'])->name('peminjaman.tambah');
Route::post('/peminjaman/store', [PeminjamanController::class, 'storePeminjaman'])->name('peminjaman.store');
Route::post('/peminjaman/selesai/{id}', [PeminjamanController::class, 'kembalikanBuku'])->name('peminjaman.kembalikan');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
});