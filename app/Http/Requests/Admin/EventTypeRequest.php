<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\CommonRequest;

class EventTypeRequest extends CommonRequest
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
            'name'  => 'required|max:255|unique:event_types,name',
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
            'name.unique'    => 'Tên loại đã đuợc sử dụng',
            'color.required' => 'Vui lòng chọn Màu sắc.',
            'color.max'      => 'Màu sắc không đuợc quá :max ký tự.',
        ];
    }
}
