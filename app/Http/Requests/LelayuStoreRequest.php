<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LelayuStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'transaksi_id'      => 'required', 
            'nama'              => 'required', 
            'alamat'            => 'required', 
            'surat_kematian'    => 'required', 
            'foto'              => 'required', 
            'lahir'             => 'required', 
            'wafat'             => 'required'
        ];
    }
}
