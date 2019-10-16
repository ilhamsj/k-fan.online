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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.home');

Route::resource('admin/user', 'UserController');
Route::resource('admin/produk', 'ProdukController');
Route::resource('admin/paket', 'PaketController');
Route::resource('admin/paket-produk', 'PaketProdukController');
Auth::routes();