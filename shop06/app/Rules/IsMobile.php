<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsMobile implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match("/^1[34578]{1}\d{9}$/",$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return '手机号格式不正确';
    }
}