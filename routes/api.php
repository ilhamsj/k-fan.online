<?php

use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

Route::get('lelayu/transaksi/{id}', 'BeritaLelayuController@showByTransaksi')->name('lelayu.transaksi');
Route::get('produk/cari/', 'AdminController@cariProduk')->name('produk.cari');

Route::resource('user', 'UserController');
Route::resource('lelayu', 'BeritaLelayuController');

// \Carbon\Carbon::parse($item->lahir)->format('Y-m-d\TH:s')
// dd(\Carbon\Carbon::parse($item->lahir)->toDateTimeLocalString());

Route::get('test/', function () {
    $items = DB::table('transaksis')
                ->select(DB::raw('count(*) as jumlah, status'))
                // ->whereDay('created_at', $day)
                // ->whereMonth('created_at', '2004')
                // ->whereYear('created_at', '2019')
                ->groupBy('status')
                ->get();

    return response()->json([
        'data' => $items
    ]);
    
})->name('api.test');


