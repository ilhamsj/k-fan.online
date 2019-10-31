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

Route::get('/', 'HomeController@index')->name('welcome');

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/paket/{id}', 'PaketController@show')->name('paket.show');
Route::get('/finish', 'HomeController@finish');

Route::get('/admin', 'AdminController@admin')->name('admin.home');
Route::get('/admin/user', 'AdminController@user')->name('admin.user');
Route::get('/admin/lelayu', 'AdminController@lelayu')->name('admin.lelayu');
Route::get('/admin/transaksi', 'TransaksiController@index')->name('admin.transaksi');

Route::resource('/admin/produk', 'ProdukController');
Route::resource('/admin/paket-produk', 'PaketProdukController');
Route::resource('/admin/paket', 'PaketController', [
  'except' => 'show'
]);

Route::resource('/transaksi', 'TransaksiController', [
  'except' => [
    'edit', 'index'
  ]
]);

Route::post('/notification', 'TransaksiController@notification')->name('notification');

