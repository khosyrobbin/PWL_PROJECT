<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
<<<<<<< HEAD
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PembayaranController;
=======
>>>>>>> ba8a432371f33782d57cfb04f02a6f14e14feb72
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('layout.home');
// });

// BARANG
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/barang/tambah', [BarangController::class, 'tambah']);
Route::post('/barang/simpan', [BarangController::class, 'simpan']);
Route::get('/barang/edit/{id_barang}', [BarangController::class, 'edit']);
Route::post('/barang/update/{id_barang}', [BarangController::class, 'update']);
Route::get('/barang/delete/{id_barang}', [BarangController::class, 'delete']);
Route::get('/barang/detail/{id_barang}', [BarangController::class, 'detail']);
Route::get('/barang/cari', [BarangController::class, 'cari']);


// SUPPLIER
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::get('/supplier/tambah', [SupplierController::class, 'tambah']);
Route::post('/supplier/simpan', [SupplierController::class, 'simpan']);
Route::get('/supplier/edit/{id_supplier}', [SupplierController::class, 'edit']);
Route::post('/supplier/update/{id_supplier}', [SupplierController::class, 'update']);
Route::get('/supplier/delete/{id_supplier}', [SupplierController::class, 'delete']);
Route::get('/supplier/detail/{id_supplier}', [SupplierController::class, 'detail']);
Route::get('/supplier/cari', [SupplierController::class, 'cari']);


// TRANSAKSI
Route::resource('transaksi', TransaksiController::class);
// Route::get('/transaksi', function () {
//     return view('layout.transaksi');
// });

// PEMBAYARAN
<<<<<<< HEAD
Route::resource('pembayaran', PembayaranController::class);
// Route::get('/pembayaran', function () {
//     return view('layout.transaksi');
// });
=======
Route::get('/pembayaran', function () {
    return view('layout.transaksi');
});

// PEMBELI
Route::get('/pembeli', function () {
    return view('layout.pembeli');
});
>>>>>>> ba8a432371f33782d57cfb04f02a6f14e14feb72

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
<<<<<<< HEAD
// Route::get('/pembeli', function () {
//     return view('layout.pembeli');
// });
Route::resource('pembeli', PembeliController::class);
// Route::get('/pembeli/create', [PembeliController::class, 'create']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
>>>>>>> ba8a432371f33782d57cfb04f02a6f14e14feb72
