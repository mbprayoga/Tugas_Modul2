<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\TransaksiController;
use App\Models\Pakaian;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PakaianController::class, 'index'])->name('pakaian.index');
Route::get('pakaian/add', [PakaianController::class, 'create'])->name('pakaian.create');
Route::post('pakaian/store', [PakaianController::class, 'store'])->name('pakaian.store');
Route::get('pakaian/edit/{id}', [PakaianController::class, 'edit'])->name('pakaian.edit');
Route::post('pakaian/update/{id}', [PakaianController::class, 'update'])->name('pakaian.update');
Route::post('pakaian/delete/{id}', [PakaianController::class, 'delete'])->name('pakaian.delete');
Route::get('/pakaian/search', [PakaianController::class, 'search'])->name('pakaian.search');

Route::get('transaksi/add/{id}', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('transaksi/store/{id}', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::post('transaksi/update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::post('transaksi/delete/{id}', [TransaksiController::class, 'delete'])->name('transaksi.delete');

