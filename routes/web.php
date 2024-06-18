<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengajuanController;
use App\Models\Pengajuan;
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
    Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('userAkses:admin');
    Route::get('/dashboard/walinagari', [DashboardController::class, 'index'])->name('walinagari.dashboard')->middleware('userAkses:walinagari');
    Route::get('/dashboard/masyarakat', [DashboardController::class, 'index'])->name('masyarakat.dashboard')->middleware('userAkses:masyarakat');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //Pengajuan Surat (Masyarakat)
    Route::get('/formsktm', [PengajuanController::class, 'formsktm'])->name('masyarakat.sktm')->middleware('userAkses:masyarakat');
    Route::post('/ajusktm', [PengajuanController::class, 'ajusktm'])->name('masyarakat.ajusktm')->middleware('userAkses:masyarakat');
    Route::get('/formsku', [PengajuanController::class, 'formsku'])->name('masyarakat.sku')->middleware('userAkses:masyarakat');
    Route::post('/ajusku', [PengajuanController::class, 'ajusku'])->name('masyarakat.ajusku')->middleware('userAkses:masyarakat');
    Route::get('/formpeng', [PengajuanController::class, 'formpeng'])->name('masyarakat.peng')->middleware('userAkses:masyarakat');
    Route::post('/ajupeng', [PengajuanController::class, 'ajupeng'])->name('masyarakat.ajupeng')->middleware('userAkses:masyarakat');

    //List Pengajuan Surat Oleh Masyarakat (Masyarakat)
    Route::get('/listpeng', [PengajuanController::class, 'listpeng'])->name('masyarakat.listpeng')->middleware('userAkses:masyarakat');


    //Edit Profil (Masyarakat)
    Route::get('/profile/{id}/edit', [MasyarakatController::class, 'edit'])->name('masyarakat.edit')->middleware('userAkses:masyarakat');
    Route::put('/profile/{id}', [MasyarakatController::class, 'update'])->name('masyarakat.update')->middleware('userAkses:masyarakat');
    // Route::get('/profile/{id}/show', [MasyarakatController::class, 'show'])->name('masyarakat.show')->middleware('userAkses:masyarakat');
    Route::get('/profile/{id}', [MasyarakatController::class, 'show'])->name('Masyarakat.profile')->middleware('userAkses:masyarakat');

    //Tambah Akun (Admin dan Wali)
    Route::get('/admin/listAdmin', [AdminController::class, 'listAdmin'])->name('admin.listAdmin')->middleware('userAkses:admin,walinagari');
    Route::get('/admin/tambahAdmin', [AdminController::class, 'tambahAdmin'])->name('admin.tambahAdmin')->middleware('userAkses:admin,walinagari');
    Route::post('/admin/inputAdmin', [AdminController::class, 'inputAdmin'])->name('admin.inputAdmin')->middleware('userAkses:admin,walinagari');
    Route::get('/admin/listMas', [AdminController::class, 'listMas'])->name('admin.listMas')->middleware('userAkses:admin,walinagari');
    Route::get('/admin/tambahMas', [AdminController::class, 'tambahMas'])->name('admin.tambahMas')->middleware('userAkses:admin,walinagari');
    Route::post('/admin/inputMas', [AdminController::class, 'inputMas'])->name('admin.inputMas')->middleware('userAkses:admin,walinagari');
    Route::get('/admin/listWali', [AdminController::class, 'listWali'])->name('admin.listWali')->middleware('userAkses:admin,walinagari');
    Route::get('/admin/tambahWali', [AdminController::class, 'tambahWali'])->name('admin.tambahWali')->middleware('userAkses:admin,walinagari');
    Route::post('/admin/inputWali', [AdminController::class, 'inputWali'])->name('admin.inputWali')->middleware('userAkses:admin,walinagari');

    // Edit Akun (Admin dan Wali)
    Route::get('/admin/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('admin.editAdmin')->middleware('userAkses:admin,walinagari');
    Route::put('/admin/updateAdmin/{id}', [AdminController::class, 'updateAdmin'])->name('admin.updateAdmin')->middleware('userAkses:admin,walinagari');
    Route::get('/admin/editMas/{id}', [AdminController::class, 'editMas'])->name('admin.editMas')->middleware('userAkses:admin,walinagari');
    Route::put('/admin/updateMas/{id}', [AdminController::class, 'updateMas'])->name('admin.updateMas')->middleware('userAkses:admin,walinagari');
    Route::get('/admin/editWali/{id}', [AdminController::class, 'editWali'])->name('admin.editWali')->middleware('userAkses:admin,walinagari');
    Route::put('/admin/updateWali/{id}', [AdminController::class, 'updateWali'])->name('admin.updateWali')->middleware('userAkses:admin,walinagari');

    //Delete Akun (Admin dan Wali)
    Route::delete('/admin/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.deleteAdmin')->middleware('userAkses:admin,walinagari');
    Route::delete('/admin/deleteMas/{id}', [AdminController::class, 'deleteMas'])->name('admin.deleteMas')->middleware('userAkses:admin,walinagari');
    Route::delete('/admin/deleteWali/{id}', [AdminController::class, 'deleteWali'])->name('admin.deleteWali')->middleware('userAkses:admin,walinagari');

    // List Pengajuan (Admin dan Wali)
    Route::get('/admin/listsktm', [AdminController::class, 'listsktm'])->name('admin.listsktm')->middleware('userAkses:admin');
    Route::get('/admin/listsku', [AdminController::class, 'listsku'])->name('admin.listsku')->middleware('userAkses:admin');
    Route::get('/admin/listpot', [AdminController::class, 'listpot'])->name('admin.listpot')->middleware('userAkses:admin');

    //Verifikasi Akun
    Route::get('/admin/verifikasisktm/{id_pengajuan}', [AdminController::class, 'verifsktm'])->name('admin.verifikasisktm')->middleware('userAkses:admin');
    Route::get('/admin/verifikasisku/{id_pengajuan}', [AdminController::class, 'verifsku'])->name('admin.verifikasisku')->middleware('userAkses:admin');
    Route::get('/admin/verifikasisurpeng/{id_pengajuan}', [AdminController::class, 'verifsurpeng'])->name('admin.verifikasisurpeng')->middleware('userAkses:admin');

    //Generate (Form yg menampilkan hasil klik button verifikasi)
    Route::get('/adminwali/listpengajuan/generate', [PengajuanController::class, 'verifsktm'])->name('adminwali.listpengajuan.generate')->middleware('userAkses:admin');
    Route::get('/adminwali/listpengajuan/verifikasisku', [PengajuanController::class, 'verifsku'])->name('adminwali.listpengajuan.verifikasi')->middleware('userAkses:admin');
    Route::get('/adminwali/listpengajuan/verifikasi', [PengajuanController::class, 'verifpot'])->name('adminwali.listpengajuan.verifikasipot')->middleware('userAkses:admin');

    //Menolak Pengajuan Admin
    Route::post('/pengajuan/tolaksktm', [PengajuanController::class, 'tolakPengajuanSktm'])->name('pengajuan.tolaksktm')->middleware('userAkses:admin');
    Route::post('/pengajuan/tolaksku', [PengajuanController::class, 'tolakPengajuanSku'])->name('pengajuan.tolaksku')->middleware('userAkses:admin');
    Route::post('/pengajuan/tolakpot', [PengajuanController::class, 'tolakPengajuanPot'])->name('pengajuan.tolakpot')->middleware('userAkses:admin');

});

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
