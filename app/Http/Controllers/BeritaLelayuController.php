<?php

namespace App\Http\Controllers;

use App\BeritaLelayu;
use App\Http\Requests\LelayuStoreRequest;
use Illuminate\Http\Request;

class BeritaLelayuController extends Controller
{
    public function index()
    {
        $items = \App\BeritaLelayu::all();

        return datatables($items)
            ->addIndexColumn()
            ->addColumn('action', function ($items) {
                return 
                '<a href="" data-id="'.$items->id.'" data-url="'.route('lelayu.show', $items->id).'" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                <a href="" data-url="'.route('lelayu.destroy', $items->id).'" class="btnDelete btn btn-danger btn-icon-split btn-sm" data-id="'.$items->id.'"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>';
            })
            ->editColumn('foto', function ($items) {
                return '<img src="'.$items->foto.'" class="img-fluid rounded">';
            })
            ->editColumn('surat_kematian', function ($items) {
                return '<img src="'.$items->surat_kematian.'" class="img-fluid rounded">';
            })
            ->rawColumns(['foto','surat_kematian', 'action'])
            ->toJson();
    }

    public function create()
    {
        
    }

    public function store(LelayuStoreRequest $request)
    {
        \App\BeritaLelayu::create($request->all());
        return response()->json($request->all());
    }

    public function show($id)
    {
        $item = \App\BeritaLelayu::find($id);
        return response()->json($item);
    }

    public function edit($id)
    {

    }

    public function update(LelayuStoreRequest $request, $id)
    {
        $item = \App\BeritaLelayu::find($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = \App\BeritaLelayu::find($id);
        $item->delete();
    
        return response()->json([
            'status'  => 'success',
            'success' => $item->name . ' Berhasil dihapus'
        ]);
    }
}
