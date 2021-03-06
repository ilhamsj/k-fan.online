<?php

namespace App\Http\Resources;

use App\Paket;
use App\PaketProduk;
use App\Produk;
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
        return new ProdukResource(Paket::find($this->id)->load('Produk'));
    }
}
