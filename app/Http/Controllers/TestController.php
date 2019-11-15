<?php

namespace App\Http\Controllers;

use App\BeritaLelayu;
use App\Http\Resources\TestCollection;
use App\Http\Resources\TestResource;
use App\Http\Resources\TransaksiResource;
use App\Http\Resources\TransaksiShowResource;
use App\Http\Resources\UserResource;
use App\Paket;
use App\Produk;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request) {
        $transaksi = new TestCollection(
                Transaksi::where('status', 'capture')
                ->whereBetween('created_at', [$request->from_date, $request->to_date])
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
                'transaksi' => $transaksi,
                'paket'     => $paket,
                'produk'    => $produk,
                'user'      => $user,
                'berita'    => $berita,
            ],
            'chart' => [
                'm'    => $m,
            ],
            'logic' => $logic
        ]);
    }
}
