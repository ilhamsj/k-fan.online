<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
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

    public function test($from, $to) {
        $items = Transaksi::where('status', 'capture')
                    // ->whereDay('created_at', '28')   
                    // ->whereMonth('created_at', '1')
                    // ->whereYear('created_at', '2017')
                    ->whereBetween('created_at', [$from, $to])
                    ->orderBy('created_at', 'asc')
                    ->get();
    
        return response()->json([
            'data' => $items
        ]);
    }

    public function testPost(Request $request) {
        $items = Transaksi::where('status', 'capture')
                    ->whereBetween('created_at', [$request->from_date, $request->to_date])
                    ->orderBy('created_at', 'asc')
                    ->get();
    
        return response()->json([
            'data' => $items
        ]);
    }
}
