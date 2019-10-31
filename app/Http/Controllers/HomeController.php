<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $items = \App\Produk::orderBy('updated_at', 'desc')->paginate(4);
        $pakets = \App\Paket::orderBy('created_at', 'asc')->paginate(4);
        $lelayu = \App\BeritaLelayu::orderBy('created_at', 'desc')->paginate(4);

        return view('welcome')->with([
            'produks' => $items,
            'pakets' => $pakets,
            'lelayu' => $lelayu,
        ]);
    }

    public function home()
    {
        return view('home')->with([
            'no' => 1
        ]);
    }

    public function finish() {
        return redirect()->route('welcome');
    }
}
