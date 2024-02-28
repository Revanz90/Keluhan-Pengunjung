<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluhanPengunjungController;
use FontLib\Table\Type\name;
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

Route::get('/dashboard', [DashboardController::class, 'hitungsurat'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('akun', [AkunController::class, 'akun'])->name('akun');

Route::middleware('auth')->group(function () {

    Route::get('/keluhan_pengunjung', [KeluhanPengunjungController::class, 'index'])->name('keluhan_pengunjung');
    Route::post('/keluhan_pengunjung', [KeluhanPengunjungController::class, 'store'])->name('storedatapertanyaan');
    Route::delete('/{id}/keluhan_pengunjung', [KeluhanPengunjungController::class, 'delete'])->name('delete_pertanyaan');

});

require __DIR__ . '/auth.php';
