<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArnesRequest extends FormRequest
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
            'id_proveedor'   => 'required',
            'nb_tipo'        =>   'required',
            'nu_codigo'      =>   'required',
            'nu_cantidad'    => 'required',
            'status'         => 'required',
        ];
    }
}
