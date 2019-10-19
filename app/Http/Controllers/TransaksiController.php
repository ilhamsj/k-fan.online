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
        
        // return redirect()->route('transaksi.show', $transaksi->id)->with([
        //     'status' => 'Tambah Transaksi Berhasil',
        //     'snapToken' => $snapToken 
        // ]);

        $this->response['snap_token'] = $snapToken;
        return response()->json($this->response);
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);

        return view('transaksi')->with([
            'snapToken' => $transaksi->snap_token
        ]);
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

    public function notification()
    {
        $midtrans = new Midtrans;
        echo 'test notification handler';
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        if($result){
        $notif = $midtrans->status($result->order_id);
        }
        error_log(print_r($result,TRUE));
        /*
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        if ($transaction == 'capture') {
          // For credit card transaction, we need to check whether transaction is challenge by FDS or not
          if ($type == 'credit_card'){
            if($fraud == 'challenge'){
              // TODO set payment status in merchant's database to 'Challenge by FDS'
              // TODO merchant should decide whether this transaction is authorized or not in MAP
              echo "Transaction order_id: " . $order_id ." is challenged by FDS";
              } 
              else {
              // TODO set payment status in merchant's database to 'Success'
              echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
              }
            }
          }
        else if ($transaction == 'settlement'){
          // TODO set payment status in merchant's database to 'Settlement'
          echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
          } 
          else if($transaction == 'pending'){
          // TODO set payment status in merchant's database to 'Pending'
          echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
          } 
          else if ($transaction == 'deny') {
          // TODO set payment status in merchant's database to 'Denied'
          echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }*/
   
    }
}
