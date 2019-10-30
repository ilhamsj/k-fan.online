<?php

use App\User;
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

Route::get('test', function (Request $request) {
    $term = $request->q;
    $user = Produk::where('nama', 'LIKE', '%'.$term.'%')
                    ->orWhere('kategori', 'LIKE', '%'.$term.'%')
                    ->orWhere('harga', 'LIKE', '%'.$term.'%')
                    ->get();
    return response()->json($user);
})->name('api.test');

Route::post('home', function (Request $request) {
    return response()->json($request);
})->name('upload.avatar');

Route::get('lelayu', function () {
    $items = \App\BeritaLelayu::all();

    return datatables($items)
        ->addIndexColumn()
        ->addColumn('action', function ($items) {
            return 
            '<a href="" data-id="'.$items->id.'" data-url="'.route('berita-lelayu.show', $items->id).'" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
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
})->name('api.lelayu');

Route::delete('lelayu/{id}', function ($id) {
    $item = \App\BeritaLelayu::find($id);
    $item->delete();

    return response()->json([
        'status'  => 'success',
        'success' => $item->name . ' Berhasil dihapus'
    ]);
})->name('lelayu.destroy');