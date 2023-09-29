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

Route::get('add', [PakaianController::class, 'create'])->name('pakaian.create');
Route::post('store', [PakaianController::class, 'store'])->name('pakaian.store');
Route::get('/', [PakaianController::class, 'index'])->name('pakaian.index');
Route::get('edit/{id}', [PakaianController::class, 'edit'])->name('pakaian.edit');
Route::post('update/{id}', [PakaianController::class, 'update'])->name('pakaian.update');
Route::post('delete/{id}', [PakaianController::class, 'delete'])->name('pakaian.delete');

Route::get('add', [TransaksiController::class, 'create'])->name('pakaian.create');
Route::post('store', [TransaksiController::class, 'store'])->name('pakaian.store');
Route::get('edit/{id}', [TransaksiController::class, 'edit'])->name('pakaian.edit');
Route::post('update/{id}', [TransaksiController::class, 'update'])->name('pakaian.update');
Route::post('delete/{id}', [TransaksiController::class, 'delete'])->name('pakaian.delete');

