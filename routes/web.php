<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliiController;
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

//BARANG
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
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/transaksi/simpan', [TransaksiController::class, 'simpan']);
Route::get('/transaksi/edit/{id_transaksi}', [TransaksiController::class, 'edit']);
Route::post('/transaksi/update/{id_transaksi}', [TransaksiController::class, 'update']);
Route::get('/transaksi/delete/{id_transaksi}', [TransaksiController::class, 'delete']);
Route::get('/transaksi/detail/{id_transaksi}', [TransaksiController::class, 'detail']);
Route::get('/transaksi/print', [TransaksiController::class, 'print']);

// Route::resource('transaksi', TransaksiController::class);
// Route::get('/transaksi/{id}', [TransaksiController::class, 'indextransak'])->name('indextransak');
// Route::get('/transaksi', function () {
//     return view('layout.transaksi');
// });

// PEMBAYARAN
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
Route::get('/pembayaran/tambah', [PembayaranController::class, 'tambah']);
Route::post('/pembayaran/simpan', [PembayaranController::class, 'simpan']);
Route::get('/pembayaran/edit/{id_pembayaran}', [PembayaranController::class, 'edit']);
Route::post('/pembayaran/update/{id_pembayaran}', [PembayaranController::class, 'update']);
Route::get('/pembayaran/delete/{id_pembayaran}', [PembayaranController::class, 'delete']);
Route::get('/pembayaran/detail/{id_pembayaran}', [PembayaranController::class, 'detail']);
// Route::resource('pembayaran', PembayaranController::class);
// Route::get('/pembayaran', function () {
//     return view('layout.transaksi');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/pembeli', function () {
//     return view('layout.pembeli');
// });
// Route::resource('pembeli', PembeliController::class);
Route::get('/pembeli', [PembeliiController::class, 'index'])->name('pembelii');
Route::get('/pembeli/tambah', [PembeliiController::class, 'tambah']);
Route::post('/pembeli/simpan', [PembeliiController::class, 'simpan']);
Route::get('/pembeli/edit/{id_supplier}', [PembeliiController::class, 'edit']);
Route::post('/pembeli/update/{id_supplier}', [PembeliiController::class, 'update']);
Route::get('/pembeli/delete/{id_supplier}', [PembeliiController::class, 'delete']);
Route::get('/pembeli/detail/{id_supplier}', [PembeliiController::class, 'detail']);
Route::get('/pembeli/cari', [PembeliiController::class, 'cari']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
