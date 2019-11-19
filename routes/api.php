<?php

use App\Http\Resources\TransaksiResource;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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
Route::get('pembayaran/{id}/{id_notifikasi}', function ($id, $id_notif) {
    $user   = User::where('status', 'admin')->first();
    $status = $user->notifications()->find($id_notif)->markAsRead();

    return new TransaksiResource(Transaksi::find($id));
 })->name('pembayaran.show');

Route::get('notifikasi', function () {

    $user = User::where('status', 'admin')->first();
    $jumlah = $user->unreadNotifications->count();
    return response()->json([
        'data' => $user->unreadNotifications,
        'jumlah' =>  $jumlah
    ]);
})->name('notifikasi');

Route::get('notifikasi/{id}', function ($id) {
    $user   = User::where('status', 'admin')->first();
    $status = $user->notifications()->find($id)->markAsRead();
    return response()->json([
        'status' => 'Berhasil di unread'
    ]);
})->name('notifikasi.read');

Route::post('/test/search', 'TestController@index')->name('searchFromDate');

Route::get('v1/transaksi', 'TransaksiController@indexV2')->name('transaksi.index.v1');
Route::get('v1/transaksi/{id}', 'TransaksiController@show_api')->name('transaksi.show.v1');

// \Carbon\Carbon::parse($item->lahir)->format('Y-m-d\TH:s')
// dd(\Carbon\Carbon::parse($item->lahir)->toDateTimeLocalString());
// ->whereDay('created_at', $day)
// ->whereMonth('created_at', '2004')
// ->whereYear('created_at', '2019')

