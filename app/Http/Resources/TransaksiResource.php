<?php

namespace App\Http\Resources;

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
            'user_id' => $this->user_id,
            'paket_id' => $this->paket_id,
            'jumlah' => $this->jumlah,
            'catatan' => $this->catatan,
            'status' => $this->status,
            'snap_token' => $this->snap_token,
            'paket' => $this->paket->nama
        ];
    }
}
