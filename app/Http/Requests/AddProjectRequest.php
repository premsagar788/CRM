<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $status = ['On Hold', 'Not Started', 'In Progress', 'Finished', 'Cancelled'];
        $billing_type = ['Fixed Rate', 'Project Hours', 'Task Hours'];

        return [
            'name'              => 'required|string',
            'client'            => 'required', Rule::exists(Client::class, 'id'),
            'phone'             => 'required|integer',
            'billing_type'      => Rule::in($billing_type),
            'status'            => Rule::in($status),
            'estimated_time'    => 'required|string',
            'start_date'        => 'required',
            'deadline'          => 'required',
            'description'       => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Client name is required',
            'client.required'           => 'Company name is required',
            'phone.required'            => 'Source is required',
            'billing_type.required'     => 'Budget is required',
            'status.required'           => 'Website is required',
            'estimated_time.required'   => 'Phone number is required',
            'start_date.required'       => 'Client state is required',
            'deadline.required'         => 'Client country is required',
            'description.required'      => 'Description is required'
        ];
    }
}
