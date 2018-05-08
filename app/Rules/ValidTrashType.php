<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class ValidTrashType implements Rule
{
    protected $allowed = ['plastika', 'staklo', 'papir', 'metal', 'ostalo'];


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $exists = in_array(strtolower($value), $this->allowed);

        if($exists){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid TRASH TYPE input';
    }

}
