<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mitra_id' => 'required|integer',
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'kategori' => 'required|string',
        ]);
        Produk::create($request->all());
        return redirect()->back()->with([
            'status' => 'Data berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
