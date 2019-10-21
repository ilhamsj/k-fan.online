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
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin.home');

Route::resource('admin/user', 'UserController');
Route::resource('admin/produk', 'ProdukController');
Route::resource('admin/paket-produk', 'PaketProdukController');
Route::resource('transaksi', 'TransaksiController');
Route::resource('admin/paket', 'PaketController', [
  'except' => 'show'
]);

Route::get('/paket/{id}', 'PaketController@show')->name('paket.show');
Route::get('/finish', 'HomeController@finish')->name('finish');
Route::post('/notification', 'HomeController@notification')->name('notification');