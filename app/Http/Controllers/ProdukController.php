<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $items = Produk::orderBy('updated_at', 'desc')->get();
        return view('admin.produk.index')->with([
            'items' => $items,
            'no' => 1,
        ]);
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
        return redirect()->route('produk.index')->with([
            'status' => 'Data berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.produk.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Produk::destroy($id);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
