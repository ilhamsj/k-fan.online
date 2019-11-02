<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function statusTransaksi() {
        $items = DB::table('transaksis')
                    ->select(DB::raw('count(*) as jumlah, status'))
                    ->groupBy('status')
                    ->get();
    
        return response()->json([
            'data' => $items
        ]);
    }
 
    public function test() {
        $items = Transaksi::where('status', 'capture')->get();
    
        return response()->json([
            'data' => $items
        ]);
    }
}
