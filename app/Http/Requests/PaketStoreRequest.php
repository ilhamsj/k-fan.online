<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaketStoreRequest extends FormRequest
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
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'diskon' => 'required|integer',
            'foto' => 'required|string',
            'deskripsi' => 'required|string',
        ];
    }
}
