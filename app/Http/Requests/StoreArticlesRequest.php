<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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

            'name' => 'required|min:4|max:10'

            //
        ];
    }
    /* Funcion para messages de alerta */
    public function messages()
    {
        return [
            'name.required' => 'El nombre debe ser un campo requerido',
            'name.min' => 'El nombre debe tener minimo cuatro caracteres',
            'name.max' => 'El nombre debe tener maximo diez caracteres',
        ];
    }
}
