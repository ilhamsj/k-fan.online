<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProdukStoreRequest;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $file_content = $request->file('foto');
        Storage::disk('public_uploads')->put('produk', $file_content);

        $produk = Produk::create($request->all());
        $produk->foto = $request->file('foto')->hashName();
        $produk->save();

        return redirect()->route('produk.index')->with([
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
        $item = Produk::find($id);
        $item->delete();
        
        $foto = public_path('images/produk/'.$item->foto );
        if(file_exists($foto)) {
            unlink($foto);
        }
        
        return redirect()->back()->with([
            'status' => 'Hapus data berhasil'
        ]);
    }
}
