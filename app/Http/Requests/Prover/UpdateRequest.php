<?php

namespace App\Http\Requests\Prover;

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
            'nombre'=>'required|string|max:255',

            'correo'=>'required|email|string|unique:providers,email,'. $this->route('provider')->id.'|max:255', 


            'ruc_number'=>'required|string|min:11|unique:providers,ruc_number,'. $this->route('provider')->id.'|max:11', 

            'direccion'=>'nullable|string|max:255',
            'phone'=>'required|string|min:9|unique:providers,phone,'. $this->route('provider')->id.'|max:9', 
        ];
    }
    public function messages()
    {
        return[
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.max'=>'Solo se permiten 255 caracteres.',
            
            'correo.required'=>'Este campo es requerido.',
            'correo.email'=>'No es un correo electrónico.',
            'correo.string'=>'El valor no es correcto.',
            'correo.max'=>'Solo se permiten 255 caracteres.',
            'correo.unique'=>'Ya se encuentra registrado.',

            'ruc_number.required'=>'Este campo es requerido.',
            'ruc_number.string'=>'El valor no es correcto.',
            'ruc_number.max'=>'Solo se permiten 11 caracteres.',
            'ruc_number.min'=>'Se requiere de 11 caracteres.',
            'ruc_number.unique'=>'Ya se encuentra registrado.',

            'direccion.max'=>'Solo se permiten 255 caracteres.',
            'direccion.string'=>'El valor no es correcto.',

            'telefono.required'=>'Este campo es requerido.',
            'telefono.string'=>'El valor no es correcto.',
            'telefono.max'=>'Solo se permiten 9 caracteres.',
            'telefono.min'=>'Se requiere de 9 caracteres.',
            'telefono.unique'=>'Ya se encuentra registrado.',
        ];
    }
}
