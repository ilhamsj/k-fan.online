<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaLelayu extends Model
{
    protected $fillable = [
        'transaksi_id', 'nama', 'alamat', 'surat_kematian', 'foto', 'lahir', 'wafat'
    ];

    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi');
    }
}
