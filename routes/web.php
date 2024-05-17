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

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/', function () {
    return view('pages.index');
});

Route::post('/login-proses', [LoginController::class, 'auth'])->name('auth');

Route::get('/welcome', function (){
    return view('pages.index');
})->name('index');

