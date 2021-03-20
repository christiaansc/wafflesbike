<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string|max:250',
        ];
    }

    public function messages()
    {
        return [
            'name.requiered'=>'Este Campo es requerido',
            'name.string'   =>'El valor no es correcto',
            'name.max'      =>'Solo se permiten 50 caracteres',
            'descripcion.max'       =>'Solo se perminten 250 caracteres',
            'descripcion.string' =>'El valor no es correcto',


        ];
    }
}
