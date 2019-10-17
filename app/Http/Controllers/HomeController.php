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
        $items = \App\Produk::orderBy('updated_at', 'desc')->paginate(4);
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
                'icon' => 'fa fa-user',
                'color' => 'border-left-danger',
            ],
            1 => [
                'title' => 'Produk',
                'jumlah' => count(\App\Produk::all()),
                'icon' => 'fa fa-table',
                'color' => 'border-left-primary',   
            ],
            2 => [
                'title' => 'Paket',
                'jumlah' => count(\App\Paket::all()),
                'icon' => 'fa fa-table',
                'color' => 'border-left-primary',
            ],
            3 => [
                'title' => 'transaksi',
                'jumlah' => count(\App\Paket::all()),
                'icon' => 'fas fa-dollar-sign',
                'color' => 'border-left-success',
            ],
        ];

        return view('admin.dashboard')->with([
            'items' => $data
        ]);
    }
}
