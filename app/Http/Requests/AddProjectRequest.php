<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $status = ['New Opportunity', 'Interested', 'In Progress', 'Contacted', 'Attempted'];

        return [
            'name'              => 'required|string',
            'client'            => 'required|string',
            'phone'             => 'required|integer',
            'billing_type'      => 'required|string',
            'status'            => Rule::in($status)
            'estimated_time'    => 'required|string',
            'start_date'        => 'required|string',
            'deadline'          => 'required|string',
            'description'       => 'required|string',
        ];
    }
}
