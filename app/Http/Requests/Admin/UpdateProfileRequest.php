<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\CommonRequest;

class UpdateProfileRequest extends CommonRequest
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
            'name'     => 'required|max:255',
            'gender'   => 'required|in:1,2,3',
            'birthday' => 'required|date_format:d-m-Y|before:today',
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
            'name.required'        => 'Vui lòng nhập Tên.',
            'name.max'             => 'Tên không đuợc quá :max ký tự.',
            'gender.required'      => 'Vui lòng chọn Giới tính.',
            'gender.in'            => 'Vui lòng chọn Giới tính',
            'birthday.required'    => 'Vui lòng chọn Ngày sinh.',
            'birthday.date_format' => 'Vui lòng nhập Ngày sinh đúng định dạng :format.',
            'birthday.before'      => 'Vui lòng nhập Ngày sinh trước hôm nay.',
        ];
    }
}
