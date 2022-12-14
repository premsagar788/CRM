<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddClientRequest extends FormRequest
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
            'name'      => 'required|string',
            'website'   => 'required|string',
            'phone'     => 'required|integer',
            'email'     => 'required|string',
            'street'    => 'required|string',
            'city'      => 'required|string',
            'state'     => 'required|string',
            'country'   => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Client name is required',
            'website.required'  => 'Client website is required',
            'phone.required'    => 'Client Phone number is required',
            'email.required'    => 'Client email is required',
            'street.required'   => 'Client street is required',
            'city.required'     => 'Client city is required',
            'state.required'    => 'Client state is required',
            'country.required'  => 'Client country is required',
        ];
    }
}
