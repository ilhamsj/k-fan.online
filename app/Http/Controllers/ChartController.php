<?php

namespace App\Http\Controllers;

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
        $items = Transaksi::where('status', ['capture', 'settlement'])
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

    public function test() {
        $items = DB::table('transaksis')
                ->orderBy('created_at', 'asc')
                ->get()
                ->groupBy(function($date) {
                    return \Carbon\Carbon::parse($date->created_at)->format('Y'); // grouping by years
                    // return \Carbon\Carbon::parse($date->created_at)->format('m'); // grouping by months
                });
        return response()->json([
            'data' => $items
        ]);
    }

    // public function test() {
    //     $items = DB::table('transaksis')
    //                 // ->select(DB::raw('sum(*) as jumlah, paket_id'))
    //                 ->where('status', 'capture')
    //                 ->sum('jumlah');
    //             // ->groupBy('paket_id')
    //             // ->get();
    
    //     return response()->json([
    //         'data' => $items
    //     ]);
    // }
}
