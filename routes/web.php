<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use Illuminate\Http\Request;


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

// SUPPLIER
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::get('/supplier/tambah', [SupplierController::class, 'tambah']);


// TRANSAKSI
Route::get('/transaksi', function () {
    return view('layout.transaksi');
});

// PEMBAYARAN
Route::get('/pembayaran', function () {
    return view('layout.transaksi');
});

// Route::get('/pembeli', function () {
//     return view('layout.pembeli');
// });
Route::resource('pembeli', PembeliController::class);
Route::get('/pembeli/create', [PembeliController::class, 'create']);