<?php

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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin.home');

Route::resource('admin/user', 'UserController');
Route::resource('admin/produk', 'ProdukController');
Route::resource('admin/paket', 'PaketController');
Route::resource('admin/paket-produk', 'PaketProdukController');

Auth::routes();

Route::get('/order/{id}', 'TransaksiController@show')->name('order.paket');

Route::resource('transaksi', 'TransaksiController');

Route::get('transaksi/selesai', function () {
    return 'selesai';
})->name('transaksi.selesai');

Route::post('transaksi/notifikasi', function () {
  return 'selesai';
})->name('transaksi.notifikasi');