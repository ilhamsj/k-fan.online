<?php

use App\User;
use App\Events\MyEvent;
use App\Notifications\InvoicePaid;
use App\Notifications\MyFirstNotification;
use App\Paket;
use App\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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
Route::post('/finish', 'HomeController@finishStore');
Route::get('/lelayu', 'HomeController@lelayu')->name('lelayu');
Route::get('/produk', 'HomeController@produk')->name('produk');

Route::get('/admin', 'AdminController@admin')->name('admin.home');
Route::get('/admin/user', 'AdminController@user')->name('admin.user');
Route::get('/admin/lelayu', 'AdminController@lelayu')->name('admin.lelayu');
Route::get('/admin/produk', 'AdminController@produk')->name('admin.produk');
Route::get('/admin/transaksi', 'TransaksiController@index')->name('admin.transaksi');

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

Route::get('hello', function () {
  $user = Auth::user();
  
  return view('hello');
});

Route::get('test/{message}', function ($message) {

  $user       = User::where('status', 'admin')->first();
  $transaksi  = Transaksi::find(1);
  $status     = 'capture';
  $paket      = Paket::all()->random();
  $pemesan    = 'gamora';

  Notification::send($user, new MyFirstNotification($transaksi, $paket, $status, $pemesan));
  event(new MyEvent($message));
  return "Event has been sent!";  
});