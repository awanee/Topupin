<?php

use Illuminate\Support\Facades\Route;
// PERBAIKAN: Pastikan semua controller di-import dengan benar
use App\Http\Controllers\AccountController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TopupItemController;
use App\Http\Controllers\UserTransactionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Api\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rute Publik ---
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', function () { return redirect()->route('home'); });
Route::get('/order/{game:slug}', [PayoutController::class, 'create'])->name('payout.create');
Route::get('/search', [SearchController::class, 'search'])->name('search');


// --- Rute Khusus Tamu (Guest) ---
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});


// --- Rute Khusus Pengguna Terotentikasi ---
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::post('/order', [PayoutController::class, 'store'])->name('payout.store');
    Route::get('/my-transactions', [UserTransactionController::class, 'index'])->name('user.transactions');
});


// --- Rute Khusus Admin ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route untuk Games dan Accounts tetap bisa menggunakan resource
    Route::resource('games', GameController::class);
    Route::resource('accounts', AccountController::class);

    // PERBAIKAN: Mendefinisikan route untuk Topup Items secara manual
    Route::get('topup-items', [TopupItemController::class, 'index'])->name('topup-items.index');
    Route::get('topup-items/game/{game}', [TopupItemController::class, 'show'])->name('topup-items.show');
    Route::get('topup-items/game/{game}/create', [TopupItemController::class, 'create'])->name('topup-items.create');
    Route::post('topup-items/game/{game}', [TopupItemController::class, 'store'])->name('topup-items.store');
    Route::get('topup-items/{topupItem}/edit', [TopupItemController::class, 'edit'])->name('topup-items.edit');
    Route::put('topup-items/{topupItem}', [TopupItemController::class, 'update'])->name('topup-items.update');
    Route::delete('topup-items/{topupItem}', [TopupItemController::class, 'destroy'])->name('topup-items.destroy');

    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
});
