<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('home');
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

    public function finishStore() {
        return redirect()->route('home');
    }

    public function lelayu()
    {
        $lelayu = \App\BeritaLelayu::orderBy('created_at', 'desc')->get();

        return view('lelayu')->with([
            'lelayu' => $lelayu,
        ]);
    }

    public function produk()
    {
        $items = \App\Produk::orderBy('created_at', 'desc')->get();

        return view('produk')->with([
            'produks' => $items,
        ]);
    }
}
