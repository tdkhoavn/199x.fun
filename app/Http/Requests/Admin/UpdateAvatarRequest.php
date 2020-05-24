<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\CommonRequest;

class UpdateAvatarRequest extends CommonRequest
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
            'avatar'   => 'bail|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'avatar.image'         => 'Vui lòng upload ảnh bằng định dạng jpeg, png, jpg, gif.',
            'avatar.mimes'         => 'Vui lòng upload ảnh bằng định dạng jpeg, png, jpg, gif.',
            'avatar.max'           => 'Vui lòng upload ảnh nhỏ hơn :max KB.',
        ];
    }
}
