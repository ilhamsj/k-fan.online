<?php

namespace App\Http\Controllers;

use App\User;
use App\Paket;
use App\Produk;
use App\Transaksi;
use Carbon\Carbon;
use App\BeritaLelayu;
use Illuminate\Http\Request;
use App\Http\Resources\TestResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\TestCollection;
use App\Http\Resources\TransaksiResource;
use App\Http\Resources\TransaksiShowResource;

class TestController extends Controller
{
    public function index(Request $request) {
        $transaksi = new TestCollection(
                Transaksi::where('status', 'capture')
                ->whereBetween('created_at', [$request->from_date, $request->to_date])
                ->orderBy('created_at')
                ->get()
        );
        $paket  = Paket::whereBetween('created_at', [$request->from_date, $request->to_date])->get();
        $produk = Produk::whereBetween('created_at', [$request->from_date, $request->to_date])->get();
        $user   = User::whereBetween('created_at', [$request->from_date, $request->to_date])->get();
        $berita = BeritaLelayu::whereBetween('created_at', [$request->from_date, $request->to_date])->get();

        $m = $transaksi->groupBy(function ($proj) {
            return $proj->created_at
                        ->format('My');
                        // ->format('dM');
        });

        $logic = count($m);

        return response()->json([
            'total' => [
                'Total transaksi' => $transaksi,
                'Total paket'     => $paket,
                // 'produk'    => $produk,
                'Total Pengguna'      => $user,
                'Total berita'    => $berita,
            ],
            'chart' => [
                'm'    => $m,
            ],
            'label' => Carbon::parse($request->from_date)->format('d M Y'). " - " .  Carbon::parse($request->to_date)->format('d M Y')
        ]);
    }
}
