<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// ini buat FE dulu banyak route nya.


// Admin dan Wali Nagari
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('/dashboard/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/dashboard/walinagari', [AdminController::class, 'walinagari'])->middleware('userAkses:walinagari');
    Route::get('/dashboard/masyarakat', [AdminController::class, 'masyarakat'])->middleware('userAkses:masyarakat');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// Kelola Akun
Route::get('/admin', function () {
    return view('AdminWali.Kelola Akun.admin');
})->name('admin');

Route::get('/wali', function () {
    return view('AdminWali.Kelola Akun.wali');
})->name('wali');

Route::get('/masyarakat', function () {
    return view('AdminWali.Kelola Akun.masyarakat');
})->name('masyarakat');

// List Pengajuan
Route::get('/listsktm', function () {
    return view('AdminWali.List Pengajuan.listsktm');
})->name('listsktm');

Route::get('/listsku', function () {
    return view('AdminWali.List Pengajuan.listsku');
})->name('listsku');

Route::get('/listsurpeng', function () {
    return view('AdminWali.List Pengajuan.listsurpeng');
})->name('listsurpeng');

// List Surat Keluar
Route::get('/listsuker', function () {
    return view('AdminWali.listsuker');
})->name('listsuker');

// Masyarakat

// Pengajuan Surat
Route::get('/sktm', function () {
    return view('Masyarakat.Pengajuan Surat.sktm');
});
Route::get('/sku', function () {
    return view('Masyarakat.Pengajuan Surat.sku');
});
Route::get('/surpeng', function () {
    return view('Masyarakat.Pengajuan Surat.surpeng');
});

// List Pengajuan
Route::get('/listpeng', function () {
    return view('Masyarakat.listpeng');
});

// Syarat Pengajuan
Route::get('/syarpeng', function () {
    return view('Masyarakat.syarpeng');
})->name('syarat');
