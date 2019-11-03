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
                '<a href="" data-url="'.route('layanan.update', $items->id).'" data-edit="'.route('layanan.edit', $items->id).'" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i></span></a>
                 <a href="" data-url="'.route('layanan.destroy', $items->id).'" class="btnDestroy btn btn-danger btn-icon-split btn-sm"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i></span></a>';
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

    public function store(Request $request)
    {
        $item = \App\Produk::create($request->all());
        return response()->json([
            'status'  => 'success',
            'item'      => $item
        ]);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $item = \App\Produk::find($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = \App\Produk::find($id);
        $item->update($request->all());
        return response()->json([
            'status'  => 'success',
        ]);
    }

    public function destroy($id)
    {
        $item = \App\Produk::find($id);
        $item->delete();
    
        return response()->json([
            'status'  => 'success',
        ]);
    }
}
