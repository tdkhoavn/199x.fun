<?php

namespace App\Rules\Admin;

use Illuminate\Contracts\Validation\Rule;

class PasswordMinMax implements Rule
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
        $min      = $this->parameters[0];
        $max      = $this->parameters[1];
        $password = $value;

        if ($password && strlen($value) < $min) {
            return false;
        }

        if ($password && strlen($value) > $max) {
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
        return 'The validation error message.';
    }
}
