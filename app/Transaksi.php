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

    public function BeritaLelayu()
    {
        return $this->hasMany(BeritaLelayu::class);
    }

    function status($transaction, $id) {

        if ($transaction == 'capture') {
            return '<span class="badge badge-success">'.$transaction.'</span>';
            // return '<a data-url="'.route('transaksi.approve', $id).'" href="'.route('transaksi.approve', $id).'" class="badge badge-success">'.$transaction.'</a>';
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            return '<span class="badge badge-success">'.$transaction.'</span>';
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            return '<span class="badge badge-info">Pending</span>';
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            return '<span class="badge badge-danger">Denied</span>';
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            return '<span class="badge badge-danger">Expire</span>';
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            return '<span class="badge badge-danger">Denied</span>';
        }
    }
}
