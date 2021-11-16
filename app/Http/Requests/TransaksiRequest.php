<?php

namespace App\Http\Requests;

use App\Transaksi;
use App\Kategori;
use App\Kebijakan;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3', Rule::unique((new Transaksi)->getTable())->ignore($this->route()->transaksi->id ?? null)
            ],
            'id_kategori' => [
                'required'
            ],
            'id_kebijakan' => [
                'required'
            ],
            'dokumen' => [
                $this->route()->transaksi ? 'nullable' : 'required', 'file'
            ]
            
            
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'id_kategori' => 'kategori',
            'id_kebijakan' => 'Kebijakan',
            'id_prov' => 'provinsi',
            'id_kab' => 'kota',
            'file' => 'dokumen'
        ];
    }
}
