<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    // public $preserveKeys = true;

    public function toArray($request)
    {
        // return [
        //     'id' => $this->id,
        //     'nama' => $this->nama,
        //     'harga' => $this->harga,
        //     'diskon' => $this->diskon,
        //     'deskripsi' => $this->deskripsi,
        //     'foto' => $this->foto,  
        // ];
        return parent::toArray($request);
    }
}
