<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
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

    public function home()
    {
        return view('home');
    }

    function admin() 
    {
        $data = [
            0 => [
                'title' => 'User',
                'jumlah' => count(\App\User::all()),
            ],
            1 => [
                'title' => 'Produk',
                'jumlah' => count(\App\Produk::all()),
            ],
            2 => [
                'title' => 'Paket',
                'jumlah' => count(\App\Paket::all()),
            ],
        ];

        return view('admin.dashboard')->with([
            'items' => $data
        ]);
    }
}
