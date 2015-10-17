<?php

namespace Delivery\Http\Requests;

use Delivery\Http\Requests\Request;

class ProductRequest extends Request
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
        'category_id'   => 'required|not_in:0',
        'name'          => 'required|max:100|min:5',
        'description'   => 'required|max:250|min:10',
        //'price'         => 'required|regex:/^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}$/',
        ];
    }

    public function messages()
    {
        return [       
        'name.required' => 'O nome do produto é obrigatório.',
        'name.max'      => 'O nome do produto deverá conter máximo de 100 caracteres.',
        'name.min'      => 'O nome do produto deverá conter no mínino 5 caracteres.',

        'description.required' => 'A descrição do produto é obrigatório.',
        'description.max'      => 'A descrição do produto deverá conter máximo de 250 caracteres.',
        'description.min'      => 'A descrição do produto deverá conter no mínino 10 caracteres.',

        'category_id.required'  => 'A categoria é obrigatório.',
        'category_id.not_in'    =>'O selecione uma categoria.',
        'price.regex'           =>  'O valor informado é inválido.'
        ];
    }
}
