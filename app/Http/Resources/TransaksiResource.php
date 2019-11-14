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
            'id' => $this->id,
            'jumlah' => $this->jumlah,
            'catatan' => $this->catatan,
            'status' => $this->status,
            'snap_token' => $this->snap_token,
            'paket' => new PaketResource(Paket::find($this->paket_id)),
            'user' => new UserResource(User::find($this->user_id)),
            'berita' => new BeritaDukaResource(BeritaLelayu::where('transaksi_id', $this->id)->first())
        ];
    }
}
