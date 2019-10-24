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
        $pakets = \App\Paket::orderBy('created_at', 'asc')->get();
        $lelayu = \App\BeritaLelayu::orderBy('created_at', 'asc')->get();

        return view('welcome')->with([
            'produks' => $items,
            'pakets' => $pakets,
            'lelayu' => $lelayu,
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
                'color' => 'border-left-info',
            ],
            1 => [
                'title' => 'Produk',
                'jumlah' => count(\App\Produk::all()),
                'icon' => 'fa fa-table',
                'color' => 'border-left-info',   
            ],
            2 => [
                'title' => 'Paket',
                'jumlah' => count(\App\Paket::all()),
                'icon' => 'fa fa-table',
                'color' => 'border-left-info',
            ],
            3 => [
                'title' => 'transaksi',
                'jumlah' => count(\App\Transaksi::all()),
                'icon' => 'fas fa-dollar-sign',
                'color' => 'border-left-info',
            ],
            4 => [
                'title' => 'Berita Duka',
                'jumlah' => count(\App\BeritaLelayu::all()),
                'icon' => 'fa fa-circle',
                'color' => 'border-left-info',
            ],
        ];

        return view('admin.dashboard')->with([
            'items' => $data
        ]);
    }
}
