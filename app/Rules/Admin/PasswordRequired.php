<?php

namespace App\Rules\Admin;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class PasswordRequired implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($parameters, $validator)
    {
        $this->validator  = $validator;
        $this->parameters = $parameters;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $password     = Arr::get($this->validator->getData(), $this->parameters[0]);
        $new_password = $value;

        if ($password && !$new_password) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return null;
    }
}
