<?php

namespace App\Http\Requests;

use App\Rules\Admin\PasswordRequired as AdminPasswordRequired;
use App\Rules\Admin\PasswordMinMax as AdminPasswordMinMax;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class CommonRequest extends FormRequest
{
    public function __construct()
    {
        Validator::extend('admin_password_required_with', function ($attribute, $value, $parameters, $validator) {
            $rule = new AdminPasswordRequired($parameters, $validator);
            return $rule->passes($attribute, $value);
        });

        Validator::extend('admin_password_min_max', function ($attribute, $value, $parameters, $validator) {
            $rule = new AdminPasswordMinMax($parameters, $validator);
            return $rule->passes($attribute, $value);
        });
    }
}
