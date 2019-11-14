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
        $from_date = '2019-10-01';
        $to_date = date('Y-m-d');

        $datas = Transaksi::where('status', 'challange')
                            ->orWhere('status', '')
                            ->whereBetween('created_at', [$from_date, $to_date])
                            ->orderBy('created_at')
                            ->get()
                            ->groupBy(function ($proj) {
                                return $proj->created_at
                                            // ->format('dM');
                                            ->format('My');
                                            // ->format('Y');
                            })
                            ->map(function ($total) {
                                return $total->count();
                                // return $total->sum('jumlah');
                            })
                            ;
        return response()->json([
            'data' => $datas,
            'title' => "Statistik Jumlah Tansaksi"
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
