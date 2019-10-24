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
Route::get('/admin', 'HomeController@admin')->middleware('verified')->name('admin.home');

Route::resource('admin/user', 'UserController');
Route::resource('admin/produk', 'ProdukController');
Route::resource('admin/paket-produk', 'PaketProdukController');
Route::resource('admin/berita-lelayu', 'BeritaLelayuController');
Route::resource('transaksi', 'TransaksiController', [
  'except' => [
    'edit', 'index'
  ]
]);
Route::get('admin/transaksi', 'TransaksiController@index')->name('transaksi.index');
Route::resource('admin/paket', 'PaketController', [
  'except' => 'show'
]);

Route::get('/paket/{id}', 'PaketController@show')->middleware('verified')->name('paket.show');
Route::get('/finish', function() {
  return redirect()->route('welcome');
});

Route::post('/finish', function() {
  return redirect()->route('welcome');
});
Route::post('/notification', 'TransaksiController@notification')->name('notification');