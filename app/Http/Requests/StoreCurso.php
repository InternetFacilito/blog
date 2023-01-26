<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'descripcion' => 'required|min:10|max:200',
            'categoria' => 'required|min:5|max:20'
        ];
    }
    public function attributes()
    {   
        return [
            'name' => 'Nombre del Curso',
        ];
    }

    public function messages()
    {
        
        return [
            'descripcion.required' => 'Debe de agregar una descripción del curso.',
        ];
    }
}
