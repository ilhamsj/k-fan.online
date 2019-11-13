<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaksi;
use Midtrans\Snap;
use Midtrans\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MyFirstNotification;
use Illuminate\Support\Facades\Notification;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('index', 'notification', 'finish', 'approve');

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
        $request->merge([
            'user_id' => Auth::user()->id
        ]);
        $transaksi = Transaksi::create($request->all());
        $user = \App\User::find(Auth::user()->id);
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
        $type = $notif->payment_type;
        error_log("Order ID $notif->order_id: "."transaction status = $transaction, fraud staus = $fraud");
        $transaksi = Transaksi::find($notif->order_id);

        $transaksi->update([
            'status' => $transaction,
            'catatan' => $type . ' ' . $fraud
        ]);

        $user = User::where('status', 'admin')->first();
        $notifikasi = Notification::send($user, new MyFirstNotification("Transaksi id " . $notif->id . " status " .$transaction));
        event(new MyEvent("Transaksi id " . $notif->id . " status " .$transaction));

        return;
    }
    
    public function finish()
    {
        return 'Transaksi berhasil';
    }
    
    public function approve($id) {
        // $status = \Midtrans\Transaction::status('9cfe8ab1-568c-3bcd-825d-c4f50b24e2b1');
        // $status = \Midtrans\Transaction::cancel('9cfe8ab1-568c-3bcd-825d-c4f50b24e2b1');
        // $status = \Midtrans\Transaction::approve('9cfe8ab1-568c-3bcd-825d-c4f50b24e2b1');
        // dd($status);
            // return redirect()->back()->with(['status' => ]);
    }
}
