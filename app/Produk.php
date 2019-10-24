<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'mitra_id',
        'nama',
        'harga',
        'kategori',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'mitra_id', 'id');
    }

    // Rupiah
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
}
