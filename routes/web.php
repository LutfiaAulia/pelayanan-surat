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

Route::get('/admin/listAdmin', [AdminController::class, 'listAdmin'])->name('admin.listAdmin');
Route::get('/admin/tambahAdmin', [AdminController::class, 'tambahAdmin'])->name('admin.tambahAdmin');
Route::post('/admin/inputAdmin', [AdminController::class, 'inputAdmin'])->name('admin.inputAdmin');
Route::get('/admin/tambahMas', [AdminController::class, 'tambahMas'])->name('admin.tambahMas');
Route::get('/admin/tambahWali', [AdminController::class, 'tambahWali'])->name('admin.tambahWali');

Route::get('/admin/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('admin.editAdmin');
Route::get('/admin/editMas', [AdminController::class, 'editMas'])->name('admin.editMas');
Route::get('/admin/editWali', [AdminController::class, 'editWali'])->name('admin.editWali');

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

Route::get('/verif', function () {
    return view('AdminWali.verifikasi');
})->name('verif');

// Masyarakat

// Pengajuan Surat
Route::get('/sktm', function () {
    return view('Masyarakat.Pengajuan Surat.sktm');
})->name('sktm');
Route::get('/sku', function () {
    return view('Masyarakat.Pengajuan Surat.sku');
})->name('sku');
Route::get('/surpeng', function () {
    return view('Masyarakat.Pengajuan Surat.surpeng');
})->name('surpeng');

// List Pengajuan
Route::get('/listpeng', function () {
    return view('Masyarakat.listpeng');
})->name('listpeng');

// Syarat Pengajuan
Route::get('/syarpeng', function () {
    return view('Masyarakat.syarpeng');
})->name('syarat');

