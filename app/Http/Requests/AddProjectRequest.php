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
            'start_date'        => 'required|string',
            'deadline'          => 'required|string',
            'description'       => 'required|string',
        ];
    }
}
