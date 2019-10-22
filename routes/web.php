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
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->middleware('verified');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin.home');

Route::resource('admin/user', 'UserController');
Route::resource('admin/produk', 'ProdukController');
Route::resource('admin/paket-produk', 'PaketProdukController');
Route::resource('transaksi', 'TransaksiController', [
  'except' => [
    'edit'
  ]
]);
Route::resource('admin/paket', 'PaketController', [
  'except' => 'show'
]);

Route::get('/paket/{id}', 'PaketController@show')->name('paket.show');
Route::get('/finish', 'TransaksiController@finish')->name('finish');
Route::post('/notification', 'TransaksiController@notification')->name('notification');