<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLeadRequest extends FormRequest
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
            'name'          => 'required|string',
            'company_name'  => 'required|string',
            'source'        => 'required|string',
            'budget'        => 'required|string',
            'website'       => 'required|string',
            'phone'         => 'required|integer',
            'country'       => 'required|string',
            'description'   => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Client name is required',
            'company_name.required' => 'Company name is required',
            'source.required'       => 'Source is required',
            'budget.required'       => 'Budgetl is required',
            'website.required'      => 'Website is required',
            'phone.required'        => 'Phone number is required',
            'state.required'        => 'Client state is required',
            'country.required'      => 'Client country is required',
            'description.required'  => 'Description is required'
        ];
    }
}
