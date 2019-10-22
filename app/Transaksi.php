<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'paket_id',
        'jumlah',
        'catatan',
        'status',
        'snap_token',
    ];

    // Relasi
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function paket()
    {
        return $this->belongsTo('App\Paket');
    }

    // Midtrans
    public function setPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }

    public function setSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }

    public function setFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }

    public function setExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }

    // Rupiah
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
}
