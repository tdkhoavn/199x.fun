<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\CommonRequest;

class UpdatePasswordRequest extends CommonRequest
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
            'password'     => 'bail|required|password:admin',
            'new_password' => 'bail|admin_password_required_with:password|admin_password_min_max:6,30|confirmed',
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
            'password.required'                         => 'Vui lòng nhập Mật khẩu hiện tại',
            'password.password'                         => 'Mật khẩu hiện tại không đúng',
            'new_password.admin_password_required_with' => 'Vui lòng nhập mật khẩu mới',
            'new_password.admin_password_min_max'       => 'Mật khẩu phải từ 6 đến 30 ký tự',
            'new_password.confirmed'                    => 'Mật khẩu xác nhận chưa trùng khớp',
        ];
    }
}
