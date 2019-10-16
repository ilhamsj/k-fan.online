<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function index()
    {
        $items = User::orderBy('updated_at', 'desc')->get();
        return view('admin.user.index')->with([
            'items' => $items,
            'no' => 1,
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserStoreRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with([
            'status' => 'Tambah data Berhasil'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = User::find($id);
        return view('admin.user.edit')->with([
            'item' => $item,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        User::find($id)->update($request->all());

        return redirect()->route('user.index')->with([
            'status' => 'Update data berhasil'
        ]);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with([
            'status' => 'Hapus data berhasil'
        ]);
    }
}
