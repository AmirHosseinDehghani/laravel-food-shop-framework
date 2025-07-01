<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PersianText implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[\p{Arabic}\s،؛٫؟!ـ]+$/u', $value)) {
            $fail('فیلد :attribute باید فقط شامل حروف فارسی باشد.');
        }
    }
}
