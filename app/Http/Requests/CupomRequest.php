<?php

namespace Delivery\Http\Requests;

use Delivery\Http\Requests\Request;

class CupomRequest extends Request
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
            //'name'          => 'required|max:100|min:5',
        ];
    }

    public function messages()
    {
        return [
        // 'name.required' => 'O nome da categoria é obrigatório.',
        // 'name.max'      => 'O nome da categoria deverá conter máximo de 100 caracteres.',
        // 'name.min'      => 'O nome da categoria deverá conter no mínino 5 caracteres.',
        ];
    }
}
