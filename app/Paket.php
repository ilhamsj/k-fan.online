<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'diskon',
        'deskripsi',
        'foto',
    ];

    public function Produk()
    {   
        return $this->belongsToMany('App\Produk', 'paket_produks');
    }

    public function PaketProduk()
    {   
        return $this->hasMany('App\PaketProduk');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }

    function rupiah($angka){
        $hasil_rupiah = number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
}
