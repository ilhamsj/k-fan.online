<?php

namespace App\Http\Controllers;

use App\User;
use App\Paket;
use App\Produk;
use App\Transaksi;
use Carbon\Carbon;
use App\BeritaLelayu;
use Illuminate\Http\Request;
use App\Http\Resources\TestCollection;

class TestController extends Controller
{
    public function index(Request $request) {
        $transaksi = new TestCollection(
                Transaksi::whereIn('status', ['settlement', 'capture'])
                            ->whereBetween('created_at', [$request->from_date, $request->to_date])
                            ->orderBy('created_at')
                            ->get()
        );
        $paket  = Paket::whereBetween('created_at', [$request->from_date, $request->to_date])->get();
        $produk = Produk::whereBetween('created_at', [$request->from_date, $request->to_date])->get();
        $user   = User::whereBetween('created_at', [$request->from_date, $request->to_date])->get();
        $berita = BeritaLelayu::whereBetween('created_at', [$request->from_date, $request->to_date])->get();

        $format = $request->format;

        if ($format == 'Y'):
            $m = $transaksi->groupBy(function ($p) {
                return $p->created_at->format('Y');
            });    
        elseif($format == 'M'):
            $m = $transaksi->groupBy(function ($p) {
                return $p->created_at->format('My');
            });    
        elseif($format == 'd'):
            $m = $transaksi->groupBy(function ($p) {
                return $p->created_at->format('D');
            });    
        else:
            $m = $transaksi->groupBy(function ($p) {
                return $p->created_at->format('dMy');
            });    
        endif;
        
        $x = $transaksi->groupBy(function ($proj) {
            return $proj->created_at
                        ->format('My');
                        })
                        ->map(function ($total) {
                            return $total->sum('jumlah');
                        })
                        ;

        $logic = count($m);

        return response()->json([
            'total' => [
                'Total transaksi' => $transaksi,
                'Total paket'     => $paket,
                'Total Pengguna'  => $user,
                'Total berita'    => $berita,
            ],
            'chart' => [
                'm'    => $m,
                'x'     => $x
            ],
            'label' => Carbon::parse($request->from_date)->format('d M Y'). " - " .  Carbon::parse($request->to_date)->format('d M Y'),
            'format' => $request->format
        ]);
    }
}
