<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::whereYear('created_at', 2019)->get();
        // if(request()->ajax()) {
        return datatables($user)
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                return 
                '<a href="" data-id="'.$user->id.'" data-url="'.route('user.show', $user->id).'" data-status="'.$user->status.'" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                <a href="" class="btnDelete btn btn-danger btn-icon-split btn-sm" data-id="'.$user->id.'" data-url="'.route('user.destroy', $user->id).'"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>';
            })
            ->toJson();
        // }
    }

    public function create()
    {

    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status'    => $request->status,
        ]);

        return response()->json([
            'success' => 'Data berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::find($id);
        $user->update($request->all());
    
        return response()->json([
            'success' => 'Data berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
    
        return response()->json([
            'status'  => 'success',
            'success' => $item->name . ' Berhasil dihapus'
        ]);
    }
}
