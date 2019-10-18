<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Midtrans\Snap;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function index()
    {
        $items = Transaksi::orderBy('created_at', 'desc')->get();
        return view('admin.transaksi.index')->with([
            'items' => $items,
            'no' => 1,
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $transaksi = Transaksi::create($request->all());
        $user = \App\User::find($request->user_id);
        $paket = \App\Paket::find($request->paket_id);

        // buat transaksi ke midtrans
        $params = array(
            'transaction_details' => [
                'order_id' => $transaksi->id,
                'gross_amount' => ($transaksi->jumlah * 1),
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'items' => [
                'id' => 'item1',
                'price' => $transaksi->jumlah,
                'quantity' => 1,
                'name' => $paket->nama,
            ],
        );
      
        $snapToken = Snap::getSnapToken($params);
        $transaksi->snap_token = $snapToken;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with([
            'status' => 'Tambah Transaksi Berhasil'
        ]);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect()->back()->with([
            'status' => 'Hapus data berhasil'
        ]);
    }
}
