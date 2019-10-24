<?php

namespace App\Http\Controllers;

use App\PaketProduk;
use Illuminate\Http\Request;

class PaketProdukController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        foreach ($request->produk_id as $produk) {
            PaketProduk::create([
                'paket_id' => $request->paket_id,
                'produk_id' => $produk,
            ]);
        }

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

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        PaketProduk::destroy($id);
        return redirect()->back()->with([
            'status' => 'Hapus data berhasil'
        ]);
    }
}
