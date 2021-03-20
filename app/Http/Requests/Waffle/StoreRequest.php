<?php

namespace App\Http\Requests\Waffle;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'string|required|unique:products|max:255',
         
            'sell_price'=>'required',

            'code'=>'nullable|string|max:8|min:8',
            
        ];
    }
    public function messages()
    {
        return[
            'nombre.string'=>'El valor no es correcto.',
            'nombre.required'=>'El campo es requerido.',
            'nombre.unique'=>'El producto ya está registrado.',
            'nombre.max'=>'Solo se permite 255 caracteres.',

            

            'precio.required'=>'El campo es requerido.',

            'codigo.string'=>'El valor no es correcto.',
            'codigo.max'=>'Solo se permite 8 dígitos.',
            'codigo.min'=>'Se requiere de 8 dígitos.',         


        ];
    }
}
