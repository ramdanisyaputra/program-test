<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerubahanAngkaController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');
});

Route::prefix('user')->name('user.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::get('add', [UserController::class, 'add'])->name('add');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::get('edit/{userId}', [UserController::class, 'edit'])->name('edit');
    Route::patch('update', [UserController::class, 'update'])->name('update');
    Route::get('delete/{userId}', [UserController::class, 'delete'])->name('delete');

    Route::get('change-variable', [UserController::class, 'changeVariable'])->name('changeVariable');
});

Route::prefix('product-stock')->name('product-stock.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [ProductStockController::class, 'index'])->name('index');
    Route::post('store', [ProductStockController::class, 'store'])->name('store');
});

Route::prefix('angka')->name('angka.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', [PerubahanAngkaController::class, 'index'])->name('index');
    Route::post('store', [PerubahanAngkaController::class, 'store'])->name('store');
});







require __DIR__.'/auth.php';
