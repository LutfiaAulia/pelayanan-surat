<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
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

    //Pengajuan Surat
    Route::get('/formsktm', [MasyarakatController::class, 'formsktm'])->name('masyarakat.sktm')->middleware('userAkses:masyarakat');
    Route::post('/ajusktm', [MasyarakatController::class, 'ajusktm'])->name('masyarakat.ajusktm')->middleware('userAkses:masyarakat');
    Route::get('/formsku', [MasyarakatController::class, 'formsku'])->name('masyarakat.sku')->middleware('userAkses:masyarakat');
    Route::post('/ajusku', [MasyarakatController::class, 'ajusku'])->name('masyarakat.ajusku')->middleware('userAkses:masyarakat');
    Route::get('/formpeng', [MasyarakatController::class, 'formpeng'])->name('masyarakat.peng')->middleware('userAkses:masyarakat');
    Route::post('/ajupeng', [MasyarakatController::class, 'ajupeng'])->name('masyarakat.ajupeng')->middleware('userAkses:masyarakat');

    Route::get('/profile/{id}/edit', [MasyarakatController::class, 'edit'])->name('masyarakat.edit')->middleware('userAkses:masyarakat');
    Route::put('/profile/{id}', [MasyarakatController::class, 'update'])->name('masyarakat.update')->middleware('userAkses:masyarakat');
    Route::get('/profile/{id}/show', [MasyarakatController::class, 'show'])->name('masyarakat.show')->middleware('userAkses:masyarakat');
});

//Tambah Akun
Route::get('/admin/listAdmin', [AdminController::class, 'listAdmin'])->name('admin.listAdmin');
Route::get('/admin/tambahAdmin', [AdminController::class, 'tambahAdmin'])->name('admin.tambahAdmin');
Route::post('/admin/inputAdmin', [AdminController::class, 'inputAdmin'])->name('admin.inputAdmin');
Route::get('/admin/listMas', [AdminController::class, 'listMas'])->name('admin.listMas');
Route::get('/admin/tambahMas', [AdminController::class, 'tambahMas'])->name('admin.tambahMas');
Route::post('/admin/inputMas', [AdminController::class, 'inputMas'])->name('admin.inputMas');
Route::get('/admin/listWali', [AdminController::class, 'listWali'])->name('admin.listWali');
Route::get('/admin/tambahWali', [AdminController::class, 'tambahWali'])->name('admin.tambahWali');
Route::post('/admin/inputWali', [AdminController::class, 'inputWali'])->name('admin.inputWali');

// Edit Akun
Route::get('/admin/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('admin.editAdmin');
Route::put('/admin/updateAdmin/{id}', [AdminController::class, 'updateAdmin'])->name('admin.updateAdmin');
Route::get('/admin/editMas/{id}', [AdminController::class, 'editMas'])->name('admin.editMas');
Route::put('/admin/updateMas/{id}', [AdminController::class, 'updateMas'])->name('admin.updateMas');
Route::get('/admin/editWali/{id}', [AdminController::class, 'editWali'])->name('admin.editWali');
Route::put('/admin/updateWali/{id}', [AdminController::class, 'updateWali'])->name('admin.updateWali');

//Delete Akun
Route::delete('/admin/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.deleteAdmin');
Route::delete('/admin/deleteMas/{id}', [AdminController::class, 'deleteMas'])->name('admin.deleteMas');
Route::delete('/admin/deleteWali/{id}', [AdminController::class, 'deleteWali'])->name('admin.deleteWali');

//Verifikasi Akun
Route::get('/admin/verifikasisktm', [AdminController::class, 'verifikasisktm'])->name('admin.verifikasisktm');
Route::get('/admin/verifikasisku', [AdminController::class, 'verifikasisku'])->name('admin.verifikasisku');
Route::get('/admin/verifikasisurpeng', [AdminController::class, 'verifikasisurpeng'])->name('admin.verifikasisurpeng');

//Generate Surat
Route::get('/admin/generatesktm', [AdminController::class, 'generatesktm'])->name('admin.generatesktm');
Route::get('/admin/generatesku', [AdminController::class, 'generatesku'])->name('admin.generatesku');
Route::get('/admin/generatesurpeng', [AdminController::class, 'generatesurpeng'])->name('admin.generatesurpeng');

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

// Route::get('/verif', function () {
//     return view('AdminWali.List Pengajuan.verifikasisktm');
// })->name('verif');

// Masyarakat

// Pengajuan Surat
// Route::get('/sktm', function () {
//     return view('Masyarakat.Pengajuan Surat.sktm');
// })->name('sktm');

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

Route::get('/land', function () {
    return view('landingpage');
});
