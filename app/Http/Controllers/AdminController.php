<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

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
                'jumlah' => count(\App\Transaksi::where('status', 'accept')->get()),
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
            'items' => $data,
            'users' => json_encode(\App\User::all())
        ]);
    }
    
    function user() {
        return view('admin.user.index');
    }
}
