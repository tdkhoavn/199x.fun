<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventTypeRequest extends FormRequest
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
            'name'  => 'required|max:255',
            'color' => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'  => 'Vui lòng nhập Tên loại.',
            'name.max'       => 'Tên loại không đuợc quá :max ký tự.',
            'color.required' => 'Vui lòng chọn Màu sắc.',
            'color.max'      => 'Màu sắc không đuợc quá :max ký tự.',
        ];
    }
}
