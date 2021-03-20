<?php

namespace App\Http\Requests\Cliente;

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
            'nombre' => 'required|unique:productos|max:255',
            'dni' => 'required|string|unique:productos|max:8',
            'ruc' => 'required|string|unique:productos|max:11',         
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|unique:productos|max:9',

            'correo' => 'required|email:rfc,dns|string|unique:productos|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.requiered'=>'Este Campo es requerido',
            'name.string'   =>'El valor no es correcto',
            'name.max'      =>'Solo se permiten 50 caracteres',

            'correo.string'      =>'El valor no es correcto',
            'correo.email'       =>'No es un correo',
            'correo.unique'      =>'Ya se encuentra registrado',
            'correo.requiered'   =>'Este campo es requerido',
            'correo.max'       =>'Solo se permiten 255 caracteres',

            'telefono.max'          =>'Solo se permiten 9 caracteres',
            'telefono.required'     =>'Este campo es requerido',
            'telefono.unique'       =>'Este telefono ya esta registrado',
            'telefono.min'          =>'Se requieren 9 caracteres',
  
            'direccion.string'       =>'El valor no es correcto',
            'direccion.requiered'    =>'Este campo es requerido',
            'direccion.max'          =>'Solo se permiten 255  caracteres',

            'ruc.requiered' =>'Este campo es requerido',
            'ruc.string' =>'El valor no es correcto',
            'ruc.max' =>'Solo se permiten 11 caracteres',
            'ruc.min' =>'Se requieren 11 caracteres',
            'ruc.unique' =>'Ya se encuentra registrado',

            'dni.requiered' =>'Este campo es requerido',
            'dni.string' =>'El valor no es correcto',
            'dni.max' =>'Solo se permiten 8 caracteres',
            'dni.min' =>'Se requieren 8 caracteres',
            'dni.unique' =>'Ya se encuentra registrado',
        ];
    }
}
