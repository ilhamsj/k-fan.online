<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaketResource;
use App\Http\Resources\TransaksiResource;
use App\Paket;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function transaksi_status() {
        $items = DB::table('transaksis')
                    ->select(DB::raw('count(*) as jumlah, status'))
                    ->groupBy('status')
                    ->get();
    
        return response()->json([
            'data' => $items
        ]);
    }

    public function transaksi(Request $request) {
        $items = Transaksi::where('status', 'capture')
                    ->whereBetween('created_at', [$request->from_date, $request->to_date])
                    ->orderBy('created_at', 'asc')
                    ->get();
    
        return response()->json([
            'data' => $items
        ]);
    }

    public function paket() {
        $items = DB::table('transaksis')
                ->select(DB::raw('count(*) as jumlah, paket_id'))
                ->groupBy('paket_id')
                ->get();
    
        return response()->json([
            'data' => $items
        ]);
    }

    public function test($year) {
        // $items = TransaksiResource::collection(Transaksi::all())
        $datas = DB::table('transaksis')
                        ->select(DB::raw('count(*) as data, status as label'))
                        ->whereYear('created_at', $year)
                        ->groupBy('status')
                        ->get()
                        ;
        return response()->json([
            'data' => $datas,
            'title' => "statistik ransaksi tahun " . $year
        ]);
    }
}
