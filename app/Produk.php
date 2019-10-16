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
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'mitra_id', 'id');
    }
}
