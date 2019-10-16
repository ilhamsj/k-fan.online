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

    public function PaketProduk()
    {   
        return $this->hasMany('App\PaketProduk');
    }
}
