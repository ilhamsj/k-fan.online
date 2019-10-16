<?php

namespace App\Http\Controllers;

use App\Paket;
use App\Http\Requests\PaketStoreRequest;

class PaketController extends Controller
{
    public function index()
    {
        $items = Paket::orderBy('updated_at', 'desc')->get();
        $produks = \App\Produk::orderBy('updated_at', 'desc')->get();
        return view('admin.paket.index')->with([
            'items' => $items,
            'produks' => $produks,
            'no' => 1,
        ]);
    }

    public function create()
    {
        return view('admin.Paket.create');
    }

    public function store(PaketStoreRequest $request)
    {
        Paket::create($request->all());
        return redirect()->route('paket.index')->with([
            'status' => 'Tambah data Berhasil'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Paket::find($id);
        return view('admin.Paket.edit')->with([
            'item' => $item,
        ]);
    }

    public function update(PaketStoreRequest $request, $id)
    {
        Paket::find($id)->update($request->all());

        return redirect()->route('paket.index')->with([
            'status' => 'Update data berhasil'
        ]);
    }

    public function destroy($id)
    {
        Paket::destroy($id);
        return redirect()->back()->with([
            'status' => 'Hapus data berhasil'
        ]);
    }
}
