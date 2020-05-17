<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'start_date' => 'required|date_format:d-m-Y',
            'member_id'  => 'required|array',
            'type_id'    => 'required|exists:event_types,id',
            'total'      => 'required|max:255',
            'note'       => 'max:1000',
        ];
    }
}
