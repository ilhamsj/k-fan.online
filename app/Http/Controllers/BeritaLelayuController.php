<?php

namespace App\Http\Controllers;

use App\BeritaLelayu;
use Illuminate\Http\Request;

class BeritaLelayuController extends Controller
{
    public function index()
    {
        return view('admin.lelayu.index');
    }

    public function create()
    {
        return view('lelayu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required', 
            'nama' => 'required', 
            'alamat' => 'required', 
            'surat_kematian' => 'required', 
            'foto' => 'required', 
            'lahir' => 'required', 
            'wafat' => 'required'
        ]);
        
        BeritaLelayu::create($request->all());

        return redirect()->back()->with([
            'status' => 'Tambah data Berhasil'
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Produk::find($id);
        return view('admin.produk.edit')->with([
            'item' => $item,
        ]);
    }

    public function update(ProdukStoreRequest $request, $id)
    {
        Produk::find($id)->update($request->all());

        return redirect()->route('produk.index')->with([
            'status' => 'Update data berhasil'
        ]);
    }

    public function destroy($id)
    {
        BeritaLelayu::destroy($id);
        return redirect()->back()->with([
            'status' => 'Hapus data berhasil'
        ]);
    }
}
