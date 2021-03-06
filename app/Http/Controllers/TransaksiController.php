<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaksi;
use Midtrans\Snap;
use App\Events\MyEvent;
use Midtrans\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TransaksiResource;
use App\Notifications\MyFirstNotification;
use Illuminate\Support\Facades\Notification;

class TransaksiController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'verified'])->except('indexV2', 'index', 'notification', 'finish', 'approve');

        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    // function rupiah($angka){
    //     $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    //     return $hasil_rupiah;
    // }

    public function indexV2()
    {
        $items = Transaksi::orderBy('created_at', 'desc')->get();

        return datatables($items)
            ->addIndexColumn()
            ->addColumn('action', function ($items) {
                return 
                '
                    <a href="" data-url="'.route('transaksi.show.v1', $items->id).'" class="btn btn-secondary btn-sm btn-icon-split transaksi_show"> <span class="icon text-white-50"> <i class="fa fa-eye" aria-hidden="true"></i> </span></a>
                    <a href="" class="btn btn-danger btn-icon-split btn-sm"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i></span></a>
                ';
            })
            ->editColumn('user_id', function ($items) {
                return $items->user->name;
            })
            ->editColumn('paket_id', function ($items) {
                return $items->paket->nama;
            })
            ->editColumn('jumlah', function ($items) {
                $rupiah = new Transaksi();
                return $rupiah->rupiah($items->jumlah);
            })
            ->editColumn('status', function ($items) {
                if ($items->status == 'capture' || $items->status == 'settlement'):
                    return '<span class="badge badge-pill badge-success">'.$items->status.'</span>';
                elseif ($items->status == 'pending'):
                    return '<span class="badge badge-pill badge-info">'.$items->status.'</span>';
                else:
                    return '<span class="badge badge-pill badge-danger">'.$items->status.'</span>';
                endif;
            })
            ->rawColumns(['action', 'status', 'user_id', 'paket_id', 'jumlah'])
            ->toJson();
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

    public function show_api($id)
    {
        return new TransaksiResource(Transaksi::find($id));
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
        $transaksi = Transaksi::find($notif->order_id);
        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;
        
        $catatan = "Transaksi id " . $notif->transaction_id . " Total " . $notif->gross_amount;
        
        $transaksi->update([
            'status' => $transaction,
            'catatan' => $catatan
        ]);

        $user       = User::where('status', 'admin')->first();
        $status     = $transaction;
        $paket      = $transaksi->paket->nama;
        $pemesan    = $transaksi->user->name;
      
        if($transaction == "settlement" || $transaction == "capture") {
            $user = User::where('status', 'admin')->first();
            Notification::send($user, new MyFirstNotification($notif->transaction_id, $paket, $status, $pemesan));
            event(new MyEvent($catatan));
        }

        error_log("Order ID $notif->order_id: "."transaction status = $transaction, fraud staus = $fraud");
        return;
    }
    
    public function approve($id) {
        // $status = \Midtrans\Transaction::status('9cfe8ab1-568c-3bcd-825d-c4f50b24e2b1');
        // $status = \Midtrans\Transaction::cancel('9cfe8ab1-568c-3bcd-825d-c4f50b24e2b1');
        // $status = \Midtrans\Transaction::approve('9cfe8ab1-568c-3bcd-825d-c4f50b24e2b1');
        // dd($status);
            // return redirect()->back()->with(['status' => ]);
    }
}
