<?php

namespace App\Http\Controllers;

use App\Paket;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PaketResource;
use App\Http\Resources\TransaksiResource;

class ChartController extends Controller
{
    public function transaksi_status($year) {
        $datas = DB::table('transaksis')
                        ->select(DB::raw('count(*) as data, status as label'))
                        ->whereYear('created_at', $year)
                        ->groupBy('status')
                        ->get()
                        ;
        return response()->json([
            'data' => $datas,
            'title' => "statistik status transaksi tahun " . $year
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

    // public function test($year) {
    //     $datas = DB::table('transaksis')
    //                     ->select(DB::raw('count(*) as data, status as label'))
    //                     ->whereYear('created_at', $year)
    //                     ->groupBy('status')
    //                     ->get()
    //                     ;
    //     return response()->json([
    //         'data' => $datas,
    //         'title' => "statistik ransaksi tahun " . $year
    //     ]);
    // }

    public function test() {
        $year = 2019;
        $datas = Transaksi::whereYear('created_at', $year)->orderBy('created_at')->get()
                ->groupBy(function ($proj) {
                    return $proj->created_at->format('M');
                })
                ->map(function ($month) {
                    return $month->sum('jumlah');
                });
        return response()->json([
            'data' => $datas,
            'title' => "statistik transaksi tahun " . $year
        ]);
    }

    public function testYear($year) {
        $datas = Transaksi::all()
                ->groupBy(function ($proj) {
                    return $proj->created_at->format('Y');
                })
                ->map(function ($month) {
                    // return $month->count();
                    return $month->sum('jumlah');
                });
        return response()->json($datas);
    }
}
