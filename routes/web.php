<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layout.home');
});

// BARANG
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/barang/tambah', [BarangController::class, 'tambah']);
Route::post('/barang/simpan', [BarangController::class, 'simpan']);
Route::get('/barang/edit/{id_barang}', [BarangController::class, 'edit']);
Route::post('/barang/update/{id_barang}', [BarangController::class, 'update']);
Route::get('/barang/delete/{id_barang}', [BarangController::class, 'delete']);
Route::get('/barang/detail/{id_barang}', [BarangController::class, 'detail']);

// SUPPLIER
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::get('/supplier/tambah', [SupplierController::class, 'tambah']);
Route::post('/supplier/simpan', [SupplierController::class, 'simpan']);
Route::get('/supplier/edit/{id_supplier}', [SupplierController::class, 'edit']);
Route::post('/supplier/update/{id_supplier}', [SupplierController::class, 'update']);
Route::get('/supplier/delete/{id_supplier}', [SupplierController::class, 'delete']);
Route::get('/supplier/detail/{id_supplier}', [SupplierController::class, 'detail']);


// TRANSAKSI
Route::get('/transaksi', function () {
    return view('layout.transaksi');
});

// PEMBAYARAN
Route::get('/pembayaran', function () {
    return view('layout.transaksi');
});

// PEMBELI
Route::get('/pembeli', function () {
    return view('layout.pembeli');
});
