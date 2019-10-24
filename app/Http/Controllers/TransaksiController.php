<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Midtrans\Snap;
use Midtrans\Transaction;
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

    public function store(Request $request)
    {
        $request->validate([
            'catatan' => 'required'
        ]);
        $transaksi = Transaksi::create($request->all());
        $user = \App\User::find($request->user_id);
        $paket = \App\Paket::find($request->paket_id);

        $params = array(
            'transaction_details' => [
                'order_id' => $transaksi->id,
                'gross_amount' => ($transaksi->jumlah * 1),
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => [
                [
                    'id' => 'item1',
                    'price' => $transaksi->jumlah,
                    'quantity' => 1,
                    'name' => $paket->nama,
                ]
            ],
        );
        
        $snapToken = Snap::getSnapToken($params);
        $transaksi->snap_token = $snapToken;
        $transaksi->save();
        
        return redirect()->route('transaksi.show', $transaksi->id)->with([
            'status' => 'Tambah Transaksi Berhasil',
            'snapToken' => $snapToken 
        ]);
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);

        return view('transaksi')->with([
            'item' => $transaksi
        ]);
    }

    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect()->back()->with([
            'status' => 'Hapus data berhasil'
        ]);
    }

    public function notification(Request $request)
    {
        $notif = new \Midtrans\Notification();
        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;
        error_log("Order ID $notif->order_id: "."transaction status = $transaction, fraud staus = $fraud");
        $transaksi = Transaksi::find($notif->order_id);
        if ($transaction == 'capture') {
            if ($fraud == 'challenge') {
                $transaksi->update([
                    'status' => 'challenge'
                ]); 
            }
            else if ($fraud == 'accept') {
                $transaksi->update([
                    'status' => 'accept'
                ]); 
            }
        }
        else if ($transaction == 'cancel') {
            if ($fraud == 'challenge') {
                $transaksi->update([
                    'status' => 'challenge'
                ]); 
            }
            else if ($fraud == 'accept') {
                $transaksi->update([
                    'status' => 'accept'
                ]); 
            }
        }
        else if ($transaction == 'deny') {
            $transaksi->update([
                'status' => 'deny'
            ]); 
        }
        return;
    }
    
    public function finish()
    {
        return 'Transaksi berhasil';
    }
}
