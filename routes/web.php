<?php

use App\Http\Controllers\LoginController;
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

// Login
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

// Admin dan Wali Nagari
Route::get('/', function () {
    return view('index');
});

// Kelola Akun
Route::get('/admin', function () {
    return view('AdminWali.Kelola Akun.admin');
});

Route::get('/wali', function () {
    return view('AdminWali.Kelola Akun.wali');
});

Route::get('/masyarakat', function () {
    return view('AdminWali.Kelola Akun.masyarakat');
});

// List Pengajuan
Route::get('/listsktm', function () {
    return view('AdminWali.List Pengajuan.listsktm');
});

Route::get('/listsku', function () {
    return view('AdminWali.List Pengajuan.listsku');
});

Route::get('/listsurpeng', function () {
    return view('AdminWali.List Pengajuan.listsurpeng');
});

// List Surat Keluar
Route::get('/listsuker', function () {
    return view('AdminWali.listsuker');
});

Route::post('/login-proses', [LoginController::class, 'auth'])->name('auth');

Route::get('/welcome', function (){
    return view('index');
})->name('index');

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


