<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = \App\Produk::orderBy('updated_at', 'desc')->get();
        $pakets = \App\Paket::orderBy('created_at', 'asc')->get();

        return view('welcome')->with([
            'produks' => $items,
            'pakets' => $pakets,
        ]);
    }
}
