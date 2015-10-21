<?php

namespace Delivery\Http\Requests;

use Delivery\Http\Requests\Request;

class ClientRequest extends Request
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
            'phone'   =>'required|max:11|min:8',
            'address' =>'required|max:100',
            'city'    =>'required|max:50',
            'state'   =>'required',
            'zipcode' =>'required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
