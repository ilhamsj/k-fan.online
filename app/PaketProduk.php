<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketProduk extends Model
{
    protected $fillable = [
        'paket_id',
        'produk_id',
    ];
}
