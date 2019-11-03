<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $items = \App\Produk::all();

        return datatables($items)
            ->addIndexColumn()
            ->addColumn('action', function ($items) {
                return 
                '<a href="" data-url="'.route('lelayu.show', $items->id).'" data-id="'.$items->id.'"  class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                 <a href="" data-url="'.route('lelayu.destroy', $items->id).'" class="btnDelete btn btn-danger btn-icon-split btn-sm" data-id="'.$items->id.'"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>';
            })
            ->editColumn('foto', function ($items) {
                return '<img src="'.$items->foto.'" class="img-fluid rounded">';
            })
            ->rawColumns(['foto', 'action'])
            ->toJson();
    }

    public function create()
    {
        
    }

    public function store(\App\Http\Requests\LelayuStoreRequest $request)
    {
        \App\Produk::create($request->all());
        return response()->json($request->all());
    }

    public function show($id)
    {
        $item = \App\Produk::find($id);
        return response()->json($item);
    }

    public function edit($id)
    {
        $item = \App\Produk::where('transaksi_id', 'a317a7d-dcd5-3a61-a705-5a49c5d5d23d')->get();
        return response()->json($item);
    }

    public function update(\App\Http\Requests\LelayuStoreRequest $request, $id)
    {
        $item = \App\Produk::find($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = \App\Produk::find($id);
        $item->delete();
    
        return response()->json([
            'status'  => 'success',
            'success' => $item->name . ' Berhasil dihapus'
        ]);
    }
}
