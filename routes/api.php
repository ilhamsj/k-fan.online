<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/grafik/transaksi/{year}', 'ChartController@transaksi_status')->name('grafik.transaksi.status');
Route::post('/grafik/transaksi', 'ChartController@transaksi')->name('grafik.transaksi');
Route::get('/grafik/paket', 'ChartController@paket')->name('grafik.paket');

Route::get('/test', 'ChartController@test')->name('test');
Route::get('/test/{year}', 'ChartController@testYear')->name('test.year');

Route::get('notifikasi/{id}', function ($user) {

    $user = User::find($user);
    $jumlah = $user->unreadNotifications->count();
    return response()->json([
        'data' => $user->unreadNotifications,
        'jumlah' =>  $jumlah
    ]);
});



// \Carbon\Carbon::parse($item->lahir)->format('Y-m-d\TH:s')
// dd(\Carbon\Carbon::parse($item->lahir)->toDateTimeLocalString());
// ->whereDay('created_at', $day)
// ->whereMonth('created_at', '2004')
// ->whereYear('created_at', '2019')

