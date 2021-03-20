<?php

namespace App\Http\Requests\Waffle;

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
            'nombre' => 'required|unique:product,nombre,'.$this->route('waffle')->id.'|max:255',
            'precio' => 'required',
            'image' => 'required|dimensions:min_width=100,min_height=200',
            'categoria_id' => 'required|integer|exists:App\Categoria,id',
            'prover_id' => 'required|integer|exists:App\Prover,id',
        ];
    }

    public function messages()
    {
        return [
            'nombre.requiered'=>'Este Campo es requerido',
            'nombre.string'   =>'El valor no es correcto',
            'nombre.max'      =>'Solo se permiten 255 caracteres',

            'precio.required'       =>'Este campo es requerido',

            'image.dimensions' =>'Solo se permiten imagenes  de 100x200 px.',
            'image.required' =>'Este campo es requerido',

            'categoria_id.required' => 'Este campo es requerido',
            'categoria_id.integer' => 'El valor tiene que ser entero',
            'categoria_id.exists' => 'La categoria no existe.',


            'proveedor_id.required' => 'Este campo es requerido',
            'proveedor_id.integer' => 'El valor tiene que ser entero',
            'proveedor_id.exists' => 'El proveedor no existe.',

        ];
    }
}
