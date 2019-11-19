<?php

namespace App\Http\Resources;

use App\BeritaLelayu;
use App\Paket;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            // 'snap_token'    => $this->snap_token,
            // 'tanggal'       => $this->created_at,
            'tanggal'       =>  date("d F Y h:i:s", strtotime($this->created_at)),
            'status'        => $this->status,
            'jumlah'        => $this->jumlah,
            'catatan'       => $this->catatan,
            'user'          => new UserResource(User::find($this->user_id)),
            'paket'         => new PaketResource(Paket::find($this->paket_id)),
            'berita'        => new BeritaDukaResource(BeritaLelayu::where('transaksi_id', $this->id)->first()),
        ];
    }
}
