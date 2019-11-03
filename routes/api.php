<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lelayu/transaksi/{id}', 'BeritaLelayuController@showByTransaksi')->name('lelayu.transaksi');
Route::get('/produk/cari', 'AdminController@cariProduk')->name('produk.cari');

Route::resource('/user', 'UserController');
Route::resource('/lelayu', 'BeritaLelayuController');
Route::resource('/produk', 'ProdukController');

Route::get('/chart', 'ChartController@statusTransaksi')->name('chart.status');
Route::get('/test', 'ChartController@test')->name('chart.test');
Route::post('/test', 'ChartController@testPost')->name('chart.store');

Route::get('/test', 'ChartController@test')->name('chart.test');

// \Carbon\Carbon::parse($item->lahir)->format('Y-m-d\TH:s')
// dd(\Carbon\Carbon::parse($item->lahir)->toDateTimeLocalString());
// ->whereDay('created_at', $day)
// ->whereMonth('created_at', '2004')
// ->whereYear('created_at', '2019')

