<?php

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

Route::get('/barang', function () {
    return view('layout.barang');
});


Route::get('/supplier', function () {
    return view('layout.supplier');
});

Route::get('/transaksi', function () {
    return view('layout.transaksi');
});

Route::get('/pembayaran', function () {
    return view('layout.transaksi');
});

Route::get('/pembeli', function () {
    return view('layout.pembeli');
});
