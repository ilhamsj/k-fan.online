<?php

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;

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

Route::get('test', function () {
    $user = User::all();

    if(request()->ajax()) {
        return datatables($user)
            ->addColumn('action', function ($user) {
                return 
                '<a href="'.route('user.edit', $user->id).'" class="mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                <a href='.'a'.' class="btnDelete btn btn-danger btn-icon-split btn-sm" data-id="'.$user->id.'" data-url="'.route('api.user.delete', $user->id).'">
                    <span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span>
                </a>';
            })
            ->toJson();
    } else {
        return 'ajax only';
    }

})->name('api.user');

Route::delete('test/delete/{id}', function ($id) {
    
    $item = User::find($id);
    $item->delete();

    return response()->json([
        'status'  => 'success',
        'success' => $item->name . ' Berhasil dihapus'
    ]);
})->name('api.user.delete');

Route::post('test/post', function (UserStoreRequest $request) {

    if(\App\User::create($request->all())) {
        return response()->json([
            'success' => 'Data berhasil ditambahkan'
        ]);
    }

})->name('api.user.post');