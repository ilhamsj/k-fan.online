<?php

namespace App\Http\Controllers;

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
}
