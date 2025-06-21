<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman statis publik
Route::get('/', function () {
    return view('welcome');
});
Route::get('/payout', function () {
    return view('payout');
})->name('payout');

// --- Rute Otentikasi ---
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');


// --- Rute yang Dilindungi ---
// Middleware 'auth' memastikan hanya user yang sudah login bisa mengaksesnya.
Route::get('/home', function () {
    // Mengembalikan view 'home.blade.php'
    return view('home');
})->middleware('auth')->name('home');

