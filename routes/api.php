<?php

use App\Produk;
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

Route::resource('user', 'UserController');
Route::resource('lelayu', 'BeritaLelayuController');

Route::get('produk/cari/', function (Request $request) {
    $term = $request->q;
    $user = Produk::where('nama', 'LIKE', '%'.$term.'%')
                    ->orWhere('kategori', 'LIKE', '%'.$term.'%')
                    ->orWhere('harga', 'LIKE', '%'.$term.'%')
                    ->get();
    return response()->json($user);
})->name('produk.cari');

// \Carbon\Carbon::parse($item->lahir)->format('Y-m-d\TH:s')
// dd(\Carbon\Carbon::parse($item->lahir)->toDateTimeLocalString());

Route::get('test/', function () {
    $items = \App\Transaksi::all()->groupBy('status');

    $label = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'];
    $nilai = [100, 20, 10, 5, 1, 10];

    return response()->json([
        'label' => $label,
        'nilai' => $nilai,
        'data' => $items,
    ]);
    
})->name('api.test');


Route::get('lelayu/transaksi/{id}', function ($id) {
    $items = \App\BeritaLelayu::where('transaksi_id', $id)->get();
    
    return datatables($items)
            ->addIndexColumn()
            ->addColumn('action', function ($items) {
                return 
                '<a href="" data-id="'.$items->id.'" data-url="'.route('lelayu.show', $items->id).'" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                <a href="" data-url="'.route('lelayu.destroy', $items->id).'" class="btnDelete btn btn-danger btn-icon-split btn-sm" data-id="'.$items->id.'"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>';
            })
            ->editColumn('foto', function ($items) {
                return '<img src="'.$items->foto.'" class="img-fluid rounded">';
            })
            ->editColumn('surat_kematian', function ($items) {
                return '<img src="'.$items->surat_kematian.'" class="img-fluid rounded">';
            })
            ->rawColumns(['foto','surat_kematian', 'action'])
            ->toJson();
})->name('lelayu.transaksi');
